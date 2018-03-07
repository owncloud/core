<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\IDBConnection;
use OCP\Migration\ISchemaMigration;

/**
 * Rename account colums:
 * - user_id -> uuid
 * - lower_user_id -> username
 */
class Version20180307201744 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {

		/** @var IDBConnection $db */
		$db = \OC::$server->getDatabaseConnection();

		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("${prefix}accounts");
		// rename requires create, update, drop and create index

		// 1. create new columns
		if (!$table->hasColumn('uuid')) {
			$table->addColumn('uuid', Type::STRING, [
				'notnull' => true,
				'length' => 255
			]);
		};
		if (!$table->hasColumn('user_name')) {
			$table->addColumn('user_name', Type::STRING, [
				'notnull' => true,
				'length' => 255
			]);
		};

		$db->migrateToSchema($schema);

		// 2. fill with same data as in original columns

		$qb = $db->getQueryBuilder();
		$qb->update('accounts')
			->set('uuid', 'user_id')
			->set('user_name', 'lower_user_id');
		$qb->execute();

		// 3. drop old columns

		$table->dropColumn('user_id');
		$table->dropColumn('lower_user_id');

		//4. recreate index

		$table->addUniqueIndex(['uuid'], 'uuid_index');
		$table->addUniqueIndex(['user_name'], 'user_name_index');

	}
}
