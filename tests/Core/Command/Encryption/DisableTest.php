<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
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

namespace Tests\Core\Command\Encryption;

use OC\Core\Command\Encryption\Disable;
use Test\TestCase;

class DisableTest extends TestCase {
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

		$config = $this->config = $this->getMockBuilder('OCP\IConfig')
			->disableOriginalConstructor()
			->getMock();
		$this->consoleInput = $this->createMock('Symfony\Component\Console\Input\InputInterface');
		$this->consoleOutput = $this->createMock('Symfony\Component\Console\Output\OutputInterface');

		/** @var \OCP\IConfig $config */
		$this->command = new Disable($config);
	}

	public function dataDisable() {
		return [
			['yes', true, '1', 'Encryption disabled'],
			['yes', true, '', 'Encryption disabled'],
			['no', false, false, 'Encryption is already disabled'],
		];
	}

	/**
	 * @dataProvider dataDisable
	 *
	 * @param string $oldStatus
	 * @param bool $isUpdating
	 * @param bool $masterKeyEnabled
	 * @param string $expectedString
	 */
	public function testDisable($oldStatus, $isUpdating, $masterKeyEnabled, $expectedString) {
		$this->config->expects($this->exactly(1))
			->method('getAppValue')
			->willReturnMap([
					['core', 'encryption_enabled', 'no', $oldStatus],
				]
			);

		$this->consoleOutput->expects($this->exactly(2))
			->method('writeln')
			->will($this->onConsecutiveCalls([
				$this->stringContains('<info>Cleaned up config</info>'),
				$this->stringContains($expectedString),
			]));

		if ($isUpdating) {
			$this->config
				->method('setAppValue')
				->willReturnMap([
						['core', 'encryption_enabled', 'no', true],
					]
				);
			$this->config
				->method('deleteAppValue')
				->willReturnMap([
					['encryption', 'useMasterKey', true],
					['encryption', 'userSpecificKey', true],
				]);
		}

		self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
	}
}
