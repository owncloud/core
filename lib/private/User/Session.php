<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Felix Rupp <github@felixrupp.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\User;

use Exception;
use OC;
use OC\Authentication\Exceptions\InvalidTokenException;
use OC\Authentication\Exceptions\PasswordlessTokenException;
use OC\Authentication\Exceptions\PasswordLoginForbiddenException;
use OC\Authentication\Token\IProvider;
use OC\Authentication\Token\IToken;
use OC\HintException;
use OC\Hooks\Emitter;
use OC\Hooks\PublicEmitter;
use OC_User;
use OC_Util;
use OCA\DAV\Connector\Sabre\Auth;
use OCP\App\IServiceLoader;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Authentication\IApacheBackend;
use OCP\Authentication\IAuthModule;
use OCP\Events\EventEmitterTrait;
use OCP\Files\NoReadAccessException;
use OCP\Files\NotPermittedException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IRequest;
use OCP\ISession;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Session\Exceptions\SessionNotAvailableException;
use OCP\UserInterface;
use OCP\Util;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class Session
 *
 * Hooks available in scope \OC\User:
 * - preSetPassword(\OC\User\User $user, string $password, string $recoverPassword)
 * - postSetPassword(\OC\User\User $user, string $password, string $recoverPassword)
 * - preDelete(\OC\User\User $user)
 * - postDelete(\OC\User\User $user)
 * - preCreateUser(string $uid, string $password)
 * - postCreateUser(\OC\User\User $user)
 * - preLogin(string $user, string $password)
 * - postLogin(\OC\User\User $user, string $password)
 * - failedLogin(string $user)
 * - preRememberedLogin(string $uid)
 * - postRememberedLogin(\OC\User\User $user)
 * - logout()
 * - postLogout()
 *
 * @package OC\User
 */
class Session implements IUserSession, Emitter {
	use EventEmitterTrait;
	/** @var IUserManager | PublicEmitter $manager */
	private $manager;

	/** @var ISession $session */
	private $session;

	/** @var ITimeFactory */
	private $timeFactory;

	/** @var IProvider */
	private $tokenProvider;

	/** @var IConfig */
	private $config;

	/** @var ILogger */
	private $logger;

	/** @var User $activeUser */
	protected $activeUser;

	/** @var IServiceLoader */
	private $serviceLoader;

	/** @var SyncService */
	protected $userSyncService;

	/** @var EventDispatcher  */
	protected $eventDispatcher;

	/**
	 * @param IUserManager $manager
	 * @param ISession $session
	 * @param ITimeFactory $timeFactory
	 * @param IProvider $tokenProvider
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param IServiceLoader $serviceLoader
	 * @param SyncService $userSyncService
	 */
	public function __construct(IUserManager $manager, ISession $session,
								ITimeFactory $timeFactory, IProvider $tokenProvider,
								IConfig $config, ILogger $logger, IServiceLoader $serviceLoader,
								SyncService $userSyncService, EventDispatcher $eventDispatcher) {
		$this->manager = $manager;
		$this->session = $session;
		$this->timeFactory = $timeFactory;
		$this->tokenProvider = $tokenProvider;
		$this->config = $config;
		$this->logger = $logger;
		$this->serviceLoader = $serviceLoader;
		$this->userSyncService = $userSyncService;
		$this->eventDispatcher = $eventDispatcher;
	}

	/**
	 * @param IProvider $provider
	 */
	public function setTokenProvider(IProvider $provider) {
		$this->tokenProvider = $provider;
	}

	/**
	 * @param string $scope
	 * @param string $method
	 * @param callable $callback
	 */
	public function listen($scope, $method, callable $callback) {
		$this->manager->listen($scope, $method, $callback);
	}

	/**
	 * @param string $scope optional
	 * @param string $method optional
	 * @param callable $callback optional
	 */
	public function removeListener($scope = null, $method = null, callable $callback = null) {
		$this->manager->removeListener($scope, $method, $callback);
	}

