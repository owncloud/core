<?php
/**
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\Connector\Sabre;

use Sabre\DAV\Locks\Backend\BackendInterface;
use Sabre\DAV\PropFind;
use Sabre\DAV\INode;
use Sabre\DAV\Exception\MethodNotAllowed;
use Sabre\DAV\Exception\Locked;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Sabre\DAV\Xml\Property\LockDiscovery;

class PublicDavLocksPlugin extends \Sabre\DAV\Locks\Plugin {
	protected $isPublicRequest;
	public function __construct(BackendInterface $locksBackend, $isPublicRequest) {
		parent::__construct($locksBackend);
		$this->isPublicRequest = $isPublicRequest;
	}

	public function getPluginName() {
		return 'PublicDavLockPlugin';
	}

	public function getHTTPMethods($uri) {
		if (!$this->isPublicRequest) {
			return parent::getHTTPMethods($uri);
		} else {
			return [];
		}
	}

	public function httpLock(RequestInterface $request, ResponseInterface $response) {
		if (!$this->isPublicRequest) {
			return parent::httpLock($request, $response);
		} else {
			$uri = $request->getPath();
			$existingLocks = $this->getLocks($uri);
			if (empty($existingLocks)) {
				throw new MethodNotAllowed('Lock not allowed in public requests');
			} else {
				throw new Locked(reset($existingLocks));
			}
		}
	}

	public function httpUnlock(RequestInterface $request, ResponseInterface $response) {
		if (!$this->isPublicRequest) {
			return parent::httpUnlock($request, $response);
		} else {
			throw new MethodNotAllowed('Lock not allowed in public requests');
		}
	}
}
