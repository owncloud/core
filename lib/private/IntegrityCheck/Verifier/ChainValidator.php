<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Exceptions\BadChainException;
use phpseclib3\File\X509;

/**
 * ChainValidator - Validates X.509 certificate chains against trusted roots.
 *
 * SECURITY-CRITICAL: Implements the chain validation algorithm that prevents trust bypasses.
 * Key property: only bundled roots are trusted; envelope-supplied intermediates must first
 * be proven to chain to a trusted root before being used as CAs for the leaf.
 *
 * Algorithm:
 * 1. Collect candidate intermediates = envelope chain PEMs + bundled intermediates
 * 2. For EACH candidate, verify it chains to SOME trusted root (fresh X509 per candidate)
 * 3. Build leaf-validation X509 with ALL trusted roots + verified intermediates as CAs
 * 4. Validate leaf signature, then determine which root anchored the chain
 * 5. Enforce the strict leaf profile (basicConstraints.cA==false, keyUsage has digitalSignature,
 *    extKeyUsage has codeSigning) for G2 leaves only; legacy G1 leaves are extension-less by
 *    design and the old verifier enforced no leaf constraints on them
 *
 * @package OC\IntegrityCheck\Verifier
 */
class ChainValidator {
	private TrustStore $trustStore;

	/**
	 * @param TrustStore $trustStore
	 */
	public function __construct(TrustStore $trustStore) {
		$this->trustStore = $trustStore;
	}

	/**
	 * Validate a leaf certificate against the trusted PKI.
	 *
	 * SECURITY: Disables phpseclib URL fetch to prevent SSRF attacks via AIA caIssuers URLs.
	 *
	 * @param string $leafPem PEM-encoded leaf certificate
	 * @param array $chainPems Array of PEM-encoded intermediates from the signature envelope
	 * @return ChainResult Immutable result containing validated leaf and anchor generation
	 * @throws BadChainException On any validation failure
	 */
	public function validate(string $leafPem, array $chainPems): ChainResult {
		// SECURITY: Disable URL fetch in phpseclib to prevent SSRF via AIA caIssuers.
		// NOTE: this mutates process-global phpseclib state (X509::$disable_url_fetch)
		// and is intentionally never re-enabled — no other code path in ownCloud relies
		// on phpseclib fetching remote AIA/CRL URLs, so leaving it disabled is the safe
		// direction and avoids a fragile save/restore around every validation.
		X509::disableURLFetch();
		// Step 1: Get trusted roots
		$roots = $this->trustStore->getRoots();
		if (empty($roots)) {
			throw new BadChainException('No trusted roots available.');
		}

		// Order roots deterministically by filename. getRoots() returns them in
		// filesystem (scandir) order; determineAnchorGeneration() returns the FIRST
		// root that anchors the leaf, so without a stable order a leaf that could
		// chain to more than one generation would get a filesystem-dependent
		// generation (and thus CRL path + legacy-warn eligibility).
		//
		// NOTE: a stricter "prefer g2 on ambiguity" tie-break would be desirable, but
		// determineAnchorGeneration() loads verified intermediates as CAs, so the
		// per-root isolation is looser than a full path build and reordering roots by
		// generation mis-classifies single-generation leaves. Hardening the anchor
		// derivation to a true per-root path check is tracked as a follow-up; for now
		// only bundled ownCloud-keyed roots are trust anchors, so reaching either path
		// still requires an ownCloud CA signature.
		\usort($roots, static function (array $a, array $b): int {
			return \strcmp($a['filename'], $b['filename']);
		});

		$bundledIntermediates = $this->trustStore->getBundledIntermediates();

		// Step 2: Collect candidate intermediates (envelope + bundled)
		$candidateIntermediates = array_merge($chainPems, $bundledIntermediates);

		// Step 3: Verify each candidate intermediate chains to a trusted root
		// Also collect serials from verified intermediates
		$verifiedIntermediates = [];
		$verifiedIntermediateSerials = [];
		foreach ($candidateIntermediates as $candidateIntermediate) {
			foreach ($roots as $root) {
				$x509 = new X509();
				$x509->loadCA($root['pem']);

				if ($x509->loadX509($candidateIntermediate) && $x509->validateSignature()) {
					// This candidate chains to this root; keep it and extract its serial
					$verifiedIntermediates[] = $candidateIntermediate;
					$verifiedIntermediateSerials[] = $this->extractSerialFromPem($candidateIntermediate);
					break; // Found a valid chain, no need to test against other roots
				}
			}
		}

		// Step 4: Build leaf-validation X509 with all trusted roots + verified intermediates
		$leafX509 = new X509();

		// Load all trusted roots as CAs
		foreach ($roots as $root) {
			$leafX509->loadCA($root['pem']);
		}

		// Load all verified intermediates as CAs
		foreach ($verifiedIntermediates as $intermediate) {
			$leafX509->loadCA($intermediate);
		}

		// Load and validate the leaf
		if (!$leafX509->loadX509($leafPem)) {
			throw new BadChainException('Failed to load leaf certificate.');
		}

		if (!$leafX509->validateSignature()) {
			throw new BadChainException('Leaf certificate does not chain to a trusted root.');
		}

		// Step 5: Determine which root anchored the chain (needed before constraint
		// enforcement, since G1 and G2 leaves are held to different constraint rules).
		$anchorGeneration = $this->determineAnchorGeneration($leafPem, $roots, $verifiedIntermediates);

		// Step 6: Enforce leaf constraints.
		// The strict X.509 leaf profile (basicConstraints.cA==false, keyUsage has
		// digitalSignature, extKeyUsage has codeSigning) applies ONLY to G2 leaves.
		// Legacy G1 code-signing certs in the field are extension-less (e.g. the
		// shipped resources/codesigning/core.crt and tests/data/integritycheck/SomeApp.crt
		// carry no v3 extensions at all) and the old verifier enforced none of these
		// constraints. Enforcing them on G1 would reject real legacy apps, breaking the
		// transition contract in resources/codesigning/README.md (§"G1 Transition").
		if ($anchorGeneration !== 'g1') {
			$this->enforceLeafConstraints($leafX509);
		}

		// Extract leaf CN and serial from the loaded certificate
		$leafDn = $leafX509->getDN(X509::DN_OPENSSL);
		$leafCn = $leafDn['CN'] ?? 'unknown';

		// Extract serial number using openssl (since phpseclib doesn't expose it directly)
		$leafSerial = $this->extractSerialFromPem($leafPem);

		// Build chain serials array: leaf first, then intermediates
		$chainSerials = \array_merge([$leafSerial], $verifiedIntermediateSerials);

		return new ChainResult($leafX509, $anchorGeneration, $leafCn, $leafSerial, $chainSerials);
	}

