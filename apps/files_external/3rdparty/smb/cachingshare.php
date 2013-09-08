<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace SMB;

/**
 * Class CachingShare
 *
 * caches metadata from share
 *
 * @package SMB
 */
class CachingShare extends Share {
	private $dirCache = array();

	private function clear($path = null) {
		if (is_null($path)) {
			$this->dirCache = array();
		} else {
			unset($this->dirCache[$path]);
		}
	}

	public function dir($path) {
		if (!isset($this->dirCache[$path])) {
			$this->dirCache[$path] = parent::dir($path);
		}
		return $this->dirCache[$path];
	}

	public function mkdir($path) {
		$this->clear(dirname($path));
		return parent::mkdir($path);
	}

	public function rmdir($path) {
		$this->clear(dirname($path));
		return parent::rmdir($path);
	}

	public function del($path) {
		$this->clear(dirname($path));
		return parent::del($path);
	}

	public function put($source, $target) {
		$this->clear(dirname($target));
		return parent::put($source, $target);
	}

	public function rename($from, $to) {
		$this->clear(dirname($from));
		$this->clear(dirname($to));
		return parent::rename($from, $to);
	}
}
