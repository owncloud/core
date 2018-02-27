<?php
namespace OCA\files_sharing\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Additional index for the oc_share table to improve performance
 */
class Version20180226172914 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		$indexName = 'uid_owner';
		$columns = ['item_source', 'share_type', 'item_type'];

		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}share")) {
			$table = $schema->getTable("${prefix}share");
			if (!$table->hasIndex($indexName)) {
				$table->addIndex($columns, $indexName);
			}
		}
	}

}
