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

namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Create a new table appaccess.
 * This table will have 4 columns
 * 1. id -> primary key -> with autoincrement
 * 2. accessor -> which will accept userid and groupid -> cannot be null
 * 3. accessor-identifier -> which will be either 0 or 1 -> 0 for user and 1 for group
 * 4. apps -> strings of appid which are separated by commas eg: files, shares etc
 * The accessor-identifier is the one which will determine if accessor is a user
 * or a group.
 */
 class Version20191030124642 implements ISchemaMigration {
 	public function changeSchema(Schema $schema, array $options) {
 		$prefix = $options['tablePrefix'];

 		if (!$schema->hasTable("${prefix}appaccess")) {
 			$appAccessTable = $schema->createTable("${prefix}appaccess");

 			$appAccessTable->addColumn(
				'id',
				Type::BIGINT,
				[
					'notnull' => true,
					'autoincrement' => 1,
					'unsigned' => true
				]
			);

 			$appAccessTable->addColumn(
				'accessor',
				Type::STRING,
				[
					'length' => 64,
					'default' => '',
					'notnull' => true,

				]
			);

 			$appAccessTable->addColumn(
				'accessoridentifier',
				Type::SMALLINT,
				[
					'notnull' => true,
					'default' => 0,
					'unsigned' => true,
				]
			);

 			$appAccessTable->addColumn(
				'apps',
				Type::TEXT,
				[
					'notnull' => false,
				]
			);

 			$appAccessTable->setPrimaryKey(['id']);

 			$appAccessTable->addIndex(['accessor', 'accessoridentifier'], 'usergroupwith_whitelistedapps');
 		}
 	}
 }
