<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OCA\Files_Sharing\Tests;

use OC\Files\Filesystem;
use OC\Files\View;
use OCP\Lock\ILockingProvider;
use Test\Traits\UserTrait;

/**
 * Class LockingTest
 *
 * @group DB
 *
 * @package OCA\Files_Sharing\Tests
 */
class LockingTest extends TestCase {
	use UserTrait;

	private $ownerUid;
	private $recipientUid;

	public function setUp(): void {
		parent::setUp();

		$this->ownerUid = self::getUniqueID('owner_');
		$this->recipientUid = self::getUniqueID('recipient_');
		$this->createUser($this->ownerUid);
		$this->createUser($this->recipientUid);

		self::loginAsUser($this->ownerUid);
		Filesystem::mkdir('/foo');
		Filesystem::file_put_contents('/foo/bar.txt', 'asd');
		$fileId = Filesystem::getFileInfo('/foo/bar.txt')->getId();

		$this->share(
			\OCP\Share::SHARE_TYPE_USER,
			'/foo/bar.txt',
			$this->ownerUid,
			$this->recipientUid,
			\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_SHARE
		);

		self::loginAsUser($this->recipientUid);
		$this->assertTrue(Filesystem::file_exists('bar.txt'));
	}

	/**
	 */
	public function testLockAsRecipient() {
		$this->expectException(\OCP\Lock\LockedException::class);

		self::loginAsUser($this->ownerUid);

		Filesystem::initMountPoints($this->recipientUid);
		$recipientView = new View('/' . $this->recipientUid . '/files');
		$recipientView->lockFile('bar.txt', ILockingProvider::LOCK_EXCLUSIVE);

		Filesystem::rename('/foo', '/asd');
	}

	public function testUnLockAsRecipient() {
		self::loginAsUser($this->ownerUid);

		Filesystem::initMountPoints($this->recipientUid);
		$recipientView = new View('/' . $this->recipientUid . '/files');
		$recipientView->lockFile('bar.txt', ILockingProvider::LOCK_EXCLUSIVE);
		$recipientView->unlockFile('bar.txt', ILockingProvider::LOCK_EXCLUSIVE);

		$this->assertTrue(Filesystem::rename('/foo', '/asd'));
	}

	public function testChangeLock() {
		Filesystem::initMountPoints($this->recipientUid);
		$recipientView = new View('/' . $this->recipientUid . '/files');
		$recipientView->lockFile('bar.txt', ILockingProvider::LOCK_SHARED);
		$recipientView->changeLock('bar.txt', ILockingProvider::LOCK_EXCLUSIVE);
		$recipientView->unlockFile('bar.txt', ILockingProvider::LOCK_EXCLUSIVE);

		$this->assertTrue(true);
	}
}
