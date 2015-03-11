<?php
/**
 * @copyright Olivier Paroz 2015 <owncloud@interfasys.ch>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\Preview;

// Supports many file extensions linked to RAW
class Raw extends Bitmap {
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/image\/x-dcraw/';
	}
}
