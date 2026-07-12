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

use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;

/**
 * TrustStore - Loads bundled trusted root and intermediate certificates.
 *
 * Roots are loaded from resources/codesigning/roots/ and are tagged with their
 * generation (g1/g2) based on the certificate file basename.
 * Intermediates are loaded from resources/codesigning/intermediates/ as untrusted hints.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class TrustStore {
	private FileAccessHelper $fileAccessHelper;
	private EnvironmentHelper $environmentHelper;

	/**
	 * @param FileAccessHelper $fileAccessHelper
	 * @param EnvironmentHelper $environmentHelper
	 */
	public function __construct(
		FileAccessHelper $fileAccessHelper,
		EnvironmentHelper $environmentHelper
	) {
		$this->fileAccessHelper = $fileAccessHelper;
		$this->environmentHelper = $environmentHelper;
	}

	/**
	 * Load all trusted root certificates from resources/codesigning/roots/.
	 *
	 * Each root is returned as ['pem' => <cert_pem>, 'generation' => 'g1'|'g2'].
	 * Generation is determined from the file basename: 'root-g1*' → 'g1', else 'g2'.
	 *
	 * @return array Array of ['pem' => string, 'generation' => string]
	 */
	public function getRoots(): array {
		$baseDir = $this->environmentHelper->getServerRoot() . '/resources/codesigning';
		$rootsDir = $baseDir . '/roots';

		$roots = [];
		$files = $this->fileAccessHelper->getDirectoryContent($rootsDir);

		foreach ($files as $filename) {
			$filePath = $rootsDir . '/' . $filename;
			$content = $this->fileAccessHelper->file_get_contents($filePath);
			if ($content === false) {
				continue;
			}

			// Determine generation from basename
			$generation = \strpos($filename, 'root-g1') === 0 ? 'g1' : 'g2';

			$roots[] = [
				'pem' => $content,
				'generation' => $generation,
				'filename' => $filename,
			];
		}

		return $roots;
	}

	/**
	 * Load all bundled intermediate certificates from resources/codesigning/intermediates/.
	 *
	 * These are treated as untrusted hints that may help chain the leaf to a trusted root.
	 *
	 * @return array Array of PEM strings
	 */
	public function getBundledIntermediates(): array {
		$baseDir = $this->environmentHelper->getServerRoot() . '/resources/codesigning';
		$intermediatesDir = $baseDir . '/intermediates';

		$intermediates = [];
		$files = $this->fileAccessHelper->getDirectoryContent($intermediatesDir);

		foreach ($files as $filename) {
			$filePath = $intermediatesDir . '/' . $filename;
			$content = $this->fileAccessHelper->file_get_contents($filePath);
			if ($content !== false) {
				$intermediates[] = $content;
			}
		}

		return $intermediates;
	}
}