	/**
	 * get the session object
	 *
	 * @return ISession
	 */
	public function getSession() {
		return $this->session;
	}

	/**
	 * set the session object
	 *
	 * @param ISession $session
	 */
	public function setSession(ISession $session) {
		if ($this->session instanceof ISession) {
			$this->session->close();
		}
		$this->session = $session;
		$this->activeUser = null;
	}

	/**
	 * set the currently active user
	 *
	 * @param IUser|null $user
	 */
	public function setUser($user) {
		if ($user === null) {
			$this->session->remove('user_id');
		} else {
			$this->session->set('user_id', $user->getUID());
		}
		$this->activeUser = $user;
	}

	/**
	 * Get the current active user. If user is in incognito mode, user is not
	 * considered as active
	 *
	 * @return IUser|null Current user, otherwise null
	 */
	public function getUser() {
		// FIXME: This is a quick'n dirty work-around for the incognito mode as
		// described at https://github.com/owncloud/core/pull/12912#issuecomment-67391155
		if (OC_User::isIncognitoMode()) {
			return null;
		}
		if ($this->activeUser === null) {
			$uid = $this->session->get('user_id');
			if ($uid === null) {
				return null;
			}
			$this->activeUser = $this->manager->get($uid);
			if ($this->activeUser === null) {
				return null;
			}
		}
		return $this->activeUser;
	}

	/**
	 * Validate whether the current session is valid
	 *
	 * - For token-authenticated clients, the token validity is checked
	 * - For browsers, the session token validity is checked
	 */
	public function validateSession() {
		if (!$this->getUser()) {
			return;
		}

		$token = null;
		$appPassword = $this->session->get('app_password');

		if ($appPassword === null) {
			try {
				$token = $this->session->getId();
			} catch (SessionNotAvailableException $ex) {
				return;
			}
		} else {
			$token = $appPassword;
		}

		if (!$this->validateToken($token)) {
			// Session was invalidated
			$this->logout();
		}
	}

	/**
	 * Checks whether the user is logged in
	 *
	 * @return bool if logged in
	 */
	public function isLoggedIn() {
		$user = $this->getUser();
		if ($user === null) {
			return false;
		}

		return $user->isEnabled();
	}

	/**
	 * set the login name
	 *
	 * @param string|null $loginName for the logged in user
	 */
	public function setLoginName($loginName) {
		if ($loginName === null) {
			$this->session->remove('loginname');
		} else {
			$this->session->set('loginname', $loginName);
		}
	}

	/**
	 * get the login name of the current user
	 *
	 * @return string
	 */
	public function getLoginName() {
		if ($this->activeUser) {
			return $this->session->get('loginname');
		}

		$uid = $this->session->get('user_id');
		if ($uid) {
			$this->activeUser = $this->manager->get($uid);
			return $this->session->get('loginname');
		}

		return null;
	}

	/**
	 * try to log in with the provided credentials
	 *
	 * @param string $uid
	 * @param string $password
	 * @return boolean|null
	 * @throws LoginException
	 */
	public function login($uid, $password) {
		$this->session->regenerateId();

		if ($this->validateToken($password, $uid)) {
			return $this->loginWithToken($password);
		}
		return $this->loginWithPassword($uid, $password);
	}

	/**
	 * Tries to log in a client
	 *
	 * Checks token auth enforced
	 * Checks 2FA enabled
	 *
	 * @param string $user
	 * @param string $password
	 * @param IRequest $request
	 * @throws \InvalidArgumentException
	 * @throws LoginException
	 * @throws PasswordLoginForbiddenException
	 * @return boolean
	 */
	public function logClientIn($user, $password, IRequest $request) {
		$isTokenPassword = $this->isTokenPassword($password);
		if ($user === null || \trim($user) === '') {
			throw new \InvalidArgumentException('$user cannot be empty');
		}
		if (!$isTokenPassword && $this->isTokenAuthEnforced()) {
			throw new PasswordLoginForbiddenException();
		}
		if (!$isTokenPassword && $this->isTwoFactorEnforced($user)) {
			throw new PasswordLoginForbiddenException();
		}
		if (!$this->login($user, $password)) {
			$users = $this->manager->getByEmail($user);
			if (\count($users) === 1) {
				return $this->login($users[0]->getUID(), $password);
			}
			return false;
		}

		if ($isTokenPassword) {
			$this->session->set('app_password', $password);
		} elseif ($this->supportsCookies($request)) {
			// Password login, but cookies supported -> create (browser) session token
			$this->createSessionToken($request, $this->getUser()->getUID(), $user, $password);
		}

		return true;
	}

