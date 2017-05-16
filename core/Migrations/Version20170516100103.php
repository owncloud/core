<?php
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
				'length' => 256
			]);

			$table->setPrimaryKey(['id']);
			$table->addIndex(['account_id'], 'account_id_index');
			$table->addIndex(['term'], 'term_index');

		}
    }
}
