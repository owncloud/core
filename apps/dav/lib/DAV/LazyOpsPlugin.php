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

use OCA\DAV\Connector\Sabre\Exception\Forbidden;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\Files\ICopySource;
use OCP\Files\ForbiddenException;
use OCP\Lock\ILockingProvider;
use Sabre\DAV\Exception;
use Sabre\DAV\IFile;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\Response;
use Sabre\HTTP\ResponseInterface;

/**
 * Class LazyOpsPlugin
 *
 * @package OCA\DAV\DAV
 */
class LazyOpsPlugin extends ServerPlugin {

	/** @var Server */
	private $server;

	/**
	 * @param Server $server
	 */
	public function initialize(Server $server) {
		$this->server = $server;
		$server->on('method:MOVE', [$this, 'httpMove'], 90);
//		$server->on('afterResponse', [$this, 'afterResponse']);
	}

	public function httpMove(RequestInterface $request, ResponseInterface $response) {
		if (!$request->getHeader('OC-LazyOps')) {
			return true;
		}
		$response->setStatus(202);
		$response->addHeader('Connection', 'close');

		\register_shutdown_function(function () use ($request, $response) {
			return $this->afterResponse($request, $response);
		});

		return false;
	}

	public function afterResponse(RequestInterface $request, ResponseInterface $response) {
		if (!$request->getHeader('OC-LazyOps')) {
			return true;
		}

		\flush();
		$request->removeHeader('OC-LazyOps');
		$responseDummy = new Response();
		try {
			$this->server->emit('method:MOVE', [$request, $responseDummy]);
		} catch (\Exception $ex) {
			\OC::$server->getLogger()->logException($ex);
		}
	}
}
