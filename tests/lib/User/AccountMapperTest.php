<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace Test\User;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\AccountTermMapper;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\IConfig;
use OCP\IDBConnection;
use Test\TestCase;
/**
 * Class AccountMapperTest
 *
 * @group DB
 *
 * @package Test\User
 */
class AccountMapperTest extends TestCase {

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	protected $config;

	/** @var IDBConnection */
	protected $connection;

	/** @var AccountMapper */
	protected $mapper;

	public function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);

		$this->connection = \OC::$server->getDatabaseConnection();

		$this->mapper = new AccountMapper(
			$this->config,
			$this->connection,
			new AccountTermMapper($this->connection)
		);

		// create test users
		for ($i = 1; $i <= 4; $i++) {

			$account = $this->mapper->find("TestFind$i");
			if ($account) {
				$this->mapper->delete($account);
			}

			$account = new Account();
			$account->setUserId("TestFind$i");
			$account->setDisplayName("Test Find $i");
			$account->setEmail("test$i@find.tld");
			$account->setBackend(self::class);
			$account->setHome("/foo/TestFind$i");

			$this->mapper->insert($account);

			$this->mapper->setTermsForAccount($account->getId(), ["Term $i A","Term $i B","Term $i C"]);

		}

	}

	public function tearDown() {
		parent::tearDown();

		for ($i = 0; $i <= 5; $i++) {
			try {
				$account = $this->mapper->getByUid("TestFind$i");
				$this->mapper->delete($account);
			} catch (DoesNotExistException $ex) {
			}
		}
	}

	/**
	 * Insert twice the same element should cause exception
	 */
	public function testDoubleInsertInValid() {
		$account = new Account();
		$account->setUserId("TestFind5");
		$account->setDisplayName("Test Find 5");
		$account->setEmail("test5@find.tld");
		$account->setBackend(self::class);
		$account->setHome("/foo/TestFind5");

		$this->mapper->insert($account);
		$result = $this->mapper->getByUid("TestFind5");
		$this->assertInstanceOf(Account::class, $result);

		$exceptionRaised = false;
		try {
			$this->mapper->insert($account);
		} catch (UniqueConstraintViolationException $exception) {
			$exceptionRaised = true;
		}

		$this->assertTrue($exceptionRaised);
	}

	/**
	 * find all, use lower case
	 */
	public function testFindAll() {
		$result = $this->mapper->find("testfind");
		$this->assertCount(4, $result);
	}

	/**
	 * find all, use lower case
	 */
	public function testSearchAll() {
		$result = $this->mapper->search('user_id', "testfind", null, null);
		$this->assertEquals(4, count($result));
	}

	/**
	 * find by userid, use lower case
	 */
	public function testFindByUserId() {
		$result = $this->mapper->find("testfind1");
		$this->assertCount(1, $result);
		$this->assertEquals("TestFind1", array_shift($result)->getUserId());
	}

	/**
	 * find by display name, use lower case
	 */
	public function testFindByDisplayName() {
		$result = $this->mapper->find('test find 2');
		$this->assertCount(1, $result);
		$this->assertEquals("TestFind2", array_shift($result)->getUserId());
	}

	public function findByEmailDataProvider() {
		return [
			['test3@find.tld'],
			['Test3@find.tld'],
			['test3@Find.tld'],
		];
	}

	/**
	 * find by email
	 *
	 * @dataProvider findByEmailDataProvider
	 */
	public function testFindByEmail($email) {
		$result = $this->mapper->find($email);
		$this->assertCount(1, $result);
		$this->assertEquals("TestFind3", array_shift($result)->getUserId());
	}

	/**
	 * get by email
	 *
	 * @dataProvider findByEmailDataProvider
	 */
	public function testGetByEmail($email) {
		$result = $this->mapper->getByEmail($email);
		$this->assertCount(1, $result);
		$this->assertEquals("TestFind3", array_shift($result)->getUserId());
	}

	/**
	 * find by search term, use lower case
	 */
	public function testFindBySearchTerm() {
		$result = $this->mapper->find('term 4 b');
		$this->assertCount(1, $result);
		$this->assertEquals("TestFind4", array_shift($result)->getUserId());
	}

	/**
	 * find with limit and offset, use lower case
	 */
	public function testFindLimitAndOffset() {
		$result = $this->mapper->find('Term', 2, 2);
		$this->assertCount(2, $result);
		//results are ordered by display name
		$this->assertEquals("TestFind3", array_shift($result)->getUserId());
		$this->assertEquals("TestFind4", array_shift($result)->getUserId());
	}
}
