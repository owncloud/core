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
 * Fixes missed  `publicuri` field on update from 9.1.x
 */

class Version20170427182800 implements ISchemaMigration {

	/** @var  string */
	private $prefix;

	/**
	 * @param Schema $schema
	 * @param [] $options
	 */
	public function changeSchema(Schema $schema, array $options) {
		$this->prefix = $options['tablePrefix'];
		$table = $schema->getTable("{$this->prefix}dav_shares");
		if (!$table->hasColumn('publicuri')) {
			$table->addColumn('publicuri', 'string', [
				'length' => 255,
				'notnull' => false,
			]);
			$table->dropIndex('dav_shares_index');
			$table->addUniqueIndex(
				['principaluri', 'resourceid', 'type', 'publicuri'],
				'dav_shares_index'
			);
		}
	}
}
