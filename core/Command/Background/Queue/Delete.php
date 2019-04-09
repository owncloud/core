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
			->addArgument('Job ID', InputArgument::REQUIRED, 'ID of the job to be deleted');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$id = $input->getArgument('Job ID');

		$job = $this->jobList->getById($id);
		if ($job === null) {
			$output->writeln("Job with ID <$id> is not known.");
			return 1;
		}

		$this->jobList->removeById($id);
		$output->writeln('Job has been deleted.');
		return 0;
	}
}
