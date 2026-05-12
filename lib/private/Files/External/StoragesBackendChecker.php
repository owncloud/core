<?php

namespace OC\Files\External;

use OCP\IConfig;
use OCP\Files\External\Backend\Backend;

class StoragesBackendChecker {
	/** @var IConfig */
	private IConfig $config;
	/** @var bool|null */
	private $canCreateNewLocalStorage = null;
	/** @var bool|null */
	private $allowUserMounting = null;
	/** @var array|null */
	private $userMountingBackends = null;

	/**
	 * @param IConfig $config
	 */
	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	/**
	 * Checks if the regular users are allowed to mount external storages
	 * @return bool
	 */
	public function isUserMountingAllowed(): bool {
		if ($this->allowUserMounting === null) {
			$this->allowUserMounting = $this->config->getAppValue('files_external', 'allow_user_mounting', 'no') === 'yes';
			// if no backend is in the list an empty string is in the array and user mounting is disabled
			if ($this->allowedBackendsForUsers() === ['']) {
				$this->allowUserMounting = false;
			}
		}
		return $this->allowUserMounting;
	}

	private function allowedBackendsForUsers() {
		if ($this->userMountingBackends === null) {
			$user_mounting_backends = $this->config->getAppValue('files_external', 'user_mounting_backends', '');
			$this->userMountingBackends = \explode(
				',',
				$user_mounting_backends
			);
		}
		return $this->userMountingBackends;
	}

	/**
	 * Checks if the regular users are allowed to mount the specified backend.
	 * Note that the admin might still mount the backend.
	 * @param Backend $backend
	 * @return bool
	 */
	public function isAllowedUserBackend(Backend $backend): bool {
		// Allowing users to mount local storage is a security risk, so it's
		// blacklisted regardless of admin's decision. The admin can still
		// setup a local mount for everyone (or chosen users) if he wants.
		$blacklistedBackendsForUsers = ['\OC\Files\Storage\Local'];
		if (\in_array($backend->getStorageClass(), $blacklistedBackendsForUsers, true)) {
			return false;
		}

		if ($this->isUserMountingAllowed() && \array_intersect($backend->getIdentifierAliases(), $this->allowedBackendsForUsers())) {
			return true;
		}
		return false;
	}

	/**
	 * Checks if the admin is allowed to mount the specified backend.
	 * @param Backend $backend
	 * @return bool
	 */
	public function isAllowedAdminBackend(Backend $backend): bool {
		if ($this->canCreateNewLocalStorage === null) {
			$this->canCreateNewLocalStorage = $this->config->getSystemValue('files_external_allow_create_new_local', false);
		}

		if ($backend->getStorageClass() === '\OC\Files\Storage\Local' && !$this->canCreateNewLocalStorage) {
			return false;
		}
		return true;
	}
}
