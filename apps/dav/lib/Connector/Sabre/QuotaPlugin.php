<?php
/**
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author scambra <sergio@entrecables.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OCA\DAV\Connector\Sabre;
use OCP\Files\FileInfo;
use OCP\Files\StorageNotAvailableException;
use Sabre\DAV\Exception\InsufficientStorage;
use Sabre\DAV\Exception\ServiceUnavailable;
use Sabre\HTTP\URLUtil;
use OCA\DAV\Upload\FutureFile;
use Sabre\DAV\INode;

/**
 * This plugin check user quota and deny creating files when they exceeds the quota.
 *
 * @author Sergio Cambra
 * @copyright Copyright (C) 2012 entreCables S.L. All rights reserved.
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class QuotaPlugin extends \Sabre\DAV\ServerPlugin {

	/**
	 * @var \OC\Files\View
	 */
	private $view;

	/**
	 * Reference to main server object
	 *
	 * @var \Sabre\DAV\Server
	 */
	private $server;

	private $newDavEndpoint;

	/**
	 * @param \OC\Files\View $view
	 */
	public function __construct($view, $newDavEndpoint = false) {
		$this->view = $view;
		$this->newDavEndpoint = $newDavEndpoint;
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

		$server->on('beforeWriteContent', [$this, 'handleBeforeWriteContent'], 10);
		$server->on('beforeCreateFile', [$this, 'handleBeforeCreateFile'], 10);
		if ($this->newDavEndpoint) {
			$server->on('beforeMove', [$this, 'handleBeforeMove'], 10);
		}
	}

	/**
	 * Check if we're moving a Futurefile in which case we need to check
	 * the quota on the target destination.
	 *
	 * @param string $source source path
	 * @param string $destination destination path
	 */
	public function handleBeforeMove($source, $destination) {
		$sourceNode = $this->server->tree->getNodeForPath($source);
		if (!$sourceNode instanceof FutureFile) {
			return;
		}

		return $this->checkQuota($destination, $sourceNode->getSize());
	}

	/**
	 * Check quota before writing content
	 *
	 * @param string $uri target file URI
	 * @param INode $node Sabre Node
	 * @param resource $data data
	 * @param bool $modified modified
	 */
	public function handleBeforeWriteContent($uri, $node, $data, $modified) {
		return $this->checkQuota($uri);
	}

	/**
	 * Check quota before creating file
	 *
	 * @param string $uri target file URI
	 * @param resource $data data
	 * @param INode $parent Sabre Node
	 * @param bool $modified modified
	 */
	public function handleBeforeCreateFile($uri, $data, $parent, $modified) {
		return $this->checkQuota($uri);
	}

	/**
	 * This method is called before any HTTP method and validates there is enough free space to store the file
	 *
	 * @param string $uri
	 * @param int $length size to check whether it fits
	 * @throws InsufficientStorage
	 * @return bool
	 */
	public function checkQuota($uri, $length = null) {
		if ($length === null) {
			$length = $this->getLength();
		}
		if ($length) {
			// TODO: should really use the getNodeForPath() and the node instead...
			if (substr($uri, 0, 1) !== '/') {
				$uri = '/' . $uri;
			}
			if ($this->newDavEndpoint) {
				// need to remove the prefix "/files/$user"
				// note: duplicate slashes have been taken care of by Sabre already
				$uri = explode('/', trim($uri, '/'));
				if (count($uri) < 2 || $uri[0] !== 'files') {
					// not the "files" endpoint
					return;
				}
				array_shift($uri);
				array_shift($uri);
				$uri = '/' . implode('/', $uri);
			}
			list($parentUri, $newName) = URLUtil::splitPath($uri);
			if(is_null($parentUri)) {
				$parentUri = '';
			}
			$req = $this->server->httpRequest;
			if ($req->getHeader('OC-Chunked')) {
				$info = \OC_FileChunking::decodeName($newName);
				$chunkHandler = $this->getFileChunking($info);
				// subtract the already uploaded size to see whether
				// there is still enough space for the remaining chunks
				$length -= $chunkHandler->getCurrentSize();
				// use target file name for free space check in case of shared files
				$uri = rtrim($parentUri, '/') . '/' . $info['name'];
			}
			$freeSpace = $this->getFreeSpace($uri);
			if ($freeSpace !== FileInfo::SPACE_UNKNOWN && $length > $freeSpace) {
				if (isset($chunkHandler)) {
					$chunkHandler->cleanup();
				}
				throw new InsufficientStorage();
			}
		}
		return true;
	}

	public function getFileChunking($info) {
		// FIXME: need a factory for better mocking support
		return new \OC_FileChunking($info);
	}

	public function getLength() {
		$req = $this->server->httpRequest;
		$length = $req->getHeader('X-Expected-Entity-Length');
		if (!is_numeric($length)) {
			$length = $req->getHeader('Content-Length');
			$length = is_numeric($length) ? $length : null;
		}

		$ocLength = $req->getHeader('OC-Total-Length');
		if (is_numeric($length) && is_numeric($ocLength)) {
			return max($length, $ocLength);
		}

		return $length;
	}

	/**
	 * @param string $uri
	 * @return mixed
	 * @throws ServiceUnavailable
	 */
	public function getFreeSpace($uri) {
		try {
			$freeSpace = $this->view->free_space(ltrim($uri, '/'));
			return $freeSpace;
		} catch (StorageNotAvailableException $e) {
			throw new ServiceUnavailable($e->getMessage());
		}
	}
}
