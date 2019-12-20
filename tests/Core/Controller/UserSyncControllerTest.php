<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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
declare(strict_types = 1);

namespace Tests\Core\Controller;

use OC\Core\Controller\UserSyncController;
use OC\OCS\Result;
use OC\User\SyncService;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserManager;
use OCP\UserInterface;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * Class RolesControllerTest
 *
 * @package OC\Core\Controller
 */
class UserSyncControllerTest extends TestCase {
	/**
	 * @var UserSyncController
	 */
	private $controller;
	/**
	 * @var MockObject | IUserManager
	 */
	private $userManager;
	/**
	 * @var MockObject | SyncService
	 */
	private $syncService;

	protected function setUp(): void {
		/** @var IRequest $request */
		$request = $this->createMock(IRequest::class);
		$this->syncService = $this->createMock(SyncService::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->controller = new UserSyncController('core', $request, $this->syncService, $this->userManager);

		parent::setUp();
	}

	public function testSimpleSync() {
		$user = $this->createMock(IUser::class);
		$userBackend = $this->createMock(UserInterface::class);
		$userBackend->method('getUsers')->willReturn([$user]);
		$this->userManager->method('getBackends')->willReturn([$userBackend]);
		$this->syncService->expects(self::once())->method('run')->with($userBackend, new \ArrayIterator([$user]));

		$result = $this->controller->syncUser('alice');

		$this->assertEquals([], $result->getData());
		$this->assertEquals(['status' => 'ok',
			'statuscode' => 100,
			'message' => null
		], $result->getMeta());
	}

	public function testUnknownUser() {
		$userBackend = $this->createMock(UserInterface::class);
		$userBackend->method('getUsers')->willReturn([]);
		$this->userManager->method('getBackends')->willReturn([$userBackend]);
		$this->syncService->expects(self::never())->method('run');

		$result = $this->controller->syncUser('alice');

		$this->assertEquals([], $result->getData());
		$this->assertEquals(['status' => 'failure',
			'statuscode' => 404,
			'message' => 'User is not known in any user backend: alice'
		], $result->getMeta());
	}

	public function testConflict() {
		$user = $this->createMock(IUser::class);
		$userBackend = $this->createMock(UserInterface::class);
		$userBackend->method('getUsers')->willReturn([$user, $user]);
		$this->userManager->method('getBackends')->willReturn([$userBackend]);
		$this->syncService->expects(self::never())->method('run');

		$result = $this->controller->syncUser('alice');

		$this->assertEquals([], $result->getData());
		$backEndClass = \get_class($userBackend);
		$this->assertEquals(['status' => 'failure',
			'statuscode' => 409,
			'message' => "Multiple users returned from backend($backEndClass) for: alice. Cancelling sync."
		], $result->getMeta());
	}
}
