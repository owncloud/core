<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC;

use Monolog\Logger;

/**
 * logging utilities
 */
class Log {

	private $logger;
	/**
	 * All of the error levels.
	 *
	 * @var array
	 */
	private $levels = array(
		'debug',
		'info',
		'notice',
		'warning',
		'error',
		'critical',
		'alert',
		'emergency',
	);

	/**
	 * This will now serve as a factory class as intended below
	 *
	 * @param string $logger The logger that should be used
	 */
	public function __construct($logger = null) {
		// FIXME: Add this for backwards compatibility, should be fixed at some point probably
		if ($logger === null) {
			$logHandler = 'OC\\Log\\' . ucfirst(\OC_Config::getValue('log_type', 'owncloud'));
			$this->logger = new $logHandler;
		} else {
			$this->logger = $logger;
		}

	}

	public function __call($method, $parameters) {
		if (in_array($method, $this->levels)) {
			// Format our method for monolog add{level}
			$method = 'add' . ucfirst($method);

			// set app to a variable for ease
			if (isset($parameters[1]['app'])) {
				$app = $parameters[1]['app'];
			} else {
				$app = 'no app in context';
			}

			// Set monolog instance in our handler
			$this->logger->setMonolog(new Logger($app));

			// Send over the call
			return call_user_func_array(array($this->logger, $method), $parameters);
		}


		throw new \BadMethodCallException("Method [$method] does not exists");
	}
}
