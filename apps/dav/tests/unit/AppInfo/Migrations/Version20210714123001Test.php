<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@owncloud.com>
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

namespace OCA\DAV\Tests\unit\AppInfo\Migrations;

use OCA\DAV\Migrations\Version20210714123001;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\Table;
use OCP\Migration\ISchemaMigration;
use Test\TestCase;

require_once(\str_replace('/dav/tests/unit/AppInfo/', '/dav/appinfo/', __DIR__) . '/Version20210714123001.php');

class Version20210714123001Test extends TestCase {
	/** @var ISchemaMigration */
	private $migration;

	protected function setUp(): void {
		$this->migration = new Version20210714123001();
	}

	public function testChangeSchema() {
		$columnNames = ['addressbookid', 'name'];
		$tableMock = $this->createMock(Table::class);
		$tableMock->expects($this->once())
			->method('columnsAreIndexed')
			->with($this->equalTo($columnNames))
			->willReturn(false);

		$schemaMock = $this->createMock(Schema::class);
		$schemaMock->expects($this->once())
			->method('hasTable')
			->with($this->stringContains('cards_properties'))
			->willReturn(true);
		$schemaMock->expects($this->once())
			->method('getTable')
			->with($this->stringContains('cards_properties'))
			->willReturn($tableMock);

		$tableMock->expects($this->once())
			->method('addIndex')
			->with($this->equalTo($columnNames), $this->equalTo('card_bookid_name_index'));
		$this->migration->changeSchema($schemaMock, ['tablePrefix' => 'oc_']);
	}

	public function testChangeSchemaIndexAdded() {
		$columnNames = ['addressbookid', 'name'];
		$tableMock = $this->createMock(Table::class);
		$tableMock->expects($this->once())
			->method('columnsAreIndexed')
			->with($this->equalTo($columnNames))
			->willReturn(true);

		$schemaMock = $this->createMock(Schema::class);
		$schemaMock->expects($this->once())
			->method('hasTable')
			->with($this->stringContains('cards_properties'))
			->willReturn(true);
		$schemaMock->expects($this->once())
			->method('getTable')
			->with($this->stringContains('cards_properties'))
			->willReturn($tableMock);

		$tableMock->expects($this->never())
			->method('addIndex');
		$this->migration->changeSchema($schemaMock, ['tablePrefix' => 'oc_']);
	}
}
