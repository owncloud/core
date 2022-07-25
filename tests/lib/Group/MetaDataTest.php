<?php
/**
 * @author Arthur Schiwon <blizzz@owncloud.com>
 * @author Lukas Reschke <lukas@owncloud.com>
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

namespace Test\Group;

use OCP\IGroup;

class MetaDataTest extends \Test\TestCase {
	/** @var \OC\Group\Manager */
	private $groupManager;
	/** @var \OCP\IUserSession */
	private $userSession;
	/** @var \OC\Group\MetaData */
	private $groupMetadata;
	/** @var bool */
	private $isAdmin = true;

	public function setUp(): void {
		parent::setUp();
		$this->groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->userSession = $this->createMock('\OCP\IUserSession');
		$this->groupMetadata = new \OC\Group\MetaData(
			'foo',
			$this->isAdmin,
			$this->groupManager,
			$this->userSession
		);
	}

	public function testGet() {
		$group1 = $this->createMock(IGroup::class);
		$group1->method('getGID')->willReturn('admin');
		$group1->method('getDisplayName')->willReturn('admin group');
		$group1->method('count')->willReturn(2);
		$group2 = $this->createMock(IGroup::class);
		$group2->method('getGID')->willReturn('g2');
		$group2->method('getDisplayName')->willReturn('group 2');
		$group2->method('count')->willReturn(3);
		$group3 = $this->createMock(IGroup::class);
		$group3->method('getGID')->willReturn('g3');
		$group3->method('getDisplayName')->willReturn('group 3');
		$group3->method('count')->willReturn(5);

		$groups = [$group1, $group2, $group3];

		$this->groupManager->expects($this->once())
			->method('search')
			->with('')
			->will($this->returnValue($groups));

		list($adminGroups, $ordinaryGroups) = $this->groupMetadata->get();

		$this->assertCount(1, $adminGroups);
		$this->assertCount(2, $ordinaryGroups);

		$this->assertSame('g2', $ordinaryGroups[0]['id']);
		// user count is not loaded
		$this->assertSame(0, $ordinaryGroups[0]['usercount']);
	}

	public function testGetWithSorting() {
		$group1 = $this->createMock(IGroup::class);
		$group1->method('getGID')->willReturn('admin');
		$group1->method('getDisplayName')->willReturn('admin group');
		$group1->method('count')->willReturn(2);
		$group2 = $this->createMock(IGroup::class);
		$group2->method('getGID')->willReturn('g2');
		$group2->method('getDisplayName')->willReturn('group 2');
		$group2->method('count')->willReturn(3);
		$group3 = $this->createMock(IGroup::class);
		$group3->method('getGID')->willReturn('g3');
		$group3->method('getDisplayName')->willReturn('group 3');
		$group3->method('count')->willReturn(5);

		$groups = [$group1, $group2, $group3];

		$this->groupMetadata->setSorting(1);

		$this->groupManager->expects($this->once())
			->method('search')
			->with('')
			->will($this->returnValue($groups));

		list($adminGroups, $ordinaryGroups) = $this->groupMetadata->get();

		$this->assertCount(1, $adminGroups);
		$this->assertCount(2, $ordinaryGroups);

		$this->assertSame('g3', $ordinaryGroups[0]['id']);
		$this->assertSame(5, $ordinaryGroups[0]['usercount']);
	}

	public function testGetWithCache() {
		$group1 = $this->createMock(IGroup::class);
		$group1->expects($this->exactly(2))->method('getGID')->willReturn('admin');
		$group1->method('getDisplayName')->willReturn('admin group');
		$group1->method('count')->willReturn(2);
		$group2 = $this->createMock(IGroup::class);
		$group2->expects($this->exactly(2))->method('getGID')->willReturn('g2');
		$group2->method('getDisplayName')->willReturn('group 2');
		$group2->method('count')->willReturn(3);
		$group3 = $this->createMock(IGroup::class);
		$group3->expects($this->exactly(2))->method('getGID')->willReturn('g3');
		$group3->method('getDisplayName')->willReturn('group 3');
		$group3->method('count')->willReturn(5);

		$groups = [$group1, $group2, $group3];

		$this->groupManager->expects($this->once())
			->method('search')
			->with('')
			->will($this->returnValue($groups));

		//two calls, if caching fails call counts for group and groupmanager
		//are exceeded
		$this->groupMetadata->get();
		$this->groupMetadata->get();
	}

	//get() does not need to be tested with search parameters, because they are
	//solely and only passed to GroupManager and Group.

	public function testGetGroupsAsAdmin() {
		$this->groupManager
			->expects($this->once())
			->method('search')
			->with('Foo')
			->will($this->returnValue(['DummyValue']));

		$expected = ['DummyValue'];
		$this->assertSame($expected, $this->invokePrivate($this->groupMetadata, 'getGroups', ['Foo']));
	}
}
