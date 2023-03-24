<?php
/**
 *
 * @copyright Copyright (c) 2023, ownCloud GmbH
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
namespace OCP\Authentication\LoginPolicies;

use OCP\IUser;

/**
 * Interface for a login policy, for example "users belonging to group A must
 * login by username and password"
 *
 * @since 10.12.0
 */
interface ILoginPolicy {
	/**
	 * Check if the $user accessing via $loginType can login. This method must
	 * return true if the check passes and the user is allowed to login.
	 *
	 * The method should usually throw a LoginException with a proper message if
	 * the user is rejected. If such thing isn't possible, returning false is an
	 * alternative; the LoginPolicyManager should throw a LoginException on
	 * its behalf along with a generic error message.
	 *
	 * @since 10.12.0
	 *
	 * @param string $loginType the login type the user is using to access ownCloud
	 * @param IUser $user the user accessing
	 * @throws \OC\User\LoginException if the user isn't allowed to access
	 * @return bool true if the user is allowed, false otherwise
	 */
	public function checkPolicy(string $loginType, IUser $user): bool;
}
