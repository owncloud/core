<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
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


namespace OCA\Encryption\Crypto;


use OC\Helper\EnvironmentHelper;
use OC\User\LoginException;
use OCA\Encryption\KeyManager;
use OCA\Encryption\Session;
use OCA\Encryption\Util;
use OCP\IUserManager;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

class DecryptAll {

	/** @var Util  */
	protected $util;

	/** @var QuestionHelper  */
	protected $questionHelper;

	/** @var EnvironmentHelper  */
	protected $environmentHelper;

	/** @var  Crypt */
	protected $crypt;

	/** @var  KeyManager */
	protected $keyManager;

	/** @var Session  */
	protected $session;

	/** @var IUserManager */
	protected $userManager;

	/**
	 * DecryptAll constructor.
	 *
	 * @param Util $util
	 * @param KeyManager $keyManager
	 * @param Crypt $crypt
	 * @param Session $session
	 * @param IUserManager $userManager
	 * @param QuestionHelper $questionHelper
	 * @param EnvironmentHelper $environmentHelper
	 */
	public function __construct(
		Util $util,
		KeyManager $keyManager,
		Crypt $crypt,
		Session $session,
		IUserManager $userManager,
		QuestionHelper $questionHelper,
		EnvironmentHelper $environmentHelper
	) {
		$this->util = $util;
		$this->keyManager = $keyManager;
		$this->crypt = $crypt;
		$this->session = $session;
		$this->userManager = $userManager;
		$this->questionHelper = $questionHelper;
		$this->environmentHelper = $environmentHelper;
	}

