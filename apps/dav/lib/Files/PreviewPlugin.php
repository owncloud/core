<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Files;

use OCP\Files\IPreviewNode;
use OCP\ILogger;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

class PreviewPlugin extends ServerPlugin {

	/** @var Server */
	protected $server;
	/** @var ILogger */
	private $logger;

	public function __construct(ILogger $logger) {
		$this->logger = $logger;
	}

	/**
	 * Initializes the plugin and registers event handlers
	 *
	 * @param Server $server
	 * @return void
	 */
	function initialize(Server $server) {

		$this->server = $server;
		$this->server->on('method:GET', [$this, 'httpGet'], 90);
	}

	/**
	 * Intercepts GET requests on node urls ending with ?preview.
	 * The node has to implement IPreviewNode
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return bool
	 * @throws NotFound
	 */
	function httpGet(RequestInterface $request, ResponseInterface $response) {

		$queryParams = $request->getQueryParameters();
		if (!array_key_exists('preview', $queryParams)) {
			return true;
		}

		$path = $request->getPath();
		$node = $this->server->tree->getNodeForPath($path);

		if (!$node instanceof IFileNode) {
			return false;
		}
		$fileNode = $node->getNode();
		if (!$fileNode instanceof IPreviewNode) {
			return false;
		}

		// Checking ACL, if available.
		if ($aclPlugin = $this->server->getPlugin('acl')) {
			/** @var \Sabre\DAVACL\Plugin $aclPlugin */
			$aclPlugin->checkPrivileges($path, '{DAV:}read');
		}

		if ($image = $fileNode->getThumbnail($queryParams)) {
			if ($image === null || !$image->valid()) {
				return false;
			}
			$type = $image->mimeType();
			if (!in_array($type, ['image/png', 'image/jpeg', 'image/gif'])) {
				$type = 'application/octet-stream';
			}

			// Enable output buffering
			ob_start();
			// Capture the output
			$image->show();
			$imageData = ob_get_contents();
			// Clear the output buffer
			ob_end_clean();

			$response->setHeader('Content-Type', $type);
			$response->setHeader('Content-Disposition', 'attachment');
			$response->setStatus(200);

			$response->setBody($imageData);

			// Returning false to break the event chain
			return false;
		}
		// TODO: add forceIcon handling .... if still needed
		throw new NotFound();
	}
}
