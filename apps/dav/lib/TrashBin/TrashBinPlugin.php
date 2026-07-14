<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\TrashBin;

use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\INode;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\DAV\Xml\Property\GetLastModified;

class TrashBinPlugin extends ServerPlugin {
	public const TRASHBIN_ORIGINAL_FILENAME = '{http://owncloud.org/ns}trashbin-original-filename';
	public const TRASHBIN_ORIGINAL_LOCATION = '{http://owncloud.org/ns}trashbin-original-location';
	public const TRASHBIN_DELETE_TIMESTAMP = '{http://owncloud.org/ns}trashbin-delete-timestamp';
	public const TRASHBIN_DELETE_DATETIME = '{http://owncloud.org/ns}trashbin-delete-datetime';

	/** @var Server */
	private $server;

	public function initialize(Server $server) {
		$this->server = $server;

		$this->server->on('propFind', [$this, 'propFind']);
		$this->server->on('beforeMove', [$this, 'beforeMove']);
	}

	/**
	 * Refuse a trashbin restore MOVE when the destination already exists.
	 *
	 * A restore is a WebDAV MOVE whose source node lives in the trash-bin tree.
	 * Sabre's CorePlugin::httpMove() deletes an already existing destination
	 * before it performs the move (the Overwrite header defaults to "T"), so a
	 * guard further down the restore chain would run too late and the existing
	 * file would already be gone. This handler runs on the beforeMove event,
	 * i.e. before that pre-delete, and refuses the restore with "403 Forbidden"
	 * when the destination is occupied - leaving the existing file untouched
	 * instead of silently overwriting it. See issue #35974.
	 *
	 * @param string $sourcePath source path of the MOVE
	 * @param string $destinationPath destination path of the MOVE
	 * @return bool true to continue with the default handling
	 * @throws Forbidden when the restore would overwrite an existing target
	 * @throws \Sabre\DAV\Exception\NotFound
	 */
	public function beforeMove($sourcePath, $destinationPath) {
		$sourceNode = $this->server->tree->getNodeForPath($sourcePath);
		if (!($sourceNode instanceof ITrashBinNode)) {
			// not a restore - let the default MOVE handling proceed
			return true;
		}

		if ($this->server->tree->nodeExists($destinationPath)) {
			throw new Forbidden(
				'Could not restore, target "' . $destinationPath . '" already exists'
			);
		}

		return true;
	}

	public function propFind(PropFind $propFind, INode $node) {
		if (!($node instanceof ITrashBinNode)) {
			return;
		}

		$propFind->handle(self::TRASHBIN_ORIGINAL_FILENAME, static function () use ($node) {
			return $node->getOriginalFileName();
		});

		$propFind->handle(self::TRASHBIN_ORIGINAL_LOCATION, static function () use ($node) {
			return $node->getOriginalLocation();
		});

		$propFind->handle(self::TRASHBIN_DELETE_TIMESTAMP, static function () use ($node) {
			return $node->getDeleteTimestamp();
		});

		$propFind->handle(self::TRASHBIN_DELETE_DATETIME, static function () use ($node) {
			return new GetLastModified($node->getDeleteTimestamp());
		});
	}
}
