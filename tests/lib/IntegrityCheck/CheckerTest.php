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

namespace Test\IntegrityCheck;

use OC\IntegrityCheck\Checker;
use OC\IntegrityCheck\Helpers\AppLocator;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Verifier\Verifier;
use OC\IntegrityCheck\Verifier\VerificationResult;
use OC\Memcache\NullCache;
use OC\Memcache\Redis;
use OCP\App\IAppManager;
use OCP\ICacheFactory;
use OCP\IConfig;
use Test\TestCase;

/**
 * Test for integrity checker.
 */
class CheckerTest extends TestCase {
	/** @var EnvironmentHelper | \PHPUnit\Framework\MockObject\MockObject */
	private $environmentHelper;
	/** @var AppLocator | \PHPUnit\Framework\MockObject\MockObject */
	private $appLocator;
	/** @var Checker */
	private $checker;
	/** @var FileAccessHelper | \PHPUnit\Framework\MockObject\MockObject */
	private $fileAccessHelper;
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var ICacheFactory | \PHPUnit\Framework\MockObject\MockObject */
	private $cacheFactory;
	/** @var IAppManager | \PHPUnit\Framework\MockObject\MockObject */
	private $appManager;
	/** @var Verifier | \PHPUnit\Framework\MockObject\MockObject */
	private $verifier;

	public function setUp(): void {
		parent::setUp();
		$this->environmentHelper = $this->createMock(EnvironmentHelper::class);
		$this->fileAccessHelper = $this->createMock(FileAccessHelper::class);
		$this->appLocator = $this->createMock(AppLocator::class);
		$this->config = $this->createMock(IConfig::class);
		$this->cacheFactory = $this->createMock(ICacheFactory::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->verifier = $this->createMock(Verifier::class);

		// Stub config with defaults (tests can add expects to override)
		$this->config
			->method('getSystemValue')
			->willReturnCallback(function ($key, $default = false) {
				$defaults = [
					'integrity.check.disabled' => false,
					'integrity.excluded.files' => [],
					'integrity.ignore.missing.app.signature' => [],
				];
				return $defaults[$key] ?? $default;
			});

		// Stub appLocator to return paths by default (can be overridden per-test)
		$this->appLocator
			->method('getAppPath')
			->willReturnCallback(function ($appId) {
				return '/path/to/' . $appId;
			});
		$this->appLocator
			->method('getAllApps')
			->willReturn([]);

		$this->cacheFactory
			->expects($this->any())
			->method('create')
			->with('oc.integritycheck.checker')
			->willReturn(new NullCache());

		$this->checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$this->config,
			$this->cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager(),
			$this->verifier
		);
	}

