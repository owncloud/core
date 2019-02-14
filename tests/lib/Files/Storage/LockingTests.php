<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 */

namespace Test\Files\Storage;

use OC\Files\Filesystem;
use OC\Files\View;
use OCP\Files\Storage\IPersistentLockingStorage;
use Test\TestCase;

/**
 * Class LockingTests
 *
 * @group DB
 *
 * @package Test\Files\Storage
 */
class LockingTests extends TestCase {

	/** @var View */
	private $view;
	/** @var IPersistentLockingStorage */
	private $storage;
	/** @var int */
	private $fileId;

	protected function setUp(): void {
		parent::setUp();

		$user = $this->createUser('locking-user');
		self::loginAsUser($user->getUID());

		// we are working on the view level here because we want to use the
		// configured primary strage
		$this->view = Filesystem::getView();
		$this->view->mkdir('foo');
		$this->view->file_put_contents('foo/bar.txt', 'abcdef');
		$this->fileId = $this->view->getFileInfo('foo/bar.txt')->getId();
		list($this->storage, ) = $this->view->resolvePath('foo/bar.txt');
	}

	protected function tearDown(): void {
		if ($this->storage) {
			$this->storage->unlockNodePersistent('files/foo/bar.txt', [
				'token' => '123-456-789'
			]);
		}
		parent::tearDown();
	}

	protected function createUser($name) {
		$userManager = \OC::$server->getUserManager();
		if ($userManager->userExists($name)) {
			$userManager->get($name)->delete();
		}
		return $userManager->createUser($name, $name);
	}

	public function testGetLocks() {
		// no locks
		$locks = $this->storage->getLocks('files/foo/bar.txt');
		self::assertEquals([], $locks);

		// locking the file
		$lock = $this->storage->lockNodePersistent('files/foo/bar.txt', [
			'token' => '123-456-789'
		]);
		self::assertNotNull($lock);
		self::assertEquals('123-456-789', $lock->getToken());

		// lock shall exist
		$locks = $this->storage->getLocks('files/foo/bar.txt');
		self::assertCount(1, $locks);
		self::assertEquals('locking-user', $locks[0]->getOwner());
		self::assertEquals($this->fileId, $locks[0]->getFileId());

		// unlocking
		$this->storage->unlockNodePersistent('files/foo/bar.txt', [
			'token' => '123-456-789'
		]);

		// lock shall be gone
		$locks = $this->storage->getLocks('files/foo/bar.txt');
		self::assertEquals([], $locks);
	}
}
