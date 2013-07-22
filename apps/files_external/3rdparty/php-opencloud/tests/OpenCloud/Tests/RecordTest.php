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

class RecordTest extends \PHPUnit_Framework_TestCase
{
	private
		$domain,
		$record;	// the record

	public function __construct() {
		$conn = new StubConnection('http://example.com', 'SECRET');
		$dns = new \OpenCloud\DNS\Service(
			$conn,
			'cloudDNS',
			'N/A',
			'publicURL'
		);
		$this->domain = new \OpenCloud\DNS\Domain($dns);
		$this->record = new \OpenCloud\DNS\Record($this->domain);
	}
	/**
	 * Tests
	 */
	public function test__construct() {
		$this->record = new \OpenCloud\DNS\Record(
			$this->domain,
			array('type'=>'A','ttl'=>60,'data'=>'1.2.3.4'));
		$this->assertEquals(
			'OpenCloud\DNS\Record',
			get_class($this->record));
	}
	public function testParent() {
		$this->assertEquals(
			$this->domain,
			$this->record->Parent());
	}
}
