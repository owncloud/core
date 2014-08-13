<?php

/**
 * Copyright (c) 2012 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
namespace OC\Log;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\SyslogHandler;
use Monolog\Logger;
use OC\Log\Interfaces\LogHandlerInterface;

/**
 * Class Syslog
 *
 * @package OC\Log
 */
class Syslog implements LogHandlerInterface{

	/**
	 * @var Logger
	 */
	protected $monolog;

	/**
	 * @param $monolog
	 */
	public function __construct($monolog) {
		$this->monolog = $monolog;
	}

	/**
	 * @param Logger $logger
	 * @return mixed|void
	 */
	public function setMonolog(Logger $logger) {
		$this->monolog = $logger;
	}

	/**
	 * Adds handlers so we know where to log and how to format
	 */
	public function addHandler() {
		$stream = new SyslogHandler('ownCloud', LOG_USER, OC_Config::getValue('loglevel', Logger::WARNING), false, LOG_PID | LOG_CONS);
		$stream->setFormatter(new JsonFormatter());
		$this->monolog->pushHandler($stream);
	}

	/**
	 * Dispatches relevent calls to the correct monolog method
	 * @param $method
	 * @param $parameters
	 * @return mixed
	 */
	public function __call($method, $parameters) {
		$this->addHandler();
		return $this->monolog->$method($parameters[0], $parameters[1]);
	}
}
