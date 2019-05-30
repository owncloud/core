<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OCA\Encryption\Tests\Crypto;

use OC\Encryption\Exceptions\DecryptionFailedException;
use OC\Files\FileInfo;
use OC\Files\Storage\Common;
use OC\Files\View;
use OC\Mail\Message;
use OCA\Encryption\Crypto\EncryptAll;
use OCP\Files\Storage;
use OCP\IUser;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class EncryptAllTest
 *
 * @group DB
 *
 * @package OCA\Encryption\Tests\Crypto
 */
class EncryptAllTest extends TestCase {
	use UserTrait;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCA\Encryption\KeyManager */
	protected $keyManager;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCA\Encryption\Util */
	protected $util;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCP\IUserManager */
	protected $userManager;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCA\Encryption\Users\Setup */
	protected $setupUser;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OC\Files\View */
	protected $view;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCP\IConfig */
	protected $config;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCP\Mail\IMailer */
	protected $mailer;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCP\IL10N */
	protected $l;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \Symfony\Component\Console\Helper\QuestionHelper */
	protected $questionHelper;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \Symfony\Component\Console\Input\InputInterface */
	protected $inputInterface;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \Symfony\Component\Console\Output\OutputInterface */
	protected $outputInterface;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCP\UserInterface */
	protected $userInterface;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCP\Security\ISecureRandom  */
	protected $secureRandom;

	/** @var  EncryptAll */
	protected $encryptAll;

	public function setUp() {
		parent::setUp();
		$this->setupUser = $this->getMockBuilder('OCA\Encryption\Users\Setup')
			->disableOriginalConstructor()->getMock();
		$this->keyManager = $this->getMockBuilder('OCA\Encryption\KeyManager')
			->disableOriginalConstructor()->getMock();
		$this->util = $this->getMockBuilder('OCA\Encryption\Util')
			->disableOriginalConstructor()->getMock();
		$this->userManager = $this->getMockBuilder('OCP\IUserManager')
			->disableOriginalConstructor()->getMock();
		$this->view = $this->getMockBuilder('OC\Files\View')
			->disableOriginalConstructor()->getMock();
		$this->config = $this->getMockBuilder('OCP\IConfig')
			->disableOriginalConstructor()->getMock();
		$this->mailer = $this->getMockBuilder('OCP\Mail\IMailer')
			->disableOriginalConstructor()->getMock();
		$this->l = $this->getMockBuilder('OCP\IL10N')
			->disableOriginalConstructor()->getMock();
		$this->questionHelper = $this->getMockBuilder('Symfony\Component\Console\Helper\QuestionHelper')
			->disableOriginalConstructor()->getMock();
		$this->inputInterface = $this->getMockBuilder('Symfony\Component\Console\Input\InputInterface')
			->disableOriginalConstructor()->getMock();
		$this->outputInterface = $this->getMockBuilder('Symfony\Component\Console\Output\OutputInterface')
			->disableOriginalConstructor()->getMock();
		$this->userInterface = $this->getMockBuilder('OCP\UserInterface')
			->disableOriginalConstructor()->getMock();

		$this->outputInterface->expects($this->any())->method('getFormatter')
			->willReturn($this->createMock('\Symfony\Component\Console\Formatter\OutputFormatterInterface'));

		$this->userManager->expects($this->any())->method('getBackends')->willReturn([$this->userInterface]);
		$this->userInterface->expects($this->any())->method('getUsers')->willReturn(['user1', 'user2']);

		$this->secureRandom = $this->getMockBuilder('OCP\Security\ISecureRandom')->disableOriginalConstructor()->getMock();
		$this->secureRandom->expects($this->any())->method('getMediumStrengthGenerator')->willReturn($this->secureRandom);
		$this->secureRandom->expects($this->any())->method('getLowStrengthGenerator')->willReturn($this->secureRandom);
		$this->secureRandom->expects($this->any())->method('generate')->willReturn('12345678');

		$this->encryptAll = new EncryptAll(
			$this->setupUser,
			$this->userManager,
			$this->view,
			$this->keyManager,
			$this->util,
			$this->config,
			$this->mailer,
			$this->l,
			$this->questionHelper,
			$this->secureRandom
		);
	}

	public function testEncryptAll() {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['createKeyPairs', 'encryptAllUsersFiles', 'outputPasswords'])
			->getMock();

