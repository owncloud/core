<?php

namespace OCA\Files_Trashbin\Migrations;
use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/** Creates initial schema */
class Version20170804201125 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if (!$schema->hasTable("{$prefix}files_trash")) {
			$table = $schema->createTable("{$prefix}files_trash");
			$table->addColumn('auto_id', 'bigint', [
				'autoincrement' => true,
				'unsigned' => false,
				'notnull' => true,
				'length' => 11,
			]);

			$table->addColumn('id', 'string', [
				'length' => 250,
				'notnull' => true,
				'default' => ''
			]);

			$table->addColumn('user', 'string', [
				'length' => 64,
				'notnull' => true,
				'default' => ''
			]);

			$table->addColumn('timestamp', 'string', [
				'length' => 12,
				'notnull' => true,
				'default' => ''
			]);

			$table->addColumn('location', 'string', [
				'length' => 512,
				'notnull' => true,
				'default' => ''
			]);

			$table->addColumn('type', 'string', [
				'length' => 4,
				'notnull' => false,
				'default' => null
			]);

			$table->addColumn('mime', 'string', [
				'length' => 255,
				'notnull' => false,
				'default' => null
			]);

			$table->setPrimaryKey(['auto_id']);
			$table->addIndex(
				['id'],
				'id_index'
			);
			$table->addIndex(
				['timestamp'],
				'timestamp_index'
			);
			$table->addIndex(
				['user'],
				'user_index'
			);
		}
	}
}
