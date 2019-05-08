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

use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\Sync\AllUsersIterator;
use OC\User\Sync\SeenUsersIterator;
use OC\User\SyncService;
use OC\User\SyncLimiter;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IGroupManager;
use OCP\UserInterface;
use OCP\Mail\IMailer;
use OCP\L10N\IFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Helper\Table;

class SyncBackend extends Command {
	const VALID_ACTIONS = ['disable', 'remove'];

	/** @var AccountMapper */
	protected $accountMapper;
	/** @var IConfig */
	private $config;
	/** @var IUserManager */
	private $userManager;
	/** @var IGroupManager */
	private $groupManager;
	/** @var IMailer */
	private $mailer;
	/** @var IFactory */
	private $l10nFactory;
	/** @var ILogger */
	private $logger;

	/**
	 * @param AccountMapper $accountMapper
	 * @param IConfig $config
	 * @param IUserManager $userManager
	 * @param IGroupManager $groupManager
	 * @param IMailer $mailer
	 * @param ILogger $logger
	 */
	public function __construct(
		AccountMapper $accountMapper,
		IConfig $config,
		IUserManager $userManager,
		IGroupManager $groupManager,
		IMailer $mailer,
		IFactory $l10nFactory,
		ILogger $logger
	) {
		parent::__construct();
		$this->accountMapper = $accountMapper;
		$this->config = $config;
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
		$this->mailer = $mailer;
		$this->l10nFactory = $l10nFactory;
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
				'Action to take if the account isn\'t connected to a backend any longer. Options are "disable" and "remove". Note that removing the account will also remove the stored data and files for that account.'
			)
			->addOption(
				're-enable',
				'r',
				InputOption::VALUE_NONE,
				'When syncing multiple accounts re-enable accounts that are disabled in ownCloud but available in the synced backend.'
			);
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int|null
	 */
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
			$output->writeln("<error>The backend <$backendClassName> does not exist. Did you forget to enable the app?</error>");
			return 1;
		}
		if (!$backend->hasUserListings()) {
			$output->writeln("<error>The backend <$backendClassName> does not allow user listing. No sync is possible</error>");
			return 1;
		}

		if ($input->getOption('missing-account-action') !== null) {
			$missingAccountsAction = $input->getOption('missing-account-action');

			if (!\in_array($missingAccountsAction, self::VALID_ACTIONS, true)) {
				$output->writeln('<error>Unknown action. Choose between "disable" or "remove"</error>');
				return 1;
			}
		} else {
			// ask (if possible) how to handle missing accounts. Disable the accounts by default.
			$helper = $this->getHelper('question');
			$question = new ChoiceQuestion(
					'If unknown users are found, what do you want to do with their accounts? (removing the account will also remove its data)',

					\array_merge(self::VALID_ACTIONS, ['ask later']),
					0
			);
			$missingAccountsAction = $helper->ask($input, $output, $question);
		}

		$syncService = new SyncService($this->config, $this->logger, $this->accountMapper, new SyncLimiter($this->accountMapper, $this->config));

		$uid = $input->getOption('uid');

		if ($uid) {
			$this->syncSingleUser($input, $output, $syncService, $backend, $uid, $missingAccountsAction);
		} else {
			$this->syncMultipleUsers($input, $output, $syncService, $backend, $missingAccountsAction);
		}

		$stats = $this->showSyncStats($output, $this->accountMapper, $backend);

		$syncLimitInfo = $syncService->getUserLimitInfo(\get_class($backend));
		if ($syncLimitInfo) {
			$userCount = 0;
			// we're only interested in enabled and auto_disabled users.
			// other states won't determine whether we should send a notification or not
			if (isset($stats[Account::STATE_ENABLED])) {
				$userCount += $stats[Account::STATE_ENABLED];
			}
			if (isset($stats[Account::STATE_AUTODISABLED])) {
				$userCount += $stats[Account::STATE_AUTODISABLED];
			}

			if ($userCount > $syncLimitInfo['hard']) {
				$output->writeln("Several users have been automatically disabled because you have over {$syncLimitInfo['hard']} users");
				$output->writeln("Please consider to buy a enterprise license to have unlimited users in this backend");
				$this->notifyHardLimit($syncLimitInfo['soft'], $syncLimitInfo['hard'], $backend->getBackendName());
			} elseif ($userCount > $syncLimitInfo['soft']) {
				$output->writeln("You are getting near the {$syncLimitInfo['hard']} users, which is the maximum number of enabled users you can have");
				$output->writeln("Please consider to buy a enterprise license to have unlimited users in this backend");
				$this->notifySoftLimit($syncLimitInfo['soft'], $syncLimitInfo['hard'], $backend->getBackendName());
			}
		}
		// no need to do anything if there is no limit info

		return 0;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param SyncService $syncService
	 * @param UserInterface $backend
	 * @param string $missingAccountsAction
	 */
	private function syncMultipleUsers(
		InputInterface $input,
		OutputInterface $output,
		SyncService $syncService,
		UserInterface $backend,
		$missingAccountsAction
	) {
		$output->writeln('Analysing known accounts ...');
		$p = new ProgressBar($output);
		list($removedUsers, $reappearedUsers) = $syncService->analyzeExistingUsers($backend, function () use ($p) {
			$p->advance();
		});
		$p->finish();
		$output->writeln('');
		$output->writeln('');

		$this->handleRemovedUsers($removedUsers, $input, $output, $missingAccountsAction);

		$output->writeln('');

		if ($input->getOption('re-enable')) {
			$this->reEnableUsers($reappearedUsers, $output);
		}

		$output->writeln('');
		$backendClass = \get_class($backend);
		if ($input->getOption('seenOnly')) {
			$output->writeln("Updating seen accounts from $backendClass ...");
			$iterator = new SeenUsersIterator($this->accountMapper, $backendClass);
		} else {
			$output->writeln("Inserting new and updating all known users from $backendClass ...");
			$iterator = new AllUsersIterator($backend);
		}

		$p = new ProgressBar($output);
		$max = null;
		if ($backend->implementsActions(\OC\User\Backend::COUNT_USERS) && $input->getOption('showCount')) {
			$max = $backend->countUsers();
		}
		$p->start($max);

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
	 * @throws \LengthException
	 */
	private function syncSingleUser(
		InputInterface $input,
		OutputInterface $output,
		SyncService $syncService,
		UserInterface $backend,
		$uid,
		$missingAccountsAction
	) {
		$output->writeln("Syncing $uid ...");
		$users = $backend->getUsers($uid, 2);

		if (\count($users) > 1) {
			throw new \LengthException("Multiple users returned from backend for: $uid. Cancelling sync.");
		}

		$dummy = new Account(); // to prevent null pointer when writing messages
		if (\count($users) === 1) {
			// Run the sync using the internal username if mapped
			$syncService->run($backend, new \ArrayIterator([$users[0]]), function () {
			});
		} else {
			// Not found
			$this->handleRemovedUsers([$uid => $dummy], $input, $output, $missingAccountsAction);
		}

		$output->writeln('');

		if ($input->getOption('re-enable')) {
			$this->reEnableUsers([$uid => $dummy], $output);
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
	 * @param array $uidToAccountMap a list of uids to account objects
	 * @param callable $callbackExists the callback used if the account for the uid exists. The
	 * uid and the specific account will be passed as parameter to the callback in that order
	 * @param callable $callbackMissing the callback used if the account doesn't exists.
	 * The uid and account are passed as parameters to the callback
	 */
	private function doActionForAccountUids(array $uidToAccountMap, callable $callbackExists, callable $callbackMissing = null) {
		foreach ($uidToAccountMap as $uid => $account) {
			$user = $this->userManager->get($uid);
			if ($user === null) {
				$callbackMissing($uid, $account);
			} else {
				$callbackExists($uid, $user);
			}
		}
	}

	/**
	 * @param string[] $removedUsers
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @param $missingAccountsAction
	 */
	private function handleRemovedUsers(array $removedUsers, InputInterface $input, OutputInterface $output, $missingAccountsAction) {
		if (empty($removedUsers)) {
			$output->writeln('No removed users have been detected.');
		} else {

			// define some actions to be used
			$disableAction = function ($uid, IUser $user) use ($output) {
				if ($user->isEnabled()) {
					$user->setEnabled(false);
					$output->writeln("$uid, {$user->getDisplayName()}, {$user->getEMailAddress()} disabled");
				} else {
					$output->writeln("$uid, {$user->getDisplayName()}, {$user->getEMailAddress()} skipped, already disabled");
				}
			};
			$deleteAction = function ($uid, IUser $user) use ($output) {
				$user->delete();
				$output->writeln("$uid, {$user->getDisplayName()}, {$user->getEMailAddress()} deleted");
			};
			$writeNotExisting = function ($uid, Account $account) use ($output) {
				$output->writeln("$uid, {$account->getDisplayName()}, {$account->getEmail()} (no longer exists in the backend)");
			};

			switch ($missingAccountsAction) {
				case 'disable':
					$output->writeln('Disabling accounts:');
					$this->doActionForAccountUids(
						$removedUsers,
						$disableAction,
						$writeNotExisting
					);
					break;
				case 'remove':
					$output->writeln('Deleting accounts:');
					$this->doActionForAccountUids(
						$removedUsers,
						$deleteAction,
						$writeNotExisting
					);
					break;
				case 'ask later':
					$output->writeln('These accounts that are no longer available in the backend:');
					$this->doActionForAccountUids(
						$removedUsers,
						function ($uid) use ($output) {
							$output->writeln($uid);
						},
						$writeNotExisting
					);

					$helper = $this->getHelper('question');
					$question = new ChoiceQuestion(
						'What do you want to do with their accounts? (removing the account will also remove its data)',
						self::VALID_ACTIONS,
						0
					);
					$missingAccountsAction2 = $helper->ask($input, $output, $question);
					switch ($missingAccountsAction2) {
						// if "nothing" is selected, just ignore and finish
						case 'disable':
							$output->writeln('Disabling accounts');
							$this->doActionForAccountUids(
								$removedUsers,
								$disableAction,
								$writeNotExisting
							);
							break;
						case 'remove':
							$output->writeln('Deleting accounts:');
							$this->doActionForAccountUids(
								$removedUsers,
								$deleteAction,
								$writeNotExisting
							);
							break;
					}
					break;
			}
		}
	}

	/**
	 * Re-enable disabled accounts
	 * @param array $reappearedUsers map of uids to account objects
	 * @param OutputInterface $output
	 */
	private function reEnableUsers(array $reappearedUsers, OutputInterface $output) {
		if (empty($reappearedUsers)) {
			$output->writeln('No existing accounts to re-enable.');
		} else {
			$output->writeln('Re-enabling accounts:');

			$this->doActionForAccountUids($reappearedUsers,
				function ($uid, IUser $user) use ($output) {
					if ($user->isEnabled()) {
						$output->writeln("$uid, {$user->getDisplayName()}, {$user->getEMailAddress()} skipped, already enabled");
					} else {
						$user->setEnabled(true);
						$output->writeln("$uid, {$user->getDisplayName()}, {$user->getEMailAddress()} enabled");
					}
				},
				function ($uid) use ($output) {
					$output->writeln("$uid not enabled (no existing account found)");
				}
			);
		}
	}

	/**
	 * Show the number of users in the backend grouped by state. This function will
	 * return the same information as $mapper->getUserCountForBackendGroupByState(...)
	 * after that information has been written in the output.
	 */
	private function showSyncStats(OutputInterface $output, AccountMapper $mapper, UserInterface $backend) {
		$backendClassName = \get_class($backend);
		$stats = $mapper->getUserCountForBackendGroupByState($backendClassName);

		$stateToString = [
			Account::STATE_INITIAL => 'Initial State',
			Account::STATE_ENABLED => 'Enabled',
			Account::STATE_DISABLED => 'Disabled',
			Account::STATE_DELETED => 'Deleted',
			Account::STATE_AUTODISABLED => 'Auto Disabled',
		];

		$rowData = [];
		$userNumberInUnknownState = 0;
		foreach ($stats as $state => $userNumber) {
			if (isset($stateToString[$state])) {
				$rowData[] = [$stateToString[$state], $userNumber];
			} else {
				$userNumberInUnknownState += $userNumber;
			}
		}
		if ($userNumberInUnknownState > 0) {
			$rowData[] = ['Unknown State', $userNumberInUnknownState];
		}

		$output->writeln("Stats for $backendClassName");

		$table = new Table($output);
		$table->setHeaders(['State', 'User Count']);
		$table->setRows($rowData);
		$table->render();

		return $stats;
	}

	private function notifySoftLimit($softLimit, $hardLimit, $backendName) {
		if ($this->config->getAppValue('core', "sync_sent_{$backendName}_soft")) {
			return;
		}

		$adminGroup = $this->groupManager->get('admin');
		foreach ($adminGroup->getUsers() as $adminUser) {
			$adminUserEmail = $adminUser->getEMailAddress();
			if ($adminUserEmail === null || !$this->mailer->validateMailAddress($adminUserEmail)) {
				$this->logger->debug('Could not sent email to ' . $adminUser->getDisplayName());
				continue;
			}

			$userLanguage = $this->config->getUserValue($adminUser->getUID(), 'core', 'lang', 'en');
			$l10n = $this->l10nFactory->get('core', $userLanguage);

			$message = $l10n->t("You are getting near the %s users, which is the maximum number of enabled users you can have. Please consider to buy a enterprise license to have unlimited users in this backend", [
				$hardLimit
			]);

			$mail = $this->mailer->createMessage();
			$mail->setTo([$adminUserEmail]);
			$mail->setSubject((string) $l10n->t('Soft limit for users reached'));
			$mail->setPlainBody((string) $message);

			$this->mailer->send($mail);
		}
		$this->config->setAppValue('core', "sync_sent_{$backendName}_soft", \time());
	}

	private function notifyHardLimit($softLimit, $hardLimit, $backendName) {
		if ($this->config->getAppValue('core', "sync_sent_{$backendName}_hard")) {
			return;
		}

		$adminGroup = $this->groupManager->get('admin');
		foreach ($adminGroup->getUsers() as $adminUser) {
			$adminUserEmail = $adminUser->getEMailAddress();
			if ($adminUserEmail === null || !$this->mailer->validateMailAddress($adminUserEmail)) {
				$this->logger->debug('Could not sent email to ' . $adminUser->getDisplayName());
				continue;
			}

			$userLanguage = $this->config->getUserValue($adminUser->getUID(), 'core', 'lang', 'en');
			$l10n = $this->l10nFactory->get('core', $userLanguage);

			$message = $l10n->t("Several users have been automatically disabled because you have over %s users. Please consider to buy a enterprise license to have unlimited users in this backend", [
				$hardLimit
			]);

			$mail = $this->mailer->createMessage();
			$mail->setTo([$adminUserEmail]);
			$mail->setSubject((string) $l10n->t('Hard limit for users reached'));
			$mail->setPlainBody((string) $message);

			$this->mailer->send($mail);
		}
		$this->config->setAppValue('core', "sync_sent_{$backendName}_hard", \time());
	}
}
