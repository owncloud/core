<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace Owncloud\Updater\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use GuzzleHttp\Exception\ClientException;
use Owncloud\Updater\Utils\Fetcher;
use Owncloud\Updater\Utils\ConfigReader;
use \Owncloud\Updater\Controller\DownloadController;

/**
 * Class DetectCommand
 *
 * @package Owncloud\Updater\Command
 */
class DetectCommand extends Command {
	/**
	 * @var Fetcher $fetcher
	 */
	protected $fetcher;

	/**
	 * @var ConfigReader $configReader
	 */
	protected $configReader;

	/**
	 *
	 */
	protected $output;

	/**
	 * Constructor
	 *
	 * @param Fetcher $fetcher
	 * @param ConfigReader $configReader
	 */
	public function __construct(Fetcher $fetcher, ConfigReader $configReader) {
		parent::__construct();
		$this->fetcher = $fetcher;
		$this->configReader = $configReader;
	}

	protected function configure() {
		$this
				->setName('upgrade:detect')
				->setDescription('Detect
- 1. currently existing code, 
- 2. version in config.php, 
- 3. online available version.
(ASK) what to do? (download, upgrade, abort, …)')
				->addOption(
					'exit-if-none',
					null,
					InputOption::VALUE_NONE,
					'exit with non-zero status code if new version is not found'
				)
				->addOption(
					'only-check',
					null,
					InputOption::VALUE_NONE,
					'Only check if update is available'
				)
		;
		;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		$registry = $this->container['utils.registry'];
		$registry->set('feed', false);

		$fsHelper = $this->container['utils.filesystemhelper'];
		$downloadController = new DownloadController($this->fetcher, $registry, $fsHelper);
		try {
			$currentVersion = $this->configReader->getByPath('system.version');
			if (!\strlen($currentVersion)) {
				throw new \UnexpectedValueException('Could not detect installed version.');
			}

			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$this->getApplication()->getLogger()->info('ownCloud ' . $currentVersion . ' found');
			$output->writeln('Current version is ' . $currentVersion);

			$feedData = $downloadController->checkFeed();
			if (!$feedData['success']) {
				// Network errors, etc
				$output->writeln("Can't fetch feed.");
				$output->writeln($feedData['exception']->getMessage());
				/* @phan-suppress-next-line PhanUndeclaredMethod */
				$this->getApplication()->logException($feedData['exception']);
				// Return a number to stop the queue
				return $input->getOption('exit-if-none') ? 4 : 0;
			}

			/** @var \Owncloud\Updater\Utils\Feed $feed */
			$feed = $feedData['data']['feed'];
			if (!$feed->isValid()) {
				// Feed is empty. Means there are no updates
				$output->writeln('No updates found online.');
				return $input->getOption('exit-if-none') ? 4 : 0;
			}

			$registry->set('feed', $feed);
			$output->writeln(
				\sprintf(
					'Online version is %s [%s]',
					$feed->getVersion(),
					$this->fetcher->getUpdateChannel()
				)
			);

			if ($input->getOption('only-check')) {
				return 0;
			}

			$action = $this->ask($input, $output);
			if ($action === 'abort') {
				$output->writeln('Exiting on user command.');
				return 128;
			}

			$this->output = $output;
			$packageData = $downloadController->downloadOwncloud([$this, 'progress']);
			//Empty line, in order not to overwrite the progress message
			$this->output->writeln('');
			if (!$packageData['success']) {
				$registry->set('feed', null);
				throw $packageData['exception'];
			}

			if ($action === 'download') {
				$output->writeln('Downloading has been completed. Exiting.');
				return 64;
			}
		} catch (ClientException $e) {
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$this->getApplication()->getLogger()->error($e->getMessage());
			$output->writeln('<error>Network error</error>');
			$output->writeln(
				\sprintf(
					'<error>Error %d: %s while fetching an URL %s</error>',
					$e->getCode(),
					$e->getResponse()->getReasonPhrase(),
					(string) $e->getRequest()->getUri()
				)
			);
			return 2;
		} catch (\Exception $e) {
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$this->getApplication()->getLogger()->error($e->getMessage());
			$output->writeln('<error>'.$e->getMessage().'</error>');
			return 2;
		}

		return 0;
	}

	/**
	 * Ask what to do
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return string
	 */
	public function ask(InputInterface $input, OutputInterface $output) {
		$helper = $this->getHelper('question');
		$question = new ChoiceQuestion(
			'What would you do next?',
			['download', 'upgrade', 'abort'],
			'1'
		);
		$action = $helper->ask($input, $output, $question);

		return $action;
	}

	/**
	 * Callback to output download progress
	 * @param int $downloadTotal
	 * @param int $downloadedBytes
	 * @param int $uploadTotal
	 * @param int $uploadedBytes
	 */
	public function progress($downloadTotal, $downloadedBytes, $uploadTotal, $uploadedBytes) {
		if ($downloadTotal > 0) {
			$percent = \intval(100 * $downloadedBytes / $downloadTotal);
			$this->output->write("Downloaded $percent% ($downloadedBytes of $downloadTotal)\r");
		}
	}
}
