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

namespace OC\Core\Command\Group;

use OCP\IGroupManager;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Add extends Command {
	/** @var \OCP\IGroupManager */
	protected $groupManager;

	/**
	 * @param IGroupManager $groupManager
	 */
	public function __construct(IGroupManager $groupManager, IUserManager $userManager) {
		parent::__construct();
		$this->groupManager = $groupManager;
		$this->userManager = $userManager;
	}

	protected function configure() {
		$this
			->setName('group:add')
			->setDescription('adds a group')
			->addArgument(
				'group',
				InputArgument::REQUIRED,
				'Name of the group'
			)
			->addOption(
				'user',
				'u',
				InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
				'existing users that should be added to the group'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$groupName = $input->getArgument('group');
		$group = $this->groupManager->get($groupName);
		if (!$group) {
			$this->groupManager->createGroup($groupName);
			$group = $this->groupManager->get($groupName);
			if ($group) {
				$output->writeln('Created group "' . $group->getGID() . '"');
			} else {
				$output->writeln('<error>Group "' . $groupName . '" could not be created</error>');
				return 1;
			}
		} else {
			$output->writeln('The group "' . $group->getGID() . '" already exists');
		}

		$users = $input->getOption('user');

		foreach ($users as $userName) {
			$user = $this->userManager->get($userName);
			if ($user) {
				if ($group->inGroup($user)) {
					$output->writeln('User "' . $user->getUID() . '" is already a member of group "' . $group->getGID() . '"');
				} else {
					$group->addUser($user);
					$output->writeln('User "' . $user->getUID() . '" added to group "' . $group->getGID() . '"');
				}
			} else {
				$output->writeln('<error>User "' . $userName . '" could not be found - not added to group "' . $group->getGID() . '"</error>');
			}
		}
	}
}
