<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Exceptions;

/**
 * Class BadSignatureException is thrown when a signature cannot be verified.
 *
 * @package OC\IntegrityCheck\Exceptions
 */
class BadSignatureException extends InvalidSignatureException implements ReasonCodeException {
	public function getReasonCode(): string {
		return 'BAD_SIGNATURE';
	}
}
