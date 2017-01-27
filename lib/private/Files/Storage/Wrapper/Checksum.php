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


class Checksum extends Wrapper {

	const FILTER_NAME = 'sha1_checksum';

	private $fileHashes = [];

	/**
	 * @param array $parameters
	 */
	public function __construct($parameters) {
		parent::__construct($parameters);
		stream_filter_register(self::FILTER_NAME, '\OC\Files\Stream\Filter\Sha1');
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

		stream_filter_append(
			$stream,
			self::FILTER_NAME,
			STREAM_FILTER_WRITE,
			['path' => $path, 'callback' => [$this, 'addFileHash']]
		);

		return $stream;
	}

	/**
	 * Checksum is only required for everything under files/
	 * @param $path
	 * @param $mode
	 * @return bool
	 */
	private static function requiresChecksum($path, $mode) {
		return substr($path, 0, 6) == 'files/' && $mode != 'r';
	}

	public function rename($path1, $path2) {
		if (array_key_exists($path1, $this->fileHashes)) {
			$checksum = $this->fileHashes[$path1];
			// Update checksum in oc_filecache here?
		}

		return $this->getWrapperStorage()->rename($path1, $path2);
	}

	public function addFileHash($path, $hash) {
		$this->fileHashes[$path] = $hash;
	}
}