<?php
/**
 *
 */

namespace OC\Core\Command\Group;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Add extends Command {
	/** @var \OCP\IUserManager */
	protected $userManager;

	/** @var \OCP\IGroupManager */
	protected $groupManager;

	/**
	 */
	public function __construct(IGroupManager $groupManager) {
		parent::__construct();
		$this->groupManager = $groupManager;
	}

	protected function configure() {
		$this
			->setName('group:add')
			->setDescription('adds a group')
			->addArgument(
				'group',
				InputArgument::REQUIRED,
				'The name of the group to create'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$groupName = $input->getArgument('group');
		$group = $this->groupManager->get($groupName);
		if (!$group) {
			$this->groupManager->createGroup($groupName);
			$group = $this->groupManager->get($groupName);
			$output->writeln('Created group "' . $group->getGID() . '"');
		} else {
			$output->writeln('<error>The group already exists</error>');
			return 1;
		}
  }
}
