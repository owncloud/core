<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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
namespace OCA\dav\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Add index to oc_cards_properties to assist with searching with large numbers of rows
 */
class Version20200114181454 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("${prefix}cards_properties");
		// Check for existing index spanning these columns
		foreach ($table->getIndexes() as $index) {
			// Check if we have a matching index already
			if (empty(\array_diff($index->getColumns(), ['addressbookid', 'name', 'value']))) {
				return;
			}
		}
		// Add the index if we dont have one spanning this column already
		$table->addIndex(['addressbookid', 'name', 'value'], 'carddata_aid_n_v_idx');
	}
}
