<?php

namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * DB updation for oc_jobs table
 */
class Version20170213215145 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if ($schema->hasTable("${prefix}jobs")) {
			$table = $schema->getTable("${prefix}jobs");
			if (!$table->hasColumn('execution_duration')) {
				$table->addColumn('execution_duration', 'integer', [
					'notnull' => true,
					'length' => 5,
					'default' => -1,
				]);
			}
		}
	}
}
