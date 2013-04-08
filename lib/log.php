<?php
/**
 * Copyright (c) 2012 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

/**
 * logging utilities
 *
 * Log is saved by default at data/owncloud.log using OC_Log_Owncloud.
 * Selecting other backend is done with a config option 'log_type'.
 */

class OC_Log {
	const DEBUG=0;
	const INFO=1;
	const WARN=2;
	const ERROR=3;
	const FATAL=4;

	static public $enabled = true;
	static protected $class = null;

	/**
	 * write a message in the log
	 * @param string $app
	 * @param string $message
	 * @param int $level
	 * @param string $special_log_file
	 *   $special_log_file contains the variable set in config.php writing the log message to. 
	 *   If null (not present), it will be rerouted to standard write.
	 *   eg: OC_Config::getValue("log_sql_file") returns either null or the filename used as parameter
	 */
	public static function write($app, $message, $level, $special_log_file = null) {
		if (self::$enabled) {
			if (!self::$class) {
				self::$class = 'OC_Log_'.ucfirst(OC_Config::getValue('log_type', 'owncloud'));
				call_user_func(array(self::$class, 'init'));
			}
			$log_class=self::$class;
			$log_class::write($app, $message, $level, $special_log_file);
		}
	}

	//Fatal errors handler
	public static function onShutdown() {
		$error = error_get_last();
		if($error) {
			//ob_end_clean();
			self::write('PHP', $error['message'] . ' at ' . $error['file'] . '#' . $error['line'], self::FATAL);
		} else {
			return true;
		}
	}

	// Uncaught exception handler
	public static function onException($exception) {
		self::write('PHP',
			$exception->getMessage() . ' at ' . $exception->getFile() . '#' . $exception->getLine(),
			self::FATAL);
	}

	//Recoverable errors handler
	public static function onError($number, $message, $file, $line) {
		if (error_reporting() === 0) {
			return;
		}
		self::write('PHP', $message . ' at ' . $file . '#' . $line, self::WARN);

	}
}
