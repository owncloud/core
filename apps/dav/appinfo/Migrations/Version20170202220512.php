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

namespace OCA\DAV\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/*
 * Drop property_index index if exists
 * Drop userid and propertypath columns
 * Add NOT NULL constraint to fileid column
 */

class Version20170202220512 implements ISchemaMigration {

	/**
	 * @param Schema $schema
	 * @param array $options
	 */
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		$table = $schema->getTable("${prefix}properties");
		if ($table->hasIndex('property_index')) {
			$table->dropIndex('property_index');
		}
		if ($table->hasColumn('userid')) {
			$table->dropColumn('userid');
		}
		if ($table->hasColumn('propertypath')) {
			$table->dropColumn('propertypath');
		}
		$table->changeColumn('fileid', [
			'notnull' => false,
			'unsigned' => true,
			'length' => 20,
		]);
	}
}
