<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Clark Tomlinson <fallen013@gmail.com>
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Laurens Post <lkpost@scept.re>
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace OC\Core\Command\User;

use OCP\IUserManager;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\IRequest;
use OCP\IL10N;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use OC_Defaults;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ResetPassword extends Command {

	/** @var IUserManager */
	protected $userManager;

	/** @var IURLGenerator */
	protected $urlGenerator;

	/** @var IConfig */
	protected $config;

	/** @var IL10N */
	protected $l10n;

	/** @var ISecureRandom */
	protected $secureRandom;

	/** @var IMailer */
	protected $mailer;

	/** @var ITimeFactory */
	protected $timeFactory;
	// FIXME: Inject a non-static factory of OC_Defaults for better unit-testing
	/** @var OC_Defaults */
	protected $defaults;
	protected $from;

	public function __construct(
	IUserManager $userManager, 
	IConfig $config, 
	IURLGenerator $urlGenerator,
	IL10N $l10n, 
	ISecureRandom $secureRandom,
	IMailer $mailer, 
	OC_Defaults $defaults
	) {
		$this->userManager = $userManager;
		$this->urlGenerator = $urlGenerator;
		$this->secureRandom = $secureRandom;
		$this->l10n = $l10n;
		$this->config = $config;
		$this->mailer = $mailer;
		$this->config = $config;
		$this->defaults = $defaults;
		parent::__construct();
	}

	protected function resetAndEmail($user) {

		$email = $this->config->getUserValue($user, 'settings', 'email');
		$token = $this->secureRandom->getMediumStrengthGenerator()->generate(21, ISecureRandom::CHAR_DIGITS .
				ISecureRandom::CHAR_LOWER .
				ISecureRandom::CHAR_UPPER);
		$this->config->setUserValue($user, 'owncloud', 'lostpassword', time() . ':' . $token);
		$link = $this->urlGenerator->linkToRouteAbsolute('core.lost.resetform', array('userId' => $user, 'token' => $token));
		$tmpl = new \OC_Template('core/lostpassword', 'email');
		$tmpl->assign('link', $link);
		$msg = $tmpl->fetchPage();
		try {
			// Let up check if admin configured settings for email.
			$mfa=$this->config->getSystemValue('mail_from_address');
			$md=$this->config->getSystemValue('mail_domain');
			if($mfa===NULL || $md===NULL){
				throw new Exception('Please configure your mail_from_address and mail_domain in config.php .');
			}
			else{
				$this->from =  $mfa. '@' . $md;
			}
			$message = $this->mailer->createMessage();
			$message->setTo([$email => $user]);
			$message->setSubject($this->l10n->t('%s password reset', [$this->defaults->getName()]));
			$message->setPlainBody($msg);
			$message->setFrom([$this->from => $this->defaults->getName()]);
			$this->mailer->send($message);
		} catch (\Exception $e) {
			throw new \Exception($this->l10n->t(
					'Couldn\'t send email.'.
					'Full error message:'.$e->getMessage()
			));
		}
	}

//End of function resetAndEmail

	protected function configure() {
		$this
			->setName('user:resetpassword')
			->setDescription('Resets the password of the named user')
			->addArgument(
					'user', InputArgument::REQUIRED, 'Username to reset password'
			)
			->addOption(
					'password-from-env', null, InputOption::VALUE_NONE, 'read password from environment variable OC_PASS'
			)
			->addOption(
					'send-link-to-user', null, InputOption::VALUE_NONE, 'reset password and send notification email with hashed URL to the user'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$username = $input->getArgument('user');

		/** @var $user \OCP\IUser */
		$user = $this->userManager->get($username);
		if (is_null($user)) {
			$output->writeln('<error>User does not exist</error>');
			return 1;
		}

		if ($input->getOption('send-link-to-user')) {
			$this->resetAndEMail($username);
			$output->writeln("Message Sent.");
			return 0;
		}
		if ($input->getOption('password-from-env')) {
			$password = getenv('OC_PASS');
			if (!$password) {
				$output->writeln('<error>--password-from-env given, but OC_PASS is empty!</error>');
				return 1;
			}
		} elseif ($input->isInteractive()) {
			/** @var $dialog \Symfony\Component\Console\Helper\DialogHelper */
			$dialog = $this->getHelperSet()->get('dialog');

			if (\OCP\App::isEnabled('encryption')) {
				$output->writeln(
					'<error>Warning: Resetting the password when using encryption will result in data loss!</error>'
				);
				if (!$dialog->askConfirmation($output, '<question>Do you want to continue?</question>', true)) {
					return 1;
				}
			}

			$password = $dialog->askHiddenResponse(
					$output, '<question>Enter a new password: </question>', 
					false
			);
			$confirm = $dialog->askHiddenResponse(
					$output, '<question>Confirm the new password: </question>', 
					false
			);

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
