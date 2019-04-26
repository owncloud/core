<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\User;

use OC\DB\QueryBuilder\Literal;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\Entity;
use OCP\AppFramework\Db\Mapper;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\IConfig;
use OCP\IDBConnection;

class AccountMapper extends Mapper {

	/* @var IConfig */
	protected $config;

	/* @var AccountTermMapper */
	protected $termMapper;

	public function __construct(IConfig $config, IDBConnection $db, AccountTermMapper $termMapper) {
		parent::__construct($db, 'accounts', Account::class);
		$this->config = $config;
		$this->termMapper = $termMapper;
	}

	/**
	 * Delegate to term mapper to avoid needing to inject term mapper
	 * @param $account_id
	 * @param array $terms
	 */
	public function setTermsForAccount($account_id, array $terms) {
		$this->termMapper->setTermsForAccount($account_id, $terms);
	}

	/**
	 * Delegate to term mapper to avoid needing to inject term mapper
	 * @param $account_id
	 * @return AccountTerm[] $terms
	 */
	public function findByAccountId($account_id) {
		return $this->termMapper->findByAccountId($account_id);
	}

	/**
	 * @param Account $entity
	 * @return Entity the saved entity with the set id
	 */
	public function insert(Entity $entity) {
		// run the normal entity insert operation to get an id
		$entity = parent::insert($entity);

		/** @var Account $entity */
		if ($entity->haveTermsChanged()) {
			$this->termMapper->setTermsForAccount($entity->getId(), $entity->getSearchTerms());
		}
		return $entity;
	}

	/**
	 * @param Account $entity
	 * @return Entity the deleted entity
	 */
	public function delete(Entity $entity) {
		// First delete the search terms for this account
		$this->termMapper->deleteTermsForAccount($entity->getId());
		return parent::delete($entity);
	}

	/**
	 * @param Account $entity
	 * @return Entity the updated entity
	 */
	public function update(Entity $entity) {
		if ($entity->haveTermsChanged()) {
			$this->termMapper->setTermsForAccount($entity->getId(), $entity->getSearchTerms());
		}
		// Then run the normal entity insert operation
		return parent::update($entity);
	}

	/**
	 * @param string $email
	 * @return Account[]
	 */
	public function getByEmail($email) {
		if ($email === null || \trim($email) === '') {
			throw new \InvalidArgumentException('$email must be defined');
		}
		$qb = $this->db->getQueryBuilder();
		// RFC 5321 says that only domain name is case insensitive, but in practice
		// it's the whole email
		$qb->select('*')
			->from($this->getTableName())
			->where($qb->expr()->eq($qb->createFunction('LOWER(`email`)'), $qb->createFunction('LOWER(' . $qb->createNamedParameter($email) . ')')));

		return $this->findEntities($qb->getSQL(), $qb->getParameters());
	}

