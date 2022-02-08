<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace OC\Core\Command\User;

use OC\Files\Filesystem;
use OC\Helper\UserTypeHelper;
use OCP\IUser;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class Report extends Command {
	/** @var IUserManager */
	protected $userManager;

	/** @var UserTypeHelper */
	protected $userTypeHelper;

	/**
	 * @param IUserManager $userManager
	 * @param UserTypeHelper $userTypeHelper
	 */
	public function __construct(IUserManager $userManager, UserTypeHelper $userTypeHelper) {
		$this->userManager = $userManager;
		$this->userTypeHelper = $userTypeHelper;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('user:report')
			->setDescription('shows how many users have access');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if (Filesystem::isPrimaryObjectStorageEnabled() === true) {
			$output->writeln('<info>We detected that the instance is running on a S3 primary object storage, user directories count might not be accurate</info>');
		}

		$table = new Table($output);
		$table->setHeaders(['User Report', '']);
		$userCountArray = $this->countUsers();
		$guests = 0;

		if (!empty($userCountArray)) {
			$total = 0;
			$rows = [];
			foreach ($userCountArray as $classname => $users) {
				$total += $users;
				$rows[] = [$classname, $users];
			}

			$this->userManager->callForAllUsers(function (IUser $user) use (&$guests) {
				if ($this->userTypeHelper->isGuestUser($user->getUID()) === true) {
					$guests++;
				}
			});

			$rows[] = [' '];
			$rows[] = ['guest users', $guests];
			$rows[] = [' '];
			$rows[] = ['total users', $total];
		} else {
			$rows[] = ['No backend enabled that supports user counting', ''];
		}

		$rows[] = [' '];
		$rows[] = ['user directories', $this->countUserDirectories()];

		$table->setRows($rows);
		$table->render($output);
		return 0;
	}

	private function countUsers() {
		return $this->userManager->countUsers();
	}

	private function countUserDirectories() {
		$userDirCount = 0;

		$this->userManager->callForSeenUsers(function (IUser $user) use (&$userDirCount) {
			$homePath = $user->getHome();

			if (\is_dir($homePath)) {
				$userDirCount++;
			}
		});

		return $userDirCount;
	}
}
