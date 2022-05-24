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

namespace OC;

class Utf8Analyzer {
	/**
	 * https://en.wikipedia.org/wiki/UTF-8
	 * Ranges to determine how many bytes we need to read based on the first byte read.
	 */
	private $utf8Ranges = [
		"1b" => [0x00, 0x7f],
		"2b" => [0xc0, 0xdf],
		"3b" => [0xe0, 0xef],
		"4b" => [0xf0, 0xf7],
		// ranges [0x80, 0xbf] and [0xf8, 0xff] aren't defined
	];

	/**
	 * https://en.wikipedia.org/wiki/Unicode_block
	 * Unicode block ranges
	 * Keep the list sorted to be able to do a binary search
	 * NOTE: The list is incomplete and might be inaccurate with some symbols
	 */
	private $unicodeRanges = [
		['range' => [0x0000, 0x0040], 'script' => 'Common'],
		['range' => [0x0041, 0x005a], 'script' => 'Latin'],
		['range' => [0x005b, 0x0060], 'script' => 'Common'],
		['range' => [0x0061, 0x007a], 'script' => 'Latin'],
		['range' => [0x007b, 0x00bf], 'script' => 'Common'],
		['range' => [0x00c0, 0x00d6], 'script' => 'Latin'],
		['range' => [0x00d7, 0x00d7], 'script' => 'Common'],
		['range' => [0x00d8, 0x00f6], 'script' => 'Latin'],
		['range' => [0x00f7, 0x00f7], 'script' => 'Common'],
		['range' => [0x00f8, 0x024f], 'script' => 'Latin'],
		['range' => [0x0370, 0x03e1], 'script' => 'Greek'],
		['range' => [0x03f0, 0x03ff], 'script' => 'Greek'],
		['range' => [0x0590, 0x05ff], 'script' => 'Hebrew'],
		['range' => [0x0600, 0x06ff], 'script' => 'Arabic'],
		['range' => [0x0750, 0x077f], 'script' => 'Arabic'],
		['range' => [0x0870, 0x08ff], 'script' => 'Arabic'],
		['range' => [0x0900, 0x097f], 'script' => 'Devanagari'],
		['range' => [0x1100, 0x11ff], 'script' => 'Hangul'],
		['range' => [0x1cd0, 0x1cff], 'script' => 'Common'],
		['range' => [0x1e00, 0x1eff], 'script' => 'Latin'],
		['range' => [0x1f00, 0x1fff], 'script' => 'Greek'],
		['range' => [0x2000, 0x2070], 'script' => 'Common'],
		['range' => [0x2071, 0x2071], 'script' => 'Latin'],
		['range' => [0x2074, 0x207e], 'script' => 'Common'],
		['range' => [0x207f, 0x207f], 'script' => 'Latin'],
		['range' => [0x2080, 0x208e], 'script' => 'Common'],
		['range' => [0x2090, 0x209c], 'script' => 'Latin'],
		['range' => [0x2150, 0x215f], 'script' => 'Common'],
		['range' => [0x2160, 0x2188], 'script' => 'Latin'],
		['range' => [0x2189, 0x218b], 'script' => 'Common'],
		['range' => [0x2190, 0x27ff], 'script' => 'Common'],
		['range' => [0x2900, 0x2bff], 'script' => 'Common'],
		['range' => [0x2c60, 0x2c7f], 'script' => 'Latin'],
		['range' => [0x2e80, 0x2fdf], 'script' => 'Han'],
		['range' => [0x3040, 0x309f], 'script' => 'Hiragana'],
		['range' => [0x30a0, 0x30ff], 'script' => 'Katakana'],
		['range' => [0x3130, 0x318f], 'script' => 'Hangul'],
		['range' => [0x31f0, 0x31ff], 'script' => 'Katakana'],
		['range' => [0x3200, 0x321e], 'script' => 'Hangul'],
		['range' => [0x3260, 0x327f], 'script' => 'Hangul'],
		['range' => [0x32d0, 0x3357], 'script' => 'Katakana'],
		['range' => [0x3400, 0x4dbf], 'script' => 'Han'],
		['range' => [0x4e00, 0x9fff], 'script' => 'Han'],
		['range' => [0xa720, 0xa7ff], 'script' => 'Latin'],
		['range' => [0xa8e0, 0xa8ff], 'script' => 'Devanagari'],
		['range' => [0xa960, 0xa97f], 'script' => 'Hangul'],
		['range' => [0xab30, 0xab6f], 'script' => 'Latin'],
		['range' => [0xac00, 0xd7ff], 'script' => 'Hangul'],
		['range' => [0xf900, 0xfaff], 'script' => 'Han'],
		['range' => [0xfb1d, 0xfb4f], 'script' => 'Hebrew'],  // some unicode chars aren't assigned
		['range' => [0xfb50, 0xfdff], 'script' => 'Arabic'],
		['range' => [0xfe70, 0xfefc], 'script' => 'Arabic'],
	];

