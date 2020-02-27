<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Files_Sharing\Tests\Controller;

use OCA\Files_Sharing\Controller\RemoteOcsController;
use OCA\Files_Sharing\External\Manager;
use OCP\IRequest;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

class RemoteOcsControllerTest extends TestCase {
	/** @var string */
	protected $appName = 'files_sharing';

	/** @var IRequest | MockObject */
	protected $request;

	/** @var Manager */
	protected $externalManager;

	/** @var RemoteOcsController */
	protected $controller;

	protected function setUp(): void {
		$this->request = $this->createMock(IRequest::class);
		$this->externalManager = $this->createMock(Manager::class);
		$this->controller = new RemoteOcsController(
			$this->appName,
			$this->request,
			$this->externalManager,
			'user'
		);
	}

	public function testGetOpenShares() {
		$this->externalManager->expects($this->once())
			->method('getOpenShares')
			->willReturn([]);
		$result = $this->controller->getOpenShares();
		$this->assertEquals(100, $result->getStatusCode());
	}

	public function acceptShareDataProvider() {
		return [
			[true, false, 100],
			[false, true, 404]
		];
	}

	/**
	 * @dataProvider acceptShareDataProvider
	 *
	 * @param bool $acceptShareResult
	 * @param bool $processNotificationExpected
	 * @param int $expectedStatusCode
	 */
	public function testAcceptShare($acceptShareResult, $processNotificationExpected, $expectedStatusCode) {
		$shareId = 42;
		$this->externalManager->expects($this->once())
			->method('acceptShare')
			->with($shareId)
			->willReturn($acceptShareResult);

		$this->externalManager->expects($this->exactly((int) $processNotificationExpected))
			->method('processNotification')
			->with($shareId);

		$result = $this->controller->acceptShare($shareId);
		$this->assertEquals($expectedStatusCode, $result->getStatusCode());
	}

	public function declineShareDataProvider() {
		return [
			[true, false, 100],
			[false, true, 404]
		];
	}

	/**
	 * @dataProvider declineShareDataProvider
	 *
	 * @param bool $declineShareResult
	 * @param bool $processNotificationExpected
	 * @param int $expectedStatusCode
	 */
	public function testDeclineShare($declineShareResult, $processNotificationExpected, $expectedStatusCode) {
		$shareId = 42;
		$this->externalManager->expects($this->once())
			->method('declineShare')
			->with($shareId)
			->willReturn($declineShareResult);

		$this->externalManager->expects($this->exactly((int) $processNotificationExpected))
			->method('processNotification')
			->with($shareId);

		$result = $this->controller->declineShare($shareId);
		$this->assertEquals($expectedStatusCode, $result->getStatusCode());
	}

	public function testGetShares() {
		$this->externalManager->expects($this->once())
			->method('getAcceptedShares')
			->willReturn([]);
		$result = $this->controller->getShares();
		$this->assertEquals(100, $result->getStatusCode());
	}

	public function getShareDataProvider() {
		return [
			[false, 404],
		];
	}

	/**
	 * @dataProvider getShareDataProvider
	 *
	 * @param mixed $getShareResult
	 * @param int $expectedStatusCode
	 */
	public function testGetShare($getShareResult, $expectedStatusCode) {
		$shareId = 42;
		$this->externalManager->expects($this->once())
			->method('getShare')
			->with($shareId)
			->willReturn($getShareResult);

		$result = $this->controller->getShare($shareId);
		$this->assertEquals($expectedStatusCode, $result->getStatusCode());
	}

	public function unshareDataProvider() {
		return [
			[false, false, false, 404],
			[['mountpoint' => '/foobar'], true, false, 403],
			[['mountpoint' => '/foobar'], true, true, 100],
		];
	}

	/**
	 * @dataProvider unshareDataProvider
	 *
	 * @param mixed $getShareResult
	 * @param bool $shouldCallUnshare
	 * @param bool $unshareResult
	 * @param int $expectedStatusCode
	 */
	public function testUnshare($getShareResult, $shouldCallUnshare, $unshareResult, $expectedStatusCode) {
		$shareId = 42;
		$this->externalManager->expects($this->once())
			->method('getShare')
			->with($shareId)
			->willReturn($getShareResult);

		$this->externalManager->expects($this->exactly((int) $shouldCallUnshare))
			->method('removeShare')
			->willReturn($unshareResult);

		$result = $this->controller->unshare($shareId);
		$this->assertEquals($expectedStatusCode, $result->getStatusCode());
	}
}
