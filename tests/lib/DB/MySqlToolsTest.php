<?php

/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace Test\DB;

use OCP\IDBConnection;
use Doctrine\DBAL\Driver\Statement;
use OC\DB\MySqlTools;
use Doctrine\DBAL\Platforms\MySQL80Platform;
use OC\DB\Connection;

/**
 * Class MySqlToolsTest
 */
class MySqlToolsTest extends \Test\TestCase {

	/**
	 * @var IDBConnection
	 */
	private $db;

	/**
	 * @var MySqlTools
	 */

	public function setUp() {
		parent::setUp();

		$this->db = $this->createMock(Connection::class);
		$this->tools = new MySqlTools();
	}

	public function providesDbVars() {
		return [
			[
				['innodb_file_format' => 'Barracuda', 'innodb_large_prefix' => 'ON', 'innodb_file_per_table' => 'ON'], true,
				['innodb_file_format' => 'Barracuda', 'innodb_large_prefix' => 'ON', 'innodb_file_per_table' => 'OFF'], false,
				['innodb_file_format' => 'Antelope', 'innodb_large_prefix' => 'ON', 'innodb_file_per_table' => 'ON'], false,
				['innodb_file_format' => 'Barracuda', 'innodb_large_prefix' => 'OFF', 'innodb_file_per_table' => 'ON'], false,
			],
		];
	}

	private function mockDatabaseVars($vars) {
		$map = [];
		foreach ($vars as $key => $value) {
			$statementMock = $this->createMock(Statement::class);
			$statementMock->expects($this->once())->method('fetch')->willReturn(['Value' => $value]);
			$map[] = ["SHOW VARIABLES LIKE '$key'", [], [], null, $statementMock];
		}
		// mock vars
		$this->db->expects($this->any())
			->method('executeQuery')
			->will($this->returnValueMap($map));
	}

	private function mockDatabaseEmptyVars() {
		$statementMock = $this->createMock(Statement::class);
		$statementMock->expects($this->any())->method('fetch')->willReturn(false);

		$this->db->expects($this->any())
			->method('executeQuery')
			->willReturn($statementMock);
	}

	/**
	 * Test barracuda detection based on MySQL vars
	 *
	 * @dataProvider providesDbVars
	 * @param array $vars
	 * @param bool $expectedResult
	 */
	public function testMb4WithBarracuda($vars, $expectedResult) {
		$this->mockDatabaseVars($vars);

		$this->assertEquals($expectedResult, $this->tools->supports4ByteCharset($this->db));
	}

	public function testDetectMb4WithMySQL8() {
		$this->mockDatabaseEmptyVars();

		$this->db->expects($this->once())
		   ->method('getDatabasePlatform')
		   ->willReturn($this->createMock(MySQL80Platform::class));

		$this->assertTrue($this->tools->supports4ByteCharset($this->db));
	}

	public function providesVersionString() {
		return [
			['10.3.2-oracle', false],
			['10.3.0-mariadb', false],
			['mariadb-10.3.0', false],
			['10.3.1-mariadb', true],
			['mariadb-10.3.1', true],
		];
	}

	/**
	 * Tests whether MariaDB 10.3 is properly detected.
	 *
	 * @dataProvider providesVersionString
	 * @param string $versionString
	 * @param bool $expectedResult
	 */
	public function testDetectMb4WithMariaDB103($versionString, $expectedResult) {
		$this->mockDatabaseEmptyVars();

		$this->db->expects($this->once())
		   ->method('getDatabaseVersionString')
		   ->willReturn($versionString);

		$this->assertEquals($expectedResult, $this->tools->supports4ByteCharset($this->db));
	}
}
