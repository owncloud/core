<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

class Version20170214112458 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		$table = $schema->createTable("{$prefix}accounts");
		$table->addColumn('id', Type::BIGINT, [
			'autoincrement' => true,
			'unsigned' => true,
			'notnull' => true,
		]);
		$table->addColumn('email', Type::STRING, [
			'notnull' => false,
			'length' => 255,
		]);
		$table->addColumn('user_id', Type::STRING, [
			'notnull' => true,
			'length' => 255,
		]);
		$table->addColumn('lower_user_id', Type::STRING, [
			'notnull' => true,
			'length' => 255,
		]);
		$table->addColumn('display_name', Type::STRING, [
			'notnull' => false,
			'length' => 255,
		]);
		$table->addColumn('quota', Type::STRING, [
			'notnull' => false,
			'length' => 32,
		]);
		$table->addColumn('last_login', Type::INTEGER, [
			'notnull' => true,
			'length' => 32,
			'default' => 0,
		]);
		$table->addColumn('backend', Type::STRING, [
			'notnull' => true,
			'length' => 64,
		]);
		$table->addColumn('home', Type::STRING, [
			'notnull' => true,
			'length' => 1024,
		]);
		$table->addColumn('state', Type::SMALLINT, [
			'notnull' => true,
			'default' => 0,
			'comment' => '0: initial, 1: enabled, 2: disabled, 3: deleted'
		]);

		$table->setPrimaryKey(['id']);
		$table->addUniqueIndex(['user_id']);
	}
}
