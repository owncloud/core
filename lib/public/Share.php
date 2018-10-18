<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Michael Gapczynski <GapczynskiM@gmail.com>
 * @author Michael Kuhn <suraia@ikkoku.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Sam Tuke <mail@samtuke.com>
 * @author Stefan Weil <sw@weilnetz.de>
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

/**
 * Public interface of ownCloud for apps to use.
 * Share Class
 *
 */

// use OCP namespace for all classes that are considered public.
// This means that they should be used by apps instead of the internal ownCloud classes
namespace OCP;

/**
 * This class provides the ability for apps to share their content between users.
 *
 * It provides the following hooks:
 *  - post_shared
 * @since 5.0.0
 * @deprecated since 10.0.11 and will be removed in 11.0, please use the share manager instead
 */
class Share extends \OC\Share\Constants {
	/**
	 * Check if the Share API is enabled
	 * @return boolean true if enabled or false
	 *
	 * The Share API is enabled by default if not configured
	 * @since 5.0.0
	 */
	public static function isEnabled() {
		return \OC\Share\Share::isEnabled();
	}

	/**
	 * Find which users can access a shared item
	 * @param string $path to the file
	 * @param string $ownerUser owner of the file
	 * @param bool $includeOwner include owner to the list of users with access to the file
	 * @param bool $returnUserPaths Return an array with the user => path map
	 * @param bool $recursive take parent folders into account
	 * @return array
	 * @note $path needs to be relative to user data dir, e.g. 'file.txt'
	 *       not '/admin/files/file.txt'
	 * @since 5.0.0 - $recursive was added in 9.0.0
	 */
	public static function getUsersSharingFile($path, $ownerUser, $includeOwner = false, $returnUserPaths = false, $recursive = true) {
		return \OC\Share\Share::getUsersSharingFile($path, $ownerUser, $includeOwner, $returnUserPaths, $recursive);
	}

	/**
	 * Based on the given token the share information will be returned - password protected shares will be verified
	 * @param string $token
	 * @param bool $checkPasswordProtection
	 * @return array|bool false will be returned in case the token is unknown or unauthorized
	 * @since 5.0.0 - parameter $checkPasswordProtection was added in 7.0.0
	 */
	public static function getShareByToken($token, $checkPasswordProtection = true) {
		return \OC\Share\Share::getShareByToken($token, $checkPasswordProtection);
	}

	/**
	 * resolves reshares down to the last real share
	 * @param array $linkItem
	 * @return array file owner
	 * @since 6.0.0
	 */
	public static function resolveReShare($linkItem) {
		return \OC\Share\Share::resolveReShare($linkItem);
	}

	/**
	 * sent status if users got informed by mail about share
	 * @param string $itemType
	 * @param string $itemSource
	 * @param int $shareType SHARE_TYPE_USER, SHARE_TYPE_GROUP, or SHARE_TYPE_LINK
	 * @param string $recipient with whom was the item shared
	 * @param bool $status
	 * @since 6.0.0 - parameter $originIsSource was added in 8.0.0
	 */
	public static function setSendMailStatus($itemType, $itemSource, $shareType, $recipient, $status) {
		return \OC\Share\Share::setSendMailStatus($itemType, $itemSource, $shareType, $recipient, $status);
	}

	/**
	 * In case a password protected link is not yet authenticated this function will return false
	 *
	 * @param array $linkItem
	 * @return bool
	 * @since 7.0.0
	 */
	public static function checkPasswordProtectedShare(array $linkItem) {
		return \OC\Share\Share::checkPasswordProtectedShare($linkItem);
	}

	/**
	 * Check if resharing is allowed
	 *
	 * @return boolean true if allowed or false
	 * @since 5.0.0
	 */
	public static function isResharingAllowed() {
		return \OC\Share\Share::isResharingAllowed();
	}
}
