<?php

namespace OCA\Files_Sharing\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use OCP\Migration\ISchemaMigration;

/** Updates some fields to bigint if required */
class Version20170804201253 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("{$prefix}share_external")) {
			$table = $schema->getTable("{$prefix}share_external");

			$idColumn = $table->getColumn('id');
			if ($idColumn && $idColumn->getType()->getName() !== Types::BIGINT) {
				$idColumn->setType(Type::getType(Types::BIGINT));
				$idColumn->setOptions(['length' => 20]);
			}

			$remoteIdColumn = $table->getColumn('remote_id');
			if ($remoteIdColumn && $remoteIdColumn->getType()->getName() !== Types::BIGINT) {
				$remoteIdColumn->setType(Type::getType(Types::BIGINT));
				$remoteIdColumn->setOptions(['length' => 20]);
			}
		}
	}
}
