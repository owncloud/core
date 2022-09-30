<?php
/**
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

namespace OCA\DAV\Tests\unit\DAV;

use OC\Lock\Persistent\Lock;
use OC\Lock\Persistent\LockMapper;
use OCA\DAV\Connector\Sabre\LockPlugin;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\AppFramework\QueryException;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\IUserSession;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Locks\LockInfo;
use Sabre\DAV\Server;
use Sabre\DAV\Tree;
use Test\TestCase;

/**
 * Class LockPluginTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\unit\DAV
 */
class LockPluginTest extends TestCase {
	/** @var Server | \PHPUnit\Framework\MockObject\MockObject */
	private $server;
	/** @var LockPlugin */
	private $plugin;
	/** @var Tree | \PHPUnit\Framework\MockObject\MockObject */
	private $tree;
	/** @var LockMapper | \PHPUnit\Framework\MockObject\MockObject */
	private $lockMapper;
	/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject */
	private $userSession;
	/**
	 * @var IConfig|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $config;
	/**
	 * @var IGroupManager|\PHPUnit\Framework\MockObject\MockObject
	 */
	private $groupManager;

	public function setUp(): void {
		parent::setUp();
		$this->config = $this->createMock(IConfig::class);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->plugin = new LockPlugin($this->config, $this->groupManager);

		$this->server = $this->createMock(Server::class);
		$this->tree = $this->createMock(Tree::class);
		$this->server->tree = $this->tree;

		$this->plugin->initialize($this->server);
		$this->lockMapper = $this->createMock(LockMapper::class);
		$this->userSession = $this->createMock(IUserSession::class);

		$this->overwriteService(LockMapper::class, $this->lockMapper);
		$this->overwriteService('UserSession', $this->userSession);
	}

	protected function tearDown(): void {
		$this->restoreService('UserSession');
		$this->restoreService(LockMapper::class);
		parent::tearDown();
	}

	/**
	 * @dataProvider providesConfigValues
	 * @param string $lockBreakerGroups
	 * @throws DoesNotExistException
	 * @throws Forbidden
	 * @throws MultipleObjectsReturnedException
	 * @throws QueryException
	 */
	public function testBeforeUnlock(string $lockBreakerGroups): void {
		$this->expectException(Forbidden::class);

		$lock = new LockInfo();
		$lock->token = '123-456-789';

		$dbLock = new Lock();
		$dbLock->setOwnerAccountId(666);
		$this->lockMapper->method('getLockByToken')->willReturn($dbLock);
		$user = $this->createMock(IUser::class);
		$user->method('getAccountId')->willReturn(777);
		$this->userSession->method('getUser')->willReturn($user);

		$this->config->method('getAppValue')->willReturn($lockBreakerGroups);

		$this->plugin->beforeUnlock('foo', $lock);
	}

	public function providesConfigValues(): array {
		return [
			'empty array' => ['[]'],
			'not a valid json string' => ['[}'],
			'not in any group' => [\json_encode(['group1', 'group2'])],
		];
	}
}
