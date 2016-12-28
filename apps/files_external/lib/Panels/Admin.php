<?php

namespace OCA\Files_External\Panels;

use OC\Encryption\Manager;
use OCP\Files\External\Service\IGlobalStoragesService;
use OCP\Settings\ISettings;
use OCP\Files\External\IStoragesBackendService;
use OCP\Template;

class Admin implements ISettings {

	/** @var IGlobalStoragesService  */
	protected $globalStoragesService;

	/** @var IStoragesBackendService  */
	protected $backendService;

	/** @var Manager  */
	protected $encManager;

	public function __construct(
		IGlobalStoragesService $globalStoragesService,
		IStoragesBackendService $backendService,
		Manager $encManager) {
		$this->globalStoragesService = $globalStoragesService;
		$this->backendService = $backendService;
		$this->encManager = $encManager;
	}

    public function getPriority() {
        return 0;
    }

    public function getSectionID() {
        return 'storage';
    }

    public function getPanel() {
		// we must use the same container
		$tmpl = new Template('files_external', 'settings');
		$tmpl->assign('encryptionEnabled', $this->encManager->isEnabled());
		$tmpl->assign('visibilityType', IStoragesBackendService::VISIBILITY_ADMIN);
		$tmpl->assign('storages', $this->globalStoragesService->getStorages());
		$tmpl->assign('backends', $this->backendService->getAvailableBackends());
		$tmpl->assign('authMechanisms', $this->backendService->getAuthMechanisms());
		$tmpl->assign('dependencies', \OC_Mount_Config::dependencyMessage($this->backendService->getBackends()));
		$tmpl->assign('allowUserMounting', $this->backendService->isUserMountingAllowed());
		return $tmpl;
    }

}
