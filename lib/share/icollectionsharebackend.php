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

namespace OC\Share;

use OC\Share\Share;

/**
 * This interface should be implemented if a share backend has content that can have children that
 * are also shared using a different backend class e.g. folders
 *
 * Hooks available in scope \OC\Share:
 *  - preShare(\OC\Share\Share $share)
 *  - postShare(\OC\Share\Share $share)
 *  - preUnshare(\OC\Share\Share $share)
 *  - postUnshare(\OC\Share\Share $share)
 *  - preUpdate(\OC\Share\Share $share)
 *  - postUpdate(\OC\Share\Share $share)
 *
 * @version 2.0.0 BETA
 */
interface ICollectionShareBackend {

	/**
	 * Get the identifiers for the children item types of this backend
	 * @return array
	 */
	public function getChildrenItemTypes();

	/**
	 * Search for shares of this collection item type that contain the child item source and
	 * shared with the share owner
	 * @param \OC\Share\Share $share
	 * @return \OC\Share\Share[]
	 */
	public function searchForParentCollections(Share $share);

}