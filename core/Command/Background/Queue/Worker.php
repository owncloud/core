<?php

namespace OC\Core\Command\Background\Queue;

use OC\Console\CommandLogger;
use OC\Core\Command\Base;
use OCP\ILogger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Worker extends Base {

	/** @var \OCP\BackgroundJob\IJobList */
	private $jobList;
	/** @var ILogger */
	private $logger;

	public function __construct() {
		$this->jobList = \OC::$server->getJobList();
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName("background:queue:worker")
			->setDescription("Listen to the background job queue and execute the jobs")
			->addOption('sleep', null, InputOption::VALUE_OPTIONAL, 'Number of seconds to sleep when no job is available', 3);
	}

	/**
	* @param InputInterface $input
	* @param OutputInterface $output
	*/
	protected function execute(InputInterface $input, OutputInterface $output) {
		$this->logger = new CommandLogger($output);

		$waitTime = \max(1, $input->getOption('sleep'));
		while (true) {
			if ($this->hasBeenInterrupted()) {
				break;
			}
			if ($this->executeNext() === null) {
				\sleep($waitTime);
			}
		}
	}

	private function executeNext() {
		$job = $this->jobList->getNext();
		if ($job === null) {
			return null;
		}
		$jobId = $job->getId();
		$this->logger->debug('Run job with ID ' . $job->getId(), ['app' => 'cron']);
		$job->execute($this->jobList, $this->logger);
		$this->logger->debug('Finished job with ID ' . $job->getId(), ['app' => 'cron']);

		$this->jobList->setLastJob($job);
		unset($job);

		return $jobId;
	}
}
