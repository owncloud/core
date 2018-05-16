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
namespace OC\User\Sync;

abstract class UsersIterator implements \Iterator {
	protected $position = 0;
	protected $page;
	protected $data;

	const LIMIT = 500;

	public function rewind() {
		$this->position = 0;
		$this->page = 0;
	}

	public function current() {
		return $this->data[$this->currentDataPos()];
	}

	public function key() {
		return $this->position;
	}

	abstract public function next();

	public function valid() {
		return isset($this->data[$this->currentDataPos()]);
	}

	protected function currentDataPos() {
		return $this->position % self::LIMIT;
	}
}
