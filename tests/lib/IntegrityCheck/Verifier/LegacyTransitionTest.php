<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2025, ownCloud GmbH
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

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Verifier\Verifier;
use OC\IntegrityCheck\Verifier\OnDiskHasher;
use OC\IntegrityCheck\Verifier\ChainValidator;
use OC\IntegrityCheck\Verifier\AlgorithmAllowlist;
use OC\IntegrityCheck\Verifier\ManifestVerifier;
use OC\IntegrityCheck\Verifier\CrlProvider;
use OC\IntegrityCheck\Verifier\AppIdResolver;
use OC\IntegrityCheck\Verifier\IntegrityDiffer;
use OC\IntegrityCheck\Verifier\VerifierConstants;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Exceptions\BadChainException;
use OC\IntegrityCheck\Exceptions\RevokedException;
use OC\IntegrityCheck\Exceptions\BadAlgorithmException;
use Test\TestCase;

class FakeOnDiskHasherLegacy implements OnDiskHasher {
	private array $hashes;

	public function __construct(array $hashes = []) {
		$this->hashes = $hashes;
	}

	public function computeHashes(string $basePath): array {
		return $this->hashes;
	}

	public function setHashes(array $hashes): void {
		$this->hashes = $hashes;
	}
}

class LegacyTransitionTest extends TestCase {
	private Verifier $verifier;
	private ChainValidator $chainValidator;
	private AlgorithmAllowlist $algorithmAllowlist;
	private ManifestVerifier $manifestVerifier;
	private CrlProvider $crlProvider;
	private AppIdResolver $appIdResolver;
	private IntegrityDiffer $integrityDiffer;
	private FakeOnDiskHasherLegacy $fakeHasher;
	private FileAccessHelper $fileAccessHelper;
	private string $basePath;
	private string $fixtureDir;
	private string $pkiDir;
	private string $crlDir;
	private string $tempServerRoot;

