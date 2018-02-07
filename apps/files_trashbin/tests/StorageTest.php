<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Stefan Weil <sw@weilnetz.de>
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

namespace OCA\Files_Trashbin\Tests;

use OC\Files\Filesystem;
use OC\Files\ObjectStore\ObjectStoreStorage;
use OC\Files\Storage\Temporary;
use OC\Files\View;
use OCP\Files\Storage;
use Test\TestCase;
use Test\Traits\GroupTrait;
use Test\Traits\UserTrait;

/**
 * Class Storage
 *
 * @group DB
 *
 * @package OCA\Files_Trashbin\Tests
 */
class StorageTest extends TestCase {

	use UserTrait;
	use GroupTrait;

	/**
	 * @var string
	 */
	private $user;

	/**
	 * @var View
	 */
	private $rootView;

	/**
	 * @var View
	 */
	private $userView;

	protected function setUp() {
		parent::setUp();

		\OC_Hook::clear();
		\OCA\Files_Trashbin\Trashbin::registerHooks();

		// the encryption wrapper does some twisted stuff with moveFromStorage...
		// we need to register it here so that the tested behavior is closer to reality
		\OC::$server->getEncryptionManager()->setupStorage();

		$this->user = $this->getUniqueId('user');
		$this->createUser($this->user, $this->user);


		// this will setup the FS
		$this->loginAsUser($this->user);

		\OCA\Files_Trashbin\Storage::setupStorage();

		$this->rootView = new View('/');
		$this->userView = new View('/' . $this->user . '/files/');
		$this->userView->file_put_contents('test.txt', 'foo');

		$this->userView->mkdir('folder');
		$this->userView->file_put_contents('folder/inside.txt', 'bar');
	}

	protected function tearDown() {
		\OC\Files\Filesystem::getLoader()->removeStorageWrapper('oc_trashbin');
		$this->logout();
		\OC_Hook::clear();
		\OC\Files\Filesystem::getLoader()->removeStorageWrapper('oc_encryption');
		parent::tearDown();
	}

	/**
	 * Test that deleting a file puts it into the trashbin.
	 */
	public function testSingleStorageDeleteFile() {
		$this->assertTrue($this->userView->file_exists('test.txt'));
		$this->userView->unlink('test.txt');
		list($storage,) = $this->userView->resolvePath('test.txt');
		$storage->getScanner()->scan(''); // make sure we check the storage
		$this->assertFalse($this->userView->getFileInfo('test.txt'));

		// check if file is in trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('test.txt', substr($name, 0, strrpos($name, '.')));
	}

	/**
	 * Test that deleting a folder puts it into the trashbin.
	 */
	public function testSingleStorageDeleteFolder() {
		$this->assertTrue($this->userView->file_exists('folder/inside.txt'));
		$this->userView->rmdir('folder');
		list($storage,) = $this->userView->resolvePath('folder/inside.txt');
		$storage->getScanner()->scan(''); // make sure we check the storage
		$this->assertFalse($this->userView->getFileInfo('folder'));

		// check if folder is in trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('folder', substr($name, 0, strrpos($name, '.')));

		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/' . $name . '/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('inside.txt', $name);
	}

	/**
	 * Test that deleting a file from another mounted storage properly
	 * lands in the trashbin. This is a cross-storage situation because
	 * the trashbin folder is in the root storage while the mounted one
	 * isn't.
	 */
	public function testCrossStorageDeleteFile() {
		$storage2 = new Temporary([]);
		\OC\Files\Filesystem::mount($storage2, [], $this->user . '/files/substorage');

		$this->userView->file_put_contents('substorage/subfile.txt', 'foo');
		$storage2->getScanner()->scan('');
		$this->assertTrue($storage2->file_exists('subfile.txt'));
		$this->userView->unlink('substorage/subfile.txt');

		$storage2->getScanner()->scan('');
		$this->assertFalse($this->userView->getFileInfo('substorage/subfile.txt'));
		$this->assertFalse($storage2->file_exists('subfile.txt'));

		// check if file is in trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('subfile.txt', substr($name, 0, strrpos($name, '.')));
	}

