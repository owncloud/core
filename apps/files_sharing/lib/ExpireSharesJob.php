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
use OCP\Activity\IEvent;
use OCP\IDBConnection;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\IManager;
use OCP\Activity\IManager as ActivityIManager;

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
	 * @var ActivityIManager $activityManager
	 */
	private $activityManager;

	/**
	 * sets the correct interval for this timed job
	 *
	 * @param IManager $shareManager
	 * @param IDBConnection $connection
	 * @param DefaultShareProvider $defaultShareProvider
	 * @param ActivityIManager $activityManager
	 */
	public function __construct(
		IManager $shareManager,
		IDBConnection $connection,
		DefaultShareProvider $defaultShareProvider,
		ActivityIManager $activityManager
	) {
		// Run once a day
		$this->setInterval(24 * 60 * 60);
		$this->shareManager = $shareManager;
		$this->connection = $connection;
		$this->defaultShareProvider = $defaultShareProvider;
		$this->activityManager = $activityManager;
	}

	/**
	 * Makes the background job do its work
	 *
	 * @param array $argument unused argument
	 */
	public function run($argument) {
		//Current time
		$today = new \DateTime("today");
		$today = $today->format('Y-m-d H:i:s');

		/*
		 * Expire file shares only (for now)
		 */
		$qb = $this->connection->getQueryBuilder();
		$qb->select('id')
			->from('share')
			->where(
				$qb->expr()->andX(
					$qb->expr()->lt('expiration', $qb->expr()->literal($today)),
					$qb->expr()->orX(
						$qb->expr()->eq('item_type', $qb->expr()->literal('file')),
						$qb->expr()->eq('item_type', $qb->expr()->literal('folder'))
					)
				)
			);

		$shares = $qb->execute();
		while ($share = $shares->fetch()) {
			$this->activityManager->setAgentAuthor(IEvent::AUTOMATION_AUTHOR);
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
			} finally {
				$this->activityManager->restoreAgentAuthor();
			}
		}
		$shares->closeCursor();
	}
}
