<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt\DSA;

use phpseclib3\Crypt\DSA;
use phpseclib3\Crypt\DSA\Parameters;
use phpseclib3\Crypt\DSA\PrivateKey;
use phpseclib3\Crypt\DSA\PublicKey;
use phpseclib3\Tests\PhpseclibTestCase;

/**
 * @requires PHP 7.0
 */
class CreateKeyTest extends PhpseclibTestCase
{
    public function testCreateParameters()
    {
        $dsa = DSA::createParameters();
        $this->assertInstanceOf(Parameters::class, $dsa);
        $this->assertMatchesRegularExpression('#BEGIN DSA PARAMETERS#', "$dsa");

        try {
            DSA::createParameters(100, 100);
        } catch (\Exception $e) {
            $this->assertInstanceOf(\Exception::class, $e);
        }

        $dsa = DSA::createParameters(512, 160);
        $this->assertInstanceOf(Parameters::class, $dsa);
        $this->assertMatchesRegularExpression('#BEGIN DSA PARAMETERS#', "$dsa");

        return $dsa;
    }

    /**
     * @depends testCreateParameters
     */
    public function testCreateKey($params)
    {
        $privatekey = DSA::createKey();
        $this->assertInstanceOf(PrivateKey::class, $privatekey);
        $this->assertInstanceOf(PublicKey::class, $privatekey->getPublicKey());

        $privatekey = DSA::createKey($params);
        $this->assertInstanceOf(PrivateKey::class, $privatekey);
        $this->assertInstanceOf(PublicKey::class, $privatekey->getPublicKey());

        $privatekey = DSA::createKey(512, 160);
        $this->assertInstanceOf(PrivateKey::class, $privatekey);
        $this->assertInstanceOf(PublicKey::class, $privatekey->getPublicKey());
    }
}
