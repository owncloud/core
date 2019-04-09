<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OC\Core\Command\Background\Queue;

use OC\BackgroundJob\TimedJob;
use OC\Log\CommandLogger;
use OCP\BackgroundJob\IJobList;
use OCP\AppFramework\Utility\ITimeFactory;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class Execute extends Command {

	/**
	 * @var IJobList
	 */
	protected $jobList;
	/** @var ITimeFactory */
	protected $timeFactory;

	/**
	 * @param IJobList $jobList
	 */
	public function __construct(IJobList $jobList, ITimeFactory $timeFactory) {
		parent::__construct();
		$this->jobList = $jobList;
		$this->timeFactory = $timeFactory;
	}

	protected function configure() {
		$this
			->setName('background:queue:execute')
			->setDescription("Run a single background job from the queue")
			->addArgument('Job ID', InputArgument::REQUIRED, 'ID of the job to run')
			->addOption('force', 'f', InputOption::VALUE_NONE, 'Force run the job even if within timing interval')
			->addOption('accept-warning', null, InputOption::VALUE_NONE, 'No warning about the usage of this command will be displayed');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		if (!$input->getOption('accept-warning')) {
			$helper = new QuestionHelper();
			$q = <<<EOS
<question>This command is for maintenance and support purposes. 
This will run the specified background job now. Regular scheduled runs of the job will
continue to happen at their scheduled times. 
If you still want to use this command please confirm the usage by entering: yes
</question>
EOS;
			if (!$helper->ask($input, $output, new ConfirmationQuestion($q, false))) {
				return 1;
			}
		}

		// Get the job to run
		$jobId = $input->getArgument('Job ID');
		// Try to find the job
		$job = $this->jobList->getById($jobId);
		if ($job === null) {
			$output->writeln("<error>Job not found</error>");
			return 1;
		}

		$jobClass = \get_class($job);
		$output->writeln("<info>Found job: $jobClass with ID $jobId</info>");

		$start = $this->timeFactory->getTime();

		// Run the job if not reserved
		$logger = new \OC\Log(new CommandLogger($output), \OC::$server->getSystemConfig());

		if ($job instanceof TimedJob && $input->getOption('force')) {
			// Force the execution to ignore the interval
			$output->writeln('<info>Forcing run, resetting last run value to 0</info>');
			$job->setLastRun(0);
		}

		$output->writeln('<info>Running job...</info>');

		$job->execute($this->jobList, $logger);

		$duration = $this->timeFactory->getTime() - $start;

		$output->writeln("<info>Finished in $duration seconds</info>");
		$this->jobList->setLastJob($job);
		$this->jobList->setExecutionTime($job, $duration);

		return 0;
	}
}
