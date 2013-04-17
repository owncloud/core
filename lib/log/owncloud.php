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

class OC_Log_Owncloud {
	static protected $logFile;
	public static $logLevels = array('debug' => 0, 'info' => 1, 'warning' => 2, 'error' => 3, 'critical' => 4);

	/**
	 * Init class data
	 */
	public static function init() {
		$defaultLogFile = OC_Config::getValue("datadirectory", OC::$SERVERROOT.'/data').'/owncloud.log';
		self::$logFile = OC_Config::getValue("logfile", $defaultLogFile);
		if (!file_exists(self::$logFile)) {
			self::$logFile = $defaultLogFile;
		}
	}

	/**
	 * write a message in the log
	 * @param string $app
	 * @param string $message
	 * @param int level
	 */
	public static function write($app, $message, $level) {
		$minLevel=min(OC_Config::getValue( "loglevel", OC_Log::WARN ), OC_Log::ERROR);
		if($level>=$minLevel) {
			$handle = @fopen(self::$logFile, 'a');
			if ($handle) {
				// Format: Feb  8 13:36:01 hostname owncloud: {core} warning - my log message
				fputs($handle, strftime("%b %e %H:%M:%S") . " " . gethostname() . " owncloud: {" . $app . "} " .
					array_search($level, self::$logLevels)  . " - " . trim(json_encode($message), '"') . "\n");
				fclose($handle);
			}
		}
	}

	/**
	 * get entries from the log in reverse chronological order
	 * @param int limit
	 * @param int offset
	 * @return array
	 */
	public static function getEntries($limit=50, $offset=0) {
		self::init();
		$minLevel=OC_Config::getValue( "loglevel", OC_Log::WARN );
		$entries = array();
		$handle = @fopen(self::$logFile, 'rb');
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
							$line = $ch.$line;
						}
						// Format: Feb  8 13:36:01 hostname owncloud: {core} warning - my log message
						$entry = new stdClass;

						// time
						$entry->time = strtotime(substr($line, 0, 16));

						// app name
						$spos = strpos($line, "{", 16);
						$epos = strpos($line, "}", $spos);
						$entry->app = substr($line, $spos + 1, $epos - $spos - 1);

						// level
						$spos   = $epos + 2;
						$epos   = strpos($line, "-", $spos);
						$entry->level = self::$logLevels[substr($line, $spos, $epos - $spos - 1)];

						// message
						$entry->message = json_decode('"' . substr($line, $epos + 2) . '"');

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
					$line = $ch.$line;
				}
				$pos--;
			}
			fclose($handle);
		}
		return $entries;
	}
}
