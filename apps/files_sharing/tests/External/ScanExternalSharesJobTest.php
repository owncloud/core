<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OCA\Files_Sharing\Tests\External;

use OC\Files\Cache\Propagator;
use OC\Files\Cache\Scanner;
use OC\User\NoUserException;
use OCA\Files_Sharing\External\Manager;
use OCA\Files_Sharing\External\Mount;
use OCA\Files_Sharing\External\ScanExternalSharesJob;
use OCA\Files_Sharing\External\Storage;
use OCP\Files\StorageNotAvailableException;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use Test\TestCase;

/**
 * Class ScanFilesTest
 *
 * @group DB
 *
 * @package OCA\Files_Sharing\Tests\External
 */
class ScanExternalSharesJobTest extends TestCase {

	/** @var Manager */
	private $externalManager;

	/** @var IUserManager */
	private $userManager;

	/** @var IDBConnection */
	private $connection;

	/** @var IConfig */
	private $config;

	protected function setUp(): void {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->config = \OC::$server->getConfig();
		$this->userManager = $this->createMock(IUserManager::class);
		$this->externalManager = $this->createMock(Manager::class);

		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_enabled', 'yes');
		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_min_login', ScanExternalSharesJob::DEFAULT_MIN_LAST_SCAN);
		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_min_scan', ScanExternalSharesJob::DEFAULT_MIN_LOGIN);
		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_batch', ScanExternalSharesJob::DEFAULT_SHARES_PER_SESSION);
		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_offset', 0);

		$shareExternalQuery = $this->connection->getQueryBuilder();
		$shareExternalQuery->insert('share_external')
			->setValue('share_token', '?')
			->setValue('remote', '?')
			->setValue('name', '?')->setParameter(2, 'irrelevant')
			->setValue('owner', '?')->setParameter(3, 'irrelevant')
			->setValue('user', '?')
			->setValue('mountpoint', '?')->setParameter(5, 'irrelevant')
			->setValue('mountpoint_hash', '?')->setParameter(6, 'irrelevant')
			->setValue('accepted', '?')->setParameter(7, '1');
		for ($i = 0; $i < 21; $i++) {
			$shareExternalQuery
				->setParameter(0, "f2c69dad1dc0649f26976fd210fc62e$i")
				->setParameter(1, "https://hostname.tld/owncloud$i")
				->setParameter(4, "user$i");
			$shareExternalQuery->execute();
		}
	}

	public function tearDown(): void {
		$this->config->deleteAppValue('files_sharing', 'cronjob_scan_external_enabled');
		$this->config->deleteAppValue('files_sharing', 'cronjob_scan_external_min_login');
		$this->config->deleteAppValue('files_sharing', 'cronjob_scan_external_min_scan');
		$this->config->deleteAppValue('files_sharing', 'cronjob_scan_external_batch');
		$this->config->deleteAppValue('files_sharing', 'cronjob_scan_external_offset');

		$shareExternalQuery = $this->connection->getQueryBuilder();
		$shareExternalQuery->delete('share_external')
			->where($shareExternalQuery->expr()->eq('share_token', $shareExternalQuery->createParameter('share_token')));

		for ($i = 0; $i < 21; $i++) {
			$shareExternalQuery->setParameter('share_token', "f2c69dad1dc0649f26976fd210fc62e$i");
			$shareExternalQuery->execute();
		}

		parent::tearDown();
	}

	public function testFixDI() {
		$exceptionThrown = false;
		try {
			$scanFiles = new ScanExternalSharesJob();
		} catch (\Exception $e) {
			$exceptionThrown = true;
		}
		$this->assertFalse($exceptionThrown);
	}

	public function testNotEnabled() {
		$scanShares = $this->getScanSharesMockForRun();
		$scanShares->expects($this->never())
			->method('scan');

		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_enabled', 'no');
		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_offset', 10);
		$this->invokePrivate($scanShares, 'run', [[]]);
	}

	public function providesRunHandlesOffset() {
		return [
			// when scanned shares, it should go only through max per session and set proper offset to continue
			[true, 2, 2, 2],
			[true, 9, 9, 9],
			// when not scanned any shares, it should go through all external shares
			[false, 2, 21, 0],
			[false, 9, 21, 0],
			[false, 11, 21, 0],
			// when scanned shares, and max per session over self::BATCH=10
			// it should go for next 10, but not reach all 21 shares (should reach 20)
			[true, 11, 20, 20],
			// test for even max per session
			[true, 100, 21, 0],
			// test for even max per session
			[false, 100, 21, 0],
		];
	}

