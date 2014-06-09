<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Log;

use OC\Log as LoggerInterface;

class ErrorHandler {
	/** @var LoggerInterface */
	private static $logger;

	/**
	 * remove password in URLs
	 * @param string $msg
	 * @return string
	 */
	protected static function removePassword($msg) {
		return preg_replace('/\/\/(.*):(.*)@/', '//xxx:xxx@', $msg);
	}

	public static function register($debug=false) {
		$handler = new ErrorHandler();

		if ($debug) {
			set_error_handler(array($handler, 'onAll'), E_ALL);
		} else {
			set_error_handler(array($handler, 'onError'));
		}
		register_shutdown_function(array($handler, 'onShutdown'));
		set_exception_handler(array($handler, 'onException'));
	}

	public static function setLogger(LoggerInterface $logger) {
		self::$logger = $logger;
	}

	//Fatal errors handler
	public static function onShutdown() {
		$error = error_get_last();
		if (!empty($error)) {
			$msg = $error['message'] . ' at ' . $error['file'] . '#' . $error['line'];
			if(isset(self::$logger)) {
				//ob_end_clean();
				self::$logger->critical(self::removePassword($msg), array('app' => 'PHP'));
			} else {
				//If logger is not set use PHP error_log
				error_log($msg);
			}
		}
	}

	// Uncaught exception handler
	public static function onException($exception) {
		$msg = $exception->getMessage() . ' at ' . $exception->getFile() . '#' . $exception->getLine();
		if (isset(self::$logger)) {
			self::$logger->critical(self::removePassword($msg), array('app' => 'PHP'));
		} else {
			//If logger is not set use PHP error_log
			error_log($msg);
		}
	}

	//Recoverable errors handler
	public static function onError($number, $message, $file, $line) {
		if (error_reporting() === 0) {
			return;
		}
		$msg = $message . ' at ' . $file . '#' . $line;
		if (isset(self::$logger)) {
			self::$logger->error(self::removePassword($msg), array('app' => 'PHP'));
		} else {
			//If logger is not set, use PHP error_log
			error_log($msg);   
		}
	}

	//Recoverable handler which catch all errors, warnings and notices
	public static function onAll($number, $message, $file, $line) {
		if (error_reporting() === 0) {
			return;
		}
		$msg = $message . ' at ' . $file . '#' . $line;
		if (isset(self::$logger)) {
			self::$logger->debug(self::removePassword($msg), array('app' => 'PHP'));
		} else {
			error_log($msg);
		}
	}
}
