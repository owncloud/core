<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Owen Winkler <a_github@midnightcircus.com>
 * @author Steffen Lindner <mail@steffen-lindner.de>
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

namespace OC\Core\Command;

use OC\Console\TimestampFormatter;
use OC\Updater;
use OCP\IConfig;
use OCP\ILogger;
use \OCP\ICacheFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\EventDispatcher\GenericEvent;

class Upgrade extends Command {
	public const ERROR_SUCCESS = 0;
	public const ERROR_NOT_INSTALLED = 1;
	public const ERROR_MAINTENANCE_MODE = 2;
	public const ERROR_UP_TO_DATE = 3;
	public const ERROR_INVALID_ARGUMENTS = 4;
	public const ERROR_FAILURE = 5;

	/** @var IConfig */
	private $config;

	/** @var ILogger */
	private $logger;

	/** @var ICacheFactory */
	private $cacheFactory;

	/**
	 * @param IConfig $config
	 * @param ILogger $logger
	 */
	public function __construct(IConfig $config, ILogger $logger, ICacheFactory $cacheFactory) {
		parent::__construct();
		$this->config = $config;
		$this->logger = $logger;
		$this->cacheFactory = $cacheFactory;
	}

	protected function configure() {
		$this
			->setName('upgrade')
			->setDescription('Run upgrade routines after upgrading to a new release.')
			->addOption(
				'--no-app-disable',
				null,
				InputOption::VALUE_NONE,
				'Skip disabling of third party apps.'
			)
			->addOption(
				'--major',
				null,
				InputOption::VALUE_NONE,
				'Automatically update apps to new major versions during minor updates of ownCloud Server'
			);
	}

