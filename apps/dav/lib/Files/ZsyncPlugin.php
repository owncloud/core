<?php
/*
 * Copyright (C) by Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
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
			$response->setHeader('OC-ETag', $info->getEtag());
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
