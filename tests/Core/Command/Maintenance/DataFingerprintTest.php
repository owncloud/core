<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace Tests\Core\Command\Maintenance;

use OC\Core\Command\Maintenance\DataFingerprint;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\ILogger;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;

class DataFingerprintTest extends TestCase {
	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var InputInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $consoleInput;
	/** @var OutputInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $consoleOutput;
	/** @var ITimeFactory | \PHPUnit_Framework_MockObject_MockObject */
	private $timeFactory;
	/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject */
	private $logger;

	/** @var \Symfony\Component\Console\Command\Command */
	private $command;

	protected function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->consoleInput = $this->createMock(InputInterface::class);
		$this->consoleOutput = $this->createMock(OutputInterface::class);
		$this->logger = $this->createMock(ILogger::class);

		$this->command = new DataFingerprint($this->config, $this->timeFactory, $this->logger);
	}

	public function testSetFingerPrint() {
		$this->timeFactory->expects($this->once())
			->method('getTime')
			->willReturn(42);
		$this->config->expects($this->once())
			->method('setSystemValue')
			->with('data-fingerprint', md5(42));

		$osUser = get_current_user();
		$server = gethostname();

		$this->logger->expects($this->once())
			->method('info')
			->with("Data fingerprint was set by $osUser@$server to a1d0c6e83f027327d8461063f4ac58a6");

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}
}
