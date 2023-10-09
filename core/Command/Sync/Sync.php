<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace OC\Core\Command\Sync;

use OCP\Sync\ISyncManager;
use OCP\Sync\ISyncer;
use OCP\Sync\SyncException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;

class Sync extends Command {
	/** @var ISyncManager */
	private $syncManager;

	public function __construct(ISyncManager $syncManager) {
		parent::__construct();
		$this->syncManager = $syncManager;
	}

	protected function configure() {
		$this->setName('sync:sync')
			->setDescription('sync any of the registered sync services')
			->addArgument(
				'service',
				InputArgument::REQUIRED,
				'The service that will sync'
			)->addOption(
				'only-one',
				null,
				InputOption::VALUE_REQUIRED,
				'check and sync only the item with the id provided',
			)->addOption(
				'option',
				'o',
				InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
				'options to be used with the service, in "<key>=<value>" form'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		$service = $input->getArgument('service');

		$syncer = $this->syncManager->getSyncer($service);
		if ($syncer === null) {
			$output->writeln("{$service} not found");
			return 1;
		}

		$opts = [];
		if ($input->getOption('option') !== null) {
			foreach ($input->getOption('option') as $option) {
				$keyValue = \explode('=', $option, 2);
				$opts[$keyValue[0]] = $keyValue[1];
			}
		}

		$target = $input->getOption('only-one');
		if ($target !== null) {
			$checkOk = $this->checkOnlyOne($syncer, $target, $opts, $output);
			$syncOk = $this->syncOnlyOne($syncer, $target, $opts, $output);
		} else {
			$checkOk = $this->checkLocalData($syncer, $opts, $output);
			$syncOk = $this->syncRemoteData($syncer, $opts, $output);
		}

		if (!$checkOk || !$syncOk) {
			return 2;
		}

		return 0;
	}

	private function checkOnlyOne(ISyncer $syncer, $target, $opts, OutputInterface $output) {
		try {
			$state = $syncer->checkOne($target, $opts);
			if ($state !== ISyncer::CHECK_STATE_NO_CHANGE) {
				$output->writeln("{$target} state changed to {$state}");
			}
			return $state === ISyncer::CHECK_STATE_NO_CHANGE;
		} catch (SyncException $ex) {
			$this->outputExceptions($output, $ex);
		}
		return false;
	}

	private function syncOnlyOne(ISyncer $syncer, $target, $opts, OutputInterface $output) {
		try {
			$syncOk = $syncer->syncOne($target, $opts);
			if (!$syncOk) {
				$output->writeln("{$target} cannot be synced because it isn't found remotely");
			}
			return $syncOk;
		} catch (SyncException $ex) {
			$this->outputExceptions($output, $ex);
		}
		return false;
	}

	private function checkLocalData(ISyncer $syncer, $opts, OutputInterface $output) {
		$itemStateList = [];
		$errorList = [];

		// Check local data
		$output->writeln('Checking local data');
		$progress = new ProgressBar($output);
		$progress->start($syncer->localItemCount($opts));
		$syncer->check(function ($item, $state) use ($progress, &$itemStateList, &$errorList) {
			if (\is_array($item) && $state !== ISyncer::CHECK_STATE_NO_CHANGE) {
				$key = \array_key_first($item);
				$itemStateList[] = [
					'key' => $key,
					'value' => $item[$key],
					'state' => $state,
				];
			}
			if ($item instanceof \Exception) {
				$errorList[] = $item;
			} else {
				$progress->advance();
			}
		}, $opts);
		$progress->finish();
		$output->writeln('');

		if (!empty($itemStateList)) {
			$output->writeln('');
			foreach ($itemStateList as $itemState) {
				$output->writeln("- State for item with {$itemState['key']} = {$itemState['value']} has changed to {$itemState['state']}");
			}
		}

		if (!empty($errorList)) {
			$output->writeln('');
			$output->writeln('Following errors happened:');
			$this->outputExceptions($output, $errorList);

			return false;
		}

		return true;
	}

	private function syncRemoteData(ISyncer $syncer, $opts, OutputInterface $output) {
		$output->writeln('');
		$errorList = [];
		// Sync remote data
		$output->writeln('Syncing remote data');
		$progress = new ProgressBar($output);
		$progress->start($syncer->remoteItemCount($opts));
		$syncer->sync(function ($item) use ($progress, &$errorList) {
			if ($item instanceof \Exception) {
				$errorList[] = $item;
			} else {
				$progress->advance();
			}
		}, $opts);
		$progress->finish();
		$output->writeln('');

		if (!empty($errorList)) {
			$output->writeln('');
			$output->writeln('Following errors happened:');
			$this->outputExceptions($output, $errorList);

			return false;
		}

		return true;
	}

	private function outputExceptions(OutputInterface $output, $exList) {
		$prefix = '- ';
		if (!\is_array($exList)) {
			$prefix = "Error: ";
			$exList = [$exList];
		}

		foreach ($exList as $errorItem) {
			$output->writeln("{$prefix}{$errorItem->getMessage()}");
			$previous = $errorItem->getPrevious();
			while ($previous !== null) {
				$previousClass = \get_class($previous);
				$output->writeln("    Caused by: {$previousClass}: {$previous->getMessage()}");
				$previous = $previous->getPrevious();
			}
		}
	}
}
