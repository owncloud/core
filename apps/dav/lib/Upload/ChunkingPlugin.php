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

namespace OCA\DAV\Upload;

use OCA\DAV\Upload\Xml\Status;
use Sabre\DAV\Exception\BadRequest;
use Sabre\DAV\INode;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;

class ChunkingPlugin extends ServerPlugin {

	/** @var Server */
	private $server;
	/** @var FutureFile */
	private $sourceNode;

	/**
	 * @inheritdoc
	 */
	public function initialize(Server $server) {
		$server->on('beforeMove', [$this, 'beforeMove']);
		$server->on('propFind', [$this, 'propFind']);
		$this->server = $server;
	}

	/**
	 * @param string $sourcePath source path
	 * @param string $destination destination path
	 * @return bool|void
	 * @throws BadRequest
	 * @throws \Sabre\DAV\Exception\NotFound
	 */
	public function beforeMove($sourcePath, $destination) {
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
		if (!$this->server->tree->nodeExists($destination)) {
			// skip and let the default handler do its work
			return;
		}

		$node = $this->server->tree->getNodeForPath(dirname($path));
		\OC::$server->getConfig()->setAppValue('dav', "uploads.{$node->getName()}.status", 0);

		// do a move manually, skipping Sabre's default "delete" for existing nodes
		$this->server->tree->move($path, $destination);

		\OC::$server->getConfig()->setAppValue('dav', "uploads.{$node->getName()}.status", 1);

		// trigger all default events (copied from CorePlugin::move)
		$this->server->emit('afterMove', [$path, $destination]);
		$this->server->emit('afterUnbind', [$path]);
		$this->server->emit('afterBind', [$destination]);

		$response = $this->server->httpResponse;
		$response->setHeader('Content-Length', '0');
		$response->setStatus(204);

		\OC::$server->getConfig()->setAppValue('dav', "uploads.{$node->getName()}.fileId", $response->getHeader('OC-FileId'));
		\OC::$server->getConfig()->setAppValue('dav', "uploads.{$node->getName()}.etag", $response->getHeader('ETag'));

		// TODO: catch exception

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
		if ($expectedSize != $actualSize) {
			throw new BadRequest("Chunks on server do not sum up to $expectedSize but to $actualSize");
		}
	}

	public function propFind(PropFind $propFind, INode $node) {
		$ns = '{http://owncloud.org/ns}';

		if ($node instanceof UploadFolder) {
			$propFind->handle($ns . 'assembly-status', function () use ($node) {
				$status = \OC::$server->getConfig()->getAppValue('dav', "uploads.{$node->getName()}.status", null);
				$fileId = \OC::$server->getConfig()->getAppValue('dav', "uploads.{$node->getName()}.fileId", null);
				$etag = \OC::$server->getConfig()->getAppValue('dav', "uploads.{$node->getName()}.etag", null);
				return new Status($status, $fileId, $etag);
			});
		}

	}
}
