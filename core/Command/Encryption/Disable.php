<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OC\Core\Command\Encryption;

use OCP\IConfig;
use OCP\IDBConnection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Disable extends Command {
	/**
	 * Maximum number of still-encrypted paths to print so the output fits
	 * on screen on systems with many leftover entries. The remaining count
	 * is reported as a summary.
	 */
	private const MAX_REPORTED_PATHS = 20;

	/** @var IDBConnection */
	protected $db;
	/** @var IConfig */
	protected $config;

	/**
	 * @param IDBConnection $db
	 * @param IConfig $config
	 */
	public function __construct(IDBConnection $db, IConfig $config) {
		parent::__construct();
		$this->db = $db;
		$this->config = $config;
	}

	protected function configure() {
		$this
			->setName('encryption:disable')
			->setDescription('Disable encryption.')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output): int {
		$qb = $this->db->getQueryBuilder();
		$qb->select($qb->createFunction('COUNT(*)'))
			->from('filecache', 'fc')
			->where($qb->expr()->gte('fc.encrypted', $qb->expr()->literal('1')));
		$results = $qb->execute();
		$encryptedCount = (int) $results->fetchOne();
		$results->free();
		if ($encryptedCount > 0) {
			$qb = $this->db->getQueryBuilder();
			$qb->select('fc.path')
				->from('filecache', 'fc')
				->where($qb->expr()->gte('fc.encrypted', $qb->expr()->literal('1')))
				->setMaxResults(self::MAX_REPORTED_PATHS);
			$results = $qb->execute();
			$encryptedPaths = $results->fetchFirstColumn();
			$results->free();

			$output->writeln('<error>The system still has encrypted files. Please decrypt them all before disabling encryption.</error>');
			$output->writeln('The following paths in the file cache are still flagged as encrypted:');
			foreach ($encryptedPaths as $path) {
				$output->writeln("    $path");
			}
			$remaining = $encryptedCount - \count($encryptedPaths);
			if ($remaining > 0) {
				$output->writeln("    ... and $remaining more still encrypted");
			}
			$output->writeln('');
			$output->writeln('Run "occ encryption:decrypt-all" to decrypt these. Entries on shared or');
			$output->writeln('external storage are skipped by decrypt-all and have to be decrypted by');
			$output->writeln('their owner, e.g. via "occ encryption:decrypt-all <user>".');
			return 1;
		}

		/**
		 * Delete both useMasterKey and userSpecificKey
		 */
		$this->config->deleteAppValue('encryption', 'useMasterKey');
		$this->config->deleteAppValue('encryption', 'userSpecificKey');

		$output->writeln('<info>Cleaned up config</info>');

		if ($this->config->getAppValue('core', 'encryption_enabled', 'no') !== 'yes') {
			$output->writeln('Encryption is already disabled');
		} else {
			$this->config->setAppValue('core', 'encryption_enabled', 'no');
			$output->writeln('<info>Encryption disabled</info>');
		}
		return 0;
	}
}
