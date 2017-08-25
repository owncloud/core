<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


// use OCP namespace for all classes that are considered public.
// This means that they should be used by apps instead of the internal ownCloud classes
namespace OCP\User;

use OCP\IImage;

/**
 * Interface IProvidesAvatarBackend
 *
 * TODO update these backend interface names to be consistent and readable
 * @package OCP\User
 * @since 10.0.3
 */
interface IProvidesAvatarBackend {

	/**
	 * Get avatar for a users account
	 *
	 * @param string $uid The username
	 * @return IImage
	 * @throws \OutOfBoundsException if the avatar could not be determined as expected
	 * @since 10.0.3
	 */
	public function getAvatar($uid);
}

