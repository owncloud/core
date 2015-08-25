<?php
/**
 * @author Björn Schießle <schiessle@owncloud.com>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author cmeh <cmeh@users.noreply.github.com>
 * @author Florin Peter <github@florin-peter.de>
 * @author Jakob Sack <mail@jakobsack.de>
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Sam Tuke <mail@samtuke.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Clark Tomlinson <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OC\Settings\Controller;

use OC\Encryption\Manager;
use OCP\App\IAppManager;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\IUserSession;

class ChangePasswordController extends Controller {
	/**
	 * @var IL10N
	 */
	private $l10n;
	/**
	 * @var IAppManager
	 */
	private $appManager;
	/**
	 * @var IUserManager
	 */
	private $userManager;
	/**
	 * @var IUserSession
	 */
	private $userSession;
	/**
	 * @var IGroupManager
	 */
	private $groupManager;

	/**
	 * @var IRequest
	 */
	protected $request;
	/**
	 * @var Manager
	 */
	private $encryptionManager;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IL10N $l10n
	 * @param IAppManager $appManager
	 * @param IUserManager $userManager
	 * @param IUserSession $userSession
	 * @param IGroupManager $groupManager
	 */
	public function __construct($appName,
								IRequest $request,
								IL10N $l10n,
								IAppManager $appManager,
								IUserManager $userManager,
								IUserSession $userSession,
								IGroupManager $groupManager) {
		parent::__construct($appName, $request);
		$this->l10n = $l10n;
		$this->appManager = $appManager;
		$this->userManager = $userManager;
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
		$this->request = $request;
		$this->encryptionManager = \OC::$server->getEncryptionManager();
	}

	/**
	 * @return JSONResponse
	 */
	public function changePersonalPassword() {

		$username = $this->userSession->getUser();
		$password = $this->request->getParam('personal-password', null);
		$oldPassword = $this->request->getParam('oldpassword', '');


		if (!$this->userManager->checkPassword($username, $oldPassword)) {
			return new JSONResponse(["data" => ["message" => $this->l10n->t("Wrong password")], 'status' => 'error']);
		}
		if (!is_null($password) && \OC_User::setPassword($username,
				$password)
		) {
			return new JSONResponse(['status' => 'success']);
		} else {
			return new JSONResponse(['status' => 'error']);
		}
	}

	/**
	 * @return JSONResponse
	 */
	public function changeUserPassword() {

		if ($this->request->getParam('username', false)) {
			$username = $this->request->getParam('username');
		} else {
			return new JSONResponse(['data' => ['message' => $this->l10n->t('No user supplied')], 'status' => 'error']);
		}

		$password = $this->request->getParam('password', null);
		$recoveryPassword = $this->request->getParam('recoveryPassword', null);

		if ($this->groupManager->isAdmin($this->userSession->getUser()->getUID())) {
		} elseif (\OC_SubAdmin::isUserAccessible($this->userSession->getUser(),
			$username)
		) {
		} else {
			return new JSONResponse(['data' => ['message' => $this->l10n->t('Authentication error')], 'status' => 'error']);
		}


		if ($this->appManager->isEnabledForUser('encryption')) {
			$encryptionModule = $this->encryptionManager->getEncryptionModule();

			$checkRecoveryPassword = $encryptionModule->checkRecoveryPassword($recoveryPassword,
				$username);

			if (!$checkRecoveryPassword['validRecoveryPassword']) {
				return new JSONResponse([
					'data' => [
						'message' => $this->l10n->t('Incorrect recovery password'),
					],
					'status' => 'error'
				]);
			}

			if (!$checkRecoveryPassword['recoveryEnabledForUser']) {

				return new JSONResponse([
					'data' => [
						'message' => $this->l10n->t('Recovery is not enabled for user'),
					],
					'status' => 'error'
				]);
			}

			if ($checkRecoveryPassword['recoveryEnabledForUser'] && $recoveryPassword === '') {
				return new JSONResponse(['status' => 'error', 'data' => ['message' => $this->l10n->t('Please provide an admin recovery password, otherwise all user data will be lost')]]);
			} elseif ($checkRecoveryPassword['recoveryEnabledForUser'] && !$checkRecoveryPassword['validRecoveryPassword']) {
				return new JSONResponse(['status' => 'error', 'data' => ['message' => $this->l10n->t('Wrong admin password. Please check the password and try again')]]);
			} else { // now we know that everything is fine regarding the recovery password, let's try to change the password
				$result = \OC_User::setPassword($username,
					$password,
					$recoveryPassword);
				if (!$result && $checkRecoveryPassword['recoveryEnabledForUser']) {
					return new JSONResponse(['status' => 'error', 'data' => ['message' => $this->l10n->t('Backend doesn\'t support password change, but the user\'s encryption key was successfully updated.')]]);
				} elseif (!$result && !$checkRecoveryPassword['recoveryEnabledForUser']) {
					return new JSONResponse(['status' => 'error', 'data' => ['message' => $this->l10n->t('Unable to change password')]]);
				} else {
					return new JSONResponse(['status' => 'success', 'data' => ['username' => $username]]);
				}

			}
		} else { // if encryption is disabled, proceed
			if (!is_null($password) && \OC_User::setPassword($username,
					$password)
			) {
				return new JSONResponse(['status' => 'success', 'data' => ['username' => $username]]);
			} else {
				return new JSONResponse(['status' => 'error', 'data' => ['message' => $this->l10n->t('Unable to change password')]]);
			}
		}
	}
}
