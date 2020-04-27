<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCA\DAV\DAV\AbstractCustomPropertiesBackend;
use OCP\Migration\ISchemaMigration;

/*
 * Adds a new property type column to properties and dav_properties tables
 */
class Version20200427142541 implements ISchemaMigration {

	/**
	 * @param Schema $schema
	 * @param array $options
	 */
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		$tableNames = ['properties', 'dav_properties'];

		foreach ($tableNames as $tableName) {
			$table = $schema->getTable("{$prefix}{$tableName}");
			if ($table->hasColumn('propertytype') === false) {
				$table->addColumn(
					'propertytype',
					Type::SMALLINT,
					[
						'notnull' => true,
						'default' => AbstractCustomPropertiesBackend::VT_STRING,
					]
				);
			}
		}
	}
}