	protected function supportsCookies(IRequest $request) {
		if ($request->getCookie('cookie_test') !== null) {
			return true;
		}
		\setcookie('cookie_test', 'test', $this->timeFactory->getTime() + 3600);
		return false;
	}

	private function isTokenAuthEnforced() {
		return $this->config->getSystemValue('token_auth_enforced', false);
	}

	protected function isTwoFactorEnforced($username) {
		Util::emitHook(
			'\OCA\Files_Sharing\API\Server2Server',
			'preLoginNameUsedAsUserName',
			['uid' => &$username]
		);
		$user = $this->manager->get($username);
		if ($user === null) {
			$users = $this->manager->getByEmail($username);
			if (empty($users)) {
				return false;
			}
			if (\count($users) !== 1) {
				return true;
			}
			$user = $users[0];
		}
		// DI not possible due to cyclic dependencies :'-/
		return OC::$server->getTwoFactorAuthManager()->isTwoFactorAuthenticated($user);
	}

	/**
	 * Check if the given 'password' is actually a device token
	 *
	 * @param string $password
	 * @return boolean
	 */
	public function isTokenPassword($password) {
		try {
			$this->tokenProvider->getToken($password);
			return true;
		} catch (InvalidTokenException $ex) {
			return false;
		}
	}

	/**
	 * Unintentional public
	 *
	 * @param bool $firstTimeLogin
	 */
	public function prepareUserLogin($firstTimeLogin = false) {
		// TODO: mock/inject/use non-static
		// Refresh the token
		\OC::$server->getCsrfTokenManager()->refreshToken();
		//we need to pass the user name, which may differ from login name
		$user = $this->getUser()->getUID();
		OC_Util::setupFS($user);

		if ($firstTimeLogin) {
			// TODO: lock necessary?
			//trigger creation of user home and /files folder
			$userFolder = \OC::$server->getUserFolder($user);

			try {
				// copy skeleton
				\OC_Util::copySkeleton($user, $userFolder);
			} catch (NotPermittedException $ex) {
				// possible if files directory is in an readonly jail
				$this->logger->warning(
					'Skeleton not created due to missing write permission'
				);
			} catch (NoReadAccessException $ex) {
				// possible if the skeleton directory does not have read access
				$this->logger->warning(
					'Skeleton not created due to missing read permission in skeleton directory'
				);
			} catch (HintException $hintEx) {
				// only if Skeleton no existing Dir
				$this->logger->error($hintEx->getMessage());
			}

			// trigger any other initialization
			$this->eventDispatcher->dispatch(IUser::class . '::firstLogin', new GenericEvent($this->getUser()));
		}
	}

	/**
	 * Tries to login the user with HTTP Basic Authentication
	 *
	 * @todo do not allow basic auth if the user is 2FA enforced
	 * @param IRequest $request
	 * @return boolean if the login was successful
	 */
	public function tryBasicAuthLogin(IRequest $request) {
		if (!empty($request->server['PHP_AUTH_USER']) && !empty($request->server['PHP_AUTH_PW'])) {
			try {
				if ($this->logClientIn($request->server['PHP_AUTH_USER'], $request->server['PHP_AUTH_PW'], $request)) {
					/**
					 * Add DAV authenticated. This should in an ideal world not be
					 * necessary but the iOS App reads cookies from anywhere instead
					 * only the DAV endpoint.
					 * This makes sure that the cookies will be valid for the whole scope
					 * @see https://github.com/owncloud/core/issues/22893
					 */
					$this->session->set(
						Auth::DAV_AUTHENTICATED, $this->getUser()->getUID()
					);
					return true;
				}
			} catch (PasswordLoginForbiddenException $ex) {
				// Nothing to do
			}
		}
		return false;
	}