	/**
	 * Analyze the stream to get statistics. The stream is assumed to be encoded in utf8,
	 * otherwise, the function will return garbage.
	 * The function will return data based on the "processors" requested. Currently, these are
	 * the available processors:
	 * - "count": to return the number of chars per script ("Latin", "Han", "Hangul", etc) found
	 * in the stream
	 * - "details": to return a list of detailed info per unicode char. The info includes
	 * the byte range for the unicode char, the unicode char, the associated unicode code point
	 * both as int and as hex string, and the detected script. This is mostly for debugging
	 * purposes.
	 * - "lines": to return line information found in the stream. It will return the number of
	 * lines (it might be slightly inaccurate, the end of file could be counted as new line and
	 * count an additional line), and a list containing the chars per line.
	 *
	 * Since the current script list is incomplete, characters that doesn't belong to any known
	 * group will be grouped under the "_unknown" script. Common punctuation symbols are grouped
	 * under the "Common" script
	 *
	 * An possible result could be (assuming all the "processors" are activated)
	 * {
	 *     "count": {
	 *         "Arabic": 3,
	 *         "Common": 1
	 *     },
	 *     "details": [
	 *         {
	 *             "range": "0-1",
	 *             "str": "ك",
	 *             "unicode": 1603,
	 *             "unicodeHex": "643",
	 *             "script": "Arabic"
	 *         },
	 *         {
	 *             "range": "2-3",
	 *             "str": "ن",
	 *             "unicode": 1606,
	 *             "unicodeHex": "646",
	 *             "script": "Arabic"
	 *         },
	 *         {
	 *             "range": "4-4",
	 *             "str": " ",
	 *             "unicode": 32,
	 *             "unicodeHex": "20",
	 *             "script": "Common"
	 *         },
	 *         {
	 *             "range": "5-6",
	 *             "str": "و",
	 *             "unicode": 1608,
	 *             "unicodeHex": "648",
	 *             "script": "Arabic"
	 *         }
	 *     ],
	 *     "lines": {
	 *         "linesNumber": 1,
	 *         "lines": [
	 *             [
	 *                 "ك",
	 *                 "ن",
	 *                 " ",
	 *                 "و"
	 *             ]
	 *         ]
	 *     }
	 * }
	 *
	 * Each processor will show its information under its own key (matching the processor's name)
	 *
	 * The analisis starts from the current stream pointer position, wherever it is,
	 * until "maxBytes" have been read (PHP_INT_MAX by default) or the end of the stream.
	 * Note that this function won't open nor close the stream, and won't rewind the stream
	 * pointer position
	 *
	 * @param resource $stream the opened stream to be analized
	 * @param array $processors a list containing the processor names to be used.
	 * Known names are "count", "details" and "lines". Processors that aren't in the list
	 * won't be used and won't appear in the result
	 * @param int $maxBytes the maximum number of bytes to read. Some additional bytes might
	 * be read to fit a complete utf8 character
	 * @return array a map as described above. Note that a processor that hasn't been activated
	 * won't be part of the result. If no processor has been activated, this function will just
	 * traverse the stream without showing any result, although some internal processing will
	 * be performed anyway.
	 */
	public function analyzeStream($stream, array $processors = [], int $maxBytes = PHP_INT_MAX) {
		$byteCount = 0;
		$map = [];
		$processorActions = [
			'count' => 'processCountChars',
			'details' => 'processDetails',
			'lines' => 'processLines'
		];
		foreach ($processors as $name) {
			$map[$name] = [];
		}

		while ($byteCount < $maxBytes && !\feof($stream)) {
			$lowerBytePos = $byteCount;

			$mbRead = $this->readMbChar($stream);
			if ($mbRead === false) {
				break;
			}
			$str = $mbRead[0];
			$byteCount += $mbRead[1];

			$upperBytePos = $byteCount - 1;

			$unicodePoint = \mb_ord($str);
			$index = $this->searchInUnicode($unicodePoint);

			$params = [
				'range' => [$lowerBytePos, $upperBytePos],
				'str' => $str,
				'unicodeRangePos' => $index,
				'unicodePoint' => $unicodePoint
			];

			foreach ($processors as $processor) {
				$actionMethod = $processorActions[$processor];
				$this->$actionMethod($params, $map[$processor]);
			}
		}
		return $map;
	}

