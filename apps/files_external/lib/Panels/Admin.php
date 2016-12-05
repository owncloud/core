<?php

namespace OCA\Files_External\Panels;

use OCP\Settings\ISettings;
use OCP\Files\External\IStoragesBackendService;
use OCP\Template;

class Admin implements ISettings {

    public function getPriority() {
        return 0;
    }

    public function getSectionID() {
        return 'general';
    }

    public function getPanel() {
		// we must use the same container
		$appContainer = \OC_Mount_Config::$app->getContainer();
		$backendService = \OC::$server->query('StoragesBackendService');
		$globalStoragesService = \OC::$server->getGlobalStoragesService();
		$tmpl = new Template('files_external', 'settings');
		$tmpl->assign('encryptionEnabled', \OC::$server->getEncryptionManager()->isEnabled());
		$tmpl->assign('visibilityType', IStoragesBackendService::VISIBILITY_ADMIN);
		$tmpl->assign('storages', $globalStoragesService->getStorages());
		$tmpl->assign('backends', $backendService->getAvailableBackends());
		$tmpl->assign('authMechanisms', $backendService->getAuthMechanisms());
		$tmpl->assign('dependencies', \OC_Mount_Config::dependencyMessage($backendService->getBackends()));
		$tmpl->assign('allowUserMounting', $backendService->isUserMountingAllowed());
		return $tmpl;
    }

}
