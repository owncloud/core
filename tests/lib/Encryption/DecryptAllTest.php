<?php
/**
 * @author Björn Schießle <schiessle@owncloud.com>
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

namespace Test\Encryption;

use Doctrine\DBAL\Statement;
use OC\Encryption\DecryptAll;
use OC\Encryption\Exceptions\DecryptionFailedException;
use OC\Encryption\Manager;
use OC\Files\Cache\Cache;
use OC\Files\FileInfo;
use OC\Files\View;
use OC\User\AccountMapper;
use OC\User\AccountTermMapper;
use OC\User\SyncService;
use OCA\Files_Sharing\SharedStorage;
use OCP\DB\QueryBuilder\IExpressionBuilder;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Encryption\IEncryptionModule;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\UserInterface;
use OCP\Util\UserSearch;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class DecryptAllTest
 *
 * @group DB
 *
 * @package Test\Encryption
 */
class DecryptAllTest extends TestCase {
	use UserTrait;
	/** @var \PHPUnit\Framework\MockObject\MockObject | IUserManager */
	protected $userManager;

	/** @var \PHPUnit\Framework\MockObject\MockObject | Manager */
	protected $encryptionManager;

	/** @var \PHPUnit\Framework\MockObject\MockObject | View */
	protected $view;

	/** @var \PHPUnit\Framework\MockObject\MockObject | ILogger */
	protected $logger;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \Symfony\Component\Console\Input\InputInterface */
	protected $inputInterface;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \Symfony\Component\Console\Output\OutputInterface */
	protected $outputInterface;

	/** @var  \PHPUnit\Framework\MockObject\MockObject | \OCP\UserInterface */
	protected $userInterface;

	/** @var  DecryptAll */
	protected $instance;

	public function setUp() {
		parent::setUp();

		$this->userManager = $this->getMockBuilder(IUserManager::class)
			->disableOriginalConstructor()->getMock();
		$this->encryptionManager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()->getMock();
		$this->view = $this->getMockBuilder(View::class)
			->disableOriginalConstructor()->getMock();
		$this->logger = $this->getMockBuilder(ILogger::class)
			->disableOriginalConstructor()->getMock();
		$this->inputInterface = $this->getMockBuilder(InputInterface::class)
			->disableOriginalConstructor()->getMock();
		$this->outputInterface = $this->getMockBuilder(OutputInterface::class)
			->disableOriginalConstructor()->getMock();
		$this->userInterface = $this->getMockBuilder(UserInterface::class)
			->disableOriginalConstructor()->getMock();

		$this->outputInterface->expects($this->any())->method('getFormatter')
			->willReturn($this->createMock(OutputFormatterInterface::class));

		$this->instance = new DecryptAll($this->encryptionManager, $this->userManager, $this->view, $this->logger);

		$this->invokePrivate($this->instance, 'input', [$this->inputInterface]);
		$this->invokePrivate($this->instance, 'output', [$this->outputInterface]);
	}

