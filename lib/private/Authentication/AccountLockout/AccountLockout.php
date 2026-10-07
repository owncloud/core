<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace OC\Authentication\AccountLockout;

use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUserManager;

/**
 * Temporary lockout of local accounts after too many failed password attempts.
 *
 * The lockout always expires on its own - there is no administrative unlock and
 * no permanent disabling of an account.
 *
 * Accounts served by an external backend (LDAP/AD, OIDC, ...) are not tracked:
 * the identity provider enforces its own policy and counting the same attempt
 * twice would punish twice.
 *
 * Login names which do not resolve to an account *are* tracked, and produce the
 * very same response as a locked existing account. Without that, the lockout
 * response would tell an attacker which user names exist.
 */
class AccountLockout {
	public const CONFIG_ENABLED = 'account_lockout.enabled';
	public const CONFIG_MAX_ATTEMPTS = 'account_lockout.max_attempts';
	public const CONFIG_DURATION = 'account_lockout.duration';
	public const CONFIG_ATTEMPT_WINDOW = 'account_lockout.attempt_window';

	public const DEFAULT_MAX_ATTEMPTS = 5;
	public const DEFAULT_DURATION = 600;
	public const DEFAULT_ATTEMPT_WINDOW = 900;

	/**
	 * The name reported by the built in user backend, lib/private/User/Database.php.
	 * Kept in exactly one place on purpose.
	 */
	private const LOCAL_BACKEND_NAME = 'Database';

	/** Matches the length of `account_lockouts`.`uid` */
	private const MAX_KEY_LENGTH = 128;

	/** @var LockoutMapper */
	private $mapper;
	/** @var IConfig */
	private $config;
	/** @var IUserManager */
	private $userManager;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var ILogger */
	private $logger;

	/**
	 * One HTTP request may attempt the same credentials twice - a login by
	 * email is retried with the resolved user id, see Session::logClientIn().
	 * That is one failure, not two.
	 *
	 * @var bool
	 */
	private $failureRecorded = false;

	public function __construct(
		LockoutMapper $mapper,
		IConfig $config,
		IUserManager $userManager,
		ITimeFactory $timeFactory,
		ILogger $logger
	) {
		$this->mapper = $mapper;
		$this->config = $config;
		$this->userManager = $userManager;
		$this->timeFactory = $timeFactory;
		$this->logger = $logger;
	}

	/**
	 * Seconds left before $login may be tried again, 0 if it is not locked.
	 *
	 * Deliberately does not look the account up unless a lockout is in effect,
	 * so the common case adds a single indexed read and no timing difference
	 * between existing and unknown login names.
	 *
	 * @param string $login the login name as submitted
	 * @return int
	 */
	public function getRemainingLockTime($login): int {
		if (!$this->isEnabled()) {
			return 0;
		}

		$row = $this->mapper->find($this->keyFor($login));
		if ($row === null || $row['locked_until'] === null) {
			return 0;
		}

		$remaining = $row['locked_until'] - $this->timeFactory->getTime();
		if ($remaining <= 0) {
			return 0;
		}

		// A login name which was unknown while the failures were counted may
		// meanwhile have appeared in an external backend. Do not hold that
		// account hostage - drop the counter instead.
		if (!$this->isTracked($login)) {
			$this->mapper->delete($this->keyFor($login));
			return 0;
		}

		return $remaining;
	}

	/**
	 * Count one failed password attempt and lock the account once the
	 * configured threshold is reached.
	 *
	 * @param string $login the login name as submitted
	 */
	public function recordFailure($login) {
		if (!$this->isEnabled() || $this->failureRecorded) {
			return;
		}
		if (!$this->isTracked($login)) {
			return;
		}
		$this->failureRecorded = true;

		$key = $this->keyFor($login);
		$now = $this->timeFactory->getTime();

		// Each statement stands on its own, so parallel requests - including
		// requests on other application servers - cannot lose a count.
		$counted = $this->mapper->restartIfStale($key, $now, $now - $this->getAttemptWindow());
		if ($counted === 0) {
			$counted = $this->mapper->increment($key, $now);
		}
		if ($counted === 0 && !$this->mapper->insertFirstFailure($key, $now)) {
			// lost the insert race, the winner's row is there to be counted
			$this->mapper->increment($key, $now);
		}

		$maxAttempts = $this->getMaxAttempts();
		$row = $this->mapper->find($key);
		if ($row === null || $row['fail_count'] < $maxAttempts || $row['locked_until'] !== null) {
			return;
		}

		if ($this->mapper->lock($key, $now + $this->getDuration(), $maxAttempts) > 0) {
			$this->logger->warning(
				\sprintf(
					'Temporarily locked out after %d failed login attempts: %s',
					$row['fail_count'],
					$key
				),
				['app' => 'core']
			);
		}
	}

	/**
	 * Forget all failures of an account - called on every successful login.
	 *
	 * @param string $login the login name as submitted
	 * @param string|null $uid the user id it resolved to, if known
	 */
	public function clearFailures($login, $uid = null) {
		if (!$this->isEnabled()) {
			return;
		}

		$keys = [$this->keyFor($login)];
		if ($uid !== null) {
			$keys[] = $this->keyFor($uid);
		}
		foreach (\array_unique($keys) as $key) {
			$this->mapper->delete($key);
		}
	}

	/**
	 * Housekeeping: forget counters which can no longer lock anybody out.
	 *
	 * @return int number of rows removed
	 */
	public function expireStale() {
		$now = $this->timeFactory->getTime();
		return $this->mapper->deleteStale($now - $this->getAttemptWindow(), $now);
	}

	/**
	 * Whether failures for this login name are counted at all. Unknown login
	 * names are, see the class comment; accounts of an external backend are not.
	 *
	 * @param string $login
	 * @return bool
	 */
	private function isTracked($login) {
		$user = $this->userManager->get($login);
		if ($user === null) {
			return true;
		}
		return $user->getBackendClassName() === self::LOCAL_BACKEND_NAME;
	}

	/**
	 * The row key for a login name. Core resolves accounts case insensitively,
	 * so the counter has to as well - otherwise `admin`, `Admin` and `ADMIN`
	 * would each get their own budget of attempts. Normalised in PHP rather
	 * than relying on the collation of the database in use.
	 *
	 * @param string $login
	 * @return string
	 */
	private function keyFor($login) {
		$key = \mb_strtolower(\trim((string)$login), 'UTF-8');
		return \mb_substr($key, 0, self::MAX_KEY_LENGTH, 'UTF-8');
	}

	/**
	 * @return bool
	 */
	private function isEnabled() {
		return (bool)$this->config->getSystemValue(self::CONFIG_ENABLED, true);
	}

	/**
	 * @return int
	 */
	private function getMaxAttempts() {
		return \max(1, (int)$this->config->getSystemValue(self::CONFIG_MAX_ATTEMPTS, self::DEFAULT_MAX_ATTEMPTS));
	}

	/**
	 * @return int
	 */
	private function getDuration() {
		return \max(1, (int)$this->config->getSystemValue(self::CONFIG_DURATION, self::DEFAULT_DURATION));
	}

	/**
	 * @return int
	 */
	private function getAttemptWindow() {
		return \max(1, (int)$this->config->getSystemValue(self::CONFIG_ATTEMPT_WINDOW, self::DEFAULT_ATTEMPT_WINDOW));
	}
}
