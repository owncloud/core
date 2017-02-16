<?php
/**
 * ownCloud
 *
 * @author Robin Appelman
 * @copyright 2012 Robin Appelman icewind@owncloud.com
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
 *
 */

namespace Test\Files;

use OC\Files\Filesystem;
use OC\Files\Mount\MountPoint;
use OC\Files\Storage\Temporary;
use OC\Files\View;
use OC\User\NoUserException;
use OCP\Files\Config\IMountProvider;
use OCP\Files\Storage\IStorageFactory;
use OCP\IUser;
use Test\TestCase;
use Test\Traits\UserTrait;

class DummyMountProvider implements IMountProvider {

	private $mounts = [];

	/**
	 * @param array $mounts
	 */
	public function __construct(array $mounts) {
		$this->mounts = $mounts;
	}

	/**
	 * Get the pre-registered mount points
	 *
	 * @param IUser $user
	 * @param IStorageFactory $loader
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function  getMountsForUser(IUser $user, IStorageFactory $loader) {
		return isset($this->mounts[$user->getUID()]) ? $this->mounts[$user->getUID()] : [];
	}
}

/**
 * Class FilesystemTest
 *
 * @group DB
 *
 * @package Test\Files
 */
class FilesystemTest extends TestCase {

	use UserTrait;

	const TEST_FILESYSTEM_USER1 = "test-filesystem-user1";
	const TEST_FILESYSTEM_USER2 = "test-filesystem-user1";

	/**
	 * @var array tmpDirs
	 */
	private $tmpDirs = [];

	/**
	 * @return array
	 */
	private function getStorageData() {
		$dir = \OC::$server->getTempManager()->getTemporaryFolder();
		$this->tmpDirs[] = $dir;
		return ['datadir' => $dir];
	}

	protected function setUp() {
		parent::setUp();
		$this->createUser(self::TEST_FILESYSTEM_USER1, self::TEST_FILESYSTEM_USER1);
		$this->createUser(self::TEST_FILESYSTEM_USER2, self::TEST_FILESYSTEM_USER2);
		$this->loginAsUser();
	}

	protected function tearDown() {
		foreach ($this->tmpDirs as $dir) {
			\OC_Helper::rmdirr($dir);
		}

		$this->logout();
		$this->invokePrivate('\OC\Files\Filesystem', 'normalizedPathCache', [null]);
		\OC_User::clearBackends();
		parent::tearDown();
	}

	public function testMount() {
		Filesystem::mount('\OC\Files\Storage\Local', self::getStorageData(), '/');
		$this->assertEquals('/', Filesystem::getMountPoint('/'));
		$this->assertEquals('/', Filesystem::getMountPoint('/some/folder'));
		list(, $internalPath) = Filesystem::resolvePath('/');
		$this->assertEquals('', $internalPath);
		list(, $internalPath) = Filesystem::resolvePath('/some/folder');
		$this->assertEquals('some/folder', $internalPath);

		Filesystem::mount('\OC\Files\Storage\Local', self::getStorageData(), '/some');
		$this->assertEquals('/', Filesystem::getMountPoint('/'));
		$this->assertEquals('/some/', Filesystem::getMountPoint('/some/folder'));
		$this->assertEquals('/some/', Filesystem::getMountPoint('/some/'));
		$this->assertEquals('/some/', Filesystem::getMountPoint('/some'));
		list(, $internalPath) = Filesystem::resolvePath('/some/folder');
		$this->assertEquals('folder', $internalPath);
	}

