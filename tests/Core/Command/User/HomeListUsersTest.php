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

use Doctrine\DBAL\ForwardCompatibility\DriverStatement;
use OC\Core\Command\User\HomeListUsers;
use OCP\IDBConnection;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class HomeListUsersTest
 *
 * @group DB
 */
class HomeListUsersTest extends TestCase {
	/** @var CommandTester */
	private $commandTester;

	/** @var IDBConnection | \PHPUnit\Framework\MockObject\MockObject */
	private $connection;

	protected function setUp(): void {
		parent::setUp();

		$this->connection = $this->getMockBuilder('\OC\DB\Connection')
			->disableOriginalConstructor()
			->getMock();
		$command = new HomeListUsers($this->connection);
		$this->commandTester = new CommandTester($command);
	}

	public function testCommandInput() {
		$homePath = '/path/to/homes';
		$uid = 'user1';

		$resultMock = $this->createMock(DriverStatement::class);
		$resultMock->method('fetch')->willReturnOnConsecutiveCalls(['user_id' => $uid], false);
		$queryMock = $this->getMockBuilder('\OC\DB\QueryBuilder\QueryBuilder')
			->setConstructorArgs([$this->connection])
			->setMethods(['execute'])
			->getMock();
		$queryMock->method('execute')->willReturn($resultMock);
		$this->connection->method('getQueryBuilder')->willReturn($queryMock);

		$this->commandTester->execute(['path' => $homePath]);
		$output = $this->commandTester->getDisplay();
		$this->assertStringContainsString($uid, $output);
	}
}
