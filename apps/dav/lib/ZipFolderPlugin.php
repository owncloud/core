<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OCA\DAV;

use OCA\DAV\Connector\Sabre\Directory;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;
use OC\Streamer;
use Sabre\DAV\Exception\Locked;
use Sabre\DAV\Exception\Forbidden;
use OCP\Lock\ILockingProvider;

class ZipFolderPlugin extends ServerPlugin {

	/** @var Server */
	private $server;

	/** @var string */
	private $format;

	/** @var bool */
	private $ready;

	/** @var Node */
	private $node;

	/**
	 * This initializes the plugin.
	 *
	 * This function is called by Sabre\DAV\Server, after
	 * addPlugin is called.
	 *
	 * This method should set up the required event subscriptions.
	 *
	 * @param Server $server
	 * @return void
	 */
	function initialize(\Sabre\DAV\Server $server) {
		$this->server = $server;
		$server->on('method:GET', array($this, 'httpGet'), 30);
		$server->on('afterMethod:GET', array($this, 'doStream'), 30);
	}

	function httpGet(RequestInterface $request, ResponseInterface $response) {
		$path = $request->getPath();
		if (!$this->server->tree->nodeExists($path)) {
			return;
		}

		$node = $this->server->tree->getNodeForPath($path);
		if (!$node instanceof Directory) {
			return;
		}

		$this->format = $this->getRequestedFormat($request);
		$this->node = $node;

		$response->setBody('');
		$this->ready = true;
	}

	function doStream(RequestInterface $request, ResponseInterface $response) {
		if (!$this->ready) {
			return;
		}

		$this->getZipFolder($this->node, $this->format, $response);

		// return false to prevent Sabre to send its own response
		return false;
	}

	private function getRequestedFormat(RequestInterface $request) {
		$acceptHeaders = explode(',', $request->getHeader('Accept'));
		$formats = [];

		foreach ($acceptHeaders as $acceptHeader) {
			if (trim($acceptHeader) === 'application/x-tar') {
				$formats['tar'] = true;
			} else if (trim($acceptHeader) === 'application/zip') {
				$formats['zip'] = true;
			}
		}

		if (isset($formats['zip'])) {
			return 'zip';
		}
		if (isset($formats['tar'])) {
			return 'tar';
		}
		return null;
	}

	private function getZipFolder(Directory $node, $format, ResponseInterface $response) {
		$view = \OC\Files\Filesystem::getView();
		$dir = $node->getPath();

		try {
			$name = $node->getName();

			$streamer = new Streamer($format);

			// pre-lock all files
			$this->lockFiles($view, $dir);

			$streamer->sendHeaders($name);

			// TODO: inject
			$executionTime = intval(\OC::$server->getIniWrapper()->getNumeric('max_execution_time'));
			set_time_limit(0);

			$streamer->addDirRecursive($node->getPath(), '', function($file) use ($view) {
				// unlock file as soon as it was added
				$view->unlockFile($file, ILockingProvider::LOCK_SHARED);
			});
			$streamer->finalize();
			set_time_limit($executionTime);
			$view->unlockFile($dir, ILockingProvider::LOCK_SHARED);
		} catch (\OCP\Lock\LockedException $ex) {
			$view->unlockFile($dir, ILockingProvider::LOCK_SHARED);
			throw new Locked('File is currently busy, please try again later');
		} catch (\OCP\Files\ForbiddenException $ex) {
			$view->unlockFile($dir, ILockingProvider::LOCK_SHARED);
			throw new Forbidden();
		}
	}

	/**
	 * @param View $view
	 * @param string $dir
	 */
	private function lockFiles($view, $dir) {
		$contents = $view->getDirectoryContent($dir);
		$contents = array_map(function($fileInfo) use ($dir) {
			/** @var \OCP\Files\FileInfo $fileInfo */
			return $dir . '/' . $fileInfo->getName();
		}, $contents);
		foreach ($contents as $content) {
			$view->lockFile($content, ILockingProvider::LOCK_SHARED);
			if ($view->is_dir($content)) {
				$this->lockFiles($view, $content);
			}
		}
	}
}

