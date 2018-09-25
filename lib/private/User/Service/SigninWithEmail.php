<?php
/**
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

namespace OC\User\Service;

use OC\AppFramework\Http;
use OC\User\User;
use OCP\App\IAppManager;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IAvatarManager;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use OCP\Util;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class SigninWithEmail {
	/** @var IUserSession */
	private $userSession;

	/** @var IGroupManager */
	private $groupManager;

	/** @var IURLGenerator */
	private $urlGenerator;

	/** @var IUserManager */
	private $userManager;

	/** @var ISecureRandom */
	private $secureRandom;

	/** @var \OC_Defaults */
	private $defaults;

	/** @var ITimeFactory */
	private $timeFactory;

	/** @var IMailer */
	private $mailer;

	/** @var IL10N */
	private $l10n;

	/** @var ILogger */
	private $log;

	/** @var IConfig */
	private $config;

	/** @var IAppManager */
	private $appManager;

	/** @var EventDispatcherInterface  */
	private $eventDispatcher;

	/** @var bool */
	private $isAdmin;

	/** @var string */
	private $fromMailAddress;

	/** @var bool */
	private $isEncryptionAppEnabled;

	/**
	 * SigninWithEmail constructor.
	 *
	 * @param IUserSession $userSession
	 * @param IGroupManager $groupManager
	 * @param IURLGenerator $urlGenerator
	 * @param IUserManager $userManager
	 * @param ISecureRandom $secureRandom
	 * @param \OC_Defaults $defaults
	 * @param ITimeFactory $timeFactory
	 * @param IMailer $mailer
	 * @param IL10N $l10n
	 * @param ILogger $log
	 * @param IConfig $config
	 * @param IAppManager $appManager
	 * @param IAvatarManager $avatarManager
	 * @param EventDispatcherInterface $eventDispatcher
	 */
	public function __construct(IUserSession $userSession, IGroupManager $groupManager,
								IURLGenerator $urlGenerator, IUserManager $userManager,
								ISecureRandom $secureRandom, \OC_Defaults $defaults,
								ITimeFactory $timeFactory, IMailer $mailer, IL10N $l10n,
								ILogger $log, IConfig $config, IAppManager $appManager,
								IAvatarManager $avatarManager,
								EventDispatcherInterface $eventDispatcher) {
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
		$this->urlGenerator = $urlGenerator;
		$this->userManager = $userManager;
		$this->secureRandom = $secureRandom;
		$this->defaults = $defaults;
		$this->timeFactory = $timeFactory;
		$this->mailer = $mailer;
		$this->l10n = $l10n;
		$this->log = $log;
		$this->config = $config;
		$this->appManager = $appManager;
		$this->avatarManager = $avatarManager;
		$this->eventDispatcher = $eventDispatcher;
		$this->isAdmin = $this->isAdmin();
		$this->fromMailAddress = Util::getDefaultEmailAddress('no-reply');

		// check for encryption state - TODO see formatUserForIndex
		$this->isEncryptionAppEnabled = $appManager->isEnabledForUser('encryption');
		if ($this->isEncryptionAppEnabled) {
			// putting this directly in empty is possible in PHP 5.5+
			$result = $config->getAppValue('encryption', 'recoveryAdminEnabled', 0);
			$this->isRestoreEnabled = !empty($result);
		}
	}

	/**
	 * @param $username
	 * @param $password
	 * @param array $groups
	 * @param string $email
	 * @return DataResponse
	 */
	public function create($username, $password, array $groups= [], $email='') {
		if ($email !== '' && !$this->mailer->validateMailAddress($email)) {
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Invalid mail address')
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}

		$currentUser = $this->userSession->getUser();

		if (!$this->isAdmin) {
			if (!empty($groups)) {
				foreach ($groups as $key => $group) {
					$groupObject = $this->groupManager->get($group);
					if ($groupObject === null) {
						unset($groups[$key]);
						continue;
					}

					if (!$this->groupManager->getSubAdmin()->isSubAdminofGroup($currentUser, $groupObject)) {
						unset($groups[$key]);
					}
				}
			}

			if (empty($groups)) {
				$groups = $this->groupManager->getSubAdmin()->getSubAdminsGroups($currentUser);
				// New class returns IGroup[] so convert back
				$gids = [];
				foreach ($groups as $group) {
					$gids[] = $group->getGID();
				}
				$groups = $gids;
			}
		}

		if ($this->userManager->userExists($username)) {
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('A user with that name already exists.')
				],
				Http::STATUS_CONFLICT
			);
		}

		try {
			if (($password === '') && ($email !== '')) {
				/**
				 * Generate a random password as we are going to have this
				 * use one time. The new user has to reset it using the link
				 * from email.
				 */
				$event = new GenericEvent();
				$this->eventDispatcher->dispatch('OCP\User::createPassword', $event);
				if ($event->hasArgument('password')) {
					$password = $event->getArgument('password');
				} else {
					$password = $this->secureRandom->generate(20);
				}
			}
			$user = $this->userManager->createUser($username, $password);
		} catch (\Exception $exception) {
			$message = $exception->getMessage();
			if (!$message) {
				$message = $this->l10n->t('Unable to create user.');
			}
			return new DataResponse(
				[
					'message' => (string)$message,
				],
				Http::STATUS_FORBIDDEN
			);
		}

		if ($user instanceof User) {
			if ($groups !== null) {
				foreach ($groups as $groupName) {
					$group = $this->groupManager->get($groupName);

					if (empty($group)) {
						$group = $this->groupManager->createGroup($groupName);
					}
					$group->addUser($user);
				}
			}
			/**
			 * Send new user mail only if a mail is set
			 */
			if ($email !== '') {
				$user->setEMailAddress($email);
				try {
					$this->generateTokenAndSendMail($username, $email);
				} catch (\Exception $e) {
					$this->log->error("Can't send new user mail to $email: " . $e->getMessage(), ['app' => 'settings']);
				}
			}
			// fetch users groups
			$userGroups = $this->groupManager->getUserGroupIds($user);

			return new DataResponse(
				$this->formatUserForIndex($user, $userGroups),
				Http::STATUS_CREATED
			);
		}

		return new DataResponse(
			[
				'message' => (string)$this->l10n->t('Unable to create user.')
			],
			Http::STATUS_FORBIDDEN
		);
	}

	/**
	 * @param string $userId
	 * @param string $email
	 */
	public function generateTokenAndSendMail($userId, $email) {
		$token = $this->secureRandom->generate(21,
			ISecureRandom::CHAR_DIGITS,
			ISecureRandom::CHAR_LOWER, ISecureRandom::CHAR_UPPER);
		$this->config->setUserValue($userId, 'owncloud',
			'lostpassword', $this->timeFactory->getTime() . ':' . $token);

		// data for the mail template
		$mailData = [
			'username' => $userId,
			'url' => $this->urlGenerator->linkToRouteAbsolute('user_management.Users.setPasswordForm', ['userId' => $userId, 'token' => $token])
		];

		$mail = new TemplateResponse('user_management', 'new_user/email-html', $mailData, 'blank');
		$mailContent = $mail->render();

		$mail = new TemplateResponse('user_management', 'new_user/email-plain_text', $mailData, 'blank');
		$plainTextMailContent = $mail->render();

		$subject = $this->l10n->t('Your %s account was created', [$this->defaults->getName()]);

		$message = $this->mailer->createMessage();
		$message->setTo([$email => $userId]);
		$message->setSubject($subject);
		$message->setHtmlBody($mailContent);
		$message->setPlainBody($plainTextMailContent);
		$message->setFrom([$this->fromMailAddress => $this->defaults->getName()]);
		$this->mailer->send($message);
	}

	private function isAdmin() {
		// Check if current user (active and not in incognito mode)
		// is an admin
		$activeUser = $this->userSession->getUser();
		if ($activeUser !== null) {
			return $this->groupManager->isAdmin($activeUser->getUID());
		}
		// Check if it is triggered from command line
		if (\OC::$CLI) {
			return true;
		}
		return false;
	}

	/**
	 * @param IUser $user
	 * @param array $userGroups
	 * @return array
	 */
	public function formatUserForIndex(IUser $user, array $userGroups = null) {

		// TODO: eliminate this encryption specific code below and somehow
		// hook in additional user info from other apps

		// recovery isn't possible if admin or user has it disabled and encryption
		// is enabled - so we eliminate the else paths in the conditional tree
		// below
		$restorePossible = false;

		if ($this->isEncryptionAppEnabled) {
			if ($this->isRestoreEnabled) {
				// check for the users recovery setting
				$recoveryMode = $this->config->getUserValue($user->getUID(), 'encryption', 'recoveryEnabled', '0');
				// method call inside empty is possible with PHP 5.5+
				$recoveryModeEnabled = !empty($recoveryMode);
				if ($recoveryModeEnabled) {
					// user also has recovery mode enabled
					$restorePossible = true;
				}
			}
		} else {
			// recovery is possible if encryption is disabled (plain files are
			// available)
			$restorePossible = true;
		}

		$subAdminGroups = $this->groupManager->getSubAdmin()->getSubAdminsGroups($user);
		foreach ($subAdminGroups as $key => $subAdminGroup) {
			$subAdminGroups[$key] = $subAdminGroup->getGID();
		}

		$displayName = $user->getEMailAddress();
		if ($displayName === null) {
			$displayName = '';
		}

		$avatarAvailable = false;
		if ($this->config->getSystemValue('enable_avatars', true) === true) {
			try {
				$avatarAvailable = $this->avatarManager->getAvatar($user->getUID())->exists();
			} catch (\Exception $e) {
				//No avatar yet
			}
		}

		return [
			'name' => $user->getUID(),
			'displayname' => $user->getDisplayName(),
			'groups' => (empty($userGroups)) ? $this->groupManager->getUserGroupIds($user, 'management') : $userGroups,
			'subadmin' => $subAdminGroups,
			'isEnabled' => $user->isEnabled(),
			'quota' => $user->getQuota(),
			'storageLocation' => $user->getHome(),
			'lastLogin' => $user->getLastLogin() * 1000,
			'backend' => $user->getBackendClassName(),
			'email' => $displayName,
			'isRestoreDisabled' => !$restorePossible,
			'isAvatarAvailable' => $avatarAvailable,
		];
	}
}
