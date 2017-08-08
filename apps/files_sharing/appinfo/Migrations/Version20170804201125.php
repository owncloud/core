<?php

namespace OCA\Files_Sharing\Migrations;
use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/** Creates initial schema */
class Version20170804201125 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if (!$schema->hasTable("{$prefix}share_external")) {
			$table = $schema->createTable("{$prefix}share_external");
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'unsigned' => false,
				'notnull' => true,
				'length' => 11,
			]);

			$table->addColumn('remote', 'string', [
				'notnull' => true,
				'length' => 512,
				'default' => null,
				'comment' => 'Url of the remote owncloud instance'
			]);

			$table->addColumn('remote_id', 'bigint', [
				'unsigned' => false,
				'notnull' => true,
				'default' => -1,
				'length' => 11,
			]);

			$table->addColumn('share_token', 'string', [
				'length' => 64,
				'notnull' => true,
				'comment' => 'Public share token'
			]);

			$table->addColumn('password', 'string', [
				'length' => 64,
				'notnull' => false,
				'default' => null,
				'comment' => 'Optional password for the public share'
			]);

			$table->addColumn('name', 'string', [
				'length' => 64,
				'notnull' => true,
				'comment' => 'Original name on the remote server'
			]);

			$table->addColumn('owner', 'string', [
				'length' => 64,
				'notnull' => true,
				'comment' => 'User that owns the public share on the remote server'
			]);

			$table->addColumn('user', 'string', [
				'length' => 64,
				'notnull' => true,
				'comment' => 'Local user which added the external share'
			]);

			$table->addColumn('mountpoint', 'string', [
				'length' => 4000,
				'notnull' => true,
				'comment' => 'Full path where the share is mounted'
			]);

			$table->addColumn('mountpoint_hash', 'string', [
				'length' => 32,
				'notnull' => true,
				'comment' => 'md5 hash of the mountpoint'
			]);

			$table->addColumn('accepted', 'integer', [
				'notnull' => true,
				'default' => 0,
			]);

			$table->setPrimaryKey(['id']);

			$table->addIndex(
				['user'],
				'sh_external_user'
			);
			$table->addUniqueIndex(
				['user', 'mountpoint_hash'],
				'sh_external_mp'
			);
		}
	}
}
