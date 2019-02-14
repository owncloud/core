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
use OCP\IUser;
use OCP\IUserSession;
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

	public function setUp(): void {
		parent::setUp();
		$this->plugin = new LockPlugin();

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
		parent::tearDown();
		$this->restoreService('UserSession');
		$this->restoreService(LockMapper::class);
	}

	/**
	 * @expectedException  \Sabre\DAV\Exception\Forbidden
	 */
	public function testBeforeUnlock() {
		$lock = new LockInfo();
		$lock->token = '123-456-789';

		$dbLock = new Lock();
		$dbLock->setOwnerAccountId(666);
		$this->lockMapper->method('getLockByToken')->willReturn($dbLock);
		$user = $this->createMock(IUser::class);
		$user->method('getAccountId')->willReturn(777);
		$this->userSession->method('getUser')->willReturn($user);

		$this->plugin->beforeUnlock('foo', $lock);
	}
}
