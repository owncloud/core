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

namespace OC\Shutdown;

use OCP\Shutdown\IShutdownManager;

class ShutDownManager implements IShutdownManager {

	/** @var array[] */
	private $callbacks = [];

	/**
	 * ShutDownManager constructor.
	 *
	 * @codeCoverageIgnore
	 */
	public function __construct() {
		\register_shutdown_function([$this, 'run']);
	}
	
	/**
	 * Any kind of cleanup should be added with priority LOW.
	 * Anything which shall be processed before the cleanup routes better
	 * uses a value smaller then LOW
	 *
	 * @param \Closure $callback
	 * @param int $priority - the lower the number the higher is the priority
	 * @return void
	 * @since 10.0.10
	 */
	public function register(\Closure $callback, $priority = self::LOW) {
		if (!isset($this->callbacks[$priority])) {
			$this->callbacks[$priority] = [];
		}
		$this->callbacks[$priority][] = $callback;
	}

	public function run() {
		\ksort($this->callbacks);
		foreach ($this->callbacks as $callbacks) {
			foreach ($callbacks as $callback) {
				$callback();
			}
		}
	}
}
