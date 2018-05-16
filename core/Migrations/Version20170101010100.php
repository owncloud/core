<?php
/**
 * @author Philipp Schaffrath <pschaffrath@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/**
 * Migration from stable8.2 to stable9
 */
class Version20170101010100 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if (!$schema->hasTable("${prefix}addressbookchanges")) {
			$addressBookChangesTable = $schema->createTable("${prefix}addressbookchanges");

			$addressBookChangesTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'notnull' => true,
					'autoincrement' => true,
					'unsigned' => true
				]
			);

			$addressBookChangesTable->addColumn(
				'uri',
				Type::STRING,
				[
					'notnull' => false,
					'default' => null,
					'length' => 255
				]
			);

			$addressBookChangesTable->addColumn(
				'synctoken',
				Type::INTEGER,
				[
					'notnull' => true,
					'default' => 1,
					'unsigned' => true
				]
			);

			$addressBookChangesTable->addColumn(
				'addressbookid',
				Type::INTEGER,
				[
					'notnull' => true
				]
			);

			$addressBookChangesTable->addColumn(
				'operation',
				Type::SMALLINT,
				[
					'notnull' => true
				]
			);
			$addressBookChangesTable->setPrimaryKey(['id']);
			$addressBookChangesTable->addIndex(['addressbookid', 'synctoken'], 'addressbookid_synctoken');
		}

		if (!$schema->hasTable("${prefix}addressbooks")) {
			$addressBooksTable = $schema->createTable("${prefix}addressbooks");

			$addressBooksTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$addressBooksTable->addColumn(
				'principaluri',
				Type::STRING,
				[
					'default' => null,
					'notnull' => false,
					'length' => 255
				]
			);

			$addressBooksTable->addColumn(
				'displayname',
				Type::STRING,
				[
					'default' => null,
					'notnull' => false,
					'length' => 255
				]
			);

			$addressBooksTable->addColumn(
				'uri',
				Type::STRING,
				[
					'default' => null,
					'notnull' => false,
					'length' => 255
				]
			);

			$addressBooksTable->addColumn(
				'description',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$addressBooksTable->addColumn(
				'synctoken',
				Type::INTEGER,
				[
					'default' => 1,
					'unsigned' => true
				]
			);

			$addressBooksTable->setPrimaryKey(['id']);
			$addressBooksTable->addUniqueIndex(['principaluri', 'uri'], 'addressbook_index');
		}

		if (!$schema->hasTable("${prefix}calendarchanges")) {
			$calendarChangesTable = $schema->createTable("${prefix}calendarchanges");

			$calendarChangesTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$calendarChangesTable->addColumn(
				'uri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarChangesTable->addColumn(
				'synctoken',
				Type::INTEGER,
				[
					'default' => 1,
					'unsigned' => true
				]
			);

			$calendarChangesTable->addColumn(
				'calendarid',
				Type::INTEGER
			);

			$calendarChangesTable->addColumn(
				'operation',
				Type::SMALLINT
			);

			$calendarChangesTable->setPrimaryKey(['id']);
			$calendarChangesTable->addIndex(['calendarid', 'synctoken'], 'calendarid_synctoken');
		}

		if (!$schema->hasTable("${prefix}calendarobjects")) {
			$calendarObjectsTable = $schema->createTable("${prefix}calendarobjects");

			$calendarObjectsTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$calendarObjectsTable->addColumn(
				'calendardata',
				Type::BLOB,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$calendarObjectsTable->addColumn(
				'uri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarObjectsTable->addColumn(
				'calendarid',
				Type::INTEGER,
				[
					'unsigned' => true
				]
			);

			$calendarObjectsTable->addColumn(
				'lastmodified',
				Type::INTEGER,
				[
					'default' => null,
					'unsigned' => true,
					'notnull' => false
				]
			);

			$calendarObjectsTable->addColumn(
				'etag',
				Type::STRING,
				[
					'default' => null,
					'length' => 32,
					'notnull' => false
				]
			);

			$calendarObjectsTable->addColumn(
				'size',
				Type::BIGINT,
				[
					'unsigned' => true
				]
			);

			$calendarObjectsTable->addColumn(
				'componenttype',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarObjectsTable->addColumn(
				'firstoccurence',
				Type::INTEGER,
				[
					'default' => null,
					'unsigned' => true,
					'notnull' => false
				]
			);

			$calendarObjectsTable->addColumn(
				'lastoccurence',
				Type::INTEGER,
				[
					'default' => null,
					'unsigned' => true,
					'notnull' => false
				]
			);

			$calendarObjectsTable->addColumn(
				'uid',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarObjectsTable->setPrimaryKey(['id']);
			$calendarObjectsTable->addUniqueIndex(['calendarid', 'uri'], 'calobjects_index');
		}

		if (!$schema->hasTable("${prefix}calendars")) {
			$calendarsTable = $schema->createTable("${prefix}calendars");

			$calendarsTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$calendarsTable->addColumn(
				'principaluri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarsTable->addColumn(
				'displayname',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarsTable->addColumn(
				'uri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarsTable->addColumn(
				'synctoken',
				Type::INTEGER,
				[
					'default' => 1,
					'unsigned' => true
				]
			);

			$calendarsTable->addColumn(
				'description',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarsTable->addColumn(
				'calendarorder',
				Type::INTEGER,
				[
					'default' => 0,
					'unsigned' => true
				]
			);

			$calendarsTable->addColumn(
				'calendarcolor',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarsTable->addColumn(
				'timezone',
				Type::TEXT,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$calendarsTable->addColumn(
				'components',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarsTable->addColumn(
				'transparent',
				Type::SMALLINT,
				[
					'default' => 0,
				]
			);

			$calendarsTable->setPrimaryKey(['id']);
			$calendarsTable->addUniqueIndex(['principaluri', 'uri'], 'calendars_index');
		}

		if (!$schema->hasTable("${prefix}calendarsubscriptions")) {
			$calendarSubscriptionsTable = $schema->createTable("${prefix}calendarsubscriptions");

			$calendarSubscriptionsTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'uri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'principaluri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'source',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'displayname',
				Type::STRING,
				[
					'default' => null,
					'length' => 100,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'refreshrate',
				Type::STRING,
				[
					'default' => null,
					'length' => 10,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'calendarorder',
				Type::INTEGER,
				[
					'default' => 0,
					'unsigned' => true
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'calendarcolor',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'striptodos',
				Type::SMALLINT,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'stripalarms',
				Type::SMALLINT,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'stripattachments',
				Type::SMALLINT,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->addColumn(
				'lastmodified',
				Type::INTEGER,
				[
					'default' => null,
					'unsigned' => true,
					'notnull' => false
				]
			);

			$calendarSubscriptionsTable->setPrimaryKey(['id']);
			$calendarSubscriptionsTable->addUniqueIndex(['principaluri', 'uri'], 'calsub_index');
		}

		if (!$schema->hasTable("${prefix}cards")) {
			$cardsTable = $schema->createTable("${prefix}cards");

			$cardsTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$cardsTable->addColumn(
				'addressbookid',
				Type::INTEGER,
				[
					'default' => 0
				]
			);

			$cardsTable->addColumn(
				'carddata',
				Type::BLOB,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$cardsTable->addColumn(
				'uri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$cardsTable->addColumn(
				'lastmodified',
				Type::BIGINT,
				[
					'default' => null,
					'unsigned' => true,
					'notnull' => false
				]
			);

			$cardsTable->addColumn(
				'etag',
				Type::STRING,
				[
					'default' => null,
					'length' => 32,
					'notnull' => false
				]
			);

			$cardsTable->addColumn(
				'size',
				Type::BIGINT,
				[
					'unsigned' => true
				]
			);

			$cardsTable->setPrimaryKey(['id']);
		}

		if (!$schema->hasTable("${prefix}cards_properties")) {
			$cardsPropertiesTable = $schema->createTable("${prefix}cards_properties");

			$cardsPropertiesTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$cardsPropertiesTable->addColumn(
				'addressbookid',
				Type::BIGINT,
				[
					'default' => 0
				]
			);

			$cardsPropertiesTable->addColumn(
				'cardid',
				Type::BIGINT,
				[
					'default' => 0,
					'unsigned' => true
				]
			);

			$cardsPropertiesTable->addColumn(
				'name',
				Type::STRING,
				[
					'default' => null,
					'length' => 64,
					'notnull' => false
				]
			);

			$cardsPropertiesTable->addColumn(
				'value',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$cardsPropertiesTable->addColumn(
				'preferred',
				Type::INTEGER,
				[
					'default' => 1
				]
			);

			$cardsPropertiesTable->setPrimaryKey(['id']);
			$cardsPropertiesTable->addIndex(['value'], 'card_value_index');
			$cardsPropertiesTable->addIndex(['name'], 'card_name_index');
			$cardsPropertiesTable->addIndex(['cardid'], 'card_contactid_index');
		}

		if (!$schema->hasTable("${prefix}comments")) {
			$commentsTable = $schema->createTable("${prefix}comments");

			$commentsTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$commentsTable->addColumn(
				'parent_id',
				Type::INTEGER,
				[
					'default' => 0,
					'unsigned' => true
				]
			);

			$commentsTable->addColumn(
				'topmost_parent_id',
				Type::INTEGER,
				[
					'default' => 0,
					'unsigned' => true
				]
			);

			$commentsTable->addColumn(
				'children_count',
				Type::INTEGER,
				[
					'default' => 0,
					'unsigned' => true
				]
			);

			$commentsTable->addColumn(
				'actor_type',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$commentsTable->addColumn(
				'actor_id',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$commentsTable->addColumn(
				'message',
				Type::TEXT,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$commentsTable->addColumn(
				'verb',
				Type::STRING,
				[
					'default' => null,
					'length' => 64,
					'notnull' => false
				]
			);

			$commentsTable->addColumn(
				'creation_timestamp',
				Type::DATETIME,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$commentsTable->addColumn(
				'latest_child_timestamp',
				Type::DATETIME,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$commentsTable->addColumn(
				'object_type',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$commentsTable->addColumn(
				'object_id',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$commentsTable->setPrimaryKey(['id']);
			$commentsTable->addIndex(['actor_type', 'actor_id'], 'comments_actor_index');
			$commentsTable->addIndex(['object_type', 'object_id', 'creation_timestamp'], 'comments_object_index');
			$commentsTable->addIndex(['topmost_parent_id'], 'comments_topmost_parent_id_idx');
			$commentsTable->addIndex(['parent_id'], 'comments_parent_id_index');
		}

		if (!$schema->hasTable("${prefix}comments_read_markers")) {
			$commentsReadMarkersTable = $schema->createTable("${prefix}comments_read_markers");

			$commentsReadMarkersTable->addColumn(
				'user_id',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$commentsReadMarkersTable->addColumn(
				'marker_datetime',
				Type::DATETIME,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$commentsReadMarkersTable->addColumn(
				'object_type',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$commentsReadMarkersTable->addColumn(
				'object_id',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$commentsReadMarkersTable->addUniqueIndex(['user_id', 'object_type', 'object_id'], 'comments_marker_index');
			$commentsReadMarkersTable->addIndex(['object_type', 'object_id'], 'comments_marker_object_index');
		}

		if (!$schema->hasTable("${prefix}credentials")) {
			$credentialsTable = $schema->createTable("${prefix}credentials");

			$credentialsTable->addColumn(
				'user',
				Type::STRING,
				[
					'length' => 64
				]
			);

			$credentialsTable->addColumn(
				'identifier',
				Type::STRING,
				[
					'length' => 64
				]
			);

			$credentialsTable->addColumn(
				'credentials',
				Type::TEXT,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$credentialsTable->setPrimaryKey(['user', 'identifier']);
			$credentialsTable->addIndex(['user'], 'credentials_user');
		}

		if (!$schema->hasTable("${prefix}dav_shares")) {
			$davSharesTable = $schema->createTable("${prefix}dav_shares");

			$davSharesTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'autoincrement' => true,
					'unsigned' => true,
					'notnull' => true
				]
			);

			$davSharesTable->addColumn(
				'principaluri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$davSharesTable->addColumn(
				'type',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$davSharesTable->addColumn(
				'access',
				Type::SMALLINT,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$davSharesTable->addColumn(
				'resourceid',
				Type::INTEGER,
				[
					'unsigned' => true
				]
			);

			$davSharesTable->setPrimaryKey(['id']);
			$davSharesTable->addUniqueIndex(['principaluri', 'resourceid', 'type'], 'dav_shares_index');
		}

		if (!$schema->hasTable("${prefix}mounts")) {
			$mountsTable = $schema->createTable("${prefix}mounts");

			$mountsTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$mountsTable->addColumn(
				'storage_id',
				Type::INTEGER
			);

			$mountsTable->addColumn(
				'root_id',
				Type::INTEGER
			);

			$mountsTable->addColumn(
				'user_id',
				Type::STRING,
				[
					'length' => 64
				]
			);

			$mountsTable->addColumn(
				'mount_point',
				Type::STRING,
				[
					'length' => 4000
				]
			);

			$mountsTable->setPrimaryKey(['id']);
			$mountsTable->addUniqueIndex(['user_id', 'root_id'], 'mounts_user_root_index');
			$mountsTable->addIndex(['root_id'], 'mounts_root_index');
			$mountsTable->addIndex(['storage_id'], 'mounts_storage_index');
			$mountsTable->addIndex(['user_id'], 'mounts_user_index');
		}

		if (!$schema->hasTable("${prefix}schedulingobjects")) {
			$schedulingObjectsTable = $schema->createTable("${prefix}schedulingobjects");

			$schedulingObjectsTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$schedulingObjectsTable->addColumn(
				'principaluri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$schedulingObjectsTable->addColumn(
				'calendardata',
				Type::BLOB,
				[
					'default' => null,
					'notnull' => false
				]
			);

			$schedulingObjectsTable->addColumn(
				'uri',
				Type::STRING,
				[
					'default' => null,
					'length' => 255,
					'notnull' => false
				]
			);

			$schedulingObjectsTable->addColumn(
				'lastmodified',
				Type::INTEGER,
				[
					'default' => null,
					'unsigned' => true,
					'notnull' => false
				]
			);

			$schedulingObjectsTable->addColumn(
				'etag',
				Type::STRING,
				[
					'default' => null,
					'length' => 32,
					'notnull' => false
				]
			);

			$schedulingObjectsTable->addColumn(
				'size',
				Type::BIGINT,
				[
					'unsigned' => true
				]
			);

			$schedulingObjectsTable->setPrimaryKey(['id']);
		}

		if (!$schema->hasTable("${prefix}systemtag")) {
			$systemTagTable = $schema->createTable("${prefix}systemtag");

			$systemTagTable->addColumn(
				'id',
				Type::INTEGER,
				[
					'unsigned' => true,
					'autoincrement' => true,
					'notnull' => true
				]
			);

			$systemTagTable->addColumn(
				'name',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$systemTagTable->addColumn(
				'visibility',
				Type::SMALLINT,
				[
					'default' => 1
				]
			);

			$systemTagTable->addColumn(
				'editable',
				Type::SMALLINT,
				[
					'default' => 1
				]
			);

			$systemTagTable->setPrimaryKey(['id']);
			$systemTagTable->addUniqueIndex(['name', 'visibility', 'editable'], 'tag_ident');
		}

		if (!$schema->hasTable("${prefix}systemtag_object_mapping")) {
			$systemTagObjectMappingTable = $schema->createTable("${prefix}systemtag_object_mapping");

			$systemTagObjectMappingTable->addColumn(
				'objectid',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$systemTagObjectMappingTable->addColumn(
				'objecttype',
				Type::STRING,
				[
					'default' => '',
					'length' => 64
				]
			);

			$systemTagObjectMappingTable->addColumn(
				'systemtagid',
				Type::INTEGER,
				[
					'default' => 0,
					'notnull' => true,
					'unsigned' => true
				]
			);

			$systemTagObjectMappingTable->addUniqueIndex(['objecttype', 'objectid', 'systemtagid'], 'mapping');
		}

		if ($schema->hasTable("${prefix}file_map")) {
			$schema->dropTable("${prefix}file_map");
		}

		if ($schema->hasTable("${prefix}filecache")) {
			$fileCacheTable = $schema->getTable("${prefix}filecache");

			if (!$fileCacheTable->hasColumn('checksum')) {
				$fileCacheTable->addColumn(
					'checksum',
					Type::STRING,
					[
						'default' => null,
						'length' => 255,
						'notnull' => false
					]
				);
			}
		}

		if ($schema->hasTable("${prefix}share")) {
			$shareTable = $schema->getTable("${prefix}share");

			if (!$shareTable->hasColumn('uid_initiator')) {
				$shareTable->addColumn(
					'uid_initiator',
					Type::STRING,
					[
						'default' => null,
						'length' => 64,
						'notnull' => false
					]
				);
			}
		}
	}
}
