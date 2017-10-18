<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;
use Doctrine\DBAL\Types\Type;

class Version20170927145820 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		// Backend Groups Table
		$table = $schema->createTable("{$prefix}backend_groups");
		$table->addColumn('id', Type::INTEGER, [
			'autoincrement' => true,
			'unsigned' => true,
			'notnull' => true,
		]);
		$table->addColumn('group_id', Type::STRING, [
			'notnull' => true,
			'length' => 255,
		]);
		$table->addColumn('display_name', Type::STRING, [
			'notnull' => false,
			'length' => 255,
		]);
		$table->addColumn('backend', Type::STRING, [
			'notnull' => true,
			'length' => 64,
		]);
		$table->setPrimaryKey(['id']);
		$table->addUniqueIndex(['group_id']);

		// Group Memberships Table
		$table = $schema->createTable("{$prefix}memberships");
		$table->addColumn('backend_group_id', Type::INTEGER, [
			'notnull' => true,
			'unsigned' => true,
		]);
		$table->addColumn('account_id', Type::BIGINT, [
			'notnull' => true,
			'unsigned' => true,
		]);
		$table->addColumn('membership_type', Type::SMALLINT, [
			'notnull' => true,
			'comment' => '0: GroupUser, 1: GroupAdmin'
		]);

		// This set of values has to be unique
		$table->addUniqueIndex(['backend_group_id', 'account_id', 'membership_type'], 'group_account_membership_index');

		// Add foreign keys on backend_group and accounts tables
		$table->addForeignKeyConstraint("{$prefix}backend_groups",array('backend_group_id'), array('id'));
		$table->addForeignKeyConstraint("{$prefix}accounts", array('account_id'), array('id'));
	}
}