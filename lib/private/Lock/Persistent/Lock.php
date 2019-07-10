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

namespace OC\Lock\Persistent;

use OCP\AppFramework\Db\Entity;
use OCP\Lock\Persistent\ILock;

/**
 * Class Lock
 *
 * @method string getTokenHash()
 * @method string getPath()
 * @method string getOwnerAccountId()
 *
 * @method setFileId(int $fileId)
 * @method setCreatedAt(int $timestamp)
 * @method setTimeout(int $timeout)
 * @method setScope(int $scope)
 * @method setDepth(int $depth)
 *
 * @package OC\Lock\Persistent
 */
class Lock extends Entity implements ILock {

	/** @var int BIGINT - foreign key to oc_filecache.fileid */
	protected $fileId;
	/** @var string - plain text field as transmitted by clients */
	protected $owner;
	/** @var int - seconds of lock life time */
	protected $timeout;
	/** @var int - unix timestamp when lock was created */
	protected $createdAt;
	/** @var string - uuid in WebDAV */
	protected $token;
	/** @var string - md5 of token */
	protected $tokenHash;
	/** @var int - LOCK_SCOPE_EXCLUSIVE or LOCK_SCOPE_SHARED */
	protected $scope;
	/** @var int: 0, 1 or infinite */
	protected $depth;
	/** @var int - foreign key zu oc_account.id */
	protected $ownerAccountId;

	/** @var string - joined with oc_filecache */
	protected $path;
	/** @var string - computed value */
	protected $davUserId;
	/** @var string - computed value */
	protected $absoluteDavPath;

	public function __construct() {
		$this->addType('fileId', 'integer');
		$this->addType('timeout', 'integer');
		$this->addType('createdAt', 'integer');
		$this->addType('scope', 'integer');
		$this->addType('depth', 'integer');
		$this->addType('ownerAccountId', 'integer');
	}

	/**
	 * @param $token
	 */
	public function setToken($token) {
		parent::setter('token', [$token]);
		parent::setter('tokenHash', [\md5($token)]);
	}

	/**
	 * Return the owner of the lock - plain text field as transmitted by clients
	 *
	 * @return string
	 * @since 10.1.0
	 */
	public function getOwner() {
		return $this->owner;
	}

	/**
	 * Foreign key to oc_filecache.fileid
	 *
	 * @return int
	 * @since 10.1.0
	 */
	public function getFileId() {
		return $this->fileId;
	}

	/**
	 * Seconds of lock life time
	 *
	 * @return int
	 * @since 10.1.0
	 */
	public function getTimeout() {
		return $this->timeout;
	}

	/**
	 * Unix timestamp when lock was created
	 *
	 * @return mixed
	 * @since 10.1.0
	 */
	public function getCreatedAt() {
		return $this->createdAt;
	}

	/**
	 * Token to identify the lock - uuid usually
	 *
	 * @return string
	 * @since 10.1.0
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * Either shared lock or exclusive lock
	 *
	 * @return int
	 * @since 10.1.0
	 */
	public function getScope() {
		return $this->scope;
	}

	/**
	 * Depth as used in WebDAV: 0, 1 or infinite
	 *
	 * @return int
	 * @since 10.1.0
	 */
	public function getDepth() {
		return $this->depth;
	}

	/**
	 * Absolute path to the file/folder on webdav
	 *
	 * @return string
	 * @since 10.1.0
	 */
	public function getAbsoluteDavPath() {
		return $this->absoluteDavPath;
	}

	/**
	 * User id on webdav URI
	 *
	 * @return string
	 * @since 10.1.0
	 */
	public function getDavUserId() {
		return $this->davUserId;
	}

	/**
	 * Set the owner
	 *
	 * @param string $owner
	 * @return mixed
	 * @since 10.1.0
	 */
	public function setOwner($owner) {
		$this->setter('owner', [$owner]);
	}
}
