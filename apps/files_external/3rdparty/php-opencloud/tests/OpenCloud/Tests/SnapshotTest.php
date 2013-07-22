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

class publicSnapshot extends \OpenCloud\Volume\Snapshot {
    public function CreateJson() { return parent::CreateJson(); }
}

class SnapshotTest extends \PHPUnit_Framework_TestCase
{
    private
        $snap;
    public function __construct() {
        $conn = new StubConnection('http://example.com', 'SECRET');
        $serv = new \OpenCloud\Volume\Service(
            $conn, 'cloudBlockStorage', 'DFW', 'publicURL'
        );
        $this->snap = new publicSnapshot($serv);
    }
    /**
     * Tests
     */
    /**
     * @expectedException \OpenCloud\Common\Exceptions\UpdateError
     */
    public function testUpdate() {
        $this->snap->Update();
    }
    public function testName() {
        $this->snap->display_name = 'FOOBAR';
        $this->assertEquals(
            'FOOBAR',
            $this->snap->Name());
    }
    public function testJsonName() {
        $this->assertEquals(
            'snapshot',
            $this->snap->JsonName());
    }
    public function testResourceName() {
        $this->assertEquals(
            'snapshots',
            $this->snap->ResourceName());
    }
    public function testCreateJson() {
        $this->snap->display_name = 'BARFOO';
        $obj = $this->snap->CreateJson();
        $this->assertEquals(
            'BARFOO',
            $obj->snapshot->display_name);
    }
}
