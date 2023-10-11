<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\Federation\Tests\BackgroundJob;

use OCA\Federation\BackgroundJob\RequestSharedSecret;
use OCA\Federation\DbHandler;
use OCA\Federation\TrustedServers;
use OCP\AppFramework\Http;
use OCP\BackgroundJob\IJobList;
use OCP\Http\Client\IClient;
use OCP\Http\Client\IResponse;
use OCP\IURLGenerator;
use Test\TestCase;

class RequestSharedSecretTest extends TestCase {
	/** @var \PHPUnit\Framework\MockObject\MockObject | IClient */
	private \PHPUnit\Framework\MockObject\MockObject $httpClient;

	/** @var \PHPUnit\Framework\MockObject\MockObject | IJobList */
	private \PHPUnit\Framework\MockObject\MockObject $jobList;

	/** @var \PHPUnit\Framework\MockObject\MockObject | IURLGenerator */
	private \PHPUnit\Framework\MockObject\MockObject $urlGenerator;

	/** @var \PHPUnit\Framework\MockObject\MockObject | DbHandler */
	private \PHPUnit\Framework\MockObject\MockObject $dbHandler;

	/** @var \PHPUnit\Framework\MockObject\MockObject | TrustedServers */
	private \PHPUnit\Framework\MockObject\MockObject $trustedServers;

	/** @var \PHPUnit\Framework\MockObject\MockObject | IResponse */
	private \PHPUnit\Framework\MockObject\MockObject $response;

	private \OCA\Federation\BackgroundJob\RequestSharedSecret $requestSharedSecret;

	public function setUp(): void {
		parent::setUp();

		$this->httpClient = $this->createMock(\OCP\Http\Client\IClient::class);
		$this->jobList = $this->createMock(\OCP\BackgroundJob\IJobList::class);
		$this->urlGenerator = $this->createMock(\OCP\IURLGenerator::class);
		$this->trustedServers = $this->getMockBuilder(\OCA\Federation\TrustedServers::class)
			->disableOriginalConstructor()->getMock();
		$this->dbHandler = $this->getMockBuilder(\OCA\Federation\DbHandler::class)
			->disableOriginalConstructor()->getMock();
		$this->response = $this->createMock(\OCP\Http\Client\IResponse::class);

		$this->requestSharedSecret = new RequestSharedSecret(
			$this->httpClient,
			$this->urlGenerator,
			$this->jobList,
			$this->trustedServers,
			$this->dbHandler
		);
	}

	/**
	 * @dataProvider dataTestExecute
	 *
	 * @param bool $isTrustedServer
	 * @param bool $retainBackgroundJob
	 */
	public function testExecute($isTrustedServer, $retainBackgroundJob) {
		/** @var RequestSharedSecret |\PHPUnit\Framework\MockObject\MockObject $requestSharedSecret */
		$requestSharedSecret = $this->getMockBuilder(\OCA\Federation\BackgroundJob\RequestSharedSecret::class)
			->setConstructorArgs(
				[
					$this->httpClient,
					$this->urlGenerator,
					$this->jobList,
					$this->trustedServers,
					$this->dbHandler
				]
			)->setMethods(['parentExecute'])->getMock();
		self::invokePrivate($requestSharedSecret, 'argument', [['url' => 'url']]);

		$this->trustedServers->expects($this->once())->method('isTrustedServer')
			->with('url')->willReturn($isTrustedServer);
		if ($isTrustedServer) {
			$requestSharedSecret->expects($this->once())->method('parentExecute');
		} else {
			$requestSharedSecret->expects($this->never())->method('parentExecute');
		}
		self::invokePrivate($requestSharedSecret, 'retainJob', [$retainBackgroundJob]);
		if ($retainBackgroundJob) {
			$this->jobList->expects($this->never())->method('remove');
		} else {
			$this->jobList->expects($this->once())->method('remove');
		}

		$requestSharedSecret->execute($this->jobList);
	}

	public function dataTestExecute() {
		return [
			[true, true],
			[true, false],
			[false, false],
		];
	}

	/**
	 * @dataProvider dataTestRun
	 *
	 * @param int $statusCode
	 */
	public function testRun($statusCode) {
		$target = 'targetURL';
		$source = 'sourceURL';
		$token = 'token';

		$argument = ['url' => $target, 'token' => $token];

		$this->urlGenerator->expects($this->once())->method('getAbsoluteURL')->with('/')
			->willReturn($source);
		$this->httpClient->expects($this->once())->method('post')
			->with(
				$target . '/ocs/v2.php/apps/federation/api/v1/request-shared-secret',
				[
					'form_params' =>
						[
							'url' => $source,
							'token' => $token,
							'format' => 'json'
						],
					'timeout' => 3,
					'connect_timeout' => 3,
				]
			)->willReturn($this->response);

		$this->response->expects($this->once())->method('getStatusCode')
			->willReturn($statusCode);

		if (
			$statusCode !== Http::STATUS_OK
			&& $statusCode !== Http::STATUS_FORBIDDEN
		) {
			$this->dbHandler->expects($this->never())->method('addToken');
		}

		if ($statusCode === Http::STATUS_FORBIDDEN) {
			$this->dbHandler->expects($this->once())->method('addToken')->with($target, '');
		}

		self::invokePrivate($this->requestSharedSecret, 'run', [$argument]);
		if (
			$statusCode !== Http::STATUS_OK
			&& $statusCode !== Http::STATUS_FORBIDDEN
		) {
			$this->assertTrue(self::invokePrivate($this->requestSharedSecret, 'retainJob'));
		} else {
			$this->assertFalse(self::invokePrivate($this->requestSharedSecret, 'retainJob'));
		}
	}

	public function dataTestRun() {
		return [
			[Http::STATUS_OK],
			[Http::STATUS_FORBIDDEN],
			[Http::STATUS_CONFLICT],
		];
	}
}
