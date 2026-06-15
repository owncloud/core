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

use Doctrine\DBAL\Result;
use OC\Core\Command\Encryption\Disable;
use OC\DB\QueryBuilder\ExpressionBuilder\ExpressionBuilder;
use OC\DB\QueryBuilder\QueryBuilder;
use OCP\IConfig;
use OCP\IDBConnection;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;

class DisableTest extends TestCase {
	/** @var MockObject */
	protected $db;
	/** @var MockObject */
	protected $config;
	/** @var MockObject */
	protected $consoleInput;
	/** @var MockObject */
	protected $consoleOutput;

	/** @var \Symfony\Component\Console\Command\Command */
	protected $command;

	protected function setUp(): void {
		parent::setUp();

		$this->db = $this->createMock(IDBConnection::class);
		$this->config = $this->createMock(IConfig::class);
		$this->consoleInput = $this->createMock(InputInterface::class);
		$this->consoleOutput = $this->createMock(OutputInterface::class);

		/** @var IConfig $config */
		$this->command = new Disable($this->db, $this->config);
	}

	public function dataDisable() {
		return [
			['yes', true, '1', [], 'Encryption disabled'],
			['yes', true, '', [], 'Encryption disabled'],
			['no', false, false, [], 'Encryption is already disabled'],
			['yes', true, '1', ['files_versions/foo.txt'], 'Encryption disabled'],
			['yes', true, '', ['files_trashbin/files/bar.txt.d123'], 'Encryption disabled'],
			['no', false, false, ['files/baz.txt'], 'Encryption is already disabled'],
		];
	}

	/**
	 * @dataProvider dataDisable
	 *
	 * @param string $oldStatus
	 * @param bool $isUpdating
	 * @param bool $masterKeyEnabled
	 * @param string[] $encryptedPaths paths still flagged as encrypted in the file cache
	 * @param string $expectedString
	 */
	public function testDisable($oldStatus, $isUpdating, $masterKeyEnabled, $encryptedPaths, $expectedString) {
		$stmt = $this->createMock(Result::class);
		$stmt->method('fetchFirstColumn')
			->willReturn($encryptedPaths);
		$qbExpr = $this->createMock(ExpressionBuilder::class);
		$qbMock = $this->createMock(QueryBuilder::class);
		$qbMock->method('expr')
			->willReturn($qbExpr);
		$qbMock->method('select')
			->willReturnSelf();
		$qbMock->method('from')
			->willReturnSelf();
		$qbMock->method('where')
			->willReturnSelf();
		$qbMock->method('setMaxResults')
			->willReturnSelf();
		$qbMock->method('execute')
			->willReturn($stmt);
		$this->db->method('getQueryBuilder')
			->willReturn($qbMock);

		if (\count($encryptedPaths) === 0) {
			$this->config->expects($this->exactly(1))
				->method('getAppValue')
				->willReturnMap(
					[
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
					->willReturnMap(
						[
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
			$expectedExitCode = 0;
		} else {
			$writtenLines = [];
			$this->consoleOutput->expects($this->atLeastOnce())
				->method('writeln')
				->willReturnCallback(function ($line) use (&$writtenLines) {
					$writtenLines[] = $line;
				});
			$expectedExitCode = 1;
		}

		$exitCode = self::invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
		$this->assertEquals($expectedExitCode, $exitCode);

		if (\count($encryptedPaths) > 0) {
			$output = \implode("\n", $writtenLines);
			$this->assertStringContainsString('The system still has encrypted files.', $output);
			foreach ($encryptedPaths as $path) {
				$this->assertStringContainsString($path, $output);
			}
		}
	}
}
