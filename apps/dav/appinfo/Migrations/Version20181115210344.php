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

namespace OCA\DAV\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/*
 * Convert id columns of many DAV-related tables to bigint.
 *
 * Note that some of these migrations might have existed before
 * but some update paths did not trigger them properly, so this
 * migration here exists to align all update paths.
 */
class Version20181115210344 implements ISchemaMigration {

	/**
	 * @param Schema $schema
	 * @param array $options
	 */
	public function changeSchema(Schema $schema, array $options) {
		$tableNames = [
			'addressbookchanges',
			'addressbooks',
			'calendarchanges',
			'calendarobjects',
			'calendars',
			'calendarsubscriptions',
			'cards',
			'cards_properties',
			'dav_shares',
			'schedulingobjects',
		];
		$prefix = $options['tablePrefix'];

		foreach ($tableNames as $tableName) {
			$table = $schema->getTable("{$prefix}{$tableName}");
			$idColumn = $table->getColumn('id');
			if ($idColumn->getType()->getName() !== Type::BIGINT) {
				$idColumn->setType(Type::getType(Type::BIGINT));
				$idColumn->setOptions(['length' => 20]);
			}
		}
	}
}
