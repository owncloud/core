<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
use OCP\Files\External\IStoragesBackendService;
use OCP\Files\External\Service\IGlobalStoragesService;
use OCP\IConfig;
use OCP\Settings\ISettings;
use OCP\Template;

class Admin implements ISettings {

	/** @var IGlobalStoragesService */
	protected $globalStoragesService;
	/** @var IStoragesBackendService */
	protected $backendService;
	/** @var IConfig */
	protected $config;
	/** @var Manager */
	protected $encManager;

	public function __construct(IGlobalStoragesService $globalStoragesService,
								IStoragesBackendService $backendService,
								IConfig $config,
								Manager $encManager) {
		$this->globalStoragesService = $globalStoragesService;
		$this->backendService = $backendService;
		$this->config = $config;
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
		$tmpl->assign('enableExternalStorage', $this->config->getAppValue('core', 'enable_external_storage', 'no') === 'yes');
		$tmpl->assign('encryptionEnabled', $this->encManager->isEnabled());
		$tmpl->assign('visibilityType', IStoragesBackendService::VISIBILITY_ADMIN);
		$tmpl->assign('storages', $this->globalStoragesService->getStorages());
		$tmpl->assign('backends', $this->backendService->getAvailableBackends());
		$tmpl->assign('authMechanisms', $this->backendService->getAuthMechanisms());
		$tmpl->assign('dependencies', \OC_Mount_Config::dependencyMessage($this->backendService->getBackends()));
		$tmpl->assign('allowUserMounting', $this->backendService->isUserMountingAllowed());
		$tmpl->assign('allowUserMountSharing', $this->config->getAppValue('core', 'allow_user_mount_sharing', 'yes') === 'yes');

		return $tmpl;
	}
}
