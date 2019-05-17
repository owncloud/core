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

use OC\Settings\Application;
use OC\Settings\Controller\UsersController;
use OC\User\Session;
use OC\User\User;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\IGroupManager;
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
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * @group DB
 *
 * @package Tests\Settings\Controller
 */
class UsersControllerTest extends \Test\TestCase {

	/** @var \OCP\AppFramework\IAppContainer */
	private $container;

	protected function setUp() {
		$app = new Application();
		$this->container = $app->getContainer();
		$this->container['AppName'] = 'settings';
		$this->container['GroupManager'] = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()->getMock();
		$this->container['UserManager'] = $this->getMockBuilder('\OCP\IUserManager')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession'] = $this->getMockBuilder('\OC\User\Session')
			->disableOriginalConstructor()->getMock();
		$this->container['L10N'] = $this->getMockBuilder('\OCP\IL10N')
			->disableOriginalConstructor()->getMock();
		$this->container['Config'] = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()->getMock();
		$this->container['L10N']
			->expects($this->any())
			->method('t')
			->will($this->returnCallback(function ($text, $parameters = []) {
				return \vsprintf($text, $parameters);
			}));
		$this->container['Defaults'] = $this->getMockBuilder('\OC_Defaults')
			->disableOriginalConstructor()->getMock();
		$this->container['Mailer'] = $this->getMockBuilder('\OCP\Mail\IMailer')
			->disableOriginalConstructor()->getMock();
		$this->container['DefaultMailAddress'] = 'no-reply@owncloud.com';
		$this->container['Logger'] = $this->getMockBuilder('\OCP\ILogger')
			->disableOriginalConstructor()->getMock();
		$this->container['URLGenerator'] = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()->getMock();
		$this->container['OCP\\App\\IAppManager'] = $this->getMockBuilder('OCP\\App\\IAppManager')
			->disableOriginalConstructor()->getMock();
		$this->container['SecureRandom'] = $this->getMockBuilder('\OCP\Security\ISecureRandom')
			->disableOriginalConstructor()->getMock();
		$this->container['TimeFactory'] = $this->getMockBuilder('\OCP\AppFramework\Utility\ITimeFactory')
			->disableOriginalConstructor()->getMock();
		$this->existingUser = $this->getMockBuilder('OCP\IUser')
			->disableOriginalConstructor()->getMock();
		$this->container['Mailer'] = $this->getMockBuilder('\OCP\Mail\IMailer')
			->disableOriginalConstructor()->getMock();
		$this->container['EventDispatcher'] = $this->createMock(EventDispatcher::class);

		/*
		 * Set default avtar behaviour for whole testsuite
		 */
		$this->container['OCP\\IAvatarManager'] = $this->createMock('OCP\IAvatarManager');

		$avatarExists = $this->createMock('OCP\IAvatar');
		$avatarExists->method('exists')->willReturn(true);
		$avatarNotExists = $this->createMock('OCP\IAvatar');
		$avatarNotExists->method('exists')->willReturn(false);
		$this->container['OCP\\IAvatarManager']
			->method('getAvatar')
			->will($this->returnValueMap([
				['foo', $avatarExists],
				['bar', $avatarExists],
				['admin', $avatarNotExists],
				['foobazz', $avatarExists]
			]));

		$this->container['Config']
			->method('getSystemValue')
			->with('enable_avatars', true)
			->willReturn(true);
	}