	/**
	 * Log an user in via login name and password
	 *
	 * @param string $uid
	 * @param string $password
	 * @return boolean
	 * @throws LoginException if an app canceld the login process or the user is not enabled
	 */
	private function loginWithPassword($uid, $password) {
		return $this->emittingCall(function () use (&$uid, &$password) {
			$this->manager->emit('\OC\User', 'preLogin', [$uid, $password]);
			$user = $this->manager->checkPassword($uid, $password);
			if ($user === false) {
				$this->manager->emit('\OC\User', 'failedLogin', [$uid]);
				$this->emitFailedLogin($uid);
				return false;
			}

			if ($user->isEnabled()) {
				$this->setUser($user);
				$this->setLoginName($uid);
				$firstTimeLogin = $user->updateLastLoginTimestamp();
				$this->manager->emit('\OC\User', 'postLogin', [$user, $password]);
				if ($this->isLoggedIn()) {
					$this->prepareUserLogin($firstTimeLogin);
					return true;
				} else {
					// injecting l10n does not work - there is a circular dependency between session and \OCP\L10N\IFactory
					$message = \OC::$server->getL10N('lib')->t('Login canceled by app');
					throw new LoginException($message);
				}
			} else {
				// injecting l10n does not work - there is a circular dependency between session and \OCP\L10N\IFactory
				$message = \OC::$server->getL10N('lib')->t('User disabled');
				throw new LoginException($message);
			}
		}, ['before' => ['uid' => $uid, 'password' => $password], 'after' => ['uid' => $uid, 'password' => $password]], 'user', 'login');
	}

	/**
	 * Log an user in with a given token (id)
	 *
	 * @param string $token
	 * @return boolean
	 * @throws LoginException if an app canceld the login process or the user is not enabled
	 */
	private function loginWithToken($token) {
		try {
			$dbToken = $this->tokenProvider->getToken($token);
		} catch (InvalidTokenException $ex) {
			return false;
		}
		$uid = $dbToken->getUID();

		// When logging in with token, the password must be decrypted first before passing to login hook
		$password = '';
		try {
			$password = $this->tokenProvider->getPassword($dbToken, $token);
		} catch (PasswordlessTokenException $ex) {
			// Ignore and use empty string instead
		}

		$this->manager->emit('\OC\User', 'preLogin', [$uid, $password]);

		$user = $this->manager->get($uid);
		if ($user === null) {
			// user does not exist
			$this->emitFailedLogin($uid);
			return false;
		}
		if (!$user->isEnabled()) {
			// disabled users can not log in
			// injecting l10n does not work - there is a circular dependency between session and \OCP\L10N\IFactory
			$message = \OC::$server->getL10N('lib')->t('User disabled');
			throw new LoginException($message);
		}

		//login
		$this->setUser($user);
		$this->setLoginName($dbToken->getLoginName());
		$this->manager->emit('\OC\User', 'postLogin', [$user, $password]);

		if ($this->isLoggedIn()) {
			$this->prepareUserLogin();
		} else {
			// injecting l10n does not work - there is a circular dependency between session and \OCP\L10N\IFactory
			$message = \OC::$server->getL10N('lib')->t('Login canceled by app');
			throw new LoginException($message);
		}

		// set the app password
		$this->session->set('app_password', $token);

		return true;
	}

