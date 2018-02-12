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

namespace OCA\notifications_mail\Tests\Controller;

use Test\TestCase;
use OCA\notifications_mail\Controller\NotificationOptionsController;

class NotificationOptionsControllerTest extends TestCase {
	private $userSession;
	private $config;
	private $l10n;
	private $controller;

	protected function setUp() {
		$this->userSession = $this->getMockBuilder('\OCP\IUserSession')
			->disableOriginalConstructor()
			->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()
			->getMock();
		$this->l10n = $this->getMockBuilder('\OCP\IL10N')
			->disableOriginalConstructor()
			->getMock();

		$this->l10n->method('t')
			->will($this->returnCallback(function ($text, $params) {
				return vsprintf($text, $params);
		}));

		$this->controller = new NotificationOptionsController($this->userSession, $this->config, $this->l10n);
	}

	private function getSuccessResponse($value) {
		return json_encode([
			'status' => 'success',
			'data' => [
				'optionSet' => $value,
				'message' => 'Saved'
			]
		]);
	}

	public function emailNotificationOptionsProvider() {
		$errorResponse = json_encode([
			'status' => 'failure',
			'data' => [
				'message' => 'Invalid value'
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

		$mockedUser = $this->getMockBuilder('\OCP\IUser')
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
			$this->assertEquals('notifications_mail', $valuesSet['app']);
			$this->assertEquals('email_sending_option', $valuesSet['key']);
			$this->assertEquals($value, $valuesSet['value']);
		}
	}
}
