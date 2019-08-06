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

namespace OCA\DAV\Files\PublicFiles;

use OCP\Files\Node;
use OCP\Share\IShare;

/**
 * Interface IPublicSharedNode - common interface of all files and folders
 * in a shared node
 *
 * @package OCA\DAV\Files\PublicFiles
 */
interface IPublicSharedNode {
	/**
	 * @return IShare
	 */
	public function getShare();

	/**
	 * @return Node
	 */
	public function getNode();

	/**
	 * @return string
	 */
	public function getDavPermissions();
}
