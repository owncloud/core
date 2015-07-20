<?php

use OCA\Files_Sharing\API\User;
use OCA\Files_Sharing\Tests\TestCase;

/**
 * Class Test_Files_Sharing_Api
 */
class TestUserListingApi extends TestCase {

	/**
	 * @param string $uid Uid of the mock
	 * @param string $displayName Displayname of the mock
	 * @param bool $called Will this mock be actually called
	 */
	private function mockUser($uid, $displayName, $called) {
		$user = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()
			->getMock();

		if ($called) {
			$user->expects($this->once())
				->method('getUID')
				->willReturn($uid);
			$user->expects($this->once())
				->method('getDisplayName')
				->willReturn($uid);
		} else {
			$user->expects($this->never())->method($this->anything());
		}

		return $user;
	}

	public function testGetUserEmpty() {
		$urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()
			->getMock();

		$userManager = $this->getMockBuilder('\OCP\IUserManager')
			->disableOriginalConstructor()
			->getMock();
		$userManager->expects($this->once())
			->method('searchDisplayName')
			->willReturn([]);

		$userListing = new User($userManager, $urlGenerator);

		$res = $userListing->getUsers([]);
		$this->assertEquals(100, $res->getStatusCode());
		$this->assertArrayHasKey('users', $res->getData());
		$this->assertEmpty($res->getData()['users']);

		$this->assertArrayHasKey('next', $res->getData());
		$this->assertEmpty($res->getData()['next']);
	}

	public function testGetUserDefault() {
		$urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()
			->getMock();

		$userManager = $this->getMockBuilder('\OCP\IUserManager')
			->disableOriginalConstructor()
			->getMock();

		// Mock user list
		$users = array_map(function($i) {
			$uid = 'user' . $i;
			return $this->mockUser($uid, $uid, true);
		}, range(1, 10));

		$userManager->expects($this->once())
			->method('searchDisplayName')
			->willReturn($users);

		$userListing = new User($userManager, $urlGenerator);

		$res = $userListing->getUsers([]);
		$this->assertEquals(100, $res->getStatusCode());
		$this->assertArrayHasKey('users', $res->getData());
		$this->assertCount(10, $res->getData()['users']);

		$this->assertArrayHasKey('next', $res->getData());
		$this->assertEmpty($res->getData()['next']);
	}

	public function testGetUserLimitOffsetSearch() {
		$urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()
			->getMock();
		$urlGenerator->expects($this->once())
			->method('getAbsoluteURL')
			->will($this->returnArgument(0));

		$userManager = $this->getMockBuilder('\OCP\IUserManager')
			->disableOriginalConstructor()
			->getMock();

		// Mock user list
		$users = array_map(function($i) {
			$uid = 'user' . $i;
			return $this->mockUser($uid, $uid, $i <= 2);
		}, range(1, 3));

		$userManager->expects($this->once())
			->method('searchDisplayName')
			->willReturn($users);

		$userListing = new User($userManager, $urlGenerator);

		// Set limit
		$_GET['limit'] = 2;
		$_GET['offset'] = 1;
		$_GET['search'] = 'user';

		$res = $userListing->getUsers([]);
		$this->assertEquals(100, $res->getStatusCode());
		$this->assertArrayHasKey('users', $res->getData());
		$this->assertCount(2, $res->getData()['users']);

		$this->assertArrayHasKey('next', $res->getData());
		$this->assertEquals('ocs/v1.php/apps/files_sharing/api/v1/users?limit=2&offset=3&search=user', $res->getData()['next']);
	}
}
