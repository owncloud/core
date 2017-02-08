<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\DAV\Migrations;

use OCP\Migration\ISchemaMigration;
use Doctrine\DBAL\Schema\Schema;

/*
 * Create initial properties table
 * Add fileid field to this table if needed
 */
class Version20170116170538 implements ISchemaMigration {

	/**
	 * @param Schema $schema
	 * @param string $prefix
	 */
	private function createPropertiesTable(Schema $schema, $prefix) {
		$table = $schema->createTable("${prefix}properties");
		$table->addColumn('id', 'bigint', [
			'autoincrement' => true,
			'notnull' => true,
			'length' => 20,
		]);
		$table->addColumn('fileid', 'bigint', [
			'notnull' => true,
			'length' => 20,
		]);
		$table->addColumn('propertyname', 'string', [
			'notnull' => true,
			'length' => 255,
			'default' => '',
		]);
		$table->addColumn('propertyvalue', 'string', [
			'notnull' => true,
			'length' => 255,
		]);
		$table->setPrimaryKey(['id']);
		$table->addIndex(['fileid'], 'fileid_index');
	}

	/**
	 * @param Schema $schema
	 * @param array $options
	 */
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if (!$schema->hasTable("${prefix}properties")) {
			// install
			$this->createPropertiesTable($schema, $prefix);
		} else {
			// update
			$table = $schema->getTable("${prefix}properties");
			if (!$table->getColumn('fileid')) {
				$table->addColumn('fileid', 'bigint', [
					'default' => 0,
					'notnull' => true,
					'length' => 20,
				]);
				$table->addIndex(['fileid'], 'fileid_index');
			}
		}
	}
}
