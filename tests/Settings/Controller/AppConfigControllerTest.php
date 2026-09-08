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
	private AppConfigController $appConfigController;

	public function setUp(): void {
		parent::setUp();

		$this->appConfig = $this->createMock(IAppConfig::class);
		$this->request = $this->createMock(IRequest::class);
		$this->appConfigController = new AppConfigController('settings', $this->request, $this->appConfig);
	}

	public function testGetApps(): void {
		$this->appConfig->method('getApps')->willReturn(['appId1', 'appId2']);

		$expected = new JSONResponse(['appId1', 'appId2']);
		$this->assertEquals($expected->getData(), $this->appConfigController->getApps()->getData());
	}

	public function testGetKeys(): void {
		$this->appConfig->method('getKeys')
			->with('appId001')
			->willReturn(['key1', 'key2']);

		$expected = new JSONResponse(['key1', 'key2']);
		$this->assertEquals($expected->getData(), $this->appConfigController->getKeys('appId001')->getData());
	}

	public function testGetValue(): void {
		$this->appConfig->method('getValue')
			->with('appId001', 'key1', null)
			->willReturn('valueOfKey1');

		$expected = new JSONResponse('valueOfKey1');
		$this->assertEquals($expected->getData(), $this->appConfigController->getValue('appId001', 'key1', null)->getData());
	}

	public function testSetValue(): void {
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
			['core', 'remote_key1', 'foo'],
			['core', 'public_key1', 'foo'],
			// mangled "core" app ids that the database folds back to the
			// "core" row must not slip past the guard (OC10-146 / OC10-5)
			['core ', 'public_webdav', 'files/../../../poc.php'],
			[' core', 'public_key1', 'foo'],
			['CORE', 'public_key1', 'foo'],
			['Core', 'remote_key1', 'foo'],
			['core/', 'public_key1', 'foo'],
			['core..', 'remote_key1', 'foo'],
		];
	}

	/**
	 * @dataProvider setValueProvider
	 */
	public function testSetValueWrong($app, $key, $value): void {
		$this->appConfig->expects($this->never())
			->method('setValue');

		$response = $this->appConfigController->setValue($app, $key, $value);
		$this->assertEquals([], $response->getData());
		$this->assertSame(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function getValueWrongProvider(): array {
		return [
			['core', 'remote_key1'],
			['core', 'public_key1'],
			['core ', 'public_webdav'],
			['CORE', 'public_key1'],
			['core/', 'remote_key1'],
		];
	}

	/**
	 * @dataProvider getValueWrongProvider
	 */
	public function testGetValueWrong($app, $key): void {
		$this->appConfig->expects($this->never())
			->method('getValue');

		$response = $this->appConfigController->getValue($app, $key, null);
		$this->assertEquals([], $response->getData());
		$this->assertSame(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	/**
	 * The guard must only block the "core" app; unrelated apps whose id merely
	 * contains "core", and non-service keys on core, must still work.
	 */
	public function testSetValueAllowedNearMisses(): void {
		$this->appConfig->expects($this->exactly(2))
			->method('setValue')
			->willReturn(true);

		$response = $this->appConfigController->setValue('encore', 'public_key1', 'foo');
		$this->assertSame(Http::STATUS_OK, $response->getStatus());

		$response = $this->appConfigController->setValue('core', 'some_other_key', 'foo');
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function testDeleteKey(): void {
		$this->appConfig->method('deleteKey')
			->with('appId003', 'key3')
			->willReturn(true);

		$expected = new JSONResponse(true);
		$response = $this->appConfigController->deleteKey('appId003', 'key3');
		$this->assertEquals($expected->getData(), $response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function deleteKeyProvider(): array {
		return [
			[null, null],
			['appId1', null, null],
			['core', 'remote_key1', 'foo'],
			['core', 'public_key1', 'foo'],
			// mangled "core" app ids must be rejected here too (OC10-146)
			['core ', 'public_webdav'],
			[' core', 'public_key1'],
			['CORE', 'remote_key1'],
			['core/', 'public_key1'],
		];
	}

	/**
	 * @dataProvider deleteKeyProvider
	 */
	public function testDeleteKeyWrong($app, $key): void {
		$this->appConfig->expects($this->never())
			->method('deleteKey');

		$response = $this->appConfigController->deleteKey($app, $key);
		$this->assertEquals([], $response->getData());
		$this->assertSame(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testDeleteApp(): void {
		$this->appConfig->method('deleteApp')
			->with('appId003')
			->willReturn(true);

		$expected = new JSONResponse(true);
		$response = $this->appConfigController->deleteApp('appId003');
		$this->assertEquals($expected->getData(), $response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function deleteAppWrongProvider(): array {
		return [
			[null],
			// deleting the "core" appconfig (or a mangled spelling that folds
			// back to it) must be rejected (OC10-146)
			['core'],
			['core '],
			[' core'],
			['CORE'],
			['core/'],
		];
	}

	/**
	 * @dataProvider deleteAppWrongProvider
	 */
	public function testDeleteAppWrong($app): void {
		$this->appConfig->expects($this->never())
			->method('deleteApp');

		$response = $this->appConfigController->deleteApp($app);
		$this->assertEquals([], $response->getData());
		$this->assertSame(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testGetAppsRequiresAdmin(): void {
		$reflection = new \ReflectionMethod(AppConfigController::class, 'getApps');
		$docComment = (string)$reflection->getDocComment();
		$this->assertStringNotContainsString('@NoAdminRequired', $docComment);
	}

	public function testGetKeysRequiresAdmin(): void {
		$reflection = new \ReflectionMethod(AppConfigController::class, 'getKeys');
		$docComment = (string)$reflection->getDocComment();
		$this->assertStringNotContainsString('@NoAdminRequired', $docComment);
	}

	public function testGetValueRequiresAdmin(): void {
		$reflection = new \ReflectionMethod(AppConfigController::class, 'getValue');
		$docComment = (string)$reflection->getDocComment();
		$this->assertStringNotContainsString('@NoAdminRequired', $docComment);
	}
}
