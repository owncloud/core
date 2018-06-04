<?php

namespace OC\Core\Command\Background\Queue;

use OCP\BackgroundJob\IJobList;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Delete extends Command {

	/** @var \OCP\BackgroundJob\IJobList */
	private $jobList;

	public function __construct(IJobList $jobList) {
		$this->jobList = $jobList;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('background:queue:delete')
			->setDescription('Delete a job from the queue')
			->addArgument('id', InputArgument::REQUIRED, 'id of the job to be deleted');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return void
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$id = $input->getArgument('id');

		$job = $this->jobList->getById($id);
		if ($job === null) {
			$output->writeln("Job with id <$id> is not known.");
			return;
		}

		$this->jobList->removeById($id);
		$output->writeln('Job has been deleted.');
	}
}
