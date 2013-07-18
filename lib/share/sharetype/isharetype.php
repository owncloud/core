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

namespace OC\Share\ShareType;

use OC\Share\Share;

/**
 * Interface for a controller of shares
 */
interface IShareType {

	/**
	 * Get the identifier for this share type
	 * @return string id
	 */
	public function getId();

	/**
	 * Check if this share is valid for this share type
	 * @param Share $share
	 * @return bool
	 * @throws InvalidShareException
	 */
	public function isValidShare(Share $share);

	/**
	 * Insert the share into the database
	 * @param Share $share
	 * @return Share
	 */
	public function share(Share $share);

	/**
	 * Remove the share from the database
	 * @param Share $share
	 */
	public function unshare(Share $share);

	/**
	 * Update the share's properties in the database
	 * @param Share $share
 	 */
	public function update(Share $share);

	/**
	 * Get the shares with the specified parameters for this share type
	 * @param array $filter A key => value array of share properties
 	 * @param int $limit
	 * @param int $offset
	 * @return Share[]
	 */
	public function getShares(array $filter, $limit, $offset);
	
	/**
	 * Remove all shares of this share type in the database
	 */
	public function clear();

	/**
	 * Search for potential people of this share type to share with based on the given pattern
	 * @param string $pattern
 	 * @param int $limit
	 * @param int $offset
	 * @return array
	 */
	public function searchForPotentialShareWiths($pattern, $limit, $offset);

}