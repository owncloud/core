<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace Tests\Sync;

use OC\Sync\SyncManager;
use OCP\Sync\ISyncer;
use OCP\Sync\User\IUserSyncer;
use Test\TestCase;

class SyncManagerTest extends TestCase {
	/** @var SyncManager */
	private $syncManager;

	protected function setUp(): void {
		$this->syncManager = new SyncManager();
	}

	public function testRegisterSyncer() {
		$syncer = $this->createMock(ISyncer::class);
		$this->assertTrue($this->syncManager->registerSyncer('mySyncer', $syncer));
	}

	public function testRegisterSyncerTwice() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer2 = $this->createMock(ISyncer::class);
		$this->assertTrue($this->syncManager->registerSyncer('mySyncer', $syncer));
		$this->assertFalse($this->syncManager->registerSyncer('mySyncer', $syncer2));
	}

	public function testOverwriteSyncer() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer2 = $this->createMock(ISyncer::class);
		$this->assertTrue($this->syncManager->registerSyncer('mySyncer', $syncer));
		$this->assertTrue($this->syncManager->overwriteSyncer('mySyncer', $syncer2));
	}

	public function testOverwriteSyncerNotOverwrite() {
		$syncer = $this->createMock(ISyncer::class);
		$this->assertFalse($this->syncManager->overwriteSyncer('mySyncer', $syncer));
	}

	public function testGetSyncerMissing() {
		$this->assertNull($this->syncManager->getSyncer('mySyncer'));
	}

	public function testGetSyncerSetAndGet() {
		$syncer = $this->createMock(ISyncer::class);
		$this->assertTrue($this->syncManager->registerSyncer('mySyncer', $syncer));
		$this->assertSame($syncer, $this->syncManager->getSyncer('mySyncer'));
	}

	public function testGetUserSyncerMissing() {
		$this->assertNull($this->syncManager->getUserSyncer());
	}

	public function testGetUserSyncerSetAndGet() {
		$userSyncer = $this->createMock(IUserSyncer::class);
		$this->assertTrue($this->syncManager->registerSyncer('user', $userSyncer));
		$this->assertSame($userSyncer, $this->syncManager->getUserSyncer());
	}

	public function testGetUserSyncerSetAndGetOverwrite() {
		$userSyncer = $this->createMock(IUserSyncer::class);
		$userSyncer2 = $this->createMock(IUserSyncer::class);
		$this->assertTrue($this->syncManager->registerSyncer('user', $userSyncer));
		$this->assertTrue($this->syncManager->overwriteSyncer('user', $userSyncer2));
		$this->assertSame($userSyncer2, $this->syncManager->getUserSyncer());
	}

	public function testGetUserSyncerNotUserSyncer() {
		$syncer = $this->createMock(ISyncer::class);
		$this->assertTrue($this->syncManager->registerSyncer('user', $syncer));
		$this->assertNull($this->syncManager->getUserSyncer());
	}
}
