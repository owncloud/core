<?php
namespace OCA\Files_Sharing\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use OCP\Migration\ISchemaMigration;

/**
 * Adds lastscan column
 */
class Version20200504211654 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}share_external")) {
			$table = $schema->getTable("${prefix}share_external");

			if (!$table->hasColumn('lastscan')) {
				$table->addColumn(
					'lastscan',
					Types::BIGINT,
					[
						'length' => 11,
						'unsigned' => true,
						'notnull' => false,
					]
				);
			}
		}
	}
}
