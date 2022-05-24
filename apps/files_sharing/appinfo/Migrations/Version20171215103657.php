<?php

/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCA\Files_Sharing\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISchemaMigration;

/**
 * Another index to optimise share loading
 */
class Version20171215103657 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$indexName = 'item_source_type_index';
		$columns = ['item_source', 'share_type', 'item_type'];

		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}share")) {
			$table = $schema->getTable("${prefix}share");
			if (!$table->hasIndex($indexName)) {
				$table->addIndex($columns, $indexName);
			}
		}
	}
}
