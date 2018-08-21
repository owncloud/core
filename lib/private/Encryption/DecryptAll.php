<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Christian Jürges <christian@eqipe.ch>
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OC\Encryption;

use OC\Encryption\Exceptions\DecryptionFailedException;
use OC\Files\View;
use \OCP\Encryption\IEncryptionModule;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DecryptAll {

	/** @var  OutputInterface */
	protected $output;

	/** @var  InputInterface */
	protected $input;

	/** @var  Manager */
	protected $encryptionManager;

	/** @var IUserManager */
	protected $userManager;

	/** @var View */
	protected $rootView;

	/** @var  array files which couldn't be decrypted */
	protected $failed;

	/** @var ILogger */
	protected $logger;

	/**
	 * DecryptAll constructor.
	 *
	 * @param Manager $encryptionManager
	 * @param IUserManager $userManager
	 * @param View $rootView
	 * @param ILogger $logger
	 */
	public function __construct(
		Manager $encryptionManager,
		IUserManager $userManager,
		View $rootView,
		ILogger $logger
	) {
		$this->encryptionManager = $encryptionManager;
		$this->userManager = $userManager;
		$this->rootView = $rootView;
		$this->failed = [];
		$this->logger = $logger;
	}

	/**
	 * start to decrypt all files
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param string $user which users data folder should be decrypted, default = all users
	 * @return bool
	 * @throws \Exception
	 */
	public function decryptAll(InputInterface $input, OutputInterface $output, $user = '') {
		$this->input = $input;
		$this->output = $output;

		if ($user !== '' && $this->userManager->userExists($user) === false) {
			$this->output->writeln('User "' . $user . '" does not exist. Please check the username and try again');
			return false;
		}

		$this->output->writeln('prepare encryption modules...');
		if (\OC::$server->getAppConfig()->getValue('encryption', 'useMasterKey', '0') !== '0') {
			if ($this->prepareEncryptionModules($user) === false) {
				return false;
			}
		}
		$this->output->writeln(' done.');

		$this->decryptAllUsersFiles($user);

		if (empty($this->failed)) {
			$this->output->writeln('all files could be decrypted successfully!');
		} else {
			$this->output->writeln('Files for following users couldn\'t be decrypted, ');
			$this->output->writeln('maybe the user is not set up in a way that supports this operation: ');
			foreach ($this->failed as $uid => $data) {
				$this->output->writeln('    ' . $uid);
				foreach ($data as $failure) {
					$path = $failure['path'];
					$message = $failure['exception']->getMessage();
					$this->output->writeLn("           $path - $message");
				}
			}
			$this->output->writeln('');
		}

		return true;
	}

	/**
	 * prepare encryption modules to perform the decrypt all function
	 *
	 * @param $user
	 * @return bool
	 */
	protected function prepareEncryptionModules($user) {
		// prepare all encryption modules for decrypt all
		$encryptionModules = $this->encryptionManager->getEncryptionModules();
		foreach ($encryptionModules as $moduleDesc) {
			/** @var IEncryptionModule $module */
			$module = \call_user_func($moduleDesc['callback']);
			$this->output->writeln('');
			$this->output->writeln('Prepare "' . $module->getDisplayName() . '"');
			$this->output->writeln('');
			if ($module->prepareDecryptAll($this->input, $this->output, $user) === false) {
				$this->output->writeln('Module "' . $moduleDesc['displayName'] . '" does not support the functionality to decrypt all files again or the initialization of the module failed!');
				return false;
			}
		}

		return true;
	}

	/**
	 * iterate over all seen users and decrypt their files
	 *
	 * @param string $user which users files should be decrypted, default = all users
	 * @return bool
	 */
	protected function decryptAllUsersFiles($user = '') {
		$this->output->writeln("\n");

		$progress = new ProgressBar($this->output);
		$progress->setFormat(" %message% \n [%bar%]");
		$progress->start();
		$progress->setMessage("starting to decrypt files...");
		$progress->advance();

		if ($user === '') {
			$userNo = 1;
			$numberOfUsers = $this->userManager->countSeenUsers();
			if ($numberOfUsers === 0) {
				return false;
			}
			$this->userManager->callForSeenUsers(function (IUser $user) use ($progress, &$userNo, $numberOfUsers) {
				if (\OC::$server->getAppConfig()->getValue('encryption', 'userSpecificKey', '0') !== '0') {
					if ($this->prepareEncryptionModules($user->getUID()) === false) {
						return false;
					}
				}
				$this->decryptUsersFiles(
					$user->getUID(),
					$progress,
					"{$user->getUID()} ($userNo of $numberOfUsers)"
				);
				$userNo++;
			});
		} else {
			if (\OC::$server->getConfig()->getAppValue('encryption', 'userSpecificKey', '0') !== '0') {
				$userObject = $this->userManager->get($user);
				if ($userObject !== null) {
					if ($this->prepareEncryptionModules($userObject->getUID()) === false) {
						return false;
					}
				}
			}
			$this->decryptUsersFiles($user, $progress, "$user (1 of 1)");
		}

		$this->output->writeln("\n\n");

		$progress->setMessage("starting to decrypt files... finished");
		$progress->finish();

		$this->output->writeln("\n\n");
		return true;
	}

	/**
	 * encrypt files from the given user
	 *
	 * @param string $uid
	 * @param ProgressBar $progress
	 * @param string $userCount
	 */
	protected function decryptUsersFiles($uid, ProgressBar $progress, $userCount) {
		$this->setupUserFS($uid);
		$directories = [];
		$directories[] = '/' . $uid . '/files';

		while ($root = \array_pop($directories)) {
			$content = $this->rootView->getDirectoryContent($root);
			foreach ($content as $file) {
				// only decrypt files owned by the user, exclude incoming local shares, and incoming federated shares
				if ($file->getStorage()->instanceOfStorage('\OCA\Files_Sharing\ISharedStorage')) {
					continue;
				}
				$path = $root . '/' . $file['name'];
				if ($this->rootView->is_dir($path)) {
					$directories[] = $path;
					continue;
				} else {
					try {
						$progress->setMessage("decrypt files for user $userCount: $path");
						$progress->advance();
						if ($file->isEncrypted() === false) {
							$progress->setMessage("decrypt files for user $userCount: $path (already decrypted)");
							$progress->advance();
						} else {
							if ($this->decryptFile($path) === false) {
								$progress->setMessage("decrypt files for user $userCount: $path (already decrypted)");
								$progress->advance();
							}
						}
					} catch (\Exception $e) {
						$this->logger->logException($e, [
							'message' => "Exception trying to decrypt file <$path> for user <$uid>",
							'app' => __CLASS__
						]);
						if (isset($this->failed[$uid])) {
							$this->failed[$uid][] = ['path' => $path, 'exception' => $e];
						} else {
							$this->failed[$uid] = [['path' => $path, 'exception' => $e]];
						}
					}
				}
			}
		}
	}

	/**
	 * encrypt file
	 *
	 * @param string $path
	 * @return bool
	 */
	protected function decryptFile($path) {
		$source = $path;
		$target = $path . '.decrypted.' . $this->getTimestamp() . '.part';

		try {
			\OC\Files\Storage\Wrapper\Encryption::setDisableWriteEncryption(true);
			$this->rootView->copy($source, $target);
			\OC\Files\Storage\Wrapper\Encryption::setDisableWriteEncryption(false);
			View::setIgnorePartFile(true);
			$this->rootView->rename($target, $source);
			View::setIgnorePartFile(false);
			list($storage, $internalPath) = $this->rootView->resolvePath($source);
			//Update the encrypted column in file cache to zero, as the file is decrypted
			$storage->getCache()->put($internalPath, ['encrypted' => 0]);
		} catch (DecryptionFailedException $e) {
			if ($this->rootView->file_exists($target)) {
				$this->rootView->unlink($target);
			}
			return false;
		}

		return true;
	}

	/**
	 * get current timestamp
	 *
	 * @return int
	 */
	protected function getTimestamp() {
		return \time();
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
}
