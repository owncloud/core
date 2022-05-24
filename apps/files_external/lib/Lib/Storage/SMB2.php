<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Files_External\Lib\Storage;

use Icewind\SMB\Exception\AlreadyExistsException;
use Icewind\SMB\Exception\ConnectException;
use Icewind\SMB\Exception\Exception;
use Icewind\SMB\Exception\ForbiddenException;
use Icewind\SMB\Exception\NotFoundException;
use Icewind\SMB\BasicAuth;
use Icewind\SMB\IFileInfo;
use Icewind\SMB\IServer;
use Icewind\SMB\Native\NativeServer;
use Icewind\SMB\Wrapped\FileInfo;
use Icewind\SMB\ServerFactory;
use Icewind\SMB\System;
use Icewind\SMB\IShare;
use Icewind\Streams\CallbackWrapper;
use Icewind\Streams\IteratorDirectory;
use OC\Cache\CappedMemoryCache;
use OC\Files\Filesystem;
use OCA\Files_External\Lib\Cache\SmbCacheWrapper;
use OCP\Files\Storage\StorageAdapter;
use OCP\Files\StorageNotAvailableException;
use OCP\Util;

class SMB2 extends SMB {
	/**
	 * @var SMB
	 */
	private $userSpecificSmb;

	public function __construct($params) {
		$this->userSpecificSmb = new SMB($params);

		$params2 = $params;
		$params2['user'] = $params['service-account'];
		$params2['password'] = $params['service-account-password'];

		parent::__construct($params2);
	}

	public function getId(): string {
		return 'smb2::' . $this->server->getHost() . '//' . $this->share->getName() . '/' . $this->root;
	}

	public function getCache($path = '', $storage = null) {
		$parentCache = parent::getCache($path, $storage);
		return new SmbCacheWrapper($parentCache, $this->userSpecificSmb);
	}
}
