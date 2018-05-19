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
use OCP\IConfig;
use OCP\ILogger;
use Test\Util\User\Dummy;
use Test\Util\User\MemoryAccountMapper;

/**
 * Allow creating users in a temporary backend
 */
trait UserTrait {

	/** @var User[] */
	private $users = [];

	private $previousUserManagerInternals;

	// FIXME add username
	protected function createUser($userId = null, $password = null, $userName = null) {
		if ($userId === null && $userName === null) {
			throw new \Exception('A user id or user name must be provided');
		}

		$userManager = \OC::$server->getUserManager();
		if ($password === null) {
			if ($userName) { // prefer username as password
				$password = $userName;
			} else {
				$password = $userId;
			}
		}

		if ($user = $userManager->getByUserId($userId)) {
			$user->delete();
		}
		if ($user = $userManager->getByUserName($userName)) {
			$user->delete();
		}

		$user = $userManager->createUser($userId, $password, $userName);
		$this->users[] = $user;
		return $user;
	}

	protected function setUpUserTrait() {
		$db = \OC::$server->getDatabaseConnection();
		$config =  \OC::$server->getConfig();
		$accountMapper = new MemoryAccountMapper($config, $db, new AccountTermMapper($db));
		$logger = $this->createMock(ILogger::class);
		$syncService = new SyncService($config, $logger, $accountMapper);
		$accountMapper->testCaseName = \get_class($this);
		$this->previousUserManagerInternals = \OC::$server->getUserManager()
			->reset($accountMapper, [Dummy::class => new Dummy()], $syncService);

		if ($this->previousUserManagerInternals[0] instanceof MemoryAccountMapper) {
			throw new \Exception("Missing tearDown call in " . $this->previousUserManagerInternals[0]->testCaseName);
		}
	}

	protected function tearDownUserTrait() {
		foreach ($this->users as $user) {
			$user->delete();
		}
		\OC::$server->getUserManager()
			->reset($this->previousUserManagerInternals[0], $this->previousUserManagerInternals[1], $this->previousUserManagerInternals[2]);
	}
}
