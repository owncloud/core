<?php

namespace OCA\Encryption\Panels;

use OCP\Encryption\Keys\IStorage;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\ISession;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Settings\ISettings;
use OCP\Template;

class Personal implements ISettings {

	/** @var ILogger */
	protected $logger;
	/** @var IUserSession */
	protected $userSession;
	/** @var IConfig */
	protected $config;
	/** @var IL10N */
	protected $l;
	/** @varIUserManager */
	protected $userManager;
	/** @var ISession  */
	protected $session;
	/** @var IStorage */
	protected $encKeyStorage;

	public function __construct(
		ILogger $logger,
		IUserSession $userSession,
		IConfig $config,
		IL10N $l,
		IUserManager $userManager,
		ISession $session,
		IStorage $encKeyStorage) {
		$this->logger = $logger;
		$this->userSession = $userSession;
		$this->config = $config;
		$this->l = $l;
		$this->userManager = $userManager;
		$this->session = $session;
		$this->encKeyStorage = $encKeyStorage;
	}

	public function getPriority() {
		return 0;
	}

	public function getSectionID() {
		return 'encryption';
	}

	public function getPanel() {
		$session = new \OCA\Encryption\Session($this->session);
		$template = new Template('encryption', 'settings-personal');
		$crypt = new \OCA\Encryption\Crypto\Crypt(
			$this->logger,
			$this->userSession,
			$this->config,
			$this->l);

		$util = new \OCA\Encryption\Util(
			new \OC\Files\View(),
			$crypt,
			$this->logger,
			$this->userSession,
			$this->config,
			$this->userManager);

		$user = $this->userSession->getUser()->getUID();
		$privateKeySet = $session->isPrivateKeySet();

		// did we tried to initialize the keys for this session?
		$initialized = $session->getStatus();
		$recoveryAdminEnabled = $this->config->getAppValue('encryption', 'recoveryAdminEnabled');
		$recoveryEnabledForUser = $util->isRecoveryEnabledForUser($user);
		if ($recoveryAdminEnabled || !$privateKeySet) {
			$template->assign('recoveryEnabled', $recoveryAdminEnabled);
			$template->assign('recoveryEnabledForUser', $recoveryEnabledForUser);
			$template->assign('privateKeySet', $privateKeySet);
			$template->assign('initialized', $initialized);
			return $template;
		}
		return null;
	}
}