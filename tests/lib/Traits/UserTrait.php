<?php
/**
 * Copyright (c) 2015 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Traits;

use OC\User\User;

/**
 * Allow creating users in a temporary backend
 */
trait UserTrait {

	/** @var User[] */
	private $users = [];

	protected function createUser($name, $password = null) {
		if (is_null($password)) {
			$password = $name;
		}
		$userManager = \OC::$server->getUserManager();
		if ($userManager->userExists($name)) {
			$userManager->get($name)->delete();
		}
		$user = \OC::$server->getUserManager()->createUser($name, $password);
		$this->users[] = $user;
		return $user;
	}

	protected function setUpUserTrait() {
	}

	protected function tearDownUserTrait() {
		foreach($this->users as $user) {
			$user->delete();
		}
	}
}
