<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

/**
 * Interface OnDiskHasher computes the current filesystem hashes for verification.
 *
 * Returns relativePath => sha512hex for the tree at $basePath, applying the
 * same exclusions and (in core mode) .htaccess/.user.ini normalization as the
 * signer. This is the seam the existing Checker::generateHashes fills in Task 12.
 *
 * @package OC\IntegrityCheck\Verifier
 */
interface OnDiskHasher {
	/**
	 * Compute hashes for the directory tree.
	 *
	 * @param string $basePath The root directory to hash
	 * @return array Mapping of relative paths to SHA-512 hex hashes
	 */
	public function computeHashes(string $basePath): array;
}
