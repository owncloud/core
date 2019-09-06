<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OC\Migrations;

use OCP\IDBConnection;
use OCP\Migration\ISqlMigration;

/**
 * Replace the storage backend amazons3 to files_external_s3.
 * Reason for this is post 10.2.1 version of core the changes have been
 * moved to files_external_s3 app. So kindly install and enable the app
 * to get the data, after upgrade.
 */
class Version20190905111710 implements ISqlMigration {
	public function sql(IDBConnection $connection) {
		$qb = $connection->getQueryBuilder();
		$qb->update('external_mounts')
			->set(
				'storage_backend',
				$qb->expr()->literal('files_external_s3')
			)
			->where(
				$qb->expr()->eq('storage_backend', $qb->expr()->literal('amazons3'))
			);
		$qb->execute();

		return $qb->getSQL();
	}
}
