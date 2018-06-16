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
namespace OCA\DAV\Upload;

use OCA\DAV\Connector\Sabre\File;
use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\DAV\Exception\NotFound;
use OC\Files\View;

class ChunkingPluginZsync extends ServerPlugin {

	/** @var Server */
	private $server;
	/** @var FutureFileZsync */
	private $sourceNode;
	/** @var View */
	private $view;

	public function __construct(View $view) {
		$this->view = $view;
		$this->view->mkdir('files_zsync');
	}

	/**
	 * @inheritdoc
	 */
	public function initialize(Server $server) {
		$server->on('beforeMove', [$this, 'beforeMove']);
		$this->server = $server;
	}

	/**
	 * @param string $sourcePath source path
	 * @param string $destination destination path
	 */
	public function beforeMove($sourcePath, $destination) {
		$this->sourceNode = $this->server->tree->getNodeForPath($sourcePath);
		if (!$this->sourceNode instanceof FutureFileZsync) {
			// skip handling as the source is not a chunked FutureFileZsync
			return;
		}

		$this->verifySize();
		return $this->performMove($sourcePath, $destination);
	}

	/**
	 * Handles the temporary copy of the zsync metadata file
	 *
	 * Will not execute on external storage.
	 *
	 * @param string $path metadata path
	 * @param string $destination destination path
	 */
	private function preMoveZsync($path, $destination) {
		try {
			$node = $this->server->tree->getNodeForPath($destination);
		} catch (NotFound $e) {
			$node = $this->server->tree->getNodeForPath(\dirname($destination));
		}

		// Disable if external storage used.
		if (\strpos($node->getDavPermissions(), 'M') === false) {
			$zsyncMetadataNode = $this->server->tree->getNodeForPath($path);
			$zsyncMetadataHandle = $zsyncMetadataNode->get();

			// get .zsync contents before its deletion
			$zsyncMetadata = '';
			while (!\feof($zsyncMetadataHandle)) {
				$zsyncMetadata .= \fread($zsyncMetadataHandle, $zsyncMetadataNode->getSize());
			}
			\fclose($zsyncMetadataHandle);

			if ($this->server->tree->nodeExists($destination)) {
				// set backingFile which is needed by AssemblyStreamZsync
				$backingFile = $this->server->tree->getNodeForPath($destination);
				$this->sourceNode->setBackingFile($backingFile);
			}

			$fileLength = $this->server->httpRequest->getHeader('OC-Total-File-Length');
			$this->sourceNode->setFileLength($fileLength);

			return $zsyncMetadata;
		}
	}

	/**
	 * Handles the creation of the zsync metadata file
	 *
	 * @param string &$zsyncMetadata actual metadata
	 * @param string $destination destination path
	 */
	private function postMoveZsync(&$zsyncMetadata, $destination) {
		if (!$zsyncMetadata) {
			return;
		}
		$destination = \implode('/', \array_slice(\explode('/', $destination), 2));
		$info = $this->view->getFileInfo('files/'.$destination);
		$zsyncMetadataFile = 'files_zsync/'.$info->getId();
		$this->view->file_put_contents($zsyncMetadataFile, $zsyncMetadata);
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
		$this->server->tree->nodeExists($destination) ? $response->setStatus(204) : $response->setStatus(201);

		// copy the zsync metadata file contents, before it gets removed.
		$zsyncMetadataPath = \dirname($path).'/.zsync';
		$zsyncMetadata = $this->preMoveZsync($zsyncMetadataPath, $destination);

		// do a move manually, skipping Sabre's default "delete" for existing nodes
		$this->server->tree->move($path, $destination);

		// create the zsync metadata file
		$this->postMoveZsync($zsyncMetadata, $destination);

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
