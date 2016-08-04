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
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\Exception;

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

		$server->on('method:POST', array($this, 'handleBundledUpload'));
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
	public function handleBundledUpload(RequestInterface $request, ResponseInterface $response) {
		$this->request = $request;
		$this->response = $response;

		//TODO: add emit (beforeBind)

		//validate the request before parsing
		$this->validateRequest();

		//TODO: ensure to sign in proper classes to this emit
		if (!$this->server->emit('beforeWriteBundle', [$this->userFilesHome])){
			throw new Forbidden('beforeWriteBundle preconditions failed');
		}

		//Update the content handler of the bundle body
		$this->contentHandler = $this->getContentHandler($this->request);
		
		//Create JSON from metadata content in the bundle
		$bundleMetadata = $this->getBundleMetadata();

		//Process bundle and send a multistatus response
		$result = $this->processBundle($bundleMetadata);

		//TODO: add emit (afterBind)
		//TODO: add emit (afterCreateFile)
		return $result;
	}

	/**
	 * Adds to multistatus response exception class string and exception message for specific file
	 *
	 * @return void
	 */
	protected function handleFileMultiStatusError(&$bundleResponseProperties, $ocPath, $status, $propertyException, $propertyMessage){
		$entry['href'] = $this->userFilesHome;
		$entry[$status]['{DAV:}error']['{http://sabredav.org/ns}exception'] = $propertyException;
		$entry[$status]['{DAV:}error']['{http://sabredav.org/ns}message'] = $propertyMessage;
		$entry[$status]['{DAV:}oc-path'] = $ocPath;
		$bundleResponseProperties[] = $entry;
	}

	/**
	 * TODO: description and variables
	 *
	 * @return void
	 */
	protected function handleFileMultiStatus(&$bundleResponseProperties, $ocPath, $status, $properties){
		$entry['href'] = $this->userFilesHome;
		$entry[$status] = $properties;
		$entry[$status]['{DAV:}oc-path'] = $ocPath;
		$bundleResponseProperties[] = $entry;
	}

	/**
	 * Get content handler
	 *
	 * @param  RequestInterface $request
	 * @param  String $boundary
	 * @throws TODO: handle exception
	 * @return array
	 */
	protected function getContentHandler(RequestInterface $request) {
		if ($this->contentHandler === null) {
			return new MultipartContentsParser($request);
		}
			return $this->contentHandler;
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
			throw new BadRequest('URL endpoint has to be instance of \OCA\DAV\Files\FilesHome');
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
			//TODO: handle exception
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
	 * Get the bundle metadata from the request.
	 *
	 * Note: MUST be called before getBundleContents, and just one time.
	 *
	 * @throws /Sabre\DAV\Exception\BadRequest
	 * @return array
	 */
	private function getBundleMetadata() {
		$metadataContentHeader = $this->contentHandler->getPartHeaders($this->boundary);
		if (!isset($metadataContentHeader['content-type'])) {
			throw new BadRequest('Metadata does not contain content-type header');
		}
		$expectedContentType = 'application/json';
		if (substr($metadataContentHeader['content-type'], 0, strlen($expectedContentType)) != $expectedContentType) {
			throw new BadRequest(sprintf(
				'Expected content type of first part is %s. Found %s',
				$expectedContentType,
				$metadataContentHeader['content-type']
			));
		}

		if (!isset($metadataContentHeader['content-length'])) {
			throw new BadRequest('Metadata does not contain content-length header');
		}

		$metaDataContent = $this->contentHandler->streamReadToString($metadataContentHeader['content-length']);

		if (isset($metadataContentHeader['content-md5'])) {
			//check if the expected metadata is corrupted
			$contentMD5 = $metadataContentHeader['content-md5'];
			$hash = md5($metaDataContent);
			if (!($hash === $contentMD5)) {
				throw new BadRequest(sprintf(
					'Received wrong metadata. Expected Content-MD5 %s, expected %s',
					$contentMD5,
					$hash
				));
			}
		}

		//rewind to the begining of file for streamCopy and copy stream
		$jsonContent = json_decode($metaDataContent, true);
		if ($jsonContent === null) {
			throw new BadRequest('Unable to parse JSON');
		}

		return $jsonContent;
	}

	/**
	 * Process multipart contents and send appropriete response
	 *
	 * @return boolean
	 */
	private function processBundle($bundleMetadata) {
		$bundleResponseProperties = array();

		while(!$this->contentHandler->getEndDelimiterReached()) {
			//get multipart header for one of the contents
			try{
				$bundleContentHeader = $this->contentHandler->getPartHeaders($this->boundary);
			}
			catch (Exception $e) {
				throw new BadRequest($e->getMessage());
			}

			if ($bundleContentHeader === null && $this->contentHandler->getEndDelimiterReached()){
				//endDelimiter reached, break
				break;
			}

			if (!isset($bundleContentHeader['content-length'])) {
				throw new BadRequest('File header does not contain Content-Length. Unable to parse whole bundle request');
			}
			
			if (!isset($bundleContentHeader['content-id'])) {
				//part is multipart/related, but header contains too less data to create file or signilizes EndDelimiterReached, ignore
				$this->contentHandler->multipartContentSeekToContentLength($bundleContentHeader['content-length']);
				continue;
			}
			
			//try to match content part header to bundleMetadata for that bundleContent
			$binaryID = $bundleContentHeader['content-id'];
			if (!isset($bundleMetadata[$binaryID])){
				//part is multipart/related, but content-id in header does not match any of the files
				$this->contentHandler->multipartContentSeekToContentLength($bundleContentHeader['content-length']);
				continue;
			}
			$fileAttributes = $bundleMetadata[$binaryID];

			//process oc-path
			if (!isset($fileAttributes['oc-path'])){
				//without oc-path we cannot contruct multistatus response
				throw new BadRequest('File metadata does not contain required key - value pair containing oc-path');
			}

			//get oc-path of the file
			$filePath = $fileAttributes['oc-path'];
			list($folderPath, $fileName) = URLUtil::splitPath($filePath);

			if ($folderPath === ''){
				$fullFolderPath = $this->userFilesHome;
			}
			else{
				$fullFolderPath = $this->userFilesHome . '/' . $folderPath;
			}

			//validate parent folder
			if (!isset($this->cacheValidParents[$folderPath])){
				$this->cacheValidParents[$folderPath] = ($this->server->tree->nodeExists($fullFolderPath) && $this->fileView->isCreatable($folderPath));
			}

			if (!$this->cacheValidParents[$folderPath]) {
				$this->contentHandler->multipartContentSeekToContentLength($bundleContentHeader['content-length']);	
				$this->handleFileMultiStatusError($bundleResponseProperties, $filePath, 400, 'Sabre\DAV\Exception\BadRequest', 'File creation on not existing or without creation permission parent folder is not permitted');
				continue;
			}

			//get absolute path of the file
			$absoluteFilePath = $this->fileView->getAbsolutePath($folderPath) . '/' . $fileName;
			$info = new FileInfo($absoluteFilePath, null, null, array(), null);
			$node = new BundledFile($this->fileView, $info);

			try{
				$target = $node->getPartFileResource();
			} catch (\Exception $e) {
				$this->contentHandler->multipartContentSeekToContentLength($bundleContentHeader['content-length']);
				$this->handleFileMultiStatusError($bundleResponseProperties, $filePath, 400, 'Sabre\DAV\Exception\BadRequest', $e->getMessage());
				continue;
			}
			
			if (!$this->contentHandler->streamReadToStream($target, $bundleContentHeader['content-length'])){
				$this->handleFileMultiStatusError($bundleResponseProperties, $filePath, 400, 'Sabre\DAV\Exception\BadRequest', 'Error reading the file contents');
			}
			fclose($target);

			try{
				$node->acquireLock(ILockingProvider::LOCK_SHARED);
			} catch (\Exception $e) {
				$this->handleFileMultiStatusError($bundleResponseProperties, $filePath, 400, 'Sabre\DAV\Exception\BadRequest', $e->getMessage());
				continue;
			}

			try{
				$properties = $node->createFile($fileAttributes);
			} catch (\Exception $e) {
				$node->releaseLock(ILockingProvider::LOCK_SHARED);
				$this->handleFileMultiStatusError($bundleResponseProperties, $filePath, 400, 'Sabre\DAV\Exception\BadRequest', $e->getMessage());
				continue;
			}

			$node->releaseLock(ILockingProvider::LOCK_SHARED);
			$this->server->tree->markDirty($filePath);
			$this->handleFileMultiStatus($bundleResponseProperties, $filePath, 200, $properties);
		}

		//multistatus response anounced
		$this->response->setHeader('Content-Type', 'application/xml; charset=utf-8');
		$this->response->setStatus(207);
		$data = $this->server->generateMultiStatus($bundleResponseProperties);
		$this->response->setBody($data);

		return false;
	}
}