<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OCA\DAV\Tests\unit\Connector\Sabre\RequestTest;

/**
 * Class PartFileInRootUploadTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\unit\Connector\Sabre\RequestTest
 */
class PartFileInRootUploadTest extends UploadTest {
	protected $original;

	protected function setUp() {
		$config = \OC::$server->getConfig();
		$this->original = $config->getSystemValue('part_file_in_storage', null);
		$config->setSystemValue('part_file_in_storage', false);
		parent::setUp();
	}

	protected function tearDown() {
		if ($this->original !== null) {
			$config = \OC::$server->getConfig();
			$this->original = $config->setSystemValue('part_file_in_storage', $this->original);
		}
		return parent::tearDown();
	}
}
