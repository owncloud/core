<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

use OCP\IGroupManager;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Security\ISecureRandom;
use OCP\User\Exceptions\CannotCreateUserException;
use OCP\User\Exceptions\InvalidEmailException;
use OCP\User\Exceptions\UserAlreadyExistsException;

class CreateUserService {
	/** @var IUserSession  */
	private $userSession;
	/** @var IGroupManager  */
	private $groupManager;
	/** @var IUserManager  */
	private $userManager;
	/** @var ISecureRandom  */
	private $secureRandom;
	/** @var ILogger  */
	private $logger;
	/** @var UserSendMailService  */
	private $userSendMailService;
	/** @var PasswordGeneratorService  */
	private $passwordGeneratorService;

	/**
	 * CreateUserService constructor.
	 *
	 * @param IUserSession $userSession
	 * @param IGroupManager $groupManager
	 * @param IUserManager $userManager
	 * @param ISecureRandom $secureRandom
	 * @param ILogger $logger
	 * @param UserSendMailService $userSendMailService
	 * @param PasswordGeneratorService $passwordGeneratorService
	 */
	public function __construct(IUserSession $userSession, IGroupManager $groupManager,
								IUserManager $userManager, ISecureRandom $secureRandom,
								ILogger $logger, UserSendMailService $userSendMailService,
								PasswordGeneratorService $passwordGeneratorService) {
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
		$this->userManager = $userManager;
		$this->secureRandom = $secureRandom;
		$this->logger = $logger;
		$this->userSendMailService = $userSendMailService;
		$this->passwordGeneratorService = $passwordGeneratorService;
	}

	/**
	 * Create a new user
	 *
	 * The function accepts array of arguments. The arguments could be one of the following:
	 * - ['username' => 'myuser'] - will not be allowed, cause exception from usermanager createUser
	 * - ['username' => 'myuser', 'password' => 'foo'] - will create a user
	 * - ['username' => 'myuser', 'email' => 'hello@example.com'] - will create user and send email to the new user
	 * - ['username' => 'myuser', 'password' => 'foo', 'email => 'hello@example.com'] - will create new user and set the email address to new user.
	 *
	 * The optional arguments in the array are:
	 * - email
	 * - password
	 * Do not skip both email and password, it will not create the new user.
	 *
	 * @param array $arguments
	 * @return IUser
	 * @throws CannotCreateUserException
	 * @throws InvalidEmailException
	 * @throws UserAlreadyExistsException
	 */
	public function createUser($arguments) {
		$username = $password = $email = '';
		if (\array_key_exists('username', $arguments)) {
			$username = $arguments['username'];
		} else {
			throw new CannotCreateUserException("Unable to create user due to missing user name");
		}
		if (\array_key_exists('password', $arguments)) {
			$password = $arguments['password'];
		}
		if (\array_key_exists('email', $arguments)) {
			$email = $arguments['email'];
		}

		if ($email !== '' && !$this->userSendMailService->validateEmailAddress($email)) {
			throw new InvalidEmailException("Invalid mail address");
		}

		if ($this->userManager->userExists($username)) {
			throw new UserAlreadyExistsException('A user with that name already exists.');
		}

		try {
			$oldPassword = $password;
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
			/**
			 * If the password provided to this method was empty then send email
			 * to the user notifying the user is created.
			 */
			if ($oldPassword === '') {
				try {
					$this->userSendMailService->generateTokenAndSendMail($username, $email);
				} catch (\Exception $e) {
					$this->logger->error("Can't send new user mail to $email: " . $e->getMessage(), ['app' => 'settings']);
				}
			}
		}

		return $user;
	}

	/**
	 * Add user to the groups
	 *
	 * The groups argument could not be empty and it is a list of group names. For example:
	 *  $groups = ['group1', 'group2']
	 *
	 * This function returns the list of group(s) which failed to add user to the group(s)
	 *
	 * @param IUser $user
	 * @param array $groups list of group names, example ['group1', 'group2']
	 * @param bool $checkInGroup
	 * @return array Returns an array of groups which failed to add user
	 */
	public function addUserToGroups(IUser $user, array $groups, $checkInGroup = true) {
		$failedToAdd = [];

		if (\is_array($groups) && \count($groups) > 0) {
			foreach ($groups as $groupName) {
				$groupObject = $this->groupManager->get($groupName);

				if (empty($groupObject)) {
					$groupObject = $this->groupManager->createGroup($groupName);
				}
				$groupObject->addUser($user);
				if ($checkInGroup && !$this->groupManager->isInGroup($user->getUID(), $groupName)) {
					$failedToAdd[] = $groupName;
				} else {
					$this->logger->info('Added userid ' . $user->getUID() . ' to group ' . $groupName, ['app' => 'ocs_api']);
				}
			}
		}
		return $failedToAdd;
	}

	/**
	 * Check if the user exist
	 *
	 * This function is for convinience. It helps to use this service to check if user exist,
	 * instead of adding dependency userManager. Kindly do not delete this method.
	 *
	 * @param string $uid
	 * @return bool
	 */
	public function userExists($uid) {
		return $this->userManager->userExists($uid);
	}
}
