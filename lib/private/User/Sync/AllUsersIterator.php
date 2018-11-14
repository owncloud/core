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

use OCP\UserInterface;

class AllUsersIterator extends UsersIterator {
	/**
	 * @var UserInterface
	 */
	private $backend;
    /**
     * @var int the current data position,
     *      we need to track it independently of parent::$position to handle data sets larger thin LIMIT properly
     */
    private $dataPos = 0;

    /**
     * @var int to cache the count($this->data) calculations
     */
    private $endPos = 0;

	public function __construct(UserInterface $backend) {
		$this->backend = $backend;
	}

	public function rewind() {
		parent::rewind();
		$this->data = $this->backend->getUsers('', self::LIMIT, 0);
        $this->dataPos = 0;
		$this->endPos = \count($this->data);
	}

	public function next() {
        $this->position++;
        $this->dataPos++;
		if ($this->dataPos >= $this->endPos) {
			$this->page++;
			$offset = $this->page * self::LIMIT;
			$this->data = $this->backend->getUsers('', self::LIMIT, $offset);
            $this->dataPos = 0;
            $this->endPos = \count($this->data);
		}
	}

    protected function currentDataPos() {
        return  $this->dataPos;
    }
}
