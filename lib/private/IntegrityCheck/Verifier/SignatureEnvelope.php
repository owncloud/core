<?php

/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\IntegrityCheck\Verifier;

use OC\IntegrityCheck\Exceptions\MissingSignatureException;
use OC\IntegrityCheck\Verifier\CanonicalManifest;

/**
 * Parser for a single signature.json file supporting both v2 (G2) and legacy (G1) formats.
 * Pure value object—no I/O.
 */
class SignatureEnvelope {
	private bool $isLegacy;
	private int $version;
	private ?string $alg;
	private string $rawHashesBytes;
	private array $hashesMap;
	private string $signatureBinary;
	private string $leafPem;
	private array $chainPems;

	private function __construct(
		bool $isLegacy,
		int $version,
		?string $alg,
		string $rawHashesBytes,
		array $hashesMap,
		string $signatureBinary,
		string $leafPem,
		array $chainPems
	) {
		$this->isLegacy = $isLegacy;
		$this->version = $version;
		$this->alg = $alg;
		$this->rawHashesBytes = $rawHashesBytes;
		$this->hashesMap = $hashesMap;
		$this->signatureBinary = $signatureBinary;
		$this->leafPem = $leafPem;
		$this->chainPems = $chainPems;
	}

	/**
	 * Parse a signature.json file content.
	 * Detects v2 vs legacy format and validates structure.
	 *
	 * @param string $json The raw JSON content
	 * @return self
	 * @throws MissingSignatureException on invalid structure or format
	 */
	public static function parse(string $json): self {
		if (empty($json)) {
			throw new MissingSignatureException('Signature data not found.');
		}

		$data = @json_decode($json, true);
		if (!\is_array($data)) {
			throw new MissingSignatureException('Signature data not found.');
		}

		// Extract raw hashes bytes (string-aware, brace-balanced scan)
		if (!isset($data['hashes']) || !\is_array($data['hashes'])) {
			throw new MissingSignatureException('Signature data not found.');
		}

		$rawHashesBytes = self::extractRawHashesBytes($json);

		// Decode hashes map
		$hashesMap = CanonicalManifest::decodeHashesMap($rawHashesBytes);

		// Decode signature
		$signatureBinary = @base64_decode($data['signature'] ?? '', true);
		if ($signatureBinary === false || empty($data['signature'])) {
			throw new MissingSignatureException('Signature data not found.');
		}

		// Detect format
		$isLegacy = !isset($data['v']) && !isset($data['certificates']) && isset($data['certificate']);
		$isV2 = isset($data['v']) || isset($data['certificates']);

		// Validate format
		if (!$isLegacy && !$isV2) {
			throw new MissingSignatureException('Signature data not found.');
		}

		if ($isLegacy) {
			// Legacy format: requires "certificate" field
			if (!isset($data['certificate']) || !\is_string($data['certificate'])) {
				throw new MissingSignatureException('Signature data not found.');
			}

			return new self(
				true,
				1,
				null,
				$rawHashesBytes,
				$hashesMap,
				$signatureBinary,
				$data['certificate'],
				[]
			);
		} else {
			// V2 format: requires "certificates" object with at least "leaf"
			if (!isset($data['certificates']) || !\is_array($data['certificates'])) {
				throw new MissingSignatureException('Signature data not found.');
			}
			if (!isset($data['certificates']['leaf']) || !\is_string($data['certificates']['leaf'])) {
				throw new MissingSignatureException('Signature data not found.');
			}

			$chainPems = [];
			if (isset($data['certificates']['chain']) && \is_array($data['certificates']['chain'])) {
				$chainPems = $data['certificates']['chain'];
			}

			$version = $data['v'] ?? 2;
			$alg = $data['alg'] ?? null;

			return new self(
				false,
				$version,
				$alg,
				$rawHashesBytes,
				$hashesMap,
				$signatureBinary,
				$data['certificates']['leaf'],
				$chainPems
			);
		}
	}

