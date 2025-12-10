<?php
/**
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

use OC\Core\Command\User\HomeListDirs;
use OCP\IUser;
use OCP\IUserManager;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class HomeListDirsTest
 */
class HomeListDirsTest extends TestCase {
	/** @var CommandTester */
	private $commandTester;

	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject */
	private $userManager;

	protected function setUp(): void {
		parent::setUp();

		$this->userManager = $this->createMock(IUserManager::class);

		$command = new HomeListDirs($this->userManager);
		$this->commandTester = new CommandTester($command);
	}

	public function objectStorageProvider() {
		return [
			[true],
			[false],
		];
	}

	/**
	 * @dataProvider objectStorageProvider
	 * @param bool $objectStorageUsed
	 * @return void
	 */
	public function testCommandInput($objectStorageUsed) {
		if ($objectStorageUsed) {
			$this->overwriteConfigWithObjectStorage();
			$this->overwriteAppManagerWithObjectStorage();
		}

		$homePath = '/path/to/homes';
		$user1Mock = $this->createMock(IUser::class);
		$user1Mock->method('getHome')->willReturn("$homePath/user1");
		$user2Mock = $this->createMock(IUser::class);
		$user2Mock->method('getHome')->willReturn("$homePath/user2");

		$this->userManager->method('search')->willReturn([$user1Mock, $user2Mock]);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertStringContainsString($homePath, $output);

		if ($objectStorageUsed) {
			$this->assertStringContainsString('We detected that the instance is running on a S3 primary object storage, home directories might not be accurate', $output);
		}
	}

	protected function tearDown(): void {
		$this->restoreService('AllConfig');
		$this->restoreService('AppManager');
		parent::tearDown();
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
}
