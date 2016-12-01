<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace Test\Files\External;

use OC\Files\Mount\Manager;
use OC\Files\External\PersonalMount;
use Test\TestCase;

class PersonalMountTest extends TestCase {
	public function testFindByStorageId() {
		/** @var \OCP\Files\External\Service\IUserStoragesService $storageService */
		$storageService = $this->createMock('\OCP\Files\External\Service\IUserStoragesService');

		$storage = $this->getMockBuilder('\OC\Files\Storage\Storage')
			->disableOriginalConstructor()
			->getMock();

		$storage->expects($this->any())
			->method('getId')
			->will($this->returnValue('dummy'));

		$mount = new PersonalMount($storageService, 10, $storage, '/foo');

		$mountManager = new Manager();
		$mountManager->addMount($mount);

		$this->assertEquals([$mount], $mountManager->findByStorageId('dummy'));
	}
}
