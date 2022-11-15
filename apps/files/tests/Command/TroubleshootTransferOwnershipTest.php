<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

use OC\Share20\ProviderFactory;
use OCA\Files\Command\TroubleshootTransferOwnership;
use OCP\Files\Folder;
use OCP\IDBConnection;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class TroubleshootTransferOwnershipTest
 *
 * @group DB
 *
 * @package OCA\Files\Tests\Command
 */
class TroubleshootTransferOwnershipTest extends TestCase {
	/**
	 * @var CommandTester
	 */
	private $commandTester;

	protected function setup(): void {
		parent::setUp();

		// setup all db entries created if any

		// setup command
		$command = new TroubleshootTransferOwnership(
			\OC::$server->getDatabaseConnection(),
			$this->createMock(ProviderFactory::class)
		);
		$this->commandTester = new CommandTester($command);
	}

	protected function tearDown(): void {
		// cleanup all db entries created if any
		parent::tearDown();
	}

	public function testTypeIsNotRecognised() {
		$input = [
			'type' => 'not-existing'
		];

		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();

		$this->assertStringContainsString('type is not recognised, allowed: all|invalid-owner|invalid-initiator', $output);
	}

	public function testFindInvalidShareOwner() {
		$command = $this->getMockBuilder(TroubleshootTransferOwnership::class)
			->setConstructorArgs([
				$this->createMock(IDBConnection::class),
				$this->createMock(ProviderFactory::class)
			])
			->setMethods([
				'getAllInvalidShareStorages',
				'deleteCorruptedShare',
				'adjustShareOwner',
				'getAllResharers',
				'getResharesForUser',
				'adjustShareInitiator',
				'getUserFolder',
				'tearDownFS',
				'setupFS',
			])
			->getMock();

		$invalidUidOwnerCorrectable = [
			'share_id' => '1',
			'share_type' => '0',
			'share_parent' => '',
			'file_source' => '1',
			'storage' => 'home::user1',
			'uid_owner' => 'user2',
			'uid_initiator' => 'user2',
			'share_with' => 'user3',
		];
		$invalidUidOwnerShareWithPointingToStorage = [
			'share_id' => '2',
			'share_type' => '0',
			'share_parent' => '',
			'file_source' => '1',
			'storage' => 'home::user1',
			'uid_owner' => 'user2',
			'uid_initiator' => 'user2',
			'share_with' => 'user1',
		];
		$invalidShareStorages = [
			$invalidUidOwnerCorrectable,
			$invalidUidOwnerShareWithPointingToStorage
		];

		$command
			->expects($this->exactly(2))
			->method('getAllInvalidShareStorages')
			->withConsecutive(
				['home::'],
				['object::user:'],
			)
			->willReturnOnConsecutiveCalls(
				$invalidShareStorages,
				[],
			);

		$command->expects($this->exactly(1))->method('deleteCorruptedShare')->with('2', 0)->willReturn(null);
		$command->expects($this->exactly(1))->method('adjustShareOwner')->with('1', 0, 'user1')->willReturn(null);

		$commandTester = new CommandTester($command);

		$input = [
			'type' => 'invalid-owner',
			'--fix' => null
		];

		$commandTester->execute($input);
		$output = $commandTester->getDisplay();

		$this->assertStringContainsString('Found 2 invalid share owners', $output);
		$this->assertStringContainsString('Adjusted share with id=1 and its children from uid_owner=user2 to uid_owner=user1', $output);
		$this->assertStringContainsString('Deleted corrupted share with id=2', $output);
	}

	public function testFindInvalidReshareInitiator() {
		$command = $this->getMockBuilder(TroubleshootTransferOwnership::class)
			->setConstructorArgs([
				$this->createMock(IDBConnection::class),
				$this->createMock(ProviderFactory::class)
			])
			->setMethods([
				'getAllInvalidShareStorages',
				'deleteCorruptedShare',
				'adjustShareOwner',
				'getAllResharers',
				'getResharesForUser',
				'adjustShareInitiator',
				'getUserFolder',
				'tearDownFS',
				'setupFS',
			])
			->getMock();

		$reshares = [
			// add reshare
			[
				'id' => '1',
				'share_type' => '0',
				'parent' => '',
				'file_source' => '1',
				'uid_owner' => 'user1',
				'uid_initiator' => 'user2',
				'share_with' => 'user3',
			]
		];

		// reshare with (file_source = 1) does not have any nodes attached
		// (invalid uid_initiator -> resharer that does not have a node anymore)
		$userFolder = $this->createMock(Folder::class);
		$userFolder->expects($this->once())->method('getById')->with(1, true)->willReturn([]);

		$command->expects($this->exactly(1))->method('getAllResharers')->willReturn([
			'user2'
		]);
		$command->expects($this->exactly(1))->method('getUserFolder')->with('user2')->willReturn($userFolder);
		$command->expects($this->exactly(1))->method('getResharesForUser')->with('user2')->willReturn($reshares);
		$command->expects($this->exactly(1))->method('adjustShareInitiator')->with('1', 'user1')->willReturn(null);

		$commandTester = new CommandTester($command);

		$input = [
			'type' => 'invalid-initiator',
			'--fix' => null
		];

		$commandTester->execute($input);
		$output = $commandTester->getDisplay();

		$this->assertStringContainsString('Found 1 invalid initiator reshares', $output);
		$this->assertStringContainsString('Adjusted share with id=1 from uid_initiator=user2 to uid_initiator=user1', $output);
	}
}