	/**
	 * Extract the raw byte-span of the "hashes" value from the JSON string.
	 * Uses a string-aware, brace-balanced scan to handle arbitrary content.
	 *
	 * @param string $json The raw JSON content
	 * @return string The exact bytes of the hashes value (from opening { to closing })
	 * @throws MissingSignatureException if "hashes" not found or not an object
	 */
	private static function extractRawHashesBytes(string $json): string {
		$len = \strlen($json);
		$i = 0;
		$inString = false;

		// Find the opening { of the root object
		while ($i < $len) {
			$c = $json[$i];
			if ($inString) {
				if ($c === '\\' && $i + 1 < $len) {
					$i += 2;
					continue;
				}
				if ($c === '"') {
					$inString = false;
				}
			} else {
				if ($c === '"') {
					$inString = true;
				} elseif ($c === '{') {
					break;
				}
			}
			$i++;
		}

		if ($i >= $len) {
			throw new MissingSignatureException('Signature data not found.');
		}

		$rootStart = $i;
		$i++;

		// Now scan for "hashes" key at depth 1 and extract its value
		$depth = 1;
		$inString = false;

		while ($i < $len && $depth > 0) {
			$c = $json[$i];

			if ($inString) {
				if ($c === '\\' && $i + 1 < $len) {
					$i += 2;
					continue;
				}
				if ($c === '"') {
					$inString = false;
				}
				$i++;
				continue;
			}

			if ($c === '"') {
				$inString = true;
				// Check if this is the start of the "hashes" key
				if ($depth === 1) {
					$keyStart = $i + 1;
					$j = $i + 1;
					$keyInString = true;
					while ($j < $len) {
						if ($json[$j] === '\\' && $j + 1 < $len) {
							$j += 2;
							continue;
						}
						if ($json[$j] === '"') {
							$key = substr($json, $keyStart, $j - $keyStart);
							if ($key === 'hashes') {
								// Found it! Find colon and value
								$k = $j + 1;
								while ($k < $len && ($json[$k] === ':' || ctype_space($json[$k]))) {
									if ($json[$k] === ':') {
										$k++;
										break;
									}
									$k++;
								}
								while ($k < $len && ctype_space($json[$k])) {
									$k++;
								}
								if ($k >= $len || $json[$k] !== '{') {
									throw new MissingSignatureException('Signature data not found.');
								}
								return self::extractBraceBalancedValue($json, $k);
							}
							break;
						}
						$j++;
					}
				}
				$i++;
				continue;
			}

			if ($c === '{') {
				$depth++;
			} elseif ($c === '}') {
				$depth--;
			}

			$i++;
		}

		throw new MissingSignatureException('Signature data not found.');
	}

	/**
	 * Extract a JSON object value starting from the opening brace, using brace-balanced scan.
	 *
	 * @param string $json The full JSON string
	 * @param int $startPos Position of the opening {
	 * @return string The exact substring from opening { to matching closing }
	 */
	private static function extractBraceBalancedValue(string $json, int $startPos): string {
		$len = \strlen($json);
		$depth = 0;
		$inString = false;
		$escapeNext = false;
		$endPos = $startPos;

		for ($i = $startPos; $i < $len; $i++) {
			$c = $json[$i];

			if ($escapeNext) {
				$escapeNext = false;
				$endPos = $i + 1;
				continue;
			}

			if ($c === '\\') {
				$escapeNext = true;
				$endPos = $i + 1;
				continue;
			}

			if ($c === '"') {
				$inString = !$inString;
				$endPos = $i + 1;
				continue;
			}

			if ($inString) {
				$endPos = $i + 1;
				continue;
			}

			if ($c === '{') {
				$depth++;
				$endPos = $i + 1;
			} elseif ($c === '}') {
				$depth--;
				$endPos = $i + 1;
				if ($depth === 0) {
					break;
				}
			} else {
				$endPos = $i + 1;
			}
		}

		if ($depth !== 0) {
			throw new MissingSignatureException('Signature data not found.');
		}

		return substr($json, $startPos, $endPos - $startPos);
	}

	public function isLegacyFormat(): bool {
		return $this->isLegacy;
	}

	public function getVersion(): int {
		return $this->version;
	}

	public function getAlg(): ?string {
		return $this->alg;
	}

	public function getRawHashesBytes(): string {
		return $this->rawHashesBytes;
	}

	public function getHashesMap(): array {
		return $this->hashesMap;
	}

	public function getSignatureBinary(): string {
		return $this->signatureBinary;
	}

	public function getLeafPem(): string {
		return $this->leafPem;
	}

	public function getChainPems(): array {
		return $this->chainPems;
	}
}
