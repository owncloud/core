<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Michael U <mdusher@users.noreply.github.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Chan <plus.vincchan@gmail.com>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Volkan Gezer <volkangezer@gmail.com>
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

use OC\Cache\CappedMemoryCache;
use OC\Hooks\PublicEmitter;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\Events\EventEmitterTrait;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IConfig;
use OCP\UserInterface;
use OCP\Util\UserSearch;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class Manager
 *
 * Hooks available in scope \OC\User:
 * - preSetPassword(\OC\User\User $user, string $password, string $recoverPassword)
 * - postSetPassword(\OC\User\User $user, string $password, string $recoverPassword)
 * - preDelete(\OC\User\User $user)
 * - postDelete(\OC\User\User $user)
 * - preCreateUser(string $uid, string $password)
 * - postCreateUser(\OC\User\User $user, string $password)
 * - change(\OC\User\User $user)
 *
 * @package OC\User
 */
class Manager extends PublicEmitter implements IUserManager {
	use EventEmitterTrait;
	/** @var UserInterface[] $backends */
	private $backends = [];

	/** @var CappedMemoryCache $cachedUsers */
	private $cachedUsers;

	/** @var IConfig $config */
	private $config;

	/** @var ILogger $logger */
	private $logger;

	/** @var AccountMapper */
	private $accountMapper;

	/** @var SyncService */
	private $syncService;

	/**
	 * @var UserSearch
	 */
	private $userSearch;

	/**
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param AccountMapper $accountMapper
	 * @param SyncService $syncService
	 * @param UserSearch $userSearch
	 */
	public function __construct(
		IConfig $config,
		ILogger $logger,
		AccountMapper $accountMapper,
		SyncService $syncService,
		UserSearch $userSearch
	) {
		$this->config = $config;
		$this->logger = $logger;
		$this->accountMapper = $accountMapper;
		$this->cachedUsers = new CappedMemoryCache();
		$this->syncService = $syncService;
		$this->userSearch = $userSearch;
		$cachedUsers = &$this->cachedUsers;
		$this->listen(
			'\OC\User', 'postDelete',
			function ($user) use (&$cachedUsers) {
				/** @var \OC\User\User $user */
				unset($cachedUsers[$user->getUID()]);
			}
		);
	}

	/**
	 * only used for unit testing
	 *
	 * @param AccountMapper $mapper
	 * @param array $backends
	 * @param SyncService $syncService
	 * @return array
	 */
	public function reset(AccountMapper $mapper, $backends, $syncService) {
		$return = [$this->accountMapper, $this->backends, $this->syncService];
		$this->accountMapper = $mapper;
		$this->backends = $backends;
		$this->syncService = $syncService;
		$this->cachedUsers->clear();

		return $return;
	}

	/**
	 * Get the active backends
	 * @return \OCP\UserInterface[]
	 */
	public function getBackends() {
		return \array_values($this->backends);
	}

	/**
	 * register a user backend
	 *
	 * @param \OCP\UserInterface $backend
	 */
	public function registerBackend($backend) {
		$this->backends[\get_class($backend)] = $backend;
	}

	/**
	 * remove a user backend
	 *
	 * @param \OCP\UserInterface $backend
	 */
	public function removeBackend($backend) {
		$this->cachedUsers->clear();
		unset($this->backends[\get_class($backend)]);
	}

	/**
	 * remove all user backends
	 */
	public function clearBackends() {
		$this->cachedUsers->clear();
		$this->backends = [];
	}

	/**
	 * get a user by user id
	 *
	 * @param string $uid
	 * @return \OC\User\User|null Either the user or null if the specified user does not exist
	 */
	public function get($uid) {
		// fix numeric uid that was cast by storing it in an array key
		if (\is_numeric($uid)) {
			$uid = (string)$uid;
		}
		if (!\is_string($uid)) {
			return null;
		}
		//check the cache first to prevent having to loop over the backends
		if ($this->cachedUsers->hasKey($uid)) {
			return $this->cachedUsers->get($uid);
		}
		try {
			$account = $this->accountMapper->getByUid($uid);
			return $this->getUserObject($account);
		} catch (DoesNotExistException $ex) {
			$this->cachedUsers->set($uid, null);
			return null;
		} catch (MultipleObjectsReturnedException $ex) {
			$this->logger->error(
				"More than one user found for $uid, treating as not existing.",
				['app' => __CLASS__]
			);
			$this->cachedUsers->set($uid, null);
			return null;
		}
	}

