<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OC\Files\External;

use OCP\IConfig;

use OCP\Files\External\Backend\Backend;
use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\Config\IBackendProvider;
use OCP\Files\External\Config\IAuthMechanismProvider;
use OCP\Files\External\IStoragesBackendService;

/**
 * Service class to manage backend definitions
 */
class StoragesBackendService implements IStoragesBackendService {
	/** @var IConfig */
	protected $config;

	/** @var bool */
	private $userMountingAllowed = true;

	/** @var string[] */
	private $userMountingBackends = [];

	/** @var Backend[] */
	private $backends = [];

	/** @var IBackendProvider[] */
	private $backendProviders = [];

	/** @var AuthMechanism[] */
	private $authMechanisms = [];

	/** @var IAuthMechanismProvider[] */
	private $authMechanismProviders = [];

	/**
	 * @param IConfig $config
	 */
	public function __construct(
		IConfig $config
	) {
		$this->config = $config;

		// Load config values
		if ($this->config->getAppValue('files_external', 'allow_user_mounting', 'no') !== 'yes') {
			$this->userMountingAllowed = false;
		}
		$this->userMountingBackends = \explode(
			',',
			$this->config->getAppValue('files_external', 'user_mounting_backends', '')
		);

		// if no backend is in the list an empty string is in the array and user mounting is disabled
		if ($this->userMountingBackends === ['']) {
			$this->userMountingAllowed = false;
		}
	}

	/**
	 * Register a backend provider
	 *
	 * @since 9.1.0
	 * @param IBackendProvider $provider
	 */
	public function registerBackendProvider(IBackendProvider $provider) {
		$this->backendProviders[] = $provider;
	}

	private function loadBackendProviders() {
		foreach ($this->backendProviders as $provider) {
			$this->registerBackends($provider->getBackends());
		}
		$this->backendProviders = [];
	}

	/**
	 * Register an auth mechanism provider
	 *
	 * @since 9.1.0
	 * @param IAuthMechanismProvider $provider
	 */
	public function registerAuthMechanismProvider(IAuthMechanismProvider $provider) {
		$this->authMechanismProviders[] = $provider;
	}

	private function loadAuthMechanismProviders() {
		foreach ($this->authMechanismProviders as $provider) {
			$this->registerAuthMechanisms($provider->getAuthMechanisms());
		}
		$this->authMechanismProviders = [];
	}

	/**
	 * Register a backend
	 *
	 * @deprecated 9.1.0 use registerBackendProvider()
	 * @param Backend $backend
	 */
	public function registerBackend(Backend $backend) {
		if (!$this->isAllowedUserBackend($backend)) {
			$backend->removeVisibility(IStoragesBackendService::VISIBILITY_PERSONAL);
		}
		foreach ($backend->getIdentifierAliases() as $alias) {
			$this->backends[$alias] = $backend;
		}
	}

	/**
	 * @deprecated 9.1.0 use registerBackendProvider()
	 * @param Backend[] $backends
	 */
	public function registerBackends(array $backends) {
		foreach ($backends as $backend) {
			$this->registerBackend($backend);
		}
	}
	/**
	 * Register an authentication mechanism
	 *
	 * @deprecated 9.1.0 use registerAuthMechanismProvider()
	 * @param AuthMechanism $authMech
	 */
	public function registerAuthMechanism(AuthMechanism $authMech) {
		if (!$this->isAllowedAuthMechanism($authMech)) {
			$authMech->removeVisibility(IStoragesBackendService::VISIBILITY_PERSONAL);
		}
		foreach ($authMech->getIdentifierAliases() as $alias) {
			$this->authMechanisms[$alias] = $authMech;
		}
	}

	/**
	 * @deprecated 9.1.0 use registerAuthMechanismProvider()
	 * @param AuthMechanism[] $mechanisms
	 */
	public function registerAuthMechanisms(array $mechanisms) {
		foreach ($mechanisms as $mechanism) {
			$this->registerAuthMechanism($mechanism);
		}
	}

	/**
	 * Get all backends
	 *
	 * @return Backend[]
	 */
	public function getBackends() {
		$this->loadBackendProviders();
		// only return real identifiers, no aliases
		$backends = [];
		foreach ($this->backends as $backend) {
			$backends[$backend->getIdentifier()] = $backend;
		}
		return $backends;
	}

	/**
	 * Get all available backends
	 *
	 * @return Backend[]
	 */
	public function getAvailableBackends() {
		return \array_filter($this->getBackends(), function ($backend) {
			return !($backend->checkDependencies());
		});
	}

	/**
	 * @param string $identifier
	 * @return Backend|null
	 */
	public function getBackend($identifier) {
		$this->loadBackendProviders();
		if (isset($this->backends[$identifier])) {
			return $this->backends[$identifier];
		}
		return null;
	}

	/**
	 * Get all authentication mechanisms
	 *
	 * @return AuthMechanism[]
	 */
	public function getAuthMechanisms() {
		$this->loadAuthMechanismProviders();
		// only return real identifiers, no aliases
		$mechanisms = [];
		foreach ($this->authMechanisms as $mechanism) {
			$mechanisms[$mechanism->getIdentifier()] = $mechanism;
		}
		return $mechanisms;
	}

	/**
	 * Get all authentication mechanisms for schemes
	 *
	 * @param string[] $schemes
	 * @return AuthMechanism[]
	 */
	public function getAuthMechanismsByScheme(array $schemes) {
		return \array_filter($this->getAuthMechanisms(), function ($authMech) use ($schemes) {
			return \in_array($authMech->getScheme(), $schemes, true);
		});
	}

	/**
	 * @param string $identifier
	 * @return AuthMechanism|null
	 */
	public function getAuthMechanism($identifier) {
		$this->loadAuthMechanismProviders();
		if (isset($this->authMechanisms[$identifier])) {
			return $this->authMechanisms[$identifier];
		}
		return null;
	}

	/**
	 * @return bool
	 */
	public function isUserMountingAllowed() {
		return $this->userMountingAllowed;
	}

	/**
	 * Check a backend if a user is allowed to mount it
	 *
	 * @param Backend $backend
	 * @return bool
	 */
	protected function isAllowedUserBackend(Backend $backend) {
		if ($this->userMountingAllowed &&
			\array_intersect($backend->getIdentifierAliases(), $this->userMountingBackends)
		) {
			return true;
		}
		return false;
	}

	/**
	 * Check an authentication mechanism if a user is allowed to use it
	 *
	 * @param AuthMechanism $authMechanism
	 * @return bool
	 */
	protected function isAllowedAuthMechanism(AuthMechanism $authMechanism) {
		return true; // not implemented
	}
}
