<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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


namespace OCA\Encryption\Tests\Command;

use OC\Files\FileInfo;
use OC\Files\View;
use OCA\Encryption\Command\RecreateMasterKey;
use OC\Encryption\Exceptions\DecryptionFailedException;
use OCA\Encryption\Users\Setup;
use OCP\IL10N;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use Symfony\Component\Console\Helper\QuestionHelper;
use Test\TestCase;

class RecreateMasterKeyTest extends TestCase {

	/** @var Manager  | \PHPUnit_Framework_MockObject_MockObject */
	protected $encryptionManager;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject  */
	protected $userManager;

	/** @var View | \PHPUnit_Framework_MockObject_MockObject  */
	protected $rootView;

	/** @var KeyManager | \PHPUnit_Framework_MockObject_MockObject */
	protected $keyManager;

	/** @var Util | \PHPUnit_Framework_MockObject_MockObject  */
	protected $util;

	protected $encUitl;

	/** @var  IAppManager | \PHPUnit_Framework_MockObject_MockObject */
	protected $IAppManager;

	/** @var  IAppConfig | \PHPUnit_Framework_MockObject_MockObject */
	protected $appConfig;

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	protected $config;

	/** @var ISession | \PHPUnit_Framework_MockObject_MockObject */
	protected $session;

	/** @var  \PHPUnit_Framework_MockObject_MockObject | \OCP\UserInterface */
	protected $userInterface;

	/** @var  \Symfony\Component\Console\Output\OutputInterface | \PHPUnit_Framework_MockObject_MockObject */
	protected $output;

	/** @var  \Symfony\Component\Console\Input\InputInterface | \PHPUnit_Framework_MockObject_MockObject */
	protected $input;

	protected $questionHelper;

	protected $userSetup;

	protected $mailer;

	protected $secureRandom;

	protected $l;

	protected $logger;

	protected $progressbar;

	protected $setupfs;

	/** @var  RecreateMasterKey */
	protected $recreateMasterKey;

	public function setUp() {
		parent::setUp();

		$this->encryptionManager = $this->getMockBuilder('OC\Encryption\Manager')
			->disableOriginalConstructor()->getMock();
		$this->userManager = $this->getMockBuilder('OCP\IUserManager')
		->disableOriginalConstructor()->getMock();
		$this->rootView = $this->getMockBuilder('OC\Files\View')
		->disableOriginalConstructor()->getMock();
		$this->keyManager = $this->getMockBuilder('OCA\Encryption\KeyManager')
		->disableOriginalConstructor()->getMock();
		$this->util = $this->getMockBuilder('OCA\Encryption\Util')
		->disableOriginalConstructor()->getMock();
		$this->encUitl = $this->getMockBuilder('OC\Encryption\Util')
		->disableOriginalConstructor()->getMock();
		$this->IAppManager = $this->getMockBuilder('OCP\App\IAppManager')
		->disableOriginalConstructor()->getMock();
		$this->appConfig = $this->getMockBuilder('OCP\IAppConfig')
		->disableOriginalConstructor()->getMock();
		$this->config = $this->getMockBuilder('OCP\IConfig')
		->disableOriginalConstructor()->getMock();
		$this->session = $this->getMockBuilder('OCP\ISession')
		->disableOriginalConstructor()->getMock();
		$this->questionHelper = $this->getMockBuilder('Symfony\Component\Console\Helper\QuestionHelper')
			->disableOriginalConstructor()->getMock();
		$this->userSetup = $this->getMockBuilder(Setup::class)
			->disableOriginalConstructor()->getMock();
		$this->mailer = $this->getMockBuilder(IMailer::class)
			->disableOriginalConstructor()->getMock();
		$this->secureRandom = $this->getMockBuilder(ISecureRandom::class)
			->disableOriginalConstructor()->getMock();
		$this->l = $this->getMockBuilder(IL10N::class)
			->disableOriginalConstructor()->getMock();
		$this->logger = $this->getMockBuilder('OCP\ILogger')
			->disableOriginalConstructor()->getMock();
		$this->input = $this->getMockBuilder('Symfony\Component\Console\Input\InputInterface')
		->disableOriginalConstructor()->getMock();
		$this->output = $this->getMockBuilder('Symfony\Component\Console\Output\OutputInterface')
		->disableOriginalConstructor()->getMock();

		$this->userInterface = $this->getMockBuilder('OCP\UserInterface')
			->disableOriginalConstructor()->getMock();

		$this->output->expects($this->any())->method('getFormatter')
			->willReturn($this->createMock('\Symfony\Component\Console\Formatter\OutputFormatterInterface'));

		$this->recreateMasterKey = new RecreateMasterKey($this->userManager,
			$this->rootView, $this->keyManager, $this->util, $this->encUitl,
			$this->IAppManager, $this->appConfig, $this->config, $this->session,
			$this->encryptionManager, $this->questionHelper,
			$this->userSetup, $this->mailer, $this->secureRandom, $this->l, $this->logger);


		$this->invokePrivate($this->recreateMasterKey, 'input', [$this->input]);
		$this->invokePrivate($this->recreateMasterKey, 'output', [$this->output]);
	}

