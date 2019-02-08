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

use OCP\IDBConnection;
use OCP\Migration\ISqlMigration;

/**
 * Convert sub-shares entries of groups to the new accepted flag.
 *
 * Until now when a user unshared from self, the permissions of the
 * sub-share entry was set to 0. Sub-share entries have share type 2.
 *
 * From now on we use the "accepted" column to track accepted, pending
 * and rejected shares.
 *
 * This migration converts the permissions=0 entries of sub-shares to
 * accepted=1 (rejected)
 */
class Version20180302155233 implements ISqlMigration {
	public function sql(IDBConnection $connection) {
		$qb = $connection->getQueryBuilder();

		// Note: we deliberately leave the permissions set to 0 to speed up
		// the migration, as we would require to query every parent share to
		// find the actual permissions.
		// The permissions value will be reset again if the user decides to
		// accept the share again.
		$qb->update('share')
			->set('accepted', $qb->expr()->literal(\OCP\Share::STATE_REJECTED))
			->where($qb->expr()->eq('share_type', $qb->expr()->literal(2)))
			->andWhere($qb->expr()->eq('permissions', $qb->expr()->literal(0)))
			->execute();
	}
}
