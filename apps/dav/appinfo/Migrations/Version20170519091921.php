<?php
namespace OCA\dav\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Add index to oc_cards to assist with searching with large numbers of rows
 */
class Version20170519091921 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("${prefix}cards");
		// Check for existing index spanning these columns
		foreach ($table->getIndexes() as $index) {
			// Check if we have a matching index already
			if (empty(\array_diff($index->getColumns(), ['uri', 'addressbookid']))) {
				return;
			}
		}
		// Add the index if we dont have one spanning this column already
		$table->addIndex(['addressbookid', 'uri'], 'addressbookid_uri_index');
	}
}
