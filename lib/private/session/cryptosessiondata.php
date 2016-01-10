<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

use OCP\IDBConnection;
use OCP\ISession;
use OCP\Security\ICrypto;

/**
 * Class CryptoSessionData
 *
 * @package OC\Session
 */
class CryptoSessionData implements \ArrayAccess, ISession {
	/** @var ISession */
	protected $session;
	/** @var \OCP\Security\ICrypto */
	protected $crypto;
	/** @var string */
	protected $passphrase;
	/** @var array */
	protected $sessionValues;
	/** @var bool */
	protected $isModified = false;
	/** @var IDBConnection */
	private $dbConnection;
	CONST encryptedSessionName = 'encrypted_session_data';
	/**
	 * time (in seconds) after which the DB is check if the current session was killed
	 *
	 * @see checkKilledSession()
	 **/
	CONST killedSessionCheckTimeout = 5;
	/**
	 * time (in seconds) after which the DB timestamp is updated at most
	 *
	 * @see set()
	 **/
	CONST updateDBTimeout = 5;

	/**
	 * @param ISession $session
	 * @param ICrypto $crypto
	 * @param string $passphrase
	 */
	public function __construct(ISession $session,
								ICrypto $crypto,
								$passphrase) {
		$this->crypto = $crypto;
		$this->session = $session;
		$this->passphrase = $passphrase;
		$this->initializeSession();
		$this->checkKilledSession();
	}

	/**
	 * Close session if class gets destructed
	 */
	public function __destruct() {
		$this->close();
	}

	protected function initializeSession() {
		$encryptedSessionData = $this->session->get(self::encryptedSessionName);
		try {
			$this->sessionValues = json_decode(
				$this->crypto->decrypt($encryptedSessionData, $this->passphrase),
				true
			);
		} catch (\Exception $e) {
			$this->sessionValues = [];
		}
	}

	/**
	 * Checks if the session was killed remotely and logs out the user if this is the case
	 */
	protected function checkKilledSession() {
		$userId = $this->get('user_id');
		$lastSessionCheck = $this->get('LAST_SESSION_CHECK');
		$checkNeeded = is_null($lastSessionCheck) || time() - $lastSessionCheck > self::killedSessionCheckTimeout;

		if(!is_null($userId) && $userId !== '' && $checkNeeded) {
			$this->set('LAST_SESSION_CHECK', time());
			$qb = $this->getQueryBuilder();
			$stmt = $qb->select('session_id')
				->from('sessions')
				->where($qb->expr()->eq('session_id', session_id()))
				->execute();
			$result = $stmt->fetch();
			$stmt->closeCursor();

			// session was killed remotely
			if($result === false) {
				// this avoids the delete query in the clear() logic
				$this->remove('LAST_DB_UPDATE');

				$this->clear();
			}
		}
	}

	/**
	 * Set a value in the session
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public function set($key, $value) {
		if($key === 'LAST_ACTIVITY' && $this->exists('user_id')) {
			$lastDBUpdate = $this->get('LAST_DB_UPDATE');
			if (time() - $lastDBUpdate > self::updateDBTimeout) {
				$this->set('LAST_DB_UPDATE', time());

				$qb = $this->getQueryBuilder();
				$qb->update('sessions')
					->set('last_activity_at', $qb->createNamedParameter($value))
					->where($qb->expr()->eq('session_id', session_id()))
					->execute();
			}
		}

		$this->sessionValues[$key] = $value;
		$this->isModified = true;

		if($key === 'user_id' && $value !== '') {
			$this->set('LAST_DB_UPDATE', time());

			$request = \OC::$server->getRequest();
			$userAgent = $request->server['HTTP_USER_AGENT'];
			$remoteAddr = $request->getRemoteAddress();

			$createdAt = time();

			$qb = $this->getQueryBuilder();
			$qb->insert('sessions')
				->setValue('user_id', $qb->createNamedParameter($value))
				->setValue('session_id', $qb->createNamedParameter(session_id()))
				->setValue('created_at', $qb->createNamedParameter($createdAt))
				->setValue('last_activity_at', $qb->createNamedParameter($createdAt))
				->setValue('info', $qb->createNamedParameter(json_encode(['ip' => $remoteAddr, 'user_agent' => $userAgent])))
				->execute();
		}
	}

	/**
	 * Get a value from the session
	 *
	 * @param string $key
	 * @return string|null Either the value or null
	 */
	public function get($key) {
		if(isset($this->sessionValues[$key])) {
			return $this->sessionValues[$key];
		}

		return null;
	}

	/**
	 * Check if a named key exists in the session
	 *
	 * @param string $key
	 * @return bool
	 */
	public function exists($key) {
		return isset($this->sessionValues[$key]);
	}

	/**
	 * Remove a $key/$value pair from the session
	 *
	 * @param string $key
	 */
	public function remove($key) {
		$this->isModified = true;
		unset($this->sessionValues[$key]);
		$this->session->remove(self::encryptedSessionName);
	}

	/**
	 * Reset and recreate the session
	 */
	public function clear() {
		if($this->exists('LAST_DB_UPDATE')) {
			$qb = $this->getQueryBuilder();
			$qb->delete('sessions')
				->where($qb->expr()->eq('session_id', session_id()))
				->execute();
		}

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
	public function regenerateId($deleteOldSession = true) {
		$userId = $this->get('user_id');
		$isValidUserId = !is_null($userId) && $userId !== '';
		if($deleteOldSession && $isValidUserId) {
			$qb = $this->getQueryBuilder();
			$qb->delete('sessions')
				->where($qb->expr()->eq('session_id', session_id()))
				->execute();
		}

		$this->session->regenerateId($deleteOldSession);

		if($isValidUserId) {
			$this->set('LAST_DB_UPDATE', time());

			$request = \OC::$server->getRequest();
			$userAgent = $request->server['HTTP_USER_AGENT'];
			$remoteAddr = $request->getRemoteAddress();
			$createdAt = time();

			$qb = $this->getQueryBuilder();
			$qb->insert('sessions')
				->setValue('user_id', $qb->createNamedParameter($userId))
				->setValue('session_id', $qb->createNamedParameter(session_id()))
				->setValue('created_at', $qb->createNamedParameter($createdAt))
				->setValue('last_activity_at', $qb->createNamedParameter($createdAt))
				->setValue('info', $qb->createNamedParameter(json_encode(['ip' => $remoteAddr, 'user_agent' => $userAgent])))
				->execute();
		}
	}

	/**
	 * Close the session and release the lock, also writes all changed data in batch
	 */
	public function close() {
		if($this->isModified) {
			$encryptedValue = $this->crypto->encrypt(json_encode($this->sessionValues), $this->passphrase);
			$this->session->set(self::encryptedSessionName, $encryptedValue);
			$this->isModified = false;
		}
		$this->session->close();
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return $this->exists($offset);
	}

	/**
	 * @param mixed $offset
	 * @return mixed
	 */
	public function offsetGet($offset) {
		return $this->get($offset);
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 */
	public function offsetSet($offset, $value) {
		$this->set($offset, $value);
	}

	/**
	 * @param mixed $offset
	 */
	public function offsetUnset($offset) {
		$this->remove($offset);
	}

	/**
	 * @return \OCP\DB\QueryBuilder\IQueryBuilder
	 */
	private function getQueryBuilder() {
		if(is_null($this->dbConnection)) {
			$this->dbConnection = \OC::$server->getDatabaseConnection();
		}

		return $this->dbConnection->getQueryBuilder();
	}
}
