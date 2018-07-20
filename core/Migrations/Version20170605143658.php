<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Updates the column lengths for the migrations table to reflect changes in its schema
 */
class Version20170605143658 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		// Get the table
		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("{$prefix}migrations");

		// Check column length to see if migration is necessary necessary
		if ($table->getColumn('app')->getLength() === 177) {
			// then this server was installed after the fix
			return;
		}

		// Need to shorten columns
		$table->getColumn('app')->setLength(177);
		$table->getColumn('version')->setLength(14);
	}
}
