<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCP\Files\Mount;

interface IMountManager {

	/**
	 * @param \OCP\Files\Mount\IMountPoint $mount
	 */
	public function addMount(IMountPoint $mount);

	/**
	 * @param string $mountPoint
	 */
	public function removeMount($mountPoint);

	/**
	 * @param string $mountPoint
	 * @param string $target
	 */
	public function moveMount($mountPoint, $target);

	/**
	 * Find the mount for $path
	 *
	 * @param string $path
	 * @return \OCP\Files\Mount\IMountPoint
	 */
	public function find($path);

	/**
	 * Find all mounts in $path
	 *
	 * @param string $path
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function findIn($path);

	/**
	 * Remove all registered mounts
	 */
	public function clear();

	/**
	 * Find mounts by storage id
	 *
	 * @param string $id
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function findByStorageId($id);

	/**
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function getAll();

	/**
	 * Find mounts by numeric storage id
	 *
	 * @param int $id
	 * @return \OCP\Files\Mount\IMountPoint[]
	 */
	public function findByNumericId($id);
}
