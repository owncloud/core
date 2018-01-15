<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCP;

/**
 * Class Manager
 *
 * Hooks available in scope \OC\Group:
 * - preAddUser(\OC\Group\Group $group, \OC\User\User $user)
 * - postAddUser(\OC\Group\Group $group, \OC\User\User $user)
 * - preRemoveUser(\OC\Group\Group $group, \OC\User\User $user)
 * - postRemoveUser(\OC\Group\Group $group, \OC\User\User $user)
 * - preDelete(\OC\Group\Group $group)
 * - postDelete(\OC\Group\Group $group)
 * - preCreate(string $groupId)
 * - postCreate(\OC\Group\Group $group)
 *
 * @package OC\Group
 * @since 8.0.0
 */
interface IGroupManager {

	/**
	 * Checks whether a given backend is used
	 *
	 * @param string $backendClass Full classname including complete namespace
	 * @return bool
	 * @deprecated 10.0.0 - use getBackends of \OCP\IGroupManager
	 * @since 8.1.0
	 */
	public function isBackendUsed($backendClass);

	/**
	 * Get all active backends
	 *
	 * @return \OCP\GroupInterface[]
	 * @since 10.0.0
	 */
	public function getBackends();

	/**
	 * @param \OCP\GroupInterface $backend
	 * @since 8.0.0
	 */
	public function addBackend($backend);

	/**
	 * @since 8.0.0
	 */
	public function clearBackends();

	/**
	 * @param string $gid
	 * @return \OCP\IGroup
	 * @since 8.0.0
	 */
	public function get($gid);

	/**
	 * @param string $gid
	 * @return bool
	 * @since 8.0.0
	 */
	public function groupExists($gid);

	/**
	 * @param string $gid
	 * @return \OCP\IGroup
	 * @since 8.0.0
	 */
	public function createGroup($gid);

	/**
	 * @param string $search
	 * @param int $limit
	 * @param int $offset
	 * @param string $scope
	 * @return \OCP\IGroup[]
	 * @since 8.0.0
	 */
	public function search($search, $limit = null, $offset = null, $scope = null);

	/**
	 * @param \OCP\IUser|null $user
	 * @param string $scope
	 * @return \OCP\IGroup[]
	 * @since 8.0.0
	 */
	public function getUserGroups($user, $scope = null);

	/**
	 * @param \OCP\IUser $user
	 * @param string $scope
	 * @return array with group names
	 * @since 8.0.0
	 */
	public function getUserGroupIds($user, $scope = null);

	/**
	 * get a list of all display names in a group
	 *
	 * @param string $gid
	 * @param string $search
	 * @param int $limit
	 * @param int $offset
	 * @return array an array of display names (value) and user ids (key)
	 * @since 8.0.0
	 */
	public function displayNamesInGroup($gid, $search = '', $limit = -1, $offset = 0);

	/**
	 * search for users in a specific group
	 *
	 * @param string $gid
	 * @param string $search
	 * @param int $limit
	 * @param int $offset
	 * @return array an array of display names (value) and user objects
	 * @since 10.0.1
	 */
	public function findUsersInGroup($gid, $search = '', $limit = -1, $offset = 0);

	/**
	 * Checks if a userId is in the admin group
	 * @param string $userId
	 * @return bool if admin
	 * @since 8.0.0
	 */
	public function isAdmin($userId);

	/**
	 * Checks if a userId is in a group identified by gid
	 * @param string $userId
	 * @param string $gid
	 * @return bool if in group
	 * @since 8.0.0
	 */
	public function isInGroup($userId, $gid);

	/**
	 * Returns the sub admin manager
	 *
	 * @since 10.1.0
	 * @return ISubAdminManager
	 */
	public function getSubAdmin();

	/**
	 * @param string $gid
	 * @param GroupInterface $backend
	 * @return IGroup|null
	 * @since 10.0
	 */
	public function createGroupFromBackend($gid, $backend);
}