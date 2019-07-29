<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
use OCP\Share\IShare;
use Sabre\DAV\Collection;
use Sabre\DAVACL\ACLTrait;
use Sabre\DAVACL\IACL;

/**
 * Class MetaFolder
 * This is a Sabre based implementation of a folder living in the /meta resource.
 *
 * @package OCA\DAV\Meta
 */
class SharedFolder extends Collection implements IACL, IPublicSharedNode {
	use ACLTrait;

	/** @var Folder */
	private $folder;
	/** @var IShare */
	private $share;

	/**
	 * MetaFolder constructor.
	 *
	 * @param Folder $folder
	 */
	public function __construct(Folder $folder, IShare $share) {
		$this->folder = $folder;
		$this->share = $share;
	}

	/**
	 * @inheritdoc
	 */
	public function getChildren() {
		$nodes = $this->folder->getDirectoryListing();
		return \array_map(function ($node) {
			return $this->nodeFactory($node);
		}, $nodes);
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return $this->folder->getName();
	}

	public function getLastModified() {
		return $this->folder->getMTime();
	}

	public function createDirectory($name) {
		$this->folder->newFolder($name);
	}

	public function createFile($name, $data = null) {
		$file = $this->folder->newFile($name);
		$file->putContent($data);
	}

	private function nodeFactory(Node $node) {
		if ($node instanceof Folder) {
			return new SharedFolder($node, $this->share);
		}
		if ($node instanceof File) {
			return new SharedFile($node, $this->share);
		}
		throw new \InvalidArgumentException();
	}

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

		// TODO: add more acl to convert the logic
		if ($this->share->getPermissions() & Constants::PERMISSION_DELETE === Constants::PERMISSION_DELETE) {
			$acl[]= [
				[
					'privilege' => '{DAV:}unbind',
					'principal' => 'principals/system/public',
					'protected' => true,
				]
			];
		}

		return $acl;
	}

	public function getShare() {
		return $this->share;
	}

	/**
	 * @return Node
	 */
	public function getNode() {
		return $this->folder;
	}

	/**
	 * @return string
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
