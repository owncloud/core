<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCA\Encryption\Factory;

use OC\Encryption\DecryptAll;
use OC\Encryption\Manager;
use OC\Files\View;
use OCA\Encryption\Crypto\Crypt;
use OCA\Encryption\Crypto\CryptHSM;
use OCA\Encryption\Crypto\EncryptAll;
use OCA\Encryption\KeyManager;
use OCA\Encryption\Session;
use OCA\Encryption\Users\Setup;
use OCA\Encryption\Util;
use OCP\Encryption\Keys\IStorage;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use Symfony\Component\Console\Helper\QuestionHelper;

class EncDecAllFactory {
	/** @var Manager  */
	private $encryptionManager;

	/** @var IUserManager  */
	private $userManager;

	/** @var ILogger  */
	private $logger;

	/** @var Util  */
	private $encUtil;

	/** @var IConfig  */
	private $config;

	/** @var IMailer  */
	private $mailer;

	/** @var IL10N  */
	private $l10n;

	/** @var QuestionHelper  */
	private $questionHelper;

	/** @var ISecureRandom  */
	private $secureRandom;

	/** @var IStorage  */
	private $encStorage;

	/** @var IUserSession  */
	private $userSession;

	/** @var Session  */
	private $encSession;

	/** @var CryptHSM  */
	private $cryptHSM;

	/** @var Crypt  */
	private $crypt;

	/**
	 * EncDecAllFactory constructor.
	 *
	 * @param Manager $encryptionManager
	 * @param IUserManager $userManager
	 * @param ILogger $logger
	 * @param Util $encUtil
	 * @param IConfig $config
	 * @param IMailer $mailer
	 * @param IL10N $l10n
	 * @param QuestionHelper $questionHelper
	 * @param ISecureRandom $secureRandom
	 * @param IStorage $encStorage
	 * @param Session $encSession
	 * @param CryptHSM $cryptHSM
	 * @param Crypt $crypt
	 * @param IUserSession $userSession
	 */
	public function __construct(Manager $encryptionManager, IUserManager $userManager,
								ILogger $logger, Util $encUtil, IConfig $config, IMailer $mailer,
								IL10N $l10n, QuestionHelper $questionHelper, ISecureRandom $secureRandom,
								IStorage $encStorage, Session $encSession, CryptHSM $cryptHSM,
								Crypt $crypt, IUserSession $userSession) {
		$this->encryptionManager = $encryptionManager;
		$this->userManager = $userManager;
		$this->logger = $logger;
		$this->encUtil = $encUtil;
		$this->config = $config;
		$this->mailer = $mailer;
		$this->l10n = $l10n;
		$this->questionHelper = $questionHelper;
		$this->secureRandom = $secureRandom;
		$this->encStorage = $encStorage;
		$this->encSession = $encSession;
		$this->cryptHSM = $cryptHSM;
		$this->crypt = $crypt;
		$this->userSession = $userSession;
	}

	/**
	 * Returns DecryptAll object
	 *
	 * @return DecryptAll
	 */
	public function getDecryptAllObj() {
		$rootView = new View("/");
		return new DecryptAll($this->encryptionManager, $this->userManager, $rootView, $this->logger);
	}

	/**
	 * Returns EncryptAll object
	 *
	 * @return EncryptAll
	 */
	public function getEncryptAllObj() {
		$rootView = new View("/");

		/**
		 * The new KeyManager object is used here because of two reasons:
		 * 1. Setup class depends on KeyManager, which depends on crypto engine
		 * 2. EncryptAll also depends on KeyManager, which depends on crypto engine
		 */
		$keyManager = new KeyManager($this->encStorage, $this->getCryptoEngine(),
			$this->config, $this->userSession, $this->encSession, $this->logger,
			$this->encUtil);
		$userSetup = new Setup($this->logger, $this->userSession, $this->getCryptoEngine(), $keyManager);
		return new EncryptAll($userSetup, $this->userManager, $rootView,
			$keyManager, $this->encUtil, $this->config, $this->mailer, $this->l10n,
			$this->questionHelper, $this->secureRandom);
	}

	/**
	 * Returns CryptHSM if crypto engine set to
	 * hsm else returns Crypt
	 *
	 * @return Crypt|CryptHSM
	 */
	private function getCryptoEngine() {
		if ($this->config->getAppValue('crypto.engine', 'internal', '') === 'hsm') {
			return $this->cryptHSM;
		}

		return $this->crypt;
	}
}
