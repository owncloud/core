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
use OCP\IL10N;
use OCP\ILogger;
use OCP\IUserManager;

/**
 * Temporary lockout of local accounts after too many failed password attempts.
 *
 * The lockout always expires on its own - no administrative action is needed,
 * though an administrator can lift it early with `occ user:unlock`, and an
 * account is never disabled permanently.
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
	private const CONFIG_ENABLED = 'account_lockout.enabled';
	private const CONFIG_MAX_ATTEMPTS = 'account_lockout.max_attempts';
	private const CONFIG_DURATION = 'account_lockout.duration';
	private const CONFIG_ATTEMPT_WINDOW = 'account_lockout.attempt_window';

	private const DEFAULT_MAX_ATTEMPTS = 5;
	private const DEFAULT_DURATION = 600;
	private const DEFAULT_ATTEMPT_WINDOW = 900;

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
	 * That counts once for the email address and once for the account, so that
	 * logging in by email does not open a second budget of attempts on top of
	 * the user id. And if the retry succeeds, the email address did not fail
	 * at all, see clearFailures().
	 *
	 * @var array<string,true> the keys this request counted a failure for
	 */
	private $failuresRecordedFor = [];

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
	 * @param string $login the login name as submitted
	 * @throws AccountLockedException if too many passwords have been tried
	 */
	public function throwIfLockedOut($login) {
		$remaining = $this->getRemainingLockTime($login);
		if ($remaining <= 0) {
			return;
		}

		// injecting l10n does not work - there is a circular dependency between session and \OCP\L10N\IFactory
		$l10nFactory = \OC::$server->getL10NFactory();
		$this->logger->info("login $login refused, account is temporarily locked", ['app' => __METHOD__]);
		throw new AccountLockedException(
			$this->lockedMessage($l10nFactory->get('lib', 'en'), $remaining),
			$this->lockedMessage($l10nFactory->get('lib'), $remaining)
		);
	}

	/**
	 * @param IL10N $l
	 * @param int $remaining seconds
	 * @return string
	 */
	private function lockedMessage(IL10N $l, $remaining) {
		$minutes = (int)\ceil($remaining / 60);
		$retryIn = $minutes > 1
			? $l->n('%n minute', '%n minutes', $minutes)
			: $l->n('%n second', '%n seconds', $remaining);
		// the wording must not depend on whether the account exists - that would
		// turn the lockout into a user enumeration oracle
		return $l->t(
			'Too many failed login attempts. This account is temporarily locked. Please try again in %s.',
			[$retryIn]
		);
	}

	/**
	 * Count one failed password attempt and lock the account once the
	 * configured threshold is reached.
	 *
	 * @param string $login the login name as submitted
	 */
	public function recordFailure($login) {
		if (!$this->isEnabled()) {
			return;
		}
		$key = $this->keyFor($login);
		if (isset($this->failuresRecordedFor[$key]) || !$this->isTracked($login)) {
			return;
		}
		$this->failuresRecordedFor[$key] = true;
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
				"Temporarily locked out after {$row['fail_count']} failed login attempts: $key",
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
		$user = ($uid !== null && $this->failuresRecordedFor !== []) ? $this->userManager->get($uid) : null;
		foreach (\array_keys($this->failuresRecordedFor) as $failed) {
			// the email address which failed against the user id just before -
			// but only if it is this account's and not also the user id of
			// another one, or one account could reset the counter of another
			$owner = $this->userManager->get($failed);
			if ($user !== null
				&& $this->keyFor($user->getEMailAddress()) === $failed
				&& ($owner === null || $owner->getUID() === $user->getUID())
			) {
				$keys[] = $failed;
			}
		}
		$this->failuresRecordedFor = [];
		foreach (\array_unique($keys) as $key) {
			$this->mapper->delete($key);
		}
	}

	/**
	 * Lift a lockout before it expires - for an administrator, see `occ user:unlock`.
	 *
	 * Takes any login name, as locked out names need not belong to an account.
	 * When it resolves to one - by user id, or by an email address of exactly
	 * one account - the user id and the email address of that account are
	 * released too, as both are separate login names of the same account. The
	 * email address is not when it is also the user id of another account:
	 * that one has to be unlocked by its own user id.
	 *
	 * Works whether the lockout is enabled or not, so that disabling it is no
	 * prerequisite and enabling it again does not bring an old lockout back.
	 *
	 * @param string $login
	 * @return int number of login names which had failures counted
	 */
	public function unlock($login) {
		$login = \trim((string)$login);
		if ($login === '') {
			return 0;
		}
		$keys = [$this->keyFor($login)];

		$user = $this->userManager->get($login);
		if ($user === null) {
			$users = $this->userManager->getByEmail($login);
			$user = \count($users) === 1 ? $users[0] : null;
		}
		if ($user !== null) {
			$keys[] = $this->keyFor($user->getUID());
			$email = (string)$user->getEMailAddress();
			// not if the email address is also the user id of another account,
			// see clearFailures()
			$owner = $email === '' ? null : $this->userManager->get($this->keyFor($email));
			if ($email !== '' && ($owner === null || $owner->getUID() === $user->getUID())) {
				$keys[] = $this->keyFor($email);
			}
		}

		$removed = 0;
		foreach (\array_unique($keys) as $key) {
			$removed += $this->mapper->delete($key);
		}
		return $removed;
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
