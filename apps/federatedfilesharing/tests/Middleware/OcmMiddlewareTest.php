<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing\Tests\Middleware;

use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\Middleware\OcmMiddleware;
use OCA\FederatedFileSharing\Ocm\Exception\BadRequestException;
use OCA\FederatedFileSharing\Ocm\Exception\ForbiddenException;
use OCA\FederatedFileSharing\Ocm\Exception\NotImplementedException;
use OCA\FederatedFileSharing\Tests\TestCase;
use OCP\App\IAppManager;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Share;
use OCP\Share\IShare;

/**
 * Class OcmMiddlewareTest
 *
 * @package OCA\FederatedFileSharing\Tests\Middleware
 * @group DB
 */
class OcmMiddlewareTest extends TestCase {
	/**
	 * @var OcmMiddleware
	 */
	private $ocmMiddleware;

	/**
	 * @var FederatedShareProvider | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $federatedShareProvider;

	/**
	 * @var IAppManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $appManager;

	/**
	 * @var IUserManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $userManager;

	/**
	 * @var AddressHandler | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $addressHandler;

	/**
	 * @var ILogger | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $logger;

	protected function setUp() {
		parent::setUp();

		$this->federatedShareProvider = $this->createMock(
			FederatedShareProvider::class
		);

		$this->appManager = $this->createMock(IAppManager::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->addressHandler = $this->createMock(AddressHandler::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->ocmMiddleware = new OcmMiddleware(
			$this->federatedShareProvider,
			$this->appManager,
			$this->userManager,
			$this->addressHandler,
			$this->logger
		);
	}

	/**
	 * @dataProvider dataTestAssertNotNull
	 *
	 * @param $input
	 * @param $expectedResult
	 * @throws BadRequestException
	 */
	public function testAssertNotNull($input, $expectedResult) {
		if (\is_string($expectedResult)) {
			$this->expectException($expectedResult);
		}
		$this->ocmMiddleware->assertNotNull($input);
	}

	public function dataTestAssertNotNull() {
		return [
			[
				[
					'do' => '1',
					'it' => 'df',
					'now' => -1
				],
				false,
			],
			[
				[
					'do' => '1',
					'not' => null,
					'do' => false,
					'it' => null,
					'now' => -1
				],
				BadRequestException::class
			]
		];
	}

	/**
	 * @dataProvider dataTestGetValidShare
	 */
	public function testGetValidShare($providerResult, $sharedSecret, $expectedResult) {
		if (\is_string($providerResult)) {
			$this->federatedShareProvider->method('getShareById')
				->willThrowException(new $providerResult);
		} else {
			$this->federatedShareProvider->method('getShareById')
				->willReturn($providerResult);
		}

		if (\is_string($expectedResult)) {
			$this->expectException($expectedResult);
		}

		$result = $this->ocmMiddleware->getValidShare(5, $sharedSecret);

		if (!\is_string($expectedResult)) {
			$this->assertSame($expectedResult, $result);
		}
	}

	public function dataTestGetValidShare() {
		$token = 'token';
		$wrongTypedShare = $this->createMock(IShare::class);
		$wrongTypedShare->method('getShareType')
			->willReturn(FederatedShareProvider::SHARE_TYPE_REMOTE - 1);
		$wrongTypedShare->method('getToken')
			->willReturn($token);

		$wrongTokenShare = $this->createMock(IShare::class);
		$wrongTokenShare->method('getShareType')
			->willReturn(FederatedShareProvider::SHARE_TYPE_REMOTE);
		$wrongTypedShare->method('getToken')
			->willReturn("wrong $token");

		$goodShare = $this->createMock(IShare::class);
		$goodShare->method('getShareType')
			->willReturn(FederatedShareProvider::SHARE_TYPE_REMOTE);
		$goodShare->method('getToken')
			->willReturn($token);

		return [
			[
				Share\Exceptions\ShareNotFound::class,
				'token',
				BadRequestException::class
			],
			[
				$wrongTypedShare,
				'token',
				BadRequestException::class
			],
			[
				$wrongTokenShare,
				'token',
				ForbiddenException::class
			],
			[
				$goodShare,
				'token',
				$goodShare
			]
		];
	}

	/**
	 * @dataProvider dataTestAssertIncomingSharingEnabled
	 */
	public function testAssertIncomingSharingEnabled($isSharingAppEnabled, $isIncomingSharingEnabled, $isExceptionExpected) {
		$this->expectFileSharingApp($isSharingAppEnabled);
		$this->expectIncomingSharing($isIncomingSharingEnabled);
		if ($isExceptionExpected) {
			$this->expectException(NotImplementedException::class);
		}
		$this->ocmMiddleware->assertIncomingSharingEnabled();
	}

	public function dataTestAssertIncomingSharingEnabled() {
		return [
			[true, true, false],
			[true, false, true],
			[false, true, true],
			[false, true, true],
		];
	}

	/**
	 * @dataProvider dataTestAssertOutgoingSharingEnabled
	 */
	public function testAssertOutgoingSharingEnabled($isSharingAppEnabled, $isOutgoingSharingEnabled, $isExceptionExpected) {
		$this->expectFileSharingApp($isSharingAppEnabled);
		$this->expectOutgoingSharing($isOutgoingSharingEnabled);
		if ($isExceptionExpected) {
			$this->expectException(NotImplementedException::class);
		}
		$this->ocmMiddleware->assertOutgoingSharingEnabled();
	}

	public function dataTestAssertOutgoingSharingEnabled() {
		return [
			[true, true, false],
			[true, false, true],
			[false, true, true],
			[false, true, true],
		];
	}

	protected function expectIncomingSharing($state) {
		$this->federatedShareProvider
			->method('isIncomingServer2serverShareEnabled')
			->willReturn($state);
	}

	protected function expectOutgoingSharing($state) {
		$this->federatedShareProvider
			->method('isOutgoingServer2serverShareEnabled')
			->willReturn($state);
	}

	protected function expectFileSharingApp($state) {
		$this->appManager
			->method('isEnabledForUser')
			->with('files_sharing')
			->willReturn($state);
	}
}
