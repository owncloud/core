<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Updates id column type in the file_locks table from integer to bigint
 */
class Version20240112140951 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("{$prefix}file_locks")) {
			$table = $schema->getTable("{$prefix}file_locks");

			$idColumn = $table->getColumn('id');
			if ($idColumn) {
				$idColumn->setType(Type::getType(Type::BIGINT));
				$idColumn->setOptions(['length' => 20]);
			}
		}
	}
}
