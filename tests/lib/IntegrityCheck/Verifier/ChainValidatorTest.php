<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

declare(strict_types=1);

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Verifier\TrustStore;
use OC\IntegrityCheck\Verifier\ChainValidator;
use OC\IntegrityCheck\Exceptions\BadChainException;
use Test\TestCase;

class ChainValidatorTest extends TestCase {
	private string $fixtureDir;
	private string $pkiDir;
	private string $tempServerRoot;

	protected function setUp(): void {
		parent::setUp();
		$this->fixtureDir = __DIR__ . '/../../../data/integritycheck/verifier';
		$this->pkiDir = $this->fixtureDir . '/pki';

		// Create a temporary server root structure for tests
		$this->tempServerRoot = \sys_get_temp_dir() . '/oc_test_' . \md5(\uniqid());
		\mkdir($this->tempServerRoot, 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/roots', 0755, true);
		\mkdir($this->tempServerRoot . '/resources/codesigning/intermediates', 0755, true);
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

	private function readCertFile(string $filename): string {
		$content = \file_get_contents($this->pkiDir . '/' . $filename);
		if ($content === false) {
			throw new \Exception('Cannot read fixture: ' . $filename);
		}
		return $content;
	}

	/**
	 * Test: Happy path — valid leaf + intermediate chain validates successfully.
	 */
	public function testValidLeafWithChain(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], []);

		$validator = new ChainValidator($trustStore);

		$leafPem = $this->readCertFile('leaf-example-app.crt');
		$chainPems = [$this->readCertFile('intermediate-g2.crt')];

		$result = $validator->validate($leafPem, $chainPems);

		$this->assertSame('g2', $result->getAnchorGeneration());
		$this->assertFalse($result->isG1());
		$this->assertSame('example-app', $result->getLeafCn());
		// Verify serial is a non-empty decimal string
		$this->assertMatchesRegularExpression('/^\d+$/', $result->getLeafSerial());
		$this->assertNotEmpty($result->getLeafSerial());
	}

	/**
	 * Test: Empty chain[] with bundled intermediate — should validate.
	 */
	public function testEmptyChainWithBundledIntermediate(): void {
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);

		$validator = new ChainValidator($trustStore);

		$leafPem = $this->readCertFile('leaf-example-app.crt');
		$chainPems = []; // Empty chain from envelope

		$result = $validator->validate($leafPem, $chainPems);

