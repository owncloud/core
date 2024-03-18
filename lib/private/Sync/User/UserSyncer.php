<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace OC\Sync\User;

use OC\User\Account;
use OC\User\AccountMapper;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\Sync\ISyncer;
use OCP\Sync\SyncException;
use OCP\Sync\User\IUserSyncer;
use OCP\Sync\User\IUserSyncBackend;
use OCP\Sync\User\SyncBackendBrokenException;
use OCP\Sync\User\SyncBackendUserFailedException;
use OCP\Sync\User\SyncingUser;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\PreConditionNotMetException;

class UserSyncer implements IUserSyncer {
	/** @var IUserManager */
	private $userManager;
	/** @var AccountMapper */
	private $mapper;
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var array<string, IUserSyncBackend> */
	private $userSyncBackends = [];

	/**
	 * @param IUserManager $userManager
	 * @param AccountMapper $mapper
	 * @param IConfig $config
	 * @param ILogger $logger
	 */
	public function __construct(IUserManager $userManager, AccountMapper $mapper, IConfig $config, ILogger $logger) {
		$this->userManager = $userManager;
		$this->mapper = $mapper;
		$this->config = $config;
		$this->logger = $logger;
	}

	/**
	 * @inheritDoc
	 */
	public function registerBackend(IUserSyncBackend $userSyncBackend) {
		$this->userSyncBackends[\get_class($userSyncBackend)] = $userSyncBackend;
	}

	/**
	 * {@inheritDoc}
	 *
	 * Using "missingAction" as option won't do anything here. It will be ignored.
	 *
	 * This method won't take into account whether the backends (including the
	 * requested ones) are registered or not.
	 *
	 * Custom options:
	 * - "backends" => "back1,back2,back3"
	 *   Only those backends will be counted. The rest of the backends will
	 *   be ignored.
	 */
	public function localItemCount($opts = []): ?int {
		$backends = $this->extractBackendsFromOpts($opts);

		if (empty($backends)) {
			return $this->mapper->getUserCount(false);
		} else {
			$countPerBackend = $this->mapper->getUserCountPerBackend(false);
			$totalCount = 0;
			foreach ($countPerBackend as $backend => $nUsers) {
				if (\in_array($backend, $backends)) {
					$totalCount += $nUsers;
				}
			}
			return $totalCount;
		}
	}

	/**
	 * {@inheritDoc}
	 *
	 * This method will disable missing users by default, and will check
	 * all the backends if the "backends" option isn't provided.
	 *
	 * Custom options:
	 * - "missingAction" => "remove" or "disable".
	 *   The action to do if the account is missing in the backend
	 * - "backends" => "back1,back2,back3"
	 *   Only those backends will be checked. The rest of the backends will
	 *   be ignored. If the backends aren't registered, an error will be
	 *   send through the callback.
	 */
	public function check($callback, $opts = []) {
		$backends = $this->extractBackendsFromOpts($opts);

		$missingAction = 'disable';
		if (isset($opts['missingAction']) && $opts['missingAction'] === 'remove') {
			$missingAction = 'remove';
		}

		$backendToUserSync = [];
		$brokenBackends = [];
		foreach ($this->userSyncBackends as $userSyncBackend) {
			$userInterface = $userSyncBackend->getUserInterface();
			$userInterfaceClass = \get_class($userInterface);
			$backendToUserSync[$userInterfaceClass] = $userSyncBackend;

			if (!empty($backends) && !\in_array($userInterfaceClass, $backends)) {
				// mark the backend as broken in order to skip checking it
				$brokenBackends[$userInterfaceClass] = true;
			}
		}

		$this->mapper->callForUsers(function (Account $a) use ($callback, $backendToUserSync, &$brokenBackends, $missingAction) {
			// Note that we can't return false because we want to check all accounts
			// regardless of any error
			$targetBackend = $a->getBackend();

			if (isset($brokenBackends[$targetBackend])) {
				// skip without the callback
				return;
			}

			$targetUserSyncBackend = $backendToUserSync[$targetBackend] ?? null;
			if ($targetUserSyncBackend === null) {
				// backend not registered -> send and exception to the callback
				$callback(new SyncException("{$a->getUserId()}, backend {$targetBackend} is not found"), ISyncer::CHECK_STATE_ERROR);
				return;
			}

			$syncingUser = null;
			try {
				$syncingUser = $targetUserSyncBackend->getSyncingUser($a->getUserId());
			} catch (SyncBackendUserFailedException $ex) {
				$callback($ex, ISyncer::CHECK_STATE_ERROR);
				return;
			} catch (SyncBackendBrokenException $ex) {
				$callback($ex, ISyncer::CHECK_STATE_ERROR);
				$brokenBackends[$targetBackend] = true;
				return;
			}

			if ($syncingUser === null) {
				// user not found
				// generate key-value from the account
				$kv = [
					'uid' => $a->getUserId(),
					'displayname' => $a->getDisplayName(),
					'email' => $a->getEmail(),
				];

				$userObj = $this->userManager->get($a->getUserId()); // check for null? the user should always be found
				if ($missingAction === 'remove') {
					$userObj->delete();
					$callback($kv, ISyncer::CHECK_STATE_REMOVED);
				} else {
					if ($userObj->isEnabled()) {
						$userObj->setEnabled(false);
						$callback($kv, ISyncer::CHECK_STATE_DISABLED);
					} else {
						$callback($kv, ISyncer::CHECK_STATE_NO_CHANGE);
					}
				}
			} else {
				$callback($syncingUser->getAllData(), ISyncer::CHECK_STATE_NO_CHANGE);
			}
		}, '', false, null, null);
	}

