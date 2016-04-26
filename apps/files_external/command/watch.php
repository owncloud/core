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

namespace OCA\Files_External\Command;

use OC\Core\Command\Base;
use OCA\Files_external\NotFoundException;
use OCA\Files_external\Service\GlobalStoragesService;
use OCP\Files\Storage\INotifyStorage;
use OCP\Files\Storage\IStorage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\TableHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Watch extends Base {
	/**
	 * @var GlobalStoragesService
	 */
	protected $globalService;

	function __construct(GlobalStoragesService $globalService) {
		parent::__construct();
		$this->globalService = $globalService;
	}

	protected function configure() {
		$this
			->setName('files_external:watch')
			->setDescription('Watch external storages for changes')
			->addArgument(
				'mount_id',
				InputArgument::REQUIRED,
				'The id of the mount to check'
			);
		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$mountId = $input->getArgument('mount_id');

		try {
			$mount = $this->globalService->getStorage($mountId);
		} catch (NotFoundException $e) {
			$output->writeln('<error>Mount with id "' . $mountId . ' not found, check "occ files_external:list" to get available mounts"</error>');
			return 404;
		}

		$class = $mount->getBackend()->getStorageClass();
		$storage = new $class($mount->getBackendOptions());

		if ($storage instanceof INotifyStorage && $storage instanceof IStorage) {
			$updater = $storage->getUpdater();
			$storage->notify('', function ($code, $path, $path2) use ($updater, $storage) {
				switch ($code) {
					case INotifyStorage::NOTIFY_ADDED:
					case INotifyStorage::NOTIFY_MODIFIED:
						var_dump('update', $path);
						$updater->update($path);
						break;
					case INotifyStorage::NOTIFY_REMOVED:
						$updater->remove($path);
						break;
					case INotifyStorage::NOTIFY_RENAME:
						$updater->renameFromStorage($storage, $path, $path2);
						break;
				}
			});
		} else {
			$output->writeln('<error>storage backend does not support external change watching</error>');
		}
	}
}
