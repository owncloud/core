<?php

namespace OCA\FederatedFileSharing\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/** Updates remote_id to be string if required */
class Version20190410160725 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}federated_reshares")) {
			$table = $schema->getTable("{$prefix}federated_reshares");
			$remoteIdColumn = $table->getColumn('remote_id');
			if ($remoteIdColumn && $remoteIdColumn->getType()->getName() !== Type::STRING) {
				$remoteIdColumn->setType(Type::getType(Type::STRING));
				$remoteIdColumn->setOptions(['length' => 255]);
			}
		}

		if ($schema->hasTable("${prefix}share_external")) {
			$table = $schema->getTable("{$prefix}share_external");
			$remoteIdColumn = $table->getColumn('remote_id');
			if ($remoteIdColumn && $remoteIdColumn->getType()->getName() !== Type::STRING) {
				$remoteIdColumn->setType(Type::getType(Type::STRING));
				$remoteIdColumn->setOptions(['length' => 255]);
			}
		}
	}
}