	/**
	 * Execute the upgrade command
	 *
	 * @param InputInterface $input input interface
	 * @param OutputInterface $output output interface
	 *
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		if ($output->getVerbosity() === OutputInterface::VERBOSITY_NORMAL
			&& !$input->hasParameterOption('--verbose=0', true)) {
			// set to more verbose on upgrade if no explicit verbosity was set
			$output->setVerbosity(OutputInterface::VERBOSITY_VERBOSE);
		}

		if (\OC::checkUpgrade(false)) {
			if (OutputInterface::VERBOSITY_NORMAL < $output->getVerbosity()) {
				// Prepend each line with a little timestamp
				$timestampFormatter = new TimestampFormatter($this->config, $output->getFormatter());
				$output->setFormatter($timestampFormatter);
			}

			$updater = new Updater(
				$this->config,
				\OC::$server->getIntegrityCodeChecker(),
				$this->logger
			);

			if ($input->getOption('major')) {
				$updater->setForceMajorUpgrade(true);
			}

			$dispatcher = \OC::$server->getEventDispatcher();
			$progress = new ProgressBar($output);
			$progress->setFormat(" %message%\n %current%/%max% [%bar%] %percent:3s%%");
			$listener = function ($event) use ($progress, $output) {
				if ($event instanceof GenericEvent) {
					$message = $event->getSubject();
					if (OutputInterface::VERBOSITY_NORMAL < $output->getVerbosity()) {
						$output->writeln(' Checking table ' . $message);
					} else {
						if (\strlen($message) > 60) {
							$message = \substr($message, 0, 57) . '...';
						}
						$progress->setMessage($message);
						if ($event[0] === 1) {
							$output->writeln('');
							$progress->start($event[1]);
						}
						$progress->setProgress($event[0]);
						if ($event[0] === $event[1]) {
							$progress->setMessage('Done');
							$progress->finish();
							$output->writeln('');
						}
					}
				}
			};
			$repairListener = function ($event) use ($progress, $output) {
				if (!$event instanceof GenericEvent) {
					return;
				}
				switch ($event->getSubject()) {
					case '\OC\Repair::startProgress':
						$progress->setMessage('Starting ...');
						$output->writeln($event->getArgument(1));
						$output->writeln('');
						$progress->start($event->getArgument(0));
						break;
					case '\OC\Repair::advance':
						$desc = $event->getArgument(1);
						if (!empty($desc)) {
							$progress->setMessage($desc);
						}
						$progress->advance($event->getArgument(0));

						break;
					case '\OC\Repair::finishProgress':
						$progress->setMessage('Done');
						$progress->finish();
						$output->writeln('');
						break;
					case '\OC\Repair::step':
						if (OutputInterface::VERBOSITY_NORMAL < $output->getVerbosity()) {
							$output->writeln('<info>Repair step: ' . $event->getArgument(0) . '</info>');
						}
						break;
					case '\OC\Repair::info':
						if (OutputInterface::VERBOSITY_NORMAL < $output->getVerbosity()) {
							$output->writeln('<info>Repair info: ' . $event->getArgument(0) . '</info>');
						}
						break;
					case '\OC\Repair::warning':
						$output->writeln('<error>Repair warning: ' . $event->getArgument(0) . '</error>');
						break;
					case '\OC\Repair::error':
						$output->writeln('<error>Repair error: ' . $event->getArgument(0) . '</error>');
						break;
				}
			};

			$dispatcher->addListener('\OC\DB\Migrator::executeSql', $listener);
			$dispatcher->addListener('\OC\DB\Migrator::checkTable', $listener);
			$dispatcher->addListener('\OC\Repair::startProgress', $repairListener);
			$dispatcher->addListener('\OC\Repair::advance', $repairListener);
			$dispatcher->addListener('\OC\Repair::finishProgress', $repairListener);
			$dispatcher->addListener('\OC\Repair::step', $repairListener);
			$dispatcher->addListener('\OC\Repair::info', $repairListener);
			$dispatcher->addListener('\OC\Repair::warning', $repairListener);
			$dispatcher->addListener('\OC\Repair::error', $repairListener);
			
			$updater->listen('\OC\Updater', 'maintenanceEnabled', function () use ($output) {
				$output->writeln('<info>Turned on maintenance mode</info>');
			});
			$updater->listen('\OC\Updater', 'maintenanceDisabled', function () use ($output) {
				$output->writeln('<info>Turned off maintenance mode</info>');
			});
			$updater->listen('\OC\Updater', 'maintenanceActive', function () use ($output) {
				$output->writeln('<info>Maintenance mode is kept active</info>');
			});
			$updater->listen(
				'\OC\Updater',
				'updateEnd',
				function ($success) use ($output) {
					if ($success) {
						$message = "<info>Update successful</info>";
					} else {
						$message = "<error>Update failed</error>";
					}
					$output->writeln($message);
				}
			);
			$updater->listen('\OC\Updater', 'dbUpgradeBefore', function () use ($output) {
				$output->writeln('<info>Updating database schema</info>');
			});
			$updater->listen('\OC\Updater', 'dbUpgrade', function () use ($output) {
				$output->writeln('<info>Updated database</info>');
			});
			$updater->listen('\OC\Updater', 'dbSimulateUpgradeBefore', function () use ($output) {
				$output->writeln('<info>Checking whether the database schema can be updated (this can take a long time depending on the database size)</info>');
			});
			$updater->listen('\OC\Updater', 'dbSimulateUpgrade', function () use ($output) {
				$output->writeln('<info>Checked database schema update</info>');
			});
			$updater->listen('\OC\Updater', 'incompatibleAppDisabled', function ($app) use ($output) {
				$output->writeln('<info>Disabled incompatible app: ' . $app . '</info>');
			});
			$updater->listen('\OC\Updater', 'upgradeAppStoreApp', function ($app) use ($output) {
				$output->writeln('<info>Update 3rd-party app: ' . $app . '</info>');
			});
			$updater->listen('\OC\Updater', 'appUpgradeCheckBefore', function () use ($output) {
				$output->writeln('<info>Checking updates of apps</info>');
			});
			$updater->listen('\OC\Updater', 'appSimulateUpdate', function ($app) use ($output) {
				$output->writeln("<info>Checking whether the database schema for <$app> can be updated (this can take a long time depending on the database size)</info>");
			});
			$updater->listen('\OC\Updater', 'appUpgradeCheck', function () use ($output) {
				$output->writeln('<info>Checked database schema update for apps</info>');
			});
			$updater->listen('\OC\Updater', 'appUpgradeStarted', function ($app, $version) use ($output) {
				$output->writeln("<info>Updating <$app> ...</info>");
			});
			$updater->listen('\OC\Updater', 'appUpgrade', function ($app, $version) use ($output) {
				$output->writeln("<info>Updated <$app> to $version</info>");
			});
			$updater->listen('\OC\Updater', 'failure', function ($message) use ($output) {
				$output->writeln("<error>$message</error>");
			});
			$updater->listen('\OC\Updater', 'setDebugLogLevel', function ($logLevel, $logLevelName) use ($output) {
				$output->writeln("<info>Set log level to debug</info>");
			});
			$updater->listen('\OC\Updater', 'resetLogLevel', function ($logLevel, $logLevelName) use ($output) {
				$output->writeln("<info>Reset log level</info>");
			});
			$updater->listen('\OC\Updater', 'startCheckCodeIntegrity', function () use ($output) {
				$output->writeln("<info>Starting code integrity check...</info>");
			});
			$updater->listen('\OC\Updater', 'finishedCheckCodeIntegrity', function () use ($output) {
				$output->writeln("<info>Finished code integrity check</info>");
			});

			$success = $updater->upgrade();

			$this->postUpgradeCheck($input, $output);

			if (!$success) {
				return self::ERROR_FAILURE;
			}

			// Clear caches after successful upgrade.
			// Caches were created before the upgrade, so the cache prefix will be the old one
			// TODO: Note that only the "create" method is available in the interface. It isn't
			// possible to create local or distributed caches explicitly
			$this->cacheFactory->create()->clear();
			return self::ERROR_SUCCESS;
		} elseif ($this->config->getSystemValue('maintenance', false)) {
			//Possible scenario: ownCloud core is updated but an app failed
			$output->writeln('<warning>ownCloud is in maintenance mode</warning>');
			$output->write('<comment>Maybe an upgrade is already in process. Please check the '
				. 'logfile (data/owncloud.log). If you want to re-run the '
				. 'upgrade procedure, remove the "maintenance mode" from '
				. 'config.php and call this script again.</comment>', true);
			return self::ERROR_MAINTENANCE_MODE;
		} else {
			$output->writeln('<info>ownCloud is already latest version</info>');
			return self::ERROR_UP_TO_DATE;
		}
	}

	/**
	 * Perform a post upgrade check (specific to the command line tool)
	 *
	 * @param InputInterface $input input interface
	 * @param OutputInterface $output output interface
	 */
	protected function postUpgradeCheck(InputInterface $input, OutputInterface $output) {
		$trustedDomains = $this->config->getSystemValue('trusted_domains', []);
		if (empty($trustedDomains)) {
			$output->write(
				'<warning>The setting "trusted_domains" could not be ' .
				'set automatically by the upgrade script, ' .
				'please set it manually</warning>'
			);
		}
	}
}
