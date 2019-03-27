<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\Encryption\Tests\Command;

use OCA\Encryption\Command\HSMDaemon;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Http\Client\IClientService;
use GuzzleHttp\Client;
use OCP\Http\Client\IResponse;
use OCP\IConfig;
use OCP\ILogger;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;

/**
 * Class HSMDaemonTest
 *
 * @group DB
 * @package OCA\Encryption\Tests\Command
 */
class HSMDaemonTest extends TestCase {
	/** @var IClientService | \PHPUnit_Framework_MockObject_MockObject */
	private $httpClient;
	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject */
	private $logger;
	/** @var ITimeFactory | \PHPUnit_Framework_MockObject_MockObject */
	private $timeFactory;
	/** @var HSMDaemon */
	private $hsmDeamon;

	public function setUp() {
		parent::setUp();
		$this->httpClient = $this->createMock(IClientService::class);
		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);

		$newClient = $this->createMock(Client::class);

		$iResponse = $this->createMock(IResponse::class);
		$iResponse->method('getBody')
			->willReturn(\base64_decode(\base64_encode("foo")));

		$newClient->method('post')
			->willReturn($iResponse);

		$this->httpClient->method('newClient')
			->willReturn($newClient);
		$this->hsmDeamon = new HSMDaemon($this->httpClient, $this->config, $this->logger, $this->timeFactory);
	}

	public function testExecuteWithDecryptOption() {
		$inputInterface = $this->createMock(InputInterface::class);
		$inputInterface->method('getOption')
			->with('decrypt')
			->willReturn(true);

		$outputInterface = $this->createMock(OutputInterface::class);
		$outputInterface->expects($this->once())
			->method('writeln')
			->with("received: 'foo'");

		$this->config->method('getAppValue')
			->willReturn('http://localhost:1234');

		$iRespose = $this->createMock(IResponse::class);
		$iRespose->method('getBody')
			->willReturn(\base64_decode(\base64_encode("foo")));

		$this->invokePrivate($this->hsmDeamon, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteWithExportMasterKey() {
		$inputInterface = $this->createMock(InputInterface::class);
		$inputInterface->method('getOption')
			->willReturnMap([
				['decrypt', false],
				['export-masterkey', true]
			]);

		$outputInterface = $this->createMock(OutputInterface::class);
		$outputInterface->expects($this->once())->method('writeln')
			->with("current masterkey (base64 encoded): ''");

		$this->config->method('getAppValue')
			->willReturnMap([
				['encryption', 'hsm.url', '', 'http://localhost:1234'],
				['encryption', 'masterKeyId', '', 'abcd']
			]);

		$this->invokePrivate($this->hsmDeamon, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteFailsNoHSMURLSet() {
		$inputInterface = $this->createMock(InputInterface::class);
		$inputInterface->method('getOption')
			->willReturn(null);

		$outputInterface = $this->createMock(OutputInterface::class);
		$outputInterface->expects($this->once())
			->method('writeln')
			->with("<error>hsm.url not set</error>");

		$this->invokePrivate($this->hsmDeamon, 'execute', [$inputInterface, $outputInterface]);
	}
}
