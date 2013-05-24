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

namespace OC\Share\Type;

class Link extends Common {

	protected $linkTable;
	private const TOKEN_LENGTH = 32;

	public function __construct($itemType, IShareFactory $shareFactory) {
		parent::__construct($itemType, $shareFactory);
		$this->linkTable = '*PREFIX*links';
	}

	public function getId() {
		return 'link';
	}

	public function getShares($shareWith, $uidOwner, $isShareWithUser, $extraFilter) {
		if (isset($shareWith)) {
			// Links are not associated with a person
			return array();
		} else {
			list($where, $params) = $this->getDefaultFilter($shareWith, $uidOwner);
			if (isset($extraFilter)) {
				list($extraWhere, $extraParams) = $extraFilter;
				$where .= ' '.ltrim($extraWhere);
				$params += $extraParams;
			}
			// Select all columns in the share table
			$columns = '`'.$this->table.'`.*';
			// JOIN with the links table
			$joins = 'JOIN `'.$this->linkTable.'` ON `';
			$joins .= '`'.$this->table.'`.`id` = ';
			$joins .= '`'.$this->linkTable.'`.`id`';
			// Select all columns in the link table
			$columns .= ', `'.$this->linkTable.'`.*';
			list($appColumns, $appJoins) = $this->getAppJoins();
			$columns .= $appColumns;
			$joins .= ' '.$appJoins;
			$sql = 'SELECT '.$columns.' FROM `'.$this->table.'` '.$joins.' WHERE '.$where;
			$query = \OC_DB::prepare($sql);
			$result = $query->execute(array($params));
			$shares = array();
			while ($row = $result->fetchRow()) {
				$shares[] = $this->shareFactory->mapToShare($row);
			}
			return $shares;
		}
	}

	public function isValidShare(Share $share) {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_allow_links', 'yes');
		if ($sharingPolicy !== 'yes') {
			throw new \InvalidShareException('Sharing with links is not allowed');
		// Share permission for links doesn't make sense
		} else if ($share->getPermissions() & OCP\PERMISSION_SHARE) {
			throw new \Exception();
		} else {
			return true;
		}
	}

	public function share(Share $share) {
		$share = parent::share($share);
		if ($share) {
			// Create a token for a link
			$token = \OC_Util::generate_random_bytes(self::TOKEN_LENGTH);
			// Store the id, token, password in the database
			$query = \OC_DB::prepare('INSERT INTO `'.$this->linkTable.'`
				(`id`, `token`, `password`) VALUES (?, ?, ?)'
			);
			$query->execute(array($share->getId(), $token, $share->getPassword()));
			$share->setToken($token);
			return $share;
		} else {
			return false;
		}
	}

	public function unshare(Share $share) {
		parent::unshare($share);
		$query = \OC_DB::prepare('DELETE FROM `'.$this->linkTable.'` WHERE `id` = ?');
		$query->execute(array($share->getId()));
	}

	public function setPermissions(Share $share) {
		// Share permission for links doesn't make sense
		if ($share->getPermissions() & OCP\PERMISSION_SHARE) {
			throw new \Exception();
		} else {
			parent::setPermissions($share);
		}
	}

	/**
	 * Update the share's password for the link in the database
	 * @param Share $share
	 */
	public function setPassword(Share $share) {
		$query = \OC_DB::prepare('UPDATE `'.$this->linkTable.'` SET `password` = ?
			WHERE `id` = ?'
		);
		$query->execute(array($share->getPassword(), $share->getId()));
	}

	public function searchForShareWiths($pattern) {
		return array();
	}

}