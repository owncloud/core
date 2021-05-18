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

use OC;
use OC\Files\Node\Folder;
use OCA\DAV\Connector\Sabre\FilesPlugin;
use OCP\Files\FileInfo;
use OCP\Files\NotFoundException;
use Sabre\DAV\Exception\InsufficientStorage;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\INode;
use Sabre\DAV\PropFind;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\DAV\Xml\Property\GetLastModified;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

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
		$this->server->on('beforeMethod:PUT', [$this, 'beforePut'], 1);
		$this->server->on('beforeWriteContent', [$this, 'handleBeforeWriteContent'], 10);
		$this->server->on('beforeCreateFile', [$this, 'handleBeforeCreateFile'], 10);
	}

	public function beforePut(RequestInterface $request, ResponseInterface $response) {
		$path = $request->getPath();
		if (!$this->server->tree->nodeExists($path)) {
			return;
		}
		list($parentPath, ) = \Sabre\Uri\split($path);
		$parent = $this->server->tree->getNodeForPath($parentPath);

		// only in share roots of file drop folders auto renaming will be applied
		if (!$parent instanceof PublicSharedRootNode) {
			return;
		}
		if (!$parent->isFileDropFolder()) {
			return;
		}

		// node already exists at target path - the path will be rewritten
		$newPath = $this->newFileName($path);
		$request->setUrl($request->getBaseUrl() . $newPath);
	}

	private function newFileName($path) {
		$pathInfo = \pathinfo($path);
		$dirName = $pathInfo['dirname'];
		$fileName = $pathInfo['filename'];
		$ext = $pathInfo['extension'];

		$i = 2;
		while ($this->server->tree->nodeExists("$dirName/$fileName ($i).$ext")) {
			$i++;
		}
		return "$dirName/$fileName ($i).$ext";
	}

	public function propFind(PropFind $propFind, INode $node) {
		// properties about the share
		if ($node instanceof PublicSharedRootNode) {
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
			if ($node->getNode()->getType() === FileInfo::TYPE_FILE) {
				$server = $this->server;
				$propFind->handle(FilesPlugin::DOWNLOADURL_PROPERTYNAME, static function () use ($node, $server) {
					$share = $node->getShare();
					$shareNode = $share->getNode();
					// We want to get the relative path of the shared file.
					// If the shared resource is a folder e.g.
					// - <shared folder>/
					//   - subfolder/
					//     - meme.jpg
					//   - somefile.txt
					// And we want the path of 'meme.jpg' we expect the resource
					// path to be '/subfolder/meme.jpg'.
					// If the shared resource is a file we can just take the
					// name of that file prefixed with a slash like '/cool.gif'
					if ($shareNode->getType() === FileInfo::TYPE_FOLDER) {
						$shareRoot = $shareNode->getPath();
						$sharedResourcePath = \substr($node->getNode()->getPath(), \strlen($shareRoot));
					} else {
						$sharedResourcePath = '/' . $shareNode->getName();
					}
					$path = \OC::$server->getURLGenerator()->getAbsoluteURL('/remote.php/dav/' . $server->getRequestUri());
					// Let's assume we have this share
					// - <shared folder>/
					//   - subfolder/
					//     - meme.jpg
					//   - somefile.txt
					// If the PROPFIND request is done against
					// 'remote.php/dav/public-files/{token}/subfolder/meme.jpg'
					// then we don't need to append the file name for response as
					// it is already in the path.
					// Otherwise if the PROPFIND is done against
					// 'remote.php/dav/public-files/{token}/subfolder/'
					// then we need to append the file name to the path.
					if (\substr($path, -\strlen($sharedResourcePath)) !== $sharedResourcePath) {
						$path .= '/' . $node->getNode()->getName();
					}

					if ($share->getPassword() === null) {
						return $path;
					}

					$validUntil = new \DateTime();
					$validUntil->add(new \DateInterval("PT30M")); // valid for 30 minutes
					$key = \hash_hkdf('sha256', $share->getPassword());

					$s = new PublicShareSigner($share->getToken(), $sharedResourcePath, $validUntil, $key);
					return $path . '?signature=' . $s->getSignature() . '&expires=' . \urlencode($validUntil->format(\DateTime::ATOM));
				});
			}
		}
	}

	/**
	 * Check quota before writing content
	 *
	 * @param string $uri target file URI
	 * @param INode $node Sabre Node
	 * @param resource $data data
	 * @param bool $modified modified
	 * @return bool|void
	 * @throws InsufficientStorage
	 * @throws NotFoundException
	 */
	public function handleBeforeWriteContent($uri, $node, $data, $modified) {
		if (!$node instanceof SharedFile) {
			return;
		}
		$node = $node->getShare()->getNode();
		if (!$node instanceof Folder) {
			return;
		}
		return $this->checkQuota($node);
	}

	/**
	 * Check quota before creating file
	 *
	 * @param string $uri target file URI
	 * @param resource $data data
	 * @param INode $parent Sabre Node
	 * @param bool $modified modified
	 * @return bool
	 * @throws InsufficientStorage
	 * @throws NotFound
	 */
	public function handleBeforeCreateFile($uri, $data, $parent, $modified) {
		$share = null;
		if ($parent instanceof SharedFolder) {
			$share = $parent->getShare();
		}
		if ($parent instanceof PublicSharedRootNode) {
			$share = $parent->getShare();
		}
		if ($share === null) {
			return;
		}
		try {
			$node = $share->getNode();
		} catch (NotFoundException $e) {
			throw new NotFound();
		}
		if (!$node instanceof Folder) {
			return;
		}
		return $this->checkQuota($node);
	}

	/**
	 * This method is called before any HTTP method and validates there is enough free space to store the file
	 *
	 * @param Folder $folder
	 * @param int $length size to check whether it fits
	 * @return bool
	 * @throws InsufficientStorage
	 */
	public function checkQuota(Folder $folder, $length = null) {
		if ($length === null) {
			$length = $this->getLength();
		}
		if ($length) {
			$freeSpace = $folder->getFreeSpace();
			if ($freeSpace !== FileInfo::SPACE_UNKNOWN && $freeSpace !== FileInfo::SPACE_UNLIMITED && $length > $freeSpace) {
				throw new InsufficientStorage();
			}
		}
		return true;
	}

	public function getLength() {
		$req = $this->server->httpRequest;
		$length = $req->getHeader('X-Expected-Entity-Length');
		if (!\is_numeric($length)) {
			$length = $req->getHeader('Content-Length');
			$length = \is_numeric($length) ? $length : null;
		}

		$ocLength = $req->getHeader('OC-Total-Length');
		if (\is_numeric($length) && \is_numeric($ocLength)) {
			return \max($length, $ocLength);
		}

		return $length;
	}
}
