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

namespace OC\Files\Meta;

use OC\Files\Node\AbstractFolder;
use OCP\Constants;
use OCP\Files\FileInfo;
use OCP\Files\IRootFolder;
use OCP\Files\NotFoundException;

/**
 * Class MetaFileIdNode - this class represents the file id part of the meta endpoint
 *
 * @package OC\Files\Meta
 */
class MetaFileIdNode extends AbstractFolder {

	/** @var int */
	private $fileId;
	/** @var MetaRootNode */
	private $parentNode;
	/** @var IRootFolder */
	private $root;

	/**
	 * MetaFileIdNode constructor.
	 *
	 * @param MetaRootNode $parentNode
	 * @param int $fileId
	 */
	public function __construct(MetaRootNode $parentNode, IRootFolder $root, $fileId) {
		$this->parentNode = $parentNode;
		$this->fileId = $fileId;
		$this->root = $root;
	}

	/**
	 * @inheritdoc
	 */
	public function isEncrypted() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function isShared() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function isMounted() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getDirectoryListing() {
		return [
			new MetaVersionCollection($this->fileId, $this->root)
		];
	}

	/**
	 * @inheritdoc
	 */
	public function get($path) {
		$pieces = \explode('/', $path);
		if ($pieces[0] === 'v') {
			\array_shift($pieces);
			$node = new MetaVersionCollection($this->fileId, $this->root);
			if (empty($pieces)) {
				return $node;
			}
			return $node->get(\implode('/', $pieces));
		}
		throw new NotFoundException();
	}

	/**
	 * @inheritdoc
	 */
	public function getFreeSpace() {
		return FileInfo::SPACE_UNKNOWN;
	}

	/**
	 * @inheritdoc
	 */
	public function getPath() {
		return $this->getInternalPath();
	}

	/**
	 * @inheritdoc
	 */
	public function getInternalPath() {
		return "/meta/{$this->fileId}";
	}

	/**
	 * @inheritdoc
	 */
	public function getPermissions() {
		return Constants::PERMISSION_READ;
	}

	/**
	 * @inheritdoc
	 */
	public function isReadable() {
		return true;
	}

	/**
	 * @inheritdoc
	 */
	public function isUpdateable() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function isDeletable() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function isShareable() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getParent() {
		return $this->parentNode;
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return "{$this->fileId}";
	}
}
