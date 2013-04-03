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
	static protected $oC_logFile;
	static protected $defaultLogPath;

	/**
	 * Init class data for standard owncloud logging
	 */
	public static function init() {
		// set default log path
		$defaultLogPath = OC_Config::getValue("datadirectory", OC::$SERVERROOT.'/data');

		// try to get file and path from logfile parameter in config.php and separate it
		$set_logfile = OC_Config::getValue("logfile");
		if (!is_null($set_logfile)) {
			$path_parts = pathinfo($set_logfile);
			$log_path = $path_parts['dirname'];
			$log_file = $path_parts['basename'];
		}
				// check if path exists in logfile parameter and use default if not
				// was there no path set, php returns a dot, but it is filled
				if(strlen($log_path) === 1) {
						// no path set, use default
						self::$defaultLogPath = $defaultLogPath;
					}
					elseif(!is_writable($log_path)) {
						// path set but not write accessible, use default
						$error_handler = 1;
						self::$defaultLogPath = $defaultLogPath;
					}
					else {
						// path set and accessible, use path set
						self::$defaultLogPath = $log_path;
				}
				if (strlen($log_file) === 0) {
						// no non-standard logfile set, use standard
						self::$oC_logFile = '/owncloud.log';
					}
					else {
						// no non-standard logfile set and accessible, use it
						self::$oC_logFile = '/'.$log_file;
				}

				// try to log write attempt of special log path set in config.php
				if ($error_handler === 1) {
						self::write('core', 'Cannot write to log path (' . $log_path . ') using default (' . self::$defaultLogPath . ')', OC_Log::WARN);
				}
	}

	/**
	 * write a message in the log
	 * @param string $app
	 * @param string $message
	 * @param int $level
	 * @param String $special_log_file
	 *  special_log_file can either be a real filename as parameter or NULL.
	 *  the complete path.file is generated on the parameter given
	 */
	public static function write($app, $message, $level, $special_log_file = NULL) {
		$minLevel=min(OC_Config::getValue( "loglevel", OC_Log::WARN ), OC_Log::ERROR);
		// either you reach the minimum log level needed or the special_log_file has a value
		if($level>=$minLevel or !is_null($special_log_file)) {
			$entry=array('app'=>$app, 'message'=>$message, 'level'=>$level, 'time'=>time());
			if (is_null($special_log_file)) {
				$handle = @fopen(self::$defaultLogPath.self::$oC_logFile, 'a');
			}
			else {
				$handle = @fopen(self::$defaultLogPath.'/'.$special_log_file, 'a');
			}			
			if ($handle) {
				fwrite($handle, json_encode($entry)."\n");
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
		$handle = @fopen(self::$defaultLogPath.self::$oC_logFile, 'rb');
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
					$line = $ch.$line;
				}
				$pos--;
			}
			fclose($handle);
		}
		return $entries;
	}
}
