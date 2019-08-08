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

use OCP\Constants;
use OCP\Files\FileInfo;
use OCP\Files\InvalidPathException;
use OCP\Files\Node;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use OCP\Share\IShare;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\INode;

/**
 * Class PublicSharedRootNode - root node of a public share
 *
 * @package OCA\DAV\Files\PublicFiles
 */
class PublicSharedRootNode extends Collection {
	use NodeFactoryTrait;

	/** @var IShare */
	private $share;

	/**
	 * PublicSharedRootNode constructor.
	 *
	 * @param IShare $share
	 */
	public function __construct(IShare $share) {
		$this->share = $share;
	}
	/**
	 * Returns an array with all the child nodes
	 *
	 * @return INode[]
	 */
	public function getChildren() {
		if ($this->share->getNodeType() === 'folder') {
			$nodes = $this->share->getNode()->getDirectoryListing();
		} else {
			$nodes = [$this->share->getNode()];
		}
		return \array_map(function (Node $node) {
			return $this->nodeFactory($node, $this->share);
		}, $nodes);
	}

	public function createDirectory($name) {
		if (!$this->checkPermissions(Constants::PERMISSION_CREATE)) {
			throw new Forbidden('Permission denied to create directory');
		}
		if ($this->share->getNodeType() !== 'folder') {
			throw new Forbidden('Creating a folder in a file is not allowed');
		}
		try {
			$this->share->getNode()->newFolder($name);
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create directory');
		}
	}

	/**
	 * @param string $name
	 * @param resource|string|null $data
	 * @return string|null - the quoted etag - see base class
	 * @throws Forbidden
	 * @throws NotFoundException
	 */
	public function createFile($name, $data = null) {
		if (!$this->checkPermissions(Constants::PERMISSION_CREATE)) {
			throw new Forbidden('Permission denied to create file');
		}
		if ($this->share->getNodeType() !== 'folder') {
			throw new Forbidden('Permission denied to create file');
		}
		try {
			$file = $this->share->getNode()->newFile($name);
			$file->putContent(data);
			return $file->getEtag();
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create file');
		} catch (InvalidPathException $ex) {
			throw new Forbidden('Permission denied to create file');
		} catch (NotFoundException $ex) {
			throw new Forbidden('Permission denied to create file');
		}
	}

	public function delete() {
		if (!$this->checkPermissions(Constants::PERMISSION_DELETE)) {
			throw new Forbidden('Permission denied to delete a resource');
		}
		try {
			$this->share->getNode()->delete();
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create directory');
		}
	}

	/**
	 * Returns the name of the node.
	 *
	 * This is used to generate the url.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->share->getToken();
	}

	public function getShare() {
		return $this->share;
	}

	public function getPermissions() {
		$p = '';
		if ($this->checkPermissions(Constants::PERMISSION_DELETE)) {
			$p .= 'D';
		}
		if ($this->checkPermissions(Constants::PERMISSION_UPDATE)) {
			$p .= 'NV'; // Renameable, Moveable
		}
		if ($this->checkPermissions(Constants::PERMISSION_CREATE)) {
			$p .= 'CK';
		}
		return $p;
	}

	protected function checkPermissions($permissions) {
		return ($this->share->getPermissions() & $permissions) === $permissions;
	}
}
