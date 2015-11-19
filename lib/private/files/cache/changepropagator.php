<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OC\Files\Cache;

use OC\Hooks\BasicEmitter;

/**
 * Propagates changes in etag and mtime up the filesystem tree
 *
 * @package OC\Files\Cache
 */
class ChangePropagator extends BasicEmitter {
	/**
	 * @var string[]
	 */
	protected $changedFiles = array();

	/**
	 * @var \OC\Files\View
	 */
	protected $view;

	/**
	 * @param \OC\Files\View $view
	 */
	public function __construct(\OC\Files\View $view) {
		$this->view = $view;
	}

	public function addChange($path) {
		$this->changedFiles[] = $path;
	}

	public function getChanges() {
		return $this->changedFiles;
	}

	/**
	 * propagate the registered changes to their parent folders
	 *
	 * @param int $time (optional) the mtime to set for the folders, if not set the current time is used
	 */
	public function propagateChanges($time = null) {
		$parents = $this->getAllParents();
		$this->changedFiles = array();
		if (count($parents) === 0) {
			return;
		}
		if (!$time) {
			$time = time();
		}

		$ids = array_map(function ($path) {
			/**
			 * @var \OC\Files\Storage\Storage $storage
			 * @var string $internalPath
			 */

			list($storage, $internalPath) = $this->view->resolvePath($path);
			if ($storage) {
				$cache = $storage->getCache();
				return (int)$cache->getId($internalPath);
			} else {
				return -1;
			}
		}, $parents);
		$ids = array_filter($ids, function ($id) {
			return $id > 0;
		});
		$connection = \OC::$server->getDatabaseConnection();
		$placeHolders = array_fill(0, count($ids), '?');
		$sql = 'UPDATE `*PREFIX*filecache` SET `mtime` = GREATEST(`mtime`, ?), `etag` = ? WHERE `fileid` IN (' . join(', ', $placeHolders) . ')';
		$etag = uniqid();
		$params = array_merge([$time, $etag], $ids);
		$query = $connection->prepare($sql);
		$query->execute($params);
	}

	/**
	 * @return string[]
	 */
	public function getAllParents() {
		$parents = array();
		foreach ($this->getChanges() as $path) {
			$parents = array_values(array_unique(array_merge($parents, $this->getParents($path))));
		}
		return $parents;
	}

	/**
	 * get all parent folders of $path
	 *
	 * @param string $path
	 * @return string[]
	 */
	protected function getParents($path) {
		$parts = explode('/', $path);

		// remove the singe file
		array_pop($parts);
		$result = array('/');
		$resultPath = '';
		foreach ($parts as $part) {
			if ($part) {
				$resultPath .= '/' . $part;
				$result[] = $resultPath;
			}
		}
		return $result;
	}
}
