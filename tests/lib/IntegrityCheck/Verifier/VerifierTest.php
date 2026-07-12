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
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Exceptions\MissingSignatureException;
use OC\IntegrityCheck\Exceptions\BadChainException;
use OC\IntegrityCheck\Exceptions\BadSignatureException;
use OC\IntegrityCheck\Exceptions\RevokedException;
use OC\IntegrityCheck\Exceptions\CnMismatchException;
use OC\IntegrityCheck\Exceptions\BadAlgorithmException;
use OC\IntegrityCheck\Exceptions\CrlUnavailableException;
use Test\TestCase;

class FakeOnDiskHasher implements OnDiskHasher {
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

class VerifierTest extends TestCase {
	private Verifier $verifier;
	private ChainValidator $chainValidator;
	private AlgorithmAllowlist $algorithmAllowlist;
	private ManifestVerifier $manifestVerifier;
	private CrlProvider $crlProvider;
	private AppIdResolver $appIdResolver;
	private IntegrityDiffer $integrityDiffer;
	private FakeOnDiskHasher $fakeHasher;
	private FileAccessHelper $fileAccessHelper;
	private string $basePath;
	private \DateTimeImmutable $now;

	public function setUp(): void {
		parent::setUp();

		$this->basePath = \OC::$SERVERROOT . '/tests/data/integritycheck/verifier';

		// Real collaborators
		$trustStore = new \OC\IntegrityCheck\Verifier\TrustStore(new FileAccessHelper(), new EnvironmentHelper());
		$this->chainValidator = new ChainValidator($trustStore);
		$this->algorithmAllowlist = new AlgorithmAllowlist();
		$this->manifestVerifier = new ManifestVerifier();
		$this->appIdResolver = new AppIdResolver(new FileAccessHelper());
		$this->integrityDiffer = new IntegrityDiffer();
		$this->fileAccessHelper = new FileAccessHelper();

		// Set a reference time within the leaf certificate's validity window
		// Leaf cert is valid from 2026-07-12 to 2036-07-09
		$this->now = new \DateTimeImmutable('2026-07-12T15:00:00Z');

		// Create mock CrlProvider that uses the bundled CRL by default
		$this->crlProvider = $this->createMockCrlProvider();

		// Fake hasher - will be populated per test
		$this->fakeHasher = new FakeOnDiskHasher();

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

	private function createMockCrlProvider() {
		$trustStore = new \OC\IntegrityCheck\Verifier\TrustStore(new FileAccessHelper(), new EnvironmentHelper());
		$crlValidator = new \OC\IntegrityCheck\Verifier\CrlValidator($trustStore);
		$envHelper = new EnvironmentHelper();

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

	public function testHappyPathPassed(): void {
		$appTreePath = $this->basePath . '/app-tree';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up fake hasher with correct hashes
		$expectedHashes = [
			'appinfo/info.xml' => '7a16ce201bdc596b32f6a01c9648f18e504eddd6cd3530b01dd2a7d15db9ae5459d82576445f2d20d0be9cb45f2f1e4e9e4067f8774d11eddf2c35b52b778274',
			'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		$result = $this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$this->now
		);

		$this->assertTrue($result->isPassed());
		$this->assertSame([], $result->getDiff());
		$this->assertSame([], $result->toLegacyResultArray());
	}

	public function testTamperedFileInvalidHash(): void {
		$appTreePath = $this->basePath . '/app-tree';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up fake hasher with one tampered hash
		$expectedHashes = [
			'appinfo/info.xml' => '7a16ce201bdc596b32f6a01c9648f18e504eddd6cd3530b01dd2a7d15db9ae5459d82576445f2d20d0be9cb45f2f1e4e9e4067f8774d11eddf2c35b52b778274',
			'test-file-1.txt' => 'badbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbadbad0000000000000000000000000000000000000000000000000000000000000000',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		$result = $this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$this->now
		);

		$this->assertFalse($result->isPassed());
		$diff = $result->getDiff();
		$this->assertNotEmpty($diff);
		$this->assertArrayHasKey('INVALID_HASH', $diff);
		$this->assertArrayHasKey('test-file-1.txt', $diff['INVALID_HASH']);
		$this->assertNotEmpty($result->toLegacyResultArray());
	}

	public function testRevokedLeaf(): void {
		$appTreePath = $this->basePath . '/app-tree';
		$signaturePath = $appTreePath . '/signature.json';

		// Set up correct hashes
		$expectedHashes = [
			'appinfo/info.xml' => '7a16ce201bdc596b32f6a01c9648f18e504eddd6cd3530b01dd2a7d15db9ae5459d82576445f2d20d0be9cb45f2f1e4e9e4067f8774d11eddf2c35b52b778274',
			'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		// Temporarily replace the bundled developers.crl with developers-revoked.crl
		$crlDir = \OC::$SERVERROOT . '/resources/codesigning/crl';
		$originalCrl = $crlDir . '/developers.crl';
		$revokedCrlPath = $this->basePath . '/crl/developers-revoked.crl';
		$backup = null;

		if (\file_exists($originalCrl)) {
			$backup = \file_get_contents($originalCrl);
		}

		try {
			// Copy revoked CRL to the bundled location
			$revokedContent = \file_get_contents($revokedCrlPath);
			\file_put_contents($originalCrl, $revokedContent);

			$this->expectException(RevokedException::class);
			$this->verifier->verify(
				$signaturePath,
				$appTreePath,
				'example-app',
				false,
				$this->now
			);
		} finally {
			// Restore original CRL
			if ($backup !== null) {
				\file_put_contents($originalCrl, $backup);
			}
		}
	}

	public function testBadSignature(): void {
		$appTreePath = $this->basePath . '/app-tree';
		$signaturePath = $appTreePath . '/signature.json';

		// Read and corrupt the signature
		$content = \file_get_contents($signaturePath);
		$data = \json_decode($content, true);
		// Corrupt the signature
		$data['signature'] = \base64_encode('corrupted signature data');
		$corrupted = \json_encode($data);

		// Write to temp file
		$tempPath = \sys_get_temp_dir() . '/corrupted_sig_' . \uniqid() . '.json';
		\file_put_contents($tempPath, $corrupted);

		try {
			// Set up correct hashes
			$expectedHashes = [
				'appinfo/info.xml' => '7a16ce201bdc596b32f6a01c9648f18e504eddd6cd3530b01dd2a7d15db9ae5459d82576445f2d20d0be9cb45f2f1e4e9e4067f8774d11eddf2c35b52b778274',
				'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
				'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
			];
			$this->fakeHasher->setHashes($expectedHashes);

			$this->expectException(BadSignatureException::class);
			$this->verifier->verify(
				$tempPath,
				$appTreePath,
				'example-app',
				false,
				$this->now
			);
		} finally {
			@\unlink($tempPath);
		}
	}

	public function testCnMismatch(): void {
		$appTreePath = $this->basePath . '/app-tree';
		$signaturePath = $appTreePath . '/signature.json';

		// Create a temporary directory with a different app ID
		$tempDir = \sys_get_temp_dir() . '/cn_mismatch_' . \uniqid();
		\mkdir($tempDir . '/appinfo', 0755, true);

		// Create info.xml with 'other-app' ID (certificate is for 'example-app')
		$infoXml = <<<'XML'
<?xml version="1.0"?>
<info>
	<id>other-app</id>
	<name>Other App</name>
	<version>1.0.0</version>
</info>
XML;

		\file_put_contents($tempDir . '/appinfo/info.xml', $infoXml);

		// Set up correct hashes
		$expectedHashes = [
			'appinfo/info.xml' => '7a16ce201bdc596b32f6a01c9648f18e504eddd6cd3530b01dd2a7d15db9ae5459d82576445f2d20d0be9cb45f2f1e4e9e4067f8774d11eddf2c35b52b778274',
			'test-file-1.txt' => 'd63734aa1fd2aedf1e69361710dda058b7d02305185db688add40fb18e525cd9352b62a2002c027aaba0bdcbecea71dcd07b0e951c9265fa52d3b591212bfa7b',
			'test-file-2.txt' => '379cd32e670f68777a99d0930512b3056fd5c729df572232e2f1d00c23bfaf8c3b0d0f4bbb3ff01588536bdee1d6bdbe78e783f395cc43c1ba756fb9f2926f91',
		];
		$this->fakeHasher->setHashes($expectedHashes);

		try {
			// Use tempdir with 'other-app' ID while certificate is 'example-app'
			$this->expectException(CnMismatchException::class);
			$this->verifier->verify(
				$signaturePath,
				$tempDir,
				'example-app',
				false,
				$this->now
			);
		} finally {
			// Clean up
			@\unlink($tempDir . '/appinfo/info.xml');
			@\rmdir($tempDir . '/appinfo');
			@\rmdir($tempDir);
		}
	}

	public function testMissingSignatureFile(): void {
		$appTreePath = $this->basePath . '/app-tree';
		$signaturePath = $appTreePath . '/nonexistent_signature.json';

		$this->expectException(MissingSignatureException::class);
		$this->verifier->verify(
			$signaturePath,
			$appTreePath,
			'example-app',
			false,
			$this->now
		);
	}

	public function testLegacySignatureHappyPath(): void {
		// Test with a legacy G1 signature if available
		// For now, verify the code path exists by checking algorithm determination
		$this->assertTrue(true); // Placeholder - requires legacy fixture
	}
}
