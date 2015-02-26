<?php
/**
 * @author Lukas Reschke
 * @copyright 2014-2015 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\user_webdavauth\Tests;

use OCA\user_webdavauth\USER_WEBDAVAUTH;
use Test\TestCase;
use OCP\IConfig;
use OCP\IDb;
use OC\HTTPHelper;
use OCP\ILogger;
use OCP\IUserManager;

/**
 * Class USER_WEBDAVAUTHTEST
 *
 * @package OCA\user_webdavauth\Tests
 */
class USER_WEBDAVAUTHTEST extends TestCase {
	/** @var USER_WEBDAVAUTH */
	private $userWebDavAuth;
	/** @var IConfig */
	private $config;
	/** @var IDb */
	private $db;
	/** @var HTTPHelper */
	private $httpHelper;
	/** @var ILogger */
	private $logger;
	/** @var IUserManager */
	private $userManager;

	protected function setUp() {
		parent::setUp();

		$this->config = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()->getMock();
		$this->db = $this->getMockBuilder('\OCP\IDb')
			->disableOriginalConstructor()->getMock();
		$this->httpHelper = $this->getMockBuilder('\OC\HTTPHelper')
			->disableOriginalConstructor()->getMock();
		$this->logger = $this->getMockBuilder('\OCP\ILogger')
			->disableOriginalConstructor()->getMock();
		$this->userManager = $this->getMockBuilder('\OCP\IUserManager')
			->disableOriginalConstructor()->getMock();

		$this->userWebDavAuth = new USER_WEBDAVAUTH(
			$this->config,
			$this->db,
			$this->httpHelper,
			$this->logger,
			$this->userManager,
			'/var/www/owncloud'
		);
	}

	public function urlProvider()
	{
		return array(
			array(false, 'file://fo', 'user', 'password'),
			array('http://lukas:test@dav.owncloud.org/testpoint/', 'http://dav.owncloud.org/testpoint/', 'lukas', 'test'),
			array('https://lukas:test@dav.owncloud.org/testpoint/', 'HTTPS://DAV.OWNCLOUD.org/testpoint/', 'lukas', 'test'),
			array('https://CrazyUserN%40me%2F%2A%2A%2A%2A%2F_%C3%A0a%C2%A3:CrazyP%40ssword%2F%2A%2A%2A%2A%2F_%C3%A0a%C2%A3@dav.owncloud.org/testpoint/', 'HTTPS://DAV.OWNCLOUD.org/testpoint/', 'CrazyUserN@me/****/_àa£', 'CrazyP@ssword/****/_àa£'),
		);
	}

	/**
	 * @dataProvider urlProvider
	 * @param string $expected
	 * @param string $endpointUrl
	 * @param string $uid
	 * @param string $password
	 */
	public function testCreateAuthUrl($expected, $endpointUrl, $uid, $password) {
		$this->assertSame($expected, \Test_Helper::invokePrivate($this->userWebDavAuth, 'createAuthUrl', [$endpointUrl, $uid, $password]));
	}

