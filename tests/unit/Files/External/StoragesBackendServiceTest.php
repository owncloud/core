<?php
/**
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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
namespace Test\Files\External;

use OCP\Files\External\IStoragesBackendService;
use OC\Files\External\StoragesBackendService;

class StoragesBackendServiceTest extends \Test\TestCase {

	/** @var \OCP\IConfig */
	protected $config;

	protected function setUp() {
		$this->config = $this->createMock('\OCP\IConfig');
	}

	/**
	 * @param string $class
	 *
	 * @return \OCP\Files\External\Backend\Backend
	 */
	protected function getBackendMock($class) {
		$backend = $this->getMockBuilder('\OCP\Files\External\Backend\Backend')
			->disableOriginalConstructor()
			->getMock();
		$backend->method('getIdentifier')->will($this->returnValue('identifier:'.$class));
		$backend->method('getIdentifierAliases')->will($this->returnValue(['identifier:'.$class]));
		return $backend;
	}

	/**
	 * @param string $class
	 *
	 * @return \OCP\Files\External\Auth\AuthMechanism
	 */
	protected function getAuthMechanismMock($class) {
		$backend = $this->getMockBuilder('\OCP\Files\External\Auth\AuthMechanism')
			->disableOriginalConstructor()
			->getMock();
		$backend->method('getIdentifier')->will($this->returnValue('identifier:'.$class));
		$backend->method('getIdentifierAliases')->will($this->returnValue(['identifier:'.$class]));
		return $backend;
	}

	public function testRegisterBackend() {
		$service = new StoragesBackendService($this->config);

		$backend = $this->getBackendMock('\Foo\Bar');

		$backendAlias = $this->getMockBuilder('\OCP\Files\External\Backend\Backend')
			->disableOriginalConstructor()
			->getMock();
		$backendAlias->method('getIdentifierAliases')
			->willReturn(['identifier_real', 'identifier_alias']);
		$backendAlias->method('getIdentifier')
			->willReturn('identifier_real');

		$service->registerBackend($backend);
		$service->registerBackend($backendAlias);

		$this->assertEquals($backend, $service->getBackend('identifier:\Foo\Bar'));
		$this->assertEquals($backendAlias, $service->getBackend('identifier_real'));
		$this->assertEquals($backendAlias, $service->getBackend('identifier_alias'));

		$backends = $service->getBackends();
		$this->assertCount(2, $backends);
		$this->assertArrayHasKey('identifier:\Foo\Bar', $backends);
		$this->assertArrayHasKey('identifier_real', $backends);
		$this->assertArrayNotHasKey('identifier_alias', $backends);
	}

	public function testBackendProvider() {
		$service = new StoragesBackendService($this->config);

		$backend1 = $this->getBackendMock('\Foo\Bar');
		$backend2 = $this->getBackendMock('\Bar\Foo');

		$providerMock = $this->createMock('\OCP\Files\External\Config\IBackendProvider');
		$providerMock->expects($this->once())
			->method('getBackends')
			->willReturn([$backend1, $backend2]);
		$service->registerBackendProvider($providerMock);

		$this->assertEquals($backend1, $service->getBackend('identifier:\Foo\Bar'));
		$this->assertEquals($backend2, $service->getBackend('identifier:\Bar\Foo'));

		$this->assertCount(2, $service->getBackends());
	}

	public function testAuthMechanismProvider() {
		$service = new StoragesBackendService($this->config);

		$backend1 = $this->getAuthMechanismMock('\Foo\Bar');
		$backend2 = $this->getAuthMechanismMock('\Bar\Foo');

		$providerMock = $this->createMock('\OCP\Files\External\Config\IAuthMechanismProvider');
		$providerMock->expects($this->once())
			->method('getAuthMechanisms')
			->willReturn([$backend1, $backend2]);
		$service->registerAuthMechanismProvider($providerMock);

		$this->assertEquals($backend1, $service->getAuthMechanism('identifier:\Foo\Bar'));
		$this->assertEquals($backend2, $service->getAuthMechanism('identifier:\Bar\Foo'));

		$this->assertCount(2, $service->getAuthMechanisms());
	}

	public function testMultipleBackendProviders() {
		$service = new StoragesBackendService($this->config);

		$backend1a = $this->getBackendMock('\Foo\Bar');
		$backend1b = $this->getBackendMock('\Bar\Foo');

		$backend2 = $this->getBackendMock('\Dead\Beef');

		$provider1Mock = $this->createMock('\OCP\Files\External\Config\IBackendProvider');
		$provider1Mock->expects($this->once())
			->method('getBackends')
			->willReturn([$backend1a, $backend1b]);
		$service->registerBackendProvider($provider1Mock);
		$provider2Mock = $this->createMock('\OCP\Files\External\Config\IBackendProvider');
		$provider2Mock->expects($this->once())
			->method('getBackends')
			->willReturn([$backend2]);
		$service->registerBackendProvider($provider2Mock);

		$this->assertEquals($backend1a, $service->getBackend('identifier:\Foo\Bar'));
		$this->assertEquals($backend1b, $service->getBackend('identifier:\Bar\Foo'));
		$this->assertEquals($backend2, $service->getBackend('identifier:\Dead\Beef'));

		$this->assertCount(3, $service->getBackends());
	}

	public function testUserMountingBackends() {
		$this->config->expects($this->exactly(2))
			->method('getAppValue')
			->will($this->returnValueMap([
				['files_external', 'allow_user_mounting', 'yes', 'yes'],
				['files_external', 'user_mounting_backends', '', 'identifier:\User\Mount\Allowed,identifier_alias']
			]));

		$service = new StoragesBackendService($this->config);

		$backendAllowed = $this->getBackendMock('\User\Mount\Allowed');
		$backendAllowed->expects($this->never())
			->method('removeVisibility');
		$backendNotAllowed = $this->getBackendMock('\User\Mount\NotAllowed');
		$backendNotAllowed->expects($this->once())
			->method('removeVisibility')
			->with(IStoragesBackendService::VISIBILITY_PERSONAL);

		$backendAlias = $this->getMockBuilder('\OCP\Files\External\Backend\Backend')
			->disableOriginalConstructor()
			->getMock();
		$backendAlias->method('getIdentifierAliases')
			->willReturn(['identifier_real', 'identifier_alias']);
		$backendAlias->expects($this->never())
			->method('removeVisibility');

		$service->registerBackend($backendAllowed);
		$service->registerBackend($backendNotAllowed);
		$service->registerBackend($backendAlias);
	}

	public function testGetAvailableBackends() {
		$service = new StoragesBackendService($this->config);

		$backendAvailable = $this->getBackendMock('\Backend\Available');
		$backendAvailable->expects($this->once())
			->method('checkDependencies')
			->will($this->returnValue([]));
		$backendNotAvailable = $this->getBackendMock('\Backend\NotAvailable');
		$backendNotAvailable->expects($this->once())
			->method('checkDependencies')
			->will($this->returnValue([
				$this->getMockBuilder('\OC\Files\External\MissingDependency')
					->disableOriginalConstructor()
					->getMock()
			]));

		$service->registerBackend($backendAvailable);
		$service->registerBackend($backendNotAvailable);

		$availableBackends = $service->getAvailableBackends();
		$this->assertArrayHasKey('identifier:\Backend\Available', $availableBackends);
		$this->assertArrayNotHasKey('identifier:\Backend\NotAvailable', $availableBackends);
	}

}

