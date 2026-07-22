<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Exceptions;

/**
 * Class RevokedException is thrown when a certificate has been revoked
 * according to the CRL.
 *
 * @package OC\IntegrityCheck\Exceptions
 */
class RevokedException extends InvalidSignatureException implements ReasonCodeException {
	public function getReasonCode(): string {
		return 'REVOKED';
	}
}
