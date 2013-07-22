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

class PublicServer extends \OpenCloud\Compute\Server {
	public function CreateJson($x='server') {
		return parent::CreateJson($x);
	}
}

class ServerTest extends \PHPUnit_Framework_TestCase
{
	private
		$service,
		$server;
	public function __construct() {
		$conn = new StubConnection('http://example.com', 'SECRET');
		$this->service = new \OpenCloud\Compute\Service(
			$conn,
			'cloudServersOpenStack',
			'DFW',
			'publicURL'
		);
		$this->server = new \OpenCloud\Compute\Server(
		    $this->service, 'SERVER-ID');
	}

	/**
	 * Tests
	 */
	public function test__construct() {
		$this->assertEquals(
		    'OpenCloud\Compute\Server',
		    get_class($this->server));
	}
	public function testUrl() {
		$this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/v2/9999/servers/'.
			    '9bfd203a-0695-xxxx-yyyy-66c4194c967b',
			$this->server->Url());
		$this->assertEquals(
			'https://dfw.servers.api.rackspacecloud.com/v2/9999/servers/'.
			    '9bfd203a-0695-xxxx-yyyy-66c4194c967b/action',
			$this->server->Url('action'));
	}
	public function test_ip() {
	    $this->assertEquals('500.6.73.19', $this->server->ip(4));
	    $this->assertEquals(
	        '2001:4800:780e:0510:199e:7e1e:xxxx:yyyy',
	        $this->server->ip(6));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\InvalidIpTypeError
	 */
	public function test_ip_bad() {
	    $this->assertEquals('FOO', $this->server->ip(5));
	}
	public function testCreate() {
		$resp = $this->server->Create();
		$this->assertEquals(TRUE, $resp->HttpStatus());
		$this->assertEquals(RAXSDK_USER_AGENT, $this->server->metadata->sdk);
	}
	/**
	 * @expectedException OpenCloud\Common\Exceptions\RebuildError
	 */
	public function testRebuild1() {
		$resp = $this->server->Rebuild();
		$this->assertEquals(TRUE, $resp->HttpStatus());
		$this->assertEquals(RAXSDK_USER_AGENT, $this->server->metadata->sdk);
	}
	/**
	 * @expectedException OpenCloud\Common\Exceptions\RebuildError
	 */
	public function testRebuild2() {
		$resp = $this->server->Rebuild(array('adminPass'=>'FOOBAR'));
		$this->assertEquals(TRUE, $resp->HttpStatus());
		$this->assertEquals(RAXSDK_USER_AGENT, $this->server->metadata->sdk);
	}
	public function testRebuild3() {
		$image = $this->service->Image();
		$image->id = '123';
		$resp = $this->server->Rebuild(array(
			'adminPass'=>'FOOBAR',
			'image'=>$image));
		$this->assertEquals(TRUE, $resp->HttpStatus());
	}
	public function testDelete() {
		$resp = $this->server->Delete();
		$this->assertEquals(TRUE, $resp->HttpStatus());
	}
	public function testUpdate() {
		$resp = $this->server->Update(array('name'=>'FOO-BAR'));
		$this->assertEquals(TRUE, $resp->HttpStatus());
		$this->assertEquals('FOO-BAR', $this->server->name);
	}
	public function testReboot() {
		$this->assertEquals(
		    200,
		    $this->server->Reboot()->HttpStatus());
	}
	public function testCreateImage() {
		$resp = $this->server->CreateImage('EPIC');
		$this->assertEquals(
		    FALSE,
		    $resp);
	}
	public function testResize() {
		$this->assertEquals(
		    200,
		    $this->server->Resize($this->service->Flavor(4))->HttpStatus());
	}
	public function testResizeConfirm() {
	    $this->assertEquals(
	        200,
	        $this->server->ResizeConfirm()->HttpStatus());
	}
	public function testResizeRevert() {
	    $this->assertEquals(
	        200,
	        $this->server->ResizeRevert()->HttpStatus());
	}
	public function test_SetPassword() {
		$this->assertEquals(
			200,
			$this->server->SetPassword('Bad Password')->HttpStatus());
	}
	public function testMetadata() {
		$server = new \OpenCloud\Compute\Server($this->service);
		// this causes the exception
		$this->assertEquals(TRUE, is_object($server->Metadata()));
	}
	public function testMetadataMore() {
		$this->assertEquals(
			'OpenCloud\Compute\ServerMetadata',
			get_class($this->server->Metadata()));
	}
	public function test_ips() {
		$this->assertEquals(TRUE, is_object($this->server->ips()));
	}
	public function test_ips_network() {
		$this->assertEquals(TRUE, is_object($this->server->ips('public')));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\AttributeError
	 */
	public function test__set() {
	    $prop = 'rax-bandwidth:foobar';
	    $this->server->$prop = 'BAZ';
	    $this->assertEquals('BAZ', $this->server->$prop);
	    $this->server->foo = 'foobar'; // causes exception
	}
	public function testService() {
	    $this->assertEquals(
	        'OpenCloud\Compute\Service',
	        get_class($this->server->Service())
	    );
	}
	public function testResourceName() {
		$s = new \OpenCloud\Compute\Server($this->service);
		$s->id = 'Bad-ID';
		$this->assertEquals(
	'https://dfw.servers.api.rackspacecloud.com/v2/TENANT-ID/servers/Bad-ID',
			$s->Url());
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\ServerActionError
	 */
	public function testRescue() {
	    $password = $this->server->Rescue();
	    $this->assertGreaterThan(
	        5,
	        strlen($password));
	    $blank = new \OpenCloud\Compute\Server($this->service);
	    $blank->Rescue(); // should trigger the exception
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\ServerActionError
	 */
	public function testUnrescue() {
	    $resp = $this->server->Unrescue();
	    $this->assertEquals(
	        '200',
	        $resp->HttpStatus());
	    $blank = new \OpenCloud\Compute\Server($this->service);
	    $blank->Unrescue(); // should trigger the exception
	}
	public function testAttachVolume() {
		$vol = new \OpenCloud\Volume\Volume($this->service);
		$response = $this->server->AttachVolume($vol);
		$this->assertEquals(
			200,
			$response->HttpStatus());
	}
	public function testDetachVolume() {
		$vol = new \OpenCloud\Volume\Volume($this->service,'FOO');
		$response = $this->server->DetachVolume($vol);
		$this->assertEquals(
			202,
			$response->HttpStatus());
	}
	public function testVolumeAttachment() {
		$this->assertEquals(
			'OpenCloud\Compute\VolumeAttachment',
			get_class($this->server->VolumeAttachment()));
	}
	public function testVolumeAttachmentList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->server->VolumeAttachmentList()));
	}
	public function testCreate_personality() {
		$new = new PublicServer($this->service);
		$new->AddFile('/tmp/hello.txt', 'Hello, world!');
		$obj = json_decode($new->CreateJson());
		$this->assertEquals(
			TRUE,
			is_array($obj->server->personality));
		$this->assertEquals(
			'/tmp/hello.txt',
			$obj->server->personality[0]->path);
	}
}