	public function testIgnoredAppSignatureWithoutSignatureData() {
		$this->environmentHelper
			->expects($this->once())
			->method('getChannel')
			->willReturn('stable');
		$configMap = [
			['integrity.check.disabled', false, false],
			['integrity.ignore.missing.app.signature', [], ['SomeApp']]
		];
		$this->config
			->expects($this->any())
			->method('getSystemValue')
			->willReturnMap($configMap);

		$expected = [];
		$this->assertSame($expected, $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyAppSignatureWithoutSignatureData() {
		$this->environmentHelper
				->expects($this->once())
				->method('getChannel')
				->willReturn('stable');
		$configMap = [
			['integrity.check.disabled', false, false],
			['integrity.ignore.missing.app.signature', [], []]
		];
		$this->config
			->expects($this->any())
			->method('getSystemValue')
			->willReturnMap($configMap);

		// Verifier throws MissingSignatureException - test verifyAppSignature wraps it
		$exception = new \OC\IntegrityCheck\Exceptions\MissingSignatureException('Signature data not found.');
		$this->verifier
			->expects($this->once())
			->method('verify')
			->willThrowException($exception);

		$expected = [
			'EXCEPTION' => [
					'class' => 'OC\IntegrityCheck\Exceptions\MissingSignatureException',
					'message' => 'Signature data not found.',
			],
			'REASON' => 'MISSING_SIGNATURE',
		];
		$this->assertSame($expected, $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyAppSignatureWithValidSignatureData() {
		// Test that verifier returning passed result maps to empty array
		$this->environmentHelper
				->expects($this->once())
				->method('getChannel')
				->willReturn('stable');
		$configMap = [
			['integrity.check.disabled', false, false],
			['integrity.excluded.files', [], []],
		];
		$this->config
			->expects($this->any())
			->method('getSystemValue')
			->willReturnMap($configMap);

		// appLocator default callback returns /path/to/SomeApp
		$this->verifier
			->expects($this->once())
			->method('verify')
			->with(
				'/path/to/SomeApp/appinfo/signature.json',
				'/path/to/SomeApp',
				'SomeApp',
				false,
				null,
				[]
			)
			->willReturn(VerificationResult::passed());

		$this->assertSame([], $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyAppSignatureWhenVerifierThrowsInvalidSignature() {
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->appLocator->expects($this->once())->method('getAppPath')
			->with('SomeApp')->willReturn('/path/to/app');

		$exception = new \OC\IntegrityCheck\Exceptions\InvalidSignatureException('Signature could not get verified.');
		$this->verifier->expects($this->once())->method('verify')
			->willThrowException($exception);

		$expected = [
			'EXCEPTION' => ['class' => 'OC\\IntegrityCheck\\Exceptions\\InvalidSignatureException', 'message' => 'Signature could not get verified.'],
		];
		$this->assertSame($expected, $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyAppSignatureWhenVerifierReturnsDiffFailure() {
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->appLocator->expects($this->once())->method('getAppPath')
			->with('SomeApp')->willReturn('/path/to/app');

		$diffFailure = [
			'INVALID_HASH' => ['file.txt' => ['expected' => 'hash1', 'current' => 'hash2']],
			'FILE_MISSING' => ['other.txt' => ['expected' => 'hash3', 'current' => '']],
		];
		$this->verifier->expects($this->once())->method('verify')->willReturn(
			VerificationResult::diffFailure($diffFailure)
		);

		$this->assertSame($diffFailure, $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyAppSignatureWithRenamedFiles() {
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->appLocator->expects($this->once())->method('getAppPath')
			->with('SomeApp')->willReturn('/path/to/app');

		$diffFailure = [
			'FILE_MISSING' => ['AnotherFileOrigin.txt' => ['expected' => 'hash1', 'current' => '']],
			'EXTRA_FILE' => ['AnotherFile.txt' => ['expected' => '', 'current' => 'hash1']],
		];
		$this->verifier->expects($this->once())->method('verify')->willReturn(
			VerificationResult::diffFailure($diffFailure)
		);

		$this->assertSame($diffFailure, $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyAppSignatureWithAlternatePath() {
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$altPath = '/custom/path';
		$this->appLocator->expects($this->never())->method('getAppPath');

		$this->verifier->expects($this->once())->method('verify')
			->with(
				'/custom/path/appinfo/signature.json',
				'/custom/path',
				'SomeApp',
				false,
				null,
				[]
			)->willReturn(VerificationResult::passed());

		$this->assertSame([], $this->checker->verifyAppSignature('SomeApp', $altPath));
	}

	public function testVerifyAppWithDifferentScope() {
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->appLocator->expects($this->once())->method('getAppPath')
			->with('SomeApp')->willReturn('/path/to/app');

		$exception = new \OC\IntegrityCheck\Exceptions\InvalidSignatureException('Certificate is not valid for required scope. (Requested: SomeApp, current: CN=AnotherScope)');
		$this->verifier->expects($this->once())->method('verify')->willThrowException($exception);

		$expected = [
			'EXCEPTION' => ['class' => 'OC\\IntegrityCheck\\Exceptions\\InvalidSignatureException', 'message' => 'Certificate is not valid for required scope. (Requested: SomeApp, current: CN=AnotherScope)'],
		];
		$this->assertSame($expected, $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyAppSignatureWithValidSignatureReturnsEmptyArray() {
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->appLocator->expects($this->once())->method('getAppPath')
			->with('SomeApp')->willReturn('/path/to/app');

		$this->verifier->expects($this->once())->method('verify')->willReturn(VerificationResult::passed());

		$this->assertSame([], $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyCoreSignatureWhenVerifierThrowsMissingSignature() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$exception = new \OC\IntegrityCheck\Exceptions\MissingSignatureException('Signature data not found.');
		$this->verifier->expects($this->once())->method('verify')->willThrowException($exception);

		$expected = [
			'EXCEPTION' => ['class' => 'OC\\IntegrityCheck\\Exceptions\\MissingSignatureException', 'message' => 'Signature data not found.'],
			'REASON' => 'MISSING_SIGNATURE',
		];
		$this->assertSame($expected, $this->checker->verifyCoreSignature());
	}

	public function testVerifyCoreSignatureWithValidSignatureData() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->verifier->expects($this->once())->method('verify')->willReturn(VerificationResult::passed());

		$this->assertSame([], $this->checker->verifyCoreSignature());
	}

	public function testVerifyCoreSignatureWithValidModifiedHtaccessAndUserIni() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->verifier->expects($this->once())->method('verify')->willReturn(VerificationResult::passed());

		$this->assertSame([], $this->checker->verifyCoreSignature());
	}

	public function testVerifyCoreSignatureWithValidSignatureDataAndNotAlphabeticOrder() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->verifier->expects($this->once())->method('verify')->willReturn(VerificationResult::passed());

		$this->assertSame([], $this->checker->verifyCoreSignature());
	}

	public function testVerifyCoreSignatureWhenVerifierThrowsInvalidSignature() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$exception = new \OC\IntegrityCheck\Exceptions\InvalidSignatureException('Signature could not get verified.');
		$this->verifier->expects($this->once())->method('verify')->willThrowException($exception);

		$expected = [
			'EXCEPTION' => ['class' => 'OC\\IntegrityCheck\\Exceptions\\InvalidSignatureException', 'message' => 'Signature could not get verified.'],
		];
		$this->assertSame($expected, $this->checker->verifyCoreSignature());
	}

	public function testVerifyCoreSignatureWhenVerifierReturnsDiffFailure() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$diffFailure = [
			'INVALID_HASH' => ['file.txt' => ['expected' => 'hash1', 'current' => 'hash2']],
			'FILE_MISSING' => ['other.txt' => ['expected' => 'hash3', 'current' => '']],
			'EXTRA_FILE' => ['extra.txt' => ['expected' => '', 'current' => 'hash4']],
		];
		$this->verifier->expects($this->once())->method('verify')->willReturn(
			VerificationResult::diffFailure($diffFailure)
		);

		$this->assertSame($diffFailure, $this->checker->verifyCoreSignature());
	}

	public function testVerifyCoreSignaturePassesExcludedFilesToVerifier() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		// Recreate checker with modified config mock to provide excluded files
		$config = $this->createMock(IConfig::class);
		$config->method('getSystemValue')
			->willReturnCallback(function ($key, $default = false) {
				$map = [
					'integrity.check.disabled' => false,
					'integrity.excluded.files' => ['AnotherFile.txt'],
					'integrity.ignore.missing.app.signature' => [],
				];
				return $map[$key] ?? $default;
			});
		$this->checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$config,
			$this->cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager(),
			$this->verifier
		);

		$this->verifier->expects($this->once())->method('verify')
			->with(
				$this->anything(),
				$this->anything(),
				'core',
				true,
				null,
				['AnotherFile.txt']
			)->willReturn(VerificationResult::passed());

		$this->assertSame([], $this->checker->verifyCoreSignature());
	}

	public function testVerifyCoreWithInvalidCertificate() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$exception = new \OC\IntegrityCheck\Exceptions\InvalidSignatureException('App Certificate is not valid.');
		$this->verifier->expects($this->once())->method('verify')->willThrowException($exception);

		$expected = [
			'EXCEPTION' => ['class' => 'OC\\IntegrityCheck\\Exceptions\\InvalidSignatureException', 'message' => 'App Certificate is not valid.'],
		];
		$this->assertSame($expected, $this->checker->verifyCoreSignature());
	}

	public function testVerifyCoreWithDifferentScope() {
		$this->environmentHelper->method('getServerRoot')->willReturn(\OC::$SERVERROOT);
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$exception = new \OC\IntegrityCheck\Exceptions\InvalidSignatureException('Certificate is not valid for required scope. (Requested: core, current: CN=SomeApp)');
		$this->verifier->expects($this->once())->method('verify')->willThrowException($exception);

		$expected = [
			'EXCEPTION' => ['class' => 'OC\\IntegrityCheck\\Exceptions\\InvalidSignatureException', 'message' => 'Certificate is not valid for required scope. (Requested: core, current: CN=SomeApp)'],
		];
		$this->assertSame($expected, $this->checker->verifyCoreSignature());
	}

	public function testRunInstanceVerification() {
		$this->checker = $this->getMockBuilder('\OC\IntegrityCheck\Checker')
			->setConstructorArgs([
				$this->environmentHelper,
				$this->fileAccessHelper,
				$this->appLocator,
				$this->config,
				$this->cacheFactory,
				$this->appManager,
				\OC::$server->getTempManager()
			])
			->setMethods([
				'verifyCoreSignature',
				'verifyAppSignature',
			])
			->getMock();

		$this->checker
			->method('verifyCoreSignature')
			->withConsecutive(
				[],
				['files'],
				['calendar'],
				['dav'],
			);
		$this->appLocator
			->method('getAllApps')
			->willReturn(
				['files', 'calendar', 'contacts', 'dav']
			);
		$this->appManager
			->method('isShipped')
			->withConsecutive(
				['files'],
				['calendar'],
				['contacts'],
				['dav'],
			)
			->willReturnOnConsecutiveCalls(
				true,
				false,
				false,
				true,
			);
		$this->appLocator
			->method('getAppPath')
			->withConsecutive(
				['calendar'],
				['contacts'],
			)
			->willReturnOnConsecutiveCalls(
				'/apps/calendar',
				'/apps/contacts',
			);
		$this->fileAccessHelper
			->method('file_exists')
			->withConsecutive(
				['/apps/calendar/appinfo/signature.json'],
				['/apps/contacts/appinfo/signature.json'],
			)
			->willReturnOnConsecutiveCalls(
				true,
				false,
			);
		$this->config
			->expects($this->once())
			->method('deleteAppValue')
			->with('core', 'oc.integritycheck.checker');

		$this->checker->runInstanceVerification();
	}

	public function testVerifyAppSignatureWithCodeCheckerDisabledDoesNotCallVerifier() {
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		// Recreate checker with modified config mock to disable integrity check
		$config = $this->createMock(IConfig::class);
		$config->method('getSystemValue')
			->willReturnCallback(function ($key, $default = false) {
				$map = [
					'integrity.check.disabled' => true,
					'integrity.excluded.files' => [],
					'integrity.ignore.missing.app.signature' => [],
				];
				return $map[$key] ?? $default;
			});
		$this->checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$config,
			$this->cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager(),
			$this->verifier
		);

		$this->verifier->expects($this->never())->method('verify');

		$this->assertSame([], $this->checker->verifyAppSignature('SomeApp'));
	}

	/**
	 * @return array
	 */
	public function channelDataProvider() {
		return [
			['stable', true],
			['git', false],
		];
	}

	/**
	 * @param string $channel
	 * @param bool $isCodeSigningEnforced
	 * @dataProvider channelDataProvider
	 */
	public function testIsCodeCheckEnforced($channel, $isCodeSigningEnforced) {
		$this->environmentHelper
			->expects($this->once())
			->method('getChannel')
			->will($this->returnValue($channel));
		$this->config
			->expects($this->any())
			->method('getSystemValue')
			->with('integrity.check.disabled', false)
			->will($this->returnValue(false));

		$this->assertSame($isCodeSigningEnforced, $this->checker->isCodeCheckEnforced());
	}

	/**
	 * @param string $channel
	 * @dataProvider channelDataProvider
	 */
	public function testIsCodeCheckEnforcedWithDisabledConfigSwitch($channel) {
		$this->environmentHelper
				->expects($this->once())
				->method('getChannel')
				->will($this->returnValue($channel));
		// Recreate checker with modified config mock to disable integrity check
		$config = $this->createMock(IConfig::class);
		$config->method('getSystemValue')
			->willReturnCallback(function ($key, $default = false) {
				if ($key === 'integrity.check.disabled') {
					return true;
				}
				return $default;
			});
		$checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$config,
			$this->cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager(),
			$this->verifier
		);

		$result = self::invokePrivate($checker, 'isCodeCheckEnforced');
		$this->assertFalse($result);
	}

	public function testCertRevocation() {
		// Test that verifier's revocation exception is wrapped with REASON key
		$this->environmentHelper->expects($this->once())->method('getChannel')->willReturn('stable');
		$this->config->expects($this->any())->method('getSystemValue')
			->willReturnMap([['integrity.check.disabled', false, false]]);

		$this->appLocator->expects($this->once())->method('getAppPath')
			->with('SomeApp')->willReturn('/path/to/app');

		$exception = new \OC\IntegrityCheck\Exceptions\RevokedException('Certificate has been revoked.');
		$this->verifier->expects($this->once())->method('verify')->willThrowException($exception);

		$expected = [
			'EXCEPTION' => ['class' => 'OC\\IntegrityCheck\\Exceptions\\RevokedException', 'message' => 'Certificate has been revoked.'],
			'REASON' => 'REVOKED',
		];
		$this->assertSame($expected, $this->checker->verifyAppSignature('SomeApp'));
	}

	public function testVerifyCachedAppSignatureCheck() {
		$redisObj = $this->createMock(Redis::class);
		$redisObj->method('get')
			->with('SomeApp')
			->willReturn('[]');
		$cacheFactory = $this->createMock(ICacheFactory::class);
		$cacheFactory
			->expects($this->any())
			->method('create')
			->with('oc.integritycheck.checker')
			->will($this->returnValue($redisObj));
		$checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$this->config,
			$cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager()
		);
		$expected = '[]';
		$this->assertSame($expected, $checker->getVerifiedAppsFromCache('SomeApp'));
	}

	public function testAppNotCachedSignatureCheck() {
		$redisObj = $this->createMock(Redis::class);
		$redisObj->method('get')
			->with('SomeApp')
			->willReturn(null);
		$cacheFactory = $this->createMock(ICacheFactory::class);
		$cacheFactory
			->expects($this->any())
			->method('create')
			->with('oc.integritycheck.checker')
			->will($this->returnValue($redisObj));
		$checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$this->config,
			$cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager()
		);

		$this->environmentHelper
			->expects($this->once())
			->method('getChannel')
			->will($this->returnValue('stable'));
		$configMap = [
			['integrity.check.disabled', false, false],
			['integrity.ignore.missing.app.signature', [], ['SomeApp']]
		];
		$this->config
			->expects($this->any())
			->method('getSystemValue')
			->will($this->returnValueMap($configMap));

		$expected = [];
		$this->assertSame($expected, $this->checker->getVerifiedAppsFromCache('SomeApp'));
	}

	/**
	 * Test hasPassedCheck treats EXCEPTION results as failures (FIX 1)
	 */
	public function testHasPassedCheckWithExceptionResult() {
		// Mock config to return results with EXCEPTION
		$config = $this->createMock(IConfig::class);
		$config->expects($this->any())
			->method('getAppValue')
			->with('core', 'oc.integritycheck.checker', '{}')
			->willReturn(\json_encode([
				'SomeApp' => [
					'EXCEPTION' => ['class' => 'SomeException', 'message' => 'An error occurred'],
				]
			]));

		$cacheFactory = $this->createMock(ICacheFactory::class);
		$cacheFactory->expects($this->any())
			->method('create')
			->willReturn(new NullCache());

		$checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$config,
			$cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager()
		);

		// hasPassedCheck should return false when EXCEPTION is stored
		$this->assertFalse($checker->hasPassedCheck());
	}

	/**
	 * Test hasPassedCheck returns true for empty results (FIX 1)
	 */
	public function testHasPassedCheckWithEmptyResults() {
		// Mock config to return empty results
		$config = $this->createMock(IConfig::class);
		$config->expects($this->any())
			->method('getAppValue')
			->with('core', 'oc.integritycheck.checker', '{}')
			->willReturn('{}');

		$cacheFactory = $this->createMock(ICacheFactory::class);
		$cacheFactory->expects($this->any())
			->method('create')
			->willReturn(new NullCache());

		$checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$config,
			$cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager()
		);

		// hasPassedCheck should return true for empty results
		$this->assertTrue($checker->hasPassedCheck());
	}

	/**
	 * Test hasPassedCheck returns false for FILE_MISSING (FIX 1)
	 */
	public function testHasPassedCheckWithFileMissing() {
		// Mock config to return results with FILE_MISSING
		$config = $this->createMock(IConfig::class);
		$config->expects($this->any())
			->method('getAppValue')
			->with('core', 'oc.integritycheck.checker', '{}')
			->willReturn(\json_encode([
				'core' => [
					'FILE_MISSING' => ['file.txt' => ['expected' => 'hash1', 'current' => '']],
				]
			]));

		$cacheFactory = $this->createMock(ICacheFactory::class);
		$cacheFactory->expects($this->any())
			->method('create')
			->willReturn(new NullCache());

		$checker = new Checker(
			$this->environmentHelper,
			$this->fileAccessHelper,
			$this->appLocator,
			$config,
			$cacheFactory,
			$this->appManager,
			\OC::$server->getTempManager()
		);

		// hasPassedCheck should return false when FILE_MISSING is stored
		$this->assertFalse($checker->hasPassedCheck());
	}
}
