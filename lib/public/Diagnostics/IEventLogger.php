<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OCP\Diagnostics;

/**
 * Interface IEventLogger
 *
 * @package OCP\Diagnostics
 * @since 8.0.0
 */
interface IEventLogger {
	/**
	 * Mark the start of an event
	 *
	 * @param string $id
	 * @param string $description
	 * @since 8.0.0
	 */
	public function start($id, $description);

	/**
	 * Mark the end of an event
	 *
	 * @param string $id
	 * @since 8.0.0
	 */
	public function end($id);

	/**
	 * @param string $id
	 * @param string $description
	 * @param float $start
	 * @param float $end
	 * @since 8.0.0
	 */
	public function log($id, $description, $start, $end);

	/**
	 * @return \OCP\Diagnostics\IEvent[]
	 * @since 8.0.0
	 */
	public function getEvents();

	/**
	 * Activate the module for the duration of the request. Deactivated module
	 * does not create and store \OCP\Diagnostics\IEvent objects.
	 * Only activated module should create and store objects to be
	 * returned with getEvents() call.
	 *
	 * @since 10.0.0
	 */
	public function activate();
}
