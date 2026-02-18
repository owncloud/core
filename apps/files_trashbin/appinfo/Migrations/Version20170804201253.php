<?php

namespace OCA\Files_Trashbin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\Types;
use OCP\Migration\ISchemaMigration;

/** Updates some fields to bigint if required */
class Version20170804201253 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("{$prefix}files_trash")) {
			$table = $schema->getTable("{$prefix}files_trash");

			$idColumn = $table->getColumn('auto_id');
			if ($idColumn && $idColumn->getType()->getName() !== Types::BIGINT) {
				$idColumn->setType(Type::getType(Types::BIGINT));
				$idColumn->setOptions(['length' => 20]);
			}
		}
	}
}
