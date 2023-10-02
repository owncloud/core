<?php
/**
 * Copyright (c) 2014 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OCP\IConfig;
use bantu\IniGetWrapper\IniGetWrapper;
use OCP\IL10N;
use OCP\ILogger;
use OCP\Security\ISecureRandom;
use OC\Setup;

class SetupTest extends \Test\TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	protected $config;
	/** @var \bantu\IniGetWrapper\IniGetWrapper | \PHPUnit\Framework\MockObject\MockObject */
	private $iniWrapper;
	/** @var \OCP\IL10N | \PHPUnit\Framework\MockObject\MockObject */
	private $l10n;
	/** @var \OC_Defaults | \PHPUnit\Framework\MockObject\MockObject */
	private $defaults;
	/** @var \OC\Setup | \PHPUnit\Framework\MockObject\MockObject */
	protected $setupClass;
	/** @var \OCP\ILogger | \PHPUnit\Framework\MockObject\MockObject */
	protected $logger;
	/** @var \OCP\Security\ISecureRandom | \PHPUnit\Framework\MockObject\MockObject */
	protected $random;

	protected function setUp(): void {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->iniWrapper = $this->createMock(IniGetWrapper::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->defaults = $this->createMock(\OC_Defaults::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->random = $this->createMock(ISecureRandom::class);
		$this->setupClass = $this->getMockBuilder(Setup::class)
			->setMethods(['IsClassExisting', 'is_callable', 'getAvailableDbDriversForPdo'])
			->setConstructorArgs([$this->config, $this->iniWrapper, $this->l10n, $this->defaults, $this->logger, $this->random])
			->getMock();
	}

	public function testGetSupportedDatabasesWithOneWorking(): void {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->willReturn(['sqlite', 'mysql', 'oci']);
		$this->setupClass
			->expects($this->once())
			->method('IsClassExisting')
			->willReturn(true);
		$this->setupClass
			->expects($this->once())
			->method('is_callable')
			->willReturn(false);
		$this->setupClass
			->expects($this->once())
			->method('getAvailableDbDriversForPdo')
			->willReturn([]);
		$result = $this->setupClass->getSupportedDatabases();
		$expectedResult = [
			'sqlite' => 'SQLite'
		];

		$this->assertSame($expectedResult, $result);
	}

	public function testGetSupportedDatabasesWithNoWorking(): void {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->willReturn(['sqlite', 'mysql', 'oci', 'pgsql']);
		$this->setupClass
			->expects($this->once())
			->method('IsClassExisting')
			->willReturn(false);
		$this->setupClass
			->expects($this->exactly(2))
			->method('is_callable')
			->willReturn(false);
		$this->setupClass
			->expects($this->once())
			->method('getAvailableDbDriversForPdo')
			->willReturn([]);
		$result = $this->setupClass->getSupportedDatabases();

		$this->assertSame([], $result);
	}

	public function testGetSupportedDatabasesWithAllWorking(): void {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->willReturn(['sqlite', 'mysql', 'pgsql', 'oci']);
		$this->setupClass
			->expects($this->once())
			->method('IsClassExisting')
			->willReturn(true);
		$this->setupClass
			->expects($this->exactly(2))
			->method('is_callable')
			->willReturn(true);
		$this->setupClass
			->expects($this->once())
			->method('getAvailableDbDriversForPdo')
			->willReturn(['mysql']);
		$result = $this->setupClass->getSupportedDatabases();
		$expectedResult = [
			'sqlite' => 'SQLite',
			'mysql' => 'MySQL/MariaDB',
			'pgsql' => 'PostgreSQL',
			'oci' => 'Oracle'
		];
		$this->assertSame($expectedResult, $result);
	}

	public function testGetSupportedDatabaseException(): void {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Supported databases are not properly configured.');

		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->willReturn('NotAnArray');
		$this->setupClass->getSupportedDatabases();
	}

	/**
	 */
	public function testCannotUpdateHtaccess(): void {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Can\'t update');

		if ($this->getCurrentUser() === 'root') {
			$this->markTestSkipped(
				'You are running tests as root - this test will not work in this case.'
			);
		}
		$origServerRoot = \OC::$SERVERROOT;
		$htaccessFile = \OC::$SERVERROOT . '/tests/data/.htaccess';
		\touch($htaccessFile);
		\chmod($htaccessFile, 0400);
		\OC::$SERVERROOT = \OC::$SERVERROOT . '/tests/data';
		try {
			$this->setupClass->updateHtaccess();
		} catch (\Exception $e) {
			throw $e;
		} finally {
			\OC::$SERVERROOT = $origServerRoot;
			@\unlink($htaccessFile);
		}
	}

	/**
	 */
	public function testHtaccessIsFolder(): void {
		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Can\'t update');

		$origServerRoot = \OC::$SERVERROOT;
		$htaccessFile = \OC::$SERVERROOT . '/tests/data/.htaccess';
		@\unlink($htaccessFile);
		@\mkdir($htaccessFile);
		
		\OC::$SERVERROOT = \OC::$SERVERROOT . '/tests/data';
		try {
			$this->setupClass->updateHtaccess();
		} catch (\Exception $e) {
			throw $e;
		} finally {
			\OC::$SERVERROOT = $origServerRoot;
			@\rmdir($htaccessFile);
		}
	}

	public function testUpdateHtaccess(): void {
		$origServerRoot = \OC::$SERVERROOT;
		$htaccessFile = \OC::$SERVERROOT . '/tests/data/.htaccess';
		\touch($htaccessFile);
		\chmod($htaccessFile, 0700);
		\OC::$SERVERROOT = \OC::$SERVERROOT . '/tests/data';
		try {
			$this->setupClass->updateHtaccess();
		} catch (\Exception $e) {
			throw $e;
		} finally {
			\OC::$SERVERROOT = $origServerRoot;
		}
		$content = \file_get_contents($htaccessFile);
		@\unlink($htaccessFile);
		$this->assertStringContainsString(
			'#### DO NOT CHANGE ANYTHING ABOVE THIS LINE ####',
			$content
		);
	}
}
