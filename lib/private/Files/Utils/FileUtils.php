<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OC\Files\Utils;

/**
 * Class FileUtils
 *
 * @package OC\Files\Utils
 */
class FileUtils {

	/**
	 * Check if the file is a part file
	 * (file with part file extension or file within a part files folder)
	 *
	 * @param string $path path to a file
	 * @return boolean
	 */
	public static function isPartialFile($path) {
		if (\pathinfo($path, PATHINFO_EXTENSION) === 'part') {
			return true;
		}
		if (\strpos($path, '.part/') !== false) {
			return true;
		}

		return false;
	}
}
