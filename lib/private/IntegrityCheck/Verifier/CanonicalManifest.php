<?php
/**
 * SPDX-FileCopyrightText: 2026 ownCloud GmbH
 * SPDX-License-Identifier: AGPL-3.0-or-later
 */

namespace OC\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Exceptions\MissingSignatureException;

/**
 * CanonicalManifest - Hand-serialized canonical manifest for byte-exact parity with Go signer.
 *
 * Reproduces the exact manifest bytes M that the Go ocsign tool signs.
 * No I/O, no dependencies — pure utility class for serialization/deserialization.
 */
class CanonicalManifest {
	/**
	 * Serialize a hash map to canonical JSON bytes, byte-for-byte identical to the Go signer.
	 *
	 * Canonicalization rules:
	 * - Keys sorted by raw byte order (bytewise, NOT locale): ksort($hashes, SORT_STRING)
	 * - Compact JSON: no whitespace. Separators: "," between pairs, ":" between key/value.
	 * - String escaping (on BOTH keys and values, byte-by-byte):
	 *   - " → \"
	 *   - \ → \\
	 *   - 0x08 → \b, 0x09 → \t, 0x0A → \n, 0x0C → \f, 0x0D → \r
	 *   - Any byte < 0x20 (other than above) → \uXXXX (lowercase hex)
	 *   - All other bytes (including /, UTF-8 lead/continuation) → verbatim
	 *
	 * @param array $hashes Associative array: path => sha512hex
	 * @return string Canonical JSON manifest (compact, no trailing newline)
	 */
	public static function serialize(array $hashes): string {
		// Sort keys by raw byte order (bytewise)
		ksort($hashes, SORT_STRING);

		$pairs = [];
		foreach ($hashes as $key => $value) {
			$escapedKey = self::escapeString($key);
			$escapedValue = self::escapeString($value);
			$pairs[] = "\"$escapedKey\":\"$escapedValue\"";
		}

		return '{' . \implode(',', $pairs) . '}';
	}

	/**
	 * Decode canonical JSON back to the hash map.
	 *
	 * @param string $rawM Canonical JSON bytes
	 * @return array Associative array: path => sha512hex
	 */
	public static function decodeHashesMap(string $rawM): array {
		$decoded = \json_decode($rawM, true);
		// json_decode returns null on malformed input. Guard so a defect in the
		// brace-balanced scanner degrades into a clean MISSING_SIGNATURE reason code
		// rather than a TypeError on the SignatureEnvelope array-typed constructor.
		if (!\is_array($decoded)) {
			throw new MissingSignatureException('Signature data not found.');
		}
		return $decoded;
	}

	/**
	 * Production path: raw hashes bytes from signature.json ARE the canonical M.
	 *
	 * This is a named seam where the verifier calls this method.
	 * Returns input unchanged (identity function).
	 * Re-serialization happens only in cross-checks like tests.
	 *
	 * @param string $rawHashes Raw hashes bytes read from signature.json
	 * @return string The same bytes, unchanged
	 */
	public static function fromRawHashesBytes(string $rawHashes): string {
		return $rawHashes;
	}

	/**
	 * Escape a string for canonical JSON serialization.
	 *
	 * Iterates over BYTES (not runes/characters).
	 * - " (0x22) → \"
	 * - \ (0x5C) → \\
	 * - 0x08 → \b
	 * - 0x09 → \t
	 * - 0x0A → \n
	 * - 0x0C → \f
	 * - 0x0D → \r
	 * - Any byte < 0x20 (except above) → \uXXXX (lowercase hex)
	 * - All other bytes → verbatim (including /, UTF-8 lead/continuation)
	 *
	 * @param string $str Input string (bytes)
	 * @return string Escaped string
	 */
	private static function escapeString(string $str): string {
		$result = '';
		$len = \strlen($str);

		for ($i = 0; $i < $len; $i++) {
			$byte = \ord($str[$i]);

			switch ($byte) {
				case 0x22: // "
					$result .= '\\"';
					break;
				case 0x5C: // \
					$result .= '\\\\';
					break;
				case 0x08: // backspace
					$result .= '\\b';
					break;
				case 0x09: // tab
					$result .= '\\t';
					break;
				case 0x0A: // newline
					$result .= '\\n';
					break;
				case 0x0C: // form feed
					$result .= '\\f';
					break;
				case 0x0D: // carriage return
					$result .= '\\r';
					break;
				default:
					if ($byte < 0x20) {
						// Control byte < 0x20: encode as \uXXXX (lowercase hex)
						$result .= '\\u' . \str_pad(\dechex($byte), 4, '0', STR_PAD_LEFT);
					} else {
						// All other bytes (including /, UTF-8 lead/continuation): verbatim
						$result .= $str[$i];
					}
					break;
			}
		}

		return $result;
	}
}
