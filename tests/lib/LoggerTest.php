<?php
/**
 * Copyright (c) 2014 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\AppFramework\Http\Request;
use OC\Log;
use OC\User\AccountMapper;
use OC\User\Manager;
use OC\User\SyncService;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUserSession;
use OCP\Util;
use OCP\Util\UserSearch;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use OC\SystemConfig;

class LoggerTest extends TestCase {
	/** @var ILogger */
	private $logger;
	private static $logs = [];

	/** @var IConfig | MockObject */
	private $config;

	/** @var EventDispatcherInterface | MockObject */
	private $eventDispatcher;

	public function providesCreateSessionToken(): array {
		return [
			[ new Request(), 'carlos', 'carlos', 'myCarlos']
		];
	}

	protected function setUp(): void {
		parent::setUp();

		self::$logs = [];
		$this->config = $this->getMockBuilder(
			SystemConfig::class
		)
			->disableOriginalConstructor()
			->getMock();
		$this->eventDispatcher = new EventDispatcher();
		$this->logger = new Log(__CLASS__, $this->config, null, $this->eventDispatcher);
	}

	public function testInterpolation(): void {
		$logger = $this->logger;
		$logger->warning('{Message {nothing} {user} {foo.bar} a}', ['user' => 'Bob', 'foo.bar' => 'Bar']);

		$expected = ['2 {Message {nothing} Bob Bar a}'];
		$this->assertEquals($expected, $this->getLogs());
	}

	public function testAppCondition(): void {
		$this->config
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

	public function testAppLogCondition(): void {
		$this->config
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

	public function testNullUserSession(): void {
		$userSession = $this->createMock(IUserSession::class);
		$userSession
			->method('getUser')
			->willReturn(null);
		$this->config
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

	private function getLogs(): array {
		return self::$logs;
	}

	public static function write($app, $message, $level): void {
		self::$logs[]= "$level $message";
	}

	public static function writeExtra($app, $message, $level, $logConditionFile, $extraFields): void {
		$encodedFields = \json_encode($extraFields);
		self::$logs[]= "$level $message fields=$encodedFields";
	}

	public function userAndPasswordData(): array {
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
	public function testDetectlogin($user, $password): void {
		$e = new \Exception('test');
		$this->logger->logException($e);

		$logLines = $this->getLogs();
		foreach ($logLines as $logLine) {
			$this->assertStringNotContainsString($user, $logLine);
			$this->assertStringNotContainsString($password, $logLine);
			$this->assertStringContainsString(
				'login(*** sensitive parameters replaced ***)',
				$logLine
			);
		}
	}

	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetectcheckPassword($user, $password): void {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertStringNotContainsString($user, $logLine);
			$this->assertStringNotContainsString($password, $logLine);
			$this->assertStringContainsString(
				'checkPassword(*** sensitive parameters replaced ***)',
				$logLine
			);
		}
	}

	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetectvalidateUserPass($user, $password): void {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertStringNotContainsString($user, $logLine);
			$this->assertStringNotContainsString($password, $logLine);
			$this->assertStringContainsString(
				'validateUserPass(*** sensitive parameters replaced ***)',
				$logLine
			);
		}
	}

	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetecttryLogin($user, $password): void {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertStringNotContainsString($user, $logLine);
			$this->assertStringNotContainsString($password, $logLine);
			$this->assertStringContainsString(
				'tryLogin(*** sensitive parameters replaced ***)',
				$logLine
			);
		}
	}

	/**
	 * @dataProvider userAndPasswordData
	 */
	public function testDetectloginWithPassword($user, $password): void {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertStringNotContainsString($user, $logLine);
			$this->assertStringNotContainsString($password, $logLine);
			$this->assertStringContainsString(
				'loginWithPassword(*** sensitive parameters replaced ***)',
				$logLine
			);
		}
	}

	/**
	 * @dataProvider providesCreateSessionToken
	 */
	public function testDetectcreateSessionToken($request, $uid, $loginName, $password): void {
		$e = new \Exception('test');
		$this->logger->logException($e);
		$logLines = $this->getLogs();

		foreach ($logLines as $logLine) {
			$this->assertStringNotContainsString($uid, $logLine);
			$this->assertStringNotContainsString($loginName, $logLine);
			$this->assertStringNotContainsString($password, $logLine);
			$this->assertStringContainsString(
				'createSessionToken(*** sensitive parameters replaced ***)',
				$logLine
			);
		}
	}

	public function testPasswordInCallback(): void {
		$config = $this->createMock(IConfig::class);
		$logger = $this->createMock(ILogger::class);
		$accountMapper = $this->createMock(AccountMapper::class);
		$syncService = $this->createMock(SyncService::class);
		$userSearch = $this->createMock(UserSearch::class);

		$manager = new Manager(
			$config,
			$logger,
			$accountMapper,
			$syncService,
			$userSearch
		);
		$manager->listen('\OC\User', 'preLogin', function ($uid, $password) {
			$e = new \Exception('test');
			$this->logger->logException($e);
			$logLines = $this->getLogs();

			foreach ($logLines as $logLine) {
				$this->assertStringNotContainsString($uid, $logLine);
				$this->assertStringNotContainsString($password, $logLine);
				$this->assertStringContainsString(
					'{closure}(*** sensitive parameters replaced ***)',
					$logLine
				);
			}
		});

		$login = 'user1';
		$password = '123456';
		$manager->emit('\OC\User', 'preLogin', [$login, $password]);
	}

	public function testExtraFields(): void {
		$extraFields = [
			'one' => 'un',
			'two' => 'deux',
			'three' => 'trois',
		];

		// with fields calls "writeExtra"
		$this->logger->info(
			'extra fields test',
			[
				'extraFields' => $extraFields
			]
		);

		// without fields calls "write"
		$this->logger->info('no fields');

		$logLines = $this->getLogs();

		$this->assertEquals('1 extra fields test fields={"one":"un","two":"deux","three":"trois"}', $logLines[0]);
		$this->assertEquals('1 no fields', $logLines[1]);
	}

	public function testEvents(): void {
		$this->config
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
			'some {test} message',
			[
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

	public function testOriginalExceptionIsProvidedAsExtraField(): void {
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