	/**
	 * This is mainly a wrapper around the analyzeStream method in order to work easier with
	 * a string.
	 * @see analyzeStream
	 * @param string $data the string to be analyzed. The whole string will be checked
	 * @param array $processors a list containing the processor names to be used.
	 * Known names are "count", "details" and "lines". Processors that aren't in the list
	 * won't be used and won't appear in the result
	 * @return array a map as described above (see analyzeStream).
	 * */
	public function analyzeString(string $data, array $processors = []) {
		$stream = \fopen('php://memory', 'r+');
		\fwrite($stream, $data);
		\rewind($stream);
		$result = $this->analyzeStream($stream, $processors);
		\fclose($stream);
		return $result;
	}

	/**
	 * Read a multibyte char from the stream. The stream is assumed to be utf8-encoded
	 * The function returns an array with the first element being the multibyte char and the
	 * second element the number of bytes read from the stream. [$str, $bytesRead]
	 * It will return false if there is no char to be read
	 */
	private function readMbChar($stream) {
		$byte = \fread($stream, 1);
		if ($byte === '') {
			return false;
		}

		$byteInt = \ord($byte);
		if ($this->inRange($byteInt, '4b')) {
			// we need to read 3 more bytes
			$str = $byte . \fread($stream, 3);
			$byteCount = 4;
		} elseif ($this->inRange($byteInt, '3b')) {
			// we need to read 2 more bytes
			$str = $byte . \fread($stream, 2);
			$byteCount = 3;
		} elseif ($this->inRange($byteInt, '2b')) {
			// we need to read another byte
			$str = $byte . \fread($stream, 1);
			$byteCount = 2;
		} else {
			// either not in a valid range (something broke) or in "1b" range.
			// in any case, use 1 byte
			$str = $byte;
			$byteCount = 1;
		}
		return [$str, $byteCount];
	}

	/**
	 * Check if the "byteInt" in a range defined in the utf8Ranges attr.
	 */
	private function inRange($byteInt, $range) {
		return $this->utf8Ranges[$range][0] <= $byteInt && $byteInt <= $this->utf8Ranges[$range][1];
	}

