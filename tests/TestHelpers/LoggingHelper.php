<?php
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

use SimpleXMLElement;

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
	const LOG_LEVEL_ARRAY = [
		"debug",
		"info",
		"warning",
		"error",
		"fatal"
	];

	/**
	 * returns the log file path local to the system ownCloud is running on
	 *
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogFilePath() {
		$result = SetupHelper::runOcc(['log:owncloud']);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get owncloud log file information" .
				$result ["stdOut"] . " " . $result ["stdErr"]
			);
		}
		\preg_match(
			"/Log backend ownCloud: (\w+)\sLog file: (.*)/",
			$result ['stdOut'], $matches
		);
		if (!isset($matches[1]) || $matches[1] !== "enabled") {
			throw new \Exception("log backend is not set to 'owncloud'");
		}
		if (!isset($matches[2])) {
			throw new \Exception("could not get owncloud log file information");
		}
		return $matches[2];
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $adminUsername
	 * @param string $adminPassword
	 * @param int $noOfLinesToRead
	 *
	 * @throws \Exception
	 * @return SimpleXMLElement
	 */
	public static function getLogFileContent(
		$baseUrl, $adminUsername, $adminPassword, $noOfLinesToRead = 0
	) {
		$result = OcsApiHelper::sendRequest(
			$baseUrl, $adminUsername,
			$adminPassword, "GET", "/apps/testing/api/v1/logfile/$noOfLinesToRead"
		);
		if ($result->getStatusCode() !== 200) {
			throw new \Exception(
				"could not get logfile content " . $result->getReasonPhrase()
			);
		}
		return HttpRequestHelper::getResponseXml($result, __METHOD__)->data->element;
	}

	/**
	 * returns the currently set log level [debug, info, warning, error, fatal]
	 *
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogLevel() {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			return "debug";
		}
		$result = SetupHelper::runOcc(["log:manage"]);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get log level " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		if (!\preg_match("/Log level:\s(\w+)\s\(/", $result["stdOut"], $matches)) {
			throw new \Exception("could not get log level");
		}
		return \strtolower($matches[1]);
	}

	/**
	 *
	 * @param string $logLevel (debug|info|warning|error|fatal)
	 *
	 * @return void
	 * @throws \InvalidArgumentException
	 * @throws \Exception
	 */
	public static function setLogLevel($logLevel) {
		if (!\in_array($logLevel, self::LOG_LEVEL_ARRAY)) {
			throw new \InvalidArgumentException("invalid log level");
		}
		$result = SetupHelper::runOcc(["log:manage", "--level=$logLevel"]);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not set log level " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
	}

	/**
	 * returns the currently set logging backend (owncloud|syslog|errorlog)
	 *
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogBackend() {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			return "errorlog";
		}
		$result = SetupHelper::runOcc(["log:manage"]);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get log backend " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		$pregResult = \preg_match(
			"/Enabled logging backend:\s(\w+)\n/",
			$result ["stdOut"], $matches
		);
		if (!$pregResult) {
			throw new \Exception("could not get log backend");
		}
		return \strtolower($matches[1]);
	}

	/**
	 *
	 * @param string $backend (owncloud|syslog|errorlog)
	 *
	 * @return void
	 * @throws \InvalidArgumentException
	 * @throws \Exception
	 */
	public static function setLogBackend($backend) {
		if (!\in_array($backend, ["owncloud", "syslog", "errorlog"])) {
			throw new \InvalidArgumentException("invalid log backend");
		}
		$result = SetupHelper::runOcc(["log:manage", "--backend=$backend"]);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not set log backend " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
	}

	/**
	 * returns the currently set logging timezone
	 *
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogTimezone() {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			return "UTC";
		}
		$result = SetupHelper::runOcc(["log:manage"]);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get log timezone " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		$pregResult = \preg_match(
			"/Log timezone:\s(\w+)/", $result ["stdOut"], $matches
		);
		if (!$pregResult) {
			throw new \Exception("could not get log timezone");
		}
		return $matches[1];
	}

	/**
	 *
	 * @param string $timezone
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function setLogTimezone($timezone) {
		$result = SetupHelper::runOcc(["log:manage", "--timezone=$timezone"]);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not set log timezone " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
	}

	/**
	 *
	 * @param string $baseUrl
	 * @param string $adminUsername
	 * @param string $adminPassword
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function clearLogFile($baseUrl, $adminUsername, $adminPassword) {
		$result = OcsApiHelper::sendRequest(
			$baseUrl, $adminUsername,
			$adminPassword, "DELETE", "/apps/testing/api/v1/logfile"
		);
		if ($result->getStatusCode() !== 200) {
			throw new \Exception("could not clear logfile");
		}
	}

	/**
	 *
	 * @param string $logLevel
	 * @param string $backend
	 * @param string $timezone
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function restoreLoggingStatus($logLevel, $backend, $timezone) {
		if (!\in_array(\strtolower($logLevel), self::LOG_LEVEL_ARRAY)) {
			throw new \InvalidArgumentException("invalid log level");
		}
		if (!\in_array(\strtolower($backend), ["owncloud", "syslog", "errorlog"])) {
			throw new \InvalidArgumentException("invalid log backend");
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
			$result = SetupHelper::runOcc($commands);
			if ($result["code"] != 0) {
				throw new \Exception(
					"could not restore log status " . $result ["stdOut"] . " " .
					$result ["stdErr"]
				);
			}
		}
	}

	/**
	 * returns the currently set log level, backend and timezone
	 *
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogInfo() {
		if (OcisHelper::isTestingOnOcisOrReva()) {
			return [
				"level" => "debug",
				"backend" => "errorlog",
				"timezone" => "UTC"
			];
		}
		$result = SetupHelper::runOcc(["log:manage"]);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get log level " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}

		$logging = [];
		if (!\preg_match("/Log level:\s(\w+)\s\(/", $result["stdOut"], $matches)) {
			throw new \Exception("could not get log level");
		}
		$logging["level"] = $matches[1];

		$pregResult = \preg_match(
			"/Log timezone:\s(\w+)/", $result ["stdOut"], $matches
		);
		if (!$pregResult) {
			throw new \Exception("could not get log timezone");
		}
		$logging["timezone"] = $matches[1];

		$pregResult = \preg_match(
			"/Enabled logging backend:\s(\w+)\n/",
			$result ["stdOut"], $matches
		);
		if (!$pregResult) {
			throw new \Exception("could not get log backend");
		}
		$logging["backend"] = $matches[1];

		return $logging;
	}
}
