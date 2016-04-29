<?php

namespace OC\Core\Command\Background\Queue;

use OCP\BackgroundJob\IJob;
use OCP\BackgroundJob\IJobList;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Status extends Command {

	/** @var \OCP\BackgroundJob\IJobList */
	private $jobList;

	public function __construct(IJobList $jobList) {
		$this->jobList = $jobList;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('background:queue:status')
			->setDescription('List queue status');
	}

	/**
	* @param InputInterface $input
	* @param OutputInterface $output
	 * @return void
	*/
	protected function execute(InputInterface $input, OutputInterface $output) {
		$t = new Table($output);
		$t->setHeaders(['Id', 'Job', 'Last run', 'Arguments']);
		$this->jobList->listJobs(function (IJob $job) use ($t) {
			$t->addRow([$job->getId(), \get_class($job), \date('c', $job->getLastRun()), $job->getArgument()]);
		});
		$t->render();
	}
}
