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
namespace Test\Memcache;

use OC\Memcache\ArrayCache;
use OC\Memcache\Factory;
use OC\Memcache\LocalCacheFactory;
use OC\Memcache\NullCache;
use OCP\ICache;
use OCP\ICacheFactory;
use OCP\ILogger;
use Test\TestCase;

class LocalCacheFactoryTest extends TestCase {
	/** @var ILogger */
	private $logger;

	protected function setUp(): void {
		parent::setUp();
		$this->logger = $this->createMock(ILogger::class);
	}

	public function testUsesTheLocalTier(): void {
		$factory = new Factory(
			'prefix',
			$this->logger,
			ArrayCache::class,
			NullCache::class,
			null
		);

		$cache = LocalCacheFactory::create($factory, 'test');

		$this->assertInstanceOf(ArrayCache::class, $cache);
	}

	/**
	 * The distributed tier must not be used as a fallback: that is exactly the
	 * trust boundary this helper exists to keep.
	 */
	public function testNeverFallsBackToTheDistributedTier(): void {
		$factory = new Factory(
			'prefix',
			$this->logger,
			null,
			ArrayCache::class,
			null
		);
		// no local cache configured, so the local tier is a NullCache ...
		$this->assertInstanceOf(NullCache::class, $factory->createLocal('test'));

		// ... and the helper substitutes a request scoped cache instead
		$cache = LocalCacheFactory::create($factory, 'test');
		$this->assertInstanceOf(ArrayCache::class, $cache);

		// prove it is not the distributed instance by writing through it
		$cache->set('key', 'value');
		$this->assertSame('value', $cache->get('key'));
		$this->assertNull($factory->createDistributed('test')->get('key'));
	}

	public function testFallsBackWhenCreateLocalIsNotImplemented(): void {
		// ICacheFactory does not declare createLocal(), so a bare interface
		// mock has no such method
		$factory = $this->createMock(ICacheFactory::class);

		$this->assertInstanceOf(ArrayCache::class, LocalCacheFactory::create($factory, 'test'));
	}

	/**
	 * @dataProvider unusableLocalCacheProvider
	 * @param mixed $returnValue
	 */
	public function testFallsBackWhenCreateLocalReturnsSomethingUnusable($returnValue): void {
		$factory = $this->createMock(FixedCacheFactory::class);
		$factory->method('createLocal')->willReturn($returnValue);

		$this->assertInstanceOf(ArrayCache::class, LocalCacheFactory::create($factory, 'test'));
	}

	public function unusableLocalCacheProvider() {
		return [
			'null' => [null],
			'a NullCache' => [new NullCache('test')],
		];
	}

	public function testPassesThroughThePrefix(): void {
		$factory = new FixedCacheFactory($this->createMock(ICache::class));

		LocalCacheFactory::create($factory, 'some-prefix');

		$this->assertSame(['some-prefix'], $factory->getRequestedPrefixes());
	}
}
