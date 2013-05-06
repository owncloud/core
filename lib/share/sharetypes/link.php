<?php
/**
* ownCloud
*
* @author Michael Gapczynski
* @copyright 2013 Michael Gapczynski mtgap@owncloud.com
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
*/

namespace OC\Share\Type;

class Link extends Common {

	public function isValidShare($share) {
		parent::isValidShare($share);
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_allow_links', 'yes');
		if ($sharingPolicy !== 'yes') {
			throw new \InvalidShareException('Sharing with links is not allowed');
		} else {
			return true;
		}
	}

	public function share($share) {
		$id = parent::share($share);
		$token = \OC_Util::generate_random_bytes(self::TOKEN_LENGTH);
		if ($id) {
			return $share->getToken();
		} else {
			return false;
		}
	}

	/**
	 *
	 * @return string
	 *
	 * Unique targets are not required for links
	 *
	 */
	public function generateItemTarget($share) {
		$itemType = $share->getItemType();
		return $itemType->suggestTarget($share);
	}

	/**
	 *
	 * @return string
	 *
	 * Unique targets are not required for links
	 *
	 */
	public function generateFileTarget($share) {
		return OCP\Share::get('file')->suggestTarget($share);
	}

	public function search($pattern) {
		return null;
	}

}