<?php
/**
 * ownCloud - Interface for PIM object
 *
 * @author Thomas Tanghus
 * @copyright 2013-2014 Thomas Tanghus (thomas@tanghus.net)
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
 *
 */

namespace OCP\Contacts;

/**
 * Implement this interface for PIM objects
 */

interface IPIMObject {

	/**
	 * If this object is part of a collection return a reference
	 * to the parent object, otherwise return null.
	 * @return IPIMObject|null
	 */
	//function getParent();

	/**
	 * Get the identifier for the object.
	 * @return string
	 */
	public function getId();

	/**
	 * A convenience method for getting all the info about the object.
	 *
	 * The returned array MUST contain:
	 * 	'id' @see getId().
	 * 	'displayname' @see getDisplayName()
	 * 	'owner' @see getOwner()
	 * 	'permissions' @see getPermissions
	 * 	'lastmodified' @see lastModified()
	 * 	'backend' The string type of the backend e.g. 'local', 'shared', 'ldap'
	 *
	 * If the object is part of a collection it MUST contain
	 * 	'parent' The identifier for the parent object. @see getParent()
	 *
	 * @return array|null
	 */
	public function getMetaData();

	/**
	 * FIXME: This should probably not be in the interface
	 * as it's *DAV specific.
	 * @return string
	 */
	public function getURI();

	/**
	 * @return string|null
	 */
	public function getDisplayName();

	/**
	 * Get the owner of the object.
	 * @return string|null
	 */
	public function getOwner();

	/**
	 * If this object is part of a collection return a reference
	 * to the parent object, otherwise return null.
	 * @return IPIMObject|null
	 */
	public function getParent();


	/** CRUDS permissions (Create, Read, Update, Delete, Share) using a bitmask of
	 *
	 * \OCP\PERMISSION_CREATE
	 * \OCP\PERMISSION_READ
	 * \OCP\PERMISSION_UPDATE
	 * \OCP\PERMISSION_DELETE
	 * \OCP\PERMISSION_SHARE
	 * or
	 * \OCP\PERMISSION_ALL
	 *
	 * @return integer
	 */
	public function getPermissions();

	/**
	 * @return AbstractBackend
	 */
	public function getBackend();

	/**
	 * @param integer $permission
	 * @return boolean
	 */
	public function hasPermission($permission);

	/**
	 * @brief Get the last modification time for the object.
	 *
	 * Must return a UNIX time stamp or null if the backend
	 * doesn't support it.
	 *
	 * @returns int | null
	 */
	public function lastModified();

	/**
	 * Delete the data from backend
	 *
	 * @return bool
	 */
	public function delete();

}
