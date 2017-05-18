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

namespace OC\Log;

/**
 * logging utilities
 *
 * Log is saved at data/owncloud.log (on default)
 */

class Owncloud {
	static protected $logFile;

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
		if (!file_exists(self::$logFile)) {
			if(!is_writable(dirname(self::$logFile))) {
				self::$logFile = $defaultLogFile;
			} else {
				if(!touch(self::$logFile)) {
					self::$logFile = $defaultLogFile;
				}
			}
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
		$config = \OC::$server->getSystemConfig();

		// default to ISO8601
		$format = $config->getValue('logdateformat', 'c');
		$logTimeZone = $config->getValue( "logtimezone", 'UTC' );
		try {
			$timezone = new \DateTimeZone($logTimeZone);
		} catch (\Exception $e) {
			$timezone = new \DateTimeZone('UTC');
		}
		$time = \DateTime::createFromFormat("U.u", number_format(microtime(true), 4, ".", ""));
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
		$method = is_string($request->getMethod()) ? $request->getMethod() : '--';
		if(\OC::$server->getConfig()->getSystemValue('installed', false)) {
			$user = (\OC_User::getUser()) ? \OC_User::getUser() : '--';
		} else {
			$user = '--';
		}
		$entry = compact(
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
		$entry = json_encode($entry);
		if (!is_null($conditionalLogFile)) {
			if ($conditionalLogFile[0] !== '/') {
				$conditionalLogFile = \OC::$server->getConfig()->getSystemValue('datadirectory') . "/" . $conditionalLogFile;
			}
			$handle = @fopen($conditionalLogFile, 'a');
			@chmod($conditionalLogFile, 0640);
		} else {
			$handle = @fopen(self::$logFile, 'a');
			@chmod(self::$logFile, 0640);
		}
		if ($handle) {
			fwrite($handle, $entry."\n");
			fclose($handle);
		} else {
			// Fall back to error_log
			error_log($entry);
		}
		if (php_sapi_name() === 'cli-server') {
			error_log($message, 4);
		}
	}

	/**
	 * @return string
	 */
	public static function getLogFilePath() {
		return self::$logFile;
	}
}