	public function normalizePathData() {
		return [
			['/', ''],
			['/', '/'],
			['/', '//'],
			['/', '/', false],
			['/', '//', false],

			['/path', '/path/'],
			['/path/', '/path/', false],
			['/path', 'path'],

			['/foo/bar', '/foo//bar/'],
			['/foo/bar/', '/foo//bar/', false],
			['/foo/bar', '/foo////bar'],
			['/foo/bar', '/foo/////bar'],
			['/foo/bar', '/foo/bar/.'],
			['/foo/bar', '/foo/bar/./'],
			['/foo/bar/', '/foo/bar/./', false],
			['/foo/bar', '/foo/bar/./.'],
			['/foo/bar', '/foo/bar/././'],
			['/foo/bar/', '/foo/bar/././', false],
			['/foo/bar', '/foo/./bar/'],
			['/foo/bar/', '/foo/./bar/', false],
			['/foo/.bar', '/foo/.bar/'],
			['/foo/.bar/', '/foo/.bar/', false],
			['/foo/.bar/tee', '/foo/.bar/tee'],

			// Windows paths
			['/', ''],
			['/', '\\'],
			['/', '\\', false],
			['/', '\\\\'],
			['/', '\\\\', false],

			['/path', '\\path'],
			['/path', '\\path', false],
			['/path', '\\path\\'],
			['/path/', '\\path\\', false],

			['/foo/bar', '\\foo\\\\bar\\'],
			['/foo/bar/', '\\foo\\\\bar\\', false],
			['/foo/bar', '\\foo\\\\\\\\bar'],
			['/foo/bar', '\\foo\\\\\\\\\\bar'],
			['/foo/bar', '\\foo\\bar\\.'],
			['/foo/bar', '\\foo\\bar\\.\\'],
			['/foo/bar/', '\\foo\\bar\\.\\', false],
			['/foo/bar', '\\foo\\bar\\.\\.'],
			['/foo/bar', '\\foo\\bar\\.\\.\\'],
			['/foo/bar/', '\\foo\\bar\\.\\.\\', false],
			['/foo/bar', '\\foo\\.\\bar\\'],
			['/foo/bar/', '\\foo\\.\\bar\\', false],
			['/foo/.bar', '\\foo\\.bar\\'],
			['/foo/.bar/', '\\foo\\.bar\\', false],
			['/foo/.bar/tee', '\\foo\\.bar\\tee'],

			// Absolute windows paths NOT marked as absolute
			['/C:', 'C:\\'],
			['/C:/', 'C:\\', false],
			['/C:/tests', 'C:\\tests'],
			['/C:/tests', 'C:\\tests', false],
			['/C:/tests', 'C:\\tests\\'],
			['/C:/tests/', 'C:\\tests\\', false],

			// normalize does not resolve '..' (by design)
			['/foo/..', '/foo/../'],
			['/foo/..', '\\foo\\..\\'],
		];
	}

	/**
	 * @dataProvider normalizePathData
	 */
	public function testNormalizePath($expected, $path, $stripTrailingSlash = true) {
		$this->assertEquals($expected, Filesystem::normalizePath($path, $stripTrailingSlash));
	}

	public function normalizePathKeepUnicodeData() {
		$nfdName = 'ümlaut';
		$nfcName = 'ümlaut';
		return [
			['/' . $nfcName, $nfcName, true],
			['/' . $nfcName, $nfcName, false],
			['/' . $nfdName, $nfdName, true],
			['/' . $nfcName, $nfdName, false],
		];
	}

	/**
	 * @dataProvider normalizePathKeepUnicodeData
	 */
	public function testNormalizePathKeepUnicode($expected, $path, $keepUnicode = false) {
		$this->assertEquals($expected, Filesystem::normalizePath($path, true, false, $keepUnicode));
	}

	public function testNormalizePathKeepUnicodeCache() {
		$nfdName = 'ümlaut';
		$nfcName = 'ümlaut';
		// call in succession due to cache
		$this->assertEquals('/' . $nfcName, Filesystem::normalizePath($nfdName, true, false, false));
		$this->assertEquals('/' . $nfdName, Filesystem::normalizePath($nfdName, true, false, true));
	}

	public function isValidPathData() {
		return [
			['/', true],
			['/path', true],
			['/foo/bar', true],
			['/foo//bar/', true],
			['/foo////bar', true],
			['/foo//\///bar', true],
			['/foo/bar/.', true],
			['/foo/bar/./', true],
			['/foo/bar/./.', true],
			['/foo/bar/././', true],
			['/foo/bar/././..bar', true],
			['/foo/bar/././..bar/a', true],
			['/foo/bar/././..', false],
			['/foo/bar/././../', false],
			['/foo/bar/.././', false],
			['/foo/bar/../../', false],
			['/foo/bar/../..\\', false],
			['..', false],
			['../', false],
			['../foo/bar', false],
			['..\foo/bar', false],
		];
	}

	/**
	 * @dataProvider isValidPathData
	 */
	public function testIsValidPath($path, $expected) {
		$this->assertSame($expected, Filesystem::isValidPath($path));
	}

	public function isFileBlacklistedData() {
		return [
			['/etc/foo/bar/foo.txt', false],
			['\etc\foo/bar\foo.txt', false],
			['.htaccess', true],
			['.htaccess/', true],
			['.htaccess\\', true],
			['/etc/foo\bar/.htaccess\\', true],
			['/etc/foo\bar/.htaccess/', true],
			['/etc/foo\bar/.htaccess/foo', true],
			['//foo//bar/\.htaccess/', true],
			['\foo\bar\.HTAccess', true],
		];
	}

