<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
use Symfony\Component\Console\Output\OutputInterface;
use Owncloud\Updater\Utils\Collection;

/**
 * Class CheckSystemCommand
 *
 * @package Owncloud\Updater\Command
 */
class CheckSystemCommand extends Command {
	protected $message = 'Checking system health.';

	protected function configure() {
		$this
				->setName('upgrade:checkSystem')
				->setDescription('System check. System health and if dependencies are OK (we also count the number of files and DB entries and give time estimations based on hardcoded estimation)')
		;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		$locator = $this->container['utils.locator'];
		$fsHelper = $this->container['utils.filesystemhelper'];
		/** @var \Owncloud\Updater\Utils\Registry $registry */
		$registry = $this->container['utils.registry'];
		/** @var  \Owncloud\Updater\Utils\AppManager  $appManager */
		$appManager = $this->container['utils.appmanager'];
		$registry->set(
			'notShippedApps',
			$appManager->getNotShippedApps()
		);
		$docLink = $this->container['utils.docLink'];

		$collection = new Collection();

		$rootDirItems= $locator->getRootDirItems();
		foreach ($rootDirItems as $item) {
			$fsHelper->checkr($item, $collection);
		}
		$notReadableFiles = $collection->getNotReadable();
		$notWritableFiles = $collection->getNotWritable();

		if (\count($notReadableFiles)) {
			$output->writeln('<error>The following files and directories are not readable:</error>');
			$output->writeln($this->longArrayToString($notReadableFiles));
		}

		if (\count($notWritableFiles)) {
			$output->writeln('<error>The following files and directories are not writable:</error>');
			$output->writeln($this->longArrayToString($notWritableFiles));
		}

		if (\count($notReadableFiles) || \count($notWritableFiles)) {
			$output->writeln('<info>Please check if owner and permissions for these files are correct.</info>');
			$output->writeln(
				\sprintf(
					'<info>See %s for details.</info>',
					$docLink->getAdminManualUrl('installation/installation_wizard.html#strong-perms-label')
				)
			);
			return 2;
		} else {
			$output->writeln(' - file permissions are ok.');
		}

		return 0;
	}

	/**
	 * @param $array
	 * @return string
	 */
	protected function longArrayToString($array) {
		if (\count($array)>7) {
			$shortArray = \array_slice($array, 0, 7);
			$more = \sprintf('... and %d more items', \count($array) - \count($shortArray));
			\array_push($shortArray, $more);
		} else {
			$shortArray = $array;
		}
		$string = \implode(PHP_EOL, $shortArray);
		return $string;
	}
}
