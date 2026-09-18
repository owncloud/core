<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace OC\Authentication\AccountLockout;

use Doctrine\DBAL\Exception\TableNotFoundException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;

/**
 * Database access for the failed login counters in `account_lockouts`.
 *
 * There is at most one row per lockout key. All write operations are single
 * statements so that requests served by different application servers cannot
 * race the threshold - see AccountLockout::recordFailure() for how they are
 * combined.
 *
 * A pending upgrade is served with the login route enabled but the previous
 * schema still in place, so every statement tolerates the table being absent
 * and simply does not lock anybody out until the migration has run.
 */
class LockoutMapper {
	public const TABLE = 'account_lockouts';

	/** @var IDBConnection */
	private $db;

	public function __construct(IDBConnection $db) {
		$this->db = $db;
	}

	/**
	 * @param string $uid the normalised lockout key
	 * @return array|null ['fail_count' => int, 'locked_until' => int|null, 'last_fail_at' => int]
	 *                    or null if the key has no failures recorded
	 */
	public function find($uid) {
		$qb = $this->db->getQueryBuilder();
		$qb->select('fail_count', 'locked_until', 'last_fail_at')
			->from(self::TABLE)
			->where($qb->expr()->eq('uid', $qb->createNamedParameter($uid)));

		try {
			$result = $qb->execute();
		} catch (TableNotFoundException $e) {
			return null;
		}
		$row = $result->fetch();
		$result->closeCursor();

		if ($row === false) {
			return null;
		}
		return [
			'fail_count' => (int)$row['fail_count'],
			'locked_until' => $row['locked_until'] === null ? null : (int)$row['locked_until'],
			'last_fail_at' => (int)$row['last_fail_at'],
		];
	}

	/**
	 * Restart the counter at 1 if the existing row is stale - either the last
	 * failure is older than the attempt window, or a previous lockout has
	 * expired. Clears the expired lockout in the same statement.
	 *
	 * @param string $uid the normalised lockout key
	 * @param int $now unix timestamp
	 * @param int $windowStart failures older than this no longer count
	 * @return int number of rows updated, 0 if the row is absent or still current
	 */
	public function restartIfStale($uid, $now, $windowStart) {
		$qb = $this->db->getQueryBuilder();
		$qb->update(self::TABLE)
			->set('fail_count', $qb->createNamedParameter(1, IQueryBuilder::PARAM_INT))
			->set('locked_until', 'null')
			->set('last_fail_at', $qb->createNamedParameter($now, IQueryBuilder::PARAM_INT))
			->where($qb->expr()->eq('uid', $qb->createNamedParameter($uid)))
			->andWhere($qb->expr()->orX(
				$qb->expr()->lt('last_fail_at', $qb->createNamedParameter($windowStart, IQueryBuilder::PARAM_INT)),
				$qb->expr()->andX(
					$qb->expr()->isNotNull('locked_until'),
					$qb->expr()->lte('locked_until', $qb->createNamedParameter($now, IQueryBuilder::PARAM_INT))
				)
			));
		return $this->executeStatement($qb);
	}

	/**
	 * Atomically add one to the counter of an existing row.
	 *
	 * @param string $uid the normalised lockout key
	 * @param int $now unix timestamp
	 * @return int number of rows updated, 0 if the row is absent
	 */
	public function increment($uid, $now) {
		$qb = $this->db->getQueryBuilder();
		$qb->update(self::TABLE)
			->set('fail_count', $qb->createFunction('`fail_count` + 1'))
			->set('last_fail_at', $qb->createNamedParameter($now, IQueryBuilder::PARAM_INT))
			->where($qb->expr()->eq('uid', $qb->createNamedParameter($uid)));
		return $this->executeStatement($qb);
	}

	/**
	 * Record the first failure for a key.
	 *
	 * @param string $uid the normalised lockout key
	 * @param int $now unix timestamp
	 * @return bool false if a concurrent request inserted the row first
	 */
	public function insertFirstFailure($uid, $now) {
		$qb = $this->db->getQueryBuilder();
		$qb->insert(self::TABLE)
			->values([
				'uid' => $qb->createNamedParameter($uid),
				'fail_count' => $qb->createNamedParameter(1, IQueryBuilder::PARAM_INT),
				'locked_until' => $qb->createNamedParameter(null),
				'last_fail_at' => $qb->createNamedParameter($now, IQueryBuilder::PARAM_INT),
			]);
		try {
			$qb->execute();
		} catch (UniqueConstraintViolationException $e) {
			return false;
		} catch (TableNotFoundException $e) {
			return true;
		}
		return true;
	}

	/**
	 * Start a lockout, but only for a row which reached the threshold and is
	 * not locked already - so concurrent failures cannot extend a running
	 * lockout.
	 *
	 * @param string $uid the normalised lockout key
	 * @param int $lockedUntil unix timestamp the lockout expires at
	 * @param int $minFailCount the configured threshold
	 * @return int number of rows updated
	 */
	public function lock($uid, $lockedUntil, $minFailCount) {
		$qb = $this->db->getQueryBuilder();
		$qb->update(self::TABLE)
			->set('locked_until', $qb->createNamedParameter($lockedUntil, IQueryBuilder::PARAM_INT))
			->where($qb->expr()->eq('uid', $qb->createNamedParameter($uid)))
			->andWhere($qb->expr()->isNull('locked_until'))
			->andWhere($qb->expr()->gte('fail_count', $qb->createNamedParameter($minFailCount, IQueryBuilder::PARAM_INT)));
		return $this->executeStatement($qb);
	}

	/**
	 * Forget all failures of a key.
	 *
	 * @param string $uid the normalised lockout key
	 */
	public function delete($uid) {
		$qb = $this->db->getQueryBuilder();
		$qb->delete(self::TABLE)
			->where($qb->expr()->eq('uid', $qb->createNamedParameter($uid)));
		$this->executeStatement($qb);
	}

	/**
	 * Housekeeping: drop rows which can no longer affect a login decision.
	 *
	 * @param int $olderThan rows whose last failure predates this are removed
	 * @param int $now unix timestamp; rows with a running lockout are kept
	 * @return int number of rows removed
	 */
	public function deleteStale($olderThan, $now) {
		$qb = $this->db->getQueryBuilder();
		$qb->delete(self::TABLE)
			->where($qb->expr()->lt('last_fail_at', $qb->createNamedParameter($olderThan, IQueryBuilder::PARAM_INT)))
			->andWhere($qb->expr()->orX(
				$qb->expr()->isNull('locked_until'),
				$qb->expr()->lte('locked_until', $qb->createNamedParameter($now, IQueryBuilder::PARAM_INT))
			));
		return $this->executeStatement($qb);
	}

	/**
	 * @param IQueryBuilder $qb
	 * @return int number of rows affected, 0 if the table is not there yet
	 */
	private function executeStatement(IQueryBuilder $qb) {
		try {
			return $qb->execute();
		} catch (TableNotFoundException $e) {
			return 0;
		}
	}
}
