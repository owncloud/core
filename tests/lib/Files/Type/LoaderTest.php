<?php
/**
 * @author Robin McCorkell <rmccorkell@owncloud.com>
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

namespace Test\Files\Type;

use OC\Files\Type\Loader;
use OCP\IDBConnection;
use OCP\ICache;
use Test\Memcache\FixedCacheFactory;

class LoaderTest extends \Test\TestCase {
	/** @var IDBConnection */
	protected $db;
	/** @var Loader */
	protected $loader;
	/** @var ICache */
	protected $memcache;
	/** @var FixedCacheFactory */
	protected $cacheFactory;

	protected function setUp(): void {
		$this->memcache = $this->createMock(ICache::class);
		$this->cacheFactory = new FixedCacheFactory($this->memcache);

		$this->db = \OC::$server->getDatabaseConnection();
		$this->loader = new Loader($this->db, $this->cacheFactory);
	}

	protected function tearDown(): void {
		$deleteMimetypes = $this->db->getQueryBuilder();
		$deleteMimetypes->delete('mimetypes')
			->where($deleteMimetypes->expr()->like(
				'mimetype',
				$deleteMimetypes->createPositionalParameter('testing/%')
			));
		$deleteMimetypes->execute();
	}

	public function testGetMimetype() {
		$qb = $this->db->getQueryBuilder();
		$qb->insert('mimetypes')
			->values([
				'mimetype' => $qb->createPositionalParameter('testing/mymimetype')
			]);
		$qb->execute();

		$this->assertTrue($this->loader->exists('testing/mymimetype'));
		$mimetypeId = $this->loader->getId('testing/mymimetype');
		$this->assertNotNull($mimetypeId);

		$mimetype = $this->loader->getMimetypeById($mimetypeId);
		$this->assertEquals('testing/mymimetype', $mimetype);
	}

	public function testGetNonexistentMimetype() {
		$this->assertFalse($this->loader->exists('testing/nonexistent'));
		// hopefully this ID doesn't exist
		$this->assertNull($this->loader->getMimetypeById(12345));
	}

	public function testStore() {
		$this->assertFalse($this->loader->exists('testing/mymimetype'));
		$mimetypeId = $this->loader->getId('testing/mymimetype');

		$qb = $this->db->getQueryBuilder();
		$qb->select('mimetype')
			->from('mimetypes')
			->where($qb->expr()->eq('id', $qb->createPositionalParameter($mimetypeId)));

		$mimetype = $qb->execute()->fetchAssociative();
		$this->assertEquals('testing/mymimetype', $mimetype['mimetype']);

		$this->assertEquals('testing/mymimetype', $this->loader->getMimetypeById($mimetypeId));
		$this->assertEquals($mimetypeId, $this->loader->getId('testing/mymimetype'));
	}

	public function testStoreExists() {
		$mimetypeId = $this->loader->getId('testing/mymimetype');
		$mimetypeId2 = $this->loader->getId('testing/mymimetype');

		$this->assertEquals($mimetypeId, $mimetypeId2);
	}

	/**
	 * The mimetype map is derived from the database of this instance, so it
	 * belongs in the local tier - not in a distributed cache that anything able
	 * to reach it could remap.
	 */
	public function testUsesTheLocalCacheTier() {
		$cacheFactory = $this->createMock(FixedCacheFactory::class);
		$cacheFactory->expects($this->once())
			->method('createLocal')
			->with('mimetypes')
			->willReturn($this->createMock(ICache::class));
		$cacheFactory->expects($this->never())->method('createDistributed');
		$cacheFactory->expects($this->never())->method('create');

		new Loader($this->db, $cacheFactory);
	}

	/**
	 * Nothing invalidates the cache of the other nodes, so entries have to
	 * expire on their own.
	 */
	public function testCachedEntriesExpire() {
		$this->memcache->expects($this->atLeastOnce())
			->method('set')
			->with(
				$this->anything(),
				$this->anything(),
				Loader::CACHE_TTL
			);

		$this->loader->getId('testing/mymimetype');
	}
}
