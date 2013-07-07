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
use PasswordHash;

/**
 * Controller for shares between a user and the public via a link
 */
class Link extends Common {

	protected $userManager;
	protected $hasher;
	protected $linkTable;

	const TOKEN_LENGTH = 32;

	/**
	 * The constructor
	 * @param string $itemType
	 * @param ShareFactory $shareFactory
	 * @param Manager $userManager
	 * @param PasswordHash $hasher
	 */
	public function __construct($itemType, ShareFactory $shareFactory, Manager $userManager,
		PasswordHash $hasher
	) {
		parent::__construct($itemType, $shareFactory);
		$this->userManager = $userManager;
		$this->hasher = $hasher;
		$this->linksTable = '`*PREFIX*shares_links`';
	}

	public function getId() {
		return 'link';
	}

	public function isValidShare(Share $share) {
		$shareOwner = $share->getShareOwner();
		if (!$this->userManager->userExists($shareOwner)) {
			throw new InvalidShareException('The share owner does not exist');
		}
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_allow_links', 'yes');
		if ($sharingPolicy !== 'yes') {
			throw new InvalidShareException('The admin has disabled sharing via links');
		}
		return true;
	}

	public function share(Share $share) {
		$share = parent::share($share);
		if ($share) {
			$token = \OC_Util::generate_random_bytes(self::TOKEN_LENGTH);
			$password = $this->hashPassword($share->getPassword());
			$sql = 'INSERT INTO '.$this->linksTable.' (`id`, `token`, `password`)'.
				'VALUES (?, ?, ?)';
			\OC_DB::executeAudited($sql, array($share->getId(), $token, $password));
			$share->setToken($token);
			$share->setPassword($password);
			$share->resetUpdatedProperties();
		}
		return $share;
	}

	public function unshare(Share $share) {
		parent::unshare($share);
		$sql = 'DELETE FROM '.$this->linksTable.' WHERE `id` = ?';
		\OC_DB::executeAudited($sql, array($share->getId()));
	}

	/**
	 * Update the share's password for the link in the database
	 * @param Share $share
	 */
	public function setPassword(Share $share) {
		$password = $this->hashPassword($share->getPassword());
		$sql = 'UPDATE '.$this->linksTable.' SET `password` = ?	WHERE `id` = ?';
		\OC_DB::executeAudited($sql, array($password, $share->getId()));
	}

	public function getShares(array $filter, $limit, $offset) {
		if (isset($filter['shareWith'])) {
			// Links are not associated with a person
			return array();
		} else {
			$defaults = array(
				'shareTypeId' => $this->getId(),
				'itemType' => $this->itemType,
			);
			$filter = array_merge($defaults, $filter);
			$where = '';
			$params = array();
			// Build the WHERE clause
			foreach ($filter as $property => $value) {
				$column = Share::propertyToColumn($property);
				if ($property === 'id') {
					$column = $this->table.'.'.$column;
				} else if ($property === 'parentId') {
					$column = $this->parentsTable.'.'.$column;
				} else if ($property === 'token' || $property === 'password') {
					$column = $this->linksTable.'.'.$column;
				}
				$where .= $column.' = ? AND ';
				$params[] = $value;
			}
			$where = rtrim($where, ' AND ');
			$columns = $this->table.'.*';
			// JOIN with the links table
			$joins = 'JOIN '.$this->linksTable.' ON '.
				$this->table.'.`id` = '.$this->linksTable.'.`id`';
			$columns .= ', '.$this->linksTable.'.*';
			if (isset($filter['parentId'])) {
				// LEFT JOIN with the parents table
				$joins .= ' LEFT JOIN '.$this->parentsTable.' ON '.
					$this->table.'.`id` = '.$this->parentsTable.'.`id`';
			}
			if ($this->shareFactory instanceof AdvancedShareFactory) {
				// Add the JOINs for the app
				$joins .= ' '.$this->shareFactory->getJoins();
				$columns .= ', '.$this->shareFactory->getColumns();
			}
			$sql = 'SELECT '.$columns.' FROM '.$this->table.' '.$joins.' WHERE '.$where;
			$query = \OC_DB::prepare($sql, $limit, $offset);
			$result = \OC_DB::executeAudited($query, $params);
			$shares = array();
			while ($row = $result->fetchRow()) {
				$share = $this->shareFactory->mapToShare($row);
				$parentIds = $this->getParentIds($share->getId());
				$share->setParentIds($parentIds);
				$share->resetUpdatedProperties();
				$shares[] = $share;
			}
			return $shares;
		}
	}

	public function clear() {
		parent::clear();
		$sql = 'DELETE '.$this->linksTable.' FROM '.$this->linksTable.' '.
			'LEFT JOIN '.$this->table.' ON '.$this->linksTable.'.`id` = '.$this->table.'.`id` '.
			'WHERE '.$this->table.'.`id` IS NULL';
		\OC_DB::executeAudited($sql);
	}

	public function searchForPotentialShareWiths($pattern, $limit, $offset) {
		// Links are not associated with a person
		return array();
	}

	/**
	 * Hash the link password to store in the database
	 * @param string|null $password
	 * @return string|null
	 */
	protected function hashPassword($password) {
		if (isset($password)) {
			$salt = \OC_Config::getValue('passwordsalt', '');
			$password = $this->hasher->HashPassword($password.$salt);
		}
		return $password;
	}

}