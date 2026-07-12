<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2025, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
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
			// Case 2: Valid G1 chain, expired cert, before sunset, legacy alg.
			// All three must be true: G1, legacy alg, and now < sunset.
			$isG1 = $chain->isG1();
			$isLegacyAlg = $alg === VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1;
			$sunset = new \DateTimeImmutable(VerifierConstants::LEGACY_SUNSET);
			$beforeSunset = $now->getTimestamp() < $sunset->getTimestamp();

			if ($isG1 && $isLegacyAlg && $beforeSunset) {
				// Case 2: Legacy G1 app, expired cert, before sunset.
				// Skip the expiry check and set flag for legacy-warn result.
				// All other checks (revocation, identity, diff) still apply.
				$legacyWarn = true;
			} else {
				// Case 1/3: Hard block (expired/not-yet-valid, not eligible for case-2)
				throw new BadChainException('Leaf certificate is expired or not yet valid');
			}
		}

		// Check CRL for revocation (applies to both case-2 and regular paths)
		$crl = $this->crlProvider->getCurrentCrl($chain->isG1());
		if ($crl->isRevoked($chain->getLeafSerial())) {
			throw new RevokedException('Certificate has been revoked');
		}

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
}
