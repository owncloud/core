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

use OCA\DAV\Files\IFileNode;
use OCP\Constants;
use OCP\Files\Node;
use OCP\Files\NotPermittedException;
use OCP\Share\IShare;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\File;
use Sabre\DAVACL\ACLTrait;
use Sabre\DAVACL\IACL;

/**
 * Class MetaFile
 * This is a Sabre based implementation of a file living in the /meta resource.
 *
 * @package OCA\DAV\Meta
 */
class SharedFile extends File implements IACL, IFileNode, IPublicSharedNode {
	use ACLTrait;

	/** @var \OCP\Files\File */
	private $file;
	/**
	 * @var IShare
	 */
	private $share;

	/**
	 * MetaFolder constructor.
	 *
	 * @param \OCP\Files\File $file
	 * @param IShare $share
	 */
	public function __construct(\OCP\Files\File $file, IShare $share) {
		$this->file = $file;
		$this->share = $share;
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return $this->file->getName();
	}

	public function get() {
		return $this->file->fopen('r');
	}

	public function getSize() {
		return $this->file->getSize();
	}

	public function getContentType() {
		return $this->file->getMimeType();
	}

	public function getETag() {
		return $this->file->getETag();
	}

	public function getLastModified() {
		return $this->file->getMTime();
	}

	public function delete() {
		try {
			$this->file->delete();
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create directory');
		}
	}

	public function put($data) {
		try {
			$this->file->putContent($data);
			return $this->file->getEtag();
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create directory');
		}
	}

	public function getOwner() {
		return '';
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
		if ($this->checkSharePermissions(Constants::PERMISSION_UPDATE)) {
			$acl[] =
				[
					'privilege' => '{DAV:}write-content',
					'principal' => 'principals/system/public',
					'protected' => true,
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
		return $this->file;
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