	/**
	 * Try to login a user, assuming authentication
	 * has already happened (e.g. via Single Sign On).
	 *
	 * Log in a user and regenerate a new session.
	 *
	 * @param \OCP\Authentication\IApacheBackend $apacheBackend
	 * @return bool
	 * @throws LoginException
	 */
	public function loginWithApache(IApacheBackend $apacheBackend) {
		$uidAndBackend = $apacheBackend->getCurrentUserId();
		if (\is_array($uidAndBackend)
			&& \count($uidAndBackend) === 2
			&& $uidAndBackend[0] !== ''
			&& $uidAndBackend[0] !== null
			&& $uidAndBackend[1] instanceof UserInterface
		) {
			list($uid, $backend) = $uidAndBackend;
		} elseif (\is_string($uidAndBackend)) {
			$uid = $uidAndBackend;
			if ($apacheBackend instanceof UserInterface) {
				$backend = $apacheBackend;
			} else {
				$this->logger->error('Apache backend failed to provide a valid backend for the user');
				return false;
			}
		} else {
			$this->logger->debug('No valid user detected from apache user backend');
			return false;
		}

		if ($this->getUser() !== null && $uid === $this->getUser()->getUID()) {
			return true; // nothing to do
		}
		$this->session->regenerateId();

		$this->manager->emit('\OC\User', 'preLogin', [$uid, '']);

		// Die here if not valid
		if (!$apacheBackend->isSessionActive()) {
			return false;
		}

		// Now we try to create the account or sync
		$this->userSyncService->createOrSyncAccount($uid, $backend);

		$user = $this->manager->get($uid);
		if ($user === null) {
			$this->manager->emit('\OC\User', 'failedLogin', [$uid]);
			$this->emitFailedLogin($uid);
			return false;
		}

		if ($user->isEnabled()) {
			$this->setUser($user);
			$this->setLoginName($uid);

			$request = OC::$server->getRequest();
			$this->createSessionToken($request, $uid, $uid);

			// setup the filesystem
			OC_Util::setupFS($uid);
			// first call the post_login hooks, the login-process needs to be
			// completed before we can safely create the users folder.
			// For example encryption needs to initialize the users keys first
			// before we can create the user folder with the skeleton files

			$firstTimeLogin = $user->updateLastLoginTimestamp();
			$this->manager->emit('\OC\User', 'postLogin', [$user, '']);
			if ($this->isLoggedIn()) {
				$this->prepareUserLogin($firstTimeLogin);
				return true;
			} else {
				// injecting l10n does not work - there is a circular dependency between session and \OCP\L10N\IFactory
				$message = \OC::$server->getL10N('lib')->t('Login canceled by app');
				throw new LoginException($message);
			}
		} else {
			// injecting l10n does not work - there is a circular dependency between session and \OCP\L10N\IFactory
			$message = \OC::$server->getL10N('lib')->t('User disabled');
			throw new LoginException($message);
		}
	}

	/**
	 * Create a new session token for the given user credentials
	 *
	 * @param IRequest $request
	 * @param string $uid user UID
	 * @param string $loginName login name
	 * @param string $password
	 * @return boolean
	 */
	public function createSessionToken(IRequest $request, $uid, $loginName, $password = null) {
		if ($this->manager->get($uid) === null) {
			// User does not exist
			return false;
		}
		$name = isset($request->server['HTTP_USER_AGENT']) ? $request->server['HTTP_USER_AGENT'] : 'unknown browser';
		try {
			$sessionId = $this->session->getId();
			$pwd = $this->getPassword($password);
			$this->tokenProvider->generateToken($sessionId, $uid, $loginName, $pwd, $name);
			return true;
		} catch (SessionNotAvailableException $ex) {
			// This can happen with OCC, where a memory session is used
			// if a memory session is used, we shouldn't create a session token anyway
			return false;
		}
	}

	/**
	 * Checks if the given password is a token.
	 * If yes, the password is extracted from the token.
	 * If no, the same password is returned.
	 *
	 * @param string $password either the login password or a device token
	 * @return string|null the password or null if none was set in the token
	 */
	private function getPassword($password) {
		if ($password === null) {
			// This is surely no token ;-)
			return null;
		}
		try {
			$token = $this->tokenProvider->getToken($password);
			try {
				return $this->tokenProvider->getPassword($token, $password);
			} catch (PasswordlessTokenException $ex) {
				return null;
			}
		} catch (InvalidTokenException $ex) {
			return $password;
		}
	}

