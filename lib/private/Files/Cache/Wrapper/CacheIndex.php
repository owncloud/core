<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud, Inc.
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

namespace OC\Files\Cache\Wrapper;
use OC\Cache\CappedMemoryCache;

/**
 * Jail to a subdirectory of the wrapped cache
 */
class CacheIndex extends CacheWrapper {

	/**
	 * @var CappedMemoryCache
	 */
	private static $metaDataCache = null;

	/**
	 * @param \OCP\Files\Cache\ICache $cache
	 * @param string $root
	 */
	public function __construct($cache) {
		parent::__construct($cache);
		if (self::$metaDataCache === null) {
			self::$metaDataCache = new CappedMemoryCache();
		}
	}

	/**
	 * get the stored metadata of a file or folder
	 *
	 * @param string /int $file
	 * @return array|false
	 */
	public function get($file) {
		$key = $this->getNumericStorageId().'-get-'.$file;
		if (!self::$metaDataCache->hasKey($key)) {
			$data = parent::get($file);
			self::$metaDataCache->set($key, $data);
		}

		return self::$metaDataCache->get($key);
	}

	public function getPathById($id) {
		$key = $this->getNumericStorageId().'-getPathById-'.$id;
		if (!self::$metaDataCache->hasKey($key)) {
			$data = parent::getPathById($id);
			self::$metaDataCache->set($key, $data);
			// TODO to cache reverse direction normalize path
			//$getPathByIdkey = $this->getNumericStorageId().'-getPathById-'.$id;
			//self::$metaDataCache->set($getPathByIdkey, $file);
		}

		return self::$metaDataCache->get($key);
	}
	public function getId($file) {
		$key = $this->getNumericStorageId().'-getId-'.$file;
		if (!self::$metaDataCache->hasKey($key)) {
			$id = parent::getId($file);
			self::$metaDataCache->set($key, $id);
			// TODO to cache reverse direction normalize path
			//$getPathByIdkey = $this->getNumericStorageId().'-getPathById-'.$id;
			//self::$metaDataCache->set($getPathByIdkey, $file);
		}

		return self::$metaDataCache->get($key);
	}

	/**
	 * insert meta data for a new file or folder
	 *
	 * @param string $file
	 * @param array $data
	 *
	 * @return int file id
	 * @throws \RuntimeException
	 */
	public function insert($file, array $data) {
		self::$metaDataCache->clear();
		return parent::insert($file, $data);
	}

	/**
	 * update the metadata in the cache
	 *
	 * @param int $id
	 * @param array $data
	 */
	public function update($id, array $data) {
		self::$metaDataCache->clear();
		parent::update($id, $data);
	}

}
