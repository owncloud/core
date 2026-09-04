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
namespace OC\Migrations;

use OCP\Migration\IOutput;
use OCP\Migration\ISimpleMigration;

/**
 * Fresh installations get the job from Setup::installBackgroundJobs(), existing
 * installations need it added here.
 */
class Version20260904090001 implements ISimpleMigration {
	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		// spelled exactly like in Setup::installBackgroundJobs(), the job list
		// compares the class name verbatim when it deduplicates
		\OC::$server->getJobList()->add('\OC\Authentication\AccountLockout\ExpireLockoutsJob');
	}
}
