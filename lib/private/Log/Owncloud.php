<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Michael Gapczynski <GapczynskiM@gmail.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Phiber2000 <phiber2000@gmx.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Log;

/**
 * logging utilities
 *
 * Log is saved at data/owncloud.log (on default)
 */

class Owncloud {
	protected static $logFile;

	/**
	 * Init class data
	 */
	public static function init() {
		$systemConfig = \OC::$server->getSystemConfig();
		$defaultLogFile = $systemConfig->getValue("datadirectory", \OC::$SERVERROOT.'/data').'/owncloud.log';
		self::$logFile = $systemConfig->getValue("logfile", $defaultLogFile);

		/**
		 * Fall back to default log file if specified logfile does not exist
		 * and can not be created.
		 */
		if (!self::createLogFile(self::$logFile)) {
			self::$logFile = $defaultLogFile;
		}
	}

	/**
	 * write a message in the log
	 * @param string $app
	 * @param string $message
	 * @param int $level
	 * @param string conditionalLogFile
	 */
	public static function write($app, $message, $level, $conditionalLogFile = null) {
		return self::writeExtra($app, $message, $level, $conditionalLogFile, []);
	}

	public static function writeExtra($app, $message, $level, $conditionalLogFile, $extraFields = []) {
		$config = \OC::$server->getSystemConfig();

		// default to ISO8601
		$format = $config->getValue('logdateformat', 'c');
		$logTimeZone = $config->getValue("logtimezone", 'UTC');
		try {
			$timezone = new \DateTimeZone($logTimeZone);
		} catch (\Exception $e) {
			$timezone = new \DateTimeZone('UTC');
		}
		$time = \DateTime::createFromFormat("U.u", \number_format(\microtime(true), 4, ".", ""));
		if ($time === false) {
			$time = new \DateTime(null, $timezone);
		} else {
			// apply timezone if $time is created from UNIX timestamp
			$time->setTimezone($timezone);
		}
		$request = \OC::$server->getRequest();
		$reqId = $request->getId();
		$remoteAddr = $request->getRemoteAddress();
		// remove username/passwords from URLs before writing the to the log file
		$time = $time->format($format);
		$url = ($request->getRequestUri() !== '') ? $request->getRequestUri() : '--';
		$method = \is_string($request->getMethod()) ? $request->getMethod() : '--';
		if (\OC::$server->getConfig()->getSystemValue('installed', false)) {
			$user = (\OC_User::getUser()) ? \OC_User::getUser() : '--';
		} else {
			$user = '--';
		}
		$entry = \compact(
			'reqId',
			'level',
			'time',
			'remoteAddr',
			'user',
			'app',
			'method',
			'url',
			'message'
		);

		if (!empty($extraFields)) {
			// augment with additional fields
			$entry = \array_merge($entry, $extraFields);
		}

		$entry = \json_encode($entry);
		if ($conditionalLogFile !== null) {
			if ($conditionalLogFile[0] !== '/') {
				$conditionalLogFile = \OC::$server->getConfig()->getSystemValue('datadirectory') . "/" . $conditionalLogFile;
			}
			self::createLogFile($conditionalLogFile);
			$handle = @\fopen($conditionalLogFile, 'a');
		} else {
			self::createLogFile(self::$logFile);
			$handle = @\fopen(self::$logFile, 'a');
		}
		if ($handle) {
			\fwrite($handle, $entry."\n");
			\fclose($handle);
		} else {
			// Fall back to error_log
			\error_log($entry);
		}
		if (\php_sapi_name() === 'cli-server') {
			\error_log($message, 4);
		}
	}

	/**
	 * create a log file and chmod it to the correct permissions
	 * @param string $logFile
	 * @return boolean
	 */
	public static function createLogFile($logFile) {
		if (\file_exists($logFile)) {
			return true;
		}
		if (\is_writable(\dirname($logFile)) && \touch($logFile)) {
			@\chmod($logFile, 0640);
			return true;
		}
		return false;
	}
	
	/**
	 * @return string
	 */
	public static function getLogFilePath() {
		return self::$logFile;
	}
}
