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
use OCA\FederatedFileSharing\Tests\TestCase;
use OCA\FederatedFileSharing\Command\PollIncomingShares;
use OCA\Files_Sharing\External\MountProvider;
use OCP\DB\QueryBuilder\IExpressionBuilder;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Files\Storage\IStorageFactory;
use OCP\Files\StorageNotAvailableException;
use OCP\IDBConnection;
use OCP\IUser;
use OCP\IUserManager;
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

	/** @var IDBConnection | \PHPUnit_Framework_MockObject_MockObject */
	private $dbConnection;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;

	/** @var MountProvider | \PHPUnit_Framework_MockObject_MockObject */
	private $externalMountProvider;

	/** @var IStorageFactory | \PHPUnit_Framework_MockObject_MockObject */
	private $loader;

	protected function setUp() {
		parent::setUp();
		$this->dbConnection = $this->createMock(IDBConnection::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->externalMountProvider = $this->createMock(MountProvider::class);
		$this->loader = $this->createMock(IStorageFactory::class);
		$command = new PollIncomingShares($this->dbConnection, $this->userManager, $this->loader, $this->externalMountProvider);
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
		$command = new PollIncomingShares($this->dbConnection, $this->userManager, $this->loader, null);
		$this->commandTester = new CommandTester($command);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains("Polling is not possible when files_sharing app is disabled. Please enable it with 'occ app:enable files_sharing'", $output);
	}

	public function testUnavailableStorage() {
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
		
		$storage = $this->createMock(\OCA\Files_Sharing\External\Storage::class);
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
			'Skipping external share with id "0" from remote "example.org". Reason: "Ooops"',
			$output
		);
	}
}
