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

namespace OCA\DAV\BackgroundJob;

use OC\BackgroundJob\TimedJob;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\ILogger;

/**
 * Class CleanProperties
 *
 * @package OCA\DAV\BackgroundJob
 */
class CleanProperties extends TimedJob {
	const CHUNK_SIZE = 200;

	/** @var IDBConnection  */
	private $connection;
	/** @var ILogger  */
	private $logger;

	/**
	 * CleanProperties constructor.
	 *
	 * @param IDBConnection $connection
	 * @param ILogger $logger
	 */
	public function __construct(IDBConnection $connection,
								ILogger $logger) {
		$this->connection = $connection;
		$this->logger = $logger;

		//Run once in a day
		$this->setInterval(24*60*60);
	}

	/**
	 * Delete the orphan fileid from oc_properties table
	 *
	 * @param array $fileids fileid of oc_properties table
	 */
	private function deleteOrphan($fileids) {
		$qb = $this->connection->getQueryBuilder();

		$qb->delete('properties')
			->where($qb->expr()->in('fileid', $qb->createParameter('fileids')));
		$qb->setParameter('fileids', $fileids, IQueryBuilder::PARAM_INT_ARRAY);
		$qb->execute();
	}

	/**
	 * Gathers the fileid which are orphaned in the oc_properties table
	 * and then deletes them
	 */
	private function processProperties() {
		$orphanEntries = 0;
		$qb = $this->connection->getQueryBuilder();

		/**
		 * select prop.fileid from oc_properties prop
		 * left join oc_filecache fc on fc.fileid = prop.fileid
		 * where fc.fileid is not null limit CHUNK_SIZE
		 */
		$qb->select('prop.fileid')
			->from('properties', 'prop')
			->where($qb->expr()->isNull('fc.fileid'))
			->leftJoin('prop', 'filecache', 'fc', $qb->expr()->eq('prop.fileid', 'fc.fileid'))
			->setMaxResults(self::CHUNK_SIZE);

		while ($rows = $qb->execute()->fetchAll()) {
			$fileIds = \array_map(function ($row) {
				return (int) $row['fileid'];
			}, $rows);

			if (!empty($fileIds)) {
				$this->deleteOrphan($fileIds);
			}

			$orphanEntries += \count($fileIds);
		}

		$this->logger->debug("{$orphanEntries} orphaned properties entries were deleted", ['app' => 'dav']);
	}

	protected function run($argument) {
		$this->processProperties();
	}
}
