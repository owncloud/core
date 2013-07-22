<?php
/**
 * Unit Tests
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @version 1.0.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Tests;

require_once('StubConnection.php');

class DatabaseTest extends \PHPUnit_Framework_TestCase
{
	private
		$inst,
		$db;
	public function __construct() {
		$conn = new StubConnection('http://example.com', 'SECRET');
		$dbaas = new \OpenCloud\Database\Service(
		    $conn, 'cloudDatabases', 'DFW', 'publicURL');
		$this->inst = new \OpenCloud\Database\Instance($dbaas);
		$this->inst->id = '12345678';
		$this->db = new \OpenCloud\Database\Database($this->inst);
	}
	/**
	 * Tests
	 */
	public function test__construct() {
		$this->assertEquals(
			'OpenCloud\Database\Database',
			get_class(new \OpenCloud\Database\Database($this->inst)));
	}
	public function testUrl() {
		$this->db->name = 'TEST';
		$this->assertEquals(
			'https://dfw.databases.api.rackspacecloud.com/v1.0/'.
			    'TENANT-ID/instances/12345678/databases/TEST',
			$this->db->Url());
	}
	public function testInstance() {
		$this->assertEquals(
			'OpenCloud\Database\Instance',
			get_class($this->db->Instance()));
	}
	public function testCreate() {
		$resp = $this->db->Create(array('name'=>'FOOBAR'));
		$this->assertEquals(
			'OpenCloud\Common\Request\Response\Blank',
			get_class($resp));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\DatabaseUpdateError
	 */
	public function testUpdate() {
		$this->db->Update();
	}
	public function testDelete() {
		$this->db->name = 'FOOBAR';
		$this->assertEquals(
			'OpenCloud\Common\Request\Response\Blank',
			get_class($this->db->Delete()));
	}
}
