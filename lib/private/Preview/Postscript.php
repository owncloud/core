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

//.eps
class Postscript extends Bitmap {
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/application\/postscript/';
	}

	protected function getImagickFormat(string $mimeType): string {
		# EPS is the coder ImageMagick registers for application/postscript, and it covers
		# .ps as well as .eps. Measured rather than inferred from the coder internals:
		# plain PostScript and EPSF-tagged content declaring a bounding box smaller than
		# the page both render to the same geometry read unpinned, pinned EPS and pinned
		# PS, so the pin does not change what a .ps file previews as. Measured on
		# ImageMagick 6.9.11-60 with Ghostscript 9.55.0, the owncloudci/php:7.4 build this
		# branch is tested on. Re-measured there rather than carried over from master.
		return 'EPS';
	}
}
