<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OCP\Files\Storage;

interface IAttribute {
	/**
	 * Set an attribute on a file
	 *
	 * @param string $path
	 * @param string $name
	 * @param string $value
	 */
	public function setAttribute($path, $name, $value);

	/**
	 * Get an attribute from a file
	 *
	 * @param string $path
	 * @param string $name
	 * @return string | bool
	 */
	public function getAttribute($path, $name);
}