	/**
	 * Test that deleting a folder from another mounted storage properly
	 * lands in the trashbin. This is a cross-storage situation because
	 * the trashbin folder is in the root storage while the mounted one
	 * isn't.
	 */
	public function testCrossStorageDeleteFolder() {
		$storage2 = new Temporary([]);
		\OC\Files\Filesystem::mount($storage2, [], $this->user . '/files/substorage');

		$this->userView->mkdir('substorage/folder');
		$this->userView->file_put_contents('substorage/folder/subfile.txt', 'bar');
		$storage2->getScanner()->scan('');
		$this->assertTrue($storage2->file_exists('folder/subfile.txt'));
		$this->userView->rmdir('substorage/folder');

		$storage2->getScanner()->scan('');
		$this->assertFalse($this->userView->getFileInfo('substorage/folder'));
		$this->assertFalse($storage2->file_exists('folder/subfile.txt'));

		// check if folder is in trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('folder', substr($name, 0, strrpos($name, '.')));

		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/' . $name . '/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('subfile.txt', $name);
	}

	/**
	 * Test that deleted folder appear in the trashbin of both owner and recipient
	 */
	public function testDeleteFolderAsRecipient() {
		$this->userView->mkdir('share');
		$this->userView->mkdir('share/folder');
		$this->userView->file_put_contents('share/folder/test.txt', 'Yarrr! Content!');

		$originalFileId = $this->userView->getFileInfo('share/folder/test.txt')->getId();

		$recipientUser = $this->getUniqueId('recipient_');
		$this->createUser($recipientUser, $recipientUser);

		$node = \OC::$server->getUserFolder($this->user)->get('share');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user)
			->setSharedWith($recipientUser)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		\OC::$server->getShareManager()->createShare($share);

		$this->loginAsUser($recipientUser);

		// delete as recipient
		$recipientView = new View('/' . $recipientUser . '/files');
		$recipientView->rmdir('share/folder');

		// check if folder is in trashbin for owner
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('folder', substr($name, 0, strrpos($name, '.')));

		// check if file is in trashbin for owner and has the same file id
		$info = $this->rootView->getFileInfo($this->user . '/files_trashbin/files/' . $name . '/test.txt');
		$this->assertNotNull($info);
		$this->assertEquals($originalFileId, $info->getId());

		// check if folder is in trashbin for recipient
		$results = $this->rootView->getDirectoryContent($recipientUser . '/files_trashbin/files/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('folder', substr($name, 0, strrpos($name, '.')));

		// check if file has a copy in trashbin for recipient (different file id)
		$info = $this->rootView->getFileInfo($recipientUser . '/files_trashbin/files/' . $name . '/test.txt');
		$this->assertNotNull($info);
		$this->assertNotEquals($originalFileId, $info->getId());
	}

	/**
	 * Test that deleted folder appear only in the trashbin of owner when recipient
	 * has a read-only access home storage
	 */
	public function testDeleteFolderAsReadOnlyRecipient() {
		$readOnlyGroups = \OC::$server->getConfig()->getAppValue('core', 'read_only_groups', null);
		\OC::$server->getConfig()->setAppValue('core', 'read_only_groups', '["rogroup"]');

		$this->userView->mkdir('share');
		$this->userView->mkdir('share/folder');
		$this->userView->file_put_contents('share/folder/test.txt', 'Yarrr! Content!');

		$originalFileId = $this->userView->getFileInfo('share/folder/test.txt')->getId();

		$recipientUser = $this->getUniqueId('recipient_');
		$recipientUserObject = $this->createUser($recipientUser, $recipientUser);
		$roGroupObject = $this->createGroup('rogroup');
		$roGroupObject->addUser($recipientUserObject);

		$node = \OC::$server->getUserFolder($this->user)->get('share');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user)
			->setSharedWith($recipientUser)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		\OC::$server->getShareManager()->createShare($share);

		$this->loginAsUser($recipientUser);

		// delete as recipient
		$recipientView = new View('/' . $recipientUser . '/files');
		$recipientView->rmdir('share/folder');

		// check if folder is in trashbin for owner
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('folder', substr($name, 0, strrpos($name, '.')));

