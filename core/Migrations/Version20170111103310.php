<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Initial DB creation for external storages
 */
class Version20170111103310 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if (!$schema->hasTable("${prefix}external_mounts")) {
			$table = $schema->createTable("${prefix}external_mounts");
			$table->addColumn('mount_id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('mount_point', 'string', [
				'notnull' => true,
				'length' => 128,
			]);
			$table->addColumn('storage_backend', 'string', [
				'notnull' => true,
				'length' => 64,
			]);
			$table->addColumn('auth_backend', 'string', [
				'notnull' => true,
				'length' => 64,
			]);
			$table->addColumn('priority', 'integer', [
				'notnull' => true,
				'length' => 4,
				'default' => 100,
			]);
			// admin = 1, personal = 2
			$table->addColumn('type', 'integer', [
				'notnull' => true,
				'length' => 4,
			]);
			$table->setPrimaryKey(['mount_id']);
		}

		if (!$schema->hasTable("${prefix}external_applicable")) {
			$table = $schema->createTable("${prefix}external_applicable");
			$table->addColumn('applicable_id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			// foreign key: external_mounts.mount_id
			$table->addColumn('mount_id', 'bigint', [
				'notnull' => true,
				'length' => 20,
			]);
			// possible mount types: global = 1, group = 2, user = 3
			$table->addColumn('type', 'integer', [
				'notnull' => true,
				'length' => 4,
			]);
			$table->addColumn('value', 'string', [
				'notnull' => false,
				'length' => 64,
			]);
			$table->setPrimaryKey(['applicable_id']);
			$table->addIndex(['mount_id'], 'applicable_mount');
			$table->addIndex(['type', 'value'], 'applicable_type_value');
			$table->addUniqueIndex(['type', 'value', 'mount_id'], 'applicable_type_value_mount');
		}

		if (!$schema->hasTable("${prefix}external_config")) {
			$table = $schema->createTable("${prefix}external_config");
			$table->addColumn('config_id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			// foreign key: external_mounts.mount_id
			$table->addColumn('mount_id', 'bigint', [
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('key', 'string', [
				'notnull' => true,
				'length' => 64,
			]);
			$table->addColumn('value', 'string', [
				'notnull' => true,
				'length' => 4096,
			]);
			$table->setPrimaryKey(['config_id']);
			$table->addIndex(['mount_id'], 'config_mount');
			$table->addUniqueIndex(['mount_id', 'key'], 'config_mount_key');
		}

		if (!$schema->hasTable("${prefix}external_options")) {
			$table = $schema->createTable("${prefix}external_options");
			$table->addColumn('option_id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			// foreign key: external_mounts.mount_id
			$table->addColumn('mount_id', 'bigint', [
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('key', 'string', [
				'notnull' => true,
				'length' => 64,
			]);
			$table->addColumn('value', 'string', [
				'notnull' => true,
				'length' => 256,
			]);
			$table->setPrimaryKey(['option_id']);
			$table->addIndex(['mount_id'], 'option_mount');
			$table->addUniqueIndex(['mount_id', 'key'], 'option_mount_key');
		}
	}
}
