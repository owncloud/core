<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Exceptions\CrlUnavailableException;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;

/**
 * CrlProvider implements the 3-step fallback for obtaining a valid CRL.
 *
 * For G2 chains: fetch from network → bundled developers.crl → fail-closed.
 * For G1 chains: skip network, use bundled legacy.crl → fail-closed.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class CrlProvider {
	private CrlFetcher $crlFetcher;
	private CrlValidator $crlValidator;
	private TrustStore $trustStore;
	private FileAccessHelper $fileAccessHelper;
	private EnvironmentHelper $environmentHelper;

	/**
	 * @param CrlFetcher $crlFetcher Fetcher for network CRLs
	 * @param CrlValidator $crlValidator Validator for CRL signature
	 * @param TrustStore $trustStore Trust store for validation
	 * @param FileAccessHelper $fileAccessHelper File access helper
	 * @param EnvironmentHelper $environmentHelper Environment helper
	 */
	public function __construct(
		CrlFetcher $crlFetcher,
		CrlValidator $crlValidator,
		TrustStore $trustStore,
		FileAccessHelper $fileAccessHelper,
		EnvironmentHelper $environmentHelper
	) {
		$this->crlFetcher = $crlFetcher;
		$this->crlValidator = $crlValidator;
		$this->trustStore = $trustStore;
		$this->fileAccessHelper = $fileAccessHelper;
		$this->environmentHelper = $environmentHelper;
	}

	/**
	 * Get the current CRL following the 3-step fallback policy.
	 *
	 * @param bool $isG1Chain True for G1 chains, false for G2
	 * @return ParsedCrl A valid, signature-validated CRL
	 * @throws CrlUnavailableException If no valid CRL could be obtained
	 */
	public function getCurrentCrl(bool $isG1Chain): ParsedCrl {
		// For G1 chains, skip network fetch and use only bundled legacy.crl
		if ($isG1Chain) {
			$bundledCrl = $this->readBundledCrl('legacy.crl');
			if ($bundledCrl !== null) {
				$parsed = $this->crlValidator->parseAndValidate($bundledCrl);
				if ($parsed !== null) {
					return $parsed;
				}
			}
			throw new CrlUnavailableException('No valid G1 legacy CRL available');
		}

		// For G2 chains: try fetch first
		$fetchedCrl = $this->crlFetcher->fetch(VerifierConstants::CRL_URL);
		if ($fetchedCrl !== null) {
			$parsed = $this->crlValidator->parseAndValidate($fetchedCrl);
			if ($parsed !== null) {
				return $parsed;
			}
		}

		// Fallback to bundled developers.crl
		$bundledCrl = $this->readBundledCrl('developers.crl');
		if ($bundledCrl !== null) {
			$parsed = $this->crlValidator->parseAndValidate($bundledCrl);
			if ($parsed !== null) {
				return $parsed;
			}
		}

		// Fail-closed: no valid CRL available
		throw new CrlUnavailableException('No valid CRL available (fetch and bundled both failed or invalid)');
	}

	/**
	 * Read a bundled CRL file from resources/codesigning/crl/.
	 *
	 * @param string $filename The filename (e.g., 'developers.crl' or 'legacy.crl')
	 * @return string|null The CRL data if found and readable, null otherwise
	 */
	private function readBundledCrl(string $filename): ?string {
		$path = $this->environmentHelper->getServerRoot() . '/resources/codesigning/crl/' . $filename;
		$content = $this->fileAccessHelper->file_get_contents($path);
		if ($content === false || empty($content)) {
			return null;
		}
		return $content;
	}
}
