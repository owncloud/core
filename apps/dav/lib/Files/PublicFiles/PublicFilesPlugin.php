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

namespace OCA\DAV\Files\PublicFiles;

use OCA\DAV\Connector\Sabre\FilesPlugin;
use Sabre\DAV\INode;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\DAV\Xml\Property\GetLastModified;

/**
 * Class PublicFilesPlugin - additional PROPFIND properties for public shared
 * files and folders are handled with this plugin
 *
 * @package OCA\DAV\Files\PublicFiles
 */
class PublicFilesPlugin extends ServerPlugin {
	const PUBLIC_LINK_ITEM_TYPE = '{http://owncloud.org/ns}public-link-item-type';
	const PUBLIC_LINK_PERMISSION = '{http://owncloud.org/ns}public-link-permission';
	const PUBLIC_LINK_EXPIRATION = '{http://owncloud.org/ns}public-link-expiration';
	const PUBLIC_LINK_SHARE_DATETIME = '{http://owncloud.org/ns}public-link-share-datetime';
	const PUBLIC_LINK_SHARE_OWNER = '{http://owncloud.org/ns}public-link-share-owner';

	/** @var Server */
	private $server;

	public function initialize(Server $server) {
		$this->server = $server;

		$this->server->on('propFind', [$this, 'propFind']);
	}

	public function propFind(PropFind $propFind, INode $node) {
		// properties about the share
		if ($node instanceof ShareNode) {
			$propFind->handle(self::PUBLIC_LINK_ITEM_TYPE, static function () use ($node) {
				return $node->getShare()->getNodeType();
			});

			$propFind->handle(self::PUBLIC_LINK_PERMISSION, static function () use ($node) {
				return $node->getShare()->getPermissions();
			});

			$propFind->handle(self::PUBLIC_LINK_EXPIRATION, static function () use ($node) {
				$expire = $node->getShare()->getExpirationDate();
				if ($expire) {
					return new GetLastModified($expire);
				}
				return null;
			});

			$propFind->handle(self::PUBLIC_LINK_SHARE_DATETIME, static function () use ($node) {
				return new GetLastModified($node->getShare()->getShareTime());
			});

			$propFind->handle(self::PUBLIC_LINK_SHARE_OWNER, static function () use ($node) {
				return $node->getShare()->getShareOwner();
			});

			$propFind->handle(FilesPlugin::PERMISSIONS_PROPERTYNAME, static function () use ($node) {
				return $node->getPermissions();
			});
		}

		// properties about the resources within the public link
		if ($node instanceof IPublicSharedNode) {
			$propFind->handle(FilesPlugin::INTERNAL_FILEID_PROPERTYNAME, static function () use ($node) {
				return $node->getNode()->getId();
			});

			$propFind->handle(FilesPlugin::PERMISSIONS_PROPERTYNAME, static function () use ($node) {
				return $node->getDavPermissions();
			});

			$propFind->handle(FilesPlugin::OWNER_ID_PROPERTYNAME, static function () use ($node) {
				$owner = $node->getNode()->getOwner();
				return $owner->getUID();
			});
			$propFind->handle(FilesPlugin::OWNER_DISPLAY_NAME_PROPERTYNAME, static function () use ($node) {
				$owner = $node->getNode()->getOwner();
				return  $owner->getDisplayName();
			});
			$propFind->handle(FilesPlugin::SIZE_PROPERTYNAME, static function () use ($node) {
				return $node->getNode()->getSize();
			});
		}
	}
}
