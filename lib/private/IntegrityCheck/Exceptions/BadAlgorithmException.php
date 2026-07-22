<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Exceptions;

/**
 * Class BadAlgorithmException is thrown when an algorithm is not permitted.
 *
 * @package OC\IntegrityCheck\Exceptions
 */
class BadAlgorithmException extends InvalidSignatureException implements ReasonCodeException {
	public function getReasonCode(): string {
		return 'BAD_ALGORITHM';
	}
}
