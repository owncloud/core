<?php

namespace OCA\dav\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20170116170538 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
		$prefix = $this->connection->getPrefix();

		// install
		if (!$schema->hasTable("${prefix}properties")) {
			$table = $schema->createTable("${prefix}properties");
			$table->addOption('collate', 'utf8_bin');
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('file_id', 'bigint', [
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('propertyname', 'string', [
				'notnull' => true,
				'length' => 256,
				'default' => '',
			]);
			$table->addColumn('propertyvalue', 'string', [
				'notnull' => true,
				'length' => 256,
			]);
			$table->setPrimaryKey(['id']);
			$table->addIndex(['file_id'], 'fileid_index');
		} else {
	       // Update from 9.1
			// TODO: Introduce file_id
			// TODO: drop userid and propertypath
		}

		if (!$schema->hasTable("${prefix}addressbooks")) {
			$table = $schema->createTable("${prefix}addressbooks");
			$table->addOption('collate', 'utf8_bin');
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('principaluri', 'string', [
				'length' => 256,
			]);
			$table->addColumn('displayname', 'string', [
				'length' => 256,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 256,
			]);
			$table->addColumn('description', 'string', [
				'length' => 256,
			]);
			$table->addColumn('synctoken', 'integer', [
				'notnull' => true,
				'default' => 1,
				'unsigned' =>true,
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['principaluri', 'uri'], 'addressbook_index');
		}

		if (!$schema->hasTable("${prefix}cards")) {
			$table = $schema->createTable("${prefix}cards");
			$table->addOption('collate', 'utf8_bin');
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('addressbookid', 'integer', [
				'notnull' => true,
				'default' => 0,
			]);
			$table->addColumn('carddata', 'blob', [
			]);
			$table->addColumn('uri', 'string', [
				'length' => 256,
			]);
			$table->addColumn('lastmodified', 'integer', [
				'length' => 11,
				'unsigned' =>true,
			]);
			$table->addColumn('etag', 'string', [
				'length' => 32,
			]);
			$table->addColumn('size', 'integer', [
				'length' => 11,
				'notnull' => true,
				'unsigned' =>true,
			]);
			$table->setPrimaryKey(['id']);
		}

		if (!$schema->hasTable("${prefix}addressbookchanges")) {
			$table = $schema->createTable("${prefix}addressbookchanges");
			$table->addOption('collate', 'utf8_bin');
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 256,
			]);
			$table->addColumn('synctoken', 'integer', [
				'notnull' => true,
				'default' => 1,
				'unsigned' =>true,
			]);
			$table->addColumn('addressbookid', 'integer', [
				'notnull' => true,
			]);
			$table->addColumn('operation', 'integer', [
				'notnull' => true,
				'length' => 1,
			]);
			$table->setPrimaryKey(['id']);
			$table->addIndex(['addressbookid', 'synctoken'], 'addressbookid_synctoken');
		}

		if (!$schema->hasTable("${prefix}calendarobjects")) {
			$table = $schema->createTable("${prefix}calendarobjects");
			$table->addOption('collate', 'utf8_bin');
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('calendardata', 'blob', [
			]);
			$table->addColumn('uri', 'string', [
				'length' => 256,
			]);
			$table->addColumn('calendarid', 'integer', [
				'notnull' => true,
				'unsigned' =>true,
			]);
			$table->addColumn('lastmodified', 'integer', [
				'length' => 11,
				'unsigned' =>true,
			]);
			$table->addColumn('etag', 'string', [
				'length' => 32,
			]);
			$table->addColumn('size', 'integer', [
				'length' => 11,
				'notnull' => true,
				'unsigned' =>true,
			]);
			$table->addColumn('componenttype', 'string', [
				'length' => 8,
			]);
			$table->addColumn('firstoccurence', 'integer', [
				'unsigned' =>true,
				'length' => 11,
			]);
			$table->addColumn('lastoccurence', 'integer', [
				'unsigned' =>true,
				'length' => 11,
			]);
			$table->addColumn('uid', 'string', [
				'length' => 255,
			]);
			// possible types: 0 - public, 1 - private, 2 - confidential
			$table->addColumn('classification', 'integer', [
				'default' => 0,
				'length' => 4,
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['calendarid', 'uri'], 'calobjects_index');
		}

		if (!$schema->hasTable("${prefix}calendars")) {
			$table = $schema->createTable("${prefix}calendars");
			$table->addOption('collate', 'utf8_bin');
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('principaluri', 'string', [
				'length' => 256,
			]);
			$table->addColumn('displayname', 'string', [
				'length' => 256,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 256,
			]);
			$table->addColumn('synctoken', 'integer', [
				'notnull' => true,
				'default' => 1,
				'unsigned' =>true,
			]);
			$table->addColumn('description', 'string', [
				'length' => 256,
			]);
			$table->addColumn('calendarorder', 'integer', [
				'notnull' => true,
				'default' => 0,
				'unsigned' =>true,
			]);
			$table->addColumn('calendarcolor', 'string', [
				'length' => 10,
			]);
			$table->addColumn('timezone', 'text', [
			]);
			$table->addColumn('components', 'string', [
				'length' => 20,
			]);
			$table->addColumn('transparent', 'integer', [
				'notnull' => true,
				'default' => 0,
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['principaluri', 'uri'], 'calendars_index');
		}

		if (!$schema->hasTable("${prefix}calendarchanges")) {
			$table = $schema->createTable("${prefix}calendars");
			$table->addOption('collate', 'utf8_bin');
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 256,
			]);
			$table->addColumn('synctoken', 'integer', [
				'notnull' => true,
				'default' => 1,
				'unsigned' =>true,
			]);
			$table->addColumn('calendarid', 'integer', [
				'notnull' => true,
			]);
			$table->addColumn('operation', 'integer', [
				'notnull' => true,
				'length' => 1,
			]);
			$table->setPrimaryKey(['id']);
			$table->addIndex(['calendarid', 'synctoken'], 'calendarid_synctoken');
		}


    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
		// We can't migrate below 10.0, can we?
    }
}
