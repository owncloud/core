<?php
/**
 * Copyright (c) 2015 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Files_Sharing\Propagation;

use OC\Files\Filesystem;
use OC\Files\View;
use OCP\IConfig;
use OCP\IUserSession;

class PropagationManager {
	/**
	 * @var \OCP\IUserSession
	 */
	private $userSession;

	/**
	 * @var \OCP\IConfig
	 */
	private $config;

	/**
	 * @var \OC\Files\Cache\ChangePropagator[]
	 */
	private $changePropagators = [];

	/**
	 * @var \OCA\Files_Sharing\Propagation\Propagator[]
	 */
	private $sharePropagators = [];

	private $globalSetupDone = false;

	function __construct(IUserSession $userSession, IConfig $config) {
		$this->userSession = $userSession;
		$this->config = $config;
	}

	/**
	 * @param string $user
	 * @return \OC\Files\Cache\ChangePropagator
	 */
	public function getChangePropagator($user) {
		$activeUser = $this->userSession->getUser();
		if ($activeUser and $activeUser->getUID() === $user) {
			// it's important that we take the existing propagator here to make sure we can listen to external changes
			$this->changePropagators[$user] = Filesystem::getView()->getUpdater()->getPropagator();
		}
		if (isset($this->changePropagators[$user])) {
			return $this->changePropagators[$user];
		}
		$this->changePropagators[$user] = (new View('/' . $user . '/files'))->getUpdater()->getPropagator();
		return $this->changePropagators[$user];
	}

	/**
	 * @param string $user
	 * @return \OCA\Files_Sharing\Propagation\Propagator
	 */
	public function getSharePropagator($user) {
		if (isset($this->sharePropagators[$user])) {
			return $this->sharePropagators[$user];
		}
		$this->sharePropagators[$user] = new Propagator($user, $this->getChangePropagator($user), $this->config);
		return $this->sharePropagators[$user];
	}

	/**
	 * Attach the propagator to the change propagator of a user to listen to changes made to files shared by the user
	 *
	 * @param string $shareOwner
	 * @param string $user
	 */
	public function listenToOwnerChanges($shareOwner, $user) {
		$sharePropagator = $this->getSharePropagator($user);
		$ownerPropagator = $this->getChangePropagator($shareOwner);
		$sharePropagator->attachToPropagator($ownerPropagator, $shareOwner);
	}

	public function globalSetup() {
		$user = $this->userSession->getUser();
		if (!$user) {
			return;
		}
		$watcher = new ChangeWatcher(Filesystem::getView());

		$this->listenToOwnerChanges($user->getUID(), $user->getUID());
		\OC_Hook::connect('OC_Filesystem', 'write', $watcher, 'writeHook');
	}
}
