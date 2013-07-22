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

class FlavorTest extends \PHPUnit_Framework_TestCase
{
	private
	    $compute,
		$flavor;	// Flavor object

	public function __construct() {
		$conn = new StubConnection('http://example.com', 'SECRET');
		$this->compute = new \OpenCloud\Compute\Service(
			$conn,
			'cloudServersOpenStack',
			'DFW',
			'publicURL'
		);
		$this->flavor = new \OpenCloud\Compute\Flavor($this->compute);
	}
	/**
	 * Tests
	 */
	public function test___construct() {
	    $this->assertEquals('OpenCloud\Compute\Flavor', get_class($this->flavor));
	}
    public function test__set1() {
		$flavor = $this->compute->Flavor();
		$flavor->id = 'NEW';
		$this->assertEquals('NEW', $flavor->id);
	}
    /**
     * @expectedException \OpenCloud\Common\Exceptions\AttributeError
     */
	public function test__set2() {
		$flavor = $this->compute->Flavor();
		$flavor->foo = 'BAR';
		$this->assertEquals('BAR', $flavor->foo);
    }
    public function testService() {
		$flavor = $this->compute->Flavor();
		$this->assertEquals('OpenCloud\Compute\Service', get_class($flavor->Service()));
    }
}
