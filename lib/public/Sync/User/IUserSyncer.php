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

use OCP\Sync\ISyncer;

/**
 * Interface IUserSyncer.
 * Represent a sync service that can be registered in the ISyncManager.
 * This particular sync service syncs users from multiple backends such as
 * LDAP, Database and others.
 * Note that just the registered backends will be used during the syncing.
 *
 * This interface extends the `ISyncer` one in order to allow registration
 * of multiple user backends that will synced.
 *
 * @package OCP\Sync\User
 * @since 10.14.0
 */
interface IUserSyncer extends ISyncer {
	/**
	 * Register the provided backend so that the service can get the users
	 * from that backend and sync them.
	 *
	 * @param IUserSyncBackend $userSyncBackend the backend
	 * @since 10.14.0
	 */
	public function registerBackend(IUserSyncBackend $userSyncBackend);
}
