<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
namespace OCP\Files;

interface IMovableStorage {
	/**
	 * Change the mountpoint of the storage
	 *
	 * @param string $source
	 * @param string $target
	 * @return bool
	 */
	public function moveMountPoint($source, $target);
}
