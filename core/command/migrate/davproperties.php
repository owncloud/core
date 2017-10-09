<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017 ownCloud GmbH
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

namespace OC\Core\Command\Migrate;

use Doctrine\DBAL\Exception\DriverException;
use Doctrine\DBAL\Exception\NonUniqueFieldNameException;
use OC\Files\Filesystem;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\IDBConnection;
use OCP\IUser;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class DavProperties extends Command {

	/**
	 * @var IUserManager
	 */
	protected $userManager;

	/**
	 * @var IDBConnection
	 */
	protected $connection;

	/**
	 * @var ConsoleOutput
	 */
	protected $output;

	public function __construct(IUserManager $userManager, IDBConnection $connection) {
		parent::__construct();
		$this->userManager = $userManager;
		$this->connection = $connection;

	}

	protected function configure() {
		$this
			->setName('migrate:davproperties')
			->setDescription('pre-runs the oc_properties migration in readiness for ownCloud X')
			->addOption(
				'limit',
				null,
				InputOption::VALUE_REQUIRED,
				'limit rows returned from database for testing. Defaults to all',
				0
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$this->output = $output;

		$this->fixDatabase();

		// Get the statements to run
		$output->writeln("Computing the statements that need executing");
		$limit = $input->getOption('limit');
		if($limit !== 0) {
			$output->writeln("Limiting to $limit results from DB");
		}
		$statements = $this->getSqlStatements($this->connection, $limit);

		// Run the statements on the DB
		if(empty($statements)) {
			$output->writeln("No update queries necessary");
			return 0;
		}
		$output->writeln("Executing statements on the DB");
		$bar = new ProgressBar($output, count($statements));
		foreach($statements as $s) {
			$this->connection->executeQuery($s);
			$bar->advance();
		}
		$bar->finish();
		$output->writeln("");

		if($input->getOption('limit') === 0) {
			$output->writeln("Dropping rows that are orphaned");
			// drop entries with empty fileid
			$qb = $this->connection->getQueryBuilder();
			$dropQuery = $qb
				->delete('properties')
				->where(
					$qb->expr()->eq('fileid', $qb->expr()->literal('0'))
				)
				->orWhere(
					$qb->expr()->isNull('fileid')
				);
			$dropQuery->execute();
		}

		$output->writeln("Finished");


	}

	protected function fixDatabase() {
		$this->output->writeln("Creating the additional column on the oc_properties table");

		// Add the column
		try {
			$sql = "ALTER TABLE `*PREFIX*properties` ADD `fileid` BIGINT NULL";
			$this->connection->executeQuery($sql);
		} catch (NonUniqueFieldNameException $e) {
			$this->output->writeln("Column already appear to exist");
		}

		$this->output->writeln("Adding fileid index to oc_properties table");
		// Add the index
		try {
			$sql = "CREATE INDEX fileid_index ON `*PREFIX*properties` (`fileid`)";
			$this->connection->executeQuery($sql);
		} catch (DriverException $e) {
			$this->output->writeln("Exception adding index - potentially already exists");
		}
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param $entry
	 * @return string|null
	 */
	private function getRepairEntrySql(IQueryBuilder $qb, $entry) {
		$userId = $entry['userid'];
		$user = $this->userManager->get($userId);
		if (!($user instanceof IUser)) {
			return null;
		}

		// Get the user folder (sets up mounts etc)
		$userFolder = \OC::$server->getUserFolder($userId);
		/** @var $storage \OC\Files\Storage\Storage */
		$path = $userFolder->getFullPath('') . substr($entry['propertypath'], 1, strlen($entry['propertypath']));
		list($storage, $internalPath) = Filesystem::resolvePath($path);

		$id = $storage->getCache()->getId($internalPath);

		if($id !== -1) {
			$updateQuery = $this->getRepairQuery($qb, $id, $userId, $entry['propertypath']);
			return $updateQuery->getSQL();
		}

		return null;
	}

	/**
	 * @param IQueryBuilder $qb
	 * @param int $fileId
	 * @param string $userId
	 * @param string $propertyPath
	 * @return IQueryBuilder
	 */
	private function getRepairQuery(IQueryBuilder $qb, $fileId, $userId, $propertyPath){
		return $qb->resetQueryParts()
			->update('properties')
			->set(
				'fileid',
				$qb->expr()->literal($fileId)
			)
			->where(
				$qb->expr()->eq('userid', $qb->expr()->literal($userId))
			)
			->andWhere(
				$qb->expr()->eq(
					'propertypath',
					$qb->expr()->literal($propertyPath)
				)
			);
	}

	/**
	 * @param IDBConnection $connection
	 * @param integer $limit
	 * @return array
	 */
	public function getSqlStatements(IDBConnection $connection, $limit) {
		$statements = [];

		$qb = $connection->getQueryBuilder();
		$qb->select('*')
			->from('properties', 'props')
			->setMaxResults(1);
		$result = $qb->execute();
		$row = $result->fetch();
		// There is nothing to do if table is empty or has no userid field
		if (!$row || !isset($row['userid'])) {
			$this->output->writeln("Properties table empty or does not have userid field");
			return [];
		}
		$qb->resetQueryParts()
			->select('userid', 'propertypath')
			->from('properties', 'props')
			->where($qb->expr()->isNull('fileid'))
			->groupBy('userid')
			->addGroupBy('propertypath')
			->orderBy('userid')
			->addOrderBy('propertypath');


		if($limit !== 0) {
			$qb->setMaxResults($limit);
		} else {
			$qb->setMaxResults(null);
		}

		$this->output->writeLn($qb->getSQL());


		$selectResult = $qb->execute();
		$bar = new ProgressBar($this->output, $selectResult->rowCount());
		while ($row = $selectResult->fetch()) {
			try {
				$sql = $this->getRepairEntrySql($qb, $row);
				if (!is_null($sql)) {
					$statements[] = $sql;
				}
			} catch (\Exception $e) {
				$this->output->writeln("<error>Exception: ".get_class($e)." Message: ".$e->getMessage()."</error>");
				\OC::$server->getLogger()->logException($e);
			}
			$bar->advance();
		}
		$bar->finish();
		$this->output->writeln('');
		//Mounted FS can have side effects on further migrations
		\OC_Util::tearDownFS();

		return $statements;
	}
}
