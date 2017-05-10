<?php

namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * migrate stable9 to stable10
 */
class Version20170101215145 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		// CREATE TABLE oc_authtoken
		if (!$schema->hasTable("${prefix}authtoken")) {
			$authTokenTable = $schema->createTable("${prefix}authtoken");

			// id INTEGER NOT NULL
			$authTokenTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'notnull' => true
				]
			);

			// uid VARCHAR(64) DEFAULT '' NOT NULL COLLATE BINARY
			// TODO: collate binary ???
			$authTokenTable->addColumn(
				'uid',
				Type::STRING,
				[
					'length' => 64,
					'default' => '',
					'notnull' => true
				]
			);

			// login_name VARCHAR(64) DEFAULT '' NOT NULL COLLATE BINARY
			// TODO: collate binary ???
			$authTokenTable->addColumn(
				'login_name',
				Type::STRING,
				[
					'length' => 64,
					'default' => '',
					'notnull' => true
				]
			);

			// name CLOB DEFAULT '' NOT NULL COLLATE BINARY
			// TODO: collate binary ???
			$authTokenTable->addColumn(
				'name',
				Type::TEXT,
				[
					'default' => '',
					'notnull' => true
				]
			);

			// token VARCHAR(200) DEFAULT '' NOT NULL COLLATE BINARY
			// TODO: collate binary ???
			$authTokenTable->addColumn(
				'token',
				Type::STRING,
				[
					'length' => 200,
					'default' => '',
					'notnull' => true
				]
			);

			// type SMALLINT UNSIGNED DEFAULT 0 NOT NULL
			$authTokenTable->addColumn(
				'type',
				Type::SMALLINT,
				[
					'unsigned' => true,
					'default' => 0,
					'notnull' => true
				]
			);

			// last_activity INTEGER UNSIGNED DEFAULT 0 NOT NULL
			$authTokenTable->addColumn(
				'last_activity',
				Type::INTEGER,
				[
					'unsigned' => true,
					'default' => 0,
					'notnull' => true
				]
			);

			// last_check INTEGER UNSIGNED DEFAULT 0 NOT NULL
			$authTokenTable->addColumn(
				'last_check',
				Type::INTEGER,
				[
					'unsigned' => true,
					'default' => 0,
					'notnull' => true
				]
			);

			// password CLOB DEFAULT NULL COLLATE BINARY
			// TODO: collate binary ???
			$authTokenTable->addColumn(
				'password',
				Type::TEXT,
				[
					'default' => null,
					'notnull' => false
				]
			);

			// PRIMARY KEY(id)
			$authTokenTable->setPrimaryKey(['id']);

			// CREATE INDEX authtoken_last_activity_index ON oc_authtoken (last_activity)
			$authTokenTable->addIndex(['last_activity'], 'authtoken_last_activity_index');

			// CREATE UNIQUE INDEX authtoken_token_index ON oc_authtoken (token)
			$authTokenTable->addUniqueIndex(['token'], 'authtoken_token_index');
		}


		// CREATE TABLE oc_migrations (app VARCHAR(255) NOT NULL COLLATE BINARY, version VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(app, version))
		// TODO: does this need to be created by us, or is it automatically created by our migration services?


		if (!$schema->hasTable("${prefix}systemtag_group")) {
			// CREATE TABLE oc_systemtag_group
			$systemTagGroupTable = $schema->createTable("${prefix}systemtag_group");

			// gid VARCHAR(255) NOT NULL COLLATE BINARY
			// TODO: collate binary ???
			$systemTagGroupTable->addColumn(
				'gid',
				Type::STRING,
				[
					'length' => 255,
					'notnull' => true
				]
			);

			// systemtagid INTEGER UNSIGNED DEFAULT 0 NOT NULL
			$systemTagGroupTable->addColumn(
				'systemtagid',
				Type::INTEGER,
				[
					'unsigned' => true,
					'default' => 0,
					'notnull' => true
				]
			);

			// PRIMARY KEY(gid, systemtagid)
			$systemTagGroupTable->setPrimaryKey(['gid', 'systemtagid']);
		}

		// TODO: all those drop tables are probably not what we actually need

		// DROP TABLE oc_addressbookchanges
		if ($schema->hasTable("${prefix}addressbookchanges")) {
			$schema->dropTable("${prefix}addressbookchanges");
		}

		// DROP TABLE oc_addressbooks
		if ($schema->hasTable("${prefix}addressbooks")) {
			$schema->dropTable("${prefix}addressbooks");
		}

		// DROP TABLE oc_calendarchanges
		if ($schema->hasTable("${prefix}calendarchanges")) {
			$schema->dropTable("${prefix}calendarchanges");
		}

		// DROP TABLE oc_calendars
		if ($schema->hasTable("${prefix}calendars")) {
			$schema->dropTable("${prefix}calendars");
		}

		// DROP TABLE oc_calendarsubscriptions
		if ($schema->hasTable("${prefix}calendarsubscriptions")) {
			$schema->dropTable("${prefix}calendarsubscriptions");
		}

		// DROP TABLE oc_cards
		if ($schema->hasTable("${prefix}cards")) {
			$schema->dropTable("${prefix}cards");
		}

		// DROP TABLE oc_cards_properties
		if ($schema->hasTable("${prefix}cards_properties")) {
			$schema->dropTable("${prefix}cards_properties");
		}

		// DROP TABLE oc_dav_shares
		if ($schema->hasTable("${prefix}dav_shares")) {
			$schema->dropTable("${prefix}dav_shares");
		}

		// DROP TABLE oc_files_trash
		if ($schema->hasTable("${prefix}files_trash")) {
			$schema->dropTable("${prefix}files_trash");
		}

		// DROP TABLE oc_properties
		if ($schema->hasTable("${prefix}properties")) {
			$schema->dropTable("${prefix}properties");
		}

		// DROP TABLE oc_schedulingobjects
		if ($schema->hasTable("${prefix}schedulingobjects")) {
			$schema->dropTable("${prefix}schedulingobjects");
		}

		// DROP TABLE oc_share
		if ($schema->hasTable("${prefix}share")) {
			$schema->dropTable("${prefix}share");
		}

		// DROP TABLE oc_share_external
		if ($schema->hasTable("${prefix}share_external")) {
			$schema->dropTable("${prefix}share_external");
		}

		// DROP TABLE oc_trusted_servers
		if ($schema->hasTable("${prefix}trusted_servers")) {
			$schema->dropTable("${prefix}trusted_servers");
		}



		// ALTER TABLE oc_jobs ADD COLUMN last_checked INTEGER DEFAULT 0
		// ALTER TABLE oc_jobs ADD COLUMN reserved_at INTEGER DEFAULT 0
		if ($schema->hasTable("${prefix}jobs")) {
			// ALTER TABLE oc_jobs
			$jobsTable = $schema->getTable("${prefix}jobs");

			// ADD COLUMN last_checked INTEGER DEFAULT 0
			if (!$jobsTable->hasColumn('last_checked')) {
				$jobsTable->addColumn(
					'last_checked',
					Type::INTEGER,
					[
						'default' => 0,
						'notnull' => false
					]
				);
			}

			// ADD COLUMN reserved_at INTEGER DEFAULT 0
			if (!$jobsTable->hasColumn('reserved_at')) {
				$jobsTable->addColumn(
					'reserved_at',
					Type::INTEGER,
					[
						'default' => 0,
						'notnull' => false
					]
				);
			}
		}

		if ($schema->hasTable("${prefix}calendarobjects")) {
			$calendarObjectsTable = $schema->getTable("${prefix}calendarobjects");

			if (!$calendarObjectsTable->hasColumn('classification')) {
				$calendarObjectsTable->addColumn(
					'classification',
					Type::INTEGER,
					[
						'default' => 0,
						'notnull' => false
					]
				);
			}

			if ($calendarObjectsTable->hasColumn('componenttype')) {
				$componentType = $calendarObjectsTable->getColumn('componenttype');
				$componentType->setOptions(['length' => 8]);
			}

			if ($calendarObjectsTable->hasColumn('firstoccurence')) {
				$firstOccurence = $calendarObjectsTable->getColumn('firstoccurence');
				$firstOccurence->setType(Type::getType(Type::BIGINT));
			}

			if ($calendarObjectsTable->hasColumn('lastoccurence')) {
				$lastOccurence = $calendarObjectsTable->getColumn('lastoccurence');
				$lastOccurence->setType(Type::getType(Type::BIGINT));
			}
		}
	}
}
