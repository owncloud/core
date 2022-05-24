<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\DAV\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/*
 * Create initial tables for the dav app
 */

class Version20170116150538 implements ISchemaMigration {

	/** @var  string */
	private $prefix;

	/**
	 * @param Schema $schema
	 * @param [] $options
	 */
	public function changeSchema(Schema $schema, array $options) {
		$this->prefix = $options['tablePrefix'];
		$this->createAddressbooksTable($schema);
		$this->createCardsTable($schema);
		$this->createAddressbookChangesTable($schema);
		$this->createCalendarObjectsTable($schema);
		$this->createCalendarsTable($schema);
		$this->createCalendarChangesTable($schema);
		$this->createCalendarSubscriptionsTable($schema);
		$this->createSchedulingObjectsTable($schema);
		$this->createCardsPropertiesTable($schema);
		$this->createDavSharesTable($schema);
	}

	/**
	 * @param Schema $schema
	 */
	private function createAddressbooksTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}addressbooks")) {
			$table = $schema->createTable("{$this->prefix}addressbooks");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'unsigned' => true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('principaluri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('displayname', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('description', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('synctoken', 'integer', [
				'unsigned' => true,
				'notnull' => true,
				'default' => 1,
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['principaluri', 'uri'], 'addressbook_index');
		}
	}

	/**
	 * @param Schema $schema
	 */
	private function createCardsTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}cards")) {
			$table = $schema->createTable("{$this->prefix}cards");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'unsigned' => true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('addressbookid', 'integer', [
				'notnull' => true,
				'default' => 0,
			]);
			$table->addColumn('carddata', 'blob', [
				'notnull' => false,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('lastmodified', 'bigint', [
				'length' => 11,
				'unsigned' => true,
				'notnull' => false,
			]);
			$table->addColumn('etag', 'string', [
				'length' => 32,
				'notnull' => false,
			]);
			$table->addColumn('size', 'bigint', [
				'length' => 11,
				'notnull' => true,
				'unsigned' => true,
			]);
			$table->setPrimaryKey(['id']);
		}
	}

	/**
	 * @param Schema $schema
	 */
	private function createAddressbookChangesTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}addressbookchanges")) {
			$table = $schema->createTable("{$this->prefix}addressbookchanges");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
				'unsigned' => true,
				'length' => 11,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('synctoken', 'integer', [
				'notnull' => true,
				'default' => 1,
				'unsigned' =>true,
			]);
			$table->addColumn('addressbookid', 'integer', [
				'notnull' => true,
			]);
			$table->addColumn('operation', 'smallint', [
				'notnull' => true,
				'length' => 1,
			]);
			$table->setPrimaryKey(['id']);
			$table->addIndex(
				['addressbookid', 'synctoken'],
				'addressbookid_synctoken'
			);
		}
	}

	/**
	 * @param Schema $schema
	 */
	private function createCalendarObjectsTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}calendarobjects")) {
			$table = $schema->createTable("{$this->prefix}calendarobjects");
			$table->addColumn('id', 'integer', [
				'notnull' => true,
				'autoincrement' => true,
				'unsigned' => true,
				'length' => 11,
			]);
			$table->addColumn('calendardata', 'blob', [
				'notnull' => false,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('calendarid', 'integer', [
				'notnull' => true,
				'unsigned' =>true,
			]);
			$table->addColumn('lastmodified', 'integer', [
				'length' => 11,
				'unsigned' =>true,
				'notnull' => false,
			]);
			$table->addColumn('etag', 'string', [
				'length' => 32,
				'notnull' => false,
			]);
			$table->addColumn('size', 'bigint', [
				'length' => 11,
				'notnull' => true,
				'unsigned' =>true,
			]);
			$table->addColumn('componenttype', 'string', [
				'length' => 8,
				'notnull' => false,
			]);
			$table->addColumn('firstoccurence', 'bigint', [
				'unsigned' =>true,
				'length' => 11,
				'notnull' => false,
			]);
			$table->addColumn('lastoccurence', 'bigint', [
				'unsigned' =>true,
				'length' => 11,
				'notnull' => false,
			]);
			$table->addColumn('uid', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			// possible types: 0 - public, 1 - private, 2 - confidential
			$table->addColumn('classification', 'integer', [
				'default' => 0,
				'notnull' => false
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(
				['calendarid', 'uri'],
				'calobjects_index'
			);
		}
	}

	/**
	 * @param Schema $schema
	 */
	private function createCalendarsTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}calendars")) {
			$table = $schema->createTable("{$this->prefix}calendars");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'unsigned' =>true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('principaluri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('displayname', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('synctoken', 'integer', [
				'notnull' => true,
				'default' => 1,
				'unsigned' =>true,
			]);
			$table->addColumn('description', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('calendarorder', 'integer', [
				'notnull' => true,
				'default' => 0,
				'unsigned' =>true,
			]);
			$table->addColumn('calendarcolor', 'string', [
				'notnull' => false,
			]);
			$table->addColumn('timezone', 'text', [
				'notnull' => false,
			]);
			$table->addColumn('components', 'string', [
				'length' => 20,
				'notnull' => false,
			]);
			$table->addColumn('transparent', 'smallint', [
				'notnull' => true,
				'default' => 0,
				'length' => 1
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(
				['principaluri', 'uri'],
				'calendars_index'
			);
		}
	}

	/**
	 * @param Schema $schema
	 */
	private function createCalendarChangesTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}calendarchanges")) {
			$table = $schema->createTable("{$this->prefix}calendarchanges");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'unsigned' =>true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('synctoken', 'integer', [
				'notnull' => true,
				'default' => 1,
				'unsigned' =>true,
			]);
			$table->addColumn('calendarid', 'integer', [
				'notnull' => true,
			]);
			$table->addColumn('operation', 'smallint', [
				'notnull' => true,
				'length' => 1,
			]);
			$table->setPrimaryKey(['id']);
			$table->addIndex(
				['calendarid', 'synctoken'],
				'calendarid_synctoken'
			);
		}
	}

	/**
	 * @param Schema $schema
	 */
	private function createCalendarSubscriptionsTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}calendarsubscriptions")) {
			$table = $schema->createTable("{$this->prefix}calendarsubscriptions");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'unsigned' =>true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('principaluri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('source', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('displayname', 'string', [
				'length' => 100,
				'notnull' => false,
			]);
			$table->addColumn('refreshrate', 'string', [
				'length' => 10,
				'notnull' => false,
			]);
			$table->addColumn('calendarorder', 'integer', [
				'default' => 0,
				'notnull' => true,
				'unsigned' =>true,
			]);
			$table->addColumn('calendarcolor', 'string', [
				'notnull' => false,
			]);
			$table->addColumn('striptodos', 'smallint', [
				'length' => 1,
				'notnull' => false,
			]);
			$table->addColumn('stripalarms', 'smallint', [
				'length' => 1,
				'notnull' => false,
			]);
			$table->addColumn('stripattachments', 'smallint', [
				'length' => 1,
				'notnull' => false,
			]);
			$table->addColumn('lastmodified', 'integer', [
				'unsigned' => true,
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(
				['principaluri', 'uri'],
				'calsub_index'
			);
		}
	}

	/**
	 * @param Schema $schema
	 */
	private function createSchedulingObjectsTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}schedulingobjects")) {
			$table = $schema->createTable("{$this->prefix}schedulingobjects");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'unsigned' =>true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('principaluri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('calendardata', 'blob', [
				'notnull' => false,
			]);
			$table->addColumn('uri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('lastmodified', 'integer', [
				'notnull' => false,
				'unsigned' => true,
			]);
			$table->addColumn('etag', 'string', [
				'length' => 32,
				'notnull' => false,
			]);
			$table->addColumn('size', 'bigint', [
				'length' => 11,
				'notnull' => true,
				'unsigned' => true,
			]);
			$table->setPrimaryKey(['id']);
		}
	}

	private function createCardsPropertiesTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}cards_properties")) {
			$table = $schema->createTable("{$this->prefix}cards_properties");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'unsigned' =>true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('addressbookid', 'bigint', [
				'notnull' => true,
				'default' => 0,
			]);
			$table->addColumn('cardid', 'bigint', [
				'default' => 0,
				'unsigned' =>true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('name', 'string', [
				'notnull' => false,
				'length' => 64,
			]);
			$table->addColumn('value', 'string', [
				'notnull' => false,
				'length' => 255,
			]);
			$table->addColumn('preferred', 'integer', [
				'default' => 1,
				'notnull' => true,
				'length' => 4,
			]);
			$table->setPrimaryKey(['id']);
			$table->addIndex(
				['cardid'],
				'card_contactid_index'
			);
			$table->addIndex(
				['name'],
				'card_name_index'
			);
			$table->addIndex(
				['value'],
				'card_value_index'
			);
		}
	}

	private function createDavSharesTable(Schema $schema) {
		if (!$schema->hasTable("{$this->prefix}dav_shares")) {
			$table = $schema->createTable("{$this->prefix}dav_shares");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'unsigned' =>true,
				'notnull' => true,
				'length' => 11,
			]);
			$table->addColumn('principaluri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('type', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->addColumn('access', 'smallint', [
				'notnull' => false,
				'length' => 1,
			]);
			$table->addColumn('resourceid', 'integer', [
				'unsigned' =>true,
				'notnull' => true,
			]);
			$table->addColumn('publicuri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(
				['principaluri', 'resourceid', 'type', 'publicuri'],
				'dav_shares_index'
			);
		}
	}
}
