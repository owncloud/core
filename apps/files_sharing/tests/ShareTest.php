<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

/**
 * Class ShareTest
 *
 * @group DB
 */
class ShareTest extends TestCase {
	const TEST_FOLDER_NAME = '/folder_share_api_test';

	private static $tempStorage;

	protected function setUp(): void {
		parent::setUp();

		$this->folder = self::TEST_FOLDER_NAME;
		$this->subfolder  = '/subfolder_share_api_test';
		$this->subsubfolder = '/subsubfolder_share_api_test';

		$this->filename = '/share-api-test.txt';

		// save file with content
		$this->view->file_put_contents($this->filename, $this->data);
		$this->view->mkdir($this->folder);
		$this->view->mkdir($this->folder . $this->subfolder);
		$this->view->mkdir($this->folder . $this->subfolder . $this->subsubfolder);
		$this->view->file_put_contents($this->folder.$this->filename, $this->data);
		$this->view->file_put_contents($this->folder . $this->subfolder . $this->filename, $this->data);
	}

	protected function tearDown(): void {
		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);
		$this->view->unlink($this->filename);
		$this->view->deleteAll($this->folder);

		self::$tempStorage = null;

		// clear database table
		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*share`');
		$query->execute();

		parent::tearDown();
	}

	/**
	 * @param int $permission
	 * shared files should never have delete and create permissions
	 * @dataProvider dataProviderTestFileSharePermissions
	 */
	public function testFileSharePermissions($permission) {
		$share = $this->share(
			\OCP\Share::SHARE_TYPE_USER,
			$this->filename,
			self::TEST_FILES_SHARING_API_USER1,
			self::TEST_FILES_SHARING_API_USER2,
			$permission
		);
		$permission &= ~\OCP\Constants::PERMISSION_DELETE;
		$permission &= ~\OCP\Constants::PERMISSION_CREATE;
		$this->assertEquals($share->getPermissions(), $permission);
	}

	public function dataProviderTestFileSharePermissions() {
		$permission1 = \OCP\Constants::PERMISSION_ALL;
		$permission3 = \OCP\Constants::PERMISSION_READ;
		$permission4 = \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_UPDATE;
		$permission5 = \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_DELETE;
		$permission6 = \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE;
		$permission7 = \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE;

		return [
			[$permission1],
			[$permission3],
			[$permission4],
			[$permission5],
			[$permission6],
			[$permission7],
		];
	}
}