		$this->assertSame('g2', $result->getAnchorGeneration());
		$this->assertSame('example-app', $result->getLeafCn());
	}

	/**
	 * Test: SECURITY-CRITICAL — Untrusted root / rogue intermediate.
	 *
	 * Attacker provides evil-leaf (signed by evil-intermediate) which chains to evil-root.
	 * Trust store only has root-g2. Validator MUST reject because evil-intermediate
	 * does not chain to root-g2, even if evil-leaf appears valid in isolation.
	 */
	public function testRogueIntermediateRejected(): void {
		$this->expectException(BadChainException::class);

		$trustStore = $this->createTrustStore(['root-g2.crt'], []);

		$validator = new ChainValidator($trustStore);

		$evilLeafPem = $this->readCertFile('evil-leaf.crt');
		$evilChainPems = [$this->readCertFile('evil-intermediate.crt')];

		// This MUST throw BadChainException because evil-intermediate does not chain to root-g2
		$validator->validate($evilLeafPem, $evilChainPems);
	}

	/**
	 * Test: Constraint violation — leaf with CA:TRUE.
	 */
	public function testLeafWithCATrue(): void {
		$this->expectException(BadChainException::class);
		$this->expectExceptionMessageMatches('/CA:TRUE/i');

		$trustStore = $this->createTrustStore(['root-g2.crt'], []);

		$validator = new ChainValidator($trustStore);

		$leafPem = $this->readCertFile('leaf-ca-true.crt');
		$chainPems = [$this->readCertFile('intermediate-g2.crt')];

		$validator->validate($leafPem, $chainPems);
	}

	/**
	 * Test: Constraint violation — missing extendedKeyUsage (codeSigning).
	 */
	public function testLeafMissingEKU(): void {
		$this->expectException(BadChainException::class);
		$this->expectExceptionMessageMatches('/extendedKeyUsage|codeSigning/i');

		$trustStore = $this->createTrustStore(['root-g2.crt'], []);

		$validator = new ChainValidator($trustStore);

		$leafPem = $this->readCertFile('leaf-no-eku.crt');
		$chainPems = [$this->readCertFile('intermediate-g2.crt')];

		$validator->validate($leafPem, $chainPems);
	}

	/**
	 * Test: Constraint violation — missing digitalSignature in keyUsage.
	 */
	public function testLeafMissingDigitalSignature(): void {
		$this->expectException(BadChainException::class);
		$this->expectExceptionMessageMatches('/digitalSignature|keyUsage/i');

		$trustStore = $this->createTrustStore(['root-g2.crt'], []);

		$validator = new ChainValidator($trustStore);

		$leafPem = $this->readCertFile('leaf-no-digsig.crt');
		$chainPems = [$this->readCertFile('intermediate-g2.crt')];

		$validator->validate($leafPem, $chainPems);
	}

	/**
	 * Test: legacy G1 leaf-constraint exemption.
	 *
	 * An extension-less leaf (no basicConstraints / keyUsage / extKeyUsage) that
	 * anchors to the G1 root MUST validate — legacy field certs carry no v3
	 * extensions and the old verifier enforced none. The strict G2 leaf profile
	 * (exercised by testLeafMissingEKU / testLeafMissingDigitalSignature) applies
	 * to G2 anchors only.
	 */
	public function testExtensionlessLeafAllowedForG1(): void {
		$trustStore = $this->createTrustStore(['root-g1.crt'], ['intermediate-g1.crt']);

		$validator = new ChainValidator($trustStore);

		$leafPem = $this->readCertFile('leaf-g1-legacy-noext.crt');
		$chainPems = [$this->readCertFile('intermediate-g1.crt')];

		$result = $validator->validate($leafPem, $chainPems);

		$this->assertSame('g1', $result->getAnchorGeneration());
		$this->assertTrue($result->isG1());
		$this->assertSame('SomeApp', $result->getLeafCn(), 'Legacy CN is preserved verbatim');
	}

	/**
	 * Test: an extension-less leaf that anchors to G2 is still rejected — the
	 * exemption is keyed on the G1 anchor generation, not on the leaf shape.
	 */
	public function testExtensionlessLeafRejectedForG2(): void {
		$this->expectException(BadChainException::class);

		// Extension-less leaf is issued by intermediate-g1, so with only the G2
		// root trusted it cannot chain at all — a fortiori it never validates as G2.
		$trustStore = $this->createTrustStore(['root-g2.crt'], ['intermediate-g2.crt']);

		$validator = new ChainValidator($trustStore);

		$leafPem = $this->readCertFile('leaf-g1-legacy-noext.crt');
		$chainPems = [$this->readCertFile('intermediate-g1.crt')];

		$validator->validate($leafPem, $chainPems);
	}

	/**
	 * Test: No trusted roots available.
	 */
	public function testNoTrustedRoots(): void {
		$this->expectException(BadChainException::class);
		$this->expectExceptionMessageMatches('/no trusted roots/i');

		$trustStore = $this->createTrustStore([], []); // Empty roots

		$validator = new ChainValidator($trustStore);

		$leafPem = $this->readCertFile('leaf-example-app.crt');
		$chainPems = [$this->readCertFile('intermediate-g2.crt')];

		$validator->validate($leafPem, $chainPems);
	}

	/**
	 * Test: Verify BadChainException has correct reason code.
	 */
	public function testBadChainExceptionReasonCode(): void {
		try {
			$trustStore = $this->createTrustStore([], []);
			$validator = new ChainValidator($trustStore);
			$leafPem = $this->readCertFile('leaf-example-app.crt');
			$validator->validate($leafPem, []);
		} catch (BadChainException $e) {
			$this->assertSame('BAD_CHAIN', $e->getReasonCode());
			return;
		}

		$this->fail('BadChainException not thrown');
	}
}
