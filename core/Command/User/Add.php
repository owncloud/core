<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Laurens Post <lkpost@scept.re>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Core\Command\User;

use OC\AppFramework\Http;
use OC\Files\Filesystem;
use OC\User\Service\CreateUserService;
use OC\User\User;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Mail\IMailer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Question\Question;

class Add extends Command {
	/** @var \OCP\IUserManager */
	protected $userManager;

	/** @var \OCP\IGroupManager */
	protected $groupManager;

	/** @var IMailer  */
	protected $mailer;

	/** @var CreateUserService  */
	protected $createUserService;

	/**
	 * Add User constructor.
	 *
	 * @param IUserManager $userManager
	 * @param IGroupManager $groupManager
	 * @param IMailer $mailer
	 * @param CreateUserService $signinWithEmail
	 */
	public function __construct(IUserManager $userManager, IGroupManager $groupManager,
								IMailer $mailer, CreateUserService $createUserService) {
		parent::__construct();
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
		$this->mailer = $mailer;
		$this->createUserService = $createUserService;
	}

	protected function configure() {
		$this
			->setName('user:add')
			->setDescription('adds a user')
			->addArgument(
				'uid',
				InputArgument::REQUIRED,
				'User ID used to login (must only contain a-z, A-Z, 0-9, -, _ and @).'
			)
			->addOption(
				'password-from-env',
				null,
				InputOption::VALUE_NONE,
				'Read password from the OC_PASS environment variable.'
			)
			->addOption(
				'password-from-cmdline',
				'p',
				InputOption::VALUE_NONE,
				'Read password from user input'
			)
			->addOption(
				'display-name',
				null,
				InputOption::VALUE_OPTIONAL,
				'User name used in the web UI (can contain any characters).'
			)
			->addOption(
				'email',
				null,
				InputOption::VALUE_OPTIONAL,
				'Email address for the user.'
			)
			->addOption(
				'group',
				'g',
				InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
				'The groups the user should be added to (The group will be created if it does not exist).'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$uid = $input->getArgument('uid');
		$email = $input->getOption('email');
		$displayName = $input->getOption('display-name');
		$passwordFromEnv = $input->getOption('password-from-env');
		$readPasswordFromCmdLine = $input->getOption('password-from-cmdline');
		$groupInput = $input->getOption('group');

		if ($this->userManager->userExists($uid)) {
			$output->writeln('<error>The user "' . $uid . '" already exists.</error>');
			return 2;
		}

		// Validate email before we create the user
		if ($email) {
			// Validate first
			if (!$this->mailer->validateMailAddress($email)) {
				// Invalid! Error
				$output->writeln('<error>Invalid email address supplied</error>');
				return 3;
			}
		} else {
			$email = '';
		}

		if ($passwordFromEnv) {
			$password = \getenv('OC_PASS');
			if (!$password) {
				$output->writeln('<error>--password-from-env given, but OC_PASS is empty!</error>');
				return 4;
			}

			$newUser = $this->createUserService->createUser($uid, $password, $email);
			if ($newUser instanceof IUser) {
				$output->writeln('<info>The user "' . $uid . '" was created successfully</info>');
				$failedGroups = $this->createUserService->addUserToGroups($newUser, $groupInput);
				if (\count($failedGroups) > 0) {
					$failedGroups = \implode(',', $failedGroups);
					//$output->writeln('<warning>Unable to add user: ' . $uid . ' to groups ' . $failedGroups . '.</warning>');
					$output->writeln("<warning>Unable to add user: $uid to groups $failedGroups </warning>");

					return 7;
				} else {
					foreach ($groupInput as $groupName) {
						$output->writeln("User $uid added to group $groupName");
					}
				}
				if ($displayName) {
					$newUser->setDisplayName($displayName);
					$output->writeln('Display name set to "' . $displayName . '"');
				}
			} else {
				$output->writeln('<error>An error occurred while creating the user</error>');
				return 1;
			}
		} elseif ($readPasswordFromCmdLine) {
			/** @var $dialog \Symfony\Component\Console\Helper\QuestionHelper */
			$dialog = $this->getHelperSet()->get('question');
			$q = new Question('<question>Enter password: </question>', false);
			$q->setHidden(true);
			$password = $dialog->ask($input, $output, $q);
			$q = new Question('<question>Confirm password: </question>', false);
			$q->setHidden(true);
			$confirm = $dialog->ask($input, $output, $q);

			if ($password !== $confirm) {
				$output->writeln("<error>Passwords did not match!</error>");
				return 5;
			}

			$newUser = $this->createUserService->createUser($uid, $password, $email);
			if ($newUser instanceof IUser) {
				$output->writeln('<info>The user "' . $uid . '" was created successfully</info>');
				$failedGroups = $this->createUserService->addUserToGroups($newUser, $groupInput);
				if (\count($failedGroups) > 0) {
					$failedGroups = \implode(',', $failedGroups);
					$output->writeln("<warning>Unable to add user: $uid to groups $failedGroups</warning>");
					return 7;
				} else {
					foreach ($groupInput as $groupName) {
						if (!\in_array($groupName, $failedGroups, true)) {
							$output->writeln("User $uid added to group $groupName");
						}
					}
				}
				if ($displayName) {
					$newUser->setDisplayName($displayName);
					$output->writeln('Display name set to "' . $displayName . '"');
				}
			} else {
				$output->writeln('<error>An error occurred while creating the user</error>');
				return 1;
			}
		} elseif ($email !== '') {
			$newUser = $this->createUserService->createUser($uid, '', $email);
			if ($newUser === false) {
				$output->writeln('<warning>Unable to create user: ' . $uid . '</warning>');
				return 6;
			}
			if ($newUser->getEMailAddress() !== null) {
				$output->writeln('Email address set to "' . $email . '"');
			}

			$output->writeln("<info>The user \"{$newUser->getUID()}\" was created successfully</info>");
			if ($displayName) {
				$newUser->setDisplayName($displayName);
				$output->writeln('Display name set to "' . $displayName . '"');
			}
			if ($groupInput) {
				$failedGroups = $this->createUserService->addUserToGroups($newUser, $groupInput);
				if (\count($failedGroups) > 0) {
					$failedGroups = \implode(',', $failedGroups);
					$output->writeln('<warning>Unable to add user: ' . $uid . ' to groups ' . $failedGroups . '.</warning>');
					return 7;
				}

				if (\is_array($groupInput)) {
					foreach ($groupInput as $group) {
						if (!\in_array($group, $failedGroups, true)) {
							$output->writeln("User $uid added to group $group");
						}
					}
				}
			}
		} else {
			$output->writeln("<error>Interactive input or --password-from-env is needed for entering a password!</error>");
			return 8;
		}
	}
}
