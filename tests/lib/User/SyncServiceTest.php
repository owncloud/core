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

		$a2 = new Account();
		$a2->setUserId('user2');
		$a2->setBackend(get_class($this->backend));

		$this->mapper->expects($this->exactly(2))
			->method('getByUid')
			->withConsecutive(
				[$this->equalTo('user1')], [$this->equalTo('user2')]
			)
			->willReturnOnConsecutiveCalls($a1,	$a2);
		$this->mapper->expects($this->exactly(2))
			->method('update');

		$s = new SyncService($this->mapper, $this->backend, $this->config, $this->logger);
		$s->syncUsers(['user1', 'user2']);
	}

	public function testSyncUsersNotExistingIsInserted() {
		$this->mapper->expects($this->exactly(2))
			->method('getByUid')
			->willThrowException(
				new DoesNotExistException('User does not exist')
			);
		$this->mapper->expects($this->exactly(2))
			->method('insert');

		$s = new SyncService($this->mapper, $this->backend, $this->config, $this->logger);
		$s->syncUsers(['user1', 'user2']);
	}
}