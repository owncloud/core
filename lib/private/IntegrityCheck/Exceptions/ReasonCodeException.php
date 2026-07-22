<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Exceptions;

/**
 * Implemented by verification exceptions that carry a machine-readable failure
 * reason code (spec §9), e.g. BAD_CHAIN, REVOKED, CN_MISMATCH. Used by the
 * Checker to surface a non-breaking REASON key alongside the legacy EXCEPTION
 * result. A plain InvalidSignatureException does not implement this and thus
 * produces no REASON key, preserving the legacy result shape.
 *
 * @package OC\IntegrityCheck\Exceptions
 */
interface ReasonCodeException {
	/**
	 * @return string the §9 reason code for this failure
	 */
	public function getReasonCode(): string;
}
