<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

use OC\Core\Command\User\Delete;
use OCP\IUserManager;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

class DeleteTest extends TestCase {

	/** @var \PHPUnit\Framework\MockObject\MockObject|IUserManager */
	protected $userManager;

	/** @var CommandTester */
	private $commandTester;

	protected function setUp() {
		parent::setUp();
		$this->userManager = $this->getMockBuilder('OCP\IUserManager')
			->disableOriginalConstructor()
			->getMock();

		$application = new Application(
			\OC::$server->getConfig(),
			\OC::$server->getEventDispatcher(),
			\OC::$server->getRequest()
		);

		$command = new Delete($this->userManager);
		$command->setApplication($application);
		$this->commandTester = new CommandTester($command);
	}

	public function validUserLastSeen() {
		return [
			[true, "User with uid 'user', display name 'Display Name', email 'email@host.tld' was deleted"],
			[false, "User with uid 'user', display name 'Display Name', email 'email@host.tld' could not be deleted"],
		];
	}

	/**
	 * @dataProvider validUserLastSeen
	 *
	 * @param bool $deleteSuccess
	 * @param string $expectedOutput
	 */
	public function testValidUser($deleteSuccess, $expectedOutput) {
		$user = $this->createMock('OCP\IUser');
		$user->expects($this->once())
			->method('delete')
			->willReturn($deleteSuccess);
		$user->expects($this->any())
			->method('getUID')
			->willReturn('user');
		$user->expects($this->any())
			->method('getDisplayName')
			->willReturn('Display Name');
		$user->expects($this->any())
			->method('getEMailAddress')
			->willReturn('email@host.tld');

		$this->userManager->expects($this->once())
			->method('get')
			->with('user')
			->willReturn($user);

		$this->commandTester->execute(['uid' => 'user']);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
	}

	public function testInvalidUser() {
		$this->userManager->expects($this->once())
			->method('get')
			->with('user')
			->willReturn(null);

		$this->commandTester->execute(['uid' => 'user']);
		$output = $this->commandTester->getDisplay();
		$this->assertContains("User with uid 'user' does not exist", $output);
	}
}
