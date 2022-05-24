<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Add account_terms table for account searching
 */
class Version20170516100103 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if (!$schema->hasTable("${prefix}account_terms")) {
			$table = $schema->createTable("${prefix}account_terms");

			$table->addColumn('id', Type::BIGINT, [
				'autoincrement' => true,
				'unsigned' => true,
				'notnull' => true,
			]);

			// Foreign key to oc_accounts.id column
			$table->addColumn('account_id', Type::BIGINT, [
				'notnull' => true,
				'unsigned' => true,
			]);

			$table->addColumn('term', Type::STRING, [
				'notnull' => true,
				'length' => 255
			]);

			$table->setPrimaryKey(['id']);
			$table->addIndex(['account_id'], 'account_id_index');
			$table->addIndex(['term'], 'term_index');
		}

		if ($schema->hasTable("${prefix}accounts")) {
			$table = $schema->getTable("${prefix}accounts");
			if (!$table->hasIndex('lower_user_id_index')) {
				$table->addUniqueIndex(['lower_user_id'], 'lower_user_id_index');
			}
			if (!$table->hasIndex('display_name_index')) {
				$table->addIndex(['display_name'], 'display_name_index');
			}
			if (!$table->hasIndex('email_index')) {
				$table->addIndex(['email'], 'email_index');
			}
		}
	}
}
