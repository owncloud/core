<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
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

use OC\Files\View;

/**
 * Class HelperTest
 *
 * @group DB
 */
class HelperTest extends TestCase {
	public function tearDown(): void {
		// tests will set this config option. It needs to be removed
		\OC::$server->getConfig()->deleteSystemValue('share_folder');
		parent::tearDown();
	}

	/**
	 * test set and get share folder
	 */
	public function testSetGetShareFolder() {
		\OCA\Files_Sharing\Helper::setShareFolder('/Shared/Folder');

		$sharedFolder = \OCA\Files_Sharing\Helper::getShareFolder();
		$this->assertSame('/Shared/Folder', \OCA\Files_Sharing\Helper::getShareFolder());
		$this->assertTrue(\OC\Files\Filesystem::is_dir($sharedFolder));
	}

	/**
	 * test get share folder on a read only storage
	 */
	public function testGetShareFolderOnReadOnlyStorage() {
		\OCA\Files_Sharing\Helper::setShareFolder('/Share/Folder');

		// Simulate when it is possible to create path /Share but not /Share/Folder
		$viewMock = $this->createMock(View::class);
		$viewMock->method('is_dir')
			->willReturnOnConsecutiveCalls(false, false);
		$viewMock->method('mkdir')
			->willReturnOnConsecutiveCalls(true, false);
		$sharedFolder = \OCA\Files_Sharing\Helper::getShareFolder($viewMock);
		$this->assertSame('/Share/Folder', $sharedFolder);
	}
}
