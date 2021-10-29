<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace OC\Share;

class Constants {
	public const SHARE_TYPE_USER = 0;
	public const SHARE_TYPE_GROUP = 1;
	public const SHARE_TYPE_LINK = 3;
	public const SHARE_TYPE_GUEST = 4;
	public const SHARE_TYPE_CONTACT = 5; // ToDo Check if it is still in use otherwise remove it
	public const SHARE_TYPE_REMOTE = 6;  // ToDo Check if it is still in use otherwise remove it

	public const CONVERT_SHARE_TYPE_TO_STRING = [
		self::SHARE_TYPE_USER => 'user',
		self::SHARE_TYPE_GROUP => 'group',
		self::SHARE_TYPE_LINK => 'link',
		self::SHARE_TYPE_GUEST => 'guest',
		self::SHARE_TYPE_CONTACT => 'contact',
		self::SHARE_TYPE_REMOTE => 'remote',
	];

	/**
	 * Values for the "accepted" field of a share.
	 */
	public const STATE_ACCEPTED = 0;
	public const STATE_PENDING = 1;
	public const STATE_REJECTED = 2;

	public const FORMAT_NONE = -1;
	public const FORMAT_STATUSES = -2;
	public const FORMAT_SOURCES = -3;  // ToDo Check if it is still in use otherwise remove it

	public const RESPONSE_FORMAT = 'json'; // default response format for ocs calls

	public const TOKEN_LENGTH = 15; // old (oc7) length is 32, keep token length in db at least that for compatibility

	protected static $shareTypeUserAndGroups = -1;
	protected static $shareTypeGroupUserUnique = 2;
	protected static $backends = [];
	protected static $backendTypes = [];
	protected static $isResharingAllowed;

	public const CREATED_BY_USER_METADATA = "{http://owncloud.org/ns}created-by-user";
}
