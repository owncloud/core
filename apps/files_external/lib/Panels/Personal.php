<?php

namespace OCA\Files_External\Panels;

use OCP\Settings\ISettings;
use OCP\Template;
use \OCA\Files_External\Service\BackendService;

class Personal implements ISettings {

    public function getPriority() {
        return 0;
    }

    public function getSectionID() {
        return 'security';
    }

    public function getPanel() {
		// we must use the same container
		$appContainer = \OC_Mount_Config::$app->getContainer();
		/** @var \OCP\Files\External\IStoragesBackendService $backendService */
		$backendService = \OC::$server->query('StoragesBackendService');
		$userStoragesService = $appContainer->query('OCA\Files_External\Service\UserStoragesService');
		$tmpl = new Template('files_external', 'settings');
		$tmpl->assign('encryptionEnabled', \OC::$server->getEncryptionManager()->isEnabled());
		$tmpl->assign('visibilityType', BackendService::VISIBILITY_PERSONAL);
		$tmpl->assign('storages', $userStoragesService->getStorages());
		$tmpl->assign('dependencies', \OC_Mount_Config::dependencyMessage($backendService->getBackends()));
		$tmpl->assign('backends', $backendService->getAvailableBackends());
		$tmpl->assign('authMechanisms', $backendService->getAuthMechanisms());
		$tmpl->assign('allowUserMounting', $backendService->isUserMountingAllowed());
		return $tmpl;
    }

}
