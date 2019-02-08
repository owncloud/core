<?php
namespace OCA\DAV\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Updates column type from integer to bigint
 */
class Version20170711193427 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}properties")) {
			$table = $schema->getTable("{$prefix}properties");

			$idColumn = $table->getColumn('id');
			if ($idColumn) {
				$idColumn->setType(Type::getType(Type::BIGINT));
				$idColumn->setOptions(['length' => 20]);
			}

			$fileidColumn = $table->getColumn('fileid');
			if ($fileidColumn) {
				$fileidColumn->setType(Type::getType(Type::BIGINT));
				$fileidColumn->setOptions(['length' => 20]);
			}
		}
	}
}
