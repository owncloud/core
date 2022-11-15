<?php
/**
 * @author Phil Davis <phil@jankaritech.com>
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

namespace Tests\Core\Command\Security;

use OC\Core\Command\Security\ImportCertificate;
use OC\Files\View;
use OC\Security\CertificateManager;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class ImportCertificateTest
 *
 * @group DB
 */
class ImportCertificateTest extends TestCase {
	/** @var CommandTester */
	private $commandTester;

	/** @var CertificateManager */
	private $certificateManager;

	protected function setUp(): void {
		parent::setUp();

		$this->certificateManager = new CertificateManager(
			$this->getUniqueID('', 20),
			new View(),
			$this->createMock('OCP\IConfig')
		);
		$command = new ImportCertificate(
			$this->certificateManager
		);
		$command->setApplication(new Application());
		$this->commandTester = new CommandTester($command);
	}

	/**
	 * @dataProvider inputProvider
	 * @param array $input
	 * @param array $answers
	 * @param int $expectedStatus
	 * @param string $expectedOutput
	 */
	public function testCommandInput($input, $answers, $expectedStatus, $expectedOutput) {
		$this->commandTester->setInputs($answers);
		$actualStatus = $this->commandTester->execute($input);
		$this->assertEquals($expectedStatus, $actualStatus);
		$output = $this->commandTester->getDisplay();
		$this->assertStringContainsString($expectedOutput, $output);
	}

	public function inputProvider() {
		return [
			[['path' => 'doesNotExist.crt'], [], 1, 'certificate not found'],
			[['path' => 'data/certificates/goodCertificate.crt'], [], 0, ''],
		];
	}
}
