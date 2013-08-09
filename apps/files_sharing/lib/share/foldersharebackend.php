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

namespace OCA\Files\Share;

use OC\Share\Share;
use OC\Share\ICollectionShareBackend;
use OC\Share\TimeMachine;

class FolderShareBackend extends FileShareBackend implements ICollectionShareBackend {

	protected $table;

	/**
	 * The constructor
	 * @param \OC\Share\TimeMachine $timeMachine The time() mock
	 * @param \OC\Share\ShareType\IShareType[] $shareTypes An array of share type objects that
	 * items can be shared through e.g. User, Group, Link
	 */
	public function __construct(TimeMachine $timeMachine, array $shareTypes) {
		parent::__construct($timeMachine, $shareTypes);
		$this->table = '`*PREFIX*filecache`';
	}

	/**
	 * Get the identifier for the item type this backend handles, should be a singular noun
	 * @return string
	 */
	public function getItemType() {
		return 'folder';
	}

	/**
	 * Get the plural form of getItemType, used for the RESTful API
	 * @return string
	 */
	public function getItemTypePlural() {
		return 'folders';
	}

	/**
	 * Get the identifiers for the children item types of this backend
	 * @return array
	 */
	public function getChildrenItemTypes() {
		// Include 'folder' in the return because folders can be inside folders
		return array('file', 'folder');
	}

	/**
	 * Search for shares of this collection item type that contain the child item source and
	 * shared with the share owner
	 * @param \OC\Share\Share $share
	 * @return \OC\Share\Share[]
	 */
	public function searchForParentCollections(Share $share) {
		$parents = array();
		$filter = array(
			'shareWith' => $share->getShareOwner(),
			'isShareWithUser' => true,
		);
		// Loop through parent folders and check if they are shared
		$fileId = $share->getItemSource();
		while ($fileId !== -1) {
			$fileId = $this->getParentFolderId($fileId);
			$filter['itemSource'] = $fileId;
			$parents = array_merge($parents, $this->getShares($filter));
		}
		return $parents;
	}

	/**
	 * Get the file id of the parent folder for the specified file id
	 * @param int $fileId
	 * @return int
	 */
	public function getParentFolderId($fileId) {
		$sql = 'SELECT `parent` FROM '.$this->table.' WHERE `fileid` = ?';
		$result = \OC_DB::executeAudited($sql, array($fileId));
		$id = $result->fetchOne();
		if ($id !== false) {
			return (int)$id;
		}
		return -1;
	}

}