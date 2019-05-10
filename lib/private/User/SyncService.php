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
namespace OC\User;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\PreConditionNotMetException;
use OCP\User\IProvidesDisplayNameBackend;
use OCP\User\IProvidesEMailBackend;
use OCP\User\IProvidesExtendedSearchBackend;
use OCP\User\IProvidesHomeBackend;
use OCP\User\IProvidesQuotaBackend;
use OCP\User\IProvidesUserNameBackend;
use OCP\UserInterface;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

/**
 * Class SyncService
 *
 * All users in a user backend are transferred into the account table.
 * In case a user is know all preferences will be transferred from the table
 * oc_preferences into the account table.
 *
 * @package OC\User
 */
class SyncService {

	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var AccountMapper */
	private $mapper;
	/** @var SyncLimiter */
	private $syncLimiter;

	/**
	 * SyncService constructor.
	 *
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param AccountMapper $mapper
	 */
	public function __construct(
		IConfig $config,
		ILogger $logger,
		AccountMapper $mapper,
		SyncLimiter $syncLimiter
	) {
		$this->config = $config;
		$this->logger = $logger;
		$this->mapper = $mapper;
		$this->syncLimiter = $syncLimiter;
	}

	/**
	 * For unit tests
	 * @param AccountMapper $mapper
	 */
	public function setAccountMapper(AccountMapper $mapper) {
		$this->mapper = $mapper;
	}

	/**
	 * @param UserInterface $backend the backend to check
	 * @param \Closure $callback is called for every user to allow progress display
	 * @return array[] the first array contains a uid => account map of users that were removed in the external backend
	 *                 the second array contains a uid => account map of users that are not enabled in oc, but are available in the external backend
	 */
	public function analyzeExistingUsers(UserInterface $backend, \Closure $callback) {
		$removed = [];
		$reappeared = [];
		$backendClass = \get_class($backend);
		$this->mapper->callForAllUsers(function (Account $a) use (&$removed, &$reappeared, $backend, $backendClass, $callback) {
			// Check if the backend matches handles this user
			$this->checkIfAccountReappeared($a, $removed, $reappeared, $backend, $backendClass);
			$callback($a);
		}, '', false);
		return [$removed, $reappeared];
	}

	/**
	 * Checks a backend to see if a user reappeared relative to the accounts table
	 * @param Account $a
	 * @param array $removed
	 * @param array $reappeared
	 * @param UserInterface $backend
	 * @param $backendClass
	 * @return void
	 */
	private function checkIfAccountReappeared(Account $a, array &$removed, array &$reappeared, UserInterface $backend, $backendClass) {
		if ($a->getBackend() === $backendClass) {
			// Does the backend have this user still
			if ($backend->userExists($a->getUserId())) {
				// Is the user not enabled currently?
				if ($a->getState() !== Account::STATE_ENABLED) {
					$reappeared[$a->getUserId()] = $a;
				}
			} else {
				// The backend no longer has this user
				$removed[$a->getUserId()] = $a;
			}
		}
	}

	/**
	 * @param UserInterface $backend to sync
	 * @param \Traversable $userIds of users
	 * @param \Closure $callback is called for every user to progress display
	 */
	public function run(UserInterface $backend, \Traversable $userIds, \Closure $callback) {
		// update existing and insert new users
		foreach ($userIds as $uid) {
			try {
				$account = $this->internalCreateOrSyncAccount($uid, $backend);
				$uid = $account->getUserId(); // get correct case
				// clean the user's preferences
				$this->cleanPreferences($uid);
			} catch (\Exception $e) {
				// Error syncing this user
				$backendClass = \get_class($backend);
				$this->logger->error("Error syncing user with uid: $uid and backend: $backendClass");
				$this->logger->logException($e);
			}

			// call the callback
			$callback($uid);
		}
		$this->syncLimiter->limitEnabledUsers();
	}

