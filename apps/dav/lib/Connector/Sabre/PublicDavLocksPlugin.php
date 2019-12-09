<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@solidgear.es>
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
	protected $publicRequestMatcher;

	/**
	 * The callable must return true if the target uri is a public one or false otherwise
	 * function ($uri) {
	 *   if (isPublicResource($uri)) {
	 *     return true;
	 *   }
	 *   return false;
	 * }
	 * @param BackendInterface $locksBackend
	 * @param callable $publicRequestMatcher
	 */
	public function __construct(BackendInterface $locksBackend, callable $publicRequestMatcher) {
		parent::__construct($locksBackend);
		$this->publicRequestMatcher = $publicRequestMatcher;
	}

	public function getPluginName() {
		return 'PublicDavLockPlugin';
	}

	public function getHTTPMethods($uri) {
		if (!\call_user_func_array($this->publicRequestMatcher, [$uri])) {
			return parent::getHTTPMethods($uri);
		} else {
			return [];
		}
	}

	public function httpLock(RequestInterface $request, ResponseInterface $response) {
		$uri = $request->getPath();

		if (!\call_user_func_array($this->publicRequestMatcher, [$uri])) {
			return parent::httpLock($request, $response);
		} else {
			$existingLocks = $this->getLocks($uri);
			if (empty($existingLocks)) {
				throw new MethodNotAllowed('Locking not allowed from public endpoint');
			} else {
				throw new Locked(\reset($existingLocks));
			}
		}
	}

	public function httpUnlock(RequestInterface $request, ResponseInterface $response) {
		$uri = $request->getPath();

		if (!\call_user_func_array($this->publicRequestMatcher, [$uri])) {
			return parent::httpUnlock($request, $response);
		} else {
			throw new MethodNotAllowed('Locking not allowed from public endpoint');
		}
	}
}