	public function testCheckPasswordNotExistingUser() {
		/** @var USER_WEBDAVAUTH $webDavAuth */
		$webDavAuth = $this->getMockBuilder('\OCA\user_webdavauth\USER_WEBDAVAUTH')
			->setConstructorArgs([
					$this->config,
					$this->db,
					$this->httpHelper,
					$this->logger,
					$this->userManager,
					'/var/www/owncloud'
				]
			)
			->setMethods(['userExists'])
			->getMock();
		$webDavAuth->expects($this->once())
			->method('userExists')
			->with('lukas')
			->will($this->returnValue(false));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('user_webdavauth_url')
			->will($this->returnValue('http://dav.owncloud.org/testpoint/'));
		$this->httpHelper->expects($this->once())
			->method('getHeaders')
			->with('http://lukas:test1234@dav.owncloud.org/testpoint/')
			->will($this->returnValue(['HTTP/1.1 200 OK']));
		$this->db->expects($this->once())
			->method('prepareQuery')
			->with('INSERT INTO `*PREFIX*webdav_user_mapping` (`uid`) VALUES (?)')
			->will($this->returnValue($this->getMockBuilder('\OC_DB_StatementWrapper')
				->disableOriginalConstructor()->getMock()));

		$this->assertEquals('lukas', $webDavAuth->checkPassword('lukas', 'test1234'));
	}
	public function testCheckPasswordCorrectExistingUserInAnotherBackend() {
		/** @var USER_WEBDAVAUTH $webDavAuth */
		$webDavAuth = $this->getMockBuilder('\OCA\user_webdavauth\USER_WEBDAVAUTH')
			->setConstructorArgs([
					$this->config,
					$this->db,
					$this->httpHelper,
					$this->logger,
					$this->userManager,
					'/var/www/owncloud'
				]
			)
			->setMethods(['userExists'])
			->getMock();
		$this->userManager->expects($this->once())
			->method('removeBackend');
		$this->userManager->expects($this->once())
			->method('userExists')
			->with('lukas')
			->will($this->returnValue(true));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('user_webdavauth_url')
			->will($this->returnValue('http://dav.owncloud.org/testpoint/'));
		$this->httpHelper->expects($this->once())
			->method('getHeaders')
			->with('http://lukas:test1234@dav.owncloud.org/testpoint/')
			->will($this->returnValue(['HTTP/1.1 200 OK']));

		$this->assertEquals(false, $webDavAuth->checkPassword('lukas', 'test1234'));
	}

	public function testCheckPasswordCorrectExistingUser() {
		/** @var USER_WEBDAVAUTH $webDavAuth */
		$webDavAuth = $this->getMockBuilder('\OCA\user_webdavauth\USER_WEBDAVAUTH')
			->setConstructorArgs([
					$this->config,
					$this->db,
					$this->httpHelper,
					$this->logger,
					$this->userManager,
					'/var/www/owncloud'
				]
			)
			->setMethods(['userExists'])
			->getMock();
		$this->userManager->expects($this->once())
			->method('removeBackend');
		$this->userManager->expects($this->once())
			->method('userExists')
			->with('lukas')
			->will($this->returnValue(false));
		$webDavAuth->expects($this->once())
			->method('userExists')
			->with('lukas')
			->will($this->returnValue(true));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('user_webdavauth_url')
			->will($this->returnValue('http://dav.owncloud.org/testpoint/'));
		$this->httpHelper->expects($this->once())
			->method('getHeaders')
			->with('http://lukas:test1234@dav.owncloud.org/testpoint/')
			->will($this->returnValue(['HTTP/1.1 200 OK']));

		$this->assertEquals('lukas', $webDavAuth->checkPassword('lukas', 'test1234'));
	}

	public function testCheckPasswordIncorrect() {
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('user_webdavauth_url')
			->will($this->returnValue('http://dav.owncloud.org/testpoint/'));
		$this->httpHelper->expects($this->once())
			->method('getHeaders')
			->with('http://User%40Foobar.com%2F..%2F:%2F..%2FMy%40Password123%2F._%C3%A5%C3%A9@dav.owncloud.org/testpoint/')
			->will($this->returnValue(['HTTP/1.1 403 Forbidden']));

		$this->assertEquals(false, $this->userWebDavAuth->checkPassword('User@Foobar.com/../', '/../My@Password123/._åé'));
	}

	public function testGetHomeExistingUser() {
		/** @var USER_WEBDAVAUTH $webDavAuth */
		$webDavAuth = $this->getMockBuilder('\OCA\user_webdavauth\USER_WEBDAVAUTH')
			->setConstructorArgs([
					$this->config, $this->db,
					$this->httpHelper,
					$this->logger,
					$this->userManager,
					'/var/www/owncloud'
				]
			)
			->setMethods(['userExists'])
			->getMock();
		$webDavAuth->expects($this->once())
			->method('userExists')
			->with('lukas')
			->will($this->returnValue(true));
		$this->config->expects($this->once())
			->method('getSystemValue')
			->with('datadirectory',  \OC::$SERVERROOT . '/data')
			->will($this->returnValue('/var/www/owncloud/data'));

		$this->assertSame('/var/www/owncloud/data/lukas', $webDavAuth->getHome('lukas'));
	}

