<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Provisioning_API\Tests\Middleware;

use OC\AppFramework\Middleware\Security\Exceptions\NotAdminException;
use OCA\Provisioning_API\Controller\AppsController;
use OCA\Provisioning_API\Middleware\ProvisioningMiddleware;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Utility\IControllerMethodReflector;
use OCP\IGroupManager;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

class ProvisioningMiddlewareTest extends TestCase {
	/** @var IRequest | MockObject */
	private $request;

	/** @var IUserSession | MockObject */
	private $userSession;

	/** @var IGroupManager | MockObject */
	private $groupManager;

	/** @var IControllerMethodReflector | MockObject */
	private $reflector;

	/** @var ProvisioningMiddleware */
	private $middleware;

	protected function setUp(): void {
		parent::setUp();
		$this->request = $this->createMock(IRequest::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->reflector = $this->createMock(IControllerMethodReflector::class);

		$this->middleware = new ProvisioningMiddleware(
			'provisioning_api',
			$this->request,
			$this->userSession,
			$this->groupManager,
			$this->reflector
		);
	}

	public function beforeControllerTestData() {
		return [
			[AppsController::class, 'getApps', false, true],
			[AppsController::class, 'getApps', true, false],
			[Controller::class, 'getApps', true, false],
			[Controller::class, 'getApps', false, false],
		];
	}

	/**
	 * @dataProvider beforeControllerTestData
	 *
	 * @param string $controllerClass
	 * @param string $methodName
	 * @param bool $isAdmin
	 * @param bool $isExceptionExpected
	 */
	public function testBeforeController($controllerClass, $methodName, $isAdmin, $isExceptionExpected) {
		$controller = $this->createMock($controllerClass);
		$user = $this->createMock(IUser::class);
		$this->userSession->method('getUser')
			->willReturn($user);
		$this->groupManager->method('isAdmin')
			->willReturn($isAdmin);

		if ($isExceptionExpected === true) {
			$this->expectException(NotAdminException::class);
		}

		$this->assertNull($this->middleware->beforeController($controller, $methodName));
	}
}
