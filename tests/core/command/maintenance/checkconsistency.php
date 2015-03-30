<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
 * You should have received a copy of the GNU Affero General Public License,
 * version 3, along with this program. If not, see <http://www.gnu.org/licenses/>
 */

namespace Test\Core\Command\Maintenance;

use Doctrine\DBAL\Query\QueryBuilder;
use Test\TestCase;

class CheckConsistency extends TestCase {

	public function testOutdatedStorages() {
		$db = \OC::$server->getDatabaseConnection();
		/** @var QueryBuilder $qb */
		$qb = $db->createQueryBuilder();

		$qb->insert('`*PREFIX*storages`')
			->values(
				array(
					'`id`' => '"local::/old/data/dir/username/"'
				)
			)
			->execute();

		$c = new \OC\Core\Command\Maintenance\CheckConsistency(
			\OC::$server->getConfig()->getSystemValue('datadirectory', ''),
			$db,
			\OC::$server->getUserManager() // TODO mock this
		);

		$output = $this->getMock(
			'\Symfony\Component\Console\Output\OutputInterface');
		$output->expects($this->at(0))->method('writeln')
			->with('There are 1 storages in place with an old data dir:');
		$output->expects($this->at(1))->method('writeln')
			->with('local::/old/data/dir/username/');

		/**
		 * invoke test
		 */

		\Test_Helper::invokePrivate($c, 'execute',
			[$this->getMock('\Symfony\Component\Console\Input\InputInterface'),
				$output]);

		/**
		 * clean up
		 */

		/** @var QueryBuilder $qb */
		$qb = $db->createQueryBuilder();

		$qb->delete('`*PREFIX*storages`')
			->where($qb->expr()->eq('`id`', '"local::/old/data/dir/username/"'))
			->execute();
	}

	public function testUnresolvedStorages() {
		$db = \OC::$server->getDatabaseConnection();
		/** @var QueryBuilder $qb */
		$qb = $db->createQueryBuilder();

		$qb->insert('`*PREFIX*storages`')
			->values(
				array(
					'`id`' => '"e1930b4927e6b6d92d120c7c1bba3421"'
				)
			)
			->execute();

		$c = new \OC\Core\Command\Maintenance\CheckConsistency(
			\OC::$server->getConfig()->getSystemValue('datadirectory', ''),
			$db,
			\OC::$server->getUserManager() // TODO mock this
		);

		/**
		 * invoke test
		 */

		\Test_Helper::invokePrivate($c, 'execute', [
			$this->getMock('\Symfony\Component\Console\Input\InputInterface'),
			$this->getMock('\Symfony\Component\Console\Output\OutputInterface')
		]);

		$this->assertSame(array('e1930b4927e6b6d92d120c7c1bba3421' => true),
			\Test_Helper::invokePrivate($c, 'unresolvedStorages'));

		/**
		 * clean up
		 */

		/** @var QueryBuilder $qb */
		$qb = $db->createQueryBuilder();

		$qb->delete('`*PREFIX*storages`')
			->where($qb->expr()->eq(
				'`id`', '"e1930b4927e6b6d92d120c7c1bba3421"'))
			->execute();
	}
}
