<?php

/**
 * ownCloud
 *
 * @author Philipp Kapfer
 * @copyright 2013 Philipp Kapfer philipp.kapfer@gmx.at
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Test\Files\Storage;

class RapidShare extends Storage {
	private $config;

	public function setUp() {
		$id = uniqid();
		$this->config = include('files_external/tests/config.php');
		if (!is_array($this->config) or !isset($this->config['rapidshare']) or !$this->config['rapidshare']['run']) {
			$this->markTestSkipped('RapidShare backend not configured');
		}
		$this->config['rapidshare']['root'] .= '/' . $id; //make sure we have an new empty folder to work in
		$this->instance = new \OC\Files\Storage\RapidShare($this->config['rapidshare']);
	}

	public function tearDown() {
		if ($this->instance) {
			$this->instance->rmdir('/');
		}
	}
}
