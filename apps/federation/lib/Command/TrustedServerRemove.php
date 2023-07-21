<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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
namespace OCA\Federation\Command;

use OCA\Federation\TrustedServers;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TrustedServerRemove extends Command {
	/** @var TrustedServers */
	private $trustedServers;

	/**
	 * @param TrustedServers $trustedServers
	 */
	public function __construct(TrustedServers $trustedServers) {
		parent::__construct();
		$this->trustedServers = $trustedServers;
	}

	protected function configure() {
		$this
			->setName('federation:trusted-servers:remove')
			->setDescription('Remove a trusted server')
			->addArgument(
				'id',
				InputArgument::REQUIRED,
				'The id of the server. Check with occ federation:trusted-servers:list'
			);
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		$id = (int)$input->getArgument('id');
		try {
			$this->trustedServers->removeServer($id);
			$output->writeln("Removed server with id {$id}");
		} catch (\Exception $e) {
			$output->writeln("<error>{$e->getMessage()}</error>");
			return 1;
		}
		return 0;
	}
}
