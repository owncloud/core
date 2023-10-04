<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

use OCA\DAV\Connector\Sabre\Principal;
use OCP\IGroupManager;
use OCP\IUserManager;
use Sabre\DAV\Exception;
use Sabre\DAV\PropPatch;
use Test\TestCase;
use OC\User\User;
use OCP\IGroup;

class PrincipalTest extends TestCase {
	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject */
	private $userManager;
	/** @var Principal */
	private $connector;
	/** @var IGroupManager | \PHPUnit\Framework\MockObject\MockObject */
	private $groupManager;

	public function setUp(): void {
		$this->userManager = $this->getMockBuilder(IUserManager::class)
			->disableOriginalConstructor()->getMock();
		$this->groupManager = $this->getMockBuilder(IGroupManager::class)
			->disableOriginalConstructor()->getMock();

		$this->connector = new Principal(
			$this->userManager,
			$this->groupManager
		);
		parent::setUp();
	}

	public function testGetPrincipalsByPrefixWithoutPrefix(): void {
		$response = $this->connector->getPrincipalsByPrefix('');
		$this->assertSame([], $response);
	}

	public function testGetPrincipalsByPrefixWithUsers(): void {
		$fooUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$fooUser
				->expects($this->once())
				->method('getUID')
				->willReturn('foo');
		$fooUser
				->expects($this->once())
				->method('getDisplayName')
				->willReturn('Dr. Foo-Bar');
		$fooUser
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn('');
		$barUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$barUser
			->expects($this->once())
			->method('getUID')
			->willReturn('bar');
		$barUser
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('bar');
		$barUser
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn('bar@owncloud.com');
		$this->userManager
			->expects($this->once())
			->method('search')
			->with('')
			->willReturn([$fooUser, $barUser]);

		$expectedResponse = [
			0 => [
				'uri' => 'principals/users/foo',
				'{DAV:}displayname' => 'Dr. Foo-Bar'
			],
			1 => [
				'uri' => 'principals/users/bar',
				'{DAV:}displayname' => 'bar',
				'{http://sabredav.org/ns}email-address' => 'bar@owncloud.com'
			]
		];
		$response = $this->connector->getPrincipalsByPrefix('principals/users');
		$this->assertSame($expectedResponse, $response);
	}

	public function testGetPrincipalsByPrefixEmpty(): void {
		$this->userManager
			->expects($this->once())
			->method('search')
			->with('')
			->willReturn([]);

		$response = $this->connector->getPrincipalsByPrefix('principals/users');
		$this->assertSame([], $response);
	}

	public function testGetPrincipalsByPathWithoutMail(): void {
		$fooUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$fooUser
			->expects($this->once())
			->method('getUID')
			->willReturn('foo');
		$fooUser
			->expects($this->once())
			->method('getDisplayname')
			->willReturn('foo');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn($fooUser);

		$expectedResponse = [
			'uri' => 'principals/users/foo',
			'{DAV:}displayname' => 'foo'
		];
		$response = $this->connector->getPrincipalByPath('principals/users/foo');
		$this->assertSame($expectedResponse, $response);
	}

	public function testGetPrincipalsByPathWithMail(): void {
		$fooUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$fooUser
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn('foo@owncloud.com');
		$fooUser
			->expects($this->once())
			->method('getUID')
			->willReturn('foo');
		$fooUser
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('foo');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn($fooUser);

		$expectedResponse = [
			'uri' => 'principals/users/foo',
			'{DAV:}displayname' => 'foo',
			'{http://sabredav.org/ns}email-address' => 'foo@owncloud.com'
		];
		$response = $this->connector->getPrincipalByPath('principals/users/foo');
		$this->assertSame($expectedResponse, $response);
	}

	public function testGetPrincipalsByPathEmpty(): void {
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn(null);

		$response = $this->connector->getPrincipalByPath('principals/users/foo');
		$this->assertNull($response);
	}

	public function testGetGroupMemberSet(): void {
		$fooUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$fooUser
			->expects($this->once())
			->method('getUID')
			->willReturn('foo');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn($fooUser);

		$response = $this->connector->getGroupMemberSet('principals/users/foo');
		$this->assertSame(['principals/users/foo'], $response);
	}

	/**
	 */
	public function testGetGroupMemberSetEmpty(): void {
		$this->expectException(Exception::class);
		$this->expectExceptionMessage('Principal not found');

		$this->userManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn(null);

		$this->connector->getGroupMemberSet('principals/users/foo');
	}

	public function testGetGroupMembership(): void {
		$fooUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$group = $this->getMockBuilder(IGroup::class)
			->disableOriginalConstructor()->getMock();
		$group->expects($this->once())
			->method('getGID')
			->willReturn('group1');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn($fooUser);
		$this->groupManager
			->expects($this->once())
			->method('getUserGroups')
			->willReturn([
				$group
			]);

		$expectedResponse = [
			'principals/groups/group1'
		];
		$response = $this->connector->getGroupMembership('principals/users/foo');
		$this->assertSame($expectedResponse, $response);
	}

	public function testGetGroupMembershipEmpty(): void {
		$this->expectException(Exception::class);
		$this->expectExceptionMessage('Principal not found');

		$this->userManager
			->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn(null);

		$this->connector->getGroupMembership('principals/users/foo');
	}

	/**
	 */
	public function testSetGroupMembership(): void {
		$this->expectException(Exception::class);
		$this->expectExceptionMessage('Setting members of the group is not supported yet');

		$this->connector->setGroupMemberSet('principals/users/foo', ['foo']);
	}

	public function testUpdatePrincipal(): void {
		$this->assertSame(0, $this->connector->updatePrincipal('foo', new PropPatch([])));
	}

	public function testSearchPrincipals(): void {
		$this->assertSame([], $this->connector->searchPrincipals('principals/users', []));
	}

	public function testFindByUri(): void {
		$fooUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$fooUser
			->expects($this->once())
			->method('getUID')
			->willReturn('foo');

		$this->userManager->expects($this->once())->method('getByEmail')->willReturn([
			$fooUser
		]);
		$ret = $this->connector->findByUri('mailto:foo@bar.net', 'principals/users');
		$this->assertSame('principals/users/foo', $ret);
	}
}
