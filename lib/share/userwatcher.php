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

namespace OC\Share;

use OC\Share\ShareManager;
use OC\User\Manager;
use Oc\User\User;

/**
 * Listen to user events that require updating shares
 */
class UserWatcher {

	private $shareManager;

	public function __construct(ShareManager $shareManager, Manager $userManager) {
		$this->shareManager = $shareManager;
		$userManager->listen('\OC\User', 'postDelete', array($this, 'onUserDeleted'));
	}

	public function onUserDeleted(User $user) {
		$uid = $user->getUID();
		$shares = array();
		$filterShareOwner = array(
			'shareOwner' => $uid,
		);
		$filterShareWith = array(
			'shareTypeId' => 'user',
			'shareWith' => $uid,
		);
		$itemTypes = array_keys($this->shareManager->getShareBackends());
		foreach ($itemTypes as $itemType) {
			$shareOwnerShares = $this->shareManager->getShares($itemType, $filterShareOwner);
			$shareWithShares = $this->shareManager->getShares($itemType, $filterShareWith);
			$shares = array_merge($shares, $shareOwnerShares, $shareWithShares);
		}
		foreach ($shares as $share) {
			$this->shareManager->unshare($share);
		}
	}

}