<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OC\Files\ObjectStore;

use OCP\Files\NotPermittedException;
use OCP\Files\ObjectStore\IObjectStore;
use OCP\Files\StorageInvalidException;
use OCP\Files\StorageNotAvailableException;

class Files implements IObjectStore {

	const PARAM_PATH = 'path';
	const PARAM_AUTOCREATE = 'autocreate';

	/**
	 * @var string
	 */
	private $path;

	/**
	 * @var string
	 */
	private $autocreate;

	public function __construct($params) {
		if (isset($params[self::PARAM_PATH])) {
			$this->path = rtrim($params[self::PARAM_PATH], DIRECTORY_SEPARATOR);
		} else {
			// or inside datadir?
			$this->path = rtrim(\OC::$SERVERROOT, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'objects';
		}
		if (isset($params[self::PARAM_AUTOCREATE])) {
			// should only be true for tests
			$this->autocreate = $params[self::PARAM_AUTOCREATE];
		} else {
			$this->autocreate = false;
		}
	}

	protected function init() {
		if (is_dir($this->path)) {
			return;
		} elseif ($this->autocreate) {
			if (!mkdir($this->path)) {
				throw new StorageInvalidException('Could not create object directory '.$this->path);
			}
		} else {
			throw new StorageNotAvailableException();
		}

	}

	/**
	 * @return string the container name where objects are stored
	 */
	public function getStorageId() {
		return 'files:'.$this->path;
	}

	/**
	 * @param string $urn the unified resource name used to identify the object
	 * @param resource $stream stream with the data to write
	 * @throws NotPermittedException when something goes wrong
	 */
	public function writeObject($urn, $stream) {
		$this->init();
		$path = $this->getPath($urn);
		$basedir = dirname($path);
		if (!is_dir($basedir)) {
			mkdir($basedir, 0777, true);
		}
		$destination = fopen($path, 'w');
		if (!$destination) {
			throw new NotPermittedException("could not open '$path' for writing");
		}
		stream_copy_to_stream($stream, $destination);
	}

	/**
	 * @param string $urn the unified resource name used to identify the object
	 * @return resource stream with the read data
	 * @throws NotPermittedException when something goes wrong
	 */
	public function readObject($urn) {
		$this->init();
		$path = $this->getPath($urn);
		$stream = fopen($path, 'r');
		if (!$stream) {
			throw new NotPermittedException("could not open '$path' for reading");
		}
		return $stream;
	}

	/**
	 * @param string $urn Unified Resource Name
	 * @return void
	 * @throws NotPermittedException when something goes wrong
	 */
	public function deleteObject($urn) {
		$this->init();
		$path = $this->getPath($urn);
		if (!unlink($path)) {
			throw new NotPermittedException("could not delete '$path'");
		}
	}

	protected function getPath($urn) {
		$md5 = md5($urn);
		$start = substr($md5,0,8);
		$chunks = chunk_split($start, 2, DIRECTORY_SEPARATOR);
		return $this->path.DIRECTORY_SEPARATOR.$chunks.$md5;
	}

}
