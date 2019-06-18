<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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
use OC\Files\Storage\FailedStorage;
use OC\Files\Cache\Watcher as CoreWatcher;

class Watcher extends CoreWatcher {
	public function __construct(\OC\Files\Storage\Storage $storage) {
		parent::__construct($storage);
	}

	/**
	 * Overwrite the needsUpdate method to return true if the storage is a FailedStorage
	 * This should eventually throw an StorageNotAvailable at some point.
	 * For any other storage, just go through the normal behaviour.
	 */
	public function needsUpdate($path, $cachedData) {
		// $this->storage is a protected attribute set in the parent's constructor
		if ($this->storage instanceof FailedStorage) {
			return true;
		} else {
			parent::needsUpdate($path, $cachedData);
		}
	}
}
