<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\DAV\Migrations;

use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Files\Node;
use OCP\IDBConnection;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Migration\ISqlMigration;

/*
 * Resolve userid/propertypath into fileid
 * Update all entries with actual fileid if possible
 * Drop all entries that can't be resolved
 */
class Version20170202213905 implements ISqlMigration {

	/** @var IUserManager */
	private $userManager;

	/** @var string[]  */
	private $statements = [];

	public function __construct(IUserManager $userManager) {
		$this->userManager = $userManager;
	}

	/**
	 * @param IDBConnection $connection
	 * @return array
	 */
	public function sql(IDBConnection $connection) {
		$qb = $connection->getQueryBuilder();
		$qb->select('*')
			->from('properties', 'props')
			->setMaxResults(1);
		$result = $qb->execute();
		$row = $result->fetch();

		// There is nothing to do if table is empty or has no userid field
		if (!$row || !isset($row['userid'])) {
			return $this->statements;
		}

		$qb->resetQueryParts()
			->setMaxResults(null)
			->select('userid', 'propertypath')
			->from('properties', 'props')
			->groupBy('userid')
			->addGroupBy('propertypath')
			->orderBy('userid')
			->addOrderBy('propertypath');

		$selectResult = $qb->execute();
		while ($row = $selectResult->fetch()) {
			try {
				$sql = $this->getRepairEntrySql($qb, $row);
				if ($sql !== null) {
					$this->statements[] = $sql;
				}
			} catch (\Exception $e) {
			}
		}

		//Mounted FS can have side effects on further migrations
		\OC_Util::tearDownFS();

		// drop entries with empty fileid
		$dropQuery = $qb->resetQueryParts()
			->delete('properties')
			->where(
				$qb->expr()->eq('fileid', $qb->expr()->literal('0'))
			)
			->orWhere(
				$qb->expr()->isNull('fileid')
			);
		$this->statements[] = $dropQuery->getSQL();

		return $this->statements;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param $entry
	 * @return string|null
	 */
	private function getRepairEntrySql(IQueryBuilder $qb, $entry) {
		$userId = $entry['userid'];
		$user = $this->userManager->get($userId);
		if (!($user instanceof IUser)) {
			return null;
		}

		$node = \OC::$server->getUserFolder($userId)->get($entry['propertypath']);
		if ($node instanceof Node && $node->getId()) {
			$fileId = $node->getId();
			$updateQuery = $this->getRepairQuery($qb, $fileId, $userId, $entry['propertypath']);
			return $updateQuery->getSQL();
		}
		return null;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param int $fileId
	 * @param string $userId
	 * @param string $propertyPath
	 * @return IQueryBuilder
	 */
	private function getRepairQuery(IQueryBuilder $qb, $fileId, $userId, $propertyPath) {
		return $qb->resetQueryParts()
			->update('properties')
			->set(
				'fileid',
				$qb->expr()->literal($fileId)
			)
			->where(
				$qb->expr()->eq('userid', $qb->expr()->literal($userId))
			)
			->andWhere(
				$qb->expr()->eq(
					'propertypath',
					$qb->expr()->literal($propertyPath)
				)
			);
	}
}
