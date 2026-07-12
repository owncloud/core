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
