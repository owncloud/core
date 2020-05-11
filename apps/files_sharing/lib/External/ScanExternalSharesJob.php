<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Files_Sharing\External;

use OC\User\NoUserException;
use OC\BackgroundJob\TimedJob;
use OCP\Files\Cache\IScanner;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Files\StorageNotAvailableException;

/**
 * Class ScanExternalShares is a background job used to run the external shares
 * scanner over external shares that are eligible for scanning,
 * to ensure integrity of the file cache. Scanner will search for external shares
 * that satisfy the below requirements:
 *  - ensure that within single cron run, at max [cronjob_scan_external_batch]
 * 	  scans will be performed out of all accepted external shares
 *  - scan of that external share has not been performed within
 *    last [cronjob_scan_external_min_scan] seconds
 *  - user still exists, and has been active recently, meaning logged in at
 *    least [cronjob_scan_external_min_login] seconds ago
 *  - external share root etag/mtime changed, signaling that remote changed
 *    and requires scan
 *
 * @package OCA\Files_Sharing\External\BackgroundJob
 */
class ScanExternalSharesJob extends TimedJob {
	/** @var IDBConnection */
	private $connection;
	/** @var Manager */
	private $externalManager;
	/** @var IConfig */
	private $config;
	/** @var IUserManager */
	private $userManager;
	/** @var ILogger */
	private $logger;

	const DEFAULT_MIN_LAST_SCAN = 3*60*60;
	const DEFAULT_MIN_LOGIN = 24*60*60;
	const DEFAULT_SHARES_PER_SESSION = 100;
	const BATCH_SIZE = 10;

	public function __construct(IDBConnection $connection = null,
								IConfig $config = null,
								IUserManager $userManager = null,
								ILogger $logger = null,
								Manager $externalManager = null) {
		// Run once per 10 minutes
		$this->setInterval(60 * 10);

		if ($logger === null || $userManager === null || $config === null || $connection === null || $externalManager === null) {
			$this->fixDIForJobs();
		} else {
			$this->connection = $connection;
			$this->externalManager = $externalManager;
			$this->config = $config;
			$this->userManager = $userManager;
			$this->logger = $logger;
		}
	}

	protected function fixDIForJobs() {
		$this->connection = \OC::$server->getDatabaseConnection();
		$this->config = \OC::$server->getConfig();
		$this->userManager = \OC::$server->getUserManager();
		$this->logger = \OC::$server->getLogger();
		$this->externalManager = new Manager(
			$this->connection,
			\OC\Files\Filesystem::getMountManager(),
			\OC\Files\Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			null
		);
	}

	/**
	 * @param $argument
	 * @throws \Exception
	 */
	protected function run($argument) {
		$enabled = $this->config->getAppValue('files_sharing', 'cronjob_scan_external_enabled', 'no');
		if ($enabled !== 'yes') {
			$this->logger->debug(
				"Fed share scanner disabled, ignoring the run"
			);
			return;
		}

		$lastLoginThreshold = $this->config->getAppValue('files_sharing', 'cronjob_scan_external_min_login', self::DEFAULT_MIN_LOGIN);
		$lastScanThreshold = $this->config->getAppValue('files_sharing', 'cronjob_scan_external_min_scan', self::DEFAULT_MIN_LAST_SCAN);
		$maxSharesPerSession = $this->config->getAppValue('files_sharing', 'cronjob_scan_external_batch', self::DEFAULT_SHARES_PER_SESSION);
		$batchPerSession = \min($maxSharesPerSession, self::BATCH_SIZE);

		$scannedShares = 0;

		do {
			$offset = $this->config->getAppValue('files_sharing', 'cronjob_scan_external_offset', 0);
			$shares = $this->getAcceptedShares($batchPerSession, $offset);

			$searchedBatch = 0;
			foreach ($shares as $share) {
				if ($this->shouldScan($share, $lastLoginThreshold, $lastScanThreshold)) {
					// make sure not to scan this share again within [cronjob_scan_external_min_scan]
					$this->updateLastScanned($share['id'], \time());

					// do scan share
					$this->scan($share);
					$scannedShares += 1;
				}
				$searchedBatch += 1;
			}

			$this->logger->debug(
				"Fed share scanner performed scan of $scannedShares/$searchedBatch shares at offset $offset"
			);

			if (\count($shares) < $batchPerSession) {
				// next run wont have any users to scan,
				// as we returned less than the limit
				$offset = 0;
			} else {
				$offset += $batchPerSession;
			}

			$this->config->setAppValue('files_sharing', 'cronjob_scan_external_offset', $offset);
		} while ($offset !== 0 && $scannedShares < $maxSharesPerSession);
	}

