<?php
/**
 * @author Jörn Friedrich Dreyer
 * @copyright Copyright (c) 2014 Jörn Friedrich Dreyer <jfd@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Test\Files\ObjectStore;

use OC\Files\ObjectStore\ObjectStoreStorage;
use OC\Files\ObjectStore\Swift;

/**
 * Class SwiftTest
 *
 * @group DB
 *
 * @package Test\Files\Cache\ObjectStore
 */
class SwiftTest extends ObjectStoreStorageTest {

	/**
	 * @var Swift
	 */
	private $objectStorage;

	protected function setUp() {
		parent::setUp();

		if (!$this->runsWithPrimaryObjectstorage()) {
			$this->markTestSkipped('objectstore tests are unreliable in some environments');
		}

		// reset backend
		\OC_User::clearBackends();
		\OC_User::useBackend('database');

		// create users
		$users = ['test'];
		foreach($users as $userName) {
			$user = \OC::$server->getUserManager()->get($userName);
			if ($user !== null) { $user->delete(); }
			\OC::$server->getUserManager()->createUser($userName, $userName);
		}

		// main test user
		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		\OC\Files\Filesystem::tearDown();
		\OC_User::setUserId('test');

		$config = \OC::$server->getConfig()->getSystemValue('objectstore');
		$this->objectStorage = new Swift($config['arguments']);
		$config['objectstore'] = $this->objectStorage;
		$this->instance = new ObjectStoreStorage($config);
	}

	protected function tearDown() {
		if (is_null($this->instance)) {
			return;
		}
		$this->objectStorage->deleteContainer(true);
		$this->instance->getCache()->clear();

		$users = ['test'];
		foreach($users as $userName) {
			$user = \OC::$server->getUserManager()->get($userName);
			if ($user !== null) { $user->delete(); }
		}
		parent::tearDown();
	}
}
