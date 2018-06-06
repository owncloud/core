<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace OCA\DAV\Command;

use OCA\DAV\Upload\UploadFolder;
use OCA\DAV\Upload\UploadHome;
use OCP\IUser;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CleanupChunks extends Command {

	/** @var IUserManager */
	protected $userManager;

	/**
	 * @param IUserManager $userManager
	 */
	public function __construct(IUserManager $userManager) {
		parent::__construct();
		$this->userManager = $userManager;
	}

	protected function configure() {
		$this
			->setName('dav:cleanup-chunks')
			->setDescription('Cleanup outdated chunks')
			->addArgument('age-in-days', InputArgument::OPTIONAL,
				'age of uploads in days - minimum 2 days - maximum 100',
				2);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$d = $input->getArgument('age-in-days');
		$d = \max(2, \min($d, 100));
		$cutOffTime = new \DateTime("$d days ago");
		$output->writeln("Cleaning chunks older than $d days({$cutOffTime->format('c')})");
		$this->userManager->callForSeenUsers(function (IUser $user) use ($output, $cutOffTime) {
			$output->writeln("Cleaning chunks for {$user->getUID()}");
			\OC_Util::tearDownFS();
			\OC_Util::setupFS($user->getUID());

			$home = new UploadHome(['user' => $user]);
			$uploads = $home->getChildren();

			$p = new ProgressBar($output);
			$p->start(\count($uploads));
			foreach ($uploads as $upload) {
				$p->advance();
				/** @var UploadFolder $upload */
				if ($upload->getLastModified() < $cutOffTime->getTimestamp()) {
					$upload->delete();
				}
			}

			$p->finish();
			$output->writeln('');
		});
	}
}
