<?php
/**
 * @author Michiel de Jong <michiel@pondersource.com>
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

namespace OCP\Share;

/**
 * Interface IRemoteShareesSearch
 * Used in the ShareesController of the files_sharing app.
 * See the 'sciencemesh' app for an example implementation
 * of this interface.
 *
 * @package OCP\Share
 * @since 10.12.0
 */
interface IRemoteShareesSearch {
	/**
	 * Return the identifier of this provider.
	 * @param string search string for autocomplete
	 * @return array[] this function should return an array
	 * where each element is an associative array, containing:
	 * - label: a string to display as label
	 * - value: an associative array containing:
	 *   - shareType: int, to be used as share type
	 *   - shareWith: string, identifying the sharee
	 *   - server (optional): string, URL of the server, e.g.
	 * https://github.com/owncloud/core/blob/v10.12.0-beta.1/apps/files_sharing/lib/Controller/ShareesController.php#L421
	 *
	 * @since 10.12.0
	 */
	public function search($search);
}
