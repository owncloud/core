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

namespace OC;

use OC\Group\BackendGroup;
use OC\User\Account;
use OCP\AppFramework\Db\Entity;
use OCP\IConfig;
use OCP\IDBConnection;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use OCP\DB\QueryBuilder\IQueryBuilder;

class MembershipManager {

	/**
	 * types of memberships in the group
	 */
	const MAINTENANCE_TYPE_MANUAL = 0;
	const MAINTENANCE_TYPE_SYNC = 1;

	/**
	 * types of memberships in the group
	 */
	const MEMBERSHIP_TYPE_GROUP_USER = 0;
	const MEMBERSHIP_TYPE_GROUP_ADMIN = 1;

	/** @var IConfig */
	protected $config;

	/** @var IDBConnection */
	private $db;

	/**
	 * MembershipManager class is responsible for mapping and handling
	 * user/group memberships
	 *
	 * @param IDBConnection $db
	 * @param IConfig $config
	 */
	public function __construct(IDBConnection $db, IConfig $config) {
		$this->db = $db;
		$this->config = $config;
	}

	/**
	 * Return backend group entities for given account (identified by user's uid)
	 *
	 * @param string $userId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return BackendGroup[]
	 */
	public function getMemberBackendGroups($userId, $membershipType) {
		return $this->getBackendGroupsSqlQuery($userId, false, $membershipType);
	}

	/**
	 * Return backend group entities for given account (identified by user's internal account id)
	 *
	 * NOTE: Search by internal id is used to optimize access when
	 * group backend/account has already been instantiated and internal id is explicitly available
	 *
	 * @param int $accountId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return BackendGroup[]
	 */
	public function getMemberBackendGroupsById($accountId, $membershipType) {
		return $this->getBackendGroupsSqlQuery($accountId, true, $membershipType);
	}

	/**
	 * Return user account entities for given group (identified with gid). If group predicate not specified,
	 * it will return all users which are group members of specified type
	 *
	 * @param string|null $gid
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return Account[]
	 */
	public function getGroupMemberAccounts($gid, $membershipType) {
		return $this->getAccountsSqlQuery($gid, false, $membershipType, null);
	}

	/**
	 * Return user account entities for given group (identified with group's internal backend group id)
	 * and membership type
	 *
	 * @param int $backendGroupId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return Account[]
	 */
	public function getGroupMemberAccountsById($backendGroupId, $membershipType) {
		return $this->getAccountsSqlQuery($backendGroupId, true, $membershipType, null);
	}

	/**
	 * Return user account entities for given group (identified with gid)
	 * of specified membership and maintenance type
	 *
	 * @param string $gid
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @param int $maintenanceType - defines how membership is maintained (0 - MANUAL, 1 - SYNC)
	 *
	 * @return Account[]
	 */
	public function getGroupMembershipsByType($gid, $membershipType, $maintenanceType) {
		return $this->getAccountsSqlQuery($gid, false, $membershipType, $maintenanceType);
	}

	/**
	 * Check whether given user (identified by user's uid) is member of
	 * the group (identified with group's gid) of specified membership type. If group predicate not specified,
	 * it will check if user is group member of any group
	 *
	 * @param string $userId
	 * @param string|null $gid
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return boolean
	 */
	public function isGroupMember($userId, $gid, $membershipType) {
		return $this->isGroupMemberSqlQuery($userId, $gid, $membershipType, false);
	}

	/**
	 * Check whether given account (identified by user's internal account id) is user of
	 * the group (identified with group's internal backend group id)
	 *
	 * NOTE: Search by internal id is used to optimize access when
	 * group backend/account has already been instantiated and internal id is explicitly available
	 *
	 * @param int $accountId
	 * @param int $backendGroupId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return boolean
	 */
	public function isGroupMemberById($accountId, $backendGroupId, $membershipType) {
		return $this->isGroupMemberSqlQuery($accountId, $backendGroupId, $membershipType, true);
	}

