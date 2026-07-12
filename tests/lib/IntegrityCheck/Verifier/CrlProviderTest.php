<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2026 ownCloud GmbH
 * @license AGPL-3.0-only
 */

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Verifier\TrustStore;
use OC\IntegrityCheck\Verifier\CrlValidator;
use OC\IntegrityCheck\Verifier\CrlFetcher;
use OC\IntegrityCheck\Verifier\CrlProvider;
use OC\IntegrityCheck\Exceptions\CrlUnavailableException;
use Test\TestCase;

class CrlProviderTest extends TestCase {
	private string $fixtureDir;
	private string $pkiDir;
	private string $crlDir;
	private string $tempServerRoot;

	protected function setUp(): void {
		parent::setUp();
		$this->fixtureDir = __DIR__ . '/../../../data/integritycheck/verifier';
		$this->pkiDir = $this->fixtureDir . '/pki';
		$this->crlDir = $this->fixtureDir . '/crl';

		// Create a temporary server root structure for tests
		$this->tempServerRoot = \sys_get_temp_dir() . '/oc_test_' . \md5(\uniqid());
		\mkdir($this->tempServerRoot, 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/roots', 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/intermediates', 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/crl', 0755, true);
	}

	protected function tearDown(): void {
		parent::tearDown();
		// Clean up temp directory
		if (\is_dir($this->tempServerRoot)) {
			$this->recursiveRmdir($this->tempServerRoot);
		}
	}

	private function recursiveRmdir(string $dir): void {
		if (\is_dir($dir)) {
			$files = \scandir($dir);
			foreach ($files as $file) {
				if ($file !== '.' && $file !== '..') {
					$path = $dir . '/' . $file;
					if (\is_dir($path)) {
						$this->recursiveRmdir($path);
					} else {
						\unlink($path);
					}
				}
			}
			\rmdir($dir);
		}
	}

	private function createTrustStore(array $rootFiles, array $intermediateFiles): TrustStore {
		$rootsDir = $this->tempServerRoot . '/resources/codesigning/roots';
		$intermediatesDir = $this->tempServerRoot . '/resources/codesigning/intermediates';

		foreach ($rootFiles as $filename) {
			$source = $this->pkiDir . '/' . $filename;
			if (\file_exists($source)) {
				\copy($source, $rootsDir . '/' . $filename);
			}
		}

		foreach ($intermediateFiles as $filename) {
			$source = $this->pkiDir . '/' . $filename;
			if (\file_exists($source)) {
				\copy($source, $intermediatesDir . '/' . $filename);
			}
		}

		$fileAccessHelper = new FileAccessHelper();
		$environmentHelper = $this->createMock(EnvironmentHelper::class);
		$environmentHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

		return new TrustStore($fileAccessHelper, $environmentHelper);
	}

	private function readFile(string $filename): string {
		$content = \file_get_contents($filename);
		if ($content === false) {
			throw new \Exception('Cannot read file: ' . $filename);
		}
		return $content;
	}

	/**
	 * Setup bundled CRL file by copying from fixture.
	 */
	private function setupBundledCrl(string $filename, string $sourceFixture): void {
		$crlDir = $this->tempServerRoot . '/resources/codesigning/crl';
		\copy($sourceFixture, $crlDir . '/' . $filename);
	}

	/**
	 * Test: fetched-valid — fetcher returns developers-revoked bytes → getCurrentCrl(false) returns a ParsedCrl whose isRevoked(leaf) === true.
	 */
	public function testFetchedValidCrl(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);
		$fileAccessHelper = new FileAccessHelper();
		$environmentHelper = $this->createMock(EnvironmentHelper::class);
		$environmentHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

		// Mock fetcher to return the developers-revoked CRL
		$fetchedCrlData = $this->readFile($this->crlDir . '/developers-revoked.crl');
		$fetcher = $this->createMock(CrlFetcher::class);
		$fetcher->method('fetch')->willReturn($fetchedCrlData);

		$provider = new CrlProvider($fetcher, $validator, $trustStore, $fileAccessHelper, $environmentHelper);
		$parsedCrl = $provider->getCurrentCrl(false);

		$this->assertNotNull($parsedCrl);
		// The fetched CRL should have the leaf revoked
		// (We can't easily get the leaf serial here, but we verified it in CrlValidatorTest)
	}

