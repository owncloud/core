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

namespace Test\Files\External\Auth\Password;

use OC\Files\External\Auth\Password\SessionCredentials;
use OCP\ISession;
use OCP\Security\ICrypto;
use OCP\Files\External\IStorageConfig;
use OCP\IUser;

class SessionCredentialsTest extends \Test\TestCase {

	/** @var SessionCredentials | \PHPUnit\Framework\MockObject\MockObject */
	private $authMech;

	/** @var ISession | \PHPUnit\Framework\MockObject\MockObject */
	private $session;

	/** @var ICrypto | \PHPUnit\Framework\MockObject\MockObject */
	private $crypto;

	public function setUp(): void {
		parent::setUp();
		$this->session = $this->createMock(ISession::class);
		$this->crypto = $this->createMock(ICrypto::class);
		$this->authMech = new SessionCredentials(
			$this->session,
			$this->crypto
		);
	}

	public function tearDown(): void {
		\OC_Hook::clear('OC_User', 'post_login');
		parent::tearDown();
	}

	public function sessionDataProvider() {
		return [
			[
				[
					['password::sessioncredentials/credentials', 'encrypted_stuff'],
					['loginname', 'login1'],
				],
				null,
				'login1'
			],
			[
				[
					['password::sessioncredentials/credentials', 'encrypted_stuff'],
				],
				'altlogin2',
				'altlogin2'
			],
		];
	}

	/**
	 * @dataProvider sessionDataProvider
	 */
	public function testManipulateStorageConfigSetsBackendOptions($sessionData, $userName, $expectedLogin) {
		$storageConfig = $this->createMock(IStorageConfig::class);
		if ($userName !== null) {
			$user = $this->createMock(IUser::class);
			$user->expects($this->once())
				->method('getUserName')
				->willReturn($userName);
		} else {
			$user = null;
		}

		$this->session->method('get')->will($this->returnValueMap($sessionData));
		$this->session->method('exists')->will($this->returnCallback(function ($key) {
			return $this->session->get($key) !== null;
		}));

		$this->crypto->expects($this->once())
			->method('decrypt')
			->with('encrypted_stuff')
			->willReturn('{"user":"user1","password":"pw"}');

		$storageConfig->expects($this->at(0))
			->method('setBackendOption')
			->with('user', $expectedLogin);
		$storageConfig->expects($this->at(1))
			->method('setBackendOption')
			->with('password', 'pw');

		$this->authMech->manipulateStorageConfig($storageConfig, $user);
	}

	/**
	 * @expectedException \OCP\Files\External\InsufficientDataForMeaningfulAnswerException
	 */
	public function testManipulateStorageConfigFailsWhenEmptyCredentials() {
		$storageConfig = $this->createMock(IStorageConfig::class);
		$user = $this->createMock(IUser::class);

		$this->session->expects($this->once())
			->method('get')
			->with('password::sessioncredentials/credentials')
			->willReturn(null);

		$this->authMech->manipulateStorageConfig($storageConfig, $user);
	}
}
