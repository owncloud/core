<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\ILogger;
use OCP\Security\ICrypto;
use OCP\Security\ISecureRandom;

/**
 * Class CryptoSessionHandler provides some rough basic level of additional
 * security by storing the session data in an encrypted form.
 *
 * The content of the session is encrypted using it's session ID and the actual
 * session ID is not stored on the application server. One should note that an
 * adversary with access to the source code or the system memory is still able
 * to read the original session ID from the users' request. This thus can not be
 * considered a strong security measure one should consider it as an additional
 * small security obfuscation layer to comply with compliance guidelines.
 *
 * This class also provides a custom `create_sid` function to provide a generic
 * protection against potential session collisions which may be experienced on
 * huge instances where the PHP settings have been configured wrongly. Due to PHP
 * limitations this is however only applied on instances running at least PHP 5.5.1
 *
 * DO NOT CALL METHODS OF THIS CLASS FROM OUTSIDE THIS CLASS. THESE FUNCTIONS ARE
 * ONLY EXPECTED TO BE CALLED BY PHP AS CALLBACK.
 *
 * @package OC\Session
 */
class CryptoSessionHandler extends \SessionHandler {
	/** @var \OCP\Security\ICrypto */
	protected $crypto;
	/** @var ISecureRandom */
	protected $secureRandom;
	/** @var IDBConnection */
	protected $connection;
	/** @var IConfig */
	protected $config;
	/** @var ITimeFactory */
	protected $timeFactory;
	/** @var ILogger */
	protected $logger;

	/**
	 * @param ICrypto $crypto
	 * @param ISecureRandom $secureRandom
	 * @param IDBConnection $connection
	 * @param IConfig $config
	 * @param ITimeFactory $timeFactory
	 * @param ILogger $logger
	 */
	public function __construct(ICrypto $crypto,
								ISecureRandom $secureRandom,
								IDBConnection $connection,
								IConfig $config,
								ITimeFactory $timeFactory,
								ILogger $logger) {
		$this->crypto = $crypto;
		$this->secureRandom = $secureRandom;
		$this->connection = $connection;
		$this->config = $config;
		$this->timeFactory = $timeFactory;
		$this->logger = $logger;
	}

	/**
	 * Derive the hashed name under which the session is stored on the application
	 * server. Since we don't want to increase the processing time unnecessary
	 * the session id is only pbkdf2'd using 1 iteration. While this does not provide
	 * perfect security one should note that the actual session IDs are 64 characters
	 * long and also using other data such as the secret from config.php as salt.
	 *
	 * Since this is not aimed to be a perfect protection, as an admin could likely
	 * just hijack the server otherwise, this is pretty much adequate to provide
	 * at least a small level of protection against time-memory trade-offs.
	 *
	 * @internal
	 * @param string $originalId
	 * @return string Hashed session ID
	 */
	public function deriveHashedLocalSessionName($originalId) {
		return hash_pbkdf2(
			'sha512',
			$originalId,
			$this->config->getSystemValue('secret', ''),
			1
		);
	}

	/**
	 * Wrapped for unit-test purposes
	 *
	 * @internal
	 * @param int $maxLifeTime
	 * @return bool
	 */
	public function parentGc($maxLifeTime) {
		return parent::gc($maxLifeTime);
	}

	/**
	 * Wrapper around \SessionHandler::gc also cleaning the database from expired
	 * session IDs.
	 *
	 * @internal
	 * @param int $maxLifeTime
	 * @return bool
	 */
	public function gc($maxLifeTime) {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('*PREFIX*sessions')
			->where($qb->expr()->lte('last_used', $qb->createParameter('timestamp')))
			->setParameter('timestamp', $this->timeFactory->getTime() - $maxLifeTime)
			->execute();
		return $this->parentGc($maxLifeTime);
	}

	/**
	 * Wrapped for unit-test purposes
	 *
	 * @internal
	 * @param string $hashedId
	 * @return bool
	 */
	public function parentDestroy($hashedId) {
		return parent::destroy($hashedId);
	}

	/**
	 * Wrapper around the destroy function also marking the session id as unused
	 * within the database.
	 *
	 * @internal
	 * @param string $originalSessionId
	 * @return bool
	 */
	public function destroy($originalSessionId) {
		$hashedSessionId = $this->deriveHashedLocalSessionName($originalSessionId);
		$this->expireSession($hashedSessionId);

		/**
		 * While \SessionHandler::destroy allows to specify an ID it is actual not
		 * used meaning that the data does not get decrypted successfully.
		 *
		 * To work around this issue the session gets manually set using `session_id`
		 * to the encrypted value and then changed to the unencrypted ID.
		 *
		 * @link https://bugs.php.net/bug.php?id=70133
		 */
		session_id($hashedSessionId);

		return $this->parentDestroy($hashedSessionId);
	}

	/**
	 * Wrapped for unit-test purposes
	 *
	 * @internal
	 * @param string $hashedSessionId
	 * @return string
	 */
	public function parentRead($hashedSessionId) {
		return parent::read($hashedSessionId);
	}

