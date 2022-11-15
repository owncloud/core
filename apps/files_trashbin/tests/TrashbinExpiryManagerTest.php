<?php
/**
 * @author Piotr Mrowczynski piotr@owncloud.com
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

namespace OCA\Files_Trashbin\Tests;

use OCA\Files_Trashbin\Expiration;
use OCA\Files_Trashbin\Helper;
use OCA\Files_Trashbin\Quota;
use OCA\Files_Trashbin\TrashExpiryManager;
use OCP\ILogger;

/**
 * Class TrashbinExpiryManagerTest
 *
 * Extend TrashbinTestCase as we need to use Trashbin class that
 * has static functions that cannot be mocked
 *
 * @group DB
 */
class TrashbinExpiryManagerTest extends TestCase {
	/**
	 * @var Expiration| \PHPUnit\Framework\MockObject\MockObject
	 */
	private $expiration;

	/**
	 * @var Quota| \PHPUnit\Framework\MockObject\MockObject
	 */
	private $quota;

	/**
	 * @var TrashExpiryManager
	 */
	private $trashExpiryManager;

	protected function setUp(): void {
		parent::setUp();

		$this->expiration = $this->createMock(Expiration::class);
		$this->quota = $this->createMock(Quota::class);
		$logger = $this->createMock(ILogger::class);
		$this->trashExpiryManager = new TrashExpiryManager(
			$this->expiration,
			$this->quota,
			$logger
		);

		self::loginHelper(self::TEST_TRASHBIN_USER1);
	}

	public function providesExpiryEnabled() {
		return [
			[true, true],
			[false, false]
		];
	}

	/**
	 * @dataProvider providesExpiryEnabled
	 */
	public function testExpiryEnabled($expirationEnabled, $result) {
		$this->expiration->expects($this->once())
			->method('isEnabled')
			->willReturn($expirationEnabled);

		$this->assertEquals($result, $this->trashExpiryManager->expiryEnabled());
	}

	public function providesRetentionEnabled() {
		return [
			[1000000, true],
			[false, false]
		];
	}

	/**
	 * @dataProvider providesRetentionEnabled
	 */
	public function testRetentionEnabled($expirationTimestamp, $result) {
		$this->expiration->expects($this->once())
			->method('getMaxAgeAsTimestamp')
			->willReturn($expirationTimestamp);

		$this->assertEquals($result, $this->trashExpiryManager->retentionEnabled());
	}

	/**
	 * test expiration of files older then the max storage time defined for the trash
	 */
	public function testExpireTrashByRetention() {
		// create some files
		\OC\Files\Filesystem::file_put_contents('file1.txt', 'file1');
		\OC\Files\Filesystem::file_put_contents('file2.txt', 'file2');
		\OC\Files\Filesystem::file_put_contents('file3.txt', 'file3');

		// delete them so that they end up in the trash bin
		\OC\Files\Filesystem::unlink('file1.txt');
		\OC\Files\Filesystem::unlink('file2.txt');
		\OC\Files\Filesystem::unlink('file3.txt');

		//make sure that files are in the trash bin
		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime', false);
		$this->assertCount(3, $filesInTrash);

		// simulate as 1 out of 3 files expired,
		// and next 2 do not need expiration
		$this->expiration->expects($this->exactly(2))
			->method('isExpired')
			->willReturnOnConsecutiveCalls(
				true,
				false
			);

		// call expire by retention
		$this->trashExpiryManager->expireTrashByRetention(self::TEST_TRASHBIN_USER1);

		$remainingFiles = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime', false);
		$this->assertCount(2, $remainingFiles);

		$this->assertEquals(
			\array_slice($filesInTrash, 1),
			$remainingFiles
		);
	}
	
	/**
	 * test expiration of files older then the max storage time defined for the trash
	 */
	public function testExpireTrashByRetentionAndSpace() {
		// create some files
		\OC\Files\Filesystem::file_put_contents('file1.txt', 'file1');
		\OC\Files\Filesystem::file_put_contents('file2.txt', 'file2');
		\OC\Files\Filesystem::file_put_contents('file3.txt', 'file3');

		// delete them so that they end up in the trash bin
		\OC\Files\Filesystem::unlink('file1.txt');
		\OC\Files\Filesystem::unlink('file2.txt');
		\OC\Files\Filesystem::unlink('file3.txt');

		//make sure that files are in the trash bin
		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime', false);
		$this->assertCount(3, $filesInTrash);

		// simulate as 1 out of 3 files expired
		$this->expiration->expects($this->exactly(3))
			->method('isExpired')
			->willReturnOnConsecutiveCalls(
				true,
				false,
				// in this case we are over quota, so true will be returned
				// even though file expiration date is ok
				true
			);

		// simulate as only 2 files need to be cleaned to satisfy quota
		$this->quota->expects($this->exactly(1))
			->method('calculateFreeSpace')
			->willReturn(-8);

		// call expire by retention
		$this->trashExpiryManager->expireTrash(self::TEST_TRASHBIN_USER1);

		$remainingFiles = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime', false);
		$this->assertCount(1, $remainingFiles);

		$this->assertEquals(
			\array_slice($filesInTrash, 2),
			$remainingFiles
		);
	}
}
