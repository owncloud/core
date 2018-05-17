<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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
namespace Test\Command\User;

use OC\Core\Command\Integrity\SignApp;
use OC\Core\Command\User\SyncBackend;
use OC\IntegrityCheck\Checker;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\User\AccountMapper;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IURLGenerator;
use OCP\IUserBackend;
use OCP\IUserManager;
use OCP\UserInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;

class SyncBackendTest extends TestCase {

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject */
	private $logger;
	/** @var AccountMapper | \PHPUnit_Framework_MockObject_MockObject */
	private $mapper;
	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;
	/** @var SyncBackend */
	private $command;

	/** @var UserInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $dummyBackend;

	public function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->mapper = $this->createMock(AccountMapper::class);
		$this->userManager = $this->createMock(IUserManager::class);

		$this->dummyBackend = $this->createMock(UserInterface::class);

		$this->userManager->expects($this->any())
			->method('getBackends')
			->willReturn([$this->dummyBackend]);

		$this->command = new SyncBackend(
			$this->mapper,
			$this->config,
			$this->userManager,
			$this->logger
		);
	}

	public function testListBackends() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->at(0))
			->method('getOption')
			->with('list')
			->will($this->returnValue(true));

		$outputInterface
			->expects($this->at(0))
			->method('writeln')
			->with(\get_class($this->dummyBackend));

		$this->assertEquals(0, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testNoBackendIsGivenShowsError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->at(0))
			->method('getOption')
			->with('list')
			->will($this->returnValue(null));

		$inputInterface
			->expects($this->at(1))
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue(null));

		$outputInterface
			->expects($this->at(0))
			->method('writeln')
			->with('<error>No backend class name given. Please run ./occ help user:sync to understand how this command works.</error>');

		$this->assertEquals(1, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testNotExistingBackendIsGivenShowsError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->at(0))
			->method('getOption')
			->with('list')
			->will($this->returnValue(null));

		$backendClassName = '\OCP\Some\Backend';
		$inputInterface
			->expects($this->at(1))
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue($backendClassName));

		$outputInterface
			->expects($this->at(0))
			->method('writeln')
			->with("<error>The backend <$backendClassName> does not exist. Did you miss to enable the app?</error>");

		$this->assertEquals(1, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testUnsupportedBackendIsGivenShowsError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->at(0))
			->method('getOption')
			->with('list')
			->will($this->returnValue(null));

		$backendClassName = \get_class($this->dummyBackend);
		$inputInterface
			->expects($this->at(1))
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue($backendClassName));

		$this->dummyBackend
			->expects($this->at(0))
			->method('hasUserListings')
			->will($this->returnValue(false));

		$outputInterface
			->expects($this->at(0))
			->method('writeln')
			->with("<error>The backend <$backendClassName> does not allow user listing. No sync is possible</error>");

		$this->assertEquals(1, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testInvalidAccountActionShowsError() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->at(0))
			->method('getOption')
			->with('list')
			->will($this->returnValue(null));

		$backendClassName = \get_class($this->dummyBackend);

		$inputInterface
			->expects($this->at(1))
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue($backendClassName));

		$this->dummyBackend
			->expects($this->at(0))
			->method('hasUserListings')
			->will($this->returnValue(true));

		$inputInterface
			->expects($this->at(2))
			->method('getOption')
			->with('missing-account-action')
			->will($this->returnValue('invalid'));

		$outputInterface
			->expects($this->at(0))
			->method('writeln')
			->with('<error>Unknown action. Choose between "disable" or "remove"</error>');

		$this->assertEquals(1, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}

	public function testSingleUserSync() {
		$inputInterface = $this->createMock(InputInterface::class);
		$outputInterface = $this->createMock(OutputInterface::class);

		$inputInterface
			->expects($this->at(0))
			->method('getOption')
			->with('list')
			->will($this->returnValue(null));

		$backendClassName = \get_class($this->dummyBackend);

		$inputInterface
			->expects($this->at(1))
			->method('getArgument')
			->with('backend-class')
			->will($this->returnValue($backendClassName));

		$this->dummyBackend
			->expects($this->at(0))
			->method('hasUserListings')
			->will($this->returnValue(true));

		$this->dummyBackend
			->method('getUsers')
			->willReturn([]);

		$inputInterface
			->expects($this->at(2))
			->method('getOption')
			->with('missing-account-action')
			->will($this->returnValue('disable'));
		$inputInterface
			->expects($this->at(3))
			->method('getOption')
			->with('missing-account-action')
			->will($this->returnValue('disable'));

		$inputInterface
			->expects($this->at(4))
			->method('getOption')
			->with('uid')
			->will($this->returnValue('foo'));

		$outputInterface
			->expects($this->at(0))
			->method('writeln')
			->with('Syncing foo ...');

		// TODO add more tests

		$this->assertEquals(0, static::invokePrivate($this->command, 'execute', [$inputInterface, $outputInterface]));
	}
}
