<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Adds a string column to the accounts table that can contain search
 * attributes provided by user backends
 */
class Version20170510143952 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("{$prefix}accounts");

		// Add column to hold additional search attributes
		$table->addColumn('search_attributes', 'string', [
			'notnull' => false,
			'length' => 64,
		]);

		// Add index for search attributes
		$table->addIndex(['search_attributes'], 'search_attributes_index');

		// Index to improve search performance of display_name column
		$table->addIndex(['display_name'], 'display_name_index');

		// Index to improve search performance of email column
		$table->addIndex(['email'], 'email_index');

		// Index to improve search performance of lower_user_id column
		$table->addUniqueIndex(['lower_user_id'], 'lower_user_id_index');

    }
}
