<?php
/**
 * @author Piotr Mrowczynski piotr@owncloud.com
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\Files_Trashbin\Tests;

use OC\Files\Filesystem;
use OC\Files\View;
use OCA\Files_Sharing\AppInfo\Application;
use OCA\Files_Trashbin\Expiration;
use OCA\Files_Trashbin\Trashbin;
use OCP\Files\Cache\IWatcher;
use OCP\IConfig;

/**
 * Class TrashbinTestCase
 *
 * @group DB
 */
abstract class TestCase extends \Test\TestCase {
	public const TEST_TRASHBIN_USER1 = "test-trashbin-user1";
	public const TEST_TRASHBIN_USER2 = "test-trashbin-user2";

	protected $trashRoot1;
	protected $trashRoot2;

	/**
	 * @var View
	 */
	protected $rootView;

	private static $rememberRetentionObligation;

	/**
	 * @var bool
	 */
	private static $trashBinStatus;

	public static function setUpBeforeClass(): void {
		parent::setUpBeforeClass();

		$appManager = \OC::$server->getAppManager();
		self::$trashBinStatus = $appManager->isEnabledForUser('files_trashbin');

		// clear share hooks
		\OC_Hook::clear('OCP\\Share');
		\OC::registerShareHooks();
		$application = new Application();
		$application->registerMountProviders();

		//disable encryption
		\OC_App::disable('encryption');

		$config = \OC::$server->getConfig();
		//configure trashbin
		self::$rememberRetentionObligation = $config->getSystemValue('trashbin_retention_obligation', Expiration::DEFAULT_RETENTION_OBLIGATION);
		$config->setSystemValue('trashbin_retention_obligation', 'auto, 2');

		// register hooks
		Trashbin::registerHooks();

		// create test user
		self::loginHelper(self::TEST_TRASHBIN_USER2, true);
		self::loginHelper(self::TEST_TRASHBIN_USER1, true);
	}

	public static function tearDownAfterClass(): void {
		// cleanup test user
		$user = \OC::$server->getUserManager()->get(self::TEST_TRASHBIN_USER1);
		$user?->delete();
		$user = \OC::$server->getUserManager()->get(self::TEST_TRASHBIN_USER2);
		$user?->delete();

		\OC::$server->getConfig()->setSystemValue('trashbin_retention_obligation', self::$rememberRetentionObligation);

		\OC_Hook::clear();

		Filesystem::getLoader()->removeStorageWrapper('oc_trashbin');

		if (self::$trashBinStatus) {
			\OC::$server->getAppManager()->enableApp('files_trashbin');
		}

		parent::tearDownAfterClass();
	}

	protected function setUp(): void {
		parent::setUp();

		\OC::$server->getAppManager()->enableApp('files_trashbin');
		$config = \OC::$server->getConfig();
		$mockConfig = $this->createMock(IConfig::class);
		$mockConfig
			->method('getSystemValue')
			->willReturnCallback(function ($key, $default) use ($config) {
				if ($key === 'filesystem_check_changes') {
					return IWatcher::CHECK_ONCE;
				}

				return $config->getSystemValue($key, $default);
			});
		$mockConfig->method('getUserValue')->willReturnArgument(2);
		$this->overwriteService('AllConfig', $mockConfig);

		$this->trashRoot1 = '/' . self::TEST_TRASHBIN_USER1 . '/files_trashbin';
		$this->trashRoot2 = '/' . self::TEST_TRASHBIN_USER2 . '/files_trashbin';
		$this->rootView = new View();
	}

	protected function tearDown(): void {
		$this->restoreService('AllConfig');
		// disable trashbin to be able to properly clean up
		\OC::$server->getAppManager()->disableApp('files_trashbin');

		$this->rootView->deleteAll('/' . self::TEST_TRASHBIN_USER1 . '/files');
		$this->rootView->deleteAll('/' . self::TEST_TRASHBIN_USER2 . '/files');
		$this->rootView->deleteAll($this->trashRoot1);
		$this->rootView->deleteAll($this->trashRoot2);

		// clear trash table
		$connection = \OC::$server->getDatabaseConnection();
		$connection->executeStatement('DELETE FROM `*PREFIX*files_trash`');

		parent::tearDown();
	}

	/**
	 * @param string $user
	 * @param bool $create
	 */
	protected static function loginHelper($user, $create = false): void {
		if ($create) {
			try {
				\OC::$server->getUserManager()->createUser($user, $user);
			} catch (\Exception $e) { // catch username is already being used from previous aborted runs
			}
		}

		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		Filesystem::tearDown();
		\OC_User::setUserId($user);
		\OC_Util::setupFS($user);
		\OC::$server->getUserFolder($user);
	}
}
