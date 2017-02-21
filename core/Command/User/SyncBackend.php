<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


use OC\User\AccountMapper;
use OC\User\SyncService;
use OCP\IConfig;
use OCP\IUserManager;
use OCP\UserInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SyncBackend extends Command {

	/** @var AccountMapper */
	protected $accountMapper;
	/** @var IConfig */
	private $config;
	/** @var IUserManager */
	private $userManager;

	/**
	 * @param AccountMapper $accountMapper
	 * @param IConfig $config
	 */
	public function __construct(AccountMapper $accountMapper, IConfig $config, IUserManager $userManager) {
		parent::__construct();
		$this->accountMapper = $accountMapper;
		$this->config = $config;
		$this->userManager = $userManager;
	}

	protected function configure() {
		$this
			->setName('user:sync')
			->setDescription('synchronize users from a given backend to the accounts table')
			->addArgument(
				'backend-class',
				InputArgument::OPTIONAL,
				'The php class name - e.g. OCA\User_LDAP\User_LDAP. You can use the option --list to list all known backend classes'
			)
			->addOption('list', 'l', InputOption::VALUE_NONE, 'list all known backend classes');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if ($input->getOption('list')) {
			$backends = $this->userManager->getBackends();
			foreach ($backends as $backend) {
				$output->writeln(get_class($backend));
			}
			return 0;
		}
		$backendClassName = $input->getArgument('backend-class');
		$backend = $this->getBackend($backendClassName);
		if (is_null($backend)) {
			$output->writeln("<error>The backend <$backendClassName> does not exist. Did you miss to enable the app?</error>");
			return 1;
		}

		$syncService = new SyncService($this->accountMapper, $backend, $this->config);

		// insert/update known users
		$output->writeln("Insert new and update existing users ...");
		$p = new ProgressBar($output);
		$max = null;
		if ($backend->implementsActions(\OC_User_Backend::COUNT_USERS)) {
			$max = $backend->countUsers();
		}
		$p->start($max);
		$syncService->run(function () use ($p) {
			$p->advance();
		});
		$p->finish();
		$output->writeln('');
		$output->writeln('');

		// analyse unknown users
		$output->writeln("Analyse unknown users ...");
		$p = new ProgressBar($output);
		$toBeDeleted = $syncService->getNoLongerExistingUsers(function () use ($p) {
			$p->advance();
		});
		$p->finish();
		$output->writeln('');
		$output->writeln('');

		if (empty($toBeDeleted)) {
			$output->writeln("No unknown users have been detected.");
		} else {
			$output->writeln("Following users are no longer known with the connected backend.");
			$output->writeln("Please delete them after careful verification.");
			foreach ($toBeDeleted as $u) {
				$output->writeln($u);
			}
		}
		return 0;
	}

	/**
	 * @param $backend
	 * @return null|UserInterface
	 */
	private function getBackend($backend) {
		$backends = $this->userManager->getBackends();
		$match = array_filter($backends, function ($b) use ($backend) {
			return get_class($b) === $backend;
		});
		if (empty($match)) {
			return null;
		}
		return array_pop($match);
	}
}