	/**
	 * Search for members which match the pattern and
	 * are users in the group (identified with gid)
	 *
	 * @param string $gid
	 * @param string $pattern
	 * @param integer $limit
	 * @param integer $offset
	 * @return Account[]
	 */
	public function find($gid, $pattern, $limit = null, $offset = null) {
		return $this->searchAccountsSqlQuery($gid, false, $pattern, $limit, $offset);
	}

	/**
	 * Search for members which match the pattern and
	 * are users in the backend group (identified with internal backend group id)
	 *
	 * NOTE: Search by internal id instead of gid is used to optimize access when
	 * group backend has already been instantiated and $backendGroupId is explicitly available
	 *
	 * @param int $backendGroupId
	 * @param string $pattern
	 * @param integer $limit
	 * @param integer $offset
	 * @return Account[]
	 */
	public function findById($backendGroupId, $pattern, $limit = null, $offset = null) {
		return $this->searchAccountsSqlQuery($backendGroupId, true, $pattern, $limit, $offset);
	}

	/**
	 * Count members which match the pattern and
	 * are users in the group (identified with gid)
	 *
	 * @param string $gid
	 * @param string $pattern
	 *
	 * @return int
	 */
	public function count($gid, $pattern) {
		return $this->countSqlQuery($gid, false, $pattern);
	}

	/**
	 * Add a group account (identified by user's internal account id)
	 * to group (identified by group's internal backend group id).
	 *
	 * @param int $accountId - internal id of an account
	 * @param int $backendGroupId - internal id of backend group
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @param int $maintenanceType - defines how membership is maintained (0 - MANUAL, 1 - SYNC)
	 *
	 * @throws UniqueConstraintViolationException
	 * @return bool
	 */
	public function addMembership($accountId, $backendGroupId, $membershipType, $maintenanceType) {
		return $this->addGroupMemberSqlQuery($accountId, $backendGroupId, $membershipType, $maintenanceType);
	}

	/**
	 * Remove membership for user (identified by user's internal account id)
	 * from group (identified by group's internal backend group id).
	 *
	 * @param int $accountId - internal id of an account
	 * @param int $backendGroupId - internal id of backend group
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @return bool
	 */
	public function removeMembership($accountId, $backendGroupId, $membershipType) {
		return $this->removeGroupMembershipsSqlQuery($backendGroupId, $accountId, [$membershipType]);
	}

	/**
	 * Remove group memberships for user (identified by user's internal account id),
	 * regardless of the role in the group.
	 *
	 * @param int $accountId - internal id of an account
	 * @return bool
	 */
	public function removeMemberships($accountId) {
		return $this->removeGroupMembershipsSqlQuery(null, $accountId, [self::MEMBERSHIP_TYPE_GROUP_USER, self::MEMBERSHIP_TYPE_GROUP_ADMIN]);
	}

	/**
	 * Remove group memberships from group (identified by group's internal backend group id),
	 * regardless of the role in the group.
	 *
	 * @param int $backendGroupId - internal id of backend group
	 * @return bool
	 */
	public function removeGroupMembers($backendGroupId) {
		return $this->removeGroupMembershipsSqlQuery($backendGroupId, null, [self::MEMBERSHIP_TYPE_GROUP_USER, self::MEMBERSHIP_TYPE_GROUP_ADMIN]);
	}

	/**
	 * Check if the given user is member of the group with specific membership type
	 *
	 * @param string|int $userId
	 * @param string|int|null $groupId
	 * @param string $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @param bool $useInternalIds
	 *
	 * @return boolean
	 */
	private function isGroupMemberSqlQuery($userId, $groupId, $membershipType, $useInternalIds) {
		$qb = $this->db->getQueryBuilder();
		$qb->selectAlias($qb->createFunction('1'), 'exists')
			->from('memberships', 'm');

		if (!is_null($groupId)) {
			if ($useInternalIds) {
				$qb = $this->applyInternalPredicates($qb, $groupId, $userId, true);
			} else {
				$qb = $this->applyPredicates($qb, $groupId, $userId);
			}
		}

		// Place predicate on membership_type
		$qb->andWhere($qb->expr()->eq('m.membership_type', $qb->createNamedParameter($membershipType)));

		// Limit to 1, to prevent fetching unnecessary rows
		$qb->setMaxResults(1);

		return $this->getExistsQuery($qb);
	}


