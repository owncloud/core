<?php

/**
 * ownCloud - Core
 *
 * @author Raghu Nayyar
 * @copyright 2013 Raghu Nayyar <raghu.nayyar.007@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OC\Settings\Users

class UserController {
	
	/* Responsible for Switching between the Groups */
	
	public function opengroup($groupname) {
		$result = array(
			'success' => false,
			'data' => NULL
		);
		// Success / Failure opening of the file.
		if ($result['success'] => true) {
			$result['data'] => array(
				groupname => $groupname
			)
		} else {
			$result['data'] => $this->l10n->t('%s could not be opened', array($groupname))
		}
		return $result;
	} 	
}
?>
