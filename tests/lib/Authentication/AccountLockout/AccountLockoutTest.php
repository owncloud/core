<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace Test\Authentication\AccountLockout;

use OC\Authentication\AccountLockout\AccountLockout;
use OC\Authentication\AccountLockout\LockoutMapper;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use Test\TestCase;

/**
 * Runs against the real database, so that the statements which have to be
 * atomic are the ones being tested.
 *
 * @group DB
 * @package Test\Authentication\AccountLockout
 */
class AccountLockoutTest extends TestCase {
	/** @var LockoutMapper */
	private $mapper;

	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;

	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject */
	private $userManager;

	/** @var int */
	private $now = 1500000000;

	/** @var array system values overriding the defaults */
	private $systemValues = [];

	/** @var array login name (lower case) => backend name */
	private $accounts = [
		'alice' => 'Database',
		'ldapuser' => 'LDAP',
	];

	/** @var string[] keys to clean up */
	private $usedKeys = [
		'alice',
		'admin',
		'ldapuser',
		'ldapuser2',
		'nosuchuser',
		'alice@example.com',
	];

	protected function setUp(): void {
		parent::setUp();

		$this->mapper = new LockoutMapper(\OC::$server->getDatabaseConnection());
		$this->config = $this->createMock(IConfig::class);
		$this->config->method('getSystemValue')
			->willReturnCallback(function ($key, $default = null) {
				return \array_key_exists($key, $this->systemValues) ? $this->systemValues[$key] : $default;
			});
		$this->userManager = $this->createMock(IUserManager::class);
		$this->userManager->method('get')
			->willReturnCallback(function ($login) {
				// core resolves accounts case insensitively
				$key = \strtolower($login);
				if (!isset($this->accounts[$key])) {
					return null;
				}
				$user = $this->createMock(IUser::class);
				$user->method('getUID')->willReturn($key);
				$user->method('getBackendClassName')->willReturn($this->accounts[$key]);
				return $user;
			});

		$this->clearRows();
	}

	protected function tearDown(): void {
		$this->clearRows();
		parent::tearDown();
	}

	private function clearRows() {
		foreach ($this->usedKeys as $key) {
			$this->mapper->delete($key);
		}
	}

	/**
	 * A fresh service instance stands for a fresh request - the per request
	 * deduplication of failures must not leak from one test to the next.
	 *
	 * @return AccountLockout
	 */
	private function newRequest() {
		$timeFactory = $this->createMock(ITimeFactory::class);
		$timeFactory->method('getTime')->willReturnCallback(function () {
			return $this->now;
		});

		return new AccountLockout(
			$this->mapper,
			$this->config,
			$this->userManager,
			$timeFactory,
			$this->createMock(ILogger::class)
		);
	}

	/**
	 * @param string $login
	 * @param int $times
	 */
	private function badPassword($login, $times = 1) {
		for ($i = 0; $i < $times; $i++) {
			$this->newRequest()->recordFailure($login);
		}
	}

	public function testFourFailuresThenSuccessClearsTheCounter() {
		$this->badPassword('alice', 4);
		$this->assertSame(0, $this->newRequest()->getRemainingLockTime('alice'));
		$this->assertSame(4, $this->mapper->find('alice')['fail_count']);

		$this->newRequest()->clearFailures('alice', 'alice');

		$this->assertNull($this->mapper->find('alice'));
		$this->assertSame(0, $this->newRequest()->getRemainingLockTime('alice'));
	}

	public function testFifthFailureLocksTheAccount() {
		$this->badPassword('alice', 5);

		// the correct password is refused as well, that is the point
		$this->assertSame(
			AccountLockout::DEFAULT_DURATION,
			$this->newRequest()->getRemainingLockTime('alice')
		);
	}

	public function testLockoutExpiresWithoutAdminAction() {
		$this->badPassword('alice', 5);
		$this->assertGreaterThan(0, $this->newRequest()->getRemainingLockTime('alice'));

		$this->now += AccountLockout::DEFAULT_DURATION;

		$this->assertSame(0, $this->newRequest()->getRemainingLockTime('alice'));
	}

	public function testCounterDecaysAfterTheAttemptWindow() {
		$this->badPassword('alice', 4);

		$this->now += AccountLockout::DEFAULT_ATTEMPT_WINDOW + 1;

		// the 5th failure overall, but the first one within the window
		$this->badPassword('alice');

		$this->assertSame(1, $this->mapper->find('alice')['fail_count']);
		$this->assertSame(0, $this->newRequest()->getRemainingLockTime('alice'));
	}

