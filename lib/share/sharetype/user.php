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

use OC\Share\Share;
use OC\Share\ShareFactory;
use OC\Share\Exception\InvalidShareException;
use OC\User\Manager;

/**
 * Controller for shares between two users
 */
class User extends Common {

	protected $userManager;

	/**
	 * The constructor
	 * @param string $itemType
	 * @param ShareFactory $shareFactory
	 * @param Manager $userManager
	 */
	public function __construct($itemType, ShareFactory $shareFactory, Manager $userManager) {
		parent::__construct($itemType, $shareFactory);
		$this->userManager = $userManager;
	}

	public function getId() {
		return 'user';
	}

	public function isValidShare(Share $share) {
		$shareOwner = $share->getShareOwner();
		$shareWith = $share->getShareWith();
		if ($shareOwner === $shareWith) {
			throw new InvalidShareException('The share owner is the user shared with');
		}
		if (!$this->userManager->userExists($shareOwner)) {
			throw new InvalidShareException('The share owner does not exist');
		}
		if (!$this->userManager->userExists($shareWith)) {
			throw new InvalidShareException('The user shared with does not exist');
		}
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		if ($sharingPolicy === 'groups_only') {
			$inGroup = array_intersect(\OC_Group::getUserGroups($shareOwner),
				\OC_Group::getUserGroups($shareWith)
			);
			if (empty($inGroup)) {
				throw new InvalidShareException(
					'The share owner is not in any groups of the user shared with as required by'
					.' the groups only sharing policy set by the admin'
				);
			}
		}
		return true;
	}

	public function searchForPotentialShareWiths($pattern, $limit, $offset) {
		return $this->userManager->searchDisplayName($pattern, $limit, $offset);
	}

}