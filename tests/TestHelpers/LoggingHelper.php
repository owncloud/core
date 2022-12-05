<?php declare(strict_types=1);
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace TestHelpers;

use Exception;
use InvalidArgumentException;

/**
 * Helper to read and analyze the owncloud log file
 *
 * @author Artur Neumann <artur@jankaritech.com>
 *
 */
class LoggingHelper {
	/**
	 * @var array
	 */
	public const LOG_LEVEL_ARRAY = [
		"debug",
		"info",
		"warning",
		"error",
		"fatal"
	];

	/**
	 * returns the log file path local to the system ownCloud is running on
	 *
	 * @param string|null $xRequestId
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getLogFilePath(
		?string $xRequestId = ''
	):string {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// Currently we don't interact with the log file on reva or OCIS
			return "";
		}
		$result = SetupHelper::runOcc(
			['log:owncloud'],
			$xRequestId
		);
		if ($result["code"] != 0) {
			throw new Exception(
				"could not get owncloud log file information" .
				$result ["stdOut"] . " " . $result ["stdErr"]
			);
		}
		\preg_match(
			"/Log backend ownCloud: (\w+)\sLog file: (.*)/",
			$result ['stdOut'],
			$matches
		);
		if (!isset($matches[1]) || $matches[1] !== "enabled") {
			throw new Exception("log backend is not set to 'owncloud'");
		}
		if (!isset($matches[2])) {
			throw new Exception("could not get owncloud log file information");
		}
		return $matches[2];
	}

	/**
	 *
	 * @param string|null $baseUrl
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $xRequestId
	 * @param int|null $noOfLinesToRead
	 *
	 * @return array
	 * @throws Exception
	 */
	public static function getLogFileContent(
		?string $baseUrl,
		?string $adminUsername,
		?string $adminPassword,
		?string $xRequestId = '',
		?int $noOfLinesToRead = 0
	):array {
		$result = OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUsername,
			$adminPassword,
			"GET",
			"/apps/testing/api/v1/logfile/$noOfLinesToRead",
			$xRequestId
		);
		if ($result->getStatusCode() !== 200) {
			throw new Exception(
				"could not get logfile content " . $result->getReasonPhrase()
			);
		}
		$response = HttpRequestHelper::getResponseXml($result, __METHOD__);

