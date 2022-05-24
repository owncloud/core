<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files\Cache;

use OC\Files\Storage\Temporary;
use OCP\Files\Cache\ICacheEntry;
use OCP\Files\Storage\IStorage;
use Test\TestCase;

/**
 * @group DB
 */
class PropagatorTest extends TestCase {
	/** @var  IStorage */
	private $storage;

	public function setUp(): void {
		parent::setUp();
		$this->storage = new Temporary();
		$this->storage->mkdir('foo/bar');
		$this->storage->file_put_contents('foo/bar/file.txt', 'bar');
		$this->storage->getScanner()->scan('');
	}

	/**
	 * @param $paths
	 * @return ICacheEntry[]
	 */
	private function getFileInfos($paths) {
		$values = \array_map(function ($path) {
			return $this->storage->getCache()->get($path);
		}, $paths);
		return \array_combine($paths, $values);
	}

	public function testEtagPropagation() {
		$paths = ['', 'foo', 'foo/bar'];
		$oldInfos = $this->getFileInfos($paths);
		$this->storage->getPropagator()->propagateChange('foo/bar/file.txt', \time());
		$newInfos = $this->getFileInfos($paths);

		foreach ($oldInfos as $i => $oldInfo) {
			$this->assertNotEquals($oldInfo->getEtag(), $newInfos[$i]->getEtag());
		}
	}

	public function testTimePropagation() {
		$paths = ['', 'foo', 'foo/bar'];
		$oldTime = \time() - 200;
		$targetTime = \time() - 100;
		$now = \time();
		$cache = $this->storage->getCache();
		$cache->put('', ['mtime' => $now]);
		$cache->put('foo', ['mtime' => $now]);
		$cache->put('foo/bar', ['mtime' => $oldTime]);
		$cache->put('foo/bar/file.txt', ['mtime' => $oldTime]);
		$this->storage->getPropagator()->propagateChange('foo/bar/file.txt', $targetTime);
		$newInfos = $this->getFileInfos($paths);

		$this->assertEquals($targetTime, $newInfos['foo/bar']->getMTime());

		// dont lower mtimes
		$this->assertEquals($now, $newInfos['foo']->getMTime());
		$this->assertEquals($now, $newInfos['']->getMTime());
	}

	public function testSizePropagation() {
		$paths = ['', 'foo', 'foo/bar'];
		$oldInfos = $this->getFileInfos($paths);
		$this->storage->getPropagator()->propagateChange('foo/bar/file.txt', \time(), 10);
		$newInfos = $this->getFileInfos($paths);

		foreach ($oldInfos as $i => $oldInfo) {
			$this->assertEquals($oldInfo->getSize() + 10, $newInfos[$i]->getSize());
		}
	}

	public function getParentsProvider() {
		return [
			['', []],
			['foo', ['']],
			['foo/bar', ['', 'foo']],
			['foo/bar/baz.txt', ['', 'foo', 'foo/bar']]
		];
	}

	/**
	 * @dataProvider getParentsProvider
	 * @param $path
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function testGetParents($path, $expected) {
		$propagator = $this->storage->getPropagator();
		self::assertSame($expected, self::invokePrivate($propagator, 'getParents', [$path]));
	}

	public function testBatchedPropagation() {
		$this->storage->mkdir('foo/baz');
		$this->storage->mkdir('asd');
		$this->storage->file_put_contents('asd/file.txt', 'bar');
		$this->storage->file_put_contents('foo/baz/file.txt', 'bar');
		$this->storage->getScanner()->scan('');

		$paths = ['', 'foo', 'foo/bar', 'asd', 'foo/baz'];

		$oldInfos = $this->getFileInfos($paths);
		$propagator = $this->storage->getPropagator();

		// start at a later time because the above scanned elements have a recent mtime,
		// we want to be sure that the propagated values are in the future
		$time = \time() + 3600;
		$time1 = $time - 100;
		$time2 = $time - 200;

		$propagator->beginBatch();
		$propagator->propagateChange('asd/file.txt', $time1 - 500, 6);
		$propagator->propagateChange('foo/bar/file.txt', $time2, 2);

		// add again to simulate another change,
		// the mtime will be the one from the last change
		// and the size will be 10 because 4 is the delta, so 6 + 4 = 10
		$propagator->propagateChange('asd/file.txt', $time1, 4);

		$newInfos = $this->getFileInfos($paths);

		// no changes until we finish the batch
		foreach ($oldInfos as $i => $oldInfo) {
			$this->assertEquals($oldInfo->getSize(), $newInfos[$i]->getSize());
			$this->assertEquals($oldInfo->getEtag(), $newInfos[$i]->getEtag());
			$this->assertEquals($oldInfo->getMTime(), $newInfos[$i]->getMTime());
		}

		$propagator->commitBatch();

		$newInfos = $this->getFileInfos($paths);

		foreach ($oldInfos as $i => $oldInfo) {
			if ($oldInfo->getPath() !== 'foo/baz') {
				$this->assertNotEquals($oldInfo->getEtag(), $newInfos[$i]->getEtag());
			}
		}

		$this->assertEquals($oldInfos['']->getSize() + 12, $newInfos['']->getSize());
		$this->assertEquals($oldInfos['asd']->getSize() + 10, $newInfos['asd']->getSize());
		$this->assertEquals($time1, $newInfos['asd']->getMtime());
		$this->assertEquals($oldInfos['foo']->getSize() + 2, $newInfos['foo']->getSize());
		$this->assertEquals($time2, $newInfos['foo']->getMtime());
		$this->assertEquals($oldInfos['foo/bar']->getSize() + 2, $newInfos['foo/bar']->getSize());
		$this->assertEquals($time2, $newInfos['foo/bar']->getMtime());
		$this->assertEquals($oldInfos['foo/baz']->getSize(), $newInfos['foo/baz']->getSize());
		$this->assertNotEquals($time2, $newInfos['foo/baz']->getMtime());
		$this->assertEquals($oldInfos['foo/baz']->getMtime(), $newInfos['foo/baz']->getMtime());
	}
}
