<?php
/**
 * Copyright (c) 2015 Vincent Petry <pvince81@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_sharing\Lib;

use Doctrine\DBAL\Platforms\SqlitePlatform;
use OCP\IDBConnection;
use OC\BackgroundJob\TimedJob;

/**
 * Delete all share entries that have no matching entries in the file cache table.
 */
class DeleteOrphanedSharesJob extends TimedJob {

	/**
	 * Default interval in minutes
	 *
	 * @var int $defaultIntervalMin
	 **/
	protected $defaultIntervalMin = 15;

	/**
	 * Makes the background job do its work
	 *
	 * @param array $argument unused argument
	 */
	public function run($argument) {
		$connection = \OC::$server->getDatabaseConnection();
		$logger = \OC::$server->getLogger();

		if ($connection->getDatabasePlatform() instanceof SqlitePlatform) {
			// sqlite doesn't support left joins in update statements,
			// so do it slightly less efficiently...
			$sql =
				'DELETE FROM `*PREFIX*share` ' .
				'WHERE NOT EXISTS ' .
				'(SELECT `fileid` FROM `*PREFIX*filecache` WHERE `file_source` = `fileid`)';
		} else {
			$sql =
				'DELETE `s` FROM `*PREFIX*share` `s` ' .
				'LEFT JOIN `*PREFIX*filecache` `f` ON `s`.`file_source`=`f`.`fileid` ' .
				'WHERE `f`.`fileid` IS NULL';
		}
		$deletedEntries = $connection->executeUpdate($sql);
		$logger->info("$deletedEntries orphaned share(s) deleted", ['app' => 'DeleteOrphanedSharesJob']);
	}

}
