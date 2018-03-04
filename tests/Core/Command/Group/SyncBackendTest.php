<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud, GmbH.
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

namespace Tests\Core\Command\Group;

use OC\Core\Command\Group\SyncBackend;
use OC\Group\Manager as GroupManager;
use OC\User\AccountTermMapper;
use OC\User\Manager as UserManager;
use OCP\GroupInterface;
use OCP\ILogger;
use OCP\UserInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;
use Test\Traits\GroupTrait;
use Test\Traits\UserTrait;
use Test\Util\Group\MemoryGroupMapper;
use Test\Util\MemoryMembershipManager;
use Test\Util\User\MemoryAccountMapper;
use OC\User\SyncService as UserSyncService;
use OC\Group\SyncService as GroupSyncService;

/**
 * Class SyncBackendTest
 *
 * @group DB
 */
class SyncBackendTest extends TestCase {

	use GroupTrait;
	use UserTrait;

	/** @var GroupManager */
	private $groupManager;

	/** @var UserManager */
	private $userManager;

	/** @var GroupInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $backend;
	/** @var UserInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $userBackend1;
	/** @var UserInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $userBackend2;

	/** @var CommandTester */
	private $commandTester;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $consoleInput;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $consoleOutput;

	/** @var \Symfony\Component\Console\Command\Command */
	protected $command;

	protected function setUp() {
		parent::setUp();
		$logger = $this->createMock(ILogger::class);
		$db = \OC::$server->getDatabaseConnection();
		$config = \OC::$server->getConfig();
		$groupMapper = new MemoryGroupMapper($db);
		$accountMapper = new MemoryAccountMapper($config, $db, new AccountTermMapper($db));
		$membershipManager = new MemoryMembershipManager($db, $config);
		$userSyncService = new UserSyncService($config, $logger, $accountMapper);
		$groupSyncService =  new GroupSyncService($groupMapper, $accountMapper, $membershipManager, $logger);

		$this->backend = $this->getMockBuilder(GroupInterface::class)
			->disableOriginalConstructor()
			->setMethods([
				'getGroupDetails',
				'implementsActions',
				'getUserGroups',
				'inGroup',
				'getGroups',
				'groupExists',
				'usersInGroup',
				'createGroup',
				'deleteGroup',
				'addToGroup',
				'removeFromGroup',
				'isVisibleForScope',
				'isSyncMaintained',
			])
			->getMock();
		$this->userBackend1 = $this->getMockBuilder(UserInterface::class)
			->disableOriginalConstructor()
			->setMethods([
				'implementsActions',
				'deleteUser',
				'getUsers',
				'userExists',
				'getDisplayName',
				'getDisplayNames',
				'hasUserListings',
				'createUser',
			])
			->getMock();
		$this->userBackend2 = $this->getMockBuilder(UserInterface::class)
			->disableOriginalConstructor()
			->setMethods([
				'implementsActions',
				'deleteUser',
				'getUsers',
				'userExists',
				'getDisplayName',
				'getDisplayNames',
				'hasUserListings',
				'createUser',
			])
			->getMock();

		// Adjust membership manager and mappers
		$this->userManager = \OC::$server->getUserManager();
		$this->groupManager = \OC::$server->getGroupManager();
		$this->userManager->resetMembershipManager($membershipManager);
		$this->userManager->reset($accountMapper, [$this->userBackend1, $this->userBackend2], $userSyncService);
		$this->groupManager->reset($groupMapper, [$this->backend], $groupSyncService);

		$this->command = new SyncBackend($groupMapper,
			$accountMapper,
			$membershipManager,
			\OC::$server->getLogger(),
			$this->groupManager);
		$this->commandTester = new CommandTester($this->command);
		$this->consoleInput = $this->createMock(InputInterface::class);
		$this->consoleOutput = $this->createMock(OutputInterface::class);
	}

	protected function tearDown() {
		for($i=1; $i<4; $i++) {
			if ($group = $this->groupManager->get('group'.$i)) {
				$group->delete();
			}
		}
		parent::tearDown();
	}

