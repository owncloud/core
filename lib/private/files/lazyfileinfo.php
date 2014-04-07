<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files;

class LazyFileInfo extends FileInfo {
	/**
	 * @var bool
	 */
	protected $includeMountPoints;

	/**
	 * @var \OC\User\User
	 */
	protected $user;

	/**
	 * @var int
	 */
	protected $permissions;

	/**
	 * @param string $path
	 * @param \OC\Files\Storage\Storage $storage
	 * @param string $internalPath
	 * @param \OC\User\User $user
	 * @param bool $includeMountPoints
	 */
	public function __construct($path, $storage, $internalPath, $user, $includeMountPoints = true) {
		$this->path = $path;
		$this->storage = $storage;
		$this->internalPath = $internalPath;
		$this->includeMountPoints = $includeMountPoints;
		$this->user = $user;
		$this->data = null;
		$this->permissions = null;
	}

	public function offsetSet($offset, $value) {
		$this->load();
		parent::offsetSet($offset, $value);
	}

	public function offsetExists($offset) {
		$this->load();
		return parent::offsetExists($offset);
	}

	public function offsetUnset($offset) {
		$this->load();
		parent::offsetUnset($offset);
	}

	public function offsetGet($offset) {
		$this->load();
		if ($offset === 'permissions') {
			return $this->getPermissions();
		}
		return parent::offsetGet($offset);
	}

	protected function load() {
		if (is_null($this->data)) {
			$data = null;
			$cache = $this->storage->getCache($this->internalPath);

			if (!$cache->inCache($this->internalPath)) {
				$scanner = $this->storage->getScanner($this->internalPath);
				$scanner->scan($this->internalPath, Cache\Scanner::SCAN_SHALLOW);
			} else {
				$watcher = $this->storage->getWatcher($this->internalPath);
				$data = $watcher->checkUpdate($this->internalPath);
			}

			if (!is_array($data)) {
				$data = $cache->get($this->internalPath);
			}

			if ($data and isset($data['fileid'])) {
				if ($this->includeMountPoints and $data['mimetype'] === 'httpd/unix-directory') {
					//add the sizes of other mountpoints to the folder
					$mountManager = Filesystem::getMountManager();
					$mounts = $mountManager->findIn($this->path);
					foreach ($mounts as $mount) {
						$subStorage = $mount->getStorage();
						$subCache = $subStorage->getCache('');
						$rootEntry = $subCache->get('');
						$data['size'] += isset($rootEntry['size']) ? $rootEntry['size'] : 0;
					}
				}
			}
			$data = \OC_FileProxy::runPostProxies('getFileInfo', $this->path, $data);
			$this->data = $data;
		}
	}

	protected function loadPermissions() {
		if (is_null($this->permissions)) {
			$permissionsCache = $this->storage->getPermissionsCache($this->internalPath);
			$this->permissions = $permissionsCache->get($this->getId(), $this->user->getUID());
			if ($this->permissions === -1) {
				$this->permissions = $this->storage->getPermissions($this->internalPath);
				$permissionsCache->set($this->getId(), $this->user->getUID(), $this->permissions);
			}
		}
	}

	/**
	 * @return string
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * @return \OCP\Files\Storage
	 */
	public function getStorage() {
		return $this->storage;
	}

	/**
	 * @return string
	 */
	public function getInternalPath() {
		return $this->internalPath;
	}

	/**
	 * @return int
	 */
	public function getId() {
		$this->load();
		return parent::getId();
	}

	/**
	 * @return string
	 */
	public function getMimetype() {
		$this->load();
		return parent::getMimetype();
	}

	/**
	 * @return string
	 */
	public function getMimePart() {
		$this->load();
		return parent::getMimePart();
	}

	/**
	 * @return string
	 */
	public function getName() {
		$this->load();
		return parent::getName();
	}

	/**
	 * @return string
	 */
	public function getEtag() {
		$this->load();
		return parent::getEtag();
	}

	/**
	 * @return int
	 */
	public function getSize() {
		$this->load();
		return parent::getSize();
	}

	/**
	 * @return int
	 */
	public function getMTime() {
		$this->load();
		return parent::getMTime();
	}

	/**
	 * @return bool
	 */
	public function isEncrypted() {
		$this->load();
		return parent::isEncrypted();
	}

	/**
	 * @return int
	 */
	public function getPermissions() {
		$this->loadPermissions();
		return $this->permissions;
	}

	/**
	 * @return \OCP\Files\FileInfo::TYPE_FILE | \OCP\Files\FileInfo::TYPE_FOLDER
	 */
	public function getType() {
		$this->load();
		return parent::getType();
	}

	public function getData() {
		$this->load();
		$data = parent::getData();
		$data['permissions'] = $this->getPermissions();
		return $data;
	}

	/**
	 * @param int $permissions
	 * @return bool
	 */
	protected function checkPermissions($permissions) {
		return parent::checkPermissions($permissions);
	}

	/**
	 * @return bool
	 */
	public function isReadable() {
		return parent::isReadable();
	}

	/**
	 * @return bool
	 */
	public function isUpdateable() {
		return parent::isUpdateable();
	}

	/**
	 * @return bool
	 */
	public function isDeletable() {
		return parent::isDeletable();
	}

	/**
	 * @return bool
	 */
	public function isShareable() {
		return parent::isShareable();
	}
}
