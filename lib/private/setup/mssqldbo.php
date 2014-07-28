<?php

namespace OC\Setup;

use OC\DB\DBAL\Driver\PDODblib\Driver;

class MSSQLDBO extends AbstractDatabase {
	public $dbprettyname = 'MS SQL Server';

	public function setupDatabase($username) {

		// Fix database with port connection
		$host = $this->dbhost;
		$port = 1433;
		if(strpos($host, ':')) {
			list($host, $port)=explode(':', $host, 2);
		}

		$params = array(
			'host' => $host,
			'port' => $port,
			'dbname' => $this->dbname,
			'charset' => 'UTF-8'
		);

		$driver = new Driver();
		$driver->connect($params, $this->dbuser, $this->dbpassword);

		\OC_Config::setValue('dbuser', $this->dbuser);
		\OC_Config::setValue('dbpassword', $this->dbpassword);

		$this->createDatabaseStructure();
	}

	private function createDatabaseStructure() {
		$schemaManager = new \OC\DB\MDB2SchemaManager(\OC_DB::getConnection());
		$result = $schemaManager->createDbFromStructure($this->dbDefinitionFile);
		return $result;
	}
}
