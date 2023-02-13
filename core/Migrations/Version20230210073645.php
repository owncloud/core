<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\SchemaException;
use OCP\Migration\ISchemaMigration;

class Version20230210073645 implements ISchemaMigration {
	/**
	 * @throws SchemaException
	 */
	public function changeSchema(Schema $schema, array $options): void {
		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("{$prefix}filecache");
		$table->addIndex(['parent', 'storage', 'size'], 'fs_parent_storage_size');
	}
}
