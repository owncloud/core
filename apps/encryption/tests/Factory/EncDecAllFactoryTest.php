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

namespace OCA\Encryption\Tests\Factory;

use OC\Encryption\DecryptAll;
use OC\Encryption\Manager;
use OC\Files\View;
use OCA\Encryption\Crypto\Crypt;
use OCA\Encryption\Crypto\CryptHSM;
use OCA\Encryption\Crypto\EncryptAll;
use OCA\Encryption\Factory\EncDecAllFactory;
use OCA\Encryption\Session;
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
use Test\TestCase;

class EncDecAllFactoryTest extends TestCase {
	private $encryptionManager;
	private $userManager;
	private $rootView;
	private $logger;
	private $encUtil;
	private $config;
	private $mailer;
	private $l10n;
	private $questionHelper;
	private $secureRandom;
	private $encStorage;
	private $encSession;
	private $cryptHSM;
	private $crypt;
	private $userSession;
	private $encdecAllFactory;

	public function setUp() {
		parent::setUp();

		$this->encryptionManager = $this->createMock(Manager::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->rootView = $this->createMock(View::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->encUtil = $this->createMock(Util::class);
		$this->config = $this->createMock(IConfig::class);
		$this->mailer = $this->createMock(IMailer::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->questionHelper = $this->createMock(QuestionHelper::class);
		$this->secureRandom = $this->createMock(ISecureRandom::class);
		$this->encStorage = $this->createMock(IStorage::class);
		$this->encSession = $this->createMock(Session::class);
		$this->cryptHSM = $this->createMock(CryptHSM::class);
		$this->crypt = $this->createMock(Crypt::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->encdecAllFactory = new EncDecAllFactory($this->encryptionManager,
			$this->userManager, $this->logger, $this->encUtil, $this->config,
			$this->mailer, $this->l10n, $this->questionHelper, $this->secureRandom,
			$this->encStorage, $this->encSession, $this->cryptHSM, $this->crypt,
			$this->userSession);
	}

	public function testGetDecryptAllObj() {
		$decAllObj = $this->encdecAllFactory->getDecryptAllObj();
		$this->assertInstanceOf(DecryptAll::class, $decAllObj);
	}

	/**
	 * @dataProvider providesHSMData
	 * @param bool $hsmEnabled
	 */
	public function testGetEncryptAllObjWithHSM($hsmEnabled) {
		$hsm = '';
		if ($hsmEnabled === true) {
			$hsm = 'hsm';
		}
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['encryption', 'recoveryKeyId', '', 'foo'],
				['crypto.engine', 'internal', '', $hsm]
			]));

		$encObject = $this->encdecAllFactory->getEncryptAllObj();
		$this->assertInstanceOf(EncryptAll::class, $encObject);
	}

	public function providesHSMData() {
		return [
			[true],
			[false],
		];
	}
}
