<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Patrick Jahns <github@patrickjahns.de>
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

namespace OCA\DAV\Connector\Sabre;

use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

/**
 * Automatically renames a file if the target already exists,
 * if the OC-Autorename header is set.
 */
class AutorenamePlugin extends ServerPlugin {

	/**
	 * Reference to main server object
	 *
	 * @var Server
	 */
	private $server;

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
		$this->server->on('method:PUT', [$this, 'handlePut'], 1);
	}

	/**
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return bool|void
	 * @throws \Sabre\DAV\Exception\BadRequest
	 * @throws \Sabre\DAV\Exception\Conflict
	 * @throws \Sabre\DAV\Exception\NotFound
	 */
	public function handlePut(RequestInterface $request, ResponseInterface $response) {
		if ($request->getHeader('OC-Autorename') !== '1') {
			return;
		}

		$path = $request->getPath();

		// Intercepting Content-Range
		if ($request->getHeader('Content-Range')) {
			/*
			   An origin server that allows PUT on a given target resource MUST send
			   a 400 (Bad Request) response to a PUT request that contains a
			   Content-Range header field.

			   Reference: http://tools.ietf.org/html/rfc7231#section-4.3.4
			*/
			throw new BadRequest('Content-Range on PUT requests are forbidden.');
		}

		if ($this->server->tree->nodeExists($path)) {
			$node = $this->server->tree->getNodeForPath($path);

			// only continue for file nodes
			if (!($node instanceof File)) {
				return;
			}

			if (!$this->server->tree instanceof ObjectTree) {
				return;
			}

			$view = $this->server->tree->getView();
			list($nodePath, $nodeName) = \Sabre\HTTP\URLUtil::splitPath($node->getPath());
			$newName = \OC_Helper::buildNotExistingFileNameForView($nodePath, $nodeName, $view);

			$body = $request->getBodyAsStream();

			$etag = null;
			if (!$this->server->createFile($nodePath . '/' . $newName, $body, $etag)) {
				// For one reason or another the file was not created.
				return false;
			}

			$response->setHeader('Content-Length', '0');
			if ($etag) {
				$response->setHeader('ETag', $etag);
			}
			$response->setStatus(201);

			// handled
			return false;
		}
	}
}
