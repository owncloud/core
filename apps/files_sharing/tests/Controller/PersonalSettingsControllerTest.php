<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

namespace OCA\Files_Sharings\Tests\Controller;

use OCA\Files_Sharing\Controller\PersonalSettingsController;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IConfig;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserSession;
use Test\TestCase;

class PersonalSettingsControllerTest extends TestCase {

	/** @var IRequest | \PHPUnit\Framework\MockObject\MockObject */
	private $request;

	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject $config */
	private $config;

	/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject $userSession */
	private $userSession;

	/** @var PersonalSettingsController $personalSettingsController */
	private $personalSettingsController;

	protected function setUp(): void {
		parent::setUp();
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		$this->request = $this->getMockBuilder(IRequest::class)->getMock();

		$this->userSession = $this->getMockBuilder(IUserSession::class)
			->disableOriginalConstructor()
			->getMock();

		$mockUser = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();
		$mockUser->expects($this->any())
			->method('getUID')
			->willReturn('testuser');

		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($mockUser);

		$this->personalSettingsController = new PersonalSettingsController(
			'files_sharing',
			$this->request,
			$this->config,
			$this->userSession
		);
	}

	public function userConfigProvider() {
		return [
			[
				['auto_accept_share' => 'yes', '_route' => 'setconfig'],
				['auto_accept_share'],
				[],
				Http::STATUS_OK
			],
			[
				['auto_accept_share' => 'yes', 'invalid_key' => 'yes'],
				['auto_accept_share'],
				['invalid_key'],
				Http::STATUS_OK
			],
			[
				['auto_accept_share' => 'no'],
				['auto_accept_share'],
				[],
				Http::STATUS_OK
			],
			[
				['invalid_key' => 'yes'],
				[],
				['invalid_key'],
				Http::STATUS_BAD_REQUEST
			],
			[
				['auto_accept_share' => 'invalid_value'],
				[],
				['auto_accept_share'],
				Http::STATUS_BAD_REQUEST
			],
		];
	}

	/**
	 * @dataProvider userConfigProvider
	 *
	 * @param array $params
	 * @param array $acceptedKeys
	 * @param array $rejectedKeys
	 * @param integer $statusCode
	 */
	public function testSetUserConfig($params, $acceptedKeys, $rejectedKeys, $statusCode) {
		$this->request->expects($this->once())
			->method('getParams')
			->willReturn($params);
		foreach ($acceptedKeys as $key) {
			$this->config->expects($this->exactly(1))
				->method('setUserValue')
				->with('testuser', 'files_sharing', $key, $params[$key]);
		}

		$expected = new DataResponse(
			['accepted' => $acceptedKeys, 'rejected' => $rejectedKeys],
			$statusCode
		);
		$this->assertEquals($expected, $this->personalSettingsController->setUserConfig());
	}
}
