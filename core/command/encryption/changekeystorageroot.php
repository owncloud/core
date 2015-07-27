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


namespace OC\Core\Command\Encryption;

use OC\Encryption\Keys\Storage;
use OC\Files\Filesystem;
use OC\Files\View;
use OCP\IConfig;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class ChangeKeyStorageRoot extends Command{

	/** @var View  */
	protected $rootView;

	/** @var IUserManager */
	protected $userManager;

	/** @var IConfig  */
	protected $config;

	/**
	 * @param View $view
	 * @param IUserManager $userManager
	 * @param IConfig $config
	 */
	public function __construct(View $view, IUserManager $userManager, IConfig $config) {
		parent::__construct();
		$this->rootView = $view;
		$this->userManager = $userManager;
		$this->config = $config;
	}

	protected function configure() {
		parent::configure();
		$this
			->setName('encryption:change-key-storage-root')
			->setDescription('Change key storage root')
			->addArgument(
				'newRoot',
				InputArgument::OPTIONAL,
				'new root of the key storage relative to the data folder'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$oldRoot = $this->config->getAppValue('core', 'encryption_key_storage_root', '');
		$newRoot = $input->getArgument('newRoot');

		if ($newRoot === null) {
			$dialog = new QuestionHelper();
			$question = new ConfirmationQuestion('No storage root give, do you want to reset the key storage root to the default location? (y/n) ', false);
			if (!$dialog->ask($input, $output, $question)) {
				return;
			}
			$newRoot = '';
		}

		$oldRootDescription = $oldRoot !== '' ? $oldRoot : 'default storage location';
		$newRootDescription = $newRoot !== '' ? $newRoot : 'default storage location';
		$output->writeln("Change key storage root from <info>$oldRootDescription</info> to <info>$newRootDescription</info>");
		$success = $this->moveKeys($oldRoot, $newRoot, $output);
		if ($success) {
			$this->updateRoot($newRoot);
		}

		$output->writeln('');

		$output->writeln("Key storage root successfully changed to <info>$newRootDescription</info>");
	}

	/**
	 * move keys to new key storage root
	 *
	 * @param string $oldRoot
	 * @param string $newRoot
	 * @param string $output
	 * @return bool
	 * @throws \Exception
	 */
	protected function moveKeys($oldRoot, $newRoot, $output) {

		$output->writeln("Start to move keys:");

		if ($this->rootView->is_dir(($oldRoot)) === false) {
			$output->writeln("No old keys found: Noting needs to be moved");
			return false;
		}

		if ($this->rootView->is_dir(($newRoot)) === false) {
			throw new \Exception("New root folder doesn't exists. Please create the mount point and try again.");
		}

		$result = $this->rootView->file_put_contents(
			$newRoot . '/' . Storage::KEY_STORAGE_MARKER,
			'ownCloud will detect this folder as key storage root only if this file exists'
		);

		if ($result === false) {
			throw new \Exception("Can't write to new root folder. Please check the permissions and try again");
		}

		if (
			$this->rootView->is_dir($oldRoot . '/files_encryption') &&
			$this->targetExists($newRoot . '/files_encryption') === false
		) {
			$this->rootView->rename($oldRoot . '/files_encryption', $newRoot . '/files_encryption');
		}

		$content = $this->rootView->getDirectoryContent($oldRoot);
		$progress = new ProgressBar($output, count($content));
		$progress->start();

		foreach ($content as $c) {
			if ($this->rootView->is_dir($oldRoot . '/' . $c['name'])) {
				$this->moveUserEncryptionFolder($c['name'], $oldRoot, $newRoot);
			}
			$progress->advance();
		}
		$progress->finish();

		return true;
	}

	/**
	 * set new key storage root in database
	 *
	 * @param $newRoot
	 */
	protected function updateRoot($newRoot) {
		$this->config->setAppValue('core', 'encryption_key_storage_root', $newRoot);
	}

	/**
	 * move user encryption folder to new root folder
	 *
	 * @param string $user
	 * @param string $oldRoot
	 * @param string $newRoot
	 * @throws \Exception
	 */
	protected function moveUserEncryptionFolder($user, $oldRoot, $newRoot) {
		$source = $oldRoot . '/' . $user . '/files_encryption';
		$target = $newRoot . '/' . $user . '/files_encryption';
		if (
			$this->userManager->userExists($user) &&
			$this->rootView->is_dir($source) &&
			$this->targetExists($target) === false
		) {
			$this->prepareParentFolder($newRoot . '/' . $user);
			$this->rootView->rename($source, $target);
		}
	}

	/**
	 * Make preparations to filesystem for saving a key file
	 *
	 * @param string $path relative to data/
	 */
	protected function prepareParentFolder($path) {
		$path = Filesystem::normalizePath($path);
		// If the file resides within a subdirectory, create it
		if ($this->rootView->file_exists($path) === false) {
			$sub_dirs = explode('/', ltrim($path, '/'));
			$dir = '';
			foreach ($sub_dirs as $sub_dir) {
				$dir .= '/' . $sub_dir;
				if ($this->rootView->file_exists($dir) === false) {
					$this->rootView->mkdir($dir);
				}
			}
		}
	}

	/**
	 * check if target already exists
	 *
	 * @param $path
	 * @return bool
	 * @throws \Exception
	 */
	protected function targetExists($path) {
		if ($this->rootView->file_exists($path)) {
			throw new \Exception("new folder '$path' already exists");
		}

		return false;
	}

}
