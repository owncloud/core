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

class TrustedServerAdd extends Command {
	public const ERROR_ALREADY_TRUSTED = 1;
	public const ERROR_NO_OWNCLOUD_FOUND = 2;

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
			->setName('federation:trusted-servers:add')
			->setDescription('Adds a new trusted server')
			->addArgument(
				'url',
				InputArgument::REQUIRED,
				'The url pointing to the server, such as https://myserver:8888/server/owncloud'
			);
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		$url = $input->getArgument('url');
		if ($this->trustedServers->isTrustedServer($url)) {
			$output->writeln('<error>The server is already in the list of trusted servers.</error>');
			return self::ERROR_ALREADY_TRUSTED;
		}

		if (!$this->trustedServers->isOwnCloudServer($url)) {
			$output->writeln('<error>No ownCloud server found</error>');
			return self::ERROR_NO_OWNCLOUD_FOUND;
		}

		$id = $this->trustedServers->addServer($url);
		$output->writeln("Server added with id {$id}");

		return 0;
	}
}
