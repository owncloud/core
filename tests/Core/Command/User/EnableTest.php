<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

namespace Tests\Core\Command\User;

use OC\Core\Command\User\Enable;
use OCP\IUserManager;
use OCP\IUser;
use OCP\User\ShouldNotBeEnabledException;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class EnableTest
 *
 * @group DB
 */
class EnableTest extends TestCase {
	private $userManager;

	/** @var CommandTester */
	private $commandTester;

	protected function setUp() {
		parent::setUp();

		$this->userManager = $this->createMock(IUserManager::class);

		$command = new Enable($this->userManager);
		$this->commandTester = new CommandTester($command);
	}

	public function testEnableMissingUser() {
		$this->userManager->method('get')
			->willReturn(null);

		$this->assertSame(Enable::EXIT_CODE_USER_NOT_EXISTS, $this->commandTester->execute(['uid' => 'user1']));
	}

	public function testEnable() {
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('setEnabled')
			->with($this->equalTo(true));

		$this->userManager->method('get')
			->willReturn($user);
		$this->assertSame(0, $this->commandTester->execute(['uid' => 'user1']));
	}

	public function testWontBeEnabled() {
		$user = $this->createMock(IUser::class);
		$user->expects($this->never())
			->method('setEnabled');

		$this->userManager->method('get')
			->willReturn($user);
		$this->userManager->method('throwExceptionIfMightGetDisabled')
			->will($this->throwException(new ShouldNotBeEnabledException()));

		$this->assertSame(Enable::EXIT_CODE_USER_NOT_ENABLED, $this->commandTester->execute(['uid' => 'user1']));
	}
}
