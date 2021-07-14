<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OC\Migrations;

use Doctrine\DBAL\Schema\Schema;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\Migration\ISchemaMigration;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version20190909083926 implements ISchemaMigration {
	private $dbConnection;

	public function __construct(IDBConnection $dbConnection) {
		$this->dbConnection = $dbConnection;
	}

	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];

		$table = $schema->getTable("${prefix}accounts");
		$column = $table->getColumn('email');

		/**
		 * Remove email id's which are duplicated in the accounts table.
		 */
		$qb = $this->dbConnection->getQueryBuilder();
		$subQuery = $this->dbConnection->getQueryBuilder();

		$subQuery->select('email')
			->from('accounts')
			->groupBy('email')
			->having($subQuery->createFunction('COUNT(email) > 1'));

		$subQueryResult = $subQuery->execute()->fetchAll();

		$emailArray = \array_map(function ($val) {
			return $val['email'];
		}, $subQueryResult);

		$qb->update('accounts', 't1')
			->set('t1.email', $qb->createParameter('email'))
			->where($qb->expr()->in('t1.email', $qb->createNamedParameter($emailArray, IQueryBuilder::PARAM_STR_ARRAY)))
			->setParameter('email', null);

		$qb->execute();

		/**
		 * The email column of accounts is set to NULL where the duplicate email address
		 * is found. Now we can safely alter the table.
		 */

		$table->addUniqueIndex(['email'], 'email_address_index');
	}
}
