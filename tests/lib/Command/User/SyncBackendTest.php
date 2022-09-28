<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
namespace Test\Command\User;

use OC\Core\Command\User\SyncBackend;
use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\SyncService;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\UserInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;

class SyncBackendTest extends TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ILogger | \PHPUnit\Framework\MockObject\MockObject */
	private $logger;
	/** @var AccountMapper | \PHPUnit\Framework\MockObject\MockObject */
	private $mapper;
	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject */
	private $userManager;
	/** @var SyncBackend */
	private $command;

	/** @var UserInterface | \PHPUnit\Framework\MockObject\MockObject */
	private $dummyBackend;

	public function setUp(): void {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->mapper = $this->createMock(AccountMapper::class);
		$this->userManager = $this->createMock(IUserManager::class);

		$this->dummyBackend = $this->createMock(UserInterface::class);

		$this->userManager->expects($this->any())
			->method('getBackends')
			->willReturn([$this->dummyBackend]);

		$this->command = new SyncBackend(
			$this->mapper,
			$this->config,
			$this->userManager,
			$this->logger
		);
	}

	public function testListBackends() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->once())
			->method('getOption')
			->with('list')
			->will($this->returnValue(true));

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with(\get_class($this->dummyBackend));

		$this->assertEquals(0, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testNoBackendIsGivenShowsError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->once())
			->method('getOption')
			->with('list')
			->will($this->returnValue(null));

		$inputInterface
			->expects($this->once())
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue(null));

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with('<error>No backend class name given. Please run ./occ help user:sync to understand how this command works.</error>');

		$this->assertEquals(1, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testNotExistingBackendIsGivenShowsError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->once())
			->method('getOption')
			->with('list')
			->will($this->returnValue(null));

		$backendClassName = '\OCP\Some\Backend';
		$inputInterface
			->expects($this->once())
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue($backendClassName));

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with("<error>The backend <$backendClassName> does not exist. Did you forget to enable the app?</error>");

		$this->assertEquals(1, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testUnsupportedBackendIsGivenShowsError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->once())
			->method('getOption')
			->with('list')
			->will($this->returnValue(null));

		$backendClassName = \get_class($this->dummyBackend);
		$inputInterface
			->expects($this->once())
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue($backendClassName));

		$this->dummyBackend
			->expects($this->once())
			->method('hasUserListings')
			->will($this->returnValue(false));

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with("<error>The backend <$backendClassName> does not allow user listing. No sync is possible</error>");

		$this->assertEquals(1, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testInvalidAccountActionShowsError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['list'],
				['missing-account-action'],
			)
			->willReturnOnConsecutiveCalls(
				null,
				'invalid',
			);

		$backendClassName = \get_class($this->dummyBackend);

		$inputInterface
			->expects($this->once())
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue($backendClassName));

		$this->dummyBackend
			->expects($this->once())
			->method('hasUserListings')
			->will($this->returnValue(true));

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with('<error>Unknown action. Choose between "disable" or "remove"</error>');

		$this->assertEquals(1, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function executeProvider() {
		return [
			['foo', 'Searching for foo ...'],
			[null, 'Analysing known accounts ...'],
		];
	}

	/**
	 * @dataProvider executeProvider
	 */
	public function testExecute($uid, $expected) {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createPartialMock(NullOutput::class, ['writeln']);

		$backendClassName = \get_class($this->dummyBackend);

		$inputInterface
			->expects($this->once())
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue($backendClassName));

		$this->dummyBackend
			->expects($this->once())
			->method('hasUserListings')
			->will($this->returnValue(true));

		$this->dummyBackend
			->method('getUsers')
			->willReturn([]);

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['list'],
				['missing-account-action'],
				['missing-account-action'],
				['uid'],
			)
			->willReturnOnConsecutiveCalls(
				null,
				'disable',
				'disable',
				$uid,
			);

		$outputInterface
			->expects($this->any())
			->method('writeln')
			->withConsecutive([$expected]);

		$this->assertEquals(0, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	/**
	 */
	public function testSingleUserSyncExistingUserError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);
		$syncService = $this->createMock(SyncService::class);

		$this->dummyBackend->method('getUsers')->willReturn(['existing-uid', 'existing-uid']);
		$this->dummyBackend->method('getDisplayName')
			->willReturn('existing-uid');

		$missingAccountsAction = 'disable';
		$syncService->expects($this->never())->method('run');

		$outputInterface
			->expects($this->exactly(2))
			->method('writeln')
			->withConsecutive(
				['Searching for existing-uid ...'],
				['<error>Multiple users returned from backend for: existing-uid. Cancelling sync.</error>'],
			);

		$return = static::invokePrivate($this->command, 'syncSingleUser', [
			$inputInterface,
			$outputInterface,
			$syncService,
			$this->dummyBackend,
			'existing-uid',
			$missingAccountsAction,
		]);

		$this->assertFalse($return);
	}

	public function testSingleUserSyncExistingUser() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);
		$syncService = $this->createMock(SyncService::class);

		$this->dummyBackend->method('getUsers')->willReturn(['existing-uid']);
		$this->dummyBackend->method('getDisplayName')
			->willReturn('existing-uid');

		$missingAccountsAction = 'disable';
		$syncService->expects($this
			->once())->method('run')->with(
				$this->dummyBackend,
				$this->callback(function ($subject) {
					return \count($subject) === 1 && $subject[0] === 'existing-uid';
				}),
				$this->anything()
			);

		$return = static::invokePrivate($this->command, 'syncSingleUser', [
			$inputInterface,
			$outputInterface,
			$syncService,
			$this->dummyBackend,
			'existing-uid',
			$missingAccountsAction,
		]);
		$this->assertTrue($return);
	}

	public function removedUserProvider() {
		return [
			['disable', 'isEnabled', true, false],
			['disable', 'isEnabled', false, null],
			['remove', 'delete', true, null],
		];
	}

	/**
	 * @dataProvider removedUserProvider
	 */
	public function testSingleUserSyncDisableRemovedUser($action, $method, $isEnabled, $setEnabled) {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);
		$syncService = $this->createMock(SyncService::class);

		$this->dummyBackend->method('getUsers')->willReturn([]);

		$removedAccount = new Account();
		$removedAccount->setUserId('removed-uid');
		$removedAccounts = [$removedAccount->getUserId() => $removedAccount];

		//$reappearedAccount = new Account();
		//$reappearedAccount->setUserId('reappeared-uid');
		//$reappearedAccounts = [$reappearedAccount->getUserId() => $reappearedAccount];
		$reappearedAccounts = [];

		$syncService->method('analyzeExistingUsers')->willReturn([$removedAccounts, $reappearedAccounts]);

		$removedUser = $this->createMock(IUser::class);
		$removedUser->method('delete')->willReturn(true);
		//$reappearedUser = $this->createMock(IUser::class);

		$this->userManager->method('get')->willReturnMap([
			['removed-uid', false, $removedUser],
			//['reappeared-uid', $reappearedUser]
		]);

		$syncService->expects($this->never())->method('run');
		$removedUser->expects($this->once())->method($method)->willReturn($isEnabled);
		if ($setEnabled !== null) {
			$removedUser->expects($this->once())->method('setEnabled')->with($setEnabled);
		} else {
			$removedUser->expects($this->never())->method('setEnabled');
		}

		$return = static::invokePrivate($this->command, 'syncSingleUser', [
			$inputInterface,
			$outputInterface,
			$syncService,
			$this->dummyBackend,
			'removed-uid',
			$action,
		]);
		$this->assertTrue($return);
	}

	public function testSyncMultipleUsersExistingUsers() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = new NullOutput();
		$syncService = $this->createMock(SyncService::class);

		$uids = ['uid1', 'uid2'];
		$this->dummyBackend->method('getUsers')->willReturn($uids);

		// no removed or reappeared users
		$syncService->method('analyzeExistingUsers')->willReturn([[],[]]);

		$missingAccountsAction = 'disable';
		$syncService->expects($this
			->once())->method('run')->with(
				$this->dummyBackend,
				$this->callback(function (\Iterator $iterator) use ($uids) {
					// convert to array so we can test better
					$items = [];
					foreach ($iterator as $item) {
						$items[] = $item;
					}
					return \count(\array_diff($items, $uids)) === 0;
				}),
				$this->anything()
			);

		$return = static::invokePrivate($this->command, 'syncMultipleUsers', [
			$inputInterface,
			$outputInterface,
			$syncService,
			$this->dummyBackend,
			$missingAccountsAction,
		]);
		$this->assertTrue($return);
	}

	/**
	 * @dataProvider removedUserProvider
	 */
	public function testSyncMultipleUsersRemovedUsers($action, $method, $isEnabled, $setEnabled) {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = new NullOutput();
		$syncService = $this->createMock(SyncService::class);

		$uids = ['uid2'];
		$this->dummyBackend->method('getUsers')->willReturn($uids);

		$removedAccount = new Account();
		$removedAccount->setUserId('removed-uid');
		$removedAccounts = [$removedAccount->getUserId() => $removedAccount];

		$syncService->method('analyzeExistingUsers')->willReturn([$removedAccounts,[]]);

		$syncService->expects($this
			->once())->method('run')->with(
				$this->dummyBackend,
				$this->callback(function (\Iterator $iterator) use ($uids) {
					// convert to array so we can test better
					$items = [];
					foreach ($iterator as $item) {
						$items[] = $item;
					}
					return \count(\array_diff($items, $uids)) === 0;
				}),
				$this->anything()
			);

		$removedUser = $this->createMock(IUser::class);
		$removedUser->method('delete')->willReturn(true);

		$this->userManager->method('get')->willReturnMap([
			['removed-uid', false, $removedUser],
		]);
		$removedUser->expects($this->once())->method($method)->willReturn($isEnabled);
		if ($setEnabled !== null) {
			$removedUser->expects($this->once())->method('setEnabled')->with($setEnabled);
		} else {
			$removedUser->expects($this->never())->method('setEnabled');
		}

		$return = static::invokePrivate($this->command, 'syncMultipleUsers', [
			$inputInterface,
			$outputInterface,
			$syncService,
			$this->dummyBackend,
			$action,
		]);
		$this->assertTrue($return);
	}

	public function testReEnableAction() {
		// Test account is re-enabled
		$nullOutput = new NullOutput();
		$account = $this->createMock(Account::class);
		$reappearedUsers = ['test' => $account];
		$user = $this->createMock(IUser::class);
		$user->expects($this->once())->method('isEnabled')->willReturn(false);
		$user->expects($this->once())->method('setEnabled')->with(true);
		$this->userManager->expects($this->once())->method('get')->willReturn($user);
		static::invokePrivate($this->command, 'reEnableUsers', [$reappearedUsers, $nullOutput]);
	}
}
