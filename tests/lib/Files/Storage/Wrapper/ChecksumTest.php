<?php
/**
 * @author Ilja Neumann <ineumann@owncloud.com>
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

namespace Test\Files\Storage\Wrapper;

use OC\Files\Storage\Wrapper\Checksum;

/**
 * @group DB
 */
class ChecksumTest extends \Test\TestCase {
	/**
	 * @var \OC\Files\Storage\Temporary
	 */
	private $sourceStorage;
	/**
	 * @var Checksum
	 */
	private $instance;

	private $testFileName;

	const TEST_DATA = 'somedata';
	const EXPECTED_CHECKSUMS = 'SHA1:efaa311ae448a7374c122061bfed952d940e9e37 MD5:aefaf7502d52994c3b01957636a3cdd2 ADLER32:0f2c034f';

	public function setUp() {
		parent::setUp();
		$this->sourceStorage = new \OC\Files\Storage\Temporary([]);
		$this->instance = new \OC\Files\Storage\Wrapper\Checksum([
			'storage' => $this->sourceStorage
		]);

		$this->testFileName = '/'. \bin2hex(\random_bytes(4)) . '.txt';
	}

	public function testFilePutContentsCalculatesChecksum() {
		$this->instance->file_put_contents($this->testFileName, 'somedata');
		$metaData = $this->instance->getMetaData($this->testFileName);

		$this->assertArrayHasKey('checksum', $metaData);
		$this->assertEquals(self::EXPECTED_CHECKSUMS, $metaData['checksum']);
	}

	public function testWriteToFileHandleCalculatesChecksum() {
		$handle = $this->instance->fopen($this->testFileName, 'w');

		$this->assertInternalType('resource', $handle);
		$this->assertNotFalse(\fwrite($handle, self::TEST_DATA));
		$this->assertNotFalse(\fclose($handle));

		$metaData = $this->instance->getMetaData($this->testFileName);

		$this->assertArrayHasKey('checksum', $metaData);
		$this->assertEquals(self::EXPECTED_CHECKSUMS, $metaData['checksum']);
	}

	public function testReadFromFileHandleOnNewFileCalculatesChecksum() {
		$this->sourceStorage->file_put_contents($this->testFileName, self::TEST_DATA);
		// Make file available in filecache (without checksum)
		$this->sourceStorage->getScanner($this->testFileName)->scan($this->testFileName);

		$handle = $this->instance->fopen($this->testFileName, 'r');
		$data = \fread($handle, $this->sourceStorage->filesize($this->testFileName));
		\fclose($handle);

		$this->assertEquals(self::TEST_DATA, $data);

		$metaData = $this->instance->getMetaData($this->testFileName);

		$this->assertArrayHasKey('checksum', $metaData);
		$this->assertEquals(self::EXPECTED_CHECKSUMS, $metaData['checksum']);
	}

	public function testNoChecksumForPartFile() {
		$this->sourceStorage->file_put_contents('/foo.part', self::TEST_DATA);
		$metaData = $this->instance->getMetaData('/foo.part');

		$this->assertEquals(
			$metaData,
			['checksum' => '', 'mimetype' => 'application/octet-stream']
		);
	}

	/**
	 * @depends testFilePutContentsCalculatesChecksum
	 */
	public function testFileChangeChangesChecksum() {
		$this->instance->file_put_contents($this->testFileName, self::TEST_DATA);
		$this->instance->file_put_contents($this->testFileName, 'otherdata');

		$metaData = $this->instance->getMetaData($this->testFileName);

		$this->assertEquals(
			"SHA1:693301c930b242611c005b00c151cc216259f1bd MD5:e4de345997131e5fa4421c3b2a9edddb ADLER32:12fc03bd",
			$metaData['checksum']
		);
	}

	public function testChecksumWrapperIsNotAppliedOnReadWriteStreams() {
		$handle = $this->instance->fopen($this->testFileName, 'x+');
		\fwrite($handle, self::TEST_DATA);
		\fclose($handle);

		$metaData = $this->instance->getMetaData($this->testFileName);

		$this->assertEmpty($metaData['checksum']);
	}

	/**
	 * @depends testFilePutContentsCalculatesChecksum
	 */
	public function testRewindDoesNotCorruptChecksum() {
		$this->instance->file_put_contents($this->testFileName, self::TEST_DATA);
		$handle = $this->instance->fopen($this->testFileName, 'r+');
		\fread($handle, $this->sourceStorage->filesize($this->testFileName));
		\rewind($handle);
		\fread($handle, $this->sourceStorage->filesize($this->testFileName));
		\fclose($handle);

		$metaData = $this->instance->getMetaData($this->testFileName);

		$this->assertEquals(
			self::EXPECTED_CHECKSUMS,
			$metaData['checksum']
		);
	}
}
