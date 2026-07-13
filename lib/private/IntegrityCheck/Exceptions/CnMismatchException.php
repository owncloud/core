<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Exceptions;

/**
 * Class CnMismatchException is thrown when the leaf certificate CN does not match
 * the resolved app identity.
 *
 * @package OC\IntegrityCheck\Exceptions
 */
class CnMismatchException extends InvalidSignatureException implements ReasonCodeException {
	public function getReasonCode(): string {
		return 'CN_MISMATCH';
	}
}
