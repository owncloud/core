<?php
/**
 * @copyright Copyright (c) 2022, ownCloud GmbH
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

namespace Test\Files\Stream;

use OC\Files\Stream\Checksum;
use Test\TestCase;
use org\bovigo\vfs\vfsStream;

class ChecksumTest extends \Test\TestCase {
	private $root;
	private $fileList = [];

	protected function setUp(): void {
		parent::setUp();

		Checksum::resetChecksums();
		$this->root = vfsStream::setup();
	}

	protected function tearDown(): void {
		foreach ($this->fileList as $file) {
			\unlink($file->url());
		}
		parent::tearDown();
	}

	private function getVfsFile($filename) {
		$vfsFile = vfsStream::newFile($filename)->at($this->root);
		$this->fileList[] = $vfsFile;
		return $vfsFile;
	}

	public function testRead() {
		$content = 'random text to fill bytes';
		$filename = 'test001.txt';

		$file = $this->getVfsFile($filename);
		$file->setContent($content);
		$fp = Checksum::wrap(\fopen($file->url(), 'rb'), $filename);

		$contentRead = stream_get_contents($fp);
		\fclose($fp);
		$this->assertSame('random text to fill bytes', $contentRead);

		$expectedChecksums = [
			'sha1' => \sha1($contentRead),
			'md5' => \md5($contentRead),
			'adler32' => \hash('adler32', $contentRead),
		];
		$checksums = Checksum::getChecksums($filename);
		$this->assertEquals($expectedChecksums, $checksums);
	}

	public function testSkipRead() {
		$content = 'random text to fill bytes';
		$filename = 'test001.txt';

		$file = $this->getVfsFile($filename);
		$file->setContent($content);
		$fp = Checksum::wrap(\fopen($file->url(), 'rb'), $filename);

		\fseek($fp, 10, SEEK_SET);
		$contentRead = stream_get_contents($fp);
		\fclose($fp);
		$this->assertSame('t to fill bytes', $contentRead);  // skipped content

		$expectedChecksums = [];
		$checksums = Checksum::getChecksums($filename);
		$this->assertEquals($expectedChecksums, $checksums);
		$this->assertSame(0, \count($checksums));
	}

	public function testUnfinishedRead() {
		// NOTE: `fread` will request chunks of 8KB to the underlying stream even if
		// the function will only return the number of bytes asked by the caller.
		// Since the 8KB isn't enough to read the whole content in this test, the
		// checksums won't be available.
		$content = 'random text to fill bytes' . \str_repeat('abc', 10000);
		$filename = 'test001.txt';

		$file = $this->getVfsFile($filename);
		$file->setContent($content);
		$fp = Checksum::wrap(\fopen($file->url(), 'rb'), $filename);

		$contentRead = \fread($fp, 10);
		\fclose($fp);
		$this->assertSame('random tex', $contentRead);  // skipped content

		$expectedChecksums = [];
		$checksums = Checksum::getChecksums($filename);
		$this->assertEquals($expectedChecksums, $checksums);
		$this->assertSame(0, \count($checksums));
	}

	public function testUnfinishedReadButFullChunk() {
		// NOTE: `fread` will request chunks of 8KB to the underlying stream even if
		// the function will only return the number of bytes asked by the caller.
		// This means that `fread` will read the whole content but return only 10B
		// in this test case.
		// Since the checksum stream has read the whole file (content is < 8KB),
		// checksums are available
		$content = 'random text to fill bytes';
		$filename = 'test001.txt';

		$file = $this->getVfsFile($filename);
		$file->setContent($content);
		$fp = Checksum::wrap(\fopen($file->url(), 'rb'), $filename);

		$contentRead = \fread($fp, 10);
		\fclose($fp);
		$this->assertSame('random tex', $contentRead);  // skipped content

		$expectedChecksums = [
			'sha1' => \sha1($content),
			'md5' => \md5($content),
			'adler32' => \hash('adler32', $content),
		];
		$checksums = Checksum::getChecksums($filename);
		$this->assertEquals($expectedChecksums, $checksums);
	}

	public function testJumpRead() {
		// NOTE: Second `fread` might still bring the whole file for checksum if
		// the content is less than 8KB
		$content = 'random text to fill bytes' . \str_repeat('abc', 10000);
		$filename = 'test001.txt';

		$file = $this->getVfsFile($filename);
		$file->setContent($content);
		$fp = Checksum::wrap(\fopen($file->url(), 'rb'), $filename);

		$contentRead = \fread($fp, 10);
		\fseek($fp, 3, SEEK_CUR);
		$contentRead .= \fread($fp, 100);
		\fclose($fp);
		$expectedContent = \substr($content, 0, 10) . \substr($content, 13, 100);
		$this->assertSame($expectedContent, $contentRead);  // skipped content

		$expectedChecksums = [];
		$checksums = Checksum::getChecksums($filename);
		$this->assertEquals($expectedChecksums, $checksums);
		$this->assertSame(0, \count($checksums));
	}

	public function testWrite() {
		$content = 'random text to fill bytes';
		$filename = 'test001.txt';

		$file = $this->getVfsFile($filename);
		$fp = Checksum::wrap(\fopen($file->url(), 'wb'), $filename);

		$contentWritten = \fwrite($fp, $content);
		\fclose($fp);
		$this->assertSame(\strlen($content), $contentWritten);

		$expectedChecksums = [
			'sha1' => \sha1($content),
			'md5' => \md5($content),
			'adler32' => \hash('adler32', $content),
		];
		$checksums = Checksum::getChecksums($filename);
		$this->assertEquals($expectedChecksums, $checksums);
	}

	public function testAppend() {
		// Append won't return checksums because there could be content
		// the wouldn't be evaluated
		$content = 'random text to fill bytes';
		$filename = 'test001.txt';

		$file = $this->getVfsFile($filename);
		$file->setContent($content);
		$fp = Checksum::wrap(\fopen($file->url(), 'ab'), $filename);

		$contentWritten = \fwrite($fp, "{$content}zzz");
		\fclose($fp);
		$this->assertSame(\strlen($content) + 3, $contentWritten);

		$expectedChecksums = [];
		$checksums = Checksum::getChecksums($filename);
		$this->assertEquals($expectedChecksums, $checksums);
	}
}
