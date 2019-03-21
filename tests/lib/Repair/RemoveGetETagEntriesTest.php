<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace Test\Repair;

use OC\Repair\RemoveGetETagEntries;
use OCP\Migration\IOutput;
use Test\TestCase;

/**
 * Class RemoveGetETagEntriesTest
 *
 * @group DB
 *
 * @package Test\Repair
 */
class RemoveGetETagEntriesTest extends TestCase {
	/** @var \OCP\IDBConnection */
	protected $connection;

	protected function setUp() {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
	}

	public function testRun() {
		$data = [
			['100500', '{DAV:}getetag', 'abcdef'],
			['100500',  '{DAV:}anotherRandomProperty', 'ghi'],
		];

		// insert test data
		$sqlToInsertProperties = 'INSERT INTO `*PREFIX*properties` (`fileid`, `propertyname`, `propertyvalue`) VALUES (?, ? ,?)';
		foreach ($data as $entry) {
			$this->connection->executeUpdate($sqlToInsertProperties, $entry);
		}

		// check if test data is written to DB
		$sqlToFetchProperties = 'SELECT `fileid`, `propertyname`, `propertyvalue` FROM `*PREFIX*properties` WHERE `fileid` = ?';
		$stmt = $this->connection->executeQuery($sqlToFetchProperties, ['100500']);
		$entries = $stmt->fetchAll(\PDO::FETCH_NUM);

		$this->assertCount(2, $entries, 'Asserts that two entries are returned as we have inserted two');
		foreach ($entries as $entry) {
			$this->assertContains($entry, $data, 'Asserts that the entries are the ones from the test data set');
		}

		/** @var IOutput | \PHPUnit\Framework\MockObject\MockObject $outputMock */
		$outputMock = $this->getMockBuilder('\OCP\Migration\IOutput')
			->disableOriginalConstructor()
			->getMock();

		// run repair step
		$repair = new RemoveGetETagEntries($this->connection);
		$repair->run($outputMock);

		// check if test data is correctly modified in DB
		$stmt = $this->connection->executeQuery($sqlToFetchProperties, ['100500']);
		$entries = $stmt->fetchAll(\PDO::FETCH_NUM);

		$this->assertCount(1, $entries, 'Asserts that only one entry is returned after the repair step - the other one has to be removed');
		//cast int to string to prevent failure on postgre
		//see https://github.com/owncloud/core/pull/27280#issuecomment-283170051
		$entries[0][0] = (string) $entries[0][0];
		$this->assertSame($data[1], $entries[0], 'Asserts that the returned entry is the correct one from the test data set');

		// remove test data
		$sqlToRemoveProperties = 'DELETE FROM `*PREFIX*properties` WHERE `fileid` = ?';
		$this->connection->executeUpdate($sqlToRemoveProperties, ['100500']);
	}
}