	public function testGetHomeNotExistingUser() {
		/** @var USER_WEBDAVAUTH $webDavAuth */
		$webDavAuth = $this->getMockBuilder('\OCA\user_webdavauth\USER_WEBDAVAUTH')
			->setConstructorArgs([
					$this->config, $this->db,
					$this->httpHelper,
					$this->logger,
					$this->userManager,
					'/var/www/owncloud'
				]
			)
			->setMethods(['userExists'])
			->getMock();
		$webDavAuth->expects($this->once())
			->method('userExists')
			->with('NotExisting')
			->will($this->returnValue(false));

		$this->assertSame(false, $webDavAuth->getHome('NotExisting'));
	}

	public function testSetDisplayNameExistingUser() {
		/** @var USER_WEBDAVAUTH $webDavAuth */
		$webDavAuth = $this->getMockBuilder('\OCA\user_webdavauth\USER_WEBDAVAUTH')
			->setConstructorArgs([
					$this->config, $this->db,
					$this->httpHelper,
					$this->logger,
					$this->userManager,
					'/var/www/owncloud'
				]
			)
			->setMethods(['userExists'])
			->getMock();
		$webDavAuth->expects($this->once())
			->method('userExists')
			->with('lukas')
			->will($this->returnValue(true));
		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->once())
			->method('execute');
		$this->db->expects($this->once())
			->method('prepareQuery')
			->with('UPDATE `*PREFIX*webdav_user_mapping` SET `displayname` = ? WHERE LOWER(`uid`) = LOWER(?)')
			->will($this->returnValue($query));

