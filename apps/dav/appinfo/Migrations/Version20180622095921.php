<?php
namespace OCA\dav\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

class Version20180622095921 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if ($schema->hasTable("${prefix}dav_job_status")) {
			return;
		}
		$table = $schema->createTable("${prefix}dav_job_status");
		$table->addColumn('id', Type::BIGINT, [
			'autoincrement' => true,
			'notnull' => true,
			'length' => 20,
		]);
		$table->addColumn('uuid', Type::GUID, [
			'notnull' => true,
		]);
		$table->addColumn('user_id', Type::STRING, [
			'notnull' => true,
			'length' => 64,
		]);
		$table->addColumn('status_info', Type::STRING, [
			'notnull' => true,
			'length' => 4000,
		]);
		$table->setPrimaryKey(['id']);
		$table->addUniqueIndex(['uuid']);
	}
}
