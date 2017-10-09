<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017 ownCloud GmbH
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

namespace Tests\Core\Command\Migrate;


use OC\Core\Command\Migrate\DavProperties;
use OC\Core\Command\User\Delete;
use Test\TestCase;

/**
 * Class DeleteTest
 *
 * @package Tests\Core\Command\Migrate
 * @group DB
 */
class DeleteTest extends TestCase {
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
		$this->consoleInput = $this->getMock('Symfony\Component\Console\Input\InputInterface');
		$this->consoleOutput = $this->getMock('Symfony\Component\Console\Output\OutputInterface');

		$connection = \OC::$server->getDatabaseConnection();
		$this->command = new DavProperties($userManager, $connection);
	}

	public function testDatabaseFix() {
		// Check that the database is correctly adjusted
		$this->invokePrivate($this->command, 'output', [$this->consoleOutput]);
		$this->invokePrivate($this->command, 'fixDatabase');
	}
}