		$this->assertSame(true, $webDavAuth->setDisplayName('lukas', 'Lukas Reschke'));
	}

	public function testSetDisplayNameNotExistingUser() {
		/** @var USER_WEBDAVAUTH $webDavAuth */
		$webDavAuth = $this->getMockBuilder('\OCA\user_webdavauth\USER_WEBDAVAUTH')
			->setConstructorArgs([
					$this->config, $this->db,
					$this->httpHelper,
					$this->logger,
					$this->userManager,
					'/var/www/owncloud'
				]
			)
			->setMethods(['userExists'])
			->getMock();
		$webDavAuth->expects($this->once())
			->method('userExists')
			->with('NotExisting')
			->will($this->returnValue(false));

		$this->assertSame(false, $webDavAuth->setDisplayName('NotExisting', 'DisplaynameToSet'));
	}

	public function testCountUsers() {
		$execute = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$execute->expects($this->once())
			->method('fetchOne')
			->will($this->returnValue(5));

		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->once())
			->method('execute')
			->will($this->returnValue($execute));

		$this->db->expects($this->once())
			->method('prepareQuery')
			->with('SELECT COUNT(*) FROM `*PREFIX*webdav_user_mapping`')
			->will($this->returnValue($query));

		$this->assertSame(5, $this->userWebDavAuth->countUsers());
	}

	public function testDeleteUser() {
		$this->assertSame(false, $this->userWebDavAuth->deleteUser(''));
	}

	public function testGetUsersWithParameter() {
		$execute = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$execute->expects($this->exactly(3))
			->method('fetchRow')
			->will(
				$this->onConsecutiveCalls(
					['uid' => 'frank'],
					['uid' => 'lukas']
				)
			);

		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->once())
			->method('execute')
			->will($this->returnValue($execute));

		$this->db->expects($this->once())
			->method('prepareQuery')
			->with(
				$this->equalTo(
					'SELECT `uid` FROM `*PREFIX*webdav_user_mapping`'
					. ' WHERE LOWER(`uid`) LIKE LOWER(?) ORDER BY `uid` ASC'
				),
				10,
				500
			)
			->will($this->returnValue($query));

		$this->assertSame(['frank', 'lukas'], $this->userWebDavAuth->getUsers('foo', 10, 500));
	}

	public function testGetUsersWithoutParameter() {
		$execute = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$execute->expects($this->exactly(3))
			->method('fetchRow')
			->will(
				$this->onConsecutiveCalls(
					['uid' => 'frank'],
					['uid' => 'lukas']
				)
			);

		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->once())
			->method('execute')
			->will($this->returnValue($execute));

		$this->db->expects($this->once())
			->method('prepareQuery')
			->with(
				$this->equalTo(
					'SELECT `uid` FROM `*PREFIX*webdav_user_mapping`'
					. ' WHERE LOWER(`uid`) LIKE LOWER(?) ORDER BY `uid` ASC'
				)
			)
			->will($this->returnValue($query));

		$this->assertSame(['frank', 'lukas'], $this->userWebDavAuth->getUsers());
	}

	public function testUserExistsExisting() {
		$execute = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$execute->expects($this->once())
			->method('fetchOne')
			->will($this->returnValue('1'));

		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->once())
			->method('execute')
			->will($this->returnValue($execute));

		$this->db->expects($this->once())
			->method('prepareQuery')
			->with('SELECT COUNT(*) FROM `*PREFIX*webdav_user_mapping` WHERE LOWER(`uid`) = LOWER(?)')
			->will($this->returnValue($query));

		$this->assertSame(true, $this->userWebDavAuth->userExists('ExistingUser'));
	}


	public function testUserExistsNotExisting() {
		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->once())
			->method('execute')
			->will($this->returnValue($query));

		$this->db->expects($this->once())
			->method('prepareQuery')
			->with('SELECT COUNT(*) FROM `*PREFIX*webdav_user_mapping` WHERE LOWER(`uid`) = LOWER(?)')
			->will($this->returnValue($query));

		$this->assertSame(false, $this->userWebDavAuth->userExists('NotExistingUser'));
	}

	public function testGetDisplayName() {
		$execute = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$execute->expects($this->once())
			->method('fetchOne')
			->will($this->returnValue('Lukas Reschke'));

		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->once())
			->method('execute')
			->will($this->returnValue($execute));

		$this->db->expects($this->once())
			->method('prepareQuery')
			->with('SELECT `displayname` FROM `*PREFIX*webdav_user_mapping` WHERE LOWER(`uid`) = LOWER(?)')
			->will($this->returnValue($query));

		$this->assertSame('Lukas Reschke', $this->userWebDavAuth->getDisplayName('lukas'));
	}

	public function testGetDisplayNamesWithoutParameter() {
		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->exactly(4))
			->method('fetchRow')
			->will($this->onConsecutiveCalls(
					['uid' => 'Foo', 'displayname' => 'Mr. Foo'],
					['uid' => 'Lukas', 'displayname' => 'Reschke Lukas'],
					['uid' => 'frank', 'displayname' => 'Frank Karlitschek']
			));
		$query->expects($this->once())
			->method('execute')
			->will($this->returnValue($query));

		$this->db->expects($this->once())
			->method('prepareQuery')
			->with(
				$this->equalTo(
					'SELECT `uid`, `displayname` FROM `*PREFIX*webdav_user_mapping`'
					. ' WHERE LOWER(`displayname`) LIKE LOWER(?) OR '
					. 'LOWER(`uid`) LIKE LOWER(?) ORDER BY `uid` ASC'
				),
				null,
				null
			)
			->will($this->returnValue($query));


		$this->assertSame([
			'Foo' => 'Mr. Foo',
			'Lukas' => 'Reschke Lukas',
			'frank' => 'Frank Karlitschek'
		], $this->userWebDavAuth->getDisplayNames());
	}

	public function testGetDisplayNamesWithParameter() {
		$query = $this->getMockBuilder('\OC_DB_StatementWrapper')
			->disableOriginalConstructor()->getMock();
		$query->expects($this->exactly(2))
			->method('fetchRow')
			->will($this->onConsecutiveCalls(
				['uid' => 'Foo', 'displayname' => 'Mr. Foo']
			));
		$query->expects($this->once())
			->method('execute')
			->will($this->returnValue($query));

		$this->db->expects($this->once())
			->method('prepareQuery')
			->with(
				$this->equalTo(
					'SELECT `uid`, `displayname` FROM `*PREFIX*webdav_user_mapping`'
					. ' WHERE LOWER(`displayname`) LIKE LOWER(?) OR '
					. 'LOWER(`uid`) LIKE LOWER(?) ORDER BY `uid` ASC'
				),
				10,
				15
			)
			->will($this->returnValue($query));


		$this->assertSame([
			'Foo' => 'Mr. Foo',
		], $this->userWebDavAuth->getDisplayNames('Foo', 10, 15));
	}

	public function testHasUserListings() {
		$this->assertSame(true, $this->userWebDavAuth->hasUserListings());
	}

}
