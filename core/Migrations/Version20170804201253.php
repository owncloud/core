<?php

namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Updates some fields to bigint if required
 */
class Version20170804201253 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		$this->updateToBigint($schema, "${prefix}mounts", "root_id");
		$this->updateToBigint($schema, "${prefix}filecache", "fileid");
		$this->updateToBigint($schema, "${prefix}filecache", "parent");
		$this->updateToBigint($schema, "${prefix}vcategory_to_object", "objid");
	}

	/**
	 * @param Schema $schema
	 * @param string $tableName
	 * @param string $columnName
	 */
	protected function updateToBigint(Schema $schema, $tableName, $columnName) {
		if ($schema->hasTable($tableName)) {
			$table = $schema->getTable($tableName);

			$column = $table->getColumn($columnName);
			if ($column && $column->getType()->getName() !== Type::BIGINT) {
				$column->setType(Type::getType(Type::BIGINT));
				$column->setOptions(['length' => 20]);
			}
		}
	}
}
