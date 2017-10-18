<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


use OCA\Encryption\KeyManager;
use OCA\Encryption\Session;
use OCA\Encryption\Util;
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

	/** @var  Crypt */
	protected $crypt;

	/** @var  KeyManager */
	protected $keyManager;

	/** @var Session  */
	protected $session;

	/**
	 * @param Util $util
	 * @param KeyManager $keyManager
	 * @param Crypt $crypt
	 * @param Session $session
	 * @param QuestionHelper $questionHelper
	 */
	public function __construct(
		Util $util,
		KeyManager $keyManager,
		Crypt $crypt,
		Session $session,
		QuestionHelper $questionHelper
	) {
		$this->util = $util;
		$this->keyManager = $keyManager;
		$this->crypt = $crypt;
		$this->session = $session;
		$this->questionHelper = $questionHelper;
	}

	/**
	 * prepare encryption module to decrypt all files
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param $user
	 * @return bool
	 */
	public function prepare(InputInterface $input, OutputInterface $output, $user) {

		// We need to setup the module with everything it needs in order to decrypt user data
		// This could be using master key or user key encryption
		// and could also be for a single user or multiple users

		// First lets work out the mode
		if($this->util->isMasterKeyEnabled()) {
			$output->writeln('Using master key for decryption');
			$user = $this->keyManager->getMasterKeyId();
			$password =$this->keyManager->getMasterKeyPassword();
		} else {
			$output->writeln("Configuring encryption module for decryption with user based keys");
			// We must be using user key - now finish the prep
			// Must either be using recovery keys, or just decrypting one user and know their password

			// Check a method has been passed
			if(!$input->hasOption('method') && !in_array($input->getOption('method'),['recovery', 'password'])) {
				$output->writeln('A method must be supplied when decrypting from user-key state');
				return false;
			}
			if(empty($user)) {
				// all users, so only recovery is possible
				if($input->getOption('method')==='recovery' && !empty(getenv('OC_RECOVERY_KEY'))) {
					// Then we can attempt to use this for all of the users
					$output->writeln('Attempting to use recovery key from environment for all users. Users must have enabled recovery keys for this to work.');
					$password = getenv('OC_RECOVERY_KEY');
					$recoveryKeyId = $this->keyManager->getRecoveryKeyId();
				} else {
					$output->writeLn('Recovery key is the only supported method for decrypting all users in one command. The key is read from OC_RECOVERY_KEY.');
					return false;
				}
			} else {
				// Specific user, password is an option here
				if($input->getOption('method')==='recovery' && !empty(getenv('OC_RECOVERY_KEY'))) {
					// Then we can attempt to use this for all of the users
					$output->writeln('Attempting to use recovery key from environment: OC_RECOVERY_KEY');
					$password = getenv('OC_RECOVERY_KEY');
					$output->writeln("Using key:".$password);
					$recoveryKeyId = $this->keyManager->getRecoveryKeyId();
					$user = $recoveryKeyId;
				} elseif($input->getOption('method')==='password' && !empty(getenv('OC_PASSWORD'))) {
					$output->writeln('Attempting to use users password from environment: OC_PASSWORD');
					// Then we want to use the users password and it has been supplied
					$password = getenv('OC_PASSWORD');
					if(!$this->util->isRecoveryEnabledForUser($user)) {
						$output->writeln("<error>No recovery key available for user: $user </error>");
						return false;
					}
					$recoveryKeyId = $this->keyManager->getRecoveryKeyId();
				} else {
					$output->writeln("<error>Ensure you have set either OC_RECOVERY_KEY or OC_PASSWORD to use for decryption</error>");
					return false;
				}
			}
		}

		$privateKey = $this->getPrivateKey($user, $password);
		if ($privateKey !== false) {
			$this->updateSession($user, $privateKey);
			$output->writeLn('Setup encryption module ready for decryption');
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