	public function testIndexAdmin() {
		$this->container['IsAdmin'] = true;

		$foo = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$foo
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('foo'));
		$foo
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('M. Foo'));
		$foo
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('foo@bar.com'));
		$foo
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(true));
		$foo
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('1024'));
		$foo
			->method('getLastLogin')
			->will($this->returnValue(500));
		$foo
			->method('getHome')
			->will($this->returnValue('/home/foo'));
		$foo
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('OC_User_Database'));
		$admin = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$admin
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('admin'));
		$admin
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('S. Admin'));
		$admin
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('admin@bar.com'));
		$admin
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(true));
		$admin
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('404'));
		$admin
			->expects($this->once())
			->method('getLastLogin')
			->will($this->returnValue(12));
		$admin
			->expects($this->once())
			->method('getHome')
			->will($this->returnValue('/home/admin'));
		$admin
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('\Test\Util\User\Dummy'));
		$bar = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$bar
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('bar'));
		$bar
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('B. Ar'));
		$bar
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('bar@dummy.com'));
		$bar
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(false));
		$bar
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('2323'));
		$bar
			->method('getLastLogin')
			->will($this->returnValue(3999));
		$bar
			->method('getHome')
			->will($this->returnValue('/home/bar'));
		$bar
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('\Test\Util\User\Dummy'));

		$this->container['GroupManager']
			->expects($this->once())
			->method('displayNamesInGroup')
			->with('gid', 'pattern')
			->will($this->returnValue(['foo' => 'M. Foo', 'admin' => 'S. Admin', 'bar' => 'B. Ar']));
		$this->container['GroupManager']
			->expects($this->exactly(3))
			->method('getUserGroupIds')
			->will($this->onConsecutiveCalls(['Users', 'Support'], ['admins', 'Support'], ['External Users']));
		$this->container['UserManager']
			->expects($this->at(0))
			->method('get')
			->with('foo')
			->will($this->returnValue($foo));
		$this->container['UserManager']
			->expects($this->at(1))
			->method('get')
			->with('admin')
			->will($this->returnValue($admin));
		$this->container['UserManager']
			->expects($this->at(2))
			->method('get')
			->with('bar')
			->will($this->returnValue($bar));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->any())
			->method('getSubAdminsGroups')
			->with($foo)
			->will($this->returnValue([]));
		$subadmin
			->expects($this->any())
			->method('getSubAdminsGroups')
			->with($admin)
			->will($this->returnValue([]));
		$subadmin
			->expects($this->any())
			->method('getSubAdminsGroups')
			->with($bar)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				0 => [
					'name' => 'foo',
					'displayname' => 'M. Foo',
					'groups' => ['Users', 'Support'],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 1024,
					'storageLocation' => '/home/foo',
					'lastLogin' => 500000,
					'backend' => 'OC_User_Database',
					'email' => 'foo@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
				],
				1 => [
					'name' => 'admin',
					'displayname' => 'S. Admin',
					'groups' => ['admins', 'Support'],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 404,
					'storageLocation' => '/home/admin',
					'lastLogin' => 12000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'admin@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => false,
				],
				2 => [
					'name' => 'bar',
					'displayname' => 'B. Ar',
					'groups' => ['External Users'],
					'subadmin' => [],
					'isEnabled' => false,
					'quota' => 2323,
					'storageLocation' => '/home/bar',
					'lastLogin' => 3999000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'bar@dummy.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
				],
			]
		);
		$response = $this->container['UsersController']->index(0, 10, 'gid', 'pattern');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testIndexSubAdmin() {
		$this->container['IsAdmin'] = false;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));

		$foo = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$foo
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('foo'));
		$foo
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('M. Foo'));
		$foo
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('foo@bar.com'));
		$foo
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(true));
		$foo
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('1024'));
		$foo
			->method('getLastLogin')
			->will($this->returnValue(500));
		$foo
			->method('getHome')
			->will($this->returnValue('/home/foo'));
		$foo
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('OC_User_Database'));
		$admin = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$admin
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('admin'));
		$admin
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('S. Admin'));
		$admin
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('admin@bar.com'));
		$admin
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(true));
		$admin
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('404'));
		$admin
			->expects($this->once())
			->method('getLastLogin')
			->will($this->returnValue(12));
		$admin
			->expects($this->once())
			->method('getHome')
			->will($this->returnValue('/home/admin'));
		$admin
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('\Test\Util\User\Dummy'));
		$bar = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$bar
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('bar'));
		$bar
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('B. Ar'));
		$bar
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('bar@dummy.com'));
		$bar
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(false));
		$bar
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('2323'));
		$bar
			->method('getLastLogin')
			->will($this->returnValue(3999));
		$bar
			->method('getHome')
			->will($this->returnValue('/home/bar'));
		$bar
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('\Test\Util\User\Dummy'));

		$this->container['GroupManager']
			->expects($this->at(2))
			->method('displayNamesInGroup')
			->with('SubGroup2', 'pattern')
			->will($this->returnValue(['foo' => 'M. Foo', 'admin' => 'S. Admin']));
		$this->container['GroupManager']
			->expects($this->at(1))
			->method('displayNamesInGroup')
			->with('SubGroup1', 'pattern')
			->will($this->returnValue(['bar' => 'B. Ar']));
		$this->container['GroupManager']
			->expects($this->exactly(3))
			->method('getUserGroupIds')
			->will($this->onConsecutiveCalls(
				['admin', 'SubGroup1', 'testGroup'],
				['SubGroup2', 'SubGroup1'],
				['SubGroup2', 'Foo']
			));
		$this->container['UserManager']
			->expects($this->at(0))
			->method('get')
			->with('bar')
			->will($this->returnValue($bar));
		$this->container['UserManager']
			->expects($this->at(1))
			->method('get')
			->with('foo')
			->will($this->returnValue($foo));
		$this->container['UserManager']
			->expects($this->at(2))
			->method('get')
			->with('admin')
			->will($this->returnValue($admin));

		$subgroup1 = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()
			->getMock();
		$subgroup1->expects($this->any())
			->method('getGID')
			->will($this->returnValue('SubGroup1'));
		$subgroup2 = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()
			->getMock();
		$subgroup2->expects($this->any())
			->method('getGID')
			->will($this->returnValue('SubGroup2'));
		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->at(0))
			->method('getSubAdminsGroups')
			->will($this->returnValue([$subgroup1, $subgroup2]));
		$subadmin
			->expects($this->any())
			->method('getSubAdminsGroups')
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				0 => [
					'name' => 'bar',
					'displayname' => 'B. Ar',
					'groups' => ['SubGroup1'],
					'subadmin' => [],
					'isEnabled' => false,
					'quota' => 2323,
					'storageLocation' => '/home/bar',
					'lastLogin' => 3999000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'bar@dummy.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
				],
				1=> [
					'name' => 'foo',
					'displayname' => 'M. Foo',
					'groups' => ['SubGroup2', 'SubGroup1'],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 1024,
					'storageLocation' => '/home/foo',
					'lastLogin' => 500000,
					'backend' => 'OC_User_Database',
					'email' => 'foo@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
				],
				2 => [
					'name' => 'admin',
					'displayname' => 'S. Admin',
					'groups' => ['SubGroup2'],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 404,
					'storageLocation' => '/home/admin',
					'lastLogin' => 12000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'admin@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => false,
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
	public function testIndexWithSearch() {
		$this->container['IsAdmin'] = true;

		$foo = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$foo
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('foo'));
		$foo
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('M. Foo'));
		$foo
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('foo@bar.com'));
		$foo
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(true));
		$foo
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('1024'));
		$foo
			->method('getLastLogin')
			->will($this->returnValue(500));
		$foo
			->method('getHome')
			->will($this->returnValue('/home/foo'));
		$foo
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('OC_User_Database'));
		$admin = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$admin
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('admin'));
		$admin
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('S. Admin'));
		$admin
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('admin@bar.com'));
		$admin
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(true));
		$admin
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('404'));
		$admin
			->expects($this->once())
			->method('getLastLogin')
			->will($this->returnValue(12));
		$admin
			->expects($this->once())
			->method('getHome')
			->will($this->returnValue('/home/admin'));
		$admin
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('\Test\Util\User\Dummy'));
		$bar = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$bar
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('bar'));
		$bar
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('B. Ar'));
		$bar
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('bar@dummy.com'));
		$bar
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(false));
		$bar
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('2323'));
		$bar
			->method('getLastLogin')
			->will($this->returnValue(3999));
		$bar
			->method('getHome')
			->will($this->returnValue('/home/bar'));
		$bar
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('\Test\Util\User\Dummy'));

		$this->container['UserManager']
			->expects($this->once())
			->method('find')
			->with('pattern', 10, 0)
			->will($this->returnValue([$foo, $admin, $bar]));
		$this->container['GroupManager']
			->expects($this->exactly(3))
			->method('getUserGroupIds')
			->will($this->onConsecutiveCalls(['Users', 'Support'], ['admins', 'Support'], ['External Users']));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->any())
			->method('getSubAdminsGroups')
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				0 => [
					'name' => 'foo',
					'displayname' => 'M. Foo',
					'groups' => ['Users', 'Support'],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 1024,
					'storageLocation' => '/home/foo',
					'lastLogin' => 500000,
					'backend' => 'OC_User_Database',
					'email' => 'foo@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
				],
				1 => [
					'name' => 'admin',
					'displayname' => 'S. Admin',
					'groups' => ['admins', 'Support'],
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 404,
					'storageLocation' => '/home/admin',
					'lastLogin' => 12000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'admin@bar.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => false,
				],
				2 => [
					'name' => 'bar',
					'displayname' => 'B. Ar',
					'groups' => ['External Users'],
					'subadmin' => [],
					'isEnabled' => false,
					'quota' => 2323,
					'storageLocation' => '/home/bar',
					'lastLogin' => 3999000,
					'backend' => '\Test\Util\User\Dummy',
					'email' => 'bar@dummy.com',
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
				],
			]
		);
		$response = $this->container['UsersController']->index(0, 10, '', 'pattern');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testIndexWithBackend() {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('foo'));
		$user
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('M. Foo'));
		$user
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue(null));
		$user
			->expects($this->once())
			->method('isEnabled')
			->will($this->returnValue(true));
		$user
			->expects($this->once())
			->method('getQuota')
			->will($this->returnValue('none'));
		$user
			->method('getLastLogin')
			->will($this->returnValue(500));
		$user
			->method('getHome')
			->will($this->returnValue('/home/foo'));
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('OC_User_Database'));
		$this->container['UserManager']
			->expects($this->once())
			->method('getBackends')
			->will($this->returnValue([new \OC\User\Database()]));
		$this->container['UserManager']
			->expects($this->once())
			->method('clearBackends');
		$this->container['UserManager']
			->expects($this->once())
			->method('find')
			->with('')
			->will($this->returnValue([$user]));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				0 => [
					'name' => 'foo',
					'displayname' => 'M. Foo',
					'groups' => null,
					'subadmin' => [],
					'isEnabled' => true,
					'quota' => 'none',
					'storageLocation' => '/home/foo',
					'lastLogin' => 500000,
					'backend' => 'OC_User_Database',
					'email' => null,
					'isRestoreDisabled' => false,
					'isAvatarAvailable' => true,
				]
			]
		);
		$response = $this->container['UsersController']->index(0, 10, '', '', '\Test\Util\User\Dummy');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testIndexWithBackendNoUser() {
		$this->container['IsAdmin'] = true;

		$this->container['UserManager']
			->expects($this->once())
			->method('getBackends')
			->will($this->returnValue([new \OC\User\Database()]));
		$this->container['UserManager']
			->expects($this->once())
			->method('find')
			->with('')
			->will($this->returnValue([]));

		$expectedResponse = new DataResponse([]);
		$response = $this->container['UsersController']->index(0, 10, '', '', '\Test\Util\User\Dummy');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithoutGroupAdmin() {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$user
			->method('getUID')
			->will($this->returnValue('foo'));
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('bar'));

		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->will($this->onConsecutiveCalls($user));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->any())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'groups' => null,
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
			],
			Http::STATUS_CREATED
		);
		$response = $this->container['UsersController']->create('foo', 'password', []);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithoutGroupSubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));

		$newUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$newUser
			->method('getUID')
			->will($this->returnValue('foo'));
		$newUser
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$newUser
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$newUser
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('bar'));
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$subGroup1 = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()->getMock();
		$subGroup1
			->expects($this->once())
			->method('addUser')
			->with($newUser);
		$subGroup2 = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()->getMock();
		$subGroup2
			->expects($this->once())
			->method('addUser')
			->with($newUser);

		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->will($this->returnValue($newUser));
		$this->container['GroupManager']
			->expects($this->exactly(2))
			->method('get')
			->will($this->onConsecutiveCalls($subGroup1, $subGroup2));
		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroupIds')
			->with($user)
			->will($this->onConsecutiveCalls(['SubGroup1', 'SubGroup2']));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->at(0))
			->method('getSubAdminsGroups')
			->will($this->returnValue([$subGroup1, $subGroup2]));
		$subadmin
			->expects($this->at(1))
			->method('getSubAdminsGroups')
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'groups' => ['SubGroup1', 'SubGroup2'],
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
			],
			Http::STATUS_CREATED
		);
		$response = $this->container['UsersController']->create('foo', 'password');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithGroupAdmin() {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$user
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$user
			->method('getUID')
			->will($this->returnValue('foo'));
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('bar'));
		$existingGroup = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()->getMock();
		$existingGroup
			->expects($this->once())
			->method('addUser')
			->with($user);
		$newGroup = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()->getMock();
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
			->method('getUserGroupIds')
			->with($user)
			->will($this->onConsecutiveCalls(['NewGroup', 'ExistingGroup']));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'groups' => ['NewGroup', 'ExistingGroup'],
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
			],
			Http::STATUS_CREATED
		);
		$response = $this->container['UsersController']->create('foo', 'password', ['NewGroup', 'ExistingGroup']);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateSuccessfulWithGroupSubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$newUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$newUser
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$newUser
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$newUser
			->method('getUID')
			->will($this->returnValue('foo'));
		$newUser
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('bar'));
		$subGroup1 = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()->getMock();
		$subGroup1
			->expects($this->any())
			->method('getGID')
			->will($this->returnValue('SubGroup1'));
		$subGroup1
			->expects($this->once())
			->method('addUser')
			->with($user);
		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->will($this->returnValue($newUser));
		$this->container['GroupManager']
			->expects($this->at(0))
			->method('get')
			->with('SubGroup1')
			->will($this->returnValue($subGroup1));
		$this->container['GroupManager']
			->expects($this->at(4))
			->method('get')
			->with('SubGroup1')
			->will($this->returnValue($subGroup1));
		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroupIds')
			->with($user)
			->will($this->onConsecutiveCalls(['SubGroup1']));
		$this->container['GroupManager']
			->expects($this->once())
			->method('getUserGroupIds')
			->with($newUser)
			->will($this->onConsecutiveCalls(['SubGroup1']));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->at(1))
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([$subGroup1]));
		$subadmin->expects($this->at(2))
			->method('getSubAdminsGroups')
			->with($newUser)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'groups' => ['SubGroup1'],
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
			],
			Http::STATUS_CREATED
		);
		$response = $this->container['UsersController']->create('foo', 'password', ['SubGroup1', 'ExistingGroup']);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateUnsuccessfulAdmin() {
		$this->container['IsAdmin'] = true;

		$this->container['UserManager']
			->method('createUser')
			->will($this->throwException(new \Exception()));

		$expectedResponse = new DataResponse(
			[
				'message' => 'Unable to create user.'
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->create('foo', 'password', []);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testCreateUnsuccessfulSubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('username'));
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));

		$this->container['UserManager']
			->method('createUser')
			->will($this->throwException(new \Exception()));

		$subgroup1 = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()
			->getMock();
		$subgroup1->expects($this->once())
			->method('getGID')
			->will($this->returnValue('SubGroup1'));
		$subgroup2 = $this->getMockBuilder('\OCP\IGroup')
			->disableOriginalConstructor()
			->getMock();
		$subgroup2->expects($this->once())
			->method('getGID')
			->will($this->returnValue('SubGroup2'));
		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([$subgroup1, $subgroup2]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				'message' => 'Unable to create user.'
			],
			Http::STATUS_FORBIDDEN
		);
		$response = $this->container['UsersController']->create('foo', 'password', []);
		$this->assertEquals($expectedResponse, $response);
	}

	public function testDestroySelfAdmin() {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));

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

	public function testDestroySelfSubadmin() {
		$this->container['IsAdmin'] = false;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));

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

	public function testDestroyAdmin() {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('Admin'));
		$toDeleteUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$toDeleteUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(true));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($toDeleteUser));

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

	public function testDestroySubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$toDeleteUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$toDeleteUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(true));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($toDeleteUser));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDeleteUser)
			->will($this->returnValue(true));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

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

	public function testDestroyUnsuccessfulAdmin() {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('Admin'));
		$toDeleteUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$toDeleteUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(false));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($toDeleteUser));

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

	public function testDestroyUnsuccessfulSubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));

		$toDeleteUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$toDeleteUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(false));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($toDeleteUser));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDeleteUser)
			->will($this->returnValue(true));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

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

	public function testDestroyNotAccessibleToSubAdmin() {
		$this->container['IsAdmin'] = false;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));

		$toDeleteUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($toDeleteUser));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDeleteUser)
			->will($this->returnValue(false));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

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
	public function testCreateUnsuccessfulWithInvalidEmailAdmin() {
		$this->container['IsAdmin'] = true;

		$expectedResponse = new DataResponse([
				'message' => 'Invalid mail address',
			],
			Http::STATUS_UNPROCESSABLE_ENTITY
		);
		$response = $this->container['UsersController']->create('foo', 'password', [], 'invalidMailAdress');
		$this->assertEquals($expectedResponse, $response);
	}

	/**
	 * test if a valid mail result in a successful mail send
	 */
	public function testCreateSuccessfulWithValidEmailAdmin() {
		$this->container['IsAdmin'] = true;
		$message = $this->getMockBuilder('\OC\Mail\Message')
			->disableOriginalConstructor()->getMock();
		$message
			->expects($this->at(0))
			->method('setTo')
			->with(['validMail@Adre.ss' => 'foo']);
		$message
			->expects($this->at(1))
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
			->expects($this->at(2))
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
			->expects($this->at(3))
			->method('setPlainBody')
			->with($plainBody->render());
		$message
			->expects($this->at(4))
			->method('setFrom')
			->with(['no-reply@owncloud.com' => null]);

		$this->container['Mailer']
			->expects($this->at(0))
			->method('validateMailAddress')
			->with('validMail@Adre.ss')
			->will($this->returnValue(true));
		$this->container['Mailer']
			->expects($this->at(1))
			->method('createMessage')
			->will($this->returnValue($message));
		$this->container['Mailer']
			->expects($this->at(2))
			->method('send')
			->with($message);

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$user
			->method('getHome')
			->will($this->returnValue('/home/user'));
		$user
			->method('getUID')
			->will($this->returnValue('foo'));
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue('bar'));

		$this->container['UserManager']
			->expects($this->once())
			->method('createUser')
			->will($this->onConsecutiveCalls($user));
		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$response = $this->container['UsersController']->create('foo', 'password', [], 'validMail@Adre.ss');
		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
	}

	private function mockUser($userId = 'foo', $displayName = 'M. Foo', $isEnabled = true,
							  $lastLogin = 500, $home = '/home/foo', $backend = 'OC_User_Database') {
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue($userId));
		$user
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue($displayName));
		$user
			->method('isEnabled')
			->will($this->returnValue($isEnabled));
		$user
			->method('getLastLogin')
			->will($this->returnValue($lastLogin));
		$user
			->method('getHome')
			->will($this->returnValue($home));
		$user
			->expects($this->once())
			->method('getBackendClassName')
			->will($this->returnValue($backend));

		$result = [
			'name' => $userId,
			'displayname' => $displayName,
			'groups' => null,
			'subadmin' => [],
			'isEnabled' => $isEnabled,
			'quota' => null,
			'storageLocation' => $home,
			'lastLogin' => $lastLogin * 1000,
			'backend' => $backend,
			'email' => null,
			'isRestoreDisabled' => false,
			'isAvatarAvailable' => true,
		];

		return [$user, $result];
	}

	public function testRestorePossibleWithoutEncryption() {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function testRestorePossibleWithAdminAndUserRestore() {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();

		$this->container['OCP\\App\\IAppManager']
			->expects($this->once())
			->method('isEnabledForUser')
			->with(
				$this->equalTo('encryption')
			)
			->will($this->returnValue(true));
		$this->container['Config']
			->expects($this->once())
			->method('getAppValue')
			->with(
				$this->equalTo('encryption'),
				$this->equalTo('recoveryAdminEnabled'),
				$this->anything()
			)
			->will($this->returnValue('1'));

		$this->container['Config']
			->expects($this->at(1))
			->method('getUserValue')
			->with(
				$this->anything(),
				$this->equalTo('encryption'),
				$this->equalTo('recoveryEnabled'),
				$this->anything()
			)
			->will($this->returnValue('1'));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function testRestoreNotPossibleWithoutAdminRestore() {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();

		$this->container['OCP\\App\\IAppManager']
			->method('isEnabledForUser')
			->with(
				$this->equalTo('encryption')
			)
			->will($this->returnValue(true));

		$expectedResult['isRestoreDisabled'] = true;

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function testRestoreNotPossibleWithoutUserRestore() {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();

		$this->container['OCP\\App\\IAppManager']
			->expects($this->once())
			->method('isEnabledForUser')
			->with(
				$this->equalTo('encryption')
			)
			->will($this->returnValue(true));
		$this->container['Config']
			->expects($this->once())
			->method('getAppValue')
			->with(
				$this->equalTo('encryption'),
				$this->equalTo('recoveryAdminEnabled'),
				$this->anything()
			)
			->will($this->returnValue('1'));

		$this->container['Config']
			->expects($this->at(1))
			->method('getUserValue')
			->with(
				$this->anything(),
				$this->equalTo('encryption'),
				$this->equalTo('recoveryEnabled'),
				$this->anything()
			)
			->will($this->returnValue('0'));

		$expectedResult['isRestoreDisabled'] = true;

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function testNoAvatar() {
		$this->container['IsAdmin'] = true;

		list($user, $expectedResult) = $this->mockUser();

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('getSubAdminsGroups')
			->with($user)
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$this->container['OCP\\IAvatarManager']
			->method('getAvatar')
			->will($this->throwException(new \OCP\Files\NotFoundException()));
		$expectedResult['isAvatarAvailable'] = false;

		$result = self::invokePrivate($this->container['UsersController'], 'formatUserForIndex', [$user]);
		$this->assertEquals($expectedResult, $result);
	}

	public function dataforemailaddress() {
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
	 */
	public function testSetSelfEmailAddress($userName, $userPassword, $loginUser, $setUser, $emailAddress) {
		\OC::$server->getUserManager()->createUser($userName, $userPassword);

		$appName = "settings";
		$irequest = $this->createMock(IRequest::class);
		$userManager = $this->createMock(IUserManager::class);
		$groupManager = $this->createMock(Manager::class);
		$userSession = $this->createMock(Session::class);
		$iConfig = $this->createMock(IConfig::class);
		$iSecureRandom = $this->createMock(ISecureRandom::class);
		$iL10 = $this->createMock(IL10N::class);
		$iLogger = $this->createMock(ILogger::class);
		$ocDefault = $this->getMockBuilder('\OC_Defaults')
			->disableOriginalConstructor()->getMock();
		$iMailer = $this->createMock(IMailer::class);
		$iTimeFactory = $this->createMock(ITimeFactory::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$appManager = $this->createMock(IAppManager::class);
		$iAvatarManager = $this->createMock(IAvatarManager::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userController = new UsersController($appName, $irequest, $userManager, $groupManager,
			$userSession, $iConfig, $iSecureRandom, false, $iL10, $iLogger, $ocDefault, $iMailer,
			$iTimeFactory, "", $urlGenerator, $appManager, $iAvatarManager, $eventDispatcher);

		$this->loginAsUser($loginUser);

		$iUser = $this->createMock(IUser::class);
		$userManager->method('get')->willReturn($iUser);
		$iUser->method('getUID')->willReturn($loginUser);
		$userSession->expects($this->any())
			->method('getUser')
			->willReturn($iUser);
		$subAdmin = $this->createMock(SubAdmin::class);
		$subAdmin->method('isSubAdmin')->with($iUser)->willReturn(false);
		$groupManager->expects($this->any())
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
	}

	public function setDataForSendMail() {
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
	public function testSetEmailAddressSendEmail($id, $mailaddress) {
		$appName = "settings";
		$irequest = $this->createMock(IRequest::class);
		$userManager = $this->createMock(IUserManager::class);
		$groupManager = $this->createMock(IGroupManager::class);
		$userSession = $this->createMock(Session::class);
		$iConfig = $this->createMock(IConfig::class);
		$iSecureRandom = $this->createMock(ISecureRandom::class);
		$iL10 = $this->createMock(IL10N::class);
		$iLogger = $this->createMock(ILogger::class);
		$ocDefault = $this->getMockBuilder('\OC_Defaults')
			->disableOriginalConstructor()->getMock();
		$iMailer = $this->createMock(IMailer::class);
		$iTimeFactory = $this->createMock(ITimeFactory::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$appManager = $this->createMock(IAppManager::class);
		$iAvatarManager = $this->createMock(IAvatarManager::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$userController = new UsersController($appName, $irequest, $userManager, $groupManager,
			$userSession, $iConfig, $iSecureRandom, false, $iL10, $iLogger, $ocDefault, $iMailer,
			$iTimeFactory, "", $urlGenerator, $appManager, $iAvatarManager, $eventDispatcher);

		$this->loginAsUser($id);

		$iUser = $this->createMock(IUser::class);
		$iUser->expects($this->once())
			->method('canChangeDisplayName')
			->willReturn(true);
		$userManager->method('get')->willReturn($iUser);
		$iUser->method('getUID')->willReturn($id);
		$userSession->expects($this->any())
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
	public function setEmailAddressData() {
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
	 * @param bool $canChangeDisplayName
	 * @param bool $responseCode
	 */
	public function testSetEmailAddress($mailAddress, $isValid, $expectsUpdate, $canChangeDisplayName, $responseCode) {
		$this->container['IsAdmin'] = true;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('foo'));
		$user
			->expects($this->any())
			->method('getEMailAddress')
			->will($this->returnValue('foo@local'));
		$user
			->expects($this->any())
			->method('canChangeDisplayName')
			->will($this->returnValue($canChangeDisplayName));
		$user
			->expects($this->any())
			->method('setEMailAddress')
			->with(
				$this->equalTo($mailAddress)
			);

		$this->container['UserSession']
			->expects($this->atLeastOnce())
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['Mailer']
			->expects($this->any())
			->method('validateMailAddress')
			->with($mailAddress)
			->willReturn($isValid);

		if ($isValid) {
			$user->expects($this->atLeastOnce())
				->method('canChangeDisplayName')
				->willReturn(true);
		}

		$this->container['Config']
			->expects($this->any())
			->method('getUserValue')
			->with('foo', 'owncloud', 'changeMail')
			->will($this->returnValue('12000:AVerySecretToken'));
		$this->container['TimeFactory']
			->expects($this->any())
			->method('getTime')
			->willReturnOnConsecutiveCalls(12301, 12348);
		$this->container['UserManager']
			->expects($this->atLeastOnce())
			->method('get')
			->with('foo')
			->will($this->returnValue($user));
		$this->container['SecureRandom']
			->expects($this->any())
			->method('generate')
			->with('21')
			->will($this->returnValue('ThisIsMaybeANotSoSecretToken!'));
		$this->container['Config']
			->expects($this->any())
			->method('setUserValue')
			->with('foo', 'owncloud', 'changeMail', '12348:ThisIsMaybeANotSoSecretToken!');
		$this->container['URLGenerator']
			->expects($this->any())
			->method('linkToRouteAbsolute')
			->will($this->returnValue('https://ownCloud.com/index.php/mailaddress/'));

		$message = $this->getMockBuilder('\OC\Mail\Message')
			->disableOriginalConstructor()->getMock();
		$message
			->expects($this->any())
			->method('setTo')
			->with(['foo@local' => 'foo']);
		$message
			->expects($this->any())
			->method('setSubject')
			->with(' email address confirm');
		$message
			->expects($this->any())
			->method('setPlainBody')
			->with('Use the following link to confirm your changes to the email address: https://ownCloud.com/index.php/mailaddress/');
		$message
			->expects($this->any())
			->method('setFrom')
			->with(['changemail-noreply@localhost' => null]);
		$this->container['Mailer']
			->expects($this->any())
			->method('createMessage')
			->will($this->returnValue($message));
		$this->container['Mailer']
			->expects($this->any())
			->method('send')
			->with($message);

		$response = $this->container['UsersController']->setMailAddress($user->getUID(), $mailAddress);
		$this->assertSame($responseCode, $response->getStatus());
	}

	public function testStatsAdmin() {
		$this->container['IsAdmin'] = true;

		$this->container['UserManager']
			->expects($this->at(0))
			->method('countUsers')
			->will($this->returnValue([128, 44]));

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
	public function testStatsSubAdmin() {
		$this->container['IsAdmin'] = false;

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();

		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($user));

		$group1 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$group1
			->expects($this->once())
			->method('getUsers')
			->will($this->returnValue(['foo' => 'M. Foo', 'admin' => 'S. Admin']));

		$group2 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()->getMock();
		$group2
			->expects($this->once())
			->method('getUsers')
			->will($this->returnValue(['bar' => 'B. Ar']));

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin
			->expects($this->at(0))
			->method('getSubAdminsGroups')
			->will($this->returnValue([$group1, $group2]));

		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$expectedResponse = new DataResponse(
			[
				'totalUsers' => 3
			]
		);

		$response = $this->container['UsersController']->stats();
		$this->assertEquals($expectedResponse, $response);
	}

	public function testSetDisplayNameNull() {
		$user = $this->createMock('\OCP\IUser');
		$user->method('getUID')->willReturn('userName');

		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($user);

		$expectedResponse = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'Authentication error',
				],
			]
		);
		$response = $this->container['UsersController']->setDisplayName(null, 'displayName');

		$this->assertEquals($expectedResponse, $response);
	}

	public function dataSetDisplayName() {
		$data = [];

		$user1 = $this->createMock('\OCP\IUser');
		$user1->method('getUID')->willReturn('user1');
		$user1->method('canChangeDisplayName')->willReturn(true);
		$data[] = [$user1, $user1, false, false, true];

		$user1 = $this->createMock('\OCP\IUser');
		$user1->method('getUID')->willReturn('user1');
		$user1->method('canChangeDisplayName')->willReturn(false);
		$data[] = [$user1, $user1, false, false, false];

		$user1 = $this->createMock('\OCP\IUser');
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock('\OCP\IUser');
		$user2->method('getUID')->willReturn('user2');
		$user2->method('canChangeDisplayName')->willReturn(true);
		$data[] = [$user1, $user2, false, false, false];

		$user1 = $this->createMock('\OCP\IUser');
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock('\OCP\IUser');
		$user2->method('getUID')->willReturn('user2');
		$user2->method('canChangeDisplayName')->willReturn(true);
		$data[] = [$user1, $user2, true, false, true];

		$user1 = $this->createMock('\OCP\IUser');
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock('\OCP\IUser');
		$user2->method('getUID')->willReturn('user2');
		$user2->method('canChangeDisplayName')->willReturn(true);
		$data[] = [$user1, $user2, false, true, true];

		return $data;
	}

	/**
	 * @dataProvider dataSetDisplayName
	 */
	public function testSetDisplayName($currentUser, $editUser, $isAdmin, $isSubAdmin, $valid) {
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->willReturn($currentUser);
		$this->container['UserManager']
			->expects($this->once())
			->method('get')
			->with($editUser->getUID())
			->willReturn($editUser);

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
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
						'message' => 'Authentication error',
					],
				]
			);
		}

		$response = $this->container['UsersController']->setDisplayName($editUser->getUID(), 'newDisplayName');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testSetDisplayNameFails() {
		$user = $this->createMock('\OCP\IUser');
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

		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
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

	public function testDifferentLoggedUserAndRequestUser() {
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
			->will($this->returnValue($userObject));
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($diffUserObject));
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

	public function testInvalidEmailChangeToken() {
		$token = 'AVerySecretToken';
		$userId = 'ExistingUser';
		$mailAddress = 'sample@email.com';
		$userObject = $this->getMockBuilder('OCP\IUser')
			->disableOriginalConstructor()->getMock();

		$this->container['UserManager']
			->expects($this->atLeastOnce())
			->method('get')
			->with($userId)
			->will($this->returnValue($userObject));
		$this->container['UserSession']
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($userObject));
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
	
	public function testDisableSelfAdmin() {
		$this->container['IsAdmin'] = true;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
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

	public function testEnableSelfAdmin() {
		$this->container['IsAdmin'] = true;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
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

	public function testDisableSelfSubadmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
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

	public function testEnableSelfSubadmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
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

	public function testDisableAdmin() {
		$this->container['IsAdmin'] = true;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('Admin'));
		$toDisableUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToDisable')
			->will($this->returnValue($toDisableUser));
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

	public function testEnableAdmin() {
		$this->container['IsAdmin'] = true;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('Admin'));
		$toEnableUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToEnable')
			->will($this->returnValue($toEnableUser));
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

	public function testDisableSubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$toDisableUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToDisable')
			->will($this->returnValue($toDisableUser));
		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDisableUser)
			->will($this->returnValue(true));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));
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

	public function testEnableSubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$toEnableUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToEnable')
			->will($this->returnValue($toEnableUser));
		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toEnableUser)
			->will($this->returnValue(true));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));
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
	
	public function testDisableNotAccessibleToSubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$toDisableUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToDisable')
			->will($this->returnValue($toDisableUser));
		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toDisableUser)
			->will($this->returnValue(false));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));
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

	public function testEnableNotAccessibleToSubAdmin() {
		$this->container['IsAdmin'] = false;
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('myself'));
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$toEnableUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$this->container['UserSession']
			->method('getUser')
			->will($this->returnValue($user));
		$this->container['UserManager']
			->method('get')
			->with('UserToEnable')
			->will($this->returnValue($toEnableUser));
		$subadmin = $this->getMockBuilder('\OC\SubAdmin')
			->disableOriginalConstructor()
			->getMock();
		$subadmin->expects($this->once())
			->method('isUserAccessible')
			->with($user, $toEnableUser)
			->will($this->returnValue(false));
		$this->container['GroupManager']
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));
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

	public function testCreateSuccessfulWithEmailAndUsername() {
		$this->container['Mailer']->expects($this->once())
			->method('validateMailAddress')
			->willReturn(true);

		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();

		//$user = $this->createMock(IUser::class);

		$this->container['UserSession']->method('getUser')
			->willReturn($user);

		$this->container['GroupManager']
			->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(true));

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
			->will($this->returnValue([]));
		$this->container['GroupManager']
			->method('getSubAdmin')
			->will($this->returnValue($subadmin));

		$response = $this->container['UsersController']->create('foobazz', '', [], 'validMail@Adre.ss');
		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
	}

	public function testSetPasswordForm() {
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
			'settings', 'setpassword',
			['link' => 'http://localhost/apps/settings/setpassword/form/1234/foo'],
			'guest'), $result);
	}

	public function providesUserTokenExceptionData() {
		return [
			['invalid_token'],
			['expired_token'],
			['mismatch_token']
		];
	}

	/**
	 * @dataProvider providesUserTokenExceptionData
	 */
	public function testSetPasswordFormExceptionResponse($tokenException) {
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
				new Http\TemplateResponse('settings', 'resendtokenbymail',
					['link' => 'http://localhost/settings/setpassword/form/1234/foo'],
					'guest'), $result);
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
					'core', 'error',
					['errors' => [['error' => 'The token provided is invalid.']]], 'guest'), $result
			);
		} elseif ($tokenException === 'invalid_token') {
			$this->container['Config']->expects($this->once())
				->method('getUserValue')
				->willReturn('');
			$result = $this->container['UsersController']->setPasswordForm('fooBaZ1', 'foo');
			$this->assertEquals(
				new Http\TemplateResponse('core', 'error',
					['errors' => [["error" => 'The token provided is invalid.']]], 'guest'), $result);
		}
	}

	public function testResendToken() {
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
				'settings', 'tokensendnotify',
				[], 'guest'), $result);
	}

	/**
	 * @param $conditionForException
	 */
	public function testResendTokenNullUserResponse() {
		$result = $this->container['UsersController']->resendToken('foo');
		$this->assertEquals(
			new Http\TemplateResponse(
				'core', 'error',
				["errors" => [["error" =>"Failed to create activation link. Please contact your administrator."]]],
				'guest'), $result);
	}

	public function testResendTokenEmailNotSendResponse() {
		$user = $this->createMock(IUser::class);

		$this->container['UserManager']->expects($this->once())
			->method('get')
			->willReturn($user);
		$result = $this->container['UsersController']->resendToken('foo');
		$this->assertEquals(
			new Http\TemplateResponse(
				'core', 'error',
				["errors" => [["error" =>"Failed to create activation link. Please contact your administrator."]]],
				'guest'), $result);
	}

	public function testResendTokenSendMailFailedResponse() {
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
			->willThrowException(new \Exception('Mail can not be sent'));
		$result = $this->container['UsersController']->resendToken('foo');
		$this->assertEquals(
			new Http\TemplateResponse(
				'core', 'error',
				["errors" => [["error" =>"Can't send email to the user. Contact your administrator."]]],
				'guest'), $result);
	}

	/**
	 * @param $conditionForException
	 */
	public function testSetPasswordNullUserExcception() {
		$result = $this->container['UsersController']->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(
			new Http\JSONResponse(
				[
					'status' => 'error',
					'message' => 'Failed to set password. Please contact the administrator.',
					'type' => 'usererror'
				], Http::STATUS_NOT_FOUND
			), $result);
	}

	public function testSetPasswordInvalidTokenExcception() {
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
			], Http::STATUS_UNAUTHORIZED
		), $result);
	}

	public function testSetPasswordPolicyException() {
		$user = $this->createMock(IUser::class);
		$user->method('setPassword')
			->willThrowException(new \Exception('Can not set user password, because password does not comply with policy.'));
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
			], Http::STATUS_FORBIDDEN
		);
		$result = $this->container['UsersController']->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals($expectedResult, $result);
	}

	public function testSetPasswordExpiredTokenException() {
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
			], Http::STATUS_UNAUTHORIZED
		), $result);
	}

	public function testSetPasswordMismatchTokenException() {
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
			], Http::STATUS_UNAUTHORIZED
		), $result);
	}

	public function testSetPasswordSetFailed() {
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
			], Http::STATUS_FORBIDDEN
		), $result);
	}

	public function testSetPassword() {
		$request = $this->createMock(IRequest::class);
		$userManager = $this->createMock(IUserManager::class);
		$groupManager = $this->createMock(IGroupManager::class);
		$userSession = $this->createMock(Session::class);
		$config = $this->createMock(IConfig::class);
		$secureRandom = $this->createMock(ISecureRandom::class);
		$l10n = $this->createMock(IL10N::class);
		$logger = $this->createMock(ILogger::class);
		$defaults = $this->createMock(\OC_Defaults::class);
		$mailer = $this->createMock(IMailer::class);
		$timeFactory = $this->createMock(ITimeFactory::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$appManager = $this->createMock(IAppManager::class);
		$avatarManager = $this->createMock(IAvatarManager::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$usersController = new UsersController('settings', $request,
			$userManager, $groupManager, $userSession, $config, $secureRandom,
			'true', $l10n, $logger, $defaults, $mailer, $timeFactory,
			'no-reply@foo.com', $urlGenerator, $appManager, $avatarManager,
			$eventDispatcher);

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

		$fromMailAddress = $this->invokePrivate($usersController, 'fromMailAddress', []);

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

		$result = $usersController->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(new Http\JSONResponse(['status' => 'success']), $result);
		$this->assertNotEquals($fromMailAddress, 'foo@bar.com');
		$this->assertEquals($fromMailAddress, 'no-reply@foo.com');
	}

	public function testSetPasswordSendMailFailed() {
		$request = $this->createMock(IRequest::class);
		$userManager = $this->createMock(IUserManager::class);
		$groupManager = $this->createMock(IGroupManager::class);
		$userSession = $this->createMock(Session::class);
		$config = $this->createMock(IConfig::class);
		$secureRandom = $this->createMock(ISecureRandom::class);
		$l10n = $this->createMock(IL10N::class);
		$logger = $this->createMock(ILogger::class);
		$defaults = $this->createMock(\OC_Defaults::class);
		$mailer = $this->createMock(IMailer::class);
		$timeFactory = $this->createMock(ITimeFactory::class);
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$appManager = $this->createMock(IAppManager::class);
		$avatarManager = $this->createMock(IAvatarManager::class);
		$eventDispatcher = $this->createMock(EventDispatcher::class);
		$usersController = new UsersController('settings', $request,
			$userManager, $groupManager, $userSession, $config, $secureRandom,
			'true', $l10n, $logger, $defaults, $mailer, $timeFactory,
			'no-reply@foo.com', $urlGenerator, $appManager, $avatarManager,
			$eventDispatcher);

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
			->willThrowException(new \Exception('can not send mail'));
		$l10n->method('t')
			->willReturn('Failed to send email. Please contact your administrator.');

		$result = $usersController->setPassword('fooBaZ1', 'foo', '123');
		$this->assertEquals(new Http\JSONResponse(
			[
				'status' => 'error',
				'message' => 'Failed to send email. Please contact your administrator.',
				'type' => 'emailsendfailed'
			], Http::STATUS_INTERNAL_SERVER_ERROR
		), $result);
	}

	/**
	 * First create a user with wrong email id,
	 * then delete the user. Again create the same user with
	 * a proper email id. Later try to set the password for the
	 * user. The token of the user should not be deleted, if it
	 * is a mismatch.
	 */
	public function testInvalidTokenNotDeleted() {
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->willReturn('foo');
		$user->expects($this->any())
			->method('delete')
			->willReturn(true);

		$adminUser = $this->createMock(IUser::class);
		$adminUser->expects($this->any())
			->method('getUID')
			->willReturn('admin');

		$subAdmin = $this->createMock(SubAdmin::class);
		$subAdmin->expects($this->any())
			->method('getSubAdminsGroups')
			->willReturn([]);
		$subAdmin->expects($this->any())
			->method('isUserAccessible')
			->willReturn(true);

		$this->container['Mailer']->expects($this->any())
			->method('validateMailAddress')
			->willReturn(true);

		$this->container['UserSession']->expects($this->any())
			->method('getUser')
			->willReturn($adminUser);

		$this->container['GroupManager']->expects($this->any())
			->method('getSubAdmin')
			->willReturn($subAdmin);

		$this->container['UserManager']->expects($this->any())
			->method('userExists')
			->willReturn(false);

		$userInstance = $this->createMock(User::class);
		$userInstance->expects($this->any())
			->method('getUID')
			->willReturn('foo');

		$this->container['UserManager']->expects($this->any())
			->method('createUser')
			->willReturn($userInstance);

		$message = $this->createMock(Message::class);
		$message->expects($this->any())
			->method('setTo')
			->willReturn($message);
		$message->expects($this->any())
			->method('setSubject')
			->willReturn($message);
		$message->expects($this->any())
			->method('setHtmlBody')
			->willReturn($message);
		$message->expects($this->any())
			->method('setPlainBody')
			->willReturn($message);
		$message->expects($this->any())
			->method('setFrom')
			->willReturn($message);

		$this->container['Mailer']->expects($this->any())
			->method('createMessage')
			->willReturn($message);
		$this->container['Mailer']->expects($this->any())
			->method('send')
			->with($message)
			->willReturn([]);

		//Create a user first
		$firstCreateResult = $this->container['UsersController']->create('foo', null, [], 'bar@bar.com');
		$this->assertEquals(Http::STATUS_CREATED, $firstCreateResult->getStatus());

		$this->container['UserManager']->expects($this->any())
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
		$this->container['Config']->expects($this->any())
			->method('getUserValue')
			->willReturn('foo:AsDfGh12345');
		$result = $this->container['UsersController']->setPassword('AsDfGh1234', 'foo', 'foobar');
		$this->assertEquals(Http::STATUS_UNAUTHORIZED, $result->getStatus());
		$this->assertEquals('error', $result->getData()['status']);
		$this->assertEquals('The token provided is invalid.', $result->getData()['message']);
		$this->assertEquals('tokenfailure', $result->getData()['type']);
	}
}
