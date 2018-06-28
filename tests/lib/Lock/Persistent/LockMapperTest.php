<?php
/**
 * @author Thomas Müller <thomas-mueller@tmit.eu>
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

namespace Test\Lock\Persistent;

use OC\Lock\Persistent\Lock;
use OC\Lock\Persistent\LockMapper;
use OC\User\Account;
use OCP\IDBConnection;
use OCP\Lock\Persistent\ILock;
use Test\TestCase;

/**
 * Class LockMapperTest
 *
 * @package Test\Lock\Persistent
 * @group DB
 */
class LockMapperTest extends TestCase {
	/** @var IDBConnection */
	private $db;
	/** @var Account */
	private $account;
	/** @var int */
	private $fileCacheId;
	/** @var LockMapper */
	private $mapper;
	/** @var Lock[] */
	private $locks = [];

	public function setUp() {
		parent::setUp();

		$this->db = \OC::$server->getDatabaseConnection();

		// insert test entity in file cache
		$insertFileCache = $this->db->getQueryBuilder();
		$this->path = \uniqid('/foo/bar', true);
		$insertFileCache->insert('filecache')
			->values([
				'storage' => 666,
				'path' => $insertFileCache->createNamedParameter($this->path),
				'path_hash' => $insertFileCache->createNamedParameter(\md5($this->path))
			])
			->execute();
		$this->fileCacheId = $insertFileCache->getLastInsertId();

		// insert test entity in account table
		$this->account = new Account();
		$this->account->setUserId(\uniqid('testUser', true));
		$this->account->setBackend('TestBackend');
		$this->account->setHome('/');

		\OC::$server->getAccountMapper()
			->insert($this->account);

		// mapper to use
		$this->mapper = new LockMapper($this->db);
	}

	public function providesInvalidEntities() {
		$lock = new Lock();
		$lock->setToken('12345');
		$lock->setTokenHash('12345');
		return [
			['token_hash does not match the token of the lock', $lock, 'insert'],
			['token_hash does not match the token of the lock', $lock, 'update'],
			['Wrong entity type used', new Account(), 'insert'],
			['Wrong entity type used', new Account(), 'update']
		];
	}

	protected function tearDown() {
		foreach ($this->locks as $lock) {
			$this->mapper->delete($lock);
		}

		$q = $this->db->getQueryBuilder();
		$q->delete('filecache')
			->where($q->expr()->eq('fileid', $q->createNamedParameter($this->fileCacheId)))
			->execute();

		\OC::$server->getAccountMapper()
			->delete($this->account);

		parent::tearDown();
	}

	public function testInsert() {
		$lock = new Lock();
		$token = \uniqid('tok', true);
		$lock->setFileId($this->fileCacheId);
		$lock->setToken($token);
		$lock->setCreatedAt(\time());
		$lock->setTimeout(1880);
		$lock->setScope(ILock::LOCK_SCOPE_EXCLUSIVE);
		$lock->setDepth(0);
		$this->mapper->insert($lock);

		$this->locks[]= $lock;

		$l = $this->mapper->getLockByToken($token);
		$this->assertLock($lock, $l);

		$l = $this->mapper->getLocksByPath(666, $this->path, false);
		$this->assertLock($lock, $l[0]);

		$this->mapper->deleteByFileIdAndToken($this->fileCacheId, $token);
		$l = $this->mapper->getLocksByPath(666, $this->path, false);
		$this->assertCount(0, $l);
	}

	/**
	 * @param $expectedMessage
	 * @param $entity
	 * @dataProvider providesInvalidEntities
	 */
	public function testInsertOrUpdateOfInvalid($expectedMessage, $entity, $method) {
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage($expectedMessage);
		$this->mapper->$method($entity);
	}

	/**
	 * @param Lock $expected
	 * @param Lock $actual
	 */
	private function assertLock(Lock $expected, $actual): void {
		$this->assertEquals($expected->getId(), $actual->getId());
		$this->assertEquals($expected->getFileId(), $actual->getFileId());
		$this->assertEquals($expected->getToken(), $actual->getToken());
		$this->assertEquals($expected->getCreatedAt(), $actual->getCreatedAt());
		$this->assertEquals($expected->getTimeout(), $actual->getTimeout());
	}
}
