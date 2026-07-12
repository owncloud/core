<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
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
namespace Test\IntegrityCheck\Helpers;

use OC\IntegrityCheck\Helpers\FileAccessHelper;
use Test\TestCase;

class FileAccessHelperTest extends TestCase {
	/** @var FileAccessHelper */
	private $fileAccessHelper;

	public function setUp(): void {
		parent::setUp();
		$this->fileAccessHelper = new FileAccessHelper();
	}

	public function testReadAndWrite() {
		$tempManager = \OC::$server->getTempManager();
		$filePath = $tempManager->getTemporaryFile();
		$data = 'SomeDataGeneratedByIntegrityCheck';

		$this->fileAccessHelper->file_put_contents($filePath, $data);
		$this->assertSame($data, $this->fileAccessHelper->file_get_contents($filePath));
	}

	public function testGetDirectoryContent() {
		$tempManager = \OC::$server->getTempManager();
		$tempDir = $tempManager->getTemporaryFolder();

		// Create some test files
		$this->fileAccessHelper->file_put_contents($tempDir . '/file1.txt', 'content1');
		$this->fileAccessHelper->file_put_contents($tempDir . '/file2.txt', 'content2');

		// Create a subdirectory (should not be listed)
		\mkdir($tempDir . '/subdir');

		$files = $this->fileAccessHelper->getDirectoryContent($tempDir);

		$this->assertContains('file1.txt', $files);
		$this->assertContains('file2.txt', $files);
		$this->assertNotContains('subdir', $files);
		$this->assertNotContains('.', $files);
		$this->assertNotContains('..', $files);
	}

	public function testGetDirectoryContentNonExistentDir() {
		$result = $this->fileAccessHelper->getDirectoryContent('/nonexistent/directory/path');
		$this->assertIsArray($result);
		$this->assertEmpty($result);
	}
}
