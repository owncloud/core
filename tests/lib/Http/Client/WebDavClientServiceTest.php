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

	public function setUp(): void {
		parent::setUp();
		$this->tempManager = \OC::$server->getTempManager();
	}

	public function tearDown(): void {
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

	public function testNewClientWithProxy() {
		$config = $this->createMock(IConfig::class);
		$config->expects($this->once())
			->method('getSystemValue')
			->with('proxy', '')
			->willReturn('proxyhost');

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
