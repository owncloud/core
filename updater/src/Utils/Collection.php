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
 * Class Collection
 *
 * @package Owncloud\Updater\Utils
 */
class Collection {
	private $notReadable = [];
	private $notWritable = [];

	public function reset() {
		$this->notReadable = [];
		$this->notWritable = [];
	}

	/**
	 * @param $item
	 */
	public function addNotReadable($item) {
		if (!\in_array($item, $this->notReadable)) {
			$this->notReadable[] = $item;
		}
	}

	/**
	 * @param $item
	 */
	public function addNotWritable($item) {
		if (!\in_array($item, $this->notWritable)) {
			$this->notWritable[] = $item;
		}
	}

	/**
	 * @return array
	 */
	public function getNotReadable() {
		return $this->notReadable;
	}

	/**
	 * @return array
	 */
	public function getNotWritable() {
		return $this->notWritable;
	}
}
