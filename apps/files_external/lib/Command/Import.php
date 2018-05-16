<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OCA\Files_External\Command;

use OC\Core\Command\Base;
use OC\User\NoUserException;
use OCP\Files\External\IStoragesBackendService;
use OCP\Files\External\Service\IGlobalStoragesService;
use OCP\Files\External\Service\IStoragesService;
use OCP\Files\External\Service\IUserStoragesService;
use OCP\IUserManager;
use OCP\IUserSession;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Import extends Base {
	/**
	 * @var IGlobalStoragesService
	 */
	private $globalService;

	/**
	 * @var IUserStoragesService
	 */
	private $userService;

	/**
	 * @var IUserSession
	 */
	private $userSession;

	/**
	 * @var IUserManager
	 */
	private $userManager;

	/** @var IStoragesBackendService */
	private $backendService;

	public function __construct(IGlobalStoragesService $globalService,
						 IUserStoragesService $userService,
						 IUserSession $userSession,
						 IUserManager $userManager,
						 IStoragesBackendService $backendService
	) {
		parent::__construct();
		$this->globalService = $globalService;
		$this->userService = $userService;
		$this->userSession = $userSession;
		$this->userManager = $userManager;
		$this->backendService = $backendService;
	}

	protected function configure() {
		$this
			->setName('files_external:import')
			->setDescription('Import mount configurations')
			->addOption(
				'user',
				null,
				InputOption::VALUE_OPTIONAL,
				'user to add the mount configurations for, if not set the mount will be added as system mount'
			)
			->addArgument(
				'path',
				InputArgument::REQUIRED,
				'path to a json file containing the mounts to import, use "-" to read from stdin'
			)
			->addOption(
				'dry',
				null,
				InputOption::VALUE_NONE,
				'Don\'t save the imported mounts, only list the new mounts'
			);
		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$user = $input->getOption('user');
		$path = $input->getArgument('path');
		if ($path === '-') {
			$json = \file_get_contents('php://stdin');
		} else {
			if (!\file_exists($path)) {
				$output->writeln('<error>File not found: ' . $path . '</error>');
				return 1;
			}
			$json = \file_get_contents($path);
		}
		if (!\is_string($json) || \strlen($json) < 2) {
			$output->writeln('<error>Error while reading json</error>');
			return 1;
		}
		$data = \json_decode($json, true);
		if (!\is_array($data)) {
			$output->writeln('<error>Error while parsing json</error>');
			return 1;
		}

		$storageService = $this->getStorageService($user);

		$isLegacy = isset($data['user']) || isset($data['group']);
		if ($isLegacy) {
			$output->writeln('<error>Importing legacy mount.json format not supported any more</error>');
			return 1;
		} else {
			if (!isset($data[0])) { //normalize to an array of mounts
				$data = [$data];
			}
			$mounts = \array_map(function ($entry) use ($storageService) {
				return $this->parseData($entry, $storageService);
			}, $data);
		}

		if ($user) {
			// ensure applicables are correct for personal mounts
			foreach ($mounts as $mount) {
				$mount->setApplicableGroups([]);
				$mount->setApplicableUsers([$user]);
			}
		}

		$existingMounts = $storageService->getAllStorages();

		foreach ($mounts as $mount) {
			foreach ($existingMounts as $existingMount) {
				if (
					$existingMount->getMountPoint() === $mount->getMountPoint() &&
					$existingMount->getApplicableGroups() === $mount->getApplicableGroups() &&
					$existingMount->getApplicableUsers() == $mount->getApplicableUsers() &&
					$existingMount->getBackendOptions() == $mount->getBackendOptions()
				) {
					$output->writeln("<error>Duplicate mount (" . $mount->getMountPoint() . ")</error>");
					return 1;
				}
			}
		}

		if ($input->getOption('dry')) {
			if (\count($mounts) === 0) {
				$output->writeln('<error>No mounts to be imported</error>');
				return 1;
			}
			$listCommand = new ListCommand($this->globalService, $this->userService, $this->userSession, $this->userManager);
			$listInput = new ArrayInput([], $listCommand->getDefinition());
			$listInput->setOption('output', $input->getOption('output'));
			$listInput->setOption('show-password', true);
			$listCommand->listMounts($user, $mounts, $listInput, $output);
		} else {
			foreach ($mounts as $mount) {
				$storageService->addStorage($mount);
			}
		}
		return 0;
	}

	private function parseData(array $data, IStoragesService $storageService) {
		// FIXME: use service to create config
		$mount = $storageService->createConfig();
		$mount->setId($data['mount_id']);
		$mount->setMountPoint($data['mount_point']);
		$mount->setBackend($this->getBackendByClass($data['storage']));
		$authBackend = $this->backendService->getAuthMechanism($data['authentication_type']);
		$mount->setAuthMechanism($authBackend);
		$mount->setBackendOptions($data['configuration']);
		$mount->setMountOptions($data['options']);
		$mount->setApplicableUsers(isset($data['applicable_users']) ? $data['applicable_users'] : []);
		$mount->setApplicableGroups(isset($data['applicable_groups']) ? $data['applicable_groups'] : []);
		return $mount;
	}

	private function getBackendByClass($className) {
		$backends = $this->backendService->getBackends();
		foreach ($backends as $backend) {
			if ($backend->getStorageClass() === $className) {
				return $backend;
			}
		}
	}

	protected function getStorageService($userId) {
		if (!empty($userId)) {
			$user = $this->userManager->get($userId);
			if ($user === null) {
				throw new NoUserException("user $userId not found");
			}
			$this->userSession->setUser($user);
			return $this->userService;
		} else {
			return $this->globalService;
		}
	}
}
