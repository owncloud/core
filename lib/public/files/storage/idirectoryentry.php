<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace OCP\Files\Storage;

interface IDirectoryEntry {
	const META_MIMETYPE = 'mimetype';
	const META_SIZE = 'size';
	const META_MTIME = 'mtime';
	const META_TYPE = 'type';

	const TYPE_FILE = 'file';
	const TYPE_DIRECTORY = 'directory';


	/**
	 * @return string
	 */
	public function getPath();

	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @return string self::TYPE_FILE or self::TYPE_DIRECTORY
	 */
	public function getType();

	/**
	 * @return string[] a combination of the self::META_ constants
	 */
	public function listAvailableMeta();

	/**
	 * @return string
	 * @throws MetaNotAvailableException
	 */
	public function getMimeType();

	/**
	 * @return int
	 * @throws MetaNotAvailableException
	 */
	public function getSize();

	/**
	 * @return int
	 * @throws MetaNotAvailableException
	 */
	public function getMTime();
}
