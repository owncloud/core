<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
namespace Test\User;

use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\SyncService;
use OC\User\SyncServiceCallback;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\UserInterface;
use Test\TestCase;

class SyncServiceTest extends TestCase {

	/**
	 * @var AccountMapper|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $mapper;
	/**
	 * @var UserInterface|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $backend;
	/**
	 * @var IConfig|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $config;
	/**
	 * @var ILogger|\PHPUnit_Framework_MockObject_MockObject
	 */
	protected $logger;

	protected function setUp() {
		$this->mapper = $this->createMock(AccountMapper::class);
		$this->backend = $this->createMock(UserInterface::class);
		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);

		$this->config->expects($this->any())->method('getUserKeys')
			->will($this->returnCallback(function($uid, $app) {
				switch ($app) {
					case 'core':
					case 'login':
					case 'files':
						return [];
					case 'settings':
						return ['email'];
					default:
						return false;
				}
			}));
		$this->config->expects($this->any())
			->method('getUserValue')
			->will($this->returnCallback(function($uid, $app, $key) {
				switch ($key) {
					case 'email':
						return "$uid@bar.net";
					default:
						return false;
				}
			}));
		parent::setUp();
	}

	public function testSetupAccount() {

		$s = new SyncService($this->mapper, $this->backend, $this->config, $this->logger);
		$a = new Account();

		$s->setupAccount($a, 'user1');

		$this->assertEquals('user1@bar.net', $a->getEmail());
	}

	public function testSyncUsersExistingIsUpdated() {

		$a1 = new Account();
		$a1->setUserId('user1');
		$a1->setBackend(get_class($this->backend));

		$this->mapper->expects($this->exactly(1))
			->method('getByUid')
			->with($this->equalTo('user1'))
			->willReturn($a1);

		$this->mapper->expects($this->exactly(1))
			->method('update');

		/** @var SyncServiceCallback|\PHPUnit_Framework_MockObject_MockObject $callback */
		$callback = $this->createMock(SyncServiceCallback::class);
		$callback->expects($this->once())
			->method('startSync');
		$callback->expects($this->once())
			->method('endUpdated')
			->with($a1);

		$s = new SyncService($this->mapper, $this->backend, $this->config, $this->logger);
		$s->syncUser('user1', $callback);
	}

	public function testSyncUsersNotExistingIsInserted() {
		$this->mapper->expects($this->exactly(1))
			->method('getByUid')
			->willThrowException(
				new DoesNotExistException('User does not exist')
			);


		$a1 = new Account();
		$a1->setUserId('user1');
		$a1->setBackend('\Some\Mismatching\UserBackend');

		$this->mapper->expects($this->once())
			->method('insert')
			->willReturn($a1);

		/** @var SyncServiceCallback|\PHPUnit_Framework_MockObject_MockObject $callback */
		$callback = $this->createMock(SyncServiceCallback::class);
		$callback->expects($this->once())
			->method('startSync');
		$callback->expects($this->once())
			->method('endCreated');

		$s = new SyncService($this->mapper, $this->backend, $this->config, $this->logger);
		$s->syncUser('user1', $callback);
	}

	/**
	 * @expectedException  \OC\User\BackendMismatchException
	 */
	public function testSyncUserBackendMismatch() {
		$a1 = new Account();
		$a1->setUserId('user1');
		$a1->setBackend('\Some\Mismatching\UserBackend');

		$this->mapper->expects($this->exactly(1))
			->method('getByUid')
			->with($this->equalTo('user1'))
			->willReturn($a1);
		$this->mapper->expects($this->never())
			->method('insert');
		$this->mapper->expects($this->never())
			->method('update');

		/** @var SyncServiceCallback|\PHPUnit_Framework_MockObject_MockObject $callback */
		$callback = $this->createMock(SyncServiceCallback::class);
		$callback->expects($this->once())
			->method('startSync');

		$s = new SyncService($this->mapper, $this->backend, $this->config, $this->logger);
		$s->syncUser('user1', $callback);
	}
}