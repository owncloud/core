<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
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
 *
 */

namespace OCA\DAV\JobStatus;

use Hhxsv5\SSE\SSE;
use Hhxsv5\SSE\Update;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

class EventStreamPlugin extends ServerPlugin {

	/** @var Server */
	private $server;

	/**
	 * This initializes the plugin.
	 *
	 * This function is called by Sabre\DAV\Server, after
	 * addPlugin is called.
	 *
	 * This method should set up the required event subscriptions.
	 *
	 * @param Server $server
	 * @return void
	 */
	public function initialize(Server $server) {
		$this->server = $server;
		$server->on('method:GET', [$this, 'httpGet'], 90);
	}

	/**
	 * Intercepts GET requests on addressbook urls ending with ?photo.
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return bool
	 */
	public function httpGet(RequestInterface $request, ResponseInterface $response) {
		$queryParams = $request->getQueryParameters();
		if (!\array_key_exists('sse', $queryParams)) {
			return true;
		}

		$path = $request->getPath();
		$node = $this->server->tree->getNodeForPath($path);

		if (!($node instanceof JobStatus)) {
			return true;
		}

		$response->setHeader('Content-Type', 'text/event-stream');
		$response->setHeader('Connection', 'keep-alive');
		$response->setHeader('Cache-Control', 'no-cache');
		$response->setHeader('X-Accel-Buffering', 'no');
		$response->setStatus(200);

		$this->server->sapi->sendResponse($response);
		\ob_flush();
		\flush();

		$etag = '';

		(new SSE())->start(new Update(function () use ($node, &$etag) {
			$node->refreshStatus();
			if ($node->getETag() === $etag) {
				return false;
			}
			$etag = $node->getETag();
			return $node->get();
		}), 'job-status');

		// Returning false to break the event chain
		return false;
	}
}
