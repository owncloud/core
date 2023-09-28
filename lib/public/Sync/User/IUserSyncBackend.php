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

namespace OCP\Sync\User;

use OCP\UserInterface;

/**
 * Interface IUserSyncBackend.
 * The backend that will be used to sync users with the IUserSyncer.
 * The backend will connect to a data source to extract information about the
 * users.
 *
 * Implementations are expected to use an internal pointer in order to get
 * the users one by one. It's also advised to use some kind of caching to
 * limit the interactions with the external data source while we're retrieving
 * the users.
 *
 * @package OCP\Sync\User
 * @since 10.14.0
 */
interface IUserSyncBackend {
	/**
	 * Reset the internal pointer.
	 * Once we've traversed all the users, the `getNextUser` will start to
	 * return null. The `resetPointer` method can be used to reset the internal
	 * pointer so the users can be returned again from the beginning.
	 * This method can be used anytime to reset the pointer and start from the
	 * beginning.
	 *
	 * @since 10.14.0
	 */
	public function resetPointer();

	/**
	 * Get the next user to be synced.
	 * The expected behavior is the following:
	 * - A `SyncingUser` will be returned if everything is ok.
	 * - `null` will be returned if there are no more users to be synced.
	 * - A `SyncBackendBroken` exception will be thrown if we can't connect to
	 * the backend. The `UserSyncer` is expected to abort syncing this backend and
	 * jump to the next one available.
	 * - A `SyncBackendUserFailed` exception will be thrown if there is something
	 * wrong with the current user and can't be synced. The `UserSyncer` will handle
	 * that exception and call again this method to get the next user.
	 *
	 * A lot of calls to this method are expected. The implementation is expected
	 * to cache a bunch of users to reduce the number of calls to the backend
	 *
	 * @return SyncingUser|null the user that needs to be synced or null if there are
	 * no more users to be synced.
	 * @throws SyncBackendBrokenException if we can't connect to the backend or
	 * we can't get any data from it. This should cause no additional calls
	 * to this method
	 * @throws SyncBackendUserFailedException if there is something wrong with
	 * the current user and the user can't or shouldn't be synced. Further calls
	 * to this method are expected in order to sync the rest of the users.
	 * @since 10.14.0
	 */
	public function getNextUser(): ?SyncingUser;

	/**
	 * Get the specified user in order to sync it.
	 * The behavior will be the same as the `getNextUser`, but this method will
	 * just always return the specified user
	 *
	 * @param string $uid the uid of the user we want to sync.
	 * @return SyncingUser|null the specified user that needs to be synced or null
	 * if the user isn't found
	 * @throws SyncBackendBrokenException if we can't connect to the backend or
	 * we can't get any data from it. This should cause no additional calls
	 * to this method
	 * @throws SyncBackendUserFailedException if there is something wrong with
	 * the current user and the user can't or shouldn't be synced.
	 * @since 10.14.0
	 */
	public function getSyncingUser(string $uid): ?SyncingUser;

	/**
	 * Get the number of users in the backend, or null if such information is
	 * unknown
	 *
	 * @return int|null the number of users, or null if it's unknown
	 * @since 10.14.0
	 */
	public function userCount(): ?int;

	/**
	 * Get the UserInterface / backend associated with this syncer. All users
	 * must come from the same backend and must have the same UserInterface
	 *
	 * @return UserInterface the backend where all the user being synced come from.
	 * @since 10.14.0
	 */
	public function getUserInterface(): UserInterface;
}
