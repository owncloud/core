<?php
/**
 * @author Lukas Reschke
 * @copyright 2014 Lukas Reschke lukas@owncloud.com
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Settings\Controller;

use OC\AppFramework\Http;
use OC\User\Manager;
use OC\User\Session;
use OCP\AppFramework\Controller;
use OCP\IConfig;
use OCP\IRequest;
use ZxcvbnPhp\Zxcvbn;
use OCP\AppFramework\Http\JSONResponse;

class ChangePasswordController extends Controller {

	private $userManager;
	private $l10n;
	private $config;
	private $userSession;
	private $groupManager;

	public function __construct($appName,
								IRequest $request,
								Manager $userManager,
								\OC_L10N $l10n,
								IConfig $config,
								Session $userSession,
								\OC\Group\Manager $groupManager) {
		parent::__construct($appName, $request);

		$this->userManager = $userManager;
		$this->l10n = $l10n;
		$this->config = $config;
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
	}

	/**
	 * User wants to change his own password
	 *
	 * @NoAdminRequired
	 *
	 * @param string $newPassword
	 * @param string $oldPassword
	 * @return JSONResponse
	 */
	public function changePersonalPassword($newPassword, $oldPassword) {
		if($newPassword === '' || $oldPassword === '') {
			$jsonArray = array(
				'message' => (string) $this->l10n->t('Please provide your old and new password.')
			);
			return new JSONResponse($jsonArray);
		}

		$username = $this->userSession->getLoginName();

		if($this->userManager->checkPassword($username, $oldPassword) === false) {
			$jsonArray = array(
				'message' => (string) $this->l10n->t('Wrong password.')
			);
			return new JSONResponse($jsonArray);
		}

		$strengEstimator = new Zxcvbn();
		$strength = $strengEstimator->passwordStrength($newPassword);

		if($strength['score'] < $this->config->getSystemValue('min_password_strength', 2)) {
			$jsonArray = array(
				'message' => (string) $this->l10n->t('Password is not strong enough. Password has not been changed.')
			);
			return new JSONResponse($jsonArray);
		}

		try {
			$this->userManager->setPassword($username, $newPassword);
			return new JSONResponse(array('status' => 'success'));
		} catch (\Exception $e) {
			return new JSONResponse(array('status' => 'error'));
		}
	}

	/**
	 * Admin or subadmin wants to change password of a user
	 *
	 * @NoAdminRequired
	 *
	 * @param string $username
	 * @param string $password
	 * @return JSONResponse
	 */
	public function changeUserPassword($username, $password) {
		if($username === '' || $password=== '') {
			$jsonArray = array(
				'message' => (string) $this->l10n->t('No username or password supplied.')
			);
			return new JSONResponse($jsonArray);
		}

		$currentUser = $this->userSession->getLoginName();

		if ($this->userSession->isAdmin() === false && \OC_SubAdmin::isUserAccessible($currentUser, $username) === false) {
			$jsonArray = array(
				'message' => (string) $this->l10n->t('Authentication error')
			);
			return new JSONResponse($jsonArray);
		}

		try {
			$this->userManager->setPassword($username, $password);
			return new JSONResponse(array('status' => 'success'));
		} catch (\Exception $e) {
			return new JSONResponse(array('status' => 'error'));
		}
	}
}
