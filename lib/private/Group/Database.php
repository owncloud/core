<?php
/**
 * @author Aaron Wood <aaronjwood@gmail.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OC\Group;
use OCP\IDBConnection;

/**
 * Class for group management in a SQL Database (e.g. MySQL, SQLite)
 */
class Database extends Backend {

	/** @var IDBConnection */
	private $db;

	/** @var string */
	private $tableName;

	protected $possibleActions = [
		self::CREATE_GROUP => 'createGroup',
		self::DELETE_GROUP => 'deleteGroup',
	];

	/**
	 * Database constructor.
	 *
	 * @param IDBConnection $db
	 */
	public function __construct(IDBConnection $db) {
		$this->db = $db;
		$this->tableName = 'groups';
	}

	/**
	 * Try to create a new group. Group name can contain mix of small and big letters.
	 * If the group name already exists, false will be returned.
	 *
	 * @param string $groupName The name of the group to create
	 * @return bool
	 *
	 */
	public function createGroup($groupName) {
		// Add group
		$affected = $this->db->insertIfNotExist( "*PREFIX*$this->tableName", [
			'gid' => $groupName,
		]);

		// If one raw has been changed, it means record has been inserted
		return $affected === 1;
	}

	/**
	 * Delete a group with specific group name
	 *
	 * @param string $groupName group name of the group to delete
	 * @return bool
	 *
	 * Deletes a group and removes it from the group_user-table
	 */
	public function deleteGroup($groupName) {
		// Delete the group
		$qb = $this->db->getQueryBuilder();
		$qb->delete($this->tableName)
			->where($qb->expr()->eq('gid', $qb->createNamedParameter($groupName)))
			->execute();

		return true;
	}

	/**
	 * Get group's group names which match search predicate. If predicate not given,
	 * all groups will be returned
	 *
	 * @param string $search
	 * @param int $limit
	 * @param int $offset
	 * @return array an array of group names
	 */
	public function getGroups($search = '', $limit = null, $offset = null) {
		// Optimize query if pattern is an empty string, and we can retrieve information with faster query
		$emptyPattern = empty($search) ? true : false;

		$qb = $this->db->getQueryBuilder();
		$qb->select('gid')
			->from($this->tableName);
		if(!$emptyPattern) {
			$loweredParameter = '%' . $this->db->escapeLikeParameter(strtolower($search)) . '%';
			$qb->where($qb->expr()->like('gid', $qb->createNamedParameter($loweredParameter)));
		}

		// Order by gid so we can use limit and offset
		$qb->orderBy('gid');

		if ($offset !== null) {
			$qb->setFirstResult($offset);
		}

		if ($limit !== null) {
			$qb->setMaxResults($limit);
		}

		$groups = [];
		$stmt = $qb->execute();
		while ($row = $stmt->fetch()) {
			$groups[] = $row['gid'];
		}
		$stmt->closeCursor();
		return $groups;
	}

	/**
	 * Check if a group with given group name exists
	 *
	 * @param string $groupName
	 * @return bool
	 */
	public function groupExists($groupName) {
		$qb = $this->db->getQueryBuilder();
		$qb->selectAlias($qb->createFunction('1'), 'exists')
			->from($this->tableName)
			->where($qb->expr()->eq('gid', $qb->createNamedParameter($groupName)));

		// Limit to 1, to prevent fetching unnecessary rows
		$qb->setMaxResults(1);

		// First fetch contains exists
		$stmt = $qb->execute();
		$data = $stmt->fetch();
		$stmt->closeCursor();
		return isset($data['exists']);
	}

	/**
	 * Groups and memberships of this backend are maintained by the users
	 */
	public function isSyncMaintained() {
		return false;
	}
}