<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 */

namespace OCA\FederatedFileSharing;

use OC\ServerNotAvailableException;
use OCP\Files\Storage\IStorage;
use OCP\Files\StorageInvalidException;
use OCP\Files\StorageNotAvailableException;
use OCP\Lock\LockedException;

/**
 * Class Poller
 *
 * @package OCA\FederatedFileSharing
 */
class Poller {

	/** @var IStorage */
	private $storage;

	/**
	 * Poller constructor.
	 *
	 * @param IStorage $storage
	 */
	public function __construct(IStorage $storage) {
		$this->storage = $storage;
	}

	/**
	 * @param bool $force
	 *
	 * @return boolean whether pool has been executed
	 * @throws LockedException
	 * @throws ServerNotAvailableException
	 * @throws StorageNotAvailableException
	 * @throws StorageInvalidException
	 * @throws \OC\HintException
	 *
	 * @return boolean if poll has been executed
	 */
	public function poll($force = false) {
		$localMtime = $this->storage->filemtime('');

		if ($force || $this->storage->hasUpdated('', $localMtime)) {
			// poll storage by adjusting recursively etags of subfolders
			$this->pollChildren('');
			return true;
		}
		return false;
	}

	/**
	 * Poll storage by adjusting recursively etags of subfolders.
	 *
	 * @param string $folder
	 * @throws LockedException
	 * @throws ServerNotAvailableException
	 * @throws StorageNotAvailableException
	 * @throws StorageInvalidException
	 * @throws \OC\HintException
	 */
	private function pollChildren($folder) {
		$data = $this->storage->getScanner()->scanFile($folder);
		if ($data) {
			$children = $this->storage->getCache()->getFolderContents($folder);
			foreach ($children as $file) {
				// recursively descend to subfolders in order to poll them
				if ($file->getMimeType() === 'httpd/unix-directory') {
					$subFolder = $folder ? $folder . '/' . $file->getName() : $file->getName();
					$this->pollChildren($subFolder);
				}
			}
		}
	}
}