	protected function shouldScan($share, $lastLoginThreshold, $lastScanThreshold) {
		$now = \time();

		// check last login
		$user = $this->userManager->get($share['user']);
		if ($user === null) {
			$this->logger->debug(
				"Will not scan fed share {$share['mountpoint']} for uid {$share['user']}, user does not exist"
			);
			return false;
		}
		$lastLogin = $user->getLastLogin();
		if ($lastLogin + $lastLoginThreshold < $now) {
			$this->logger->debug(
				"Will not scan fed share {$share['mountpoint']} for uid {$share['user']}, user did not login in last $lastLoginThreshold seconds"
			);
			return false;
		}

		// check last scan
		$lastScan = $share['lastscan'] ? \intval($share['lastscan']) : 0;
		if ($lastScan + $lastScanThreshold > $now) {
			$this->logger->debug(
				"Will not scan fed share {$share['mountpoint']} for uid {$share['user']}, share has been already scanned in last $lastScanThreshold seconds"
			);
			return false;
		}

		return true;
	}

	protected function scan($share) {
		// get mount
		$options = [
			'remote'	=> $share['remote'],
			'token'		=> $share['share_token'],
			'password'	=> $share['password'],
			'mountpoint'	=> $share['mountpoint'],
			'owner'		=> $share['owner']
		];

		try {
			// get mount
			$this->externalManager->setUid($share['user']);
			$mount = $this->externalManager->getMount($options);
			$this->externalManager->setUid(null);

			// check if root storage updated
			$storage = $mount->getStorage();
			$localMtime = $storage->filemtime('');
			$hasUpdated = $storage->hasUpdated('', $localMtime);
			if (!$hasUpdated) {
				$this->logger->debug(
					"Scanned fed share {$share['mountpoint']} for uid {$share['user']}, share is up to date"
				);
				return false;
			}

			// scan recursive, and do not reuse anything
			// as we need to force scanning of the external share storage
			$propagator = $storage->getPropagator();
			$propagator->beginBatch();
			$storage->getScanner()->scan('', IScanner::SCAN_RECURSIVE, IScanner::REUSE_NONE);
			$propagator->commitBatch();

			$this->logger->debug(
				"Scanned fed share {$share['mountpoint']} for uid {$share['user']} with last scan {$share['lastscan']}"
			);
		} catch (NoUserException $e) {
			// uid was null so we need to set it
			$this->externalManager->setUid($share['user']);
			$this->externalManager->removeShare($mount->getMountPoint());
			// and now we need to reset uid back to null
			$this->externalManager->setUid(null);
			$this->logger->debug(
				"Remote {$share['remote']} reports that external share with {$share['mountpoint']} for uid {$share['user']} no longer exists. Removing it.."
			);
		} catch (StorageNotAvailableException $e) {
			$reason = $e->getMessage();
			$this->logger->debug(
				"Skipping external share {$share['mountpoint']} for uid {$share['user']} from remote {$share['remote']} as share is unreachable. Reason: {$reason}"
			);
		} catch (\Exception $e) {
			$this->logger->debug(
				"Skipping external share {$share['mountpoint']} for uid {$share['user']} from remote {$share['remote']}  due to internal server error"
			);
			$this->logger->logException($e, ['app' => 'federatedfilesharing']);
		}

		$this->tearDownStorage();

		return true;
	}

	protected function tearDownStorage() {
		\OC_Util::tearDownFS();
	}

	protected function getAcceptedShares($limit, $offset) {
		$qb = $this->connection->getQueryBuilder();
		$qb->select('*')
			->from('share_external')
			->where($qb->expr()->eq('accepted', $qb->expr()->literal('1')));

		$qb->setMaxResults($limit);
		$qb->setFirstResult($offset);
		$qb->orderBy('id');

		$cursor = $qb->execute();
		return $cursor->fetchAll();
	}

	protected function updateLastScanned($id, $updatedTime) {
		$qb = $this->connection->getQueryBuilder();
		$qb->update('share_external')
			->set('lastscan', $qb->createNamedParameter($updatedTime))
			->where($qb->expr()->eq('id', $qb->createNamedParameter($id)));

		$result = $qb->execute();
		return $result === 1;
	}
}
