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

interface ShareType {

	/**
	 *
	 */
	public function getId();

	/**
	 * Check if $shareOwner is allowed to share with $shareWith
	 * @param string $shareOwner
	 * @param string $shareWith
	 * @return bool
	 */
	public function isValidShare($shareOwner, $shareWith);



	/**
	 *
	 * @param \OC\Share\Share $share
	 * @return bool
	 */
	public function share($share);

	/**
	 *
	 */
	public function generateItemTarget($share);

	/**
	 * Generate a unique file target for the 
	 * @param \OC\Share\Share $share
	 * @return string
	 */
	public function generateFileTarget($share);

	public function unshare($share);
	public function unshareFromSelf($share);
	public function setPermissions($id, $permissions);
	public function setExpirationDate($id, $date);

	public function searchShareWith();

}