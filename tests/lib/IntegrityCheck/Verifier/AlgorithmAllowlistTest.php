<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Exceptions\BadAlgorithmException;
use OC\IntegrityCheck\Verifier\AlgorithmAllowlist;
use OC\IntegrityCheck\Verifier\VerifierConstants;
use Test\TestCase;

class AlgorithmAllowlistTest extends TestCase {

	private AlgorithmAllowlist $allowlist;

	protected function setUp(): void {
		parent::setUp();
		$this->allowlist = new AlgorithmAllowlist();
	}

	public function testEcdsaP384Sha384PermittedG1False(): void {
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_ECDSA_P384_SHA384, false, $now);
		$this->assertTrue(true); // If we get here, no exception was thrown
	}

	public function testEcdsaP384Sha384PermittedG1True(): void {
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_ECDSA_P384_SHA384, true, $now);
		$this->assertTrue(true); // If we get here, no exception was thrown
	}

	public function testRsaPssSha384PermittedG1False(): void {
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_RSA_PSS_SHA384, false, $now);
		$this->assertTrue(true); // If we get here, no exception was thrown
	}

	public function testRsaPssSha384PermittedG1True(): void {
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_RSA_PSS_SHA384, true, $now);
		$this->assertTrue(true); // If we get here, no exception was thrown
	}

	public function testLegacyRsaPssSha1G1TrueBeforeSunset(): void {
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1, true, $now);
		$this->assertTrue(true); // If we get here, no exception was thrown
	}

	public function testLegacyRsaPssSha1G1TrueAfterSunset(): void {
		$now = new \DateTimeImmutable('2027-01-01T00:00:00Z');
		$this->expectException(BadAlgorithmException::class);
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1, true, $now);
	}

	public function testLegacyRsaPssSha1G1TrueAtSunset(): void {
		// Sunset is 2026-12-31T23:59:59Z, this is exactly at the sunset moment
		$now = new \DateTimeImmutable('2026-12-31T23:59:59Z');
		$this->expectException(BadAlgorithmException::class);
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1, true, $now);
	}

	public function testLegacyRsaPssSha1G1TrueOneSecondBeforeSunset(): void {
		// One second before sunset: 2026-12-31T23:59:58Z
		$now = new \DateTimeImmutable('2026-12-31T23:59:58Z');
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1, true, $now);
		$this->assertTrue(true); // If we get here, no exception was thrown
	}

	public function testLegacyRsaPssSha1G1False(): void {
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');
		$this->expectException(BadAlgorithmException::class);
		$this->allowlist->ensurePermitted(VerifierConstants::ALG_LEGACY_RSA_PSS_SHA1, false, $now);
	}

	public function testUnknownAlgorithm(): void {
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');
		$this->expectException(BadAlgorithmException::class);
		$this->allowlist->ensurePermitted('md5-nonsense', false, $now);
	}

	public function testBadAlgorithmExceptionHasCorrectReasonCode(): void {
		$now = new \DateTimeImmutable('2026-06-01T00:00:00Z');
		try {
			$this->allowlist->ensurePermitted('md5-nonsense', false, $now);
			$this->fail('Expected BadAlgorithmException to be thrown');
		} catch (BadAlgorithmException $e) {
			$this->assertSame('BAD_ALGORITHM', $e->getReasonCode());
		}
	}
}
