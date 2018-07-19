<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author martin.mattel@diemattels.at <martin.mattel@diemattels.at>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCA\Files\Command;

use Doctrine\DBAL\Connection;
use OC\Core\Command\Base;
use OC\Core\Command\InterruptedException;
use OC\ForbiddenException;
use OC\Migration\ConsoleOutput;
use OC\Repair\RepairMismatchFileCachePath;
use OCP\Files\IMimeTypeLoader;
use OCP\Files\StorageNotAvailableException;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IGroupManager;
use OCP\IUserManager;
use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;
use OCP\ILogger;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Scan extends Base {

	/** @var IUserManager $userManager */
	private $userManager;
	/** @var  IGroupManager $groupManager */
	private $groupManager;
	/** @var ILockingProvider */
	private $lockingProvider;
	/** @var IMimeTypeLoader */
	private $mimeTypeLoader;
	/** @var ILogger */
	private $logger;
	/** @var IConfig */
	private $config;
	/** @var float */
	protected $execTime = 0;
	/** @var int */
	protected $foldersCounter = 0;
	/** @var int */
	protected $filesCounter = 0;

	public function __construct(
		IUserManager $userManager,
		IGroupManager $groupManager,
		ILockingProvider $lockingProvider,
		IMimeTypeLoader $mimeTypeLoader,
		ILogger $logger,
		IConfig $config
	) {
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
		$this->lockingProvider = $lockingProvider;
		$this->mimeTypeLoader = $mimeTypeLoader;
		$this->logger = $logger;
		$this->config = $config;
		parent::__construct();
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('files:scan')
			->setDescription('Scans the filesystem for changes and updates the file cache accordingly.')
			->addArgument(
				'user_id',
				InputArgument::OPTIONAL | InputArgument::IS_ARRAY,
				'Will rescan all files of the given user(s).'
			)
			->addOption(
				'path',
				'p',
				InputArgument::OPTIONAL,
				'Limit rescan to this path, e.g., --path="/alice/files/Music", the user_id is determined by the path and the user_id parameter and --all are ignored.'
			)
			->addOption(
				'groups',
				'g',
				InputArgument::OPTIONAL,
				'Scan user(s) under the group(s). This option can be used as --groups=foo,bar to scan groups foo and bar'
			)
			->addOption(
				'quiet',
				'q',
				InputOption::VALUE_NONE,
				'Suppress any output.'
			)
			->addOption(
				'verbose',
				'-v|vv|vvv',
				InputOption::VALUE_NONE,
				"Increase the output's verbosity."
			)
			->addOption(
				'all',
				null,
				InputOption::VALUE_NONE,
				'Will rescan all files of all known users.'
			)
			->addOption(
				'repair',
				null,
				InputOption::VALUE_NONE,
				'Will repair detached filecache entries (slow).'
			)->addOption(
				'unscanned',
				null,
				InputOption::VALUE_NONE,
				'Only scan files which are marked as not fully scanned.'
			);
	}

	public function checkScanWarning($fullPath, OutputInterface $output) {
		$normalizedPath = \basename(\OC\Files\Filesystem::normalizePath($fullPath));
		$path = \basename($fullPath);

		if ($normalizedPath !== $path) {
			$output->writeln("\t<error>Entry \"" . $fullPath . '" will not be accessible due to incompatible encoding</error>');
		}
	}

	/**
	 * Repair all storages at once
	 *
	 * @param OutputInterface $output
	 */
	protected function repairAll(OutputInterface $output) {
		$connection = $this->reconnectToDatabase($output);
		$repairStep = new RepairMismatchFileCachePath(
			$connection,
			$this->mimeTypeLoader,
			$this->logger,
			$this->config
		);
		$repairStep->setStorageNumericId(null);
		$repairStep->setCountOnly(false);
		$repairStep->doRepair(new ConsoleOutput($output));
	}

	protected function scanFiles($user, $path, $verbose, OutputInterface $output, $backgroundScan = false, $shouldRepair = false) {
		$connection = $this->reconnectToDatabase($output);
		$scanner = new \OC\Files\Utils\Scanner($user, $connection, \OC::$server->getLogger());
		if ($shouldRepair) {
			$scanner->listen('\OC\Files\Utils\Scanner', 'beforeScanStorage', function ($storage) use ($output, $connection) {
				try {
					// FIXME: this will lock the storage even if there is nothing to repair
					$storage->acquireLock('', ILockingProvider::LOCK_EXCLUSIVE, $this->lockingProvider);
				} catch (LockedException $e) {
					$output->writeln("\t<error>Storage \"" . $storage->getCache()->getNumericStorageId() . '" cannot be repaired as it is currently in use, please try again later</error>');
					return;
				}
				try {
					$repairStep = new RepairMismatchFileCachePath(
						$connection,
						$this->mimeTypeLoader,
						$this->logger,
						$this->config
					);
					$repairStep->setStorageNumericId($storage->getCache()->getNumericStorageId());
					$repairStep->setCountOnly(false);
					$repairStep->run(new ConsoleOutput($output));
				} finally {
					$storage->releaseLock('', ILockingProvider::LOCK_EXCLUSIVE, $this->lockingProvider);
				}
			});
		}

		# check on each file/folder if there was a user interrupt (ctrl-c) and throw an exception
		# printout and count
		if ($verbose) {
			$scanner->listen('\OC\Files\Utils\Scanner', 'scanFile', function ($path) use ($output) {
				$output->writeln("\tFile   <info>$path</info>");
				$this->filesCounter += 1;
				if ($this->hasBeenInterrupted()) {
					throw new InterruptedException();
				}
			});
			$scanner->listen('\OC\Files\Utils\Scanner', 'scanFolder', function ($path) use ($output) {
				$output->writeln("\tFolder <info>$path</info>");
				$this->foldersCounter += 1;
				if ($this->hasBeenInterrupted()) {
					throw new InterruptedException();
				}
			});
			$scanner->listen('\OC\Files\Utils\Scanner', 'StorageNotAvailable', function (StorageNotAvailableException $e) use ($output) {
				$output->writeln("Error while scanning, storage not available (" . $e->getMessage() . ")");
			});
		# count only
		} else {
			$scanner->listen('\OC\Files\Utils\Scanner', 'scanFile', function () use ($output) {
				$this->filesCounter += 1;
				if ($this->hasBeenInterrupted()) {
					throw new InterruptedException();
				}
			});
			$scanner->listen('\OC\Files\Utils\Scanner', 'scanFolder', function () use ($output) {
				$this->foldersCounter += 1;
				if ($this->hasBeenInterrupted()) {
					throw new InterruptedException();
				}
			});
		}
		$scanner->listen('\OC\Files\Utils\Scanner', 'scanFile', function ($path) use ($output) {
			$this->checkScanWarning($path, $output);
		});
		$scanner->listen('\OC\Files\Utils\Scanner', 'scanFolder', function ($path) use ($output) {
			$this->checkScanWarning($path, $output);
		});

		try {
			if ($backgroundScan) {
				$scanner->backgroundScan($path);
			} else {
				$scanner->scan($path, $shouldRepair);
			}
		} catch (ForbiddenException $e) {
			$output->writeln("<error>Home storage for user $user not writable</error>");
			$output->writeln("Make sure you're running the scan command only as the user the web server runs as");
		} catch (InterruptedException $e) {
			# exit the function if ctrl-c has been pressed
			$output->writeln('Interrupted by user');
			return;
		} catch (\Exception $e) {
			$output->writeln('<error>Exception during scan: ' . \get_class($e) . ': ' . $e->getMessage() . "\n" . $e->getTraceAsString() . '</error>');
		}
	}

	protected function getAllUsersFromGroup($group) {
		$count = 0;
		$users = [];
		foreach ($this->groupManager->findUsersInGroup($group) as $user) {
			\array_push($users, $user->getUID());
			$count++;
			//Take 200 users at a time
			if ($count > 199) {
				yield $users;
				$count = 1;
				$users = [];
			}
		}
		if (\count($users) > 0) {
			yield $users;
		}
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$inputPath = $input->getOption('path');
		$groups = $input->getOption('groups') ? \explode(',', $input->getOption('groups')) : [];
		$shouldRepairStoragesIndividually = (bool) $input->getOption('repair');

		if (\count($groups) >= 1) {
			$users = [];
			foreach ($groups as $group) {
				if ($this->groupManager->groupExists($group) === false) {
					$output->writeln("Group name $group doesn't exist");
					return 1;
				} else {
					$users[$group] = [];
					foreach ($this->getAllUsersFromGroup($group) as $users_array) {
						$users[$group] = $users_array;
						$this->processUserChunks($input, $output, $users, $inputPath, $shouldRepairStoragesIndividually, $group);
					}
				}
			}
		} elseif ($inputPath) {
			$inputPath = '/' . \trim($inputPath, '/');
			list(, $user, ) = \explode('/', $inputPath, 3);
			$users = [$user];
		} elseif ($input->getOption('all')) {
			// we can only repair all storages in bulk (more efficient) if singleuser or maintenance mode
			// is enabled to prevent concurrent user access
			if ($input->getOption('repair')) {
				if ($this->config->getSystemValue('singleuser', false) || $this->config->getSystemValue('maintenance', false)) {
					// repair all storages at once
					$this->repairAll($output);
					// don't fix individually
					$shouldRepairStoragesIndividually = false;
				} else {
					$output->writeln("<comment>Please switch to single user mode to repair all storages: occ maintenance:singleuser --on</comment>");
					$output->writeln("<comment>Alternatively, you can specify a user to repair. Please note that this is slower than repairing in bulk</comment>");
					return 1;
				}
			}
			$users = $this->userManager->search('');
		} else {
			$users = $input->getArgument('user_id');
		}

		if (\count($groups) === 0) {
			$this->processUserChunks($input, $output, $users, $inputPath, $shouldRepairStoragesIndividually);
		}
	}

	protected function processUserChunks($input, $output, $users, $inputPath, $shouldRepairStoragesIndividually, $group = null) {
		# no messaging level option means: no full printout but statistics
		# $quiet   means no print at all
		# $verbose means full printout including statistics
		# -q	-v	full	stat
		#  0	 0	no	yes
		#  0	 1	yes	yes
		#  1	--	no	no  (quiet overrules verbose)
		$verbose = $input->getOption('verbose');
		$quiet = $input->getOption('quiet');
		# restrict the verbosity level to VERBOSITY_VERBOSE
		if ($output->getVerbosity()>OutputInterface::VERBOSITY_VERBOSE) {
			$output->setVerbosity(OutputInterface::VERBOSITY_VERBOSE);
		}
		if ($quiet) {
			$verbose = false;
		}

		# check quantity of users to be process and show it on the command line
		$users_total = \count($users);
		if ($users_total === 0) {
			$output->writeln("<error>Please specify the user id to scan, \"--all\" to scan for all users or \"--path=...\"</error>");
			return;
		} else {
			$this->initTools();
			if ($group !== null) {
				$output->writeln("Scanning group $group");
				$this->userScan($users[$group], $inputPath, $shouldRepairStoragesIndividually, $input, $output, $verbose);
			} elseif ($users_total >= 1) {
				$output->writeln("\nScanning files for $users_total users");
				$this->userScan($users, $inputPath, $shouldRepairStoragesIndividually, $input, $output, $verbose);
			}
		}

		# stat: printout statistics if $quiet was not set
		if (!$quiet) {
			$this->presentStats($output);
		}
	}

	/**
	 * Initialises some useful tools for the Command
	 */
	protected function initTools() {
		// Start the timer
		$this->execTime = -\microtime(true);
		// Convert PHP errors to exceptions
		\set_error_handler([$this, 'exceptionErrorHandler'], E_ALL);
	}

	protected function userScan($users, $inputPath, $shouldRepairStoragesIndividually, $input, $output, $verbose) {
		$users_total = \count($users);
		$user_count = 0;
		foreach ($users as $user) {
			if (\is_object($user)) {
				$user = $user->getUID();
			}
			$path = $inputPath ? $inputPath : '/' . $user;
			$user_count += 1;
			if ($this->userManager->userExists($user)) {
				# add an extra line when verbose is set to optical separate users
				if ($verbose) {
					$output->writeln("");
				}
				$r = $shouldRepairStoragesIndividually ? ' (and repair)' : '';
				$output->writeln("Starting scan$r for user $user_count out of $users_total ($user)");
				# full: printout data if $verbose was set
				$this->scanFiles($user, $path, $verbose, $output, $input->getOption('unscanned'), $shouldRepairStoragesIndividually);
			} else {
				$output->writeln("<error>Unknown user $user_count $user</error>");
			}
			# check on each user if there was a user interrupt (ctrl-c) and exit foreach
			if ($this->hasBeenInterrupted()) {
				break;
			}
		}
	}

	/**
	 * Processes PHP errors as exceptions in order to be able to keep track of problems
	 *
	 * @see https://secure.php.net/manual/en/function.set-error-handler.php
	 *
	 * @param int $severity the level of the error raised
	 * @param string $message
	 * @param string $file the filename that the error was raised in
	 * @param int $line the line number the error was raised
	 *
	 * @throws \ErrorException
	 */
	public function exceptionErrorHandler($severity, $message, $file, $line) {
		if (!(\error_reporting() & $severity)) {
			// This error code is not included in error_reporting
			return;
		}
		throw new \ErrorException($message, 0, $severity, $file, $line);
	}

	/**
	 * @param OutputInterface $output
	 */
	protected function presentStats(OutputInterface $output) {
		// Stop the timer
		$this->execTime += \microtime(true);
		$output->writeln("");

		$headers = [
			'Folders', 'Files', 'Elapsed time', 'Items per second'
		];

		$this->showSummary($headers, null, $output);
	}

	/**
	 * Shows a summary of operations
	 *
	 * @param string[] $headers
	 * @param string[] $rows
	 * @param OutputInterface $output
	 */
	protected function showSummary($headers, $rows, OutputInterface $output) {
		$niceDate = $this->formatExecTime();
		$itemsPerSecond = $this->getItemsPerSecond();
		if (!$rows) {
			$rows = [
				$this->foldersCounter,
				$this->filesCounter,
				$niceDate,
				$itemsPerSecond
			];
		}
		$table = new Table($output);
		$table
			->setHeaders($headers)
			->setRows([$rows]);
		$table->render();
	}

	/**
	 * Get items per second processed, no fractions
	 *
	 * @return string
	 */
	protected function getItemsPerSecond() {
		$items = $this->foldersCounter + $this->filesCounter;
		if ($this->execTime === 0) {
			// catch div by 0
			$itemsPerSecond = 0;
		} else {
			$itemsPerSecond = $items / $this->execTime;
		}
		return \sprintf("%.0f", $itemsPerSecond);
	}

	/**
	 * Formats microtime into a human readable format
	 *
	 * @return string
	 */
	protected function formatExecTime() {
		list($secs, $tens) = \explode('.', \sprintf("%.1f", ($this->execTime)));

		# if you want to have microseconds add this:   . '.' . $tens;
		return \date('H:i:s', $secs);
	}

	/**
	 * @return \OCP\IDBConnection
	 */
	protected function reconnectToDatabase(OutputInterface $output) {
		/** @var Connection | IDBConnection $connection*/
		$connection = \OC::$server->getDatabaseConnection();
		try {
			$connection->close();
		} catch (\Exception $ex) {
			$output->writeln("<info>Error while disconnecting from database: {$ex->getMessage()}</info>");
		}
		while (!$connection->isConnected()) {
			try {
				$connection->connect();
			} catch (\Exception $ex) {
				$output->writeln("<info>Error while re-connecting to database: {$ex->getMessage()}</info>");
				\sleep(60);
			}
		}
		return $connection;
	}
}
