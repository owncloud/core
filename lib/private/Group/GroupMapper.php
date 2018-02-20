<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

use OC\Group\BackendGroup;
use OCP\AppFramework\Db\Mapper;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\IDBConnection;
use OCP\AppFramework\Db\DoesNotExistException;

class GroupMapper extends Mapper {

	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'backend_groups', BackendGroup::class);
	}

	/**
	 * Return backend group object
	 *
	 * @param string $gid
	 * @return BackendGroup
	 * @throws DoesNotExistException
	 * @throws MultipleObjectsReturnedException
	 */
	public function getGroup($gid) {
		$qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from($this->getTableName())
			->where($qb->expr()->eq('group_id', $qb->createNamedParameter($gid)));

		/** @var BackendGroup $backendGroup */
		$backendGroup = $this->findEntity($qb->getSQL(), $qb->getParameters());
		return $backendGroup;
	}

	/**
	 * @param string $pattern
	 * @param integer $limit
	 * @param integer $offset
	 * @return BackendGroup[]
	 */
	public function search($pattern, $limit, $offset) {
		$qb = $this->db->getQueryBuilder();
		$parameter = '%' . $this->db->escapeLikeParameter($pattern) . '%';
		$qb->select('*')
			->from($this->getTableName())
			->where(
				$qb->expr()->orX(
					$qb->expr()->iLike('display_name', $qb->createNamedParameter($parameter)),
					$qb->expr()->iLike('group_id', $qb->createNamedParameter($parameter))
				))
			->orderBy('display_name');

		return $this->findEntities($qb->getSQL(), $qb->getParameters(), $limit, $offset);
	}

	public function callForAllGroups($callback, $search) {
		$qb = $this->db->getQueryBuilder();
		$qb->select(['*'])
			->from($this->getTableName());

		if ($search) {
			$qb->where($qb->expr()->iLike('group_id',
				$qb->createNamedParameter('%' . $this->db->escapeLikeParameter($search) . '%')));
		}
		$stmt = $qb->execute();
		while ($row = $stmt->fetch()) {
			$return =$callback($this->mapRowToEntity($row));
			if ($return === false) {
				break;
			}
		}

		$stmt->closeCursor();
	}
}