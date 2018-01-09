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
use OCP\IUserManager;
use OCP\IGroupManager;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ListUserGroups extends Base {
	/** @var \OCP\IUserManager */
	protected $userManager;

	/** @var \OCP\IGroupManager */
	protected $groupManager;

	/**
	 * @param IUserManager $userManager
	 * @param IGroupManager $groupManager
	 */
	public function __construct(IUserManager $userManager, IGroupManager $groupManager) {
		parent::__construct();
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('user:list-groups')
			->setDescription("Lists the groups a user belongs to")
			->addArgument(
				'uid',
				InputArgument::REQUIRED,
				'User ID.'
			)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$uid = $input->getArgument('uid');
		if (!$this->userManager->userExists($uid)) {
			$output->writeln("<error>User $uid does not exist.</error>");
			return 1;
		}

		$user = $this->userManager->get($uid);
		$groupNames = $this->groupManager->getUserGroupIds($user);
		parent::writeArrayInOutputFormat($input, $output, $groupNames);
	}
}
