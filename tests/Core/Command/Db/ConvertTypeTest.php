<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace Tests\Core\Command\Db;

use OC\App\AppManager;
use OC\Core\Command\Db\ConvertType;
use OC\DB\ConnectionFactory;
use OCP\IConfig;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class ConvertTypeTest
 *
 * @group DB
 */
class ConvertTypeTest extends TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ConnectionFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $connectionFactory;

	/** @var AppManager | \PHPUnit\Framework\MockObject\MockObject */
	private $appManager;

	/** @var CommandTester */
	private $commandTester;

	/** @var \Doctrine\DBAL\Connection */
	private $connection;

	protected function setUp() {
		parent::setUp();
		$this->connection = \OC::$server->getDatabaseConnection();
		$this->config = $this->getMockBuilder(IConfig::class)
			->getMock();
		$this->appManager = $this->getMockBuilder(AppManager::class)
			->disableOriginalConstructor()
			->getMock();
		$this->connectionFactory = $this->getMockBuilder(ConnectionFactory::class)
			->disableOriginalConstructor()
			->getMock();
	}

	/**
	 * @expectedException \Doctrine\DBAL\DBALException
	 */
	public function testWrongConnectionParams() {
		if (!$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\SqlitePlatform) {
			$this->markTestSkipped("Test only relevant on Sqlite");
		}

		$params = [
			'type' => 'mysql',
			'hostname' => 'localhost',
			'username' => 'dumb',
			'database' => 'convertdb',
			'--password' => 'test'
		];
		$command = new ConvertType(
			\OC::$server->getConfig(),
			new ConnectionFactory(\OC::$server->getSystemConfig()),
			\OC::$server->getAppManager()
		);
		$this->commandTester = new CommandTester($command);
		$this->commandTester->execute($params);
	}

	public function testSkipMissingApps() {
		$command = new ConvertType(
			$this->config,
			$this->connectionFactory,
			$this->appManager
		);

		$this->appManager->expects($this->any())
			->method('getAllApps')
			->will($this->returnValue([
				'firstapp', 'anotherapp', 'brokenapp', 'niceapp', 'brokenapp2', 'lastapp'
			]));

		$this->appManager->expects($this->any())
			->method('getAppPath')
			->will(
				$this->returnCallback(
					function ($appId) {
						$isBroken = \strpos($appId, 'broken') === 0;
						return $isBroken ? false : $appId;
					}
				)
			);

		$existingApps = \array_values($this->invokePrivate($command, 'getExistingApps', [false]));
		$this->assertEquals(
			['firstapp', 'anotherapp', 'niceapp', 'lastapp'],
			$existingApps
		);
	}

	public function testSaveDBInfo() {
		$command = new ConvertType(
			$this->config,
			$this->connectionFactory,
			$this->appManager
		);

		$this->config->expects($this->once())
			->method('setSystemValues');

		$this->invokePrivate($command, 'saveDBInfo', []);
	}
}
