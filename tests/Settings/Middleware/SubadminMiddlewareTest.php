<?php
/**
 * @author Lukas Reschke
 * @copyright Copyright (c) 2014 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Tests\Settings\Middleware;

use OC\AppFramework\Middleware\Security\Exceptions\NotAdminException;
use OC\AppFramework\Utility\ControllerMethodReflector;
use OC\Settings\Middleware\SubadminMiddleware;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use \OCP\IGroupManager;
use \OCP\ISubAdminManager;
use \OCP\IUserSession;

/**
 * Verifies whether an user has at least subadmin rights.
 * To bypass use the `@NoSubadminRequired` annotation
 *
 * @package Tests\Settings\Middleware
 */
class SubadminMiddlewareTest extends \Test\TestCase {
	/** @var SubadminMiddleware */
	private $subadminMiddleware;
	/** @var ControllerMethodReflector */
	private $reflector;
	/** @var Controller */
	private $controller;
	/** @var \OCP\IGroupManager */
	private $groupManager;
	/** @var \OCP\ISubAdminManager */
	private $subadminManager;
	/** @var \OCP\IUserSession */
	private $session;

	protected function setUp() {
		$this->groupManager = $this->getMockBuilder(IGroupManager::class)
			->disableOriginalConstructor()->getMock();

		$this->subadminManager = $this->getMockBuilder(ISubAdminManager::class)
			->disableOriginalConstructor()->getMock();
		$this->groupManager->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($this->subadminManager));
		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->will($this->returnValue(false));

		$this->session = $this->getMockBuilder(IUserSession::class)
			->disableOriginalConstructor()->getMock();
		$user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()->getMock();
		$user->expects($this->any())
			->method('getUID')
			->will($this->returnValue('foo'));
		$this->session
			->expects($this->any())
			->method('getUser')
			->will($this->returnValue($user));

		$this->reflector = $this->getMockBuilder(ControllerMethodReflector::class)
			->disableOriginalConstructor()->getMock();
		$this->controller = $this->getMockBuilder(Controller::class)
			->disableOriginalConstructor()->getMock();

		$this->subadminMiddleware = new SubadminMiddleware($this->reflector, $this->groupManager, $this->session);
	}

	/**
	 * @expectedException \OC\AppFramework\Middleware\Security\Exceptions\NotAdminException
	 */
	public function testBeforeControllerAsUserWithExemption() {
		$this->reflector
			->expects($this->once())
			->method('hasAnnotation')
			->with('NoSubadminRequired')
			->will($this->returnValue(false));

		$this->subadminManager->expects($this->any())
			->method('isSubAdmin')
			->will($this->returnValue(false));
		$this->subadminMiddleware->beforeController($this->controller, 'foo');
	}


	public function testBeforeControllerAsUserWithoutExemption() {
		$this->reflector
			->expects($this->once())
			->method('hasAnnotation')
			->with('NoSubadminRequired')
			->will($this->returnValue(true));

		$this->subadminManager->expects($this->any())
			->method('isSubAdmin')
			->will($this->returnValue(false));
		$this->subadminMiddleware->beforeController($this->controller, 'foo');
	}

	public function testBeforeControllerAsSubAdminWithoutExemption() {
		$this->reflector
			->expects($this->once())
			->method('hasAnnotation')
			->with('NoSubadminRequired')
			->will($this->returnValue(false));

		$this->subadminManager->expects($this->any())
			->method('isSubAdmin')
			->will($this->returnValue(true));
		$this->subadminMiddleware->beforeController($this->controller, 'foo');
	}

	public function testBeforeControllerAsSubAdminWithExemption() {
		$this->reflector
			->expects($this->once())
			->method('hasAnnotation')
			->with('NoSubadminRequired')
			->will($this->returnValue(true));

		$this->subadminManager->expects($this->any())
			->method('isSubAdmin')
			->will($this->returnValue(true));
		$this->subadminMiddleware->beforeController($this->controller, 'foo');
	}

	public function testAfterNotAdminException() {
		$expectedResponse = new TemplateResponse('core', '403', [], 'guest');
		$expectedResponse->setStatus(403);
		$this->assertEquals($expectedResponse, $this->subadminMiddleware->afterException($this->controller, 'foo', new NotAdminException()));
	}

	/**
	 * @expectedException \Exception
	 */
	public function testAfterRegularException() {
		$expectedResponse = new TemplateResponse('core', '403', [], 'guest');
		$expectedResponse->setStatus(403);
		$this->subadminMiddleware->afterException($this->controller, 'foo', new \Exception());
	}
}
