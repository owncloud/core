<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OC\Security;

use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Hash;
use OCP\Security\ICrypto;
use OCP\Security\ISecureRandom;
use OCP\IConfig;

/**
 * Class Crypto provides a high-level encryption layer using AES-CBC. If no key has been provided
 * it will use the secret defined in config.php as key. Additionally the message will be HMAC'd.
 *
 * Usage:
 * $encryptWithDefaultPassword = \OC::$server->getCrypto()->encrypt('EncryptedText');
 * $encryptWithCustompassword = \OC::$server->getCrypto()->encrypt('EncryptedText', 'password');
 *
 * @package OC\Security
 */
class Crypto implements ICrypto {
	const CRYPT_MODE = 'cbc';
	const CRYPT_METHOD = 'pbkdf2';
	const CRYPT_HASH = 'sha1';
	const SALT = 'phpseclib';

	/** @var AES $cipher */
	private $cipher;
	/** @var int */
	private $ivLength = 16;
	/** @var IConfig */
	private $config;
	/** @var ISecureRandom */
	private $random;

	/**
	 * @param IConfig $config
	 * @param ISecureRandom $random
	 */
	public function __construct(IConfig $config, ISecureRandom $random) {
		$this->cipher = new AES(self::CRYPT_MODE);
		$this->config = $config;
		$this->random = $random;
	}

	/**
	 * @param string $message The message to authenticate
	 * @param string $password Password to use (defaults to `secret` in config.php)
	 * @return string Calculated HMAC
	 */
	public function calculateHMAC($message, $password = '') {
		if ($password === '') {
			$password = $this->config->getSystemValue('secret');
		}

		// Append an "a" behind the password and hash it to prevent reusing the same password as for encryption
		$password = \hash('sha512', $password . 'a');

		$hash = new Hash('sha512');
		$hash->setKey($password);
		return $hash->hash($message);
	}

	/**
	 * Encrypts a value and adds an HMAC (Encrypt-Then-MAC)
	 * @param string $plaintext
	 * @param string $password Password to encrypt, if not specified the secret from config.php will be taken
	 * @return string Authenticated ciphertext
	 */
	public function encrypt($plaintext, $password = '') {
		if ($password === '') {
			$password = $this->config->getSystemValue('secret');
		}

		// Split single key in to multiple keys, use one for mac and one for key
		// to harden against related-key attacks
		// https://github.com/owncloud/encryption/issues/215
		$derived = \hash_hkdf('sha512', $password, 0);
		list($password, $hmacKey) = \str_split($derived, 32);
		$this->cipher->setPassword($password, self::CRYPT_METHOD, self::CRYPT_HASH, self::SALT);

		$iv = \random_bytes($this->ivLength);
		$this->cipher->setIV($iv);

		$ciphertext = \bin2hex($this->cipher->encrypt($plaintext));
		$hmac = \bin2hex($this->calculateHMAC($ciphertext.$iv, $hmacKey));

		return 'v2|' . $ciphertext.'|'. \bin2hex($iv).'|'.$hmac;
	}

	/**
	 * Decrypts a value and verifies the HMAC (Encrypt-Then-Mac)
	 * @param string $authenticatedCiphertext
	 * @param string $password Password to encrypt, if not specified the secret from config.php will be taken
	 * @return string plaintext
	 * @throws \Exception If the HMAC does not match
	 */
	public function decrypt($authenticatedCiphertext, $password = '') {
		if ($password === '') {
			$password = $this->config->getSystemValue('secret');
		}

		$parts = \explode('|', $authenticatedCiphertext);

		// v2 uses stronger binary random iv
		if (\sizeof($parts) === 4 && $parts[0] === 'v2') {
			$derived = \hash_hkdf('sha512', $password, 0);
			list($password, $hmacKey) = \str_split($derived, 32);
			$this->cipher->setPassword($password, self::CRYPT_METHOD, self::CRYPT_HASH, self::SALT);

			$ciphertext = \hex2bin($parts[1]);
			$iv = \hex2bin($parts[2]);
			$hmac = \hex2bin($parts[3]);

			$this->cipher->setIV($iv);

			if (!\hash_equals($this->calculateHMAC($parts[1].$iv, $hmacKey), $hmac)) {
				throw new \Exception('HMAC does not match.');
			}

			return $this->cipher->decrypt($ciphertext);
		}

		if (\sizeof($parts) === 3) {
			$this->cipher->setPassword($password, self::CRYPT_METHOD, self::CRYPT_HASH, self::SALT);
			$ciphertext = \hex2bin($parts[0]);
			$iv = $parts[1];
			$hmac = \hex2bin($parts[2]);

			$this->cipher->setIV($iv);

			if (!\hash_equals($this->calculateHMAC($parts[0].$parts[1], $password), $hmac)) {
				throw new \Exception('HMAC does not match.');
			}

			return $this->cipher->decrypt($ciphertext);
		}

		throw new \Exception('Authenticated ciphertext could not be decoded.');
	}
}
