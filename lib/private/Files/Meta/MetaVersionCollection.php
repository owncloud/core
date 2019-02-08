<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
use OCP\Files\IRootFolder;
use OCP\Files\Storage\IVersionedStorage;
use OCP\Files\NotFoundException;
use OCP\Files\Storage;

/**
 * Class MetaVersionCollection - this class represents the versions sub folder
 * of a file
 *
 * @package OC\Files\Meta
 */
class MetaVersionCollection extends AbstractFolder {

	/** @var IRootFolder */
	private $root;
	/** @var \OCP\Files\Node */
	private $node;

	/**
	 * MetaVersionCollection constructor.
	 *
	 * @param IRootFolder $root
	 * @param \OCP\Files\Node $node
	 */
	public function __construct(IRootFolder $root, \OCP\Files\Node $node) {
		$this->root = $root;
		$this->node = $node;
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

	public function getDirectoryListing() {
		$node = $this->node;
		$storage = $node->getStorage();
		$internalPath = $node->getInternalPath();

		if (!$storage->instanceOfStorage(IVersionedStorage::class)) {
			return [];
		}
		/** @var IVersionedStorage | Storage $storage */
		$versions = $storage->getVersions($internalPath);
		return \array_values(\array_map(function ($version) use ($storage, $node, $internalPath) {
			if (!isset($version['mimetype'])) {
				$version['mimetype'] = $node->getMimetype();
			}

			return new MetaFileVersionNode($this, $this->root, $version, $storage, $internalPath);
		}, $versions));
	}

	/**
	 * @inheritdoc
	 */
	public function get($path) {
		$pieces = \explode('/', $path);
		if (\count($pieces) !== 1) {
			throw new NotFoundException();
		}
		$versionId = $pieces[0];

		$storage = $this->node->getStorage();
		$internalPath = $this->node->getInternalPath();

		if (!$storage->instanceOfStorage(IVersionedStorage::class)) {
			throw new NotFoundException();
		}
		/** @var IVersionedStorage | Storage $storage */
		$version = $storage->getVersion($internalPath, $versionId);
		if ($version === null) {
			throw new NotFoundException();
		}
		if (!isset($version['mimetype'])) {
			$version['mimetype'] = $this->node->getMimetype();
		}
		return new MetaFileVersionNode($this, $this->root, $version, $storage, $internalPath);
	}

	/**
	 * @inheritdoc
	 */
	public function getId() {
		return $this->node->getId();
	}

	public function getName() {
		return "v";
	}

	public function getPath() {
		return "/meta/{$this->getId()}/v";
	}
}
