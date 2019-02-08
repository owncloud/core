<?php
/**
 * Copyright (c) 2014 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\Log;
use OCP\IConfig;
use OCP\IUserSession;
use OCP\Util;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

class LoggerTest extends TestCase {
	/** @var \OCP\ILogger */
	private $logger;
	private static $logs = [];

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;

	/** @var EventDispatcherInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $eventDispatcher;

	protected function setUp() {
		parent::setUp();

		self::$logs = [];
		$this->config = $this->getMockBuilder(
			'\OC\SystemConfig')
			->disableOriginalConstructor()
			->getMock();
		$this->eventDispatcher = new EventDispatcher();
		$this->logger = new Log('Test\LoggerTest', $this->config, null, $this->eventDispatcher);
	}

	public function testInterpolation() {
		$logger = $this->logger;
		$logger->warning('{Message {nothing} {user} {foo.bar} a}', ['user' => 'Bob', 'foo.bar' => 'Bar']);

		$expected = ['2 {Message {nothing} Bob Bar a}'];
		$this->assertEquals($expected, $this->getLogs());
	}

	public function testAppCondition() {
		$this->config->expects($this->any())
			->method('getValue')
			->will(($this->returnValueMap([
				['loglevel', Util::WARN, Util::WARN],
				['log.condition', [], ['apps' => ['files']]]
			])));
		$logger = $this->logger;

		$logger->info('Don\'t display info messages');
		$logger->info('Show info messages of files app', ['app' => 'files']);
		$logger->warning('Show warning messages of other apps');

		$expected = [
			'1 Show info messages of files app',
			'2 Show warning messages of other apps',
		];
		$this->assertEquals($expected, $this->getLogs());
	}

	public function testAppLogCondition() {
		$this->config->expects($this->any())
			->method('getValue')
			->will(($this->returnValueMap([
				['loglevel', Util::WARN, Util::WARN],
				['log.conditions', [], [['apps' => ['files'], 'logfile' => '/tmp/test.log']]]
			])));
		$logger = $this->logger;

		$logger->info('Don\'t display info messages');
		$logger->info('Show info messages of files app', ['app' => 'files']);

		$expected = [
			'1 Show info messages of files app',
		];
		$this->assertEquals($expected, $this->getLogs());
	}

	public function testNullUserSession() {
		$userSession = $this->createMock(IUserSession::class);
		$userSession->expects($this->any())
			->method('getUser')
			->willReturn(null);
		$this->config->expects($this->any())
			->method('getValue')
			->will(($this->returnValueMap([
				['loglevel', Util::WARN, Util::WARN],
				['log.conditions', [], [['users' => ['foo'], 'apps' => ['files'], 'logfile' => '/tmp/test.log']]]
			])));
		$logger = $this->logger;

		$logger->warning('Don\'t display info messages');

		$expected = [
			'2 Don\'t display info messages',
		];
		$this->assertEquals($expected, $this->getLogs());
	}

	private function getLogs() {
		return self::$logs;
	}

	public static function write($app, $message, $level) {
		self::$logs[]= "$level $message";
	}

	public static function writeExtra($app, $message, $level, $logConditionFile, $extraFields) {
		$encodedFields = \json_encode($extraFields);
		self::$logs[]= "$level $message fields=$encodedFields";
	}

	public function userAndPasswordData() {
		return [
			['abc', 'def'],
			['mySpecialUsername', 'MySuperSecretPassword'],
			['my-user', '324324()#ä234'],
			['my-user', ')qwer'],
			['my-user', 'qwer)asdf'],
			['my-user', 'qwer)'],
			['my-user', '(qwer'],
			['my-user', 'qwer(asdf'],
			['my-user', 'qwer('],
		];
	}

	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetectlogin($user, $password) {
		$e = new \Exception('test');
		$this->logger->logException($e);

		$logLines = $this->getLogs();
		foreach ($logLines as $logLine) {
			$this->assertNotContains($user, $logLine);
			$this->assertNotContains($password, $logLine);
			$this->assertContains('login(*** sensitive parameters replaced ***)', $logLine);
		}
	}

	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetectcheckPassword($user, $password) {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertNotContains($user, $logLine);
			$this->assertNotContains($password, $logLine);
			$this->assertContains('checkPassword(*** sensitive parameters replaced ***)', $logLine);
		}
	}

	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetectvalidateUserPass($user, $password) {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertNotContains($user, $logLine);
			$this->assertNotContains($password, $logLine);
			$this->assertContains('validateUserPass(*** sensitive parameters replaced ***)', $logLine);
		}
	}

	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetecttryLogin($user, $password) {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertNotContains($user, $logLine);
			$this->assertNotContains($password, $logLine);
			$this->assertContains('tryLogin(*** sensitive parameters replaced ***)', $logLine);
		}
	}

	//loginWithPassword
	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetectloginWithPassword($user, $password) {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertNotContains($user, $logLine);
			$this->assertNotContains($password, $logLine);
			$this->assertContains('loginWithPassword(*** sensitive parameters replaced ***)', $logLine);
		}
	}

	public function testExtraFields() {
		$extraFields = [
			'one' => 'un',
			'two' => 'deux',
			'three' => 'trois',
		];

		// with fields calls "writeExtra"
		$this->logger->info(
			'extra fields test', [
				'extraFields' => $extraFields
			]
		);

		// without fields calls "write"
		$this->logger->info('no fields');

		$logLines = $this->getLogs();

		$this->assertEquals('1 extra fields test fields={"one":"un","two":"deux","three":"trois"}', $logLines[0]);
		$this->assertEquals('1 no fields', $logLines[1]);
	}

	public function testEvents() {
		$this->config->expects($this->any())
			->method('getValue')
			->will(($this->returnValueMap([
				['loglevel', Util::WARN, Util::WARN],
			])));

		$beforeWriteEvent = null;
		$this->eventDispatcher->addListener(
			'log.beforewrite',
			function (GenericEvent $event) use (&$beforeWriteEvent) {
				$beforeWriteEvent = $event;
			}
		);
		$afterWriteEvent = null;
		$this->eventDispatcher->addListener(
			'log.afterwrite',
			function (GenericEvent $event) use (&$afterWriteEvent) {
				$afterWriteEvent = $event;
			}
		);

		$this->logger->debug(
			'some {test} message', [
				'app' => 'testapp',
				'test' => 'replaced',
				'extraFields' => ['extra' => 'one'],
			]
		);

		$this->assertNotNull($beforeWriteEvent, 'before event was triggered');
		$this->assertNotNull($afterWriteEvent, 'before event was triggered');

		$expectedArgs = [
			'app' => 'testapp',
			'loglevel' => Util::DEBUG,
			'message' => 'some {test} message',
			'formattedMessage' => 'some replaced message',
			'context' => [
				'app' => 'testapp',
				'test' => 'replaced',
			],
			'extraFields' => ['extra' => 'one'],
			'exception' => null
		];

		$this->assertEquals($expectedArgs, $beforeWriteEvent->getArguments(), 'before event arguments match');
		$this->assertEquals($expectedArgs, $afterWriteEvent->getArguments(), 'after event arguments match');
	}

	public function testOriginalExceptionIsProvidedAsExtraField() {
		$e = new \Exception('test');

		$beforeWriteEvent = null;
		$this->eventDispatcher->addListener(
			'log.beforewrite',
			function (GenericEvent $event) use (&$beforeWriteEvent) {
				$beforeWriteEvent = $event;
			}
		);
		$this->logger->logException($e);
		$eventArguments = $beforeWriteEvent->getArguments();
		$this->assertArrayHasKey('exception', $eventArguments, 'exception field is set');
		$this->assertSame($e, $eventArguments['exception'], 'the original exception is passed');
	}
}
