<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
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
 */

namespace OCA\Files\Share;

use OC\Share\Share;
use OC\Share\ItemTargetMachine;
use OC\User\User;
use OC\Files\Filesystem;

class FileTargetMachine extends ItemTargetMachine {
	
	/**
	 * Get a unique item target for the specified share and user
	 * @param \OC\Share\Share $share
	 * @param \OC\User\User $user
	 * @return string
	 *
	 * If $user is null, any item target is acceptable
	 *
	 */
	public function getItemTarget(Share $share, User $user = null) {
		Filesystem::init($share->getShareOwner(), '/'.$share->getShareOwner().'/files');
		$path = Filesystem::getPath($share->getItemSource());
		return basename($path);
	}

}