<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files\Storage\Wrapper;

use OCP\Files\Storage\IStorage;
use OCP\Files\Storage\IVersionedStorage;

class JailTest extends \Test\Files\Storage\Storage {

	/**
	 * @var \OC\Files\Storage\Temporary
	 */
	private $sourceStorage;

	public function setUp() {
		parent::setUp();
		$this->sourceStorage = new \OC\Files\Storage\Temporary([]);
		$this->sourceStorage->mkdir('foo');
		$this->instance = new \OC\Files\Storage\Wrapper\Jail([
			'storage' => $this->sourceStorage,
			'root' => 'foo'
		]);
	}

	public function tearDown() {
		// test that nothing outside our jail is touched
		$contents = [];
		$dh = $this->sourceStorage->opendir('');
		while ($file = \readdir($dh)) {
			if (!\OC\Files\Filesystem::isIgnoredDir($file)) {
				$contents[] = $file;
			}
		}
		$this->assertEquals(['foo'], $contents);
		$this->sourceStorage->cleanUp();
		parent::tearDown();
	}

	public function testMkDirRooted() {
		$this->instance->mkdir('bar');
		$this->assertTrue($this->sourceStorage->is_dir('foo/bar'));
	}

	public function testFilePutContentsRooted() {
		$this->instance->file_put_contents('bar', 'asd');
		$this->assertEquals('asd', $this->sourceStorage->file_get_contents('foo/bar'));
	}

	public function providesVersionMethods() {
		return [
			['getContentOfVersion', 1014],
			['restoreVersion', 1014],
			['saveVersion'],
			['getVersions'],
			['getVersion', 1014],
		];
	}

	/**
	 * @dataProvider providesVersionMethods
	 */
	public function testCallsSourceVersionMethods($method, $extraArg = null) {
		$sourceStorage = $this->createMock([IStorage::class, IVersionedStorage::class]);
		$instance = new \OC\Files\Storage\Wrapper\Jail([
			'storage' => $sourceStorage,
			'root' => 'foo'
		]);

		$matcher = $sourceStorage->expects($this->once())
			->method($method);
		// FIXME: normalize path...
		if ($extraArg !== null) {
			$matcher = $matcher->with('foo//bar', $extraArg);
		} else {
			$matcher = $matcher->with('foo//bar');
		}
		$matcher->willReturn('returnValue');

		$this->assertEquals('returnValue', $instance->$method('/bar', $extraArg));
	}
}