	/**
	 * @param Account $a
	 */
	private function syncState(Account $a) {
		$uid = $a->getUserId();
		list($hasKey, $value) = $this->readUserConfig($uid, 'core', 'enabled');
		if ($hasKey) {
			if ($value === 'true') {
				$a->setState(Account::STATE_ENABLED);
			} else {
				$a->setState(Account::STATE_DISABLED);
			}
			if (\array_key_exists('state', $a->getUpdatedFields())) {
				if ($value === 'true') {
					$this->logger->debug(
						"Enabling <$uid>", ['app' => self::class]
					);
				} else {
					$this->logger->debug(
						"Disabling <$uid>", ['app' => self::class]
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
		list($hasKey, $value) = $this->readUserConfig($uid, 'login', 'lastLogin');
		if ($hasKey) {
			$a->setLastLogin($value);
			if (\array_key_exists('lastLogin', $a->getUpdatedFields())) {
				$this->logger->debug(
					"Setting lastLogin for <$uid> to <$value>", ['app' => self::class]
				);
			}
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncEmail(Account $a, UserInterface $backend) {
		$uid = $a->getUserId();
		$email = null;
		if ($backend instanceof IProvidesEMailBackend) {
			$email = $backend->getEMailAddress($uid);
			$a->setEmail($email);
		} else {
			list($hasKey, $email) = $this->readUserConfig($uid, 'settings', 'email');
			if ($hasKey) {
				$a->setEmail($email);
			}
		}
		if (\array_key_exists('email', $a->getUpdatedFields())) {
			$this->logger->debug(
				"Setting email for <$uid> to <$email>", ['app' => self::class]
			);
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncQuota(Account $a, UserInterface $backend) {
		$uid = $a->getUserId();
		$quota = null;
		if ($backend instanceof IProvidesQuotaBackend) {
			$quota = $backend->getQuota($uid);
			if ($quota !== null) {
				$a->setQuota($quota);
			}
		}
		if ($quota === null) {
			list($hasKey, $quota) = $this->readUserConfig($uid, 'files', 'quota');
			if ($hasKey) {
				$a->setQuota($quota);
			}
		}
		if (\array_key_exists('quota', $a->getUpdatedFields())) {
			$this->logger->debug(
				"Setting quota for <$uid> to <$quota>", ['app' => self::class]
			);
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncHome(Account $a, UserInterface $backend) {
		// Fallback for backends that dont yet use the new interfaces
		$proividesHome = $backend instanceof IProvidesHomeBackend || $backend->implementsActions(\OC\User\Backend::GET_HOME);
		$uid = $a->getUserId();
		// Log when the backend returns a string that is a different home to the current value
		if ($proividesHome && \is_string($backend->getHome($uid)) && $a->getHome() !== $backend->getHome($uid)) {
			$existing = $a->getHome();
			$backendHome = $backend->getHome($uid);
			$class = \get_class($backend);
			if ($existing !== '') {
				$this->logger->error("User backend $class is returning home: $backendHome for user: $uid which differs from existing value: $existing");
			}
		}
		// Home is handled differently, it should only be set on account creation, when there is no home already set
		// Otherwise it could change on a sync and result in a new user folder being created
		if ($a->getHome() === null) {
			$home = false;
			if ($proividesHome) {
				$home = $backend->getHome($uid);
			}
			if (!\is_string($home) || $home[0] !== '/') {
				$home = $this->config->getSystemValue('datadirectory', \OC::$SERVERROOT . '/data') . "/$uid";
				$this->logger->debug(
					'User backend ' .\get_class($backend)." provided no home for <$uid>",
					['app' => self::class]
				);
			}
			// This will set the home if not provided by the backend
			$a->setHome($home);
			if (\array_key_exists('home', $a->getUpdatedFields())) {
				$this->logger->debug(
					"Setting home for <$uid> to <$home>", ['app' => self::class]
				);
			}
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncDisplayName(Account $a, UserInterface $backend) {
		$uid = $a->getUserId();
		if ($backend instanceof IProvidesDisplayNameBackend || $backend->implementsActions(\OC\User\Backend::GET_DISPLAYNAME)) {
			$displayName = $backend->getDisplayName($uid);
			$a->setDisplayName($displayName);
			if (\array_key_exists('displayName', $a->getUpdatedFields())) {
				$this->logger->debug(
					"Setting displayName for <$uid> to <$displayName>", ['app' => self::class]
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
	private function syncUserName(Account $a, UserInterface $backend) {
		$uid = $a->getUserId();
		if ($backend instanceof IProvidesUserNameBackend) {
			$userName = $backend->getUserName($uid);
			$currentUserName = $this->config->getUserValue($uid, 'core', 'username', null);
			if ($userName !== $currentUserName) {
				try {
					$this->config->setUserValue($uid, 'core', 'username', $userName);
				} catch (PreConditionNotMetException $e) {
					// ignore, because precondition is empty
				}
				$this->logger->debug(
					"Setting userName for <$uid> from <$currentUserName> to <$userName>", ['app' => self::class]
				);
			}
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend
	 */
	private function syncSearchTerms(Account $a, UserInterface $backend) {
		$uid = $a->getUserId();
		if ($backend instanceof IProvidesExtendedSearchBackend) {
			$searchTerms = $backend->getSearchTerms($uid);
			$a->setSearchTerms($searchTerms);
			if ($a->haveTermsChanged()) {
				$logTerms = \implode('|', $searchTerms);
				$this->logger->debug(
					"Setting searchTerms for <$uid> to <$logTerms>", ['app' => self::class]
				);
			}
		}
	}

	/**
	 * @param Account $a
	 * @param UserInterface $backend of the user
	 * @return Account
	 */
	public function syncAccount(Account $a, UserInterface $backend) {
		$this->syncState($a);
		$this->syncLastLogin($a);
		$this->syncEmail($a, $backend);
		$this->syncQuota($a, $backend);
		$this->syncHome($a, $backend);
		$this->syncDisplayName($a, $backend);
		$this->syncUserName($a, $backend);
		$this->syncSearchTerms($a, $backend);
		return $a;
	}

	/**
	 * @param $uid
	 * @param UserInterface $backend
	 * @return Account
	 * @throws \Exception
	 * @throws \InvalidArgumentException if you try to sync with a backend
	 * that doesnt match an existing account
	 */
	public function createOrSyncAccount($uid, UserInterface $backend) {
		$account = $this->internalCreateOrSyncAccount($uid, $backend);
		$this->syncLimiter->limitEnabledUsers();
		return $account;
	}

	private function internalCreateOrSyncAccount($uid, UserInterface $backend) {
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
				throw new \InvalidArgumentException('Returned account has different backend to the requested backend for sync');
			}
		} catch (DoesNotExistException $e) {
			// Create a new account for this uid and backend pairing and sync
			$account = $this->createNewAccount(\get_class($backend), $uid);
		} catch (MultipleObjectsReturnedException $e) {
			throw new \Exception("The database returned multiple accounts for this uid: $uid");
		}

		// The account exists, sync
		$account = $this->syncAccount($account, $backend);
		if ($account->getId() === null) {
			// New account, insert
			$this->mapper->insert($account);
		} else {
			$this->mapper->update($account);
		}
		return $account;
	}

	/**
	 * @param string $backend of the user
	 * @param string $uid of the user
	 * @return Account
	 */
	public function createNewAccount($backend, $uid) {
		$this->logger->info("Creating new account with UID $uid and backend $backend");
		$a = new Account();
		$a->setUserId($uid);
		$a->setState(Account::STATE_ENABLED);
		$a->setBackend($backend);
		return $a;
	}

	/**
	 * Check if any additional to-be-enabled user in the specified backend will be disabled
	 * in the next sync run according to the limits set by the SyncLimiter.
	 * @param string $backend the backend to check
	 * @return bool true if the user will be disabled, false otherwise
	 */
	public function userWillBeDisabledInBackend($backend) {
		$limitInfo = $this->syncLimiter->getLimitInfo();
		if (!isset($limitInfo[$backend])) {
			// no limit info found for the backend -> user can be enabled
			return false;
		}

		if ($limitInfo[$backend] === false) {
			// limit disabled for that backend
			return false;
		}

		$backendStateStats = $this->mapper->getUserCountForBackendGroupByState($backend);
		$numberOfEnabledUsers = 0;
		if (isset($backendStateStats[Account::STATE_ENABLED])) {
			$numberOfEnabledUsers = $backendStateStats[Account::STATE_ENABLED];
		}

		if ($numberOfEnabledUsers >= $limitInfo[$backend]['hard']) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get the user limitation being applied by the SyncService for the specified backend
	 * If there is no limit being applied, this function will return false, otherwise it will
	 * return an array with "soft" and "hard" keys meaning the soft and hard limits for
	 * the number of enabled users in the backend.
	 * ['soft' => X, 'hard' => Y]
	 * @param string $backend the backend name to check the limits
	 * @return array|false an array with the limit information for the backend or false if no
	 * limit is set.
	 */
	public function getUserLimitInfo($backend) {
		$limitInfo = $this->syncLimiter->getLimitInfo();
		if (isset($limitInfo[$backend])) {
			return $limitInfo[$backend];
		} else {
			return false;
		}
	}

	/**
	 * Get stat info about the limits being applied by this SyncService. The information returned
	 * will contain per backend: the limits being applied for the backend and the and the number of
	 * users which are in a specific state.
	 * The function will return something like:
	 * [
	 *   'myBackend' => [
	 *     'limits' => $limits,
	 *     'usersStatsCode' => $stats,
	 *     'usersStats' => $statsTranslated
	 *   ]
	 * ]
	 * The limits will contain an array with soft and hard limits of the backend, or false if the
	 * limits are disabled
	 * Both the usersStatsCode and usersStats will contain mainly the same information. The main
	 * difference is that the keys usersStatsCode will be the Account::STATE_* constants (numeric)
	 * while the usersStats will be the "translated" name of those constants (string). Another difference
	 * is that a new "Unknown State" key might appear in the usersStats grouping non-translated states
	 * @return array with the information explained above
	 */
	public function getLimitInfoStats() {
		$stateToString = [
			Account::STATE_INITIAL => 'Initial State',
			Account::STATE_ENABLED => 'Enabled',
			Account::STATE_DISABLED => 'Disabled',
			Account::STATE_DELETED => 'Deleted',
			Account::STATE_AUTODISABLED => 'Auto Disabled',
		];

		$stats = [];
		$limitInfo = $this->syncLimiter->getLimitInfo();
		foreach ($limitInfo as $backend => $limits) {
			$backendStateStats = $this->mapper->getUserCountForBackendGroupByState($backend);
			$backendStateStatsTranslated = [];
			$userNumberInUnknownState = 0;
			foreach ($backendStateStats as $backendStateCode => $userCount) {
				if (isset($stateToString[$backendStateCode])) {
					$stateName = $stateToString[$backendStateCode];
					$backendStateStatsTranslated[$stateName] = $userCount;
				} else {
					$userNumberInUnknownState += $userCount;
				}
			}

			if ($userNumberInUnknownState > 0) {
				$backendStateStatsTranslated['Unknown State'] = $userNumberInUnknownState;
			}
			
			$stats[$backend] = [
				'limits' => $limits,
				'usersStatsCode' => $backendStateStats,
				'usersStats' => $backendStateStatsTranslated,
			];
		}
		return $stats;
	}

	/**
	 * @param string $uid
	 * @param string $app
	 * @param string $key
	 * @return array
	 */
	private function readUserConfig($uid, $app, $key) {
		$keys = $this->config->getUserKeys($uid, $app);
		if (\in_array($key, $keys, true)) {
			$enabled = $this->config->getUserValue($uid, $app, $key);
			return [true, $enabled];
		}
		return [false, null];
	}

	/**
	 * @param string $uid
	 */
	private function cleanPreferences($uid) {
		$this->config->deleteUserValue($uid, 'core', 'enabled');
		$this->config->deleteUserValue($uid, 'login', 'lastLogin');
		$this->config->deleteUserValue($uid, 'settings', 'email');
		$this->config->deleteUserValue($uid, 'files', 'quota');
	}
}
