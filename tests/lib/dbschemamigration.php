<?php
/**
 * Copyright (c) 2012 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class Test_DBSchemaMigration extends PHPUnit_Framework_TestCase {
	protected $schema_file = 'static://test_db_scheme';
	protected $schema_file2 = 'static://test_db_scheme2';
	protected $table1;

	public function setUp() {
		$dbfile = OC::$SERVERROOT.'/tests/data/db_structure_for_migration.xml';
		$dbfile2 = OC::$SERVERROOT.'/tests/data/db_structure_for_migration2.xml';

		$r = '_'.OC_Util::generateRandomBytes('4').'_';
		$content = file_get_contents( $dbfile );
		$content = str_replace( '*dbprefix*', '*dbprefix*'.$r, $content );
		file_put_contents( $this->schema_file, $content );
		$content = file_get_contents( $dbfile2 );
		$content = str_replace( '*dbprefix*', '*dbprefix*'.$r, $content );
		file_put_contents( $this->schema_file2, $content );

		$prefix = OC_Config::getValue( "dbtableprefix", "oc_" );
		
		$this->table1 = $prefix.$r.'uniq_idx';
	}

	public function tearDown() {
		OC_DB::removeDBStructure($this->schema_file);
//		OC_DB::removeDBStructure($this->schema_file2);

		unlink($this->schema_file);
		unlink($this->schema_file2);
	}

	// everything in one test, they depend on each other
	/**
	 * @medium
	 */
	public function testSchema() {
		$this->doTestSchemaCreating();
		$this->insertTestData();
		$this->doTestSchemaChanging();
	}

	public function doTestSchemaCreating() {
		OC_DB::createDbFromStructure($this->schema_file);
		$this->assertTableExist($this->table1);
	}

	public function insertTestData() {
		$sql = 'INSERT INTO ' . $this->table1 . ' values (?, ?)';
		$result = \OC_DB::executeAudited($sql, array('id0', 'name0'));
		$result = \OC_DB::executeAudited($sql, array('id0', 'name1'));
		$result = \OC_DB::executeAudited($sql, array('id1', 'name0'));
		$result = \OC_DB::executeAudited($sql, array('id1', 'name1'));
	}

	public function doTestSchemaChanging() {
		try {
			OC_DB::updateDbFromStructure($this->schema_file2);
			$this->fail('Schema migration shall fail!');
		} catch (\OC\DB\SchemaValidation\Exception $ex) {
			$this->assertEquals(1, count($ex->violation));
			$violationToTest = $ex->violation[0];
			$this->assertEquals("duplicate-key", $violationToTest['violation']);
			$this->assertStringEndsWith("uniq_idx", $violationToTest['table']);
			$this->assertEquals(2, count($violationToTest['data']));
		}
	}

	public function tableExist($table) {

		switch (OC_Config::getValue( 'dbtype', 'sqlite' )) {
			case 'sqlite':
			case 'sqlite3':
				$sql = "SELECT name FROM sqlite_master "
					.  "WHERE type = 'table' AND name = ? "
					.  "UNION ALL SELECT name FROM sqlite_temp_master "
					.  "WHERE type = 'table' AND name = ?";
				$result = \OC_DB::executeAudited($sql, array($table, $table));
				break;
			case 'mysql':
				$sql = 'SHOW TABLES LIKE ?';
				$result = \OC_DB::executeAudited($sql, array($table));
				break;
			case 'pgsql':
				$sql = 'SELECT tablename AS table_name, schemaname AS schema_name '
					.  'FROM pg_tables WHERE schemaname NOT LIKE \'pg_%\' '
					.  'AND schemaname != \'information_schema\' '
					.  'AND tablename = ?';
				$result = \OC_DB::executeAudited($sql, array($table));
				break;
			case 'oci':
				$sql = 'SELECT TABLE_NAME FROM USER_TABLES WHERE TABLE_NAME = ?';
				$result = \OC_DB::executeAudited($sql, array($table));
				break;
			case 'mssql':
				$sql = 'SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = ?';
				$result = \OC_DB::executeAudited($sql, array($table));
				break;
		}
		
		$name = $result->fetchOne();
		if ($name === $table) {
			return true;
		} else {
			return false;
		}
	}

	public function assertTableExist($table) {
		$this->assertTrue($this->tableExist($table), 'Table ' . $table . ' does not exist');
	}

	public function assertTableNotExist($table) {
		$type=OC_Config::getValue( "dbtype", "sqlite" );
		if( $type == 'sqlite' || $type == 'sqlite3' ) {
			// sqlite removes the tables after closing the DB
		} else {
			$this->assertFalse($this->tableExist($table), 'Table ' . $table . ' exists.');
		}
	}
}
