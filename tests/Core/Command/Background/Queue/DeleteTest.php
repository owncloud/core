<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Tests\Core\Command\Background\Queue;

use OC\Core\Command\Background\Queue\Delete;
use OCP\BackgroundJob\IJobList;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class DeleteTest
 *
 * @group DB
 */
class DeleteTest extends TestCase {

	/** @var CommandTester */
	private $commandTester;
	/** @var IJobList */
	private $jobList;

	public function setUp() {
		parent::setUp();

		$this->jobList = $this->createMock(IJobList::class);
		$this->jobList->expects($this->any())->method('getById')
			->willReturnCallback(function ($id) {
				return ($id !== '666') ? true : null;
			});

		$command = new Delete($this->jobList);
		$this->commandTester = new CommandTester($command);
	}

	/**
	 * @dataProvider providesJobIds
	 * @param $jobId
	 * @param $expectedOutput
	 */
	public function testCommandInput($jobId, $expectedOutput) {
		$input = ['Job ID' => $jobId];
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
	}

	public function providesJobIds() {
		return [
			['666', 'Job with ID <666> is not known.'],
			['1', 'Job has been deleted.'],
		];
	}
}
