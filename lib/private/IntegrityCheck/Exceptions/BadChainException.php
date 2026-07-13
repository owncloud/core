<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Exceptions;

/**
 * Class BadChainException is thrown when X.509 chain validation fails.
 *
 * @package OC\IntegrityCheck\Exceptions
 */
class BadChainException extends InvalidSignatureException implements ReasonCodeException {
	public function getReasonCode(): string {
		return 'BAD_CHAIN';
	}
}
