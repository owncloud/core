<?php
/**
 * Copyright (c) 2015 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Traits;

use OC\User\AccountTermMapper;
use OC\User\User;
use OCP\IConfig;
use Test\Util\User\Dummy;
use Test\Util\User\MemoryAccountMapper;

/**
 * Allow creating users in a temporary backend
 */
trait UserTrait {

	/** @var User[] */
	private $users = [];

	private $previousUserManagerInternals;

	protected function createUser($name, $password = null) {
		if (is_null($password)) {
			$password = $name;
		}
		$userManager = \OC::$server->getUserManager();
		if ($userManager->userExists($name)) {
			$userManager->get($name)->delete();
		}
		$user = $userManager->createUser($name, $password);
		$this->users[] = $user;
		return $user;
	}

	protected function setUpUserTrait() {

		$db = \OC::$server->getDatabaseConnection();
		$config = $this->createMock(IConfig::class);
		$accountMapper = new MemoryAccountMapper($config, $db, new AccountTermMapper($db));
		$accountMapper->testCaseName = get_class($this);
		$this->previousUserManagerInternals = \OC::$server->getUserManager()
			->reset($accountMapper, [Dummy::class => new Dummy()]);

		if ($this->previousUserManagerInternals[0] instanceof MemoryAccountMapper) {
			throw new \Exception("Missing tearDown call in " . $this->previousUserManagerInternals[0]->testCaseName);
		}
	}

	protected function tearDownUserTrait() {
		foreach($this->users as $user) {
			$user->delete();
		}
		\OC::$server->getUserManager()
			->reset($this->previousUserManagerInternals[0], $this->previousUserManagerInternals[1]);
	}
}
