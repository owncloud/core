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
		// Get the table
		$prefix = $options['tablePrefix'];
		$table = $schema->getTable("{$prefix}account_terms");

		// Check column length
		if ($table->getColumn('term')->getLength() === 191) {
			// we don't need to adjust it
			return;
		}

		// Need to shorten the column by one character
		// Check if we have any terms taking up 192 or more chars (unlikely)

		/** @var IDBConnection $db */
		$db = \OC::$server->getDatabaseConnection();

		$qb = $db->getQueryBuilder();
		$qb->select(['id', 'term'])
			->from('account_terms')
			->where($qb->expr()->gte($qb->expr()->length('term'), new Literal(192)));
		$results = $qb->execute();

		// Now shorten these terms
		$db->beginTransaction();
		while ($longTerm = $results->fetch()) {
			$qb->update('account_terms')
				->where($qb->expr()->eq('id', $qb->createNamedParameter($longTerm['id'])))
				->set('term', $qb->createNamedParameter($this->trimTerm($longTerm['term'])))
				->execute();
		}
		$db->commit();

		// Now update the column length
		$table->getColumn('term')->setLength(191);
	}

	/**
	 * @param $longTerm
	 * @return string the shortened string ready for the new db column
	 */
	public function trimTerm($longTerm) {
		return (string) \substr($longTerm, 0, 191);
	}
}
