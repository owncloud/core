<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
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
	 * NOTE: The LEGACY_ACCEPTED_WARN marker is special-cased by Checker::hasPassedCheck():
	 * a non-empty results array is normally treated as FAILED, but legacyWarn is a
	 * pass-with-warning, so this marker is treated as passed.
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
