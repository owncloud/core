<?php
/**
 *
 * @author Juan Pablo Villafáñez Ramos <jvillafanez@owncloud.com>
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace Test;

use OC\Utf8Analyzer;

class Utf8AnalyzerTest extends \Test\TestCase {
	private \OC\Utf8Analyzer $utf8Analyzer;

	private $openedStream;

	protected function setUp(): void {
		$this->utf8Analyzer = new Utf8Analyzer();
	}

	protected function tearDown(): void {
		if (\is_resource($this->openedStream)) {
			\fclose($this->openedStream);
			$this->openedStream = null;
		}
	}

	public function analyzeStreamProvider() {
		return [
			[
				'data://text/plain;base64,4KSc4KS+4KSKIOCkpOCljeCkr+CkueCkvuCkgQrgpKzgpL/gpLngpL7gpKgK',
				['count'],
				PHP_INT_MAX,
				[
					"count" => [
						"Devanagari" => 14,
						"Common" => 3,
					]
				]
			],
			[
				'data://text/plain;base64,4KSc4KS+4KSKIOCkpOCljeCkr+CkueCkvuCkgQrgpKzgpL/gpLngpL7gpKgK',
				['count', 'lines'],
				PHP_INT_MAX,
				[
					"count" => [
						"Devanagari" => 14,
						"Common" => 3,
					],
					"lines" => [
						"linesNumber" => 3,
						"lines" => [
							["ज", \mb_chr(2366), "ऊ", " ", "त", \mb_chr(2381), "य", "ह", \mb_chr(2366), \mb_chr(2305)],
							["ब", \mb_chr(2367), "ह", \mb_chr(2366), "न"]
						]
					],
				]
			],
			[
				'data://text/plain;base64,4KSc4KS+4KSKIOCkpOCljeCkr+CkueCkvuCkgQrgpKzgpL/gpLngpL7gpKgK',
				['count', 'details', 'lines'],
				PHP_INT_MAX,
				[
					"count" => [
						"Devanagari" => 14,
						"Common" => 3,
					],
					"details" => [
						["range" => "0-2", "str" => "ज", "unicode" => 2332, "unicodeHex" => "91c", "script" => "Devanagari"],
						["range" => "3-5", "str" => \mb_chr(2366), "unicode" => 2366, "unicodeHex" => "93e", "script" => "Devanagari"],
						["range" => "6-8", "str" => "ऊ", "unicode" => 2314, "unicodeHex" => "90a", "script" => "Devanagari"],
						["range" => "9-9", "str" => " ", "unicode" => 32, "unicodeHex" => "20", "script" => "Common"],
						["range" => "10-12", "str" => "त", "unicode" => 2340, "unicodeHex" => "924", "script" => "Devanagari"],
						["range" => "13-15", "str" => \mb_chr(2381), "unicode" => 2381, "unicodeHex" => "94d", "script" => "Devanagari"],
						["range" => "16-18", "str" => "य", "unicode" => 2351, "unicodeHex" => "92f", "script" => "Devanagari"],
						["range" => "19-21", "str" => "ह", "unicode" => 2361, "unicodeHex" => "939", "script" => "Devanagari"],
						["range" => "22-24", "str" => \mb_chr(2366), "unicode" => 2366, "unicodeHex" => "93e", "script" => "Devanagari"],
						["range" => "25-27", "str" => \mb_chr(2305), "unicode" => 2305, "unicodeHex" => "901", "script" => "Devanagari"],
						["range" => "28-28", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
						["range" => "29-31", "str" => "ब", "unicode" => 2348, "unicodeHex" => "92c", "script" => "Devanagari"],
						["range" => "32-34", "str" => \mb_chr(2367), "unicode" => 2367, "unicodeHex" => "93f", "script" => "Devanagari"],
						["range" => "35-37", "str" => "ह", "unicode" => 2361, "unicodeHex" => "939", "script" => "Devanagari"],
						["range" => "38-40", "str" => \mb_chr(2366), "unicode" => 2366, "unicodeHex" => "93e", "script" => "Devanagari"],
						["range" => "41-43", "str" => "न", "unicode" => 2344, "unicodeHex" => "928", "script" => "Devanagari"],
						["range" => "44-44", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
					],
					"lines" => [
						"linesNumber" => 3,
						"lines" => [
							["ज", \mb_chr(2366), "ऊ", " ", "त", \mb_chr(2381), "य", "ह", \mb_chr(2366), \mb_chr(2305)],
							["ब", \mb_chr(2367), "ह", \mb_chr(2366), "न"]
						]
					],
				]
			],
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count'],
				PHP_INT_MAX,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 3,
						"Common" => 2,
					]
				],
			],
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count', 'lines'],
				PHP_INT_MAX,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 3,
						"Common" => 2,
					],
					"lines" => [
						"linesNumber" => 3,
						"lines" => [
							["に", "移", "動"],
							["朝"]
						]
					]
				],
			],
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count', 'details', 'lines'],
				PHP_INT_MAX,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 3,
						"Common" => 2,
					],
					"details" => [
						["range" => "0-2", "str" => "に", "unicode" => 12395, "unicodeHex" => "306b", "script" => "Hiragana"],
						["range" => "3-5", "str" => "移", "unicode" => 31227, "unicodeHex" => "79fb", "script" => "Han"],
						["range" => "6-8", "str" => "動", "unicode" => 21205, "unicodeHex" => "52d5", "script" => "Han"],
						["range" => "9-9", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
						["range" => "10-12", "str" => "朝", "unicode" => 26397, "unicodeHex" => "671d", "script" => "Han"],
						["range" => "13-13", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
					],
					"lines" => [
						"linesNumber" => 3,
						"lines" => [
							["に", "移", "動"],
							["朝"]
						]
					]
				],
			],
			[
				'data://text/plain;base64,2KfYsNmH2Kgg2KXZhNmJCti12KjYp9itIAo=',
				['count'],
				PHP_INT_MAX,
				[
					"count" => [
						"Arabic" => 11,
						"Common" => 4
					]
				]
			],
			[
				'data://text/plain;base64,2KfYsNmH2Kgg2KXZhNmJCti12KjYp9itIAo=',
				['count', 'lines'],
				PHP_INT_MAX,
				[
					"count" => [
						"Arabic" => 11,
						"Common" => 4
					],
					"lines" => [
						"linesNumber" => 3,
						"lines" => [
							["ا", "ذ", "ه", "ب", " ", "إ", "ل", "ى"],
							["ص", "ب", "ا", "ح", " "]
						]
					]
				]
			],
			[
				'data://text/plain;base64,2KfYsNmH2Kgg2KXZhNmJCti12KjYp9itIAo=',
				['count', 'details', 'lines'],
				PHP_INT_MAX,
				[
					"count" => [
						"Arabic" => 11,
						"Common" => 4
					],
					"details" => [
						["range" => "0-1", "str" => "ا", "unicode" => 1575, "unicodeHex" => "627", "script" => "Arabic"],
						["range" => "2-3", "str" => "ذ", "unicode" => 1584, "unicodeHex" => "630", "script" => "Arabic"],
						["range" => "4-5", "str" => "ه", "unicode" => 1607, "unicodeHex" => "647", "script" => "Arabic"],
						["range" => "6-7", "str" => "ب", "unicode" => 1576, "unicodeHex" => "628", "script" => "Arabic"],
						["range" => "8-8", "str" => " ", "unicode" => 32, "unicodeHex" => "20", "script" => "Common"],
						["range" => "9-10", "str" => "إ", "unicode" => 1573, "unicodeHex" => "625", "script" => "Arabic"],
						["range" => "11-12", "str" => "ل", "unicode" => 1604, "unicodeHex" => "644", "script" => "Arabic"],
						["range" => "13-14", "str" => "ى", "unicode" => 1609, "unicodeHex" => "649", "script" => "Arabic"],
						["range" => "15-15", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
						["range" => "16-17", "str" => "ص", "unicode" => 1589, "unicodeHex" => "635", "script" => "Arabic"],
						["range" => "18-19", "str" => "ب", "unicode" => 1576, "unicodeHex" => "628", "script" => "Arabic"],
						["range" => "20-21", "str" => "ا", "unicode" => 1575, "unicodeHex" => "627", "script" => "Arabic"],
						["range" => "22-23", "str" => "ح", "unicode" => 1581, "unicodeHex" => "62d", "script" => "Arabic"],
						["range" => "24-24", "str" => " ", "unicode" => 32, "unicodeHex" => "20", "script" => "Common"],
						["range" => "25-25", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
					],
					"lines" => [
						"linesNumber" => 3,
						"lines" => [
							["ا", "ذ", "ه", "ب", " ", "إ", "ل", "ى"],
							["ص", "ب", "ا", "ح", " "]
						]
					]
				]
			],
			// Include BOM marker at the beginning
			[
				'data://text/plain;base64,77u/bGHMiHJsIMOxbwo=',
				['count', 'details', 'lines'],
				PHP_INT_MAX,
				[
					"count" => [
						"_unknown" => 2,
						"Latin" => 6,
						"Common" => 2,
					],
					"details" => [
						["range" => "0-2", "str" => "﻿", "unicode" => 65279, "unicodeHex" => "feff", "script" => "_unknown"],
						["range" => "3-3", "str" => "l", "unicode" => 108, "unicodeHex" => "6c", "script" => "Latin"],
						["range" => "4-4", "str" => "a", "unicode" => 97, "unicodeHex" => "61", "script" => "Latin"],
						["range" => "5-6", "str" => \mb_chr(776), "unicode" => 776, "unicodeHex" => "308", "script" => "_unknown"],
						["range" => "7-7", "str" => "r", "unicode" => 114, "unicodeHex" => "72", "script" => "Latin"],
						["range" => "8-8", "str" => "l", "unicode" => 108, "unicodeHex" => "6c", "script" => "Latin"],
						["range" => "9-9", "str" => " ", "unicode" => 32, "unicodeHex" => "20", "script" => "Common"],
						["range" => "10-11", "str" => "ñ", "unicode" => 241, "unicodeHex" => "f1", "script" => "Latin"],
						["range" => "12-12", "str" => "o", "unicode" => 111, "unicodeHex" => "6f", "script" => "Latin"],
						["range" => "13-13", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
					],
					"lines" => [
						"linesNumber" => 2,
						"lines" => [
							["﻿", "l", "a", \mb_chr(776), "r", "l", " ", "ñ", "o"],
						]
					]
				],
			],
			// with limited chars
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count'],
				6,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 1,
					],
				],
			],
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count', 'lines'],
				6,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 1,
					],
					"lines" => [
						"linesNumber" => 1,
						"lines" => [
							["に", "移"],
						]
					]
				],
			],
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count', 'details', 'lines'],
				6,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 1,
					],
					"details" => [
						["range" => "0-2", "str" => "に", "unicode" => 12395, "unicodeHex" => "306b", "script" => "Hiragana"],
						["range" => "3-5", "str" => "移", "unicode" => 31227, "unicodeHex" => "79fb", "script" => "Han"],
					],
					"lines" => [
						"linesNumber" => 1,
						"lines" => [
							["に", "移"],
						]
					]
				],
			],
			// with 4 bytes read -> second char is cut
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count'],
				4,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 1,
					],
				],
			],
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count', 'lines'],
				4,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 1,
					],
					"lines" => [
						"linesNumber" => 1,
						"lines" => [
							["に", "移"],
						]
					]
				],
			],
			[
				'data://text/plain;base64,44Gr56e75YuVCuacnQo=',
				['count', 'details', 'lines'],
				4,
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 1,
					],
					"details" => [
						["range" => "0-2", "str" => "に", "unicode" => 12395, "unicodeHex" => "306b", "script" => "Hiragana"],
						["range" => "3-5", "str" => "移", "unicode" => 31227, "unicodeHex" => "79fb", "script" => "Han"],
					],
					"lines" => [
						"linesNumber" => 1,
						"lines" => [
							["に", "移"],
						]
					]
				],
			]
		];
	}

	/**
	 * @dataProvider analyzeStreamProvider
	 */
	public function testAnalyzeStream($streamToOpen, $processors, $maxBytes, $expectedResult) {
		$this->openedStream = \fopen($streamToOpen, 'rb');
		$result = $this->utf8Analyzer->analyzeStream($this->openedStream, $processors, $maxBytes);
		$this->assertEquals($expectedResult, $result);
		// openedStream will be closed during tearDown
	}

	public function analyzeStringProvider() {
		return [
			[
				"に移動\n朝",
				['count'],
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 3,
						"Common" => 1,
					]
				],
			],
			[
				"に移動\n朝",
				['count', 'lines'],
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 3,
						"Common" => 1,
					],
					"lines" => [
						"linesNumber" => 2,
						"lines" => [
							["に", "移", "動"],
							["朝"]
						]
					]
				],
			],
			[
				"に移動\n朝",
				['count', 'details', 'lines'],
				[
					"count" => [
						"Hiragana" => 1,
						"Han" => 3,
						"Common" => 1,
					],
					"details" => [
						["range" => "0-2", "str" => "に", "unicode" => 12395, "unicodeHex" => "306b", "script" => "Hiragana"],
						["range" => "3-5", "str" => "移", "unicode" => 31227, "unicodeHex" => "79fb", "script" => "Han"],
						["range" => "6-8", "str" => "動", "unicode" => 21205, "unicodeHex" => "52d5", "script" => "Han"],
						["range" => "9-9", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
						["range" => "10-12", "str" => "朝", "unicode" => 26397, "unicodeHex" => "671d", "script" => "Han"],
					],
					"lines" => [
						"linesNumber" => 2,
						"lines" => [
							["に", "移", "動"],
							["朝"]
						]
					]
				],
			],
			[
				"이동\n아침",
				['count'],
				[
					"count" => [
						"Hangul" => 4,
						"Common" => 1,
					]
				],
			],
			[
				"이동\n아침",
				['count', 'lines'],
				[
					"count" => [
						"Hangul" => 4,
						"Common" => 1,
					],
					"lines" => [
						"linesNumber" => 2,
						"lines" => [
							["이", "동"],
							["아", "침"]
						]
					]
				],
			],
			[
				"이동\n아침",
				['count', 'details', 'lines'],
				[
					"count" => [
						"Hangul" => 4,
						"Common" => 1,
					],
					"details" => [
						["range" => "0-2", "str" => "이", "unicode" => 51060, "unicodeHex" => "c774", "script" => "Hangul"],
						["range" => "3-5", "str" => "동", "unicode" => 46041, "unicodeHex" => "b3d9", "script" => "Hangul"],
						["range" => "6-6", "str" => "\n", "unicode" => 10, "unicodeHex" => "a", "script" => "Common"],
						["range" => "7-9", "str" => "아", "unicode" => 50500, "unicodeHex" => "c544", "script" => "Hangul"],
						["range" => "10-12", "str" => "침", "unicode" => 52840, "unicodeHex" => "ce68", "script" => "Hangul"],
					],
					"lines" => [
						"linesNumber" => 2,
						"lines" => [
							["이", "동"],
							["아", "침"]
						]
					]
				],
			],
			// Include BOM marker at the beginning
			[
				"\xef\xbb\xbflat pos",
				['count'],
				[
					"count" => [
						"_unknown" => 1,
						"Latin" => 6,
						"Common" => 1,
					],
				],
			],
			[
				"\xef\xbb\xbflat pos",
				['count', 'lines'],
				[
					"count" => [
						"_unknown" => 1,
						"Latin" => 6,
						"Common" => 1,
					],
					"lines" => [
						"linesNumber" => 1,
						"lines" => [
							["﻿", "l", "a", "t", " ", "p", "o", "s"],
						]
					]
				],
			],
			[
				"\xef\xbb\xbflat pos",
				['count', 'details', 'lines'],
				[
					"count" => [
						"_unknown" => 1,
						"Latin" => 6,
						"Common" => 1,
					],
					"details" => [
						["range" => "0-2", "str" => "﻿", "unicode" => 65279, "unicodeHex" => "feff", "script" => "_unknown"],
						["range" => "3-3", "str" => "l", "unicode" => 108, "unicodeHex" => "6c", "script" => "Latin"],
						["range" => "4-4", "str" => "a", "unicode" => 97, "unicodeHex" => "61", "script" => "Latin"],
						["range" => "5-5", "str" => "t", "unicode" => 116, "unicodeHex" => "74", "script" => "Latin"],
						["range" => "6-6", "str" => " ", "unicode" => 32, "unicodeHex" => "20", "script" => "Common"],
						["range" => "7-7", "str" => "p", "unicode" => 112, "unicodeHex" => "70", "script" => "Latin"],
						["range" => "8-8", "str" => "o", "unicode" => 111, "unicodeHex" => "6f", "script" => "Latin"],
						["range" => "9-9", "str" => "s", "unicode" => 115, "unicodeHex" => "73", "script" => "Latin"],
					],
					"lines" => [
						"linesNumber" => 1,
						"lines" => [
							["﻿", "l", "a", "t", " ", "p", "o", "s"],
						]
					]
				],
			],
		];
	}

	/**
	 * @dataProvider analyzeStringProvider
	 */
	public function testAnalyzeString($str, $processors, $expectedResult) {
		$result = $this->utf8Analyzer->analyzeString($str, $processors);
		$this->assertEquals($expectedResult, $result);
	}
}
