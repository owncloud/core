<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace Test\Util\User;


use OC\User\Account;
use OC\User\AccountMapper;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\Entity;

class MemoryAccountMapper extends AccountMapper {

	private static $accounts = [];
	private static $counter = 1000;

	public $testCaseName = '';

	public function insert(Entity $entity) {
		$entity->setId(self::$counter++);
		self::$accounts[$entity->getId()] = $entity;
		return $entity;
	}

	public function update(Entity $entity) {
		self::$accounts[$entity->getId()] = $entity;

		return $entity;
	}

	public function delete(Entity $entity) {
		unset(self::$accounts[$entity->getId()]);
	}

	public function getByEmail($email) {
		$match = array_filter(self::$accounts, function (Account $a) use ($email) {
			return $a->getEmail() === $email;
		});

		return $match;
	}

	public function getByUid($uid) {
		$match = array_filter(self::$accounts, function (Account $a) use ($uid) {
			return strtolower($a->getUserId()) === strtolower($uid);
		});
		if (empty($match)) {
			throw new DoesNotExistException('');
		}

		return array_values($match)[0];
	}

	public function getUserCount($hasLoggedIn) {
		return count(self::$accounts);
	}

	public function search($fieldName, $pattern, $limit, $offset) {
		if ($pattern === '') {
			return self::$accounts;
		}
		$match = array_filter(self::$accounts, function (Account $a) use ($pattern) {
			return stripos($a->getUserId(), $pattern) || $pattern == '';
		});

		return $match;
	}

	public function callForAllUsers($callback, $search, $onlySeen) {
		foreach (self::$accounts as $account) {
			$return =$callback($account);
			if ($return === false) {
				return;
			}
		}
	}
}
