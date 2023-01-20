<?php
/**
 * @author Lukas Reschke
 * @copyright Copyright (c) 2014-2015 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Controller;

use Exception;
use OC;
use OC\Settings\Application;
use OC\Settings\Controller\UsersController;
use OC\User\Database;
use OC\User\Session;
use OC\User\User;
use OC_Defaults;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\IAppContainer;
use OCP\Files\NotFoundException;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\IGroupManager;
use OCP\IGroup;
use OCP\IConfig;
use OCP\Security\ISecureRandom;
use OCP\IL10N;
use OCP\ILogger;
use OCP\Mail\IMailer;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IURLGenerator;
use OCP\App\IAppManager;
use OCP\IAvatarManager;
use OC\SubAdmin;
use OC\Mail\Message;
use OCP\IUser;
use OC\Group\Manager;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Test\TestCase;
use Test\Traits\UserTrait;
use function vsprintf;
use OCP\IAvatar;
use OC\Group\Group;

/**
 * @group DB
 *
 * @package Tests\Settings\Controller
 */
class UsersControllerTest extends TestCase {
	/** @var (IUser & MockObject) */
	public $existingUser;
	use UserTrait;

	/** @var IAppContainer */
	private $container;

	protected function setUp(): void {
		$app = new Application();
		$this->container = $app->getContainer();
		$this->container['AppName'] = 'settings';
		$this->container['GroupManager'] = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserManager'] = $this->getMockBuilder(IUserManager::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession'] = $this->getMockBuilder(Session::class)
			->disableOriginalConstructor()->getMock();
		$this->container['L10N'] = $this->getMockBuilder(IL10N::class)
			->disableOriginalConstructor()->getMock();
		$this->container['Config'] = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()->getMock();
		$this->container['L10N']
			->method('t')
			->willReturnCallback(function ($text, $parameters = []) {
				return vsprintf($text, $parameters);
			});
		$this->container['Defaults'] = $this->getMockBuilder(OC_Defaults::class)
			->disableOriginalConstructor()->getMock();
		$this->container['Mailer'] = $this->getMockBuilder(IMailer::class)
			->disableOriginalConstructor()->getMock();
		$this->container['DefaultMailAddress'] = 'no-reply@owncloud.com';
		$this->container['Logger'] = $this->getMockBuilder(ILogger::class)
			->disableOriginalConstructor()->getMock();
		$this->container['URLGenerator'] = $this->getMockBuilder(IURLGenerator::class)
			->disableOriginalConstructor()->getMock();
		$this->container['OCP\\App\\IAppManager'] = $this->getMockBuilder(IAppManager::class)
			->disableOriginalConstructor()->getMock();
		$this->container['SecureRandom'] = $this->getMockBuilder(ISecureRandom::class)
			->disableOriginalConstructor()->getMock();
		$this->container['TimeFactory'] = $this->getMockBuilder(ITimeFactory::class)
			->disableOriginalConstructor()->getMock();
		$this->existingUser = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()->getMock();
		$this->container['Mailer'] = $this->getMockBuilder(IMailer::class)
			->disableOriginalConstructor()->getMock();
		$this->container['EventDispatcher'] = $this->createMock(EventDispatcher::class);

		/*
		 * Set default avtar behaviour for whole testsuite
		 */
		$this->container['OCP\\IAvatarManager'] = $this->createMock(IAvatarManager::class);

		$avatarExists = $this->createMock(IAvatar::class);
		$avatarExists->method('exists')->willReturn(true);
		$avatarNotExists = $this->createMock(IAvatar::class);
		$avatarNotExists->method('exists')->willReturn(false);
		$this->container['OCP\\IAvatarManager']
			->method('getAvatar')
			->willReturnMap([
				['foo', $avatarExists],
				['bar', $avatarExists],
				['admin', $avatarNotExists],
				['foobazz', $avatarExists]
			]);

