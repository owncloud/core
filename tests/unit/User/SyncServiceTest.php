<?php
/**
 * Created by PhpStorm.
 * User: deepdiver
 * Date: 12.04.17
 * Time: 14:56
 */

namespace Test\User;


use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\SyncService;
use OCP\IConfig;
use OCP\ILogger;
use OCP\UserInterface;
use Test\TestCase;

class SyncServiceTest extends TestCase {

	public function testSetupAccount() {
		$mapper = $this->createMock(AccountMapper::class);
		$backend = $this->createMock(UserInterface::class);
		$config = $this->createMock(IConfig::class);
		$logger = $this->createMock(ILogger::class);

		$config->expects($this->any())->method('getUserKeys')->willReturnMap([
			['user1', 'core', []],
			['user1', 'login', []],
			['user1', 'settings', ['email']],
			['user1', 'files', []],
		]);
		$config->expects($this->any())->method('getUserValue')->willReturnMap([
			['user1', 'settings', 'email', '', 'foo@bar.net'],
		]);

		$s = new SyncService($mapper, $backend, $config, $logger);
		$a = new Account();
		$s->setupAccount($a, 'user1');

		$this->assertEquals('foo@bar.net', $a->getEmail());
	}
}