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
		# Verified against ImageMagick's own compiled-in magic table
		# (magick/magic.c, MagicMap[]): the sfnt version-1.0 tag is the ONLY font
		# signature it recognizes ("TTF", 5 bytes including the high byte of
		# numTables, which is 0 for any font with fewer than 256 tables - true in
		# practice for every real font). It has no entry at all for "OTTO"/"true"/
		# "ttcf" - confirmed empirically too: this environment's Imagick has no
		# decode delegate for genuine OTF ('OTTO'-tagged) content regardless of
		# how it's read, pinned or not.
		if ($this->hasSignatureAt($content, "\x00\x01\x00\x00\x00")) {
			return true;
		}
		# PFB ("Printer Font Binary"): the entry is "PFB", offset 6,
		# "%!PS-AdobeFont-1.0" - the first 6 bytes are the PFB binary segment
		# header (0x80, segment type, 4-byte little-endian length), followed by
		# the standard Adobe Type 1 font program identification string.
		return $this->hasSignatureAt($content, '%!PS-AdobeFont-1.0', 6);
	}
}
