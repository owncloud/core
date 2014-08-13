<?php
/**
 * ownCloud
 *
 * @author Robin Appelman
 * @copyright 2012 Robin Appelman icewind1991@gmail.com
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

/**
 * logging utilities
 *
 * Log is saved at data/owncloud.log (on default)
 */

namespace OC\Log;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use OC;
use OC\Log\Interfaces\LogHandlerInterface;
use OC_Config;

class Owncloud implements LogHandlerInterface {
	static protected $reqId;
	protected $logFile;
	/**
	 * @var Logger
	 */
	protected $monolog;

	public function __construct() {

		$defaultLogFile = OC_Config::getValue("datadirectory", OC::$SERVERROOT . '/data') . '/owncloud.log';
		$this->logFile = OC_Config::getValue("logfile", $defaultLogFile);
	}

	public function setMonolog(Logger $logger) {
		$this->monolog = $logger;
	}

	public function addHandler() {
		$stream = new StreamHandler($this->logFile, OC_Config::getValue('loglevel', Logger::WARNING));
		$stream->setFormatter(new JsonFormatter());
		$this->monolog->pushHandler($stream);
	}

	public function __call($method, $parameters) {
		$this->addHandler();
		return $this->monolog->$method($parameters[0], $parameters[1]);
	}


	/**
	 * get entries from the log in reverse chronological order
	 *
	 * @param int $limit
	 * @param int $offset
	 * @return array
	 */
	public function getEntries($limit = 50, $offset = 0) {
		$minLevel = OC_Config::getValue("loglevel", Logger::WARNING);
		$entries = array();
		$handle = @fopen($this->logFile, 'rb');
		if ($handle) {
			fseek($handle, 0, SEEK_END);
			$pos = ftell($handle);
			$line = '';
			$entriesCount = 0;
			$lines = 0;
			// Loop through each character of the file looking for new lines
			while ($pos >= 0 && $entriesCount < $limit) {
				fseek($handle, $pos);
				$ch = fgetc($handle);
				if ($ch == "\n" || $pos == 0) {
					if ($line != '') {
						// Add the first character if at the start of the file,
						// because it doesn't hit the else in the loop
						if ($pos == 0) {
							$line = $ch . $line;
						}
						$entry = json_decode($line);
						// Add the line as an entry if it is passed the offset and is equal or above the log level
						if ($entry->level >= $minLevel) {
							$lines++;
							if ($lines > $offset) {
								$entries[] = $entry;
								$entriesCount++;
							}
						}
						$line = '';
					}
				} else {
					$line = $ch . $line;
				}
				$pos--;
			}
			fclose($handle);
		}
		return $entries;
	}
}