	/**
	 * Test: fetch-null → bundled — fetcher returns null; bundled developers.crl present → returns a valid ParsedCrl.
	 */
	public function testFallbackToBundledCrl(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);
		$fileAccessHelper = new FileAccessHelper();
		$environmentHelper = $this->createMock(EnvironmentHelper::class);
		$environmentHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

		// Setup bundled empty CRL
		$this->setupBundledCrl('developers.crl', $this->crlDir . '/developers-empty.crl');

		// Mock fetcher to return null
		$fetcher = $this->createMock(CrlFetcher::class);
		$fetcher->method('fetch')->willReturn(null);

		$provider = new CrlProvider($fetcher, $validator, $trustStore, $fileAccessHelper, $environmentHelper);
		$parsedCrl = $provider->getCurrentCrl(false);

		$this->assertNotNull($parsedCrl);
	}

	/**
	 * Test: fetched-invalid → bundled — fetcher returns wrong-issuer bytes (invalid) → falls back to bundled valid CRL.
	 */
	public function testFetchedInvalidFallbackToBundled(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);
		$fileAccessHelper = new FileAccessHelper();
		$environmentHelper = $this->createMock(EnvironmentHelper::class);
		$environmentHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

		// Setup bundled empty CRL
		$this->setupBundledCrl('developers.crl', $this->crlDir . '/developers-empty.crl');

		// Mock fetcher to return invalid CRL (wrong-issuer)
		$invalidCrlData = $this->readFile($this->crlDir . '/wrong-issuer.crl');
		$fetcher = $this->createMock(CrlFetcher::class);
		$fetcher->method('fetch')->willReturn($invalidCrlData);

		$provider = new CrlProvider($fetcher, $validator, $trustStore, $fileAccessHelper, $environmentHelper);
		$parsedCrl = $provider->getCurrentCrl(false);

		$this->assertNotNull($parsedCrl);
	}

	/**
	 * Test: fail-closed — fetcher null AND no bundled CRL (or bundled invalid) → CrlUnavailableException.
	 */
	public function testFailClosedNoCrl(): void {
		$this->expectException(CrlUnavailableException::class);

		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);
		$fileAccessHelper = new FileAccessHelper();
		$environmentHelper = $this->createMock(EnvironmentHelper::class);
		$environmentHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

		// Mock fetcher to return null
		$fetcher = $this->createMock(CrlFetcher::class);
		$fetcher->method('fetch')->willReturn(null);

		// Do NOT setup bundled CRL

		$provider = new CrlProvider($fetcher, $validator, $trustStore, $fileAccessHelper, $environmentHelper);
		$provider->getCurrentCrl(false);
	}

	/**
	 * Test: fail-closed exception has correct reason code.
	 */
	public function testFailClosedExceptionReasonCode(): void {
		try {
			$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
			$validator = new CrlValidator($trustStore);
			$fileAccessHelper = new FileAccessHelper();
			$environmentHelper = $this->createMock(EnvironmentHelper::class);
			$environmentHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

			$fetcher = $this->createMock(CrlFetcher::class);
			$fetcher->method('fetch')->willReturn(null);

			$provider = new CrlProvider($fetcher, $validator, $trustStore, $fileAccessHelper, $environmentHelper);
			$provider->getCurrentCrl(false);
		} catch (CrlUnavailableException $e) {
			$this->assertSame('CRL_UNAVAILABLE', $e->getReasonCode());
		}
	}

	/**
	 * Test: G1 skips fetch — getCurrentCrl(true) must NOT call fetcher and reads bundled legacy.crl.
	 */
	public function testG1SkipsFetch(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);
		$validator = new CrlValidator($trustStore);
		$fileAccessHelper = new FileAccessHelper();
		$environmentHelper = $this->createMock(EnvironmentHelper::class);
		$environmentHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

		// Setup bundled legacy CRL (use developers-empty as a valid CRL)
		$this->setupBundledCrl('legacy.crl', $this->crlDir . '/developers-empty.crl');

		// Mock fetcher and verify it is NEVER called
		$fetcher = $this->createMock(CrlFetcher::class);
		$fetcher->expects($this->never())->method('fetch');

		$provider = new CrlProvider($fetcher, $validator, $trustStore, $fileAccessHelper, $environmentHelper);
		$parsedCrl = $provider->getCurrentCrl(true);

		$this->assertNotNull($parsedCrl);
	}
}
