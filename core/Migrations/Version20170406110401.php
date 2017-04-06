<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version20170406110401 implements ISchemaMigration {

	/**
	 * @param Schema $schema
	 * @param array $options
	 */
	public function changeSchema(Schema $schema, array $options) {
		$tableName = $options['tablePrefix'] . 'authtoken';

		if (!$schema->hasTable($tableName)) {

			$table = $schema->createTable($tableName);

			$table->addColumn('id', 'integer', [
				'default' => 0,
				'notnull' => true,
				'autoincrement' => 1,
				'unsigned' => true,
				'length' => 4
			]);

			$table->addColumn('uid', 'text', [
				'default' => '',
				'notnull' => true,
				'length' => 64
			]);

			$table->addColumn('login_name', 'text', [
				'default' => '',
				'notnull' => true,
				'length' => 64
			]);

			$table->addColumn('password', 'text', [
				'default' => '',
				'notnull' => false
			]);

			$table->addColumn('name', 'text', [
				'default' => '',
				'notnull' => true
			]);

			$table->addColumn('token', 'text', [
				'default' => '',
				'notnull' => true,
				'length' => 200
			]);

			$table->addColumn('type', 'integer', [
				'default' => 0,
				'notnull' => true,
				'unsigned' => true,
				'length' => 2
			]);

			$table->addColumn('last_activity', 'integer', [
				'default' => 0,
				'notnull' => true,
				'unsigned' => true,
				'length' => 4
			]);

			$table->addColumn('last_check', 'integer', [
				'default' => 0,
				'notnull' => true,
				'unsigned' => true,
				'length' => 4
			]);

			$table->addIndex(
				['token'],
				'authtoken_token_index',
				[],
				[
					'unique' => true,
					'order' => 'asc'
				]
			);

			$table->addIndex(
				['last_activity'],
				'authtoken_last_activity_index',
				[],
				[
					'order' => 'asc'
				]
			);

			$table->addUniqueIndex(
				['uid', 'name'],
				'uid_name_index'
			);
		}
    }
}
