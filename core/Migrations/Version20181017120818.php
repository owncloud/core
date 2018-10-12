<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

use OCP\IDBConnection;
use OCP\Migration\ISqlMigration;

/**
 * Added extra column assignable to systemtag table, post 10.0.10.1 version
 * this is required to identify editable tag. It is only
 * set to "1" for visible and editable tags.
 */
class Version20181017120818 implements ISqlMigration {
	public function sql(IDBConnection $connection) {
		$valueToUpdate = 1;
		$qb = $connection->getQueryBuilder();
		$qb->update('systemtag')
			->set(
				'assignable',
				$qb->expr()->literal($valueToUpdate)
			)
			->where(
				$qb->expr()->eq(
					'visibility',
					$qb->expr()->literal($valueToUpdate)
				)
			)
			->andWhere(
				$qb->expr()->eq(
					'editable',
					$qb->expr()->literal($valueToUpdate)
				)
			);
		return [$qb->getSQL()];
	}
}
