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

use OCP\IGroup;
use OCP\IGroupManager;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use OCP\User\Exceptions\CannotCreateUserException;
use OCP\User\Exceptions\InvalidEmailException;
use OCP\User\Exceptions\UserAlreadyExistsException;

class CreateUserService {
	/** @var IUserSession */
	private $userSession;
	/** @var IGroupManager */
	private $groupManager;
	/** @var IUserManager */
	private $userManager;
	/** @var IMailer */
	private $mailer;
	/** @var ISecureRandom */
	private $secureRandom;
	/** @var ILogger */
	private $logger;
	/** @var UserSendMailService */
	private $userSendMailService;
	/** @var PasswordGeneratorService */
	private $passwordGeneratorService;

	/**
	 * CreateUser constructor.
	 *
	 * @param IUserSession $userSession
	 * @param IGroupManager $groupManager
	 * @param IUserManager $userManager
	 * @param IMailer $mailer
	 * @param ISecureRandom $secureRandom
	 * @param ILogger $logger
	 * @param UserSendMailService $userSendMail
	 * @param PasswordGeneratorService $passwordGenerator
	 */
	public function __construct(IUserSession $userSession,
								IGroupManager $groupManager,
								IUserManager $userManager,
								IMailer $mailer,
								ISecureRandom $secureRandom,
								ILogger $logger,
								UserSendMailService $userSendMailService,
								PasswordGeneratorService $passwordGeneratorService) {
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
		$this->userManager = $userManager;
		$this->mailer = $mailer;
		$this->secureRandom = $secureRandom;
		$this->logger = $logger;
		$this->userSendMailService = $userSendMailService;
		$this->passwordGeneratorService = $passwordGeneratorService;
	}

	/**
	 * Create user using password or email or with both.
	 *
	 * @param string $username
	 * @param string $password can be empty string, else string for password
	 * @param string $email
	 * @return \OCP\IUser when user is created else exception is thrown
	 * @throws CannotCreateUserException
	 * @throws InvalidEmailException
	 * @throws UserAlreadyExistsException
	 */
	public function createUser($username, $password, $email='') {
		if ($email !== '' && !$this->mailer->validateMailAddress($email)) {
			throw new InvalidEmailException("Invalid mail address");
		}

		if ($this->userManager->userExists($username)) {
			throw new UserAlreadyExistsException('A user with that name already exists.');
		}

		try {
			if (($password === '') && ($email !== '')) {
				/**
				 * Generate a random password as we are going to have this
				 * use one time. The new user has to reset it using the link
				 * from email.
				 */
				$password = $this->passwordGeneratorService->createPassword();
			}
			$user = $this->userManager->createUser($username, $password);
		} catch (\Exception $exception) {
			throw new CannotCreateUserException("Unable to create user due to exception: {$exception->getMessage()}");
		}

		if ($user === false) {
			throw new CannotCreateUserException('Unable to create user.');
		}

		/**
		 * Send new user mail only if a mail is set
		 */
		if ($email !== '') {
			$user->setEMailAddress($email);
			try {
				$this->userSendMailService->generateTokenAndSendMail($username, $email);
			} catch (\Exception $e) {
				$this->logger->error("Can't send new user mail to $email: " . $e->getMessage(), ['app' => 'settings']);
			}
		}

		return $user;
	}

	/**
	 * Add user to the groups.
	 * If the user is failed to add to a group the return array has an array of group names
	 * which could not add the user.
	 * checkInGroup could be set to false if no check is required after the user is added,
	 * to groups. By default it is set to true.
	 * @param IUser $user
	 * @param array $groups contains array of group names
	 * @param bool $checkInGroup if true then return array will be populated groups who failed to add user
	 * @return array group names who failed to add user
	 */
	public function addUserToGroups(IUser $user, array $groups= [], $checkInGroup = true) {
		$failedToAdd = [];

		foreach ($groups as $groupName) {
			$groupObject = $this->groupManager->get($groupName);

			if (empty($groupObject)) {
				$groupObject = $this->groupManager->createGroup($groupName);
			}
			$groupObject->addUser($user);
			if ($checkInGroup && !$this->groupManager->isInGroup($user->getUID(), $groupName)) {
				$failedToAdd[] = $groupName;
			}
		}
		return $failedToAdd;
	}
}
