<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OCA\NotificationsMail\Tests\Controller;

use Test\TestCase;
use OCA\NotificationsMail\Controller\NotificationOptionsController;
use OCP\IUserSession;
use OCP\IConfig;
use OCP\IUser;

class NotificationOptionsControllerTest extends TestCase {
	/** @var IUserSession */
	private $userSession;
	/** @var IConfig */
	private $config;
	/** @var NotificationOptionsController */
	private $controller;

	protected function setUp() {
		parent::setUp();
		$this->userSession = $this->getMockBuilder(IUserSession::class)
			->disableOriginalConstructor()
			->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		$this->controller = new NotificationOptionsController($this->userSession, $this->config);
	}

	private function getSuccessResponse($value) {
		return json_encode([
			'data' => [
				'optionSet' => $value,
				'message' => 'Saved'
			]
		]);
	}

	public function emailNotificationOptionsProvider() {
		$errorResponse = json_encode([
			'data' => [
				'message' => 'Option not supported'
			]
		]);
		return [
			['never', $this->getSuccessResponse('never')],
			['action', $this->getSuccessResponse('action')],
			['always', $this->getSuccessResponse('always')],
			['randomkey', $errorResponse],
			['·$%·$&$%&/dfglkjdf ouer', $errorResponse],
		];
	}

	/**
	 * @dataProvider emailNotificationOptionsProvider
	 */
	public function testSetEmailNotificationOption($value, $expectedValue) {
		$validKeys = ['never', 'action', 'always'];

		$mockedUser = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$mockedUser->method('getUID')->willReturn('testUser');

		$this->userSession->method('getUser')->willReturn($mockedUser);

		$valuesSet = [];
		$this->config->method('setUserValue')
			->will($this->returnCallback(function($user, $app, $key, $value) use (&$valuesSet) {
				$valuesSet['user'] = $user;
				$valuesSet['app'] = $app;
				$valuesSet['key'] = $key;
				$valuesSet['value'] = $value;
				return null;
		}));

		if (!in_array($value, $validKeys, true)) {
			$this->config->expects($this->never())
				->method('setUserValue');
		}

		$result = $this->controller->setEmailNotificationOption($value);
		$this->assertEquals($expectedValue, $result->render());

		if (in_array($value, $validKeys, true)) {
			$this->assertEquals('testUser', $valuesSet['user']);
			$this->assertEquals('notificationsmail', $valuesSet['app']);
			$this->assertEquals('email_sending_option', $valuesSet['key']);
			$this->assertEquals($value, $valuesSet['value']);
		}
	}
}