	/**
	 * Add user to the group with specific membership type $membershipType.
	 *
	 * @param int $accountId - internal id of an account
	 * @param int $backendGroupId - internal id of backend group
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @param int $maintenanceType - defines how membership is maintained (0 - MANUAL, 1 - SYNC)
	 *
	 * Return will indicate if row has been inserted
	 *
	 * @throws UniqueConstraintViolationException
	 * @return boolean
	 */
	private function addGroupMemberSqlQuery($accountId, $backendGroupId, $membershipType, $maintenanceType) {
		$qb = $this->db->getQueryBuilder();

		$qb->insert('memberships')
			->values([
				'backend_group_id' => $qb->createNamedParameter($backendGroupId),
				'account_id' => $qb->createNamedParameter($accountId),
				'membership_type' => $qb->createNamedParameter($membershipType),
				'maintenance_type' => $qb->createNamedParameter($maintenanceType),
			]);

		return $this->getAffectedQuery($qb);
	}

	/*
	 * Removes users from the groups. If the predicate on a user or group is null, then it will apply
	 * removal to all the entries of that type.
	 *
	 * NOTE: This function requires to use internal IDs, since we cannot
	 * use JOIN with DELETE (some databases don't support it). We also cannot use aliases
	 * since MySQL has specific syntax for them in DELETE
	 *
	 * Return will indicate if row has been removed
	 *
	 * @param int|null $accountId - internal id of an account
	 * @param int|null $backendGroupId - internal id of backend group
	 * @param int[] $membershipTypeArray - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return boolean
	 */
	private function removeGroupMembershipsSqlQuery($backendGroupId, $accountId, $membershipTypeArray) {
		$qb = $this->db->getQueryBuilder();
		$qb->delete('memberships');

		if (!is_null($backendGroupId) && !is_null($accountId)) {
			// Both backend_group_id and account_id predicates are specified
			$qb = $this->applyInternalPredicates($qb, $backendGroupId, $accountId, false);
		} else if (!is_null($backendGroupId)) {
			// Group predicate backend_group_id specified
			$qb = $this->applyBackendGroupIdPredicate($qb, $backendGroupId, false);
		} else if (!is_null($accountId)) {
			// User predicate account_id specified
			$qb = $this->applyAccountIdPredicate($qb, $accountId, false);
		} else {
			return false;
		}

		$qb->andWhere($qb->expr()->in('membership_type',
			$qb->createNamedParameter($membershipTypeArray, IQueryBuilder::PARAM_INT_ARRAY)));

		return $this->getAffectedQuery($qb);
	}

	/*
	 * Return backend group entities for given user
	 * (identified by account id if $isAccountId is true, or uid if $isAccountId is false)
	 * of which the user has specific membership type
	 *
	 * @param string|int $userId
	 * @param bool $isAccountId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return BackendGroup[]
	 */
	private function getBackendGroupsSqlQuery($userId, $isAccountId, $membershipType) {
		$qb = $this->db->getQueryBuilder();
		$qb->select(['g.id', 'g.group_id', 'g.display_name', 'g.backend'])
			->from('memberships', 'm')
			->innerJoin('m', 'backend_groups', 'g', $qb->expr()->eq('g.id', 'm.backend_group_id'));

		// Adjust the query depending on availability of accountId
		// to have optimized access
		if ($isAccountId) {
			$qb = $this->applyAccountIdPredicate($qb, $userId, true);
		} else {
			$qb = $this->applyUserIdPredicate($qb, $userId);
		}

		// Place predicate on membership_type
		$qb->andWhere($qb->expr()->eq('m.membership_type', $qb->createNamedParameter($membershipType)));

		return $this->getBackendGroupsQuery($qb);
	}

