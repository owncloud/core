<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\User_LDAP;

class Group_Proxy extends Proxy implements \OCP\GroupInterface {
	private $backends = [];
	private $refBackend = null;

	/**
	 * Constructor
	 * @param string[] $serverConfigPrefixes array containing the config Prefixes
	 */
	public function __construct($serverConfigPrefixes, ILDAPWrapper $ldap) {
		parent::__construct($ldap);
		foreach ($serverConfigPrefixes as $configPrefix) {
			$this->backends[$configPrefix] =
				new \OCA\User_LDAP\Group_LDAP($this->getAccess($configPrefix));
			if ($this->refBackend === null) {
				$this->refBackend = &$this->backends[$configPrefix];
			}
		}
	}

	/**
	 * Tries the backends one after the other until a positive result is returned from the specified method
	 * @param string $gid the gid connected to the request
	 * @param string $method the method of the group backend that shall be called
	 * @param array $parameters an array of parameters to be passed
	 * @return mixed, the result of the method or false
	 */
	protected function walkBackends($gid, $method, $parameters) {
		$cacheKey = $this->getGroupCacheKey($gid);
		foreach ($this->backends as $configPrefix => $backend) {
			if ($result = \call_user_func_array([$backend, $method], $parameters)) {
				$this->writeToCache($cacheKey, $configPrefix);
				return $result;
			}
		}
		return false;
	}

	/**
	 * Asks the backend connected to the server that supposely takes care of the gid from the request.
	 * @param string $gid the gid connected to the request
	 * @param string $method the method of the group backend that shall be called
	 * @param array $parameters an array of parameters to be passed
	 * @param mixed $passOnWhen the result matches this variable
	 * @return mixed, the result of the method or false
	 */
	protected function callOnLastSeenOn($gid, $method, $parameters, $passOnWhen) {
		$cacheKey = $this->getGroupCacheKey($gid);
		;
		$prefix = $this->getFromCache($cacheKey);
		//in case the uid has been found in the past, try this stored connection first
		if ($prefix !== null) {
			if (isset($this->backends[$prefix])) {
				$result = \call_user_func_array([$this->backends[$prefix], $method], $parameters);
				if ($result === $passOnWhen) {
					//not found here, reset cache to null if group vanished
					//because sometimes methods return false with a reason
					$groupExists = \call_user_func_array(
						[$this->backends[$prefix], 'groupExists'],
						[$gid]
					);
					if (!$groupExists) {
						$this->writeToCache($cacheKey, null);
					}
				}
				return $result;
			}
		}
		return false;
	}

	/**
	 * is user in group?
	 * @param string $uid uid of the user
	 * @param string $gid gid of the group
	 * @return bool
	 *
	 * Checks whether the user is member of a group or not.
	 */
	public function inGroup($uid, $gid) {
		return $this->handleRequest($gid, 'inGroup', [$uid, $gid]);
	}

	/**
	 * Get all groups a user belongs to
	 * @param string $uid Name of the user
	 * @return string[] with group names
	 *
	 * This function fetches all groups a user belongs to. It does not check
	 * if the user exists at all.
	 */
	public function getUserGroups($uid) {
		$groups = [];

		foreach ($this->backends as $backend) {
			$backendGroups = $backend->getUserGroups($uid);
			if (\is_array($backendGroups)) {
				$groups = \array_merge($groups, $backendGroups);
			}
		}

		return $groups;
	}

	/**
	 * get a list of all users in a group
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs across configured servers,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $gid
	 * @param string $search
	 * @param null|int $limit
	 * @param null|int $offset
	 * @return string[] with user ids
	 */
	public function usersInGroup($gid, $search = '', $limit = -1, $offset = 0) {
		$users = [];

		foreach ($this->backends as $backend) {
			$backendUsers = $backend->usersInGroup($gid, $search, $limit, $offset);
			if (\is_array($backendUsers)) {
				$users = \array_merge($users, $backendUsers);
			}
		}

		return $users;
	}

	/**
	 * returns the number of users in a group, who match the search term
	 * @param string $gid the internal group name
	 * @param string $search optional, a search string
	 * @return int|bool
	 */
	public function countUsersInGroup($gid, $search = '') {
		return $this->handleRequest(
			$gid,
			'countUsersInGroup',
			[$gid, $search]
		);
	}

	/**
	 * Get a list of all groups for LDAP base DNs across configured servers.
	 *
	 * WARNING: Using this function combined with LIMIT $limit and OFFSET $offset
	 * will search in parallel all provided base DNs,
	 * and thus can return more then LIMIT $limit users. This function shall
	 * be used with limit and offset by iterators that can
	 * support this kind of parallel paging.
	 *
	 * @param string $search
	 * @param null|int $limit
	 * @param null|int $offset
	 * @return string[] an array of gids returned by all base DNs queried
	 * 					individually for specified search, limit and offset
	 */
	public function getGroups($search = '', $limit = -1, $offset = 0) {
		$groups = [];

		foreach ($this->backends as $backend) {
			$backendGroups = $backend->getGroups($search, $limit, $offset);
			if (\is_array($backendGroups)) {
				$groups = \array_merge($groups, $backendGroups);
			}
		}

		return $groups;
	}

	/**
	 * check if a group exists
	 * @param string $gid
	 * @return bool
	 */
	public function groupExists($gid) {
		return $this->handleRequest($gid, 'groupExists', [$gid]);
	}

	public function getGroupDetails($gid) {
		return $this->handleRequest($gid, 'getGroupDetails', [$gid]);
	}
	/**
	 * Check if backend implements actions
	 * @param int $actions bitwise-or'ed actions
	 * @return boolean
	 *
	 * Returns the supported actions as int to be
	 * compared with OC_USER_BACKEND_CREATE_USER etc.
	 */
	public function implementsActions($actions) {
		//it's the same across all our user backends obviously
		return $this->refBackend->implementsActions($actions);
	}

	/**
	 * Returns whether the groups are visible for a given scope.
	 *
	 * @param string|null $scope scope string
	 * @return bool true if searchable, false otherwise
	 *
	 * @since 10.0.0
	 */
	public function isVisibleForScope($scope) {
		return true;
	}

	public function getBackendCount() {
		return \count($this->backends);
	}

	public function clearFullCache($callback = null) {
		$this->clearCache();
		if ($callback !== null) {
			$callback($this);
		}
		foreach ($this->backends as $backend) {
			$backend->clearConnectionCache();
			if ($callback !== null) {
				$callback($backend);
			}
		}
	}
}
