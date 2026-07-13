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

use OC\IntegrityCheck\Exceptions\CnMismatchException;
use OC\IntegrityCheck\Helpers\FileAccessHelper;

/**
 * Class AppIdResolver resolves and validates the application identity from the
 * appinfo/info.xml file, canonicalizes it, and enforces that the leaf certificate
 * CN matches it exactly.
 *
 * @package OC\IntegrityCheck\Verifier
 */
class AppIdResolver {
	private const APPID_PATTERN = '/^[a-z][a-z0-9_.-]{2,63}\z/';
	private const CORE_IDENTITY = 'core';

	private FileAccessHelper $fileAccessHelper;

	/**
	 * AppIdResolver constructor.
	 *
	 * @param FileAccessHelper $fileAccessHelper Helper for reading files
	 */
	public function __construct(FileAccessHelper $fileAccessHelper) {
		$this->fileAccessHelper = $fileAccessHelper;
	}

	/**
	 * App mode: resolve appId from <basePath>/appinfo/info.xml, canonicalize,
	 * and compare to the leaf CN. On success returns the canonical appId.
	 * On any failure throws CnMismatchException.
	 *
	 * @param string $basePath Base path to the app directory
	 * @param string $leafCn Leaf certificate CN to validate against
	 * @return string The canonical appId (folded to lowercase)
	 * @throws CnMismatchException
	 */
	public function assertAppIdMatchesCn(string $basePath, string $leafCn): string {
		// Read info.xml
		$infoXmlPath = $basePath . '/appinfo/info.xml';
		$xmlContent = $this->fileAccessHelper->file_get_contents($infoXmlPath);

		if ($xmlContent === false || $xmlContent === '') {
			throw new CnMismatchException('Failed to read or empty appinfo/info.xml');
		}

		// Parse XML safely (guard against XXE)
		$libxmlPreviousState = \libxml_use_internal_errors(true);
		// Disable external entity loading
		\libxml_set_external_entity_loader(function () {
			return true;
		});

		$xml = \simplexml_load_string($xmlContent);

		// Restore previous libxml state
		\libxml_use_internal_errors($libxmlPreviousState);

		if ($xml === false) {
			throw new CnMismatchException('Failed to parse appinfo/info.xml');
		}

		// Extract <id> element
		if (!isset($xml->id) || $xml->id === '') {
			throw new CnMismatchException('Missing or empty <id> in appinfo/info.xml');
		}

		$id = (string) $xml->id;
		if ($id === '') {
			throw new CnMismatchException('Missing or empty <id> in appinfo/info.xml');
		}

		// Fold the id (ASCII-only: A-Z -> a-z)
		$foldedId = $this->asciiFold($id);

		// Validate the folded id
		if (!$this->isValidId($foldedId)) {
			throw new CnMismatchException('Invalid appId format: ' . $id);
		}

		// Validate the CN (NO folding - CN is canonical)
		if (!$this->isValidId($leafCn)) {
			throw new CnMismatchException('Invalid CN format: ' . $leafCn);
		}

		// Exact byte-for-byte comparison
		if ($foldedId !== $leafCn) {
			throw new CnMismatchException('CN does not match app identity: ' . $foldedId . ' !== ' . $leafCn);
		}

		return $foldedId;
	}

	/**
	 * Core mode: require the leaf CN to be the reserved 'core' identity.
	 * Throws CnMismatchException if CN is not exactly 'core'.
	 *
	 * @param string $leafCn Leaf certificate CN to validate
	 * @throws CnMismatchException
	 */
	public function assertCoreCn(string $leafCn): void {
		if ($leafCn !== self::CORE_IDENTITY) {
			throw new CnMismatchException('Invalid core CN: ' . $leafCn . ' (expected "core")');
		}
	}

	/**
	 * ASCII-only case-fold: convert bytes A-Z (0x41-0x5A) to a-z (0x61-0x7A).
	 * Non-ASCII bytes are left unchanged.
	 *
	 * @param string $id The identifier to fold
	 * @return string The folded identifier
	 */
	public function asciiFold(string $id): string {
		$result = '';
		$len = \strlen($id);
		for ($i = 0; $i < $len; $i++) {
			$byte = \ord($id[$i]);
			// If uppercase ASCII letter, add 0x20 to convert to lowercase
			if ($byte >= 0x41 && $byte <= 0x5A) {
				$result .= \chr($byte + 0x20);
			} else {
				$result .= $id[$i];
			}
		}
		return $result;
	}

	/**
	 * Validate an identifier against the pattern: ^[a-z][a-z0-9_.-]{2,63}$
	 * (total length 3-64 characters: starts with lowercase letter, followed by
	 * 2-63 lowercase letters, digits, underscore, dot, or hyphen).
	 *
	 * @param string $id The identifier to validate
	 * @return bool True if valid, false otherwise
	 */
	public function isValidId(string $id): bool {
		return preg_match(self::APPID_PATTERN, $id) === 1;
	}
}
