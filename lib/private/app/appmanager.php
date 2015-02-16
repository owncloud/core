<?php

/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\App;

use OCP\App\IAppManager;
use OCP\IAppConfig;
use OCP\IGroupManager;
use OCP\IUserManager;
use OCP\IUserSession;

class AppManager implements IAppManager {
	/**
	 * @var \OCP\IUserSession
	 */
	private $userSession;

	/**
	 * @var \OCP\IAppConfig
	 */
	private $appConfig;

	/**
	 * @var \OCP\IGroupManager
	 */
	private $groupManager;

	/** @var  AppCache */
	private $appCache;

	/** @var  AppCacheFactory */
	private $appCacheFactory;
	/**
	 * @var \OCP\IUserManager
	 */
	private $userManager;

	/**
	 * @param \OCP\IUserSession $userSession
	 * @param \OCP\IAppConfig $appConfig
	 * @param \OCP\IUserManager $userManager
	 * @param \OCP\IGroupManager $groupManager
	 * @param AppCacheFactory $appCacheFactory
	 */
	public function __construct(
		IUserSession $userSession,
		IAppConfig $appConfig,
		IUserManager $userManager,
		IGroupManager $groupManager,
		AppCacheFactory $appCacheFactory
	) {
		$this->userSession = $userSession;
		$this->appConfig = $appConfig;
		$this->groupManager = $groupManager;
		$this->appCacheFactory = $appCacheFactory;
		$this->appCache = $this->appCacheFactory->get();
		$this->userManager = $userManager;
	}

	/**
	 * @return string[] $appId => $enabled
	 */
	private function getInstalledApps() {
		if (!$this->appCache->isPropertyIndexed('enabled')) {
			$values = $this->appConfig->getValues(false, 'enabled');
			$enabledApps = array_filter($values, function ($value) {
				return $value !== 'no';
			});
			$this->appCache->addData($enabledApps, 'enabled');
		}
		$apps = $this->appCache->getWithPropertyValue('enabled');
		ksort($apps);
		return $apps;
	}

	/**
	 * resets the runtime cache on installed apps
	 */
	public function clearInstalledAppsCache() {
		$this->appCache = $this->appCacheFactory->get();
	}

	/**
	 * Returns appIDs of all apps that are enabled, no matter whether generally
	 * or to a subset of users
	 *
	 * @return string[]
	 */
	public function getEnabledApps() {
		$allApps = $this->getInstalledApps();
		$apps = [];
		foreach($allApps as $appID => $enabled) {
			if($this->isEnabled($appID)) {
				$apps[] = $appID;
			}
		}
		return $apps;
	}

	/**
	 * Caches apps with their types, if not already done
	 */
	private function cacheEnabledAppsWithType() {
		if(!$this->appCache->isPropertyIndexed('type')) {
			$values = $this->appConfig->getValues(false, 'types');
			if(is_array($values)) {
				$this->appCache->addData($values, 'type');
			}
		}
	}

	/**
	 * returns all apps that do not belong to one of the priority types
	 *
	 * @return array $appID => $types
	 */
	public function getEnabledAppsOfNoPriority() {
		$this->cacheEnabledAppsWithType();
		$selection = $this->appCache->filter(function($app) {
				if(!isset($app['enabled']) || $app['enabled'] === 'no') {
					//avoid disabled apps
					return false;
				}
				$types = explode(',', $app['type']);
				$priorityType = array('authentication', 'filesystem', 'logging');
				foreach($priorityType as $type) {
					if(in_array($type, $types)) {
						return false;
					}
				}
				return true;
			},
			'type');
		return $selection;
	}

	/**
	 * returns apps of a specified type
	 *
	 * @param string $type
	 * @return array $appID => $types
	 */
	public function getEnabledAppsOfType($type) {
		if(!is_string($type)) {
			throw new \InvalidArgumentException('String expected');
		}
		if(!$this->appCache->isPropertyIndexed('enabled')) {
			$this->getEnabledApps();
		}
		$this->cacheEnabledAppsWithType();
		$selection = $this->appCache->filter(function($app) use ($type) {
				$types = explode(',', $app['type']);
				$isEnabled = isset($app['enabled']) && $app['enabled'] !== 'no';
				return $isEnabled && in_array($type, $types);
			},
			'type');
		return $selection;
	}

	/**
	 * Returns all apps that are enabled for the given user.
	 *
	 * @param string $userID
	 * @return \string[]
	 * @throws \Exception|\InvalidArgumentException
	 */
	public function getEnabledAppsForUser($userID) {
		if(!is_string($userID)) {
			throw new \InvalidArgumentException('String expected');
		}
		$user = $this->userManager->get($userID);
		if(is_null($user)) {
			throw new \Exception('User ' . $userID . ' could not be retrieved');
		}
		$enabledApps = $this->getEnabledApps();
		$apps = [];
		foreach($enabledApps as $appID) {
			if($this->isEnabledForUser($appID, $user)) {
				$apps[] = $appID;
				continue;
			}
		}
		return $apps;
	}

	/**
	 * checks if an app is enabled, either totally or for a subset of users
	 *
	 * @param $appID
	 * @return bool
	 */
	public function isEnabled($appID) {
		if(!is_string($appID)) {
			throw new \InvalidArgumentException('String expected');
		}
		$installedApps = $this->getInstalledApps();
		$enabled = $installedApps[$appID];
		return $enabled !== 'no';
	}

	/**
	 * Check if an app is enabled for user
	 *
	 * @param string $appId
	 * @param \OCP\IUser $user (optional) if not defined, the currently logged in user will be used
	 * @return bool
	 */
	public function isEnabledForUser($appId, $user = null) {
		if (is_null($user)) {
			$user = $this->userSession->getUser();
		}
		$installedApps = $this->getInstalledApps();
		if (isset($installedApps[$appId])) {
			$enabled = $installedApps[$appId];
			if ($enabled === 'yes') {
				return true;
			} elseif (is_null($user)) {
				return false;
			} else {
				$groupIds = json_decode($enabled);
				$userGroups = $this->groupManager->getUserGroupIds($user);
				foreach ($userGroups as $groupId) {
					if (array_search($groupId, $groupIds) !== false) {
						return true;
					}
				}
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * Check if an app is installed in the instance
	 *
	 * @param string $appId
	 * @return bool
	 */
	public function isInstalled($appId) {
		$installedApps = $this->getInstalledApps();
		return isset($installedApps[$appId]);
	}

	/**
	 * Enable an app for every user
	 *
	 * @param string $appId
	 */
	public function enableApp($appId) {
		$this->appConfig->setValue($appId, 'enabled', 'yes');
	}

	/**
	 * Enable an app only for specific groups
	 *
	 * @param string $appId
	 * @param \OCP\IGroup[] $groups
	 */
	public function enableAppForGroups($appId, $groups) {
		$groupIds = array_map(function ($group) {
			/** @var \OCP\IGroup $group */
			return $group->getGID();
		}, $groups);
		$this->appConfig->setValue($appId, 'enabled', json_encode($groupIds));
	}

	/**
	 * Disable an app for every user
	 *
	 * @param string $appId
	 * @throws \Exception if app can't be disabled
	 */
	public function disableApp($appId) {
		if($appId === 'files') {
			throw new \Exception("files can't be disabled.");
		}
		$this->appConfig->setValue($appId, 'enabled', 'no');
	}
}
