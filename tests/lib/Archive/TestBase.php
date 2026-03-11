<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Archive;

abstract class TestBase extends \Test\TestCase {
	/**
	 * @var \OC\Archive\Archive
	 */
	protected $instance;

	/**
	 * get the existing test archive
	 * @return \OC\Archive\Archive
	 */
	abstract protected function getExisting();

	protected function getArchiveTestDataDir() {
		return \OC::$SERVERROOT . '/tests/data/archive';
	}

	public function testExtract() {
		$textFile = $this->getArchiveTestDataDir() . '/lorem.txt';
		$this->instance=$this->getExisting();
		$tmpDir=\OCP\Files::tmpFolder();
		$this->instance->extract($tmpDir);
		$this->assertFileExists($tmpDir.'lorem.txt');
		$this->assertFileExists($tmpDir.'dir/lorem.txt');
		$this->assertFileExists($tmpDir.'logo-wide.png');
		$this->assertFileEquals($textFile, $tmpDir.'lorem.txt');
		\OCP\Files::rmdirr($tmpDir);
	}
}
