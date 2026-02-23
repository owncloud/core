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

namespace Tests\Core\Command\Db;

use Doctrine\DBAL\Result;
use OC\Core\Command\Db\RestoreDefaultRowFormat;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use Doctrine\DBAL\Platforms\MySQLPlatform;
use OC\DB\ConnectionFactory;
use OCP\IConfig;
use OCP\IDBConnection;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class RestoreDefaultRowFormatTest
 */
class RestoreDefaultRowFormatTest extends TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ConnectionFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $connectionFactory;
	/** @var CommandTester */
	private $commandTester;
	/** @var \Doctrine\DBAL\Connection | \PHPUnit\Framework\MockObject\MockObject */
	private $connection;

	protected function setUp(): void {
		parent::setUp();
		$this->connection = $this->getMockBuilder(IDBConnection::class)->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)
			->getMock();
		$this->connectionFactory = $this->getMockBuilder(ConnectionFactory::class)
			->disableOriginalConstructor()
			->getMock();
	}

	public function testWrongPlatform() {
		$platform = $this->getMockBuilder(SqlitePlatform::class)->getMock();
		$this->connection->expects($this->once())->method('getDatabasePlatform')->willReturn($platform);

		$command = new RestoreDefaultRowFormat(
			$this->config,
			$this->connection,
		);
		$this->commandTester = new CommandTester($command);
		$this->commandTester->execute([]);

		$output = $this->commandTester->getDisplay();
		$this->assertStringContainsString('This command is only valid for MySQL/MariaDB databases', $output);
	}

	public function testConversion() {
		$platform = $this->getMockBuilder(MySQLPlatform::class)->getMock();
		$this->connection->expects($this->once())->method('getDatabasePlatform')->willReturn($platform);
		$this->config->expects($this->exactly(2))->method('getSystemValue')
			->will($this->returnValueMap([
				['dbtableprefix', 'oc_'],
				['dbname', 'oc']
			]));
		$statement = $this->getMockBuilder(Result::class)->getMock();
		$statement->expects($this->once())->method('fetchColumn')->willReturn('dynamic');
		$statement->expects($this->once())->method('fetchAll')->willReturn(
			[
				['name' => 'oc_users', 'format' => 'compressed'], ['name' => 'oc_accounts', 'format' => 'compressed']
			]
		);
		$this->connection->expects($this->exactly(2))->method('executeQuery')->willReturn($statement);
		$this->connection->expects($this->exactly(2))->method('prepare')->willReturn($statement);

		$command = new RestoreDefaultRowFormat(
			$this->config,
			$this->connection,
		);
		$this->commandTester = new CommandTester($command);
		$this->commandTester->execute([]);

		$output = $this->commandTester->getDisplay();
		$this->assertStringContainsString('Found 2 tables to convert', $output);
		$this->assertStringContainsString("Converting table 'oc_users' with row format 'compressed' to default value 'dynamic'", $output);
		$this->assertStringContainsString("Converting table 'oc_accounts' with row format 'compressed' to default value 'dynamic'", $output);
		$this->assertStringContainsString('Conversion done', $output);
	}
}
