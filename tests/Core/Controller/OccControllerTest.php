<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

use Test\TestCase;

/**
 * Class OccControllerTest
 *
 * @group DB
 * @package OC\Core\Controller
 */
class OccControllerTest extends TestCase {

	private static $oldSecret;
	const TEMP_SECRET = 'test';

	private $request;

	private $controller;

	public static function setUpBeforeClass(){
		self::$oldSecret = \OC::$server->getConfig()->setSystemValue('updater.secret', '');
		\OC::$server->getConfig()->setSystemValue('updater.secret', password_hash(self::TEMP_SECRET, PASSWORD_DEFAULT));
	}

	public static function tearDownAfterClass(){
		\OC::$server->getConfig()->setSystemValue('updater.secret', self::$oldSecret);
	}

	public function testFromInvalidLocation(){
		$this->getControllerMock('example.org');

		$response = $this->controller->execute('status', '');
		$responseData = $response->getData();

		$this->assertArrayHasKey('exitCode', $responseData);
		$this->assertEquals(126, $responseData['exitCode']);

		$this->assertArrayHasKey('details', $responseData);
		$this->assertEquals('Web executor is not allowed to run from a different host', $responseData['details']);
	}

	public function testNotWhiteListedCommand(){
		$this->getControllerMock('localhost');

		$response = $this->controller->execute('missing_command', '');
		$responseData = $response->getData();

		$this->assertArrayHasKey('exitCode', $responseData);
		$this->assertEquals(126, $responseData['exitCode']);

		$this->assertArrayHasKey('details', $responseData);
		$this->assertEquals('Command "missing_command" is not allowed to run via web request', $responseData['details']);
	}

	public function testWrongToken(){
		$this->getControllerMock('localhost');

		$response = $this->controller->execute('status', self::TEMP_SECRET . '-');
		$responseData = $response->getData();

		$this->assertArrayHasKey('exitCode', $responseData);
		$this->assertEquals(126, $responseData['exitCode']);

		$this->assertArrayHasKey('details', $responseData);
		$this->assertEquals('updater.secret does not match the provided token', $responseData['details']);
	}

	public function testSuccess(){
		$this->getControllerMock('localhost');

		$response = $this->controller->execute('status', self::TEMP_SECRET, ['--output'=>'json']);
		$responseData = $response->getData();

		$this->assertArrayHasKey('exitCode', $responseData);
		$this->assertEquals(0, $responseData['exitCode']);

		$this->assertArrayHasKey('response', $responseData);
		$decoded = json_decode($responseData['response'], true);

		$this->assertArrayHasKey('installed', $decoded);
		$this->assertEquals(true, $decoded['installed']);
	}

	private function getControllerMock($host){
		$this->getRequestMock($host);
		$this->controller = $this->getMockBuilder('OC\Core\Controller\OccController')
			->setConstructorArgs([
				'core',
				$this->request
			])
			->setMethods(null)
			->getMock()
		;
	}

	private function getRequestMock($host){
		$this->request = $this->getMockBuilder('OC\AppFramework\Http\Request')
			->setConstructorArgs([
				['server' => []],
				\OC::$server->getSecureRandom(),
				\OC::$server->getConfig()
			])
			->setMethods(['getRemoteAddress'])
			->getMock()
		;
		$this->request->method('getRemoteAddress')
			->will($this->returnValue($host))
		;
	}
}
