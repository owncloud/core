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
			// "core" row must not slip past the guard
			['core ', 'public_webdav', 'files/../../../poc.php'],
			[' core', 'public_key1', 'foo'],
			['CORE', 'public_key1', 'foo'],
			['Core', 'remote_key1', 'foo'],
			['core/', 'public_key1', 'foo'],
			['core..', 'remote_key1', 'foo'],
			// non-canonical app ids are refused outright, whatever the key, since
			// any of them may be folded onto an existing row by the database
			'blank padded into a varchar(32) truncation' => ['core' . \str_repeat(' ', 28) . 'X', 'key1', 'foo'],
			'trailing invalid byte' => ["core\x81", 'key1', 'foo'],
			'accented' => ['córe', 'key1', 'foo'],
			'longer than the appid column' => [\str_repeat('a', 33), 'key1', 'foo'],
			'illegal character' => ['app!', 'key1', 'foo'],
			'empty app id' => ['', 'key1', 'foo'],
			// PCRE's $ also matches before a trailing newline, so the charset check
			// has to be anchored with \z or these would truncate onto another row
			'trailing newline' => ["core\n", 'key1', 'foo'],
			'over-length with trailing newline' => [\str_repeat('a', 32) . "\n", 'key1', 'foo'],
			'non-string app id' => [['core'], 'key1', 'foo'],
			// a non-string key must be refused, not stringified to "Array" - which
			// would pass both the prefix test and the charset test
			'non-string key on core' => ['core', ['public_webdav'], 'foo'],
			// a non-string key would reach OC\AppConfig as an array subscript
			'non-string key on another app' => ['files_sharing', ['key1'], 'foo'],
			// a case-insensitive collation folds these onto the stored service row,
			// so a case-sensitive prefix test would let them overwrite it
			'upper-case service key on core' => ['core', 'PUBLIC_webdav', 'files/ajax/download.php'],
			'mixed-case service key on core' => ['core', 'Remote_dav', 'foo'],
			// and an accent-insensitive collation folds a key no prefix test catches
			'accented service key on core' => ['core', 'públic_webdav', 'foo'],
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
			['core', 'PUBLIC_webdav'],
			['core', 'Remote_dav'],
			// the read path carries the same pair of guards as the write paths, so
			// that the three cannot drift apart - a read cannot fold onto the stored
			// row (getValue() is an exact lookup in the preloaded cache), it is the
			// predicate being shared that this pins
			'non-canonical key on core' => ['core', 'públic_webdav'],
			'non-string key on core' => ['core', ['public_webdav']],
			'non-string app id' => [['core'], 'public_webdav'],
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
	 * The read guard must not over-block either: a canonical, non-service key on
	 * core still has to be readable, otherwise a future tightening to a bare
	 * isCoreApp() check would pass the suite while breaking admins.
	 */
	public function testGetValueAllowedOnCoreForNonServiceKey(): void {
		$this->appConfig->expects($this->once())
			->method('getValue')
			->with('core', 'lastupdatedat', null)
			->willReturn('1600000000');

		$response = $this->appConfigController->getValue('core', 'lastupdatedat', null);
		$this->assertSame('1600000000', $response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	/**
	 * The guard must only block the "core" app; unrelated apps whose id merely
	 * contains "core", and non-service keys on core, must still work.
	 */
	public function testSetValueAllowedNearMisses(): void {
		$this->appConfig->expects($this->exactly(3))
			->method('setValue')
			->willReturn(true);

		$response = $this->appConfigController->setValue('encore', 'public_key1', 'foo');
		$this->assertSame(Http::STATUS_OK, $response->getStatus());

		$response = $this->appConfigController->setValue('core', 'some_other_key', 'foo');
		$this->assertSame(Http::STATUS_OK, $response->getStatus());

		// only "core" rows are read by public.php/remote.php, so the guard must key
		// on the app and not on the key prefix alone - files_sharing legitimately
		// owns public_share_* keys
		$response = $this->appConfigController->setValue(
			'files_sharing',
			'public_share_sharers_groups_allowlist',
			'["group1"]'
		);
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

	/**
	 * The core guards must not over-block: a canonical, non-service key on core
	 * still has to be deletable, otherwise a future "simplification" of the guard
	 * to a bare isCoreApp() check would pass the suite while breaking admins.
	 */
	public function testDeleteKeyAllowedOnCoreForNonServiceKey(): void {
		$this->appConfig->expects($this->once())
			->method('deleteKey')
			->with('core', 'lastupdatedat')
			->willReturn(true);

		$response = $this->appConfigController->deleteKey('core', 'lastupdatedat');
		$this->assertTrue($response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	/**
	 * Unlike setValue()/deleteApp(), deleteKey() does not require a canonical app
	 * id: a row written under a non-canonical one before that guard existed - or by
	 * occ, or by an app calling setAppValue() - has to stay removable, as long as
	 * the key itself is canonical and not a service handler.
	 */
	public function testDeleteKeyAllowedForNonCanonicalAppId(): void {
		$this->appConfig->expects($this->once())
			->method('deleteKey')
			->with('app!', 'key1')
			->willReturn(true);

		$response = $this->appConfigController->deleteKey('app!', 'key1');
		$this->assertTrue($response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	/**
	 * A canonical app id keeps its own handler-looking keys: only the core rows are
	 * ever read as service handlers, and files_sharing legitimately owns
	 * public_share_*, so the narrower gate must not catch it.
	 */
	public function testDeleteKeyAllowedForHandlerLookingKeyOnAnotherApp(): void {
		$this->appConfig->expects($this->once())
			->method('deleteKey')
			->with('files_sharing', 'public_share_sharers_groups_allowlist')
			->willReturn(true);

		$response = $this->appConfigController->deleteKey(
			'files_sharing',
			'public_share_sharers_groups_allowlist'
		);
		$this->assertTrue($response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function deleteKeyProvider(): array {
		return [
			[null, null],
			['appId1', null, null],
			['core', 'remote_key1', 'foo'],
			['core', 'public_key1', 'foo'],
			// mangled "core" app ids must be rejected here too
			['core ', 'public_webdav'],
			[' core', 'public_key1'],
			['CORE', 'remote_key1'],
			['core/', 'public_key1'],
			// a non-canonical app id may only have a plainly harmless key deleted:
			// isCoreApp() cannot see a spelling only the collation folds onto
			// "core", so these would remove core's registered handler on an
			// accent-insensitive collation
			// PAD SPACE plus varchar(32) truncation needs no exotic collation at all,
			// which makes this the most realistic fold of the set
			'handler key under a blank-padded truncation' => ['core' . \str_repeat(' ', 28) . 'X', 'public_webdav'],
			'handler key under a folding app id' => ['córe', 'public_webdav'],
			'remote handler under a folding app id' => ['córe', 'remote_dav'],
			'upper-case handler under a non-canonical app id' => ['app!', 'PUBLIC_webdav'],
			'non-canonical key under a non-canonical app id' => ['app!', 'públic_webdav'],
			// a non-string app id would reach the database layer as an array
			'non-string app id' => [['core'], 'key1'],
			'non-string key under a non-canonical app id' => ['app!', ['key1']],
			'non-string key on core' => ['core', ['public_webdav']],
			// a non-string key would reach OC\AppConfig as an array subscript
			'non-string key on another app' => ['files_sharing', ['key1']],
			'upper-case service key on core' => ['core', 'PUBLIC_webdav'],
			'accented service key on core' => ['core', 'públic_webdav'],
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
			// back to it) must be rejected
			['core'],
			['core '],
			[' core'],
			['CORE'],
			['core/'],
			// and a non-canonical app id must not reach deleteApp at all
			'blank padded into a varchar(32) truncation' => ['core' . \str_repeat(' ', 28) . 'X'],
			'trailing invalid byte' => ["core\x81"],
			'accented' => ['córe'],
			'longer than the appid column' => [\str_repeat('a', 33)],
			'illegal character' => ['app!'],
			'empty app id' => [''],
			'trailing newline' => ["core\n"],
			'over-length with trailing newline' => [\str_repeat('a', 32) . "\n"],
			'non-string app id' => [['core']],
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
