<?php

/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Owncloud\Updater\Utils;

/**
 * Class Registry
 *
 * @package Owncloud\Updater\Utils
 */
class Registry {
	protected $objects = [];

	/**
	 *
	 * @param string $name
	 * @param mixed $object
	 */
	public function set($name, $object) {
		$this->objects[$name] = $object;
		$_SESSION[$name] = \serialize($object);
	}

	/**
	 *
	 * @param string $name
	 * @return mixed
	 */
	public function get($name) {
		if (isset($this->objects[$name])) {
			return $this->objects[$name];
		} elseif (isset($_SESSION[$name])) {
			$this->objects[$name] = \unserialize($_SESSION[$name]);
			return $this->objects[$name];
		}
		return null;
	}

	/**
	 *
	 * @param string $name
	 */
	public function clear($name) {
		unset($this->objects[$name], $_SESSION[$name]);
	}

	public function clearAll() {
		foreach ($this->objects as $name=>$value) {
			$this->clear($name);
		}
	}
}
