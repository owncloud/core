<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

/**
 * Storage backends that support update notifications
 *
 * @since 9.1.0
 */
interface INotifyStorage {
	const NOTIFY_ADDED = 1;
	const NOTIFY_REMOVED = 2;
	const NOTIFY_MODIFIED = 3;
	const NOTIFY_RENAME = 4;
	
	/**
	 * @param string $path
	 * @param callable $callback
	 * @since 9.1.0
	 *
	 * the provided callback will be called for every detected change in the storage with the following arguments
	 *  - function(int $change, string $path) or
	 *  - function(int $change, string $source, string $target) for rename operations
	 *  with $change being one of the INotifyStorage::NOTIFY_* constants
	 *
	 *  returning false from the callback will cancel the notify
	 */
	public function notify($path, callable $callback);
}
