<?php

namespace OCA\Encryption\Panels;

use OCP\Settings\ISettings;
use OCP\Template;

class Personal implements ISettings {

    public function getPriority() {
        return 0;
    }

    public function getSectionID() {
        return 'encryption';
    }

    public function getPanel() {
		$session = new \OCA\Encryption\Session(\OC::$server->getSession());
		$userSession = \OC::$server->getUserSession();
		$template = new Template('encryption', 'settings-personal');
		$crypt = new \OCA\Encryption\Crypto\Crypt(
				\OC::$server->getLogger(),
				$userSession,
				\OC::$server->getConfig(),
				\OC::$server->getL10N('encryption'));

		$util = new \OCA\Encryption\Util(
				new \OC\Files\View(),
				$crypt,
				\OC::$server->getLogger(),
				$userSession,
				\OC::$server->getConfig(),
				\OC::$server->getUserManager());

		$keyManager = new \OCA\Encryption\KeyManager(
				\OC::$server->getEncryptionKeyStorage(),
				$crypt,
				\OC::$server->getConfig(),
				$userSession,
				$session,
				\OC::$server->getLogger(), $util);

		$user = $userSession->getUser()->getUID();
		$view = new \OC\Files\View('/');
		$privateKeySet = $session->isPrivateKeySet();

		// did we tried to initialize the keys for this session?
		$initialized = $session->getStatus();
		$recoveryAdminEnabled = \OC::$server->getConfig()->getAppValue('encryption', 'recoveryAdminEnabled');
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