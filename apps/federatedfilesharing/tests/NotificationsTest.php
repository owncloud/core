<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
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

namespace OCA\FederatedFileSharing\Tests;

use OC\AppFramework\Http;
use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\DiscoveryManager;
use OCA\FederatedFileSharing\Notifications;
use OCP\BackgroundJob\IJobList;
use OCP\Http\Client\IClientService;
use OCP\IConfig;
use OCA\FederatedFileSharing\BackgroundJob\RetryJob;

class NotificationsTest extends \Test\TestCase {

	/** @var  AddressHandler | \PHPUnit_Framework_MockObject_MockObject */
	private $addressHandler;

	/** @var  IClientService | \PHPUnit_Framework_MockObject_MockObject*/
	private $httpClientService;

	/** @var  DiscoveryManager | \PHPUnit_Framework_MockObject_MockObject */
	private $discoveryManager;

	/** @var  IJobList | \PHPUnit_Framework_MockObject_MockObject */
	private $jobList;

	/** @var  IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;

	public function setUp() {
		parent::setUp();

		$this->jobList = $this->createMock(IJobList::class);
		$this->config = $this->createMock(IConfig::class);
		$this->discoveryManager = $this->getMockBuilder(DiscoveryManager::class)
			->disableOriginalConstructor()->getMock();
		$this->httpClientService = $this->createMock(IClientService::class);
		$this->addressHandler = $this->getMockBuilder(AddressHandler::class)
			->disableOriginalConstructor()->getMock();
	}

	/**
	 * get instance of Notifications class
	 *
	 * @param array $mockedMethods methods which should be mocked
	 * @return Notifications | \PHPUnit_Framework_MockObject_MockObject
	 */
	private function getInstance(array $mockedMethods = []) {
		if (empty($mockedMethods)) {
			$instance = new Notifications(
				$this->addressHandler,
				$this->httpClientService,
				$this->discoveryManager,
				$this->jobList,
				$this->config
			);
		} else {
			$instance = $this->getMockBuilder(Notifications::class)
				->setConstructorArgs(
					[
						$this->addressHandler,
						$this->httpClientService,
						$this->discoveryManager,
						$this->jobList,
						$this->config
					]
				)->setMethods($mockedMethods)->getMock();
		}
		
		return $instance;
	}

	/**
	 * @dataProvider dataTestSendUpdateToRemote
	 *
	 * @param int $try
	 * @param array $ocmHttpRequestResult
	 * @param array $httpRequestResult
	 * @param bool $expected
	 */
	public function testSendUpdateToRemote($try, $ocmHttpRequestResult, $httpRequestResult, $expected) {
		$remote = 'remote';
		$id = 42;
		$timestamp = 63576;
		$token = 'token';
		$instance = $this->getInstance(['tryHttpPostToShareEndpoint', 'getTimestamp']);

		$instance->expects($this->any())->method('getTimestamp')->willReturn($timestamp);

		$instance->expects($this->at(0))->method('tryHttpPostToShareEndpoint')
			->with($remote, '/notifications', $this->anything(), true)
			->willReturn($ocmHttpRequestResult);

		$instance->expects($this->at(1))->method('tryHttpPostToShareEndpoint')
			->with($remote, '/'.$id.'/unshare', ['token' => $token, 'data1Key' => 'data1Value'])
			->willReturn($httpRequestResult);

		$this->addressHandler->method('removeProtocolFromUrl')
			->with($remote)->willReturn($remote);

		// only add background job on first try
		if ($try === 0 && $expected === false) {
			$this->jobList->expects($this->once())->method('add')
				->with(
					RetryJob::class,
					[
						'remote' => $remote,
						'remoteId' => $id,
						'action' => 'unshare',
						'data' => \json_encode(['data1Key' => 'data1Value']),
						'token' => $token,
						'try' => $try,
						'lastRun' => $timestamp
					]
				);
		} else {
			$this->jobList->expects($this->never())->method('add');
		}

		$this->assertSame($expected,
			$instance->sendUpdateToRemote($remote, $id, $token, 'unshare', ['data1Key' => 'data1Value'], $try)
		);
	}

	public function dataTestSendUpdateToRemote() {
		return [
			// test if background job is added correctly
			[0, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => true, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 200]]])], true],
			[1, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => true, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 200]]])], true],
			[0, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => false, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 200]]])], false],
			[1, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => false, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 200]]])], false],
			// test all combinations of 'statuscode' and 'success'
			[0, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => true, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 200]]])], true],
			[0, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => true, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 100]]])], true],
			[0, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => true, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 400]]])], false],
			[0, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => false, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 200]]])], false],
			[0, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => false, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 100]]])], false],
			[0, ['statusCode' => Http::STATUS_NOT_IMPLEMENTED], ['success' => false, 'result' => \json_encode(['ocs' => ['meta' => ['statuscode' => 400]]])], false],
		];
	}
}
