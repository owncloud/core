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

/* @phan-suppress-next-line PhanUnreferencedUseNormal */
use Owncloud\Updater\Utils\Checkpoint;
/* @phan-suppress-next-line PhanUnreferencedUseNormal */
use Owncloud\Updater\Utils\FilesystemHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Owncloud\Updater\Utils\OccRunner;
use Owncloud\Updater\Utils\ZipExtractor;

/**
 * Class ExecuteCoreUpgradeScriptsCommand
 *
 * @package Owncloud\Updater\Command
 */
class ExecuteCoreUpgradeScriptsCommand extends Command {
	/**
	 * @var OccRunner $occRunner
	 */
	protected $occRunner;

	/**
	 * ExecuteCoreUpgradeScriptsCommand constructor.
	 *
	 * @param null|string $occRunner
	 */
	public function __construct($occRunner) {
		parent::__construct();
		$this->occRunner = $occRunner;
	}

	protected function configure() {
		$this
				->setName('upgrade:executeCoreUpgradeScripts')
				->setDescription('execute core upgrade scripts [danger, might take long]');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 * @throws \Exception
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		$locator = $this->container['utils.locator'];
		/** @var FilesystemHelper $fsHelper */
		$fsHelper = $this->container['utils.filesystemhelper'];
		$registry = $this->container['utils.registry'];
		$fetcher = $this->container['utils.fetcher'];
		/** @var Checkpoint $checkpoint */
		$checkpoint = $this->container['utils.checkpoint'];

		$installedVersion = \implode('.', $locator->getInstalledVersion());
		$registry->set('installedVersion', $installedVersion);

		/** @var  \Owncloud\Updater\Utils\Feed $feed */
		$feed = $registry->get('feed');

		if ($feed) {
			$path = $fetcher->getBaseDownloadPath($feed);
			$fullExtractionPath = $locator->getExtractionBaseDir() . '/' . $feed->getVersion();

			if (\file_exists($fullExtractionPath)) {
				$fsHelper->removeIfExists($fullExtractionPath);
			}
			try {
				$fsHelper->mkdir($fullExtractionPath, true);
			} catch (\Exception $e) {
				$output->writeln('Unable create directory ' . $fullExtractionPath);
				throw $e;
			}

			$output->writeln('Extracting source into ' . $fullExtractionPath);
			$extractor = new ZipExtractor($path, $fullExtractionPath, $output);

			try {
				$extractor->extract();
			} catch (\Exception $e) {
				$output->writeln('Extraction has been failed');
				$fsHelper->removeIfExists($locator->getExtractionBaseDir());
				throw $e;
			}

			$tmpDir = $locator->getExtractionBaseDir() . '/' . $installedVersion;
			$fsHelper->removeIfExists($tmpDir);
			$fsHelper->mkdir($tmpDir);
			$oldSourcesDir = $locator->getOwncloudRootPath();
			$newSourcesDir = $fullExtractionPath . '/owncloud';

			$packageVersion = $this->loadVersion($newSourcesDir);
			$allowedPreviousVersions = $this->loadAllowedPreviousVersions($newSourcesDir);

			if (!$this->isUpgradeAllowed($installedVersion, $packageVersion, $allowedPreviousVersions)) {
				$message = \sprintf(
					'Update from %s to %s is not possible. Updates between multiple major versions and downgrades are unsupported.',
					$installedVersion,
					$packageVersion
				);
				/* @phan-suppress-next-line PhanUndeclaredMethod */
				$this->getApplication()->getLogger()->error($message);
				$output->writeln('<error>'. $message .'</error>');
				return 1;
			}

			$rootDirContent = \array_unique(
				\array_merge(
					$locator->getRootDirContent(),
					$locator->getRootDirItemsFromSignature($oldSourcesDir),
					$locator->getRootDirItemsFromSignature($newSourcesDir)
				)
			);
			foreach ($rootDirContent as $dir) {
				if ($dir === 'updater') {
					continue;
				}
				/* @phan-suppress-next-line PhanUndeclaredMethod */
				$this->getApplication()->getLogger()->debug('Replacing ' . $dir);
				$fsHelper->tripleMove($oldSourcesDir, $newSourcesDir, $tmpDir, $dir);
			}

			$fsHelper->copyr($tmpDir . '/config/config.php', $oldSourcesDir . '/config/config.php');

			//Get a new shipped apps list
			$newAppsDir = $fullExtractionPath . '/owncloud/apps';
			$newAppsList = $fsHelper->scandirFiltered($newAppsDir);

			//Remove old apps
			$appDirectories = $fsHelper->scandirFiltered($oldSourcesDir . '/apps');
			$oldAppList = \array_intersect($appDirectories, $newAppsList);
			foreach ($oldAppList as $appDirectory) {
				$fsHelper->rmdirr($oldSourcesDir . '/apps/' . $appDirectory);
			}

			foreach ($newAppsList as $appId) {
				$output->writeln('Copying the application ' . $appId);
				$fsHelper->copyr($newAppsDir . '/' . $appId, $locator->getOwnCloudRootPath() . '/apps/' . $appId, false);
			}

			try {
				$plain = $this->occRunner->run('upgrade');
				$output->writeln($plain);
			} catch (ProcessFailedException $e) {
				$lastCheckpointId = $checkpoint->getLastCheckpointId();
				if ($lastCheckpointId) {
					$lastCheckpointPath = $checkpoint->getCheckpointPath($lastCheckpointId);
					$fsHelper->copyr($lastCheckpointPath . '/apps', $oldSourcesDir . '/apps', false);
				}
				if ($e->getProcess()->getExitCode() != 3) {
					throw ($e);
				}
			}
		}
		return 0;
	}

	public function isUpgradeAllowed($installedVersion, $packageVersion, $canBeUpgradedFrom) {
		if (\version_compare($installedVersion, $packageVersion, '<=')) {
			foreach ($canBeUpgradedFrom as $allowedPreviousVersion) {
				if (\version_compare($allowedPreviousVersion, $installedVersion, '<=')) {
					return true;
				}
			}
		}
		return false;
	}

	/**
	 * @param string $pathToPackage
	 * @return string
	 */
	protected function loadVersion($pathToPackage) {
		require  $pathToPackage . '/version.php';
		/** @var $OC_Version array */
		return \implode('.', $OC_Version); /* @phan-suppress-current-line PhanUndeclaredVariable */
	}

	/**
	 * @param string $pathToPackage
	 * @return string[]
	 */
	protected function loadAllowedPreviousVersions($pathToPackage) {
		$canBeUpgradedFrom = $this->loadCanBeUpgradedFrom($pathToPackage);

		$firstItem = \reset($canBeUpgradedFrom);
		if (!\is_array($firstItem)) {
			$canBeUpgradedFrom = [$canBeUpgradedFrom];
		}

		$allowedVersions = [];
		foreach ($canBeUpgradedFrom as $version) {
			$allowedVersions[] = \implode('.', $version);
		}

		return $allowedVersions;
	}

	/**
	 * @param string $pathToPackage
	 * @return array
	 */
	protected function loadCanBeUpgradedFrom($pathToPackage) {
		require $pathToPackage . '/version.php';
		/** @var array $OC_VersionCanBeUpgradedFrom */
		return $OC_VersionCanBeUpgradedFrom; /* @phan-suppress-current-line PhanUndeclaredVariable */
	}
}