	/**
	 * @param IToken $dbToken
	 * @param string $token
	 * @return boolean
	 */
	private function checkTokenCredentials(IToken $dbToken, $token) {
		// Check whether login credentials are still valid and the user was not disabled
		// This check is performed each 5 minutes per default
		// However, we try to read last_check_timeout from the appconfig table so the
		// administrator could change this 5 minutes timeout
		$lastCheck = $dbToken->getLastCheck() ? : 0;
		$now = $this->timeFactory->getTime();
		$last_check_timeout = (int)$this->config->getAppValue('core', 'last_check_timeout', 5);
		if ($lastCheck > ($now - 60 * $last_check_timeout)) {
			// Checked performed recently, nothing to do now
			return true;
		}

		try {
			$pwd = $this->tokenProvider->getPassword($dbToken, $token);
		} catch (InvalidTokenException $ex) {
			// An invalid token password was used -> log user out
			return false;
		} catch (PasswordlessTokenException $ex) {
			// Token has no password

			if ($this->activeUser !== null && !$this->activeUser->isEnabled()) {
				$this->tokenProvider->invalidateToken($token);
				return false;
			}

			$dbToken->setLastCheck($now);
			$this->tokenProvider->updateToken($dbToken);
			return true;
		}

		if ($this->manager->checkPassword($dbToken->getLoginName(), $pwd) === false
			|| ($this->activeUser !== null && !$this->activeUser->isEnabled())) {
			$this->tokenProvider->invalidateToken($token);
			// Password has changed or user was disabled -> log user out
			return false;
		}
		$dbToken->setLastCheck($now);
		$this->tokenProvider->updateToken($dbToken);
		return true;
	}

	/**
	 * Check if the given token exists and performs password/user-enabled checks
	 *
	 * Invalidates the token if checks fail
	 *
	 * @param string $token
	 * @param string $user login name
	 * @return boolean
	 */
	private function validateToken($token, $user = null) {
		try {
			$dbToken = $this->tokenProvider->getToken($token);
		} catch (InvalidTokenException $ex) {
			return false;
		}

		// Check if login names match
		if ($user !== null && $dbToken->getLoginName() !== $user) {
			// TODO: this makes it impossible to use different login names on browser and client
			// e.g. login by e-mail 'user@example.com' on browser for generating the token will not
			//      allow to use the client token with the login name 'user'.
			return false;
		}

		if (!$this->checkTokenCredentials($dbToken, $token)) {
			return false;
		}

		$this->tokenProvider->updateTokenActivity($dbToken);

		return true;
	}

	/**
	 * Tries to login the user with auth token header
	 *
	 * @param IRequest $request
	 * @todo check remember me cookie
	 * @return boolean
	 */
	public function tryTokenLogin(IRequest $request) {
		$authHeader = $request->getHeader('Authorization');
		if ($authHeader === null || \strpos($authHeader, 'token ') === false) {
			// No auth header, let's try session id
			try {
				$token = $this->session->getId();
			} catch (SessionNotAvailableException $ex) {
				return false;
			}
		} else {
			$token = \substr($authHeader, 6);
		}

		if (!$this->loginWithToken($token)) {
			return false;
		}
		if (!$this->validateToken($token)) {
			return false;
		}
		return true;
	}

	/**
	 * Tries to login with an AuthModule provided by an app
	 *
	 * @param IRequest $request The request
	 * @return bool True if request can be authenticated, false otherwise
	 * @throws Exception If the auth module could not be loaded
	 */
	public function tryAuthModuleLogin(IRequest $request) {
		foreach ($this->getAuthModules(false) as $authModule) {
			$user = $authModule->auth($request);
			if ($user !== null) {
				$uid = $user->getUID();
				$password = $authModule->getUserPassword($request);
				$this->createSessionToken($request, $uid, $uid, $password);
				return $this->loginUser($user, $password);
			}
		}

		return false;
	}

