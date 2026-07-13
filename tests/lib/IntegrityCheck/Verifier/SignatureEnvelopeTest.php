<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

declare(strict_types=1);

namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Verifier\SignatureEnvelope;
use OC\IntegrityCheck\Exceptions\MissingSignatureException;
use Test\TestCase;

class SignatureEnvelopeTest extends TestCase {
	private $fixtureDir = __DIR__ . '/../../../data/integritycheck/verifier';

	public function testParseV2Compact(): void {
		$json = file_get_contents($this->fixtureDir . '/signature-v2-compact.json');
		$envelope = SignatureEnvelope::parse($json);

		$this->assertFalse($envelope->isLegacyFormat());
		$this->assertSame(2, $envelope->getVersion());
		$this->assertSame('ecdsa-p384-sha384', $envelope->getAlg());
		$this->assertStringContainsString('BEGIN CERTIFICATE', $envelope->getLeafPem());
		$this->assertCount(1, $envelope->getChainPems());
		$this->assertStringContainsString('BEGIN CERTIFICATE', $envelope->getChainPems()[0]);
		$this->assertIsString($envelope->getSignatureBinary());

		// Crucially: getRawHashesBytes() must equal the golden manifest
		$goldenManifest = file_get_contents(__DIR__ . '/../../../data/integritycheck/golden/tree-basic/manifest.canonical.json');
		$this->assertSame($goldenManifest, $envelope->getRawHashesBytes());

		// getHashesMap() should decode successfully
		$hashes = $envelope->getHashesMap();
		$this->assertIsArray($hashes);
		$this->assertNotEmpty($hashes);
	}

	public function testParseV2Pretty(): void {
		$json = file_get_contents($this->fixtureDir . '/signature-v2-pretty.json');
		$envelope = SignatureEnvelope::parse($json);

		$this->assertFalse($envelope->isLegacyFormat());
		$this->assertSame(2, $envelope->getVersion());
		$this->assertSame('ecdsa-p384-sha384', $envelope->getAlg());

		// The raw hashes bytes will include the pretty-printed whitespace
		$rawBytes = $envelope->getRawHashesBytes();
		$this->assertStringStartsWith('{', $rawBytes);
		$this->assertStringEndsWith('}', $rawBytes);

		// But when decoded, the hashes map should match the compact version
		$goldenManifest = file_get_contents(__DIR__ . '/../../../data/integritycheck/golden/tree-basic/manifest.canonical.json');
		$goldenMap = json_decode($goldenManifest, true);
		$this->assertSame($goldenMap, $envelope->getHashesMap());
	}

	public function testParseV2WithHostileHashesKey(): void {
		// Craft a v2 envelope where filename KEYs contain characters that could confuse parsing:
		// - A closing brace: "file}name"
		// - The literal text "hashes": "nested-hashes-file"
		// - A double-quote: "weird\"key" (json_encode will escape it to weird\"key in JSON)
		// - Plus a normal key for sanity
		// Use json_encode to ensure valid JSON; the braces, "hashes", and quotes will land inside
		// string values where they cannot break the brace-balanced scan logic.
		$hashes = [
			'file}name' => '419d2b26aa9a7065a6a588e108587e631cf676c8366bb28fe5c4868c9290387b5cfcb3e9a08c220d852cabea5b58b66e12c53c65df2d16680ff6003172d18abf',
			'nested-hashes-file' => '2fafbce4571514444b5edd26e4ff01e42ddf0e81aacc15fda63f304ff019cff260bd4e5625aac4ac9efe81cbf38086f920ff3b7ba264048b7d62185cbded402a',
			'weird"key' => 'deadbeefcafecafecafecafecafecafecafecafecafecafecafecafecafecafecafecafecafecafecafecafecafecafebeef',
			'normal.txt' => 'abcdef0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef01'
		];

		$envelope = [
			'v' => 2,
			'alg' => 'ecdsa-p384-sha384',
			'hashes' => $hashes,
			'signature' => 'cGxhY2Vob2xkZXI=',
			'certificates' => [
				'leaf' => 'test',
				'chain' => []
			]
		];

		$json = json_encode($envelope);
		$parsed = SignatureEnvelope::parse($json);
		$rawBytes = $parsed->getRawHashesBytes();

		// The scan must extract exactly the hashes value despite hostile keys
		$this->assertStringStartsWith('{', $rawBytes);
		$this->assertStringEndsWith('}', $rawBytes);

		// Should be valid JSON and decode to exact original hashes
		$decoded = json_decode($rawBytes, true);
		$this->assertIsArray($decoded);
		$this->assertSame($hashes, $decoded);

		// getHashesMap() must also equal the same map
		$this->assertSame($hashes, $parsed->getHashesMap());
	}

	public function testParseLegacy(): void {
		$json = file_get_contents($this->fixtureDir . '/signature-legacy.json');
		$envelope = SignatureEnvelope::parse($json);

		$this->assertTrue($envelope->isLegacyFormat());
		$this->assertSame(1, $envelope->getVersion());
		$this->assertNull($envelope->getAlg());
		$this->assertStringContainsString('BEGIN CERTIFICATE', $envelope->getLeafPem());
		$this->assertSame([], $envelope->getChainPems());
		$this->assertIsArray($envelope->getHashesMap());
		$this->assertNotEmpty($envelope->getHashesMap());
	}

	public function testErrorEmptyString(): void {
		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse('');
	}

	public function testErrorNotJson(): void {
		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse('not json');
	}

	public function testErrorJsonArray(): void {
		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse('[]');
	}

	public function testErrorMissingHashes(): void {
		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse('{"signature":"base64","certificate":"pem"}');
	}

	public function testErrorMissingBothCertificateAndCertificates(): void {
		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse('{"hashes":{}}');
	}

	public function testErrorInvalidBase64Signature(): void {
		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse('{"hashes":{},"signature":"!!!invalid!!!","certificate":"-----BEGIN CERTIFICATE-----\ntest\n-----END CERTIFICATE-----"}');
	}

	public function testErrorHashesNotObject(): void {
		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse('{"hashes":"not-an-object","signature":"cGxhY2Vob2xkZXI=","certificate":"pem"}');
	}
}
