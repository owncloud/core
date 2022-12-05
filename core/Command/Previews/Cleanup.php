<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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
namespace OC\Core\Command\Previews;

use OC\Core\Command\Base;
use OC\PreviewCleanup;
use OCP\IDBConnection;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Cleanup extends Base {
	/**
	 * @var IDBConnection
	 */
	private $connection;

	public function __construct(IDBConnection $connection) {
		parent::__construct();
		$this->connection = $connection;
	}

	protected function configure() {
		parent::configure();

		$this
			->setName('previews:cleanup')
			->setDescription('Remove unreferenced previews')
			->addOption('all')
			->addArgument('chunk_size', InputArgument::OPTIONAL, '', 1000)
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$all = $input->hasOption('all');
		$chunk_size = $input->getArgument('chunk_size');
		$chunk_size_valid = false;
		if (is_numeric($chunk_size)) {
			$chunk_size = (int) $chunk_size;
			if ($chunk_size > 0) {
				$chunk_size_valid = true;
			}
		}
		if (!$chunk_size_valid) {
			$output->writeln('<error>chunk_size must be a positive integer.</error>');
			return 1;
		}

		$pc = new PreviewCleanup($this->connection);
		$count = $pc->process($all, $chunk_size, static function ($userId, $name, $action) use ($output) {
			$output->writeln("$name - $userId: $action");
		});

		$output->writeln("$count orphaned previews deleted");
		return 0;
	}
}
