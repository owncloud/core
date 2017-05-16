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


use OC\DB\QueryBuilder\Literal;
use OCP\AppFramework\Db\Entity;
use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

class AccountMapper extends Mapper {

	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'accounts', Account::class);
	}

	/**
	 * @param Account $entity
	 */
	public function insert(Entity $entity) {
		if($entity->haveTermsChanged()) {
			$this->setTermsForAccount($entity->getId(), $entity->getSearchTerms());
		}
		// Then run the normal entity insert operation
		parent::insert($entity);
	}

	/**
	 * @param Account $entity
	 */
	public function delete(Entity $entity) {
		// First delete the search terms for this account
		$this->deleteTermsForAccount($entity->getId());
		parent::delete($entity);
	}

	/**
	 * @param Account $entity
	 */
	public function update(Entity $entity) {
		if($entity->haveTermsChanged()) {
			$this->setTermsForAccount($entity->getId(), $entity->getSearchTerms());
		}
		// Then run the normal entity insert operation
		parent::update($entity);
	}

	/**
	 * @param string $email
	 * @return Account[]
	 */
	public function getByEmail($email) {
		if ($email === null || trim($email) === '') {
			throw new \InvalidArgumentException('$email must be defined');
		}
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

	/**
	 * @param string $pattern
	 * @param integer $limit
	 * @param integer $offset
	 * @return Account[]
	 */
	public function find($pattern, $limit, $offset) {
		$qb = $this->db->getQueryBuilder();
		$lowerPattern = strtolower($pattern);
		$qb->select(['user_id', 'lower_user_id', 'display_name', 'email', 'last_login', 'backend', 'state', 'quota', 'home'])
			->selectAlias('a.id', 'id')
			->from($this->getTableName(), 'a')
			->join('a', 'account_terms', 't', $qb->expr()->eq('a.id', 't.account_id'))
			->where($qb->expr()->Like('user_id', $qb->createNamedParameter('%' . $this->db->escapeLikeParameter($lowerPattern) . '%')))
			->orWhere($qb->expr()->iLike('display_name', $qb->createNamedParameter('%' . $this->db->escapeLikeParameter($pattern) . '%')))
			->orWhere($qb->expr()->iLike('email', $qb->createNamedParameter('%' . $this->db->escapeLikeParameter($pattern) . '%')))
			->orWhere($qb->expr()->like('t.term', $qb->createNamedParameter('%' . $this->db->escapeLikeParameter($lowerPattern) . '%')))
			->orderBy('display_name');

		return $this->findEntities($qb->getSQL(), $qb->getParameters(), $limit, $offset);
	}

	public function getUserCountPerBackend($hasLoggedIn) {
		$qb = $this->db->getQueryBuilder();
		$qb->select(['backend', $qb->createFunction('count(*) as `count`')])
			->from($this->getTableName())
			->groupBy('backend');

		if ($hasLoggedIn) {
			$qb->where($qb->expr()->gt('last_login', new Literal(0)));
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
			$qb->where($qb->expr()->gt('last_login', new Literal(0)));
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
			$qb->where($qb->expr()->gt('last_login', new Literal(0)));
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
