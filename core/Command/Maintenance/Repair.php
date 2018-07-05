<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Core\Command\Maintenance;

use Exception;
use OCP\App\IAppManager;
use OCP\IConfig;
use OCP\Migration\IRuntimeRepairStep;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
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
	/** @var IAppManager  */
	private $appManager;

	/**
	 * @param \OC\Repair $repair
	 * @param IConfig $config
	 */
	public function __construct(\OC\Repair $repair, IConfig $config, EventDispatcherInterface $dispatcher, IAppManager $appManager) {
		$this->repair = $repair;
		$this->config = $config;
		$this->dispatcher = $dispatcher;
		$this->appManager = $appManager;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('maintenance:repair')
			->setDescription('Repair the installation.')
			->addOption(
				'include-expensive',
				null,
				InputOption::VALUE_NONE,
				'Use this option when you want to include resource and load expensive tasks.')
			->addOption(
				'runtime',
				null,
				InputOption::VALUE_NONE,
				'Use this option when you want to include resource and load expensive tasks.');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$this->output = $output;

		$includeExpensive = $input->getOption('include-expensive');
		$runtime = $input->getOption('runtime');
		$this->buildRepairList($includeExpensive, $runtime, $this->repair);

		// If not runtime mode, we need maintenance mode
		$maintenanceMode = $this->config->getSystemValue('maintenance', false);
		if (!$runtime) {
			$this->output->writeln('<info>Enabling maintenance mode...');
			$this->config->setSystemValue('maintenance', true);
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

		$this->repair->run();

		if (!$runtime) {
			$this->output->writeln('<info>Resetting maintenance mode...');
			$this->config->setSystemValue('maintenance', $maintenanceMode);
		}
	}

	public function buildRepairList($includeExpensive, $runtimeSteps, \OC\Repair $repair) {
		$repair->clearSteps();
		$steps = [];
		$steps = array_merge($steps, \OC\Repair::getRepairSteps());
		if ($includeExpensive) {
			$steps = array_merge($steps, $repair->getExpensiveRepairSteps());
		}
		$apps = $this->appManager->getInstalledApps();
		foreach ($apps as $app) {
			if (!$this->appManager->isEnabledForUser($app)) {
				continue;
			}
			$info = $this->appManager->getAppInfo($app);
			if (!\is_array($info)) {
				continue;
			}
			\OC_App::loadApp($app);
			$appSteps = $info['repair-steps']['post-migration'];
			foreach ($appSteps as $step) {
				$steps[] = $step;
			}
		}
		// Add to repair lib
		foreach ($steps as $step) {
			if (\is_string($step)) {
				$step = \OC::$server->query($step);
			}
			// Skip step if runtime only and this one isnt
			if ($runtimeSteps && !$step instanceof IRuntimeRepairStep) {
				continue;
			}
			try {
				$repair->addStep($step);
			} catch (\Exception $e) {
				$stepName = get_class($step);
				$this->output->writeln("<error>Problem loading repair step: $stepName</error>");
			}
		}
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
				$this->output->writeln(' - ' . $event->getArgument(0));
				break;
			case '\OC\Repair::info':
				$this->output->writeln('     - ' . $event->getArgument(0));
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
