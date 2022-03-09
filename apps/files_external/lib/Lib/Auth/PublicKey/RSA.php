<?php
/**
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Files_External\Lib\Auth\PublicKey;

use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\DefinitionParameter;
use OCP\IL10N;
use OCA\Files_External\Lib\RSAStore;
use phpseclib3\Crypt\RSA as RSACrypt;

/**
 * RSA public key authentication
 */
class RSA extends AuthMechanism {
	public const CREATE_KEY_BITS = 1024;

	public function __construct(IL10N $l) {
		$this
			->setIdentifier('publickey::rsa')
			->setScheme(self::SCHEME_PUBLICKEY)
			->setText($l->t('RSA public key'))
			->addParameters([
				(new DefinitionParameter('user', $l->t('Username'))),
				(new DefinitionParameter('public_key', $l->t('Public key'))),
				(new DefinitionParameter('private_key', 'private_key'))
					->setType(DefinitionParameter::VALUE_HIDDEN),
			])
			->addCustomJs('public_key')
		;
	}

	/**
	 * Generate a keypair.
	 * The public key will be returned without any modification.
	 * The private key will be stored using the RSAStore, and a token will
	 * be returned instead. The token can be used to retrieve the private key
	 * from the RSAStore later.
	 * @params string $userId the userId holding the keys, or empty string if the keys are global
	 * (for system-wide mount points, for example)
	 * @return array ['privatekey' => $privateKey, 'publickey' => $publicKey]
	 */
	public function createKey($userId = '') {
		/** @var RSACrypt\PrivateKey $rsaKey */
		$rsaKey = RSACrypt::createKey(self::CREATE_KEY_BITS)
			->withHash('sha1')
			->withMGFHash('sha1');

		$rsaStore = RSAStore::getGlobalInstance();
		$token = $rsaStore->storeData($rsaKey, $userId);
		return [
			'privatekey' => $token,
			'publickey' => $rsaKey->getPublicKey()->toString('OpenSSH')
		];
	}
}