	/**
	 * {@inheritDoc}
	 *
	 * Custom options:
	 * - "missingAction" => "remove" or "disable".
	 *   The action to do if the account is missing in the backend
	 * - "backends" => "back1,back2,back3"
	 *   Only those backends will be synced, assuming they're registered. The
	 *   rest of the backends will be ignored.
	 *
	 * @param string $id the id of the item we want to sync
	 * @param array<string, string> $opts options to customize the behavior
	 * @throws SyncException if the sync fails
	 * @return string any of the CHECK_STATE_* constants
	 */
	public function checkOne(string $id, $opts = []): string {
		$backends = $this->extractBackendsFromOpts($opts);
		$missingAction = 'disable';
		if (isset($opts['missingAction']) && $opts['missingAction'] === 'remove') {
			$missingAction = 'remove';
		}

		try {
			$account = $this->mapper->getByUid($id);
			$targetBackend = $account->getBackend();
		} catch (DoesNotExistException $e) {
			throw new SyncBackendUserFailedException("The database returned no accounts for this uid: $id");
		} catch (MultipleObjectsReturnedException $e) {
			throw new SyncBackendUserFailedException("The database returned multiple accounts for this uid: $id");
		}

		if (!empty($backends) && !\in_array($targetBackend, $backends)) {
			throw new SyncBackendUserFailedException("User found not belonging to any of the requested backends");
		}

		foreach ($this->userSyncBackends as $userSyncBackend) {
			if (!isset($targetBackend) || \get_class($userSyncBackend->getUserInterface()) === $targetBackend) {
				$syncingUser = $userSyncBackend->getSyncingUser($id);
				if ($syncingUser === null) {
					// user not found
					$userObj = $this->userManager->get($account->getUserId());
					if ($missingAction === 'remove') {
						$userObj->delete();
						return ISyncer::CHECK_STATE_REMOVED;
					} else {
						if ($userObj->isEnabled()) {
							$userObj->setEnabled(false);
							return ISyncer::CHECK_STATE_DISABLED;
						}
					}
				}
			}
		}
		return ISyncer::CHECK_STATE_NO_CHANGE;
	}

	/**
	 * {@inheritDoc}
	 *
	 * Custom options:
	 * - "backends" => "back1,back2,back3"
	 *   Only those backends will be synced, assuming they're registered. The
	 *   rest of the backends will be ignored.
	 *
	 * @param array<string, string> $opts options to customize the behavior
	 * @throws SyncException if the sync fails
	 * @return int|null the number of users or null if we can't get the info
	 */
	public function remoteItemCount($opts = []): ?int {
		$backends = $this->extractBackendsFromOpts($opts);

		$items = 0;
		foreach ($this->userSyncBackends as $userSyncBackend) {
			if (!empty($backends) && !\in_array(\get_class($userSyncBackend->getUserInterface()), $backends)) {
				// skip the backend
				continue;
			}

			$nUsers = $userSyncBackend->userCount();
			if ($nUsers === null) {
				return null;
			}
			$items += $nUsers;
		}
		return $items;
	}

	/**
	 * {@inheritDoc}
	 *
	 * Custom options:
	 * - "backends" => "back1,back2,back3"
	 *   Only those backends will be synced, assuming they're registered. The
	 *   rest of the backends will be ignored.
	 */
	public function sync($callback, $opts = []) {
		$backends = $this->extractBackendsFromOpts($opts);

		foreach ($this->userSyncBackends as $userSyncBackend) {
			if (!empty($backends) && !\in_array(\get_class($userSyncBackend->getUserInterface()), $backends)) {
				// skip the backend
				continue;
			}

			$userSyncBackend->resetPointer();
			$backendSyncing = true;
			do {
				try {
					$syncingUser = $userSyncBackend->getNextUser();
					if ($syncingUser === null) {
						// no more users in the backend
						$backendSyncing = false;
					} else {
						$this->syncSyncingUser($syncingUser, $userSyncBackend);
						$callback($syncingUser->getAllData());
					}
				} catch (SyncBackendUserFailedException $ex) {
					// jump to the next user
					$callback($ex);
					continue;
				} catch (SyncBackendBrokenException $ex) {
					// skip the current backend
					$callback($ex);
					break;
				}
			} while ($backendSyncing);
		}
	}

