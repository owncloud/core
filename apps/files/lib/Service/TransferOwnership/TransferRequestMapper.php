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

namespace OCA\Files\Service\TransferOwnership;

use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

class TransferRequestMapper extends Mapper {

	const TABLENAME = 'transfer_requests';

	public function __construct(IDBConnection $db) {
		parent::__construct($db, self::TABLENAME, TransferRequest::class);
	}

	/**
	 * @param $requestId
	 * @return \OCP\AppFramework\Db\Entity|TransferRequest
	 * @throws \OCP\AppFramework\Db\DoesNotExistException
	 * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException
	 */
	public function findById($requestId) {
		$query = $this->db->getQueryBuilder();
		$query->select('*')
			->from($this->getTableName())
			->where($query->expr()->eq('id', $query->expr()->literal($requestId)));
		return $this->findEntity($query->getSQL(), $query->getParameters());
	}

	/**
	 * Finds a pending transfer for the same file between two users
	 * @param $sourceUser
	 * @param $destinationUser
	 * @param $fileId
	 * @return array
	 */
	public function findRequestWithSameSignature($sourceUser, $destinationUser, $fileId) {
		$query = $this->db->getQueryBuilder();
		$query->select('*')
			->from($this->getTableName())
			->where($query->expr()->eq('source_user_id', $query->expr()->literal($sourceUser)))
			->andWhere($query->expr()->eq('destination_user_id', $query->expr()->literal($destinationUser)))
			->andWhere($query->expr()->eq('file_id', $query->expr()->literal($fileId)))
			->andWhere($query->expr()->isNull('rejected_time'))
			->andWhere($query->expr()->isNull('accepted_time'))
			->andWhere($query->expr()->isNull('actioned_time'));
		return $this->findEntities($query->getSQL(), $query->getParameters());
	}

	/**
	 * Tries to see if there is an open request for a range of file ids
	 * This is used to check if we are trying to make a new request on a file that is already pending transfer
	 * @param array $files
	 * @return array
	 */
	public function findOpenRequestForGivenFiles($files) {
		$query = $this->db->getQueryBuilder();
		$files = array_map(function($fileid) use ($query) {
			return $query->expr()->literal($fileid);
		}, $files);
		$query->select('*')
			->from($this->getTableName())
			->where($query->expr()->in('file_id', $files))
			->andWhere($query->expr()->isNull('rejected_time'))
			->andWhere($query->expr()->isNull('accepted_time'))
			->andWhere($query->expr()->isNull('actioned_time'));
		return $this->findEntities($query->getSQL(), $query->getParameters());
	}

	public function findOpenRequestsOlderThan($days) {
		$threshold = \OC::$server->getTimeFactory()->getTime() - 60*60*$days;
		$query = $this->db->getQueryBuilder();
		$query->select('*')
			->from($this->getTableName())
			->where($query->expr()->isNull('rejected_time'))
			->andWhere($query->expr()->isNull('accepted_time'))
			->andWhere($query->expr()->isNull('actioned_time'))
			->andWhere($query->expr()->lt('requested_time', $query->expr()->literal($threshold)));
		return $this->findEntities($query->getSQL(), $query->getParameters());
	}

}