<?php
/**
 * Copyright (c) 2015 Robin McCorkell <rmccorkell@karoshi.org.uk>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files\Storage\Wrapper;

/**
 * Availability checker for storages
 *
 * Throws a StorageNotAvailableException for storages with known failures
 */
class Availability extends Wrapper {
	const RECHECK_TTL = 600; // 10 minutes

	/**
	 * @return bool
	 */
	private function updateAvailability() {
		try {
			$result = $this->test();
		} catch (\Exception $e) {
			$result = false;
		}
		$this->setAvailability($result);
		return $result;
	}

	/**
	 * @return bool
	 */
	private function isAvailable() {
		$availability = $this->getAvailability();
		if (!$availability['available']) {
			// trigger a recheck if TTL reached
			if ((time() - $availability['last_checked']) > self::RECHECK_TTL) {
				return $this->updateAvailability();
			}
		}
		return $availability['available'];
	}

	/**
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	private function checkAvailability() {
		if (!$this->isAvailable()) {
			throw new \OCP\Files\StorageNotAvailableException();
		}
	}

	public function mkdir($path) {
		$this->checkAvailability();
		try {
			return parent::mkdir($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function rmdir($path) {
		$this->checkAvailability();
		try {
			return parent::rmdir($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function opendir($path) {
		$this->checkAvailability();
		try {
			return parent::opendir($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function is_dir($path) {
		$this->checkAvailability();
		try {
			return parent::is_dir($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function is_file($path) {
		$this->checkAvailability();
		try {
			return parent::is_file($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function stat($path) {
		$this->checkAvailability();
		try {
			return parent::stat($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function filetype($path) {
		$this->checkAvailability();
		try {
			return parent::filetype($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function filesize($path) {
		$this->checkAvailability();
		try {
			return parent::filesize($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function isCreatable($path) {
		$this->checkAvailability();
		try {
			return parent::isCreatable($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function isReadable($path) {
		$this->checkAvailability();
		try {
			return parent::isReadable($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function isUpdatable($path) {
		$this->checkAvailability();
		try {
			return parent::isUpdatable($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function isDeletable($path) {
		$this->checkAvailability();
		try {
			return parent::isDeletable($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function isSharable($path) {
		$this->checkAvailability();
		try {
			return parent::isSharable($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function getPermissions($path) {
		$this->checkAvailability();
		try {
			return parent::getPermissions($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function file_exists($path) {
		$this->checkAvailability();
		try {
			return parent::file_exists($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function filemtime($path) {
		$this->checkAvailability();
		try {
			return parent::filemtime($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function file_get_contents($path) {
		$this->checkAvailability();
		try {
			return parent::file_get_contents($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function file_put_contents($path, $data) {
		$this->checkAvailability();
		try {
			return parent::file_put_contents($path, $data);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function unlink($path) {
		$this->checkAvailability();
		try {
			return parent::unlink($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function rename($path1, $path2) {
		$this->checkAvailability();
		try {
			return parent::rename($path1, $path2);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function copy($path1, $path2) {
		$this->checkAvailability();
		try {
			return parent::copy($path1, $path2);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function fopen($path, $mode) {
		$this->checkAvailability();
		try {
			return parent::fopen($path, $mode);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function getMimeType($path) {
		$this->checkAvailability();
		try {
			return parent::getMimeType($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function hash($type, $path, $raw = false) {
		$this->checkAvailability();
		try {
			return parent::hash($type, $path, $raw);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function free_space($path) {
		$this->checkAvailability();
		try {
			return parent::free_space($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function search($query) {
		$this->checkAvailability();
		try {
			return parent::search($query);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function touch($path, $mtime = null) {
		$this->checkAvailability();
		try {
			return parent::touch($path, $mtime);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function getLocalFile($path) {
		$this->checkAvailability();
		try {
			return parent::getLocalFile($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function getLocalFolder($path) {
		$this->checkAvailability();
		try {
			return parent::getLocalFolder($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function hasUpdated($path, $time) {
		$this->checkAvailability();
		try {
			return parent::hasUpdated($path, $time);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function getOwner($path) {
		$this->checkAvailability();
		try {
			return parent::getOwner($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function getETag($path) {
		$this->checkAvailability();
		try {
			return parent::getETag($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}

	public function getDirectDownload($path) {
		$this->checkAvailability();
		try {
			return parent::getDirectDownload($path);
		} catch (\OCP\Files\StorageNotAvailableException $e) {
			$this->setAvailability(false);
			throw $e;
		}
	}
}
