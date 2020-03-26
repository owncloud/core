<?php
/**
 * @author Juan Pablo Villafáñez Ramos <jvillafanez@solidgeargroup.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

use OCP\Files\IHomeStorage;
use OCP\Files\IRootFolder;
use OCP\Files\File;
use OCP\Files\NotFoundException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CheckCache extends Command {
	const ERROR_MISSING_FILE = 1;
	const ERROR_NOT_A_FILE = 2;
	const ERROR_CANNOT_OPEN = 3;

	/** @var IRootFolder */
	private $rootFolder;

	public function __construct(IRootFolder $rootFolder) {
		parent::__construct();
		$this->rootFolder = $rootFolder;
	}

	protected function configure() {
		$this->setName('files:check-cache')
			->setDescription('Check if the target file exists in the primary storage')
			->addArgument(
				'uid',
				InputArgument::REQUIRED,
				'The user (user id) who owns the file'
			)
			->addArgument(
				'target-file',
				InputArgument::REQUIRED,
				'The file we want to check'
			)->addOption(
				'remove',
				null,
				InputOption::VALUE_NONE,
				'Remove the file from the cache if it\'s missing in the backend'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$uid = $input->getArgument('uid');
		$userFolder = $this->rootFolder->getUserFolder($uid);  // might throw a NoUserException

		try {
			$targetFile = $input->getArgument('target-file');
			$node = $userFolder->get($targetFile);
		} catch (NotFoundException $ex) {
			$output->writeln("<error>$targetFile not found within user $uid</error>");
			return self::ERROR_MISSING_FILE;
		}

		if ($node->isShared() || !($node->getStorage()->instanceOfStorage(IHomeStorage::class))) {
			$output->writeln("<comment>Ignoring $targetFile because it is shared or not inside the primary storage</comment>");
			return 0;
		}

		if (!($node instanceof File)) {
			$output->writeln("<error>$targetFile isn't a file</error>");
			return self::ERROR_NOT_A_FILE;
		}

		$stream = @$node->fopen('rb');  // errors are expected if the file is missing
		if (!$stream) {
			if ($input->getOption('remove')) {
				$node->delete();
				$output->writeln("$targetFile has been deleted");
			} else {
				$output->writeln("<error>Cannot open the file. Verify the file is missing in the primary storage before attempting to remove it</error>");
				return self::ERROR_CANNOT_OPEN;
			}
		} else {
			$output->writeln("$targetFile has been accessed properly");
			\fclose($stream);
		}
	}
}
