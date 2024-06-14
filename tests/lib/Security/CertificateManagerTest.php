<?php
/**
 * Copyright (c) 2014 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Security;

use OC\Security\CertificateManager;
use OC\Files\View;
use OCP\IUserManager;
use OCP\IUser;
use OCP\IConfig;

/**
 * Class CertificateManagerTest
 *
 * @group DB
 */
class CertificateManagerTest extends \Test\TestCase {
	use \Test\Traits\UserTrait;
	use \Test\Traits\MountProviderTrait;

	/** @var CertificateManager */
	private $certificateManager;
	/** @var String */
	private $username;

	protected function setUp(): void {
		parent::setUp();

		$this->username = self::getUniqueID('', 20);
		$this->createUser($this->username);

		$userManager = \OC::$server->getUserManager();

		$storage = new \OC\Files\Storage\Temporary();
		$this->registerMount($this->username, $storage, '/' . $this->username . '/');

		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		\OC\Files\Filesystem::tearDown();
		\OC_Util::setupFS($this->username);

		$config = $this->createMock('OCP\IConfig');
		$config->expects($this->any())
			->method('getSystemValue')
			->will($this->returnValueMap([
				['installed', false, true],
				['datadirectory', \OC::$SERVERROOT . '/data', \OC::$SERVERROOT . '/data'],
			]));

		$this->certificateManager = new CertificateManager($this->username, new \OC\Files\View(), $config, $userManager);
	}

	protected function assertEqualsArrays($expected, $actual) {
		\sort($expected);
		\sort($actual);

		$this->assertEquals($expected, $actual);
	}

	public function testListCertificates() {
		// Test empty certificate bundle
		$this->assertSame([], $this->certificateManager->listCertificates());

		// Add some certificates
		$this->certificateManager->addCertificate(\file_get_contents(__DIR__ . '/../../data/certificates/goodCertificate.crt'), 'GoodCertificate');
		$certificateStore = [];
		$certificateStore[] = new \OC\Security\Certificate(\file_get_contents(__DIR__ . '/../../data/certificates/goodCertificate.crt'), 'GoodCertificate');
		$this->assertEqualsArrays($certificateStore, $this->certificateManager->listCertificates());

		// Add another certificates
		$this->certificateManager->addCertificate(\file_get_contents(__DIR__ . '/../../data/certificates/expiredCertificate.crt'), 'ExpiredCertificate');
		$certificateStore[] = new \OC\Security\Certificate(\file_get_contents(__DIR__ . '/../../data/certificates/expiredCertificate.crt'), 'ExpiredCertificate');
		$this->assertEqualsArrays($certificateStore, $this->certificateManager->listCertificates());
	}

	/**
	 */
	public function testAddInvalidCertificate() {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Certificate could not get parsed.');

		$this->certificateManager->addCertificate('InvalidCertificate', 'invalidCertificate');
	}

	/**
	 * @return array
	 */
	public function dangerousFileProvider() {
		return [
			['.htaccess'],
			['../../foo.txt'],
			['..\..\foo.txt'],
		];
	}

	/**
	 * @dataProvider dangerousFileProvider
	 * @param string $filename
	 */
	public function testAddDangerousFile($filename) {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Filename is not valid');

		$this->certificateManager->addCertificate(\file_get_contents(__DIR__ . '/../../data/certificates/expiredCertificate.crt'), $filename);
	}

	public function testRemoveDangerousFile() {
		$this->assertFalse($this->certificateManager->removeCertificate('../../foo.txt'));
	}

	public function testRemoveCertificate() {
		$this->certificateManager->addCertificate(\file_get_contents(__DIR__ . '/../../data/certificates/goodCertificate.crt'), 'GoodCertificate');
		$this->assertTrue($this->certificateManager->removeCertificate('GoodCertificate'));
	}

	public function testRemoveNonExistentCertificate() {
		$this->assertFalse($this->certificateManager->removeCertificate('NonExistentCertificate'));
	}

	public function testGetCertificateBundle() {
		$this->assertSame('/' . $this->username . '/files_external/rootcerts.crt', $this->certificateManager->getCertificateBundle());
	}

	public function getPathToCertificatesProvider() {
		return [
			['uid', '/path/to/oc/data', '/path/to/oc/data/uid', '/uid/files_external/'],
			['uid', '/path/to/oc/data', '/path/to/oc/data/home_of_uid', '/home_of_uid/files_external/'],
			['uid', '/path/to/oc/data', '/path/to/oc/data/inner/home/uid', '/inner/home/uid/files_external/'],
			['uid', '/path/to/oc/data', '/external/home', '/uid/files_external/'],
			[null, '/path/to/oc/data', null, '/files_external/']
		];
	}

	/**
	 * @dataProvider getPathToCertificatesProvider
	 */
	public function testGetPathToCertificates($uid, $dataDir, $userHomeDir, $expectedResult) {
		$userObj = $this->createMock(IUser::class);
		$userObj->method('getHome')->willReturn($userHomeDir);

		$userManager = $this->createMock(IUserManager::class);
		$userManager->method('get')
			->with($uid)
			->willReturn($userObj);

		$config = $this->createMock(IConfig::class);
		$config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', $dataDir],
			]));

		$certificateManager = new CertificateManager($uid, $this->createMock(View::class), $config, $userManager);
		$this->assertSame($expectedResult, $this->invokePrivate($certificateManager, 'getPathToCertificates', [$uid]));
	}

	public function testGetPathToCertificatesMissingUser() {
		$uid = 'missing_user';

		$userManager = $this->createMock(IUserManager::class);
		$userManager->method('get')->willReturn(null);

		$config = $this->createMock(IConfig::class);
		$config->method('getSystemValue')
			->will($this->returnValueMap([
				['datadirectory', \OC::$SERVERROOT . '/data', '/path/to/oc/data'],
			]));

		$certificateManager = new CertificateManager($uid, $this->createMock(View::class), $config, $userManager);
		$this->assertSame("/{$uid}/files_external/", $this->invokePrivate($certificateManager, 'getPathToCertificates', [$uid]));
	}
}
