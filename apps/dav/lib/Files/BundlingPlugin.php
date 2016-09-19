<?php
/**
 * @author Piotr Mrowczynski <Piotr.Mrowczynski@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use OC\Files\View;
use Sabre\HTTP\URLUtil;
use OCP\Lock\ILockingProvider;
use OC\Files\FileInfo;
use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\Exception;
use OCA\DAV\Connector\Sabre\Exception\Forbidden;
use OCA\DAV\Connector\Sabre\Exception\InvalidPath;
use OCA\DAV\Connector\Sabre\Exception\FileLocked;
use OCP\Files\ForbiddenException;
use OCP\Lock\LockedException;

/**
 * This plugin is responsible for interconnecting three components of the OC server:
 * - RequestInterface object handler for request incoming from the client
 * - MultipartContentsParser responsible for reading the contents of the request body
 * - BundledFile responsible for storage of the file associated with request in the OC server
 *
 * Bundling plugin is responsible for receiving, validation and processing of the multipart/related request containing files.
 *
 */
class BundlingPlugin extends ServerPlugin {

	/**
	 * Reference to main server object
	 *
	 * @var \Sabre\DAV\Server
	 */
	private $server;

	/**
	 * @var \Sabre\HTTP\RequestInterface
	 */
	private $request;

	/**
	 * @var \Sabre\HTTP\ResponseInterface
	 */
	private $response;

	/**
	 * @var String
	 */
	private $boundary = null;

	/**
	 * @var \OCA\DAV\FilesBundle
	 */
	private $contentHandler = null;

	/**
	 * @var String
	 */
	private $userFilesHome = null;

	/**
	 * @var View
	 */
	private $fileView;

	/**
	 * @var Array
	 */
	private $cacheValidParents = null;
	
	/**
	 * Plugin contructor
	 */
	public function __construct(View $view) {
		$this->fileView = $view;
	}

	/**
	 * This initializes the plugin.
	 *
	 * This function is called by \Sabre\DAV\Server, after
	 * addPlugin is called.
	 *
	 * This method should set up the requires event subscriptions.
	 *
	 * @param \Sabre\DAV\Server $server
	 * @return void
	 */
	public function initialize(\Sabre\DAV\Server $server) {

		$this->server = $server;

		$server->on('method:POST', array($this, 'handleBundle'));
	}

	/**
	 * We intercept this to handle method:POST on a dav resource and process the bundled files multipart HTTP request.
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 *
	 * @throws /Sabre\DAV\Exception\BadRequest
	 * @throws /Sabre\DAV\Exception\Forbidden
	 * @return null|false
	 */
	public function handleBundle(RequestInterface $request, ResponseInterface $response) {
		$this->request = $request;
		$this->response = $response;

		//validate the request before parsing
		$this->validateRequest();

		if (!$this->server->emit('beforeWriteBundle', [$this->userFilesHome])){
			throw new Forbidden('beforeWriteBundle preconditions failed');
		}

		//Update the content handler of the bundle body
		$this->contentHandler = $this->getContentHandler($this->request);

		$multipleRequestsData = $this->parseBundle();

		//Process bundle and send a multistatus response
		$result = $this->processBundle($multipleRequestsData);

		return $result;
	}

