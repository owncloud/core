<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OC\Repair;

use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Files\IMimeTypeLoader;

/**
 * Repairs filecache entries that are supposed to be directories
 * but have a non-directory mime type.
 *
 * See https://github.com/owncloud/core/pull/27668 for context.
 */
class RepairDirectoryMimeType implements IRepairStep {

	const CHUNK_SIZE = 200;

	/** @var \OCP\IDBConnection */
	protected $connection;

	/** @var IMimeTypeLoader */
	protected $mimeTypeLoader;

	/**
	 * @param \OCP\IDBConnection $connection
	 * @param IMimeTypeLoader $mimeTypeLoader
	 */
	public function __construct($connection, $mimeTypeLoader) {
		$this->connection = $connection;
		$this->mimeTypeLoader = $mimeTypeLoader;
	}

	public function getName() {
		return 'Repair mime type of directories';
	}

	private function countResultsToProcess($directoryMimeTypeId, $directoryMimePartId) {
		$qb = $this->connection->getQueryBuilder();
		$qb->select($qb->createFunction('COUNT(*)'));
		$this->addQueryConditions($qb, $directoryMimeTypeId, $directoryMimePartId);
		$results = $qb->execute();
		$count = $results->fetchColumn(0);
		$results->closeCursor();
		return (int)$count;
	}

	private function addQueryConditions($qb, $directoryMimeTypeId, $directoryMimePartId) {
		$qbe = $this->connection->getQueryBuilder();
		$qbe->select($qbe->expr()->literal(1))
			->from('filecache', 'fc')
			->where($qbe->expr()->eq('fc.parent', 'f.fileid'));

		// where f.mimetype=m.id
		// from oc_filecache f
		$qb->from('filecache', 'f')
			->where(
				$qb->expr()->orX(
					$qb->expr()->neq('f.mimetype', $qb->createNamedParameter($directoryMimeTypeId)),
					$qb->expr()->neq('f.mimepart', $qb->createNamedParameter($directoryMimePartId))
				)
			)
			// and exists (select 1 from oc_filecache fc where fc.parent=f.fileid);
			->andWhere($qb->createFunction('EXISTS (' . $qbe->getSQL() . ')'));
	}

	private function repair(IOutput $out, $directoryMimeTypeId, $directoryMimePartId) {
		// selects all filecache entries that have a mime type which is not
		// the one of directories but still have at least one child
		$qb = $this->connection->getQueryBuilder();
		// select fileid
		$qb->select('fileid');
		$this->addQueryConditions($qb, $directoryMimeTypeId, $directoryMimePartId);
		$qb->setMaxResults(self::CHUNK_SIZE);

		// update query to fix the mime type in bulk
		$qbu = $this->connection->getQueryBuilder();
		$qbu->update('filecache')
			->set('mimetype', $qbu->createNamedParameter($directoryMimeTypeId))
			->set('mimepart', $qbu->createNamedParameter($directoryMimePartId))
			->where($qbu->expr()->in('fileid', $qbu->createParameter('fileids')));

		do {
			$results = $qb->execute();
			$fileIds = [];
			while ($row = $results->fetch()) {
				$fileIds[] = $row['fileid'];
			}
			$results->closeCursor();

			if (!empty($fileIds)) {
				$qbu->setParameter('fileids', $fileIds, IQueryBuilder::PARAM_INT_ARRAY);
				$qbu->execute();
			}

			$out->advance(count($fileIds));
		} while (!empty($fileIds));
	}

	public function run(IOutput $out) {
		$directoryMimeTypeId = (int)$this->mimeTypeLoader->getId('httpd/unix-directory');
		$directoryMimePartId = (int)$this->mimeTypeLoader->getId('httpd');

		$out->startProgress($this->countResultsToProcess($directoryMimeTypeId, $directoryMimePartId));

		$this->repair($out, $directoryMimeTypeId, $directoryMimePartId);

		$out->finishProgress();
	}
}
