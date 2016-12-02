<?php

namespace OCA\Encryption\Panels;

use OCP\Settings\ISettings;
use OCP\Template;
use OCA\Encryption\Crypto\Crypt;
use OCA\Encryption\Util;
use OC\Files\View;
use OCP\IConfig;
use OCA\Encryption\Session;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\ISession;
use OCP\IUserSession;

class Admin implements ISettings {

	/** @var IConfig  */
	protected $config;

	/** @var ILogger  */
	protected $logger;

	/** @var IUserSession  */
	protected $userSession;

	/** @var IUserManager  */
	protected $userManager;

	/** @var ISession  */
	protected $session;

	public function __construct(IConfig $config,
								ILogger $logger,
								IUserSession $userSession,
								IUserManager $userManager,
								ISession $session) {
		$this->config = $config;
		$this->logger = $logger;
		$this->userSession = $userSession;
		$this->userManager = $userManager;
		$this->session = $session;
	}

	public function getPriority() {
		return 0;
	}

	public function getSectionID() {
		return 'security';
	}

	public function getPanel() {
		$tmpl = new Template('encryption', 'settings-admin');
		$crypt = new Crypt(
			$this->logger,
			$this->userSession,
			$this->config,
			\OC::$server->getL10N('encryption'));
		$util = new Util(
			new View(),
			$crypt,
			$this->logger,
			$this->userSession,
			$this->config,
			$this->userManager
		);
		// Check if an adminRecovery account is enabled for recovering files after lost pwd
		$recoveryAdminEnabled = $this->config->getAppValue('encryption', 'recoveryAdminEnabled', '0');
		$session = new Session($this->session);
		$encryptHomeStorage = $util->shouldEncryptHomeStorage();
		$tmpl->assign('recoveryEnabled', $recoveryAdminEnabled);
		$tmpl->assign('initStatus', $session->getStatus());
		$tmpl->assign('encryptHomeStorage', $encryptHomeStorage);
		$tmpl->assign('masterKeyEnabled', $util->isMasterKeyEnabled());
		return $tmpl;
	}
}