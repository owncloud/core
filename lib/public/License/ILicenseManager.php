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
namespace OCP\License;

/**
 * @since 10.5.0
 * Holds operations for managing the ownCloud license
 */
interface ILicenseManager {
	const LICENSE_STATE_VALID = 0;
	const LICENSE_STATE_MISSING = 1;
	const LICENSE_STATE_INVALID = 2;
	const LICENSE_STATE_EXPIRED = 3;

	/**
	 * @since 10.5.0
	 * Return an array with "start" and "end" keys to know when the grace period has
	 * started and when the grace period will end, or null if the grace period hasn't
	 * started yet.
	 * Additional keys could be returned if the $includeExtras param is set to true.
	 * Note that these extras could be expensive to retrieve
	 *
	 * Both "start" and "end" keys will hold unix timestamps such as
	 * ['start' => 15263748, 'end' => 15557865].
	 *
	 * @param bool $includeExtras true to include extra information (potentially expensive), false
	 * to just retrieve the "start" and "end" period interval
	 * @return array|null array with "start" and "end" keys to define the grace period interval
	 * or null if the grace period hasn't started or isn't defined
	 */
	public function getGracePeriod(bool $includeExtras = false);

	/**
	 * @since 10.5.0
	 * Set a new license through ownCloud. You can use any string as the license.
	 *
	 * Use null if you don't want to set a new license but want to run possible cleanup
	 * routines this method could have. This could be useful if the license is entered manually
	 * and you don't want the admin to enter the license again; note that cleanup routines
	 * might need to be run even though the license hasn't changed
	 *
	 * @param string|null $licenseString the new license or null if we don't want to change the
	 * license but run the cleanup routines.
	 */
	public function setLicenseString($licenseString);

	/**
	 * @since 10.5.0
	 * Get the license state for $appid. This function will return one of the LICENSE_STATE_*
	 * constants.
	 *
	 * @param string $appid the id of the app to get the license for
	 * @return int one of the LICENSE_STATE_* constants
	 */
	public function getLicenseStateFor(string $appid);

	/**
	 * @since 10.5.0
	 * This method is intended to be called only by the apps trying to check if the app
	 * itself has a valid license and it's allowed to run. Core shouldn't need to call
	 * this method, nor other different apps ("myApp" should only check for itself).
	 * Use `getLicenseStateFor` method instead for that purpose.
	 *
	 * Check if there is a valid license that can be used for $appid. A grace period
	 * will start regardless of the license validation (we shouldn't start a
	 * grace period after X days of using the app due to the license expired).
	 * The grace period will be global to all the apps, and it will start with the first
	 * app calling this method
	 *
	 * If there no valid license and the grace period has finished, this method
	 * will disable the app.
	 *
	 * This method will return true if there is a license valid for the app (usually
	 * the ownCloud's license) or if the grace period is active
	 * @param string $appid the id of the app we want to check
	 * @return bool true if there is a valid license or the grace period is active, false
	 * otherwise.
	 */
	public function checkLicenseFor(string $appid);
}
