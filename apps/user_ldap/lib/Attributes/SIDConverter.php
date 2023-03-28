<?php
/**
 * @copyright Copyright (c) 2022, ownCloud GmbH.
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

namespace OCA\User_LDAP\Attributes;

/**
 * Handle the objectsid attribute
 */
class SIDConverter implements IConverter {
	/**
	 * @inheritdoc
	 * Implementation copied from https://stackoverflow.com/a/13143132
	 */
	public function bin2str(string $binAttr): string {
		$hex_sid = \bin2hex($binAttr);
		$rev = \hexdec(\substr($hex_sid, 0, 2));
		$subcount = \hexdec(\substr($hex_sid, 2, 2));
		$auth = \hexdec(\substr($hex_sid, 4, 12));
		$result = "{$rev}-{$auth}";

		for ($x=0;$x < $subcount; $x++) {
			$result .= '-' . \hexdec($this->little_endian(\substr($hex_sid, 16 + ($x * 8), 8)));
		}

		// Cheat by tacking on the S-
		return 'S-' . $result;
	}

	private function little_endian($hex) {
		$result = "";

		for ($x = \strlen($hex) - 2; $x >= 0; $x = $x - 2) {
			$result .= \substr($hex, $x, 2);
		}
		return $result;
	}

	/**
	 * @inheritdoc
	 * Information extracted from https://devblogs.microsoft.com/oldnewthing/20040315-00/?p=40253
	 */
	public function str2filter(string $strRepr): string {
		$blocks = \explode('-', $strRepr);
		$blockCount = \count($blocks);
		$dashesCountMinus2 = \strval(\intval($blockCount) - 3);
		// skip the first block because it's expected to be 'S-' and it won't be included
		// 2 bytes for the revision
		// 2 bytes for the number of dashes minus 2
		// 6 bytes big-endian for the authority
		$hexData = \sprintf("%02X%02X%012X", $blocks[1], $dashesCountMinus2, $blocks[2]);
		for ($i = 3; $i < $blockCount; $i++) {
			// for the rest of the blocks, 4 bytes little-endian
			$hexData .= $this->little_endian(\sprintf("%08X", $blocks[$i]));
		}

		// escape each byte
		$hexBytes = \str_split($hexData, 2);
		$escapedHexBytes = \array_map(function ($byte) {
			return "\\{$byte}";
		}, $hexBytes);
		return \implode('', $escapedHexBytes);
	}
}
