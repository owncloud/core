<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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


use OC\Migration\ConsoleOutput;
use OC\User\AccountMapper;
use OC\User\SyncService;
use OC\User\SyncServiceCallback;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\UserInterface;
use OCP\Util;
use Symfony\Component\Console\Command\Command;
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

	private $verbosityLevelMap = array(
		OutputInterface::VERBOSITY_QUIET => Util::ERROR,
		OutputInterface::VERBOSITY_NORMAL => Util::WARN,
		OutputInterface::VERBOSITY_VERBOSE => Util::INFO,
		OutputInterface::VERBOSITY_VERY_VERBOSE => Util::DEBUG,
		OutputInterface::VERBOSITY_DEBUG => Util::DEBUG,
	);
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
			->setDescription('synchronize users from a given backend to the accounts table')
			->addArgument(
				'backend-class',
				InputArgument::OPTIONAL,
				'The php class name - e.g. "OCA\User_LDAP\User_Proxy". Please wrap the class name into double quotes. You can use the option --list to list all known backend classes'
			)
			->addOption('list', 'l', InputOption::VALUE_NONE, 'list all known backend classes')
			->addOption('userid', 'u', InputOption::VALUE_REQUIRED, 'sync only the user with the given id')
			->addOption('missing-account-action', 'm', InputOption::VALUE_REQUIRED, 'action to do if the account isn\'t connected to a backend any longer. Options are "disable" and "remove". Use quotes. Note that removing the account will also remove the stored data and files for that account');
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
		if (is_null($backendClassName)) {
			$output->writeln("<error>No backend class name given. Please run ./occ help user:sync to understand how this command works.</error>");
			return 1;
		}
		$backend = $this->getBackend($backendClassName);
		if (is_null($backend)) {
			$output->writeln("<error>The backend <$backendClassName> does not exist. Did you miss to enable the app?</error>");
			return 1;
		}
		if (!$backend->hasUserListings()) {
			$output->writeln("<error>The backend <$backendClassName> does not allow user listing. No sync is possible</error>");
			return 1;
		}

		$validActions = ['disable', 'remove'];

		$missingAccountsAction = $input->getOption('missing-account-action');
		if ($missingAccountsAction !== null) {
			if (!in_array($missingAccountsAction, $validActions, true)) {
				$output->writeln("<error>Unknown action. Choose between \"disable\" or \"remove\"</error>");
				return 1;
			}
		} else {
			// ask (if possible) how to handle missing accounts. Disable the accounts by default.
			$helper = $this->getHelper('question');
			$question = new ChoiceQuestion(
					'If unknown users are found, what do you want to do with their accounts? (removing the account will also remove its data)',
					array_merge($validActions, ['ask later']),
					0
			);
			$missingAccountsAction = $helper->ask($input, $output, $question);
		}

		$syncService = new SyncService($this->accountMapper, $backend, $this->config, $this->logger);


		$output->writeln("Insert new and update existing users ...");
		$userid = $input->getOption('userid');
		$consoleOutput = new ConsoleOutput($output);

		if ($userid) {
			$this->syncSingleUser($userid, $input, $output, $consoleOutput, $syncService, $backend, $missingAccountsAction, $validActions);
		} else {
			$this->syncMultipleUsers($input, $output, $consoleOutput, $syncService, $backend, $missingAccountsAction, $validActions);
		}

		$output->writeln('');
		$output->writeln('');

		return 0;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param ConsoleOutput $consoleOutput
	 * @param SyncService $syncService
	 * @param UserInterface $backend
	 * @param string $missingAccountsAction
	 * @param array $validActions
	 */
	private function syncMultipleUsers (
		InputInterface $input,
		OutputInterface $output,
		ConsoleOutput $consoleOutput,
		SyncService $syncService,
		UserInterface $backend,
		$missingAccountsAction,
		array $validActions
	) {

		$output->writeln("Analysing synced users ...");
		$consoleOutput->startProgress($this->accountMapper->getUserCount(false));
		$unknownUsers = $syncService->getNoLongerExistingUsers(function () use ($consoleOutput) {
			$consoleOutput->advance();
		});
		$consoleOutput->finishProgress();
		$output->writeln('');
		$output->writeln('');

		$this->handleUnknownUsers($unknownUsers, $input, $output, $missingAccountsAction, $validActions);

		// insert/update known users
		if ($output->getVerbosity() === OutputInterface::VERBOSITY_NORMAL) {
			if ($backend->implementsActions(\OC_User_Backend::COUNT_USERS)) {
				$consoleOutput->startProgress($backend->countUsers());
			} else {
				$consoleOutput->startProgress();
			}
		}

		$syncService->run(new SyncServiceCallback(
			$consoleOutput,
			$this->verbosityLevelMap[$output->getVerbosity()]
		));

		if ($output->getVerbosity() === OutputInterface::VERBOSITY_NORMAL) {
			$consoleOutput->finishProgress();
		}
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param ConsoleOutput $consoleOutput
	 * @param SyncService $syncService
	 * @param UserInterface $backend
	 * @param string $missingAccountsAction
	 * @param array $validActions
	 */
	private function syncSingleUser(
		$uid,
		InputInterface $input,
		OutputInterface $output,
		ConsoleOutput $consoleOutput,
		SyncService $syncService,
		UserInterface $backend,
		$missingAccountsAction,
		array $validActions
	) {

		$output->writeln("Analysing {$uid} ...");
		if (!$backend->userExists($uid)) {
			$this->handleUnknownUsers([$uid], $input, $output, $missingAccountsAction, $validActions);
		} else {
			// sync
			// use at least Verbose output
			if ($output->getVerbosity() === OutputInterface::VERBOSITY_NORMAL) {
				$logLevel = $this->verbosityLevelMap[OutputInterface::VERBOSITY_VERBOSE];
			} else {
				$logLevel = $this->verbosityLevelMap[$output->getVerbosity()];
			}
			$syncService->syncUser($uid, new SyncServiceCallback(
				$consoleOutput, $logLevel
			));
		}
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
	 * @param string[] $userIds
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param string $missingAccountsAction
	 * @param array $validActions
	 */
	private function handleUnknownUsers(array $userIds, InputInterface $input, OutputInterface $output, $missingAccountsAction, $validActions) {
		if (empty($userIds)) {
			$output->writeln("No unknown users have been detected.");
		} else {
			$output->writeln("Following users are no longer known with the connected backend.");
			switch ($missingAccountsAction) {
				case 'disable':
					$output->writeln("Proceeding to disable the accounts");
					$this->doActionForAccountUids($userIds,
						function ($uid, IUser $ac) use ($output) {
							$ac->setEnabled(false);
							$output->writeln($uid);
						},
						function ($uid) use ($output) {
							$output->writeln($uid . " (unknown account for the user)");
						});
					break;
				case 'remove':
					$output->writeln("Proceeding to remove the accounts");
					$this->doActionForAccountUids($userIds,
						function ($uid, IUser $ac) use ($output) {
							$ac->delete();
							$output->writeln($uid);
						},
						function ($uid) use ($output) {
							$output->writeln($uid . " (unknown account for the user)");
						});
					break;
				case 'ask later':
					$output->writeln("listing the unknown accounts");
					$this->doActionForAccountUids($userIds,
						function ($uid) use ($output) {
							$output->writeln($uid);
						},
						function ($uid) use ($output) {
							$output->writeln($uid . " (unknown account for the user)");
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
							$output->writeln("Proceeding to disable the accounts");
							$this->doActionForAccountUids($userIds,
								function ($uid, IUser $ac) {
									$ac->setEnabled(false);
								},
								function ($uid) use ($output) {
									$output->writeln($uid . " (unknown account for the user)");
								});
							break;
						case 'remove':
							$output->writeln("Proceeding to remove the accounts");
							$this->doActionForAccountUids($userIds,
								function ($uid, IUser $ac) {
									$ac->delete();
								},
								function ($uid) use ($output) {
									$output->writeln($uid . " (unknown account for the user)");
								});
							break;
					}
					break;
			}
		}
	}
}
