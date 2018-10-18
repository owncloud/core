<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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
use OCP\Share\IManager;
use OCP\IDBConnection;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\ILogger;

/**
 * Delete all shares that are expired
 */
class ExpireSharesJob extends TimedJob {

	/**
	 * Database connection
	 *
	 * @var IDBConnection
	 */
	private $connection;

	/**
	 * Share manager
	 *
	 * @var IManager
	 */
	private $shareManager;

	/**
	 * Logger
	 *
	 * @var ILogger
	 */
	private $logger;

	/**
	 * Constructor
	 *
	 * @param IDBConnection $connection connection
	 */
	public function __construct(IDBConnection $connection, IManager $shareManager, ILogger $logger) {
		$this->connection = $connection;
		$this->shareManager = $shareManager;
		$this->logger = $logger;
		// Run once a day
		$this->setInterval(24 * 60 * 60);
	}

	/**
	 * Makes the background job do its work
	 *
	 * @param array $argument unused argument
	 */
	public function run($argument) {
		// Current time
		$now = new \DateTime();
		$now = $now->format('Y-m-d H:i:s');

		// Expire file link shares only (for now)
		$qb = $this->connection->getQueryBuilder();
		$qb->select('id', 'file_source', 'uid_owner', 'item_type')
			->from('share')
			->where(
				$qb->expr()->andX(
					$qb->expr()->eq('share_type', $qb->expr()->literal(\OCP\Share::SHARE_TYPE_LINK)),
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
				// the getShareById already deletes those automatically
				$this->shareManager->getShareById('ocinternal:' . $share['id']);
			} catch (ShareNotFound $e) {
				// ignore, already deleted
				$this->logger->debug('ExpireSharesJob: Share with id "' . $share['id'] . '" was already deleted', ['app' => 'files_sharing']);
			}
		}
		$shares->closeCursor();
	}
}
