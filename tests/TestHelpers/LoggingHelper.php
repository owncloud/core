<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <info@jankaritech.com>
 * @copyright 2017 Artur Neumann info@jankaritech.com
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
namespace TestHelpers;

/**
 * Helper to read and analyze the owncloud log file
 * 
 * @author Artur Neumann <info@jankaritech.com>
 *
 */
class LoggingHelper {
	/**
	 * returns the log file path
	 * 
	 * @param string $ocPath
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogFilePath($ocPath) {
		$result = SetupHelper::runOcc(['log:owncloud'], $ocPath);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get owncloud log file information" .
				$result ["stdOut"] . " " . $result ["stdErr"]
			);
		}
		preg_match(
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
	 * returns the currently set log level [debug, info, warning, error]
	 * 
	 * @param string $ocPath
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogLevel($ocPath) {
		$result = SetupHelper::runOcc(["log:manage"], $ocPath);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get log level " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		if (!preg_match("/Log level:\s(\w+)\s\(/", $result["stdOut"], $matches)) {
			throw new \Exception("could not get log level");
		}
		return strtolower($matches[1]);
	}

	/**
	 * 
	 * @param string $ocPath
	 * @param string $logLevel (debug|info|warning|error)
	 * @return void
	 * @throws \InvalidArgumentException
	 * @throws \Exception
	 */
	public static function setLogLevel($ocPath, $logLevel) {
		if (!in_array($logLevel, ["debug", "info", "warning", "error"])) {
			throw new \InvalidArgumentException("invalid log level");
		}
		$result = SetupHelper::runOcc(["log:manage", "--level=$logLevel"], $ocPath);
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
	 * @param string $ocPath
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogBackend($ocPath) {
		$result = SetupHelper::runOcc(["log:manage"], $ocPath);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get log backend " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		$pregResult = preg_match(
			"/Enabled logging backend:\s(\w+)\n/",
			$result ["stdOut"], $matches
		);
		if (!$pregResult) {
			throw new \Exception("could not get log backend");
		}
		return strtolower($matches[1]);
	}

	/**
	 * 
	 * @param string $ocPath
	 * @param string $backend (owncloud|syslog|errorlog)
	 * @return void
	 * @throws \InvalidArgumentException
	 * @throws \Exception
	 */
	public static function setLogBackend($ocPath, $backend) {
		if (!in_array($backend, ["owncloud", "syslog", "errorlog"])) {
			throw new \InvalidArgumentException("invalid log backend");
		}
		$result = SetupHelper::runOcc(["log:manage", "--backend=$backend"], $ocPath);
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
	 * @param string $ocPath
	 * @throws \Exception
	 * @return string
	 */
	public static function getLogTimezone($ocPath) {
		$result = SetupHelper::runOcc(["log:manage"], $ocPath);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not get log timezone " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
		$pregResult = preg_match(
			"/Log timezone:\s(\w+)/", $result ["stdOut"], $matches
		);
		if (!$pregResult) {
			throw new \Exception("could not get log timezone");
		}
		return $matches[1];
	}

	/**
	 * 
	 * @param string $ocPath
	 * @param string $timezone
	 * @return void
	 * @throws \Exception
	 */
	public static function setLogTimezone($ocPath, $timezone) {
		$result = SetupHelper::runOcc(
			["log:manage", "--timezone=$timezone"], $ocPath
		);
		if ($result["code"] != 0) {
			throw new \Exception(
				"could not set log timezone " . $result ["stdOut"] . " " .
				$result ["stdErr"]
			);
		}
	}

	/**
	 * 
	 * @param string $ocPath
	 * @return void
	 * @throws \Exception
	 */
	public static function clearLogFile($ocPath) {
		$fp = fopen(self::getLogFilePath($ocPath), 'w');
		if ($fp === false) {
			throw new \Exception("could not clear the log file");
		}
		fclose($fp);
	}

	/**
	 * reads x last lines from a file
	 * Slightly modified version of 
	 * http://www.geekality.net/2011/05/28/php-tail-tackling-large-files/
	 * 
	 * @param string $filepath file to read
	 * @param int $noOfLinesToRead no of lines to read
	 * @param bool $adaptive make the file buffer adaptive
	 * @return array lines of the file to read
	 * @author Torleif Berger, Lorenzo Stanco
	 * @link http://stackoverflow.com/a/15025877/995958
	 * @license http://creativecommons.org/licenses/by/3.0/
	 */
	public static function tailFile(
		$filepath, $noOfLinesToRead = 1, $adaptive = true
	) {
		$lines = $noOfLinesToRead; //set a counter
		// Open file
		$f = @fopen($filepath, "rb");
		if ($f === false) {
			throw new \Exception("could not read file '$filepath'");
		}
		
		// Sets buffer size, according to the number of lines to retrieve.
		// This gives a performance boost when reading a few lines from the file.
		if (!$adaptive) {
			$buffer = 4096;
		} else {
			$buffer = ($lines < 2 ? 64 : ($lines < 10 ? 512 : 4096));
		}
		
		// Jump to last character
		fseek($f, -1, SEEK_END);
		
		// Read it and adjust line number if necessary
		// Otherwise the result would be wrong if file doesn't end with a blank line
		if (fread($f, 1) != "\n") {
			$lines -= 1;
		}
		
		// Start reading
		$output = '';
		$chunk = '';
		
		// While we would like more
		while (ftell($f) > 0 && $lines >= 0) {
			
			// Figure out how far back we should jump
			$seek = min(ftell($f), $buffer);
			
			// Do the jump (backwards, relative to where we are)
			fseek($f, -$seek, SEEK_CUR);
			
			// Read a chunk and prepend it to our output
			$output = ($chunk = fread($f, $seek)) . $output;
			
			// Jump back to where we started reading
			fseek($f, -mb_strlen($chunk, '8bit'), SEEK_CUR);
			
			// Decrease our line counter
			$lines -= substr_count($chunk, "\n");
		}
		
		// While we have too many lines
		// (Because of buffer size we might have read too many)
		while ($lines++ < 0) {
			// Find first newline and remove all text before that
			$output = substr($output, strpos($output, "\n") + 1);
		}
		
		// Close file and return
		fclose($f);
		$output = explode("\n", $output);
		if ($output[count($output) - 1] === "") {
			array_pop($output);
		}
		if (count($output) > $noOfLinesToRead) {
			throw new \Exception("size of output array is bigger than expected");
		}
		return $output;
	}
}