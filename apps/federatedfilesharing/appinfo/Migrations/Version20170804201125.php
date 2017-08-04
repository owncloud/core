<?php

namespace OCA\FederatedFileSharing\Migrations;
use Doctrine\DBAL\Schema\Schema;
use OC\DB\MDB2SchemaReader;
use OCP\Migration\ISchemaMigration;

/** Creates initial schema */
class Version20170804201125 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if ($schema->hasTable("{$prefix}federated_reshares")) {
			return;
		}
		// not that valid ....
		$schemaReader = new MDB2SchemaReader(
			\OC::$server->getConfig(),
			\OC::$server->getDatabaseConnection()->getDatabasePlatform()
		);
		$schemaReader->loadSchemaFromFile(__DIR__ . '/../database.xml', $schema);
	}
}
