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
	/**
	 * get a new archive for write testing
	 * @return \OC\Archive\Archive
	 */
	abstract protected function getNew();

	protected function tearDown(): void {
		if (\count($this->instance->getFiles()) === 0) {
			// make sure to leave the archive with something in it, otherwise PHP ZipArchive cleanup emits:
			// PHP Warning: Unknown: Cannot destroy the zip context: Can't remove file: No such file or directory in Unknown on line 0
			// which can cause the unit test run to finish with error status
			$textFile = $this->getArchiveTestDataDir() . '/lorem.txt';
			$this->instance->addFile('lorem.txt', $textFile);
		}
		parent::tearDown();
	}
	protected function getArchiveTestDataDir() {
		return \OC::$SERVERROOT . '/tests/data/archive';
	}

	public function testGetFiles() {
		$this->instance=$this->getExisting();
		$allFiles=$this->instance->getFiles();
		$expected= ['lorem.txt','logo-wide.png','dir/', 'dir/lorem.txt'];
		$this->assertCount(4, $allFiles, 'only found '.\count($allFiles).' out of 4 expected files');
		foreach ($expected as $file) {
			$this->assertContains($file, $allFiles, 'cant find '.  $file . ' in archive');
			$this->assertTrue($this->instance->fileExists($file), 'file '.$file.' does not exist in archive');
		}
		$this->assertFalse($this->instance->fileExists('non/existing/file'));

		$rootContent=$this->instance->getFolder('');
		$expected= ['lorem.txt','logo-wide.png', 'dir/'];
		$this->assertCount(3, $rootContent);
		foreach ($expected as $file) {
			$this->assertContains($file, $rootContent, 'cant find '.  $file . ' in archive');
		}

		$dirContent=$this->instance->getFolder('dir/');
		$expected= ['lorem.txt'];
		$this->assertCount(1, $dirContent);
		foreach ($expected as $file) {
			$this->assertContains($file, $dirContent, 'cant find '.  $file . ' in archive');
		}
	}

	public function testGetFilesFromEmptyArchive() {
		$this->instance=$this->getNew();
		$allFiles=$this->instance->getFiles();
		$this->assertCount(0, $allFiles, 'found ' . \count($allFiles) . ' files but expected no files');
	}

	public function testGetFilesFromEmptiedArchive() {
		$textFile = $this->getArchiveTestDataDir() . '/lorem.txt';
		$this->instance=$this->getNew();
		$this->instance->addFile('lorem.txt', $textFile);
		$this->instance->remove('lorem.txt');
		$allFiles=$this->instance->getFiles();
		$this->assertCount(0, $allFiles, 'found ' . \count($allFiles) . ' files but expected no files');
	}

	public function testContent() {
		$this->instance=$this->getExisting();
		$textFile = $this->getArchiveTestDataDir() . '/lorem.txt';
		$this->assertStringEqualsFile($textFile, $this->instance->getFile('lorem.txt'));

		$tmpFile=\OCP\Files::tmpFile('.txt');
		$this->instance->extractFile('lorem.txt', $tmpFile);
		$this->assertFileEquals($textFile, $tmpFile);
	}

	public function testWrite() {
		$textFile = $this->getArchiveTestDataDir() . '/lorem.txt';
		$this->instance=$this->getNew();
		$this->assertCount(0, $this->instance->getFiles());
		$this->instance->addFile('lorem.txt', $textFile);
		$this->assertCount(1, $this->instance->getFiles());
		$this->assertTrue($this->instance->fileExists('lorem.txt'));
		$this->assertFalse($this->instance->fileExists('lorem.txt/'));

		$this->assertStringEqualsFile($textFile, $this->instance->getFile('lorem.txt'));
		$this->instance->addFile('lorem.txt', 'foobar');
		$this->assertEquals('foobar', $this->instance->getFile('lorem.txt'));
	}

	public function testReadStream() {
		$textFile = $this->getArchiveTestDataDir() . '/lorem.txt';
		$this->instance=$this->getExisting();
		$fh=$this->instance->getStream('lorem.txt', 'r');
		$this->assertTrue((bool)$fh);
		$content=\fread($fh, $this->instance->filesize('lorem.txt'));
		\fclose($fh);
		$this->assertStringEqualsFile($textFile, $content);
	}
	public function testWriteStream() {
		$textFile = $this->getArchiveTestDataDir() . '/lorem.txt';
		$this->instance=$this->getNew();
		$fh=$this->instance->getStream('lorem.txt', 'w');
		$source=\fopen($textFile, 'r');
		\OCP\Files::streamCopy($source, $fh);
		\fclose($source);
		\fclose($fh);
		$this->assertTrue($this->instance->fileExists('lorem.txt'));
		$this->assertStringEqualsFile($textFile, $this->instance->getFile('lorem.txt'));
	}
	public function testFolder() {
		$this->instance=$this->getNew();
		$this->assertFalse($this->instance->fileExists('/test'));
		$this->assertFalse($this->instance->fileExists('/test/'));
		$this->instance->addFolder('/test');
		$this->assertTrue($this->instance->fileExists('/test'));
		$this->assertTrue($this->instance->fileExists('/test/'));
		$this->instance->remove('/test');
		$this->assertFalse($this->instance->fileExists('/test'));
		$this->assertFalse($this->instance->fileExists('/test/'));
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
	public function testMoveRemove() {
		$textFile = $this->getArchiveTestDataDir() . '/lorem.txt';
		$this->instance=$this->getNew();
		$this->instance->addFile('lorem.txt', $textFile);
		$this->assertFalse($this->instance->fileExists('target.txt'));
		$this->instance->rename('lorem.txt', 'target.txt');
		$this->assertTrue($this->instance->fileExists('target.txt'));
		$this->assertFalse($this->instance->fileExists('lorem.txt'));
		$this->assertStringEqualsFile($textFile, $this->instance->getFile('target.txt'));
		$this->instance->remove('target.txt');
		$this->assertFalse($this->instance->fileExists('target.txt'));
	}
	public function testRecursive() {
		$this->instance=$this->getNew();
		$this->instance->addRecursive('/dir', $this->getArchiveTestDataDir());
		$this->assertTrue($this->instance->fileExists('/dir/lorem.txt'));
		$this->assertTrue($this->instance->fileExists('/dir/data.zip'));
		$this->assertTrue($this->instance->fileExists('/dir/data.tar.gz'));
	}
}
