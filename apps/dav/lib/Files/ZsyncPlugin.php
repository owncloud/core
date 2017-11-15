<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
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

use OC\AppFramework\Http;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\DAV\PropFind;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use OC\Files\View;
use \Exception;

class ZsyncPlugin extends ServerPlugin {

	// namespace
	const ZSYNC_PROPERTYNAME = '{http://owncloud.org/ns}zsync';

	/** @var OC\Files\View */
	private $view;

	public function __construct(View $view) {
		$this->view = $view;
		$this->view->mkdir('files_zsync');
	}

	/**
	 * Initializes the plugin and registers event handlers
	 *
	 * @param Server $server
	 * @return void
	 */
	function initialize(Server $server) {
		$server->on('method:GET', [$this, 'httpGet'], 90);
		$server->on('method:DELETE', [$this, 'httpDelete'], 90);
		$server->on('propFind', [$this, 'handleGetProperties']);
	}

	/**
	 * Intercepts GET requests on file urls ending with ?zsync.
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 */
	function httpGet(RequestInterface $request, ResponseInterface $response) {

		$queryParams = $request->getQueryParameters();
		if (!array_key_exists('zsync', $queryParams)) {
			return true;
		}

		$path = ltrim($request->getPath(), '/');
		/* remove files/$user */
		$path = implode('/', array_slice(explode('/', $path), 2));
		/* If basefile not found this is an error */
		if (!$this->view->file_exists('files/'.$path)) {
			$response->setStatus(Http::STATUS_NOT_FOUND);
			return false;
		}

		$info = $this->view->getFileInfo('files/'.$path);
		$zsyncMetadataFile = 'files_zsync/'.$info->getId();
		if ($this->view->file_exists($zsyncMetadataFile)) {
			$content = $this->view->file_get_contents($zsyncMetadataFile);
			$response->setStatus(Http::STATUS_OK);
			$response->setBody($content);
		} else {
			$response->setStatus(Http::STATUS_NOT_FOUND);
		}

		return false;
	}

	/**
	 * Intercepts DELETE requests on file urls ending with ?zsync.
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 */
	function httpDelete(RequestInterface $request, ResponseInterface $response) {

		$queryParams = $request->getQueryParameters();
		if (!array_key_exists('zsync', $queryParams)) {
			return true;
		}

		$path = ltrim($request->getPath(), '/');
		/* remove files/$user */
		$path = implode('/', array_slice(explode('/', $path), 2));
		/* If basefile not found this is an error */
		if (!$this->view->file_exists('files/'.$path)) {
			$response->setStatus(Http::STATUS_NOT_FOUND);
			return false;
		}

		$info = $this->view->getFileInfo('files/'.$path);
		$zsyncMetadataFile = 'files_zsync/'.$info->getId();
		if ($this->view->file_exists($zsyncMetadataFile)) {
			$this->view->unlink($zsyncMetadataFile);
			$response->setStatus(Http::STATUS_OK);
		} else {
			$response->setStatus(Http::STATUS_NOT_FOUND);
		}

		return false;
	}

	/**
	 * Adds zsync property if metadata exists
	 *
	 * @param PropFind $propFind
	 * @param \Sabre\DAV\INode $node
	 * @return void
	 */
	public function handleGetProperties(PropFind $propFind, \Sabre\DAV\INode $node) {
		if ($node instanceof \OCA\DAV\Connector\Sabre\File) {
			if (!$this->view->is_file('files/'.$node->getPath()))
				return;
			$info = $this->view->getFileInfo('files/'.$node->getPath());
			$zsyncMetadataFile = 'files_zsync/'.$info->getId();
			if ($this->view->file_exists($zsyncMetadataFile)) {
				$propFind->handle(self::ZSYNC_PROPERTYNAME, function() use ($node) {
					return 'true';
				});
			}
		}
	}
}