	/**
	 * {@inheritDoc}
	 *
	 * Custom options:
	 * - "backends" => "back1,back2,back3"
	 *   Only those backends will be synced, assuming they're registered. The
	 *   rest of the backends will be ignored.
	 *
	 * @param string $id the id of the item we want to sync
	 * @param array<string, string> $opts options to customize the behavior
	 * @throws SyncException if the sync fails
	 * @return bool true if synced without issues, false if the user isn't found
	 * remotely
	 */
	public function syncOne(string $id, $opts = []): bool {
		$backends = $this->extractBackendsFromOpts($opts);

		foreach ($this->userSyncBackends as $userSyncBackend) {
			if (!empty($backends) && !\in_array(\get_class($userSyncBackend->getUserInterface()), $backends)) {
				// skip the backend
				continue;
			}

			$syncingUser = $userSyncBackend->getSyncingUser($id);
			if ($syncingUser !== null) {
				$this->syncSyncingUser($syncingUser, $userSyncBackend);
				return true;
			}
		}
		return false;
	}

	/**
	 * Get a list of the requested backends from the opts.
	 */
	private function extractBackendsFromOpts($opts) {
		$backends = [];
		if (isset($opts['backends'])) {
			$backends = \explode(',', $opts['backends']);
		}
		return $backends;
	}

	/**
	 * Copied and adapted from the SyncService::createOrSyncAccount method
	 */
	private function syncSyncingUser(SyncingUser $syncingUser, IUserSyncBackend $userSyncBackend) {
		$backend = $userSyncBackend->getUserInterface();
		$uid = $syncingUser->getUid();
		// Try to find the account based on the uid
		try {
			$account = $this->mapper->getByUid($uid);
			// Check the backend matches
			$existingAccountBackend = \get_class($backend);
			if ($account->getBackend() !== $existingAccountBackend) {
				$this->logger->warning(
					"User <$uid> already provided by another backend({$account->getBackend()} !== $existingAccountBackend), skipping.",
					['app' => self::class]
				);
				throw new SyncBackendUserFailedException('Returned account has different backend to the requested backend for sync');
			}
		} catch (DoesNotExistException $e) {
			// Create a new account for this uid and backend pairing and sync
			$account = $this->createNewAccount(\get_class($backend), $uid);
		} catch (MultipleObjectsReturnedException $e) {
			throw new SyncBackendUserFailedException("The database returned multiple accounts for this uid: $uid");
		}

		// The account exists, sync
		$account = $this->syncAccount($account, $syncingUser);
		if ($account->getId() === null) {
			// New account, insert
			$this->mapper->insert($account);
		} else {
			$this->mapper->update($account);
		}
		return $account;
	}

	private function createNewAccount($backend, $uid) {
		$this->logger->info("Creating new account with UID $uid and backend $backend");
		$a = new Account();
		$a->setUserId($uid);
		$a->setState(Account::STATE_ENABLED);
		$a->setBackend($backend);
		return $a;
	}

	private function syncState(Account $a) {
		$uid = $a->getUserId();
		$value = $this->config->getUserValue($uid, 'core', 'enabled', null);
		if ($value !== null) {
			if ($value === 'true') {
				$a->setState(Account::STATE_ENABLED);
			} else {
				$a->setState(Account::STATE_DISABLED);
			}
			if (\array_key_exists('state', $a->getUpdatedFields())) {
				if ($value === 'true') {
					$this->logger->debug(
						"Enabling <$uid>",
						['app' => self::class]
					);
				} else {
					$this->logger->debug(
						"Disabling <$uid>",
						['app' => self::class]
					);
				}
			}
		}
	}

