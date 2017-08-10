<?php

namespace OCA\Files_Sharing\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/** Updates some fields to bigint if required */
class Version20170804201253 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}share_external")) {
			$table = $schema->getTable("{$prefix}share_external");

			$idColumn = $table->getColumn('id');
			if ($idColumn && $idColumn->getType()->getName() !== Type::BIGINT) {
				$idColumn->setType(Type::getType(Type::BIGINT));
				$idColumn->setOptions(['length' => 20]);
			}

			$remoteIdColumn = $table->getColumn('remote_id');
			if ($remoteIdColumn && $remoteIdColumn->getType()->getName() !== Type::BIGINT) {
				$remoteIdColumn->setType(Type::getType(Type::BIGINT));
				$remoteIdColumn->setOptions(['length' => 20]);
			}
		}
	}
}
