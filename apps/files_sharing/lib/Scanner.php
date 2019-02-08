<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\Files_Sharing;

use OC\Files\ObjectStore\NoopScanner;
use OC\Files\Cache\Scanner as CacheScanner;

/**
 * Scanner for SharedStorage
 */
class Scanner extends CacheScanner {

	/**
	 * @var null|CacheScanner
	 */
	private $sourceScanner;

	/**
	 * Scan a single file and use source scanner if needed
	 *
	 * @inheritdoc
	 */
	public function scanFile($file, $reuseExisting = 0, $parentId = -1, $cacheData = null, $lock = true) {
		$sourceScanner = $this->getSourceScanner();
		if ($sourceScanner instanceof NoopScanner) {
			// No Operation Scanner will not update share permission (scanFile won't call getData)
			list(, $internalPath) = $this->storage->resolvePath($file);
			return $sourceScanner->scanFile($internalPath, $reuseExisting, $parentId, $cacheData, $lock);
		} else {
			return parent::scanFile($file, $reuseExisting, $parentId, $cacheData, $lock);
		}
	}

	/**
	 * Returns metadata from the shared storage, but
	 * with permissions from the source storage.
	 *
	 * NOTE: This function gets called from within scanFile parent function
	 *
	 * @inheritdoc
	 */
	protected function getData($path) {
		$data = parent::getData($path);
		if ($data === null) {
			return null;
		}
		list($sourceStorage, $internalPath) = $this->storage->resolvePath($path);
		$data['permissions'] = $sourceStorage->getPermissions($internalPath);
		return $data;
	}

	private function getSourceScanner() {
		if ($this->sourceScanner) {
			return $this->sourceScanner;
		}
		if ($this->storage->instanceOfStorage('\OCA\Files_Sharing\SharedStorage')) {
			/** @var \OC\Files\Storage\Storage $storage */
			list($storage) = $this->storage->resolvePath('');
			$this->sourceScanner = $storage->getScanner();
			return $this->sourceScanner;
		} else {
			return null;
		}
	}
}