	public function testList() {
		$this->consoleInput->method('getOption')
			->will($this->returnValueMap([
				['list', true]
			]));

		$this->consoleOutput->expects($this->once())
			->method('writeln');

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	/**
	 * There are no groups synced. We expect groups to be synced down
	 * and memberships sync be ignored
	 */
	public function testGroupsOnly() {
		$this->consoleInput->method('getOption')
			->will($this->returnValueMap([
				['groups-only', true]
			]));

		$this->backend->expects($this->any())
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1', 'group2', 'group3']));

		$this->consoleInput->method('getArgument')
			->will($this->returnValueMap([
				['backend-class', get_class($this->backend)]
			]));

		$this->consoleOutput->expects($this->any())
			->method('getVerbosity')
			->willReturn(OutputInterface::VERBOSITY_QUIET);

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	/**
	 * There are no user or groups synced. We expect groups to be synced down, but
	 * since there are no users existing in remote synced, no memberships will be added
	 */
	public function testSyncAllNew() {
		$this->backend->expects($this->any())
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1', 'group2', 'group3']));

		// Does not implement group details
		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(false);

		$this->backend->expects($this->at(2))
			->method('usersInGroup')
			->with('group1', '', 500, 0)
			->willReturn(['user11', 'user12', 'user13']);

		$this->backend->expects($this->at(4))
			->method('usersInGroup')
			->with('group2', '', 500, 0)
			->willReturn(['user21']);

		$this->backend->expects($this->at(6))
			->method('usersInGroup')
			->with('group3', '', 500, 0)
			->willReturn(['user31']);

		$this->commandTester->execute(['backend-class' => get_class($this->backend)]);
		$output = $this->commandTester->getDisplay();
		$this->assertNotNull($output);
		$this->assertContains('Count groups from external backend', $output);
		$this->assertContains('Scan existing groups and find groups to delete', $output);
		$this->assertContains('No groups to be deleted have been detected', $output);
		$this->assertContains('Insert new and update existing groups. Sync memberships of each group', $output);

		$this->assertTrue($this->groupManager->groupExists('group1'));
		$this->assertEmpty($this->groupManager->get('group1')->getUsers());
		$this->assertTrue($this->groupManager->groupExists('group2'));
		$this->assertEmpty($this->groupManager->get('group2')->getUsers());
		$this->assertTrue($this->groupManager->groupExists('group3'));
		$this->assertEmpty($this->groupManager->get('group3')->getUsers());
	}

	/**
	 * In this test, one group will disappear from backend and should be removed from the system
	 */
	public function testRemoveUnknown() {
		// Initialize test
		$this->backend->expects($this->any())
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1', 'group2']));

		$this->createGroup('group1', $this->backend);
		$this->createGroup('group2', $this->backend);
		$this->createGroup('group3', $this->backend);

		// Does not implement group details
		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(false);

		$this->backend->expects($this->at(3))
			->method('usersInGroup')
			->with('group1', '', 500, 0)
			->willReturn(['user11', 'user12', 'user13']);

		$this->backend->expects($this->at(5))
			->method('usersInGroup')
			->with('group2', '', 500, 0)
			->willReturn(['user21']);

		$this->commandTester->execute(['backend-class' => get_class($this->backend)]);
		$output = $this->commandTester->getDisplay();
		$this->assertNotNull($output);
		$this->assertContains('Count groups from external backend', $output);
		$this->assertContains('Scan existing groups and find groups to delete', $output);
		$this->assertContains('Proceeding to remove the backend groups. Following groups are no longer known with the connected backend.', $output);
		$this->assertContains('group3', $output);
		$this->assertContains('Insert new and update existing groups. Sync memberships of each group', $output);

		$this->assertTrue($this->groupManager->groupExists('group1'));
		$this->assertEmpty($this->groupManager->get('group1')->getUsers());
		$this->assertTrue($this->groupManager->groupExists('group2'));
		$this->assertEmpty($this->groupManager->get('group2')->getUsers());
		$this->assertFalse($this->groupManager->groupExists('group3'));
	}

	/**
	 * There are 2 groups synced in the system.
	 * Now, lets sync users down, and allow to sync new memberships. However, some users belong to
	 * different backends and it should not matter. Additionally, some memberships were added
	 * using addUser to group (MANUAL), and thus these should not be affected (removed/added)
	 */
	public function testSyncMemberships() {
		// Initialize test
		$this->backend->expects($this->any())
			->method('getGroups')
			->with('', 500, 0)
			->will($this->returnValue(['group1', 'group2']));

		$group1 = $this->createGroup('group1', $this->backend);
		$group2 = $this->createGroup('group2', $this->backend);

		// Does not implement group details
		$this->backend->expects($this->any())
			->method('implementsActions')
			->willReturn(false);

		$this->backend->expects($this->at(4))
			->method('usersInGroup')
			->with('group1', '', 500, 0)
			->willReturn(['user11', 'user12', 'user13']);

		// Create used and add MANUALY to group - this should not be synced (added)
		$user11 = $this->createUser('user11', null, $this->userBackend1);
		$group1->addUser($user11);

		$this->createUser('user12', null, $this->userBackend2);
		$this->createUser('user13', null, $this->userBackend2);

		$this->backend->expects($this->at(5))
			->method('usersInGroup')
			->with('group2', '', 500, 0)
			->willReturn([]);

		// Create used and add MANUALY to group - this should not be synced (removed)
		$user21 = $this->createUser('userManualSync', null, $this->userBackend1);
		$group2->addUser($user21);

		$this->commandTester->execute(['backend-class' => get_class($this->backend)]);
		$output = $this->commandTester->getDisplay();
		$this->assertNotNull($output);
		$this->assertContains('Count groups from external backend', $output);
		$this->assertContains('Scan existing groups and find groups to delete', $output);
		$this->assertContains('No groups to be deleted have been detected', $output);
		$this->assertContains('Insert new and update existing groups. Sync memberships of each group', $output);

		$this->assertTrue($this->groupManager->groupExists('group1'));
		$users = $this->groupManager->get('group1')->getUsers();
		$this->assertCount(3, $users);
		$this->assertEquals($users[0]->getUID(), 'user11');
		$this->assertEquals($users[1]->getUID(), 'user12');
		$this->assertEquals($users[2]->getUID(), 'user13');

		$this->assertTrue($this->groupManager->groupExists('group2'));
		$users = $this->groupManager->get('group2')->getUsers();
		$this->assertCount(1, $users);
		$this->assertEquals($users[0]->getUID(), 'userManualSync');
	}

	/**
	 * @dataProvider inputProvider
	 * @param array $input
	 * @param string $expectedOutput
	 */
	public function testErrors($input, $expectedOutput) {
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
	}

	public function inputProvider() {
		return [
			[['backend-class' => 'OCA\User_LDAP\Group_Proxy'], 'does not exist'],
			[['backend-class' => null], 'No backend class name given'],
		];
	}
}
