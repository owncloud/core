<?php
/**
 * Copyright (c) 2020 Phil Davis <phil@jankaritech.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\Log;
use OCP\IConfig;
use Symfony\Component\EventDispatcher\EventDispatcher;

class LoggerWithoutWriteExtraTest extends TestCase {
	/** @var \OCP\ILogger */
	private $logger;
	private static $logs = [];

	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;

	protected function setUp(): void {
		parent::setUp();

		self::$logs = [];
		$this->config = $this->getMockBuilder(
			'\OC\SystemConfig')
			->disableOriginalConstructor()
			->getMock();
		$this->logger = new Log(
			'Test\LoggerWithoutWriteExtraTest',
			$this->config,
			null,
			new EventDispatcher()
		);
	}

	private function getLogs() {
		return self::$logs;
	}

	public static function write($app, $message, $level) {
		self::$logs[]= "$level $message";
	}

	public function testExtraFields() {
		$extraFields = [
			'one' => 'un',
			'two' => 'deux',
			'three' => 'trois',
		];

		// with extra fields but logger class has no "writeExtra" method, calls "write"
		// the extra fields to not end up anywhere (ignored)
		$this->logger->info(
			'extra fields test', [
				'extraFields' => $extraFields
			]
		);

		// without fields calls "write" always
		$this->logger->info('no fields');

		$logLines = $this->getLogs();

		$this->assertEquals('1 extra fields test', $logLines[0]);
		$this->assertEquals('1 no fields', $logLines[1]);
	}
}
