<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

//.psd
class Heic extends Bitmap {
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/image\/hei(f|c)/';
	}

	protected function hasExpectedMagicBytes(string $content): bool {
		// ISO-BMFF: bytes[0:4] are a variable box size (not checked - any value is
		// structurally valid), bytes[4:8] must be "ftyp", bytes[8:12] are the brand.
		if (!$this->hasSignatureAt($content, 'ftyp', 4)) {
			return false;
		}
		$brand = \substr($content, 8, 4);
		return \in_array($brand, ['heic', 'heix', 'hevc', 'heim', 'heis', 'hevm', 'hevs', 'mif1', 'msf1'], true);
	}
}
