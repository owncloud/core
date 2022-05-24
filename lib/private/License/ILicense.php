<?php
/**
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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
namespace OC\License;

interface ILicense {
	public const LICENSE_TYPE_NORMAL = 0;
	public const LICENSE_TYPE_DEMO = 1;

	/**
	 * Get the methods the license implementation doesn't want anyone to access.
	 * This mainly applies to the ILicenseManager.
	 * Note that the ILicenseManager can still access to these methods, in particular,
	 * the "getLicenseString", but it won't expose them.
	 * @return array[string] the list of methods that shouldn't be accessed
	 */
	public function getProtectedMethods(): array;

	/**
	 * get the raw license string, such as "owncloud_28731_df987_234sf"
	 * @return string
	 */
	public function getLicenseString(): string;

	/**
	 * Check if this license is valid. The license might be expired but valid.
	 * Note that if the license fails to be parsed, it must return false, not throw an
	 * exception
	 * @return bool
	 */
	public function isValid(): bool;

	/**
	 * Get the timestamp when this license expires. No matter if the license is
	 * valid or not.
	 * @return int the timestamp
	 */
	public function getExpirationTime(): int;

	/**
	 * Get the type of the license, one of the LICENSE_TYPE_* constants
	 * @return int
	 */
	public function getType(): int;
}
