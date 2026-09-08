<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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
use OCP\Migration\ISchemaMigration;

/**
 * Table holding the failed login attempt counters which drive the temporary
 * lockout of local accounts.
 */
class Version20260904090000 implements ISchemaMigration {
	public function changeSchema(Schema $schema, array $options) {
		$prefix = $options['tablePrefix'];
		if (!$schema->hasTable("{$prefix}account_lockouts")) {
			$table = $schema->createTable("{$prefix}account_lockouts");
			$table->addColumn('id', 'bigint', [
				'autoincrement' => true,
				'notnull' => true,
				'length' => 20,
			]);
			// the lockout key: the resolved account uid, or - for a login name
			// which does not resolve to an account - the normalised login name.
			// Longer than users.uid on purpose, login names are attacker supplied.
			$table->addColumn('uid', 'string', [
				'notnull' => true,
				'length' => 128,
			]);
			$table->addColumn('fail_count', 'integer', [
				'notnull' => true,
				'length' => 4,
				'default' => 0,
			]);
			// unix timestamp; null or in the past means not locked
			$table->addColumn('locked_until', 'bigint', [
				'notnull' => false,
				'length' => 20,
			]);
			// unix timestamp of the most recent failure, drives the counter decay
			$table->addColumn('last_fail_at', 'bigint', [
				'notnull' => true,
				'length' => 20,
				'default' => 0,
			]);
			$table->setPrimaryKey(['id']);
			$table->addUniqueIndex(['uid'], 'acc_lockouts_uid_idx');
			$table->addIndex(['last_fail_at'], 'acc_lockouts_fail_at_idx');
		}
	}
}
