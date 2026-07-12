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

	private function __construct(bool $passed, array $diff = []) {
		$this->passed = $passed;
		$this->diff = $diff;
	}

	/**
	 * Create a result indicating verification passed.
	 *
	 * @return self
	 */
	public static function passed(): self {
		return new self(true, []);
	}

	/**
	 * Create a result indicating integrity diff failure.
	 *
	 * @param array $diff The structured diff array
	 * @return self
	 */
	public static function diffFailure(array $diff): self {
		return new self(false, $diff);
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
	 * Get the integrity diff (empty array if passed).
	 *
	 * @return array
	 */
	public function getDiff(): array {
		return $this->diff;
	}

	/**
	 * Convert to legacy result array format.
	 *
	 * Returns [] when passed, else the structured diff array.
	 *
	 * @return array
	 */
	public function toLegacyResultArray(): array {
		return $this->passed ? [] : $this->diff;
	}
}
