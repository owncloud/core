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
use OCP\Files\InvalidPathException;
use OCP\Files\Node;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use OCP\IRequest;
use OCP\Share\IShare;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\INode;
use Sabre\DAVACL\ACLTrait;
use Sabre\DAVACL\IACL;

/**
 * Class PublicSharedRootNode - root node of a public share
 *
 * @package OCA\DAV\Files\PublicFiles
 */
class PublicSharedRootNode extends Collection implements IACL {
	use NodeFactoryTrait, ACLTrait;

	/** @var IShare */
	private $share;
	/**
	 * @var IRequest
	 */
	private $request;

	/**
	 * PublicSharedRootNode constructor.
	 *
	 * @param IShare $share
	 * @param IRequest $request
	 */
	public function __construct(IShare $share, IRequest $request) {
		$this->share = $share;
		$this->request = $request;
	}

	/**
	 * Returns an array with all the child nodes
	 *
	 * @return INode[]
	 * @throws NotFound
	 */
	public function getChildren() {
		// Within a PROPFIND request we return no listing in case the share is a file drop folder
		if ($this->isFileDropFolder()
			&& ($this->isPropfind() || $this->isGet())
		) {
			return [];
		}

		try {
			if ($this->share->getNodeType() === 'folder') {
				$nodes = $this->share->getNode()->getDirectoryListing();
			} else {
				$nodes = [$this->share->getNode()];
			}
			return \array_map(function (Node $node) {
				return $this->nodeFactory($node, $this->share);
			}, $nodes);
		} catch (NotFoundException $ex) {
			throw new NotFound();
		}
	}

	public function createDirectory($name) {
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
		if ($this->share->getNodeType() !== 'folder') {
			throw new Forbidden('Permission denied to create file');
		}
		$pendingFile = null;
		try {
			$pendingFile = $this->share->getNode()->newFile($name);
			$pendingFile->putContent($data);
			$etag =  $pendingFile->getEtag();
			// all operations have been successful - no need to cleanup the pending file in finally block
			$pendingFile = null;
			return '"' . $etag . '"';
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create file');
		} catch (InvalidPathException $ex) {
			throw new Forbidden('Permission denied to create file');
		} catch (NotFoundException $ex) {
			throw new Forbidden('Permission denied to create file');
		} finally {
			// in case of an exception we need to delete the pending file
			if ($pendingFile) {
				$pendingFile->delete();
			}
		}
	}

	public function delete() {
		// the root folder can never be deleted
		throw new Forbidden('Permission denied to delete a resource');
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

	/**
	 * Returns a list of ACE's for this node.
	 *
	 * Each ACE has the following properties:
	 *   * 'privilege', a string such as {DAV:}read or {DAV:}write. These are
	 *     currently the only supported privileges
	 *   * 'principal', a url to the principal who owns the node
	 *   * 'protected' (optional), indicating that this ACE is not allowed to
	 *      be updated.
	 *
	 * @return array
	 */
	public function getACL() {
		$acl = [
			[
				'privilege' => '{DAV:}all',
				'principal' => '{DAV:}owner',
				'protected' => true,
			],
			[
				'privilege' => '{DAV:}read',
				'principal' => 'principals/system/public',
				'protected' => true,
			]
		];

		if ($this->checkPermissions(Constants::PERMISSION_UPDATE)) {
			$acl[] =
				[
					'privilege' => '{DAV:}write-content',
					'principal' => 'principals/system/public',
					'protected' => true,
				];
		}
		if ($this->checkPermissions(Constants::PERMISSION_DELETE)) {
			$acl[] =
				[
					'privilege' => '{DAV:}unbind',
					'principal' => 'principals/system/public',
					'protected' => true,
				];
		}
		if ($this->checkPermissions(Constants::PERMISSION_CREATE)) {
			$acl[] =
				[
					'privilege' => '{DAV:}bind',
					'principal' => 'principals/system/public',
					'protected' => true,
				];
		}

		return $acl;
	}

	protected function checkPermissions($permissions) {
		return ($this->share->getPermissions() & $permissions) === $permissions;
	}

	private function isPropfind() {
		return $this->request->getMethod() === 'PROPFIND';
	}

	/**
	 * @return bool
	 */
	private function isGet() {
		return $this->request->getMethod() === 'GET';
	}

	/**
	 * An anonymous upload folder aka file drop folder has only the create permission
	 * @return bool
	 */
	public function isFileDropFolder(): bool {
		return $this->share->getPermissions() === Constants::PERMISSION_CREATE;
	}
}
