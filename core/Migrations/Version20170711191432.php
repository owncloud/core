<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Updates column type in the share table from integer to bigint
 */
class Version20170711191432 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}share")) {
			$table = $schema->getTable("{$prefix}share");

			$fileSourceColumn = $table->getColumn('file_source');
			if ($fileSourceColumn) {
				$fileSourceColumn->setType(Type::getType(Type::BIGINT));
				$fileSourceColumn->setOptions(['length' => 20]);
			}
		}
	}
}
