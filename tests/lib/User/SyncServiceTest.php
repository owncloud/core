<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>

 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Test\User;

use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\Database;
use OC\User\Sync\AllUsersIterator;
use OC\User\SyncLimiter;
use OC\User\SyncService;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\User\IProvidesHomeBackend;
use OCP\User\IProvidesQuotaBackend;
use OCP\User\IProvidesUserNameBackend;
use OCP\UserInterface;
use Test\TestCase;

class SyncServiceTest extends TestCase {

	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ILogger | \PHPUnit\Framework\MockObject\MockObject */
	private $logger;
	/** @var AccountMapper | \PHPUnit\Framework\MockObject\MockObject */
	private $mapper;
	/** @var SyncLimiter | \PHPUnit\Framework\MockObject\MockObject */
	private $syncLimiter;
	/** @var SyncService | \PHPUnit\Framework\MockObject\MockObject */
	private $syncService;

	protected function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->mapper = $this->createMock(AccountMapper::class);
		$this->syncLimiter = $this->createMock(SyncLimiter::class);

		$this->syncService = new SyncService($this->config, $this->logger, $this->mapper, $this->syncLimiter);
	}

	public function testSetupAccount() {
		/** @var UserInterface | IProvidesHomeBackend | \PHPUnit\Framework\MockObject\MockObject $backend */
		$backend = $this->createMock(UserInterface::class);

		$this->config->expects($this->any())->method('getUserKeys')->willReturnMap([
			['user1', 'core', []],
			['user1', 'login', []],
			['user1', 'settings', ['email']],
			['user1', 'files', []],
		]);
		$this->config->expects($this->any())->method('getUserValue')->willReturnMap([
			['user1', 'settings', 'email', '', 'foo@bar.net'],
		]);

		$a = new Account();
		$a->setUserId('user1');
		$this->syncService->syncAccount($a, $backend);

		$this->assertEquals('foo@bar.net', $a->getEmail());
	}

	/**
	 * Pass in a backend that has new users anc check that they accounts are inserted
	 */
	public function testSetupNewAccount() {
		/** @var UserInterface | IProvidesHomeBackend | \PHPUnit\Framework\MockObject\MockObject $backend */
		$backend = $this->createMock(UserInterface::class);
		$account = $this->createMock(Account::class);

		$backendUids = ['thisuserhasntbeenseenbefore'];
		$backend->expects($this->once())->method('getUsers')->willReturn($backendUids);

		// We expect the mapper to be called to find the uid
		$this->mapper->expects($this->once())->method('getByUid')->with($backendUids[0])->willThrowException(new DoesNotExistException('entity not found'));

		// Lets provide some config for the user
		$this->config->expects($this->at(0))->method('getUserKeys')->with($backendUids[0], 'core')->willReturn([]);
		$this->config->expects($this->at(1))->method('getUserKeys')->with($backendUids[0], 'login')->willReturn([]);
		$this->config->expects($this->at(2))->method('getUserKeys')->with($backendUids[0], 'settings')->willReturn([]);
		$this->config->expects($this->at(3))->method('getUserKeys')->with($backendUids[0], 'files')->willReturn([]);

		// Pretend we dont update anything
		$account->expects($this->any())->method('getUpdatedFields')->willReturn([]);

		// Then we should try to setup a new account and insert
		$this->mapper->expects($this->once())->method('insert')->with($this->callback(function ($arg) use ($backendUids) {
			return $arg instanceof Account && $arg->getUserId() === $backendUids[0];
		}));

		// Ignore state flag

		$this->syncService->run($backend, new AllUsersIterator($backend), function ($uid) {
		});

		static::invokePrivate($this->syncService, 'syncHome', [$account, $backend]);
	}

	/**
	 * Pass in a backend that has new users anc check that they accounts are inserted
	 */
	public function testSetupNewAccountLogsErrorOnException() {
		/** @var UserInterface | IProvidesHomeBackend | \PHPUnit\Framework\MockObject\MockObject $backend */
		$backend = $this->createMock(UserInterface::class);

		$backendUids = ['thisuserhasntbeenseenbefore'];
		$backend->expects($this->once())->method('getUsers')->willReturn($backendUids);

		// We expect the mapper to be called to find the uid but we throw an exception to trigger the error logging path
		$this->mapper->expects($this->once())->method('getByUid')->with($backendUids[0])->willThrowException(new MultipleObjectsReturnedException('Trigger error'));

		// Should log an error in the log and log the exception
		$this->logger->expects($this->at(0))->method('error');
		$this->logger->expects($this->at(1))->method('logException');

		$this->syncService->run($backend, new AllUsersIterator($backend), function ($uid) {
		});
	}

	public function testSyncHomeLogsWhenBackendDiffersFromExisting() {

		/** @var UserInterface | IProvidesHomeBackend | \PHPUnit\Framework\MockObject\MockObject $backend */
		$backend = $this->createMock([UserInterface::class, IProvidesHomeBackend::class]);
		$a = $this->getMockBuilder(Account::class)->setMethods(['getHome'])->getMock();

		// Account returns existing home
		$a->expects($this->exactly(3))->method('getHome')->willReturn('existing');

		// Backend returns a new home
		$backend->expects($this->exactly(3))->method('getHome')->willReturn('newwrongvalue');

		// Should produce an error in the log if backend home different from stored account home
		$this->logger->expects($this->once())->method('error');

		static::invokePrivate($this->syncService, 'syncHome', [$a, $backend]);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testTrySyncExistingUserWithOtherBackend() {
		$uid = 'myTestUser';

		$wrongBackend = new Database();

		$a = $this->getMockBuilder(Account::class)->setMethods(['getBackend'])->getMock();
		$a->expects($this->exactly(2))->method('getBackend')->willReturn('OriginalBackedClass');

		$this->mapper->expects($this->once())->method('getByUid')->with($uid)->willReturn($a);

		$this->syncService->createOrSyncAccount($uid, $wrongBackend);
	}

	public function providesSyncQuota() {
		return [
			[true, null, null, null],
			[true, '1', null, '1'],
			[true, null, '2', '2'],
			[false, null, null, null],
			[false, null, '3', '3'],
		];
	}

	/**
	 * @dataProvider providesSyncQuota
	 * @param $backendProvidesQuota
	 * @param $backendQuota
	 * @param $preferencesQuota
	 * @param $expectedQuota
	 */
	public function testSyncQuota($backendProvidesQuota, $backendQuota, $preferencesQuota, $expectedQuota) {

		/** @var UserInterface | \PHPUnit\Framework\MockObject\MockObject $backend */
		$a = $this->getMockBuilder(Account::class)->setMethods(['setQuota'])->getMock();

		if ($backendProvidesQuota) {
			/** @var UserInterface | IProvidesQuotaBackend | \PHPUnit\Framework\MockObject\MockObject $backend */
			$backend = $this->createMock([UserInterface::class, IProvidesQuotaBackend::class]);
			$backend->expects($this->exactly(1))->method('getQuota')->willReturn($backendQuota);
		} else {
			$backend = $this->createMock(UserInterface::class);
		}

		// legacy preferences has a quota value
		if ($preferencesQuota) {
			$this->config->method('getUserKeys')->willReturn(['quota']);
			$this->config->method('getUserValue')->willReturn($preferencesQuota);
		} else {
			$this->config->method('getUserKeys')->willReturn([]);
		}

		// Account gets the existing quota
		if ($expectedQuota) {
			$a->expects($this->exactly(1))->method('setQuota')->with($expectedQuota);
		} else {
			$a->expects($this->never())->method('setQuota');
		}

		static::invokePrivate($this->syncService, 'syncQuota', [$a, $backend]);
	}

	public function testSyncUserName() {
		$a = $this->createMock(Account::class);
		$a->method('__call')->with('getUserId')->willReturn('user1');

		/** @var UserInterface | IProvidesUserNameBackend | \PHPUnit\Framework\MockObject\MockObject $backend */
		$backend = $this->createMock([UserInterface::class, IProvidesUserNameBackend::class]);
		$backend->expects($this->once())
			->method('getUserName')
			->willReturn('userName1');

		$this->config->expects($this->once())
			->method('getUserValue')
			->with('user1', 'core', 'username', null)
			->willReturn(null);
		
		$this->config->expects($this->once())
			->method('setUserValue')
			->with('user1', 'core', 'username', 'userName1');

		static::invokePrivate($this->syncService, 'syncUserName', [$a, $backend]);
	}

	public function testAnalyseExistingUsers() {
		$this->mapper->expects($this->once())
			->method('callForAllUsers')
			->with($this->callback(function ($param) {
				return \is_callable($param);
			}));
		$backend = $this->createMock(UserInterface::class);
		$result = $this->syncService->analyzeExistingUsers($backend, function () {
		});
		$this->assertInternalType('array', $result);
		$this->assertCount(2, $result);
	}

	/**
	 * Check accounts are detected if the reappear on the backend
	 */
	public function testReAppearingAccountsAreDetected() {
		$account = $this->getMockBuilder(Account::class)->setMethods(['getBackend', 'getState', 'getUserId'])->getMock();
		$backendClass = 'BackendClass';
		$account->expects($this->once())->method('getBackend')->willReturn($backendClass);
		$backend = $this->createMock(UserInterface::class);
		// The user appears on the backend
		$backend->expects($this->once())->method('userExists')->willReturn(true);
		$account->expects($this->once())->method('getState')->willReturn(false);
		$account->expects($this->exactly(2))->method('getUserId')->willReturn('test');
		$removed = [];
		$reappeared = [];
		static::invokePrivate($this->syncService, 'checkIfAccountReappeared', [$account, &$removed, &$reappeared, $backend, $backendClass]);
		$this->assertCount(0, $removed);
		$this->assertCount(1, $reappeared);
	}

	/**
	 * Check accounts are detected if the disappear from the backend
	 */
	public function testRemovedAccountsAreDetected() {
		$account = $this->getMockBuilder(Account::class)->setMethods(['getBackend', 'getState', 'getUserId'])->getMock();
		$backendClass = 'BackendClass';
		$account->expects($this->once())->method('getBackend')->willReturn($backendClass);
		$backend = $this->createMock(UserInterface::class);
		// The user has been removed
		$backend->expects($this->once())->method('userExists')->willReturn(false);
		$account->expects($this->never())->method('getState')->willReturn(false);
		$account->expects($this->exactly(2))->method('getUserId')->willReturn('test');
		$removed = [];
		$reappeared = [];
		static::invokePrivate($this->syncService, 'checkIfAccountReappeared', [$account, &$removed, &$reappeared, $backend, $backendClass]);
		$this->assertCount(1, $removed);
		$this->assertCount(0, $reappeared);
	}

	public function testUserWillBeDisabledInBackendNoLimitInfoFound() {
		$this->syncLimiter->method('getLimitInfo')
			->willReturn([]);

		$this->assertFalse($this->syncService->userWillBeDisabledInBackend('mybackend'));
	}

	public function testUserWillBeDisabledInBackendLimitDisabled() {
		$this->syncLimiter->method('getLimitInfo')
			->willReturn(['mybackend' => false]);
		$this->mapper->method('getUserCountForBackendGroupByState')
			->willReturn([Account::STATE_ENABLED => 30]);

		$this->assertFalse($this->syncService->userWillBeDisabledInBackend('mybackend'));
	}

	public function testUserWillBeDisabledInBackendBelowLimit() {
		$this->syncLimiter->method('getLimitInfo')
			->willReturn(['mybackend' => ['soft' => 50, 'hard' => 100]]);
		$this->mapper->method('getUserCountForBackendGroupByState')
			->willReturn([Account::STATE_ENABLED => 70]);

		$this->assertFalse($this->syncService->userWillBeDisabledInBackend('mybackend'));
	}

	public function testUserWillBeDisabledInBackendAboveLimit() {
		$this->syncLimiter->method('getLimitInfo')
			->willReturn(['mybackend' => ['soft' => 50, 'hard' => 100]]);
		$this->mapper->method('getUserCountForBackendGroupByState')
			->willReturn([Account::STATE_ENABLED => 170]);

		$this->assertTrue($this->syncService->userWillBeDisabledInBackend('mybackend'));
	}

	public function testGetUserLimitInfoNoLimitFound() {
		$this->syncLimiter->method('getLimitInfo')
			->willReturn([]);
		$this->assertFalse($this->syncService->getUserLimitInfo('mybackend'));
	}

	public function testGetUserLimitInfoLimitDisabled() {
		$this->syncLimiter->method('getLimitInfo')
			->willReturn(['mybackend' => false]);
		$this->assertFalse($this->syncService->getUserLimitInfo('mybackend'));
	}

	public function testGetUserLimitInfoLimit() {
		$this->syncLimiter->method('getLimitInfo')
			->willReturn(['mybackend' => ['soft' => 50, 'hard' => 100]]);
		$this->assertEquals(['soft' => 50, 'hard' => 100], $this->syncService->getUserLimitInfo('mybackend'));
	}

	public function getLimitInfoStatsProvider() {
		$backendLimits = [
			'mybackend' => [
				'soft' => 50,
				'hard' => 75,
			],
			'mybackend2' => false,
		];
		$userCount1 = [
			'mybackend' => [
				Account::STATE_ENABLED => 33,
				Account::STATE_DISABLED => 2,
				Account::STATE_AUTODISABLED => 42,
			],
			'mybackend2' => [
				Account::STATE_ENABLED => 44,
			],
		];
		$userCount2 = [
			'mybackend' => [
				Account::STATE_ENABLED => 23,
				Account::STATE_DISABLED => 1,
				Account::STATE_AUTODISABLED => 32,
				56 => 2,
				123 => 3,
			],
			'mybackend2' => [
				Account::STATE_ENABLED => 54,
			],
		];

		$expectedResult1 = [
			'mybackend' => [
				'limits' => $backendLimits['mybackend'],
				'usersStatsCode' => $userCount1['mybackend'],
				'usersStats' => [
					'Enabled' => 33,
					'Disabled' => 2,
					'Auto Disabled' => 42,
				],
			],
			'mybackend2' => [
				'limits' => $backendLimits['mybackend2'],
				'usersStatsCode' => $userCount1['mybackend2'],
				'usersStats' => [
					'Enabled' => 44,
				],
			],
		];

		$expectedResult2 = [
			'mybackend' => [
				'limits' => $backendLimits['mybackend'],
				'usersStatsCode' => $userCount2['mybackend'],
				'usersStats' => [
					'Enabled' => 23,
					'Disabled' => 1,
					'Auto Disabled' => 32,
					'Unknown State' => 5,
				],
			],
			'mybackend2' => [
				'limits' => $backendLimits['mybackend2'],
				'usersStatsCode' => $userCount2['mybackend2'],
				'usersStats' => [
					'Enabled' => 54,
				],
			],
		];
		return [
			[[], [], []],
			[[], $userCount1, []],
			[[], $userCount2, []],
			[$backendLimits, $userCount1, $expectedResult1],
			[$backendLimits, $userCount2, $expectedResult2]
		];
	}

	/**
	 * @dataProvider getLimitInfoStatsProvider
	 */
	public function testGetLimitInfoStats($limitInfo, $userCountBackends, $expectedResult) {
		$this->syncLimiter->method('getLimitInfo')
			->willReturn($limitInfo);
		$this->mapper->method('getUserCountForBackendGroupByState')
			->will($this->returnCallback(function ($backend) use ($userCountBackends) {
				if (isset($userCountBackends[$backend])) {
					return $userCountBackends[$backend];
				} else {
					return [];
				}
			}));
		$this->assertEquals($expectedResult, $this->syncService->getLimitInfoStats());
	}
}
