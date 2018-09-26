<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OC\Core\Controller;

use OC\AppFramework\Http;
use OC\User\Service\UserSendMailService;
use \OCP\AppFramework\Controller;
use \OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IL10N;
use OCP\ILogger;
use \OCP\IRequest;
use OCP\IURLGenerator;
use OCP\User\Exceptions\EmailSendFailedException;
use OCP\User\Exceptions\UserTokenException;
use OCP\User\Exceptions\UserTokenExpiredException;

class UserController extends Controller {
	/**
	 * @var \OCP\IUserManager
	 */
	protected $userManager;

	/**
	 * @var \OC_Defaults
	 */
	protected $defaults;
	/** @var UserSendMailService  */
	private $userSendMailService;
	/** @var IURLGenerator  */
	private $urlGenerator;
	/** @var ILogger  */
	private $log;
	/** @var IL10N  */
	private $l10n;

	/**
	 * UserController constructor.
	 *
	 * @param $appName
	 * @param IRequest $request
	 * @param $userManager
	 * @param $defaults
	 * @param UserSendMailService $userSendMailService
	 * @param IURLGenerator $urlGenerator
	 * @param ILogger $log
	 * @param IL10N $l10n
	 */
	public function __construct($appName,
								IRequest $request,
								$userManager,
								$defaults,
								UserSendMailService $userSendMailService,
								IURLGenerator $urlGenerator,
								ILogger $log,
								IL10N $l10n
	) {
		parent::__construct($appName, $request);
		$this->userManager = $userManager;
		$this->defaults = $defaults;
		$this->userSendMailService = $userSendMailService;
		$this->urlGenerator = $urlGenerator;
		$this->log = $log;
		$this->l10n = $l10n;
	}

	/**
	 * Lookup user display names
	 *
	 * @NoAdminRequired
	 *
	 * @param array $users
	 *
	 * @return JSONResponse
	 */
	public function getDisplayNames($users) {
		$result = [];

		foreach ($users as $user) {
			$userObject = $this->userManager->get($user);
			if (\is_object($userObject)) {
				$result[$user] = $userObject->getDisplayName();
			} else {
				$result[$user] = $user;
			}
		}

		$json = [
			'users' => $result,
			'status' => 'success'
		];

		return new JSONResponse($json);
	}

	/**
	 * Set password for user using link
	 *
	 * @PublicPage
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @NoSubadminRequired
	 *
	 * @param string $token
	 * @param string $userId
	 * @return TemplateResponse
	 */
	public function setPasswordForm($token, $userId) {
		try {
			$user = $this->userManager->get($userId);
			$this->userSendMailService->checkPasswordSetToken($token, $user);
		} catch (UserTokenException $e) {
			if ($e instanceof UserTokenExpiredException) {
				return new TemplateResponse(
					'core', 'new_user/resendtokenbymail',
					[
						'link' => $this->urlGenerator->linkToRouteAbsolute('core.user.resendToken', ['userId' => $userId])
					], 'guest'
				);
			}
			$this->log->logException($e, ['app' => 'core']);
			return new TemplateResponse(
				'core', 'error',
				[
					"errors" => [["error" => $this->l10n->t($e->getMessage())]]
				], 'guest'
			);
		}

		return new TemplateResponse(
			'core', 'new_user/setpassword',
			[
				'link' => $this->urlGenerator->linkToRouteAbsolute('core.user.setPassword', ['userId' => $userId, 'token' => $token])
			], 'guest'
		);
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @NoSubadminRequired
	 *
	 * @param string $userId
	 * @return TemplateResponse
	 */
	public function resendToken($userId) {
		$user = $this->userManager->get($userId);

		if ($user === null) {
			$this->log->error('User: ' . $userId . ' does not exist', ['app' => 'core']);
			return new TemplateResponse(
				'core', 'error',
				[
					"errors" => [["error" => $this->l10n->t('Failed to create activation link. Please contact your administrator.')]]
				],
				'guest'
			);
		}

		if ($user->getEMailAddress() === null) {
			$this->log->error('Email address not set for: ' . $userId, ['app' => 'core']);
			return new TemplateResponse(
				'core', 'error',
				[
					"errors" => [["error" => $this->l10n->t('Failed to create activation link. Please contact your administrator.', [$userId])]]
				],
				'guest'
			);
		}

		try {
			$this->userSendMailService->generateTokenAndSendMail($user->getUID(), $user->getEMailAddress());
		} catch (\Exception $e) {
			$this->log->error("Can't send new user mail to " . $user->getEMailAddress() . ": " . $e->getMessage(), ['app' => 'core']);
			return new TemplateResponse(
				'core', 'error',
				[
					"errors" => [[
						"error" => $this->l10n->t('Can\'t send email to the user. Contact your administrator.')]]
				], 'guest'
			);
		}

		return new TemplateResponse(
			'core', 'new_user/tokensendnotify', [], 'guest'
		);
	}

	/**
	 * @PublicPage
	 * @NoAdminRequired
	 * @NoSubadminRequired
	 * @NoCSRFRequired
	 *
	 * @param string $token
	 * @param string $userId
	 * @param string $password
	 * @return JSONResponse
	 */
	public function setPassword($token, $userId, $password) {
		$user = $this->userManager->get($userId);

		if ($user === null) {
			$this->log->error('User: ' . $userId . ' does not exist.', ['app' => 'core']);
			return new JSONResponse(
				[
					'status' => 'error',
					'message' => $this->l10n->t('Failed to set password. Please contact the administrator.', [$userId]),
					'type' => 'usererror'
				], Http::STATUS_NOT_FOUND
			);
		}

		try {
			$this->userSendMailService->checkPasswordSetToken($token, $user);

			if (!$user->setPassword($password)) {
				$this->log->error('The password can not be set for user: '. $userId);
				return new JSONResponse(
					[
						'status' => 'error',
						'message' => $this->l10n->t('Failed to set password. Please contact your administrator.', [$userId]),
						'type' => 'passwordsetfailed'
					], Http::STATUS_FORBIDDEN
				);
			}

			\OC_Hook::emit('\OC\Core\LostPassword\Controller\LostController', 'post_passwordReset', ['uid' => $userId, 'password' => $password]);
			@\OC_User::unsetMagicInCookie();
		} catch (UserTokenException $e) {
			$this->log->logException($e, ['app' => 'core']);
			return new JSONResponse(
				[
					'status' => 'error',
					'message' => $e->getMessage(),
					'type' => 'tokenfailure'
				], Http::STATUS_UNAUTHORIZED
			);
		}

		try {
			$this->userSendMailService->sendNotificationMail($user);
		} catch (EmailSendFailedException $e) {
			$this->log->logException($e, ['app' => 'user_management']);
			return new JSONResponse(
				[
					'status' => 'error',
					'message' => $this->l10n->t('Failed to send email. Please contact your administrator.'),
					'type' => 'emailsendfailed'
				], Http::STATUS_INTERNAL_SERVER_ERROR
			);
		}

		return new JSONResponse(['status' => 'success']);
	}
}
