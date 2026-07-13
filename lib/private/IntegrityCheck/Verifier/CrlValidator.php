<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use phpseclib3\File\X509;

/**
 * CrlValidator parses and validates CRLs using phpseclib3.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class CrlValidator {
	private TrustStore $trustStore;

	/**
	 * @param TrustStore $trustStore Trust store for loading trusted CAs
	 */
	public function __construct(TrustStore $trustStore) {
		$this->trustStore = $trustStore;
	}

	/**
	 * Parse and validate a CRL against the trust store.
	 *
	 * Loads the CRL into a fresh X509 instance with all trust-store roots and bundled
	 * intermediates loaded as CAs, then validates the CRL's signature.
	 *
	 * SECURITY: Disables phpseclib URL fetch to prevent SSRF attacks via AIA caIssuers URLs.
	 *
	 * @param string $crlData CRL data in PEM or DER format
	 * @return ParsedCrl|null A valid ParsedCrl on success, null if invalid/unparseable
	 */
	public function parseAndValidate(string $crlData): ?ParsedCrl {
		// SECURITY: Disable URL fetch in phpseclib to prevent SSRF via AIA caIssuers
		X509::disableURLFetch();
		try {
			// Create a fresh X509 instance for this CRL
			$x509 = new X509();

			// Load all trust store roots as CAs
			$roots = $this->trustStore->getRoots();
			foreach ($roots as $root) {
				$x509->loadCA($root['pem']);
			}

			// Load all bundled intermediates as CAs
			$intermediates = $this->trustStore->getBundledIntermediates();
			foreach ($intermediates as $intermediate) {
				$x509->loadCA($intermediate);
			}

			// Load the CRL
			$x509->loadCRL($crlData);

			// Validate the CRL's signature
			if ($x509->validateSignature() !== true) {
				return null;
			}

			return new ParsedCrl($x509);
		} catch (\Throwable $e) {
			// Never throw; return null for any parsing/validation error
			return null;
		}
	}
}
