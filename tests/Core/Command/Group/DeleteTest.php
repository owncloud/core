<?php
/**
 * @author Phil Davis <phil@jankaritech.com>
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

namespace Tests\Core\Command\Group;

use OC\Core\Command\Group\Delete;
use Test\TestCase;

class DeleteTest extends TestCase {
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $groupManager;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $consoleInput;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $consoleOutput;

	/** @var \Symfony\Component\Console\Command\Command */
	protected $command;

	protected function setUp() {
		parent::setUp();

		$groupManager = $this->groupManager = $this->getMockBuilder('OCP\IGroupManager')
			->disableOriginalConstructor()
			->getMock();
		$this->consoleInput = $this->createMock('Symfony\Component\Console\Input\InputInterface');
		$this->consoleOutput = $this->createMock('Symfony\Component\Console\Output\OutputInterface');

		/** @var \OCP\IGroupManager $groupManager */
		$this->command = new Delete($groupManager);
	}

	public function validGroupLastSeen() {
		return [
			[true, 'The specified group was deleted'],
			[false, 'The specified group could not be deleted'],
		];
	}

	/**
	 * @dataProvider validGroupLastSeen
	 *
	 * @param bool $deleteSuccess
	 * @param string $expectedString
	 */
	public function testValidGroup($deleteSuccess, $expectedString) {
		$group = $this->createMock('OCP\IGroup');
		$group->expects($this->once())
			->method('delete')
			->willReturn($deleteSuccess);

		$this->groupManager->expects($this->once())
			->method('get')
			->with('group')
			->willReturn($group);

		$this->consoleInput->expects($this->once())
			->method('getArgument')
			->with('group')
			->willReturn('group');

		$this->consoleOutput->expects($this->once())
			->method('writeln')
			->with($this->stringContains($expectedString));

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	public function testInvalidGroup() {
		$this->groupManager->expects($this->once())
			->method('get')
			->with('group')
			->willReturn(null);

		$this->consoleInput->expects($this->once())
			->method('getArgument')
			->with('group')
			->willReturn('group');

		$this->consoleOutput->expects($this->once())
			->method('writeln')
			->with($this->stringContains('Group does not exist'));

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}
}
