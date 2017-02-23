<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\Files_External\Panels;

use OC\Encryption\Manager;
use OCP\Files\External\Service\IUserStoragesService;
use OCP\Settings\ISettings;
use OCP\Template;
use \OCP\Files\External\IStoragesBackendService;

class Personal implements ISettings {

	/** @var IStoragesBackendService */
	protected $backendService;
	/** @var IUserStoragesService */
	protected $userStorages;
	/** @var Manager */
	protected $encManager;

	public function __construct(IStoragesBackendService $backendService,
								IUserStoragesService $userStorages,
								Manager $encManager) {
		$this->backendService = $backendService;
		$this->userStorages = $userStorages;
		$this->encManager = $encManager;
	}

    public function getPriority() {
        return 0;
    }

    public function getSectionID() {
        return 'storage';
    }

    public function getPanel() {
		$tmpl = new Template('files_external', 'settings');
		$tmpl->assign('encryptionEnabled', $this->encManager->isEnabled());
		$tmpl->assign('visibilityType', IStoragesBackendService::VISIBILITY_PERSONAL);
		$tmpl->assign('storages', $this->userStorages->getStorages());
		$tmpl->assign('dependencies', \OC_Mount_Config::dependencyMessage($this->backendService->getBackends()));
		$tmpl->assign('backends', $this->backendService->getAvailableBackends());
		$tmpl->assign('authMechanisms', $this->backendService->getAuthMechanisms());
		$tmpl->assign('allowUserMounting', $this->backendService->isUserMountingAllowed());
		return $tmpl;
    }

}
