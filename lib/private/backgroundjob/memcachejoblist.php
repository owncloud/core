<?php
/**
 * Copyright (c) 2014 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC\BackgroundJob;

class MemCacheJobList extends JobList {
	/**
	 * @var \OCP\ICache $memCache
	 */
	private $memCache;

	/**
	 * @param \OCP\IDBConnection $conn
	 * @param \OCP\IConfig $config
	 * @param \OCP\ICache $memCache
	 */
	public function __construct($conn, $config, $memCache) {
		parent::__construct($conn, $config);
		$this->memCache = $memCache;
	}

	protected function encodeJob($job, $argument) {
		if ($job instanceof Job) {
			$class = get_class($job);
		} else {
			$class = $job;
		}
		return json_encode(array('class' => $class, 'argument' => $argument));
	}

	/**
	 * copy the entries from the database backed joblist to the memcache
	 */
	protected function loadFromDB() {
		if ($this->memCache->get('loaded')) {
			return;
		}
		$jobs = parent::getAll();
		foreach ($jobs as $job) {
			$jobString = $this->encodeJob($job, $job->getArgument());
			$jobId = md5($jobString);
			$this->memCache->set('job_' . $jobId, $jobString);
		}
		$this->memCache->set('loaded', true);
	}

	public function add($job, $argument = null) {
		if ($this->has($job, $argument)) {
			return;
		}
		$jobString = $this->encodeJob($job, $argument);
		$jobId = md5($jobString);
		$this->memCache->set('job_' . $jobId, $jobString);

		parent::add($job, $argument);
	}

	public function remove($job, $argument = null) {
		$jobString = $this->encodeJob($job, $argument);
		$jobId = md5($jobString);
		$this->memCache->remove('job_' . $jobId);

		parent::remove($job, $argument);
	}

	public function has($job, $argument) {
		$this->loadFromDB();
		$jobString = $this->encodeJob($job, $argument);
		$jobId = md5($jobString);
		return $this->memCache->hasKey('job_' . $jobId);
	}
}
