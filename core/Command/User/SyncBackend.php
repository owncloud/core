<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OC\Core\Command\User;

use OC\User\AccountMapper;
use OC\User\Sync\AllUsersIterator;
use OC\User\Sync\SeenUsersIterator;
use OC\User\SyncService;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\UserInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Question\ChoiceQuestion;
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
	/** @var ILogger */
	private $logger;

	/**
	 * @param AccountMapper $accountMapper
	 * @param IConfig $config
	 * @param IUserManager $userManager
	 * @param ILogger $logger
	 */
	public function __construct(AccountMapper $accountMapper,
								IConfig $config,
								IUserManager $userManager,
								ILogger $logger) {
		parent::__construct();
		$this->accountMapper = $accountMapper;
		$this->config = $config;
		$this->userManager = $userManager;
		$this->logger = $logger;
	}

	protected function configure() {
		$this
			->setName('user:sync')
			->setDescription('Synchronize users from a given backend to the accounts table.')
			->addArgument(
				'backend-class',
				InputArgument::OPTIONAL,
				'The PHP class name - e.g., "OCA\User_LDAP\User_Proxy". Please wrap the class name in double quotes. You can use the option --list to list all known backend classes.'
			)
			->addOption(
				'list',
				'l',
				InputOption::VALUE_NONE,
				'List all known backend classes'
			)
			->addOption(
				'uid',
				'u',
				InputOption::VALUE_REQUIRED,
				'sync only the user with the given user id'
			)
			->addOption(
				'seenOnly',
				's',
				InputOption::VALUE_NONE,
				'sync only seen users'
			)
			->addOption(
				'showCount',
				'c',
				InputOption::VALUE_NONE,
				'calculate user count before syncing'
			)
			->addOption(
				'missing-account-action',
				'm',
				InputOption::VALUE_REQUIRED,
				'Action to take if the account isn\'t connected to a backend any longer. Options are "disable" and "remove". Use quotes. Note that removing the account will also remove the stored data and files for that account.'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if ($input->getOption('list')) {
			$backends = $this->userManager->getBackends();
			foreach ($backends as $backend) {
				$output->writeln(\get_class($backend));
			}
			return 0;
		}
		$backendClassName = $input->getArgument('backend-class');
		if ($backendClassName === null) {
			$output->writeln('<error>No backend class name given. Please run ./occ help user:sync to understand how this command works.</error>');
			return 1;
		}
		$backend = $this->getBackend($backendClassName);
		if ($backend === null) {
			$output->writeln("<error>The backend <$backendClassName> does not exist. Did you miss to enable the app?</error>");
			return 1;
		}
		if (!$backend->hasUserListings()) {
			$output->writeln("<error>The backend <$backendClassName> does not allow user listing. No sync is possible</error>");
			return 1;
		}

		$validActions = ['disable', 'remove'];

		if ($input->getOption('missing-account-action') !== null) {
			$missingAccountsAction = $input->getOption('missing-account-action');
			if (!\in_array($missingAccountsAction, $validActions, true)) {
				$output->writeln('<error>Unknown action. Choose between "disable" or "remove"</error>');
				return 1;
			}
		} else {
			// ask (if possible) how to handle missing accounts. Disable the accounts by default.
			$helper = $this->getHelper('question');
			$question = new ChoiceQuestion(
					'If unknown users are found, what do you want to do with their accounts? (removing the account will also remove its data)',
					\array_merge($validActions, ['ask later']),
					0
			);
			$missingAccountsAction = $helper->ask($input, $output, $question);
		}

		$syncService = new SyncService($this->config, $this->logger, $this->accountMapper);

		$uid = $input->getOption('uid');

		if ($uid) {
			$this->syncSingleUser($input, $output, $syncService, $backend, $uid, $missingAccountsAction, $validActions);
		} else {
			$this->syncMultipleUsers($input, $output, $syncService, $backend, $missingAccountsAction, $validActions);
		}

		return 0;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param SyncService $syncService
	 * @param UserInterface $backend
	 * @param string $missingAccountsAction
	 * @param array $validActions
	 */
	private function syncMultipleUsers(
		InputInterface $input,
		OutputInterface $output,
		SyncService $syncService,
		UserInterface $backend,
		$missingAccountsAction,
		array $validActions
	) {
		$output->writeln('Analyse unknown users ...');
		$p = new ProgressBar($output);
		$unknownUsers = $syncService->getNoLongerExistingUsers($backend, function () use ($p) {
			$p->advance();
		});
		$p->finish();
		$output->writeln('');
		$output->writeln('');
		$this->handleUnknownUsers($unknownUsers, $input, $output, $missingAccountsAction, $validActions);

		$output->writeln('Insert new and update existing users ...');
		$p = new ProgressBar($output);
		$max = null;
		if ($backend->implementsActions(\OC_User_Backend::COUNT_USERS) && $input->getOption('showCount')) {
			$max = $backend->countUsers();
		}
		$p->start($max);

		if ($input->getOption('seenOnly')) {
			$iterator = new SeenUsersIterator($this->accountMapper, \get_class($backend));
		} else {
			$iterator = new AllUsersIterator($backend);
		}
		$syncService->run($backend, $iterator, function () use ($p) {
			$p->advance();
		});
		$p->finish();
		$output->writeln('');
		$output->writeln('');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param SyncService $syncService
	 * @param UserInterface $backend
	 * @param string $uid
	 * @param string $missingAccountsAction
	 * @param array $validActions
	 */
	private function syncSingleUser(
		InputInterface $input,
		OutputInterface $output,
		SyncService $syncService,
		UserInterface $backend,
		$uid,
		$missingAccountsAction,
		array $validActions
	) {
		$output->writeln("Syncing $uid ...");
		$users = $backend->getUsers($uid, 2);
		if (\count($users) > 1) {
			$output->writeln("Multiple users returned from backend for input: $uid. Cancelling sync.");
			return 1;
		} elseif (\count($users) === 1) {
			// Run the sync using the internal username if mapped
			$syncService->run($backend, new \ArrayIterator([$users[0]]), function () {
			});
		} else {
			// Not found
			$this->handleUnknownUsers([$uid], $input, $output, $missingAccountsAction, $validActions);
		}
	}
	/**
	 * @param $backend
	 * @return null|UserInterface
	 */
	private function getBackend($backend) {
		$backends = $this->userManager->getBackends();
		$match = \array_filter($backends, function ($b) use ($backend) {
			return \get_class($b) === $backend;
		});
		if (empty($match)) {
			return null;
		}
		return \array_pop($match);
	}

	/**
	 * @param array $uids a list of uids to the the action
	 * @param callable $callbackExists the callback used if the account for the uid exists. The
	 * uid and the specific account will be passed as parameter to the callback in that order
	 * @param callable $callbackMissing the callback used if the account doesn't exists. The uid (not
	 * the account) will be passed as parameter to the callback
	 */
	private function doActionForAccountUids(array $uids, callable $callbackExists, callable $callbackMissing = null) {
		foreach ($uids as $u) {
			$userAccount = $this->userManager->get($u);
			if ($userAccount === null) {
				$callbackMissing($u);
			} else {
				$callbackExists($u, $userAccount);
			}
		}
	}

	/**
	 * @param string[] $unknownUsers
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param $missingAccountsAction
	 * @param $validActions
	 */
	private function handleUnknownUsers(array $unknownUsers, InputInterface $input, OutputInterface $output, $missingAccountsAction, $validActions) {
		if (empty($unknownUsers)) {
			$output->writeln('No unknown users have been detected.');
		} else {
			$output->writeln('Following users are no longer known with the connected backend.');
			switch ($missingAccountsAction) {
				case 'disable':
					$output->writeln('Proceeding to disable the accounts');
					$this->doActionForAccountUids($unknownUsers,
						function ($uid, IUser $ac) use ($output) {
							$ac->setEnabled(false);
							$output->writeln($uid);
						},
						function ($uid) use ($output) {
							$output->writeln("$uid (unknown account for the user)");
						});
					break;
				case 'remove':
					$output->writeln('Proceeding to remove the accounts');
					$this->doActionForAccountUids($unknownUsers,
						function ($uid, IUser $ac) use ($output) {
							$ac->delete();
							$output->writeln($uid);
						},
						function ($uid) use ($output) {
							$output->writeln("$uid (unknown account for the user)");
						});
					break;
				case 'ask later':
					$output->writeln('listing the unknown accounts');
					$this->doActionForAccountUids($unknownUsers,
						function ($uid) use ($output) {
							$output->writeln($uid);
						},
						function ($uid) use ($output) {
							$output->writeln("$uid (unknown account for the user)");
						});
					// overwriting variables!
					$helper = $this->getHelper('question');
					$question = new ChoiceQuestion(
						'What do you want to do with their accounts? (removing the account will also remove its data)',
						$validActions,
						0
					);
					$missingAccountsAction2 = $helper->ask($input, $output, $question);
					switch ($missingAccountsAction2) {
						// if "nothing" is selected, just ignore and finish
						case 'disable':
							$output->writeln('Proceeding to disable the accounts');
							$this->doActionForAccountUids($unknownUsers,
								function ($uid, IUser $ac) {
									$ac->setEnabled(false);
								},
								function ($uid) use ($output) {
									$output->writeln("$uid (unknown account for the user)");
								});
							break;
						case 'remove':
							$output->writeln('Proceeding to remove the accounts');
							$this->doActionForAccountUids($unknownUsers,
								function ($uid, IUser $ac) {
									$ac->delete();
								},
								function ($uid) use ($output) {
									$output->writeln("$uid (unknown account for the user)");
								});
							break;
					}
					break;
			}
		}
	}
}
