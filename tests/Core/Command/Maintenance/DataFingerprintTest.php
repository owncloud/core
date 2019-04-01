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
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

class DataFingerprintTest extends TestCase {

	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ITimeFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $timeFactory;
	/** @var ILogger | \PHPUnit\Framework\MockObject\MockObject */
	private $logger;
	/** @var \Symfony\Component\Console\Command\Command */
	private $command;
	/** @var CommandTester */
	private $commandTester;

	public function providesAnswers() {
		return [
			'yes' => [true, 'yes'],
			'no' => [false, 'no'],
		];
	}

	protected function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->logger = $this->createMock(ILogger::class);

		$this->command = new DataFingerprint($this->config, $this->timeFactory, $this->logger);
		$this->commandTester = new CommandTester($this->command);
	}

	/**
	 * @dataProvider providesAnswers
	 * @param $expectToLog
	 * @param $answer
	 */
	public function testSetFingerPrint($expectToLog, $answer) {
		$expects = $expectToLog ? $this->any() : $this->never();
		$this->timeFactory->expects($expects)
			->method('getTime')
			->willReturn(42);
		$this->config->expects($expects)
			->method('setSystemValue')
			->with('data-fingerprint', \md5(42));

		$osUser = \get_current_user();
		$server = \gethostname();

		$this->logger->expects($expects)
			->method('info')
			->with("Data fingerprint was set by $osUser@$server to a1d0c6e83f027327d8461063f4ac58a6");

		$this->commandTester->setInputs([$answer]);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains("Do you want to set the data fingerprint?", $output);
	}
}
