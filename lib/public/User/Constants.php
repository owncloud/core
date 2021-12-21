<?php
/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace OCP\User;

/**
 * Class Constants
 *
 * @package OCP
 * @since 10.7.0
 */

class Constants {
	public const USER_TYPE_USER = 0;
	public const USER_TYPE_GUEST = 1;

	public const CONVERT_SHARE_TYPE_TO_STRING = [
		self::USER_TYPE_USER => 'user',
		self::USER_TYPE_GUEST => 'guest',
	];

	/**
	 * @var array
	 * These directories can exist in the data directory along with user folders, and are not valid usernames
	 **/
	public const DIRECTORIES_THAT_ARE_NOT_USERS = [
		'avatars',
		'meta',
		'files_external',
		'files_encryption',
	];

	/**
	 * @var array
	 * These files can exist in the data directory along with user folders, and are not valid usernames
	 **/
	public const FILES_THAT_ARE_NOT_USERS = [
		'.htaccess',
		'.ocdata',
		'htaccesstest.txt',
		'owncloud.db',
		'owncloud.log',
		'index.html'
	];
}