	/**
	 * Search the unicodePoint in the list of unicodeRanges. It uses a binary search approach
	 * so the list in the unicodeRanges attr must be sorted.
	 */
	private function searchInUnicode($unicodePoint) {
		$left = 0;
		$right = \count($this->unicodeRanges) - 1;
		while ($left <= $right) {
			$midpoint = \intval(($left + $right) / 2, 10);

			$uRange = $this->unicodeRanges[$midpoint];
			if ($uRange['range'][0] <= $unicodePoint && $unicodePoint <= $uRange['range'][1]) {
				return $midpoint;
			} else {
				if ($uRange['range'][0] > $unicodePoint) {
					$right = $midpoint - 1;
				} else {
					$left = $midpoint + 1;
				}
			}
		}
		return null;
	}

	/**
	 * Return a map containing the scripts found and the number of chars per script, such as
	 * ["Han" => 57, "Katakana" => 6, "Common" => 34]
	 * @param array $params a map with information about the character to be processed:
	 * - "range" -> the byte range used by the char, as 2 integers [$lowerRange, $upperRange]
	 * - "str" -> the string representing the multibyte char
	 * - "unicodeRangePos" -> the index inside the unicodeRanges array where the char is placed
	 * - "unicodePoint" -> the unicode code point of the char, as integer
	 * @param array $data an array to place the result. The same array will be reused in
	 * multiple calls, until the stream is processed.
	 */
	private function processCountChars(array $params, array &$data) {
		if ($params['unicodeRangePos'] !== null) {
			$mapIndex = $this->unicodeRanges[$params['unicodeRangePos']]['script'];
		} else {
			$mapIndex = '_unknown';
		}

		if (!isset($data[$mapIndex])) {
			$data[$mapIndex] = 0;
		}
		$data[$mapIndex] += 1;
	}

	/**
	 * Provide a list with information per char. See "processCountChars" for details on the
	 * parameters
	 * The list will be something like:
	 * [
	 *  ["range" => "0-1", "str" => "ن", "unicode" => 1606, "unicodeHex" => "646", "script" => "Arabic"],
	 *  ["range" => "2-2", "str" => " ", "unicode" => 32, "unicodeHex" => "20", "script" => "Common"],
	 *  .....
	 * ]
	 */
	private function processDetails(array $params, array &$data) {
		if ($params['unicodeRangePos'] !== null) {
			$mapIndex = $this->unicodeRanges[$params['unicodeRangePos']]['script'];
		} else {
			$mapIndex = '_unknown';
		}

		$data[] = [
			'range' => "{$params['range'][0]}-{$params['range'][1]}",
			'str' => $params['str'],
			'unicode' => $params['unicodePoint'],
			'unicodeHex' => \dechex($params['unicodePoint']),
			'script' => $mapIndex,
		];
	}

	/**
	 * Provide information about the lines found. Note that each line will contain an array
	 * with the chars in that line. The "\n" and "\r" chars will be excluded.
	 * For each line you can use the "implode('', $arrayLine)" to build the string, or use
	 * "array_slice" to get a fixed number of chars before building the string.
	 * See "processCountChars" for details on the parameters
	 * Example of output:
	 * [
	 *  "linesNumber" => 2,
	 *  "lines" => [
	 *   ["a", "b", "c"],
	 *   ["5", "6", "ى"]
	 *  ]
	 * ]
	 */
	private function processLines(array $params, array &$data) {
		static $lastProcessedChar = null;

		if (!isset($data['linesNumber'])) {
			$data = [
				'linesNumber' => 1,
				'lines' => [],
			];
		}
		$lineIndex = $data['linesNumber'] - 1;

		if (!isset($data['lines'][$lineIndex])) {
			$data['lines'][$lineIndex] = [];
		}

		switch ($params['str']) {
			case "\n":
				if ($lastProcessedChar !== "\r") {
					$data['linesNumber']++;
				}
				break;
			case "\r":
				if ($lastProcessedChar !== "\n") {
					$data['linesNumber']++;
				}
				break;
			default:
				$data['lines'][$lineIndex][] = $params['str'];
		}

		$lastProcessedChar = $params['str'];
	}
}
