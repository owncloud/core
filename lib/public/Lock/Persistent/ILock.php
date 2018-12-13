<?php
declare(strict_types=1);
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
	public const LOCK_SCOPE_EXCLUSIVE = 1;
	public const LOCK_SCOPE_SHARED = 2;
	public const LOCK_DEPTH_ZERO = 0;
	public const LOCK_DEPTH_INFINITE = -1;

	/**
	 * Return the owner of the lock - plain text field as transmitted by clients
	 *
	 * @return string | null
	 * @since 11.0.0
	 */
	public function getOwner() : ?string;

	/**
	 * Foreign key to oc_filecache.fileid
	 *
	 * @return int
	 * @since 11.0.0
	 */
	public function getFileId() : int;

	/**
	 * Seconds of lock life time
	 *
	 * @return int
	 * @since 11.0.0
	 */
	public function getTimeout() : int;

	/**
	 * Unix timestamp when lock was created
	 *
	 * @return mixed
	 * @since 11.0.0
	 */
	public function getCreatedAt() : int;

	/**
	 * Token to identify the lock - uuid usually
	 *
	 * @return string
	 * @since 11.0.0
	 */
	public function getToken() : string;

	/**
	 * Either shared lock or exclusive lock
	 *
	 * @return int
	 * @since 11.0.0
	 */

	public function getScope() : int;

	/**
	 * Depth as used in WebDAV: 0, 1 or infinite
	 *
	 * @return int
	 * @since 11.0.0
	 */
	public function getDepth() : int;

	/**
	 * Absolute path to the file/folder on webdav
	 * @return string
	 * @since 11.0.0
	 */
	public function getAbsoluteDavPath() : string;

	/**
	 * User id on webdav URI
	 * @return string
	 * @since 11.0.0
	 */
	public function getDavUserId() : string;

	/**
	 * Set the owner
	 *
	 * @param string $owner
	 * @return void
	 * @since 11.0.0
	 */
	public function setOwner(?string $owner) : void;
}