	/**
	 * Return account entities for given group
	 * (identified by backend group id if $isBackendGroupId is true, or gid if $isBackendGroupId is false)
	 * of which the accounts have specific membership type. If group id is not specified, it will
	 * return result for all groups.
	 *
	 * @param string|int|null $groupId
	 * @param bool $isBackendGroupId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @param int|null $maintenanceType - defines how membership is maintained (0 - MANUAL, 1 - SYNC)
	 * @return Account[]
	 */
	private function getAccountsSqlQuery($groupId, $isBackendGroupId, $membershipType, $maintenanceType) {
		$qb = $this->db->getQueryBuilder();
		$qb->select(['a.id', 'a.user_id', 'a.lower_user_id', 'a.display_name', 'a.email', 'a.last_login', 'a.backend', 'a.state', 'a.quota', 'a.home'])
			->from('memberships', 'm')
			->innerJoin('m', 'accounts', 'a', $qb->expr()->eq('a.id', 'm.account_id'));

		if (!is_null($groupId)) {
			// Adjust the query depending on availability of group id
			// to have optimized access
			if ($isBackendGroupId) {
				$qb = $this->applyBackendGroupIdPredicate($qb, $groupId, true);
			} else {
				$qb = $this->applyGidPredicate($qb, $groupId);
			}
		}

		// Place predicate on membership_type
		$qb->andWhere($qb->expr()->eq('m.membership_type', $qb->createNamedParameter($membershipType)));

		if (!is_null($maintenanceType)) {
			// Place predicate on maintenance_type
			$qb->andWhere($qb->expr()->eq('m.maintenance_type', $qb->createNamedParameter($maintenanceType)));
		}

		return $this->getAccountsQuery($qb);
	}

	/**
	 * Search for members which match the pattern and
	 * are users in the group (identified by backend group id
	 * if $isBackendGroupId is true, or gid if $isBackendGroupId is false)
	 *
	 * @param string|int $groupId
	 * @param bool $isBackendGroupId
	 * @param string $pattern
	 * @param integer $limit
	 * @param integer $offset
	 *
	 * @return Account[]
	 */
	private function searchAccountsSqlQuery($groupId, $isBackendGroupId, $pattern, $limit = null, $offset = null) {
		$qb = $this->db->getQueryBuilder();
		$qb->selectAlias('DISTINCT a.id', 'id')
			->addSelect(['a.user_id', 'a.lower_user_id', 'a.display_name', 'a.email', 'a.last_login', 'a.backend', 'a.state', 'a.quota', 'a.home']);

		$qb = $this->searchMembersSqlQuery($qb, $groupId, $isBackendGroupId, $pattern);

		// Order by display_name so we can use limit and offset
		$qb->orderBy('a.display_name');

		if (!is_null($offset)) {
			$qb->setFirstResult($offset);
		}

		if (!is_null($limit)) {
			$qb->setMaxResults($limit);
		}

		return $this->getAccountsQuery($qb);
	}

	/**
	 * Count members which match the pattern and
	 * are users in the group (identified by backend group id
	 * if $isBackendGroupId is true, or gid if $isBackendGroupId is false)
	 *
	 * @param string|int $groupId
	 * @param bool $isBackendGroupId
	 * @param string $pattern
	 * @return int
	 */
	private function countSqlQuery($groupId, $isBackendGroupId, $pattern) {
		$qb = $this->db->getQueryBuilder();

		// We need to use distinct since otherwise we will get duplicated rows for each search term
		// Due to the fact that we use createFunction(), predicate on column has to be surrounded with `` e.g. a.`id`
		$qb->selectAlias($qb->createFunction('COUNT(DISTINCT a.`id`)'), 'count');

		$qb = $this->searchMembersSqlQuery($qb, $groupId, $isBackendGroupId, $pattern);

 		return $this->getCountQuery($qb);
	}

