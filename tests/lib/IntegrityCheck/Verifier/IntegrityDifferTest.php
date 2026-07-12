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

use OC\IntegrityCheck\Verifier\IntegrityDiffer;
use Test\TestCase;

class IntegrityDifferTest extends TestCase {
	private $differ;

	public function setUp(): void {
		parent::setUp();
		$this->differ = new IntegrityDiffer();
	}

	public function testClean() {
		$expected = [
			'file1.txt' => 'hash1',
			'file2.txt' => 'hash2',
		];
		$current = [
			'file1.txt' => 'hash1',
			'file2.txt' => 'hash2',
		];

		$result = $this->differ->diff($expected, $current);
		$this->assertSame([], $result);
	}

	public function testInvalidHash() {
		$expected = [
			'file1.txt' => 'expectedHash1',
		];
		$current = [
			'file1.txt' => 'currentHash1',
		];

		$result = $this->differ->diff($expected, $current);
		$this->assertSame([
			'INVALID_HASH' => [
				'file1.txt' => [
					'expected' => 'expectedHash1',
					'current' => 'currentHash1',
				],
			],
		], $result);
	}

	public function testFileMissing() {
		$expected = [
			'file1.txt' => 'hash1',
		];
		$current = [];

		$result = $this->differ->diff($expected, $current);
		$this->assertSame([
			'FILE_MISSING' => [
				'file1.txt' => [
					'expected' => 'hash1',
					'current' => '',
				],
			],
		], $result);
	}

	public function testExtraFile() {
		$expected = [];
		$current = [
			'file1.txt' => 'hash1',
		];

		$result = $this->differ->diff($expected, $current);
		$this->assertSame([
			'EXTRA_FILE' => [
				'file1.txt' => [
					'expected' => '',
					'current' => 'hash1',
				],
			],
		], $result);
	}

	public function testMixed() {
		$expected = [
			'unchanged.txt' => 'hash1',
			'invalid.txt' => 'expectedHash2',
			'missing.txt' => 'hash3',
		];
		$current = [
			'unchanged.txt' => 'hash1',
			'invalid.txt' => 'currentHash2',
			'extra.txt' => 'hash4',
		];

		$result = $this->differ->diff($expected, $current);
		$this->assertSame([
			'INVALID_HASH' => [
				'invalid.txt' => [
					'expected' => 'expectedHash2',
					'current' => 'currentHash2',
				],
			],
			'FILE_MISSING' => [
				'missing.txt' => [
					'expected' => 'hash3',
					'current' => '',
				],
			],
			'EXTRA_FILE' => [
				'extra.txt' => [
					'expected' => '',
					'current' => 'hash4',
				],
			],
		], $result);
	}

	public function testExcludedFiles() {
		$expected = [
			'included.txt' => 'hash1',
			'excluded.txt' => 'expectedHash2',
		];
		$current = [
			'included.txt' => 'differentHash1',
			'excluded.txt' => 'currentHash2',
		];

		$result = $this->differ->diff($expected, $current, ['excluded.txt']);
		$this->assertSame([
			'INVALID_HASH' => [
				'included.txt' => [
					'expected' => 'hash1',
					'current' => 'differentHash1',
				],
			],
		], $result);
	}

	public function testExcludedExtraFile() {
		$expected = [];
		$current = [
			'extra1.txt' => 'hash1',
			'extra2.txt' => 'hash2',
		];

		$result = $this->differ->diff($expected, $current, ['extra1.txt']);
		$this->assertSame([
			'EXTRA_FILE' => [
				'extra2.txt' => [
					'expected' => '',
					'current' => 'hash2',
				],
			],
		], $result);
	}

	public function testGoldenTreeBasic() {
		$basePath = \OC::$SERVERROOT . '/tests/data/integritycheck/golden/tree-basic';
		$hashesJson = \file_get_contents($basePath . '/hashes.expected.json');
		$expected = \json_decode($hashesJson, true);

		// Test with identical current hashes -> clean
		$result = $this->differ->diff($expected, $expected);
		$this->assertSame([], $result);

		// Test with one hash modified
		$current = $expected;
		$current['js/app.js'] = 'mutated_hash_value';

		$result = $this->differ->diff($expected, $current);
		$this->assertSame([
			'INVALID_HASH' => [
				'js/app.js' => [
					'expected' => $expected['js/app.js'],
					'current' => 'mutated_hash_value',
				],
			],
		], $result);
	}
}
