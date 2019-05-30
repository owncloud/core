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

namespace OCA\Encryption\Tests\Command;

use OC\Encryption\DecryptAll;
use OC\Files\View;
use OCA\Encryption\Command\RecreateMasterKey;
use OCA\Encryption\Crypto\EncryptAll;
use OCA\Encryption\Factory\EncDecAllFactory;
use OCA\Encryption\Util;
use OCP\App\IAppManager;
use OCP\IAppConfig;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class RecreateMasterKeyTest
 *
 * @package OCA\Encryption\Tests\Command
 */

class RecreateMasterKeyTest extends TestCase {

	/** @var View | \PHPUnit\Framework\MockObject\MockObject  */
	protected $rootView;

	/** @var Util | \PHPUnit\Framework\MockObject\MockObject  */
	protected $util;

	/** @var \OC\Encryption\Util | \PHPUnit\Framework\MockObject\MockObject */
	protected $encUitl;

	/** @var  IAppManager | \PHPUnit\Framework\MockObject\MockObject */
	protected $appManager;

	/** @var  IAppConfig | \PHPUnit\Framework\MockObject\MockObject */
	protected $appConfig;

	/** @var  \Symfony\Component\Console\Output\OutputInterface | \PHPUnit\Framework\MockObject\MockObject */
	protected $output;

	/** @var  \Symfony\Component\Console\Input\InputInterface | \PHPUnit\Framework\MockObject\MockObject */
	protected $input;

	/** @var EncDecAllFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $encdecAllFactory;

	/** @var  RecreateMasterKey */
	protected $recreateMasterKey;

	private $commandTester;

	public function setUp() {
		parent::setUp();

		$this->rootView = $this->getMockBuilder('OC\Files\View')
		->disableOriginalConstructor()->getMock();
		$this->util = $this->getMockBuilder('OCA\Encryption\Util')
		->disableOriginalConstructor()->getMock();
		$this->encUitl = $this->getMockBuilder('OC\Encryption\Util')
		->disableOriginalConstructor()->getMock();
		$this->appManager = $this->getMockBuilder('OCP\App\IAppManager')
		->disableOriginalConstructor()->getMock();
		$this->appConfig = $this->getMockBuilder('OCP\IAppConfig')
		->disableOriginalConstructor()->getMock();
		$this->questionHelper = $this->getMockBuilder('Symfony\Component\Console\Helper\QuestionHelper')
			->disableOriginalConstructor()->getMock();
		$this->input = $this->getMockBuilder('Symfony\Component\Console\Input\InputInterface')
		->disableOriginalConstructor()->getMock();
		$this->output = $this->getMockBuilder('Symfony\Component\Console\Output\OutputInterface')
		->disableOriginalConstructor()->getMock();

		$this->userInterface = $this->getMockBuilder('OCP\UserInterface')
			->disableOriginalConstructor()->getMock();

		$this->output->expects($this->any())->method('getFormatter')
			->willReturn($this->createMock('\Symfony\Component\Console\Formatter\OutputFormatterInterface'));

		$this->encdecAllFactory = $this->createMock(EncDecAllFactory::class);

		$recreateMasterKeyCommand = new RecreateMasterKey($this->rootView, $this->util,
			$this->encUitl, $this->appManager, $this->appConfig, $this->encdecAllFactory);

		$this->commandTester = new CommandTester($recreateMasterKeyCommand);
	}

	public function testRecreateMasterKey() {
		$this->util->method('isMasterKeyEnabled')
			->willReturn(true);

		$decryptAll = $this->createMock(DecryptAll::class);
		$decryptAll->expects($this->once())
			->method('decryptAll');

		$encryptAll = $this->createMock(EncryptAll::class);
		$encryptAll->method('createMasterKey')
			->willReturn(true);
		$encryptAll->expects($this->once())
			->method('encryptAll');

		$this->encdecAllFactory->method('getDecryptAllObj')
			->willReturn($decryptAll);
		$this->encdecAllFactory->method('getEncryptAllObj')
			->willReturn($encryptAll);

		$this->commandTester->execute([
			'--yes' => 'y'
		]);

		$this->assertEquals(0, $this->commandTester->getStatusCode());
	}

	public function testMasterKeyRecreateFailed() {
		$this->util->method('isMasterKeyEnabled')
			->willReturn(true);

		$decryptAll = $this->createMock(DecryptAll::class);
		$decryptAll->expects($this->once())
			->method('decryptAll');

		$encryptAll = $this->createMock(EncryptAll::class);
		$encryptAll->method('createMasterKey')
			->willReturn(false);

		$this->encdecAllFactory->method('getDecryptAllObj')
			->willReturn($decryptAll);
		$this->encdecAllFactory->method('getEncryptAllObj')
			->willReturn($encryptAll);

		$this->commandTester->execute([
			'--yes' => 'y'
		]);

		$this->assertEquals(1, $this->commandTester->getStatusCode());
	}

	public function testMasterKeyNotEnabled() {
		$this->util->method('isMasterKeyEnabled')
			->willReturn(false);

		$this->commandTester->execute([
			'--yes' => 'y'
		]);

		$this->assertEquals(3, $this->commandTester->getStatusCode());
	}

	public function testAbandonProcess() {
		$this->util->method('isMasterKeyEnabled')
			->willReturn(true);

		$application = new Application();
		$recreateCmd = new RecreateMasterKey($this->rootView, $this->util,
			$this->encUitl, $this->appManager, $this->appConfig, $this->encdecAllFactory);
		$application->add($recreateCmd);

		$command = $application->find('encryption:recreate-master-key');

		$commandTester = new CommandTester($command);

		$commandTester->setInputs(['n']);

		$commandTester->execute([]);
		$this->assertEquals(2, $commandTester->getStatusCode());
	}
}
