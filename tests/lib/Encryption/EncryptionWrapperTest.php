<?php
/**
 * @author Björn Schießle <schiessle@owncloud.com>
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

namespace Test\Encryption;

use OC\Encryption\EncryptionWrapper;
use Test\TestCase;

class EncryptionWrapperTest extends TestCase {
	private \OC\Encryption\EncryptionWrapper $instance;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCP\ILogger */
	private \PHPUnit\Framework\MockObject\MockObject $logger;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OC\Encryption\Manager */
	private \PHPUnit\Framework\MockObject\MockObject $manager;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OC\Memcache\ArrayCache */
	private \PHPUnit\Framework\MockObject\MockObject $arrayCache;

	public function setUp(): void {
		parent::setUp();

		$this->arrayCache = $this->createMock(\OC\Memcache\ArrayCache::class);
		$this->manager = $this->getMockBuilder(\OC\Encryption\Manager::class)
			->disableOriginalConstructor()->getMock();
		$this->logger = $this->createMock(\OCP\ILogger::class);

		$this->instance = new EncryptionWrapper($this->arrayCache, $this->manager, $this->logger);
	}

	/**
	 * @dataProvider provideWrapStorage
	 */
	public function testWrapStorage($expectedWrapped, $wrappedStorages) {
		$storage = $this->getMockBuilder(\OC\Files\Storage\Storage::class)
			->disableOriginalConstructor()
			->getMock();

		foreach ($wrappedStorages as $wrapper) {
			$storage->expects($this->any())
				->method('instanceOfStorage')
				->willReturnMap([
					[$wrapper, true],
				]);
		}

		$mount = $this->getMockBuilder(\OCP\Files\Mount\IMountPoint::class)
			->disableOriginalConstructor()
			->getMock();

		$returnedStorage = $this->instance->wrapStorage('mountPoint', $storage, $mount);

		$this->assertEquals(
			$expectedWrapped,
			$returnedStorage->instanceOfStorage(\OC\Files\Storage\Wrapper\Encryption::class),
			'Asserted that the storage is (not) wrapped with encryption'
		);
	}

	public function provideWrapStorage() {
		return [
			// Wrap when not wrapped or not wrapped with storage
			[true, []],
			[true, [\OCA\Files_Trashbin\Storage::class]],

			// Do not wrap shared storages
			[false, [\OCA\Files_Sharing\SharedStorage::class]],
			[false, [\OCA\Files_Sharing\External\Storage::class]],
			[false, ['OC\Files\Storage\OwnCloud']],
			[false, [\OCA\Files_Sharing\SharedStorage::class, \OCA\Files_Sharing\External\Storage::class]],
			[false, [\OCA\Files_Sharing\SharedStorage::class, 'OC\Files\Storage\OwnCloud']],
			[false, [\OCA\Files_Sharing\External\Storage::class, 'OC\Files\Storage\OwnCloud']],
			[false, [\OCA\Files_Sharing\SharedStorage::class, \OCA\Files_Sharing\External\Storage::class, 'OC\Files\Storage\OwnCloud']],
		];
	}
}
