<?php
/**
 * @author Andreas Fischer <bantu@owncloud.com>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author tbelau666 <thomas.belau@gmx.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OC\Core\Command\Db;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\Type;
use OC\DB\MDB2SchemaManager;
use OCP\App\IAppManager;
use OCP\IConfig;
use OC\DB\Connection;
use OC\DB\ConnectionFactory;
use OC\DB\MigrationService;
use OCP\DB\QueryBuilder\IQueryBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class ConvertType extends Command {
	/** @var \OCP\IConfig */
	protected $config;

	/** @var string */
	protected $targetType;

	/** @var string */
	protected $targetHostname;

	/** @var string */
	protected $targetPort;

	/** @var string */
	protected $targetUsername;

	/** @var string */
	protected $targetPassword;

	/** @var string */
	protected $targetDatabase;

	/** @var string */
	protected $targetTablePrefix;

	/**
	 * @var \OC\DB\ConnectionFactory
	 */
	protected $connectionFactory;

	/** @var IAppManager */
	protected $appManager;

	/** @var string[][] */
	protected $tableColumnTypes;

	/**
	 * @param \OCP\IConfig $config
	 * @param \OC\DB\ConnectionFactory $connectionFactory
	 * @param IAppManager $appManager
	 */
	public function __construct(IConfig $config, ConnectionFactory $connectionFactory, IAppManager $appManager) {
		$this->config = $config;
		$this->connectionFactory = $connectionFactory;
		$this->appManager = $appManager;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('db:convert-type')
			->setDescription('Convert the ownCloud database to the newly configured one. This feature is currently experimental.')
			->addArgument(
				'type',
				InputArgument::REQUIRED,
				'The type of the database to convert to.'
			)
			->addArgument(
				'username',
				InputArgument::REQUIRED,
				'The username of the database to convert to.'
			)
			->addArgument(
				'hostname',
				InputArgument::REQUIRED,
				'The hostname of the database to convert to.'
			)
			->addArgument(
				'database',
				InputArgument::REQUIRED,
				'The name of the database to convert to.'
			)
			->addOption(
				'port',
				null,
				InputOption::VALUE_REQUIRED,
				'The port of the database to convert to.'
			)
			->addOption(
				'password',
				null,
				InputOption::VALUE_REQUIRED,
				'The password of the database to convert to. Will be asked when not specified. Can also be passed via stdin.'
			)
			->addOption(
				'clear-schema',
				null,
				InputOption::VALUE_NONE,
				'Remove all tables from the destination database.'
			)
			->addOption(
				'all-apps',
				null,
				InputOption::VALUE_NONE,
				'Whether to create schema for all apps instead of only installed apps.'
			)
			->addOption(
				'chunk-size',
				null,
				InputOption::VALUE_REQUIRED,
				'The maximum number of database rows to handle in a single query, bigger tables will be handled in chunks of this size. Lower this if the process runs out of memory during conversion.',
				1000
			)
		;
	}

	/**
	 * @param InputInterface $input
	 */
	protected function validateInput(InputInterface $input) {
		if ($this->targetType === 'sqlite3') {
			throw new \InvalidArgumentException(
				'Converting to SQLite (sqlite3) is currently not supported.'
			);
		}

		if ($this->targetType === $this->config->getSystemValue('dbtype', '')) {
			throw new \InvalidArgumentException(
				\sprintf('Can not convert from %1$s to %1$s.', $this->targetType)
			);
		}
		if ($this->targetType === 'oci' && $input->getOption('clear-schema')) {
			// Doctrine unconditionally tries (at least in version 2.3)
			// to drop sequence triggers when dropping a table, even though
			// such triggers may not exist. This results in errors like
			// "ORA-04080: trigger 'OC_STORAGES_AI_PK' does not exist".
			throw new \InvalidArgumentException(
				'The --clear-schema option is not supported when converting to Oracle (oci).'
			);
		}
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * return string|null
	 */
	protected function readPassword(InputInterface $input, OutputInterface $output) {
		// Explicitly specified password
		if ($input->getOption('password')) {
			return $input->getOption('password');
		}

		// Read from stdin. stream_set_blocking is used to prevent blocking
		// when nothing is passed via stdin.
		\stream_set_blocking(STDIN, 0);
		$password = \file_get_contents('php://stdin');
		\stream_set_blocking(STDIN, 1);
		if (\trim($password) !== '') {
			return $password;
		}

		// Read password by interacting
		if ($input->isInteractive()) {
			/** @var $dialog \Symfony\Component\Console\Helper\QuestionHelper */
			$dialog = $this->getHelperSet()->get('question');
			$q = new Question('<question>Enter a password to access a target database: </question>', false);
			$q->setHidden(true);
			$password = $dialog->ask($input, $output, $q);
			return $password;
		}
	}

	/**
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @return int|null|void
	 * @throws \Exception
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->writeln('<info>This feature is currently experimental.</info>');
		$this->targetType = $this->connectionFactory->normalizeType($input->getArgument('type'));
		$this->targetHostname = $input->getArgument('hostname');
		$this->targetPort = $input->getOption('port');
		$this->targetUsername = $input->getArgument('username');
		$this->targetDatabase = $input->getArgument('database');
		$this->targetTablePrefix = $this->config->getSystemValue('dbtableprefix', 'oc_');

		$this->validateInput($input);
		$this->targetPassword = $this->readPassword($input, $output);

		$fromDB = \OC::$server->getDatabaseConnection();
		$toDB = $this->getToDBConnection();

		if ($input->getOption('clear-schema')) {
			$this->clearSchema($toDB, $input, $output);
		}

		$this->createSchema($fromDB, $toDB, $input, $output);

		$toTables = $this->getTables($toDB);
		$fromTables = $this->getTables($fromDB);

		// warn/fail if there are more tables in 'from' database
		$extraFromTables = \array_diff($fromTables, $toTables);
		if (!empty($extraFromTables)) {
			$output->writeln('<comment>The following tables will not be converted:</comment>');
			$output->writeln($extraFromTables);
			if (!$input->getOption('all-apps')) {
				$output->writeln('<comment>Please note that tables belonging to available but currently not installed apps</comment>');
				$output->writeln('<comment>can be included by specifying the --all-apps option.</comment>');
			}
			/** @var $dialog \Symfony\Component\Console\Helper\QuestionHelper */
			$dialog = $this->getHelperSet()->get('question');
			$continue = $dialog->ask($input, $output, new Question('<question>Continue with the conversion (y/n)? [n] </question>', false));
			if ($continue !== 'y') {
				return;
			}
		}
		$intersectingTables = \array_intersect($toTables, $fromTables);
		$this->convertDB($fromDB, $toDB, $intersectingTables, $input, $output);
	}

	/**
	 * @param Connection $fromDB
	 * @param Connection $toDB
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 */
	protected function createSchema(Connection $fromDB, Connection $toDB, InputInterface $input, OutputInterface $output) {
		$output->writeln('<info>Creating schema in new database</info>');
		$schemaManager = new MDB2SchemaManager($toDB);
		$schemaManager->createDbFromStructure(\OC::$SERVERROOT.'/db_structure.xml');

		$this->replayMigrations($fromDB, $toDB, 'core');

		$apps = $this->getExistingApps($input->getOption('all-apps'));
		foreach ($apps as $app) {
			// Some apps has a cheat initial migration that creates schema from database.xml
			// So the app can have database.xml and use migrations in the same time
			if ($this->appHasMigrations($app)) {
				$this->replayMigrations($fromDB, $toDB, $app);
			} elseif (\file_exists($this->appManager->getAppPath($app).'/appinfo/database.xml')) {
				$schemaManager->createDbFromStructure($this->appManager->getAppPath($app).'/appinfo/database.xml');
			}
		}
	}

	/**
	 * @param bool $enabledOnly
	 * @return string[]
	 */
	protected function getExistingApps($enabledOnly) {
		$apps = $enabledOnly ? $this->appManager->getInstalledApps() : $this->appManager->getAllApps();
		// filter apps with missing code
		$existingApps = \array_filter(
			$apps,
			function ($appId) {
				return $this->appManager->getAppPath($appId) !== false;
			}
		);

		return $existingApps;
	}

	/**
	 * @param Connection $fromDB
	 * @param Connection $toDB
	 * @param $app
	 * @throws \Exception
	 * @throws \OC\NeedsUpdateException
	 */
	protected function replayMigrations(Connection $fromDB, Connection $toDB, $app) {
		if ($app !== 'core') {
			\OC_App::loadApp($app);
		}
		$sourceMigrationService = new MigrationService($app, $fromDB);
		$currentMigration = $sourceMigrationService->getMigration('current');
		if ($currentMigration !== '0') {
			$targetMigrationService = new MigrationService($app, $toDB);
			$targetMigrationService->migrate($currentMigration);
		}
	}

	/**
	 * @param string $app
	 * @return bool
	 */
	protected function appHasMigrations($app) {
		return \is_dir($this->appManager->getAppPath($app).'/appinfo/Migrations');
	}

	/**
	 * @param Connection $db
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 */
	protected function clearSchema(Connection $db, InputInterface $input, OutputInterface $output) {
		$toTables = $this->getTables($db);
		if (!empty($toTables)) {
			$output->writeln('<info>Clearing schema in new database</info>');
			foreach ($toTables as $table) {
				$db->getSchemaManager()->dropTable($table);
			}
		}
	}

	/**
	 * @param Connection $db
	 * @return string[]
	 */
	protected function getTables(Connection $db) {
		$filterExpression = '/^' . \preg_quote($this->targetTablePrefix) . '/';
		$db->getConfiguration()->
			setFilterSchemaAssetsExpression($filterExpression);
		return $db->getSchemaManager()->listTableNames();
	}

	/**
	 * @param Connection $fromDB
	 * @param Connection $toDB
	 * @param Table $table
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 */
	protected function copyTable(Connection $fromDB, Connection $toDB, Table $table, InputInterface $input, OutputInterface $output) {
		$tableName = $table->getName();
		$chunkSize = $input->getOption('chunk-size');

		$progress = new ProgressBar($output);

		$query = $fromDB->getQueryBuilder();
		$query->automaticTablePrefix(false);
		$query->selectAlias($query->createFunction('COUNT(*)'), 'num_entries')
			->from($tableName);
		$result = $query->execute();
		$count = $result->fetchColumn();
		$result->closeCursor();

		$numChunks = \ceil($count/$chunkSize);
		if ($numChunks > 1) {
			$output->writeln('chunked query, ' . $numChunks . ' chunks');
		}

		$progress->start($count);
		$redraw = $count > $chunkSize ? 100 : ($count > 100 ? 5 : 1);
		$progress->setRedrawFrequency($redraw);

		$query = $fromDB->getQueryBuilder();
		$query->automaticTablePrefix(false);
		$query->select('*')
			->from($tableName)
			->setMaxResults($chunkSize);

		try {
			// Primary key is faster
			$orderColumns = $table->getPrimaryKeyColumns();
		} catch (DBALException $e) {
			// But the table can have no primary key in this case we fallback to the column order
			$orderColumns = [];
			foreach ($table->getColumns() as $column) {
				$orderColumns[] = $column->getName();
			}
		}

		foreach ($orderColumns as $column) {
			$query->addOrderBy($column);
		}

		$insertQuery = $toDB->getQueryBuilder();
		$insertQuery->automaticTablePrefix(false);
		$insertQuery->insert($tableName);
		$parametersCreated = false;

		for ($chunk = 0; $chunk < $numChunks; $chunk++) {
			$query->setFirstResult($chunk * $chunkSize);

			$result = $query->execute();

			while ($row = $result->fetch()) {
				$progress->advance();
				if (!$parametersCreated) {
					foreach ($row as $key => $value) {
						$insertQuery->setValue($key, $insertQuery->createParameter($key));
					}
					$parametersCreated = true;
				}

				foreach ($row as $key => $value) {
					$insertQuery->setParameter($key, $value, $this->tableColumnTypes[$tableName][$key]);
				}
				$insertQuery->execute();
			}
			$result->closeCursor();
		}
		$progress->finish();
		$output->writeln("");
	}

	/**
	 * @param Table $table
	 * @return mixed
	 */
	protected function getColumnTypes(Table $table) {
		$tableName = $table->getName();
		foreach ($table->getColumns() as $column) {
			$columnName = $column->getName();
			$type = $table->getColumn($columnName)->getType()->getName();
			switch ($type) {
				case Type::BLOB:
				case Type::TEXT:
					$this->tableColumnTypes[$tableName][$columnName] = IQueryBuilder::PARAM_LOB;
					break;
				default:
					$this->tableColumnTypes[$tableName][$columnName] = null;
			}
		}
		return $this->tableColumnTypes[$tableName];
	}

	/**
	 * @param Connection $fromDB
	 * @param Connection $toDB
	 * @param string[] $tables
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 * @throws \Exception
	 */
	protected function convertDB(Connection $fromDB, Connection $toDB, array $tables, InputInterface $input, OutputInterface $output) {
		$this->config->setSystemValue('maintenance', true);
		try {
			$fromSchema = $fromDB->createSchema();
			// copy table rows
			foreach ($tables as $tableName) {
				$table = $fromSchema->getTable($tableName);
				if ($tableName === $toDB->getPrefix() . 'migrations') {
					$output->writeln(
						\sprintf(
							'<info>Skipping copying data for the table "%s", it will be populated later.</info>',
							$tableName
						)
					);
					continue;
				}
				$output->writeln($tableName);
				$this->tableColumnTypes[$tableName] = $this->getColumnTypes($table);
				$this->copyTable($fromDB, $toDB, $table, $input, $output);
			}
			if ($this->targetType === 'pgsql') {
				$tools = new \OC\DB\PgSqlTools($this->config);
				$tools->resynchronizeDatabaseSequences($toDB);
			}
			// save new database config
			$this->saveDBInfo();
		} catch (\Exception $e) {
			$this->config->setSystemValue('maintenance', false);
			throw $e;
		}
		$this->config->setSystemValue('maintenance', false);
	}

	/**
	 * @return Connection
	 */
	protected function getToDBConnection() {
		$connectionParams = [
			'host' => $this->targetHostname,
			'user' => $this->targetUsername,
			'password' => $this->targetPassword,
			'dbname' => $this->targetDatabase,
			'tablePrefix' => $this->targetTablePrefix,
		];
		if ($this->targetPort !== null) {
			$connectionParams['port'] = $this->targetPort;
		}
		return $this->connectionFactory->getConnection($this->targetType, $connectionParams);
	}

	/**
	 *
	 */
	protected function saveDBInfo() {
		$dbHost = $this->targetHostname;
		if ($this->targetPort !== null) {
			$dbHost .= ':' . $this->targetPort;
		}

		$this->config->setSystemValues([
			'dbtype'		=> $this->targetType,
			'dbname'		=> $this->targetDatabase,
			'dbhost'		=> $dbHost,
			'dbuser'		=> $this->targetUsername,
			'dbpassword'	=> $this->targetPassword,
		]);
	}
}
