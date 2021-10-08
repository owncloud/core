<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

/**
 * Include an index in the cards_properties table
 */
class Version20210714123001 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}cards_properties")) {
			$cardsPropertiesTable = $schema->getTable("${prefix}cards_properties");

			$columnNames = ['addressbookid', 'name'];
			if (!$cardsPropertiesTable->columnsAreIndexed($columnNames)) {
				$cardsPropertiesTable->addIndex($columnNames, 'card_bookid_name_index');
			}
		}
	}
}
