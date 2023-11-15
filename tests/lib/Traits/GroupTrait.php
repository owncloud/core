<?php
/**
 * Copyright (c) 2015 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Traits;

use OC\User\AccountTermMapper;
use OC\User\SyncService;
use OC\User\User;
use OCP\IGroup;
use OCP\ILogger;
use Test\Util\User\Dummy;
use Test\Util\User\MemoryAccountMapper;

trait GroupTrait {
	private array $groups = [];

	protected function createGroup($gid, array $users = []): IGroup {
		$groupManager = \OC::$server->getGroupManager();
		if ($groupManager->groupExists($gid)) {
			$groupManager->get($gid)->delete();
		}
		$group = $groupManager->createGroup($gid);

		array_map(fn ($u) => $group->addUser($u), $users);

		$this->groups[] = $group;
		return $group;
	}

	protected function tearDownGroupTrait(): void {
		foreach ($this->groups as $group) {
			$group->delete();
		}
	}
}
