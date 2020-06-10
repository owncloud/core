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
use OCP\Files\External\Auth\InvalidAuth;
use OCP\Files\External\Backend\InvalidBackend;
use OCP\Files\External\IStorageConfig;
use OCP\Files\External\Service\IGlobalStoragesService;
use OCP\Files\External\Service\IUserStoragesService;
use OCP\IUserManager;
use OCP\IUserSession;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends Base {
	/**
	 * @var IGlobalStoragesService
	 */
	protected $globalService;

	/**
	 * @var IUserStoragesService
	 */
	protected $userService;

	/**
	 * @var IUserSession
	 */
	protected $userSession;

	/**
	 * @var IUserManager
	 */
	protected $userManager;

	const ALL = -1;

	public function __construct(IGlobalStoragesService $globalService, IUserStoragesService $userService, IUserSession $userSession, IUserManager $userManager) {
		parent::__construct();
		$this->globalService = $globalService;
		$this->userService = $userService;
		$this->userSession = $userSession;
		$this->userManager = $userManager;
	}

	protected function configure() {
		$this
			->setName('files_external:list')
			->setDescription('List configured admin or personal mounts')
			->addArgument(
				'user_id',
				InputArgument::OPTIONAL,
				'User id to list the personal mounts for, if no user is provided admin mounts will be listed'
			)->addOption(
				'show-password',
				null,
				InputOption::VALUE_NONE,
				'Show passwords and secrets'
			)->addOption(
				'mount-options',
				null,
				InputOption::VALUE_NONE,
				'Show all mount options independent if they are set to their default value or not'
			)->addOption(
				'full',
				null,
				InputOption::VALUE_NONE,
				'Don\'t truncate long values in table output'
			)->addOption(
				'all',
				'a',
				InputOption::VALUE_NONE,
				'Show mounts for all users. All has precedence over user_id'
			)->addOption(
				'short',
				's',
				InputOption::VALUE_NONE,
				'Show only a reduced mount info'
			)->addOption(
				'importable-format',
				'i',
				InputOption::VALUE_NONE,
				'Provide output values in a format compatible with files_external:import'
			);
		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if ($input->getOption('all')) {
			/** @var  $mounts IStorageConfig[] */
			$mounts = $this->globalService->getStorageForAllUsers();
			$userId = self::ALL;
		} else {
			$userId = $input->getArgument('user_id');
			$storageService = $this->getStorageService($userId);

			/** @var  $mounts IStorageConfig[] */
			$mounts = $storageService->getAllStorages();
		}

		$this->listMounts($userId, $mounts, $input, $output);
	}

	/**
	 * @param $userId $userId
	 * @param IStorageConfig[] $mounts
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 */
	public function listMounts($userId, array $mounts, InputInterface $input, OutputInterface $output) {
		$outputType = $input->getOption('output');
		$outputIsJson = ($outputType === self::OUTPUT_FORMAT_JSON) || ($outputType === self::OUTPUT_FORMAT_JSON_PRETTY);
		$shortView = $input->getOption('short');
		$importableView = $input->getOption('importable-format');

		// check if there are any mounts present
		if (\count($mounts) === 0) {
			if ($outputType === self::OUTPUT_FORMAT_JSON || $outputType === self::OUTPUT_FORMAT_JSON_PRETTY) {
				$output->writeln('[]');
			} else {
				if ($userId === self::ALL) {
					$output->writeln("<info>No mounts configured</info>");
				} elseif ($userId) {
					$output->writeln("<info>No mounts configured by $userId</info>");
				} else {
					$output->writeln("<info>No admin mounts configured</info>");
				}
			}
			return;
		}

		// set minimum columns used based on options
		if ($shortView) {
			$headers = ['Mount ID', 'Mount Point', 'Auth', 'Type'];
			// if there is no userId or option --all is set, insert additional columns
			if (!$userId || $userId === self::ALL) {
				\array_splice($headers, 2, 0, 'Applicable Users');
				\array_splice($headers, 3, 0, 'Applicable Groups');
			}
		} else {
			$headers = ['Mount ID', 'Mount Point', 'Storage', 'Authentication Type', 'Configuration', 'Options'];

			if (!$userId || $userId === self::ALL) {
				$headers[] = 'Applicable Users';
				$headers[] = 'Applicable Groups';
			}

			if (!$input->getOption('show-password')) {
				$hideKeys = ['password', 'refresh_token', 'token', 'client_secret', 'public_key', 'private_key'];
				foreach ($mounts as $mount) {
					$config = $mount->getBackendOptions();
					foreach ($config as $key => $value) {
						if (\in_array($key, $hideKeys)) {
							$mount->setBackendOption($key, '***');
						}
					}
				}
			}
		}

		// default output style
		$full = $input->getOption('full');
		$showMountOptions = $input->getOption('mount-options');
		
		$defaultMountOptions = [
			'encrypt' => true,
			'previews' => true,
			'filesystem_check_changes' => 1,
			'read_only' => false,
			'enable_sharing' => false,
			'encoding_compatibility' => false
		];
		$countInvalid = 0;
		// In case adding array elements, add them only after the first two (Mount ID / Mount Point)
		// and before the last one entry (Type). Necessary for option -s
		$rows = \array_map(function (IStorageConfig $config) use ($outputIsJson, $shortView, $importableView, $userId, $defaultMountOptions, $full, $showMountOptions, &$countInvalid) {
			if ($config->getBackend() instanceof InvalidBackend || $config->getAuthMechanism() instanceof InvalidAuth) {
				$countInvalid++;
			}
			$storageConfig = $config->getBackendOptions();
			$keys = \array_keys($storageConfig);
			$values = \array_values($storageConfig);

			if (!$full) {
				$values = \array_map(function ($value) {
					if (\is_string($value) && \strlen($value) > 32) {
						return \substr($value, 0, 6) . '...' . \substr($value, -6, 6);
					} else {
						return $value;
					}
				}, $values);
			}

			$configStrings = \array_map(function ($key, $value) {
				return $key . ': ' . \json_encode($value);
			}, $keys, $values);
			$configString = \implode(', ', $configStrings);

			$mountOptions = $config->getMountOptions();
			$mountOptions = \array_merge($defaultMountOptions, $mountOptions);
			// hide defaults
			if (!$showMountOptions) {
				foreach ($mountOptions as $key => $value) {
					if ($value === $defaultMountOptions[$key]) {
						unset($mountOptions[$key]);
					}
				}
			}
			$keys = \array_keys($mountOptions);
			$values = \array_values($mountOptions);

			$optionsStrings = \array_map(function ($key, $value) {
				return $key . ': ' . \json_encode($value);
			}, $keys, $values);
			$optionsString = \implode(', ', $optionsStrings);

			// output dependent on option shortview
			if ($shortView) {
				$values = [
					$config->getId(),
					$config->getMountPoint()
				];
			} else {
				$configValue = $configString;
				if ($importableView) {
					$storageValue = $config->getBackend()->getStorageClass();
					$authValue = $config->getAuthMechanism()->getIdentifier();
					if ($outputIsJson) {
						$configValue = $storageConfig;
					}
				} else {
					$storageValue = $config->getBackend()->getText();
					$authValue = $config->getAuthMechanism()->getText();
				}
				$values = [
					$config->getId(),
					$config->getMountPoint(),
					$storageValue,
					$authValue,
					$configValue,
					$optionsString
				];
			}

			// output independent of option shortview
			if (!$userId || $userId === self::ALL) {
				if ($importableView && $outputIsJson) {
					$applicableUsers = $config->getApplicableUsers();
					$applicableGroups = $config->getApplicableGroups();
				} else {
					$applicableUsers = \implode(', ', $config->getApplicableUsers());
					$applicableGroups = \implode(', ', $config->getApplicableGroups());
					if ($applicableUsers === '' && $applicableGroups === '') {
						$applicableUsers = 'All';
					}
				}
				$values[] = $applicableUsers;
				$values[] = $applicableGroups;
			}
			// This MUST stay the last entry
			if ($shortView) {
				// query the auth type
				if (\stristr($config->getBackend()->getText(), 'session') === true) {
					$values[] =  'Session';
				} else {
					$values[] = 'User';
				}
				// get the mount type
				$values[] = $config->getType() === IStorageConfig::MOUNT_TYPE_ADMIN ? 'Admin' : 'Personal';
			}

			return $values;
		}, $mounts);

		if ($outputIsJson) {
			$keys = \array_map(function ($header) {
				return \strtolower(\str_replace(' ', '_', $header));
			}, $headers);

			$pairs = [];
			foreach ($rows as $array_1) {
				$pairs[] = \array_combine($keys, $array_1);
			}

			if ($outputType === self::OUTPUT_FORMAT_JSON) {
				$output->writeln(\json_encode(\array_values($pairs)));
			} else {
				$output->writeln(\json_encode(\array_values($pairs), JSON_PRETTY_PRINT));
			}
		} else {
			$table = new Table($output);
			$table->setHeaders($headers);
			$table->setRows($rows);
			$table->render();
		}

		if ($countInvalid > 0) {
			$output->writeln(
				"<error>Number of invalid storages found: $countInvalid.\n" .
				"The listed configuration details are likely incomplete.\n" .
				"Please make sure that all related apps that provide these storages are enabled or delete these.</error>"
			);
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
