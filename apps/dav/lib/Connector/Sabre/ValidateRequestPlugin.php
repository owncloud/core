<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

use OCP\IConfig;
use Sabre\DAV\Exception\ServiceUnavailable;
use Sabre\DAV\ServerPlugin;

class ValidateRequestPlugin extends ServerPlugin {

	/**
	 * Reference to main server object
	 *
	 * @var Server
	 */
	private $server;

	/**
	 * Service type as decided by resolveService($service) in remote.php
	 *
	 * @var string
	 */
	private $service;

	public function __construct($service) {
		$this->service = $service;
	}

	/**
	 * This initializes the plugin.
	 *
	 * This function is called by \Sabre\DAV\Server, after
	 * addPlugin is called.
	 *
	 * This method should set up the required event subscriptions.
	 *
	 * @param \Sabre\DAV\Server $server
	 * @return void
	 */
	public function initialize(\Sabre\DAV\Server $server) {
		$this->server = $server;
		$this->server->on('beforeMethod', [$this, 'checkValidity'], 1);
	}

	/**
	 * This method is called before any HTTP method and returns http status code 503
	 * in case the request is incorrect
	 *
	 * @throws ServiceUnavailable
	 * @return bool
	 */
	public function checkValidity() {
		$request = $this->server->httpRequest;
		$method = $request->getMethod();

		// Verify if optional OC headers are routed in the proper endpoint
		if ($method === 'PUT'
			&& $request->hasHeader('OC-Chunk-Offset')
			&& ($this->service != 'dav')) {
			throw new ServiceUnavailable('Specified OC-Chunk-Offset header is allowed only in dav endpoint');
		} else if ($method === 'PUT'
			&& ($request->hasHeader('HTTP_OC_CHUNKED') || $request->hasHeader('Oc-Chunked'))
			&& ($this->service != 'webdav')) {
			throw new ServiceUnavailable('Specified  header (HTTP_OC_CHUNKED/OC-Chunked header) is allowed only in webdav endpoint');
		}

		return true;
	}
}
