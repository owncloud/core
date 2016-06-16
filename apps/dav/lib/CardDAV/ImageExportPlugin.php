<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

namespace OCA\DAV\CardDAV;

use Sabre\CardDAV\Card;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use Sabre\VObject\Parameter;
use Sabre\VObject\Reader;

class ImageExportPlugin extends ServerPlugin {

	/**
	 * @var Server
	 */
	protected $server;

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
	 * Intercepts GET requests on addressbook urls ending with ?photo.
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return bool|void
	 */
	function httpGet(RequestInterface $request, ResponseInterface $response) {

		$queryParams = $request->getQueryParameters();
		// TODO: in addition to photo we should also add logo some point in time
		if (!array_key_exists('photo', $queryParams)) {
			return true;
		}

		$path = $request->getPath();
		$node = $this->server->tree->getNodeForPath($path);

		if (!($node instanceof Card)) {
			return true;
		}

		$this->server->transactionType = 'carddav-image-export';

		// Checking ACL, if available.
		if ($aclPlugin = $this->server->getPlugin('acl')) {
			/** @var \Sabre\DAVACL\Plugin $aclPlugin */
			$aclPlugin->checkPrivileges($path, '{DAV:}read');
		}

		if ($result = $this->getPhoto($node)) {
			$response->setHeader('Content-Type', $result['Content-Type']);
			$response->setStatus(200);

			$response->setBody($result['body']);

			// Returning false to break the event chain
			return false;
		}
		return true;
	}

	function getPhoto(Card $node) {
		// TODO: this is kind of expensive - load carddav data from database and parse it
		//       we might want to build up a cache one day
		$vObject = $this->readCard($node->get());
		if (!$vObject->PHOTO) {
			return false;
		}

		$photo = $vObject->PHOTO;
		try {
			/** @var Parameter $type */
			$type = $photo->parameters()['TYPE'];
			$val = $photo->getValue();
			return [
				'Content-Type' => $type->getValue(),
				'body' => $val
			];
		} catch(\Exception $ex) {
//			$this->logger->debug($ex->getMessage());
		}
		return false;
	}

	private function readCard($cardData) {
		return Reader::read($cardData);
	}
}
