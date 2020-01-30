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

interface ILicenseManager {
	const LICENSE_STATE_VALID = 0;
	const LICENSE_STATE_MISSING = 1;
	const LICENSE_STATE_INVALID = 2;
	const LICENSE_STATE_EXPIRED = 3;

	/**
	 * Check if the app is under a trial period. This method won't start a new trial
	 * @param string $appid the app id to check if it's under the trial period
	 * @return bool true if the app is NOW under the trial period, false otherwise
	 */
	public function isAppUnderTrialPeriod(string $appid);

	/**
	 * Get the information about the trials and licenses. Foreach app that has started a trial
	 * this function will return the timestamp of the start of the trial, the timestamp
	 * of the end of the trial, and the license state for the app (one of the LICENSE_STATE_* constants).
	 * For now, until per-app licenses are implemented, the license state will reflect the ownCloud's
	 * license state and it will be the same for all the apps
	 *
	 * The format is expected to be something like:
	 * [
	 *  'appid1' => [
	 *   'trial_start' => 15263548,
	 *   'trial_end' => 15263888,
	 *   'license_state' => ILicenseManager::LICENSE_STATE_EXPIRED
	 *   ],
	 *  'appid2' => [....],
	 *  'appid3' => [....]
	 * ]
	 * @return array a list of apps with the timestamps of the start and end of the
	 * trial for that app, as said above
	 */
	public function getInfoForAllApps();

	/**
	 * Get the license state for $appid. This function will return one of the LICENSE_STATE_*
	 * constants.
	 *
	 * Current expected implementation will always check the ownCloud's license and assume the
	 * license is for all the apps. This might change at some point, if per-app licenses are
	 * implemented.
	 * @return int one of the LICENSE_STATE_* constants
	 */
	public function getLicenseStateFor(string $appid);

	/**
	 * Check if there is a valid license that can be used for $appid. A trial period
	 * will start regardless of the license validation (we shouldn't start a
	 * trial after X days of using the app because the license expired).
	 * Note that there will be only one trial period per app, and it won't be possible
	 * to restart it.
	 *
	 * If there no valid license and the app isn't under a trial period, this method
	 * will disable the app.
	 *
	 * This method will return true if there is a license valid for the app (usually
	 * the ownCloud's license) or if the app is under a trial period
	 * @param string $appid the id of the app we want to check
	 * @return bool true if there is a valid license or the app is under trial, false
	 * otherwise.
	 */
	public function checkLicenseFor(string $appid);
}
