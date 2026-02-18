<?php
/**
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
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

namespace OC\Session;

use OCP\ISession;
use OCP\Security\ICrypto;
use OCP\Session\Exceptions\SessionNotAvailableException;

/**
 * Class CryptoSessionData
 *
 * @package OC\Session
 */
class CryptoSessionData implements \ArrayAccess, ISession {
	protected ISession $session;
	protected ICrypto $crypto;
	protected string $passphrase;
	protected array $sessionValues;
	protected bool $isModified = false;
	public const encryptedSessionName = 'encrypted_session_data';

	/**
	 * @param ISession $session
	 * @param ICrypto $crypto
	 * @param string $passphrase
	 */
	public function __construct(
		ISession $session,
		ICrypto $crypto,
		$passphrase
	) {
		$this->crypto = $crypto;
		$this->session = $session;
		$this->passphrase = $passphrase;
		$this->initializeSession();
	}

	/**
	 * Close session if class gets destructed
	 */
	public function __destruct() {
		try {
			$this->close();
		} catch (SessionNotAvailableException) {
			// This exception can occur if session is already closed
			// So it is safe to ignore it and let the garbage collector to proceed
		}
	}

	protected function initializeSession(): void {
		$encryptedSessionData = $this->session->get(self::encryptedSessionName) ?? '';
		try {
			$this->sessionValues = \json_decode(
				$this->crypto->decrypt($encryptedSessionData, $this->passphrase),
				true
			) ?? [];
		} catch (\Exception) {
			$this->sessionValues = [];
		}
	}

	/**
	 * Set a value in the session
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public function set($key, $value): void {
		$this->sessionValues[$key] = $value;
		$this->isModified = true;
	}

	/**
	 * Get a value from the session
	 */
	public function get(string $key): mixed {
		return $this->sessionValues[$key] ?? null;
	}

	/**
	 * Check if a named key exists in the session
	 *
	 * @param string $key
	 * @return bool
	 */
	public function exists($key): bool {
		return isset($this->sessionValues[$key]);
	}

	/**
	 * Remove a $key/$value pair from the session
	 *
	 * @param string $key
	 */
	public function remove($key): void {
		$this->isModified = true;
		unset($this->sessionValues[$key]);
		$this->session->remove(self::encryptedSessionName);
	}

	/**
	 * Reset and recreate the session
	 */
	public function clear(): void {
		$this->sessionValues = [];
		$this->isModified = true;
		$this->session->clear();
	}

	/**
	 * Wrapper around session_regenerate_id
	 *
	 * @param bool $deleteOldSession Whether to delete the old associated session file or not.
	 * @return void
	 */
	public function regenerateId($deleteOldSession = true): void {
		$this->session->regenerateId($deleteOldSession);
	}

	/**
	 * Wrapper around session_id
	 *
	 * @return string
	 * @throws SessionNotAvailableException
	 * @since 9.1.0
	 */
	public function getId(): string {
		return $this->session->getId();
	}

	/**
	 * Close the session and release the lock, also writes all changed data in batch
	 */
	public function close(): void {
		if ($this->isModified) {
			$encryptedValue = $this->crypto->encrypt(\json_encode($this->sessionValues), $this->passphrase);
			$this->session->set(self::encryptedSessionName, $encryptedValue);
			$this->isModified = false;
		}
		$this->session->close();
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset): bool {
		return $this->exists($offset);
	}

	/**
	 * @param mixed $offset
	 * @return string|null
	 */
	public function offsetGet($offset): ?string {
		return $this->get($offset);
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 */
	public function offsetSet($offset, mixed $value): void {
		$this->set($offset, $value);
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetUnset($offset): void {
		$this->remove($offset);
	}
}