		$this->container['Config']
			->method('getSystemValue')
			->with('enable_avatars', true)
			->willReturn(true);
	}

	public function testIndexAdmin(): void {
		$this->container['IsAdmin'] = true;

		$foo = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$foo
			->method('getUID')
			->willReturn('foo');
		$foo
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('M. Foo');
		$foo
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('foo@bar.com');
		$foo
			->expects($this->once())
			->method('isEnabled')
			->willReturn(true);
		$foo
			->expects($this->once())
			->method('getQuota')
			->willReturn('1024');
		$foo
			->method('getLastLogin')
			->willReturn(500);
		$foo
			->method('getHome')
			->willReturn('/home/foo');
		$foo
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('OC_User_Database');
		$admin = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$admin
			->method('getUID')
			->willReturn('admin');
		$admin
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('S. Admin');
		$admin
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('admin@bar.com');
		$admin
			->expects($this->once())
			->method('isEnabled')
			->willReturn(true);
		$admin
			->expects($this->once())
			->method('getQuota')
			->willReturn('404');
		$admin
			->expects($this->once())
			->method('getLastLogin')
			->willReturn(12);
		$admin
			->expects($this->once())
			->method('getHome')
			->willReturn('/home/admin');
		$admin
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('\Test\Util\User\Dummy');
		$bar = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$bar
			->method('getUID')
			->willReturn('bar');
		$bar
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('B. Ar');
		$bar
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('bar@dummy.com');
		$bar
			->expects($this->once())
			->method('isEnabled')
			->willReturn(false);
		$bar
			->expects($this->once())
			->method('getQuota')
			->willReturn('2323');
		$bar
			->method('getLastLogin')
			->willReturn(3999);
		$bar
			->method('getHome')
			->willReturn('/home/bar');
		$bar
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('\Test\Util\User\Dummy');

		$group1 = $this->createMock(IGroup::class);
		$group1->method('getGID')->willReturn('abc-cde-123-456');
		$group1->method('getDisplayName')->willReturn('Users');
		$group2 = $this->createMock(IGroup::class);
		$group2->method('getGID')->willReturn('aaa-ddd-123-456');
		$group2->method('getDisplayName')->willReturn('Support');
		$group3 = $this->createMock(IGroup::class);
		$group3->method('getGID')->willReturn('000-eee-000-eee');
		$group3->method('getDisplayName')->willReturn('admins');
		$group4 = $this->createMock(IGroup::class);
		$group4->method('getGID')->willReturn('eee-eee-000-eee');
		$group4->method('getDisplayName')->willReturn('External Users');

		$this->container['GroupManager']
			->expects($this->once())
			->method('displayNamesInGroup')
			->with('gid', 'pattern')
			->willReturn(['foo' => 'M. Foo', 'admin' => 'S. Admin', 'bar' => 'B. Ar']);
		$this->container['GroupManager']
			->expects($this->exactly(3))
			->method('getUserGroups')
			->will($this->onConsecutiveCalls([$group1, $group2], [$group3, $group2], [$group4]));

		$this->container['UserManager']
			->method('get')
			->withConsecutive(
				['foo'],
				['admin'],
				['bar'],
			)
			->willReturnOnConsecutiveCalls(
				$this->returnValue($foo),
				$this->returnValue($admin),
				$this->returnValue($bar),
			);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->method('getSubAdminsGroups')
			->with($foo)
			->willReturn([]);
		$subadmin
			->method('getSubAdminsGroups')
			->with($admin)
			->willReturn([]);
		$subadmin
			->method('getSubAdminsGroups')
			->with($bar)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				0 => [
					'name' => 'foo',
					'displayname' => 'M. Foo',
					'groups' => [
						'abc-cde-123-456' => [
							'id' => 'abc-cde-123-456',
							'name' => 'Users',
						],
						'aaa-ddd-123-456' => [
							'id' => 'aaa-ddd-123-456',
							'name' => 'Support',
						],
					],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 1024,
					'storageLocation' => '/home/foo',
					'lastLogin' => 500000,
					'backend' => 'OC_User_Database',
					'email' => 'foo@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
					'isGuest' => false,
					'creationTime' => 0,
				],
				1 => [
					'name' => 'admin',
					'displayname' => 'S. Admin',
					'groups' => [
						'000-eee-000-eee' => [
							'id' => '000-eee-000-eee',
							'name' => 'admins',
						],
						'aaa-ddd-123-456' => [
							'id' => 'aaa-ddd-123-456',
							'name' => 'Support',
						],
					],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 404,
					'storageLocation' => '/home/admin',
					'lastLogin' => 12000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'admin@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => false,
					'isGuest' => false,
					'creationTime' => 0,
				],
				2 => [
					'name' => 'bar',
					'displayname' => 'B. Ar',
					'groups' => [
						'eee-eee-000-eee' => [
							'id' => 'eee-eee-000-eee',
							'name' => 'External Users',
						],
					],
					'subadmin' => [],
					'isEnabled' => false,
					'quota' => 2323,
					'storageLocation' => '/home/bar',
					'lastLogin' => 3999000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'bar@dummy.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
					'isGuest' => false,
					'creationTime' => 0,
				],
			]
		);
		$response = $this->container['UsersController']->index(0, 10, 'gid', 'pattern');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testIndexSubAdmin(): void {
		$this->container['IsAdmin'] = false;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($user);

		$foo = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$foo
			->method('getUID')
			->willReturn('foo');
		$foo
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('M. Foo');
		$foo
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('foo@bar.com');
		$foo
			->expects($this->once())
			->method('isEnabled')
			->willReturn(true);
		$foo
			->expects($this->once())
			->method('getQuota')
			->willReturn('1024');
		$foo
			->method('getLastLogin')
			->willReturn(500);
		$foo
			->method('getHome')
			->willReturn('/home/foo');
		$foo
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('OC_User_Database');
		$admin = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$admin
			->method('getUID')
			->willReturn('admin');
		$admin
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('S. Admin');
		$admin
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('admin@bar.com');
		$admin
			->expects($this->once())
			->method('isEnabled')
			->willReturn(true);
		$admin
			->expects($this->once())
			->method('getQuota')
			->willReturn('404');
		$admin
			->expects($this->once())
			->method('getLastLogin')
			->willReturn(12);
		$admin
			->expects($this->once())
			->method('getHome')
			->willReturn('/home/admin');
		$admin
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('\Test\Util\User\Dummy');
		$bar = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$bar
			->method('getUID')
			->willReturn('bar');
		$bar
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('B. Ar');
		$bar
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('bar@dummy.com');
		$bar
			->expects($this->once())
			->method('isEnabled')
			->willReturn(false);
		$bar
			->expects($this->once())
			->method('getQuota')
			->willReturn('2323');
		$bar
			->method('getLastLogin')
			->willReturn(3999);
		$bar
			->method('getHome')
			->willReturn('/home/bar');
		$bar
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('\Test\Util\User\Dummy');

		$this->container['GroupManager']
			->expects($this->exactly(2))
			->method('displayNamesInGroup')
			->withConsecutive(['abc-cde-123-456', 'pattern'], ['aaa-ddd-123-456', 'pattern'])
			->willReturnOnConsecutiveCalls(
				['bar' => 'B. Ar'],
				['foo' => 'M. Foo', 'admin' => 'S. Admin'],
			);

		$group1 = $this->createMock(IGroup::class);
		$group1->method('getGID')->willReturn('abc-cde-123-456');
		$group1->method('getDisplayName')->willReturn('SubGroup1');
		$group2 = $this->createMock(IGroup::class);
		$group2->method('getGID')->willReturn('aaa-ddd-123-456');
		$group2->method('getDisplayName')->willReturn('SubGroup2');
		$group3 = $this->createMock(IGroup::class);
		$group3->method('getGID')->willReturn('000-eee-000-eee');
		$group3->method('getDisplayName')->willReturn('admin');
		$group4 = $this->createMock(IGroup::class);
		$group4->method('getGID')->willReturn('ecd-dce-553-787');
		$group4->method('getDisplayName')->willReturn('Foo');
		$group5 = $this->createMock(IGroup::class);
		$group5->method('getGID')->willReturn('ecd-dce-909-101');
		$group5->method('getDisplayName')->willReturn('testGroup');

		$this->container['GroupManager']
			->expects($this->exactly(3))
			->method('getUserGroups')
			->will($this->onConsecutiveCalls(
				[$group3, $group1, $group5],
				[$group2, $group1],
				[$group2, $group4]
			));
		$this->container['UserManager']
			->expects($this->exactly(3))
			->method('get')
			->withConsecutive(
				['bar'],
				['foo'],
				['admin'],
			)
			->willReturnOnConsecutiveCalls(
				$bar,
				$foo,
				$admin,
			);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->exactly(4))
			->method('getSubAdminsGroups')
			->willReturnOnConsecutiveCalls(
				[$group1, $group2],
				[],
				[],
				[],
			);

		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				0 => [
					'name' => 'bar',
					'displayname' => 'B. Ar',
					'groups' => [
						'abc-cde-123-456' => [
							'id' => 'abc-cde-123-456',
							'name' => 'SubGroup1',
						],
					],
					'subadmin' => [],
					'isEnabled' => false,
					'quota' => 2323,
					'storageLocation' => '/home/bar',
					'lastLogin' => 3999000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'bar@dummy.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
					'isGuest' => false,
					'creationTime' => 0,
				],
				1=> [
					'name' => 'foo',
					'displayname' => 'M. Foo',
					'groups' => [
						'aaa-ddd-123-456' => [
							'id' => 'aaa-ddd-123-456',
							'name' => 'SubGroup2',
						],
						'abc-cde-123-456' => [
							'id' => 'abc-cde-123-456',
							'name' => 'SubGroup1',
						],
					],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 1024,
					'storageLocation' => '/home/foo',
					'lastLogin' => 500000,
					'backend' => 'OC_User_Database',
					'email' => 'foo@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
					'isGuest' => false,
					'creationTime' => 0,
				],
				2 => [
					'name' => 'admin',
					'displayname' => 'S. Admin',
					'groups' => [
						'aaa-ddd-123-456' => [
							'id' => 'aaa-ddd-123-456',
							'name' => 'SubGroup2',
						],
					],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 404,
					'storageLocation' => '/home/admin',
					'lastLogin' => 12000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'admin@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => false,
					'isGuest' => false,
					'creationTime' => 0,
				],
			]
		);

		$response = $this->container['UsersController']->index(0, 10, '', 'pattern');
		$this->assertEquals($expectedResponse, $response);
	}

	/**
	 * TODO: Since the function uses the static OC_Subadmin class it can't be mocked
	 * to test for subadmins. Thus the test always assumes you have admin permissions...
	 */
	public function testIndexWithSearch(): void {
		$this->container['IsAdmin'] = true;
		$this->container['Config']->method('getUserValue')->willReturn(false, false, true);

		$foo = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$foo
			->method('getUID')
			->willReturn('foo');
		$foo
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('M. Foo');
		$foo
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('foo@bar.com');
		$foo
			->expects($this->once())
			->method('isEnabled')
			->willReturn(true);
		$foo
			->expects($this->once())
			->method('getQuota')
			->willReturn('1024');
		$foo
			->method('getLastLogin')
			->willReturn(500);
		$foo
			->method('getHome')
			->willReturn('/home/foo');
		$foo
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('OC_User_Database');
		$admin = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$admin
			->method('getUID')
			->willReturn('admin');
		$admin
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('S. Admin');
		$admin
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('admin@bar.com');
		$admin
			->expects($this->once())
			->method('isEnabled')
			->willReturn(true);
		$admin
			->expects($this->once())
			->method('getQuota')
			->willReturn('404');
		$admin
			->expects($this->once())
			->method('getLastLogin')
			->willReturn(12);
		$admin
			->expects($this->once())
			->method('getHome')
			->willReturn('/home/admin');
		$admin
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('\Test\Util\User\Dummy');
		$bar = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$bar
			->method('getUID')
			->willReturn('bar');
		$bar
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('B. Ar');
		$bar
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('bar@dummy.com');
		$bar
			->expects($this->once())
			->method('isEnabled')
			->willReturn(false);
		$bar
			->expects($this->once())
			->method('getQuota')
			->willReturn('2323');
		$bar
			->method('getLastLogin')
			->willReturn(3999);
		$bar
			->method('getHome')
			->willReturn('/home/bar');
		$bar
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('\Test\Util\User\Dummy');

		$this->container['UserManager']
			->expects($this->once())
			->method('find')
			->with('pattern', 10, 0)
			->willReturn([$foo, $admin, $bar]);

		$group1 = $this->createMock(IGroup::class);
		$group1->method('getGID')->willReturn('abc-cde-123-456');
		$group1->method('getDisplayName')->willReturn('Users');
		$group2 = $this->createMock(IGroup::class);
		$group2->method('getGID')->willReturn('aaa-ddd-123-456');
		$group2->method('getDisplayName')->willReturn('Support');
		$group3 = $this->createMock(IGroup::class);
		$group3->method('getGID')->willReturn('000-eee-000-eee');
		$group3->method('getDisplayName')->willReturn('admins');
		$group4 = $this->createMock(IGroup::class);
		$group4->method('getGID')->willReturn('eee-eee-000-eee');
		$group4->method('getDisplayName')->willReturn('External Users');

		$this->container['GroupManager']
			->expects($this->exactly(3))
			->method('getUserGroups')
			->will($this->onConsecutiveCalls([$group1, $group2], [$group3, $group2], [$group4]));

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->method('getSubAdminsGroups')
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				0 => [
					'name' => 'foo',
					'displayname' => 'M. Foo',
					'groups' => [
						'abc-cde-123-456' => [
							'id' => 'abc-cde-123-456',
							'name' => 'Users',
						],
						'aaa-ddd-123-456' => [
							'id' => 'aaa-ddd-123-456',
							'name' => 'Support',
						],
					],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 1024,
					'storageLocation' => '/home/foo',
					'lastLogin' => 500000,
					'backend' => 'OC_User_Database',
					'email' => 'foo@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
					'isGuest' => false,
					'creationTime' => 0,
				],
				1 => [
					'name' => 'admin',
					'displayname' => 'S. Admin',
					'groups' => [
						'000-eee-000-eee' => [
							'id' => '000-eee-000-eee',
							'name' => 'admins',
						],
						'aaa-ddd-123-456' => [
							'id' => 'aaa-ddd-123-456',
							'name' => 'Support',
						],
					],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 404,
					'storageLocation' => '/home/admin',
					'lastLogin' => 12000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'admin@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => false,
					'isGuest' => false,
					'creationTime' => 0,
				],
				2 => [
					'name' => 'bar',
					'displayname' => 'B. Ar',
					'groups' => [
						'eee-eee-000-eee' => [
							'id' => 'eee-eee-000-eee',
							'name' => 'External Users',
						],
					],
					'subadmin' => [],
					'isEnabled' => false,
					'quota' => 2323,
					'storageLocation' => '/home/bar',
					'lastLogin' => 3999000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'bar@dummy.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
					'isGuest' => true,
					'creationTime' => 0,
				],
			]
		);
		$response = $this->container['UsersController']->index(0, 10, '', 'pattern');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testIndexWithBackend(): void {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->method('getUID')
			->willReturn('foo');
		$user
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('M. Foo');
		$user
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn(null);
		$user
			->expects($this->once())
			->method('isEnabled')
			->willReturn(true);
		$user
			->expects($this->once())
			->method('getQuota')
			->willReturn('none');
		$user
			->method('getLastLogin')
			->willReturn(500);
		$user
			->method('getHome')
			->willReturn('/home/foo');
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('OC_User_Database');
		$this->container['UserManager']
			->expects($this->once())
			->method('getBackends')
			->willReturn([new Database()]);
		$this->container['UserManager']
			->expects($this->once())
			->method('clearBackends');
		$this->container['UserManager']
			->expects($this->once())
			->method('find')
			->with('')
			->willReturn([$user]);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroups')
			->willReturn([]);

		$expectedResponse = new DataResponse(
			[
				0 => [
					'name' => 'foo',
					'displayname' => 'M. Foo',
					'groups' => [],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 'none',
					'storageLocation' => '/home/foo',
					'lastLogin' => 500000,
					'backend' => 'OC_User_Database',
					'email' => null,
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
					'isGuest' => false,
					'creationTime' => 0,
				]
			]
		);
		$response = $this->container['UsersController']->index(0, 10, '', '', '\Test\Util\User\Dummy');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testIndexWithBackendNoUser(): void {
		$this->container['IsAdmin'] = true;

		$this->container['UserManager']
			->expects($this->once())
			->method('getBackends')
			->willReturn([new Database()]);
		$this->container['UserManager']
			->expects($this->once())
			->method('find')
			->with('')
			->willReturn([]);

		$expectedResponse = new DataResponse([]);
		$response = $this->container['UsersController']->index(0, 10, '', '', '\Test\Util\User\Dummy');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithoutGroupAdmin(): void {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->method('getHome')
			->willReturn('/home/user');
		$user
			->method('getUID')
			->willReturn('foo');
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('bar');

		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->will($this->onConsecutiveCalls($user));

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroups')
			->willReturn([]);

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'groups' => [],
				'storageLocation' => '/home/user',
				'backend' => 'bar',
				'lastLogin' => null,
				'displayname' => null,
				'isEnabled' => null,
				'quota' => null,
				'subadmin' => [],
				'email' => null,
				'isRestoreDisabled' => false,
				'isAvatarAvailable' => true,
				'isGuest' => false,
				'creationTime' => 0,
			],
			Http::STATUS_CREATED
		);
		$response = $this->container['UsersController']->create('foo', 'password', []);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithoutGroupSubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($user);

		$newUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$newUser
			->method('getUID')
			->willReturn('foo');
		$newUser
			->method('getHome')
			->willReturn('/home/user');
		$newUser
			->method('getHome')
			->willReturn('/home/user');
		$newUser
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('bar');
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();

		$group1 = $this->createMock(IGroup::class);
		$group1->method('getGID')->willReturn('abc-cde-123-456');
		$group1->method('getDisplayName')->willReturn('SubGroup1');
		$group1->expects($this->once())
			->method('addUser')
			->with($newUser);
		$group2 = $this->createMock(IGroup::class);
		$group2->method('getGID')->willReturn('aaa-ddd-123-456');
		$group2->method('getDisplayName')->willReturn('SubGroup2');
		$group2->expects($this->once())
			->method('addUser')
			->with($newUser);

		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->willReturn($newUser);
		$this->container['GroupManager']
			->expects($this->exactly(2))
			->method('get')
			->will($this->onConsecutiveCalls($group1, $group2));
		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroups')
			->with($user)
			->will($this->onConsecutiveCalls([$group1, $group2]));

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->exactly(2))
			->method('getSubAdminsGroups')
			->willReturnOnConsecutiveCalls(
				[$group1, $group2],
				[],
			);

		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'groups' => [
					'abc-cde-123-456' => [
						'id' => 'abc-cde-123-456',
						'name' => 'SubGroup1',
					],
					'aaa-ddd-123-456' => [
						'id' => 'aaa-ddd-123-456',
						'name' => 'SubGroup2',
					],
				],
				'storageLocation' => '/home/user',
				'backend' => 'bar',
				'lastLogin' => 0,
				'displayname' => null,
				'isEnabled' => null,
				'quota' => null,
				'subadmin' => [],
				'email' => null,
				'isRestoreDisabled' => false,
				'isAvatarAvailable' => true,
				'isGuest' => false,
				'creationTime' => 0,
			],
			Http::STATUS_CREATED
		);
		$response = $this->container['UsersController']->create('foo', 'password');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithGroupAdmin(): void {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->method('getHome')
			->willReturn('/home/user');
		$user
			->method('getHome')
			->willReturn('/home/user');
		$user
			->method('getUID')
			->willReturn('foo');
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('bar');
		$existingGroup = $this->createMock(IGroup::class);
		$existingGroup->method('getGID')->willReturn('eac-aaa-645-223');
		$existingGroup->method('getDisplayName')->willReturn('ExistingGroup');
		$existingGroup
			->expects($this->once())
			->method('addUser')
			->with($user);
		$newGroup = $this->createMock(IGroup::class);
		$newGroup->method('getGID')->willReturn('bbb-aaa-111-222');
		$newGroup->method('getDisplayName')->willReturn('NewGroup');
		$newGroup
			->expects($this->once())
			->method('addUser')
			->with($user);

		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->will($this->onConsecutiveCalls($user));
		$this->container['GroupManager']
			->expects($this->exactly(2))
			->method('get')
			->will($this->onConsecutiveCalls(null, $existingGroup));
		$this->container['GroupManager']
			->expects($this->once())
			->method('createGroup')
			->with('NewGroup')
			->will($this->onConsecutiveCalls($newGroup));
		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroups')
			->with($user)
			->will($this->onConsecutiveCalls([$newGroup, $existingGroup]));

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'groups' => [
					'bbb-aaa-111-222' => [
						'id' => 'bbb-aaa-111-222',
						'name' => 'NewGroup',
					],
					'eac-aaa-645-223' => [
						'id' => 'eac-aaa-645-223',
						'name' => 'ExistingGroup',
					],
				],
				'storageLocation' => '/home/user',
				'backend' => 'bar',
				'lastLogin' => null,
				'displayname' => null,
				'isEnabled' => null,
				'quota' => null,
				'subadmin' => [],
				'email' => null,
				'isRestoreDisabled' => false,
				'isAvatarAvailable' => true,
				'isGuest' => false,
				'creationTime' => 0,
			],
			Http::STATUS_CREATED
		);
		$response = $this->container['UsersController']->create('foo', 'password', ['NewGroup', 'ExistingGroup']);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithGroupSubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$newUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$newUser
			->method('getHome')
			->willReturn('/home/user');
		$newUser
			->method('getHome')
			->willReturn('/home/user');
		$newUser
			->method('getUID')
			->willReturn('foo');
		$newUser
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('bar');
		$subGroup1 = $this->createMock(IGroup::class);
		$subGroup1->method('getGID')->willReturn('def-abc-748-992');
		$subGroup1->method('getDisplayName')->willReturn('SubGroup1');
		$subGroup1
			->expects($this->once())
			->method('addUser')
			->with($user);
		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->willReturn($newUser);
		$this->container['GroupManager']
			->expects($this->exactly(3))
			->method('get')
			->withConsecutive(
				['def-abc-748-992'],
				['ExistingGroup'],
				['def-abc-748-992'],
			)
			->willReturnOnConsecutiveCalls(
				$subGroup1,
				null,
				$subGroup1,
			);

		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroups')
			->with($user)
			->will($this->onConsecutiveCalls([$subGroup1]));
		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroups')
			->with($newUser)
			->will($this->onConsecutiveCalls([$subGroup1]));

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->exactly(2))
			->method('getSubAdminsGroups')
			->withConsecutive([$user], [$newUser])
			->willReturnOnConsecutiveCalls(
				[$subGroup1],
				[],
			);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'groups' => [
					'def-abc-748-992' => [
						'id' => 'def-abc-748-992',
						'name' => 'SubGroup1',
					],
				],
				'storageLocation' => '/home/user',
				'backend' => 'bar',
				'lastLogin' => 0,
				'displayname' => null,
				'isEnabled' => null,
				'quota' => null,
				'subadmin' => [],
				'email' => null,
				'isRestoreDisabled' => false,
				'isAvatarAvailable' => true,
				'isGuest' => false,
				'creationTime' => 0,
			],
			Http::STATUS_CREATED
		);
		$response = $this->container['UsersController']->create('foo', 'password', ['def-abc-748-992', 'ExistingGroup']);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateUnsuccessfulAdmin(): void {
		$this->container['IsAdmin'] = true;

		$this->container['UserManager']
			->method('createUser')
			->will($this->throwException(new Exception()));

		$expectedResponse = new DataResponse(
			[
				'message' => 'Unable to create user.'
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->create('foo', 'password', []);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateUnsuccessfulSubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->method('getUID')
			->willReturn('username');
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($user);

		$this->container['UserManager']
			->method('createUser')
			->will($this->throwException(new Exception()));

		$subgroup1 = $this->getMockBuilder(IGroup::class)
			->disableOriginalConstructor()
			->getMock();
		$subgroup1->expects($this->once())
			->method('getGID')
			->willReturn('SubGroup1');
		$subgroup2 = $this->getMockBuilder(IGroup::class)
			->disableOriginalConstructor()
			->getMock();
		$subgroup2->expects($this->once())
			->method('getGID')
			->willReturn('SubGroup2');
		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([$subgroup1, $subgroup2]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				'message' => 'Unable to create user.'
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->create('foo', 'password', []);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroySelfAdmin(): void {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Unable to delete user.'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->destroy('myself');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroySelfSubadmin(): void {
		$this->container['IsAdmin'] = false;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Unable to delete user.'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->destroy('myself');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroyAdmin(): void {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('Admin');
		$toDeleteUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$toDeleteUser
			->expects($this->once())
			->method('delete')
			->willReturn(true);
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->willReturn($toDeleteUser);

		$expectedResponse = new DataResponse(
			[
				'status' => 'success',
				'data' => [
					'username' => 'UserToDelete'
				]
			],
			Http::STATUS_NO_CONTENT
		);
		$response = $this->container['UsersController']->destroy('UserToDelete');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroySubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$toDeleteUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$toDeleteUser
			->expects($this->once())
			->method('delete')
			->willReturn(true);
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->willReturn($toDeleteUser);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDeleteUser)
			->willReturn(true);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				'status' => 'success',
				'data' => [
					'username' => 'UserToDelete'
				]
			],
			Http::STATUS_NO_CONTENT
		);
		$response = $this->container['UsersController']->destroy('UserToDelete');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroyUnsuccessfulAdmin(): void {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('Admin');
		$toDeleteUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$toDeleteUser
			->expects($this->once())
			->method('delete')
			->willReturn(false);
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->willReturn($toDeleteUser);

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Unable to delete user.'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->destroy('UserToDelete');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroyUnsuccessfulSubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);

		$toDeleteUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$toDeleteUser
			->expects($this->once())
			->method('delete')
			->willReturn(false);
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->willReturn($toDeleteUser);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDeleteUser)
			->willReturn(true);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Unable to delete user.'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->destroy('UserToDelete');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroyNotAccessibleToSubAdmin(): void {
		$this->container['IsAdmin'] = false;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);

		$toDeleteUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->willReturn($toDeleteUser);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDeleteUser)
			->willReturn(false);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Authentication error'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->destroy('UserToDelete');
		$this->assertEquals($expectedResponse, $response);
	}

	/**
	 * test if an invalid mail result in a failure response
	 */
	public function testCreateUnsuccessfulWithInvalidEmailAdmin(): void {
		$this->container['IsAdmin'] = true;

		$expectedResponse = new DataResponse(
			[
				'message' => 'Invalid mail address',
			],
			Http::STATUS_UNPROCESSABLE_ENTITY
		);
		$response = $this->container['UsersController']->create('foo', 'password', [], 'invalidMailAddress');
		$this->assertEquals($expectedResponse, $response);
	}

	/**
	 * test if a valid mail result in a successful mail send
	 */
	public function testCreateSuccessfulWithValidEmailAdmin(): void {
		$this->container['IsAdmin'] = true;
		$message = $this->getMockBuilder(Message::class)
			->disableOriginalConstructor()->getMock();
		$message
			->expects($this->once())
			->method('setTo')
			->with(['validMail@Adre.ss' => 'foo']);
		$message
			->expects($this->once())
			->method('setSubject')
			->with('Your  account was created');
		$htmlBody = new Http\TemplateResponse(
			'settings',
			'email.new_user',
			[
				'username' => 'foo',
				'url' => '',
			],
			'blank'
		);
		$message
			->expects($this->once())
			->method('setHtmlBody')
			->with($htmlBody->render());
		$plainBody = new Http\TemplateResponse(
			'settings',
			'email.new_user_plain_text',
			[
				'username' => 'foo',
				'url' => '',
			],
			'blank'
		);
		$message
			->expects($this->once())
			->method('setPlainBody')
			->with($plainBody->render());
		$message
			->expects($this->once())
			->method('setFrom')
			->with(['no-reply@owncloud.com' => null]);

		$this->container['Mailer']
			->expects($this->once())
			->method('validateMailAddress')
			->with('validMail@Adre.ss')
			->willReturn(true);
		$this->container['Mailer']
			->expects($this->once())
			->method('createMessage')
			->willReturn($message);
		$this->container['Mailer']
			->expects($this->once())
			->method('send')
			->with($message);

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->method('getHome')
			->willReturn('/home/user');
		$user
			->method('getHome')
			->willReturn('/home/user');
		$user
			->method('getUID')
			->willReturn('foo');
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn('bar');

		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->will($this->onConsecutiveCalls($user));
		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']->method('getUserGroups')->willReturn([]);

		$response = $this->container['UsersController']->create('foo', 'password', [], 'validMail@Adre.ss');
		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
	}

	private function mockUser(
		$userId = 'foo',
		$displayName = 'M. Foo',
		$isEnabled = true,
		$lastLogin = 500,
		$home = '/home/foo',
		$backend = 'OC_User_Database'
	): array {
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->method('getUID')
			->willReturn($userId);
		$user
			->expects($this->once())
			->method('getDisplayName')
			->willReturn($displayName);
		$user
			->method('isEnabled')
			->willReturn($isEnabled);
		$user
			->method('getLastLogin')
			->willReturn($lastLogin);
		$user
			->method('getHome')
			->willReturn($home);
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->willReturn($backend);

		$result = [
			'name' => $userId,
			'displayname' => $displayName,
			'groups' => [],
			'subadmin' => [],
			'isEnabled' => $isEnabled,
			'quota' => null,
			'storageLocation' => $home,
			'lastLogin' => $lastLogin * 1000,
			'backend' => $backend,
			'email' => null,
			'isRestoreDisabled' => false,
			'isAvatarAvailable' => true,
			'creationTime' => 0,
		];

		return [$user, $result];
	}

	public function testRestorePossibleWithoutEncryption(): void {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();
		$expectedResult['isGuest'] = false;

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']->method('getUserGroups')->willReturn([]);

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function testRestorePossibleWithAdminAndUserRestore(): void {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();
		$expectedResult['isGuest'] = false;

		$this->container['OCP\\App\\IAppManager']
			->expects($this->once())
			->method('isEnabledForUser')
			->with(
				$this->equalTo('encryption')
			)
			->willReturn(true);
		$this->container['Config']
			->expects($this->once())
			->method('getAppValue')
			->with(
				$this->equalTo('encryption'),
				$this->equalTo('recoveryAdminEnabled'),
				$this->anything()
			)
			->willReturn('1');

		$this->container['Config']
			->method('getUserValue')
			->withConsecutive(
				[
					$this->anything(),
					$this->equalTo('encryption'),
					$this->equalTo('recoveryEnabled'),
					$this->anything()
				],
				[
					$this->anything(),
					$this->anything(),
					$this->anything(),
					$this->anything(),
				]
			)
			->willReturn('1', false);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']->method('getUserGroups')->willReturn([]);

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function testRestoreNotPossibleWithoutAdminRestore(): void {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();
		$expectedResult['isGuest'] = false;

		$this->container['OCP\\App\\IAppManager']
			->method('isEnabledForUser')
			->with(
				$this->equalTo('encryption')
			)
			->willReturn(true);

		$expectedResult['isRestoreDisabled'] = false;

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']->method('getUserGroups')->willReturn([]);

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function testRestoreNotPossibleWithoutUserRestore(): void {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();
		$expectedResult['isGuest'] = false;

		$this->container['OCP\\App\\IAppManager']
			->expects($this->once())
			->method('isEnabledForUser')
			->with(
				$this->equalTo('encryption')
			)
			->willReturn(true);
		$this->container['Config']
			->expects($this->once())
			->method('getAppValue')
			->with(
				$this->equalTo('encryption'),
				$this->equalTo('recoveryAdminEnabled'),
				$this->anything()
			)
			->willReturn('1');

		$this->container['Config']
			->method('getUserValue')
			->withConsecutive(
				[
				$this->anything(),
				$this->equalTo('encryption'),
				$this->equalTo('recoveryEnabled'),
				$this->anything()
				],
				[
					$this->anything(),
					$this->anything(),
					$this->anything(),
					$this->anything()
				]
			)
			->willReturn('0');

		$expectedResult['isRestoreDisabled'] = true;

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']->method('getUserGroups')->willReturn([]);

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function testNoAvatar(): void {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();
		$expectedResult['isGuest'] = false;

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']->method('getUserGroups')->willReturn([]);

		$this->container['OCP\\IAvatarManager']
			->method('getAvatar')
			->will($this->throwException(new NotFoundException()));
		$expectedResult['isAvatarAvailable'] = false;

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function dataforemailaddress(): array {
		return [
			['foo', 'foo', 'foo', 'foo' , 'foo@localhost'],
			['bar', 'bar', 'bar', 'foo', 'foo@localhoster']
		];
	}

	/**
	 * Test to verify setting email address by user who had logged in
	 * for itself.
	 *
	 * @dataProvider dataforemailaddress
	 * @param $userName
	 * @param $userPassword
	 * @param $loginUser
	 * @param $setUser
	 * @param $emailAddress
	 * @throws Exception
	 */
	public function testSetSelfEmailAddress($userName, $userPassword, $loginUser, $setUser, $emailAddress): void {
		$this->createUser($userName, $userPassword);

		$appName = "settings";
		$irequest = $this->createMock(IRequest::class);
		$userManager = $this->createMock(IUserManager::class);
		$groupManager = $this->createMock(Manager::class);
		$userSession = $this->createMock(Session::class);
		$iConfig = $this->createMock(IConfig::class);
		$iSecureRandom = $this->createMock(ISecureRandom::class);
		$iL10 = $this->createMock(IL10N::class);
		$iLogger = $this->createMock(ILogger::class);
		$ocDefault = $this->getMockBuilder(OC_Defaults::class)
			->disableOriginalConstructor()->getMock();
		$iMailer = $this->createMock(IMailer::class);
		$iTimeFactory = $this->createMock(ITimeFactory::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$appManager = $this->createMock(IAppManager::class);
		$iAvatarManager = $this->createMock(IAvatarManager::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userController = new UsersController(
			$appName,
			$irequest,
			$userManager,
			$groupManager,
			$userSession,
			$iConfig,
			$iSecureRandom,
			false,
			$iL10,
			$iLogger,
			$ocDefault,
			$iMailer,
			$iTimeFactory,
			"",
			$urlGenerator,
			$appManager,
			$iAvatarManager,
			$eventDispatcher
		);

		$iMailer->method('validateMailAddress')->willReturn(true);

		self::loginAsUser($loginUser);

		$iUser = $this->createMock(IUser::class);
		$userManager->method('get')->willReturn($iUser);
		$iUser->method('getUID')->willReturn($loginUser);
		$userSession
			->method('getUser')
			->willReturn($iUser);
		$subAdmin = $this->createMock(SubAdmin::class);
		$subAdmin->method('isSubAdmin')->with($iUser)->willReturn(false);
		$groupManager
			->method('getSubAdmin')
			->willReturn($subAdmin);
		$response = $userController->setEmailAddress($setUser, $emailAddress);
		if ($loginUser !== $setUser) {
			$this->assertEquals(new Http\JSONResponse([
				'error' => 'cannotSetEmailAddress',
				'message' => 'Cannot set email address for user'
			], HTTP::STATUS_NOT_FOUND), $response);
		} else {
			$this->assertEquals(new Http\JSONResponse(), $response);
		}

		OC::$server->getUserManager()->get($userName)->delete();
	}

	public function setDataForSendMail(): array {
		return [
			['foo', 'foo@localhost'],
			['bar', 'bar@localhost']
		];
	}

	/**
	 * A test to verify if the email is send and verify data response for
	 * the success
	 *
	 * @dataProvider setDataForSendMail
	 * @param $id
	 * @param $mailaddress
	 */
	public function testSetEmailAddressSendEmail($id, $mailaddress): void {
		$appName = "settings";
		$irequest = $this->createMock(IRequest::class);
		$userManager = $this->createMock(IUserManager::class);
		$groupManager = $this->createMock(IGroupManager::class);
		$userSession = $this->createMock(Session::class);
		$iConfig = $this->createMock(IConfig::class);
		$iSecureRandom = $this->createMock(ISecureRandom::class);
		$iL10 = $this->createMock(IL10N::class);
		$iLogger = $this->createMock(ILogger::class);
		$ocDefault = $this->getMockBuilder(OC_Defaults::class)
			->disableOriginalConstructor()->getMock();
		$iMailer = $this->createMock(IMailer::class);
		$iTimeFactory = $this->createMock(ITimeFactory::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$appManager = $this->createMock(IAppManager::class);
		$iAvatarManager = $this->createMock(IAvatarManager::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userController = new UsersController(
			$appName,
			$irequest,
			$userManager,
			$groupManager,
			$userSession,
			$iConfig,
			$iSecureRandom,
			false,
			$iL10,
			$iLogger,
			$ocDefault,
			$iMailer,
			$iTimeFactory,
			"",
			$urlGenerator,
			$appManager,
			$iAvatarManager,
			$eventDispatcher
		);

		self::loginAsUser($id);

		$iUser = $this->createMock(IUser::class);
		$iUser->expects($this->once())
			->method('canChangeMailAddress')
			->willReturn(true);
		$userManager->method('get')->willReturn($iUser);
		$iUser->method('getUID')->willReturn($id);
		$userSession
			->method('getUser')
			->willReturn($iUser);

		$iMailer->expects($this->once())->method('validateMailAddress')
			->willReturn(true);
		$mailMessage = $this->createMock(Message::class);
		$iMailer->expects($this->once())
			->method('createMessage')
			->willReturn($mailMessage);
		$iL10->expects($this->atLeastOnce())
			->method('t')
			->willReturn('An email has been sent to this address for confirmation. Until the email is verified this address will not be set.');
		$expectedResponse = new DataResponse(
			[
				'status' => 'success',
				'data' => [
					'username' => $id,
					'mailAddress' => $mailaddress,
					'message' => 'An email has been sent to this address for confirmation. Until the email is verified this address will not be set.'
				]
			],
			Http::STATUS_OK
		);
		$response = $userController->setMailAddress($id, $mailaddress);
		$this->assertEquals($expectedResponse, $response);
	}

	/**
	 * @return array
	 */
	public function setEmailAddressData(): array {
		return [
			/* mailAddress,    isValid, expectsUpdate, canChangeDisplayName, responseCode */
			[ '',              true,    true,          true,                 Http::STATUS_OK ],
			[ 'foo@local',     true,    true,          true,                 Http::STATUS_OK],
			[ 'foo@bar@local', false,   false,         true,                 Http::STATUS_UNPROCESSABLE_ENTITY],
			[ 'foo@local',     true,    false,         false,                Http::STATUS_FORBIDDEN],
		];
	}

	/**
	 * @dataProvider setEmailAddressData
	 *
	 * @param string $mailAddress
	 * @param bool $isValid
	 * @param bool $expectsUpdate
	 * @param bool $chanChangeMailAddress
	 * @param bool $responseCode
	 */
	public function testSetEmailAddress($mailAddress, $isValid, $expectsUpdate, $chanChangeMailAddress, $responseCode): void {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->method('getUID')
			->willReturn('foo');
		$user
			->method('getEMailAddress')
			->willReturn('foo@local');
		$user
			->method('canChangeMailAddress')
			->willReturn($chanChangeMailAddress);
		$user
			->method('setEMailAddress')
			->with(
				$this->equalTo($mailAddress)
			);

		$this->container['UserSession']
			->expects($this->atLeastOnce())
			->method('getUser')
			->willReturn($user);
		$this->container['Mailer']
			->method('validateMailAddress')
			->with($mailAddress)
			->willReturn($isValid);

		if ($isValid) {
			$user->expects($this->atLeastOnce())
				->method('canChangeMailAddress')
				->willReturn(true);
		}

		$this->container['Config']
			->method('getUserValue')
			->with('foo', 'owncloud', 'changeMail')
			->willReturn('12000:AVerySecretToken');
		$this->container['TimeFactory']
			->method('getTime')
			->willReturnOnConsecutiveCalls(12301, 12348);
		$this->container['UserManager']
			->expects($this->atLeastOnce())
			->method('get')
			->with('foo')
			->willReturn($user);
		$this->container['SecureRandom']
			->method('generate')
			->with('21')
			->willReturn('ThisIsMaybeANotSoSecretToken!');
		$this->container['Config']
			->method('setUserValue')
			->with('foo', 'owncloud', 'changeMail', '12348:ThisIsMaybeANotSoSecretToken!');
		$this->container['URLGenerator']
			->method('linkToRouteAbsolute')
			->willReturn('https://ownCloud.com/index.php/mailaddress/');

		$message = $this->getMockBuilder(Message::class)
			->disableOriginalConstructor()->getMock();
		$message
			->method('setTo')
			->with(['foo@local' => 'foo']);
		$message
			->method('setSubject')
			->with(' email address confirm');
		$message
			->method('setPlainBody')
			->with('Use the following link to confirm your changes to the email address: https://ownCloud.com/index.php/mailaddress/');
		$message
			->method('setFrom')
			->with(['changemail-noreply@localhost' => null]);
		$this->container['Mailer']
			->method('createMessage')
			->willReturn($message);
		$this->container['Mailer']
			->method('send')
			->with($message);

		$response = $this->container['UsersController']->setMailAddress($user->getUID(), $mailAddress);
		$this->assertSame($responseCode, $response->getStatus());
	}

	public function testStatsAdmin(): void {
		$this->container['IsAdmin'] = true;

		$this->container['UserManager']
			->method('countUsers')
			->willReturn([128, 44]);

		$expectedResponse = new DataResponse(
			[
				'totalUsers' => 172
			]
		);
		$response = $this->container['UsersController']->stats();
		$this->assertEquals($expectedResponse, $response);
	}

	/**
	 * Tests that the subadmin stats return unique users, even
	 * when a user appears in several groups.
	 */
	public function testStatsSubAdmin(): void {
		$this->container['IsAdmin'] = false;

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();

		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($user);

		$group1 = $this->getMockBuilder(Group::class)
			->disableOriginalConstructor()->getMock();
		$group1
			->expects($this->once())
			->method('getUsers')
			->willReturn(['foo' => 'M. Foo', 'admin' => 'S. Admin']);

		$group2 = $this->getMockBuilder(Group::class)
			->disableOriginalConstructor()->getMock();
		$group2
			->expects($this->once())
			->method('getUsers')
			->willReturn(['bar' => 'B. Ar']);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->method('getSubAdminsGroups')
			->willReturn([$group1, $group2]);

		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$expectedResponse = new DataResponse(
			[
				'totalUsers' => 3
			]
		);

		$response = $this->container['UsersController']->stats();
		$this->assertEquals($expectedResponse, $response);
	}

	public function testSetDisplayNameNull(): void {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('userName');

		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($user);

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Unable to change display name',
				],
			]
		);
		$response = $this->container['UsersController']->setDisplayName(null, 'displayName');

		$this->assertEquals($expectedResponse, $response);
	}

	public function dataSetDisplayName(): array {
		$data = [];

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user1->method('canChangeDisplayName')->willReturn(true);
		$data[] = [$user1, $user1, false, false, true];

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user1->method('canChangeDisplayName')->willReturn(false);
		$data[] = [$user1, $user1, false, false, false];

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$user2->method('canChangeDisplayName')->willReturn(true);
		$data[] = [$user1, $user2, false, false, false];

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$user2->method('canChangeDisplayName')->willReturn(true);
		$data[] = [$user1, $user2, true, false, true];

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$user2->method('canChangeDisplayName')->willReturn(true);
		$data[] = [$user1, $user2, false, true, true];

		return $data;
	}

	/**
	 * @dataProvider dataSetDisplayName
	 */
	public function testSetDisplayName($currentUser, $editUser, $isAdmin, $isSubAdmin, $valid): void {
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($currentUser);
		$this->container['UserManager']
			->expects($this->once())
			->method('get')
			->with($editUser->getUID())
			->willReturn($editUser);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->method('isUserAccessible')
			->with($currentUser, $editUser)
			->willReturn($isSubAdmin);

		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']
			->method('isAdmin')
			->with($currentUser->getUID())
			->willReturn($isAdmin);

		if ($valid === true) {
			$editUser->expects($this->once())
				->method('setDisplayName')
				->with('newDisplayName')
				->willReturn(true);
			$expectedResponse = new DataResponse(
				[
					'status' => 'success',
					'data' => [
						'message' => 'Your full name has been changed.',
						'username' => $editUser->getUID(),
						'displayName' => 'newDisplayName',
					],
				]
			);
		} else {
			$editUser->expects($this->never())->method('setDisplayName');
			$expectedResponse = new DataResponse(
				[
					'status' => 'error',
					'data' => [
						'message' => 'Unable to change display name',
					],
				]
			);
		}

		$response = $this->container['UsersController']->setDisplayName($editUser->getUID(), 'newDisplayName');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testSetDisplayNameFails(): void {
		$user = $this->createMock(IUser::class);
		$user->method('canChangeDisplayname')->willReturn(true);
		$user->method('getUID')->willReturn('user');
		$user->expects($this->once())
			->method('setDisplayName')
			->with('newDisplayName')
			->willReturn(false);
		$user->method('getDisplayName')->willReturn('oldDisplayName');

		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->expects($this->once())
			->method('get')
			->with($user->getUID())
			->willReturn($user);

		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->method('isUserAccessible')
			->with($user, $user)
			->willReturn(false);

		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$this->container['GroupManager']
			->expects($this->once())
			->method('isAdmin')
			->with($user->getUID())
			->willReturn(false);

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Unable to change full name',
					'displayName' => 'oldDisplayName',
				],
			]
		);
		$response = $this->container['UsersController']->setDisplayName($user->getUID(), 'newDisplayName');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDifferentLoggedUserAndRequestUser(): void {
		$token = 'AVerySecretToken';
		$userId = 'ExistingUser';
		$differentUserId = 'ExistingUser2';
		$mailAddress = 'sample@email.com';
		$userObject = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()->getMock();
		$userObject
			->expects($this->atLeastOnce())
			->method('getUID')
			->willReturn($userId);

		$diffUserObject = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()->getMock();

		$diffUserObject
			->expects($this->atLeastOnce())
			->method('getUID')
			->willReturn($differentUserId);

		$this->container['UserManager']
			->expects($this->atLeastOnce())
			->method('get')
			->with($userId)
			->willReturn($userObject);
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($diffUserObject);
		$this->container['Logger']
			->expects($this->once())
			->method('error')
			->with('The logged in user is different than expected.');

		$expectedResponse = new RedirectResponse(
			$this->container['URLGenerator']->linkToRoute('settings.SettingsPage.getPersonal', ['changestatus' => 'error'])
		);

		$response = $this->container['UsersController']->changeMail($token, $userId, $mailAddress);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testInvalidEmailChangeToken(): void {
		$token = 'AVerySecretToken';
		$userId = 'ExistingUser';
		$mailAddress = 'sample@email.com';
		$userObject = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()->getMock();

		$this->container['UserManager']
			->expects($this->atLeastOnce())
			->method('get')
			->with($userId)
			->willReturn($userObject);
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($userObject);
		$this->container['Logger']
			->expects($this->once())
			->method('error')
			->with('Couldn\'t change the email address because the token is invalid');

		$expectedResponse = new RedirectResponse(
			$this->container['URLGenerator']->linkToRoute('settings.SettingsPage.getPersonal', ['changestatus' => 'error'])
		);

		$response = $this->container['UsersController']->changeMail($token, $userId, $mailAddress);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDisableSelfAdmin(): void {
		$this->container['IsAdmin'] = true;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Forbidden'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->setEnabled('myself', 'false');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testEnableSelfAdmin(): void {
		$this->container['IsAdmin'] = true;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Forbidden'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->setEnabled('myself', 'true');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDisableSelfSubadmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Forbidden'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->setEnabled('myself', 'false');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testEnableSelfSubadmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Forbidden'
				]
			],
			Http::STATUS_FORBIDDEN
		);

		$response = $this->container['UsersController']->setEnabled('myself', 'true');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDisableAdmin(): void {
		$this->container['IsAdmin'] = true;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('Admin');
		$toDisableUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToDisable')
			->willReturn($toDisableUser);
		$expectedResponse = new DataResponse(
			[
				'status' => 'success',
				'data' => [
					'username' => 'UserToDisable',
					'enabled' => 'false'
				]
			],
			Http::STATUS_OK
		);
		$response = $this->container['UsersController']->setEnabled('UserToDisable', 'false');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testEnableAdmin(): void {
		$this->container['IsAdmin'] = true;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('Admin');
		$toEnableUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToEnable')
			->willReturn($toEnableUser);
		$expectedResponse = new DataResponse(
			[
				'status' => 'success',
				'data' => [
					'username' => 'UserToEnable',
					'enabled' => 'true'
				]
			],
			Http::STATUS_OK
		);
		$response = $this->container['UsersController']->setEnabled('UserToEnable', 'true');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDisableSubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$toDisableUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToDisable')
			->willReturn($toDisableUser);
		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDisableUser)
			->willReturn(true);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$expectedResponse = new DataResponse(
			[
				'status' => 'success',
				'data' => [
					'username' => 'UserToDisable',
					'enabled' => 'false'
				]
			],
			Http::STATUS_OK
		);
		$response = $this->container['UsersController']->setEnabled('UserToDisable', 'false');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testEnableSubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$toEnableUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToEnable')
			->willReturn($toEnableUser);
		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toEnableUser)
			->willReturn(true);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$expectedResponse = new DataResponse(
			[
				'status' => 'success',
				'data' => [
					'username' => 'UserToEnable',
					'enabled' => 'true'
				]
			],
			Http::STATUS_OK
		);
		$response = $this->container['UsersController']->setEnabled('UserToEnable', 'true');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDisableNotAccessibleToSubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$toDisableUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToDisable')
			->willReturn($toDisableUser);
		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDisableUser)
			->willReturn(false);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Forbidden'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->setEnabled('UserToDisable', 'false');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testEnableNotAccessibleToSubAdmin(): void {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->willReturn('myself');
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$toEnableUser = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->willReturn($user);
		$this->container['UserManager']
			->method('get')
			->with('UserToEnable')
			->willReturn($toEnableUser);
		$subadmin = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toEnableUser)
			->willReturn(false);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);
		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Forbidden'
				]
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->setEnabled('UserToEnable', 'true');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithEmailAndUsername(): void {
		$this->container['Mailer']->expects($this->once())
			->method('validateMailAddress')
			->willReturn(true);

		$user = $this->getMockBuilder(User::class)
			->disableOriginalConstructor()->getMock();

		//$user = $this->createMock(IUser::class);

		$this->container['UserSession']->method('getUser')
			->willReturn($user);

		$this->container['GroupManager']
			->method('isAdmin')
			->willReturn(true);
		$this->container['GroupManager']->method('getUserGroups')->willReturn([]);

		$this->container['UserManager']
			->expects($this->once())
			->method('userExists')
			->willReturn(false);

		$this->container['SecureRandom']
			->method('generate')
			->willReturn('AsDfGh12345');

		$user->method('getUID')
			->willReturn('foobazz');
		$user->expects($this->once())
			->method('setEMailAddress')
			->with('validMail@Adre.ss');

		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->with('foobazz', 'AsDfGh12345')
			->willReturn($user);

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo')
			->with(['validMail@Adre.ss' => 'foobazz']);
		$message->expects($this->once())
			->method('setSubject')
			->with('Your  account was created');

		$this->container['Mailer']
			->expects($this->once())
			->method('createMessage')
			->willReturn($message);
		$this->container['Mailer']
			->expects($this->once())
			->method('send')
			->with($message);
		$subadmin = $this->createMock(SubAdmin::class);
		$subadmin->method('getSubAdminsGroups')
			->with($user)
			->willReturn([]);
		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subadmin);

		$response = $this->container['UsersController']->create('foobazz', '', [], 'validMail@Adre.ss');
		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
	}

	public function testSetPasswordForm(): void {
		$user = $this->createMock(IUser::class);

		$this->container['UserManager']
			->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn($user);

		$this->container['Config']
			->expects($this->once())
			->method('getUserValue')
			->willReturn('1234:fooBaZ1');
		$this->container['Config']
			->expects($this->once())
			->method('getAppValue')
			->willReturn('43200');

		$this->container['TimeFactory']
			->expects($this->once())
			->method('getTime')
			->willReturn(44430);

		$this->container['URLGenerator']
			->expects($this->once())
			->method('linkToRouteAbsolute')
			->willReturn('http://localhost/apps/settings/setpassword/form/1234/foo');
		$result = $this->container['UsersController']->setPasswordForm('fooBaZ1', 'foo');
		$this->assertEquals(new Http\TemplateResponse(
			'settings',
			'setpassword',
			['link' => 'http://localhost/apps/settings/setpassword/form/1234/foo'],
			'guest'
		), $result);
	}

	public function providesUserTokenExceptionData(): array {
		return [
			['invalid_token'],
			['expired_token'],
			['mismatch_token']
		];
	}

	/**
	 * @dataProvider providesUserTokenExceptionData
	 */
	public function testSetPasswordFormExceptionResponse($tokenException): void {
		$user = $this->createMock(IUser::class);

		$this->container['UserManager']->expects($this->once())
			->method('get')
			->with('foo')
			->willReturn($user);

		if ($tokenException === 'expired_token') {
			$this->container['Config']
				->expects($this->once())
				->method('getUserValue')
				->willReturn('1234:fooBaZ1');
			$this->container['TimeFactory']
				->expects($this->once())
				->method('getTime')
				->willReturn(44444);

			$this->container['URLGenerator']->expects($this->once())
				->method('linkToRouteAbsolute')
				->willReturn('http://localhost/settings/setpassword/form/1234/foo');

			$result = $this->container['UsersController']->setPasswordForm('fooBaZ1', 'foo');
			$this->assertEquals(
				new Http\TemplateResponse(
					'settings',
					'resendtokenbymail',
					['link' => 'http://localhost/settings/setpassword/form/1234/foo'],
					'guest'
				),
				$result
			);
		} elseif ($tokenException === 'mismatch_token') {
			$this->container['Config']->expects($this->once())
				->method('getUserValue')
				->willReturn('1234:fooBaZ11');
			$this->container['TimeFactory']
				->expects($this->once())
				->method('getTime')
				->willReturn(44430);
			$this->container['Config']->expects($this->once())
				->method('getAppValue')
				->willReturn('43200');
			$result = $this->container['UsersController']->setPasswordForm('fooBaZ1', 'foo');
			$this->assertEquals(
				new Http\TemplateResponse(
					'core',
					'error',
					['errors' => [['error' => 'The token provided is invalid.']]],
					'guest'
				),
				$result
			);
		} elseif ($tokenException === 'invalid_token') {
			$this->container['Config']->expects($this->once())
				->method('getUserValue')
				->willReturn('');
			$result = $this->container['UsersController']->setPasswordForm('fooBaZ1', 'foo');
			$this->assertEquals(
				new Http\TemplateResponse(
					'core',
					'error',
					['errors' => [["error" => 'The token provided is invalid.']]],
					'guest'
				),
				$result
			);
		}
	}

	public function testResendToken(): void {
		$user = $this->createMock(IUser::class);
		$user->method('getEMailAddress')
			->willReturn('foo@bar.com');

		$this->container['UserManager']->expects($this->once())
			->method('get')
			->willReturn($user);

		$this->container['SecureRandom']->expects($this->once())
			->method('generate')
			->willReturn('foOBaZ1');
		$this->container['URLGenerator']->expects($this->once())
			->method('linkToRouteAbsolute')
			->willReturn('http://localhost/setpassword/foOBaZ1/foo');

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo')
			->willReturn($message);
		$message->expects($this->once())
			->method('setSubject')
			->willReturn($message);
		$message->expects($this->once())
			->method('setHtmlBody')
			->willReturn($message);
		$message->expects($this->once())
			->method('setPlainBody')
			->willReturn($message);
		$message->expects($this->once())
			->method('setFrom')
			->willReturn($message);

		$this->container['Defaults']->method('getName')
			->willReturn('ownCloud');

		$this->container['Mailer']->expects($this->once())
			->method('createMessage')
			->willReturn($message);
		$this->container['Mailer']->expects($this->once())
			->method('send')
			->with($message)
			->willReturn([]);

		$result = $this->container['UsersController']->resendToken('foo');
		$this->assertEquals(
			new Http\TemplateResponse(
				'settings',
				'tokensendnotify',
				[],
				'guest'
			),
			$result
		);
	}

	public function testResendInvitation(): void {
		$user = $this->createMock(IUser::class);
		$user->method('getEMailAddress')
			->willReturn('foo@bar.com');

		$this->container['UserManager']->expects($this->once())
			->method('get')
			->willReturn($user);

		$this->container['SecureRandom']->expects($this->once())
			->method('generate')
			->willReturn('foOBaZ1');
		$this->container['URLGenerator']->expects($this->once())
			->method('linkToRouteAbsolute')
			->willReturn('http://localhost/setpassword/foOBaZ1/foo');

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo')
			->willReturn($message);
		$message->expects($this->once())
			->method('setSubject')
			->willReturn($message);
		$message->expects($this->once())
			->method('setHtmlBody')
			->willReturn($message);
		$message->expects($this->once())
			->method('setPlainBody')
			->willReturn($message);
		$message->expects($this->once())
			->method('setFrom')
			->willReturn($message);

		$this->container['Defaults']->method('getName')
			->willReturn('ownCloud');

		$this->container['Mailer']->expects($this->once())
			->method('createMessage')
			->willReturn($message);
		$this->container['Mailer']->expects($this->once())
			->method('send')
			->with($message)
			->willReturn([]);

		$this->container['IsAdmin'] = true;
		$result = $this->container['UsersController']->resendInvitation('foo');
		$this->assertEquals(
			new Http\JSONResponse(),
			$result
		);
	}

	public function testResendTokenNullUserResponse(): void {
		$result = $this->container['UsersController']->resendToken('foo');
		$this->assertEquals(
			new Http\TemplateResponse(
				'core',
				'error',
				["errors" => [["error" =>"Failed to create activation link. Please contact your administrator."]]],
				'guest'
			),
			$result
		);
	}

	public function testResendTokenEmailNotSendResponse(): void {
		$user = $this->createMock(IUser::class);

		$this->container['UserManager']->expects($this->once())
			->method('get')
			->willReturn($user);
		$result = $this->container['UsersController']->resendToken('foo');
		$this->assertEquals(
			new Http\TemplateResponse(
				'core',
				'error',
				["errors" => [["error" =>"Failed to create activation link. Please contact your administrator."]]],
				'guest'
			),
			$result
		);
	}

	public function testResendTokenSendMailFailedResponse(): void {
		$user = $this->createMock(IUser::class);

		$user->method('getEMailAddress')
			->willReturn('foo@bar.com');

		$this->container['UserManager']->expects($this->once())
			->method('get')
			->willReturn($user);

		$this->container['SecureRandom']->expects($this->once())
			->method('generate')
			->willReturn('foOBaZ1');
		$this->container['URLGenerator']->expects($this->once())
			->method('linkToRouteAbsolute')
			->willReturn('http://localhost/setpassword/foOBaZ1/foo');

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo')
			->willReturn($message);
		$message->expects($this->once())
			->method('setSubject')
			->willReturn($message);
		$message->expects($this->once())
			->method('setHtmlBody')
			->willReturn($message);
		$message->expects($this->once())
			->method('setPlainBody')
			->willReturn($message);
		$message->expects($this->once())
			->method('setFrom')
			->willReturn($message);

		$this->container['Defaults']->method('getName')
			->willReturn('ownCloud');

		$this->container['Mailer']->expects($this->once())
			->method('createMessage')
			->willReturn($message);
		$this->container['Mailer']->expects($this->once())
			->method('send')
			->with($message)
			->willThrowException(new Exception('Mail can not be sent'));
		$result = $this->container['UsersController']->resendToken('foo');
		$this->assertEquals(
			new Http\TemplateResponse(
				'core',
				'error',
				["errors" => [["error" =>"Can't send email to the user. Contact your administrator."]]],
				'guest'
			),
			$result
		);
	}

	public function testSetPasswordNullUserException(): void {
		$result = $this->container['UsersController']->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(
			new Http\JSONResponse(
				[
					'status' => 'error',
					'message' => 'Failed to set password. Please contact the administrator.',
					'type' => 'usererror'
				],
				Http::STATUS_NOT_FOUND
			),
			$result
		);
	}

	public function testSetPasswordInvalidTokenException(): void {
		$user = $this->createMock(IUser::class);
		$this->container['UserManager']->method('get')
			->with('foo')
			->willReturn($user);

		$this->container['Config']->expects($this->once())
			->method('getUserValue')
			->willReturn('');

		$result = $this->container['UsersController']->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(new Http\JSONResponse(
			[
				'status' => 'error',
				'message' => 'The token provided is invalid.',
				'type' => 'tokenfailure'
			],
			Http::STATUS_UNAUTHORIZED
		), $result);
	}

	public function testSetPasswordPolicyException(): void {
		$user = $this->createMock(IUser::class);
		$user->method('setPassword')
			->willThrowException(new Exception('Can not set user password, because password does not comply with policy.'));
		$this->container['UserManager']->method('get')
			->with('foo')
			->willReturn($user);

		$this->container['Config']
			->expects($this->once())
			->method('getUserValue')
			->willReturn('1234:fooBaZ1');
		$this->container['Config']
			->expects($this->once())
			->method('getAppValue')
			->willReturn('43200');

		$this->container['TimeFactory']
			->expects($this->once())
			->method('getTime')
			->willReturn(44430);
		$this->container['Logger']
		->expects($this->once())
			->method('error')
			->with('The password can not be set for user: foo');

		$expectedResult = new Http\JSONResponse(
			[
				'status' => 'error',
				'message' => 'Can not set user password, because password does not comply with policy.',
				'type' => 'passwordsetfailed',
			],
			Http::STATUS_FORBIDDEN
		);
		$result = $this->container['UsersController']->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals($expectedResult, $result);
	}

	public function testSetPasswordExpiredTokenException(): void {
		$user = $this->createMock(IUser::class);

		$this->container['UserManager']->method('get')
			->with('foo')
			->willReturn($user);
		$this->container['Config']->expects($this->once())
			->method('getUserValue')
			->willReturn('1234:fooBaZ1');
		$this->container['TimeFactory']->expects($this->once())
			->method('getTime')
			->willReturn(44444);

		$result = $this->container['UsersController']->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(new Http\JSONResponse(
			[
				'status' => 'error',
				'message' => 'The token provided had expired.',
				'type' => 'tokenfailure'
			],
			Http::STATUS_UNAUTHORIZED
		), $result);
	}

	public function testSetPasswordMismatchTokenException(): void {
		$user = $this->createMock(IUser::class);

		$this->container['UserManager']->method('get')
			->with('foo')
			->willReturn($user);
		$this->container['Config']->expects($this->once())
			->method('getUserValue')
			->willReturn('1234:fooBaZ11');
		$this->container['Config']->expects($this->once())
			->method('getAppValue')
			->willReturn('43200');
		$this->container['TimeFactory']->expects($this->once())
			->method('getTime')
			->willReturn(44430);

		$result = $this->container['UsersController']->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(new Http\JSONResponse(
			[
				'status' => 'error',
				'message' => 'The token provided is invalid.',
				'type' => 'tokenfailure'
			],
			Http::STATUS_UNAUTHORIZED
		), $result);
	}

	public function testSetPasswordSetFailed(): void {
		$user = $this->createMock(IUser::class);

		$this->container['Config']->expects($this->once())
			->method('getUserValue')
			->willReturn('1234:fooBaZ1');

		$this->container['TimeFactory']->expects($this->once())
			->method('getTime')
			->willReturn(44430);
		$this->container['Config']->expects($this->once())
			->method('getAppValue')
			->willReturn('43200');

		$this->container['UserManager']->method('get')
			->with('foo')
			->willReturn($user);

		$user->expects($this->once())
			->method('setPassword')
			->with('123')
			->willReturn(false);

		$result = $this->container['UsersController']->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(new Http\JSONResponse(
			[
				'status' => 'error',
				'message' => 'Failed to set password. Please contact your administrator.',
				'type' => 'passwordsetfailed'
			],
			Http::STATUS_FORBIDDEN
		), $result);
	}

	public function testSetPassword(): void {
		$request = $this->createMock(IRequest::class);
		$userManager = $this->createMock(IUserManager::class);
		$groupManager = $this->createMock(IGroupManager::class);
		$userSession = $this->createMock(Session::class);
		$config = $this->createMock(IConfig::class);
		$secureRandom = $this->createMock(ISecureRandom::class);
		$l10n = $this->createMock(IL10N::class);
		$logger = $this->createMock(ILogger::class);
		$defaults = $this->createMock(OC_Defaults::class);
		$mailer = $this->createMock(IMailer::class);
		$timeFactory = $this->createMock(ITimeFactory::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$appManager = $this->createMock(IAppManager::class);
		$avatarManager = $this->createMock(IAvatarManager::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$usersController = new UsersController(
			'settings',
			$request,
			$userManager,
			$groupManager,
			$userSession,
			$config,
			$secureRandom,
			'true',
			$l10n,
			$logger,
			$defaults,
			$mailer,
			$timeFactory,
			'no-reply@foo.com',
			$urlGenerator,
			$appManager,
			$avatarManager,
			$eventDispatcher
		);

		$user = $this->createMock(IUser::class);
		$user->expects($this->once())
			->method('setPassword')
			->willReturn(true);
		$user->expects($this->once())
			->method('getEMailAddress')
			->willReturn('foo@bar.com');

		$userManager->method('get')
			->with('foo')
			->willReturn($user);

		$config->expects($this->once())
			->method('getUserValue')
			->willReturn('1234:fooBaZ1');

		$timeFactory->expects($this->once())
			->method('getTime')
			->willReturn(44430);
		$config->expects($this->once())
			->method('getAppValue')
			->willReturn(43200);

		$fromMailAddress = self::invokePrivate($usersController, 'fromMailAddress', []);

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo')
			->willReturn($message);
		$message->expects($this->once())
			->method('setSubject')
			->willReturn($message);
		$message->expects($this->once())
			->method('setFrom')
			->with([$fromMailAddress => 'ownCloud'])
			->willReturn($message);

		$defaults->method('getName')
			->willReturn('ownCloud');

		$mailer->expects($this->once())
			->method('createMessage')
			->willReturn($message);
		$mailer->expects($this->once())
			->method('send')
			->with($message)
			->willReturn([]);
		$l10n->method('t')
			->willReturnCallback(function ($text, $parameters = []) {
				return \vsprintf($text, $parameters);
			});

		$result = $usersController->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(new Http\JSONResponse(['status' => 'success']), $result);
		$this->assertNotEquals('foo@bar.com', $fromMailAddress);
		$this->assertEquals('no-reply@foo.com', $fromMailAddress);
	}

	public function testSetPasswordSendMailFailed(): void {
		$request = $this->createMock(IRequest::class);
		$userManager = $this->createMock(IUserManager::class);
		$groupManager = $this->createMock(IGroupManager::class);
		$userSession = $this->createMock(Session::class);
		$config = $this->createMock(IConfig::class);
		$secureRandom = $this->createMock(ISecureRandom::class);
		$l10n = $this->createMock(IL10N::class);
		$logger = $this->createMock(ILogger::class);
		$defaults = $this->createMock(OC_Defaults::class);
		$mailer = $this->createMock(IMailer::class);
		$timeFactory = $this->createMock(ITimeFactory::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$appManager = $this->createMock(IAppManager::class);
		$avatarManager = $this->createMock(IAvatarManager::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$usersController = new UsersController(
			'settings',
			$request,
			$userManager,
			$groupManager,
			$userSession,
			$config,
			$secureRandom,
			'true',
			$l10n,
			$logger,
			$defaults,
			$mailer,
			$timeFactory,
			'no-reply@foo.com',
			$urlGenerator,
			$appManager,
			$avatarManager,
			$eventDispatcher
		);

		$user = $this->createMock(IUser::class);

		$config->expects($this->once())
			->method('getUserValue')
			->willReturn('1234:fooBaZ1');

		$timeFactory->expects($this->once())
			->method('getTime')
			->willReturn(44430);
		$config->expects($this->once())
			->method('getAppValue')
			->willReturn('43200');

		$userManager->method('get')
			->with('foo')
			->willReturn($user);

		$user->expects($this->once())
			->method('setPassword')
			->with('123')
			->willReturn(true);
		$user->expects($this->once())
			->method('getEMailAddress')
			->willReturn('foo@bar.com');

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo')
			->willReturn($message);
		$message->expects($this->once())
			->method('setSubject')
			->willReturn($message);
		$message->expects($this->once())
			->method('setPlainBody')
			->willReturn($message);
		$message->expects($this->once())
			->method('setHtmlBody')
			->willReturn($message);
		$message->expects($this->once())
			->method('setFrom')
			->willReturn($message);

		$mailer->expects($this->once())
			->method('createMessage')
			->willReturn($message);
		$mailer->expects($this->once())
			->method('send')
			->willThrowException(new Exception('can not send mail'));
		$l10n->method('t')
			->willReturn('Failed to send email. Please contact your administrator.');

		$result = $usersController->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(new Http\JSONResponse(
			[
				'status' => 'error',
				'message' => 'Failed to send email. Please contact your administrator.',
				'type' => 'emailsendfailed'
			],
			Http::STATUS_INTERNAL_SERVER_ERROR
		), $result);
	}

	/**
	 * First create a user with wrong email id,
	 * then delete the user. Again create the same user with
	 * a proper email id. Later try to set the password for the
	 * user. The token of the user should not be deleted, if it
	 * is a mismatch.
	 */
	public function testInvalidTokenNotDeleted(): void {
		$user = $this->createMock(IUser::class);
		$user
			->method('getUID')
			->willReturn('foo');
		$user
			->method('delete')
			->willReturn(true);

		$adminUser = $this->createMock(IUser::class);
		$adminUser
			->method('getUID')
			->willReturn('admin');

		$subAdmin = $this->createMock(SubAdmin::class);
		$subAdmin
			->method('getSubAdminsGroups')
			->willReturn([]);
		$subAdmin
			->method('isUserAccessible')
			->willReturn(true);

		$this->container['Mailer']
			->method('validateMailAddress')
			->willReturn(true);

		$this->container['UserSession']
			->method('getUser')
			->willReturn($adminUser);

		$this->container['GroupManager']
			->method('getSubAdmin')
			->willReturn($subAdmin);
		$this->container['GroupManager']->method('getUserGroups')->willReturn([]);

		$this->container['UserManager']
			->method('userExists')
			->willReturn(false);

		$userInstance = $this->createMock(User::class);
		$userInstance
			->method('getUID')
			->willReturn('foo');

		$this->container['UserManager']
			->method('createUser')
			->willReturn($userInstance);

		$message = $this->createMock(Message::class);
		$message
			->method('setTo')
			->willReturn($message);
		$message
			->method('setSubject')
			->willReturn($message);
		$message
			->method('setHtmlBody')
			->willReturn($message);
		$message
			->method('setPlainBody')
			->willReturn($message);
		$message
			->method('setFrom')
			->willReturn($message);

		$this->container['Mailer']
			->method('createMessage')
			->willReturn($message);
		$this->container['Mailer']
			->method('send')
			->with($message)
			->willReturn([]);

		//Create a user first
		$firstCreateResult = $this->container['UsersController']->create('foo', null, [], 'bar@bar.com');
		$this->assertEquals(Http::STATUS_CREATED, $firstCreateResult->getStatus());

		$this->container['UserManager']
			->method('get')
			->willReturn($user);

		//Now delete the user
		$userDeleteResult = $this->container['UsersController']->destroy('foo');
		$deleteResponseData = $userDeleteResult->getData();
		$this->assertEquals('success', $deleteResponseData['status']);
		$this->assertEquals('foo', $deleteResponseData['data']['username']);
		$this->assertEquals(Http::STATUS_NO_CONTENT, $userDeleteResult->getStatus());

		//Now create a new user with a different email id
		$secondCreateResult = $this->container['UsersController']->create('foo', null, [], 'foo@bar.com');
		$this->assertEquals(Http::STATUS_CREATED, $secondCreateResult->getStatus());

		/**
		 * Now when user tries to set the password, the token should not be deleted if
		 * it is a mismatch
		 */
		$this->container['Config']->expects($this->never())
			->method('deleteUserValue');
		$this->container['Config']
			->method('getUserValue')
			->willReturn('foo:AsDfGh12345');
		$result = $this->container['UsersController']->setPassword('AsDfGh1234', 'foo', 'foobar');
		$this->assertEquals(Http::STATUS_UNAUTHORIZED, $result->getStatus());
		$this->assertEquals('error', $result->getData()['status']);
		$this->assertEquals('The token provided is invalid.', $result->getData()['message']);
		$this->assertEquals('tokenfailure', $result->getData()['type']);
	}
}
