<?php
/**
 * @author Phil Davis <phil@jankaritech.com>
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

namespace OC\Core\Command\User;

use OC\Core\Command\Base;
use OCP\IUser;
use OCP\IUserManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ListUsers extends Base {
	/** @var \OCP\IUserManager */
	protected $userManager;

	const ATTRIBUTES = [
		'uid',
		'displayName',
		'email',
		'quota',
		'enabled',
		'lastLogin',
		'home',
		'backend',
		'cloudId',
		'searchTerms'
	];

	/**
	 * @param IUserManager $userManager
	 */
	public function __construct(IUserManager $userManager) {
		parent::__construct();
		$this->userManager = $userManager;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('user:list')
			->setDescription('List users and their attributes.')
			->addArgument(
				'search-pattern',
				InputArgument::OPTIONAL,
				'Restrict the list to users whose user ID contains the optional search pattern.'
			)
			->addOption(
				'attributes',
				'a',
				InputOption::VALUE_IS_ARRAY|InputOption::VALUE_REQUIRED,
				'Attributes to include from '.\implode(', ', self::ATTRIBUTES),
				['displayName']
			)
		;
	}

	/**
	 * If only a single attribute should be listed omit the key to make it fit in one row
	 */
	private function add(&$row, $key, $val, $useKey) {
		if ($useKey) {
			$row[$key] = $val;
		} else {
			$row = $val;
		}
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$userNameSubString = $input->getArgument('search-pattern');
		$attributes = \array_map('mb_strtolower', $input->getOption('attributes'));
		$useKey = \count($attributes) > 1
			|| $input->getOption('output') !== self::OUTPUT_FORMAT_PLAIN;
		$users = $this->userManager->search($userNameSubString);
		$users = \array_map(function (IUser $user) use ($output, $attributes, $useKey) {
			if ($output->isVerbose()) {
				// include all attributes
				$row = [
					'uid' => $user->getUID(),
					'displayName' => $user->getDisplayName(),
					'email' => $user->getEMailAddress(),
					'quota' => $user->getQuota(),
					'enabled' => $user->isEnabled(),
					'lastLogin' => $user->getLastLogin(),
					'home' => $user->getHome(),
					'backend' => $user->getBackendClassName(),
					'cloudId' => $user->getCloudId(),
					'searchTerms' => $user->getSearchTerms(),
				];
			} else {
				// include only specified attributes
				$row = [];
				foreach ($attributes as $attribute) {
					switch ($attribute) {
						case 'uid':
							$this->add($row, 'uid', $user->getUID(), $useKey);
							break;
						case 'displayname':
							$this->add($row, 'displayName', $user->getDisplayName(), $useKey);
							break;
						case 'email':
							$this->add($row, 'email', $user->getEMailAddress(), $useKey);
							break;
						case 'quota':
							$this->add($row, 'quota', $user->getQuota(), $useKey);
							break;
						case 'enabled':
							$this->add($row, 'enabled', $user->isEnabled(), $useKey);
							break;
						case 'lastlogin':
							$this->add($row, 'lastLogin', $user->getLastLogin(), $useKey);
							break;
						case 'home':
							$this->add($row, 'home', $user->getHome(), $useKey);
							break;
						case 'backend':
							$this->add($row, 'backend', $user->getBackendClassName(), $useKey);
							break;
						case 'cloudid':
							$this->add($row, 'cloudId', $user->getCloudId(), $useKey);
							break;
						case 'searchterms':
							$this->add($row, 'searchTerms', $user->getSearchTerms(), $useKey);
							break;
						default:
							throw new \UnexpectedValueException("Unknown attribute $attribute");
					}
				}
			}
			return $row;
		}, $users);
		parent::writeArrayInOutputFormat($input, $output, $users, self::DEFAULT_OUTPUT_PREFIX, true);
	}
}
