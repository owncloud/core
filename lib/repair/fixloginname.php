<?php
/**
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Repair;

use OC\DB\Connection;
use OC\Hooks\BasicEmitter;
use OC\RepairStep;

class FixLoginName extends BasicEmitter implements RepairStep {
	/**
	 * @var \OC\DB\Connection
	 */
	private $connection;

	public function __construct(Connection $connection) {
		$this->connection = $connection;
	}

	public function getName() {
		return 'Login name - populate values';
	}

	public function run() {
		$qb = $this->connection->createQueryBuilder();
		$qb->update('`*PREFIX*users`')
			->set('`loginname`', '`uid`')
			->where($qb->expr()->isNull('`loginname`'));
		$affectedRows = $qb->execute();

		$this->emit('OC\Repair', 'info', sprintf('Login name - %d users updated', $affectedRows));
	}
}
