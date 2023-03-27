<?php

namespace OCA\User_LDAP\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Remove old database table that is not used
 * create mapping tables if not existing
 */
class Version20180606135121 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("{$prefix}ldap_group_members")) {
			// cleanup existing installation
			$schema->dropTable("{$prefix}ldap_group_members");
		}

		// the column definitions are all the same
		$columns = ['ldap_dn', 'owncloud_name', 'directory_uuid'];

		$tables = [
			// table name => index suffix
			"{$prefix}ldap_user_mapping" => 'users',
			"{$prefix}ldap_group_mapping" => 'groups'
		];

		foreach ($tables as $tableName => $indexSuffix) {
			if ($schema->hasTable($tableName)) {
				// cleanup existing installation
				// NOT NULL contradicts DEFAULT '' on oracle
				$table = $schema->getTable($tableName);
				foreach ($columns as $c) {
					$column = $table->getColumn($c);
					if ($column->getDefault() === '') {
						$column->setDefault(null);
					}
				}
			} else {
				// new installation
				$table = $schema->createTable($tableName);
				foreach ($columns as $columnName) {
					$table->addColumn(
						$columnName,
						Type::STRING,
						['length' => 255, 'notNull' => true]
					);
				}

				$table->setPrimaryKey(['owncloud_name'], "owncloud_name_{$indexSuffix}");
				$table->addUniqueIndex(['ldap_dn'], "ldap_dn_{$indexSuffix}");
			}
		}
	}
}
