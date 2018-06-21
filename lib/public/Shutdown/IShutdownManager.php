<?php
/**
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

namespace OCP\Shutdown;

/**
 * Interface IShutdownManager
 *
 * @package OCP\Shutdown
 * @since 10.0.10
 */
interface IShutdownManager {
	const HIGH = 10;
	const LOW = 1000;

	/**
	 * Any kind of cleanup should be added with priority LOW.
	 * Anything which shall be processed before the cleanup routes better
	 * uses a value smaller then LOW. You can use HIGH if you like.
	 * In case two callbacks have the same prio they will be executed in the
	 * order in which they have been registered.
	 *
	 * @param \Closure $callback - a simple function with no arguments and no return
	 * @param int $priority - the lower the number the higher is the priority
	 * @return void
	 * @since 10.0.10
	 */
	public function register(\Closure $callback, $priority = self::LOW);
}
