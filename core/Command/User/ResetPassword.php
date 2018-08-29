<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Clark Tomlinson <fallen013@gmail.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Laurens Post <lkpost@scept.re>
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

namespace OC\Core\Command\User;

use OC\Core\Controller\LostController;
use OC\Helper\EnvironmentHelper;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\IUserManager;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use OCP\Util;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class ResetPassword extends Command {

	/** @var IUserManager */
	protected $userManager;
	/** @var IConfig  */
	private $config;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var EnvironmentHelper  */
	private $environmentHelper;
	/** @var LostController */
	private $lostController;

	public function __construct(IUserManager $userManager,
						IConfig $config,
						ITimeFactory $timeFactory,
						EnvironmentHelper $environmentHelper,
						LostController $lostController) {
		$this->userManager = $userManager;
		$this->config = $config;
		$this->timeFactory = $timeFactory;
		$this->environmentHelper = $environmentHelper;
		$this->lostController = $lostController;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('user:resetpassword')
			->setDescription('Resets the password of the named user.')
			->addArgument(
				'user',
				InputArgument::REQUIRED,
				'The user\'s name.'
			)
			->addOption(
				'password-from-env',
				null,
				InputOption::VALUE_NONE,
				'Read the password from the OC_PASS environment variable.'
			)
			->addOption(
				'send-email',
				null,
				InputOption::VALUE_NONE,
				'The email-id set while creating the user, will be used to send link for password reset. This option will also display the link sent to user.'
			)
			->addOption(
				'output-link',
				null,
				InputOption::VALUE_NONE,
				'The link to reset the password will be displayed.'
			)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$username = $input->getArgument('user');
		$emailLink = $input->getOption('send-email');
		$displayLink = $input->getOption('output-link');

		/** @var $user \OCP\IUser */
		$user = $this->userManager->get($username);
		if ($user === null) {
			$output->writeln('<error>User does not exist</error>');
			return 1;
		}

		if ($input->getOption('password-from-env')) {
			$password = $this->environmentHelper->getEnvVar('OC_PASS');
			if (!$password) {
				$output->writeln('<error>--password-from-env given, but OC_PASS is empty!</error>');
				return 1;
			}
		} elseif ($emailLink || $displayLink) {
			$userId = $user->getUID();
			list($link, $token) = $this->lostController->generateTokenAndLink($userId);

			if ($emailLink && $user->getEMailAddress() !== null) {
				try {
					$this->config->deleteUserValue($userId, 'owncloud', 'lostpassword');
					$this->lostController->sendEmail($userId, $token, $link);
				} catch (\Exception $e) {
					$output->writeln('<error>Can\'t send new user mail to ' . $user->getEMailAddress() . ': ' . $e->getMessage() . '</error>');
					return 1;
				}
			} else {
				if ($emailLink) {
					$output->writeln('<error>Email address is not set for the user ' . $user->getUID() . '</error>');
					return 1;
				}
			}
			$this->config->setUserValue($userId, 'owncloud', 'lostpassword', $this->timeFactory->getTime() . ':' . $token);
			$output->writeln('The password reset link is: ' . $link);
			return 0;
		} elseif ($input->isInteractive()) {
			/** @var $dialog \Symfony\Component\Console\Helper\QuestionHelper */
			$dialog = $this->getHelperSet()->get('question');

			if (\OCP\App::isEnabled('encryption')) {
				$output->writeln(
					'<error>Warning: Resetting the password when using encryption will result in data loss!</error>'
				);
				if (!$dialog->ask($input, $output, new Question('<question>Do you want to continue?</question>', true))) {
					return 1;
				}
			}

			$q = new Question('<question>Enter a new password: </question>', false);
			$q->setHidden(true);
			$password = $dialog->ask($input, $output, $q);
			if ($password === false) {
				// When user presses RETURN key or no password characters are entered,
				// $password gets a boolean value false.
				$output->writeln("<error>Password cannot be empty!</error>");
				return 1;
			}
			$q = new Question('<question>Confirm the new password: </question>', false);
			$q->setHidden(true);
			$confirm = $dialog->ask($input, $output, $q);
			if ($password !== $confirm) {
				$output->writeln("<error>Passwords did not match!</error>");
				return 1;
			}
		} else {
			$output->writeln("<error>Interactive input or --password-from-env is needed for entering a new password!</error>");
			return 1;
		}

		$success = $user->setPassword($password);
		if ($success) {
			$output->writeln("<info>Successfully reset password for " . $username . "</info>");
		} else {
			$output->writeln("<error>Error while resetting password!</error>");
			return 1;
		}
	}
}
