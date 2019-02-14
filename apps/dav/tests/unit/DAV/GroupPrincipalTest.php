<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OCA\DAV\Tests\unit\DAV;

use OCA\DAV\DAV\GroupPrincipalBackend;
use OCP\IGroupManager;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\DAV\PropPatch;
use OC\Group\Group;

class GroupPrincipalTest extends \Test\TestCase {

	/** @var IGroupManager | PHPUnit\Framework\MockObject\MockObject */
	private $groupManager;

	/** @var GroupPrincipalBackend */
	private $connector;

	public function setUp(): void {
		$this->groupManager = $this->getMockBuilder(IGroupManager::class)
			->disableOriginalConstructor()->getMock();

		$this->connector = new GroupPrincipalBackend($this->groupManager);
		parent::setUp();
	}

	public function testGetPrincipalsByPrefixWithoutPrefix() {
		$response = $this->connector->getPrincipalsByPrefix('');
		$this->assertSame([], $response);
	}

	public function testGetPrincipalsByPrefixWithUsers() {
		$group1 = $this->mockGroup('foo');
		$group2 = $this->mockGroup('bar');
		$this->groupManager
			->expects($this->once())
			->method('search')
			->with('')
			->will($this->returnValue([$group1, $group2]));

		$expectedResponse = [
			0 => [
				'uri' => 'principals/groups/foo',
				'{DAV:}displayname' => 'foo'
			],
			1 => [
				'uri' => 'principals/groups/bar',
				'{DAV:}displayname' => 'bar',
			]
		];
		$response = $this->connector->getPrincipalsByPrefix('principals/groups');
		$this->assertSame($expectedResponse, $response);
	}

	public function testGetPrincipalsByPrefixEmpty() {
		$this->groupManager
			->expects($this->once())
			->method('search')
			->with('')
			->will($this->returnValue([]));

		$response = $this->connector->getPrincipalsByPrefix('principals/groups');
		$this->assertSame([], $response);
	}

	public function testGetPrincipalsByPathWithoutMail() {
		$group1 = $this->mockGroup('foo');
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->will($this->returnValue($group1));

		$expectedResponse = [
			'uri' => 'principals/groups/foo',
			'{DAV:}displayname' => 'foo'
		];
		$response = $this->connector->getPrincipalByPath('principals/groups/foo');
		$this->assertSame($expectedResponse, $response);
	}

	public function testGetPrincipalsByPathWithMail() {
		$fooUser = $this->mockGroup('foo');
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->will($this->returnValue($fooUser));

		$expectedResponse = [
			'uri' => 'principals/groups/foo',
			'{DAV:}displayname' => 'foo',
		];
		$response = $this->connector->getPrincipalByPath('principals/groups/foo');
		$this->assertSame($expectedResponse, $response);
	}

	public function testGetPrincipalsByPathEmpty() {
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->will($this->returnValue(null));

		$response = $this->connector->getPrincipalByPath('principals/groups/foo');
		$this->assertNull($response);
	}

	public function testGetGroupMemberSet() {
		$response = $this->connector->getGroupMemberSet('principals/groups/foo');
		$this->assertSame([], $response);
	}

	public function testGetGroupMembership() {
		$response = $this->connector->getGroupMembership('principals/groups/foo');
		$this->assertSame([], $response);
	}

	/**
	 * @expectedException \Sabre\DAV\Exception
	 * @expectedExceptionMessage Setting members of the group is not supported yet
	 */
	public function testSetGroupMembership() {
		$this->connector->setGroupMemberSet('principals/groups/foo', ['foo']);
	}

	public function testUpdatePrincipal() {
		$this->assertSame(0, $this->connector->updatePrincipal('foo', new PropPatch([])));
	}

	public function testSearchPrincipals() {
		$this->assertSame([], $this->connector->searchPrincipals('principals/groups', []));
	}

	public function testFindByUriWithEmptyUrl() {
		$this->assertEquals('', $this->connector->findByUri('', ''));
	}

	public function testFindByUriWithUnknownGroup() {
		$this->assertEquals('', $this->connector->findByUri('principal:principals/groups/group1', ''));
	}

	public function testFindByUriWithKnownGroup() {
		$group1 = $this->mockGroup('group1');
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('group1')
			->will($this->returnValue($group1));
		$this->assertEquals('principals/groups/group1', $this->connector->findByUri('principal:principals/groups/group1', ''));
	}

	/**
	 * @param $gid
	 * @return PHPUnit\Framework\MockObject\MockObject
	 */
	private function mockGroup($gid) {
		$fooUser = $this->getMockBuilder(Group::class)
			->disableOriginalConstructor()->getMock();
		$fooUser
			->expects($this->exactly(1))
			->method('getGID')
			->will($this->returnValue($gid));
		return $fooUser;
	}
}
