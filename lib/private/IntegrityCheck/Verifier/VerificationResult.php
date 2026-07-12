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

/**
 * VerificationResult - Immutable value object representing the outcome of a verification.
 *
 * Represents the OUTCOME of a verification that did not throw a reason-code exception.
 * A clean pass or an integrity-diff failure.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class VerificationResult {
	private bool $passed;
	private array $diff;
	private bool $isLegacyWarn;

	private function __construct(bool $passed, array $diff = [], bool $isLegacyWarn = false) {
		$this->passed = $passed;
		$this->diff = $diff;
		$this->isLegacyWarn = $isLegacyWarn;
	}

	/**
	 * Create a result indicating verification passed.
	 *
	 * @return self
	 */
	public static function passed(): self {
		return new self(true, [], false);
	}

	/**
	 * Create a result indicating integrity diff failure.
	 *
	 * @param array $diff The structured diff array
	 * @return self
	 */
	public static function diffFailure(array $diff): self {
		return new self(false, $diff, false);
	}

	/**
	 * Create a result indicating a legacy (G1) app with an expired cert was allowed.
	 *
	 * This represents the warn-and-allow case from spec §8 case 2: a valid but
	 * expired G1 app is allowed until LEGACY_SUNSET (2026-12-31), provided all
	 * other checks pass (chain, signature, revocation, identity, diff).
	 *
	 * @return self
	 */
	public static function legacyWarn(): self {
		return new self(true, [], true);
	}

	/**
	 * Check if verification passed.
	 *
	 * @return bool
	 */
	public function isPassed(): bool {
		return $this->passed;
	}

	/**
	 * Check if this is a legacy-warn result (expired G1 app, allowed until sunset).
	 *
	 * @return bool
	 */
	public function isLegacyWarn(): bool {
		return $this->isLegacyWarn;
	}

	/**
	 * Get the integrity diff (empty array if passed or legacy-warn).
	 *
	 * @return array
	 */
	public function getDiff(): array {
		return $this->diff;
	}

	/**
	 * Convert to legacy result array format.
	 *
	 * Returns:
	 * - [] for a clean pass (isPassed && !isLegacyWarn)
	 * - ['LEGACY_ACCEPTED_WARN' => true] for a legacy-warn result
	 * - The structured diff array for an integrity diff failure
	 *
	 * NOTE: Task 12 must special-case the LEGACY_ACCEPTED_WARN marker, as the legacy
	 * hasPassedCheck() treats a non-empty results array as FAILED. But legacyWarn is a
	 * pass-with-warning, so Task 12 should treat this marker as passed.
	 *
	 * @return array
	 */
	public function toLegacyResultArray(): array {
		if ($this->isLegacyWarn) {
			return ['LEGACY_ACCEPTED_WARN' => true];
		}
		return $this->passed ? [] : $this->diff;
	}
}
