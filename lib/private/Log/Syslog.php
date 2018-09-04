<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

class Syslog {
	protected static $levels = [
		\OCP\Util::DEBUG => LOG_DEBUG,
		\OCP\Util::INFO => LOG_INFO,
		\OCP\Util::WARN => LOG_WARNING,
		\OCP\Util::ERROR => LOG_ERR,
		\OCP\Util::FATAL => LOG_CRIT,
	];

	public static $DEFAULT_FORMAT = '[%reqId%][%remoteAddr%][%user%][%app%][%method%][%url%] %message%';

	/**
	 * Init class data
	 */
	public static function init() {
		\openlog(\OC::$server->getSystemConfig()->getValue("syslog_tag", "ownCloud"), LOG_PID | LOG_CONS, LOG_USER);
		// Close at shutdown
		\OC::$server->getShutdownHandler()->register(function () {
			\closelog();
		});
	}

	/**
	 * write a message in the log
	 * @param string $app
	 * @param string $message
	 * @param int $level
	 */
	public static function write($app, $message, $level) {
		$syslogLevel = self::$levels[$level];

		$request = \OC::$server->getRequest();
		if (\OC::$server->getConfig()->getSystemValue('installed', false)) {
			$user = (\OC_User::getUser()) ? \OC_User::getUser() : '--';
		} else {
			$user = '--';
		}

		$entry = [
			'%reqId%' => $request->getId(),
			'%level%' => $level, // not needed in the default log line format, added by syslog itself
			'%remoteAddr%' => $request->getRemoteAddress(),
			'%user%' => $user,
			'%app%' => $app,
			'%method%' => \is_string($request->getMethod()) ? $request->getMethod() : '--',
			'%url%' => ($request->getRequestUri() !== '') ? $request->getRequestUri() : '--',
			'%message%' => $message
		];

		$syslogFormat = \OC::$server->getConfig()->getSystemValue(
			'log.syslog.format', self::$DEFAULT_FORMAT
		);

		$entryLine = \str_ireplace(\array_keys($entry), \array_values($entry), $syslogFormat);
		\syslog($syslogLevel, $entryLine);
	}
}
