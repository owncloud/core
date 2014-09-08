<?php
/**
* ownCloud - Tag class
*
* @author Bernhard Reiter
* @copyright 2014 Bernhard Reiter <ockham@raz.or.at>
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

namespace OC;

use \OCP\AppFramework\Db\Entity;

class Tag extends Entity {

	public $uid; // owner
	public $type;
	public $category; // tag name

	/**
	* Constructor.
	*
	*/

	public function __construct($uid = null, $type = null, $category = null) {
		$this->setUid($uid);
		$this->setType($type);
		$this->setCategory($category);
	}

	public function getDisplayName() {
		if ($this->uid != \OCP\User::getUser())
			return $this->category . ' ('. $this->uid . ')';
		return $this->category;
	}
}
