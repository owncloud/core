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
use OCP\Files\File;
use OCP\Files\Folder;
use OCP\Files\Node;
use OCP\Files\NotPermittedException;
use OCP\Share\IShare;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAVACL\ACLTrait;
use Sabre\DAVACL\IACL;

/**
 * Trait SharedNodeTrait - common method implementations of SharedFile and SharedFolder
 *
 * @package OCA\DAV\Files\PublicFiles
 */
trait SharedNodeTrait {

	/**@var Node */
	private $node;
	/** @var IShare */
	private $share;

	public function getName() {
		return $this->node->getName();
	}

	public function getLastModified() {
		return $this->node->getMTime();
	}

	public function getETag() {
		return '"' . $this->node->getEtag() . '"';
	}

	public function delete() {
		try {
			$this->node->delete();
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to delete node');
		}
	}

	public function setName($name) {
		try {
			$newPath = $this->node->getParent()->getPath() . '/' . $name;
			$this->node->move($newPath);
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to rename node');
		}
	}

	/**
	 * Returns the owner principal.
	 *
	 * This must be a url to a principal, or null if there's no owner
	 *
	 * @return string|null
	 */
	public function getOwner() {
		return null;
	}

	/**
	 * Returns a group principal.
	 *
	 * This must be a url to a principal, or null if there's no owner
	 *
	 * @return string|null
	 */
	public function getGroup() {
		return null;
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

		if (($this->node instanceof File) && $this->checkSharePermissions(Constants::PERMISSION_UPDATE)) {
			$acl[] =
				[
					'privilege' => '{DAV:}write-content',
					'principal' => 'principals/system/public',
					'protected' => true,
				];
		}
		if ($this->node instanceof Folder) {
			if ($this->checkSharePermissions(Constants::PERMISSION_DELETE)) {
				$acl[] =
					[
						'privilege' => '{DAV:}unbind',
						'principal' => 'principals/system/public',
						'protected' => true,
					];
			}
			if ($this->checkSharePermissions(Constants::PERMISSION_CREATE)) {
				$acl[] =
					[
						'privilege' => '{DAV:}bind',
						'principal' => 'principals/system/public',
						'protected' => true,
					];
			}
		}

		return $acl;
	}

	/**
	 * Updates the ACL.
	 *
	 * This method will receive a list of new ACE's as an array argument.
	 *
	 * @param array $acl
	 */
	public function setACL(array $acl) {
		throw new \Sabre\DAV\Exception\Forbidden('Setting ACL is not supported on this node');
	}

	/**
	 * Returns the list of supported privileges for this node.
	 *
	 * The returned data structure is a list of nested privileges.
	 * See Sabre\DAVACL\Plugin::getDefaultSupportedPrivilegeSet for a simple
	 * standard structure.
	 *
	 * If null is returned from this method, the default privilege set is used,
	 * which is fine for most common usecases.
	 *
	 * @return array|null
	 */
	public function getSupportedPrivilegeSet() {
		return null;
	}
	public function getShare() {
		return $this->share;
	}

	/**
	 * @return Node
	 */
	public function getNode() {
		return $this->node;
	}

	/**
	 * @return string
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\NotFoundException
	 */
	public function getDavPermissions() {
		$node = $this->getNode();
		$p = '';
		if ($node->isDeletable() && $this->checkSharePermissions(Constants::PERMISSION_DELETE)) {
			$p .= 'D';
		}
		if ($node->isUpdateable() && $this->checkSharePermissions(Constants::PERMISSION_UPDATE)) {
			$p .= 'NV'; // Renameable, Moveable
		}
		if ($node->getType() === \OCP\Files\FileInfo::TYPE_FILE) {
			if ($node->isUpdateable() && $this->checkSharePermissions(Constants::PERMISSION_UPDATE)) {
				$p .= 'W';
			}
		} else {
			if ($node->isCreatable() && $this->checkSharePermissions(Constants::PERMISSION_CREATE)) {
				$p .= 'CK';
			}
		}
		return $p;
	}

	protected function checkSharePermissions($permissions) {
		return ($this->share->getPermissions() & $permissions) === $permissions;
	}
}
