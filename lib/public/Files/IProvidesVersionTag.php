<?php
/**
 * @author Jannik Stehle <jstehle@owncloud.com>
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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

namespace OCP\Files;

/**
 * Interface IProvidesVersionTag
 * This interface provides version author retrieval for file version
 *
 * @package OCP\Files
 * @since 10.12.0
 */
interface IProvidesVersionTag {
	/**
	 * Returns the versioning tag of the file.
	 *
	 * @return string tag or empty string if this is the initial version
	 * @since 10.12.0
	 */
	public function getVersionTag() : string;
}
