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

class publicVolumeAttachment extends \OpenCloud\Compute\VolumeAttachment {
    public function CreateJson() { return parent::CreateJson(); }
}

class VolumeAttachmentTest extends \PHPUnit_Framework_TestCase
{
    private
        $att;
    public function __construct() {
        $conn = new StubConnection('http://example.com', 'SECRET');
        $compute = $conn->Compute(NULL, 'DFW');

        $debug = new \OpenCloud\Common\Debug;
        $debug->setState(true);

        $this->att = new publicVolumeAttachment(
            new \OpenCloud\Compute\Server($compute, 'XXX'),
            'FOO'
        );

        $debug->setState(FALSE);
    }
    /**
     * Tests
     */
    public function test__construct() {
        $conn = new StubConnection('http://example.com', 'SECRET');
        $compute = $conn->Compute(NULL, 'DFW');
        $this->att = new publicVolumeAttachment(
            new \OpenCloud\Compute\Server($compute, 'XXX'),
            'FOO'
        );
        $this->assertEquals(
            'FOO',
            $this->att->volumeId);
    }
    /**
     * @expectedException \OpenCloud\Common\Exceptions\UpdateError
     */
    public function testUpdate() {
        $this->att->Update();
    }
    public function testName() {
        $this->assertEquals(
            'Attachment [FOO]',
            $this->att->Name());
    }
    public function testCreateJson() {
        $obj = $this->att->CreateJson();
        $this->assertEquals(
            'FOO',
            $obj->volumeAttachment->volumeId);
    }
}
