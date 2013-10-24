<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * Copyright (c) 2013 Andreas Fischer <bantu@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Log;

use OC\Log as LoggerInterface;

class ErrorHandler {
	/** @var LoggerInterface */
	protected $logger;
	protected $loggerContext = array('app' => 'PHP');

	public function register() {
		set_error_handler(array($this, 'onError'));
		register_shutdown_function(array($this, 'onShutdown'));
		set_exception_handler(array($this, 'onException'));
	}

	public function setLogger(LoggerInterface $logger) {
		$this->logger = $logger;
	}

	//Fatal errors handler
	public function onShutdown() {
		$error = error_get_last();
		if($error && $this->logger) {
			//ob_end_clean();
			$msg = $error['message'] . ' at ' . $error['file'] . '#' . $error['line'];
			$this->logger->critical($msg, $this->loggerContext);
		}
	}

	// Uncaught exception handler
	public function onException($exception) {
		$msg = $exception->getMessage() . ' at ' . $exception->getFile() . '#' . $exception->getLine();
		$this->logger->critical($msg, $this->loggerContext);
	}

	//Recoverable errors handler
	public function onError($number, $message, $file, $line) {
		if (error_reporting() === 0) {
			return;
		}
		$msg = $message . ' at ' . $file . '#' . $line;
		$this->logger->warning($msg, $this->loggerContext);
	}
}
