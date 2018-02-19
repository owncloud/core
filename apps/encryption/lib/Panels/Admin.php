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
namespace OCA\Encryption\Panels;

use OCP\IL10N;
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

	/** @var IConfig */
	protected $config;
	/** @var ILogger */
	protected $logger;
	/** @var IUserSession */
	protected $userSession;
	/** @var IUserManager */
	protected $userManager;
	/** @var ISession */
	protected $session;
	/** @var IL10N */
	protected $l;

	public function __construct(IConfig $config,
								ILogger $logger,
								IUserSession $userSession,
								IUserManager $userManager,
								ISession $session,
								IL10N $l) {
		$this->config = $config;
		$this->logger = $logger;
		$this->userSession = $userSession;
		$this->userManager = $userManager;
		$this->session = $session;
		$this->l = $l;
	}

	public function getPriority() {
		return 0;
	}

	public function getSectionID() {
		return 'encryption';
	}

	public function getPanel() {
		$tmpl = new Template('encryption', 'settings-admin');
		$crypt = new Crypt(
			$this->logger,
			$this->userSession,
			$this->config,
			$this->l);
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