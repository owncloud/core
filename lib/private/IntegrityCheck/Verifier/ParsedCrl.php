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
