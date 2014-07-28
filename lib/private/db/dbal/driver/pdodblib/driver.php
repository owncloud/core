<?php

namespace OC\DB\DBAL\Driver\PDODblib;

use OC\DB\DBAL\Platforms\DblibPlatform;

class Driver extends \Realestate\MssqlBundle\Driver\PDODblib\Driver
{
	public function connect(array $params, $username = null, $password = null, array $driverOptions = array())
	{
		if (stristr(PHP_OS, 'WIN') && PHP_OS != 'Darwin') {
			return parent::connect($params, $username, $password, $driverOptions);
		} else {
			$conn = new Connection(
				$this->_constructPdoDsn($params),
				$username,
				$password,
				$driverOptions
			);
		}

		return $conn;
	}

	public function getDatabasePlatform()
    {
        return new DblibPlatform();
    }

	private function _constructPdoDsn(array $params)
	{
		$dsn = 'dblib:';
		if (isset($params['host'])) {
			$dsn .= 'host=' . $params['host'] . ';';
		}
		if (isset($params['port'])) {
			$dsn .= 'port=' . $params['port'] . ';';
		}
		if (isset($params['dbname'])) {
			$dsn .= 'dbname=' . $params['dbname'] . ';';
		}
		// Support charset config
		if(isset($params['charset'])) {
			$dsn .= 'charset=' . $params['charset'] .';';
		}

		return $dsn;
	}
}
