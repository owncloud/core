<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use phpseclib3\File\X509;

/**
 * ParsedCrl wraps a loaded, signature-validated CRL from phpseclib3.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class ParsedCrl {
	private X509 $crl;

	/**
	 * @param X509 $crl A loaded X509 CRL that has been signature-validated
	 */
	public function __construct(X509 $crl) {
		$this->crl = $crl;
	}

	/**
	 * Check if a certificate (by its decimal serial number) is revoked in this CRL.
	 *
	 * @param string $serialDecimal The decimal serial number of the certificate
	 * @return bool True if the serial is revoked, false otherwise
	 */
	public function isRevoked(string $serialDecimal): bool {
		$result = $this->crl->getRevoked($serialDecimal);
		return (bool)$result;
	}
}
