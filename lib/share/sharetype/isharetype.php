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

interface IShareType {

	/**
	 * Get the id for this share type
	 * @return string id
	 */
	public function getId();

	/**
	 * Get the shares for this share type based on the given parameters
	 * @param string $shareWith 
	 * @param string $uidOwner     
	 * @param bool $isShareWithUser
	 * @return array
	 */
	public function getShares($shareWith, $uidOwner, $isShareWithUser);

	/**
	 * Check if this share is valid for this share type
	 * @param Share $share
	 * @return bool
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
	 * Update the share's parent id in the database
	 * @param Share $share
	 *
	 * Call this to switch parent ids of a reshare if the current parent share is being removed
	 * 
	 */
	public function setParentId(Share $share);

	/**
	 * Update the share's permissions in the database
	 * @param Share $share
	 */
	public function setPermissions(Share $share);

	/**
	 * Update the share's expiration time in the database
	 * @param Share $share
	 */
	public function setExpirationTime(Share $share);

	/**
	 * Get potential people to share with based on the given pattern
	 * @param string $pattern
	 * @return array
	 */
	public function searchForShareWiths($pattern);

}