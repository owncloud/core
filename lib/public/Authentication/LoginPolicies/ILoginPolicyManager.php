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
 * Manage the login policies
 *
 * @since 10.12.0
 */
interface ILoginPolicyManager {
	/**
	 * Register the policy. The implementation should be sure that the
	 * policy isn't duplicated
	 *
	 * @since 10.12.0
	 */
	public function registerPolicy(ILoginPolicy $loginPolicy);

	/**
	 * Check if the user is allowed to login based on the configured policies.
	 * This method will throw a LoginException if the user is rejected. If the
	 * user is allowed, this method won't return anything.
	 *
	 * @since 10.12.0
	 *
	 * @throws LoginException if the user is rejected
	 */
	public function checkUserLogin(string $loginType, IUser $user);
}
