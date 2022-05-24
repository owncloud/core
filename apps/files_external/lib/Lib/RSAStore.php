<?php
/**
 * @author Juan Pablo Villafáñez Ramos <jvillafanez@owncloud.com>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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

namespace OCA\Files_External\Lib;

use OCP\Security\ICredentialsManager;
use OCP\IConfig;
use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\RSA\PrivateKey;

/**
 * Store and retrieve phpseclib3 RSA private keys
 */
class RSAStore {
	private static $rsaStore = null;

	/** @var ICredentialsManager */
	private $credentialsManager;
	/** @var IConfig */
	private $config;

	/**
	 * Get the global instance of the RSAStore. If no one is set yet, a new
	 * one will be created using real server components.
	 * @return RSAStore
	 */
	public static function getGlobalInstance(): RSAStore {
		if (self::$rsaStore === null) {
			self::$rsaStore = new RSAStore(
				\OC::$server->getCredentialsManager(),
				\OC::$server->getConfig()
			);
		}
		return self::$rsaStore;
	}

	/**
	 * Set a new RSAStore instance as a global instance overwriting whatever
	 * instance was there.
	 * This shouldn't be needed outside of unit tests
	 * @param RSAStore|null The RSAStore to be set as global instance, or null
	 * to destroy the global instance (destroying the global instance will allow
	 * getting the default one again)
	 */
	public static function setGlobalInstance(?RSAStore $rsaStore) {
		self::$rsaStore = $rsaStore;
	}

	/**
	 * @param ICredentialsManager $credentialsManager
	 * @param IConfig $config
	 */
	public function __construct(ICredentialsManager $credentialsManager, IConfig $config) {
		$this->credentialsManager = $credentialsManager;
		$this->config = $config;
	}

	/**
	 * Store the $rsaKey inside the $userId's space. A token will be returned
	 * in order to retrieve the stored key
	 * @param PrivateKey $rsaKey the private key to be stored
	 * @param string $userId the user under which the token will be stored
	 * @return string an opaque token to be used to retrieve the stored key later
	 */
	public function storeData(PrivateKey $rsaKey, string $userId): string {
		$password = $this->config->getSystemValue('secret', '');
		$privatekey = $rsaKey->withPassword($password)->toString('PKCS1');

		$keyId = \uniqid('rsaid:', true);

		$this->credentialsManager->store($userId, $keyId, $privatekey);

		$keyData = [
			'rsaId' => $keyId,
			'userId' => $userId,
		];
		return \base64_encode(\json_encode($keyData));
	}

	/**
	 * Retrieve a previously stored private key using the token that was returned
	 * when the key was stored
	 * @param string $token the token returned previously by the "storeData"
	 * method when the key was stored.
	 * @return PrivateKey the stored private key
	 */
	public function retrieveData(string $token): PrivateKey {
		$keyData = \json_decode(\base64_decode($token), true);
		$privateKey = $this->credentialsManager->retrieve($keyData['userId'], $keyData['rsaId']);
		$password = $this->config->getSystemValue('secret', '');

		return RSA::load($privateKey, $password)->withHash('sha1');
	}
}
