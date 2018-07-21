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

namespace OCA\DAV\DAV;

use OCA\DAV\Connector\Sabre\Exception\Forbidden;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\Files\ICopySource;
use OCP\Files\ForbiddenException;
use OCP\Lock\ILockingProvider;
use Sabre\DAV\IFile;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

/**
 * Class CopyPlugin - adds own implementation of the COPY method.
 *
 * Invokes ICopySource->copy() if the source and destination types match.
 * If the source doesn't implement ICopySource, fall back to the default behavior.
 *
 * Currently only used for versions.
 * This is necessary because we don't want the target to be deleted before the move.
 * Deleting the target will kill the versions which is the wrong behavior.
 *
 * @package OCA\DAV\DAV
 */
class CopyPlugin extends ServerPlugin {

	/** @var Server */
	private $server;

	/**
	 * @param Server $server
	 */
	public function initialize(Server $server) {
		$this->server = $server;
		$server->on('method:COPY', [$this, 'httpCopy'], 90);
	}

	/**
	 * WebDAV HTTP COPY method
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return bool
	 * @throws Forbidden
	 */
	public function httpCopy(RequestInterface $request, ResponseInterface $response) {
		try {
			$path = $request->getPath();

			$sourceNode = $this->server->tree->getNodeForPath($path);
			if (!$sourceNode instanceof ICopySource) {
				return true;
			}

			$copyInfo = $this->server->getCopyAndMoveInfo($request);
			$destinationNode = $copyInfo['destinationNode'];
			if (!$copyInfo['destinationExists'] || !$destinationNode instanceof File || !$sourceNode instanceof IFile) {
				return true;
			}

			if (!$this->server->emit('beforeBind', [$copyInfo['destination']])) {
				return false;
			}

			$sourceNode->copy($destinationNode->getFileInfo()->getPath());

			$this->server->emit('afterBind', [$copyInfo['destination']]);

			$response->setHeader('Content-Length', '0');
			$response->setStatus(204);

			// Sending back false will interrupt the event chain and tell the server
			// we've handled this method.
			return false;
		} catch (ForbiddenException $ex) {
			throw new Forbidden($ex->getMessage(), $ex->getRetry());
		}
	}
}
