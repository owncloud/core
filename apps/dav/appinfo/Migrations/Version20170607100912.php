<?php
namespace OCA\dav\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * changes mtime fields to be able to store 64bit time stamps
 */
class Version20170607100912 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("${prefix}filecache");
		foreach ( ['mtime','storage_mtime'] as $column ) {
			if ($table->getColumn($column)->getType()->getName() === Type::INTEGER) {
				$table->getColumn($column)->setType(Type::getType(Type::BIGINT));
			}
		}
	}
}
