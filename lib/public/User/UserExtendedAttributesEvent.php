<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

use OCP\IUser;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class UserExtendedAttributesEvent
 *
 * @package OCP\User
 * @since 10.11.0
 */
class UserExtendedAttributesEvent extends Event {
	public const USER_EXTENDED_ATTRIBUTES = 'UserExtendedAttributesEvent';

	/** @var array */
	private $attributes = [];

	/** @var IUser */
	private $user;

	/**
	 * UserExtendedAttributesEvent constructor.
	 *
	 * @param IUser $user
	 * @since 10.11.0
	 */
	public function __construct(IUser $user) {
		$this->user = $user;
	}

	/**
	 * get the user whose attributes are requested from the apps
	 * This event is triggered from User object so the user object cannot be
	 * null.
	 *
	 * @return IUser
	 * @since 10.11.0
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Get the extended attributes of user
	 * Returns the attributes array. This means it would return the
	 * attributes of all apps which were set in this array.
	 *
	 * @return array
	 * @since 10.11.0
	 */
	public function getAttributes() {
		return $this->attributes;
	}

	/**
	 * Set the attributes
	 * Here the attributes of the app with key and value are set.
	 * If the attributes are already present ( and not null value ), then the method
	 * returns false. Else true is returned. If $attributeValue is null then false is returned
	 * We are restricting null value assignment.
	 *
	 * @param string $attributeKey
	 * @param mixed $attributeValue
	 * @return bool true if the attribute is set by the method, else false if the attribute is already present
	 * @since 10.11.0
	 */
	public function setAttributes($attributeKey, $attributeValue) {
		if (isset($this->attributes[$attributeKey]) || $attributeValue === null) {
			return false;
		}

		$this->attributes[$attributeKey] = $attributeValue;
		return true;
	}
}
