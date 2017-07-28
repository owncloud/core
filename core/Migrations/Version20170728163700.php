<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\ISqlMigration;
use OCP\IDBConnection;

/**
 * Add dummy root entry for fileid -1.
 *
 * Required for foreign keys.
 */
class Version20170728163700 implements ISqlMigration {

	public function sql(IDBConnection $connection) {
		$qb = $connection->getQueryBuilder();

		$qb->insert('storages')
			->values([
				'id' => $qb->expr()->literal('root::'),
				'numeric_id' => $qb->expr()->literal(-1),
			])->execute();

		$qb->insert('filecache')
			->values([
				'fileid' => $qb->expr()->literal(-1),
				// hacky
				'parent' => $qb->expr()->literal(-1),
				'storage' => $qb->expr()->literal(-1),
			])->execute();
	}
}
