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
use OCP\Files\IRootFolder;
use OCP\Files\Storage\IVersionedStorage;
use OC\Files\View;
use OCP\Files\NotFoundException;
use OCP\Files\Storage;

/**
 * Class MetaVersionCollection - this class represents the versions sub folder
 * of a file
 *
 * @package OC\Files\Meta
 */
class MetaVersionCollection extends AbstractFolder {

	/** @var int */
	private $fileId;
	/** @var IRootFolder */
	private $root;

	/**
	 * MetaVersionCollection constructor.
	 *
	 * @param int $fileId
	 * @param IRootFolder $root
	 */
	public function __construct($fileId, IRootFolder $root) {
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
	public function getDirectoryListing() {
		$view = new View();
		$path = $view->getPath($this->fileId);
		/** @var Storage $storage */
		list($storage, $internalPath) = $view->resolvePath($path);
		if (!$storage->instanceOfStorage(IVersionedStorage::class)) {
			return [];
		}
		/** @var IVersionedStorage | Storage $storage */
		$versions = $storage->getVersions($internalPath);
		return \array_values(\array_map(function ($version) use ($storage, $internalPath, $view, $path) {
			if (!isset($version['mimetype'])) {
				$version['mimetype'] = $view->getMimeType($path);
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
		$view = new View();
		$path = $view->getPath($this->fileId);
		/** @var Storage $storage */
		list($storage, $internalPath) = $view->resolvePath($path);
		if (!$storage->instanceOfStorage(IVersionedStorage::class)) {
			throw new NotFoundException();
		}
		/** @var IVersionedStorage | Storage $storage */
		$version = $storage->getVersion($internalPath, $versionId);
		if ($version === null) {
			throw new NotFoundException();
		}
		if (!isset($version['mimetype'])) {
			$version['mimetype'] = $view->getMimeType($path);
		}
		return new MetaFileVersionNode($this, $this->root, $version, $storage, $internalPath);
	}

	/**
	 * @inheritdoc
	 */
	public function getId() {
		return $this->fileId;
	}

	public function getName() {
		return "v";
	}

	public function getPath() {
		return "/meta/{$this->fileId}/v";
	}
}
