<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
use OCA\Files_Sharing\API\Group;
use OCA\Files_Sharing\Tests\TestCase;

/**
 * Class Test_Files_Sharing_Api
 */
class TestGroupListingApi extends TestCase {

	/**
	 * @param string $gid GID of the group
	 * @param bool $called Will this mock be actually called
	 */
	private function mockGroup($gid, $called) {
		$group = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()
			->getMock();

		if ($called) {
			$group->expects($this->once())
				->method('getGID')
				->willReturn($gid);
		} else {
			$group->expects($this->never())->method($this->anything());
		}

		return $group;
	}

	public function testGetGroupEmpty() {
		$urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()
			->getMock();

		$groupManager = $this->getMockBuilder('\OCP\IGroupManager')
			->disableOriginalConstructor()
			->getMock();
		$groupManager->expects($this->once())
			->method('search')
			->willReturn([]);

		$groupListing = new Group($groupManager, $urlGenerator);

		$res = $groupListing->getGroups([]);
		$this->assertEquals(100, $res->getStatusCode());
		$this->assertArrayHasKey('groups', $res->getData());
		$this->assertEmpty($res->getData()['groups']);

		$this->assertArrayHasKey('next', $res->getData());
		$this->assertEmpty($res->getData()['next']);
	}

	public function testGetGroupDefault() {
		$urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()
			->getMock();

		$groupManager = $this->getMockBuilder('\OCP\IGroupManager')
			->disableOriginalConstructor()
			->getMock();

		// Mock group list
		$groups = array_map(function($i) {
			$gid = 'group' . $i;
			return $this->mockGroup($gid, true);
		}, range(1, 10));

		$groupManager->expects($this->once())
			->method('search')
			->willReturn($groups);

		$groupListing = new Group($groupManager, $urlGenerator);

		$res = $groupListing->getGroups([]);
		$this->assertEquals(100, $res->getStatusCode());
		$this->assertArrayHasKey('groups', $res->getData());
		$this->assertCount(10, $res->getData()['groups']);

		$this->assertArrayHasKey('next', $res->getData());
		$this->assertEmpty($res->getData()['next']);
	}

	public function testGetGroupLimitOffsetSearch() {
		$urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()
			->getMock();
		$urlGenerator->expects($this->once())
			->method('getAbsoluteURL')
			->will($this->returnArgument(0));

		$groupManager = $this->getMockBuilder('\OCP\IGroupManager')
			->disableOriginalConstructor()
			->getMock();

		// Mock group list
		$groups = array_map(function($i) {
			$uid = 'group' . $i;
			return $this->mockGroup($uid, $i <= 2);
		}, range(1, 3));

		$groupManager->expects($this->once())
			->method('search')
			->willReturn($groups);

		$groupListing = new Group($groupManager, $urlGenerator);

		// Set limit
		$_GET['limit'] = 2;
		$_GET['offset'] = 1;
		$_GET['search'] = 'group';

		$res = $groupListing->getGroups([]);
		$this->assertEquals(100, $res->getStatusCode());
		$this->assertArrayHasKey('groups', $res->getData());
		$this->assertCount(2, $res->getData()['groups']);

		$this->assertArrayHasKey('next', $res->getData());
		$this->assertEquals('ocs/v1.php/apps/files_sharing/api/v1/groups?limit=2&offset=3&search=group', $res->getData()['next']);
	}
}
