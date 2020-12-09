<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Files_External\Lib\Cache;

use OC\Files\Cache\Wrapper\CacheWrapper;
use OCA\Files_External\Lib\Storage\SMB;
use OCP\Files\Cache\ICache;
use OCP\Files\Cache\ICacheEntry;

/**
 * Class SmbCacheWrapper
 *
 * Reads the cache information from the underlying cache implementation and
 * verifies if the current user has access by calling stat on the storage.
 *
 * In case performance becomes a problem we might want to include a stat cache
 * per user on e.g. redis or so.
 *
 * @package OCA\Files_External\Lib\Cache
 */
class SmbCacheWrapper extends CacheWrapper {
	/**
	 * @var SMB
	 */
	private $smb;

	public function __construct(ICache $cache, SMB $smb) {
		parent::__construct($cache);
		$this->smb = $smb;
	}

	public function get($file) {
		if ($this->canAccess($file)) {
			return parent::get($file);
		}
		return null;
	}

	public function getFolderContents($folder) {
		$children = parent::getFolderContents($folder);
		return \array_filter($children, function (ICacheEntry $c) {
			return $this->canAccess($c->getPath());
		});
	}

	public function getFolderContentsById($fileId) {
		$children = parent::getFolderContentsById($fileId);
		return \array_filter($children, function (ICacheEntry $c) {
			return $this->canAccess($c->getPath());
		});
	}

	private function canAccess($file): bool {
		try {
			if (\is_integer($file)) {
				$fileInfo = parent::get($file);
				if ($fileInfo === null) {
					return false;
				}
				$file = $fileInfo['path'];
			}
			return $this->smb->stat($file) !== false;
		} catch (\Exception $ex) {
			\OC::$server->getLogger()->logException($ex);
			return false;
		}
	}
}
