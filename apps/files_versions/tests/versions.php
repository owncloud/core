<?php
/**
 * ownCloud
 *
 * @author Bjoern Schiessle
 * @copyright 2013 Bjoern Schiessle <schiessle@owncloud.com>
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

require_once realpath(dirname(__FILE__) . '/../../../lib/base.php');
require_once realpath(dirname(__FILE__) . '/../appinfo/app.php');

/**
 * Class Test_Versions
 * @brief this class provide basic version app tests
 */
class Test_Versions extends \PHPUnit_Framework_TestCase {

	const TEST_VERSIONS_USER = "test-versions-user";

	private $userId;

	/**
	 * @var \OC_FilesystemView
	 */
	private $view;

	/**
	 * @var \OC_FilesystemView
	 */
	private $filesView;
	private $versionsView;
	private $data;
	private $data2;
	private $filename;
	private $timestamps;
	private $stateFilesVersions;
	private $stateFilesEncryption;

	public static function setUpBeforeClass() {
		// reset backend
		\OC_User::clearBackends();
		\OC_User::useBackend('database');

		\OC_Hook::clear('OC_Filesystem');
		\OC_Hook::clear('OC_User');

		// versioning hooks
		\OCA\Files_Versions\Hooks::registerHooks();

		// create test user
		self::loginHelper(\Test_Versions::TEST_VERSIONS_USER, true);
	}

	function setUp() {
		// set user id
		\OC_User::setUserId(\Test_Versions::TEST_VERSIONS_USER);
		$this->userId = \Test_Versions::TEST_VERSIONS_USER;

		// init filesystem views
		$this->view = new \OC_FilesystemView('/');
		$this->view->mkdir('/' . $this->userId . '/files_versions');
		$this->filesView = new \OC_FilesystemView('/' . $this->userId . '/files');
		$this->versionsView = new \OC_FilesystemView('/' . $this->userId . '/files_versions');

		// init data
		$this->data = 'hats';
		$this->data2 = 'hats2';
		
		$this->filename = 'versions_test.txt';

		//init timestamps
		$this->timestamps = array("1", "2", "3");
		
		// remember files_versions state
		$this->stateFilesVersions = OC_App::isEnabled('files_versions');

		// remember files_encryption state
		$this->stateFilesEncryption = OC_App::isEnabled('files_encryption');

		// we want to tests with app files_versions enabled
		\OC_App::enable('files_versions');

		// disable encryption app for versions tests
		\OC_App::disable('files_encryption');
	}

	function tearDown() {
		// reset app files_versions
		if ($this->stateFilesVersions) {
			OC_App::enable('files_versions');
		} else {
			OC_App::disable('files_versions');
		}
		
		// delete old versions and files for the next test
		$this->view->deleteAll('/' . $this->userId . '/files_versions');
		$this->filesView->unlink($this->filename);
		
		// reset app files_encryption
		if ($this->stateFilesEncryption) {
			OC_App::enable('files_encryption');
		} else {
			OC_App::disable('files_encryption');
		}
	}

	public static function tearDownAfterClass() {
		// cleanup test user
		\OC_User::deleteUser(\Test_Versions::TEST_VERSIONS_USER);
	}

	/**
	 * @brief test get version
	 */
	function testGetVersions() {
		// create the initial file
		$this->filesView->file_put_contents($this->filename, $this->data);
		
		// create some random versions
		$this->versionsView->file_put_contents($this->filename.'.v'.$this->timestamps[0], $this->data);
		$this->versionsView->file_put_contents($this->filename.'.v'.$this->timestamps[1], $this->data);
		$this->versionsView->file_put_contents($this->filename.'.v'.$this->timestamps[2], $this->data);
		
		$versions = \OCA\Files_Versions\Storage::getVersions($this->userId, $this->filename);
		$versions = array_reverse($versions); // need oldest version first

		$this->assertEquals(3, count($versions));
		$i = 0;
		foreach ($versions as $v) {
			$this->assertEquals($this->timestamps[$i], $v['version']);
			$this->assertTrue($this->versionsView->file_exists($v['path'].'.v'.$v['version']));
			$i++;
		}
	}
		
	/**
	 * @brief test create version
	 * @depends testGetVersions
	 */
	function testStore() {
		$this->filesView->file_put_contents($this->filename, $this->data);
		
		// check if file was written
		$this->assertTrue($this->filesView->file_exists($this->filename));
		
		// no versions should exists
		$versions = \OCA\Files_Versions\Storage::getVersions($this->userId, $this->filename);
		$this->assertTrue(empty($versions));
		
		//update file
		$this->filesView->file_put_contents($this->filename, $this->data2);
		// now we should have one version
		$versions = \OCA\Files_Versions\Storage::getVersions($this->userId, $this->filename);
		$this->assertEquals(1, count($versions));
		$version = reset($versions);
		$this->assertEquals($this->data, $this->versionsView->file_get_contents($version['path'].'.v'.$version['version']));
		$this->assertEquals($this->data2, $this->filesView->file_get_contents($this->filename));
		
	}
	
	/**
	 * @brief test version rollback
	 */
	function testRollback() {
		// create the initial file
		$this->filesView->file_put_contents($this->filename, $this->data);
		
		// create a versions
		$this->versionsView->file_put_contents($this->filename.'.v'.$this->timestamps[0], $this->data2);
		
		//does the files exists
		$this->assertEquals($this->data, $this->filesView->file_get_contents($this->filename));
		$this->assertEquals($this->data2, $this->versionsView->file_get_contents($this->filename.'.v'.$this->timestamps[0]));
		
		// rollback the file
		\OCA\Files_Versions\Storage::rollback($this->filename, $this->timestamps[0]);
		
		//check if rollback was successful
		$this->assertEquals($this->data2, $this->filesView->file_get_contents($this->filename));
		
	}
	
	/**
	 * @param $user
	 * @param bool $create
	 */
	private static function loginHelper($user, $create = false) {
		if ($create) {
			\OC_User::createUser($user, $user);
		}

		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		\OC\Files\Filesystem::tearDown();
		\OC_Util::setupFS($user);
		\OC_User::setUserId($user);
	}

}

