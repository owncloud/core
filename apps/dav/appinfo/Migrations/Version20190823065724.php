<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\dav\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\IDBConnection;
use OCP\Migration\ISchemaMigration;

/**
 * Add NULL constraint to fileid column for properties table.
 * The fileid column should not accept null values in the properties table.
 */
class Version20190823065724 implements ISchemaMigration {
	/** @var IDBConnection  */
	private $dbConnection;

	public function __construct(IDBConnection $dbConnection) {
		$this->dbConnection = $dbConnection;
	}

	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		$table = $schema->getTable("${prefix}properties");
		$column = $table->getColumn('fileid');
		/**
		 * If the fileid column's notnull is set to false then
		 * make sure before altering the column, that no entry
		 * in the table has fileid with null. Else the migration
		 * would fail. The below check does the same.
		 */
		if ($column->getNotnull() !== true) {
			$qb = $this->dbConnection->getQueryBuilder();
			$qb->delete('properties')
				->where($qb->expr()->isNull('fileid'));
			$qb->execute();

			$table->changeColumn('fileid', [
				'notnull' => true,
			]);
		}
	}
}
