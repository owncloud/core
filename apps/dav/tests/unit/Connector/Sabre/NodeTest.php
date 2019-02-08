<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OCA\DAV\Tests\unit\Connector\Sabre;

use OCP\Files\Storage\IStorage;
use OC\Files\View;
use OC\Files\FileInfo;
use OCP\Share\IShare;
use OCP\Share\IManager;
use OCP\Files\Mount\IMountPoint;

/**
 * Class NodeTest
 *
 * @group DB
 * @package OCA\DAV\Tests\unit\Connector\Sabre
 */
class NodeTest extends \Test\TestCase {
	public function davPermissionsProvider() {
		return [
			[\OCP\Constants::PERMISSION_ALL, 'file', false, false, 'RDNVW'],
			[\OCP\Constants::PERMISSION_ALL, 'dir', false, false, 'RDNVCK'],
			[\OCP\Constants::PERMISSION_ALL, 'file', true, false, 'SRDNVW'],
			[\OCP\Constants::PERMISSION_ALL, 'file', true, true, 'SRMDNVW'],
			[\OCP\Constants::PERMISSION_ALL - \OCP\Constants::PERMISSION_SHARE, 'file', true, false, 'SDNVW'],
			[\OCP\Constants::PERMISSION_ALL - \OCP\Constants::PERMISSION_UPDATE, 'file', false, false, 'RD'],
			[\OCP\Constants::PERMISSION_ALL - \OCP\Constants::PERMISSION_DELETE, 'file', false, false, 'RNVW'],
			[\OCP\Constants::PERMISSION_ALL - \OCP\Constants::PERMISSION_CREATE, 'file', false, false, 'RDNVW'],
			[\OCP\Constants::PERMISSION_ALL - \OCP\Constants::PERMISSION_CREATE, 'dir', false, false, 'RDNV'],
		];
	}

	/**
	 * @dataProvider davPermissionsProvider
	 */
	public function testDavPermissions($permissions, $type, $shared, $mounted, $expected) {
		$info = $this->getMockBuilder(FileInfo::class)
			->disableOriginalConstructor()
			->setMethods(['getPermissions', 'isShared', 'isMounted', 'getType'])
			->getMock();
		$info->expects($this->any())
			->method('getPermissions')
			->will($this->returnValue($permissions));
		$info->expects($this->any())
			->method('isShared')
			->will($this->returnValue($shared));
		$info->expects($this->any())
			->method('isMounted')
			->will($this->returnValue($mounted));
		$info->expects($this->any())
			->method('getType')
			->will($this->returnValue($type));
		$view = $this->createMock(View::class);

		$node = new  \OCA\DAV\Connector\Sabre\File($view, $info);
		$this->assertEquals($expected, $node->getDavPermissions());
	}

	public function sharePermissionsProvider() {
		return [
			[\OCP\Files\FileInfo::TYPE_FILE, null, 1, 1],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 3, 3],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 5, 1],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 7, 3],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 9, 1],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 11, 3],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 13, 1],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 15, 3],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 17, 17],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 19, 19],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 21, 17],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 23, 19],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 25, 17],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 27, 19],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 29, 17],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 30, 18],
			[\OCP\Files\FileInfo::TYPE_FILE, null, 31, 19],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 1, 1],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 3, 3],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 5, 5],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 7, 7],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 9, 9],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 11, 11],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 13, 13],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 15, 15],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 17, 17],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 19, 19],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 21, 21],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 23, 23],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 25, 25],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 27, 27],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 29, 29],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 30, 30],
			[\OCP\Files\FileInfo::TYPE_FOLDER, null, 31, 31],
			[\OCP\Files\FileInfo::TYPE_FOLDER, 'shareToken', 7, 7],
		];
	}

	/**
	 * @dataProvider sharePermissionsProvider
	 */
	public function testSharePermissions($type, $user, $permissions, $expected) {
		$storage = $this->createMock(IStorage::class);
		$storage->method('getPermissions')->willReturn($permissions);

		$mountpoint = $this->createMock(IMountPoint::class);
		$mountpoint->method('getMountPoint')->willReturn('myPath');
		$shareManager = $this->getMockBuilder(IManager::class)->disableOriginalConstructor()->getMock();
		$share = $this->getMockBuilder(IShare::class)->disableOriginalConstructor()->getMock();

		if ($user === null) {
			$shareManager->expects($this->never())->method('getShareByToken');
			$share->expects($this->never())->method('getPermissions');
		} else {
			$shareManager->expects($this->once())->method('getShareByToken')->with($user)
				->willReturn($share);
			$share->expects($this->once())->method('getPermissions')->willReturn($permissions);
		}

		$info = $this->getMockBuilder(FileInfo::class)
			->disableOriginalConstructor()
			->setMethods(['getStorage', 'getType', 'getMountPoint'])
			->getMock();

		$info->method('getStorage')->willReturn($storage);
		$info->method('getType')->willReturn($type);
		$info->method('getMountPoint')->willReturn($mountpoint);

		$view = $this->createMock(View::class);

		$node = new  \OCA\DAV\Connector\Sabre\File($view, $info);
		$this->invokePrivate($node, 'shareManager', [$shareManager]);
		$this->assertEquals($expected, $node->getSharePermissions($user));
	}

	public function fileIdProvider() {
		return [
			['oc1234', 789, '00000789oc1234'],
			['a1231ast', 12345678, '12345678a1231ast'],
			['oc', 1, '00000001oc'],
		];
	}

	/**
	 * Checks the construction of the full id from the numeric and instance ids.
	 *
	 * @dataProvider fileIdProvider
	 */
	public function testFileId($instanceid, $numericid, $fullid) {
		$info = $this->getMockBuilder(FileInfo::class)
			->disableOriginalConstructor()
			->setMethods(['getId'])
			->getMock();
		$info->expects($this->any())
			->method('getId')
			->will($this->returnValue($numericid));
		$view = $this->createMock(View::class);

		\OC::$server->getSystemConfig()->setValue('instanceid', $instanceid);

		$node = new  \OCA\DAV\Connector\Sabre\File($view, $info);
		$this->assertEquals($numericid, $node->getId());
		$this->assertEquals($numericid, $node->getInternalFileId());
		$this->assertEquals($fullid, $node->getFileId());

		// Check the contract that the full id must satisfy. This is technically
		// redundant and verifies only that our test cases are sane.
		\preg_match('/^(\d*)(.*)$/', $node->getFileId(), $matches);
		$this->assertEquals($numericid, (int)$matches[1]);
		$this->assertEquals($instanceid, $matches[2]);
	}
}
