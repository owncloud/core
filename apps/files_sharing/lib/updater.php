<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OC\Files\Cache;

use OC\Share\Share;
use OC\Share\ShareManager;
use OCA\Files\Share\FileShareFetcher;
use OC\Files\Filesystem;
use OC\Files\Cache\Updater;

/**
 * Listens to filesystem hooks and share hooks to update ETags and remove deleted shares
 */
class SharedUpdater {

	protected $shareManager;
	protected $fetcher;
	protected $fileItemType;
	protected $folderItemType;

	/**
	 * The constructor
	 * @param \OC\Share\ShareManager $shareManager
	 * @param \OCA\Files\Share\FileShareFetcher $fetcher
	 */
	public function __construct(ShareManager $shareManager, FileShareFetcher $fetcher) {
		$this->shareManager = $shareManager;
		$this->fetcher = $fetcher;
		$this->fileItemType = 'file';
		$this->folderItemType = 'folder';
		\OCP\Util::connectHook('OC_Filesystem', 'post_write', $this, 'onWrite');
		\OCP\Util::connectHook('OC_Filesystem', 'post_rename', $this, 'onRename');
		\OCP\Util::connectHook('OC_Filesystem', 'post_delete', $this, 'onDelete');
		$this->shareManager->listen('\OC\Share', 'postShare', array($this, 'onShare'));
	}

	/**
	 * Correct the parent folders' ETags
	 * @param array $params
	 */
	public function onWrite($params) {
		$this->correctFolders($params['path']);
	}

	/**
	 * Correct the parent folders' ETags
	 * @param array $params
	 */
	public function onRename($params) {
		$this->correctFolders($params['newpath']);
		$this->correctFolders(dirname($params['oldpath']));
	}

	/**
	 * Correct the parent folders' ETags and unshare all shares of the file
	 * @param array $params
	 */
	public function onDelete($params) {
		$this->correctFolders($params['path']);
		$data = Filesystem::getFileInfo($path);
		if (isset($data['fileid']) && isset($data['mimetype'])) {
			$fileId = $data['fileid'];
			if ($data['mimetype'] === 'httpd/unix-directory') {
				$itemType = $this->folderItemType;
			} else {
				$itemType = $this->fileItemType;
			}
			$this->shareManager->unshareItem($itemType, $fileId);
		}
	}

	/**
	 * Correct the parent folders' ETags for all users the specified share was shared with
	 * @param \OC\Share\Share $share
	 */
	public function onShare(Share $share) {
		$itemType = $share->getItemType();
		if ($itemType === $this->fileItemType || $itemType === $this->folderItemType) {
			$eTag = Filesystem::getETag('');
			$uids = $this->fetcher->getUsersSharedWith(array($share));
			foreach ($uids as $uid) {
				$this->fetcher->setUID($uid);
				$this->fetcher->setETag($eTag);
			}
		}
	}

	/**
	* Correct the parent folders' ETags for all users with access to the specified path
	* @param string $path
	*/
	protected function correctFolders($path) {
		$data = Filesystem::getFileInfo($path);
		if (isset($data['fileid'])) {
			$fileId = $data['fileid'];
			$itemOwner = Filesystem::getOwner($path);
			$eTag = Filesystem::getETag('');
			$this->fetcher->setUID(null);
			$uids = $this->fetcher->getUsersSharedWithById($fileId);
			foreach ($uids as $uid) {
				if ($uid !== $itemOwner) {
					$this->fetcher->setUID($uid);
					$this->fetcher->setETag($eTag);
				}
			}
			if ($itemOwner !== \OCP\User::getUser()) {
				// Correct folders of file owner
				Filesystem::init($itemOwner, '/'.$itemOwner.'/files');
				Updater::correctFolder(Filesystem::getPath($fileId), $data['mtime']);
			}
		}
	}

}