		$result = [];
		foreach ($response->data->element as $line) {
			array_push($result, (string)$line);
		}
		return $result;
	}

	/**
	 * returns the currently set log level [debug, info, warning, error, fatal]
	 *
	 * @param string|null $xRequestId
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getLogLevel(
		?string $xRequestId = ''
	):string {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			return "debug";
		}
		$result = SetupHelper::runOcc(
			["log:manage"],
			$xRequestId
		);
		if ($result["code"] != 0) {
			throw new Exception(
				"could not get log level " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		if (!\preg_match("/Log level:\s(\w+)\s\(/", $result["stdOut"], $matches)) {
			throw new Exception("could not get log level");
		}
		return \strtolower($matches[1]);
	}

	/**
	 *
	 * @param string|null $logLevel (debug|info|warning|error|fatal)
	 * @param string|null $xRequestId
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function setLogLevel(
		?string $logLevel,
		?string $xRequestId = ''
	):void {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// Currently we can't manage log file settings on reva or OCIS
			return;
		}
		if (!\in_array($logLevel, self::LOG_LEVEL_ARRAY)) {
			throw new InvalidArgumentException("invalid log level");
		}
		$result = SetupHelper::runOcc(
			["log:manage", "--level=$logLevel"],
			$xRequestId
		);
		if ($result["code"] != 0) {
			throw new Exception(
				"could not set log level " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
	}

	/**
	 * returns the currently set logging backend (owncloud|syslog|errorlog)
	 *
	 * @param string|null $xRequestId
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getLogBackend(
		?string $xRequestId = ''
	):string {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			return "errorlog";
		}
		$result = SetupHelper::runOcc(
			["log:manage"],
			$xRequestId
		);
		if ($result["code"] != 0) {
			throw new Exception(
				"could not get log backend " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		$pregResult = \preg_match(
			"/Enabled logging backend:\s(\w+)\n/",
			$result ["stdOut"],
			$matches
		);
		if (!$pregResult) {
			throw new Exception("could not get log backend");
		}
		return \strtolower($matches[1]);
	}

	/**
	 *
	 * @param string|null $backend (owncloud|syslog|errorlog)
	 * @param string|null $xRequestId
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function setLogBackend(
		?string  $backend,
		?string  $xRequestId = ''
	):void {
		if (!\in_array($backend, ["owncloud", "syslog", "errorlog"])) {
			throw new InvalidArgumentException("invalid log backend");
		}
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// Currently we can't manage log file settings on reva or OCIS
			return;
		}
		$result = SetupHelper::runOcc(
			["log:manage", "--backend=$backend"],
			$xRequestId
		);
		if ($result["code"] != 0) {
			throw new Exception(
				"could not set log backend " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
	}

	/**
	 * returns the currently set logging timezone
	 *
	 * @param string|null $xRequestId
	 *
	 * @return string
	 * @throws Exception
	 */
	public static function getLogTimezone(
		?string  $xRequestId = ''
	):string {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			return "UTC";
		}
		$result = SetupHelper::runOcc(
			["log:manage"],
			$xRequestId
		);
		if ($result["code"] != 0) {
			throw new Exception(
				"could not get log timezone " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		$pregResult = \preg_match(
			"/Log timezone:\s(\w+)/",
			$result ["stdOut"],
			$matches
		);
		if (!$pregResult) {
			throw new Exception("could not get log timezone");
		}
		return $matches[1];
	}

	/**
	 *
	 * @param string|null $timezone
	 * @param string|null $xRequestId
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function setLogTimezone(
		?string $timezone,
		?string $xRequestId = ''
	):void {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// Currently we can't manage log file settings on reva or OCIS
			return;
		}
		$result = SetupHelper::runOcc(
			["log:manage", "--timezone=$timezone"],
			$xRequestId
		);
		if ($result["code"] != 0) {
			throw new Exception(
				"could not set log timezone " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
	}

	/**
	 *
	 * @param string|null $baseUrl
	 * @param string|null $adminUsername
	 * @param string|null $adminPassword
	 * @param string|null $xRequestId
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function clearLogFile(
		?string $baseUrl,
		?string $adminUsername,
		?string $adminPassword,
		?string $xRequestId = ''
	):void {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// Currently we don't interact with the log file on reva or OCIS
			return;
		}
		$result = OcsApiHelper::sendRequest(
			$baseUrl,
			$adminUsername,
			$adminPassword,
			"DELETE",
			"/apps/testing/api/v1/logfile",
			$xRequestId
		);
		if ($result->getStatusCode() !== 200) {
			throw new Exception("could not clear logfile");
		}
	}

	/**
	 *
	 * @param string|null $logLevel
	 * @param string|null $backend
	 * @param string|null $timezone
	 * @param string|null $xRequestId
	 *
	 * @return void
	 * @throws Exception
	 */
	public static function restoreLoggingStatus(
		?string $logLevel,
		?string $backend,
		?string $timezone,
		?string $xRequestId = ''
	):void {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			// Currently we don't interact with the log file on reva or OCIS
			return;
		}
		if (!\in_array(\strtolower($logLevel), self::LOG_LEVEL_ARRAY)) {
			throw new InvalidArgumentException("invalid log level");
		}
		if (!\in_array(\strtolower($backend), ["owncloud", "syslog", "errorlog"])) {
			throw new InvalidArgumentException("invalid log backend");
		}

		$commands = ["log:manage"];

		if ($timezone) {
			\array_push($commands, "--timezone=$timezone");
		}
		if ($logLevel) {
			\array_push($commands, "--backend=$backend");
		}
		if ($backend) {
			\array_push($commands, "--level=$logLevel");
		}

		if (\count($commands) > 1) {
			$result = SetupHelper::runOcc(
				$commands,
				$xRequestId
			);
			if ($result["code"] != 0) {
				throw new Exception(
					"could not restore log status " . $result ["stdOut"] . " " .
					$result ["stdErr"]
				);
			}
		}
	}

	/**
	 * returns the currently set log level, backend and timezone
	 *
	 * @param string|null $xRequestId
	 *
	 * @return array|string[]
	 * @throws Exception
	 */
	public static function getLogInfo(
		?string $xRequestId = ''
	):array {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			return [
				"level" => "debug",
				"backend" => "errorlog",
				"timezone" => "UTC"
			];
		}
		$result = SetupHelper::runOcc(
			["log:manage"],
			$xRequestId
		);
		if ($result["code"] != 0) {
			throw new Exception(
				"could not get log level " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}

		$logging = [];
		if (!\preg_match("/Log level:\s(\w+)\s\(/", $result["stdOut"], $matches)) {
			throw new Exception("could not get log level");
		}
		$logging["level"] = $matches[1];

		$pregResult = \preg_match(
			"/Log timezone:\s(\w+)/",
			$result ["stdOut"],
			$matches
		);
		if (!$pregResult) {
			throw new Exception("could not get log timezone");
		}
		$logging["timezone"] = $matches[1];

		$pregResult = \preg_match(
			"/Enabled logging backend:\s(\w+)\n/",
			$result ["stdOut"],
			$matches
		);
		if (!$pregResult) {
			throw new Exception("could not get log backend");
		}
		$logging["backend"] = $matches[1];

		return $logging;
	}
}