		$this->util->expects($this->any())->method('isMasterKeyEnabled')->willReturn(false);
		$encryptAll->expects($this->at(0))->method('createKeyPairs')->with();
		$encryptAll->expects($this->at(1))->method('encryptAllUsersFiles')->with();
		$encryptAll->expects($this->at(2))->method('outputPasswords')->with();

		$encryptAll->encryptAll($this->inputInterface, $this->outputInterface);
	}

	public function testEncryptAllWithMasterKey() {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['createKeyPairs', 'encryptAllUsersFiles', 'outputPasswords'])
			->getMock();

		$this->util->expects($this->any())->method('isMasterKeyEnabled')->willReturn(true);
		$encryptAll->expects($this->never())->method('createKeyPairs');
		$this->keyManager->expects($this->once())->method('validateMasterKey');
		$encryptAll->expects($this->at(0))->method('encryptAllUsersFiles')->with();
		$encryptAll->expects($this->never())->method('outputPasswords');

		$encryptAll->encryptAll($this->inputInterface, $this->outputInterface);
	}

	public function testCreateKeyPairs() {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['setupUserFS', 'generateOneTimePassword'])
			->getMock();

		// set protected property $output
		$this->invokePrivate($encryptAll, 'output', [$this->outputInterface]);

		$this->keyManager->expects($this->exactly(2))->method('userHasKeys')
			->willReturnCallback(
				function ($user) {
					if ($user === 'user1') {
						return false;
					}
					return true;
				}
			);

		$encryptAll->expects($this->once())->method('setupUserFS')->with('user1');
		$encryptAll->expects($this->once())->method('generateOneTimePassword')->with('user1')->willReturn('password');
		$this->setupUser->expects($this->once())->method('setupUser')->with('user1', 'password');

		$this->invokePrivate($encryptAll, 'createKeyPairs');

		$userPasswords = $this->invokePrivate($encryptAll, 'userPasswords');

		// we only expect the skipped user, because generateOneTimePassword which
		// would set the user with the new password was mocked.
		// This method will be tested separately
		$this->assertSame(1, \count($userPasswords));
		$this->assertSame('', $userPasswords['user2']);
	}

	public function testCreateMailBody() {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['encryptUsersFiles'])
			->getMock();
		$result = $this->invokePrivate($encryptAll, 'createMailBody', ['foo']);
		$this->assertEquals(2, \count($result));
		$this->assertGreaterThan(1, \strlen($result[0]));
		$this->assertGreaterThan(1, \strlen($result[1]));
	}

	public function providerSendMailStatus() {
		return [
			[true],
			[false]
		];
	}

	/**
	 * @dataProvider providerSendMailStatus
	 */
	public function testSendPasswordsByMail($sendStatus) {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['encryptUsersFiles'])
			->getMock();

		// set protected property $output
		$this->invokePrivate($encryptAll, 'output', [$this->outputInterface]);

		$this->invokePrivate($encryptAll, 'userPasswords', [['user1' => 'pwd1']]);

		$iUser = $this->createMock(IUser::class);
		$iUser->expects($this->once())
			->method('getDisplayName')
			->willReturn('user1');
		$iUser->expects($this->once())
			->method('getEMailAddress')
			->willReturn('user1@foo.com');
		$this->userManager->expects($this->once())
			->method('get')
			->willReturn($iUser);
		$messageMock = $this->createMock(Message::class);
		$messageMock->expects($this->once())
			->method('setSubject')
			->willReturn($messageMock);
		$messageMock->expects($this->once())
			->method('setTo')
			->willReturn($messageMock);
		$messageMock->expects($this->once())
			->method('setHtmlBody')
			->willReturn($messageMock);
		$messageMock->expects($this->once())
			->method('setPlainBody')
			->willReturn($messageMock);
		$messageMock->expects($this->once())
			->method('setFrom')
			->willReturn($messageMock);

		$this->mailer->expects($this->once())
			->method('createMessage')
			->willReturn($messageMock);

		if ($sendStatus === true) {
			$this->mailer->expects($this->once())
				->method('send')
				->willReturn(true);
		} else {
			$this->mailer->expects($this->once())
				->method('send')
				->willThrowException(new \Exception());
		}

		$this->assertNull($this->invokePrivate($encryptAll, 'sendPasswordsByMail', []));
	}

	public function testOutputPasswords() {
		$this->view = new View('/');
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['encryptUsersFiles'])
			->getMock();

		// set protected property $output, $input
		$this->invokePrivate($encryptAll, 'output', [$this->outputInterface]);
		$this->invokePrivate($encryptAll, 'input', [$this->inputInterface]);
		$this->invokePrivate($encryptAll, 'userPasswords', [['user1' => 'pwd1']]);
		$this->questionHelper->expects($this->once())
			->method('ask')
			->willReturn(false);
		$this->assertNull($this->invokePrivate($encryptAll, 'outputPasswords', []));
	}

	public function providerMasterKeyEncryptionStatus() {
		return [
			[false],
			[true]
		];
	}

	/**
	 * @dataProvider providerMasterKeyEncryptionStatus
	 */
	public function testEncryptAllUsersFiles($masterKeyEnabled) {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['encryptUsersFiles'])
			->getMock();

		$this->util->expects($this->any())->method('isMasterKeyEnabled')->willReturn($masterKeyEnabled);

		// set protected property $output
		$this->invokePrivate($encryptAll, 'output', [$this->outputInterface]);
		if ($masterKeyEnabled === false) {
			$this->invokePrivate($encryptAll, 'userPasswords', [['user1' => 'pwd1', 'user2' => 'pwd2']]);

			$encryptAll->expects($this->at(0))->method('encryptUsersFiles')->with('user1');
			$encryptAll->expects($this->at(1))->method('encryptUsersFiles')->with('user2');
		}

		$this->assertNull($this->invokePrivate($encryptAll, 'encryptAllUsersFiles'));
	}

	public function testEncryptUsersFiles() {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['encryptFile', 'setupUserFS'])
			->getMock();

		$this->util->expects($this->any())->method('isMasterKeyEnabled')->willReturn(false);

		$storage = $this->createMock(Storage::class);
		$storage->expects($this->any())
			->method('getId')
			->will($this->returnValue('home::someuser'));
		$commonStorage = $this->createMock(Common::class);
		$commonStorage->expects($this->any())
			->method('instanceOfStorage')
			->willReturn(false);
		//$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo1 = new FileInfo('/user1/files/foo', $storage, 'foo',
			['name' => 'foo'], null);
		$fileInfo2 = new FileInfo('/user1/files/foo/subfile', $storage, 'foo/subfile',
			['name' => 'foo/subfile'], null);
		$fileInfo3 = new FileInfo('/user1/files/bar', $storage, 'bar',
			['name' => 'bar'], null);
		$this->view->expects($this->any())
			->method('getDirectoryContent')
			->willReturnOnConsecutiveCalls([$fileInfo1, $fileInfo2, $fileInfo3], []);

		$this->view->expects($this->any())->method('is_dir')
			->willReturnCallback(
				function ($path) {
					if ($path === '/user1/files/foo') {
						return true;
					}
					return false;
				}
			);

		$encryptAll->expects($this->any())
			->method('encryptFile')
			->willReturnMap([
				['/user1/files/foo/subfile', true],
				['/user1/files/bar', true]
			]);

		$output = new ConsoleOutput();
		$progressBar = new ProgressBar($output);
		$this->assertNull($this->invokePrivate($encryptAll, 'encryptUsersFiles', ['user1', $progressBar, '']));
	}

	public function testEncryptUsersFilesIncomingShares() {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['encryptFile', 'setupUserFS'])
			->getMock();

		$this->util->expects($this->any())->method('isMasterKeyEnabled')->willReturn(false);

		$commonStorage = $this->createMock(Common::class);
		$commonStorage->expects($this->once())
			->method('instanceOfStorage')
			->with('\OCA\Files_Sharing\ISharedStorage')
			->willReturn(true);
		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo->expects($this->once())
			->method('getStorage')
			->willReturn($commonStorage);
		$this->view->expects($this->any())
			->method('getDirectoryContent')
			->with('/user1/files')
			->willReturn([$fileInfo]);

		$outputInterface = $this->createMock(OutputInterface::class);
		$progressBar = new ProgressBar($outputInterface);

		$result = $this->invokePrivate($encryptAll, 'encryptUsersFiles', ['user1', $progressBar, '']);
		$this->assertNull($result);
	}

	public function testEncryptFileFileId() {
		$this->createUser('user1', 'user1');
		\OC::$server->getUserFolder('user1');

		$view = new View('/user1/files');
		$view->touch('bar.txt');
		$oldFileInfo = $view->getFileInfo('bar.txt');

		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['setupUserFS', 'getTimeStamp'])
			->getMock();

		$result = $this->invokePrivate($encryptAll, 'encryptFile', ['/user1/files/bar.txt']);
		$this->assertTrue($result);

		$view1 = new View('/');
		$fileInfo = $view1->getFileInfo('/user1/files/bar.txt');
		$this->assertEquals($fileInfo->getId(), $oldFileInfo->getId());
	}

	public function testGenerateOneTimePassword() {
		$password = $this->invokePrivate($this->encryptAll, 'generateOneTimePassword', ['user1']);
		$this->assertTrue(\is_string($password));
		$this->assertSame(8, \strlen($password));

		$userPasswords = $this->invokePrivate($this->encryptAll, 'userPasswords');
		$this->assertSame(1, \count($userPasswords));
		$this->assertSame($password, $userPasswords['user1']);
	}

	public function testEncryptFilePositiveTest() {
		$path = 'test.txt';

		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['setupUserFS', 'getTimeStamp'])
			->getMock();

		$encryptAll->expects($this->any())->method('getTimestamp')->willReturn(55);

		$this->view->expects($this->once())
			->method('copy')
			->with($path, $path . '.encrypted.55.part');
		$this->view->expects($this->once())
			->method('rename')
			->with($path . '.encrypted.55.part', $path);

		$this->assertTrue($this->invokePrivate($encryptAll, 'encryptFile', [$path]));
	}

	public function testEncryptFileFails() {
		$path = 'test.txt';

		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->setMethods(['setupUserFS', 'getTimeStamp'])
			->getMock();

		$encryptAll->expects($this->any())->method('getTimestamp')->willReturn(55);

		$this->view->expects($this->once())
			->method('copy')
			->with($path, $path . '.encrypted.55.part');
		$this->view->expects($this->once())
			->method('rename')
			->with($path . '.encrypted.55.part', $path)
			->willThrowException(new DecryptionFailedException("failed to encrypt"));

		$this->assertFalse($this->invokePrivate($encryptAll, 'encryptFile', [$path]));
	}

	/** A dummy test for getTimeStamp  */
	public function testGetTimeStamp() {
		/** @var EncryptAll  | \PHPUnit\Framework\MockObject\MockObject  $encryptAll */
		$encryptAll = $this->getMockBuilder(EncryptAll::class)
			->setConstructorArgs(
				[
					$this->setupUser,
					$this->userManager,
					$this->view,
					$this->keyManager,
					$this->util,
					$this->config,
					$this->mailer,
					$this->l,
					$this->questionHelper,
					$this->secureRandom
				]
			)
			->getMock();

		$result = $this->invokePrivate($encryptAll, 'getTimeStamp', []);
		$this->assertGreaterThan(10000, $result);
	}

	public function testEncryptAlreadyEncryptedFile() {
		$this->keyManager->method('getVersion')
			->with('/user1/files/bar.txt', $this->view)
			->willReturn(1);
		$result = $this->invokePrivate($this->encryptAll, 'encryptFile', ['/user1/files/bar.txt']);
		$this->assertFalse($result);
	}

	/**
	 * @dataProvider providesCreateMasterKeyData
	 * @param bool $isShareKeySet
	 * @param bool $isMasterkeySet
	 * @param bool $expectedResult
	 */
	public function testCreateMasterKey($isShareKeySet, $isMasterkeySet, $expectedResult) {
		$this->keyManager->expects($this->once())
			->method('setPublicShareKeyIDAndMasterKeyId');
		$this->keyManager->expects($this->once())
			->method('validateShareKey');
		$this->keyManager->expects($this->once())
			->method('validateMasterKey');
		$this->keyManager->method('getPublicShareKey')
			->willReturn($isShareKeySet);
		$this->keyManager->method('getPublicMasterKey')
			->willReturn($isMasterkeySet);
		$returnVal = $this->encryptAll->createMasterKey();
		$this->assertEquals($expectedResult, $returnVal);
	}

	public function providesCreateMasterKeyData() {
		return [
			[true, false, false],
			[true, true, true],
			[false, true, false],
			[false, false, false],
		];
	}
}
