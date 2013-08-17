<?php
/**
 * ownCloud
 *
 * @author Florin Peter, Bjoern Schiessle
 * @copyright 2013 Florin Peter <owncloud@florin-peter.de> and
 *  Bjoern Schiessle <schiessle@owncloud.com>
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
 * Class Test_Trashbin
 * @brief this class provide basic trashbin app tests
 */
class Test_Trashbin extends \PHPUnit_Framework_TestCase {

	const TEST_TRASHBIN_USER1 = "test-trashbin-user1";

	private $userId;

	/**
	 * @var \OC_FilesystemView
	 */
	private $view;

	/**
	 * @var \OC_FilesystemView
	 */
	private $userView;
	private $data;
	private $stateFilesTrashbin;
	private $stateFilesEncryption;

	public static function setUpBeforeClass() {
		// reset backend
		\OC_User::clearBackends();
		\OC_User::useBackend('database');

		\OC_Hook::clear('OC_Filesystem');
		\OC_Hook::clear('OC_User');

		// trashbin hooks
		\OCA\Files_Trashbin\Trashbin::registerHooks();

		// create test user
		self::loginHelper(\Test_Trashbin::TEST_TRASHBIN_USER1, true);
	}

	function setUp() {
		// set user id
		\OC_User::setUserId(\Test_Trashbin::TEST_TRASHBIN_USER1);
		$this->userId = \Test_Trashbin::TEST_TRASHBIN_USER1;

		// init filesystem view
		$this->view = new \OC_FilesystemView('/');
		$this->userView = new \OC_FilesystemView('/' . $this->userId . '/files');

		// init short data
		$this->data = 'hats';

		// remember files_trashbin state
		$this->stateFilesTrashbin = OC_App::isEnabled('files_trashbin');

		// remember files_trashbin state
		$this->stateFilesEncryption = OC_App::isEnabled('files_encryption');

		// we want to tests with app files_trashbin enabled
		\OC_App::enable('files_trashbin');

		// disable encryption app for trash bin tests
		\OC_App::disable('files_encryption');
	}

	function tearDown() {
		// reset app files_trashbin
		if ($this->stateFilesTrashbin) {
			OC_App::enable('files_trashbin');
		} else {
			OC_App::disable('files_trashbin');
		}
		// reset app files_encryption
		if ($this->stateFilesEncryption) {
			OC_App::enable('files_encryption');
		} else {
			OC_App::disable('files_encryption');
		}
	}

	public static function tearDownAfterClass() {
		// cleanup test user
		\OC_User::deleteUser(\Test_Trashbin::TEST_TRASHBIN_USER1);
	}

	/**
	 * @brief test delete file
	 */
	function testDeleteFile() {

		// generate filename
		$filename = 'tmp-' . time() . '.txt';

		// save file with content
		$writtenFile = $this->userView->file_put_contents($filename, $this->data);

		// test that data was successfully written
		$this->assertTrue(is_int($writtenFile));

		$this->assertTrue($this->view->file_exists(
				'/' . $this->userId . '/files/' . $filename));

		// delete file
		$this->userView->unlink($filename);

		// check if file not exists
		$this->assertFalse($this->userView->file_exists($filename));

		// get files
		$trashFiles = $this->view->getDirectoryContent(
			'/' . $this->userId . '/files_trashbin/files/');

		$trashFileSuffix = null;
		// find created file with timestamp
		foreach ($trashFiles as $file) {
			if (strncmp($file['path'], $filename, strlen($filename))) {
				$path_parts = pathinfo($file['name']);
				$trashFileSuffix = $path_parts['extension'];
			}
		}

		// check if we found the file we created
		$this->assertNotNull($trashFileSuffix);

		// return filename for next test
		return $filename . '.' . $trashFileSuffix;
	}

	/**
	 * @brief test restore file
	 *
	 * @depends testDeleteFile
	 */
	function testRestoreFile($filename) {

		// prepare file information
		$path_parts = pathinfo($filename);
		$trashFileSuffix = $path_parts['extension'];
		$timestamp = str_replace('d', '', $trashFileSuffix);
		$fileNameWithoutSuffix = str_replace('.' . $trashFileSuffix, '', $filename);

		// restore file
		$this->assertTrue(\OCA\Files_Trashbin\Trashbin::restore($filename, $fileNameWithoutSuffix, $timestamp));

		// check if file exists
		$this->assertTrue($this->userView->file_exists($fileNameWithoutSuffix));
	}

	/**
	 * @brief test delete file forever
	 */
	function testPermanentDeleteFile() {

		// generate filename
		$filename = 'tmp-' . time() . '.txt';

		// save file with content
		$writtenFile = $this->userView->file_put_contents($filename, $this->data);

		// test that data was successfully written
		$this->assertTrue(is_int($writtenFile));

		// delete file
		$this->userView->unlink($filename);

		// check if file not exists
		$this->assertFalse($this->userView->file_exists($filename));

		// find created file with timestamp
		$query = \OC_DB::prepare('SELECT `timestamp`,`type` FROM `*PREFIX*files_trash`'
				. ' WHERE `id`=?');
		$result = $query->execute(array($filename))->fetchRow();

		$this->assertTrue(is_array($result));

		// build suffix
		$trashFileSuffix = 'd' . $result['timestamp'];

		// get timestamp from file
		$timestamp = str_replace('d', '', $trashFileSuffix);

		// delete file forever
		$this->assertGreaterThan(0, \OCA\Files_Trashbin\Trashbin::delete($filename, $timestamp));
	}

	/**
	 * @param $user
	 * @param bool $create
	 */
	public static function loginHelper($user, $create = false) {
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
