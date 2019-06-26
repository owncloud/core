<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OCA\Files_Sharing\Tests\External;

use OC\Files\Storage\StorageFactory;
use OCA\Files_Sharing\External\Manager;
use OCA\Files_Sharing\External\MountProvider;
use OCA\Files_Sharing\Tests\TestCase;
use OCP\Share\Events\AcceptShare;
use OCP\Share\Events\DeclineShare;
use OCP\Share\Events\ShareEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Test\Traits\UserTrait;

/**
 * Class ManagerTest
 *
 * @group DB
 *
 * @package OCA\Files_Sharing\Tests\External
 */
class ManagerTest extends TestCase {
	use UserTrait;

	/** @var Manager **/
	private $manager;

	/** @var \OC\Files\Mount\Manager */
	private $mountManager;

	/** @var \PHPUnit\Framework\MockObject\MockObject */
	private $eventDispatcher;

	private $uid;

	/**
	 * @var \OCP\IUser
	 */
	private $user;
	private $mountProvider;

	protected function setUp() {
		parent::setUp();

		$this->uid = $this->getUniqueID('user');
		$this->createUser($this->uid);
		$this->user = \OC::$server->getUserManager()->get($this->uid);
		$this->mountManager = new \OC\Files\Mount\Manager();
		$this->eventDispatcher = $eventDispatcher = $this->createMock(EventDispatcherInterface::class);

		/** @var EventDispatcherInterface $eventDispatcher */
		$this->manager = new Manager(
			\OC::$server->getDatabaseConnection(),
			$this->mountManager,
			new StorageFactory(),
			\OC::$server->getNotificationManager(),
			$eventDispatcher,
			$this->uid
		);
		$this->mountProvider = new MountProvider(\OC::$server->getDatabaseConnection(), function () {
			return $this->manager;
		});
	}

	private function setupMounts() {
		$mounts = $this->mountProvider->getMountsForUser($this->user, new StorageFactory());
		foreach ($mounts as $mount) {
			$this->mountManager->addMount($mount);
		}
	}

	public function testAddShare() {
		$shareData1 = [
			'remote' => 'http://localhost',
			'token' => 'token5',
			'password' => '',
			'name' => '/SharedFolder',
			'owner' => 'foobar',
			'accepted' => false,
			'user' => $this->uid,
		];
		$shareData2 = $shareData1;
		$shareData2['token'] = 'token2';
		$shareData3 = $shareData1;
		$shareData3['token'] = 'token3';

		// Add a share for "user"
		$this->assertNull(\call_user_func_array([$this->manager, 'addShare'], $shareData1));
		$openShares = $this->manager->getOpenShares();
		$this->assertCount(1, $openShares);
		$this->assertExternalShareEntry($shareData1, $openShares[0], 1, '{{TemporaryMountPointName#' . $shareData1['name'] . '}}');

		$this->setupMounts();
		$this->assertNotMount('SharedFolder');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}');

		// Add a second share for "user" with the same name
		$this->assertNull(\call_user_func_array([$this->manager, 'addShare'], $shareData2));
		$openShares = $this->manager->getOpenShares();
		$this->assertCount(2, $openShares);
		$this->assertExternalShareEntry($shareData1, $openShares[0], 1, '{{TemporaryMountPointName#' . $shareData1['name'] . '}}');
		// New share falls back to "-1" appendix, because the name is already taken
		$this->assertExternalShareEntry($shareData2, $openShares[1], 2, '{{TemporaryMountPointName#' . $shareData2['name'] . '}}-1');

