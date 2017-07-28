<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Add freaking foreign keys, it's about time!
 */
class Version20170728163844 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		// Get the table
		$prefix = $options['tablePrefix'];
		$fileCacheTable = $schema->getTable("{$prefix}filecache");

		// filecache.parent -> filecache.fileid
		$fileCacheTable->addForeignKeyConstraint(
			"{$prefix}filecache",
			["parent"],
			["fileid"],
			['onDelete' => 'CASCADE']
		);

		$shareTable = $schema->getTable("{$prefix}share");
		// share.file_source -> filecache.fileid
		$shareTable->addForeignKeyConstraint(
			"{$prefix}filecache",
			["file_source"],
			["fileid"],
			['onDelete' => 'CASCADE']
		);
	}
}
