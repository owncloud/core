<?php
/**
 * @author Robin McCorkell <rmccorkell@owncloud.com>
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

namespace Tests\Core\Command\Log;

use OC\Core\Command\Log\OwnCloud;
use Test\TestCase;
use OCP\IConfig;

class OwnCloudTest extends TestCase {
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $config;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $consoleInput;
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $consoleOutput;

	/** @var \Symfony\Component\Console\Command\Command */
	protected $command;

	protected function setUp(): void {
		parent::setUp();

		$config = $this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();
		$this->consoleInput = $this->createMock('Symfony\Component\Console\Input\InputInterface');
		$this->consoleOutput = $this->createMock('Symfony\Component\Console\Output\OutputInterface');

		$this->command = new OwnCloud($config);
	}

	public function testEnable(): void {
		$this->consoleInput->method('getOption')
			->willReturnMap([
				['enable', 'true']
			]);
		$this->config->expects(self::atLeastOnce())
			->method('getSystemValue')
			->willReturnArgument(1);
		$this->config->expects($this->once())
			->method('setSystemValue')
			->with('log_type', 'owncloud');

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	public function testChangeFile(): void {
		$this->consoleInput->method('getOption')
			->willReturnMap([
				['file', '/foo/bar/file.log']
			]);
		$this->config->expects(self::atLeastOnce())
			->method('getSystemValue')
			->willReturnArgument(1);
		$this->config->expects($this->once())
			->method('setSystemValue')
			->with('logfile', '/foo/bar/file.log');

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	public function changeRotateSizeProvider(): array {
		return [
			['42', 42],
			['0', 0],
			['1 kB', 1024],
			['5MB', 5 * 1024 * 1024],
		];
	}

	/**
	 * @dataProvider changeRotateSizeProvider
	 */
	public function testChangeRotateSize($optionValue, $configValue): void {
		$this->consoleInput->method('getOption')
			->willReturnMap([
				['rotate-size', $optionValue]
			]);
		$this->config->expects(self::atLeastOnce())
			->method('getSystemValue')
			->willReturnArgument(1);
		$this->config->expects($this->once())
			->method('setSystemValue')
			->with('log_rotate_size', $configValue);

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}

	public function testGetConfiguration(): void {
		$this->config->method('getSystemValue')
			->willReturnMap([
				['log_type', 'owncloud', 'log_type_value'],
				['datadirectory', \OC::$SERVERROOT . '/data', '/data/directory/'],
				['logfile', '/data/directory/owncloud.log', '/var/log/owncloud.log'],
				['log_rotate_size', 0, 5 * 1024 * 1024],
			]);

		$this->consoleOutput
			->expects($this->exactly(3))
			->method('writeln')
			->withConsecutive(
				['Log backend ownCloud: disabled'],
				['Log file: /var/log/owncloud.log'],
				['Rotate at: 5 MB'],
			);

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}
}