	/**
	 * Wrapper around \SessionHandler::read decrypting the content and updating
	 * the last session usage time.
	 *
	 * @internal
	 * @param string $originalSessionId
	 * @return string
	 */
	public function read($originalSessionId) {
		$hashedSessionId = $this->deriveHashedLocalSessionName($originalSessionId);

		/**
		 * While \SessionHandler::read allows to specify an ID it is actual not
		 * used meaning that the data does not get decrypted successfully.
		 *
		 * To work around this issue the session gets manually set using `session_id`
		 * to the encrypted value and then changed to the unencrypted ID.
		 *
		 * @link https://bugs.php.net/bug.php?id=70133
		 */
		session_id($hashedSessionId);
		$data = $this->parentRead($hashedSessionId);
		session_id($originalSessionId);
		$this->markSessionAsUsed($hashedSessionId);

		if($data === '') {
			return '';
		}

		try {
			return $this->crypto->decrypt($data, $originalSessionId);
		} catch (\Exception $e) {
			return '';
		}
	}

	/**
	 * Wrapped for unit-test purposes
	 *
	 * @internal
	 * @param string $hashedSessionId
	 * @param string $encryptedSessionData
	 * @return bool
	 */
	public function parentWrite($hashedSessionId, $encryptedSessionData) {
		return parent::write($hashedSessionId, $encryptedSessionData);
	}

	/**
	 * Wrapper around \SessionHandler::write encrypting the passed session data
	 *
	 * @internal
	 * @param string $originalSessionId
	 * @param string $sessionData
	 * @return bool
	 */
	public function write($originalSessionId, $sessionData) {
		$hashedSessionId = $this->deriveHashedLocalSessionName($originalSessionId);
		$encryptedSessionData = $this->crypto->encrypt($sessionData, $originalSessionId);

		return $this->parentWrite($hashedSessionId, $encryptedSessionData);
	}

	/**
	 * Checks whether a session is already used
	 *
	 * @internal
	 * @param string $hashedSessionId
	 * @return bool True if session is used, false otherwise
	 */
	private function isSessionUsed($hashedSessionId) {
		$qb = $this->connection->getQueryBuilder();
		$qb->select('hashed_id')
			->from('*PREFIX*sessions')
			->where($qb->expr()->eq('hashed_id', $qb->createParameter('hashed_id')))
			->setParameter(':hashed_id', $hashedSessionId);
		$result = $qb->execute();
		$result = $result->fetch();
		return !empty($result);
	}

	/**
	 * Marks a session as used in the database to reduce the risk of potential
	 * session collisions. If the session is already used it will update its
	 * time stamp.
	 *
	 * @internal
	 * @param string $hashedSessionId
	 */
	private function markSessionAsUsed($hashedSessionId) {
		$qb = $this->connection->getQueryBuilder();

		if($this->isSessionUsed($hashedSessionId)) {
			$qb->update('*PREFIX*sessions')
				->set('last_used', $qb->createParameter('last_used'))
				->where($qb->expr()->eq('hashed_id', $qb->createParameter('hashed_id')))
				->setParameter(':last_used', $this->timeFactory->getTime())
				->setParameter(':hashed_id', $hashedSessionId)
				->execute();
		} else {
			$qb->insert('*PREFIX*sessions')
				->values([
					'hashed_id' => $qb->createNamedParameter($hashedSessionId, \PDO::PARAM_STR),
					'last_used' => $qb->createNamedParameter($this->timeFactory->getTime()),
				])
				->execute();
		}
	}

	/**
	 * Removes a used session id from the database
	 *
	 * @param string $hashedSessionId
	 * @internal
	 */
	private function expireSession($hashedSessionId) {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('*PREFIX*sessions')
			->where($qb->expr()->eq('hashed_id', $qb->createParameter('hashed_id')))
			->setParameter('hashed_id', $hashedSessionId)
			->execute();
	}

	/**
	 * Custom session handler which also checks whether a session with this ID
	 * already exists to reduce the potential risk of session collisions. Since
	 * there is no locking/transactions in place here this may technically still
	 * happen but an actual chance of having this happen is way smaller than with
	 * the default PHP session handler. Note that in a proper configured environment
	 * this should never be the case anyways.
	 *
	 * This will only work with >= PHP 5.5.1, older versions will simply ignore
	 * this and use the default session creation employed by PHP.
	 *
	 * @internal
	 */
	public function create_sid() {
		for ($i = 1; $i <= 10; $i++) {
			$sessionId = $this->secureRandom->getMediumStrengthGenerator()->generate(
				64,
				ISecureRandom::CHAR_LOWER.ISecureRandom::CHAR_DIGITS
			);

			$hashedSessionId = $this->deriveHashedLocalSessionName($sessionId);
			if (!$this->isSessionUsed($hashedSessionId)) {
				$this->markSessionAsUsed($hashedSessionId);
				return $sessionId;
			}
		}

		/**
		 * This should never happen. If an unique session ID could not get created
		 * within 10 tries it is better to stop the script execution instead of
		 * returning always the same likely insecure ID.
		 *
		 * Since this is deeply integrated within the PHP core we can't throw a
		 * regular exception here and thus need to stop the execution using this
		 * approach and inform the user using a white page.
		 */
		$errorMsg = 'Critical error encountered. Couldn\'t generate valid session ' .
			'ID. Please contact the instance administrator.';
		$this->logger->emergency($errorMsg, ['app' => 'core']);
		http_response_code(500);
		die($errorMsg);
	}
}