	/**
	 * get or construct the user object
	 *
	 * @param Account $account
	 * @param bool $cacheUser If false the newly created user object will not be cached
	 * @return \OC\User\User
	 */
	protected function getUserObject(Account $account, $cacheUser = true) {
		if ($this->cachedUsers->hasKey($account->getUserId())) {
			return $this->cachedUsers->get($account->getUserId());
		}

		$user = new User($account, $this->accountMapper, $this, $this->config, null, \OC::$server->getEventDispatcher());
		if ($cacheUser) {
			$this->cachedUsers->set($account->getUserId(), $user);
		}
		return $user;
	}

	/**
	 * check if a user exists
	 *
	 * @param string $uid
	 * @return bool
	 */
	public function userExists($uid) {
		$user = $this->get($uid);
		return ($user !== null);
	}

	/**
	 * Check if the password is valid for the user
	 *
	 * @param string $loginName
	 * @param string $password
	 * @return mixed the User object on success, false otherwise
	 */
	public function checkPassword($loginName, $password) {
		$loginName = \str_replace("\0", '', $loginName);
		$password = \str_replace("\0", '', $password);

		if (empty($this->backends)) {
			$this->registerBackend(new Database());
		}

		foreach ($this->backends as $backend) {
			if ($backend->implementsActions(Backend::CHECK_PASSWORD)) {
				$uid = $backend->checkPassword($loginName, $password);
				if ($uid !== false) {
					$account = $this->syncService->createOrSyncAccount($uid, $backend);
					return $this->getUserObject($account);
				}
			}
		}

		$this->logger->warning('Login failed: \''. $loginName .'\' (Remote IP: \''. \OC::$server->getRequest()->getRemoteAddress(). '\')', ['app' => 'core']);
		return false;
	}

	/**
	 * search by user id
	 *
	 * @param string $pattern
	 * @param int $limit
	 * @param int $offset
	 * @return \OC\User\User[]
	 */
	public function search($pattern, $limit = null, $offset = null) {
		$accounts = $this->accountMapper->search('user_id', $pattern, $limit, $offset);
		$users = [];
		if ($this->userSearch->isSearchable($pattern)) {
			foreach ($accounts as $account) {
				$user = $this->getUserObject($account);
				$users[$user->getUID()] = $user;
			}
		}

		return $users;
	}

	/**
	 * find a user account by checking user_id, display name and email fields
	 *
	 * @param string $pattern
	 * @param int $limit
	 * @param int $offset
	 * @return \OC\User\User[]
	 */
	public function find($pattern, $limit = null, $offset = null) {
		$accounts = $this->accountMapper->find($pattern, $limit, $offset);
		$users = [];
		if ($this->userSearch->isSearchable($pattern)) {
			foreach ($accounts as $account) {
				$user = $this->getUserObject($account);
				$users[$user->getUID()] = $user;
			}
		}
		return $users;
	}

	/**
	 * search by displayName
	 *
	 * @param string $pattern
	 * @param int $limit
	 * @param int $offset
	 * @return \OC\User\User[]
	 */
	public function searchDisplayName($pattern, $limit = null, $offset = null) {
		if ($this->userSearch->isSearchable($pattern)) {
			$accounts = $this->accountMapper->search('display_name', $pattern, $limit, $offset);
			return \array_map(function (Account $account) {
				return $this->getUserObject($account);
			}, $accounts);
		}
		return [];
	}

