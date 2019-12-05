<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

namespace OCA\Files\Tests\Command;

use OC\Encryption\Manager;
use OC\Share20\ProviderFactory;
use OCA\Files\Command\TransferOwnership;
use OCP\Files\Mount\IMountManager;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Share;
use OCP\Share\IManager;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class TransferOwnershipTest
 *
 * @group DB
 *
 * @package OCA\Files\Tests\Command
 */
class TransferOwnershipTest extends TestCase {
	use UserTrait;

	/**
	 * @var IUserManager
	 */
	private $userManager;

	/**
	 * @var IManager
	 */
	private $shareManager;

	/**
	 * @var IMountManager
	 */
	private $mountManager;

	/**
	 * @var Manager | MockObject
	 */
	private $encryptionManager;

	/**
	 * @var ProviderFactory
	 */
	private $providerFactory;

	/**
	 * @var IUser
	 */
	private $sourceUser;

	/**
	 * @var IUser
	 */
	private $targetUser;

	/**
	 * @var CommandTester
	 */
	private $commandTester;

	protected function setup() {
		parent::setUp();
		$this->userManager = \OC::$server->getUserManager();
		$this->shareManager = \OC::$server->getShareManager();
		$this->mountManager = \OC::$server->getMountManager();
		$this->encryptionManager = $this->createMock(Manager::class);
		$this->providerFactory = new ProviderFactory(\OC::$server);

		$this->sourceUser = $this->createUser('source-user');
		$this->targetUser = $this->createUser('target-user');
		$this->loginAsUser('source-user');
		$this->logout();
		$this->loginAsUser('target-user');
		$this->logout();
		$this->createUser('share-receiver');
		$this->createTestFilesForSourceUser();

		$command = new TransferOwnership(
			$this->userManager,
			$this->shareManager,
			$this->mountManager,
			$this->encryptionManager,
			$this->providerFactory
		);
		$this->commandTester = new CommandTester($command);
	}
	protected function tearDown() {
		$this->tearDownUserTrait();
		$this->shareManager->userDeleted('share-receiver');
		$this->shareManager->userDeleted($this->sourceUser->getUID());
		$this->shareManager->userDeleted($this->targetUser->getUID());
		parent::tearDown();
	}

	/**
	 * Creates files and folder for source-user as the following tree:
	 *
	 * ├── file_in_user_root_folder
	 * ├── shared_file_in_user_root_folder (shared with share-receiver)
	 * ├── transfer
	 * │   ├── shared_file (shared with share-receiver)
	 * │   ├── test_file1
	 * │   ├── test_file2
	 * │   ├── sub_folder
	 * │       ├── shared_file_in_sub_folder (shared with share-receiver)
	 */
	private function createTestFilesForSourceUser() {
		$userFolder = \OC::$server->getUserFolder($this->sourceUser->getUID());
		$userFolder->newFile('file_in_user_root_folder');
		$file = $userFolder->newFile('shared_file_in_user_root_folder');
		$share = $this->shareManager->newShare();
		$share->setNode($file)
			->setSharedBy('source-user')
			->setSharedWith('share-receiver')
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$this->shareManager->createShare($share);

		$userFolder->newFolder('transfer');
		$userFolder->newFile('transfer/test_file1');
		$userFolder->newFile('transfer/test_file2');
		$file = $userFolder->newFile('transfer/shared_file');
		$share = $this->shareManager->newShare();
		$share->setNode($file)
			->setSharedBy('source-user')
			->setSharedWith('share-receiver')
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$this->shareManager->createShare($share);

		$userFolder->newFolder('transfer/sub_folder');
		$file = $userFolder->newFile('transfer/sub_folder/shared_file_in_sub_folder');
		$share = $this->shareManager->newShare();
		$share->setNode($file)
			->setSharedBy('source-user')
			->setSharedWith('share-receiver')
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$this->shareManager->createShare($share);

		$subFolder = $userFolder->get('transfer/sub_folder');
		$share = $this->shareManager->newShare();
		$share->setNode($subFolder)
			->setSharedBy('source-user')
			->setSharedWith('share-receiver')
			->setShareType(Share::SHARE_TYPE_USER)
			->setPermissions(19);
		$this->shareManager->createShare($share);
	}

	public function testTransferAllFiles() {
		$this->encryptionManager->method('isReadyForUser')->willReturn(true);
		$input = [
			'source-user' => $this->sourceUser->getUID(),
			'destination-user' => $this->targetUser->getUID()
		];
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();

		$this->assertContains('Transferring files to target-user', $output);
		$sourceShares = $this->shareManager->getSharesBy($this->sourceUser->getUID(), Share::SHARE_TYPE_USER);
		$targetShares = $this->shareManager->getSharesBy($this->targetUser->getUID(), Share::SHARE_TYPE_USER);
		$this->assertCount(0, $sourceShares);
		$this->assertCount(4, $targetShares);
	}

	public function folderPathProvider() {
		return [
			['transfer', 1, 3],
			['transfer/sub_folder', 2, 2]
		];
	}

	/**
	 * @dataProvider folderPathProvider
	 *
	 * @param string $path
	 * @param int $expectedSourceShareCount
	 * @param int $expectedTargetShareCount
	 */
	public function testTransferSpecificFolder($path, $expectedSourceShareCount, $expectedTargetShareCount) {
		$this->encryptionManager->method('isReadyForUser')->willReturn(true);
		$input = [
			'source-user' => $this->sourceUser->getUID(),
			'destination-user' => $this->targetUser->getUID(),
			'--path' => $path
		];
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();

		$this->assertContains('Transferring files to target-user', $output);
		$sourceShares = $this->shareManager->getSharesBy($this->sourceUser->getUID(), Share::SHARE_TYPE_USER);
		$targetShares = $this->shareManager->getSharesBy($this->targetUser->getUID(), Share::SHARE_TYPE_USER);
		$this->assertCount($expectedSourceShareCount, $sourceShares);
		$this->assertCount($expectedTargetShareCount, $targetShares);
	}
}
