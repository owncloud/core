<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\Tests\Unit\TrashBin;

use OCA\DAV\TrashBin\TrashBinFile;
use OCA\DAV\TrashBin\TrashBinManager;
use OCP\Files\FileInfo;
use Test\TestCase;

class TrashBinFileTest extends TestCase {
	/**
	 * @var TrashBinFile
	 */
	private $trashBinFile;

	protected function setUp(): void {
		parent::setUp();
		$fileInfo = $this->createMock(FileInfo::class);
		$trashBinManager = $this->createMock(TrashBinManager::class);
		$this->trashBinFile = new TrashBinFile('alice', $fileInfo, $trashBinManager);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to write this file
	 */
	public function testPut() {
		$this->trashBinFile->put('');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to read this file
	 */
	public function testGet() {
		$this->trashBinFile->get();
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to rename this resource
	 */
	public function testSetName() {
		$this->trashBinFile->setName('');
	}
}
