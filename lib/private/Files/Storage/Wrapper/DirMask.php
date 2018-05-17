<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OC\Files\Storage\Wrapper;

/**
 * While PermissionMask can mask a whole storage this  can
 * mask a certain directory inside a storage
 *
 * @package OC\Files\Storage\Wrapper
 */
class DirMask extends PermissionsMask {

	/**
	 * @var string the dir that should be masked
	 */
	private $path;
	/**
	 * @var int remember length
	 */
	private $pathLength;
	/**
	 * @param array $arguments ['storage' => $storage, 'mask' => $mask, 'path' => $path]
	 *
	 * $storage: The storage the permissions mask should be applied on
	 * $mask: The permission bits that should be kept, a combination of the \OCP\Constant::PERMISSION_ constants
	 * $path: The path relative to the storage root that should be masked
	 */
	public function __construct($arguments) {
		parent::__construct($arguments);
		$this->path = $arguments['path'];
		$this->pathLength = \strlen($arguments['path']);
	}

	protected function checkPath($path) {
		return \substr($path, 0, $this->pathLength) === $this->path;
	}

	public function isUpdatable($path) {
		if ($this->checkPath($path)) {
			return parent::isUpdatable($path);
		} else {
			return $this->storage->isUpdatable($path);
		}
	}

	public function isCreatable($path) {
		if ($this->checkPath($path)) {
			return parent::isCreatable($path);
		} else {
			return $this->storage->isCreatable($path);
		}
	}

	public function isDeletable($path) {
		if ($this->checkPath($path)) {
			return parent::isDeletable($path);
		} else {
			return $this->storage->isDeletable($path);
		}
	}

	public function isSharable($path) {
		if ($this->checkPath($path)) {
			return parent::isSharable($path);
		} else {
			return $this->storage->isSharable($path);
		}
	}

	public function getPermissions($path) {
		if ($this->checkPath($path)) {
			return parent::getPermissions($path);
		} else {
			return $this->storage->getPermissions($path);
		}
	}

	public function rename($path1, $path2) {
		if (!$this->isReadable($path1)) {
			return false;
		}
		if ($this->file_exists($path2)) {
			if ($this->isUpdatable($path2)) {
				return $this->storage->rename($path1, $path2);
			}
		} else {
			if ($this->isCreatable($path2)) {
				return $this->storage->rename($path1, $path2);
			}
		}
		return false;
	}

	public function copy($path1, $path2) {
		if (!$this->isReadable($path1)) {
			return false;
		}
		if ($this->file_exists($path2)) {
			if ($this->isUpdatable($path2)) {
				return $this->storage->copy($path1, $path2);
			}
		} else {
			if ($this->isCreatable($path2)) {
				return $this->storage->copy($path1, $path2);
			}
		}
		return false;
	}

	public function touch($path, $mtime = null) {
		if ($this->checkPath($path)) {
			return parent::touch($path);
		} else {
			return $this->storage->touch($path);
		}
	}

	public function mkdir($path) {
		if ($this->checkPath($path)) {
			return parent::mkdir($path);
		} else {
			return $this->storage->mkdir($path);
		}
	}

	public function rmdir($path) {
		if ($this->checkPath($path)) {
			return parent::rmdir($path);
		} else {
			return $this->storage->rmdir($path);
		}
	}

	public function unlink($path) {
		if ($this->checkPath($path)) {
			return parent::unlink($path);
		} else {
			return $this->storage->unlink($path);
		}
	}

	public function file_put_contents($path, $data) {
		if ($this->checkPath($path)) {
			return parent::file_put_contents($path, $data);
		} else {
			return $this->storage->file_put_contents($path, $data);
		}
	}

	public function fopen($path, $mode) {
		if ($this->checkPath($path)) {
			return parent::fopen($path, $mode);
		} else {
			return $this->storage->fopen($path, $mode);
		}
	}
}