	/**
	 * Log an user in
	 *
	 * @param IUser $user The user
	 * @param String $password The user's password
	 * @return boolean True if the user can be authenticated, false otherwise
	 * @throws LoginException if an app canceld the login process or the user is not enabled
	 */
	protected function loginUser($user, $password) {
		return $this->emittingCall(function () use (&$user, &$password) {
			if ($user === null) {
				//Cannot extract the uid when $user is null, hence pass null
				$this->emitFailedLogin(null);
				return false;
			}

			$this->manager->emit('\OC\User', 'preLogin', [$user, $password]);

			if (!$user->isEnabled()) {
				$message = \OC::$server->getL10N('lib')->t('User disabled');
				$this->emitFailedLogin($user->getUID());
				throw new LoginException($message);
			}

			$this->setUser($user);
			$this->setLoginName($user->getDisplayName());

			$this->manager->emit('\OC\User', 'postLogin', [$user, $password]);

			if ($this->isLoggedIn()) {
				$this->prepareUserLogin();
			} else {
				$message = \OC::$server->getL10N('lib')->t('Login canceled by app');
				throw new LoginException($message);
			}

			return true;
		}, ['before' => ['uid' => $user, 'password' => $password], 'after' => ['uid' => $user, 'password' => $password]], 'user', 'login');
	}

	/**
	 * perform login using the magic cookie (remember login)
	 *
	 * @param string $uid the username
	 * @param string $currentToken
	 * @return bool
	 */
	public function loginWithCookie($uid, $currentToken) {
		$this->session->regenerateId();
		$this->manager->emit('\OC\User', 'preRememberedLogin', [$uid]);
		$user = $this->manager->get($uid);
		if ($user === null) {
			// user does not exist
			return false;
		}

		// get stored tokens
		$tokens = OC::$server->getConfig()->getUserKeys($uid, 'login_token');
		// test cookies token against stored tokens
		if (!\in_array($currentToken, $tokens, true)) {
			$this->emitFailedLogin($uid);
			return false;
		}
		// replace successfully used token with a new one
		OC::$server->getConfig()->deleteUserValue($uid, 'login_token', $currentToken);
		$newToken = OC::$server->getSecureRandom()->generate(32);
		OC::$server->getConfig()->setUserValue($uid, 'login_token', $newToken, \time());
		$this->setMagicInCookie($user->getUID(), $newToken);

		//login
		$this->setUser($user);
		$user->updateLastLoginTimestamp();
		$this->manager->emit('\OC\User', 'postRememberedLogin', [$user]);
		return true;
	}

	/**
	 * logout the user from the session
	 *
	 * @return bool
	 */
	public function logout() {
		return $this->emittingCall(function () {
			$event = new GenericEvent(null, ['cancel' => false]);
			$this->eventDispatcher->dispatch('\OC\User\Session::pre_logout', $event);

			$this->manager->emit('\OC\User', 'preLogout');

			if ($event['cancel'] === true) {
				return true;
			}

			$this->manager->emit('\OC\User', 'logout');
			$user = $this->getUser();
			if ($user !== null) {
				try {
					$this->tokenProvider->invalidateToken($this->session->getId());
				} catch (SessionNotAvailableException $ex) {
				}
			}
			$this->setUser(null);
			$this->setLoginName(null);
			$this->unsetMagicInCookie();
			$this->session->clear();
			$this->manager->emit('\OC\User', 'postLogout');
			return true;
		}, ['before' => ['uid' => ''], 'after' => ['uid' => '']], 'user', 'logout');
	}

