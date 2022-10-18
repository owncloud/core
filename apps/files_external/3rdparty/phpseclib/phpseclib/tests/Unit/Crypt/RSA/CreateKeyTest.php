<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt\RSA;

use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\RSA\Formats\Keys\PKCS1;
use phpseclib3\Crypt\RSA\Formats\Keys\PKCS8;
use phpseclib3\Crypt\RSA\PrivateKey;
use phpseclib3\Crypt\RSA\PublicKey;
use phpseclib3\Tests\PhpseclibTestCase;

class CreateKeyTest extends PhpseclibTestCase
{
    public function testCreateKey()
    {
        $privatekey = RSA::createKey(768);
        $publickey = $privatekey->getPublicKey();
        $this->assertInstanceOf(PrivateKey::class, $privatekey);
        $this->assertInstanceOf(PublicKey::class, $publickey);
        $this->assertNotEmpty("$privatekey");
        $this->assertNotEmpty("$publickey");
        $this->assertSame($privatekey->getLength(), 768);
        $this->assertSame($publickey->getLength(), 768);

        return [$publickey, $privatekey];
    }

    /**
     * @depends testCreateKey
     */
    public function testEncryptDecrypt($args)
    {
        list($publickey, $privatekey) = $args;
        $ciphertext = $publickey->encrypt('zzz');
        $this->assertIsString($ciphertext);
        $plaintext = $privatekey->decrypt($ciphertext);
        $this->assertSame($plaintext, 'zzz');
    }

    public function testMultiPrime()
    {
        RSA::useInternalEngine();
        RSA::setSmallestPrime(256);
        $privatekey = RSA::createKey(1024);
        $publickey = $privatekey->getPublicKey();
        $this->assertInstanceOf(PrivateKey::class, $privatekey);
        $this->assertInstanceOf(PublicKey::class, $publickey);
        $this->assertNotEmpty($privatekey->toString('PKCS1'));
        $this->assertNotEmpty($publickey->toString('PKCS1'));
        $this->assertSame($privatekey->getLength(), 1024);
        $this->assertSame($publickey->getLength(), 1024);
        $r = PKCS1::load($privatekey->toString('PKCS1'));
        $this->assertCount(4, $r['primes']);
        // the last prime number could be slightly over. eg. 99 * 99 == 9801 but 10 * 10 = 100. the more numbers you're
        // multiplying the less certain you are to have each of them multiply to an n-bit number
        foreach (array_slice($r['primes'], 0, 3) as $i => $prime) {
            $this->assertSame($prime->getLength(), 256);
        }

        $rsa = RSA::load($privatekey->toString('PKCS1'));
        $signature = $rsa->sign('zzz');
        $rsa = RSA::load($rsa->getPublicKey()->toString('PKCS1'));
        $this->assertTrue($rsa->verify('zzz', $signature));

        RSA::useBestEngine();
    }

    public function test3DESPKCS8Encryption()
    {
        $key = RSA::createKey(768)
            ->withPassword('demo')
            ->toString('PKCS8', ['encryptionAlgorithm' => 'pbeWithSHAAnd3-KeyTripleDES-CBC']);
        $actual = PKCS8::extractEncryptionAlgorithm($key)['algorithm'];
        $this->assertSame($actual, 'pbeWithSHAAnd3-KeyTripleDES-CBC');
    }
}
