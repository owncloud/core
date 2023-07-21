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
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TrustedServerList extends Command {
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
			->setName('federation:trusted-servers:list')
			->setDescription('List the trusted servers');
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int {
		$servers = $this->trustedServers->getServers();

		$statusMap = [
			TrustedServers::STATUS_OK => 'OK',
			TrustedServers::STATUS_PENDING => 'Pending',
			TrustedServers::STATUS_FAILURE => 'Failure',
			TrustedServers::STATUS_ACCESS_REVOKED => 'Revoked',
		];

		$table = new Table($output);
		$table->setHeaders(['id', 'server', 'status']);
		foreach ($servers as $server) {
			$table->addRow([$server['id'], $server['url'], $statusMap[$server['status']] ?? 'Unknown']);
		}
		$table->render();
		return 0;
	}
}
