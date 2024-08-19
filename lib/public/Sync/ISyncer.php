<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace OCP\Sync;

/**
 * Interface ISyncer.
 * Represent a sync service that can be registered in the ISyncManager
 * A sync service will provide 2 main functionalities:
 * - Check whether a local item is still present in the remote source
 * - Sync remote items from the remote source and store them locally
 *
 * Each implementation is expected to sync a different item. For example,
 * one implementation can sync users, another file metadata, and another
 * calendar data.
 *
 * @package OCP\Sync
 * @since 10.14.0
 */
interface ISyncer {
	/** No change in the state of the item */
	public const CHECK_STATE_NO_CHANGE = 'no change';
	/** Item removed locally */
	public const CHECK_STATE_REMOVED = 'removed';
	/** Item disabled locally */
	public const CHECK_STATE_DISABLED = 'disabled';
	/** Item errored */
	public const CHECK_STATE_ERROR = 'error';

	/**
	 * The number of items that have been synced and stored locally.
	 *
	 * This number might be different than the `remoteItemCount` if items
	 * are added or removed.
	 * Note that this number might include items that might be disabled or
	 * might be missing from the remote system.
	 *
	 * This method is intended to give a limit to a progress bar that could
	 * be used while checking (for the `check` method).
	 *
	 * Custom options can be used to change the behavior of the method,
	 * for example, to count only items with a specific state. The same
	 * options should be used (if possible) with the `check` and `checkOne`
	 * methods.
	 * The options are specific to each syncer.
	 *
	 * @param array<string, string> $opts options to customize the behavior
	 * of this method
	 * @return int|null the number of items synced and stored locally
	 * @since 10.14.0
	 */
	public function localItemCount($opts = []): ?int;

	/**
	 * Check the currently synced items against the remote system. If the state
	 * of the item is different (the item is missing from the remote system, or
	 * it has a different state), the syncer could perform some actions (depending
	 * on the implementation).
	 *
	 * The callback must be something like `callback($item, $state)` where the item
	 * could be an array with key-value data or an exception. The callback will be
	 * called on each item, and the same callback will also be called if an exception
	 * happens. Multiple exceptions might happen, and the callback will be called
	 * on each of them.
	 * This means that this method can send exceptions to the callback in order to
	 * report errors for individual items without interrupting the method.
	 * Exceptions sent through the callback MUST be `SyncException` or a subclass.
	 *
	 * Custom options can be passed as array<string, string> to customize the
	 * behavior of the syncer. These options are specific to each syncer. The same
	 * options should be used (if possible) with the `localItemCount` and `checkOne`
	 * methods.
	 *
	 * @param callable $callback
	 * @param array<string, string> $opts options to customize the sync behavior
	 * @throws SyncException if the method fails
	 * @since 10.14.0
	 */
	public function check($callback, $opts = []);

	/**
	 * Check only the specified item associated with the target id.
	 * The id must be known and depends on the syncer. For example,
	 * if the syncer is syncing users, the id could be the userId,
	 * or it could be the user's email; if the syncer is syncing groups,
	 * it could be the groupId.
	 * Specific syncers should document the target id that they're expecting.
	 *
	 * Custom options can be passed as array<string, string> to customize the
	 * behavior of the syncer. These options are specific to each syncer. The same
	 * options should be used (if possible) with the `localItemCount` and `check`
	 * methods.
	 *
	 * @param string $id the id of the item we want to sync
	 * @param array<string, string> $opts options to customize the behavior
	 * @throws SyncException if the fails fails
	 * @return string one of the CHECK_STATE_* constants
	 * @since 10.14.0
	 */
	public function checkOne(string $id, $opts = []): string;

	/**
	 * The maximum number of items that are expected to be synced at a given
	 * time. This can vary when items are added or removed from the backend.
	 * These items will be brought to the local system via the `sync` method.
	 *
	 * This method is intended to give a limit to a progress bar that could
	 * be used while syncing (for the `sync` method).
	 *
	 * If the number of items is unknown or can't be retrieved, null must be
	 * returned.
	 *
	 * Custom options can be used to change the behavior of the method,
	 * for example, to count only items from a specific backend if multiple
	 * backends are being used. The same options should be used (if possible)
	 * with the `sync` and `syncOne` methods.
	 * The options are specific to each syncer.
	 *
	 * @param array<string, string> $opts options to customize the behavior
	 * of this method
	 * @return int|null the number of items to be synced, or null if such
	 * number is unknown
	 * @since 10.14.0
	 */
	public function remoteItemCount($opts = []): ?int;

	/**
	 * Run the syncer to sync every item that can be synced with this service.
	 * This will bring items from an external source to the local system.
	 *
	 * The callback must be something like `callback($item)` where the item could
	 * be an array with key-value data or an exception. The callback will be
	 * call on each item, and the same callback will also be call if an exception
	 * happens. Multiple exceptions might happen, and the callback will be called
	 * on each of them.
	 * This means that this method can send exceptions to the callback in order to
	 * report errors for individual items without interrupting the method.
	 * Exceptions sent through the callback MUST be `SyncException` or a subclass.
	 *
	 * Custom options can be passed as array<string, string> to customize the
	 * behavior of the syncer. These options are specific to each syncer. The same
	 * options should be used (if possible) with the `remoteItemCount` and
	 * `syncOne` methods.
	 *
	 * @param callable $callback
	 * @param array<string, string> $opts options to customize the sync behavior
	 * @throws SyncException if the sync fails
	 * @since 10.14.0
	 */
	public function sync($callback, $opts = []);

	/**
	 * Sync only the specified item associated with the target id.
	 * The id must be known and depends on the syncer. For example,
	 * if the syncer is syncing users, the id could be the userId,
	 * or it could be the user's email; if the syncer is syncing groups,
	 * it could be the groupId.
	 * Specific syncers should document the target id that they're expecting.
	 *
	 * Custom options can be passed as array<string, string> to customize the
	 * behavior of the syncer. These options are specific to each syncer. The
	 * same options should be used (if possible) with the `remoteItemCount`
	 * and `sync` methods.

	 *
	 * @param string $id the id of the item we want to sync
	 * @param array<string, string> $opts options to customize the sync behavior
	 * @throws SyncException if the sync fails
	 * @return bool true if synced without issues, false if the item isn't
	 * found remotely.
	 * @since 10.14.0
	 */
	public function syncOne(string $id, $opts = []): bool;
}
