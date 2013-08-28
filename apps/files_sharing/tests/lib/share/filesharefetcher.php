<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
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
 */

namespace Test\Share;

use OCA\Files\Share\FileShare;

class FileShareFetcher extends \PHPUnit_Framework_TestCase {

	protected $matt;
	protected $shareManager;
	protected $groupManager;
	protected $folderShareBackend;
	protected $fetcher;

	protected function setUp() {
		$this->matt = 'MTRichards';
		$this->shareManager = $this->getMockBuilder('\OC\Share\ShareManager')
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->folderShareBackend  = $this->getMockBuilder('\OCA\Files\Share\FolderShareBackend')
			->disableOriginalConstructor()
			->getMock();
		$this->shareManager->expects($this->any())
			->method('getShareBackend')
			->with($this->equalTo('folder'))
			->will($this->returnValue($this->folderShareBackend));
		$this->fetcher = new \OCA\Files\Share\FileShareFetcher($this->shareManager,
			$this->groupManager, $this->matt
		);
	}

	public function testGetAll() {
		$share1 = new FileShare();
		$share1->setItemType('file');
		$share2 = new FileShare();
		$share2->setItemType('folder');
		$map = array(
			array('file', array('shareWith' => $this->matt, 'isShareWithUser' => true), null, null,
				array($share1)
			),
			array('folder', array('shareWith' => $this->matt, 'isShareWithUser' => true), null,
				null, array($share2)
			),
		);
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($map));
		$shares = $this->fetcher->getAll();
		$this->assertCount(2, $shares);
		$this->assertContains($share1, $shares);
		$this->assertContains($share2, $shares);
	}

	public function testGetAllPermissions() {
		$share1 = new FileShare();
		$share1->setItemType('file');
		$share1->setItemSource(79);
		$share1->setPermissions(1);
		$share2 = new FileShare();
		$share2->setItemType('folder');
		$share2->setItemSource(80);
		$share2->setPermissions(27);
		$share3 = new FileShare();
		$share3->setItemType('folder');
		$share3->setItemSource(80);
		$share3->setPermissions(5);
		$map = array(
			array('file', array('shareWith' => $this->matt, 'isShareWithUser' => true), null, null,
				array($share1)
			),
			array('folder', array('shareWith' => $this->matt, 'isShareWithUser' => true), null,
				null, array($share2, $share3)
			),
		);
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($map));
		$permissions = $this->fetcher->getAllPermissions();
		$this->assertCount(2, $permissions);
		$this->assertArrayHasKey(79, $permissions);
		$this->assertEquals(1, $permissions[79]);
		$this->assertArrayHasKey(80, $permissions);
		$this->assertEquals(31, $permissions[80]);
	}

	public function testGetByPathWithFile() {
		$share = new FileShare();
		$share->setItemType('file');
		$share->setItemTarget('secrets.txt');
		$map = array(
			array('file', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemTarget' => 'secrets.txt'), null, null, array($share)
			),
		);
		$this->shareManager->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$shares = $this->fetcher->getByPath('secrets.txt');
		$this->assertEquals(array($share), $shares);
	}

	public function testGetByPathWithFileWithoutExt() {
		$share = new FileShare();
		$share->setItemType('file');
		$share->setItemTarget('secrets');
		$map = array(
			array('folder', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemTarget' => 'secrets'), null, null, array()
			),
			array('file', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemTarget' => 'secrets'), null, null, array($share)
			),
		);
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($map));
		$shares = $this->fetcher->getByPath('secrets');
		$this->assertEquals(array($share), $shares);
	}

	public function testGetByPathWithFileAndPartExt() {
		$share = new FileShare();
		$share->setItemType('file');
		$share->setItemTarget('secrets.txt');
		$map = array(
			array('file', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemTarget' => 'secrets.txt'), null, null, array($share)
			),
		);
		$this->shareManager->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$shares = $this->fetcher->getByPath('secrets.txt.part');
		$this->assertEquals(array($share), $shares);
	}

	public function testGetByPathWithFolder() {
		$share = new FileShare();
		$share->setItemType('folder');
		$share->setItemTarget('reports');
		$map = array(
			array('folder', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemTarget' => 'reports'), null, null, array($share)
			),
		);
		$this->shareManager->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$shares = $this->fetcher->getByPath('reports/subfolder');
		$this->assertEquals(array($share), $shares);
	}

	public function testGetByIdWithFile() {
		$share = new FileShare();
		$share->setItemType('file');
		$share->setItemSource(79);
		$map = array(
			array('file', array('itemSource' => 79, 'shareWith' => $this->matt,
				'isShareWithUser' => true), null, null, array($share)
			),
		);
		$this->shareManager->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->folderShareBackend->expects($this->once())
			->method('getParentFolderId')
			->with($this->equalTo(79))
			->will($this->returnValue(-1));
		$shares = $this->fetcher->getById(79);
		$this->assertEquals(array($share), $shares);
	}

	public function testGetByIdWithFolder() {
		$share = new FileShare();
		$share->setItemType('folder');
		$share->setItemSource(80);
		$map = array(
			array('file', array('itemSource' => 80, 'shareWith' => $this->matt,
				'isShareWithUser' => true), null, null, array()
			),
			array('folder', array('itemSource' => 80, 'shareWith' => $this->matt,
				'isShareWithUser' => true), null, null, array($share)
			),
		);
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->folderShareBackend->expects($this->once())
			->method('getParentFolderId')
			->with($this->equalTo(80))
			->will($this->returnValue(-1));
		$shares = $this->fetcher->getById(80);
		$this->assertEquals(array($share), $shares);
	}

	public function testGetByIdWithParentFolders() {
		$share1 = new FileShare();
		$share1->setItemType('file');
		$share1->setItemSource(72);
		$share2 = new FileShare();
		$share2->setItemType('folder');
		$share2->setItemSource(21);
		$share3 = new FileShare();
		$share3->setItemType('folder');
		$share3->setItemSource(4);
		$map = array(
			array('file', array('itemSource' => 72, 'shareWith' => $this->matt,
				'isShareWithUser' => true), null, null, array($share1)
			),
			array('folder', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemSource' => 21), null, null, array($share2)
			),
			array('folder', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemSource' => 4), null, null, array($share3)
			),
		);
		$this->shareManager->expects($this->exactly(3))
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->folderShareBackend->expects($this->at(0))
			->method('getParentFolderId')
			->with($this->equalTo(72))
			->will($this->returnValue(21));
		$this->folderShareBackend->expects($this->at(1))
			->method('getParentFolderId')
			->with($this->equalTo(21))
			->will($this->returnValue(4));
		$this->folderShareBackend->expects($this->at(2))
			->method('getParentFolderId')
			->with($this->equalTo(4))
			->will($this->returnValue(-1));
		$shares = $this->fetcher->getById(72);
		$this->assertCount(3, $shares);
		$this->assertContains($share1, $shares);
		$this->assertContains($share2, $shares);
		$this->assertContains($share3, $shares);
	}

	public function testGetPermissionsByPath() {
		$share1 = new FileShare();
		$share1->setItemType('folder');
		$share1->setItemTarget('reports');
		$share1->setPermissions(27);
		$share2 = new FileShare();
		$share2->setItemType('folder');
		$share2->setItemTarget('reports');
		$share2->setPermissions(5);
		$map = array(
			array('folder', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemTarget' => 'reports'), null, null, array($share1, $share2)
			),
		);
		$this->shareManager->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->assertEquals(31, $this->fetcher->getPermissionsByPath('reports/subfolder'));
	}

	public function testGetPermissionsByPathWithNoShares() {
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValue(array()));
		$this->assertEquals(0, $this->fetcher->getPermissionsByPath('foo'));
	}

	public function testGetPermissionsById() {
		$share1 = new FileShare();
		$share1->setItemType('folder');
		$share1->setItemSource(80);
		$share1->setPermissions(27);
		$share2 = new FileShare();
		$share2->setItemType('folder');
		$share2->setItemSource(80);
		$share2->setPermissions(5);
		$map = array(
			array('file', array('itemSource' => 80, 'shareWith' => $this->matt,
				'isShareWithUser' => true), null, null, array()
			),
			array('folder', array('itemSource' => 80, 'shareWith' => $this->matt,
				'isShareWithUser' => true), null, null, array($share1, $share2)
			),
		);
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->folderShareBackend->expects($this->once())
			->method('getParentFolderId')
			->with($this->equalTo(80))
			->will($this->returnValue(-1));
		$this->assertEquals(31, $this->fetcher->getPermissionsById(80));
	}

	public function testGetPermissionsByIdWithNoShares() {
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValue(array()));
		$this->folderShareBackend->expects($this->once())
			->method('getParentFolderId')
			->will($this->returnValue(-1));
		$this->assertEquals(0, $this->fetcher->getPermissionsById(1));
	}

	public function testGetUsersSharedWithByPath() {
		$share = new FileShare();
		$share->setShareTypeId('user');
		$share->setShareWith($this->matt);
		$share->setItemType('file');
		$share->setItemTarget('secrets.txt');
		$map = array(
			array('file', array('shareWith' => $this->matt, 'isShareWithUser' => true,
				'itemTarget' => 'secrets.txt'), null, null, array($share)
			),
		);
		$this->shareManager->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$uids = $this->fetcher->getUsersSharedWithByPath('secrets.txt');
		$this->assertCount(1, $uids);
		$this->assertContains($this->matt, $uids);
	}

	public function testGetUsersSharedWithById() {
		$share1 = new FileShare();
		$share1->setShareTypeId('user');
		$share1->setShareWith($this->matt);
		$share1->setItemType('file');
		$share1->setItemSource(79);
		$share2 = new FileShare();
		$share2->setShareTypeId('group');
		$share2->setShareWith('group');
		$share2->setItemType('file');
		$share2->setItemSource(79);
		$map = array(
			array('file', array('itemSource' => 79), null, null, array($share1, $share2)),
		);
		$this->shareManager->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->folderShareBackend->expects($this->once())
			->method('getParentFolderId')
			->with($this->equalTo(79))
			->will($this->returnValue(-1));
		$group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$user1 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user1->expects($this->once())
			->method('getUID')
			->will($this->returnValue($this->matt));
		$user2 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user2->expects($this->once())
			->method('getUID')
			->will($this->returnValue('MTGap'));
		$group->expects($this->once())
			->method('getUsers')
			->will($this->returnValue(array($user1, $user2)));
		$this->groupManager->expects($this->once())
			->method('get')
			->with($this->equalTo('group'))
			->will($this->returnValue($group));
		$this->fetcher->setUID(null);
		$uids = $this->fetcher->getUsersSharedWithById(79);
		$this->assertCount(2, $uids);
		$this->assertContains($this->matt, $uids);
		$this->assertContains('MTGap', $uids);
	}

}