	/**
	 * @param string $uid
	 * @param string $password
	 * @throws \Exception
	 * @return bool|IUser the created user or false
	 */
	public function createUser($uid, $password) {
		return $this->emittingCall(function () use (&$uid, &$password) {
			$l = \OC::$server->getL10N('lib');

			// Check the name for bad characters
			// Allowed are: "a-z", "A-Z", "0-9" and "_.@-'"
			if (\preg_match('/[^a-zA-Z0-9 _\.@\-\']/', $uid)) {
				throw new \Exception($l->t('Only the following characters are allowed in a username:'
					. ' "a-z", "A-Z", "0-9", and "_.@-\'"'));
			}
			// No empty username
			if (\trim($uid) == '') {
				throw new \Exception($l->t('A valid username must be provided'));
			}
			// No whitespace at the beginning or at the end
			if (\strlen(\trim($uid, "\t\n\r\0\x0B\xe2\x80\x8b")) !== \strlen(\trim($uid))) {
				throw new \Exception($l->t('Username contains whitespace at the beginning or at the end'));
			}

			// Username must be at least 3 characters long
			if (\strlen($uid) < 3) {
				throw new \Exception($l->t('The username must be at least 3 characters long'));
			}

			// Username can only be a maximum of 64 characters long
			if (\strlen($uid) > 64) {
				throw new \Exception($l->t('The username can not be longer than 64 characters'));
			}

			// No empty password
			if (\trim($password) == '') {
				throw new \Exception($l->t('A valid password must be provided'));
			}

			// Check if user already exists
			if ($this->userExists($uid)) {
				throw new \Exception($l->t('The username is already being used'));
			}

			$this->emit('\OC\User', 'preCreateUser', [$uid, $password]);
			\OC::$server->getEventDispatcher()->dispatch(
				'OCP\User::validatePassword',
				new GenericEvent(null, ['uid' => $uid, 'password' => $password])
			);

			if (empty($this->backends)) {
				$this->registerBackend(new Database());
			}

			foreach ($this->backends as $backend) {
				if ($backend->implementsActions(Backend::CREATE_USER)) {
					$backend->createUser($uid, $password);
					$user = $this->createUserFromBackend($uid, $password, $backend);
					return $user === null ? false : $user;
				}
			}

			return false;
		}, ['before' => ['uid' => $uid], 'after' => ['uid' => $uid, 'password' => $password]], 'user', 'create');
	}

	/**
	 * @param string $uid
	 * @param UserInterface $backend
	 * @return IUser | null
	 * @deprecated core is responsible for creating accounts, see user_ldap how it is done
	 */
	public function createUserFromBackend($uid, $password, $backend) {
		return $this->emittingCall(function () use (&$uid, &$password, &$backend) {
			$this->emit('\OC\User', 'preCreateUser', [$uid, $password]);
			try {
				$account = $this->syncService->createOrSyncAccount($uid, $backend);
			} catch (\InvalidArgumentException $e) {
				return null; // because that's what this method should do
			}
			$user = $this->getUserObject($account);
			$this->emit('\OC\User', 'postCreateUser', [$user, $password]);
			return $user;
		}, ['before' => ['uid' => $uid]], 'user', 'create');
	}

	/**
	 * returns how many users per backend exist (if supported by backend)
	 *
	 * @param boolean $hasLoggedIn when true only users that have a lastLogin
	 *                entry in the preferences table will be affected
	 * @return array|int an array of backend class as key and count number as value
	 *                if $hasLoggedIn is true only an int is returned
	 */
	public function countUsers($hasLoggedIn = false) {
		if ($hasLoggedIn) {
			return $this->accountMapper->getUserCount($hasLoggedIn);
		}
		return $this->accountMapper->getUserCountPerBackend($hasLoggedIn);
	}

	/**
	 * The callback is executed for each user on each backend.
	 * If the callback returns false no further users will be retrieved.
	 *
	 * @param \Closure $callback
	 * @param string $search
	 * @param boolean $onlySeen when true only users that have a lastLogin entry
	 *                in the preferences table will be affected
	 * @since 9.0.0
	 */
	public function callForAllUsers(\Closure $callback, $search = '', $onlySeen = false) {
		$this->accountMapper->callForAllUsers(function (Account $account) use ($callback) {
			$user = $this->getUserObject($account);
			return $callback($user);
		}, $search, $onlySeen);
	}

	/**
	 * returns how many users have logged in once
	 *
	 * @return int
	 * @since 10.0
	 */
	public function countSeenUsers() {
		return $this->accountMapper->getUserCount(true);
	}

	/**
	 * @param \Closure $callback
	 * @since 10.0
	 */
	public function callForSeenUsers(\Closure $callback) {
		$this->callForAllUsers($callback, '', true);
	}

	/**
	 * @param string $email
	 * @return IUser[]
	 * @since 9.1.0
	 */
	public function getByEmail($email) {
		if ($email === null || \trim($email) === '') {
			throw new \InvalidArgumentException('$email cannot be empty');
		}
		$accounts = $this->accountMapper->getByEmail($email);
		return \array_map(function (Account $account) {
			return $this->getUserObject($account);
		}, $accounts);
	}

	public function getBackend($backendClass) {
		if (isset($this->backends[$backendClass])) {
			return $this->backends[$backendClass];
		}
		return null;
	}
}