	/**
	 * Search for members which match the pattern and
	 * are users in the group (identified by backend group id
	 * if $isBackendGroupId is true, or gid if $isBackendGroupId is false)
	 *
	 * @param IQueryBuilder $qb
	 * @param string|int $groupId
	 * @param bool $isBackendGroupId
	 * @param string $pattern
	 *
	 * @return IQueryBuilder
	 */
	private function searchMembersSqlQuery(IQueryBuilder $qb, $groupId, $isBackendGroupId, $pattern) {
		// Optimize query if pattern is an empty string, and we can retrieve information with faster query
		$emptyPattern = empty($pattern) ? true : false;

		$qb->from('accounts', 'a')
			->innerJoin('a', 'memberships', 'm', $qb->expr()->eq('a.id', 'm.account_id'));

		if (!$emptyPattern) {
			$qb->leftJoin('a', 'account_terms', 't', $qb->expr()->eq('a.id', 't.account_id'));
		}

		// Adjust the query depending on availability of group id
		// to have optimized access
		if ($isBackendGroupId) {
			$qb = $this->applyBackendGroupIdPredicate($qb, $groupId, true);
		} else {
			$qb = $this->applyGidPredicate($qb, $groupId);
		}

		if (!$emptyPattern) {
			// Non empty pattern means that we need to set predicates on parameters
			// and just fetch all users
			$allowMedialSearches = $this->config->getSystemValue('accounts.enable_medial_search', true);
			if ($allowMedialSearches) {
				$parameter = '%' . $this->db->escapeLikeParameter($pattern) . '%';
				$loweredParameter = '%' . $this->db->escapeLikeParameter(strtolower($pattern)) . '%';
			} else {
				$parameter = $this->db->escapeLikeParameter($pattern) . '%';
				$loweredParameter = $this->db->escapeLikeParameter(strtolower($pattern)) . '%';
			}

			$qb->andWhere(
				$qb->expr()->orX(
					$qb->expr()->like('a.lower_user_id', $qb->createNamedParameter($loweredParameter)),
					$qb->expr()->iLike('a.display_name', $qb->createNamedParameter($parameter)),
					$qb->expr()->iLike('a.email', $qb->createNamedParameter($parameter)),
					$qb->expr()->like('t.term', $qb->createNamedParameter($loweredParameter))
				)
			);
		}

		// Place predicate on membership_type
		$qb->andWhere($qb->expr()->eq('m.membership_type', $qb->createNamedParameter(self::MEMBERSHIP_TYPE_GROUP_USER)));

		return $qb;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @return int
	 */
	private function getAffectedQuery(IQueryBuilder $qb) {
		// If affected is equal or more then 1, it means operation was successful
		$affected = $qb->execute();
		return $affected > 0;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @return bool
	 */
	private function getExistsQuery(IQueryBuilder $qb) {
		// First fetch contains exists
		$stmt = $qb->execute();
		$data = $stmt->fetch();
		$stmt->closeCursor();
		return isset($data['exists']);
	}

	/**
	 * @param IQueryBuilder $qb
	 * @return int
	 */
	private function getCountQuery(IQueryBuilder $qb) {
		// First fetch contains count
		$stmt = $qb->execute();
		$data = $stmt->fetch();
		$stmt->closeCursor();
		return intval($data['count']);
	}

	/**
	 * @param IQueryBuilder $qb
	 * @return Account[]
	 */
	private function getAccountsQuery(IQueryBuilder $qb) {
		$stmt = $qb->execute();
		$accounts = [];
		while($attributes = $stmt->fetch()){
			// Map attributes in array to Account
			// Attributes are explicitly specified by SELECT statement
			$account = new Account();
			$account->setId($attributes['id']);
			$account->setUserId($attributes['user_id']);
			$account->setDisplayName($attributes['display_name']);
			$account->setBackend($attributes['backend']);
			$account->setEmail($attributes['email']);
			$account->setQuota($attributes['quota']);
			$account->setHome($attributes['home']);
			$account->setState($attributes['state']);
			$account->setLastLogin($attributes['last_login']);
			$accounts[] = $account;
		}

		$stmt->closeCursor();
		return $accounts;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @return BackendGroup[]
	 */
	private function getBackendGroupsQuery(IQueryBuilder $qb) {
		$stmt = $qb->execute();
		$groups = [];
		while($attributes = $stmt->fetch()){
			// Map attributes in array to BackendGroup
			// Attributes are explicitly specified by SELECT statement
			$group = new BackendGroup();
			$group->setId($attributes['id']);
			$group->setGroupId($attributes['group_id']);
			$group->setDisplayName($attributes['display_name']);
			$group->setBackend($attributes['backend']);
			$groups[] = $group;
		}

		$stmt->closeCursor();
		return $groups;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param string $gid
	 * @param string $userId
	 * @return IQueryBuilder
	 */
	private function applyPredicates(IQueryBuilder $qb, $gid, $userId) {
		// We need to join with accounts table, since we miss information on accountId
		// We need to join with backend group table, since we miss information on backendGroupId
		$qb->innerJoin('m', 'accounts',
			'a', $qb->expr()->eq('a.id', 'm.account_id'));
		$qb->innerJoin('m', 'backend_groups',
			'g', $qb->expr()->eq('g.id', 'm.backend_group_id'));

		// Apply predicate on user_id in accounts table
		$qb->where($qb->expr()->eq('a.user_id', $qb->createNamedParameter($userId)));

		// Apply predicate on group_id in backend groups table
		$qb->andWhere($qb->expr()->eq('g.group_id', $qb->createNamedParameter($gid)));
		return $qb;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param int $backendGroupId
	 * @param int $accountId
	 * @param bool $useAlias
	 * @return IQueryBuilder
	 */
	private function applyInternalPredicates(IQueryBuilder $qb, $backendGroupId, $accountId, $useAlias) {
		$backendGroupColumn = $useAlias ? 'm.backend_group_id' : 'backend_group_id';
		$accountColumn = $useAlias ? 'm.account_id' : 'account_id';
		// No need to JOIN any tables, we already have all information required
		// Apply predicate on backend_group_id and account_id in memberships table
		$qb->where($qb->expr()->eq($backendGroupColumn, $qb->createNamedParameter($backendGroupId)));
		$qb->andWhere($qb->expr()->eq($accountColumn, $qb->createNamedParameter($accountId)));
		return $qb;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param string $userId
	 * @return IQueryBuilder
	*/
	private function applyUserIdPredicate(IQueryBuilder $qb, $userId) {
		// We need to join with accounts table, since we miss information on accountId
		$qb->innerJoin('m', 'accounts', 'a', $qb->expr()->eq('a.id', 'm.account_id'));

		// Apply predicate on user_id in accounts table
		$qb->where($qb->expr()->eq('a.user_id', $qb->createNamedParameter($userId)));

		return $qb;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param int $accountId
	 * @param bool $useAlias
	 * @return IQueryBuilder
	 */
	private function applyAccountIdPredicate(IQueryBuilder $qb, $accountId, $useAlias) {
		$accountColumn = $useAlias ? 'm.account_id' : 'account_id';
		// Apply predicate on account_id in memberships table
		$qb->where($qb->expr()->eq($accountColumn, $qb->createNamedParameter($accountId)));
		return $qb;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param string $gid
	 * @return IQueryBuilder
	 */
	private function applyGidPredicate(IQueryBuilder $qb, $gid) {
		// We need to join with backend group table, since we miss information on backendGroupId
		$qb->innerJoin('m', 'backend_groups', 'g', $qb->expr()->eq('g.id', 'm.backend_group_id'));

		// Apply predicate on group_id in backend groups table
		$qb->where($qb->expr()->eq('g.group_id', $qb->createNamedParameter($gid)));
		return $qb;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param int $backendGroupId
	 * @param bool $useAlias
	 * @return IQueryBuilder
	 */
	private function applyBackendGroupIdPredicate(IQueryBuilder $qb, $backendGroupId, $useAlias) {
		$backendGroupColumn = $useAlias ? 'm.backend_group_id' : 'backend_group_id';
		// Apply predicate on backend_group_id in memberships table
		$qb->where($qb->expr()->eq($backendGroupColumn, $qb->createNamedParameter($backendGroupId)));
		return $qb;
	}
}