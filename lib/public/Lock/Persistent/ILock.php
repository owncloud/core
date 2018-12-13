<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 */

namespace OCP\Lock\Persistent;

/**
 * Interface ILock
 *
 * @package OCP\Lock\Persistent
 * @since 11.0.0
 */
interface ILock {
	// these values are in sync with \Sabre\DAV\Locks\LockInfo
	const LOCK_SCOPE_EXCLUSIVE = 1;
	const LOCK_SCOPE_SHARED = 2;
	const LOCK_DEPTH_ZERO = 0;
	const LOCK_DEPTH_INFINITE = -1;

	/**
	 * Return the owner of the lock - plain text field as transmitted by clients
	 *
	 * @return string | null
	 * @since 11.0.0
	 */
	public function getOwner();

	/**
	 * Foreign key to oc_filecache.fileid
	 *
	 * @return int
	 * @since 11.0.0
	 */
	public function getFileId();

	/**
	 * Seconds of lock life time
	 *
	 * @return int
	 * @since 11.0.0
	 */
	public function getTimeout();

	/**
	 * Unix timestamp when lock was created
	 *
	 * @return mixed
	 * @since 11.0.0
	 */
	public function getCreatedAt();

	/**
	 * Token to identify the lock - uuid usually
	 *
	 * @return string
	 * @since 11.0.0
	 */
	public function getToken();

	/**
	 * Either shared lock or exclusive lock
	 *
	 * @return int
	 * @since 11.0.0
	 */

	public function getScope();

	/**
	 * Depth as used in WebDAV: 0, 1 or infinite
	 *
	 * @return int
	 * @since 11.0.0
	 */
	public function getDepth();

	/**
	 * Absolute path to the file/folder on webdav
	 * @return string
	 * @since 11.0.0
	 */
	public function getAbsoluteDavPath();

	/**
	 * User id on webdav URI
	 * @return string
	 * @since 11.0.0
	 */
	public function getDavUserId();

	/**
	 * Set the owner
	 *
	 * @param string $owner
	 * @return void
	 * @since 11.0.0
	 */
	public function setOwner($owner);
}
