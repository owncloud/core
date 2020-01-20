<?php
/**
 * @author Ilja Neumann <ineumann@owncloud.com>
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

namespace OCA\Files\Command;

use OC\Files\FileInfo;
use OC\Files\Storage\FailedStorage;
use OC\Files\Storage\Wrapper\Checksum;
use OCA\Files_Sharing\ISharedStorage;
use OCP\Files\IRootFolder;
use OCP\Files\Node;
use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use OCP\IUser;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Recomputes checksums for all files and compares them to filecache
 * entries. Provides repair option on mismatch.
 *
 * @package OCA\Files\Command
 */
class VerifyChecksums extends Command {
	const EXIT_NO_ERRORS = 0;
	const EXIT_CHECKSUM_ERRORS = 1;
	const EXIT_INVALID_ARGS = 2;

	/**
	 * @var IRootFolder
	 */
	private $rootFolder;
	/**
	 * @var IUserManager
	 */
	private $userManager;

	private $exitStatus = self::EXIT_NO_ERRORS;

	/**
	 * VerifyChecksums constructor.
	 *
	 * @param IRootFolder $rootFolder
	 * @param IUserManager $userManager
	 */
	public function __construct(IRootFolder $rootFolder, IUserManager $userManager) {
		parent::__construct(null);
		$this->rootFolder = $rootFolder;
		$this->userManager = $userManager;
	}

	protected function configure() {
		$this
			->setName('files:checksums:verify')
			->setDescription('Get all checksums in filecache and compares them by recalculating the checksum of the file.')
			->addOption('repair', 'r', InputOption::VALUE_NONE, 'Repair filecache-entry with mismatched checksums.')
			->addOption('user', 'u', InputOption::VALUE_REQUIRED, 'Specific user to check')
			->addOption('path', 'p', InputOption::VALUE_REQUIRED, 'Path to check relative to user folder, i.e, relative to /john/files. e.g tree/apple', '');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 * @throws NotFoundException
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	public function execute(InputInterface $input, OutputInterface $output) {
		$pathOption = $input->getOption('path');
		$userName = $input->getOption('user');

		$scanUserFunction = function (IUser $user) use ($input, $output) {
			$output->writeln('<info>Starting to verify checksums for '.$user->getUID().'</info>');
			$userFolder = $this->rootFolder->getUserFolder($user->getUID())->getParent();
			$this->verifyChecksumsForFolder($userFolder, $input, $output);
		};

		if ($userName) {
			if (!$this->userManager->userExists($userName)) {
				$output->writeln("<error>User \"$userName\" does not exist</error>");
				$this->exitStatus = self::EXIT_INVALID_ARGS;
				return $this->exitStatus;
			}
			if (!$pathOption) {
				$scanUserFunction($this->userManager->get($userName));
			} else {
				try {
					$userFolder = $this->rootFolder->getUserFolder($userName);
					$node = $userFolder->get($pathOption);
				} catch (NotFoundException $ex) {
					$output->writeln("<error>Path \"{$ex->getMessage()}\" not found.</error>");
					$this->exitStatus = self::EXIT_INVALID_ARGS;
					return $this->exitStatus;
				}
				if ($node === FileInfo::TYPE_FILE) {
					$this->verifyChecksumsForFile($node, $input, $output);
				} else {
					$this->verifyChecksumsForFolder($node, $input, $output);
				}
			}
		} else {
			if ($pathOption) {
				$output->writeln("<error>Please provide user when path is provided as argument</error>");
				$this->exitStatus = self::EXIT_INVALID_ARGS;
				return $this->exitStatus;
			}
			$output->writeln('<info>This operation might take quite some time.</info>');
			$this->userManager->callForAllUsers($scanUserFunction);
			$output->writeln('<info>Operation successfully completed</info>');
		}

		return $this->exitStatus;
	}

	/**
	 * Verifies checksum of a file
	 *
	 * @param Node $file
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @throws NotFoundException
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	private function verifyChecksumsForFile($file, InputInterface $input, OutputInterface $output) {
		$path = $file->getInternalPath();
		$currentChecksums = $file->getChecksum();
		$storage = $file->getStorage();
		$storageId = $storage->getId();

		if ($storage->instanceOfStorage(ISharedStorage::class) || $storage->instanceOfStorage(FailedStorage::class)) {
			return;
		}

		if (!self::fileExistsOnDisk($file)) {
			$output->writeln("Skipping $storageId/$path => File is in file-cache but doesn't exist on storage/disk", OutputInterface::VERBOSITY_VERBOSE);
			return;
		}

		if (!$file->isReadable()) {
			$output->writeln("Skipping $storageId/$path => File not readable", OutputInterface::VERBOSITY_VERBOSE);
			return;
		}

		// Files without calculated checksum can't cause checksum errors
		if (empty($currentChecksums)) {
			$output->writeln("Skipping $storageId/$path => No Checksum", OutputInterface::VERBOSITY_VERBOSE);
			return;
		}

		$output->writeln("Checking $storageId/$path => $currentChecksums", OutputInterface::VERBOSITY_VERBOSE);
		$actualChecksums = self::calculateActualChecksums($path, $file->getStorage());
		if ($actualChecksums !== $currentChecksums) {
			$output->writeln(
				"<info>Mismatch for $storageId/$path:\n Filecache:\t$currentChecksums\n Actual:\t$actualChecksums</info>"
			);

			$this->exitStatus = self::EXIT_CHECKSUM_ERRORS;

			if ($input->getOption('repair')) {
				$output->writeln("<info>Repairing $path</info>");
				$this->updateChecksumsForNode($file, $actualChecksums);
				$this->exitStatus = self::EXIT_NO_ERRORS;
			}
		}
	}

	/**
	 * Verifies checksums of a folder and its children
	 *
	 * @param Node $folder
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @throws NotFoundException
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	private function verifyChecksumsForFolder($folder, InputInterface $input, OutputInterface $output) {
		$folderQueue = [$folder];
		while ($currentFolder = \array_pop($folderQueue)) {
			try {
				'@phan-var \OCP\Files\Folder $currentFolder';
				$nodes = $currentFolder->getDirectoryListing();
			} catch (NotFoundException $e) {
				$nodes = [];
			}
			foreach ($nodes as $node) {
				if ($node->getType() === FileInfo::TYPE_FOLDER) {
					$folderQueue[] = $node;
				} else {
					$this->verifyChecksumsForFile($node, $input, $output);
				}
			}
			/* Force garbage collector to clear memory */
			unset($nodes);
		}
	}

	/**
	 * @param Node $node
	 * @param $correctChecksum
	 * @throws NotFoundException
	 * @throws \OCP\Files\InvalidPathException
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	private function updateChecksumsForNode(Node $node, $correctChecksum) {
		$storage = $node->getStorage();
		$cache = $storage->getCache();
		$cache->update(
			$node->getId(),
			['checksum' => $correctChecksum]
		);
	}

	/**
	 *
	 * @param Node $node
	 * @return bool
	 */
	private static function fileExistsOnDisk(Node $node) {
		$statResult = @$node->stat();
		return \is_array($statResult) && isset($statResult['size']) && $statResult['size'] !== false;
	}

	/**
	 * @param $path
	 * @param IStorage $storage
	 * @return string
	 * @throws \OCP\Files\StorageNotAvailableException
	 */
	private static function calculateActualChecksums($path, IStorage $storage) {
		return \sprintf(
			Checksum::CHECKSUMS_DB_FORMAT,
			$storage->hash('sha1', $path),
			$storage->hash('md5', $path),
			$storage->hash('adler32', $path)
		);
	}
}
