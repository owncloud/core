<?php
/**
 * @author Sujith H <sharidasan@owncloud.com>
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

namespace OCA\Encryption\Tests\Command;

use OCA\Encryption\Command\SelectEncryptionType;
use OCA\Encryption\Util;
use Test\TestCase;

class TestEnableUserKey extends TestCase {

	/** @var  EnableUserKey */
	protected $enableUserKey;

	/** @var  Util | \PHPUnit\Framework\MockObject\MockObject */
	protected $util;

	/** @var \OCP\IConfig | \PHPUnit\Framework\MockObject\MockObject */
	protected $config;

	/** @var \Symfony\Component\Console\Helper\QuestionHelper | \PHPUnit\Framework\MockObject\MockObject */
	protected $questionHelper;

	/** @var  \Symfony\Component\Console\Output\OutputInterface | \PHPUnit\Framework\MockObject\MockObject */
	protected $output;

	/** @var  \Symfony\Component\Console\Input\InputInterface | \PHPUnit\Framework\MockObject\MockObject */
	protected $input;

	public function setUp() {
		parent::setUp();

		$this->util = $this->getMockBuilder('OCA\Encryption\Util')
			->disableOriginalConstructor()->getMock();
		$this->config = $this->getMockBuilder('OCP\IConfig')
			->disableOriginalConstructor()->getMock();
		$this->questionHelper = $this->getMockBuilder('Symfony\Component\Console\Helper\QuestionHelper')
			->disableOriginalConstructor()->getMock();
		$this->output = $this->getMockBuilder('Symfony\Component\Console\Output\OutputInterface')
			->disableOriginalConstructor()->getMock();
		$this->input = $this->getMockBuilder('Symfony\Component\Console\Input\InputInterface')
			->disableOriginalConstructor()->getMock();

		$this->enableUserKey = new SelectEncryptionType($this->util, $this->config, $this->questionHelper);
	}

	/**
	 * @dataProvider dataTestExecute
	 *
	 * @param bool $isAlreadyEnabled
	 * @param string $answer
	 */
	public function testExecute($isAlreadyEnabled, $answer) {
		$userSpecificVal = $isAlreadyEnabled ? 1 : '';

		$this->config->expects($this->at(0))
			->method('getAppValue')
			->with('core', 'encryption_enabled', 'no')
			->willReturn("yes");

		$this->config->expects($this->at(1))
			->method('getAppValue')
			->with('encryption', 'userSpecificKey', '')
			->willReturn($userSpecificVal);

		$this->util->expects($this->once())->method('isMasterKeyEnabled')
			->willReturn(false);

		if ($isAlreadyEnabled) {
			$this->output->expects($this->once())->method('writeln')
				->with('User keys already enabled');
		} else {
			if ($answer === 'y') {
				$this->input->expects($this->once())->method('getOption')
					->with('yes')
					->willReturn(true);

				$this->config->expects($this->once())->method('setAppValue')
					->with('encryption', 'userSpecificKey', '1');
			} else {
				$this->input->expects($this->once())->method('getOption')
					->with('yes')
					->willReturn(false);

				$this->questionHelper->expects($this->once())->method('ask')->willReturn(false);
				$this->config->expects($this->never())->method('setAppValue');
			}
		}

		$this->input->expects($this->once())->method('getArgument')
			->with('encryption-type')
			->willReturn("user-keys");

		$this->invokePrivate($this->enableUserKey, 'execute', [$this->input, $this->output]);
	}

	public function dataTestExecute() {
		return [
			[true, ''],
			[false, 'y'],
			[false, 'n'],
			[false, '']
		];
	}
}
