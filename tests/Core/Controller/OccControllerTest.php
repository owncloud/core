<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

namespace Tests\Core\Controller;

use OC\Console\Application;
use OC\Core\Controller\OccController;
use OCP\IConfig;
use Symfony\Component\Console\Output\Output;
use Test\TestCase;

/**
 * Class OccControllerTest
 *
 * @package OC\Core\Controller
 */
class OccControllerTest extends TestCase {
	public const TEMP_SECRET = 'test';

	/** @var \OC\AppFramework\Http\Request | \PHPUnit\Framework\MockObject\MockObject */
	private ?\PHPUnit\Framework\MockObject\MockObject $request = null;
	/** @var  \OC\Core\Controller\OccController | \PHPUnit\Framework\MockObject\MockObject */
	private ?\OC\Core\Controller\OccController $controller = null;
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private ?\PHPUnit\Framework\MockObject\MockObject $config = null;
	/** @var  Application | \PHPUnit\Framework\MockObject\MockObject */
	private ?\PHPUnit\Framework\MockObject\MockObject $console = null;

	public function testFromInvalidLocation() {
		$fakeHost = 'example.org';
		$this->getControllerMock($fakeHost);

		$response = $this->controller->execute('status', '');
		$responseData = $response->getData();

		$this->assertArrayHasKey('exitCode', $responseData);
		$this->assertEquals(126, $responseData['exitCode']);

		$this->assertArrayHasKey('details', $responseData);
		$this->assertEquals('Web executor is not allowed to run from a host ' . $fakeHost, $responseData['details']);
	}

	public function testNotWhiteListedCommand() {
		$this->getControllerMock('localhost');

		$response = $this->controller->execute('missing_command', '');
		$responseData = $response->getData();

		$this->assertArrayHasKey('exitCode', $responseData);
		$this->assertEquals(126, $responseData['exitCode']);

		$this->assertArrayHasKey('details', $responseData);
		$this->assertEquals('Command "missing_command" is not allowed to run via web request', $responseData['details']);
	}

	public function testWrongToken() {
		$this->getControllerMock('localhost');

		$response = $this->controller->execute('status', self::TEMP_SECRET . '-');
		$responseData = $response->getData();

		$this->assertArrayHasKey('exitCode', $responseData);
		$this->assertEquals(126, $responseData['exitCode']);

		$this->assertArrayHasKey('details', $responseData);
		$this->assertEquals('updater.secret does not match the provided token', $responseData['details']);
	}

	public function testSuccess() {
		$this->getControllerMock('localhost');
		$this->console->expects($this->once())->method('run')
			->willReturnCallback(
				function ($input, $output) {
					/** @var Output $output */
					$output->writeln('{"installed":true,"version":"9.1.0.8","versionstring":"9.1.0 beta 2","edition":""}');
					return 0;
				}
			);

		$response = $this->controller->execute('status', self::TEMP_SECRET, ['--output'=>'json']);
		$responseData = $response->getData();

		$this->assertArrayHasKey('exitCode', $responseData);
		$this->assertEquals(0, $responseData['exitCode']);

		$this->assertArrayHasKey('response', $responseData);
		$decoded = \json_decode($responseData['response'], true, 512, JSON_THROW_ON_ERROR);

		$this->assertArrayHasKey('installed', $decoded);
		$this->assertTrue($decoded['installed']);
	}

	private function getControllerMock($host) {
		$this->request = $this->getMockBuilder(\OC\AppFramework\Http\Request::class)
			->setConstructorArgs([
				['server' => []],
				\OC::$server->getSecureRandom(),
				\OC::$server->getConfig()
			])
			->setMethods(['getRemoteAddress'])
			->getMock();

		$this->request->expects($this->any())->method('getRemoteAddress')
			->will($this->returnValue($host));

		$this->config = $this->getMockBuilder('\\' . \OCP\IConfig::class)
			->disableOriginalConstructor()
			->getMock();
		$this->config->expects($this->any())->method('getSystemValue')
			->with('updater.secret')
			->willReturn(\password_hash(self::TEMP_SECRET, PASSWORD_DEFAULT));

		$this->console = $this->getMockBuilder('\\' . \OC\Console\Application::class)
			->disableOriginalConstructor()
			->getMock();

		$this->controller = new OccController(
			'core',
			$this->request,
			$this->config,
			$this->console,
			$this->getMockBuilder('\\' . \OCP\ILogger::class)
				->disableOriginalConstructor()
				->getMock()
		);
	}
}
