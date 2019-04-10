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

namespace OCA\Encryption\Command;

use OC\Files\Cache\Cache;
use OC\Files\View;
use OC\HintException;
use OCP\Files\IRootFolder;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FixEncryptedVersion extends Command {
	/** @var IRootFolder  */
	private $rootFolder;

	/** @var IUserManager  */
	private $userManager;

	/** @var View  */
	private $view;

	public function __construct(IRootFolder $rootFolder, IUserManager $userManager, View $view) {
		$this->rootFolder = $rootFolder;
		$this->userManager = $userManager;
		$this->view = $view;
		parent::__construct();
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('encryption:fixencryptedversion')
			->setDescription('Fix the encrypted version if the encrypted file(s) are not downloadable.')
			->addArgument(
				'user',
				InputArgument::REQUIRED,
				'The user id whose files needs fix'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$user = $input->getArgument('user');

		if ($user === null) {
			$output->writeln("<error>No user provided.</error>\n");
		}

		if ($this->userManager->get($user) === null) {
			$output->writeln("<error>User $user does not exist. Please provide a valid user id</error>");
			return 1;
		}
		$this->walkUserFolder($user, $output);
	}

	/**
	 * @param string $user
	 * @param OutputInterface $output
	 */
	private function walkUserFolder($user, OutputInterface $output) {
		$this->setupUserFs($user);
		$directories = [];
		$directories[] = '/' . $user . '/files';
		while ($root = \array_pop($directories)) {
			$directoryContent = $this->view->getDirectoryContent($root);
			foreach ($directoryContent as $file) {
				$path = $root . '/' . $file['name'];
				if ($this->view->is_dir($path)) {
					$directories[] = $path;
				} else {
					$output->writeln("Verifying the content of file $path");
					$this->verifyFileContent($path, $output);
				}
			}
		}
	}

	/**
	 * @param string $path
	 * @param OutputInterface $output
	 * @param bool $ignoreCorrectEncVersionCall, setting this variable to false avoids recursion
	 */
	private function verifyFileContent($path, OutputInterface $output, $ignoreCorrectEncVersionCall = true) {
		try {
			/**
			 * In encryption, the files are read in a block size of 8192 bytes
			 * Read block size of 8192 and a bit more (808 bytes)
			 * If there is any problem, the first block should throw the signature
			 * mismatch error. Which as of now, is enough to proceed ahead to
			 * correct the encrypted version.
			 */
			if ($this->view->readfilePart($path, 0, 9000) !== false) {
				$output->writeln("<info>The file $path is: OK</info>");
			}
			return true;
		} catch (HintException $e) {
			\OC::$server->getLogger()->warning("Issue: " . $e->getMessage());
			//If allowOnce is set to false, this becomes recursive.
			if ($ignoreCorrectEncVersionCall === true) {
				//Lets rectify the file by correcting encrypted version
				$output->writeln("<info>Attempting to fix the path: $path</info>");
				return $this->correctEncryptedVersion($path, $output);
			}
			return false;
		}
	}

	/**
	 * @param string $path
	 * @param OutputInterface $output
	 */
	private function correctEncryptedVersion($path, OutputInterface $output) {
		$fileInfo = $this->view->getFileInfo($path);
		$fileId = $fileInfo->getId();
		$encryptedVersion = $fileInfo->getEncryptedVersion();
		$wrongEncryptedVersion = $encryptedVersion;

		$storage = $fileInfo->getStorage();

		$cache = $storage->getCache();
		$fileCache = $cache->get($fileId);

		if ($storage->instanceOfStorage('OCA\Files_Sharing\ISharedStorage')) {
			$output->writeln("<info>The file: $path is a share. Hence kindly fix this by running the script under the owner of share</info>");
			return true;
		}

		if ($encryptedVersion >= 0) {
			//test by decrementing the value till 1 and if nothing works try incrementing
			$encryptedVersion--;
			while ($encryptedVersion > 0) {
				$cacheInfo = ['encryptedVersion' => $encryptedVersion, 'encrypted' => $encryptedVersion];
				$cache->put($fileCache->getPath(), $cacheInfo);
				$output->writeln("<info>Decrement the encrypted version to $encryptedVersion</info>");
				if ($this->verifyFileContent($path, $output, false) === true) {
					$output->writeln("<info>Fixed the file $path with version " . $encryptedVersion . "</info>");
					return true;
				}
				$encryptedVersion--;
			}

			//So decrementing did not worked. Now lets increment. Max increment is till 5
			$increment = 1;
			while ($increment <= 5) {
				/**
				 * The wrongEncryptedVersion would not be incremented so nothing to worry here.
				 * Only the newEncryptedVersion is incremented.
				 * For example if the wrong encrypted version is 4 then
				 * cycle1 -> newEncryptedVersion = 5 ( 4 + 1)
				 * cycle2 -> newEncryptedVersion = 6 ( 4 + 2)
				 * cycle3 -> newEncryptedVersion = 7 ( 4 + 3)
				 */
				$newEncryptedVersion = $wrongEncryptedVersion + $increment;

				$cacheInfo = ['encryptedVersion' => $newEncryptedVersion, 'encrypted' => $newEncryptedVersion];
				$cache->put($fileCache->getPath(), $cacheInfo);
				$output->writeln("<info>Increment the encrypted version to $newEncryptedVersion</info>");
				if ($this->verifyFileContent($path, $output, false) === true) {
					$output->writeln("<info>Fixed the file $path with version " . $newEncryptedVersion . "</info>");
					return true;
				}
				$increment++;
			}
		}
	}

	/**
	 * Setup user file system
	 * @param string $uid
	 */
	private function setupUserFs($uid) {
		\OC_Util::tearDownFS();
		\OC_Util::setupFS($uid);
	}
}
