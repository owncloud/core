<?php
/**
* ownCloud
*
* @author Frank Karlitschek
* @author Tom Needham
* @copyright 2012 Frank Karlitschek frank@owncloud.org
* @copyright 2012 Tom Needham tom@owncloud.com
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

class OC_OCS_Thumbnail {

	public static function getThumbnail($parameters) {
		\OC_Log::write('OCP\Thumbnail', $_GET['path'], \OC_Log::DEBUG);
		#$preview = new \OC\Preview('', 'files', '/fun/21670_084.jpg', 50, 50, false);
		$preview = new \OC\Preview('', 'files', $_GET['path'], 50, 50, false);
		$image = $preview->getPreview();
		return $image->show();
	}
}
