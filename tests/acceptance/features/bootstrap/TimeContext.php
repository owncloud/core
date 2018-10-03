<?php
/**
 * ownCloud
 *
 * @author Saugat Pachhai <saugat@jankaritech.com>
 * @copyright Copyright (c) 2018 Saugat Pachhai <saugat@jankaritech.com
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Behat\Context\Context;

require_once 'bootstrap.php';

/**
 * context file for email related steps.
 */
class TimeContext implements Context {
	private $weeksPassed = 0;

	/**
	 * Increments $weeksPassed
	 *
	 * @param int $num
	 *
	 * @return void
	 */
	protected function addWeeksPassed($num) {
		$this->weeksPassed += $num;
	}

	/**
	 * @AfterScenario @time-bound
	 *
	 * @return void
	 */
	public function revertSystemtime() {
		for ($i = 0; $i < $this->weeksPassed; $i++) {
			echo("Reverting back a week\n");
			\shell_exec("date --set 'last week'");
		}
	}

	/**
	 * @When the time passes by :weekNum week
	 *
	 * @param int $weekNum
	 *
	 * @return void
	 */
	public function theTimePassesByDays($weekNum) {
		foreach (\range(1, $weekNum) as $week) {
			echo("Flying to the next week\n");
			\shell_exec("date --set 'next week'");
		}
		$this->addWeeksPassed($weekNum);
	}
}
