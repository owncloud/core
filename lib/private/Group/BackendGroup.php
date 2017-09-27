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

namespace OC\Group;

use OCP\AppFramework\Db\Entity;
use OCP\GroupInterface;

/**
 * Class BackendGroup
 *
 * @method int getGroupId()
 * @method string getDisplayName()
 * @method void setDisplayName(string $displayName)
 * @method string getBackend()
 * @method void setBackend(string $backEnd)
 *
 * @package OC\Group
 */
class BackendGroup extends Entity {

	protected $groupId;
	protected $displayName;
	protected $backend;

	public function __construct() { }

	public function setGroupId($gid) {
		parent::setter('groupId', [$gid]);
	}
}