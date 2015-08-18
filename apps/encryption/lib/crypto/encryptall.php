<?php
/**
 * @author Björn Schießle <schiessle@owncloud.com>
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


namespace OCA\Encryption\Crypto;

use OC\Encryption\Exceptions\DecryptionFailedException;
use OC\Files\View;
use OCA\Encryption\KeyManager;
use OCA\Encryption\Users\Setup;
use OCP\IUserManager;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class EncryptAll {

	/** @var Setup */
	private $userSetup;

	/** @var IUserManager */
	private $userManager;

	/** @var View */
	private $rootView;

	/** @var KeyManager */
	private $keyManager;

	/** @var array  */
	private $userPasswords;

	/** @var  array */
	private $alreadyInitializedUsers;

	/**
	 * @param Setup $userSetup
	 * @param IUserManager $userManager
	 * @param View $rootView
	 * @param KeyManager $keyManager
	 */
	public function __construct(Setup $userSetup, IUserManager $userManager, View $rootView, KeyManager $keyManager) {
		$this->userSetup = $userSetup;
		$this->userManager = $userManager;
		$this->rootView = $rootView;
		$this->keyManager = $keyManager;
		// store one time passwords for the users
		$this->userPasswords = array();
		// list of users which already have a key-pair
		$this->alreadyInitializedUsers = array();
	}

	/**
	 * start to encrypt all files
	 *
	 * @param OutputInterface $output
	 */
	public function encryptAll(OutputInterface $output) {

		$headline = 'Encrypt all files with the ' . Encryption::DISPLAY_NAME;
		$output->writeln("\n");
		$output->writeln($headline);
		$output->writeln(str_pad('', strlen($headline), '='));

		//create private/public keys for each user and store the private key password
		$output->writeln("\n");
		$output->writeln('Create key-pair for every user');
		$output->writeln('------------------------------');
		$output->writeln('');
		$this->createKeyPairs($output);

		// TODO: setup users file system and encrypt all files one by one (take should encrypt setting of storage into account)
		$output->writeln("\n");
		$output->writeln('Start to encrypt users files');
		$output->writeln('----------------------------');
		$output->writeln('');
		$this->encryptAllUsersFiles($output);
		// TODO: send-out or display AND ALWAYS write password list to file
		$output->writeln("\n");
		$output->writeln('Generated encryption key passwords');
		$output->writeln('----------------------------------');
		$output->writeln('');
		$this->outputPasswords($output);
		$output->writeln("\n");
	}

	/**
	 * create key-pair for every user
	 *
	 * @param OutputInterface $output
	 */
	protected function createKeyPairs(OutputInterface $output) {
		$output->writeln("\n");
		$progress = new ProgressBar($output);
		$progress->setFormat(" %message% \n [%bar%]");
		$progress->start();

		foreach($this->userManager->getBackends() as $backend) {
			$limit = 500;
			$offset = 0;
			do {
				$users = $backend->getUsers('', $limit, $offset);
				foreach ($users as $user) {
					if ($this->keyManager->userHasKeys($user) === false) {
						$progress->setMessage('Create key-pair for ' . $user);
						$progress->advance();
						$this->setupUserFS($user);
						$password = $this->generateOneTimePassword($user);
						$this->userSetup->setupUser($user, $password);
					} else {
						// users which already have a key-pair will be stored with a
						// empty password and filtered out later
						$this->userPasswords[$user] = '';
					}
				}
				$offset += $limit;
			} while(count($users) >= $limit);
		}

		$progress->setMessage('Key-pair created for all users');
		$progress->finish();
	}

	/**
	 * iterate over all user and encrypt their files
	 *
	 * @param OutputInterface $output
	 */
	protected function encryptAllUsersFiles(OutputInterface $output) {
		$output->writeln("\n");
		$progress = new ProgressBar($output);
		$progress->setFormat(" %message% \n [%bar%]");
		$progress->start();
		$numberOfUsers = count($this->userPasswords) + count($this->alreadyInitializedUsers);
		$userNo = 1;
		foreach ($this->userPasswords as $uid => $password) {
			$userCount = "$uid ($userNo of $numberOfUsers)";
			$this->encryptUsersFiles($uid, $progress, $userCount);
			$userNo++;
		}
		$progress->setMessage("all files encrypted");
		$progress->finish();

	}

	/**
	 * encrypt files from the given user
	 *
	 * @param string $uid
	 * @param ProgressBar $progress
	 * @param string $userCount
	 */
	protected function encryptUsersFiles($uid, ProgressBar $progress, $userCount) {

		$this->setupUserFS($uid);
		$directories = array();
		$directories[] =  '/' . $uid . '/files';

		while($root = array_pop($directories)) {
			$content = $this->rootView->getDirectoryContent($root);
			foreach ($content as $file) {
				//TODO check storage options and skip share storage
				$path = $root . '/' . $file['name'];
				if ($this->rootView->is_dir($path)) {
					$directories[] = $path;
					continue;
				} else {
					$progress->setMessage("encrypt files for user $userCount: $path");
					$progress->advance();
					$sourcePath = $path;
					$targetPath = $path . '.encrypted.' . time();
					try {
						$source = $this->rootView->fopen($sourcePath, 'r');
						$target = $this->rootView->fopen($targetPath, 'w');
						stream_copy_to_stream($source, $target);
						fclose($target);
						fclose($source);
						$this->rootView->rename($targetPath, $sourcePath);
					} catch (DecryptionFailedException $e) {
						fclose($target);
						fclose($source);
						if ($this->rootView->file_exists($targetPath)) {
							$this->rootView->unlink($targetPath);
						}
						$progress->setMessage("encrypt files for user $userCount: $path (already encrypted)");
						$progress->advance();
					}
				}
			}
		}
	}

	/**
	 * output one-time encryption passwords
	 *
	 * @param OutputInterface $output
	 */
	protected function outputPasswords(OutputInterface $output) {
		$table = new Table($output);
		$table->setHeaders(array('Username', 'Private key password'));

		//create rows
		$newPasswords = array();
		$unchangedPasswords = array();
		foreach ($this->userPasswords as $uid => $password) {
			if (empty($password)) {
				$unchangedPasswords[] = $uid;
			} else {
				$newPasswords[] = [$uid, $password];
			}
		}
		$table->setRows($newPasswords);
		$table->render();

		$output->writeln("\nFollowing users already had a key-pair which was reused without setting a new password:\n");
		foreach ($unchangedPasswords as $uid) {
			$output->writeln("    $uid");
		}

		$this->writePasswordsToFile($newPasswords, $output);
	}

	/**
	 * write one-time encryption passwords to a csv file
	 *
	 * @param array $passwords
	 * @param OutputInterface $output
	 */
	protected function writePasswordsToFile(array $passwords, OutputInterface $output) {
		$fp = $this->rootView->fopen('oneTimeEncryptionPasswords.csv', 'w');
		foreach ($passwords as $pwd) {
			fputcsv($fp, $pwd);
		}
		fclose($fp);
		$output->writeln("\n");
		$output->writeln('A list of all newly created passwords was written to data/oneTimeEncryptionPasswords.csv');
		$output->writeln('');
		$output->writeln('Each of this users need to login to the web interface, go to the');
		$output->writeln('personal settings section "ownCloud basic encryption module" and');
		$output->writeln('update the private key password to match the login password again by');
		$output->writeln('entering the one-time password and his current login password');
	}

	/**
	 * setup user file system
	 *
	 * @param string $uid
	 */
	protected function setupUserFS($uid) {
		\OC_Util::tearDownFS();
		\OC_Util::setupFS($uid);
	}

	/**
	 * generate one time password for the user and store it in a array
	 *
	 * @param string $uid
	 * @return string password
	 */
	protected function generateOneTimePassword($uid) {
		$password = bin2hex(openssl_random_pseudo_bytes(4));
		$this->userPasswords[$uid] = $password;
		return $password;
	}

}