	/**
	 * Enforce the strict G2 leaf certificate profile.
	 *
	 * Applied to G2 leaves only. Legacy G1 leaves are extension-less by design and
	 * are exempt (see validate()).
	 *
	 * @param X509 $leaf Loaded leaf certificate
	 * @throws BadChainException On constraint violation
	 */
	private function enforceLeafConstraints(X509 $leaf): void {
		// basicConstraints: cA MUST be false (or absent)
		$basicConstraints = $leaf->getExtension('id-ce-basicConstraints');
		if ($basicConstraints !== false && $basicConstraints !== null && isset($basicConstraints['cA']) && $basicConstraints['cA'] === true) {
			throw new BadChainException('Leaf certificate has CA:TRUE constraint (is a CA cert).');
		}

		// keyUsage: MUST contain digitalSignature
		$keyUsage = $leaf->getExtension('id-ce-keyUsage');
		if ($keyUsage === false || $keyUsage === null || !$this->arrayContains($keyUsage, 'digitalSignature')) {
			throw new BadChainException('Leaf certificate missing digitalSignature in keyUsage.');
		}

		// extendedKeyUsage (extKeyUsage): MUST contain codeSigning (id-kp-codeSigning)
		$extKeyUsage = $leaf->getExtension('id-ce-extKeyUsage');
		if ($extKeyUsage === false || $extKeyUsage === null || !$this->arrayContains($extKeyUsage, 'id-kp-codeSigning')) {
			throw new BadChainException('Leaf certificate missing codeSigning in extendedKeyUsage.');
		}
	}

	/**
	 * Determine which root anchored the validated chain.
	 *
	 * Tests each root in isolation: for each root, build a fresh X509 with that root + verified
	 * intermediates as CAs, then test if the leaf validates. The first root that validates it
	 * is the anchor.
	 *
	 * @param string $leafPem Leaf certificate PEM
	 * @param array $roots Array of ['pem' => string, 'generation' => string, 'filename' => string]
	 * @param array $verifiedIntermediates Array of verified intermediate PEMs
	 * @return string 'g1' or 'g2' (generation of the anchoring root)
	 * @throws BadChainException If no root can anchor the leaf (shouldn't happen post-validation, but for safety)
	 */
	private function determineAnchorGeneration(string $leafPem, array $roots, array $verifiedIntermediates): string {
		foreach ($roots as $root) {
			$testX509 = new X509();
			$testX509->loadCA($root['pem']);

			foreach ($verifiedIntermediates as $intermediate) {
				$testX509->loadCA($intermediate);
			}

			// Try to load and validate the leaf with this root
			if ($testX509->loadX509($leafPem) && $testX509->validateSignature()) {
				return $root['generation'];
			}
		}

		// Fallback: shouldn't happen if the leaf was already validated successfully
		throw new BadChainException('Unable to determine anchoring root (internal error).');
	}

	/**
	 * Helper: check if value is in array (simple linear search for strings).
	 *
	 * @param array $arr
	 * @param string $value
	 * @return bool
	 */
	private function arrayContains(array $arr, string $value): bool {
		return \in_array($value, $arr, true);
	}

	/**
	 * Extract serial number from PEM-encoded certificate.
	 *
	 * Uses the phpseclib X509 parser to read the internal tbsCertificate serialNumber field.
	 *
	 * @param string $pem PEM-encoded certificate
	 * @return string Serial number as decimal string
	 * @throws BadChainException If unable to extract serial
	 */
	private function extractSerialFromPem(string $pem): string {
		// We need to access the internal parsed certificate structure.
		// Create a temporary X509 to parse and extract the serial.
		$tempX509 = new X509();
		if (!$tempX509->loadX509($pem)) {
			throw new BadChainException('Failed to parse certificate for serial extraction.');
		}

		// Use reflection to access the internal certificate data structure
		$reflection = new \ReflectionClass($tempX509);
		$certProperty = $reflection->getProperty('currentCert');
		$certProperty->setAccessible(true);
		$cert = $certProperty->getValue($tempX509);

		if (!isset($cert['tbsCertificate']['serialNumber'])) {
			throw new BadChainException('Unable to extract serial number from certificate.');
		}

		$serial = $cert['tbsCertificate']['serialNumber'];
		// The serialNumber is a Math_BigInteger object; convert to string
		if (\is_object($serial) && \method_exists($serial, 'toString')) {
			return $serial->toString();
		}
		if (\is_string($serial)) {
			return $serial;
		}

		throw new BadChainException('Unable to convert serial number to string.');
	}
}
