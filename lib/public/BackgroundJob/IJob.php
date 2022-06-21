<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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

namespace OCP\BackgroundJob;
use OCP\ILogger;

/**
 * Interface IJob
 *
 * @package OCP\BackgroundJob
 * @since 7.0.0
 */
interface IJob {
	/**
	 * Run the background job with the registered argument
	 *
	 * @param \OCP\BackgroundJob\IJobList $jobList The job list that manages the state of this job
	 * @param ILogger $logger
	 * @since 7.0.0
	 */
	public function execute($jobList, ILogger $logger = null);

	/**
	 * @param int $id
	 * @since 7.0.0
	 */
	public function setId($id);

	/**
	 * @param int $lastRun
	 * @since 7.0.0
	 */
	public function setLastRun($lastRun);

	/**
	 * @param mixed $argument
	 * @since 7.0.0
	 */
	public function setArgument($argument);

	/**
	 * @param int $lastChecked
	 * @since 10.11.0
	 */
	public function setLastChecked(int $lastChecked): void;

	/**
	 * @param int $reservedAt
	 * @since 10.11.0
	 */
	public function setReservedAt(int $reservedAt): void;

	/**
	 * @param int $executionDuration
	 * @since 10.11.0
	 */
	public function setExecutionDuration(int $executionDuration): void;

	/**
	 * Get the id of the background job
	 * This id is determined by the job list when a job is added to the list
	 *
	 * @return int
	 * @since 7.0.0
	 */
	public function getId();

	/**
	 * Get the last time this job was run as unix timestamp.
	 * Returns 0 if job never run.
	 *
	 * @return int
	 * @since 7.0.0
	 */
	public function getLastRun();

	/**
	 * Get the argument associated with the background job
	 * This is the argument that will be passed to the background job
	 *
	 * @return mixed
	 * @since 7.0.0
	 */
	public function getArgument();

	/**
	 * Get the last time this job was added or checked for scheduling as unix timestamp.
	 *
	 * @return int time as unix timestamp
	 * @since 10.11.0
	 */
	public function getLastChecked(): int;

	/**
	 * Get the reservation time of this job as unix timestamp.
	 * Returns 0 if job is not reserved for scheduling, otherwise unix timestamp.
	 *
	 * @return int time as 0 if job is not reserved for scheduling, otherwise unix timestamp
	 * @since 10.11.0
	 */
	public function getReservedAt(): int;

	/**
	 * Get the last execution duration of this job in seconds.
	 * Returns -1 for never scheduled, 0 below a second duration, otherwise duration in seconds.
	 *
	 * @return int duration as -1 for never scheduled, 0 for below a second duration, otherwise in seconds
	 * @since 10.11.0
	 */
	public function getExecutionDuration(): int;
}
