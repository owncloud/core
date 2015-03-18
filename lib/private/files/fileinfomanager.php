<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Files;

class FileInfoManager {
	/**
	 * @var \OC\Files\FileInfo[]
	 */
	protected $entries = array();

	/**
	 * @var \OC\Files\View
	 */
	protected $view;

	public function __construct(View $view) {
		$this->view = $view;
	}

	public function register(FileInfo $entry) {
		$this->entries[$entry->getPath()] = $entry;
	}

	public function getFileInfo($path) {
		if (isset($this->entries[$path])) {
			return $this->entries[$path];
		} else {
			return null;
		}
	}
}
