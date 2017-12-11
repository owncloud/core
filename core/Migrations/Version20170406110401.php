<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
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

			$table->addColumn('id', Type::INTEGER, [
				'autoincrement' => true,
				'unsigned' => true,
				'length' => 4
			]);

			$table->addColumn('uid', Type::STRING, [
				'default' => '',
				'notnull' => true,
				'length' => 64
			]);

			$table->addColumn('login_name', Type::STRING, [
				'default' => '',
				'notnull' => true,
				'length' => 64
			]);

			$table->addColumn('password', Type::TEXT, [
				'default' => '',
				'notnull' => false
			]);

			$table->addColumn('name', Type::TEXT, [
				'default' => '',
				'notnull' => true
			]);

			$table->addColumn('token', Type::STRING, [
				'default' => '',
				'notnull' => true,
				'length' => 200
			]);

			$table->addColumn('type', Type::SMALLINT, [
				'default' => 0,
				'notnull' => true,
				'unsigned' => true,
				'length' => 2
			]);

			$table->addColumn('last_activity', Type::INTEGER, [
				'default' => 0,
				'notnull' => true,
				'unsigned' => true,
				'length' => 4
			]);

			$table->addColumn('last_check', Type::INTEGER, [
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

			$table->setPrimaryKey(['id']);
		}
    }
}
