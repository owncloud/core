<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OC\Core\Command\Maintenance;

use Exception;
use OCP\IConfig;
use OCP\Migration\IRepairStep;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class Repair extends Command {
	/** @var \OC\Repair $repair */
	protected $repair;
	/** @var IConfig */
	protected $config;
	/** @var EventDispatcherInterface */
	private $dispatcher;
	/** @var ProgressBar */
	private $progress;
	/** @var OutputInterface */
	private $output;

	/**
	 * @param \OC\Repair $repair
	 * @param IConfig $config
	 */
	public function __construct(\OC\Repair $repair, IConfig $config, EventDispatcherInterface $dispatcher) {
		$this->repair = $repair;
		$this->config = $config;
		$this->dispatcher = $dispatcher;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('maintenance:repair')
			->setDescription('repair this installation')
			->addOption(
				'list',
				null,
				InputOption::VALUE_NONE,
				'Lists all possible repair steps'
			)
			->addOption(
				'single',
				's',
				InputOption::VALUE_REQUIRED,
				'Run just one repair step given its class name'
			)
			->addOption(
				'include-expensive',
				null,
				InputOption::VALUE_NONE,
				'Use this option when you want to include resource and load expensive tasks');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		// Handle listing repair steps
		$list = $input->getOption('list');
		if ($list) {
			$steps = array_merge(\OC\Repair::getRepairSteps(), \OC\Repair::getExpensiveRepairSteps());
			$output->writeln("Found ".count($steps)." repair steps");
			$output->writeln("");
			foreach($steps as $step) {
				$output->writeln(get_class($step) . " -> " . $step->getName());
			}
			return 0;
		}

		// Handle running just one repair step
		$single = $input->getOption('single');
		if ($single) {
			// Check it exists
			$steps = array_merge(\OC\Repair::getRepairSteps(), \OC\Repair::getExpensiveRepairSteps());
			$stepNames = array_map('get_class', $steps);
			if(!in_array($single, $stepNames, true)) {
				$output->writeln("<error>Repair step not found. Use --list to show available steps.");
				return 1;
			}
			// Find step and create repair manager
			$repair = new \OC\Repair([], $this->dispatcher);
			foreach($steps as $step) {
				if(get_class($step) === $single) {
					$repair->addStep($step);
					break;
				}
			}
			$this->progress = new ProgressBar($output);
			$this->output = $output;
			$this->dispatcher->addListener('\OC\Repair::startProgress', [$this, 'handleRepairFeedBack']);
			$this->dispatcher->addListener('\OC\Repair::advance', [$this, 'handleRepairFeedBack']);
			$this->dispatcher->addListener('\OC\Repair::finishProgress', [$this, 'handleRepairFeedBack']);
			$this->dispatcher->addListener('\OC\Repair::step', [$this, 'handleRepairFeedBack']);
			$this->dispatcher->addListener('\OC\Repair::info', [$this, 'handleRepairFeedBack']);
			$this->dispatcher->addListener('\OC\Repair::warning', [$this, 'handleRepairFeedBack']);
			$this->dispatcher->addListener('\OC\Repair::error', [$this, 'handleRepairFeedBack']);
			$repair->run();
			return 0;
		}

		$includeExpensive = $input->getOption('include-expensive');
		if ($includeExpensive) {
			foreach ($this->repair->getExpensiveRepairSteps() as $step) {
				$this->repair->addStep($step);
			}
		}

		$apps = \OC::$server->getAppManager()->getInstalledApps();
		foreach ($apps as $app) {
			if (!\OC_App::isEnabled($app)) {
				continue;
			}
			$info = \OC_App::getAppInfo($app);
			if (!is_array($info)) {
				continue;
			}
			\OC_App::loadApp($app);
			$steps = $info['repair-steps']['post-migration'];
			foreach ($steps as $step) {
				try {
					$this->repair->addStep($step);
				} catch (Exception $ex) {
					$output->writeln("<error>Failed to load repair step for $app: {$ex->getMessage()}</error>");
				}
			}
		}

		$maintenanceMode = $this->config->getSystemValue('maintenance', false);
		$this->config->setSystemValue('maintenance', true);

		$this->progress = new ProgressBar($output);
		$this->output = $output;
		$this->dispatcher->addListener('\OC\Repair::startProgress', [$this, 'handleRepairFeedBack']);
		$this->dispatcher->addListener('\OC\Repair::advance', [$this, 'handleRepairFeedBack']);
		$this->dispatcher->addListener('\OC\Repair::finishProgress', [$this, 'handleRepairFeedBack']);
		$this->dispatcher->addListener('\OC\Repair::step', [$this, 'handleRepairFeedBack']);
		$this->dispatcher->addListener('\OC\Repair::info', [$this, 'handleRepairFeedBack']);
		$this->dispatcher->addListener('\OC\Repair::warning', [$this, 'handleRepairFeedBack']);
		$this->dispatcher->addListener('\OC\Repair::error', [$this, 'handleRepairFeedBack']);

		$this->repair->run();

		$this->config->setSystemValue('maintenance', $maintenanceMode);
	}

	private function runRepair() {

	}

	public function handleRepairFeedBack($event) {
		if (!$event instanceof GenericEvent) {
			return;
		}
		switch ($event->getSubject()) {
			case '\OC\Repair::startProgress':
				$this->progress->start($event->getArgument(0));
				break;
			case '\OC\Repair::advance':
				$this->progress->advance($event->getArgument(0));
				break;
			case '\OC\Repair::finishProgress':
				$this->progress->finish();
				$this->output->writeln('');
				break;
			case '\OC\Repair::step':
				$this->output->writeln(' - Step: ' . $event->getArgument(0));
				break;
			case '\OC\Repair::info':
				$this->output->writeln('     - INFO: ' . $event->getArgument(0));
				break;
			case '\OC\Repair::warning':
				$this->output->writeln('     - WARNING: ' . $event->getArgument(0));
				break;
			case '\OC\Repair::error':
				$this->output->writeln('     - ERROR: ' . $event->getArgument(0));
				break;
		}
	}
}
