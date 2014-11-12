<?php
/**
 * ownCloud
 *
 * @author Jakob Sack
 * @copyright 2012 Jakob Sack owncloud@jakobsack.de
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

// Unfortunately we need this class for shutdown function
class TemporaryCronClass {

	public static function writeCronState() {
		$cronState = array(
			'timestamp' => time(),
			'server'=> php_uname()
		);
		file_put_contents(self::$lockFile, json_encode($cronState), LOCK_EX);
	}

	public static function readCronState() {
		$cronState = json_decode(file_get_contents(TemporaryCronClass::$lockFile), true);
		if (is_null($cronState)) {
			$cronState = array(
				'timestamp' => 0,
				'server'=> 'unknown'
			);
		}
		return $cronState;
	}
	/**
	 * @var bool
	 */
	public static $sent = false;

	/**
	 * @var string
	 */
	public static $lockFile = "";

	/**
	 * @var bool
	 */
	public static $keepLock = false;
}

// We use this function to handle (unexpected) shutdowns
function handleUnexpectedShutdown() {
	// Delete lockfile
	if (!TemporaryCronClass::$keepLock && file_exists(TemporaryCronClass::$lockFile)) {
		unlink(TemporaryCronClass::$lockFile);
	}

	// Say goodbye if the app did not shutdown properly
	if (!TemporaryCronClass::$sent) {
		if (OC::$CLI) {
			echo 'Unexpected error!' . PHP_EOL;
		} else {
			OC_JSON::error(array('data' => array('message' => 'Unexpected error!')));
		}
	}
}

try {

	require_once 'lib/base.php';

	if (\OCP\Util::needUpgrade()) {
		\OCP\Util::writeLog('cron', 'Update required, skipping cron', \OCP\Util::DEBUG);
		exit();
	}

	// load all apps to get all api routes properly setup
	OC_App::loadApps();

	\OC::$server->getSession()->close();

	// initialize a dummy memory session
	\OC::$server->setSession(new \OC\Session\Memory(''));

	/**
	 * @var \OC\Log $logger
	 */
	$logger = \OC_Log::$object;

	// Don't do anything if ownCloud has not been installed
	if (!OC_Config::getValue('installed', false)) {
		exit(0);
	}

	// Handle unexpected errors
	register_shutdown_function('handleUnexpectedShutdown');

	\OC::$server->getTempManager()->cleanOld();

	// Exit if background jobs are disabled!
	$appMode = OC_BackgroundJob::getExecutionType();
	if ($appMode == 'none') {
		TemporaryCronClass::$sent = true;
		if (OC::$CLI) {
			echo 'Background Jobs are disabled!' . PHP_EOL;
		} else {
			OC_JSON::error(array('data' => array('message' => 'Background jobs disabled!')));
		}
		exit(1);
	}

	if (OC::$CLI) {
		// Create lock file first
		TemporaryCronClass::$lockFile = OC_Config::getValue("datadirectory", OC::$SERVERROOT . '/data') . '/cron.lock';

		// We call ownCloud from the CLI (aka cron)
		if ($appMode != 'cron') {
			// Use cron in future!
			OC_BackgroundJob::setExecutionType('cron');
		}

		// check if backgroundjobs is still running
		if (file_exists(TemporaryCronClass::$lockFile)) {
			$cronState = TemporaryCronClass::readCronState();
			$diff = abs(time() - $cronState['timestamp']);
			$delta = (int)\OC::$server->getConfig()->getSystemValue('cron.lockfile.timeout', 30);
			if ($diff > $delta * 60) {
				$logger->info("Cron lock file has not been updated for $delta minutes. Assuming no other cron job is running. Last CronState: {$cronState['timestamp']} - on '{$cronState['server']}''");
			} else {
				TemporaryCronClass::$keepLock = true;
				TemporaryCronClass::$sent = true;
				echo "Another instance of cron.php is still running! Last CronState: {$cronState['timestamp']} - on '{$cronState['server']}''" . PHP_EOL;
				exit(1);
			}
		}

		// update timestamp in lock file
		TemporaryCronClass::writeCronState();

		// Work
		$jobList = \OC::$server->getJobList();
		$jobs = $jobList->getAll();
		foreach ($jobs as $job) {
			// update timestamp in lock file
			TemporaryCronClass::writeCronState();

			// execute the job
			$job->execute($jobList, $logger);
		}
	} else {
		// We call cron.php from some website
		if ($appMode == 'cron') {
			// Cron is cron :-P
			OC_JSON::error(array('data' => array('message' => 'Backgroundjobs are using system cron!')));
		} else {
			// Work and success :-)
			$jobList = \OC::$server->getJobList();
			$job = $jobList->getNext();
			if ($job != null) {
				$job->execute($jobList, $logger);
				$jobList->setLastJob($job);
			}
			OC_JSON::success();
		}
	}

	// done!
	TemporaryCronClass::$sent = true;
	// Log the successful cron execution
	if (\OC::$server->getConfig()->getSystemValue('cron_log', true)) {
		\OC::$server->getAppConfig()->setValue('core', 'lastcron', time());
	}
	exit();

} catch (Exception $ex) {
	\OCP\Util::writeLog('cron', $ex->getMessage(), \OCP\Util::FATAL);
}
