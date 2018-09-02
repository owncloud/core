<?php
/**
 * @author Carla Schroder <carla@owncloud.com>
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

namespace OCA\Files\Command;

use OC\Encryption\Manager;
use OC\Files\Filesystem;
use OC\Files\View;
use OC\Share20\ProviderFactory;
use OCA\Files\Service\TransferOwnership\TransferOwnershipService;
use OCP\Files\FileInfo;
use OCP\Files\Mount\IMountManager;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Share\IManager;
use OCP\Share\IShare;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TransferOwnership extends Command {

	/** @var TransferOwnershipService */
	protected $service;
	/** @var IUserManager  */
	protected $userManager;

	public function __construct(TransferOwnershipService $service, IUserManager $userManager) {
		$this->service = $service;
		$this->userManager = $userManager;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('files:transfer-ownership')
			->setDescription('All files and folders are moved to another user - shares are moved as well.')
			->addArgument(
				'source-user',
				InputArgument::REQUIRED,
				'owner of files which shall be moved'
			)
			->addArgument(
				'destination-user',
				InputArgument::REQUIRED,
				'user who will be the new owner of the files'
			)
			->addOption(
				'path',
				null,
				InputOption::VALUE_REQUIRED,
				'selectively provide the path to transfer. For example --path="folder_name"'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$sourceUserObject = $this->userManager->get($input->getArgument('source-user'));
		$destinationUserObject = $this->userManager->get($input->getArgument('destination-user'));
		if ($sourceUserObject === null) {
			$output->writeln("<error>Unknown source user {$input->getArgument('source-user')}</error>");
			return 1;
		}
		if ($destinationUserObject === null) {
			$output->writeln("<error>Unknown destination user {$input->getArgument('destination-user')}</error>");
			return 1;
		}

		$inputPath = $input->getOption('path');
		$inputPath = \ltrim($inputPath, '/');

		try {
			$this->service->transfer($sourceUserObject, $destinationUserObject, $inputPath);
		} catch (\Exception $e) {
			$output->writeln('<error>And error occurred during the transfer: '.$e->getMessage().'</error>');
			return 1;
		}
		$output->writeln('<info>Done!</info>');
		return 0;
}


}
