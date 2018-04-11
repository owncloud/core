<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\DAV;

use OC\Cache\CappedMemoryCache;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\File;

/**
 * Class BaseTree
 *
 * Provides base functionality for a tree
 *
 * @package OCA\DAV
 */
abstract class BaseTree extends \Sabre\DAV\Tree {

	/**
	 * @var CappedMemoryCache
	 */
	protected $deletedItemsCache;

	/**
	 * Get fileId by path
	 *
	 * @param string $path
	 *
	 * @return int|false
	 */
	public function getDeletedItemFileId($path) {
		if ($this->deletedItemsCache === null) {
			return false;
		}
		$fileId = $this->deletedItemsCache->get($path);
		if ($fileId === null) {
			return false;
		}
		return $fileId;
	}

	/**
	 * Store fileId before deletion
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function beforeDelete($path) {
		try {
			$node = $this->getNodeForPath($path);
			if (($node instanceof Directory
				|| $node instanceof File)
				&& $node->getId()
			) {
				if ($this->deletedItemsCache === null) {
					$this->deletedItemsCache = new CappedMemoryCache();
				}
				$this->deletedItemsCache->set($path, $node->getId());
			}
		} catch (\Exception $e) {
			// do nothing, delete will throw the same exception anyway
		}
	}
}
