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

namespace Tests\Core\Command\Sync;

use OC\Core\Command\Sync\Sync;
use OCP\Sync\ISyncManager;
use OCP\Sync\ISyncer;
use OCP\Sync\SyncException;
use Symfony\Component\Console\Tester\CommandTester;

class SyncTest extends \Test\TestCase {
	/** @var CommandTester */
	private $commandTester;
	/** @var ISyncManager */
	private $syncManager;

	protected function setUp(): void {
		parent::setUp();

		$this->syncManager = $this->createMock(ISyncManager::class);

		$this->commandTester = new CommandTester(new Sync($this->syncManager));
	}

	public function testSync() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('check')
			->will($this->returnCallback(function ($callback) {
				$items = [
					['item' => ['id' => 'abcdef', 'date' => '23th Jan', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
					['item' => ['id' => 'zzzzzz', 'date' => '12th Jun', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
					['item' => ['id' => 'fgfgfg', 'date' => '8th Jul', 'author' => 'Bob'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
				];
				foreach ($items as $item) {
					$callback($item['item'], $item['state']);
				}
			}));
		$syncer->method('sync')
			->will($this->returnCallback(function ($callback) {
				$items = [
					['id' => 'abcdef', 'date' => '24th Jan', 'author' => 'Alice'],
					['id' => 'zzzzzz', 'date' => '13th Jun', 'author' => 'Alice'],
					['id' => 'fgfgfg', 'date' => '9th Jul', 'author' => 'Bob'],
				];
				foreach ($items as $item) {
					$callback($item);
				}
			}));

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(0, $this->commandTester->execute(['service' => 'calendar']));
	}

	public function testSync2() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('check')
			->will($this->returnCallback(function ($callback) {
				$items = [
					['item' => ['id' => 'abcdef', 'date' => '23th Jan', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
					['item' => ['id' => 'zzzzzz', 'date' => '12th Jun', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_DISABLED],
					['item' => ['id' => 'fgfgfg', 'date' => '8th Jul', 'author' => 'Bob'], 'state' => ISyncer::CHECK_STATE_REMOVED],
				];
				foreach ($items as $item) {
					$callback($item['item'], $item['state']);
				}
			}));
		$syncer->method('sync')
			->will($this->returnCallback(function ($callback) {
				$items = [
					['id' => 'abcdef', 'date' => '24th Jan', 'author' => 'Alice'],
					['id' => 'zzzzzz', 'date' => '13th Jun', 'author' => 'Alice'],
					['id' => 'fgfgfg', 'date' => '9th Jul', 'author' => 'Bob'],
				];
				foreach ($items as $item) {
					$callback($item);
				}
			}));

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(0, $this->commandTester->execute(['service' => 'calendar']));
		$this->assertStringContainsString('- State for item with id = zzzzzz has changed to disabled', $this->commandTester->getDisplay());
		$this->assertStringContainsString('- State for item with id = fgfgfg has changed to removed', $this->commandTester->getDisplay());
	}

	public function testSyncSyncException() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('check')
			->will($this->returnCallback(function ($callback) {
				$items = [
					['item' => ['id' => 'abcdef', 'date' => '23th Jan', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
					['item' => ['id' => 'zzzzzz', 'date' => '12th Jun', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
					['item' => ['id' => 'fgfgfg', 'date' => '8th Jul', 'author' => 'Bob'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
				];
				foreach ($items as $item) {
					$callback($item['item'], $item['state']);
				}
			}));
		$syncer->method('sync')
			->will($this->returnCallback(function ($callback) {
				$items = [
					['id' => 'abcdef', 'date' => '24th Jan', 'author' => 'Alice'],
					new SyncException('No connection available'),
					['id' => 'fgfgfg', 'date' => '9th Jul', 'author' => 'Bob'],
				];
				foreach ($items as $item) {
					$callback($item);
				}
			}));

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(2, $this->commandTester->execute(['service' => 'calendar']));
		$this->assertStringContainsString('- No connection available', $this->commandTester->getDisplay());
	}

	public function testSyncCheckException() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('check')
			->will($this->returnCallback(function ($callback) {
				$items = [
					['item' => ['id' => 'abcdef', 'date' => '23th Jan', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
					['item' => new SyncException('Checking failed'), 'state' => ISyncer::CHECK_STATE_ERROR],
					['item' => ['id' => 'fgfgfg', 'date' => '8th Jul', 'author' => 'Bob'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
				];
				foreach ($items as $item) {
					$callback($item['item'], $item['state']);
				}
			}));
		$syncer->method('sync')
			->will($this->returnCallback(function ($callback) {
				$items = [
					['id' => 'abcdef', 'date' => '24th Jan', 'author' => 'Alice'],
					['id' => 'zzzzzz', 'date' => '13th Jun', 'author' => 'Alice'],
					['id' => 'fgfgfg', 'date' => '9th Jul', 'author' => 'Bob'],
				];
				foreach ($items as $item) {
					$callback($item);
				}
			}));

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(2, $this->commandTester->execute(['service' => 'calendar']));
		$this->assertStringContainsString('- Checking failed', $this->commandTester->getDisplay());
	}

	public function testSyncOpts() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('check')
			->with($this->anything(), $this->equalTo(['opt1' => 'abcdef', 'isImp' => 'yes', 'opt2' => '9999']))
			->will($this->returnCallback(function ($callback) {
				$items = [
					['item' => ['id' => 'abcdef', 'date' => '23th Jan', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
					['item' => ['id' => 'zzzzzz', 'date' => '12th Jun', 'author' => 'Alice'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
					['item' => ['id' => 'fgfgfg', 'date' => '8th Jul', 'author' => 'Bob'], 'state' => ISyncer::CHECK_STATE_NO_CHANGE],
				];
				foreach ($items as $item) {
					$callback($item['item'], $item['state']);
				}
			}));
		$syncer->method('sync')
			->with($this->anything(), $this->equalTo(['opt1' => 'abcdef', 'isImp' => 'yes', 'opt2' => '9999']))
			->will($this->returnCallback(function ($callback) {
				$items = [
					['id' => 'abcdef', 'date' => '24th Jan', 'author' => 'Alice'],
					['id' => 'zzzzzz', 'date' => '13th Jun', 'author' => 'Alice'],
					['id' => 'fgfgfg', 'date' => '9th Jul', 'author' => 'Bob'],
				];
				foreach ($items as $item) {
					$callback($item);
				}
			}));

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(0, $this->commandTester->execute(['service' => 'calendar', '-o' => ['opt1=abcdef', 'isImp=yes', 'opt2=9999']]));
	}

	public function testSyncOne() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('checkOne')
			->with('zzzzzz', $this->anything())
			->willReturn(ISyncer::CHECK_STATE_NO_CHANGE);
		$syncer->method('syncOne')
			->with('zzzzzz', $this->anything())
			->willReturn(true);

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(0, $this->commandTester->execute(['service' => 'calendar', '--only-one' => 'zzzzzz']));
	}

	public function testSyncOneCheckDisabled() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('checkOne')
			->with('zzzzzz', $this->anything())
			->willReturn(ISyncer::CHECK_STATE_DISABLED);
		$syncer->method('syncOne')
			->with('zzzzzz', $this->anything())
			->willReturn(true);

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(2, $this->commandTester->execute(['service' => 'calendar', '--only-one' => 'zzzzzz']));
		$this->assertStringContainsString('zzzzzz state changed to disabled', $this->commandTester->getDisplay());
	}

	public function testSyncOneCheckRemoved() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('checkOne')
			->with('zzzzzz', $this->anything())
			->willReturn(ISyncer::CHECK_STATE_REMOVED);
		$syncer->method('syncOne')
			->with('zzzzzz', $this->anything())
			->willReturn(true);

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(2, $this->commandTester->execute(['service' => 'calendar', '--only-one' => 'zzzzzz']));
		$this->assertStringContainsString('zzzzzz state changed to removed', $this->commandTester->getDisplay());
	}

	public function testSyncOneCheckException() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('checkOne')
			->with('zzzzzz', $this->anything())
			->will($this->throwException(new SyncException('Cannot check the user')));
		$syncer->method('syncOne')
			->with('zzzzzz', $this->anything())
			->willReturn(true);

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(2, $this->commandTester->execute(['service' => 'calendar', '--only-one' => 'zzzzzz']));
		$this->assertStringContainsString('Error: Cannot check the user', $this->commandTester->getDisplay());
	}

	public function testSyncOneSyncNotFound() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('checkOne')
			->with('zzzzzz', $this->anything())
			->willReturn(ISyncer::CHECK_STATE_NO_CHANGE);
		$syncer->method('syncOne')
			->with('zzzzzz', $this->anything())
			->willReturn(false);

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(2, $this->commandTester->execute(['service' => 'calendar', '--only-one' => 'zzzzzz']));
		$this->assertStringContainsString('zzzzzz cannot be synced because it isn\'t found remotely', $this->commandTester->getDisplay());
	}

	public function testSyncOneSyncException() {
		$syncer = $this->createMock(ISyncer::class);
		$syncer->method('checkOne')
			->with('zzzzzz', $this->anything())
			->willReturn(ISyncer::CHECK_STATE_NO_CHANGE);
		$syncer->method('syncOne')
			->with('zzzzzz', $this->anything())
			->will($this->throwException(new SyncException('Cannot access external source')));

		$this->syncManager->method('getSyncer')
			->willReturn($syncer);

		$this->assertSame(2, $this->commandTester->execute(['service' => 'calendar', '--only-one' => 'zzzzzz']));
		$this->assertStringContainsString('Error: Cannot access external source', $this->commandTester->getDisplay());
	}

	public function testSyncServiceNotFound() {
		$this->syncManager->method('getSyncer')
			->willReturn(null);

		$this->assertSame(1, $this->commandTester->execute(['service' => 'calendar']));
	}
}
