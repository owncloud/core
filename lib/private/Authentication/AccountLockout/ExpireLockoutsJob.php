<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace OC\Authentication\AccountLockout;

use OC;
use OC\BackgroundJob\Job;

/**
 * Removes failed login counters which are too old to lock anybody out.
 *
 * Purely housekeeping - a lockout expires on its own whether this job runs or
 * not, see AccountLockout.
 */
class ExpireLockoutsJob extends Job {
	protected function run($argument) {
		/* @var $accountLockout AccountLockout */
		$accountLockout = OC::$server->query(AccountLockout::class);
		$accountLockout->expireStale();
	}
}
