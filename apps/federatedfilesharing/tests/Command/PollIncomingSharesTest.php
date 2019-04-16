<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\FederatedFileSharing\Tests\Command;

use Doctrine\DBAL\Driver\Statement;
use OC\User\NoUserException;
use OCA\FederatedFileSharing\Tests\TestCase;
use OCA\FederatedFileSharing\Command\PollIncomingShares;
use OCA\Files_Sharing\External\Manager;
use OCA\Files_Sharing\External\MountProvider;
use OCA\Files_Sharing\External\Storage;
use OCP\DB\QueryBuilder\IExpressionBuilder;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Files\Storage\IStorageFactory;
use OCP\Files\StorageNotAvailableException;
use OCP\IDBConnection;
use OCP\IUser;
use OCP\IUserManager;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class PollIncomingSharesTest
 *
 * @group DB
 * @package OCA\FederatedFileSharing\Tests\Command
 */
class PollIncomingSharesTest extends TestCase {
	/** @var CommandTester */
	private $commandTester;

	/** @var IDBConnection | MockObject */
	private $dbConnection;

	/** @var IUserManager | MockObject */
	private $userManager;

	/** @var MountProvider | MockObject */
	private $externalMountProvider;

	/** @var IStorageFactory | MockObject */
	private $loader;

	/**
	 * @var Manager | MockObject
	 */
	private $externalManager;

	protected function setUp() {
		parent::setUp();
		$this->dbConnection = $this->createMock(IDBConnection::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->loader = $this->createMock(IStorageFactory::class);
		$this->externalManager = $this->createMock(Manager::class);
		$this->externalMountProvider = $this->createMock(MountProvider::class);
		$command = new PollIncomingShares($this->dbConnection, $this->userManager, $this->loader, $this->externalManager, $this->externalMountProvider);
		$this->commandTester = new CommandTester($command);
	}

	public function testNoSharesPoll() {
		$uid = 'foo';
		$exprBuilder = $this->createMock(IExpressionBuilder::class);
		$statementMock = $this->createMock(Statement::class);
		$statementMock->method('fetch')->willReturnOnConsecutiveCalls(['user' => $uid], false);
		$qbMock = $this->createMock(IQueryBuilder::class);
		$qbMock->method('selectDistinct')->willReturnSelf();
		$qbMock->method('from')->willReturnSelf();
		$qbMock->method('where')->willReturnSelf();
		$qbMock->method('expr')->willReturn($exprBuilder);
		$qbMock->method('execute')->willReturn($statementMock);

		$userMock = $this->createMock(IUser::class);
		$this->userManager->expects($this->once())->method('get')
			->with($uid)->willReturn($userMock);

		$this->externalMountProvider->expects($this->once())->method('getMountsForUser')
			->willReturn([]);

		$this->dbConnection->method('getQueryBuilder')->willReturn($qbMock);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertEmpty($output);
	}

	public function testWithFilesSharingDisabled() {
		$command = new PollIncomingShares($this->dbConnection, $this->userManager, $this->loader, $this->externalManager, null);
		$this->commandTester = new CommandTester($command);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains("Polling is not possible when files_sharing app is disabled. Please enable it with 'occ app:enable files_sharing'", $output);
	}

	public function testUnavailableStorage() {
		$uid = 'foo';
		$exprBuilder = $this->createMock(IExpressionBuilder::class);
		$statementMock = $this->createMock(Statement::class);
		$statementMock->method('fetch')->willReturnOnConsecutiveCalls(
			['user' => $uid],
			['id' => 50, 'remote' => 'example.org'],
			false
		);
		$qbMock = $this->createMock(IQueryBuilder::class);
		$qbMock->method('select')->willReturnSelf();
		$qbMock->method('selectDistinct')->willReturnSelf();
		$qbMock->method('from')->willReturnSelf();
		$qbMock->method('where')->willReturnSelf();
		$qbMock->method('expr')->willReturn($exprBuilder);
		$qbMock->method('execute')->willReturn($statementMock);

		$userMock = $this->createMock(IUser::class);
		$this->userManager->expects($this->once())->method('get')
			->with($uid)->willReturn($userMock);

		$storage = $this->createMock(Storage::class);
		$storage->method('hasUpdated')->willThrowException(new StorageNotAvailableException('Ooops'));
		$storage->method('getRemote')->willReturn('example.org');

		$mount = $this->createMock(\OCA\Files_Sharing\External\Mount::class);
		$mount->method('getStorage')->willReturn($storage);
		$mount->method('getMountPoint')->willReturn("/$uid/files/point");
		$this->externalMountProvider->expects($this->once())->method('getMountsForUser')
			->willReturn([$mount]);

		$this->dbConnection->method('getQueryBuilder')->willReturn($qbMock);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains(
			'Skipping external share with id "50" from remote "example.org". Reason: "Ooops"',
			$output
		);
	}

	public function testNotExistingUser() {
		$uid = 'foo';
		$exprBuilder = $this->createMock(IExpressionBuilder::class);
		$statementMock = $this->createMock(Statement::class);
		$statementMock->method('fetch')->willReturnOnConsecutiveCalls(['user' => $uid], false);
		$qbMock = $this->createMock(IQueryBuilder::class);
		$qbMock->method('selectDistinct')->willReturnSelf();
		$qbMock->method('from')->willReturnSelf();
		$qbMock->method('where')->willReturnSelf();
		$qbMock->method('expr')->willReturn($exprBuilder);
		$qbMock->method('execute')->willReturn($statementMock);

		$this->externalMountProvider->expects($this->never())->method('getMountsForUser');

		$this->dbConnection->method('getQueryBuilder')->willReturn($qbMock);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains(
			'Skipping user "foo". Reason: user manager was unable to resolve the uid into the user object',
			$output
		);
	}

	public function testPollingUnsharedMount() {
		$uid = 'foo';
		$exprBuilder = $this->createMock(IExpressionBuilder::class);
		$statementMock = $this->createMock(Statement::class);
		$statementMock->method('fetch')->willReturnOnConsecutiveCalls(
			['user' => $uid],
			['id' => 50, 'remote' => 'example.org'],
			false
		);
		$qbMock = $this->createMock(IQueryBuilder::class);
		$qbMock->method('select')->willReturnSelf();
		$qbMock->method('selectDistinct')->willReturnSelf();
		$qbMock->method('from')->willReturnSelf();
		$qbMock->method('where')->willReturnSelf();
		$qbMock->method('expr')->willReturn($exprBuilder);
		$qbMock->method('execute')->willReturn($statementMock);

		$userMock = $this->createMock(IUser::class);
		$this->userManager->expects($this->once())->method('get')
			->with($uid)->willReturn($userMock);

		$this->externalManager->expects($this->once())->method('removeShare');

		$storage = $this->createMock(Storage::class);
		$storage->method('hasUpdated')->willThrowException(new NoUserException('Ooops'));

		$mount = $this->createMock(\OCA\Files_Sharing\External\Mount::class);
		$mount->method('getStorage')->willReturn($storage);
		$mount->method('getMountPoint')->willReturn("/$uid/files/point");
		$this->externalMountProvider->expects($this->once())->method('getMountsForUser')
			->willReturn([$mount]);

		$this->dbConnection->method('getQueryBuilder')->willReturn($qbMock);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains(
			'Remote "example.org" reports that external share with id "50" no longer exists. Removing it..',
			$output
		);
	}
}