	/**
	 * prepare encryption module to decrypt all files
	 *
	 * - The value of $user (when called from decrypt-all command ) is as follows:
	 *   the uid of user passed, if the oC filesystem is encrypted using user-keys
	 *   the empty string '', if the oC filesystem is encrypted using master-key
	 *
	 * - Throws LoginException when user login fails either recovery password fails
	 *   or if the user password fails
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param string|null $user The uid of the user ( a non empty string ) for user-keys, or empty or null string for masterkey decryption
	 * @return bool
	 * @throws LoginException
	 */
	public function prepare(InputInterface $input, OutputInterface $output, $user) {
		// We need to setup the module with everything it needs in order to decrypt user data
		// This could be using master key or user key encryption
		// and could also be for a single user or multiple users

		/**
		 * Try to stop decrypting process if password method is used for decrypting all users.
		 * If the decrypt-all command doesn't provide a user, which means decryption of oC
		 * filesystem. And if the method provided is password then it should stop decryption
		 * process, because same password can not be used for every user. Even though the
		 * input user is empty the $user can have value of each user(s) in oC.
		 */
		if (($input->getArgument('user') === '') && ($input->getOption('method') === 'password')) {
			$output->writeln('Password method can not be used for decrypting all users.');
			$output->writeln('Aborting the decryption process');
			return false;
		}
		// First lets work out the mode
		if ($this->util->isMasterKeyEnabled()) {
			$output->writeln('Using master key for decryption');
			$user = $this->keyManager->getMasterKeyId();
			$password = $this->keyManager->getMasterKeyPassword();
		} else {
			$throwLoginException = false;
			$output->writeln("Configuring encryption module for decryption with user based keys");
			// We must be using user key - now finish the prep
			// Must either be using recovery keys, or just decrypting one user and know their password

			// Check a method has been passed
			if(!$input->hasOption('method') && !in_array($input->getOption('method'),['recovery', 'password'])) {
				$output->writeln('A method must be supplied when decrypting from user-key state');
				return false;
			}
			if (empty($user)) {
				// all users, so only recovery is possible
				if ($input->getOption('method') === 'recovery' &&
					(($this->environmentHelper->getEnvVar('OC_RECOVERY_PASSWORD') !== ''))) {
					// Then we can attempt to use this for all of the users
					$output->writeln('Attempting to use recovery key from environment for all users. Users must have enabled recovery keys for this to work.');
					$password = $this->environmentHelper->getEnvVar('OC_RECOVERY_PASSWORD');
				} else {
					$output->writeLn('Recovery key is the only supported method for decrypting all users in one command. The key is read from OC_RECOVERY_PASSWORD.');
					return false;
				}
			} else {
				// Specific user, password is an option here
				if ($input->getOption('method') === 'recovery' &&
					($this->environmentHelper->getEnvVar('OC_RECOVERY_PASSWORD') !== '')) {
					if ($this->util->isRecoveryEnabledForUser($user) === false) {
						$output->writeln('Password recovery is not enabled for ' . $user);
						return false;
					}
					// Then we can attempt to use this for all of the users
					$output->writeln('Attempting to use recovery key from environment: OC_RECOVERY_PASSWORD');
					$password = $this->environmentHelper->getEnvVar('OC_RECOVERY_PASSWORD');

					try {
						if ($this->keyManager->checkRecoveryPassword($password) === false) {
							$throwLoginException = true;
						}
					} catch (\Exception $e) {
						$throwLoginException = true;
					}

					$recoveryKeyId = $this->keyManager->getRecoveryKeyId();
					$user = $recoveryKeyId;
				} elseif ($input->getOption('method') === 'password' && ($this->environmentHelper->getEnvVar('OC_PASSWORD') !== '')) {
					$output->writeln('Attempting to use users password from environment: OC_PASSWORD');
					// Then we want to use the users password and it has been supplied
					$password = $this->environmentHelper->getEnvVar('OC_PASSWORD');

					if ($this->userManager->checkPassword($user, $password) === false) {
						$throwLoginException = true;
					}
				} elseif ($input->getOption('method') === null) {
					//Grab user specific password
					$question = new Question('Please enter the login password for user: ' . $user);
					$question->setHidden(true);
					$question->setHiddenFallback(false);
					$password = $this->questionHelper->ask($input, $output, $question);

					if ($this->userManager->checkPassword($user, $password) === false) {
						throw new LoginException('Invalid credentials provided');
					}
				} else {
					//If method or password is used and the environment is not set, then trigger LoginException
					if (($input->getOption('method') === 'recovery') || ($input->getOption('method') === 'password')) {
						if (($this->environmentHelper->getEnvVar('OC_RECOVERY_PASSWORD') === false) ||
							($this->environmentHelper->getEnvVar('OC_RECOVERY_PASSWORD') === '')) {
							$output->writeln('Recovery password not set in the envrironment');
							$throwLoginException = true;
						} elseif (($this->environmentHelper->getEnvVar('OC_PASSWORD') === false) ||
							($this->environmentHelper->getEnvVar('OC_PASSWORD') === '')) {
							$output->writeln('OC password not set in the envrironment');
							$throwLoginException = true;
						}
				}

				}
			}

			if ($throwLoginException === true) {
				throw new LoginException('Invalid credentials provided');
			}
		}

		$privateKey = $this->getPrivateKey($user, $password);
		if ($privateKey !== false) {
			$this->updateSession($user, $privateKey);
			return true;
		} else {
			$output->writeln('Could not decrypt private key, maybe you entered the wrong password?');
		}

		return false;
	}

	/**
	 * get the private key which will be used to decrypt all files
	 *
	 * @param string $user
	 * @param string $password
	 * @return bool|string
	 * @throws \OCA\Encryption\Exceptions\PrivateKeyMissingException
	 */
	protected function getPrivateKey($user, $password) {
		$recoveryKeyId = $this->keyManager->getRecoveryKeyId();
		$masterKeyId = $this->keyManager->getMasterKeyId();
		if ($user === $recoveryKeyId) {
			$recoveryKey = $this->keyManager->getSystemPrivateKey($recoveryKeyId);
			$privateKey = $this->crypt->decryptPrivateKey($recoveryKey, $password);
		} elseif ($user === $masterKeyId) {
			$masterKey = $this->keyManager->getSystemPrivateKey($masterKeyId);
			$privateKey = $this->crypt->decryptPrivateKey($masterKey, $password, $masterKeyId);
		} else {
			$userKey = $this->keyManager->getPrivateKey($user);
			$privateKey = $this->crypt->decryptPrivateKey($userKey, $password, $user);
		}

		return $privateKey;
	}

	protected function updateSession($user, $privateKey) {
		$this->session->prepareDecryptAll($user, $privateKey);
	}
}