	/**
	 * @dataProvider providesRunHandlesOffset
	 */
	public function testRunHandlesOffset($scanShareReturn, $scanShareMaxPerSession, $scanShareExpectedRuns, $expectedOffset) {
		$scanShares = $this->getScanSharesMockForRun();
		$scanShares->expects($this->exactly($scanShareExpectedRuns))
			->method('shouldScan')
			->willReturn($scanShareReturn);

		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_batch', $scanShareMaxPerSession);

		$this->assertEquals(0, $this->config->getAppValue('files_sharing', 'cronjob_scan_external_offset', -1));
		$this->invokePrivate($scanShares, 'run', [[]]);
		$this->assertEquals($expectedOffset, $this->config->getAppValue('files_sharing', 'cronjob_scan_external_offset', -1));
	}

	public function testRunContinuesFromOffset() {
		$scanShares = $this->getScanSharesMockForRun();
		$scanShares->expects($this->exactly(2))
			->method('shouldScan')
			->willReturn(true);

		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_batch', 2);
		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_offset', 10);

		$this->assertEquals(10, $this->config->getAppValue('files_sharing', 'cronjob_scan_external_offset', -1));
		$this->invokePrivate($scanShares, 'run', [[]]);
		$this->assertEquals(12, $this->config->getAppValue('files_sharing', 'cronjob_scan_external_offset', -1));
	}

	public function testRunUpdatesLastTime() {
		$scanShares = $this->getScanSharesMockForRun();
		$scanShares->expects($this->exactly(2))
			->method('shouldScan')
			->willReturn(true);

		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_batch', 2);
		$this->config->setAppValue('files_sharing', 'cronjob_scan_external_offset', 0);

		$qb = $this->connection->getQueryBuilder();
		$qb->select('lastscan')
			->from('share_external')
			->where($qb->expr()->eq('remote', $qb->expr()->literal('https://hostname.tld/owncloud1')));

		$res = $qb->execute()->fetchAll();
		$this->assertNull($res[0]['lastscan']);

		$this->invokePrivate($scanShares, 'run', [[]]);

		$res = $qb->execute()->fetchAll();
		$this->assertNotNull($res[0]['lastscan']);
	}

	public function testScanShareNoUser() {
		$scanShares = $this->getScanSharesMockFoScan();

		$this->userManager->expects($this->exactly(1))
			->method('get')
			->willReturn(null);

		$share = [
			'share_token' => 'test',
			'user' => 'test',
			'remote' => 'test',
			'token'	=> 'test',
			'password' => 'test',
			'mountpoint' => 'test',
			'owner'	=> 'test'
		];
		$lastLoginThreshold = '1';
		$lastScanThreshold = '1';
		$result = $this->invokePrivate($scanShares, 'shouldScan', [$share, $lastLoginThreshold, $lastScanThreshold]);

		$this->assertEquals(false, $result);
	}

	public function testScanShareInvalidLastLogin() {
		$scanShares = $this->getScanSharesMockFoScan();

		$user = $this->createMock(IUser::class);
		$user->expects($this->exactly(1))
			->method('getLastLogin')
			->willReturn(\time() - 2);

		$this->userManager->expects($this->exactly(1))
			->method('get')
			->willReturn($user);

		$share = [
			'share_token' => 'test',
			'user' => 'test',
			'remote' => 'test',
			'token'	=> 'test',
			'password' => 'test',
			'mountpoint' => 'test',
			'owner'	=> 'test'
		];
		$lastLoginThreshold = '1';
		$lastScanThreshold = '1';
		$result = $this->invokePrivate($scanShares, 'shouldScan', [$share, $lastLoginThreshold, $lastScanThreshold]);

		$this->assertEquals(false, $result);
	}

	public function testScanShareInvalidLastScan() {
		$scanShares = $this->getScanSharesMockFoScan();

		$user = $this->createMock(IUser::class);
		$user->expects($this->exactly(1))
			->method('getLastLogin')
			->willReturn(\time());

		$this->userManager->expects($this->exactly(1))
			->method('get')
			->willReturn($user);

		$share = [
			'share_token' => 'test',
			'user' => 'test',
			'remote' => 'test',
			'token'	=> 'test',
			'password' => 'test',
			'mountpoint' => 'test',
			'lastscan' => \time(),
			'owner'	=> 'test'
		];
		$lastLoginThreshold = '1';
		$lastScanThreshold = '2';
		$result = $this->invokePrivate($scanShares, 'shouldScan', [$share, $lastLoginThreshold, $lastScanThreshold]);

		$this->assertEquals(false, $result);
	}

