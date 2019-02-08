<?php
namespace OC\Migrations;

use OCP\IDBConnection;
use OCP\Migration\ISqlMigration;

/**
 * Sets empty authtoken names to '(none)'
 * https://github.com/owncloud/core/issues/30792
 */
class Version20180319102121 implements ISqlMigration {
	public function sql(IDBConnection $connection) {
		$q = $connection->getQueryBuilder();
		$q->update('authtoken')
			->set('name', $q->expr()->literal('(none)'))
			->where($q->expr()->eq('name', $q->expr()->literal('')))
			->orWhere($q->expr()->isNull('name'));
		return [$q->getSQL()];
	}
}
