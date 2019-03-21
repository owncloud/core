<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

use OC\Core\Command\Base;
use OC\Core\Command\User\Inactive;
use OCP\IUser;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Test\TestCase;

class InactiveTest extends TestCase {

	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $userManager;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $consoleInput;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $consoleOutput;

	/** @var \Symfony\Component\Console\Command\Command */
	protected $command;

	protected function setUp() {
		parent::setUp();

		$userManager = $this->userManager = $this->getMockBuilder('OCP\IUserManager')
			->disableOriginalConstructor()
			->getMock();
		$this->consoleInput = $this->createMock('Symfony\Component\Console\Input\InputInterface');
		$this->consoleOutput = $this->createMock('Symfony\Component\Console\Output\OutputInterface');

		/** @var \OCP\IUserManager $userManager */
		$this->command = new Inactive($userManager);
	}

	public function invalidDays() {
		return [
			[0],
			['test'],
			[-1]
		];
	}

	/**
	 * @dataProvider invalidDays
	 */
	public function testWithInvalidDays($days) {
		$this->consoleInput->expects($this->once())
			->method('getArgument')
			->with('days')
			->willReturn($days);

		$this->expectException(InvalidArgumentException::class);

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}
	
	protected function dummyUser($lastLogin) {
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('getLastLogin')
			->willReturn($lastLogin);
		
		return $user;
	}

	public function validDays() {
		return [
			'no users' => [[], 10, 0],
			'1 recent user, excluded' => [[$this->dummyUser(\time()-2*24*60*60)], 10, 0],
			'1 recent user, included' => [[$this->dummyUser(\time()-2*24*60*60)], 1, 1],
			'2 users 1 included' => [
				[
					$this->dummyUser(\time()-5*24*60*60),
					$this->dummyUser(\time()-10*24*60*60)
				], 7, 1],
		];
	}

	/**
	 * @dataProvider validDays
	 *
	 * @param $users
	 * @param $days
	 * @param $expectedCount
	 */
	public function testWithValidDays($users, $days, $expectedCount) {
		$this->consoleInput->expects($this->once())
			->method('getArgument')
			->with('days')
			->willReturn($days);

		// Work with json output
		$this->consoleInput->expects($this->once())
			->method('getOption')
			->with('output')
			->willReturn(Base::OUTPUT_FORMAT_JSON);

		$this->userManager->expects($this->once())
			->method('callForSeenUsers')
			->willReturnCallback(function ($callback) use ($users, $expectedCount) {
				foreach ($users as $user) {
					$callback($user);
				}
			});

		$this->consoleOutput->expects($this->once())
			->method('writeLn')
			->with($this->callback(function ($output) use ($expectedCount) {
				return self::isJson($output) && \count(\json_decode($output)) === $expectedCount;
			}));

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}
}