	public function testScanShareNotUpdated() {
		$scanShares = $this->getScanSharesMockFoScan();

		$storage = $this->createMock(Storage::class);
		$mount = $this->createMock(Mount::class);

		$this->externalManager->expects($this->exactly(1))
			->method('getMount')
			->willReturn($mount);

		$mount->expects($this->exactly(1))
			->method('getStorage')
			->willReturn($storage);

		$mount->expects($this->exactly(1))
			->method('getStorage')
			->willReturn($storage);

		$storage->expects($this->exactly(1))
			->method('hasUpdated')
			->willReturn(false);

		$storage->expects($this->never())
			->method('getScanner');

		$share = [
			'share_token' => 'test',
			'user' => 'test',
			'remote' => 'test',
			'token'	=> 'test',
			'password' => 'test',
			'mountpoint' => 'test',
			'lastscan' => null,
			'owner'	=> 'test'
		];
		$lastLoginThreshold = 1;
		$lastScanThreshold = 1;
		$result = $this->invokePrivate($scanShares, 'scan', [$share, $lastLoginThreshold, $lastScanThreshold]);

		$this->assertEquals(false, $result);
	}

	public function providesScanShareExceptions() {
		$scanner = $this->createMock(Scanner::class);
		$propagator = $this->createMock(Propagator::class);
		$storage = $this->createMock(Storage::class);
		$storage->expects($this->exactly(1))
			->method('hasUpdated')
			->willReturn(true);
		$storage->expects($this->exactly(1))
			->method('getPropagator')
			->willReturn($propagator);
		$storage->expects($this->exactly(1))
			->method('getScanner')
			->willReturn($scanner);
		$scanner->expects($this->exactly(1))
			->method('scan')
			->willReturn(true);
		$tests[] = [$storage];

		$scanner = $this->createMock(Scanner::class);
		$propagator = $this->createMock(Propagator::class);
		$storage = $this->createMock(Storage::class);
		$storage->expects($this->exactly(1))
			->method('hasUpdated')
			->willReturn(true);
		$storage->expects($this->exactly(1))
			->method('getPropagator')
			->willReturn($propagator);
		$storage->expects($this->exactly(1))
			->method('getScanner')
			->willReturn($scanner);
		$scanner->expects($this->exactly(1))
			->method('scan')
			->willReturn(true);
		$scanner->method('scan')->willThrowException(new \Exception());
		$tests[] = [$storage];

		$scanner = $this->createMock(Scanner::class);
		$propagator = $this->createMock(Propagator::class);
		$storage = $this->createMock(Storage::class);
		$storage->expects($this->exactly(1))
			->method('hasUpdated')
			->willReturn(true);
		$storage->expects($this->exactly(1))
			->method('getPropagator')
			->willReturn($propagator);
		$storage->expects($this->exactly(1))
			->method('getScanner')
			->willReturn($scanner);
		$scanner->expects($this->exactly(1))
			->method('scan')
			->willReturn(true);
		$scanner->method('scan')->willThrowException(new NoUserException());
		$tests[] = [$storage];

		$scanner = $this->createMock(Scanner::class);
		$propagator = $this->createMock(Propagator::class);
		$storage = $this->createMock(Storage::class);
		$storage->expects($this->exactly(1))
			->method('hasUpdated')
			->willReturn(true);
		$storage->expects($this->exactly(1))
			->method('getPropagator')
			->willReturn($propagator);
		$storage->expects($this->exactly(1))
			->method('getScanner')
			->willReturn($scanner);
		$scanner->expects($this->exactly(1))
			->method('scan')
			->willReturn(true);
		$scanner->method('scan')->willThrowException(new StorageNotAvailableException());
		$tests[] = [$storage];
		return $tests;
	}

	/**
	 * @dataProvider providesScanShareExceptions
	 */
	public function testScanShareExceptions($storage) {
		$scanShares = $this->getScanSharesMockFoScan();

		$mount = $this->createMock(Mount::class);

		$this->externalManager->expects($this->exactly(1))
			->method('getMount')
			->willReturn($mount);

		$mount->expects($this->exactly(1))
			->method('getStorage')
			->willReturn($storage);

		$share = [
			'share_token' => 'test',
			'user' => 'test',
			'remote' => 'test',
			'token'	=> 'test',
			'password' => 'test',
			'mountpoint' => 'test',
			'lastscan' => null,
			'owner'	=> 'test'
		];
		$lastLoginThreshold = 1;
		$lastScanThreshold = 1;
		$result = $this->invokePrivate($scanShares, 'scan', [$share, $lastLoginThreshold, $lastScanThreshold]);

		$this->assertEquals(true, $result);
	}

	private function getScanSharesMockFoScan() {
		return $this->getMockBuilder(ScanExternalSharesJob::class)
			->setConstructorArgs([
				$this->connection,
				$this->config,
				$this->userManager,
				$this->createMock(ILogger::class),
				$this->externalManager,
			])
			->setMethods([])
			->getMock();
	}

	private function getScanSharesMockForRun() {
		return $this->getMockBuilder(ScanExternalSharesJob::class)
			->setConstructorArgs([
				$this->connection,
				$this->config,
				$this->userManager,
				$this->createMock(ILogger::class),
				$this->externalManager,
			])
			->setMethods(['shouldScan', 'scan'])
			->getMock();
	}
}
