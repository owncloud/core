<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
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

namespace OCP\Files\External;

use \OCP\IConfig;

use \OCP\Files\External\Backend\Backend;
use \OCP\Files\External\Auth\AuthMechanism;
use \OCP\Files\External\Config\IBackendProvider;
use \OCP\Files\External\Config\IAuthMechanismProvider;

/**
 * Service to manage external storage backend definitions
 *
 * @since 9.2.0
 */
interface IStoragesBackendService {

	/** Visibility constants for VisibilityTrait */
	const VISIBILITY_NONE = 0;
	const VISIBILITY_PERSONAL = 1;
	const VISIBILITY_ADMIN = 2;
	//const VISIBILITY_ALIENS = 4;

	const VISIBILITY_DEFAULT = 3; // PERSONAL | ADMIN

	/** Priority constants for PriorityTrait */
	const PRIORITY_DEFAULT = 100;

	/**
	 * Register a backend provider
	 *
	 * @since 9.1.0
	 * @param IBackendProvider $provider
	 */
	public function registerBackendProvider(IBackendProvider $provider);

	/**
	 * Register an auth mechanism provider
	 *
	 * @since 9.1.0
	 * @param IAuthMechanismProvider $provider
	 */
	public function registerAuthMechanismProvider(IAuthMechanismProvider $provider);

	/**
	 * Register a backend
	 *
	 * @deprecated 9.1.0 use registerBackendProvider()
	 * @param Backend $backend
	 */
	public function registerBackend(Backend $backend);

	/**
	 * @deprecated 9.1.0 use registerBackendProvider()
	 * @param Backend[] $backends
	 */
	public function registerBackends(array $backends);

	/**
	 * Register an authentication mechanism
	 *
	 * @deprecated 9.1.0 use registerAuthMechanismProvider()
	 * @param AuthMechanism $authMech
	 */
	public function registerAuthMechanism(AuthMechanism $authMech);

	/**
	 * @deprecated 9.1.0 use registerAuthMechanismProvider()
	 * @param AuthMechanism[] $mechanisms
	 */
	public function registerAuthMechanisms(array $mechanisms);

	/**
	 * Get all backends
	 *
	 * @return Backend[]
	 * @since 9.1.0
	 */
	public function getBackends();

	/**
	 * Get all available backends
	 *
	 * @return Backend[]
	 * @since 9.1.0
	 */
	public function getAvailableBackends();

	/**
	 * @param string $identifier
	 * @return Backend|null
	 * @since 9.1.0
	 */
	public function getBackend($identifier);

	/**
	 * Get all authentication mechanisms
	 *
	 * @return AuthMechanism[]
	 * @since 9.1.0
	 */
	public function getAuthMechanisms();

	/**
	 * Get all authentication mechanisms for schemes
	 *
	 * @param string[] $schemes
	 * @return AuthMechanism[]
	 * @since 9.1.0
	 */
	public function getAuthMechanismsByScheme(array $schemes);

	/**
	 * Get authentication mechanism by id
	 *
	 * @param string $identifier
	 * @return AuthMechanism|null
	 * @since 9.1.0
	 */
	public function getAuthMechanism($identifier);

	/**
	 * Returns whether user mounting is allowed
	 * @return bool
	 * @since 9.1.0
	 */
	public function isUserMountingAllowed();
}
