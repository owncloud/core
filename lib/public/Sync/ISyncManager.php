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

use OCP\Sync\User\IUserSyncer;

/**
 * Interface ISyncManager
 *
 * @package OCP\Sync
 * @since 10.14.0
 */
interface ISyncManager {
	/**
	 * Register the syncer with the provided name.
	 * This method WON'T overwrite a syncer that was already registered with
	 * the same name. Use `overwriteSyncer` if you want to overwrite.
	 *
	 * @param string $name the name which will be used to register the syncer
	 * @param ISyncer $syncer the syncer to be registered
	 * @return bool true if it's registered, false otherwise. In particular,
	 * registering a syncer with a name already used will return false and the
	 * old syncer will be kept.
	 * @since 10.14.0
	 */
	public function registerSyncer(string $name, ISyncer $syncer): bool;

	/**
	 * Register the syncer with the provided name. If a syncer is already
	 * registered with the same name, it will be overwritten and the provided
	 * one will be used instead.
	 *
	 * Note that using this method with a non-used name (so the method will
	 * register the syncer instead of overwrite another one) has an undefined
	 * behavior and could change in the future.
	 * This method is intended to be used to purposely overwrite an already
	 * existing syncer; using it as a registration method to overcome the
	 * limitations with the `registerSyncer` is not intended.
	 *
	 * @param string $name the name which will be used to register the syncer
	 * @param ISyncer $syncer the syncer to be registered
	 * @return bool true if it's registered, false otherwise.
	 * @since 10.14.0
	 */
	public function overwriteSyncer(string $name, ISyncer $syncer): bool;

	/**
	 * Get the syncer registered with the provided name. If no syncer is
	 * registered with that name, it will return null
	 *
	 * @param string $name the name that was used to register the syncer
	 * @return ISyncer|null the registered syncer or null if there is no
	 * syncer with that name.
	 * @since 10.14.0
	 */
	public function getSyncer(string $name): ?ISyncer;

	/**
	 * Get the syncer to sync users. This is intended to be a shortcut for
	 * `(IUserSyncer) $syncManager->getSyncer('user')`
	 * If the syncer with the "user" name isn't a `IUserSyncer`, this method
	 * will return null
	 *
	 * @return IUserSyncer|null the syncer to sync users or null if none
	 * is registered
	 * @since 10.14.0
	 */
	public function getUserSyncer(): ?IUserSyncer;
}
