<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Roeland Jago Douma <rullzer@users.noreply.github.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OCA\Files_Sharing\Tests;

use OC\Files\Cache\Storage;
use OC\Files\Filesystem;
use OCA\Files_Sharing\AppInfo\Application;
use OCA\Files_Sharing\SharedStorage;
use OCP\ICache;
use Test\Traits\GroupTrait;
use Test\Traits\UserTrait;

/**
 * Class TestCase
 *
 * @group DB
 *
 * Base class for sharing tests.
 */
abstract class TestCase extends \Test\TestCase {

	use UserTrait;
	use GroupTrait;

	const TEST_FILES_SHARING_API_USER1 = "test-share-user1";
	const TEST_FILES_SHARING_API_USER2 = "test-share-user2";
	const TEST_FILES_SHARING_API_USER3 = "test-share-user3";
	const TEST_FILES_SHARING_API_USER4 = "test-share-user4";

	const TEST_FILES_SHARING_API_GROUP1 = "test-share-group1";

	public $filename;
	public $data;
	/**
	 * @var \OC\Files\View
	 */
	public $view;
	public $folder;
	public $subfolder;

	/** @var \OCP\Share\IManager */
	protected $shareManager;
	/** @var \OCP\Files\IRootFolder */
	protected $rootFolder;

	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();

		$application = new Application();
		$application->registerMountProviders();
		
		// reset backend
		\OC::$server->getGroupManager()->clearBackends();

		// clear share hooks
		\OC_Hook::clear('OCP\\Share');
		\OC::registerShareHooks();
	}

	protected function setUp() {
		parent::setUp();

		// create users
		$user1 = $this->createUser(self::TEST_FILES_SHARING_API_USER1, self::TEST_FILES_SHARING_API_USER1);
		$user2 = $this->createUser(self::TEST_FILES_SHARING_API_USER2, self::TEST_FILES_SHARING_API_USER2);
		$user3 = $this->createUser(self::TEST_FILES_SHARING_API_USER3, self::TEST_FILES_SHARING_API_USER3);
		$user4 = $this->createUser(self::TEST_FILES_SHARING_API_USER4, self::TEST_FILES_SHARING_API_USER4);

		// create group
		$groupBackend = new \Test\Util\Group\Dummy();
		\OC::$server->getGroupManager()->addBackend($groupBackend);
		$apiGroup1 = $this->createGroup(self::TEST_FILES_SHARING_API_GROUP1);
		$group = $this->createGroup('group');
		$group1 = $this->createGroup('group1');
		$group2 = $this->createGroup('group2');
		$group3 = $this->createGroup('group3');
		$group->addUser($user1);
		$group->addUser($user2);
		$group->addUser($user3);
		$group1->addUser($user2);
		$group2->addUser($user3);
		$group3->addUser($user4);
		$apiGroup1->addUser($user2);

		//login as user1
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);

		$this->data = 'foobar';
		$this->view = new \OC\Files\View('/' . self::TEST_FILES_SHARING_API_USER1 . '/files');

		$this->shareManager = \OC::$server->getShareManager();
		$this->rootFolder = \OC::$server->getRootFolder();
	}

	protected function tearDown() {
		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*share`');
		$query->execute();

		parent::tearDown();
	}

	public static function tearDownAfterClass() {
		// delete group
		$group = \OC::$server->getGroupManager()->get(self::TEST_FILES_SHARING_API_GROUP1);
		if ($group !== null) { $group->delete(); }

		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		Filesystem::tearDown();

		// reset backend
		\OC::$server->getGroupManager()->clearBackends();
		\OC::$server->getGroupManager()->addBackend(new \OC\Group\Database(\OC::$server->getDatabaseConnection()));

		parent::tearDownAfterClass();
	}

	/**
	 * @param string $user
	 * @param bool $create
	 * @param bool $password
	 */
	protected static function loginHelper($user, $create = false, $password = false) {

		if ($password === false) {
			$password = $user;
		}

		if ($create) {
			\OC::$server->getUserManager()->createUser($user, $password);
			\OC::$server->getGroupManager()->createGroup('group');
			\OC::$server->getGroupManager()->addToGroup($user, 'group');
		}

		self::resetStorage();

		\OC_Util::tearDownFS();
		\OC::$server->getUserSession()->setUser(null);
		\OC\Files\Filesystem::tearDown();
		\OC::$server->getUserSession()->login($user, $password);
		\OC::$server->getUserFolder($user);

		\OC_Util::setupFS($user);
	}

	/**
	 * reset init status for the share storage
	 */
	protected static function resetStorage() {
		$storage = new \ReflectionClass(SharedStorage::class);
		$isInitialized = $storage->getProperty('initialized');
		$isInitialized->setAccessible(true);
		$isInitialized->setValue($storage, false);
		$isInitialized->setAccessible(false);

		$storage = new \ReflectionClass(Storage::class);
		$property = $storage->getProperty('localCache');
		$property->setAccessible(true);
		/** @var ICache $localCache */
		$localCache = $property->getValue();
		if ($localCache instanceof ICache) {
			$localCache->clear();
		}
		$property->setAccessible(false);
		$property = $storage->getProperty('distributedCache');
		$property->setAccessible(true);
		/** @var ICache $localCache */
		$distributedCache = $property->getValue();
		if ($distributedCache instanceof ICache) {
			$distributedCache->clear();
		}
		$property->setAccessible(false);
	}

	/**
	 * get some information from a given share
	 * @param int $shareID
	 * @return array with: item_source, share_type, share_with, item_type, permissions
	 */
	protected function getShareFromId($shareID) {
		$sql = 'SELECT `item_source`, `share_type`, `share_with`, `item_type`, `permissions` FROM `*PREFIX*share` WHERE `id` = ?';
		$args = [$shareID];
		$query = \OCP\DB::prepare($sql);
		$result = $query->execute($args);

		$share = Null;

		if ($result) {
			$share = $result->fetchRow();
		}

		return $share;

	}

	/**
	 * @param int $type The share type
	 * @param string $path The path to share relative to $initiators root
	 * @param string $initiator
	 * @param string $recipient
	 * @param int $permissions
	 * @return \OCP\Share\IShare
	 */
	protected function share($type, $path, $initiator, $recipient, $permissions) {
		if (is_string($path)) {
			$userFolder = $this->rootFolder->getUserFolder($initiator);
			$node = $userFolder->get($path);
		} else {
			$node = $path;
		}

		$share = $this->shareManager->newShare();
		$share->setShareType($type)
			->setSharedWith($recipient)
			->setSharedBy($initiator)
			->setNode($node)
			->setPermissions($permissions);
		$share = $this->shareManager->createShare($share);

		return $share;
	}
}
