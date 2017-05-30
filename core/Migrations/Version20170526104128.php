<?php
namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OC\DB\QueryBuilder\Literal;
use OCP\IDBConnection;
use OCP\Migration\ISchemaMigration;

/**
 * Update term column length to ensure index creation works on all db setups
 */
class Version20170526104128 implements ISchemaMigration {

	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("{$prefix}account_terms");
		// Check column length
		if($table->getColumn('term')->getLength() === 255) {
			// we don't need to adjust it
			return;
		}

		// Need to shorten the column by one character
		// Check if we have any terms taking up the full 256 chars (unlikely)

		/** @var IDBConnection $db */
		$db = \OC::$server->getDatabaseConnection();
		$qb = $db->getQueryBuilder();
		$qb->delete('account_terms')
			->where($qb->expr()->gte($qb->expr()->length('term'), new Literal(256)));
		$qb->execute();

		// Now update the column length
		$table->getColumn('term')->setLength(255);
    }
}