		$this->setupMounts();
		$this->assertNotMount('SharedFolder');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}-1');

		$this->eventDispatcher->expects($this->at(0))
			->method('dispatch')
			->with(AcceptShare::class, $this->callback(function ($event) use ($openShares) {
				return $this->verifyShareEvent($event, $openShares[0], AcceptShare::class);
			}
				));

		// Accept the first share
		$this->manager->acceptShare($openShares[0]['id']);

		// Check remaining shares - Accepted
		$acceptedShares = self::invokePrivate($this->manager, 'getShares', [true]);
		$this->assertCount(1, $acceptedShares);
		$shareData1['accepted'] = true;
		$this->assertExternalShareEntry($shareData1, $acceptedShares[0], 1, $shareData1['name']);
		// Check remaining shares - Open
		$openShares = $this->manager->getOpenShares();
		$this->assertCount(1, $openShares);
		$this->assertExternalShareEntry($shareData2, $openShares[0], 2, '{{TemporaryMountPointName#' . $shareData2['name'] . '}}-1');

		$this->setupMounts();
		$this->assertMount($shareData1['name']);
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}-1');

		// Add another share for "user" with the same name
		$this->assertNull(\call_user_func_array([$this->manager, 'addShare'], $shareData3));
		$openShares = $this->manager->getOpenShares();
		$this->assertCount(2, $openShares);
		$this->assertExternalShareEntry($shareData2, $openShares[0], 2, '{{TemporaryMountPointName#' . $shareData2['name'] . '}}-1');
		// New share falls back to the original name (no "-\d", because the name is not taken)
		$this->assertExternalShareEntry($shareData3, $openShares[1], 3, '{{TemporaryMountPointName#' . $shareData3['name'] . '}}');

		$this->setupMounts();
		$this->assertMount($shareData1['name']);
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}-1');

		$this->eventDispatcher->expects($this->at(0))
			->method('dispatch')
			->with(DeclineShare::class, $this->callback(function ($event) use ($openShares) {
				return $this->verifyShareEvent($event, $openShares[1], DeclineShare::class);
			}
			));

		// Decline the third share
		$this->manager->declineShare($openShares[1]['id']);

		$this->setupMounts();
		$this->assertMount($shareData1['name']);
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}-1');

		// Check remaining shares - Accepted
		$acceptedShares = self::invokePrivate($this->manager, 'getShares', [true]);
		$this->assertCount(1, $acceptedShares);
		$shareData1['accepted'] = true;
		$this->assertExternalShareEntry($shareData1, $acceptedShares[0], 1, $shareData1['name']);
		// Check remaining shares - Open
		$openShares = $this->manager->getOpenShares();
		$this->assertCount(1, $openShares);
		$this->assertExternalShareEntry($shareData2, $openShares[0], 2, '{{TemporaryMountPointName#' . $shareData2['name'] . '}}-1');

		$this->setupMounts();
		$this->assertMount($shareData1['name']);
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}-1');

		$this->eventDispatcher->expects($this->at(0))
			->method('dispatch')
			->with(DeclineShare::class, $this->callback(function ($event) use ($openShares) {
				return $this->verifyShareEvent($event, $openShares[0], DeclineShare::class);
			}
			));
		$this->eventDispatcher->expects($this->at(1))
			->method('dispatch')
			->with(DeclineShare::class, $this->callback(function ($event) use ($acceptedShares) {
				return $this->verifyShareEvent($event, $acceptedShares[0], DeclineShare::class);
			}
			));

		$this->manager->removeUserShares($this->uid);
		$this->assertEmpty(self::invokePrivate($this->manager, 'getShares', [null]), 'Asserting all shares for the user have been deleted');

		$this->mountManager->clear();
		self::invokePrivate($this->manager, 'setupMounts');
		$this->assertNotMount($shareData1['name']);
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}-1');
	}

	public function testAddShareAccepted() {
		$shareData1 = [
			'remote' => 'http://localhost',
			'token' => 'token6',
			'password' => '',
			'name' => '/SharedFolder',
			'owner' => 'foobar',
			'accepted' => true,
			'user' => $this->uid,
		];

		// Add a accepted share for "user"
		\call_user_func_array([$this->manager, 'addShare'], $shareData1);
		$this->setupMounts();
		$this->assertMount($shareData1['name']);
	}

	/**
	 * Verify that a share event matches a given share
	 *
	 */
	protected function verifyShareEvent(ShareEvent $event, $share, $expectedClass) {
		return $share['remote_id'] == $event->getRemoteId() && \get_class($event) === $expectedClass;
	}

	/**
	 * @param array $expected
	 * @param array $actual
	 * @param int $share
	 * @param string $mountPoint
	 */
	protected function assertExternalShareEntry($expected, $actual, $share, $mountPoint) {
		$this->assertEquals($expected['remote'], $actual['remote'], 'Asserting remote of a share #' . $share);
		$this->assertEquals($expected['token'], $actual['share_token'], 'Asserting token of a share #' . $share);
		$this->assertEquals($expected['name'], $actual['name'], 'Asserting name of a share #' . $share);
		$this->assertEquals($expected['owner'], $actual['owner'], 'Asserting owner of a share #' . $share);
		$this->assertEquals($expected['accepted'], (int) $actual['accepted'], 'Asserting accept of a share #' . $share);
		$this->assertEquals($expected['user'], $actual['user'], 'Asserting user of a share #' . $share);
		$this->assertEquals($mountPoint, $actual['mountpoint'], 'Asserting mountpoint of a share #' . $share);
	}

	private function assertMount($mountPoint) {
		$mountPoint = \rtrim($mountPoint, '/');
		$mount = $this->mountManager->find($this->getFullPath($mountPoint));
		$this->assertInstanceOf('\OCA\Files_Sharing\External\Mount', $mount);
		$this->assertInstanceOf('\OCP\Files\Mount\IMountPoint', $mount);
		$this->assertEquals($this->getFullPath($mountPoint), \rtrim($mount->getMountPoint(), '/'));
		$storage = $mount->getStorage();
		$this->assertInstanceOf('\OCA\Files_Sharing\External\Storage', $storage);
	}

	private function assertNotMount($mountPoint) {
		$mountPoint = \rtrim($mountPoint, '/');
		$mount = $this->mountManager->find($this->getFullPath($mountPoint));
		if ($mount) {
			$this->assertInstanceOf('\OCP\Files\Mount\IMountPoint', $mount);
			$this->assertNotEquals($this->getFullPath($mountPoint), \rtrim($mount->getMountPoint(), '/'));
		} else {
			$this->assertNull($mount);
		}
	}

	private function getFullPath($path) {
		return '/' . $this->uid . '/files' . $path;
	}

	public function testRemoveShare() {
		/*$shareData1 = [
			'remote' => 'http://localhost',
			'token' => 'token1',
			'password' => '',
			'name' => '/SharedFolder',
			'owner' => 'foobar',
			'accepted' => false,
			'user' => $this->uid,
		];
		$shareData2 = $shareData1;
		$shareData2['token'] = 'token2';
		$shareData3 = $shareData1;
		$shareData3['token'] = 'token3';

		// Add a share for "user"
		$this->assertNull(call_user_func_array([$this->manager, 'addShare'], $shareData1));
		$openShares = $this->manager->getOpenShares();
		$this->assertCount(1, $openShares);
		$this->assertExternalShareEntry($shareData1, $openShares[0], 1, '{{TemporaryMountPointName#' . $shareData1['name'] . '}}');

		$this->setupMounts();
		$this->assertNotMount('SharedFolder');
		$this->assertNotMount('{{TemporaryMountPointName#' . $shareData1['name'] . '}}');*/

		$this->mountManager = $this->createMock(\OC\Files\Mount\Manager::class);
		$idbConnection = $this->createMock(\OCP\IDBConnection::class);
		$prepare = $this->createMock(\Doctrine\DBAL\Driver\Statement::class);
		$prepare->method('execute')
			->willReturn(true);
		$idbConnection->method('prepare')
			->willReturn($prepare);
		$storageFactory = $this->createMock(\OCP\Files\Storage\IStorageFactory::class);
		$this->manager = new Manager(
			$idbConnection,
			$this->mountManager,
			$storageFactory,
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			$this->uid
		);

		$mountpointobj = $this->createMock(\OC\Files\Mount\MountPoint::class);
		$this->mountManager->method('find')
			->willReturn($mountpointobj);
		$storage = $this->createMock(\OC\Files\Storage\Storage::class);
		$fileCache = $this->createMock(\OC\Files\Cache\Cache::class);
		$storage->method('getCache')
			->willReturn($fileCache);
		$mountpointobj->method('getStorage')
			->willReturn($storage);

		$iqueryBuilder = $this->createMock(\OCP\DB\QueryBuilder\IQueryBuilder::class);
		$iqueryBuilder->method('select')
			->willReturn($iqueryBuilder);
		$iqueryBuilder->method('from')
			->willReturn($iqueryBuilder);
		$iqueryBuilder->method('where')
			->willReturn($iqueryBuilder);
		$iqueryBuilder->method('delete')
			->willReturn($iqueryBuilder);
		$expressionBuilder = $this->createMock(\OCP\DB\QueryBuilder\IExpressionBuilder::class);
		$iqueryBuilder->method('expr')
			->willReturn($expressionBuilder);
		$idbConnection->method('getQueryBuilder')
			->willReturn($iqueryBuilder);

		$called = [];
		\OC::$server->getEventDispatcher()->addListener('\OCA\Files_Sharing::unshareEvent', function ($event) use (&$called) {
			$called[] = '\OCA\Files_Sharing::unshareEvent';
			\array_push($called, $event);
		});

		$this->manager->removeShare('/SharedFolder');
		$this->assertSame('\OCA\Files_Sharing::unshareEvent', $called[0]);
		$this->assertArrayHasKey('user', $called[1]);
	}
}
