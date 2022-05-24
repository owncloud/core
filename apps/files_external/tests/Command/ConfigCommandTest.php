<?php

/**
 * @author Saugat Pachhai <saugat@jankaritech.com>
 * @author Artur Neumann <artur@jankaritech.com>
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

namespace OCA\Files_External\Tests\Command;

use OCA\Files_External\Command\Config;
use Symfony\Component\Console\Output\BufferedOutput;

class ConfigCommandTest extends CommandTest {
	private function getInstance($storageService) {
		return new Config($storageService);
	}

	/**
	 * @dataProvider optionsProvider
	 *
	 * @param mixed $value
	 *
	 * @return void
	 */
	public function testGetConfigValue($value) {
		$mount = $this->getMount(1, '', '', [], ['filesystem_check_changes' => $value]);

		$storageService = $this->getGlobalStorageService([$mount]);
		$command = $this->getInstance($storageService);

		$input = $this->getInput(
			$command,
			[
			'mount_id' => 1,
			'key' => 'filesystem_check_changes'
			],
			['output' => 'json']
		);

		$result = \trim($this->executeCommand($command, $input));
		$this->assertEquals($value, $result);
	}

	/**
	 * @dataProvider optionsProvider
	 *
	 * @param mixed $value
	 *
	 * @return void
	 */
	public function testSetConfigValue($value) {
		$mount = $this->getMount(1, '', '');

		$storageService = $this->getGlobalStorageService([$mount]);
		$command = $this->getInstance($storageService);

		$input = $this->getInput(
			$command,
			[
			'mount_id' => 1,
			'key' => 'filesystem_check_changes',
			'value' => $value
			],
			[ 'output' => 'json']
		);

		$result = \trim($this->executeCommand($command, $input));
		$this->assertEquals('', $result);

		$output = new BufferedOutput();
		$result = $this->invokePrivate($command, 'getOption', [$mount, 'filesystem_check_changes', $output]);
		$this->assertEquals($value, \trim($output->fetch()));
	}
	
	public function optionsProvider() {
		return [
			[0], [1], ['true']
		];
	}
}
