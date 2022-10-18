<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2014 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Functional\Net;

use phpseclib3\Net\SSH2;
use phpseclib3\System\SSH\Agent;
use phpseclib3\Tests\PhpseclibFunctionalTestCase;

class SSH2AgentTest extends PhpseclibFunctionalTestCase
{
    public static function setUpBeforeClass()
    {
        if (!isset($_SERVER['SSH_AUTH_SOCK'])) {
            self::markTestSkipped(
                'This test requires an SSH Agent (SSH_AUTH_SOCK env variable).'
            );
        }
        parent::setUpBeforeClass();
    }

    public function testAgentLogin()
    {
        $ssh = new SSH2($this->getEnv('SSH_HOSTNAME'));
        $agent = new Agent();

        $this->assertTrue(
            $ssh->login($this->getEnv('SSH_USERNAME'), $agent),
            'SSH2 login using Agent failed.'
        );

        return ['ssh' => $ssh, 'ssh-agent' => $agent];
    }

    /**
     * @depends testAgentLogin
     */
    public function testAgentForward($args)
    {
        $ssh = $args['ssh'];
        $agent = $args['ssh-agent'];

        $hostname = $this->getEnv('SSH_HOSTNAME');
        $username = $this->getEnv('SSH_USERNAME');

        $this->assertEquals($username, trim($ssh->exec('whoami')));

        $agent->startSSHForwarding($ssh);
        $this->assertEquals($username, trim($ssh->exec("ssh " . $username . "@" . $hostname . ' \'whoami\'')));

        return $args;
    }
}