	/**
	 * Check multipart headers.
	 *
	 * @throws /Sabre\DAV\Exception\BadRequest
	 * @throws /Sabre\DAV\Exception\Forbidden
	 * @return void
	 */
	private function validateRequest() {
		// Making sure the end node exists
		//TODO: add support for user creation if that is first sync. Currently user has to be created.
		$this->userFilesHome = $this->request->getPath();
		$userFilesHomeNode = $this->server->tree->getNodeForPath($this->userFilesHome);
		if (!($userFilesHomeNode instanceof FilesHome)){
			throw new Forbidden('URL endpoint has to be instance of \OCA\DAV\Files\FilesHome');
		}

		$headers = array('Content-Type');
		foreach ($headers as $header) {
			$value = $this->request->getHeader($header);
			if ($value === null) {
				throw new BadRequest(sprintf('%s header is needed', $header));
			} elseif (!is_int($value) && empty($value)) {
				throw new BadRequest(sprintf('%s header must not be empty', $header));
			}
		}

		//Validate content-type
		$contentParts = explode(';', $this->request->getHeader('Content-Type'));
		if (count($contentParts) != 2) {
			throw new Forbidden('Improper Content-type format. Boundary may be missing');
		}
		$contentType = trim($contentParts[0]);
		$expectedContentType = 'multipart/mixed';
		if ($contentType != $expectedContentType) {
			throw new BadRequest(sprintf(
				'Content-Type must be %s',
				$expectedContentType
			));
		}

		//Validate boundrary
		$boundaryPart = trim($contentParts[1]);
		$shouldStart = 'boundary=';
		if (substr($boundaryPart, 0, strlen($shouldStart)) != $shouldStart) {
			throw new BadRequest('Boundary is not set');
		}
		$boundary = substr($boundaryPart, strlen($shouldStart));
		if (substr($boundary, 0, 1) == '"' && substr($boundary, -1) == '"') {
			$boundary = substr($boundary, 1, -1);
		}
		$this->boundary = $boundary;
	}

	/**
	 * Parses multipart contents and send appropriete response
	 *
	 * @throws \Sabre\DAV\Exception\BadRequest
	 *
	 * @return array $multipleRequestsData
	 */
	private function parseBundle() {
		$multipleRequestsData = array();
		try {
			while(!$this->contentHandler->getEndDelimiterReached()) {
				//get multipart header for one of the contents
				$bundleContent = null;
				try{
					$bundleContent = $this->contentHandler->getPartHeaders($this->boundary);
				}
				catch (\Exception $e) {
					throw new \Exception($e->getMessage());
				}

				if ($bundleContent === null && $this->contentHandler->getEndDelimiterReached()){
					//endDelimiter reached, break
					break;
				}

				//process X-OC-Path
				if (!isset($bundleContent['x-oc-path'])){
					//without oc-path we cannot contruct multistatus response
					throw new \Exception('File header does not contain X-OC-Path. Unable to parse whole bundle request');
				}

				if (!isset($bundleContent['x-oc-method'])) {
					throw new \Exception('File ['.$bundleContent['x-oc-path'].'] metadata does not contain required key - value pair containing x-oc-method');
				}

				switch(strtolower($bundleContent['x-oc-method'])){
					case 'put':

						if (!isset($bundleContent['content-length'])) {
							throw new \Exception('File ['.$bundleContent['x-oc-path'].'] header does not contain Content-Length. Unable to parse whole bundle request');
						}

						//create a in-memory file
						$target = fopen('php://memory', "rw+");
						if (!$this->contentHandler->streamReadToStream($target, $bundleContent['content-length'])){
							fclose($target);
							throw new \Exception('Error reading the file contents ['.$bundleContent['x-oc-path'].']');
						}
						rewind($target);
						$bundleContent['data'] = $target;
						break;
					default:
						throw new \Exception('Method '.$bundleContent['x-oc-method'].' not supported - ['.$bundleContent['x-oc-path'].']');
						break;
				}
				$multipleRequestsData[] = $bundleContent;
			}
		} catch (\Exception $e) {
			//cleanup the $multipleRequestsData and throw exception
			foreach ($multipleRequestsData as $bundleContent){
				if (isset($bundleContent['data']) && is_resource($bundleContent['data'])){
					fclose($bundleContent['data']);
				}
			}
			throw new BadRequest($e->getMessage());
		}
		return $multipleRequestsData;
	}

	/**
	 * Process multipart contents and send appropriete response
	 *
	 * @param  RequestInterface $request
	 *
	 * @return boolean
	 */
	private function processBundle($multipleRequestsData) {
		$bundleResponseProperties = array();

		foreach($multipleRequestsData as $requestData) {
			//TODO: here should be x-oc-method switch again

			//parseBundle function ensures that PUT only will pass
			if (isset($requestData['data']) && is_resource($requestData['data'])){
				$bundleResponseProperties[] = $this->processPutFile($requestData);
				fclose($requestData['data']);
			}
		}

		//multistatus response anounced
		$this->response->setHeader('Content-Type', 'application/xml; charset=utf-8');
		$this->response->setStatus(207);
		$data = $this->server->generateMultiStatus($bundleResponseProperties);
		$this->response->setBody($data);

		return false;
	}

