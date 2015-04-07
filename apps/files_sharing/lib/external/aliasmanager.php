<?php

/**
 * ownCloud - Manage unique user-IDs for server-to-server sharing
 *
 * @copyright (C) 2015 ownCloud, Inc.
 *
 * @author Bjoern Schiessle <schiessle@owncloud.com>
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

namespace OCA\Files_Sharing\External;

class AliasManager {

	const DB_TABLE = '`*PREFIX*share_external_aliases`';

	/** @var \OCP\IUserManager */
	protected $userManager;

	/** @var \OC\DB\Connection */
	protected $connection;

	/**
	 * @param \OCP\IUserManager $userManager
	 * @param \OCP\IDBConnection $connection
	 */
	public function __construct(\OCP\IUserManager $userManager, \OCP\IDBConnection $connection) {
		$this->userManager = $userManager;
		$this->connection = $connection;
	}

	/**
	 * change the uid used by the user for server to server sharing
	 *
	 * @param string $alias
	 * @param string $uid
	 * @return boolean
	 */
	public function updateAlias($alias, $uid) {

		if($alias === $uid) {
			$result = $this->remove($uid);
		} else {
			$result = $this->update($alias, $uid);
		}

		return $result;
	}

	/**
	 * check if this alias is already used
	 *
	 * @param string $alias
	 * @return boolean
	 */
	public function aliasExists($alias) {
		$query = $this->connection->createQueryBuilder();
		$query->select('*')
			->from(self::DB_TABLE)
			->where($query->expr()->eq('`alias`', ':alias'))
			->setParameter('alias', $alias);

		$result = $query->execute();

		return count($result->fetchAll()) > 0 ? true : false;

	}

	/**
	 * return alias from the given user
	 *
	 * @param string $uid
	 * @return string|null returns null if no alias is set
	 */
	public function getAlias($uid) {

		$alias = null;

		$query = $this->connection->createQueryBuilder();
		$query->select('`alias`')
			->from(self::DB_TABLE)
			->where($query->expr()->eq('`uid`', ':uid'))
			->setParameter('uid', $uid);
		$result = $query->execute();

		if ($result) {
			$row = $result->fetch();
			$alias = $row['alias'];
		}

		return $alias;
	}

	/**
	 * get uid for a given alias
	 *
	 * @param string $alias
	 * @return string|null if no uid was found
	 */
	public function getUid($alias) {
		$uid = null;

		$query = $this->connection->createQueryBuilder();
		$query->select('`uid`')
			->from(self::DB_TABLE)
			->where($query->expr()->eq('`alias`', ':alias'))
			->setParameter('alias', $alias);
		$result = $query->execute();

		if ($result) {
			$row = $result->fetch();
			$uid = $row['uid'];
		}

		return $uid;
	}

	/**
	 * remove alias for user
	 *
	 * @param string $uid
	 * @return boolean
	 */
	protected function remove($uid) {
		$query = $this->connection->createQueryBuilder();
		$query->delete(self::DB_TABLE)
			->where($query->expr()->eq('`uid`', ':uid'))
			->setParameter('uid', $uid);

		$result = $query->execute();
		return $result;
	}

	/**
	 * update alias
	 *
	 * @param string $alias
	 * @param string $uid
	 * @return boolean
	 */
	protected function update($alias, $uid) {
		if ($this->getAlias($uid) !== null) {
			$query = $this->connection->createQueryBuilder();
			$query->update(self::DB_TABLE)
				->set('`alias`', ':alias')
				->where($query->expr()->eq('`uid`', ':uid'))
				->setParameter('alias', $alias)
				->setParameter('uid', $uid);
			$result = $query->execute();
		} else {
			$query = $this->connection->createQueryBuilder();
			$query->insert(self::DB_TABLE)
				->values(array(
					'`alias`' => $query->expr()->literal($alias),
					'`uid`' => $query->expr()->literal($uid)
					));
			$result = $query->execute();
		}

		return $result === 1 ? true : false;

	}

}
