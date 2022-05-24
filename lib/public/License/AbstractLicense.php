<?php
/**
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
namespace OCP\License;

use OC\License\ILicense;

/**
 * @since 10.8.0
 * An abstract class suitable for 3rd party apps to implement.
 */
abstract class AbstractLicense implements ILicense {
	/**
	 * @since 10.8.0
	 * @inheritdoc
	 */
	public function getProtectedMethods(): array {
		return ['getLicenseString'];
	}

	/**
	 * @since 10.8.0
	 * Get the full classname of the implementation.
	 * This method isn't part of the interface and it's here for the apps to
	 * be able to check what license is available without exposing it.
	 * License implementations can hide this information by adding the method in
	 * the "getProtectedMethods" list.
	 */
	final public function getLicenseClass(): string {
		return \get_class($this);
	}

	/**
	 * @since 10.8.0
	 * @inheritdoc
	 */
	abstract public function getLicenseString(): string;

	/**
	 * @since 10.8.0
	 * @inheritdoc
	 */
	abstract public function isValid(): bool;

	/**
	 * @since 10.8.0
	 * @inheritdoc
	 */
	abstract public function getExpirationTime(): int;

	/**
	 * @since 10.8.0
	 * @inheritdoc
	 *
	 * Available license types (coming from the ILicense)
	 * - AbstractLicense::LICENSE_TYPE_NORMAL (for normal / general licenses)
	 * - AbstractLicense::LICENSE_TYPE_DEMO (for demo licenses)
	 */
	abstract public function getType(): int;
}
