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

namespace OC\Share\ShareType;

use OC\Share\ShareManager;
use OC\Share\Exception\ShareTypeDoesNotExistException;
use OC\User\Manager;

/**
 * Listen to user events that require updating shares
 */
class UserWatcher {

	private $shareManager;

	public function __construct(ShareManager $shareManager, Manager $userManager) {
		$this->shareManager = $shareManager;
		$userManager->listen('\OC\User', 'postDelete', array($this, 'onUserDeleted'));
	}

	public function onUserDeleted(\OC\User\User $user) {
		$uid = $user->getUID();
		$shares = array();
		$filterShareOwner = array(
			'shareOwner' => $uid,
		);
		$filterShareWith = array(
			'shareTypeId' => 'user',
			'shareWith' => $uid,
		);
		$shareBackends = $this->shareManager->getShareBackends();
		foreach ($shareBackends as $shareBackend) {
			$itemType = $shareBackend->getItemType();
			$shareOwnerShares = $this->shareManager->getShares($itemType, $filterShareOwner);
			$shares = array_merge($shares, $shareOwnerShares);
			try {
				$shareWithShares = $this->shareManager->getShares($itemType, $filterShareWith);
				$shares = array_merge($shares, $shareWithShares);
			} catch (ShareTypeDoesNotExistException $exception) {
				// Do nothing
			}
		}
		foreach ($shares as $share) {
			$this->shareManager->unshare($share);
		}
	}
}
