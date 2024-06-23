<?php
namespace OC\Migrations;

use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Platforms\PostgreSqlPlatform;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use OCP\IDBConnection;
use OCP\Migration\ISqlMigration;

class Version20240507143125 implements ISqlMigration {
	public function sql(IDBConnection $connection) {
		$dbPlatform = $connection->getDatabasePlatform();
		if ($dbPlatform instanceof PostgreSqlPlatform || $dbPlatform instanceof SqlitePlatform) {
			return ["CREATE UNIQUE INDEX child_share_unique ON oc_share (share_with, parent) 
    		WHERE parent IS NOT NULL AND share_type = 2"];
		}

		if ($dbPlatform instanceof MySqlPlatform) {
			// This should be preceise enough as mysql ignores nulls in unique indexes
			return [
				"CREATE UNIQUE INDEX child_share_unique ON oc_share (item_source, share_with, share_type, parent);"
			];
		}

		return [];
	}
}
