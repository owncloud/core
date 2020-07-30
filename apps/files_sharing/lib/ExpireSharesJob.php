<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

namespace OCA\Files_Sharing;

use OC\BackgroundJob\TimedJob;
use OC\Share20\DefaultShareProvider;
use OCP\IDBConnection;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\IManager;

/**
 * Delete all shares that are expired
 */
class ExpireSharesJob extends TimedJob {

	/**
	 * @var IManager $shareManager
	 */
	private $shareManager;

	/**
	 * @var IDBConnection $connection
	 */
	private $connection;

	/**
	 * @var DefaultShareProvider $defaultShareProvider
	 */
	private $defaultShareProvider;

	/**
	 * sets the correct interval for this timed job
	 *
	 * @param IManager $shareManager
	 * @param IDBConnection $connection
	 * @param DefaultShareProvider $defaultShareProvider
	 */
	public function __construct(
		IManager $shareManager,
		IDBConnection $connection,
		DefaultShareProvider $defaultShareProvider
	) {
		// Run once a day
		$this->setInterval(24 * 60 * 60);
		$this->shareManager = $shareManager;
		$this->connection = $connection;
		$this->defaultShareProvider = $defaultShareProvider;
	}

	/**
	 * Makes the background job do its work
	 *
	 * @param array $argument unused argument
	 */
	public function run($argument) {
		//Current time
		$now = new \DateTime();
		$now = $now->format('Y-m-d H:i:s');

		/*
		 * Expire file shares only (for now)
		 */
		$qb = $this->connection->getQueryBuilder();
		$qb->select('id')
			->from('share')
			->where(
				$qb->expr()->andX(
					$qb->expr()->lte('expiration', $qb->expr()->literal($now)),
					$qb->expr()->orX(
						$qb->expr()->eq('item_type', $qb->expr()->literal('file')),
						$qb->expr()->eq('item_type', $qb->expr()->literal('folder'))
					)
				)
			);

		$shares = $qb->execute();
		while ($share = $shares->fetch()) {
			try {
				/*
				 * The type of $share['id'] changes depends on the db type. (int for pgsql, string for others)
				 * This situation led to problem when stubbing method in tests.
				 * $share['id'] has been casted to string to ensure consistency.
				 */
				$shareObject = $this->defaultShareProvider->getShareById((string)$share['id']);
				$this->shareManager->deleteShare($shareObject);
			} catch (ShareNotFound $ex) {
				//already deleted
			}
		}
		$shares->closeCursor();
	}
}
