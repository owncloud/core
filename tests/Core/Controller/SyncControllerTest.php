<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@solidgeargroup.com>
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

namespace Test\Core\Controller;

use OC\User\Account;
use OC\User\SyncService;
use OC\Core\Controller\SyncController;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IRequest;
use OCP\IConfig;
use Test\TestCase;

class SyncControllerTest extends TestCase {
	/** @var SyncService */
	private $syncService;
	/** @var IConfig */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var SyncController */
	private $syncController;

	protected function setUp() {
		parent::setUp();

		$this->syncService = $this->createMock(SyncService::class);
		$this->config = $this->createMock(IConfig::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);

		$request = $this->createMock(IRequest::class);
		$this->syncController = new SyncController('core', $request, $this->syncService, $this->timeFactory, $this->config);
	}

	public function testGetInfo() {
		$limitInfoStats = [
			'mybackend' => [
				'limits' => [
					'soft' => 50,
					'hard' => 75,
				],
				'usersStatsCode' => [
					Account::STATE_ENABLED => 23,
					Account::STATE_DISABLED => 1,
					Account::STATE_AUTODISABLED => 32,
					56 => 2,
					123 => 3,
				],
				'usersStats' => [
					'Enabled' => 23,
					'Disabled' => 1,
					'Auto Disabled' => 32,
					'Unknown State' => 5,
				],
			],
			'mybackend2' => [
				'limits' => false,
				'usersStatsCode' => [
					Account::STATE_ENABLED => 54,
				],
				'usersStats' => [
					'Enabled' => 54,
				],
			],
		];

		$this->syncService->method('getLimitInfoStats')
			->willReturn($limitInfoStats);

		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'sync_read_soft_mybackend', 0, 0],
				['core', 'sync_read_hard_mybackend', 0, 15678765],
				['core', 'sync_read_soft_mybackend2', 0, 15988765],
				['core', 'sync_read_hard_mybackend2', 0, 0],
			]));

		$expectedResult = [
			'mybackend' => [
				'limits' => [
					'soft' => 50,
					'hard' => 75,
				],
				'usersStats' => [
					'Enabled' => 23,
					'Disabled' => 1,
					'Auto Disabled' => 32,
					'Unknown State' => 5,
				],
				'warningRead' => [
					'soft' => 0,
					'hard' => 15678765,
				],
			],
			'mybackend2' => [
				'limits' => false,
				'usersStats' => [
					'Enabled' => 54,
				],
				'warningRead' => [
					'soft' => 15988765,
					'hard' => 0,
				],
			],
		];
		$response = $this->syncController->getInfo();
		$this->assertEquals($expectedResult, $response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function markNotificationAsReadProvider() {
		return [
			['mybackend', 'soft'],
			['mybackend', 'hard'],
			['myotherbackend', 'soft'],
		];
	}

	/**
	 * @dataProvider markNotificationAsReadProvider
	 */
	public function testMarkNotificationAsRead($backend, $type) {
		$expectedTimestamp = 15784502;
		$expectedConfigKey = "sync_read_{$type}_{$backend}";

		$this->timeFactory->method('getTime')
			->willReturn($expectedTimestamp);

		$this->config->expects($this->once())
			->method('setAppValue')
			->with('core', $expectedConfigKey, $expectedTimestamp);

		$response = $this->syncController->markNotificationAsRead($backend, $type);
		$this->assertSame($expectedTimestamp, $response->getData());
		$this->assertSame(Http::STATUS_OK, $response->getStatus());
	}

	public function markNotificationAsReadProviderWrong() {
		return [
			['mybackend', '0'],
			['mybackend', 'lalala'],
			['myotherbackend', ''],
		];
	}

	/**
	 * @dataProvider markNotificationAsReadProviderWrong
	 */
	public function testMarkNotificationAsReadWrong($backend, $type) {
		$response = $this->syncController->markNotificationAsRead($backend, $type);
		$this->assertEquals([], $response->getData());
		$this->assertSame(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}
}
