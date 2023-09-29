<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace Tests\Settings\Controller;

use OC\Settings\Controller\AppConfigController;
use OCP\IRequest;
use OCP\IAppConfig;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * Class AppSettingsControllerTest
 *
 * @package Tests\Settings\Controller
 */
class AppConfigControllerTest extends TestCase {
	/** @var (IRequest & MockObject) */
	public $request;
	/** @var IAppConfig */
	private $appConfig;
	/** @var AppConfigController */
	private $appConfigController;

	public function setUp(): void {
		parent::setUp();

		$this->appConfig = $this->createMock(IAppConfig::class);
		$this->request = $this->createMock(IRequest::class);
		$this->appConfigController = new AppConfigController('settings', $this->request, $this->appConfig);
	}

	public function testGetApps() {
		$this->appConfig->method('getApps')->willReturn(['appId1', 'appId2']);

		$expected = new JSONResponse(['appId1', 'appId2']);
		$this->assertEquals($expected->getData(), $this->appConfigController->getApps()->getData());
	}

	public function testGetKeys() {
		$this->appConfig->method('getKeys')
			->with('appId001')
			->willReturn(['key1', 'key2']);

		$expected = new JSONResponse(['key1', 'key2']);
		$this->assertEquals($expected->getData(), $this->appConfigController->getKeys('appId001')->getData());
	}

	public function testGetValue() {
		$this->appConfig->method('getValue')
			->with('appId001', 'key1', null)
			->willReturn('valueOfKey1');

		$expected = new JSONResponse('valueOfKey1');
		$this->assertEquals($expected->getData(), $this->appConfigController->getValue('appId001', 'key1', null)->getData());
	}

	public function testSetValue() {
		$this->appConfig->method('setValue')
			->with('appId003', 'key3', 'value3')
			->willReturn(true);

		$expected = new JSONResponse(true);
		$response = $this->appConfigController->setValue('appId003', 'key3', 'value3');
		$this->assertEquals($expected->getData(), $response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function setValueProvider() {
		return [
			[null, null, null],
			['appId1', null, null],
			['appId1', 'key1', null],
		];
	}

	/**
	 * @dataProvider setValueProvider
	 */
	public function testSetValueWrong($app, $key, $value) {
		$this->appConfig->expects($this->never())
			->method('setValue');

		$response = $this->appConfigController->setValue($app, $key, $value);
		$this->assertEquals([], $response->getData());
		$this->assertSame(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testDeleteKey() {
		$this->appConfig->method('deleteKey')
			->with('appId003', 'key3')
			->willReturn(true);

		$expected = new JSONResponse(true);
		$response = $this->appConfigController->deleteKey('appId003', 'key3');
		$this->assertEquals($expected->getData(), $response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function deleteKeyProvider() {
		return [
			[null, null],
			['appId1', null, null],
		];
	}

	/**
	 * @dataProvider deleteKeyProvider
	 */
	public function testdeleteKeyWrong($app, $key) {
		$this->appConfig->expects($this->never())
			->method('deleteKey');

		$response = $this->appConfigController->deleteKey($app, $key);
		$this->assertEquals([], $response->getData());
		$this->assertSame(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testDeleteApp() {
		$this->appConfig->method('deleteApp')
			->with('appId003')
			->willReturn(true);

		$expected = new JSONResponse(true);
		$response = $this->appConfigController->deleteApp('appId003');
		$this->assertEquals($expected->getData(), $response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function testdeleteAppWrong() {
		$this->appConfig->expects($this->never())
			->method('deleteApp');

		$response = $this->appConfigController->deleteApp(null);
		$this->assertEquals([], $response->getData());
		$this->assertSame(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}
}
