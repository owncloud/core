<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

namespace OC\Core\Command\Background;

use OC\BackgroundJob\Executer;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\Lock\ILockingProvider;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Run extends Command {
	/** @var Executer */
	private $executer;

	/**
	 * @param \OCP\IConfig $config
	 * @param ILockingProvider $lockingProvider
	 * @param IJobList $jobList
	 */
	public function __construct(IConfig $config, ILockingProvider $lockingProvider, IJobList $jobList) {
		parent::__construct();
		$this->executer = new Executer($lockingProvider, $jobList);
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('background:run')
			->setDescription('Run a background job');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		// set non zero return value if no job is run
		return ($this->executer->executeNextJob()) ? 0 : 1;
	}
}
