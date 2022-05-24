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

use OC\User\AccountMapper;

class SeenUsersIterator extends UsersIterator {
	/**
	 * @var AccountMapper
	 */
	private $mapper;
	/**
	 * @var string class name
	 */
	private $backend;

	public function __construct(AccountMapper $mapper, $backend) {
		$this->mapper = $mapper;
		$this->backend = $backend;
	}

	public function rewind() {
		parent::rewind();
		$this->data = $this->mapper->findUserIds($this->backend, true, self::LIMIT, 0);
	}

	public function next() {
		$this->position++;
		if ($this->currentDataPos() === 0) {
			$this->page++;
			$offset = $this->page * self::LIMIT;
			$this->data = $this->mapper->findUserIds($this->backend, true, self::LIMIT, $offset);
		}
	}
}
