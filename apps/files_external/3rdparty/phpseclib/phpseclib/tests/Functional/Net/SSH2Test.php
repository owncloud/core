<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2014 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Functional\Net;

use phpseclib3\Net\SSH2;
use phpseclib3\Tests\PhpseclibFunctionalTestCase;

class SSH2Test extends PhpseclibFunctionalTestCase
{
    public function testConstructor()
    {
        $ssh = new SSH2($this->getEnv('SSH_HOSTNAME'));

        $this->assertIsObject(
            $ssh,
            'Could not construct NET_SSH2 object.'
        );

        return $ssh;
    }

    /**
     * @depends testConstructor
     * @group github408
     * @group github412
     */
    public function testPreLogin(SSH2 $ssh)
    {
        $this->assertFalse(
            $ssh->isConnected(),
            'Failed asserting that SSH2 is not connected after construction.'
        );

        $this->assertFalse(
            $ssh->isAuthenticated(),
            'Failed asserting that SSH2 is not authenticated after construction.'
        );

        $this->assertNotEmpty(
            $ssh->getServerPublicHostKey(),
            'Failed asserting that a non-empty public host key was fetched.'
        );

        $this->assertTrue(
            $ssh->isConnected(),
            'Failed asserting that SSH2 is connected after public key fetch.'
        );

        $this->assertNotEmpty(
            $ssh->getServerIdentification(),
            'Failed asserting that the server identifier was set after connect.'
        );

        return $ssh;
    }

    /**
     * @depends testPreLogin
     */
    public function testBadPassword(SSH2 $ssh)
    {
        $username = $this->getEnv('SSH_USERNAME');
        $password = $this->getEnv('SSH_PASSWORD');
        $this->assertFalse(
            $ssh->login($username, 'zzz' . $password),
            'SSH2 login using password succeeded.'
        );

        $this->assertTrue(
            $ssh->isConnected(),
            'Failed asserting that SSH2 is connected after bad login attempt.'
        );

        $this->assertFalse(
            $ssh->isAuthenticated(),
            'Failed asserting that SSH2 is not authenticated after bad login attempt.'
        );

        return $ssh;
    }

    /**
     * @depends testBadPassword
     */
    public function testPasswordLogin(SSH2 $ssh)
    {
        $username = $this->getEnv('SSH_USERNAME');
        $password = $this->getEnv('SSH_PASSWORD');
        $this->assertTrue(
            $ssh->login($username, $password),
            'SSH2 login using password failed.'
        );

        $this->assertTrue(
            $ssh->isAuthenticated(),
            'Failed asserting that SSH2 is authenticated after good login attempt.'
        );

        return $ssh;
    }

    /**
     * @depends testPasswordLogin
     * @group github280
     */
    public function testExecWithMethodCallback(SSH2 $ssh)
    {
        $callbackObject = $this->getMockBuilder('stdClass')
            ->setMethods(['callbackMethod'])
            ->getMock();
        $callbackObject
            ->expects($this->atLeastOnce())
            ->method('callbackMethod')
            ->will($this->returnValue(true));
        $ssh->exec('pwd', [$callbackObject, 'callbackMethod']);

        return $ssh;
    }

    public function testGetServerPublicHostKey()
    {
        $ssh = new SSH2($this->getEnv('SSH_HOSTNAME'));

        $this->assertIsString($ssh->getServerPublicHostKey());
    }

    public function testOpenSocketConnect()
    {
        $fsock = fsockopen($this->getEnv('SSH_HOSTNAME'), 22);
        $ssh = new SSH2($fsock);

        $username = $this->getEnv('SSH_USERNAME');
        $password = $this->getEnv('SSH_PASSWORD');
        $this->assertTrue(
            $ssh->login($username, $password),
            'SSH2 login using an open socket failed.'
        );
    }

    /**
     * @depends testExecWithMethodCallback
     * @group github1009
     */
    public function testDisablePTY(SSH2 $ssh)
    {
        $ssh->enablePTY();
        $ssh->exec('ls -latr');
        $ssh->disablePTY();
        $ssh->exec('pwd');

        $this->assertTrue(true);

        return $ssh;
    }

    /**
     * @depends testDisablePTY
     * @group github1167
     */
    public function testChannelDataAfterOpen(SSH2 $ssh)
    {
        // Ubuntu's OpenSSH from 5.8 to 6.9 didn't work with multiple channels. see
        // https://bugs.launchpad.net/ubuntu/+source/openssh/+bug/1334916 for more info.
        // https://lists.ubuntu.com/archives/oneiric-changes/2011-July/005772.html discusses
        // when consolekit was incorporated.
        // https://marc.info/?l=openssh-unix-dev&m=163409903417589&w=2 discusses some of the
        // issues with how Ubuntu incorporated consolekit
        $pattern = '#^SSH-2\.0-OpenSSH_([\d.]+)[^ ]* Ubuntu-.*$#';
        $match = preg_match($pattern, $ssh->getServerIdentification(), $matches);
        $match = $match && version_compare('5.8', $matches[1], '<=');
        $match = $match && version_compare('6.9', $matches[1], '>=');
        if ($match) {
            self::markTestSkipped('Ubuntu\'s OpenSSH >= 5.8 <= 6.9 didn\'t work well with multiple channels');
        }

        $ssh->write("ping 127.0.0.1\n");

        $ssh->enablePTY();
        $ssh->exec('bash');

        $ssh->write("ls -latr\n");

        $ssh->setTimeout(1);

        $this->assertIsString($ssh->read());
    }
}
