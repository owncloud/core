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

namespace OCA\DAV\DAV;

use OCP\Files\ForbiddenException;
use OCP\Files\IPreviewNode;
use OCP\ILogger;
use Sabre\DAV\Browser\PropFindAll;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\ICollection;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\DAV\Xml\Property\GetLastModified;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use OCA\DAV\Connector\Sabre\Exception\Forbidden as DAVForbiddenException;

class JsonPlugin extends ServerPlugin {

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
	 * @throws \Sabre\DAVACL\Exception\NeedPrivileges
	 * @throws \Sabre\DAV\Exception\NotAuthenticated
	 */
	function httpGet(RequestInterface $request, ResponseInterface $response) {

		if ($request->getMethod() !== 'GET') {
			return;
		}
		if ($request->getHeader('Accept') !== 'application/json') {
			return;
		}

		$path = $request->getPath();
		$node = $this->server->tree->getNodeForPath($path);
		if (!$node instanceof ICollection) {
			return false;
		}

		// TODO: paginate here ?
		$queryParams = $request->getQueryParameters();
		$propertyNames = isset($queryParams['fields'][0]) ? explode(',', $queryParams['fields'][0]) : [];

		$properties = $this->server->getPropertiesIteratorForPath($path, $propertyNames, 1);
		$entities = [];
		foreach ($properties as $property) {
			$type = isset($property[200]['{DAV:}resourcetype']) ? implode($property[200]['{DAV:}resourcetype']->getValue()) : '?';
			$entities[] = [
				'type' => $type,
				'id' => $property['href'],
				// TODO: handle error case
				'attributes' => $this->serialize($property[200])
			];
		}
		$jsonBody = json_encode($entities);

		// now let's start
		$response->setHeader('Content-Type', 'application/json');
		$response->setHeader('Content-Disposition', 'attachment');

		$response->setStatus(200);
		$response->setBody($jsonBody);

		// Returning false to break the event chain
		return false;
	}

	private function serialize($properties) {
		return array_map(function($p) {
			if ($p instanceof GetLastModified) {
				return $p->getTime()->format(\DateTime::RFC2822);
			}
			return $p;
		}, $properties);
	}
}
