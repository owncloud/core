<?php
/**
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Laurens Post <lkpost@scept.re>
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

namespace OC\Core\Command\Group;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Question\Question;

class Add extends Command {
	/** @var \OCP\IUserManager */
	protected $userManager;

	/** @var \OCP\IGroupManager */
	protected $groupManager;

	/**
	 */
	public function __construct(IGroupManager $groupManager) {
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('group:add')
			->setDescription('adds a group');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		 
  }
}
