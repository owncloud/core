<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace Test\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Verifier\CanonicalManifest;
use Test\TestCase;

class CanonicalManifestTest extends TestCase {
	private $goldenDir;

	public function setUp(): void {
		parent::setUp();
		$this->goldenDir = __DIR__ . '/../../../data/integritycheck/golden';
	}

	/**
	 * Test golden vectors: tree-basic
	 */
	public function testGoldenTreeBasic() {
		$this->verifyGoldenVector('tree-basic');
	}

	/**
	 * Test golden vectors: tree-cruft
	 */
	public function testGoldenTreeCruft() {
		$this->verifyGoldenVector('tree-cruft');
	}

	/**
	 * Test golden vectors: tree-edge
	 */
	public function testGoldenTreeEdge() {
		$this->verifyGoldenVector('tree-edge');
	}

	/**
	 * Test golden vectors: tree-unicode
	 */
	public function testGoldenTreeUnicode() {
		$this->verifyGoldenVector('tree-unicode');
	}

	/**
	 * Verify a single golden vector
	 */
	private function verifyGoldenVector($treeDir) {
		$path = $this->goldenDir . '/' . $treeDir;
		$this->assertFileExists($path . '/manifest.canonical.json', 'Golden manifest file should exist');

		$raw = \file_get_contents($path . '/manifest.canonical.json');
		$this->assertIsString($raw);

		// Test 1: fromRawHashesBytes returns input unchanged (identity)
		$this->assertSame($raw, CanonicalManifest::fromRawHashesBytes($raw));

		// Test 2: Round-trip through decode and serialize
		$hashes = CanonicalManifest::decodeHashesMap($raw);
		$this->assertIsArray($hashes);
		$serialized = CanonicalManifest::serialize($hashes);
		$this->assertSame($raw, $serialized, "Serialized manifest should match golden for $treeDir");

		// Test 3: Verify the decoded hashes have the expected structure
		$this->assertIsArray($hashes);
		$this->assertGreaterThan(0, \count($hashes), "Decoded hashes map should not be empty for $treeDir");
	}

	/**
	 * Test escaping of double-quote character
	 */
	public function testEscapeDoubleQuote() {
		$hashes = ['key"with"quote' => 'value"with"quote'];
		$result = CanonicalManifest::serialize($hashes);
		// Verify that quotes are escaped
		$this->assertStringContainsString('key\\"with\\"quote', $result);
		$this->assertStringContainsString('value\\"with\\"quote', $result);
		// Verify round-trip
		$decoded = CanonicalManifest::decodeHashesMap($result);
		$this->assertSame($hashes, $decoded);
	}

	/**
	 * Test escaping of backslash character
	 */
	public function testEscapeBackslash() {
		$hashes = ['key\\with\\backslash' => 'value\\with\\backslash'];
		$result = CanonicalManifest::serialize($hashes);
		// Verify that backslashes are escaped (doubled)
		$this->assertStringContainsString('key\\\\with\\\\backslash', $result);
		$this->assertStringContainsString('value\\\\with\\\\backslash', $result);
		// Verify round-trip
		$decoded = CanonicalManifest::decodeHashesMap($result);
		$this->assertSame($hashes, $decoded);
	}

	/**
	 * Test escaping of tab character (0x09)
	 */
	public function testEscapeTab() {
		$hashes = ["key\twith\ttab" => "value\twith\ttab"];
		$result = CanonicalManifest::serialize($hashes);
		// Verify that tabs are escaped
		$this->assertStringContainsString('key\twith\ttab', $result);
		$this->assertStringContainsString('value\twith\ttab', $result);
		// Verify round-trip
		$decoded = CanonicalManifest::decodeHashesMap($result);
		$this->assertSame($hashes, $decoded);
	}

	/**
	 * Test escaping of newline character (0x0A)
	 */
	public function testEscapeNewline() {
		$hashes = ["key\nwith\nnewline" => "value\nwith\nnewline"];
		$result = CanonicalManifest::serialize($hashes);
		// Verify that newlines are escaped
		$this->assertStringContainsString('key\nwith\nnewline', $result);
		$this->assertStringContainsString('value\nwith\nnewline', $result);
		// Verify round-trip
		$decoded = CanonicalManifest::decodeHashesMap($result);
		$this->assertSame($hashes, $decoded);
	}

	/**
	 * Test escaping of control byte 0x01
	 */
	public function testEscapeControlByte() {
		$controlByte = \chr(0x01);
		$hashes = ["key{$controlByte}byte" => "value{$controlByte}byte"];
		$result = CanonicalManifest::serialize($hashes);
		// Verify that control byte is escaped as  (lowercase)
		$this->assertStringContainsString('\\u0001', $result);
		// Verify round-trip
		$decoded = CanonicalManifest::decodeHashesMap($result);
		$this->assertSame($hashes, $decoded);
	}

	/**
	 * Test that forward slash is NOT escaped
	 */
	public function testForwardSlashNotEscaped() {
		$hashes = ['path/to/file' => 'hash/value'];
		$result = CanonicalManifest::serialize($hashes);
		// Forward slash should NOT be escaped with backslash
		$this->assertStringNotContainsString('\\/', $result);
		// But should contain raw slashes
		$this->assertStringContainsString('path/to/file', $result);
		// Verify round-trip
		$decoded = CanonicalManifest::decodeHashesMap($result);
		$this->assertSame($hashes, $decoded);
	}

	/**
	 * Test that multibyte UTF-8 characters pass through as raw bytes
	 */
	public function testUtf8Passthrough() {
		$hashes = ['café/menü.txt' => 'hash'];
		$result = CanonicalManifest::serialize($hashes);
		// UTF-8 characters should appear verbatim
		$this->assertStringContainsString('café', $result);
		$this->assertStringContainsString('menü', $result);
		// Verify round-trip
		$decoded = CanonicalManifest::decodeHashesMap($result);
		$this->assertSame($hashes, $decoded);
	}
}
