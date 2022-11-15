<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\Files_Trashbin\Tests\BackgroundJob;

use Closure;
use OCA\Files_Trashbin\BackgroundJob\ExpireTrash;
use OCA\Files_Trashbin\TrashExpiryManager;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\IUser;
use OCP\IUserManager;
use Test\TestCase;

/**
 * Test ExpireTrashTest
 */
class ExpireTrashTest extends TestCase {
	/**
	 * @var TrashExpiryManager | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $trashExpiryManager;

	/**
	 * @var IConfig | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $config;

	/**
	 * @var IUserManager | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $userManager;

	/**
	 * @var ExpireTrash | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $backgroundJob;

	/**
	 * Setup testcase
	 */
	protected function setUp(): void {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->trashExpiryManager = $this->createMock(TrashExpiryManager::class);
		$this->backgroundJob = $this->getMockBuilder(ExpireTrash::class)
			->enableOriginalConstructor()
			->setConstructorArgs([$this->config, $this->userManager, $this->trashExpiryManager])
			->setMethods(['setupFS', 'tearDownFS'])
			->getMock();
	}

	/**
	 * Test that command will not be executed when no retention enabled
	 */
	public function testExpiryByRetentionDisabled() {
		$this->trashExpiryManager->expects($this->once())
			->method('retentionEnabled')
			->willReturn(false);

		$this->trashExpiryManager->expects($this->never())
			->method('expireTrashByRetention');

		$this->config->expects($this->never())
			->method('getAppValue');

		$this->backgroundJob->execute($this->createMock(IJobList::class));
		$this->assertTrue(true);
	}

	/**
	 * Test cases for testExpiryByRetention
	 */
	public function providesExpiryByRetention() {
		return [
			// test that only 500 users out of 600 will be scanned,
			// and offset will be set to 500
			[600, 0, true, 500, 500],
			// test that only 200 users out of 600 will be scanned,
			// and offset will be reset to 0
			[600, 400, true, 0, 200],
			// test that if there is no trashbin folder for user,
			// no expiry is called
			[600, 0, false, 500, 0],
		];
	}

	/**
	 * @param $usersCount
	 * @param $usersOffset
	 * @param $usersHaveTrashbin
	 * @param $expectedEndOffset
	 * @param
	 *
	 * @dataProvider providesExpiryByRetention
	 */
	public function testExpiryByRetention($usersCount, $usersOffset, $usersHaveTrashbin, $expectedEndOffset, $expectedExpiries) {
		$this->trashExpiryManager->expects($this->once())
			->method('retentionEnabled')
			->willReturn(true);
		$this->trashExpiryManager->expects($this->exactly($expectedExpiries))
			->method('expireTrashByRetention');

		$this->config->expects($this->once())
			->method('getAppValue')
			->with('files_trashbin', 'cronjob_trash_expiry_offset', '0')
			->willReturn($usersOffset);

		$offsetSetCalls = 0;
		$this->config->expects($this->any())
			->method('setAppValue')
			->with('files_trashbin', 'cronjob_trash_expiry_offset')
			->willReturnCallback(function ($app, $key, $value) use (&$offsetSetCalls, $usersOffset, $expectedExpiries, $expectedEndOffset) {
				$offsetSetCalls++;
				if ($offsetSetCalls <= $expectedExpiries) {
					// assert that offset is increased while expiration progresses
					$this->assertEquals($usersOffset+$offsetSetCalls, $value);
				} else {
					// if there are more calls then expected expiries,
					// assert expected end offset
					$this->assertEquals($expectedEndOffset, $value);
				}
			});

		$this->userManager->expects($this->once())
			->method('callForUsers')
			->willReturnCallback(function (Closure $callback, $search, $onlySeen, $limit, $offset) use ($usersCount) {
				for ($i = $offset; $i < $usersCount; ++$i) {
					if ($i >= $offset + $limit) {
						break;
					}
					$user = $this->createMock(IUser::class);
					$user->expects($this->once())
						->method('getUID')
						->willReturn('user'.$i);
					$callback($user);
				}
				return true;
			});

		$this->backgroundJob->expects($this->any())
			->method('setupFS')
			->willReturn($usersHaveTrashbin);
		$this->backgroundJob->expects($this->once())
			->method('tearDownFS');

		$this->backgroundJob->execute($this->createMock(IJobList::class));

		$this->assertTrue(true);
	}
}
