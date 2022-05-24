<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OCP\Authentication;

use OCP\Authentication\Exceptions\AccountCheckException;
use OCP\IUser;

/**
 * Interface IAccountModule
 *
 * @package OCP\Authentication
 * @since 10.0.9
 */
interface IAccountModule {

	/**
	 * The check is called on every request, so it should be cheap, eg an
	 * app or per user config. If the check is more complex try decoupling it
	 * from every request by registering an event listener and setting a user
	 * config.
	 *
	 * @since 10.0.9
	 *
	 * @param IUser $user
	 * @throws AccountCheckException
	 */
	public function check(IUser $user);
}