		// check if file is in trashbin for owner and has the same file id
		$info = $this->rootView->getFileInfo($this->user . '/files_trashbin/files/' . $name . '/test.txt');
		$this->assertNotNull($info);
		$this->assertEquals($originalFileId, $info->getId());

		// check that folder is NOT in trashbin for recipient
		$this->assertFalse($this->rootView->file_exists($recipientUser . '/files_trashbin'));

		\OC::$server->getConfig()->setAppValue('core', 'read_only_groups', $readOnlyGroups);
		$roGroupObject->delete();
	}

	/**
	 * Test that deleted versions properly land in the trashbin.
	 */
	public function testDeleteVersionsOfFile() {
		$this->markTestSkippedIfStorageHasOwnVersioning();
		\OCA\Files_Versions\Hooks::connectHooks();

		// trigger a version (multiple would not work because of the expire logic)
		$this->userView->file_put_contents('test.txt', 'v1');

		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/');
		$this->assertCount(1, $results);

		$this->userView->unlink('test.txt');

		// rescan trash storage
		list($rootStorage,) = $this->rootView->resolvePath($this->user . '/files_trashbin');
		$rootStorage->getScanner()->scan('');

		// check if versions are in trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('test.txt.v', substr($name, 0, strlen('test.txt.v')));

		// versions deleted
		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/');
		$this->assertCount(0, $results);
	}

	/**
	 * Test that deleted versions properly land in the trashbin.
	 */
	public function testDeleteVersionsOfFolder() {
		$this->markTestSkippedIfStorageHasOwnVersioning();
		\OCA\Files_Versions\Hooks::connectHooks();

		// trigger a version (multiple would not work because of the expire logic)
		$this->userView->file_put_contents('folder/inside.txt', 'v1');

		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/folder/');
		$this->assertCount(1, $results);

		$this->userView->rmdir('folder');

		// rescan trash storage
		list($rootStorage,) = $this->rootView->resolvePath($this->user . '/files_trashbin');
		$rootStorage->getScanner()->scan('');

		// check if versions are in trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('folder.d', substr($name, 0, strlen('folder.d')));

		// check if versions are in trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions/' . $name . '/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('inside.txt.v', substr($name, 0, strlen('inside.txt.v')));

		// versions deleted
		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/folder/');
		$this->assertCount(0, $results);
	}

	/**
	 * Test that deleted versions properly land in the trashbin when deleting as share recipient.
	 */
	public function testDeleteVersionsOfFileAsRecipient() {
		$this->markTestSkippedIfStorageHasOwnVersioning();
		\OCA\Files_Versions\Hooks::connectHooks();

		$this->userView->mkdir('share');
		// trigger a version (multiple would not work because of the expire logic)
		$this->userView->file_put_contents('share/test.txt', 'v1');
		$this->userView->file_put_contents('share/test.txt', 'v2');

		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/share/');
		$this->assertCount(1, $results);

		$recipientUser = $this->getUniqueId('recipient_');
		$this->createUser($recipientUser, $recipientUser);

		$node = \OC::$server->getUserFolder($this->user)->get('share');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user)
			->setSharedWith($recipientUser)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		\OC::$server->getShareManager()->createShare($share);

		$this->loginAsUser($recipientUser);

		// delete as recipient
		$recipientView = new View('/' . $recipientUser . '/files');
		$recipientView->unlink('share/test.txt');

		// rescan trash storage for both users
		list($rootStorage,) = $this->rootView->resolvePath($this->user . '/files_trashbin');
		$rootStorage->getScanner()->scan('');

		// check if versions are in trashbin for both users
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions');
		$this->assertCount(1, $results, 'Versions in owner\'s trashbin');
		$name = $results[0]->getName();
		$this->assertEquals('test.txt.v', substr($name, 0, strlen('test.txt.v')));

		$results = $this->rootView->getDirectoryContent($recipientUser . '/files_trashbin/versions');
		$this->assertCount(1, $results, 'Versions in recipient\'s trashbin');
		$name = $results[0]->getName();
		$this->assertEquals('test.txt.v', substr($name, 0, strlen('test.txt.v')));

		// versions deleted
		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/share/');
		$this->assertCount(0, $results);
	}

	/**
	 * Test that deleted versions properly land in the trashbin when deleting as share recipient.
	 */
	public function testDeleteVersionsOfFolderAsRecipient() {
		$this->markTestSkippedIfStorageHasOwnVersioning();
		\OCA\Files_Versions\Hooks::connectHooks();

		$this->userView->mkdir('share');
		$this->userView->mkdir('share/folder');
		// trigger a version (multiple would not work because of the expire logic)
		$this->userView->file_put_contents('share/folder/test.txt', 'v1');
		$this->userView->file_put_contents('share/folder/test.txt', 'v2');

		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/share/folder/');
		$this->assertCount(1, $results);

		$recipientUser = $this->getUniqueId('recipient_');
		$this->createUser($recipientUser, $recipientUser);

		$node = \OC::$server->getUserFolder($this->user)->get('share');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user)
			->setSharedWith($recipientUser)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		\OC::$server->getShareManager()->createShare($share);

		$this->loginAsUser($recipientUser);

		// delete as recipient
		$recipientView = new View('/' . $recipientUser . '/files');
		$recipientView->rmdir('share/folder');

		// rescan trash storage
		list($rootStorage,) = $this->rootView->resolvePath($this->user . '/files_trashbin');
		$rootStorage->getScanner()->scan('');

		// check if versions are in trashbin for owner
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('folder.d', substr($name, 0, strlen('folder.d')));

		// check if file versions are in trashbin for owner
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions/' . $name . '/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('test.txt.v', substr($name, 0, strlen('test.txt.v')));

		// check if versions are in trashbin for recipient
		$results = $this->rootView->getDirectoryContent($recipientUser . '/files_trashbin/versions');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('folder.d', substr($name, 0, strlen('folder.d')));

		// check if file versions are in trashbin for recipient
		$results = $this->rootView->getDirectoryContent($recipientUser . '/files_trashbin/versions/' . $name . '/');
		$this->assertCount(1, $results);
		$name = $results[0]->getName();
		$this->assertEquals('test.txt.v', substr($name, 0, strlen('test.txt.v')));

		// versions deleted
		$results = $this->rootView->getDirectoryContent($recipientUser . '/files_versions/share/folder/');
		$this->assertCount(0, $results);
	}

	/**
	 * Test that versions are not auto-trashed when moving a file between
	 * storages. This is because rename() between storages would call
	 * unlink() which should NOT trigger the version deletion logic.
	 */
	public function testKeepFileAndVersionsWhenMovingFileBetweenStorages() {
		$this->markTestSkippedIfStorageHasOwnVersioning();
		\OCA\Files_Versions\Hooks::connectHooks();

		$storage2 = new Temporary([]);
		\OC\Files\Filesystem::mount($storage2, [], $this->user . '/files/substorage');

		// trigger a version (multiple would not work because of the expire logic)
		$this->userView->file_put_contents('test.txt', 'v1');

		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files');
		$this->assertCount(0, $results);

		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/');
		$this->assertCount(1, $results);

		// move to another storage
		$this->userView->rename('test.txt', 'substorage/test.txt');
		$this->assertTrue($this->userView->file_exists('substorage/test.txt'));

		// rescan trash storage
		list($rootStorage,) = $this->rootView->resolvePath($this->user . '/files_trashbin');
		$rootStorage->getScanner()->scan('');

		// versions were moved too
		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/substorage');
		$this->assertCount(1, $results);

		// check that nothing got trashed by the rename's unlink() call
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files');
		$this->assertCount(0, $results);

		// check that versions were moved and not trashed
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions/');
		$this->assertCount(0, $results);
	}

	/**
	 * Test that versions are not auto-trashed when moving a file between
	 * storages. This is because rename() between storages would call
	 * unlink() which should NOT trigger the version deletion logic.
	 */
	public function testKeepFileAndVersionsWhenMovingFolderBetweenStorages() {
		$this->markTestSkippedIfStorageHasOwnVersioning();
		\OCA\Files_Versions\Hooks::connectHooks();

		$storage2 = new Temporary([]);
		\OC\Files\Filesystem::mount($storage2, [], $this->user . '/files/substorage');

		// trigger a version (multiple would not work because of the expire logic)
		$this->userView->file_put_contents('folder/inside.txt', 'v1');

		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files');
		$this->assertCount(0, $results);

		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/folder/');
		$this->assertCount(1, $results);

		// move to another storage
		$this->userView->rename('folder', 'substorage/folder');
		$this->assertTrue($this->userView->file_exists('substorage/folder/inside.txt'));

		// rescan trash storage
		list($rootStorage,) = $this->rootView->resolvePath($this->user . '/files_trashbin');
		$rootStorage->getScanner()->scan('');

		// versions were moved too
		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/substorage/folder/');
		$this->assertCount(1, $results);

		// check that nothing got trashed by the rename's unlink() call
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files');
		$this->assertCount(0, $results);

		// check that versions were moved and not trashed
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions/');
		$this->assertCount(0, $results);
	}

	/**
	 * Test that the owner receives a backup of the file that was moved
	 * out of the shared folder
	 */
	public function testOwnerBackupWhenMovingFileOutOfShare() {
		$this->markTestSkippedIfStorageHasOwnVersioning();
		\OCA\Files_Versions\Hooks::connectHooks();

		$this->userView->mkdir('share');
		$this->userView->mkdir('share/sub');
		// trigger a version (multiple would not work because of the expire logic)
		$this->userView->file_put_contents('share/test.txt', 'v1');
		$this->userView->file_put_contents('share/test.txt', 'v2');

		$this->userView->file_put_contents('share/sub/testsub.txt', 'v1');
		$this->userView->file_put_contents('share/sub/testsub.txt', 'v2');

		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/share/');
		$this->assertCount(2, $results);
		$results = $this->rootView->getDirectoryContent($this->user . '/files_versions/share/sub');
		$this->assertCount(1, $results);

		$recipientUser = $this->getUniqueId('recipient_');
		$user2 = $this->createUser($recipientUser, $recipientUser);

		$node = \OC::$server->getUserFolder($this->user)->get('share');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user)
			->setSharedWith($recipientUser)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		\OC::$server->getShareManager()->createShare($share);

		$this->loginAsUser($recipientUser);

		// delete as recipient
		$recipientHome = \OC::$server->getUserFolder($recipientUser);

		// rename received share folder to catch potential issues if using the wrong name in the code
		$recipientHome->get('share')->move($recipientHome->getPath() . '/share_renamed');
		$recipientHome->get('share_renamed/test.txt')->move($recipientHome->getPath() . '/test.txt');
		$recipientHome->get('share_renamed/sub')->move($recipientHome->getPath() . '/sub');

		$this->assertTrue($recipientHome->nodeExists('test.txt'));
		$this->assertTrue($recipientHome->nodeExists('sub'));

		// check if file and versions are in trashbin for owner
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files');
		$this->assertCount(2, $results, 'Files in owner\'s trashbin');
		// grab subdir name
		$subDirName = $results[0]->getName();
		$name = $results[1]->getName();
		$this->assertEquals('test.txt.d', substr($name, 0, strlen('test.txt.d')));

		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions');
		$this->assertCount(2, $results, 'Versions in owner\'s trashbin');
		// note: entry 0 is the "sub" entry for versions
		$name = $results[1]->getName();
		$this->assertEquals('test.txt.v', substr($name, 0, strlen('test.txt.v')));

		// check if sub-file and versions are in trashbin for owner
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/' . $subDirName);
		$this->assertCount(1, $results, 'Subfile in owner\'s trashbin');
		$this->assertEquals('testsub.txt', $results[0]->getName());

		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/versions/' . $subDirName);
		$this->assertCount(1, $results, 'Versions in owner\'s trashbin');
		$name = $results[0]->getName();
		$this->assertEquals('testsub.txt.v', substr($name, 0, strlen('testsub.txt.v')));

		$this->logout();
		$user2->delete();
	}

	/**
	 * Delete should fail if the source file can't be deleted.
	 */
	public function testSingleStorageDeleteFileFail() {
		/**
		 * @var \OC\Files\Storage\Temporary | \PHPUnit_Framework_MockObject_MockObject $storage
		 */
		$storage = $this->getMockBuilder('\OC\Files\Storage\Temporary')
			->setConstructorArgs([[]])
			->setMethods(['rename', 'unlink', 'moveFromStorage'])
			->getMock();

		$storage->expects($this->any())
			->method('rename')
			->will($this->returnValue(false));
		$storage->expects($this->any())
			->method('moveFromStorage')
			->will($this->returnValue(false));
		$storage->expects($this->any())
			->method('unlink')
			->will($this->returnValue(false));

		$cache = $storage->getCache();

		Filesystem::mount($storage, [], '/' . $this->user);
		$storage->mkdir('files');
		$this->userView->file_put_contents('test.txt', 'foo');
		$this->assertTrue($storage->file_exists('files/test.txt'));
		$this->assertFalse($this->userView->unlink('test.txt'));
		$this->assertTrue($storage->file_exists('files/test.txt'));
		$this->assertTrue($cache->inCache('files/test.txt'));

		// file should not be in the trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/');
		$this->assertCount(0, $results);
	}

	/**
	 * Delete should fail if the source folder can't be deleted.
	 */
	public function testSingleStorageDeleteFolderFail() {
		/**
		 * @var \OC\Files\Storage\Temporary | \PHPUnit_Framework_MockObject_MockObject $storage
		 */
		$storage = $this->getMockBuilder('\OC\Files\Storage\Temporary')
			->setConstructorArgs([[]])
			->setMethods(['rename', 'unlink', 'rmdir'])
			->getMock();

		$storage->expects($this->any())
			->method('rmdir')
			->will($this->returnValue(false));

		$cache = $storage->getCache();

		Filesystem::mount($storage, [], '/' . $this->user);
		$storage->mkdir('files');
		$this->userView->mkdir('folder');
		$this->userView->file_put_contents('folder/test.txt', 'foo');
		$this->assertTrue($storage->file_exists('files/folder/test.txt'));
		$this->assertFalse($this->userView->rmdir('files/folder'));
		$this->assertTrue($storage->file_exists('files/folder'));
		$this->assertTrue($storage->file_exists('files/folder/test.txt'));
		$this->assertTrue($cache->inCache('files/folder'));
		$this->assertTrue($cache->inCache('files/folder/test.txt'));

		// file should not be in the trashbin
		$results = $this->rootView->getDirectoryContent($this->user . '/files_trashbin/files/');
		$this->assertCount(0, $results);
	}

	/**
	 * @dataProvider dataTestShouldMoveToTrash
	 */
	public function testShouldMoveToTrash($mountPoint, $path, $userExists, $expected) {
		$tmpStorage = $this->getMockBuilder('\OC\Files\Storage\Temporary')
			->disableOriginalConstructor()->getMock();
		$userManager = $this->getMockBuilder('OCP\IUserManager')
			->disableOriginalConstructor()->getMock();
		$userManager->expects($this->any())
			->method('userExists')->willReturn($userExists);
		$storage = new \OCA\Files_Trashbin\Storage(
			['mountPoint' => $mountPoint, 'storage' => $tmpStorage],
			$userManager
		);

		$this->assertSame($expected,
			$this->invokePrivate($storage, 'shouldMoveToTrash', [$path])
		);

	}

	public function dataTestShouldMoveToTrash() {
		return [
			['/schiesbn/', '/files/test.txt', true, true],
			['/schiesbn/', '/files/test.txt', false, false],
			['/schiesbn/', '/test.txt', true, false],
			['/schiesbn/', '/test.txt', false, false],
		];
	}

	/**
	 * Test that deleting a file doesn't error when nobody is logged in
	 */
	public function testSingleStorageDeleteFileLoggedOut() {
		$this->logout();

		if (!$this->userView->file_exists('test.txt')) {
			$this->markTestSkipped('Skipping since the current home storage backend requires the user to logged in');
		} else {
			$this->userView->unlink('test.txt');
		}
	}

	private function markTestSkippedIfStorageHasOwnVersioning() {
		/** @var Storage $storage */
		list($storage, $internalPath) = $this->userView->resolvePath('folder/inside.txt');
		if ($storage->instanceOfStorage(ObjectStoreStorage::class)) {
			$this->markTestSkipped();
		}
	}
}
