<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Test\Util\Group;


use OC\Group\BackendGroup;
use OC\Group\GroupMapper;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\Entity;

class MemoryGroupMapper extends GroupMapper {

	private static $groups = [];
	private static $counter = 1000;

	public $testCaseName = '';

	public function insert(Entity $entity) {
		$entity->setId(self::$counter++);
		self::$groups[$entity->getId()] = $entity;

		return $entity;
	}

	public function update(Entity $entity) {
		self::$groups[$entity->getId()] = $entity;

		return $entity;
	}

	public function delete(Entity $entity) {
		unset(self::$groups[$entity->getId()]);
	}

	public function getGroup($gid) {
		$match = array_filter(self::$groups, function (BackendGroup $a) use ($gid) {
			return $a->getGroupId() === $gid;
		});
		if (empty($match)) {
			throw new DoesNotExistException('');
		}

		return array_values($match)[0];
	}

	public function search($pattern, $limit, $offset) {
		$match = array_filter(self::$groups, function (BackendGroup $a) use ($pattern) {
			return stripos($a->getGroupId(), $pattern) !== false || stripos($a->getDisplayName(), $pattern) !== false || $pattern == '';
		});

		return $match;
	}

}