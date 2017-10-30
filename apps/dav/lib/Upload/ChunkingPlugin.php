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


namespace OCA\DAV\Upload;


use OCA\DAV\Connector\Sabre\File;
use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use OCP\Files\NotFoundException;

class ChunkingPlugin extends ServerPlugin {

	/** @var Server */
	private $server;
	/** @var FutureFile */
	private $sourceNode;
	/** @var \OC\Files\Node\Folder */
	private $zsyncFolder;
	/** @var string */
	private $userId;

	public function __construct($userRootFolder, $userId) {
		$this->userId = $userId;
		try {
			$this->zsyncFolder = $userRootFolder->get('files_zsync');
		} catch (NotFoundException $e) {
			$this->zsyncFolder = $userRootFolder->newFolder('files_zsync');
		}
	}

	/**
	 * @inheritdoc
	 */
	function initialize(Server $server) {
		$server->on('beforeMove', [$this, 'beforeMove']);
		$this->server = $server;
	}

	/**
	 * @param string $sourcePath source path
	 * @param string $destination destination path
	 */
	function beforeMove($sourcePath, $destination) {
		$this->sourceNode = $this->server->tree->getNodeForPath($sourcePath);
		if (!$this->sourceNode instanceof FutureFile) {
			// skip handling as the source is not a chunked FutureFile
			return;
		}

		$this->verifySize();
		return $this->performMove($sourcePath, $destination);
	}

	/**
	 * Move handler for future file.
	 *
	 * This overrides the default move behavior to prevent Sabre
	 * to delete the target file before moving. Because deleting would
	 * lose the file id and metadata.
	 *
	 * @param string $path source path
	 * @param string $destination destination path
	 * @return bool|void false to stop handling, void to skip this handler
	 */
	public function performMove($path, $destination) {
		$response = $this->server->httpResponse;
		$response->setHeader('Content-Length', '0');

		// set backingFile which is needed by AssemblyStreamZsync
		if ($this->server->tree->nodeExists($destination)) {
			$response->setStatus(204);
			$backingFile = $this->server->tree->getNodeForPath($destination);
			$this->sourceNode->setBackingFile($backingFile);
			$fileLength = $this->server->httpRequest->getHeader('OC-Total-File-Length');
			$this->sourceNode->setFileLength($fileLength);
		} else {
			$response->setStatus(201);
		}

		// get .zsync contents before deletion
		$zsyncData = '';
		$zsyncPath = preg_replace('/\.file$/', '.zsync', $path);
		if ($this->server->tree->nodeExists($zsyncPath)) {
			$zsyncNode = $this->server->tree->getNodeForPath($zsyncPath);
			$zsyncHandle = $zsyncNode->get();
			while (!feof($zsyncHandle)) {
				$zsyncData .= fread($zsyncHandle, $zsyncNode->getSize());
			}
			fclose($zsyncHandle);
		}

		// do a move manually, skipping Sabre's default "delete" for existing nodes
		$this->server->tree->move($path, $destination);

		// create/update .zsync file
		if ($zsyncData) {
			$prefix = 'files/' . $this->userId . '/';
			$zsyncPath = substr($destination, strlen($prefix)) . ".zsync";
			$zsyncDir = dirname($zsyncPath);
			$zsyncBase = basename($zsyncPath);

			try {
				$this->zsyncFolder = $this->zsyncFolder->get($zsyncDir);
			} catch (NotFoundException $e) {
				$this->zsyncFolder = $this->zsyncFolder->newFolder($zsyncDir);
			}

			$zsyncFile = $this->zsyncFolder->newFile($zsyncBase);
			$zsyncFile->putContent($zsyncData);
		}

		// trigger all default events (copied from CorePlugin::move)
		$this->server->emit('afterMove', [$path, $destination]);
		$this->server->emit('afterUnbind', [$path]);
		$this->server->emit('afterBind', [$destination]);

		return false;
	}

	/**
	 * @throws BadRequest
	 */
	private function verifySize() {
		$expectedSize = $this->server->httpRequest->getHeader('OC-Total-Length');
		if ($expectedSize === null) {
			return;
		}
		$actualSize = $this->sourceNode->getSize();
		if ((int)$expectedSize !== $actualSize) {
			throw new BadRequest("Chunks on server do not sum up to $expectedSize but to $actualSize");
		}
	}
}
