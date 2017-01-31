<?php
/**
 * @author Ilja Neumann <ineumann@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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
namespace OC\Files\Storage\Wrapper;

use OC\Files\Stream\Checksum as ChecksumStream;

class Checksum extends Wrapper {

	private $checksummedPaths = [];

	/**
	 * @param array $parameters
	 */
	public function __construct($parameters) {
		parent::__construct($parameters);
	}

	/**
	 * @param string $path
	 * @param string $mode
	 * @return false|resource
	 */
	public function fopen($path, $mode) {
		$stream = $this->getWrapperStorage()->fopen($path, $mode);
		if (!self::requiresChecksum($path, $mode)) {
			return $stream;
		}

		$this->checksummedPaths[] = $path;

		return \OC\Files\Stream\Checksum::wrap($stream, $path);
	}

	/**
	 * Checksum is only required for everything under files/
	 * @param $path
	 * @param $mode
	 * @return bool
	 */
	private static function requiresChecksum($path, $mode) {
		return substr($path, 0, 6) === 'files/' && $mode !== 'r';
	}

	public function rename($path1, $path2) {
		return $this->getWrapperStorage()->rename($path1, $path2);
	}

	public function getMetaData($path) {
		$parentMetaData = parent::getMetaData($path);
		$checksums = ChecksumStream::getChecksums();
		$parentMetaData['checksum'] = $checksums[$path];

		return $parentMetaData;
	}
}