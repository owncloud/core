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

class VolumeTypeTest extends \PHPUnit_Framework_TestCase
{
    private
        $vt;
    public function __construct() {
        $conn = new StubConnection('http://example.com', 'SECRET');
        $serv = new \OpenCloud\Volume\Service(
            $conn, 'cloudBlockStorage', 'DFW', 'publicURL'
        );
        $this->vt = new \OpenCloud\Volume\VolumeType($serv);
    }
    /**
     * Tests
     */
    /**
     * @expectedException \OpenCloud\Common\Exceptions\CreateError
     */
    public function testCreate() {
        $this->vt->Create();
    }
    /**
     * @expectedException \OpenCloud\Common\Exceptions\UpdateError
     */
    public function testUpdate() {
        $this->vt->Update();
    }
    /**
     * @expectedException \OpenCloud\Common\Exceptions\DeleteError
     */
    public function testDelete() {
        $this->vt->Delete();
    }
    public function testJsonName() {
        $this->assertEquals(
            'volume_type',
            $this->vt->JsonName());
    }
    public function testResourceName() {
        $this->assertEquals(
            'types',
            $this->vt->ResourceName());
    }
}
