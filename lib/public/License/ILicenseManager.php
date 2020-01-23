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
	 * Check if the app is under a trial period. By default, it will try to start a
	 * trial period if the app didn't have a trial period before.
	 * The auto-start parameter isn't guarantee a new trial period will be started.
	 * @param string $appid the app id to check if it's under the trial period
	 * @return bool true if the app is NOW under the trial period, false otherwise
	 */
	public function isAppUnderTrialPeriod(string $appid);
}
