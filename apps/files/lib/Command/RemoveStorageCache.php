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

namespace OCA\Files\Command;

use OCP\IDBConnection;
use OCP\DB\QueryBuilder\IQueryBuilder;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Remove the target storage from the oc_storages tables, and remove the
 * related files from the oc_filecache table.
 */
class RemoveStorageCache extends Command {
	private const DEFAULT_CHUNK_SIZE = 1000;

	/** @var IDBConnection */
	private $connection;

	public function __construct(IDBConnection $connection) {
		parent::__construct();
		$this->connection = $connection;
	}

	protected function configure() {
		$this
			->setName('files:remove-storage')
			->setDescription('Remove a storage from the storages table and related files from the filecache table.')
			->addArgument(
				'storage-id',
				InputArgument::OPTIONAL,
				'The numeric ID of the storage'
			)->addOption(
				'chunk-size',
				null,
				InputOption::VALUE_REQUIRED,
				'The number of rows that will be deleted at the same time.',
				self::DEFAULT_CHUNK_SIZE
			)->addOption(
				'show-candidates',
				null,
				InputOption::VALUE_NONE,
				'Show possible candidates for obsolete storages. This query can take a while.'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		if ($input->getOption('show-candidates')) {
			$this->showCandidates($output);
			return 0;
		}

		$storage_id = \intval($input->getArgument('storage-id'));
		if ($storage_id <= 0) {
			$output->writeln('<error>A valid storage ID is required</error>');
			return 1;
		}

		$chunk_size = \intval($input->getOption('chunk-size'));
		if ($chunk_size <= 0) {
			$chunk_size = self::DEFAULT_CHUNK_SIZE;
		}

		$this->removeStorage($storage_id);
		$nfiles = $this->countCachedFiles($storage_id);

		if ($nfiles <= 0) {
			$output->writeln('No files found for the target storage');
			return 0;
		}

		$bar = new ProgressBar($output);
		$bar->start($nfiles);
		while (($maxId = $this->getMaxFileidInRange($storage_id, $chunk_size)) > 0) {
			$ndeleted = $this->removeCachedFiles($storage_id, $maxId);
			$bar->advance($ndeleted);
		}
		$bar->finish();
		return 0;
	}

	/**
	 * Remove the storage_id from the oc_storages table.
	 * @return int the number of rows deleted from the table
	 */
	private function removeStorage(int $storage_id) {
		$qb = $this->connection->getQueryBuilder();
		$result = $qb->delete('storages')
			->where($qb->expr()->eq('numeric_id', $qb->createNamedParameter($storage_id, IQueryBuilder::PARAM_INT)))
			->execute();
		return (int)$result;
	}

	/**
	 * Count the number of rows for the storage_id
	 * @return int the number of rows for the target storage
	 */
	private function countCachedFiles(int $storage_id) {
		$qb = $this->connection->getQueryBuilder();
		$result = $qb->select($qb->createFunction('count(*) as `count`'))
			->from('filecache')
			->where($qb->expr()->eq('storage', $qb->createNamedParameter($storage_id, IQueryBuilder::PARAM_INT)))
			->execute();

		$row = $result->fetch();
		$result->closeCursor();

		return (int)$row['count'];
	}

	/**
	 * Get the maximum fileid found in the first results of the storage_id
	 * If there is no file in the storage, 0 will be returned.
	 * The rows can be deleted by filtering by the storage_id and with
	 * the fileid lower or equal to the returned fileid
	 * @return int the maximum fileid found
	 */
	private function getMaxFileidInRange(int $storage_id, $maxResults) {
		$qb = $this->connection->getQueryBuilder();
		$result = $qb->select('fileid')
			->from('filecache')
			->where($qb->expr()->eq('storage', $qb->createNamedParameter($storage_id, IQueryBuilder::PARAM_INT)))
			->orderBy('fileid', 'ASC')
			->setMaxResults($maxResults)
			->execute();

		$maxId = 0;
		while (($row = $result->fetch()) !== false) {
			if ($maxId < (int)$row['fileid']) {
				$maxId = (int)$row['fileid'];
			}
		}

		$result->closeCursor();
		return $maxId;
	}

	/**
	 * Remove the files in the oc_filecache table with the target storage_id and
	 * with fileid lower or equal to the $max
	 * @return int the number of removed rows
	 */
	private function removeCachedFiles(int $storage_id, int $max) {
		$qb = $this->connection->getQueryBuilder();
		$result = $qb->delete('filecache')
			->where($qb->expr()->eq('storage', $qb->createNamedParameter($storage_id, IQueryBuilder::PARAM_INT)))
			->andWhere($qb->expr()->lte('fileid', $qb->createNamedParameter($max)))
			->execute();

		return (int)$result;
	}

	private function showCandidates(OutputInterface $output) {
		$qb = $this->connection->getQueryBuilder();
		$result = $qb->select(['f.storage', 's.id', $qb->createFunction('count(f.`storage`) as `count`')])
			->from('storages', 's')
			->leftJoin('s', 'mounts', 'm', $qb->expr()->eq('s.numeric_id', 'm.storage_id'))
			->rightJoin('s', 'filecache', 'f', $qb->expr()->eq('s.numeric_id', 'f.storage'))
			->where($qb->expr()->isNull('m.mount_point'))
			->groupBy('f.storage', 's.id')
			->execute();

		$table = new Table($output);
		$table->setHeaders(['storage-id', 'name', 'file_count']);
		while (($row = $result->fetch()) !== false) {
			$table->addRow([$row['storage'], $row['id'] ?? 'NULL', $row['count']]);
		}
		$table->render();
		$result->closeCursor();
	}
}
