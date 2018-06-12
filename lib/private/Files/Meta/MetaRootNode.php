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
 * Class MetaRootNode - this class represents the root node of the meta endpoint
 *
 * @package OC\Files\Meta
 */
class MetaRootNode extends AbstractFolder {

	/** @var IRootFolder */
	private $rootFolder;

	public function __construct(IRootFolder $rootFolder) {
		$this->rootFolder = $rootFolder;
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
		// TODO: in debug mode we might want to return the list of all fileids
		return [];
	}

	/**
	 * @inheritdoc
	 */
	public function get($path) {
		$pieces = \explode('/', $path);
		$fileId = (int)$pieces[0];

		// check if file exists
		if (empty($this->rootFolder->getById($fileId))) {
			throw new NotFoundException();
		}

		\array_shift($pieces);
		$node = new MetaFileIdNode($this, $this->rootFolder, $fileId);
		if (empty($pieces)) {
			return $node;
		}
		return $node->get(\implode('/', $pieces));
	}

	/**
	 * @inheritdoc
	 */
	public function getById($id) {
		return [
			$this->get("$id")
			];
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
	public function isCreatable() {
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function getPath() {
		return '/meta';
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
		// TODO: false if not debug
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
	public function getName() {
		return 'meta';
	}
}
