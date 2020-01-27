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
	 * Check if the ownCloud's license key is valid
	 * @return int the state of the license, one of the LICENSE_STATE_* constants
	 */
	public function isLicenseValid();

	/**
	 * Check if the app is under a trial period. This method won't start a new trial
	 * @param string $appid the app id to check if it's under the trial period
	 * @return bool true if the app is NOW under the trial period, false otherwise
	 */
	public function isAppUnderTrialPeriod(string $appid);

	/**
	 * Check if there is a valid license that can be used for $appid. A trial period
	 * will start regardless of the license validation (we shouldn't start a
	 * trial after X days of using the app because the license expired).
	 * Note that there will be only one trial period per app, and it won't be possible
	 * to restart it.
	 *
	 * If there no valid license and the app isn't under a trial period, this method
	 * will disabled the app.
	 *
	 * This method will return true if there is a license valid for the app (usually
	 * the ownCloud's license) or if the app is under a trial period
	 * @param string $appid the id of the app we want to check
	 * @return bool true if there is a valid license or the app is under trial, false
	 * otherwise.
	 */
	public function checkLicenseFor(string $appid);
}