	/**
	 * Set cookie value to use in next page load
	 *
	 * @param string $username username to be set
	 * @param string $token
	 */
	public function setMagicInCookie($username, $token) {
		$secureCookie = OC::$server->getRequest()->getServerProtocol() === 'https';
		$expires = \time() + OC::$server->getConfig()->getSystemValue('remember_login_cookie_lifetime', 60 * 60 * 24 * 15);
		\setcookie('oc_username', $username, $expires, OC::$WEBROOT, '', $secureCookie, true);
		\setcookie('oc_token', $token, $expires, OC::$WEBROOT, '', $secureCookie, true);
		\setcookie('oc_remember_login', '1', $expires, OC::$WEBROOT, '', $secureCookie, true);
	}

	/**
	 * Remove cookie for "remember username"
	 */
	public function unsetMagicInCookie() {
		//TODO: DI for cookies and IRequest
		$secureCookie = OC::$server->getRequest()->getServerProtocol() === 'https';

		unset($_COOKIE['oc_username'], $_COOKIE['oc_token'], $_COOKIE['oc_remember_login']); //TODO: DI

		\setcookie('oc_username', '', \time() - 3600, OC::$WEBROOT, '', $secureCookie, true);
		\setcookie('oc_token', '', \time() - 3600, OC::$WEBROOT, '', $secureCookie, true);
		\setcookie('oc_remember_login', '', \time() - 3600, OC::$WEBROOT, '', $secureCookie, true);
		// old cookies might be stored under /webroot/ instead of /webroot
		// and Firefox doesn't like it!
		\setcookie('oc_username', '', \time() - 3600, OC::$WEBROOT . '/', '', $secureCookie, true);
		\setcookie('oc_token', '', \time() - 3600, OC::$WEBROOT . '/', '', $secureCookie, true);
		\setcookie('oc_remember_login', '', \time() - 3600, OC::$WEBROOT . '/', '', $secureCookie, true);
	}

	/**
	 * Update password of the browser session token if there is one
	 *
	 * @param string $password
	 */
	public function updateSessionTokenPassword($password) {
		try {
			$sessionId = $this->session->getId();
			$token = $this->tokenProvider->getToken($sessionId);
			$this->tokenProvider->setPassword($token, $sessionId, $password);
		} catch (SessionNotAvailableException $ex) {
			// Nothing to do
		} catch (InvalidTokenException $ex) {
			// Nothing to do
		}
	}

	public function verifyAuthHeaders($request) {
		$shallLogout = false;
		try {
			$lastUser = null;
			foreach ($this->getAuthModules(true) as $module) {
				$user = $module->auth($request);
				if ($user !== null) {
					if ($this->isLoggedIn() && $this->getUser()->getUID() !== $user->getUID()) {
						$shallLogout = true;
						break;
					}
					if ($lastUser !== null && $user->getUID() !== $lastUser->getUID()) {
						$shallLogout = true;
						break;
					}
					$lastUser = $user;
				}
			}
		} catch (Exception $ex) {
			$shallLogout = true;
		}
		if ($shallLogout) {
			// the session is bad -> kill it
			$this->logout();
			return false;
		}
		return true;
	}

	/**
	 * @param $includeBuiltIn
	 * @return \Generator | IAuthModule[]
	 * @throws Exception
	 */
	protected function getAuthModules($includeBuiltIn) {
		if ($includeBuiltIn) {
			yield new TokenAuthModule($this->session, $this->tokenProvider, $this->manager);
		}

		$modules = $this->serviceLoader->load(['auth-modules']);
		foreach ($modules as $module) {
			if ($module instanceof IAuthModule) {
				yield $module;
			} else {
				continue;
			}
		}

		if ($includeBuiltIn) {
			yield new BasicAuthModule($this->config, $this->logger, $this->manager, $this->session, $this->timeFactory);
		}
	}

	/**
	 * This method triggers symfony event for failed login
	 * @param string $user
	 */
	protected function emitFailedLogin($user) {
		$loginFailedEvent = new GenericEvent(null, ['user' => $user]);
		$this->eventDispatcher->dispatch('user.loginfailed', $loginFailedEvent);
	}
}
