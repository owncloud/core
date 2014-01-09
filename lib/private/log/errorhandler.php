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

	public function __construct(LoggerInterface $logger) {
		$this->logger = $logger;
	}

	public function register() {
		set_error_handler(array($this, 'onError'));
		register_shutdown_function(array($this, 'onShutdown'));
		set_exception_handler(array($this, 'onException'));
	}

	//Fatal errors handler
	public function onShutdown() {
		$error = error_get_last();
		if($error && $this->logger) {
			//ob_end_clean();
			$this->logger->critical(
				$this->formatMessage($error['message'], $error['file'], $error['line']),
				$this->loggerContext
			);
		}
	}

	// Uncaught exception handler
	public function onException($ex) {
		$this->logger->critical(
			$this->formatMessage($ex->getMessage(), $ex->getFile(), $ex->getLine()),
			$this->loggerContext
		);
	}

	//Recoverable errors handler
	public function onError($number, $message, $file, $line) {
		if (error_reporting() === 0) {
			return;
		}
		$this->logger->warning(
			$this->formatMessage($message, $file, $line),
			$this->loggerContext
		);
	}

	protected function formatMessage($message, $file, $line) {
		return "$message at $file#$line";
	}
}
