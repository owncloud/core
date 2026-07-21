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

	/**
	 * A key that is a PREFIX of "hashes" (e.g. "hash") must NOT be mistaken for the
	 * real hashes key. The scanner compares the full key, so the value of "hash"
	 * (a string) must be skipped and the real "hashes" object extracted.
	 */
	public function testExtractRawHashesIgnoresPrefixKey(): void {
		$json = '{"hash":"not-the-object","hashes":{"a.txt":"' . \str_repeat('a', 128) . '"},"signature":"cGxhY2Vob2xkZXI=","certificate":"-----BEGIN CERTIFICATE-----\ntest\n-----END CERTIFICATE-----"}';
		$envelope = SignatureEnvelope::parse($json);

		$this->assertSame('{"a.txt":"' . \str_repeat('a', 128) . '"}', $envelope->getRawHashesBytes());
		$this->assertSame(['a.txt' => \str_repeat('a', 128)], $envelope->getHashesMap());
	}

	/**
	 * The hashes object need not be the first key. A "certificates" object appearing
	 * BEFORE hashes (with its own nested braces) must not throw off the depth tracking.
	 */
	public function testExtractRawHashesWhenNotFirstKey(): void {
		$hashesRaw = '{"z.txt":"' . \str_repeat('b', 128) . '"}';
		$json = '{"v":2,"alg":"ecdsa-p384-sha384","certificates":{"leaf":"L","chain":[]},"signature":"cGxhY2Vob2xkZXI=","hashes":' . $hashesRaw . '}';
		$envelope = SignatureEnvelope::parse($json);

		$this->assertSame($hashesRaw, $envelope->getRawHashesBytes());
		$this->assertSame(['z.txt' => \str_repeat('b', 128)], $envelope->getHashesMap());
	}

	/**
	 * A hash VALUE that contains braces and the literal text "hashes" inside a JSON
	 * string must not confuse the brace-balanced scan of the hashes object itself.
	 */
	public function testExtractRawHashesWithBraceAndHashesTextInsideValue(): void {
		$hashes = [
			'weird{key}.txt' => 'value-with-"hashes"-and-}brace{-text',
			'normal.txt' => \str_repeat('c', 128),
		];
		$json = \json_encode([
			'v' => 2,
			'alg' => 'ecdsa-p384-sha384',
			'hashes' => $hashes,
			'signature' => 'cGxhY2Vob2xkZXI=',
			'certificates' => ['leaf' => 'L', 'chain' => []],
		]);

		$envelope = SignatureEnvelope::parse($json);
		$decoded = \json_decode($envelope->getRawHashesBytes(), true);
		$this->assertSame($hashes, $decoded);
		$this->assertSame($hashes, $envelope->getHashesMap());
	}

	/**
	 * A value ending in an escaped backslash immediately followed by the closing
	 * quote (\\") exercises the escape-handling in the string-aware scan: the quote
	 * after an escaped backslash is a real closing quote, not an escaped one.
	 */
	public function testExtractRawHashesWithTrailingEscapedBackslashInValue(): void {
		$hashes = [
			'path\\' => \str_repeat('d', 128),
			'normal.txt' => \str_repeat('e', 128),
		];
		$json = \json_encode([
			'v' => 2,
			'hashes' => $hashes,
			'signature' => 'cGxhY2Vob2xkZXI=',
			'certificates' => ['leaf' => 'L'],
		]);

		$envelope = SignatureEnvelope::parse($json);
		$this->assertSame($hashes, \json_decode($envelope->getRawHashesBytes(), true));
		$this->assertSame($hashes, $envelope->getHashesMap());
	}

	/**
	 * Pretty-printed JSON with whitespace/newlines between the "hashes" key, the
	 * colon, and the opening brace must still locate and extract the exact object
	 * span (whitespace inside the object is preserved verbatim in the raw bytes).
	 */
	public function testExtractRawHashesWithWhitespaceAroundColon(): void {
		$json = "{\n  \"v\": 2,\n  \"hashes\"  :  {\n    \"a.txt\": \"" . \str_repeat('f', 128) . "\"\n  },\n  \"signature\": \"cGxhY2Vob2xkZXI=\",\n  \"certificates\": { \"leaf\": \"L\" }\n}";
		$envelope = SignatureEnvelope::parse($json);

		$raw = $envelope->getRawHashesBytes();
		$this->assertStringStartsWith('{', $raw);
		$this->assertStringEndsWith('}', $raw);
		$this->assertSame(['a.txt' => \str_repeat('f', 128)], \json_decode($raw, true));
		$this->assertSame(['a.txt' => \str_repeat('f', 128)], $envelope->getHashesMap());
	}

	/**
	 * An empty hashes object is structurally valid; the scan must return exactly "{}".
	 * (getHashesMap then decodes to an empty array.)
	 */
	public function testExtractRawHashesEmptyObject(): void {
		$json = '{"v":2,"hashes":{},"signature":"cGxhY2Vob2xkZXI=","certificates":{"leaf":"L"}}';
		$envelope = SignatureEnvelope::parse($json);

		$this->assertSame('{}', $envelope->getRawHashesBytes());
		$this->assertSame([], $envelope->getHashesMap());
	}

	/**
	 * A "hashes" value that is present but is NOT an object (e.g. a string) must be
	 * rejected: the scan requires an opening brace after the colon.
	 */
	public function testExtractRawHashesRejectsNonObjectValue(): void {
		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse('{"hashes":"a-string","signature":"cGxhY2Vob2xkZXI=","certificate":"pem"}');
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

	/**
	 * An envelope carrying an unknown version must be rejected rather than parsed
	 * with v2 canonicalization rules — a future v3 could reconstruct wrong signed bytes.
	 */
	public function testErrorUnknownVersion(): void {
		$envelope = [
			'v' => 99,
			'alg' => 'ecdsa-p384-sha384',
			'hashes' => ['normal.txt' => 'abcdef0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef01'],
			'signature' => 'cGxhY2Vob2xkZXI=',
			'certificates' => [
				'leaf' => 'test',
				'chain' => []
			]
		];

		$this->expectException(MissingSignatureException::class);
		SignatureEnvelope::parse(json_encode($envelope));
	}
}
