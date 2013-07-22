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

class LoadBalancerServiceTest extends \PHPUnit_Framework_TestCase
{
	private
		$conn, 		// connection
		$service;	// volume service

	public function __construct() {
		$this->conn = new StubConnection('http://example.com', 'SECRET');
		$this->service = new \OpenCloud\LoadBalancer\Service(
			$this->conn,
			'cloudLoadBalancers',
			'DFW',
			'publicURL'
		);

	}
	/**
	 * Tests
	 */
	public function test__construct() {
		$this->service = new \OpenCloud\LoadBalancer\Service(
			$this->conn,
			'cloudLoadBalancers',
			'DFW',
			'publicURL'
		);
		$this->assertEquals(
			'OpenCloud\LoadBalancer\Service',
			get_class($this->service));
	}
	public function testUrl() {
		$this->assertEquals(
			'https://dfw.loadbalancers.api.rackspacecloud.com/v1.0/'.
			'TENANT-ID/loadbalancers',
			$this->service->Url());
	}
	public function testLoadBalancer() {
		$this->assertEquals(
			'OpenCloud\LoadBalancer\LoadBalancer',
			get_class($this->service->LoadBalancer()));
	}
	public function testLoadBalancerList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->service->LoadBalancerList()));
	}
	public function testBillableLoadBalancer() {
		$this->assertEquals(
			'OpenCloud\LoadBalancer\BillableLoadBalancer',
			get_class($this->service->BillableLoadBalancer()));
	}
	public function testLoadBillableBalancerList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->service->BillableLoadBalancerList()));
	}
	public function testAllowedDomain() {
		$this->assertEquals(
			'OpenCloud\LoadBalancer\AllowedDomain',
			get_class($this->service->AllowedDomain()));
	}
	public function testAllowedDomainList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->service->AllowedDomainList()));
	}
	public function testProtocol() {
		$this->assertEquals(
			'OpenCloud\LoadBalancer\Protocol',
			get_class($this->service->Protocol()));
	}
	public function testProtocolList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->service->ProtocolList()));
	}
	public function testAlgorithm() {
		$this->assertEquals(
			'OpenCloud\LoadBalancer\Algorithm',
			get_class($this->service->Algorithm()));
	}
	public function testAlgorithmList() {
		$this->assertEquals(
			'OpenCloud\Common\Collection',
			get_class($this->service->AlgorithmList()));
	}
}
