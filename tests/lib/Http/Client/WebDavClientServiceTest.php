<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace Test\Http\Client;

use OC\Http\Client\WebDavClientService;
use OCP\ICertificateManager;
use OCP\IConfig;
use OCP\ITempManager;
use Sabre\DAV\Client;

/**
 * Class WebDavClientServiceTest
 */
class WebDavClientServiceTest extends \Test\TestCase {
	/**
	 * @var ITempManager
	 */
	private $tempManager;

	public function setUp() {
		parent::setUp();
		$this->tempManager = \OC::$server->getTempManager();
	}

	public function tearDown() {
		$this->tempManager->clean();
		parent::tearDown();
	}

	public function testNewClient() {
		$config = $this->createMock(IConfig::class);
		$certificateManager = $this->createMock(ICertificateManager::class);
		$certificateManager->method('getAbsoluteBundlePath')
			->willReturn($this->tempManager->getTemporaryFolder());

		$clientService = new WebDavClientService($config, $certificateManager);

		$client = $clientService->newClient([
			'baseUri' => 'https://davhost/davroot/',
			'userName' => 'davUser'
		]);

		$this->assertInstanceOf(Client::class, $client);
	}

	/**
	 * Test Client with a proxy server
	 *
	 * @return void
	 */
	public function testNewClientWithProxy() {
		$config = $this->createMock(IConfig::class);
		$config->expects($this->exactly(2))
			->method('getSystemValue')
			->willReturnMap(
				[
					['proxy', null, 'proxyhost'],
					['proxyuserpwd', null, null]
				]
			);

		$certificateManager = $this->createMock(ICertificateManager::class);
		$certificateManager->method('getAbsoluteBundlePath')
			->willReturn($this->tempManager->getTemporaryFolder());

		$clientService = new WebDavClientService($config, $certificateManager);

		$client = $clientService->newClient([
			'baseUri' => 'https://davhost/davroot/',
			'userName' => 'davUser'
		]);

		$this->assertInstanceOf(Client::class, $client);

		$curlSettings = $this->readAttribute($client, 'curlSettings');
		$this->assertEquals('proxyhost', $curlSettings[CURLOPT_PROXY]);
	}

	/**
	 * Test Client with a proxy server and Authorization
	 *
	 * @return void
	 */
	public function testNewClientWithProxyAndAuth() {
		$config = $this->createMock(IConfig::class);
		$config->expects($this->exactly(2))
			->method('getSystemValue')
			->willReturnMap(
				[
					['proxy', null, 'proxyhost'],
					['proxyuserpwd', null, 'user:password']
				]
			);

		$certificateManager = $this->createMock(ICertificateManager::class);
		$certificateManager->method('getAbsoluteBundlePath')
			->willReturn($this->tempManager->getTemporaryFolder());

		$clientService = new WebDavClientService($config, $certificateManager);

		$client = $clientService->newClient([
			'baseUri' => 'https://davhost/davroot/',
			'userName' => 'davUser'
		]);

		$this->assertInstanceOf(Client::class, $client);

		$curlSettings = $this->readAttribute($client, 'curlSettings');
		$this->assertEquals('user:password@proxyhost', $curlSettings[CURLOPT_PROXY]);
	}

	public function testNewClientWithoutCertificate() {
		$config = $this->createMock(IConfig::class);
		$certificateManager = $this->createMock(ICertificateManager::class);
		$certificateManager->method('getAbsoluteBundlePath')
			->willReturn($this->tempManager->getTemporaryFolder() . '/unexist');

		$clientService = new WebDavClientService($config, $certificateManager);

		$client = $clientService->newClient([
			'baseUri' => 'https://davhost/davroot/',
			'userName' => 'davUser'
		]);

		$this->assertInstanceOf(Client::class, $client);
	}
}
