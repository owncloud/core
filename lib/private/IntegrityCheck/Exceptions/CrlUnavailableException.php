<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Exceptions;

/**
 * Class CrlUnavailableException is thrown when no valid CRL could be obtained.
 * This indicates fail-closed behavior — no valid CRL from fetch or bundled fallback.
 *
 * @package OC\IntegrityCheck\Exceptions
 */
class CrlUnavailableException extends InvalidSignatureException implements ReasonCodeException {
	public function getReasonCode(): string {
		return 'CRL_UNAVAILABLE';
	}
}
