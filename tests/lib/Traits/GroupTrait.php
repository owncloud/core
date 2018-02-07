<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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


namespace Test\Traits;

use OC\Group\Group;
use OC\Group\SyncService;
use OC\User\AccountMapper;
use OCP\IConfig;
use OCP\ILogger;
use Test\Util\Group\Dummy;
use Test\Util\Group\MemoryGroupMapper;
use Test\Util\MemoryMembershipManager;

/**
 * Allow creating users in a temporary backend
 */
trait GroupTrait {

	/** @var Group[] */
	private $groups = [];

	private $previousGroupManagerInternals;
	private $previousGroupManagerMembershipManager;
	private $previousUserManagerMembershipManager;

	protected function createGroup($name, $backend = null) {
		$groupManager = \OC::$server->getGroupManager();
		$canBeDeleted = true;
		if ($groupManager->groupExists($name)) {
			$canBeDeleted = $groupManager->get($name)->delete();
		}

		if ($canBeDeleted && !is_null($backend)) {
			// If backend is specified, create in external backend
			$backend->createGroup($name);
			$group = $groupManager->createGroupFromBackend($name, $backend);
		} else if ($canBeDeleted) {
			// If backend is not specified, create in backend using createGroup
			$group = $groupManager->createGroup($name);
		} else {
			$group = $groupManager->get($name);
		}
		$this->groups[] = $group;
		return $group;
	}

	protected function setUpGroupTrait() {
		$config = \OC::$server->getConfig();
		$logger = $this->createMock(ILogger::class);
		$db = \OC::$server->getDatabaseConnection();

		// Setup memberships
		$membershipManager = new MemoryMembershipManager($db, $config);
		$membershipManager->testCaseName = get_class($this);
		$this->previousGroupManagerMembershipManager = \OC::$server->getGroupManager()
			->resetMembershipManager($membershipManager);
		$this->previousUserManagerMembershipManager = \OC::$server->getUserManager()
			->resetMembershipManager($membershipManager);

		if ($this->previousGroupManagerMembershipManager instanceof MemoryMembershipManager) {
			throw new \Exception("Missing tearDown call in " . $this->previousGroupManagerMembershipManager->testCaseName);
		}
		if ($this->previousUserManagerMembershipManager instanceof MemoryMembershipManager) {
			throw new \Exception("Missing tearDown call in " . $this->previousUserManagerMembershipManager->testCaseName);
		}

		// Setup groups
		$groupMapper = new MemoryGroupMapper($db);
		$groupMapper->testCaseName = get_class($this);

		// Account mapper is relevant only for sync command tests - to test sync one should reset group manager and user manager
		// in the test, and not in set-up
		$accountMapper = $this->createMock(AccountMapper::class);
		$groupSyncService = new SyncService(
			$groupMapper,
			$accountMapper,
			$membershipManager,
			$config,
			$logger
		);

		$this->previousGroupManagerInternals = \OC::$server->getGroupManager()
			->reset($groupMapper, [Dummy::class => new Dummy()], $groupSyncService);

		if ($this->previousGroupManagerInternals[0] instanceof MemoryGroupMapper) {
			throw new \Exception("Missing tearDown call in " . $this->previousGroupManagerInternals[0]->testCaseName);
		}
	}

	protected function tearDownGroupTrait() {
		foreach($this->groups as $group) {
			$group->delete();
		}

		\OC::$server->getGroupManager()
			->reset($this->previousGroupManagerInternals[0], $this->previousGroupManagerInternals[1], $this->previousGroupManagerInternals[2]);
		\OC::$server->getGroupManager()
			->resetMembershipManager($this->previousGroupManagerMembershipManager);
		\OC::$server->getUserManager()
			->resetMembershipManager($this->previousUserManagerMembershipManager);
	}
}