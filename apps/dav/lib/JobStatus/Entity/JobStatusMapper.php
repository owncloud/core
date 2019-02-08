<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\JobStatus\Entity;

use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

class JobStatusMapper extends Mapper {
	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'dav_job_status');
	}

	/**
	 * @param string $userId
	 * @param string $jobId
	 * @return JobStatus
	 * @throws \OCP\AppFramework\Db\DoesNotExistException
	 * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException
	 */
	public function findByUserIdAndJobId($userId, $jobId) {
		$query = $this->db->getQueryBuilder();
		$query->select('*')
			->from($this->getTableName())
			->where($query->expr()->eq('uuid', $query->createNamedParameter($jobId)))
			->andWhere($query->expr()->eq('user_id', $query->createNamedParameter($userId)));
		return $this->mapRowToEntity($this->findOneQuery($query->getSQL(), $query->getParameters()));
	}
}
