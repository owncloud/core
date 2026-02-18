<?php
/**
 * @author Robin McCorkell <rmccorkell@karoshi.org.uk>
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
namespace Test\Memcache;

use OC\HintException;
use OC\Memcache\Factory;
use Test\TestCase;
use OCP\ILogger;

class Test_Factory_Available_Cache1 {
	public function __construct($prefix = '') {
	}

	public static function isAvailable(): true {
		return true;
	}
}

class Test_Factory_Available_Cache2 {
	public function __construct($prefix = '') {
	}

	public static function isAvailable(): true {
		return true;
	}
}

class Test_Factory_Unavailable_Cache1 {
	public function __construct($prefix = '') {
	}

	public static function isAvailable(): false {
		return false;
	}
}

class Test_Factory_Unavailable_Cache2 {
	public function __construct($prefix = '') {
	}

	public static function isAvailable(): false {
		return false;
	}
}

class FactoryTest extends TestCase {
	public const AVAILABLE1 = '\\Test\\Memcache\\Test_Factory_Available_Cache1';
	public const AVAILABLE2 = '\\Test\\Memcache\\Test_Factory_Available_Cache2';
	public const UNAVAILABLE1 = '\\Test\\Memcache\\Test_Factory_Unavailable_Cache1';
	public const UNAVAILABLE2 = '\\Test\\Memcache\\Test_Factory_Unavailable_Cache2';

	public function cacheAvailabilityProvider(): array {
		return [
			[
				// local and distributed available
				self::AVAILABLE1, self::AVAILABLE2, null,
				self::AVAILABLE1, self::AVAILABLE2, Factory::NULL_CACHE
			],
			[
				// local and distributed null
				null, null, null,
				Factory::NULL_CACHE, Factory::NULL_CACHE, Factory::NULL_CACHE
			],
			[
				// local available, distributed null (most common scenario)
				self::AVAILABLE1, null, null,
				self::AVAILABLE1, self::AVAILABLE1, Factory::NULL_CACHE
			],
			[
				// locking cache available
				null, null, self::AVAILABLE1,
				Factory::NULL_CACHE, Factory::NULL_CACHE, self::AVAILABLE1
			],
			[
				// locking cache unavailable: no exception here in the factory
				null, null, self::UNAVAILABLE1,
				Factory::NULL_CACHE, Factory::NULL_CACHE, Factory::NULL_CACHE
			]
		];
	}

	public function cacheUnavailableProvider(): array {
		return [
			[
				// local available, distributed unavailable
				self::AVAILABLE1, self::UNAVAILABLE1
			],
			[
				// local unavailable, distributed available
				self::UNAVAILABLE1, self::AVAILABLE1
			],
			[
				// local and distributed unavailable
				self::UNAVAILABLE1, self::UNAVAILABLE2
			],
		];
	}

	/**
	 * @dataProvider cacheAvailabilityProvider
	 */
	public function testCacheAvailability(
		$localCache,
		$distributedCache,
		$lockingCache,
		$expectedLocalCache,
		$expectedDistributedCache,
		$expectedLockingCache
	): void {
		$logger = $this->getMockBuilder(ILogger::class)->getMock();
		$factory = new Factory('abc', $logger, $localCache, $distributedCache, $lockingCache);
		$this->assertTrue(\is_a($factory->createLocal(), $expectedLocalCache));
		$this->assertTrue(\is_a($factory->createDistributed(), $expectedDistributedCache));
		$this->assertTrue(\is_a($factory->createLocking(), $expectedLockingCache));
	}

	/**
	 * @dataProvider cacheUnavailableProvider
	 */
	public function testCacheNotAvailableException($localCache, $distributedCache): void {
		$this->expectException(HintException::class);

		$logger = $this->getMockBuilder(ILogger::class)->getMock();
		new Factory('abc', $logger, $localCache, $distributedCache);
	}
}
