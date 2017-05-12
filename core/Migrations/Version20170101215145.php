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
					'notnull' => true,
					'autoincrement' => 1,
					'unsigned' => true
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
				// TODO: check what happens when this contained data with length > 8
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

		if ($schema->hasTable("${prefix}calendars")) {
			$calendarsTable = $schema->getTable("${prefix}calendars");

			if ($calendarsTable->hasColumn('components')) {
				$components = $calendarsTable->getColumn('components');
				$components->setOptions(['length' => 20]);
			}
		}

		if ($schema->hasTable("${prefix}calendarsubscriptions")) {
			$calendarSubscriptionsTable = $schema->getTable("${prefix}calendarsubscriptions");

			if ($calendarSubscriptionsTable->hasColumn('lastmodified')) {
				$lastModified = $calendarSubscriptionsTable->getColumn('lastmodified');
				$lastModified->setOptions(
					[
						'notnull' => true
					]
				);
			}
		}
	}
}