	/**
	 * @param string $uid
	 * @throws DoesNotExistException if the account does not exist
	 * @throws MultipleObjectsReturnedException if more than one account exists
	 * @return Account
	 */
	public function getByUid($uid) {
		$qb = $this->db->getQueryBuilder();
		$qb->select('*')
			->from($this->getTableName())
			->where($qb->expr()->eq('lower_user_id', $qb->createNamedParameter(\strtolower($uid))));

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
	public function find($pattern, $limit = null, $offset = null) {
		$allowMedialSearches = $this->config->getSystemValue('accounts.enable_medial_search', true);
		if ($allowMedialSearches) {
			$parameter = '%' . $this->db->escapeLikeParameter($pattern) . '%';
			$loweredParameter = '%' . $this->db->escapeLikeParameter(\strtolower($pattern)) . '%';
		} else {
			$parameter = $this->db->escapeLikeParameter($pattern) . '%';
			$loweredParameter = $this->db->escapeLikeParameter(\strtolower($pattern)) . '%';
		}

		$qb = $this->db->getQueryBuilder();
		$qb->selectAlias('DISTINCT a.id', 'id')
			->addSelect(['user_id', 'lower_user_id', 'display_name', 'email', 'last_login', 'backend', 'state', 'quota', 'home'])
			->from($this->getTableName(), 'a')
			->leftJoin('a', 'account_terms', 't', $qb->expr()->eq('a.id', 't.account_id'))
			->orderBy('display_name')
			->where($qb->expr()->like('lower_user_id', $qb->createPositionalParameter($loweredParameter)))
			->orWhere($qb->expr()->iLike('display_name', $qb->createPositionalParameter($parameter)))
			->orWhere($qb->expr()->iLike('email', $qb->createPositionalParameter($parameter)))
			->orWhere($qb->expr()->like('t.term', $qb->createPositionalParameter($loweredParameter)));

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

	/**
	 * Get the user count for a specific backend splitted by the different account states
	 * This means that you'll get the number of enabled users in the backend, the number of
	 * disabled users, and so on.
	 * The function returns an array [state => user_count]:
	 * ```
	 * $userCount = getUserCountForBackendGroupByState('myBackend');
	 * $enabledUsersInBackend = $userCount[Account::STATE_ENABLED];
	 * $disabledUsersInBackend = $userCount[Account::STATE_DISABLED];
	 * ```
	 * @param string $backendName the name of the backend to be checked
	 * @return array [state => user_count]
	 */
	public function getUserCountForBackendGroupByState($backendName) {
		$qb = $this->db->getQueryBuilder();
		$qb->select(['state', $qb->createFunction('count(*) as `count`')])
			->from($this->getTableName())
			->where($qb->expr()->eq('backend', $qb->createNamedParameter($backendName)))
			->groupBy('state');

		$result = $qb->execute();
		$data = $result->fetchAll();  // there are only 5 different states at the moment
		$result->closeCursor();

		$returnedValue = [];
		foreach ($data as $row) {
			$returnedValue[$row['state']] = $row['count'];
		}
		return $returnedValue;
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
			$return = $callback($this->mapRowToEntity($row));
			if ($return === false) {
				break;
			}
		}

		$stmt->closeCursor();
	}

	/**
	 * @param string $backend
	 * @param bool $hasLoggedIn
	 * @param integer $limit
	 * @param integer $offset
	 * @return string[]
	 */
	public function findUserIds($backend = null, $hasLoggedIn = null, $limit = null, $offset = null) {
		$qb = $this->db->getQueryBuilder();
		$qb->select('user_id')
			->from($this->getTableName())
			->orderBy('user_id'); // needed for predictable limit & offset

		if ($backend !== null) {
			$qb->andWhere($qb->expr()->eq('backend', $qb->createNamedParameter($backend)));
		}
		if ($hasLoggedIn === true) {
			$qb->andWhere($qb->expr()->gt('last_login', new Literal(0)));
		} elseif ($hasLoggedIn === false) {
			$qb->andWhere($qb->expr()->eq('last_login', new Literal(0)));
		}
		if ($limit !== null) {
			$qb->setMaxResults($limit);
		}
		if ($offset !== null) {
			$qb->setFirstResult($offset);
		}

		$stmt = $qb->execute();
		$rows = $stmt->fetchAll(\PDO::FETCH_COLUMN);
		$stmt->closeCursor();
		return $rows;
	}

	/**
	 * Ensure that there is only $maxUsers users enabled in the backend. If there are more
	 * enabled users than the limit, some of the enabled users will be set as "auto_disabled".
	 * Only the first $maxUsers sorted by id that are enabled will remain enabled after this function
	 * finishes. Note that users in different states, such as "disabled" will be ignored
	 *
	 * The expected query to be executed is as follow:
	 * ```
	 * update
	 *   oc_accounts t1
	 *   inner join
	 *   (
	 *     select * from oc_accounts where backend = 'OCA\\User_LDAP\\User_Proxy' and state = 1 and id > (
	 *       select id from oc_accounts where backend = 'OCA\\User_LDAP\\User_Proxy' and state = 1 order by id limit 50,1
	 *     )
	 *   ) t2
	 *   on (t1.id = t2.id)
	 *   set t1.state = 4;
	 * ```
	 *
	 * Note that the "original" query should be:
	 * ```
	 * update
	 *   oc_accounts
	 *   set state = 4
	 *   where backend = 'OCA\\User_LDAP\\User_Proxy' and id >= (
	 *     select id from oc_accounts
	 *     where backend = 'OCA\\User\\Database' and state = 1
	 *     order by id asc limit 50,1
	 *   );
	 * but MySQL is giving problems: ERROR 1093 (HY000)
	 * ```
	 * @param string $backendName the backend name
	 * @param int $maxUsers the maximum number of enabled users that the backend will have
	 * @return int the number of affected rows by the update operation
	 */
	public function ensureMaximumEnabledUsersForBackend($backendName, $maxUsers) {
		$tableName = $this->getTableName();

		$selectQuery = $this->db->getQueryBuilder();
		$selectQuery->select('id')
			->from($tableName)
			->where($selectQuery->expr()->eq('backend', $selectQuery->createNamedParameter($backendName, IQueryBuilder::PARAM_STR, ':backendName')))
			->andWhere($selectQuery->expr()->eq('state', $selectQuery->createNamedParameter(Account::STATE_ENABLED, IQueryBuilder::PARAM_INT, ':oldState')))
			->orderBy('id')
			->setFirstResult($maxUsers)
			->setMaxResults(1);

		$selectJoinedTable = $this->db->getQueryBuilder();
		$selectJoinedTable->select('*')
			->from($tableName)
			->where($selectJoinedTable->expr()->eq('backend', $selectJoinedTable->createNamedParameter($backendName, IQueryBuilder::PARAM_STR, ':backendName')))
			->andWhere($selectJoinedTable->expr()->eq('state', $selectJoinedTable->createNamedParameter(Account::STATE_ENABLED, IQueryBuilder::PARAM_INT, ':oldState')))
			->andWhere($selectJoinedTable->expr()->gte('id', $selectJoinedTable->createFunction("({$selectQuery->getSQL()})")));

		/*
		 * FIXME
		 * Following query can't be used by the queryBuilder because the table in the innerJoin
		 * can't be a temporary one. We need to workaround that for now.
		 *
		 * $updateQuery = $this->db->getQueryBuilder();
		 * $updateQuery->update($tableName, 't1')
		 * 	->innerJoin('t1', $updateQuery->createFunction($selectJoinedTable->getSQL()), 't2', $updateQuery->expr()->eq('t1.id', 't2.id'))
		 * 	->set('t1.state', Account::STATE_AUTODISABLED);
		 * return $updateQuery->execute();
		*/

		$selectJoinedTableSql = $selectJoinedTable->getSQL();

		$updateQuery = "UPDATE `$tableName` t1 INNER JOIN ($selectJoinedTableSql) t2 ON (t1.`id` = t2.`id`) SET t1.`state` = :newState";

		return $this->db->executeUpdate(
			$updateQuery,
			[
				'backendName' => $backendName,
				'oldState' => Account::STATE_ENABLED,
				'newState' => Account::STATE_AUTODISABLED
			],
			[
				'backendName' => IQueryBuilder::PARAM_STR,
				'oldState' => IQueryBuilder::PARAM_INT,
				'newState' => IQueryBuilder::PARAM_INT
			]
		);
	}

	/**
	 * Enable all the automatically disabled users in the specified backend
	 * @param string $backendName the name of the backend
	 * @return int the affected number of rows
	 */
	public function enableAutoDisabledUsers($backendName) {
		$updateQuery = $this->db->getQueryBuilder();
		$updateQuery->update($this->getTableName())
			->set('state', $updateQuery->createNamedParameter(Account::STATE_ENABLED, IQueryBuilder::PARAM_INT))
			->where($updateQuery->expr()->eq('backend', $updateQuery->createNamedParameter($backendName)))
			->andWhere($updateQuery->expr()->eq('state', $updateQuery->createNamedParameter(Account::STATE_AUTODISABLED, IQueryBuilder::PARAM_INT)));
		return $updateQuery->execute();
	}
}
