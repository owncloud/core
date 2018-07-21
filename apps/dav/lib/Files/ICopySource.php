<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Files;

/**
 * Interface ICopySource
 * This interface allows special handling of copy operations based on the copy source.
 * This gives the developer the freedom to implement a more efficient copy operation.
 *
 * @package OCA\DAV\Files
 */
interface ICopySource {

	/**
	 * Copies the source to the given destination.
	 * If the operation was not successful false is returned.
	 *
	 * @param string $destinationPath
	 * @return boolean
	 */
	public function copy($destinationPath);
}
