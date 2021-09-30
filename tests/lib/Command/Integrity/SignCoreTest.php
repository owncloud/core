<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
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
namespace Test\Command\Integrity;

use OC\Core\Command\Integrity\SignCore;
use OC\IntegrityCheck\Checker;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use Test\TestCase;

class SignCoreTest extends TestCase {
	/** @var Checker */
	private $checker;
	/** @var SignCore */
	private $signCore;
	/** @var FileAccessHelper */
	private $fileAccessHelper;

	public function setUp(): void {
		parent::setUp();
		$this->checker = $this->getMockBuilder('\OC\IntegrityCheck\Checker')
			->disableOriginalConstructor()->getMock();
		$this->fileAccessHelper = $this->getMockBuilder('\OC\IntegrityCheck\Helpers\FileAccessHelper')
			->disableOriginalConstructor()->getMock();
		$this->signCore = new SignCore(
			$this->checker,
			$this->fileAccessHelper
		);
	}

	public function testExecuteWithMissingPrivateKey() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['privateKey'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				null,
				'Certificate',
			);

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with('--privateKey, --certificate and --path are required.');

		$this->invokePrivate($this->signCore, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteWithMissingCertificate() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['privateKey'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				'privateKey',
				null,
			);

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with('--privateKey, --certificate and --path are required.');

		$this->invokePrivate($this->signCore, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteWithNotExistingPrivateKey() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['privateKey'],
				['certificate'],
				['path'],
			)
			->willReturnOnConsecutiveCalls(
				'privateKey',
				\OC::$SERVERROOT . '/tests/data/integritycheck/core.crt',
				'path',
			);

		$this->fileAccessHelper
			->expects($this->exactly(2))
			->method('file_get_contents')
			->withConsecutive(
				['privateKey'],
				[\OC::$SERVERROOT . '/tests/data/integritycheck/core.crt'],
			)
			->willReturnOnConsecutiveCalls(
				false,
				\file_get_contents(\OC::$SERVERROOT . '/tests/data/integritycheck/core.crt'),
			);

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with('Private key "privateKey" does not exists.');

		$this->invokePrivate($this->signCore, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteWithNotExistingCertificate() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['privateKey'],
				['certificate'],
				['path'],
			)
			->willReturnOnConsecutiveCalls(
				\OC::$SERVERROOT . '/tests/data/integritycheck/core.key',
				'certificate',
				'path',
			);

		$this->fileAccessHelper
			->expects($this->exactly(2))
			->method('file_get_contents')
			->withConsecutive(
				[\OC::$SERVERROOT . '/tests/data/integritycheck/core.key'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				\file_get_contents(\OC::$SERVERROOT . '/tests/data/integritycheck/core.key'),
				false,
			);

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with('Certificate "certificate" does not exists.');

		$this->invokePrivate($this->signCore, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecute() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['privateKey'],
				['certificate'],
				['path'],
			)
			->willReturnOnConsecutiveCalls(
				\OC::$SERVERROOT . '/tests/data/integritycheck/core.key',
				\OC::$SERVERROOT . '/tests/data/integritycheck/core.crt',
				'path',
			);

		$this->fileAccessHelper
			->expects($this->exactly(2))
			->method('file_get_contents')
			->withConsecutive(
				[\OC::$SERVERROOT . '/tests/data/integritycheck/core.key'],
				[\OC::$SERVERROOT . '/tests/data/integritycheck/core.crt'],
			)
			->willReturnOnConsecutiveCalls(
				\file_get_contents(\OC::$SERVERROOT . '/tests/data/integritycheck/core.key'),
				\file_get_contents(\OC::$SERVERROOT . '/tests/data/integritycheck/core.crt'),
			);

		$this->checker
			->expects($this->once())
			->method('writeCoreSignature');

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with('Successfully signed "core"');

		$this->invokePrivate($this->signCore, 'execute', [$inputInterface, $outputInterface]);
	}
}
