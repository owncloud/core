<?php
/**
 * @author Phil Davis <phil@jankaritech.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
use OCP\IUserManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ListUsers extends Base {
	/** @var \OCP\IUserManager */
	protected $userManager;

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
			->setDescription('list users')
			->addArgument(
				'search-pattern',
				InputArgument::OPTIONAL,
				'Restrict the list to users whose User ID contains the string'
			)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$userNameSubString = $input->getArgument('search-pattern');
		$users = $this->userManager->search($userNameSubString);
		$users = array_map(function($user) {
			/** @var IUser $user */
			return $user->getDisplayName();
		}, $users);
		parent::writeArrayInOutputFormat($input, $output, $users, self::DEFAULT_OUTPUT_PREFIX, true);
	}
}