	/**
	 * @dataProvider isFileBlacklistedData
	 */
	public function testIsFileBlacklisted($path, $expected) {
		$this->assertSame($expected, Filesystem::isForbiddenFileOrDir($path));
	}

	public function isExcludedData() {
		return [
			['.snapshot', true],
			['.snapshot/', true],
			['.snapshot\\', true],
			['/etc/foo/bar/foo.txt', false],
			['/.snapshot/etc/foo/bar/foo.txt', true],
			['/.snapShot/etc/foo/bar/foo.txt', true],
			['\.snapshot\etc\foo/bar\foo.txt', true],
			['/etc/foo/.snapshot', true],
			['/etc/foo/.snapshot/bar', true],
		];
	}

	/**
	 * The parameter array can be redesigned if filesystem.php will get a constructor where it is possible to 
	 * define the excluded directories for unit tests
	 * @dataProvider isExcludedData
	 */
	public function testIsExcluded($path, $expected) {
		$this->assertSame($expected, Filesystem::isForbiddenFileOrDir($path, ['.snapshot']));
	}

	public function testNormalizePathUTF8() {
		if (!class_exists('Patchwork\PHP\Shim\Normalizer')) {
			$this->markTestSkipped('UTF8 normalizer Patchwork was not found');
		}

		$this->assertEquals("/foo/bar\xC3\xBC", Filesystem::normalizePath("/foo/baru\xCC\x88"));
		$this->assertEquals("/foo/bar\xC3\xBC", Filesystem::normalizePath("\\foo\\baru\xCC\x88"));
	}

	public function testHooks() {
		if (Filesystem::getView()) {
			$user = \OC_User::getUser();
		} else {
			$user = self::TEST_FILESYSTEM_USER1;
			$this->createUser($user, $user);
			$userObj = \OC::$server->getUserManager()->get($user);
			\OC::$server->getUserSession()->setUser($userObj);
			Filesystem::init($user, '/' . $user . '/files');

		}
		\OC_Hook::clear('OC_Filesystem');
		\OC_Hook::connect('OC_Filesystem', 'post_write', $this, 'dummyHook');

		Filesystem::mount('OC\Files\Storage\Temporary', [], '/');

		$rootView = new View('');
		$rootView->mkdir('/' . $user);
		$rootView->mkdir('/' . $user . '/files');

//		\OC\Files\Filesystem::file_put_contents('/foo', 'foo');
		Filesystem::mkdir('/bar');
//		\OC\Files\Filesystem::file_put_contents('/bar//foo', 'foo');

		$tmpFile = \OC::$server->getTempManager()->getTemporaryFile();
		file_put_contents($tmpFile, 'foo');
		$fh = fopen($tmpFile, 'r');
//		\OC\Files\Filesystem::file_put_contents('/bar//foo', $fh);
	}

	/**
	 * Tests that an exception is thrown when passed user does not exist.
	 *
	 * @expectedException \OC\User\NoUserException
	 */
	public function testLocalMountWhenUserDoesNotExist() {
		$userId = $this->getUniqueID('user_');

		Filesystem::initMountPoints($userId);
	}

	/**
	 * @expectedException \OC\User\NoUserException
	 */
	public function testNullUserThrows() {
		Filesystem::initMountPoints(null);
	}

	public function testNullUserThrowsTwice() {
		$thrown = 0;
		try {
			Filesystem::initMountPoints(null);
		} catch (NoUserException $e) {
			$thrown++;
		}
		try {
			Filesystem::initMountPoints(null);
		} catch (NoUserException $e) {
			$thrown++;
		}
		$this->assertEquals(2, $thrown);
	}

	/**
	 * Tests that an exception is thrown when passed user does not exist.
	 */
	public function testLocalMountWhenUserDoesNotExistTwice() {
		$thrown = 0;
		$userId = $this->getUniqueID('user_');

		try {
			Filesystem::initMountPoints($userId);
		} catch (NoUserException $e) {
			$thrown++;
		}

		try {
			Filesystem::initMountPoints($userId);
		} catch (NoUserException $e) {
			$thrown++;
		}

		$this->assertEquals(2, $thrown);
	}