	/**
	 * @dataProvider dataTestExecute
	 */
	public function testNewMasterKey($mastkerKeyEnabled) {

		if( $mastkerKeyEnabled === true) {
			$this->recreateMasterKey = $this->getMockBuilder('OCA\Encryption\Command\RecreateMasterKey')
				->setConstructorArgs(
					[
						$this->userManager,
						$this->rootView, $this->keyManager, $this->util, $this->encUitl,
						$this->IAppManager, $this->appConfig, $this->config, $this->session,
						$this->encryptionManager, $this->questionHelper,
						$this->userSetup, $this->mailer, $this->secureRandom, $this->l,
						$this->logger
					]
				)->setMethods(['setupUserFS', 'encryptAllUsers', 'decryptAllUsers'])->getMock();

			$this->questionHelper->expects($this->once())->method('ask')
				->willReturn(true);

			$this->util->expects($this->any())->method('isMasterKeyEnabled')
				->willReturn(true);

			$this->userManager->expects($this->any())
				->method('getBackends')
				->willReturn([$this->userInterface]);

			$this->userInterface->expects($this->any())
				->method('getUsers')
				->willReturn(['user1']);

			$this->rootView->expects($this->any())->method('is_dir')
				->willReturnCallback(
					function($path) {
						if ($path === '/user1/files/foo') {
							return true;
						}
						return false;
					}
				);

			$this->encryptionManager->expects($this->any())
				->method('isReadyForUser')
				->with('user1')
				->willReturn(true);

			$this->output->method('writeln')
				->will($this->onConsecutiveCalls(
					"Decryption started\n",
					"\nDecryption completed\n",
					"Encryption started\n",
					"Waiting for creating new masterkey\n",
					"New masterkey created successfully\n",
					"\nEncryption completed successfully\n",
					"\n\<info\>Note: All users are required to relogin.\</info\>\n"

				));

			$this->invokePrivate($this->recreateMasterKey, 'execute', [$this->input, $this->output]);
		} else {
			$this->recreateMasterKey = $this->getMockBuilder('OCA\Encryption\Command\RecreateMasterKey')
				->setConstructorArgs(
					[
						$this->userManager,
						$this->rootView, $this->keyManager, $this->util, $this->encUitl,
						$this->IAppManager, $this->appConfig, $this->config,
						$this->session, $this->encryptionManager, $this->questionHelper,
						$this->userSetup, $this->mailer, $this->secureRandom, $this->l,
						$this->logger
					]
				)->setMethods(['setupUserFS'])->getMock();

			$this->util->expects($this->once())->method('isMasterKeyEnabled')
				->willReturn($mastkerKeyEnabled);

			global $outputText;
			$this->output->expects($this->at(0))
				->method('writeln')
				->willReturnCallback(function ($value){
					global $outputText;
					$outputText .= $value . "\n";
				});

			$this->invokePrivate($this->recreateMasterKey, 'execute', [$this->input, $this->output]);
			$this->assertSame("Master key is not enabled.", trim($outputText, "\n"));
		}
	}

	public function dataTestExecute() {
		return [
			[true],
			[false]
		];
	}
}

