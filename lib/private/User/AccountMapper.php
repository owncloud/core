<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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


namespace OC\User;


use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

class AccountMapper extends Mapper {

	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'accounts', Account::class);
	}

	/**
	 * @param string $email
	 * @return Account[]
	 */
	public function getByEmail($email) {
		$qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from($this->getTableName())
			->where($qb->expr()->eq('email', $qb->createNamedParameter($email)));

		return $this->findEntities($qb->getSQL(), $qb->getParameters());
	}

	/**
	 * @param string $uid
	 * @return Account
	 */
	public function getByUid($uid) {
		$qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from($this->getTableName())
			->where($qb->expr()->eq('lower_user_id', $qb->createNamedParameter(strtolower($uid))));

		return $this->findEntity($qb->getSQL(), $qb->getParameters());
	}

	/**
	 * @param string $fieldName
	 * @param string $pattern
	 * @param integer $limit
	 * @param integer $offset
	 * @return Account[]
	 */
	public function search($fieldName, $pattern, $limit, $offset) {
		$qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from($this->getTableName())
			->where($qb->expr()->iLike($fieldName, $qb->createNamedParameter('%' . $this->db->escapeLikeParameter($pattern) . '%')))
			->orderBy($fieldName);

		return $this->findEntities($qb->getSQL(), $qb->getParameters(), $limit, $offset);
	}

	public function getUserCountPerBackend($hasLoggedIn) {
		$qb = $this->db->getQueryBuilder();
		$qb->select(['backend', $qb->createFunction('count(*) as `count`')])
			->from($this->getTableName())
			->groupBy('backend');

		if ($hasLoggedIn) {
			$qb->where($qb->expr()->isNotNull('last_login'));
		}

		$result = $qb->execute();
		$data = $result->fetchAll();
		$result->closeCursor();

		$return = [];
		foreach ($data as $d) {
			$return[$d['backend']] = $d['count'];
		}

		return $return;
	}

	public function getUserCount($hasLoggedIn) {
		$qb = $this->db->getQueryBuilder();
		$qb->select([$qb->createFunction('count(*) as `count`')])
			->from($this->getTableName());

		if ($hasLoggedIn) {
			$qb->where($qb->expr()->isNotNull('last_login'));
		}

		$result = $qb->execute();
		$data = $result->fetch();
		$result->closeCursor();

		return (int) $data['count'];
	}

	public function callForAllUsers($callback, $search, $onlySeen) {
		$qb = $this->db->getQueryBuilder();
		$qb->select(['*'])
			->from($this->getTableName());

		if ($search) {
			$qb->where($qb->expr()->iLike('user_id',
				$qb->createNamedParameter('%' . $this->db->escapeLikeParameter($search) . '%')));
		}
		if ($onlySeen) {
			$qb->where($qb->expr()->isNotNull('last_login'));
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
