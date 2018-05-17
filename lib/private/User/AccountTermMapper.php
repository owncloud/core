<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\User;

use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

class AccountTermMapper extends Mapper {
	public function __construct(IDBConnection $db) {
		parent::__construct($db, 'account_terms', AccountTerm::class);
	}

	/**
	 * Sets search terms for a given account id, will always be lowercased
	 * @param $account_id
	 * @param string[] $terms
	 */
	public function setTermsForAccount($account_id, array $terms) {
		// Delete all terms for this account
		$this->deleteTermsForAccount($account_id);
		// Now batch insert the new terms for this account
		foreach ($terms as $term) {
			$t = new AccountTerm();
			$t->setAccountId($account_id);
			$t->setTerm(\strtolower($term));
			$this->insert($t);
		}
	}

	/**
	 * Removes all search terms for a given account id
	 * @param $account_id
	 */
	public function deleteTermsForAccount($account_id) {
		$qb = $this->db->getQueryBuilder();
		$qb->delete($this->getTableName())
			->where($qb->expr()->eq('account_id', $qb->createNamedParameter($account_id)))
			->execute();
	}

	/**
	 * Retrieves all search terms attached to an account id
	 * @param $account_id
	 * @return AccountTerm[] of account search terms
	 */
	public function findByAccountId($account_id) {
		$qb = $this->db->getQueryBuilder();
		$qb->select('term')
			->from($this->getTableName())
			->where($qb->expr()->eq('account_id', $qb->createNamedParameter($account_id)));

		return $this->findEntities($qb->getSQL(), $qb->getParameters());
	}
}
