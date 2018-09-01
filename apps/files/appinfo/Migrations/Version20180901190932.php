<?php
namespace OCA\files\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCA\Files\Service\TransferOwnership\TransferRequestMapper;
use OCP\Migration\ISchemaMigration;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version20180901190932 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		// Add a new table to track user file transfer request
		$table = $options['tablePrefix'] . TransferRequestMapper::TABLENAME;
		$table = $schema->createTable($table);
		$table->addColumn(
			'id',
			Type::INTEGER,
			[
				'comment' => 'Unique identifier for the transfer request',
				'autoincrement' => true
			]);
		$table->addColumn(
			'source_user_id',
			Type::STRING,
			[
				'comment' => 'The user who initiated the request'
			]);
		$table->addColumn(
			'destination_user_id',
			Type::STRING,
			[
				'comment' => 'The user who should receive the files'
			]);
		$table->addColumn(
			'file_id',
			Type::BIGINT,
			[
				'comment' => 'The file id for the folder to be transferred'
			]);
		$table->addColumn(
			'requested_time',
			Type::INTEGER,
			[
				'comment' => 'Time when the request was created by the source user'
			]);
		$table->addColumn(
			'accepted_time',
			Type::INTEGER,
			[
				'comment' => 'Time when the request was accepted by the destination user',
				'notnull' => false
			]);
		$table->addColumn(
			'rejected_time',
			Type::INTEGER,
			[
				'comment' => 'Time when the request was rejected by the destination user',
				'notnull' => false
			]);
		$table->addColumn(
			'actioned_time',
			Type::INTEGER,
			[
				'comment' => 'Time when the transfer actually completed on storage',
				'notnull' => false
			]);
		$table->setPrimaryKey(['id']);
	}

}
