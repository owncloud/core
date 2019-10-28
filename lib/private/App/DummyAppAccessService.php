<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OC\App;

use OCP\App\IAppAccessService;
use OCP\IGroup;
use OCP\IUser;

/**
 * Class DummyAppAccessService
 *
 * This is a dummy class. The idea here is not to provide any AppAccessService
 * until the connection and groupManager is ready to be used. So until oC is
 * installed successfully this dummy service will be provided. Once the oC installation
 * is successful, it will switch back to AppAccessService.
 *
 * @package OC\App
 */
class DummyAppAccessService implements IAppAccessService {
	/**
	 * DummyAppAccessService constructor.
	 *
	 * @since 10.3.1
	 */
	public function __construct() {
	}

	/**
	 * Set whitelisted apps for a group
	 * In this method we set the whitelisted apps for a group. The appaccess table
	 * will be set with list of apps. The apps are list of strings. If the apps
	 * are successfully set the method returns true. Else false is returned.
	 * Before executing this function kindly check if apps exist for the group
	 * using one of the get methods in this class.
	 *
	 * @param IGroup $group
	 * @param array $apps
	 * @return bool true if whitelisted apps are set else false is returned
	 * @10.3.1
	 */
	public function setWhitelistedAppsForGroup(IGroup $group, $apps = []) {
		return false;
	}

	/**
	 * Set the whitelisted apps for user.
	 * This method helps apps to store the information related to apps which can
	 * be accessed by user. The advantage of using this method is it helps core
	 * to grab access to the apps which are accessible to user. This method returns
	 * true if the apps list is set successfully. Else false is returned. Remember
	 * this method can overwrite any existing data. Say for example an app decided
	 * to update the whitelists accessible for user, it would be done.
	 *
	 * @param IUser $user
	 * @param array $apps
	 * @return bool
	 * @since 10.3.1
	 */
	public function setWhitelistedAppsForUser(IUser $user, $apps) {
		return false;
	}

	/**
	 * Get the whitelisted apps for the user
	 * This is a special method which computes the apps which a user has access to.
	 * Meaning it computes the whitelisted apps of user and the whitelisted apps
	 * of the group(s), in which the user is a member of. And then merges the result.
	 * The final result would have the total apps accessible for the user.
	 * If the user is not found in the table, this method would return false.
	 * The significance of a false in return from this method means: the user has
	 * access to the enabled apps.
	 * If an array of whitelisted apps is returned then it means: the user has
	 * access to only those apps. The returned list is of the type key-value pair.
	 * Where Key is the name of the app and Value is also the name of the app.
	 * This method can also return an empty list. This means the user does not
	 * have access to any apps. Unless core provides certain apps which should
	 * be available to all users. For example files app is one such app.
	 *
	 * @param IUser $user
	 * @return bool|mixed, array when whitelisted apps are available. The array can be empty. If there is no entry in table false is returned.
	 * @since 10.3.1
	 *
	 */
	public function getComputedWhitelistedAppsForUser(IUser $user) {
		return false;
	}

	/**
	 * Get whitelisted apps for user excluding the results of groups
	 * This method fetches the whitelisted apps for the user. It does not considers
	 * if the user is available in other groups and the apps whitelisted in other groups.
	 *
	 * @param IUser $user
	 * @return bool|mixed
	 * @since 10.3.1
	 */
	public function getWhitelistedAppsForUser(IUser $user) {
		return false;
	}

	/**
	 * Get the whitelisted apps for group
	 * If the whitelisted apps are set for a group then it fetches from the array
	 * appsAvailableForGroups and returns the array. Else it returns false.
	 *
	 * @param IGroup $group
	 * @return bool|array get the array if whitelisted apps exist for it else false.
	 * @since 10.3.1
	 */
	public function getWhitelistedAppsForGroup(IGroup $group) {
		return false;
	}

	/**
	 * Delete association of whitelisted apps and user
	 * This method will grant full app access to the user as after this operation
	 * there wont't be any whitelisted apps for the user.
	 * There is another condition which would apply here is though the row with
	 * user and the apps is deleted from the appaccess table:
	 * - If the user is part of a group, and if that group has whitelisted apps,
	 *   then the user still obeys the whitelisted apps of a group ( which it is a
	 *   member of)
	 * The argument used is string (uid) because its post deletion of the user. Hence
	 * its risky to use user object at this phase.
	 *
	 * @param string $uid
	 * @return bool true if operation is success, else false
	 * @since 10.3.1
	 */
	public function wipeWhitelistedAppsForUser($uid) {
		return false;
	}

	/**
	 * Delete association of whitelisted apps and group
	 * This method will grant full app access to the group as after this operation
	 * there wont be any whitelisted apps for the group.
	 * The argument used is string because its post deletion of the group. Hence
	 * its risky to use group object at this phase.
	 *
	 * @param string $gid
	 * @return bool true if operation is success, else false
	 * @since 10.3.1
	 */
	public function wipeWhitelistedAppsForGroup($gid) {
		return false;
	}
}
