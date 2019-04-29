<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\FederatedFileSharing\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;
use OCP\Migration\ISchemaMigration;

/** Updates remote_id to be string if required */
class Version20190410160725 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		if ($schema->hasTable("${prefix}federated_reshares")) {
			$table = $schema->getTable("{$prefix}federated_reshares");
			$remoteIdColumn = $table->getColumn('remote_id');
			if ($remoteIdColumn && $remoteIdColumn->getType()->getName() !== Type::STRING) {
				$remoteIdColumn->setType(Type::getType(Type::STRING));
				$remoteIdColumn->setOptions(['length' => 255]);
			}
		}
	}
}
