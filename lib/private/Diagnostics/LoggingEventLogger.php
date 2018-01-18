<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud, Inc.
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

namespace OC\Diagnostics;

use OCP\Diagnostics\IEventLogger;
use OCP\ILogger;

class LoggingEventLogger implements IEventLogger {

	/**
	 * @var \OC\Diagnostics\Event[]
	 */
	private $events = [];

	/**
	 * @var ILogger
	 */
	private $logger;

	function __construct(ILogger $logger) {
		$this->logger = $logger;
	}

	public function start($id, $description) {
		$this->logger->debug("start $id ($description)", ['app' => 'diagnostics']);
		$this->events[$id] = new Event($id, $description, microtime(true));
	}

	public function end($id) {
		if (isset($this->events[$id])) {
			$timing = $this->events[$id];
			$timing->end(microtime(true));
			$delta = number_format ($this->events[$id]->getDuration(), 6);
			$this->logger->debug("end $id ({$timing->getDescription()}), took {$delta}s", ['app' => 'diagnostics']);
		} else {
			$this->logger->debug("end called before start $id", ['app' => 'diagnostics']);
		}
	}

	public function log($id, $description, $start, $end) {
		$this->events[$id] = new Event($id, $description, $start);
		$this->events[$id]->end($end);
		$delta = number_format ($this->events[$id]->getDuration(), 6);
		$this->logger->debug("log $id ($description), took {$delta}s", ['app' => 'diagnostics']);
	}

	/**
	 * @return \OCP\Diagnostics\IEvent[]
	 */
	public function getEvents() {
		return $this->events;
	}
}
