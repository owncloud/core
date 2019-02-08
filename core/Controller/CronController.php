<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OC\Core\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\IRequest;
use OCP\ILogger;

class CronController extends Controller {
	
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var IJobList */
	private $jobList;

	/**
	 * CronController constructor.
	 *
	 * @param string $appName
	 * @param IRequest $request
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param IJobList $jobList
	 */
	public function __construct($appName, IRequest $request,
								IConfig $config,
								ILogger $logger,
								IJobList $jobList) {
		parent::__construct($appName, $request);
		$this->config = $config;
		$this->logger = $logger;
		$this->jobList = $jobList;
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @return JSONResponse
	 * @throws \Exception
	 */
	public function run(): JSONResponse {
		// Exit if background jobs are disabled!
		$appMode = $this->config->getAppValue('core', 'backgroundjobs_mode', 'ajax');
		if ($appMode === 'none') {
			return new JSONResponse(['data' => ['message' => 'Background jobs disabled!']]);
		}

		// We call cron.php from some website
		if ($appMode === 'cron') {
			return new JSONResponse(['data' => ['message' => 'Background jobs are using system cron!']]);
		}

		// Work and success :-)
		$job = $this->jobList->getNext();
		if ($job !== null) {
			$job->execute($this->jobList, $this->logger);
			$this->jobList->setLastJob($job);
		}

		// Log the successful cron execution
		if ($this->config->getSystemValue('cron_log', true)) {
			$this->config->setAppValue('core', 'lastcron', \time());
		}

		return new JSONResponse();
	}
}
