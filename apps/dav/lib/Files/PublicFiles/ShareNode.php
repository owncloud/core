<?php
/**
 * Created by PhpStorm.
 * User: deepdiver
 * Date: 26.10.17
 * Time: 14:40
 */

namespace OCA\DAV\Files\PublicFiles;

use OCP\Constants;
use OCP\Files\FileInfo;
use OCP\Files\Node;
use OCP\Files\NotPermittedException;
use OCP\Share\IShare;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\MethodNotAllowed;
use Sabre\DAV\INode;

class ShareNode extends Collection {

	/** @var IShare */
	private $share;

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
			if ($node->getType() === FileInfo::TYPE_FOLDER) {
				return new SharedFolder($node, $this->share);
			}
			return new SharedFile($node, $this->share);
		}, $nodes);
	}

	public function createDirectory($name) {
		if (!$this->checkPermissions(Constants::PERMISSION_CREATE)) {
			throw new Forbidden('Permission denied to create directory');
		}
		if ($this->share->getNodeType() !== 'folder') {
			throw new Forbidden('Permission denied to create directory');
		}
		try {
			$this->share->getNode()->newFolder($name);
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create directory');
		}
	}

	public function createFile($name, $data = null) {
		if (!$this->checkPermissions(Constants::PERMISSION_CREATE)) {
			throw new Forbidden('Permission denied to create directory');
		}
		if ($this->share->getNodeType() !== 'folder') {
			throw new Forbidden('Permission denied to create directory');
		}
		try {
			$file = $this->share->getNode()->newFile($name);
			$file->putContent(data);
			return $file->getEtag();
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create directory');
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
