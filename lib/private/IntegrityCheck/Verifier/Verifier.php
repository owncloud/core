<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Exceptions\BadChainException;
use OC\IntegrityCheck\Exceptions\MissingSignatureException;
use OC\IntegrityCheck\Exceptions\RevokedException;
use OC\IntegrityCheck\Helpers\FileAccessHelper;

/**
 * Class Verifier orchestrates the Mode-1 verification pipeline.
 *
 * Wires together SignatureEnvelope, ChainValidator, AlgorithmAllowlist,
 * ManifestVerifier, CrlProvider, AppIdResolver, IntegrityDiffer, and
 * OnDiskHasher to perform the full verification flow as specified in §4.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class Verifier {
	private ChainValidator $chainValidator;
	private AlgorithmAllowlist $algorithmAllowlist;
	private ManifestVerifier $manifestVerifier;
	private CrlProvider $crlProvider;
	private AppIdResolver $appIdResolver;
	private IntegrityDiffer $integrityDiffer;
	private OnDiskHasher $onDiskHasher;
	private FileAccessHelper $fileAccessHelper;

	/**
	 * Verifier constructor.
	 *
	 * @param ChainValidator $chainValidator
	 * @param AlgorithmAllowlist $algorithmAllowlist
	 * @param ManifestVerifier $manifestVerifier
	 * @param CrlProvider $crlProvider
	 * @param AppIdResolver $appIdResolver
	 * @param IntegrityDiffer $integrityDiffer
	 * @param OnDiskHasher $onDiskHasher
	 * @param FileAccessHelper $fileAccessHelper
	 */
	public function __construct(
		ChainValidator $chainValidator,
		AlgorithmAllowlist $algorithmAllowlist,
		ManifestVerifier $manifestVerifier,
		CrlProvider $crlProvider,
		AppIdResolver $appIdResolver,
		IntegrityDiffer $integrityDiffer,
		OnDiskHasher $onDiskHasher,
		FileAccessHelper $fileAccessHelper
	) {
		$this->chainValidator = $chainValidator;
		$this->algorithmAllowlist = $algorithmAllowlist;
		$this->manifestVerifier = $manifestVerifier;
		$this->crlProvider = $crlProvider;
		$this->appIdResolver = $appIdResolver;
		$this->integrityDiffer = $integrityDiffer;
		$this->onDiskHasher = $onDiskHasher;
		$this->fileAccessHelper = $fileAccessHelper;
	}

	/**
	 * Verify the signature and integrity of a code package.
	 *
	 * Implements the Mode-1 pipeline from spec §4:
	 * 1. Load signature.json
	 * 2. Parse envelope
	 * 3. Validate X.509 chain
	 * 4. Verify signature algorithm is permitted
	 * 5. Verify manifest signature
	 * 6. Check leaf certificate validity and revocation
	 * 7. Validate app identity matches CN
	 * 8. Compare on-disk hashes with signed manifest
	 *
	 * @param string $signaturePath Path to signature.json
	 * @param string $basePath Base path to the app/core directory
	 * @param string $expectedIdentity App ID or 'core' in core mode
	 * @param bool $coreMode Whether to validate in core mode (CN must be 'core')
	 * @param ?\DateTimeInterface $now Reference time for validity checks (defaults to current UTC)
	 * @param array $excludedFiles Files to exclude from integrity diff (Task 12 extension)
	 * @return VerificationResult
	 * @throws MissingSignatureException
	 * @throws BadChainException
	 * @throws \OC\IntegrityCheck\Exceptions\BadAlgorithmException
	 * @throws \OC\IntegrityCheck\Exceptions\BadSignatureException
	 * @throws RevokedException
	 * @throws \OC\IntegrityCheck\Exceptions\CrlUnavailableException
	 * @throws \OC\IntegrityCheck\Exceptions\CnMismatchException
	 */
	public function verify(
		string $signaturePath,
		string $basePath,
		string $expectedIdentity,
		bool $coreMode = false,
		?\DateTimeInterface $now = null,
		array $excludedFiles = []
	): VerificationResult {
		// Step 1: Load signature file
		$content = $this->fileAccessHelper->file_get_contents($signaturePath);
		if ($content === false || $content === '') {
			throw new MissingSignatureException('Signature file not found or empty: ' . $signaturePath);
		}

		// Step 2: Parse envelope (detects v2 vs legacy)
		$env = SignatureEnvelope::parse($content);

		// Step 3: Validate X.509 chain
		$chain = $this->chainValidator->validate($env->getLeafPem(), $env->getChainPems());

		// Step 4: Determine algorithm and verify it's permitted
		if ($env->isLegacyFormat()) {
			$alg = VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1;
		} else {
			$alg = $env->getAlg();
		}

		$now = $now ?? new \DateTimeImmutable();
		$this->algorithmAllowlist->assertPermitted($alg, $chain->isG1(), $now);

		// Step 5: Determine signed bytes and verify signature
		if ($env->isLegacyFormat()) {
			// Legacy format: ksort the hashes map and json_encode
			$sortedHashes = $env->getHashesMap();
			\ksort($sortedHashes);
			$signedBytes = \json_encode($sortedHashes);
		} else {
			// v2 format: use raw hashes bytes
			$signedBytes = $env->getRawHashesBytes();
		}

		$this->manifestVerifier->verify(
			$signedBytes,
			$alg,
			$env->getSignatureBinary(),
			$env->getLeafPem()
		);

		// Step 6: Check leaf validity and revocation
		$leaf = $chain->getLeaf();

		// Validate leaf certificate is not expired, with case-2 (legacy-warn) branch
		$dateValid = $leaf->validateDate($now);
		$legacyWarn = false;

		if (!$dateValid) {
			// Leaf is expired or not-yet-valid. Check for case-2 eligibility.
			// Case 2: Valid G1 chain, EXPIRED cert (not just invalid), before sunset, legacy alg.
			// Spec §8 case 2 applies ONLY to expired certs (now AFTER notAfter).
			// A not-yet-valid cert (now BEFORE notBefore) must be hard-blocked.

			// Extract notAfter to distinguish expired from not-yet-valid
			$notAfter = $this->extractNotAfterFromLeaf($leaf);
			$isExpired = $now->getTimestamp() > $notAfter->getTimestamp();

			$isG1 = $chain->isG1();
			$isLegacyAlg = $alg === VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1;
			$sunset = new \DateTimeImmutable(VerifierConstants::LEGACY_SUNSET);
			$beforeSunset = $now->getTimestamp() < $sunset->getTimestamp();

			if ($isExpired && $isG1 && $isLegacyAlg && $beforeSunset) {
				// Case 2: Legacy G1 app, EXPIRED cert, before sunset.
				// Skip the expiry check and set flag for legacy-warn result.
				// All other checks (revocation, identity, diff) still apply.
				$legacyWarn = true;
			} else {
				// Case 1/3: Hard block (not-yet-valid, or expired+ineligible)
				throw new BadChainException('Leaf certificate is expired or not yet valid');
			}
		}

		// Check CRL for revocation of ANY certificate in the chain (spec §4 step 4)
		// Applies to both case-2 and regular paths
		$crl = $this->crlProvider->getCurrentCrl($chain->isG1());
		foreach ($chain->getChainSerials() as $serial) {
			if ($crl->isRevoked($serial)) {
				throw new RevokedException('Certificate has been revoked');
			}
		}
		// TODO: check intermediate serials against intermediate.crl once the CA ceremony publishes it (spec §2)

		// Step 7: Validate identity (app ID or core)
		if ($coreMode) {
			$this->appIdResolver->assertCoreCn($chain->getLeafCn());
		} else {
			$this->appIdResolver->assertAppIdMatchesCn($basePath, $chain->getLeafCn());
		}

		// Step 8: Integrity diff
		$currentHashes = $this->onDiskHasher->computeHashes($basePath);
		$diff = $this->integrityDiffer->diff($env->getHashesMap(), $currentHashes, $excludedFiles);

		if (!empty($diff)) {
			return VerificationResult::diffFailure($diff);
		}

		// All checks passed
		if ($legacyWarn) {
			return VerificationResult::legacyWarn();
		}

		return VerificationResult::passed();
	}

	/**
	 * Extract the notAfter date from a loaded phpseclib X509 leaf certificate.
	 *
	 * Accesses the internal tbsCertificate.validity.notAfter field via reflection
	 * and parses it into a \DateTimeImmutable for timestamp comparison.
	 *
	 * @param \phpseclib3\File\X509 $leaf Loaded leaf certificate (via ChainResult::getLeaf())
	 * @return \DateTimeImmutable The notAfter date in UTC
	 * @throws \RuntimeException If unable to extract or parse notAfter
	 */
	private function extractNotAfterFromLeaf(\phpseclib3\File\X509 $leaf): \DateTimeImmutable {
		// Use reflection to access the internal certificate data structure
		$reflection = new \ReflectionClass($leaf);
		$certProperty = $reflection->getProperty('currentCert');
		$certProperty->setAccessible(true);
		$cert = $certProperty->getValue($leaf);

		if (!isset($cert['tbsCertificate']['validity']['notAfter'])) {
			throw new \RuntimeException('Unable to extract notAfter from leaf certificate.');
		}

		$notAfterData = $cert['tbsCertificate']['validity']['notAfter'];

		// phpseclib stores validity dates in a structure with either 'utcTime' or 'generalTime'
		$notAfterString = $notAfterData['utcTime'] ?? $notAfterData['generalTime'] ?? null;
		if ($notAfterString === null) {
			throw new \RuntimeException('Unable to parse notAfter (neither utcTime nor generalTime found).');
		}

		// Parse the date string (e.g., "Wed, 09 Jul 2036 14:58:13 +0000")
		try {
			return new \DateTimeImmutable($notAfterString, new \DateTimeZone('UTC'));
		} catch (\Throwable $e) {
			throw new \RuntimeException('Failed to parse notAfter date: ' . $e->getMessage());
		}
	}
}
