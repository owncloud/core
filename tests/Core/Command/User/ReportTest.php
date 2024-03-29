<?php
/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 * @author Jannik Stehle <jstehle@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace Tests\Core\Command\User;

use OC\Core\Command\User\Report;
use OC\Helper\UserTypeHelper;
use OCP\IUserManager;
use OCP\IUser;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class ReportTest
 *
 * @group DB
 */
class ReportTest extends TestCase {
	/** @var CommandTester */
	private $commandTester;

	/** @var IUserManager */
	private $userManager;

	/** @var UserTypeHelper */
	private $userTypeHelper;

	private $isObjectStorage = false;

	protected function setUp(): void {
		parent::setUp();
		$this->userManager = $this->createMock(IUserManager::class);
		$this->userTypeHelper = $this->createMock(UserTypeHelper::class);

		$command = new Report($this->userManager, $this->userTypeHelper);
		$this->commandTester = new CommandTester($command);
	}

	protected function tearDown(): void {
		parent::tearDown();
		if ($this->isObjectStorage) {
			$this->restoreService('AllConfig');
			$this->restoreService('AppManager');
			$this->isObjectStorage = false;
		}
	}

	private function getAllUsers() {
		$uids = [
			'user001' => ['home' => '/tmp'],
			'user002' => ['home' => '/tmp'],
			'user003' => ['home' => '/tmp'],
			'user004' => ['home' => '/tmp'],
			'user005' => ['home' => '/tmp'],
			'user006' => ['home' => '/tmp'],
		];

		$users = [];
		foreach ($uids as $uid => $data) {
			$user = $this->createMock(IUser::class);
			$user->method('getUID')->willReturn($uid);
			if ($this->isObjectStorage) {
				$user->method('getHome')->willReturn('/some/missing/home/dir');
			} else {
				// there is a "is_dir" check, so the directory must exists in the FS
				// we'll use the "/tmp" directory
				$user->method('getHome')->willReturn($data['home']);
			}
			$users[] = $user;
		}
		return $users;
	}

	public function testCommandInputObjectStorage() {
		$this->prepareForObjectStorage();

		$this->userTypeHelper->method('isGuestUser')
			->will($this->returnValueMap([
				['user001', false],
				['user002', false],
				['user003', false],
				['user004', false],
				['user005', true],
				['user006', true],
			]));

		$this->userManager->method('countUsers')->willReturn([
			'OC\User\Database' => 2,
			'Custom\Class' => 4,
		]);
		$this->userManager->method('callForSeenUsers')
			->will($this->returnCallback(function ($seenUserCallbck) {
				$allUsers = $this->getAllUsers();
				foreach ($allUsers as $user) {
					$seenUserCallbck($user);
				}
			}));
		$this->userManager->method('callForAllUsers')
			->will($this->returnCallback(function ($allUserCallback) {
				$allUsers = $this->getAllUsers();
				foreach ($allUsers as $user) {
					$allUserCallback($user);
				}
			}));

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();

		$expectedOutput = <<<EOS
+------------------+---+
| User Report      |   |
+------------------+---+
| OC\User\Database | 2 |
| Custom\Class     | 4 |
|                  |   |
| guest users      | 2 |
|                  |   |
| total users      | 6 |
|                  |   |
| user directories | 0 |
+------------------+---+

EOS;
		$this->assertStringContainsString('We detected that the instance is running on a S3 primary object storage, user directories count might not be accurate', $output);
		$this->assertStringContainsString($expectedOutput, $output);
	}

	public function testCommandInput() {
		$this->userTypeHelper->method('isGuestUser')
			->will($this->returnValueMap([
				['user001', false],
				['user002', false],
				['user003', false],
				['user004', false],
				['user005', true],
				['user006', true],
			]));

		$this->userManager->method('countUsers')->willReturn([
			'OC\User\Database' => 2,
			'Custom\Class' => 4,
		]);
		$this->userManager->method('callForSeenUsers')
			->will($this->returnCallback(function ($seenUserCallbck) {
				$allUsers = $this->getAllUsers();
				foreach ($allUsers as $user) {
					$seenUserCallbck($user);
				}
			}));
		$this->userManager->method('callForAllUsers')
			->will($this->returnCallback(function ($allUserCallback) {
				$allUsers = $this->getAllUsers();
				foreach ($allUsers as $user) {
					$allUserCallback($user);
				}
			}));

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();

		$expectedOutput = <<<EOS
+------------------+---+
| User Report      |   |
+------------------+---+
| OC\User\Database | 2 |
| Custom\Class     | 4 |
|                  |   |
| guest users      | 2 |
|                  |   |
| total users      | 6 |
|                  |   |
| user directories | 6 |
+------------------+---+

EOS;
		$this->assertStringContainsString($expectedOutput, $output);
	}

	private function overwriteConfigWithObjectStorage() {
		$config = $this->createMock('\OCP\IConfig');
		$config->expects($this->any())
			->method('getSystemValue')
			->willReturn(['objectstore' => true]);

		$this->overwriteService('AllConfig', $config);
	}

	private function overwriteAppManagerWithObjectStorage() {
		$config = $this->createMock('\OCP\App\IAppManager');
		$config->expects($this->any())
			->method('isEnabledForUser')
			->willReturn(true);

		$this->overwriteService('AppManager', $config);
	}

	private function prepareForObjectStorage() {
		$this->overwriteConfigWithObjectStorage();
		$this->overwriteAppManagerWithObjectStorage();
		$this->isObjectStorage = true;
	}
}
