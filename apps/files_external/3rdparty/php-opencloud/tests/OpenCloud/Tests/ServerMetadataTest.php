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

class ServerMetadataTest extends \PHPUnit_Framework_TestCase
{
	private
		$server,
		$metadata;
	public function __construct() {
		$conn = new StubConnection('http://example.com', 'SECRET');
		$compute = new \OpenCloud\Compute\Service(
			$conn,
			'cloudServersOpenStack',
			'DFW',
			'publicURL'
		);
		$this->server = new \OpenCloud\Compute\Server($compute, 'Identifier');
		$this->metadata = new \OpenCloud\Compute\ServerMetadata($this->server);
	}
	/**
	 * Tests
	 */
	public function test___construct() {
		$this->assertEquals(
			'OpenCloud\Compute\ServerMetadata',
			get_class($this->metadata));
		// test whole group
		$metadata = $this->server->Metadata();
		$this->assertEquals(
			'bar',
			$metadata->foo);
		// now test individual property
		$met = $this->server->metadata('foobar');
		$met->foobar = 'BAZ';
		$this->assertEquals('BAZ', $met->foobar);
	}
	public function testUrl() {
		$this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/v2/9999/servers/9bfd203a-0695-xxxx-yyyy-66c4194c967b/metadata',
			$this->metadata->Url());
		$m2 = new \OpenCloud\Compute\ServerMetadata($this->server, 'property');
		$this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/v2/9999/servers/9bfd203a-0695-xxxx-yyyy-66c4194c967b/metadata/property',
			$m2->Url());
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\MetadataKeyError
	 */
	public function test___set() {
		$this->metadata->property = 'value';
		$this->assertEquals('value', $this->metadata->property);
		$m2 = new \OpenCloud\Compute\ServerMetadata($this->server, 'property');
		$m2->foo = 'bar'; // should cause exception
		$this->assertEquals(NULL, $m2->foo);
	}
	public function testCreate() {
		$this->metadata->foo = 'bar';
		$this->metadata->Create();
		$this->assertEquals('bar', $this->metadata->foo);
	}
	public function testUpdate() {
		$this->metadata->foo = 'baz';
		$this->metadata->Update();
		$this->assertEquals('baz', $this->metadata->foo);
	}
	public function testDelete() {
		$this->metadata->Delete();
	}
}