	/**
	 * Process multipart contents and send appropriete response
	 *
	 * @param  RequestInterface $request
	 *
	 * @return boolean
	 */
	private function processPutFile($requestData) {
		//parseBundle function ensures that PUT has X-OC-PATH, otherwise request will fail earlier.
		$filePath = $requestData['x-oc-path'];

		if ($this->server->tree->nodeExists($filePath)) {
			$exc = new BadRequest('Method not allowed - file exists - update of the file is not supported!');
			return $this->handleFileMultiStatusError( $filePath, $exc);
		}

		list($folderPath, $fileName) = URLUtil::splitPath($filePath);

		if ($folderPath === ''){
			$fullFolderPath = $this->userFilesHome;
		}
		else{
			$fullFolderPath = $this->userFilesHome . '/' . $folderPath;
		}

		// For non-chunked upload it is enough to check if we can create a new file in a parent folder
		if (!isset($this->cacheValidParents[$folderPath])){
			$this->cacheValidParents[$folderPath] = ($this->server->tree->nodeExists($fullFolderPath) && $this->fileView->isCreatable($folderPath));
		}

		if (!$this->cacheValidParents[$folderPath]) {
			$exc = new BadRequest('File creation on not existing or without creation permission parent folder is not permitted');
			return $this->handleFileMultiStatusError($filePath, $exc);
		}


		try {
			# the check here is necessary, because createFile uses put covered in sabre/file.php
			# and not touch covered in files/view.php
			if (\OC\Files\Filesystem::isForbiddenFileOrDir($fileName)) {
				throw new \Sabre\DAV\Exception\Forbidden();
			}

			$this->fileView->verifyPath($folderPath, $fileName);

			//get absolute path of the file
			$absoluteFilePath = $this->fileView->getAbsolutePath($folderPath) . '/' . $fileName;
			$info = new FileInfo($absoluteFilePath, null, null, array(), null);
			$node = new BundledFile($this->fileView, $info);
			$node->acquireLock(ILockingProvider::LOCK_SHARED);
			$properties = $node->putFile($requestData);
		} catch (\Exception $exc) {
			return $this->handleFileMultiStatusError($filePath, $exc);
		}

		//release lock as in dav/lib/Connector/Sabre/LockPlugin.php
		$node->releaseLock(ILockingProvider::LOCK_SHARED);
		$this->server->tree->markDirty($filePath);
		return $this->handleFileMultiStatus($filePath, $properties);
	}
	
	/**
	 * Adds to multistatus response exception class string and exception message for specific file
	 *
	 * @return array $entry
	 */
	protected function handleFileMultiStatusError($ocPath, $exc){
		$status = $exc->getHTTPCode();
		$entry['href'] = $this->userFilesHome;
		$entry[$status]['{DAV:}error']['{http://sabredav.org/ns}exception'] = get_class($exc);
		$entry[$status]['{DAV:}error']['{http://sabredav.org/ns}message'] = $exc->getMessage();
		$entry[$status]['{DAV:}oc-path'] = $ocPath;
		return $entry;
	}

	/**
	 * Adds to multistatus response properties for specific file
	 *
	 * @return array $entry
	 */
	protected function handleFileMultiStatus($ocPath, $properties){
		$entry['href'] = $this->userFilesHome;
		$entry[200] = $properties;
		$entry[200]['{DAV:}oc-path'] = $ocPath;
		return $entry;
	}

	/**
	 * Get content handler
	 *
	 * @param  RequestInterface $request
	 * @return \OCA\DAV\Files\MultipartContentsParser
	 */
	protected function getContentHandler(RequestInterface $request) {
		if ($this->contentHandler === null) {
			return new MultipartContentsParser($request);
		}
		return $this->contentHandler;
	}
}