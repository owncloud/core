<?php
namespace OCA\dav\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use OCP\Migration\ISchemaMigration;

class Version20180622095921 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if ($schema->hasTable("{$prefix}dav_job_status")) {
			return;
		}
		$table = $schema->createTable("{$prefix}dav_job_status");
		$table->addColumn('id', Types::BIGINT, [
			'autoincrement' => true,
			'notnull' => true,
			'length' => 20,
		]);
		$table->addColumn('uuid', Types::GUID, [
			'notnull' => true,
		]);
		$table->addColumn('user_id', Types::STRING, [
			'notnull' => true,
			'length' => 64,
		]);
		$table->addColumn('status_info', Types::STRING, [
			'notnull' => true,
			'length' => 4000,
		]);
		$table->setPrimaryKey(['id']);
		$table->addUniqueIndex(['uuid']);
	}
}
