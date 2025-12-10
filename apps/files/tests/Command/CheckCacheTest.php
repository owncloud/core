<?php
/**
 * @author Juan Pablo Villafáñez Ramos <jvillafanez@solidgeargroup.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Files\Tests\Command;

use OCA\Files\Command\CheckCache;
use OCP\Files\IRootFolder;
use OCP\Files\Folder;
use OCP\Files\File;
use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 *
 * @package OCA\Files\Tests\Command
 */
class CheckCacheTest extends TestCase {
	/** @var IRootFolder */
	private $rootFolder;
	/** @var CheckCache */
	private $command;
	/**@var CommandTester */
	private $commandTester;

	protected function setUp(): void {
		parent::setUp();
		$this->rootFolder = $this->createMock(IRootFolder::class);

		$this->command = new CheckCache($this->rootFolder);
		$this->commandTester = new CommandTester($this->command);
	}

	public function testMissingTargetFile() {
		$userFolder = $this->createMock(Folder::class);
		$userFolder->method('get')
			->will($this->throwException(new NotFoundException()));

		$this->rootFolder->method('getUserFolder')->willReturn($userFolder);

		$this->commandTester->execute([
			'uid' => 'testUser1',
			'target-file' => 'nonexistent.txt'
		]);
		$this->assertSame(CheckCache::ERROR_MISSING_FILE, $this->commandTester->getStatusCode());
	}

	public function testTargetFileIsShared() {
		$targetFile = $this->createMock(File::class);
		$targetFile->method('isShared')->willReturn(true);

		$userFolder = $this->createMock(Folder::class);
		$userFolder->method('get')->willReturn($targetFile);

		$this->rootFolder->method('getUserFolder')->willReturn($userFolder);

		$this->commandTester->execute([
			'uid' => 'testUser1',
			'target-file' => 'target.txt'
		]);
		$this->assertSame(0, $this->commandTester->getStatusCode());
	}

	public function testTargetFileNotHome() {
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')->willReturn(false);

		$targetFile = $this->createMock(File::class);
		$targetFile->method('isShared')->willReturn(false);
		$targetFile->method('getStorage')->willReturn($storage);
		$targetFile->expects($this->never())
			->method('delete');

		$userFolder = $this->createMock(Folder::class);
		$userFolder->method('get')->willReturn($targetFile);

		$this->rootFolder->method('getUserFolder')->willReturn($userFolder);

		$this->commandTester->execute([
			'uid' => 'testUser1',
			'target-file' => 'target.txt'
		]);
		$this->assertSame(0, $this->commandTester->getStatusCode());
	}

	public function testTargetFileNotFile() {
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')->willReturn(true);

		$targetFile = $this->createMock(Folder::class);
		$targetFile->method('isShared')->willReturn(false);
		$targetFile->method('getStorage')->willReturn($storage);
		$targetFile->expects($this->never())
			->method('delete');

		$userFolder = $this->createMock(Folder::class);
		$userFolder->method('get')->willReturn($targetFile);

		$this->rootFolder->method('getUserFolder')->willReturn($userFolder);

		$this->commandTester->execute([
			'uid' => 'testUser1',
			'target-file' => 'target.txt'
		]);
		$this->assertSame(CheckCache::ERROR_NOT_A_FILE, $this->commandTester->getStatusCode());
	}

	public function testTargetFileStillAccessible() {
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')->willReturn(true);

		$resource = \fopen('php://memory', 'rb');

		$targetFile = $this->createMock(File::class);
		$targetFile->method('isShared')->willReturn(false);
		$targetFile->method('getStorage')->willReturn($storage);
		$targetFile->method('fopen')->willReturn($resource);
		$targetFile->expects($this->never())
			->method('delete');

		$userFolder = $this->createMock(Folder::class);
		$userFolder->method('get')->willReturn($targetFile);

		$this->rootFolder->method('getUserFolder')->willReturn($userFolder);

		$this->commandTester->execute([
			'uid' => 'testUser1',
			'target-file' => 'target.txt'
		]);
		$this->assertSame(0, $this->commandTester->getStatusCode());
	}

	public function testTargetFileCannotOpen() {
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')->willReturn(true);

		$targetFile = $this->createMock(File::class);
		$targetFile->method('isShared')->willReturn(false);
		$targetFile->method('getStorage')->willReturn($storage);
		$targetFile->method('fopen')->willReturn(false);
		$targetFile->expects($this->never())
			->method('delete');

		$userFolder = $this->createMock(Folder::class);
		$userFolder->method('get')->willReturn($targetFile);

		$this->rootFolder->method('getUserFolder')->willReturn($userFolder);

		$this->commandTester->execute([
			'uid' => 'testUser1',
			'target-file' => 'target.txt'
		]);
		$this->assertSame(CheckCache::ERROR_CANNOT_OPEN, $this->commandTester->getStatusCode());
	}

	public function testTargetFileCannotOpenDelete() {
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')->willReturn(true);

		$targetFile = $this->createMock(File::class);
		$targetFile->method('isShared')->willReturn(false);
		$targetFile->method('getStorage')->willReturn($storage);
		$targetFile->method('fopen')->willReturn(false);
		$targetFile->expects($this->once())
			->method('delete');

		$userFolder = $this->createMock(Folder::class);
		$userFolder->method('get')->willReturn($targetFile);

		$this->rootFolder->method('getUserFolder')->willReturn($userFolder);

		$this->commandTester->execute([
			'uid' => 'testUser1',
			'target-file' => 'target.txt',
			'--remove' => null,
		]);
		$this->assertSame(0, $this->commandTester->getStatusCode());
	}
}
