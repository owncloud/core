<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCP\Roles;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class AddRolesEvent
 * @since 10.3
 * @package OCP\Roles
 */
class AddRolesEvent extends Event {
	private $roles;

	/**
	 * @param array $role
	 * @since 10.3
	 */
	public function addRole(array $role) {
		if (isset($this->roles[$role['id']])) {
			throw new \InvalidArgumentException("Role with id {$role['id']} already known");
		}
		$this->roles[$role['id']] = $role;
	}

	/**
	 * @return array
	 * @since 10.3
	 */
	public function getRoles() {
		return \array_values($this->roles);
	}
}
