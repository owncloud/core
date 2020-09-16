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

	protected function execute(InputInterface $input, OutputInterface $output) {
		$qb = $this->db->getQueryBuilder();
		$qb->select($qb->expr()->literal('1'))
			->from('filecache', 'fc')
			->where($qb->expr()->gte('fc.encrypted', $qb->expr()->literal('1')))
			->setMaxResults(1);
		$results = $qb->execute();
		$hasEncryptedFiles = (bool) $results->fetchColumn(0);
		$results->closeCursor();
		if ($hasEncryptedFiles !== false) {
			$output->writeln('<info>The system still have encrypted files. Please decrypt them all before disabling encryption.</info>');
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
