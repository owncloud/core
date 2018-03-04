<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OC\Core\Command\Group;

use OC\Group\GroupMapper;
use OC\Group\SyncService;
use OC\MembershipManager;
use OC\User\AccountMapper;
use OCP\GroupInterface;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\ILogger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SyncBackend extends Command {

	/** @var GroupMapper */
	private $groupMapper;
	/** @var AccountMapper */
	private $accountMapper;
	/** @var MembershipManager */
	private $membershipManager;
	/** @var IGroupManager */
	private $groupManager;
	/** @var ILogger */
	private $logger;

	/**
	 * @param GroupMapper $groupMapper
	 * @param AccountMapper $accountMapper
	 * @param MembershipManager $membershipManager
	 * @param ILogger $logger
	 * @param IGroupManager $groupManager
	 */
	public function __construct(GroupMapper $groupMapper,
								AccountMapper $accountMapper,
								MembershipManager $membershipManager,
								ILogger $logger,
								IGroupManager $groupManager) {
		parent::__construct();
		$this->groupMapper = $groupMapper;
		$this->accountMapper = $accountMapper;
		$this->membershipManager = $membershipManager;
		$this->groupManager = $groupManager;
		$this->logger = $logger;
	}

	protected function configure() {
		$this
			->setName('group:sync')
			->setDescription('Synchronize groups from a given backend to the backend groups table.')
			->addArgument(
				'backend-class',
				InputArgument::OPTIONAL,
				'The PHP class name - e.g., "OCA\User_LDAP\Group_Proxy". Please wrap the class name in double quotes. You can use the option --list to list all known backend classes.'
			)
			->addOption(
				'groups-only',
				'g',
				InputOption::VALUE_NONE,
				'Sync only groups. Memberships will be synced on user login only'
			)
			->addOption(
				'list',
				'l',
				InputOption::VALUE_NONE,
				'List all known backend classes'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if ($input->getOption('list')) {
			$backends = $this->groupManager->getBackends();
			foreach ($backends as $backend) {
				$output->writeln(get_class($backend));
			}
			return 0;
		}

		$syncMemberships = true;
		if ($input->getOption('groups-only')) {
			$syncMemberships = false;
		}

		$backendClassName = $input->getArgument('backend-class');
		if ($backendClassName === null) {
			$output->writeln('<error>No backend class name given. Please run ./occ help group:sync to understand how this command works.</error>');
			return 1;
		}
		$backend = $this->getBackend($backendClassName);
		if ($backend === null) {
			$output->writeln("<error>The backend <$backendClassName> does not exist. Did you miss to enable the app?</error>");
			return 1;
		}

		$syncService = new SyncService($this->groupMapper, $this->accountMapper, $this->membershipManager, $this->logger);

		// Count groups
		$backendGroupsNo = $this->handleCount($output, $syncService, $backend);

		// Analyse unknown groups
		$this->handleUnknownGroups($output, $syncService, $backend);

		// Sync groups and memberships
		$this->handleUpdate($output, $syncService, $backend, $backendGroupsNo, $syncMemberships);

		return 0;
	}

	/**
	 * @param $backend
	 * @return null|GroupInterface
	 */
	private function getBackend($backend) {
		$backends = $this->groupManager->getBackends();
		$match = array_filter($backends, function ($b) use ($backend) {
			return get_class($b) === $backend;
		});
		if (empty($match)) {
			return null;
		}
		return array_pop($match);
	}

	/**
	 * @param array $gids a list of $gid id for the the action
	 * @param callable $callbackExists the callback used if the backend group for the gid exists. The
	 * gid and the specific backend group will be passed as parameter to the callback in that order
	 * @param callable $callbackMissing the callback used if the backend group doesn't exists. The gid (not
	 * the backend group) will be passed as parameter to the callback
	 */
	private function doActionForGIDs(array $gids, callable $callbackExists, callable $callbackMissing = null) {
		foreach ($gids as $gid) {
			$group = $this->groupManager->get($gid);
			if ($group === null) {
				$callbackMissing($gid);
			} else {
				$callbackExists($gid, $group);
			}
		}
	}

	/**
	 * @param OutputInterface $output
	 * @param SyncService $syncService
	 * @param GroupInterface $backend
	 *
	 * @return int - number of groups in external backend
	 */
	private function handleCount(OutputInterface $output, SyncService $syncService, GroupInterface $backend) {
		$output->writeln('Count groups from external backend ...');
		$p = new ProgressBar($output);
		$max = 0;
		$syncService->count($backend, function () use ($p, &$max) {
			$p->advance();
			$max++;
		});
		$p->finish();
		$output->writeln('');
		$output->writeln('');

		return $max;
	}

	/**
	 * @param OutputInterface $output
	 * @param SyncService $syncService
	 * @param GroupInterface $backend
	 */
	private function handleUnknownGroups(OutputInterface $output, SyncService $syncService, GroupInterface $backend) {
		$output->writeln('Scan existing groups and find groups to delete...');
		$p = new ProgressBar($output);
		$toBeDeleted = $syncService->getNoLongerExistingGroup($backend, function () use ($p) {
			$p->advance();
		});
		$p->finish();
		$output->writeln('');
		$output->writeln('');

		if (empty($toBeDeleted)) {
			$output->writeln('No groups to be deleted have been detected.');
		} else {
			$output->writeln('Proceeding to remove the backend groups. Following groups are no longer known with the connected backend.');
			$output->writeln('');

			$this->doActionForGIDs($toBeDeleted,
				function ($gid, IGroup $group) use ($output) {
					$group->delete();
					$output->writeln($gid);
				},
				function ($gid) use ($output) {
					$output->writeln("$gid (unknown backend group)");
				}
			);
		}
		$output->writeln('');
		$output->writeln('');
	}

	/**
	 * @param OutputInterface $output
	 * @param SyncService $syncService
	 * @param GroupInterface $backend
	 * @param int $backendGroupsNo
	 * @param bool $syncMemberships
	 */
	private function handleUpdate(OutputInterface $output, SyncService $syncService, GroupInterface $backend, $backendGroupsNo, $syncMemberships) {
		// insert/update known users
		$output->writeln('Insert new and update existing groups. Sync memberships of each group ...');
		$p = new ProgressBar($output);
		$p->start($backendGroupsNo);
		$syncService->run($backend, $syncMemberships, function () use ($p) {
			$p->advance();
		});
		$p->finish();
		$output->writeln('');
		$output->writeln('');
	}

}
