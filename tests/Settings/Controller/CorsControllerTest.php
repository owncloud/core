<?php
/**
 * @author Noveen Sachdeva <noveen.sachdeva@research.iiit.ac.in>
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

namespace Tests\Settings\Controller;

use OC\Settings\Controller\CorsController;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

/**
 * Class CorsControllerTest
 *
 * @package Tests\Settings\Controller
 */
class CorsControllerTest extends TestCase {
	/** @var CorsController */
	private $corsController;

	/** @var IRequest */
	private $request;

	/** @var ILogger */
	private $logger;

	/** @var IURLGenerator */
	private $urlGenerator;

	/** @var IConfig */
	private $config;

	/** @var IL10N | MockObject */
	private $l10n;

	/** @var IUser */
	private $userSession;

	public function setUp(): void {
		parent::setUp();

		$this->request = $this->createMock(IRequest::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('user');

		$this->userSession = $this->createMock(IUserSession::class);
		$this->userSession->method('getUser')->willReturn($user);

		$this->config = $this->createMock(IConfig::class);
		$this->config->method('getUserValue')->willReturn('["http:\/\/www.test.com"]');
		$this->config->method('setUserValue')->willReturn(true);
		$this->config->method('deleteUserValue')->willReturn(true);

		$this->l10n = $this->createMock(IL10N::class);

		$this->corsController = new CorsController(
			'core',
			$this->request,
			$this->userSession,
			$this->logger,
			$this->urlGenerator,
			$this->config,
			$this->l10n
		);
	}

	public function testAddDomainWithNoProto() {
		// Since this domain is invalid,
		// the success message that the domain is white-listed, wouldn't be triggered
		$this->logger
			->expects($this->never())
			->method('debug');

		$this->config
			->expects($this->never())
			->method("setUserValue");

		$this->l10n->method('t')
			->willReturnCallback(function ($a) {
				return $a;
			});

		$response = $this->corsController->addDomain("non-valid domain");

		$responseData = $response->getData();

		$this->assertArrayHasKey('message', $responseData);
		$this->assertEquals("Invalid url '%s'. Urls should be set up like 'http://www.example.com' or 'https://www.example.com'", $responseData['message']);
	}

	public function testAddInvalidDomain() {
		// Since this domain is invalid,
		// the success message that the domain is white-listed, wouldn't be triggered
		$this->logger
			->expects($this->never())
			->method('debug');

		$this->config
			->expects($this->never())
			->method("setUserValue");

		$this->l10n->method('t')
			->willReturnCallback(function ($a) {
				return $a;
			});

		$response = $this->corsController->addDomain("http://non-valid domain");

		$responseData = $response->getData();

		$this->assertArrayHasKey('message', $responseData);
		$this->assertEquals("Invalid url '%s'. Urls should be set up like 'http://www.example.com' or 'https://www.example.com'", $responseData['message']);
	}

	public function testAddValidDomain() {
		// Since this domain is valid,
		// the success message that the domain is white-listed, would be triggered exactly once
		$this->logger
			->expects($this->once())
			->method('debug');

		$this->config
			->expects($this->once())
			->method("setUserValue");

		$response = $this->corsController->addDomain("http://www.test1.com");

		$expectedResponse = new JSONResponse(['domains' => ['http://www.test.com', 'http://www.test1.com']]);

		$this->assertEquals($response, $expectedResponse);
	}
	public function testAddInvalidDomainWithPaths() {
		// Since this domain is invalid,
		// the success message that the domain is white-listed, wouldn't be triggered
		$this->logger
			->expects($this->never())
			->method('debug');

		$this->config
			->expects($this->never())
			->method("setUserValue");

		$this->l10n->method('t')
			->willReturnCallback(function ($a) {
				return $a;
			});

		$response = $this->corsController->addDomain("http://test.com/path1/path2");

		$responseData = $response->getData();

		$this->assertArrayHasKey('message', $responseData);
		$this->assertEquals("Invalid url '%s'. Urls should be set up like 'http://www.example.com' or 'https://www.example.com'", $responseData['message']);
	}

	public function testAddInvalidDomainWithQueryParams() {
		// Since this domain is invalid,
		// the success message that the domain is white-listed, wouldn't be triggered
		$this->logger
			->expects($this->never())
			->method('debug');

		$this->config
			->expects($this->never())
			->method("setUserValue");

		$this->l10n->method('t')
			->willReturnCallback(function ($a) {
				return $a;
			});

		$response = $this->corsController->addDomain("http://test.com?query=existent");

		$responseData = $response->getData();

		$this->assertArrayHasKey('message', $responseData);
		$this->assertEquals("Invalid url '%s'. Urls should be set up like 'http://www.example.com' or 'https://www.example.com'", $responseData['message']);
	}

	public function testAddInvalidProtocol() {
		// Since this domain is invalid,
		// the success message that the domain is white-listed, wouldn't be triggered
		$this->logger
			->expects($this->never())
			->method('debug');

		$this->config
			->expects($this->never())
			->method("setUserValue");

		$this->l10n->method('t')
			->willReturnCallback(function ($a) {
				return $a;
			});

		$response = $this->corsController->addDomain("ftp://test.com");

		$responseData = $response->getData();

		$this->assertArrayHasKey('message', $responseData);
		$this->assertEquals("Invalid url '%s'. Urls should be set up like 'http://www.example.com' or 'https://www.example.com'", $responseData['message']);
	}

	public function testRemoveInvalidDomain() {
		// Since this domain id passed is invalid,
		// the error message that invalid domain ID passed, would be triggered
		$this->config
			->expects($this->never())
			->method("setUserValue");

		// The argument for removing domain is the ID of the white-listed domain
		// and not the domain itself
		$response = $this->corsController->removeDomain('non-existing.domain');

		$expectedResponse = new JSONResponse(['domains' => ['http://www.test.com']]);

		$this->assertEquals($response, $expectedResponse);
	}

	public function testRemoveValidDomain() {
		$this->config
			->expects($this->once())
			->method("deleteUserValue");

		$response = $this->corsController->removeDomain('http://www.test.com');

		$expectedResponse = new JSONResponse(['domains' => []]);

		$this->assertEquals($response, $expectedResponse);
	}

	public function testGetDomains() {
		// since their are no domains, empty JSON response will be sent back
		$expected = new JSONResponse(["http://www.test.com"]);
		$this->assertEquals($expected, $this->corsController->getDomains());
	}
}
