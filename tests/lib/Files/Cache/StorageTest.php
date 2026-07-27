<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace Test\Files\Cache;

use OC\Files\Cache\Storage;
use Test\Memcache\FixedCacheFactory;
use Test\TestCase;

/**
 * Tests for the string id <-> numeric id mapping of the storages table.
 *
 * @group DB
 */
class StorageTest extends TestCase {
	/** @var string */
	private $storageId;

	protected function setUp(): void {
		parent::setUp();
		$this->storageId = 'test::' . $this->getUniqueID();
	}

	protected function tearDown(): void {
		Storage::remove($this->storageId);
		parent::tearDown();
	}

	public function testStorageIsInsertedOnce() {
		$storage = new Storage($this->storageId);
		$numericId = $storage->getNumericId();

		$this->assertSame($numericId, (new Storage($this->storageId))->getNumericId());
	}

	public function testAvailabilityChangeIsVisibleImmediately() {
		$storage = new Storage($this->storageId);
		$this->assertTrue($storage->getAvailability()['available']);

		$storage->setAvailability(false);

		// a separately constructed instance - as another request would build it -
		// has to see the change
		$this->assertFalse((new Storage($this->storageId))->getAvailability()['available']);
	}

	/**
	 * The mapping used to be cached in the distributed cache for five minutes on
	 * top of the request scoped memoization, which meant a storage marked
	 * unavailable on one node kept being reported as available by the others until
	 * the entry expired. It also let anything able to write to that cache remap a
	 * string storage id onto the numeric id - and hence the file cache - of
	 * another storage.
	 */
	public function testMappingIsNotCachedBeyondTheRequest() {
		$this->assertFalse(
			(new \ReflectionClass(Storage::class))->hasProperty('distributedCache'),
			'the mapping is no longer kept in a memory cache'
		);

		// nothing in this class reaches for a cache factory any more
		$cacheFactory = $this->createMock(FixedCacheFactory::class);
		$cacheFactory->expects($this->never())->method('create');
		$cacheFactory->expects($this->never())->method('createLocal');
		$cacheFactory->expects($this->never())->method('createDistributed');
		$this->overwriteService('MemCacheFactory', $cacheFactory);

		try {
			$storage = new Storage($this->storageId);
			$this->assertSame(
				$storage->getNumericId(),
				Storage::getNumericStorageId($this->storageId)
			);
			$storage->setAvailability(false);
			Storage::remove($this->storageId);
			$this->assertFalse(Storage::exists($this->storageId));
		} finally {
			$this->restoreService('MemCacheFactory');
		}
	}
}
