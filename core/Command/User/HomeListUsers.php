<?php
/**
 * @author Jannik Stehle <jstehle@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

use OC\Core\Command\Base;
use OC\Files\Filesystem;
use OCP\IDBConnection;
use OCP\IUserManager;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class HomeListUsers extends Base {
	/** @var IDBConnection */
	protected $connection;

	/** @var \OCP\IUserManager */
	protected $userManager;

	/**
	 * @param IDBConnection $connection
	 */
	public function __construct(
		IDBConnection $connection,
		IUserManager $userManager
	) {
		parent::__construct();
		$this->connection = $connection;
		$this->userManager = $userManager;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('user:home:list-users')
			->setDescription('List all users that have their home in a given path')
			->addArgument(
				'path',
				InputArgument::OPTIONAL,
				'Path where the user home must be located'
			)
			->addOption(
				'all',
				null,
				InputOption::VALUE_NONE,
				'List all users for every home path.'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if (Filesystem::isPrimaryObjectStorageEnabled() === true) {
			$output->writeln('<info>We detected that the instance is running on a S3 primary object storage, users might not be accurate</info>');
		}

		$path = $input->getArgument('path');
		if ($input->getOption('all')) {
			if ($path !== null) {
				$output->writeln('<error>--all and path option cannot be given together</error>');
				return 1;
			}
			$users = $this->userManager->search(null, null, null, true);
			$outputData = [];
			foreach ($users as $user) {
				$home = $user->getHome();
				// Strip away the UID at the end of the path
				$strippedHome = substr($home, 0, strrpos($home, '/'));
				$uid = $user->getUID();
				$outputData[$strippedHome][] = $uid;
			}
		} else {
			if ($path === null) {
				$output->writeln("<error>\n\n  Not enough arguments (missing: \"path\").\n</error>\n");
				return 1;
			}
			$query = $this->connection->getQueryBuilder();
			$query->select('*')
				->from('accounts')
				->where($query->expr()->like('home', $query->createNamedParameter("$path%")));
			$result = $query->execute();
			$outputData = [];
			while ($row = $result->fetch()) {
				$outputData[] = $row['user_id'];
			}
			$result->closeCursor();
		}
		parent::writeArrayInOutputFormat($input, $output, $outputData, self::DEFAULT_OUTPUT_PREFIX);

		return 0;
	}
}
