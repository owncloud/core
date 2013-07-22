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
require_once('StubService.php');

class StubObjectStore extends \OpenCloud\ObjectStore\Service
{
    public function Request($url, $method='GET', array $headers=array(), $data=NULL)
	{
        return new \OpenCloud\Common\Request\Response\Blank;
    }
}

class ContainerTest extends \PHPUnit_Framework_TestCase
{
	private $service;
	private $container;

	/**
	 * @expectedException OpenCloud\Common\Exceptions\ContainerNotFoundError
	 */
	public function __construct()
	{
		$conn = new StubConnection('http://example.com', 'SECRET');
		$this->service = new StubObjectStore(
			$conn,
			'cloudFiles',
			'DFW',
			'publicURL'
		);
		//var_dump($this->service->Request());
	}

	public function getContainer()
	{
		if (null === $this->container) {
			$this->container = new \OpenCloud\ObjectStore\Container($this->service, 'TEST');
		}
		return $this->container;
	}

	public function test_construct()
	{
	    $this->assertEquals(
		    'TEST',
		    $this->getContainer()->name);
		$this->assertEquals(
		    'OpenCloud\Common\Metadata',
		    get_class($this->getContainer()->metadata));
	}

	public function testUrl()
	{
		$this->assertEquals(
		    'https://storage101.dfw1.clouddrive.com/v1/M-ALT-ID/TEST',
		    $this->getContainer()->Url()
		);

		$space_cont = new \OpenCloud\ObjectStore\Container($this->service, 'Name With Spaces');

		$this->assertEquals(
	        'https://storage101.dfw1.clouddrive.com/v1/M-ALT-ID/'.'Name%20With%20Spaces',
		    $space_cont->Url()
		);
	}

	public function testCreate()
	{
		$con = $this->getContainer()->Create(array('name'=>'SECOND'));
		$this->assertEquals(TRUE, $con);
		$this->assertEquals(
		    'https://storage101.dfw1.clouddrive.com/v1/M-ALT-ID/SECOND',
		    $this->getContainer()->Url());
	}

	/**
	 * @expectedException OpenCloud\Common\Exceptions\ContainerNameError
	 */
	public function testCreate0()
	{
		$con = $this->getContainer()->Create(array('name'=>'0'));
	}

	public function testUpdate()
	{
	    $this->assertEquals(
	        TRUE,
	        $this->getContainer()->Update());
	}

	public function testDelete()
	{
		$ret = $this->getContainer()->Delete();
		$this->assertEquals(TRUE, $ret);
	}

	public function testObjectList()
	{
		$olist = $this->getContainer()->ObjectList();
		$this->assertEquals(
		    'OpenCloud\Common\Collection',
		    get_class($olist));
	}

	public function testDataObject()
	{
		$obj = $this->getContainer()->DataObject();
		$this->assertEquals(
		    'OpenCloud\ObjectStore\DataObject',
		    get_class($obj));
		$obj = $this->getContainer()->DataObject('FOO');
		$this->assertEquals('FOO', $obj->name);
	}

	public function testService()
	{
		$this->assertEquals($this->service, $this->getContainer()->Service());
	}

	public function testEnableCDN1()
	{
	    $this->getContainer()->EnableCDN(100);
	}

	/**
	 * @expectedException OpenCloud\Common\Exceptions\CdnTtlError
	 */
	public function testEnableCDN2()
	{
	    $this->getContainer()->EnableCDN('FOOBAR');
	}

	/**
	 * @expectedException OpenCloud\Common\Exceptions\CdnTtlError
	 */
	public function testPubishToCDN2()
	{
	    $this->getContainer()->PublishToCDN('FOOBAR');
	}

	/**
	 * @expectedException OpenCloud\Common\Exceptions\CdnHttpError
	 */
	public function testDisableCDN()
	{
	    $this->getContainer()->DisableCDN();
	}

	public function testCDNURL()
	{
	    $this->assertEquals(
	        'https://cdn1.clouddrive.com/v1/M-ALT-ID/TEST',
	        $this->getContainer()->CDNURL());
	}

	public function testCDNinfo()
	{
	    $this->assertEquals(
	        NULL,
	        $this->getContainer()->CDNinfo());
	}

	public function testCDNURI()
	{
	    $this->assertEquals(
	        NULL,
	        $this->getContainer()->CDNURI());
	}

	public function testSSLURI()
	{
	    $this->assertEquals(
	        NULL,
	        $this->getContainer()->SSLURI());
	}

	public function testStreamingURI()
	{
	    $this->assertEquals(
	        NULL,
	        $this->getContainer()->StreamingURI());
	}

	public function testCreateStaticSite()
	{
		$this->assertEquals(
			'OpenCloud\Common\Request\Response\Blank',
			get_class($this->getContainer()->CreateStaticSite('index.html')));
	}

	public function testStaticSiteErrorPage()
	{
		$this->assertEquals(
			'OpenCloud\Common\Request\Response\Blank',
			get_class($this->getContainer()->StaticSiteErrorPage('error.html')));
	}

	public function testPublicUrl()
	{
	    $this->assertEquals(
	        '',
	        $this->getContainer()->PublicUrl());
	}
}
