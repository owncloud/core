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

class ImageStub extends \OpenCloud\Compute\Image {}

class ImageTest extends \PHPUnit_Framework_TestCase
{
	private
		$compute;
	public function __construct() {
		$conn = new StubConnection('http://example.com','SECRET');
		$this->compute = new \OpenCloud\Compute\Service($conn,
		    'cloudServersOpenStack','DFW','publicURL');
	}
	/**
	 * Tests
	 */

	/**
	 * @expectedException \OpenCloud\Common\Exceptions\InstanceNotFound
	 */
	public function test___construct() {
		$image = new \OpenCloud\Compute\Image($this->compute, 'XXXXXX');
    }
    public function test_good_image() {
		$image = new \OpenCloud\Compute\Image($this->compute);
		$this->assertEquals(NULL, $image->status);
		$this->assertEquals('OpenCloud\Common\Metadata', get_class($image->metadata));
	}
	/**
	 * @expectedException \OpenCloud\Common\Exceptions\JsonError
	 */
    public function test_bad_json() {
		$image = new \OpenCloud\Compute\Image($this->compute, 'BADJSON');
    }
    /**
     * @expectedException \OpenCloud\Common\Exceptions\EmptyResponseError
     */
    public function test_empty_json() {
		$image = new \OpenCloud\Compute\Image($this->compute, 'EMPTY');
    }
    /**
     * @expectedException \OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreate() {
    	$image = $this->compute->Image();
    	$image->Create();
    }
    /**
     * @expectedException \OpenCloud\Common\Exceptions\UpdateError
     */
    public function testUpdate() {
    	$image = $this->compute->Image();
    	$image->Update();
    }
    public function testJsonName() {
    	$x = new ImageStub($this->compute);
    	$this->assertEquals(
    		'image',
    		$x->JsonName());
    }
}
