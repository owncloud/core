<?php

namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

class Version20230105001100 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}calendars")) {
			$calendarsTable = $schema->getTable("${prefix}calendars");

			if ($calendarsTable->hasColumn('components')) {
				$components = $calendarsTable->getColumn('components');
				$components->setOptions(['length' => 255]);
			}
		}
	}
}
