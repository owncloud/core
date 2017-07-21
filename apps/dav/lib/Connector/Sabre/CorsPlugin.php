<?php
/**
 * @author Noveen Sachdeva <noveen.sachdeva@research.iiit.ac.in>
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

use Sabre\HTTP\ResponseInterface;
use Sabre\HTTP\RequestInterface;

/**
 * Class CorsPlugin is a plugin which adds CORS headers to the responses
 */
class CorsPlugin extends \Sabre\DAV\ServerPlugin {

	/**
	 * Reference to main server object
	 *
	 * @var \Sabre\DAV\Server
	 */
	private $server;

	/**
	 * Reference to logged in user's session
	 *
	 * @var \OCP\IUserSession
	 */
	private $userSession;

	/**
	 * @param \OCP\IUserSession $userSession
	 */
	public function __construct(\OCP\IUserSession $userSession) {
		$this->userSession = $userSession;
		$this->extraHeaders['Access-Control-Allow-Headers'] = ["X-OC-Mtime", "OC-Checksum", "OC-Total-Length", "Depth", "Destination", "Overwrite"];
		$this->extraHeaders['Access-Control-Allow-Methods'] = ["MOVE", "COPY"];
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

		$this->server->on('beforeMethod', [$this, 'setCorsHeaders']);
		$this->server->on('beforeMethod:OPTIONS', [$this, 'setOptionsRequestHeaders']);
	}

	/**
	 * This method sets the cors headers for all requests
	 *
	 * @return void
	 */
	public function setCorsHeaders(RequestInterface $request, ResponseInterface $response) {
		if ($request->getHeader('origin') !== null && !is_null($this->userSession->getUser())) {
			$requesterDomain = $request->getHeader('origin');
			$userId = $this->userSession->getUser()->getUID();
			$response = \OC_Response::setCorsHeaders($userId, $requesterDomain, $response, null, $this->extraHeaders);
		}
	}

	/**
	 * Handles the OPTIONS request
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 *
	 * @return false
	 */
	public function setOptionsRequestHeaders(RequestInterface $request, ResponseInterface $response) {
		$authorization = $request->getHeader('Authorization');
		if ($authorization === null || $authorization === '') {
			// Set the proper response
			$response->setStatus(200);
			$response = \OC_Response::setOptionsRequestHeaders($response, $this->extraHeaders);

			// Since All OPTIONS requests are unauthorized, we will have to return false from here
			// If we don't return false, due to no authorization, a 401-Unauthorized will be thrown
			// Which we don't want here
			// Hence this sendResponse
			$this->server->sapi->sendResponse($response);
			return false;
		}
	}
}
