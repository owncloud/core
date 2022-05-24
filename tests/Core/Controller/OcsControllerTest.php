<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

namespace Tests\Core\Controller;

use Doctrine\DBAL\Driver\Statement;
use OC\AppFramework\Http\Request;
use OC\Core\Controller\OcsController;
use OCP\IDBConnection;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * Class OcsControllerTest
 *
 * @package OC\Core\Controller
 */
class OcsControllerTest extends TestCase {
	/** @var Request | MockObject */
	private $request;

	/** @var IDBConnection | MockObject */
	private $dbConn;

	/** @var IUserSession | MockObject */
	private $userSession;

	/** @var IUserManager | MockObject */
	private $userManager;

	/** @var  OcsController | MockObject */
	private $controller;

	protected function setUp(): void {
		parent::setUp();
		$this->request = $this->createMock(IRequest::class);
		$this->dbConn = $this->createMock(IDBConnection::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->controller = new OcsController(
			'core',
			$this->request,
			$this->dbConn,
			$this->userSession,
			$this->userManager
		);
	}

	public function testGetConfig() {
		$hostname = 'host';
		$this->request->expects($this->once())
			->method('getServerHost')
			->willReturn($hostname);
		$config = $this->controller->getConfig();
		$this->assertArrayHasKey('host', $config->getData());
		$this->assertEquals($hostname, $config->getData()['host']);
	}

	public function checkPersonDataProvider() {
		return [
			['', '', false, 101],
			['user', '', false, 101],
			['', 'password', false, 101],
			['user', 'password', false, 102],
			['user', 'password', $this->getUserMock(), 100],
		];
	}

	/**
	 * @dataProvider checkPersonDataProvider
	 *
	 * @param string $login
	 * @param string $password
	 * @param bool $checkPasswordSuccess
	 * @param int $expectedCode
	 */
	public function testCheckPerson($login, $password, $checkPasswordSuccess, $expectedCode) {
		$this->userManager->method('checkPassword')
			->willReturn($checkPasswordSuccess);
		$result = $this->controller->checkPerson($login, $password);
		$this->assertEquals($expectedCode, $result->getStatusCode());
	}

	public function getAttributeDataProvider() {
		return [
			['app', null],
			['app', 'key']
		];
	}

	/**
	 * @dataProvider getAttributeDataProvider
	 *
	 * @param string $app
	 * @param string|null $key
	 */
	public function testGetAttribute($app, $key) {
		$user = $this->getUserMock();
		$this->userSession->method('getUser')
			->willReturn($user);

		$stmt = $this->createMock(Statement::class);
		$stmt->expects($this->once())
			->method('execute');

		$this->dbConn->expects($this->once())
			->method('prepare')
			->with(
				$key === null ? OcsController::SELECT_MULTIPLE_STMT : OcsController::SELECT_SINGLE_STMT
			)
			->willReturn($stmt);
		$result = $this->controller->getAttribute($app, $key);
		$this->assertEquals(100, $result->getStatusCode());
	}

	public function testSetAttribute() {
		$app = 'foo';
		$key = 'bar';
		$value = '42';
		$user = $this->getUserMock();
		$this->userSession->method('getUser')
			->willReturn($user);
		$this->dbConn->expects($this->once())
			->method('upsert')
			->with(
				'*PREFIX*privatedata',
				[
					'value' => $value,
					'user' => $user->getUID(),
					'app' => $app,
					'key' => $key
				],
				[
					'user',
					'app',
					'key'
				]
			);
		$this->request->expects($this->once())
			->method('getParam')
			->with('value')
			->willReturn($value);
		$result = $this->controller->setAttribute($app, $key);
		$this->assertEquals(100, $result->getStatusCode());
	}

	public function testDeleteAttribute() {
		$app = 'foo';
		$key = 'bar';
		$user = $this->getUserMock();
		$this->userSession->method('getUser')
			->willReturn($user);

		$stmt = $this->createMock(Statement::class);
		$stmt->expects($this->once())
			->method('execute')
			->with([$user->getUID(), $app, $key]);

		$this->dbConn->expects($this->once())
			->method('prepare')
			->with(OcsController::DELETE_STMT)
			->willReturn($stmt);
		$result = $this->controller->deleteAttribute($app, $key);
		$this->assertEquals(100, $result->getStatusCode());
	}

	protected function getUserMock() {
		$userMock = $this->createMock(IUser::class);
		$userMock->method('getUID')
			->willReturn('foo');
		return $userMock;
	}
}
