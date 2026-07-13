<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

class IntegrityDiffer {
	/**
	 * Compare expected and current hash maps, producing the legacy structured diff.
	 *
	 * @param array $expectedHashes Map of relative path => SHA-512 hex (from manifest)
	 * @param array $currentHashes Map of relative path => SHA-512 hex (computed from disk)
	 * @param array $excludedFiles Paths to skip in the diff (from integrity.excluded.files config)
	 * @return array Legacy diff shape: ['EXTRA_FILE' => [...], 'FILE_MISSING' => [...], 'INVALID_HASH' => [...]]
	 *               or [] if no differences
	 */
	public function diff(array $expectedHashes, array $currentHashes, array $excludedFiles = []): array {
		// Compute symmetric difference: files that differ between the two maps
		$differencesA = \array_diff_assoc($expectedHashes, $currentHashes);
		$differencesB = \array_diff_assoc($currentHashes, $expectedHashes);
		$differences = \array_merge($differencesA, $differencesB);

		$differenceArray = [];

		foreach ($differences as $filename => $hash) {
			// Skip files in the exclusion list
			if (\in_array($filename, $excludedFiles, true)) {
				continue;
			}

			// Check if file should not exist in the manifest (extra file on disk)
			if (!\array_key_exists($filename, $expectedHashes)) {
				$differenceArray['EXTRA_FILE'][$filename]['expected'] = '';
				$differenceArray['EXTRA_FILE'][$filename]['current'] = $hash;
				continue;
			}

			// Check if file is missing from disk
			if (!\array_key_exists($filename, $currentHashes)) {
				$differenceArray['FILE_MISSING'][$filename]['expected'] = $expectedHashes[$filename];
				$differenceArray['FILE_MISSING'][$filename]['current'] = '';
				continue;
			}

			// Check if hash mismatches
			if ($expectedHashes[$filename] !== $currentHashes[$filename]) {
				$differenceArray['INVALID_HASH'][$filename]['expected'] = $expectedHashes[$filename];
				$differenceArray['INVALID_HASH'][$filename]['current'] = $currentHashes[$filename];
				continue;
			}

			// Should never reach here
			throw new \Exception('Invalid behaviour in file hash comparison experienced. Please report this error to the developers.');
		}

		return $differenceArray;
	}
}
