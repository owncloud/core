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

		$multipleRequestsData = $this->parseBundleHeader();

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
		$expectedContentType = 'multipart/related';
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
	private function parseBundleHeader() {
		$multipleRequestsData = array();
		try {
			//get multipart header for one of the contents
			if ($this->contentHandler->getEndDelimiterReached()){
				//endDelimiter reached, break
				return $multipleRequestsData;
			}

			// Verify metadata part headers
			$bundleMetadata = null;
			try{
				$bundleMetadata = $this->contentHandler->getPartHeaders($this->boundary);
			}
			catch (\Exception $e) {
				throw new \Exception($e->getMessage());
			}
			$contentParts = explode(';', $bundleMetadata['content-type']);
			if (count($contentParts) != 2) {
				throw new \Exception('Incorrect Content-type format. Charset might be missing');
			}
			$contentType = trim($contentParts[0]);
			$expectedContentType = 'text/xml';
			if ($contentType != $expectedContentType) {
				throw new BadRequest(sprintf(
					'Content-Type must be %s',
					$expectedContentType
				));
			}
			if (!isset($bundleMetadata['content-length'])) {
				throw new \Exception('Bundle metadata header does not contain Content-Length. Unable to parse whole bundle request');
			}

			// Read metadata part headers
			$bundleMetadataBody = $this->contentHandler->streamReadToString($bundleMetadata['content-length']);

			$bundleMetadataBody = preg_replace("/xmlns(:[A-Za-z0-9_])?=(\"|\')DAV:(\"|\')/","xmlns\\1=\"urn:DAV\"",$bundleMetadataBody);
			$xml = simplexml_load_string($bundleMetadataBody);
			unset($bundleMetadataBody);
			$xml->registerXPathNamespace('d','urn:DAV');

			if(1 != count($xml->xpath('/d:multipart'))){
				throw new \Exception('Bundle metadata does not contain d:multipart children element. Unable to parse whole bundle request');
			}

			foreach ($xml->xpath('/d:multipart/d:part/d:prop') as $prop) {
				$fileMetadata = get_object_vars($prop->children('d', TRUE));
				$headers = array('oc-path', 'oc-mtime', 'oc-id', 'oc-total-length');
				foreach ($headers as $header) {
					if (in_array($header,$fileMetadata) && (count($fileMetadata->{$header} == 1))) {
						throw new \Exception($header.' header is needed in the bundle metadata for each file. Unable to parse whole bundle request');
					}
				}
				$contentID = intval($fileMetadata['oc-id']);
				if(array_key_exists($contentID, $multipleRequestsData)){
					throw new \Exception('One or more files have the same Content-ID '.$contentID.'. Unable to parse whole bundle request');
				}
				$multipleRequestsData[$contentID]['oc-path'] = $fileMetadata['oc-path'];
				$multipleRequestsData[$contentID]['oc-mtime'] = $fileMetadata['oc-mtime'];
				$multipleRequestsData[$contentID]['oc-total-length'] = intval($fileMetadata['oc-total-length']);
				$multipleRequestsData[$contentID]['response'] = null;
			}
		} catch (\Exception $e) {
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

		while(!$this->contentHandler->getEndDelimiterReached()) {
			// Verify metadata part headers
			$fileContentHeader = null;

			//If something fails at this point, just continue, $multipleRequestsData[$contentID]['response'] will be null for this content
			try{
				$fileContentHeader = $this->contentHandler->getPartHeaders($this->boundary);
				if(is_null($fileContentHeader) || !isset($fileContentHeader['content-id']) || !array_key_exists(intval($fileContentHeader['content-id']), $multipleRequestsData)){
					continue;
				}
			}
			catch (\Exception $e) {
				continue;
			}

			$fileID = intval($fileContentHeader['content-id']);
			$fileMetadata = $multipleRequestsData[$fileID];

			$filePath = $fileMetadata['oc-path'];

			if ($this->server->tree->nodeExists($filePath)) {
				//set error response for that object
				$exc = new BadRequest('Method not allowed - file exists - update of the file is not supported!');
				$multipleRequestsData[$fileID]['response'] = $this->handleFileMultiStatusError($filePath, $exc);
				continue;
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
				$multipleRequestsData[$fileID]['response'] = $this->handleFileMultiStatusError($filePath, $exc);
				continue;
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
				$node = new BundledFile($this->fileView, $info, $this->contentHandler);
				$node->acquireLock(ILockingProvider::LOCK_SHARED);
				$properties = $node->putFile($fileMetadata);
				$multipleRequestsData[$fileID]['response'] = $this->handleFileMultiStatus($filePath, $properties);
			} catch (\Exception $exc) {
				$exc = new BadRequest($exc->getMessage());
				$multipleRequestsData[$fileID]['response'] = $this->handleFileMultiStatusError($filePath, $exc);
				continue;
			}

			//release lock as in dav/lib/Connector/Sabre/LockPlugin.php
			$node->releaseLock(ILockingProvider::LOCK_SHARED);
			$this->server->tree->markDirty($filePath);
		}

		foreach($multipleRequestsData as $requestData) {
			$response = $requestData['response'];
			if (is_null($response)){
				$exc = new BadRequest('File parsing error');
				$response = $this->handleFileMultiStatusError($requestData['oc-path'], $exc);
			}
			$bundleResponseProperties[] = $response;
		}

		//multistatus response anounced
		$this->response->setHeader('Content-Type', 'application/xml; charset=utf-8');
		$this->response->setStatus(207);
		$body = $this->server->generateMultiStatus($bundleResponseProperties);
		$this->response->setBody($body);

		return false;
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