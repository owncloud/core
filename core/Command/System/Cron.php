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

namespace OC\Core\Command\System;

use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\ILogger;
use OCP\ITempManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Cron extends Command {

	/** @var \OCP\BackgroundJob\IJobList */
	private $jobList;
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var ITempManager */
	private $tempManager;

	/**
	 * Cron constructor.
	 *
	 * @param IJobList $jobList
	 * @param IConfig $config
	 * @param ILogger $logger
	 * @param ITempManager $tempManager
	 */
	public function __construct(IJobList $jobList,
								IConfig $config,
								ILogger $logger,
								ITempManager $tempManager) {
		$this->jobList = $jobList;
		$this->config = $config;
		$this->logger = $logger;
		$this->tempManager = $tempManager;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('system:cron')
			->setDescription('Execute background jobs as cron');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		if (\OCP\Util::needUpgrade()) {
			$output->writeln('Update required, skipping cron');
			return 1;
		}
		if ($this->config->getSystemValue('maintenance', false)) {
			$output->writeln('We are in maintenance mode, skipping cron');
			return 1;
		}
		if ($this->config->getSystemValue('singleuser', false)) {
			$output->writeln('We are in admin only mode, skipping cron');
			return 1;
		}

		// clean the temp folder
		$this->tempManager->cleanOld();

		// Exit if background jobs are disabled!
		$appMode = $this->config->getAppValue('core', 'backgroundjobs_mode', 'ajax');
		if ($appMode === 'none') {
			$output->writeln('Background Jobs are disabled!');
			return 1;
		}

		// We call ownCloud from the CLI (aka cron)
		if ($appMode !== 'cron') {
			$this->config->setAppValue('core', 'backgroundjobs_mode', 'cron');
		}

		$progress = new ProgressBar($output);

		// We only ask for jobs for 14 minutes, because after 15 minutes the next
		// system cron task should spawn.
		$endTime = \time() + 14 * 60;

		$executedJobs = [];
		while ($job = $this->jobList->getNext()) {
			if (isset($executedJobs[$job->getId()])) {
				$this->jobList->unlockJob($job);
				break;
			}
			$progress->advance();
			$jobName = \get_class($job);
			$progress->setMessage("Executing: {$job->getId()} - {$jobName}");

			$job->execute($this->jobList, $this->logger);

			// clean up after unclean jobs
			\OC_Util::tearDownFS();

			$this->jobList->setLastJob($job);
			$executedJobs[$job->getId()] = true;
			unset($job);

			if (\time() > $endTime) {
				break;
			}
		}

		// Log the successful cron execution
		if ($this->config->getSystemValue('cron_log', true)) {
			$this->config->setAppValue('core', 'lastcron', \time());
		}
		$output->writeln('');

		return 0;
	}
}
