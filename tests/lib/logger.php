<?php
/**
 * Copyright (c) 2014 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\Log;

class Logger extends \PHPUnit_Framework_TestCase {
	/**
	 * @var Log
	 */
	private $logger;
	static private $logs = array();

	public function setUp() {
		self::$logs = array();
		$this->logger = new Log();
	}

	public function testInterpolation() {

		$this->logger->info('{Message {nothing} {user} {foo.bar} a}', array('user' => 'Bob', 'foo.bar' => 'Bar'));

		$expected = '{Message {nothing} Bob Bar a}';
		$entires = $this->getLogs();
		$this->assertEquals($expected, $entires[0]->message);
	}

	private function getLogs() {
		$log = new Log\Owncloud();
		return $log->getEntries(1);
	}
}
