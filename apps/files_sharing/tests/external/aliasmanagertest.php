<?php

/**
 * ownCloud
 *
 * @copyright (C) 2015 ownCloud, Inc.
 *
 * @author Bjoern Schiessle <schiessle@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Files_Sharing\Tests\External;

use OCA\Files_Sharing\External\AliasManager;

class AliasManagerTest extends \Test\TestCase {

	/** @var AliasManager */
	protected $aliasManager;

	/** @var \OC\DB\Connection */
	protected $connection;

	public function setUp() {
		parent::setUp();
		$this->connection = \OC::$server->getDatabaseConnection();
		$this->aliasManager = new AliasManager(\OC::$server->getUserManager(), $this->connection);
	}

	public function tearDown() {
		parent::tearDown();
		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*share_external_aliases`');
		$query->execute();
	}

	public function testUpdateAlias() {

		// set a new alias
		$this->aliasManager->updateAlias('alias1', 'user1');

		// verify that the alias was set
		$result = $this->getAlias('user1');
		$row = $result->fetch();
		$this->assertSame('alias1', $row['alias']);

		// update the alias
		$this->aliasManager->updateAlias('alias2', 'user1');
		$result = $this->getAlias('user1');
		$row = $result->fetch();
		$this->assertSame('alias2', $row['alias']);

		// update the alias to the login name -> alias should be removed
		$this->aliasManager->updateAlias('user1', 'user1');
		$result = $this->getAlias('user1');
		$rows = $result->fetchAll();
		$this->assertEmpty($rows);
	}

	public function testAliasExists() {
		$this->assertFalse(
			$this->aliasManager->aliasExists('alias1')
		);

		$this->aliasManager->updateAlias('alias1', 'user1');

		$this->assertTrue(
			$this->aliasManager->aliasExists('alias1')
		);

	}

	public function testGetAlias() {
		$this->assertNull(
			$this->aliasManager->getAlias('user1')
		);

		$this->aliasManager->updateAlias('alias1', 'user1');

		$this->assertSame('alias1',
			$this->aliasManager->getAlias('user1')
		);

	}

	public function testGetUid() {
		$this->assertNull(
			$this->aliasManager->getUid('alias1')
		);

		$this->aliasManager->updateAlias('alias1', 'user1');

		$this->assertSame('user1',
			$this->aliasManager->getUid('alias1')
		);

	}

	protected function getAlias($uid) {
		$query = $this->connection->createQueryBuilder();
		$query->select('`alias`')
			->from('`*PREFIX*share_external_aliases`')
			->where($query->expr()->eq('`uid`', ':uid'))
			->setParameter('uid', $uid);
		return $query->execute();
	}

}
