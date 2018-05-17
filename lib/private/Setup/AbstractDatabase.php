<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Manish Bisht <manish.bisht490@gmail.com>
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
namespace OC\Setup;

use OC\DB\MigrationService;
use OCP\IConfig;
use OCP\ILogger;
use OCP\Security\ISecureRandom;

abstract class AbstractDatabase {

	/** @var \OCP\IL10N */
	protected $trans;
	/** @var string */
	protected $dbDefinitionFile;
	/** @var string */
	protected $dbUser;
	/** @var string */
	protected $dbPassword;
	/** @var string */
	protected $dbName;
	/** @var string */
	protected $dbHost;
	/** @var string */
	protected $tablePrefix;
	/** @var IConfig */
	protected $config;
	/** @var ILogger */
	protected $logger;
	/** @var ISecureRandom */
	protected $random;

	public function __construct($trans, $dbDefinitionFile, IConfig $config, ILogger $logger, ISecureRandom $random) {
		$this->trans = $trans;
		$this->dbDefinitionFile = $dbDefinitionFile;
		$this->config = $config;
		$this->logger = $logger;
		$this->random = $random;
	}

	public function validate($config) {
		$errors = [];
		if (empty($config['dbuser']) && empty($config['dbname'])) {
			$errors[] = $this->trans->t("%s enter the database username and name.", [$this->dbprettyname]);
		} elseif (empty($config['dbuser'])) {
			$errors[] = $this->trans->t("%s enter the database username.", [$this->dbprettyname]);
		} elseif (empty($config['dbname'])) {
			$errors[] = $this->trans->t("%s enter the database name.", [$this->dbprettyname]);
		}
		if (\substr_count($config['dbname'], '.') >= 1) {
			$errors[] = $this->trans->t("%s you may not use dots in the database name", [$this->dbprettyname]);
		}
		return $errors;
	}

	public function initialize($config) {
		$dbUser = $config['dbuser'];
		$dbPass = $config['dbpass'];
		$dbName = $config['dbname'];
		$dbHost = !empty($config['dbhost']) ? $config['dbhost'] : 'localhost';
		$dbTablePrefix = isset($config['dbtableprefix']) ? $config['dbtableprefix'] : 'oc_';

		$this->config->setSystemValues([
			'dbname'		=> $dbName,
			'dbhost'		=> $dbHost,
			'dbtableprefix'	=> $dbTablePrefix,
		]);

		$this->dbUser = $dbUser;
		$this->dbPassword = $dbPass;
		$this->dbName = $dbName;
		$this->dbHost = $dbHost;
		$this->tablePrefix = $dbTablePrefix;
	}

	/**
	 * @param string $userName
	 */
	abstract public function setupDatabase($userName);

	public function runMigrations() {
		if (!\is_dir(\OC::$SERVERROOT."/core/Migrations")) {
			return;
		}
		$ms = new MigrationService('core', \OC::$server->getDatabaseConnection());
		$ms->migrate();
	}
}
