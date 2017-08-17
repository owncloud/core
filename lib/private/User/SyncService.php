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
namespace OC\User;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\User\IProvidesEMailBackend;
use OCP\User\IProvidesExtendedSearchBackend;
use OCP\User\IProvidesQuotaBackend;
use OCP\UserInterface;

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

	/** @var UserInterface */
	private $backend;
	/** @var AccountMapper */
	private $mapper;
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var string */
	private $backendClass;

	/**
	 * SyncService constructor.
	 *
	 * @param AccountMapper $mapper
	 * @param UserInterface $backend
	 * @param IConfig $config
	 * @param ILogger $logger
	 */
	public function __construct(AccountMapper $mapper,
								UserInterface $backend,
								IConfig $config,
								ILogger $logger) {
		$this->mapper = $mapper;
		$this->backend = $backend;
		$this->backendClass = get_class($backend);
		$this->config = $config;
		$this->logger = $logger;
	}

	/**
	 * @param \Closure $callback is called for every user to allow progress display
	 * @return array
	 */
	public function getNoLongerExistingUsers(\Closure $callback) {
		// detect no longer existing users
		$toBeDeleted = [];
		$this->mapper->callForAllUsers(function (Account $a) use (&$toBeDeleted, $callback) {
			if ($a->getBackend() == $this->backendClass) {
				if (!$this->backend->userExists($a->getUserId())) {
					$toBeDeleted[] = $a->getUserId();
				}
			}
			$callback($a);
		}, '', false);

		return $toBeDeleted;
	}

	/**
	 * @param \Closure $callback is called for every user to progress display
	 */
	public function run(\Closure $callback) {
		$limit = 500;
		$offset = 0;
		do {
			$users = $this->backend->getUsers('', $limit, $offset);

			// update existing and insert new users
			foreach ($users as $uid) {
				try {
					$a = $this->mapper->getByUid($uid);
					if ($a->getBackend() !== $this->backendClass) {
						$this->logger->warning(
							"User <$uid> already provided by another backend({$a->getBackend()} != {$this->backendClass}), skipping.",
							['app' => self::class]
						);
						continue;
					}
					$a = $this->setupAccount($a, $uid);
					$this->mapper->update($a);
				} catch(DoesNotExistException $ex) {
					$a = $this->createNewAccount($uid);
					$this->setupAccount($a, $uid);
					$this->mapper->insert($a);
				}
				// clean the user's preferences
				$this->cleanPreferences($uid);

				// call the callback
				$callback($uid);
			}
			$offset += $limit;
		} while(count($users) >= $limit);
	}

	/**
	 * @param Account $a
	 * @param string $uid
	 * @return Account
	 */
	public function setupAccount(Account $a, $uid) {
		list($hasKey, $value) = $this->readUserConfig($uid, 'core', 'enabled');
		if ($hasKey) {
			$a->setState(($value === 'true') ? Account::STATE_ENABLED : Account::STATE_DISABLED);
		}
		list($hasKey, $value) = $this->readUserConfig($uid, 'login', 'lastLogin');
		if ($hasKey) {
			$a->setLastLogin($value);
		}
		if ($this->backend instanceof IProvidesEMailBackend) {
			$a->setEmail($this->backend->getEMailAddress($uid));
		} else {
			list($hasKey, $value) = $this->readUserConfig($uid, 'settings', 'email');
			if ($hasKey) {
				$a->setEmail($value);
			}
		}
		if ($this->backend instanceof IProvidesQuotaBackend) {
			$a->setQuota($this->backend->getQuota($uid));
		} else {
			list($hasKey, $value) = $this->readUserConfig($uid, 'files', 'quota');
			if ($hasKey) {
				$a->setQuota($value);
			}
		}
		if ($this->backend->implementsActions(\OC_User_Backend::GET_HOME)) {
			$home = $this->backend->getHome($uid);
			if (!is_string($home) || substr($home, 0, 1) !== '/') {
				$home = $this->config->getSystemValue('datadirectory', \OC::$SERVERROOT . '/data') . "/$uid";
				$this->logger->warning(
					"User backend {$this->backendClass} provided no home for <$uid>, using <$home>.",
					['app' => self::class]
				);
			}
			$a->setHome($home);
		}
		if ($this->backend->implementsActions(\OC_User_Backend::GET_DISPLAYNAME)) {
			$a->setDisplayName($this->backend->getDisplayName($uid));
		}
		// Check if backend supplies an additional search string
		if ($this->backend instanceof IProvidesExtendedSearchBackend) {
			$a->setSearchTerms($this->backend->getSearchTerms($uid));
		}
		return $a;
	}

	private function createNewAccount($uid) {
		$a = new Account();
		$a->setUserId($uid);
		$a->setState(Account::STATE_ENABLED);
		$a->setBackend(get_class($this->backend));
		return $a;
	}

	/**
	 * @param string $uid
	 * @param string $app
	 * @param string $key
	 * @return array
	 */
	private function readUserConfig($uid, $app, $key) {
		$keys = $this->config->getUserKeys($uid, $app);
		if (in_array($key, $keys)) {
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
