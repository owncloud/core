<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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
use OCP\Migration\ISchemaMigration;

/**
 * Initial DB creation for share table
 */
class Version20170315173825 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if (!$schema->hasTable("${prefix}share")) {
			$table = $schema->createTable("${prefix}share");
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);
			// Constant OCP\Share::SHARE_TYPE_*
			$table->addColumn('share_type', 'smallint', [
				'notnull' => true,
				'default' => 0,
			]);
			// Foreign Key users::uid or NULL
			$table->addColumn('share_with', 'string', [
				'notnull' => false,
				'length' => 255,
			]);
			// Foreign Key users::uid
			// This is the owner of the share
			// which does not have to be the initiator of the share -->
			$table->addColumn('uid_owner', 'string', [
				'default' => '',
				'notnull' => true,
				'length' => 64,
			]);
			// Foreign Key users::uid
			// This is the initiator of the share
			$table->addColumn('uid_initiator', 'string', [
				'notnull' => false,
				'length' => 64,
			]);
			// Foreign Key share:.id or NULL
			$table->addColumn('parent', 'integer', [
				'notnull' => false,
			]);
			// eg: "file" or "folder"
			$table->addColumn('item_type', 'string', [
				'default' => '',
				'notnull' => true,
				'length' => 64,
			]);
			// Foreign Key filecache::fileid
			$table->addColumn('item_source', 'string', [
				'notnull' => false,
				'length' => 255,
			]);
			$table->addColumn('item_target', 'string', [
				'notnull' => false,
				'length' => 255,
			]);
			// Foreign Key filecache::fileid
			$table->addColumn('file_source', 'integer', [
				'notnull' => false,
			]);
			$table->addColumn('file_target', 'string', [
				'notnull' => false,
				'length' => 512,
			]);
			// Permission bitfield
			$table->addColumn('permissions', 'smallint', [
				'default' => 0,
				'notnull' => true,
			]);
			// Time of share creation
			$table->addColumn('stime', 'bigint', [
				'default' => 0,
				'notnull' => true,
			]);
			// Whether the receiver accepted the share, if share_with is set.
			$table->addColumn('accepted', 'smallint', [
				'default' => 0,
				'notnull' => true,
			]);
			// Time of share expiration
			$table->addColumn('expiration', 'datetime', [
				'notnull' => false,
			]);
			// Public share token
			$table->addColumn('token', 'string', [
				'notnull' => false,
				'length' => 32,
			]);
			$table->addColumn('mail_send', 'smallint', [
				'default' => 0,
				'notnull' => true,
			]);
			$table->setPrimaryKey(['id']);
			$table->addIndex(['item_type', 'share_type'], 'item_share_type_index');
			$table->addIndex(['file_source'], 'file_source_index');
			$table->addIndex(['token'], 'token_index');
		}
	}
}
