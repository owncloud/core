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

use OC\Core\Command\Integrity\SignApp;
use OC\IntegrityCheck\Checker;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OCP\IURLGenerator;
use Test\TestCase;

class SignAppTest extends TestCase {
	/** @var Checker */
	private $checker;
	/** @var SignApp */
	private $signApp;
	/** @var FileAccessHelper */
	private $fileAccessHelper;
	/** @var IURLGenerator */
	private $urlGenerator;

	public function setUp(): void {
		parent::setUp();
		$this->checker = $this->getMockBuilder('\OC\IntegrityCheck\Checker')
			->disableOriginalConstructor()->getMock();
		$this->fileAccessHelper = $this->getMockBuilder('\OC\IntegrityCheck\Helpers\FileAccessHelper')
			->disableOriginalConstructor()->getMock();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
				->disableOriginalConstructor()->getMock();
		$this->signApp = new SignApp(
			$this->checker,
			$this->fileAccessHelper,
			$this->urlGenerator
		);
	}

	public function testExecuteWithMissingPath() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['path'],
				['privateKey'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				null,
				'PrivateKey',
				'Certificate',
			);

		$outputInterface
			->expects($this->exactly(3))
			->method('writeln')
			->withConsecutive(
				['This command requires the --path, --privateKey and --certificate.']
			);

		self::invokePrivate($this->signApp, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteWithMissingPrivateKey() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['path'],
				['privateKey'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				'AppId',
				null,
				'Certificate',
			);

		$outputInterface
			->expects($this->exactly(3))
			->method('writeln')
			->withConsecutive(
				['This command requires the --path, --privateKey and --certificate.']
			);

		self::invokePrivate($this->signApp, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteWithMissingCertificate() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['path'],
				['privateKey'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				'AppId',
				'privateKey',
				null,
			);

		$outputInterface
			->expects($this->exactly(3))
			->method('writeln')
			->withConsecutive(
				['This command requires the --path, --privateKey and --certificate.']
			);

		self::invokePrivate($this->signApp, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteWithNotExistingPrivateKey() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['path'],
				['privateKey'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				'AppId',
				'privateKey',
				\OC::$SERVERROOT . '/tests/data/integritycheck/core.crt',
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
			->with('Private key "privateKey" does not exist.');

		self::invokePrivate($this->signApp, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecuteWithNotExistingCertificate() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['path'],
				['privateKey'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				'AppId',
				\OC::$SERVERROOT . '/tests/data/integritycheck/core.key',
				'certificate',
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
			->with('Certificate "certificate" does not exist.');

		self::invokePrivate($this->signApp, 'execute', [$inputInterface, $outputInterface]);
	}

	public function testExecute() {
		$inputInterface = $this->createMock('\Symfony\Component\Console\Input\InputInterface');
		$outputInterface = $this->createMock('\Symfony\Component\Console\Output\OutputInterface');

		$inputInterface
			->method('getOption')
			->withConsecutive(
				['path'],
				['privateKey'],
				['certificate'],
			)
			->willReturnOnConsecutiveCalls(
				'AppId',
				\OC::$SERVERROOT . '/tests/data/integritycheck/core.key',
				\OC::$SERVERROOT . '/tests/data/integritycheck/core.crt',
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
			->method('writeAppSignature');

		$outputInterface
			->expects($this->once())
			->method('writeln')
			->with('Successfully signed "AppId"');

		self::invokePrivate($this->signApp, 'execute', [$inputInterface, $outputInterface]);
	}
}