	/**
	 * @param Account $a
	 */
	private function syncLastLogin(Account $a) {
		$uid = $a->getUserId();
		$value = $this->config->getUserValue($uid, 'login', 'lastLogin', null);
		if ($value !== null) {
			$a->setLastLogin($value);
			if (\array_key_exists('lastLogin', $a->getUpdatedFields())) {
				$this->logger->debug(
					"Setting lastLogin for <$uid> to <$value>",
					['app' => self::class]
				);
			}
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncEmail(Account $a, SyncingUser $syncingUser) {
		$uid = $a->getUserId();
		$email = $syncingUser->getEmail();
		if ($email !== null) {
			$a->setEmail($email);
		} else {
			$email = $this->config->getUserValue($uid, 'settings', 'email', null);
			if ($email !== null) {
				$a->setEmail($email);
			}
		}

		if (\array_key_exists('email', $a->getUpdatedFields())) {
			$this->logger->debug(
				"Setting email for <$uid> to <$email>",
				['app' => self::class]
			);
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncQuota(Account $a, SyncingUser $syncingUser) {
		$uid = $a->getUserId();
		$quota = $syncingUser->getQuota();
		if ($quota !== null) {
			$a->setQuota($quota);
		} else {
			$quota = $this->config->getUserValue($uid, 'files', 'quota', null);
			if ($quota !== null) {
				$a->setQuota($quota);
			}
		}

		if (\array_key_exists('quota', $a->getUpdatedFields())) {
			$this->logger->debug(
				"Setting quota for <$uid> to <$quota>",
				['app' => self::class]
			);
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncHome(Account $a, SyncingUser $syncingUser) {
		// Fallback for backends that dont yet use the new interfaces
		$uid = $a->getUserId();
		$homeSyncing = $syncingUser->getHome();
		// Log when the backend returns a string that is a different home to the current value
		if (\is_string($homeSyncing) && $a->getHome() !== $homeSyncing) {
			$existing = $a->getHome();
			if ($existing !== '') {
				$this->logger->error("Returned home: $homeSyncing for user: $uid which differs from existing value: $existing");
			}
		}
		// Home is handled differently, it should only be set on account creation, when there is no home already set
		// Otherwise it could change on a sync and result in a new user folder being created
		if ($a->getHome() === '') {
			if (!\is_string($homeSyncing) || $homeSyncing[0] !== '/') {
				$homeSyncing = $this->config->getSystemValue('datadirectory', \OC::$SERVERROOT . '/data') . "/$uid";
				$this->logger->debug(
					"No home provided for <$uid>",
					['app' => self::class]
				);
			}
			// This will set the home if not provided by the backend
			$a->setHome($homeSyncing);
			if (\array_key_exists('home', $a->getUpdatedFields())) {
				$this->logger->debug(
					"Setting home for <$uid> to <$homeSyncing>",
					['app' => self::class]
				);
			}
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncDisplayName(Account $a, SyncingUser $syncingUser) {
		$uid = $a->getUserId();
		$displayName = $syncingUser->getDisplayName();
		if ($displayName !== null) {
			// TODO: What if displayName === null ; or the backend doesn't provide a displayName?
			$a->setDisplayName($displayName);
			if (\array_key_exists('displayName', $a->getUpdatedFields())) {
				$this->logger->debug(
					"Setting displayName for <$uid> to <$displayName>",
					['app' => self::class]
				);
			}
		}
	}

	/**
	 * TODO store username in account table instead of user preferences
	 *
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncUserName(Account $a, SyncingUser $syncingUser) {
		$uid = $a->getUserId();
		$userName = $syncingUser->getUserName();
		if ($userName !== null) {
			$currentUserName = $this->config->getUserValue($uid, 'core', 'username', null);
			if ($userName !== $currentUserName) {
				try {
					$this->config->setUserValue($uid, 'core', 'username', $userName);
				} catch (PreConditionNotMetException $e) {
					// ignore, because precondition is empty
				}
				$this->logger->debug(
					"Setting userName for <$uid> from <$currentUserName> to <$userName>",
					['app' => self::class]
				);
			}
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncSearchTerms(Account $a, SyncingUser $syncingUser) {
		$uid = $a->getUserId();
		$searchTerms = $syncingUser->getSearchTerms();
		if ($searchTerms !== null) {
			$a->setSearchTerms($searchTerms);
			if ($a->haveTermsChanged()) {
				$logTerms = \implode('|', $searchTerms);
				$this->logger->debug(
					"Setting searchTerms for <$uid> to <$logTerms>",
					['app' => self::class]
				);
			}
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend of the user
	 * @return Account
	 */
	private function syncAccount(Account $a, SyncingUser $syncingUser) {
		$this->syncState($a);
		$this->syncLastLogin($a);
		$this->syncEmail($a, $syncingUser);
		$this->syncQuota($a, $syncingUser);
		$this->syncHome($a, $syncingUser);
		$this->syncDisplayName($a, $syncingUser);
		$this->syncUserName($a, $syncingUser);
		$this->syncSearchTerms($a, $syncingUser);
		return $a;
	}
}
