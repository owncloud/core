<?php
/**
 * Copyright (c) 2015 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Traits;

use OC\Encryption\Util;
use OC\Files\View;
use OCA\Encryption\AppInfo\Application;
use OCA\Encryption\KeyManager;
use OCA\Encryption\Users\Setup;
use OC\Files\Filesystem;

/**
 * Enables encryption
 */
trait EncryptionTrait {
	// from MountProviderTrait
	abstract protected function registerStorageWrapper($name, $wrapper);

	// from phpunit
	abstract protected function markTestSkipped($reason = '');
	abstract protected function assertTrue($condition, $message = '');

	private $encryptionWasEnabled;

	private $originalEncryptionModule;

	/**
	 * @var \OCP\IConfig
	 */
	private $config;

	/**
	 * @var \OCA\Encryption\AppInfo\Application
	 */
	private $encryptionApp;

	protected function loginWithEncryption($user = '') {
		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		// needed for fully logout
		\OC::$server->getUserSession()->setUser(null);

		Filesystem::tearDown();
		\OC_User::setUserId($user);
		$this->postLogin();
		\OC_Util::setupFS($user);
		if (\OC_User::userExists($user)) {
			\OC::$server->getUserFolder($user);
		}
	}

	protected function setupForUser($name, $password) {
		\OC_Util::tearDownFS();
		\OC_Util::setupFS($name);
		$container = $this->encryptionApp->getContainer();
		/** @var KeyManager $keyManager */
		$keyManager = $container->query('KeyManager');
		/** @var Setup $userSetup */
		$userSetup = $container->query('UserSetup');
		$userSetup->setupServerSide($name, $password);
		$keyManager->init($name, $password);
	}

	protected function postLogin() {
		$util = new Util(
			new View(),
			\OC::$server->getUserManager(),
			\OC::$server->getGroupManager(),
			\OC::$server->getConfig()
		);
		$this->registerStorageWrapper('oc_encryption', array($util, 'wrapStorage'));
	}

	protected function setUpEncryptionTrait() {
		$isReady = \OC::$server->getEncryptionManager()->isReady();
		if (!$isReady) {
			$this->markTestSkipped('Encryption not ready');
		}

		\OC_App::loadApp('encryption');

		$this->encryptionApp = new Application([], $isReady);

		$this->config = \OC::$server->getConfig();
		$this->encryptionWasEnabled = $this->config->getAppValue('core', 'encryption_enabled', 'no');
		$this->originalEncryptionModule = $this->config->getAppValue('core', 'default_encryption_module');
		$this->config->setAppValue('core', 'default_encryption_module', \OCA\Encryption\Crypto\Encryption::ID);
		$this->config->setAppValue('core', 'encryption_enabled', 'yes');
		$this->assertTrue(\OC::$server->getEncryptionManager()->isEnabled());
	}

	protected function tearDownEncryptionTrait() {
		if ($this->config) {
			$this->config->setAppValue('core', 'encryption_enabled', $this->encryptionWasEnabled);
			$this->config->setAppValue('core', 'default_encryption_module', $this->originalEncryptionModule);
		}
	}
}