	public function testDisabledDoesNotEvenWrite() {
		$this->systemValues[AccountLockout::CONFIG_ENABLED] = false;

		$this->badPassword('alice', 10);

		$this->assertNull($this->mapper->find('alice'));
		$this->assertSame(0, $this->newRequest()->getRemainingLockTime('alice'));
	}

	public function testConfiguredThresholdAndDurationAreUsed() {
		$this->systemValues[AccountLockout::CONFIG_MAX_ATTEMPTS] = 2;
		$this->systemValues[AccountLockout::CONFIG_DURATION] = 60;

		$this->badPassword('alice');
		$this->assertSame(0, $this->newRequest()->getRemainingLockTime('alice'));

		$this->badPassword('alice');
		$this->assertSame(60, $this->newRequest()->getRemainingLockTime('alice'));
	}

	public function testExternalBackendIsNeverLocked() {
		$this->badPassword('ldapuser', 10);

		$this->assertNull($this->mapper->find('ldapuser'));
		$this->assertSame(0, $this->newRequest()->getRemainingLockTime('ldapuser'));
	}

	public function testUnknownLoginIsIndistinguishableFromAnExistingAccount() {
		$this->badPassword('nosuchuser', 5);
		$this->badPassword('alice', 5);

		$this->assertSame(
			$this->newRequest()->getRemainingLockTime('alice'),
			$this->newRequest()->getRemainingLockTime('nosuchuser')
		);
	}

	public function testLockoutOfAnUnknownLoginIsReleasedWhenTheAccountShowsUpExternally() {
		$this->badPassword('ldapuser2', 5);
		$this->assertGreaterThan(0, $this->newRequest()->getRemainingLockTime('ldapuser2'));

		// the account has been synced from the directory meanwhile
		$this->accounts['ldapuser2'] = 'LDAP';

		$this->assertSame(0, $this->newRequest()->getRemainingLockTime('ldapuser2'));
		$this->assertNull($this->mapper->find('ldapuser2'));
	}

	public function testCaseVariantsShareOneCounter() {
		$this->accounts['admin'] = 'Database';

		$this->badPassword('admin');
		$this->badPassword('Admin');
		$this->badPassword('ADMIN');
		$this->badPassword('aDmIn');
		$this->badPassword('admiN');

		$this->assertSame(5, $this->mapper->find('admin')['fail_count']);
		$this->assertGreaterThan(0, $this->newRequest()->getRemainingLockTime('ADMIN'));
	}

	public function testLoginByEmailRetryCountsOnce() {
		// one request, two attempts: the typed email address and the account it
		// was resolved to - see Session::logClientIn()
		$request = $this->newRequest();
		$request->recordFailure('alice@example.com');
		$request->recordFailure('alice');

		$this->assertSame(1, $this->mapper->find('alice@example.com')['fail_count']);
		$this->assertNull($this->mapper->find('alice'));
	}

	public function testConcurrentFailuresDoNotOvershoot() {
		// every failure is its own request, as it would be on a cluster
		$this->badPassword('alice', 7);

		$row = $this->mapper->find('alice');
		$this->assertSame(7, $row['fail_count'], 'no count may be lost');
		$this->assertSame(
			$this->now + AccountLockout::DEFAULT_DURATION,
			$row['locked_until'],
			'the lockout starts once and is not extended by the failures which followed'
		);
	}

	public function testExpireStaleKeepsRunningLockouts() {
		// a lockout outliving the attempt window is the only way its row can be
		// both stale and still in effect
		$this->systemValues[AccountLockout::CONFIG_DURATION] = 3600;

		$this->badPassword('alice', 5);
		$this->badPassword('nosuchuser', 1);

		$this->now += AccountLockout::DEFAULT_ATTEMPT_WINDOW + 1;
		$this->newRequest()->expireStale();

		// alice is still locked, so her row has to survive
		$this->assertNotNull($this->mapper->find('alice'));
		$this->assertNull($this->mapper->find('nosuchuser'));

		$this->now += 3600;
		$this->newRequest()->expireStale();

		$this->assertNull($this->mapper->find('alice'));
	}
}
