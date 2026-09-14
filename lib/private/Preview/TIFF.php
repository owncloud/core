<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
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

//.tiff
class TIFF extends Bitmap {
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/image\/tiff/';
	}

	protected function hasExpectedMagicBytes(string $content): bool {
		// Classic TIFF, both byte orders, plus BigTIFF ("TIFF64" in ImageMagick's own
		// magic table) - verified against magick/magic.c's MagicMap[]. BigTIFF was
		// reachable via the original, unpinned readImageBlob() call this replaces, so
		// leaving it out here would be a real functional regression, not just an
		// unverified edge case.
		foreach (["II*\0", "MM\0*", "II+\0\x08\x00\x00\x00", "MM\0+\x00\x08\x00\x00"] as $signature) {
			if ($this->hasSignatureAt($content, $signature)) {
				return true;
			}
		}
		return false;
	}
}
