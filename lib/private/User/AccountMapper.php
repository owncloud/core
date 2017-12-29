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


use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use OC\DB\QueryBuilder\Literal;
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
	 * @throws UniqueConstraintViolationException
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
		if ($email === null || trim($email) === '') {
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
	 * @throws DoesNotExistException
	 * @throws MultipleObjectsReturnedException
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
	public function find($pattern, $limit = null, $offset = null) {

		$allowMedialSearches = $this->config->getSystemValue('accounts.enable_medial_search', true);
		if ($allowMedialSearches) {
			$parameter = '%' . $this->db->escapeLikeParameter($pattern) . '%';
			$loweredParameter = '%' . $this->db->escapeLikeParameter(strtolower($pattern)) . '%';
		} else {
			$parameter = $this->db->escapeLikeParameter($pattern) . '%';
			$loweredParameter = $this->db->escapeLikeParameter(strtolower($pattern)) . '%';
		}

		$qb = $this->db->getQueryBuilder();
		$qb->selectAlias('DISTINCT a.id', 'id')
			->addSelect(['user_id', 'lower_user_id', 'display_name', 'email', 'last_login', 'backend', 'state', 'quota', 'home'])
			->from($this->getTableName(), 'a')
			->leftJoin('a', 'account_terms', 't', $qb->expr()->eq('a.id', 't.account_id'))
			->orderBy('display_name')
			->where($qb->expr()->like('lower_user_id', $qb->createNamedParameter($loweredParameter)))
			->orWhere($qb->expr()->iLike('display_name', $qb->createNamedParameter($parameter)))
			->orWhere($qb->expr()->iLike('email', $qb->createNamedParameter($parameter)))
			->orWhere($qb->expr()->like('t.term', $qb->createNamedParameter($loweredParameter)));

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
