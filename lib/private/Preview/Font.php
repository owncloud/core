<?php
/**
 * @author Olivier Paroz <github@oparoz.com>
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

namespace OC\Preview;

// .otf, .ttf and .pfb
class Font extends Bitmap {
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/application\/(?:font-sfnt|x-font$)/';
	}

	protected function hasExpectedMagicBytes(string $content): bool {
		foreach (["\x00\x01\x00\x00", 'OTTO', 'true', 'ttcf'] as $sfntTag) {
			if ($this->hasSignatureAt($content, $sfntTag)) {
				return true;
			}
		}
		# PFB (Printer Font Binary): each segment starts with 0x80 followed by a
		# segment-type byte (0x01 ASCII, 0x02 binary, 0x03 EOF).
		return \strlen($content) >= 2 && $content[0] === "\x80"
			&& \in_array($content[1], ["\x01", "\x02", "\x03"], true);
	}
}