	public function testDecryptAllFailsToDecrypt() {
		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject |  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$this->userManager,
					$this->view,
					$this->logger
				]
			)
			->setMethods(['prepareEncryptionModules', 'decryptAllUsersFiles'])
			->getMock();

		$instance->expects($this->once())
			->method('decryptAllUsersFiles')
			->with('user1');

		$this->invokePrivate($instance, 'failed', [['user1' => [['path' => 'a.txt', 'exception' => new \Exception('Missing file')]]]]);
		$this->assertTrue($instance->decryptAll($this->inputInterface, $this->outputInterface, 'user1'));
	}

	public function dataDecryptAll() {
		return [
			[true, 'user1', true],
			[false, 'user1', true],
			[true, '0', true],
			[false, '0', true],
			[true, '', false],
		];
	}

	/**
	 * @dataProvider dataDecryptAll
	 * @param bool $prepareResult
	 * @param string $user
	 * @param bool $userExistsChecked
	 */
	public function testDecryptAll($prepareResult, $user, $userExistsChecked) {
		if ($userExistsChecked) {
			$this->userManager->expects($this->once())->method('userExists')->willReturn(true);
		} else {
			$this->userManager->expects($this->never())->method('userExists');
		}
		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject |  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$this->userManager,
					$this->view,
					$this->logger
				]
			)
			->setMethods(['prepareEncryptionModules', 'decryptAllUsersFiles'])
			->getMock();

		\OC::$server->getAppConfig()->setValue('encryption', 'useMasterKey', '1');

		$instance->expects($this->once())
			->method('prepareEncryptionModules')
			->with($user)
			->willReturn($prepareResult);

		if ($prepareResult) {
			$instance->expects($this->once())
				->method('decryptAllUsersFiles')
				->with($user);
		} else {
			$instance->expects($this->never())->method('decryptAllUsersFiles');
		}

		$instance->decryptAll($this->inputInterface, $this->outputInterface, $user);

		\OC::$server->getAppConfig()->deleteKey('encryption', 'useMasterKey');
	}

	/**
	 * test decrypt all call with a user who doesn't exists
	 */
	public function testDecryptAllWrongUser() {
		$this->userManager->expects($this->once())->method('userExists')->willReturn(false);
		$this->outputInterface->expects($this->once())->method('writeln')
			->with('User "user1" does not exist. Please check the username and try again');

		$this->assertFalse(
			$this->instance->decryptAll($this->inputInterface, $this->outputInterface, 'user1')
		);
	}

	public function dataTrueFalse() {
		return [
			[true],
			[false],
		];
	}

	/**
	 * @dataProvider dataTrueFalse
	 * @param bool $success
	 */
	public function testPrepareEncryptionModules($success) {
		$user = 'user1';

		$dummyEncryptionModule = $this->getMockBuilder(IEncryptionModule::class)
			->disableOriginalConstructor()->getMock();

		$dummyEncryptionModule->expects($this->once())
			->method('prepareDecryptAll')
			->with($this->inputInterface, $this->outputInterface, $user)
			->willReturn($success);

		$callback = function () use ($dummyEncryptionModule) {
			return $dummyEncryptionModule;
		};
		$moduleDescription = [
			'id' => 'id',
			'displayName' => 'displayName',
			'callback' => $callback
		];

		$this->encryptionManager->expects($this->once())
			->method('getEncryptionModules')
			->willReturn([$moduleDescription]);

		$this->assertSame($success,
			$this->invokePrivate($this->instance, 'prepareEncryptionModules', [$user])
		);
	}

	public function testNoUsersSeen() {
		$this->createUser('user1', 'user1');
		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject |  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$this->userManager,
					$this->view,
					$this->logger
				]
			)
			->setMethods(['decryptUsersFiles'])
			->getMock();

		$this->invokePrivate($instance, 'input', [$this->inputInterface]);
		$this->invokePrivate($instance, 'output', [$this->outputInterface]);

		$function = function (IUser $user) {
			$users[] = $user->getUID();
		};

		$this->userManager->expects($this->once())
			->method('countSeenUsers')
			->willReturn(0);

		$result = $this->invokePrivate($instance, 'decryptAllUsersFiles', []);
		$this->assertEquals(false, $result);
	}

	/**
	 * @dataProvider dataTestDecryptAllUsersFiles
	 */
	public function testDecryptAllUsersFiles($user) {

		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject |  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$this->userManager,
					$this->view,
					$this->logger
				]
			)
			->setMethods(['decryptUsersFiles', 'prepareEncryptionModules'])
			->getMock();

		$this->invokePrivate($instance, 'input', [$this->inputInterface]);
		$this->invokePrivate($instance, 'output', [$this->outputInterface]);

		if (empty($user)) {
			$progress = new ProgressBar($this->outputInterface);
			$this->userManager->expects($this->once())
				->method('countSeenUsers')
				->willReturn(2);
			$this->userManager->expects($this->once())
				->method('callForSeenUsers')
				->will($this->returnCallback(function () use ($instance, $progress) {
					$this->invokePrivate($instance, 'decryptUsersFiles', ['user1', $progress, '']);
					$this->invokePrivate($instance, 'decryptUsersFiles', ['user2', $progress, '']);
				}));
			$instance->expects($this->at(0))
				->method('decryptUsersFiles')
				->with('user1');
			$instance->expects($this->at(1))
				->method('decryptUsersFiles')
				->with('user2');
			\OC::$server->getConfig()->setAppValue('encryption', 'userSpecificKey', '0');
		} else {
			\OC::$server->getConfig()->setAppValue('encryption', 'userSpecificKey', '1');
			$iUser = $this->createMock(IUser::class);
			$iUser->expects($this->once())
				->method('getUID')
				->willReturn($user);
			$this->userManager->expects($this->once())
				->method('get')
				->willReturn($iUser);
			if ($user === 'userfails') {
				$instance->expects($this->once())
					->method('prepareEncryptionModules')
					->willReturn(false);
			} else {
				$instance->expects($this->once())
					->method('decryptUsersFiles')
					->with($user);
				$instance->expects($this->once())
					->method('prepareEncryptionModules')
					->willReturn(true);
			}
		}

		$result = $this->invokePrivate($instance, 'decryptAllUsersFiles', [$user]);
		if ($user !== 'userfails') {
			$this->assertEquals(true, $result);
		} else {
			$this->assertFalse($result);
		}
	}

	public function providerDecryptAllUsersFilesUsersSeen() {
		return [
			[true],
			[false]
		];
	}

	/**
	 * @dataProvider providerDecryptAllUsersFilesUsersSeen
	 */
	public function testDecryptAllUsersFilesUsersSeen($prepareEncryptionModulesReturn) {
		$user1 = [
			'id' => 1,
			'email' => null,
			'user_id' => 'user1',
			'lower_user_id' => 'user1',
			'display_name' => 'user1',
			'quota' => null,
			'last_login' => '1527174420',
			'backend' => 'OC\User\Database',
			'home' => '',
			'state' => 1
		];

		$iConfig = $this->createMock(IConfig::class);
		$idbConnection = $this->createMock(IDBConnection::class);
		$iqueryBuilder = $this->createMock(IQueryBuilder::class);
		$iexpressionBuilder = $this->createMock(IExpressionBuilder::class);
		$resultStatment = $this->createMock(Statement::class);
		$resultStatment->expects($this->at(0))
			->method('fetch')
			->willReturn(['count' => '1']);
		$resultStatment->expects($this->at(1))
			->method('fetch')
			->willReturn($user1);
		$resultStatment->expects($this->at(2))
			->method('fetch')
			->willReturn($user1);
		$resultStatment->expects($this->any())
			->method('closeCursor')
			->willReturn(true);
		$iexpressionBuilder->expects($this->any())
			->method('gt')
			->willReturn('2');
		$iqueryBuilder->expects($this->any())
			->method('select')
			->willReturn($iqueryBuilder);
		$iqueryBuilder->expects($this->any())
			->method('from')
			->willReturn($iqueryBuilder);
		$iqueryBuilder->expects($this->any())
			->method('where')
			->willReturn($iqueryBuilder);
		$iqueryBuilder->expects($this->any())
			->method('expr')
			->willReturn($iexpressionBuilder);
		$iqueryBuilder->expects($this->any())
			->method('execute')
			->willReturn($resultStatment);
		$idbConnection->expects($this->any())
			->method('getQueryBuilder')
			->willReturn($iqueryBuilder);

		$accountTermMapper = $this->createMock(AccountTermMapper::class);
		$accountMapper = new AccountMapper($iConfig, $idbConnection, $accountTermMapper);
		$utilSearch = $this->createMock(UserSearch::class);
		$syncService = $this->createMock(SyncService::class);

		$iUsers = [$this->createMock(IUser::class), $this->createMock(IUser::class)];
		$iUsers[0]->expects($this->any())
			->method('getUID')
			->willReturn('user1');
		$iUsers[1]->expects($this->any())
			->method('getUID')
			->willReturn('user2');

		$userManager = new \OC\User\Manager($iConfig, $this->logger, $accountMapper, $syncService, $utilSearch);
		$user = '';
		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject |  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$userManager,
					$this->view,
					$this->logger
				]
			)
			->setMethods(['decryptUsersFiles', 'prepareEncryptionModules'])
			->getMock();

		$this->invokePrivate($instance, 'input', [$this->inputInterface]);
		$this->invokePrivate($instance, 'output', [$this->outputInterface]);

		\OC::$server->getAppConfig()->setValue('encryption', 'userSpecificKey', '1');

		if (empty($user)) {
			$instance->expects($this->any())
				->method('prepareEncryptionModules')
				->willReturn($prepareEncryptionModulesReturn);
		}

		$result = $this->invokePrivate($instance, 'decryptAllUsersFiles', [$user]);
		$this->assertTrue($result);
	}

	public function dataTestDecryptAllUsersFiles() {
		return [
			['user1'],
			['userfails'],
			['']
		];
	}

	public function providesData() {
		return[
			['called', \OC\Files\Storage\Local::class],
			['exception', \OC\Files\Storage\Local::class],
			['exception2', \OC\Files\Storage\Local::class],
			['skip', SharedStorage::class],
			['skip', \OCA\Files_Sharing\External\Storage::class],
		];
	}
	/**
	 * @param $throwsExceptionInDecrypt
	 * @dataProvider providesData
	 */
	public function testDecryptUsersFiles($decryptBehavior, $storageClass) {
		$storage = $this->createMock($storageClass);
		$storage->expects($this->any())
			->method('instanceOfStorage')
			->will($this->returnCallback(function ($className) use ($storage) {
				return ($storage instanceof $className);
			}));

		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$this->userManager,
					$this->view,
					$this->logger
				]
			)
			->setMethods(['decryptFile'])
			->getMock();

		$this->view->expects($this->at(0))->method('getDirectoryContent')
			->with('/user1/files')->willReturn(
				[
					new FileInfo('path', $storage, 'intPath', ['name' => 'foo', 'type'=>'dir'], null),
					new FileInfo('path', $storage, 'intPath', ['name' => 'bar', 'type'=>'file', 'encrypted'=>true], null)
				]
			);

		if ($decryptBehavior !== 'skip') {
			$this->view->expects($this->at(3))->method('getDirectoryContent')
				->with('/user1/files/foo')->willReturn(
					[
						new FileInfo('path', $storage, 'intPath', ['name' => 'subfile', 'type'=>'file', 'encrypted'=>true], null)
					]
				);
		}

		$this->view->expects($this->any())->method('is_dir')
			->willReturnCallback(
				function ($path) {
					return $path === '/user1/files/foo';
				}
			);

		if (($decryptBehavior === 'exception') || ($decryptBehavior === 'exception2')) {
			$instance->expects($this->at(0))
				->method('decryptFile')
				->with('/user1/files/bar')
				->willThrowException(new \Exception());
			if ($decryptBehavior === 'exception2') {
				$this->invokePrivate($instance, 'failed', [['user1' => [['path' => 'a.txt', 'exception' => new \Exception('Missing file')]]]]);
			}
		} elseif ($decryptBehavior === 'skip') {
			$instance->expects($this->never())
				->method('decryptFile');
		} else {
			$instance->expects($this->at(0))
				->method('decryptFile')
				->with('/user1/files/bar');
			$instance->expects($this->at(1))
				->method('decryptFile')
				->with('/user1/files/foo/subfile');
		}

		$progressBar = new ProgressBar(new NullOutput());

		$this->invokePrivate($instance, 'decryptUsersFiles', ['user1', $progressBar, '']);
	}

	public function testDecryptFile() {
		$path = 'test.txt';

		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$this->userManager,
					$this->view,
					$this->logger
				]
			)
			->setMethods(['getTimestamp'])
			->getMock();

		$instance->expects($this->any())->method('getTimestamp')->willReturn(42);

		$this->view->expects($this->once())
			->method('copy')
			->with($path, $path . '.decrypted.42.part');
		$this->view->expects($this->once())
			->method('rename')
			->with($path . '.decrypted.42.part', $path);
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$fileCache = $this->createMock(Cache::class);
		$fileCache->expects($this->once())
			->method('put')
			->with('test.txt', ['encrypted' => 0]);
		$storage->expects($this->once())
			->method('getCache')
			->willReturn($fileCache);
		$this->view->expects($this->once())
			->method('resolvePath')
			->willReturn([$storage, 'test.txt']);

		$this->assertTrue(
			$this->invokePrivate($instance, 'decryptFile', [$path])
		);
	}

	/**
	 * Test to verify the fileid after the decryptFile method should be same
	 */
	public function testDecryptFileForFileId() {
		if ($this->runsWithPrimaryObjectstorage()) {
			$this->markTestSkipped('Objectstore cannot yet ensure to keep the file-id when copying/renaming files');
		}
		$this->createUser('user1', 'user1');
		//To create /user1/files folder
		\OC::$server->getUserFolder('user1');

		$view = new View('/');
		$view->touch('/user1/files/test.txt');
		$fileInfo = $view->getFileInfo('/user1/files/test.txt');

		$path = '/user1/files/test.txt';

		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$this->userManager,
					$view,
					$this->logger
				]
			)
			->setMethods(['getTimestamp'])
			->getMock();

		$instance->expects($this->any())->method('getTimestamp')->willReturn(42);

		$this->assertTrue(
			$this->invokePrivate($instance, 'decryptFile', [$path])
		);

		$view1 = new View('/');
		$newFileInfo = $view1->getFileInfo($path);
		$this->assertEquals($newFileInfo->getId(), $fileInfo->getId());
	}

	public function testDecryptFileFailure() {
		$path = 'test.txt';

		/** @var DecryptAll | \PHPUnit\Framework\MockObject\MockObject  $instance */
		$instance = $this->getMockBuilder(DecryptAll::class)
			->setConstructorArgs(
				[
					$this->encryptionManager,
					$this->userManager,
					$this->view,
					$this->logger
				]
			)
			->setMethods(['getTimestamp'])
			->getMock();

		$instance->expects($this->any())->method('getTimestamp')->willReturn(42);

		$this->view->expects($this->once())
			->method('copy')
			->with($path, $path . '.decrypted.42.part')
			->willReturnCallback(function () {
				throw new DecryptionFailedException();
			});

		$this->view->expects($this->never())->method('rename');
		$this->view->expects($this->once())
			->method('file_exists')
			->with($path . '.decrypted.42.part')
			->willReturn(true);
		$this->view->expects($this->once())
			->method('unlink')
			->with($path . '.decrypted.42.part');

		$this->assertFalse(
			$this->invokePrivate($instance, 'decryptFile', [$path])
		);
	}
}
