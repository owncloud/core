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

class Delete extends Command {
	/** @var IGroupManager */
	protected $groupManager;

	/**
	 * @param IGroupManager $groupManager
	 */
	public function __construct(IGroupManager $groupManager) {
		$this->groupManager = $groupManager;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('group:delete')
			->setDescription('Deletes the specified group.')
			->addArgument(
				'group',
				InputArgument::REQUIRED,
				'The group name.'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$groupName = $input->getArgument('group');
		$group = $this->groupManager->get($groupName);
		if ($group === null) {
			$output->writeln('<error>Group does not exist</error>');
			return 1;
		}

		if ($group->delete()) {
			$output->writeln('<info>The specified group was deleted</info>');
			return;
		}

		$output->writeln('<error>The specified group could not be deleted. Please check the logs.</error>');
		return 1;
	}
}
