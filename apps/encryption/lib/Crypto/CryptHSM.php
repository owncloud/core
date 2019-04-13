<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Clark Tomlinson <fallen013@gmail.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\Encryption\Crypto;

use GuzzleHttp\Exception\ServerException;
use OC\Encryption\Exceptions\DecryptionFailedException;
use OCA\Encryption\Exceptions\MultiKeyDecryptException;
use OCA\Encryption\Exceptions\MultiKeyEncryptException;
use OCA\Encryption\JWT;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Http\Client\IClientService;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IUserSession;

/**
 * Class CryptHSM moves the key generation and multiKeyDecrytion to an HSM.
 * multiKeyEncrypt can be done locally because we have the public key
 *
 * @package OCA\Encryption\Crypto
 */
class CryptHSM extends Crypt {

	/**
	 * @var IClientService
	 */
	protected $clientService;

	/**
	 * @var string
	 */
	private $hsmUrl;

	/**
	 * @var int
	 */
	private $clockSkew;

	/**
	 * @var
	 */
	private $secret;

	/**
	 * @var IRequest
	 */
	private $request;

	/**
	 * ITimeFactory
	 */
	private $timeFactory;

	const PATH_NEW_KEY = '/keys/new';
	const PATH_DECRYPT = '/decrypt/'; // appended with keyid

	/**
	 * @param ILogger $logger
	 * @param IUserSession $userSession
	 * @param IConfig $config
	 * @param IL10N $l
	 * @param IClientService $clientService
	 * @param ITimeFactory $timeFactory
	 */
	public function __construct(ILogger $logger, IUserSession $userSession, IConfig $config, IL10N $l, IClientService $clientService, IRequest $request, ITimeFactory $timeFactory) {
		parent::__construct($logger, $userSession, $config, $l);
		$this->hsmUrl = \rtrim($this->config->getAppValue('encryption', 'hsm.url'), '/'); // no default, because Application DI only instantiates this if it is configured non empty
		$this->secret = $this->config->getAppValue('encryption', 'hsm.jwt.secret', 'secret');
		$this->clockSkew = (int)$this->config->getAppValue('encryption', 'hsm.jwt.clockskew', 120); // 2min
		$this->clientService = $clientService;
		$this->request = $request;
		$this->timeFactory = $timeFactory;
	}

	/**
	 * create new private/public key-pair for user
	 * any key config happens in the service
	 *
	 * @param $label string human readable name
	 * @return array|bool
	 */
	public function createKeyPair($label = null) {
		$response = $this->clientService->newClient()->post(
			$this->hsmUrl.$this::PATH_NEW_KEY, [
			'headers' => [
				'Authorization' => 'Bearer ' . JWT::token([
						'iss' => $this->config->getSystemValue('instanceid'),
						'sub' => $label,
						'aud' => 'hsmdaemon',
						'exp' => $this->timeFactory->getTime() + $this->clockSkew,
						'rid' => $this->request->getId(),
					], $this->secret)
			],
		]);
		$keyPair = \json_decode($response->getBody(), true);

		return [
			'publicKey' => $keyPair['publicKey'],
			'privateKey' => $keyPair['privateKeyId'] // returns the key id in the hsm, not the actual private key
		];
	}
	/**
	 * check if it is a valid private key
	 *
	 * @param string $plainKey
	 * @return bool
	 */
	protected function isValidPrivateKey($plainKey) { // unneded for HSM, may check if it is '*secret*'?
		// TODO check if it is a uuid?
		return true;
	}

	/**
	 * @param $encKeyFile
	 * @param $shareKey
	 * @param $privateKey string contains the key uuid in the hsm
	 * @return string
	 * @throws MultiKeyDecryptException
	 */
	public function multiKeyDecrypt($encKeyFile, $shareKey, $privateKey) { // done with HSM, private key contains the key id in the hsm
		if (!$encKeyFile) {
			throw new MultiKeyDecryptException('Cannot multikey decrypt empty plain content');
		}

		// decrypt the shareKey
		$keyId = $privateKey; // TODO check $privateKey is a uuid, should have been generated with genkey

		try {
			$response =  $this->clientService->newClient()->post(
				$this->hsmUrl.$this::PATH_DECRYPT.$keyId, [
				'headers' => [
					'Authorization' => 'Bearer ' . JWT::token([
							'iss' => $this->config->getSystemValue('instanceid'),
							// 'sub' => $keyId, does not add anything right now, use md5 of $shareKey?
							'aud' => 'hsmdaemon',
							'exp' => $this->timeFactory->getTime() + $this->clockSkew,
							'rid' => $this->request->getId(),
						], $this->secret)
				],
				'body' => $shareKey
			]);
			$decryptedKey = $response->getBody();

			// now decode the file.
			// version and position are 0 because we always use fresh random data as passphrase
			$decryptedContent = $this->symmetricDecryptFileContent($encKeyFile, $decryptedKey, self::DEFAULT_CIPHER, 0, 0);

			return $decryptedContent;
		} catch (ServerException $e) {
			$body = $e->getResponse()->getBody();
			$this->logger->logException($e, ['message' => $body, 'app' => __CLASS__]);
			throw new MultiKeyDecryptException('Cannot multikey decrypt with HSM', '', 0, $e);
		} catch (DecryptionFailedException $e) {
			throw new MultiKeyDecryptException('Cannot multikey decrypt', '', 0, $e);
		}
	}

	/**
	 * @param string $plainContent
	 * @param array $keyFiles
	 * @return array
	 * @throws MultiKeyEncryptException
	 */
	public function multiKeyEncrypt($plainContent, array $keyFiles) { // done with HSM, needs to return the key ids from the hsm
		$randomKey = $this->generateFileKey();

		// encrypt $plainContent using a random key and iv.
		// version and position are 0 because we use fresh random data as passphrase
		$sealedContent = $this->symmetricEncryptFileContent($plainContent, $randomKey, 0, 0);

		if ($sealedContent === false) {
			throw new MultiKeyEncryptException('Could not create sealed content');
		}

		$encryptedKeys = [];
		// encrypt $randomKey with all public keys
		foreach ($keyFiles as $userId => $publicKey) {
			// FIXME use OPENSSL_PKCS1_OAEP_PADDING, implemented in opensc on 2017-10-19 with https://github.com/OpenSC/OpenSC/pull/1169, see http://php.net/manual/de/function.openssl-public-encrypt.php#118466
			// TODO make padding configurable?
			// TODO add command to hsmdaemon to see supported paddings?
			\openssl_public_encrypt($randomKey, $encryptedKey, $publicKey, OPENSSL_PKCS1_PADDING);
			$encryptedKeys[$userId] = $encryptedKey;
		}

		return [
			'keys' => $encryptedKeys,
			'data' => $sealedContent
		];
	}
}
