<?php
namespace OC\Migrations;

use OCP\IDBConnection;
use OCP\Migration\ISqlMigration;

class Version20240507143125 implements ISqlMigration {
	public function sql(IDBConnection $connection) {
		return ["CREATE UNIQUE INDEX child_share_unique ON oc_share (share_with, parent) 
    		WHERE parent IS NOT NULL AND share_type = 2"];
	}
}
