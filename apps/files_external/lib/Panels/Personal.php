<?php

namespace OCA\Files_External\Panels;

use OCP\Settings\ISettings;
use OCP\Template;
use \OCP\Files\External\IStoragesBackendService;

class Personal implements ISettings {

    public function getPriority() {
        return 0;
    }

    public function getSectionID() {
        return 'storage';
    }

    public function getPanel() {
		// we must use the same container
		$appContainer = \OC_Mount_Config::$app->getContainer();
		$backendService = \OC::$server->query('StoragesBackendService');
		$userStoragesService = \OC::$server->getUserStoragesService();
		$tmpl = new Template('files_external', 'settings');
		$tmpl->assign('encryptionEnabled', \OC::$server->getEncryptionManager()->isEnabled());
		$tmpl->assign('visibilityType', IStoragesBackendService::VISIBILITY_PERSONAL);
		$tmpl->assign('storages', $userStoragesService->getStorages());
		$tmpl->assign('dependencies', \OC_Mount_Config::dependencyMessage($backendService->getBackends()));
		$tmpl->assign('backends', $backendService->getAvailableBackends());
		$tmpl->assign('authMechanisms', $backendService->getAuthMechanisms());
		$tmpl->assign('allowUserMounting', $backendService->isUserMountingAllowed());
		return $tmpl;
    }

}
