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

	protected function getImagickFormat(string $mimeType): string {
		if ($mimeType === 'application/x-font') {
			return 'PFB';
		}
		# .otf and .ttf are indistinguishable by mime type alone (both are
		# application/font-sfnt); TTF is what actually decodes real font files here,
		# both tagged variants included.
		#
		# This is the only provider whose coder depends on $mimeType, so it is also the
		# only one where the divergence documented on Bitmap::getImagickFormat() is
		# observable: a .pfb whose stored mime type is not application/x-font - a trashed
		# one reports application/octet-stream - lands here rather than in the branch
		# above and gets no preview. Deciding from the content instead would mean
		# re-deriving the format from magic bytes, which is what the pin exists to avoid.
		return 'TTF';
	}
}
