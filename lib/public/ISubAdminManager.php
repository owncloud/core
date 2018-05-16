<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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
 * Sub admin manager
 *
 * @since 10.1.0
 */
interface ISubAdminManager {

	/**
	 * Make the given user a SubAdmin of the given group.
	 *
	 * @param IUser $user user to be SubAdmin
	 * @param IGroup $group group $user becomes subadmin of
	 * @return bool true if success, false otherwise
	 * @since 10.1.0
	 */
	public function createSubAdmin(IUser $user, IGroup $group);

	/**
	 * Remove subadmin permission of the given user for the given group.
	 *
	 * @param IUser $user the user that is the SubAdmin
	 * @param IGroup $group the group
	 * @return bool true if success, false otherwise
	 * @since 10.1.0
	 */
	public function deleteSubAdmin(IUser $user, IGroup $group);

	/**
	 * Returns groups managed by the given subadmin
	 * @param IUser $user the SubAdmin
	 * @return IGroup[] list of groups
	 * @since 10.1.0
	 */
	public function getSubAdminsGroups(IUser $user);

	/**
	 * Returns SubAdmins of a group
	 *
	 * @param IGroup $group the group
	 * @return IUser[] list of users who are subadmin
	 * @since 10.1.0
	 */
	public function getGroupsSubAdmins(IGroup $group);

	/**
	 * Returns all SubAdmins
	 *
	 * @return array list of subadmin users
	 * @since 10.1.0
	 */
	public function getAllSubAdmins();

	/**
	 * Checks whether a user is a SubAdmin of the given group
	 *
	 * @param IUser $user user to check
	 * @param IGroup $group group to check
	 * @return bool true if the given user is a subadmin of the group, false otherwise
	 * @since 10.1.0
	 */
	public function isSubAdminofGroup(IUser $user, IGroup $group);

	/**
	 * Checks whether a user is a of at least one group
	 *
	 * @param IUser $user
	 * @return bool true if the given user is subadmin of at least one group, false otherwise
	 * @since 10.1.0
	 */
	public function isSubAdmin(IUser $user);

	/**
	 * Checks whether a user is a accessible by a subadmin
	 *
	 * @param IUser $subadmin subadmin user
	 * @param IUser $user user to check
	 * @return bool true if accessible, false otherwise
	 * @since 10.1.0
	 */
	public function isUserAccessible($subadmin, $user);
}
