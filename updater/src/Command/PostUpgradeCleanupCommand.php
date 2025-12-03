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

/**
 * Class PostUpgradeCleanupCommand
 *
 * @package Owncloud\Updater\Command
 */
class PostUpgradeCleanupCommand extends Command {
	protected function configure() {
		$this
				->setName('upgrade:postUpgradeCleanup')
				->setDescription('repair and cleanup step 2 (online) [danger, might take long]')
		;
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		$registry = $this->container['utils.registry'];
		$fsHelper = $this->container['utils.filesystemhelper'];
		$locator = $this->container['utils.locator'];

		//Update updater
		$feed = $registry->get('feed');
		$fullExtractionPath = $locator->getExtractionBaseDir() . '/' . $feed->getVersion();
		$tmpDir = $locator->getExtractionBaseDir() . '/' . $registry->get('installedVersion');
		$oldSourcesDir = $locator->getOwncloudRootPath();
		$newSourcesDir = $fullExtractionPath . '/owncloud';
		$newUpdaterDir = $newSourcesDir . '/updater';
		$oldUpdaterDir = $oldSourcesDir . '/updater';
		$tmpUpdaterDir = $tmpDir . '/updater';
		$fsHelper->mkdir($tmpUpdaterDir);

		foreach ($locator->getUpdaterContent() as $dir) {
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$this->getApplication()->getLogger()->debug('Moving updater/' . $dir);
			$fsHelper->tripleMove($oldUpdaterDir, $newUpdaterDir, $tmpUpdaterDir, $dir);
		}

		//Cleanup Filesystem
		$fsHelper->removeIfExists($locator->getExtractionBaseDir());

		//Retrigger integrity check
		try {
			$this->container['utils.occrunner']->run('integrity:check-core');
		} catch (\Exception $e) {
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$this->getApplication()->getLogger()->error('Integrity check failed');
			/* @phan-suppress-next-line PhanUndeclaredMethod */
			$this->getApplication()->logException($e);
		}

		//Cleanup updater cache
		$registry->clearAll();

		$output->writeln('Done');
		return 0;
	}
}
