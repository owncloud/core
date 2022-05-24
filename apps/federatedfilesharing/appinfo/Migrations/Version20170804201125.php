<?php

namespace OCA\FederatedFileSharing\Migrations;
use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/** Creates initial schema */
class Version20170804201125 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if (!$schema->hasTable("{$prefix}federated_reshares")) {
			$table = $schema->createTable("{$prefix}federated_reshares");
			$table->addColumn('share_id', 'bigint', [
				'unsigned' => false,
				'notnull' => true,
				'length' => 11,
			]);

			$table->addColumn('remote_id', 'bigint', [
				'unsigned' => false,
				'notnull' => true,
				'length' => 11,
				'comment' => 'share ID at the remote server'
			]);

			$table->addUniqueIndex(
				['share_id'],
				'share_id_index'
			);
		}
	}
}
