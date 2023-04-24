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
use OCP\Files\IProvidesProperties;
use OCP\Files\IRootFolder;
use OCP\Files\IProvidesVersionAuthor;
use OCP\Files\IProvidesVersionTag;
use OCP\Files\Node;
use OCP\Files\Storage\IVersionedStorage;
use OCP\Files\NotFoundException;
use OCP\Files\Storage;

/**
 * Collection root (current file node) of non-current versions (directory children nodes). This
 * class represents the versions sub folder of a file
 *
 * @package OC\Files\Meta
 */
class MetaVersionCollection extends AbstractFolder implements IProvidesVersionAuthor, IProvidesVersionTag, IProvidesProperties {
	private IRootFolder $root;
	private Node $node;
	private ?array $versionInfo = null;

	/**
	 * MetaVersionCollection constructor.
	 *
	 * @param IRootFolder $root
	 * @param Node $node
	 */
	public function __construct(IRootFolder $root, Node $node) {
		$this->root = $root;
		$this->node = $node;
	}

	public function getName(): string {
		return "v";
	}

	public function getPath(): string {
		return "/meta/{$this->getId()}/v";
	}

	public function getEditedBy() : string {
		return $this->getProperty('edited_by');
	}

	public function getVersionTag() : string {
		return $this->getProperty('version_tag');
	}

	public function getProperty(string $name): string {
		if (!$this->versionInfo) {
			$storage = $this->node->getStorage();
			$internalPath = $this->node->getInternalPath();

			if (!$storage->instanceOfStorage(IVersionedStorage::class)) {
				return '';
			}

			/** @var IVersionedStorage | Storage $storage */
			'@phan-var IVersionedStorage | Storage $storage';
			$version = $storage->getCurrentVersion($internalPath);
			$this->versionInfo = $version;
		}

		return $this->versionInfo[$name] ?? '';
	}

	public function setProperty(string $name, string $value): void {
		$storage = $this->node->getStorage();
		$internalPath = $this->node->getInternalPath();

		if (!$storage->instanceOfStorage(IVersionedStorage::class)) {
			# TODO: throw exception?
			return;
		}

		/** @var IVersionedStorage | Storage $storage */
		'@phan-var IVersionedStorage | Storage $storage';
		$storage->setMetaData($internalPath, null, [$name => $value]);
		$version = $storage->getCurrentVersion($internalPath);
		$this->versionInfo = $version;
	}

	public function isEncrypted(): bool {
		return false;
	}

	public function isShared(): bool {
		return $this->node->isShared();
	}

	public function getDirectoryListing(): array {
		$node = $this->node;
		$storage = $node->getStorage();
		$internalPath = $node->getInternalPath();

		if (!$storage->instanceOfStorage(IVersionedStorage::class)) {
			return [];
		}
		/** @var IVersionedStorage | Storage $storage */
		'@phan-var IVersionedStorage | Storage $storage';
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
		'@phan-var IVersionedStorage | Storage $storage';
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
	public function getId(): int {
		return $this->node->getId();
	}
}
