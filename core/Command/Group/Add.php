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

namespace OC\Core\Command\Group;

use OCP\IGroupManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Add extends Command {
	/** @var \OCP\IGroupManager */
	protected $groupManager;

	/**
	 * @param IGroupManager $groupManager
	 */
	public function __construct(IGroupManager $groupManager) {
		parent::__construct();
		$this->groupManager = $groupManager;
	}

	protected function configure() {
		$this
			->setName('group:add')
			->setDescription('Adds a group.')
			->addArgument(
				'group',
				InputArgument::REQUIRED,
				'Name of the group.'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$groupName = $input->getArgument('group');
		$group = $this->groupManager->get($groupName);
		if (!$group) {
			$this->groupManager->createGroup($groupName);
			$group = $this->groupManager->get($groupName);
			if ($group) {
				$output->writeln('<info>Created group "' . $group->getGID() . '"</info>');
			} else {
				$output->writeln('<error>Group "' . $groupName . '" could not be created</error>');
				return 1;
			}
		} else {
			$output->writeln('<error>The group "' . $group->getGID() . '" already exists</error>');
			return 1;
		}
	}
}
