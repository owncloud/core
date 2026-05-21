<?php

namespace Test\Files\External;

use OC\Files\External\StoragesBackendChecker;
use OCP\IConfig;
use OCP\Files\External\Backend\Backend;

class StoragesBackendCheckerTest extends \Test\TestCase {
	/** @var StoragesBackendChecker */
	private $storagesBackendChecker;

	/** @var IConfig */
	private $config;

	protected function setUp(): void {
		$this->config = $this->createMock(IConfig::class);

		$this->storagesBackendChecker = new StoragesBackendChecker($this->config);
	}

	public function isUserMountingAllowedProvider() {
		return [
			['no', '', false],
			['no', 'local,smb', false],
			['yes', '', false],
			['yes', 'local,smb', true],
			['yes', 'smb', true],
			['', 'local,smb', false],
			['random', 'local,smb', false],
		];
	}

	/**
	 * @dataProvider isUserMountingAllowedProvider
	 */
	public function testIsUserMountingAllowed($allowUserMounting, $allowedBackends, $expectedResult) {
		$this->config->method('getAppValue')->willReturnCallback(function ($app, $key, $default) use ($allowUserMounting, $allowedBackends) {
			$map = [
				'allow_user_mounting' => $allowUserMounting,
				'user_mounting_backends' => $allowedBackends,
			];
			if ($app === 'files_external') {
				if (isset($map[$key])) {
					return $map[$key];
				}
			}
			return $default;
		});

		$this->assertEquals($expectedResult, $this->storagesBackendChecker->isUserMountingAllowed());
	}

	public function isAllowedUserBackendProvider() {
		$backend1 = $this->createMock(Backend::class);
		$backend1->method('getStorageClass')->willReturn('\OC\Files\Storage\DAV');
		$backend1->method('getIdentifierAliases')->willReturn(['\OCA\Files_External\Lib\Backend\DAV', 'DAV']);
		$backend2 = $this->createMock(Backend::class);
		$backend2->method('getStorageClass')->willReturn('\OC\Files\Storage\Local');
		$backend2->method('getIdentifierAliases')->willReturn(['\OCA\Files_External\Lib\Backend\Local', 'local']);
		return [
			['no', '', $backend1, false],
			['no', '', $backend2, false],
			['no', 'DAV,local', $backend1, false],
			['no', 'DAV,local', $backend2, false],
			['no', '\OCA\Files_External\Lib\Backend\DAV,\OCA\Files_External\Lib\Backend\Local', $backend1, false],
			['no', '\OCA\Files_External\Lib\Backend\DAV,\OCA\Files_External\Lib\Backend\Local', $backend2, false],
			['yes', '', $backend1, false],
			['yes', '', $backend2, false],
			['yes', 'DAV,local', $backend1, true],
			['yes', 'DAV,local', $backend2, false],  // local storage always disallowed
			['yes', '\OCA\Files_External\Lib\Backend\DAV,\OCA\Files_External\Lib\Backend\Local', $backend1, true],
			['yes', '\OCA\Files_External\Lib\Backend\DAV,\OCA\Files_External\Lib\Backend\Local', $backend2, false],
		];
	}

	/**
	 * @dataProvider isAllowedUserBackendProvider
	 */
	public function testIsAllowedUserBackend($allowUserMounting, $allowedBackends, $backend, $expectedResult) {
		$this->config->method('getAppValue')->willReturnCallback(function ($app, $key, $default) use ($allowUserMounting, $allowedBackends) {
			$map = [
				'allow_user_mounting' => $allowUserMounting,
				'user_mounting_backends' => $allowedBackends,
			];
			if ($app === 'files_external') {
				if (isset($map[$key])) {
					return $map[$key];
				}
			}
			return $default;
		});

		$this->assertEquals($expectedResult, $this->storagesBackendChecker->isAllowedUserBackend($backend));
	}

	public function isAllowedAdminBackendProvider() {
		$backend1 = $this->createMock(Backend::class);
		$backend1->method('getStorageClass')->willReturn('\OC\Files\Storage\DAV');
		$backend1->method('getIdentifierAliases')->willReturn(['\OCA\Files_External\Lib\Backend\DAV', 'DAV']);
		$backend2 = $this->createMock(Backend::class);
		$backend2->method('getStorageClass')->willReturn('\OC\Files\Storage\Local');
		$backend2->method('getIdentifierAliases')->willReturn(['\OCA\Files_External\Lib\Backend\Local', 'local']);
		return [
			[false, $backend1, true],
			[false, $backend2, false],
			[true, $backend1, true],
			[true, $backend2, true],
		];
	}

	/**
	 * @dataProvider isAllowedAdminBackendProvider
	 */
	public function testIsAllowedAdminBackend($isLocalAllowed, $backend, $expectedResult) {
		$this->config->method('getSystemValue')->willReturnCallback(function ($key, $default) use ($isLocalAllowed) {
			if ($key === 'files_external_allow_create_new_local') {
				return $isLocalAllowed;
			}
			return $default;
		});

		$this->assertEquals($expectedResult, $this->storagesBackendChecker->isAllowedAdminBackend($backend));
	}
}
