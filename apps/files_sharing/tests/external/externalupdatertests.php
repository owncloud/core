<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OCA\Files_Sharing\Tests\External;

use OC\Files\Storage\StorageFactory;
use OC\User\Manager;
use OCA\Files_Sharing\External\ExternalUpdater;
use OCA\Files_Sharing\External\MountProvider;
use OCP\IUserManager;
use Test\TestCase;
use Test\Util\User\Dummy;

class ExternalUpdaterTests extends TestCase {
	/**
	 * @var ExternalUpdater
	 */
	private $updater;

	/**
	 * @var MountProvider|\PHPUnit_Framework_MockObject_MockObject
	 */
	private $mountProvider;

	/**
	 * @var IUserManager
	 */
	private $userManager;

	protected function setUp() {
		$userBackend = new Dummy();
		$userBackend->createUser('user1', 'user1');
		$this->userManager = new Manager();
		$this->userManager->registerBackend($userBackend);

		$this->mountProvider = $this->getMockBuilder('\OCA\Files_Sharing\External\MountProvider')
			->disableOriginalConstructor()
			->getMock();

		$this->updater = new ExternalUpdater($this->mountProvider, new StorageFactory(), $this->userManager);
	}

	/**
	 * @param array $files
	 * @return \OC\Files\Storage\Storage|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected function getMockStorage($files) {
		$storage = $this->getMockBuilder('\OC\Files\Storage\Storage')
			->getMock();
		$cache = $this->getMockBuilder('\OC\Files\Cache\Cache')
			->disableOriginalConstructor()
			->getMock();

		$cache->expects($this->any())
			->method('get')
			->will($this->returnCallback(function ($path) use ($files) {
				return $files[$path];
			}));

		$storage->expects($this->any())
			->method('getCache')
			->will($this->returnValue($cache));

		$scanner = $this->getMockBuilder('\OC\Files\Cache\Scanner')
			->disableOriginalConstructor()
			->getMock();

		$storage->expects($this->any())
			->method('getScanner')
			->will($this->returnValue($scanner));

		return $storage;
	}

	protected function getMount($storage) {
		$mount = $this->getMockBuilder('\OCP\Files\Mount\IMountPoint')
			->disableOriginalConstructor()
			->getMock();

		$mount->expects($this->any())
			->method('getStorage')
			->will($this->returnValue($storage));

		return $mount;
	}

	public function testHandleUpdateSameEtag() {
		$storage = $this->getMockStorage([
			'foo' => [
				'etag' => 'etag1'
			]
		]);
		/** @var \PHPUnit_Framework_MockObject_MockObject $scanner */
		$scanner = $storage->getScanner();

		$mount = $this->getMount($storage);

		$this->mountProvider->expects($this->any())
			->method('getMount')
			->will($this->returnValue($mount));

		$scanner->expects($this->never())
			->method('scan');

		$this->updater->handleUpdate('user1', [], 'foo', 'etag1');
	}
}