	public function setUp(): void {
		parent::setUp();

		$this->basePath = \OC::$SERVERROOT . '/tests/data/integritycheck/verifier';
		$this->fixtureDir = \OC::$SERVERROOT . '/tests/data/integritycheck/verifier';
		$this->pkiDir = $this->fixtureDir . '/pki';
		$this->crlDir = $this->fixtureDir . '/crl';

		// Create a temporary server root structure for tests
		$this->tempServerRoot = \sys_get_temp_dir() . '/oc_test_legacy_' . \md5(\uniqid());
		\mkdir($this->tempServerRoot, 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/roots', 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/intermediates', 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/crl', 0755, true);

		// Copy test PKI and CRL fixtures to temp root (both G1 and G2)
		$this->copyFixtures();

		// Create TrustStore with both G1 and G2 roots
		$trustStore = $this->createTrustStore(['root-g1.crt', 'root-g2.crt'], ['intermediate-g1.crt', 'intermediate-g2.crt']);
		$this->chainValidator = new ChainValidator($trustStore);
		$this->algorithmAllowlist = new AlgorithmAllowlist();
		$this->manifestVerifier = new ManifestVerifier();
		$this->appIdResolver = new AppIdResolver(new FileAccessHelper());
		$this->integrityDiffer = new IntegrityDiffer();
		$this->fileAccessHelper = new FileAccessHelper();

		// Create mock CrlProvider with temp server root
		$this->crlProvider = $this->createMockCrlProvider();

		// Fake hasher - will be populated per test
		$this->fakeHasher = new FakeOnDiskHasherLegacy();

		// Assemble verifier
		$this->verifier = new Verifier(
			$this->chainValidator,
			$this->algorithmAllowlist,
			$this->manifestVerifier,
			$this->crlProvider,
			$this->appIdResolver,
			$this->integrityDiffer,
			$this->fakeHasher,
			$this->fileAccessHelper
		);
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

	private function copyFixtures(): void {
		// Copy both G1 and G2 trust anchor certs
		\copy($this->pkiDir . '/root-g1.crt', $this->tempServerRoot . '/resources/codesigning/roots/root-g1.crt');
		\copy($this->pkiDir . '/root-g2.crt', $this->tempServerRoot . '/resources/codesigning/roots/root-g2.crt');
		\copy($this->pkiDir . '/intermediate-g1.crt', $this->tempServerRoot . '/resources/codesigning/intermediates/intermediate-g1.crt');
		\copy($this->pkiDir . '/intermediate-g2.crt', $this->tempServerRoot . '/resources/codesigning/intermediates/intermediate-g2.crt');
		// Copy legacy CRL by default (empty)
		\copy($this->crlDir . '/legacy.crl', $this->tempServerRoot . '/resources/codesigning/crl/legacy.crl');
		// Copy G2 CRL by default (empty)
		\copy($this->crlDir . '/developers-empty.crl', $this->tempServerRoot . '/resources/codesigning/crl/developers.crl');
	}

	private function createTrustStore(array $rootFiles, array $intermediateFiles): \OC\IntegrityCheck\Verifier\TrustStore {
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

		return new \OC\IntegrityCheck\Verifier\TrustStore($fileAccessHelper, $environmentHelper);
	}

	private function createMockCrlProvider() {
		$trustStore = $this->createTrustStore(['root-g1.crt', 'root-g2.crt'], ['intermediate-g1.crt', 'intermediate-g2.crt']);
		$crlValidator = new \OC\IntegrityCheck\Verifier\CrlValidator($trustStore);

		// Mock EnvironmentHelper to return temp server root
		$envHelper = $this->createMock(EnvironmentHelper::class);
		$envHelper->method('getServerRoot')->willReturn($this->tempServerRoot);

		$crlFetcher = $this->createMock(\OC\IntegrityCheck\Verifier\CrlFetcher::class);
		$crlFetcher->method('fetch')->willReturn(null);

		return new CrlProvider(
			$crlFetcher,
			$crlValidator,
			$trustStore,
			new FileAccessHelper(),
			$envHelper
		);
	}

	/**
	 * Test Case 2: Legacy G1 app with expired cert, before sunset.
	 * Expected: warn+allow (isLegacyWarn=true, isPassed=true).
	 */
	public function testCase2LegacyWarnBeforeSunset(): void {
		$appTreePath = $this->basePath . '/app-tree-g1';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up hashes matching the G1 fixture
		$expectedHashes = [
			'appinfo/info.xml' => '7872e7c14041563509bdd9382462c7baf19ea100218a43ab84732ded3a6ed4d51cf63fe9cdd7594fbf51bbbc82283a9dedbef4ccf7a56475ff31e859c34778e3',
			'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		// Inject now = 2026-06-01 (expired relative to leaf 2020-12-31, pre-sunset 2026-12-31)
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');

		$result = $this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$now
		);

		// Verify case-2 result: warn + pass
		$this->assertTrue($result->isLegacyWarn(), 'Expected isLegacyWarn=true for case 2');
		$this->assertTrue($result->isPassed(), 'Expected isPassed=true for case 2 (warn allows pass)');
		$this->assertSame([], $result->getDiff(), 'Expected no integrity diff');
		$this->assertSame(['LEGACY_ACCEPTED_WARN' => true], $result->toLegacyResultArray(), 'Expected legacy warn marker');
	}

	/**
	 * Test Case 2 → Sunset fold: expired G1 after sunset becomes hard block.
	 * Expected: throws (BadAlgorithmException from alg gate OR BadChainException).
	 */
	public function testCase2SunsetFoldHardBlock(): void {
		$appTreePath = $this->basePath . '/app-tree-g1';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up hashes matching the G1 fixture
		$expectedHashes = [
			'appinfo/info.xml' => '7872e7c14041563509bdd9382462c7baf19ea100218a43ab84732ded3a6ed4d51cf63fe9cdd7594fbf51bbbc82283a9dedbef4ccf7a56475ff31e859c34778e3',
			'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		// Inject now = 2027-06-01 (after sunset 2026-12-31)
		$now = new \DateTimeImmutable('2027-06-01T00:00:00Z');

		// After sunset, legacy alg is rejected at the alg gate, before expiry is checked
		$this->expectException(BadAlgorithmException::class);
		$this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$now
		);
	}

	/**
	 * Test Case 1 (revoked): expired G1, but leaf is revoked in CRL.
	 * Expected: throws RevokedException (revocation still enforced for case 2).
	 */
	public function testCase1RevokedLeafStillBlocks(): void {
		$appTreePath = $this->basePath . '/app-tree-g1';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up hashes matching the G1 fixture
		$expectedHashes = [
			'appinfo/info.xml' => '7872e7c14041563509bdd9382462c7baf19ea100218a43ab84732ded3a6ed4d51cf63fe9cdd7594fbf51bbbc82283a9dedbef4ccf7a56475ff31e859c34778e3',
			'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		// Put the revoked CRL into the temp crl directory
		$revokedCrlPath = $this->crlDir . '/legacy-revoked.crl';
		$tempCrlPath = $this->tempServerRoot . '/resources/codesigning/crl/legacy.crl';
		\copy($revokedCrlPath, $tempCrlPath);

		// Inject now = 2026-06-01 (expired, but would be case 2 if not revoked)
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');

		// Revocation still enforced even for case 2
		$this->expectException(RevokedException::class);
		$this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$now
		);
	}

	/**
	 * Test Case 1 (tampered): expired G1, but file is tampered.
	 * Expected: returns diffFailure (integrity failure, not warn).
	 */
	public function testCase1TamperedFileStillBlocks(): void {
		$appTreePath = $this->basePath . '/app-tree-g1';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up hashes with one tampered
		$expectedHashes = [
			'appinfo/info.xml' => '7872e7c14041563509bdd9382462c7baf19ea100218a43ab84732ded3a6ed4d51cf63fe9cdd7594fbf51bbbc82283a9dedbef4ccf7a56475ff31e859c34778e3',
			'test-file-1.txt' => 'badbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbad0000000000000000000000000000000000000000000000000000000000000000',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		// Inject now = 2026-06-01 (expired, would be case 2 if not tampered)
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');

		$result = $this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$now
		);

		// Tampered file: must return diffFailure, NOT warn
		$this->assertFalse($result->isPassed(), 'Expected isPassed=false for tampered file');
		$this->assertFalse($result->isLegacyWarn(), 'Expected isLegacyWarn=false for tampered file (not warn)');
		$diff = $result->getDiff();
		$this->assertNotEmpty($diff, 'Expected non-empty diff for tampered file');
		$this->assertArrayHasKey('INVALID_HASH', $diff, 'Expected INVALID_HASH in diff');
		$this->assertArrayHasKey('test-file-1.txt', $diff['INVALID_HASH'], 'Expected tampered file in diff');
	}

	/**
	 * Test not-yet-valid G1 leaf: future-dated cert (now < notBefore) is HARD-BLOCKED, not warn.
	 * Expected: throws BadChainException (not returns legacyWarn).
	 *
	 * Uses the existing leaf-g1-expired fixture but injects now=2019-01-01 (before cert's 2020 notBefore).
	 * This reinterprets the fixture cert as "not yet valid" instead of expired.
	 */
	public function testNotYetValidG1HardBlocks(): void {
		$appTreePath = $this->basePath . '/app-tree-g1';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up hashes matching the G1 fixture
		$expectedHashes = [
			'appinfo/info.xml' => '7872e7c14041563509bdd9382462c7baf19ea100218a43ab84732ded3a6ed4d51cf63fe9cdd7594fbf51bbbc82283a9dedbef4ccf7a56475ff31e859c34778e3',
			'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		// Inject now = 2019-01-01 (BEFORE the cert's notBefore of 2020-01-01, making it not-yet-valid)
		// This is still before sunset (2026-12-31) and uses legacy alg, but cert is not-yet-valid, so should hard-block
		$now = new \DateTimeImmutable('2019-01-01T00:00:00Z');

		// Not-yet-valid cert must throw BadChainException, NOT return legacyWarn
		$this->expectException(BadChainException::class);
		$this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$now
		);
	}

	/**
	 * Test G2 regression: valid non-expired G2 app still returns passed() (not legacyWarn).
	 */
	public function testG2RegressionUnaffected(): void {
		$appTreePath = $this->basePath . '/app-tree';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up correct hashes for G2 fixture
		$expectedHashes = [
			'appinfo/info.xml' => '7a16ce201bdc596b32f6a01c9648f18e504eddd6cd3530b01dd2a7d15db9ae5459d82576445f2d20d0be9cb45f2f1e4e9e4067f8774d11eddf2c35b52b778274',
			'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		// Set a reference time within the G2 leaf certificate's validity window
		// G2 leaf cert is valid from 2026-07-12 to 2036-07-09
		$now = new \DateTimeImmutable('2026-07-12T15:00:00Z');

		$result = $this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$now
		);

		// G2 should return passed(), not legacyWarn
		$this->assertTrue($result->isPassed(), 'Expected isPassed=true for G2');
		$this->assertFalse($result->isLegacyWarn(), 'Expected isLegacyWarn=false for G2');
		$this->assertSame([], $result->getDiff(), 'Expected no integrity diff');
		$this->assertSame([], $result->toLegacyResultArray(), 'Expected empty legacy array for G2 passed');
	}
}