	public function testUserNameCasing() {
		$this->logout();
		$userId = $this->getUniqueID('user_');
		$this->createUser($userId);

		$view = new View();
		$this->assertFalse($view->file_exists('/' . $userId));

		Filesystem::initMountPoints(strtoupper($userId));

		list($storage1, $path1) = $view->resolvePath('/' . $userId);
		list($storage2, $path2) = $view->resolvePath('/' . strtoupper($userId));

		$this->assertTrue($storage1->instanceOfStorage('\OCP\Files\IHomeStorage'));
		$this->assertEquals('', $path1);

		// not mounted, still on the local root storage
		$this->assertEquals(strtoupper($userId), $path2);
	}

	/**
	 * Tests that the home storage is used for the user's mount point
	 */
	public function testHomeMount() {
		$userId = $this->getUniqueID('user_');

		\OC::$server->getUserManager()->createUser($userId, $userId);

		Filesystem::initMountPoints($userId);

		$homeMount = Filesystem::getStorage('/' . $userId . '/');

		$this->assertTrue($homeMount->instanceOfStorage('\OCP\Files\IHomeStorage'));
		if (getenv('RUN_OBJECTSTORE_TESTS')) {
			$this->assertTrue($homeMount->instanceOfStorage('\OC\Files\ObjectStore\HomeObjectStoreStorage'));
			$this->assertEquals('object::user:' . $userId, $homeMount->getId());
		} else {
			$this->assertTrue($homeMount->instanceOfStorage('\OC\Files\Storage\Home'));
			$this->assertEquals('home::' . $userId, $homeMount->getId());
		}

		$user = \OC::$server->getUserManager()->get($userId);
		if ($user !== null) { $user->delete(); }
	}

	public function dummyHook($arguments) {
		$path = $arguments['path'];
		$this->assertEquals($path, Filesystem::normalizePath($path)); //the path passed to the hook should already be normalized
	}

	/**
	 * Test that the default cache dir is part of the user's home
	 */
	public function testMountDefaultCacheDir() {
		$userId = $this->getUniqueID('user_');
		$config = \OC::$server->getConfig();
		$oldCachePath = $config->getSystemValue('cache_path', '');
		// no cache path configured
		$config->setSystemValue('cache_path', '');

		\OC::$server->getUserManager()->createUser($userId, $userId);
		Filesystem::initMountPoints($userId);

		$this->assertEquals(
			'/' . $userId . '/',
			Filesystem::getMountPoint('/' . $userId . '/cache')
		);
		list($storage, $internalPath) = Filesystem::resolvePath('/' . $userId . '/cache');
		$this->assertTrue($storage->instanceOfStorage('\OCP\Files\IHomeStorage'));
		$this->assertEquals('cache', $internalPath);
		$user = \OC::$server->getUserManager()->get($userId);
		if ($user !== null) { $user->delete(); }

		$config->setSystemValue('cache_path', $oldCachePath);
	}

	/**
	 * Test that an external cache is mounted into
	 * the user's home
	 */
	public function testMountExternalCacheDir() {
		$userId = $this->getUniqueID('user_');

		$config = \OC::$server->getConfig();
		$oldCachePath = $config->getSystemValue('cache_path', '');
		// set cache path to temp dir
		$cachePath = \OC::$server->getTempManager()->getTemporaryFolder() . '/extcache';
		$config->setSystemValue('cache_path', $cachePath);

		\OC::$server->getUserManager()->createUser($userId, $userId);
		Filesystem::initMountPoints($userId);

		$this->assertEquals(
			'/' . $userId . '/cache/',
			Filesystem::getMountPoint('/' . $userId . '/cache')
		);
		list($storage, $internalPath) = Filesystem::resolvePath('/' . $userId . '/cache');
		$this->assertTrue($storage->instanceOfStorage('\OC\Files\Storage\Local'));
		$this->assertEquals('', $internalPath);
		$user = \OC::$server->getUserManager()->get($userId);
		if ($user !== null) { $user->delete(); }

		$config->setSystemValue('cache_path', $oldCachePath);
	}

	public function testRegisterMountProviderAfterSetup() {
		Filesystem::initMountPoints(self::TEST_FILESYSTEM_USER2);
		$this->assertEquals('/', Filesystem::getMountPoint('/foo/bar'));
		$mount = new MountPoint(new Temporary([]), '/foo/bar');
		$mountProvider = new DummyMountProvider([self::TEST_FILESYSTEM_USER2 => [$mount]]);
		\OC::$server->getMountProviderCollection()->registerProvider($mountProvider);
		$this->assertEquals('/foo/bar/', Filesystem::getMountPoint('/foo/bar'));
	}
}
