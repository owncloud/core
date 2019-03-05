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

use Sabre\DAV\INode;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;

class TrashBinPlugin extends ServerPlugin {
	public const TRASHBIN_ORIGINAL_FILENAME = '{http://owncloud.org/ns}trashbin-original-filename';
	public const TRASHBIN_ORIGINAL_LOCATION = '{http://owncloud.org/ns}trashbin-original-location';
	public const TRASHBIN_DELETE_TIMESTAMP = '{http://owncloud.org/ns}trashbin-delete-timestamp';

	/** @var Server */
	private $server;

	public function initialize(Server $server) {
		$this->server = $server;

		$this->server->on('propFind', [$this, 'propFind']);
	}

	public function propFind(PropFind $propFind, INode $node) {
		if (!($node instanceof ITrashBinNode)) {
			return;
		}

		$propFind->handle(self::TRASHBIN_ORIGINAL_FILENAME, function () use ($node) {
			return $node->getOriginalFileName();
		});

		$propFind->handle(self::TRASHBIN_ORIGINAL_LOCATION, function () use ($node) {
			return $node->getOriginalLocation();
		});

		$propFind->handle(self::TRASHBIN_DELETE_TIMESTAMP, function () use ($node) {
			return $node->getDeleteTimestamp();
		});
	}
}
