<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $userManager;
	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $consoleInput;
	/** @var \PHPUnit_Framework_MockObject_MockObject */
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

	public function testWithValidDays() {
		$this->consoleInput->expects($this->once())
			->method('getArgument')
			->with('days')
			->willReturn(1);

		// Work with json output
		$this->consoleInput->expects($this->once())
			->method('getOption')
			->with('output')
			->willReturn(Base::OUTPUT_FORMAT_JSON);

		$this->userManager->expects($this->once())
			->method('callForSeenUsers');

		$this->consoleOutput->expects($this->once())
			->method('writeLn')
			->with($this->stringContains('['));

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

}
