<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2013 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt;

use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\DH;
use phpseclib3\Crypt\DH\Parameters;
use phpseclib3\Crypt\DH\PrivateKey;
use phpseclib3\Crypt\DH\PublicKey;
use phpseclib3\Crypt\EC;
use phpseclib3\Math\BigInteger;
use phpseclib3\Tests\PhpseclibTestCase;

class DHTest extends PhpseclibTestCase
{
    public function testParametersWithString()
    {
        $a = DH::createParameters('diffie-hellman-group1-sha1');
        $a = str_replace("\r\n", "\n", trim($a));
        $b = str_replace("\r\n", "\n", '-----BEGIN DH PARAMETERS-----
MIGHAoGBAP//////////yQ/aoiFowjTExmKLgNwc0SkCTgiKZ8x0Agu+pjsTmyJR
Sgh5jjQE3e+VGbPNOkMbMCsKbfJfFDdP4TVtbVHCReSFtXZiXn7G9ExC6aY37WsL
/1y29Aa37e44a/taiZ+lrp8kEXxLH+ZJKGZR7OZTgf//////////AgEC
-----END DH PARAMETERS-----');
        $this->assertSame($b, "$a");
    }

    public function testParametersWithInteger()
    {
        $a = DH::createParameters(512);
        $this->assertIsString("$a");
    }

    public function testParametersWithBigIntegers()
    {
        $prime = 'FFFFFFFFFFFFFFFFC90FDAA22168C234C4C6628B80DC1CD129024E088A67CC74' .
                 '020BBEA63B139B22514A08798E3404DDEF9519B3CD3A431B302B0A6DF25F1437' .
                 '4FE1356D6D51C245E485B576625E7EC6F44C42E9A637ED6B0BFF5CB6F406B7ED' .
                 'EE386BFB5A899FA5AE9F24117C4B1FE649286651ECE65381FFFFFFFFFFFFFFFF';
        $prime = new BigInteger($prime, 16);
        $base = new BigInteger(2);
        $a = DH::createParameters($prime, $base);
        $a = str_replace("\r\n", "\n", trim($a));
        $b = str_replace("\r\n", "\n", '-----BEGIN DH PARAMETERS-----
MIGHAoGBAP//////////yQ/aoiFowjTExmKLgNwc0SkCTgiKZ8x0Agu+pjsTmyJR
Sgh5jjQE3e+VGbPNOkMbMCsKbfJfFDdP4TVtbVHCReSFtXZiXn7G9ExC6aY37WsL
/1y29Aa37e44a/taiZ+lrp8kEXxLH+ZJKGZR7OZTgf//////////AgEC
-----END DH PARAMETERS-----');
        $this->assertSame($b, "$a");
    }

    public function testCreateKey()
    {
        $param = DH::createParameters('diffie-hellman-group1-sha1');
        $key = DH::createKey($param);
        $this->assertIsString("$key");
        $this->assertIsString((string) $key->getPublicKey());
    }

    public function testLoadPrivate()
    {
        $a = DH::load('-----BEGIN PRIVATE KEY-----
MIIBIgIBADCBlQYJKoZIhvcNAQMBMIGHAoGBAP//////////yQ/aoiFowjTExmKL
gNwc0SkCTgiKZ8x0Agu+pjsTmyJRSgh5jjQE3e+VGbPNOkMbMCsKbfJfFDdP4TVt
bVHCReSFtXZiXn7G9ExC6aY37WsL/1y29Aa37e44a/taiZ+lrp8kEXxLH+ZJKGZR
7OZTgf//////////AgECBIGEAoGBALJhtp0aNlkpKTcY1qj519XB8CPc7aZii0xV
bbb/3R93sweVmk2PlkSqxc2kdcofhL8Ev0DJKxB40Ipdqja71VoBbDZ2nMzS0J6s
b6R8Z19Xazc0wq+p/wqalmnuCMBUBuuQ8aNNaW8FGwFwAI3I6CuQSsKObVDJO25m
eKDXQq5i
-----END PRIVATE KEY-----');
        $this->assertInstanceOf(PrivateKey::class, $a);
        $this->assertInstanceOf(PublicKey::class, $a->getPublicKey());
        $this->assertInstanceOf(Parameters::class, $a->getParameters());
    }

    public function testLoadPublic()
    {
        $a = DH::load('-----BEGIN PUBLIC KEY-----
MIIBHzCBlQYJKoZIhvcNAQMBMIGHAoGBAP//////////yQ/aoiFowjTExmKLgNwc
0SkCTgiKZ8x0Agu+pjsTmyJRSgh5jjQE3e+VGbPNOkMbMCsKbfJfFDdP4TVtbVHC
ReSFtXZiXn7G9ExC6aY37WsL/1y29Aa37e44a/taiZ+lrp8kEXxLH+ZJKGZR7OZT
gf//////////AgECA4GEAAKBgCsa1YmlaQIvbOuIi/6DKr7jsdMcv50u/Opemca5
i2REGZNPWmF3SRPrtq/4urrDRU0F2eQks7qnTkrauPK1/UvE1gwbqWrWgBko+6L+
Q3ADAIcv9LEmTBnSAOsCs1K9ExAmSv/T2/4+9dW28UYb+p/uV477d1wf+nCWS6VU
/gTm
-----END PUBLIC KEY-----');
        $this->assertInstanceOf(PublicKey::class, $a);
    }

    public function testLoadParameters()
    {
        $a = DH::load('-----BEGIN DH PARAMETERS-----
MIGHAoGBAP//////////yQ/aoiFowjTExmKLgNwc0SkCTgiKZ8x0Agu+pjsTmyJR
Sgh5jjQE3e+VGbPNOkMbMCsKbfJfFDdP4TVtbVHCReSFtXZiXn7G9ExC6aY37WsL
/1y29Aa37e44a/taiZ+lrp8kEXxLH+ZJKGZR7OZTgf//////////AgEC
-----END DH PARAMETERS-----');
        $this->assertInstanceOf(Parameters::class, $a);
    }

    public function testComputeSecretWithPublicKey()
    {
        $ourPriv = DH::load('-----BEGIN PRIVATE KEY-----
MIIBIgIBADCBlQYJKoZIhvcNAQMBMIGHAoGBAP//////////yQ/aoiFowjTExmKL
gNwc0SkCTgiKZ8x0Agu+pjsTmyJRSgh5jjQE3e+VGbPNOkMbMCsKbfJfFDdP4TVt
bVHCReSFtXZiXn7G9ExC6aY37WsL/1y29Aa37e44a/taiZ+lrp8kEXxLH+ZJKGZR
7OZTgf//////////AgECBIGEAoGBALJhtp0aNlkpKTcY1qj519XB8CPc7aZii0xV
bbb/3R93sweVmk2PlkSqxc2kdcofhL8Ev0DJKxB40Ipdqja71VoBbDZ2nMzS0J6s
b6R8Z19Xazc0wq+p/wqalmnuCMBUBuuQ8aNNaW8FGwFwAI3I6CuQSsKObVDJO25m
eKDXQq5i
-----END PRIVATE KEY-----');
        $theirPub = DH::load('-----BEGIN PUBLIC KEY-----
MIIBHzCBlQYJKoZIhvcNAQMBMIGHAoGBAP//////////yQ/aoiFowjTExmKLgNwc
0SkCTgiKZ8x0Agu+pjsTmyJRSgh5jjQE3e+VGbPNOkMbMCsKbfJfFDdP4TVtbVHC
ReSFtXZiXn7G9ExC6aY37WsL/1y29Aa37e44a/taiZ+lrp8kEXxLH+ZJKGZR7OZT
gf//////////AgECA4GEAAKBgCsa1YmlaQIvbOuIi/6DKr7jsdMcv50u/Opemca5
i2REGZNPWmF3SRPrtq/4urrDRU0F2eQks7qnTkrauPK1/UvE1gwbqWrWgBko+6L+
Q3ADAIcv9LEmTBnSAOsCs1K9ExAmSv/T2/4+9dW28UYb+p/uV477d1wf+nCWS6VU
/gTm
-----END PUBLIC KEY-----');
        $this->assertIsString(DH::computeSecret($ourPriv, $theirPub));
    }

    public function testComputeSecret()
    {
        // Ed25519 isn't normally used for DH (that honor goes to Curve25519) but that's not to say it can't
        // be used
        $curves = ['nistp256', 'curve25519', 'Ed25519'];
        foreach ($curves as $curve) {
            $ourPriv = EC::createKey($curve);
            $theirPub = EC::createKey($curve)->getPublicKey();
            $this->assertIsString(DH::computeSecret($ourPriv, $theirPub));
        }
    }

    public function testEphemeralECDH()
    {
        // an RSA like hybrid cryptosystem can be done with ephemeral key ECDH

        $plaintext = 'hello, world!';

        $ourEphemeralPrivate = EC::createKey('Curve25519');
        $ourEphemeralPublic = $ourEphemeralPrivate->getPublicKey();

        $theirPrivate = EC::createKey('Curve25519');
        $theirPublic = $theirPrivate->getPublicKey();

        $key = DH::computeSecret($ourEphemeralPrivate, $theirPublic);

        $aes = new AES('ctr');
        $aes->setKey(substr($key, 0, 16));
        $aes->setIV(substr($key, 16, 16));

        $encrypted =
            $ourEphemeralPublic->toString('MontgomeryPublic') .
            $aes->encrypt($plaintext);

        $theirPublic = substr($encrypted, 0, 32);
        $theirPublic = EC::loadFormat('MontgomeryPublic', $theirPublic);

        $ourPrivate = $theirPrivate;

        $key = DH::computeSecret($ourPrivate, $theirPublic);

        $aes = new AES('ctr');
        $aes->setKey(substr($key, 0, 16));
        $aes->setIV(substr($key, 16, 16));

        $this->assertSame($plaintext, $aes->decrypt(substr($encrypted, 32)));
    }

    public function testMultiPartyDH()
    {
        // in multi party (EC)DH everyone, for each public key, everyone (save for the public key owner) "applies"
        // their private key to it. they do so in series (as opposed to in parallel) and then everyone winds up
        // with the same shared secret

        $numParties = 4;

        // create private keys
        $parties = [];
        for ($i = 0; $i < $numParties; $i++) {
            $parties[] = EC::createKey('Curve25519');
        }

        // create shared secrets
        $secrets = [];
        for ($i = 0; $i < $numParties; $i++) {
            $secrets[$i] = $parties[$i]->getPublicKey();
            for ($j = 0; $j < $numParties; $j++) {
                if ($i == $j) {
                    continue;
                }
                $secrets[$i] = DH::computeSecret($parties[$j], $secrets[$i]);
            }
        }

        for ($i = 1; $i < $numParties; $i++) {
            $this->assertSame($secrets[0], $secrets[$i]);
        }
    }

    public function testCurve25519()
    {
        // utilizing test vector from https://tools.ietf.org/html/rfc7748#section-6.1

        $alicePrivate = EC::loadFormat('MontgomeryPrivate', pack('H*', '77076d0a7318a57d3c16c17251b26645df4c2f87ebc0992ab177fba51db92c2a'));
        $bobPrivate = EC::loadFormat('MontgomeryPrivate', pack('H*', '5dab087e624a8a4b79e17f8b83800ee66f3bb1292618b6fd1c2f8b27ff88e0eb'));

        $alicePublic = $alicePrivate->getPublicKey();
        $bobPublic = $bobPrivate->getPublicKey();

        $this->assertSame(
            '8520f0098930a754748b7ddcb43ef75a0dbf3a0d26381af4eba4a98eaa9b4e6a',
            bin2hex($alicePublic->toString('MontgomeryPublic'))
        );

        $this->assertSame(
            'de9edb7d7b7dc1b4d35b61c2ece435373f8343c85b78674dadfc7e146f882b4f',
            bin2hex($bobPublic->toString('MontgomeryPublic'))
        );

        $expected = pack('H*', '4a5d9d5ba4ce2de1728e3bf480350f25e07e21c947d19e3376f09b3c1e161742');

        $this->assertSame($expected, DH::computeSecret($alicePrivate, $bobPublic));
        $this->assertSame($expected, DH::computeSecret($bobPrivate, $alicePublic));
    }

    public function testCurve448()
    {
        // utilizing test vector from https://tools.ietf.org/html/rfc7748#section-6.2

        $alicePrivate = EC::loadFormat('MontgomeryPrivate', pack(
            'H*',
            '9a8f4925d1519f5775cf46b04b5800d4ee9ee8bae8bc5565d498c28d' .
            'd9c9baf574a9419744897391006382a6f127ab1d9ac2d8c0a598726b'
        ));
        $bobPrivate = EC::loadFormat('MontgomeryPrivate', pack(
            'H*',
            '1c306a7ac2a0e2e0990b294470cba339e6453772b075811d8fad0d1d' .
            '6927c120bb5ee8972b0d3e21374c9c921b09d1b0366f10b65173992d'
        ));

        $alicePublic = $alicePrivate->getPublicKey();
        $bobPublic = $bobPrivate->getPublicKey();

        $this->assertSame(
            '9b08f7cc31b7e3e67d22d5aea121074a273bd2b83de09c63faa73d2c' .
            '22c5d9bbc836647241d953d40c5b12da88120d53177f80e532c41fa0',
            bin2hex($alicePublic->toString('MontgomeryPublic'))
        );

        $this->assertSame(
            '3eb7a829b0cd20f5bcfc0b599b6feccf6da4627107bdb0d4f345b430' .
            '27d8b972fc3e34fb4232a13ca706dcb57aec3dae07bdc1c67bf33609',
            bin2hex($bobPublic->toString('MontgomeryPublic'))
        );

        $expected = pack(
            'H*',
            '07fff4181ac6cc95ec1c16a94a0f74d12da232ce40a77552281d282b' .
            'b60c0b56fd2464c335543936521c24403085d59a449a5037514a879d'
        );

        $this->assertSame($expected, DH::computeSecret($alicePrivate, $bobPublic));
        $this->assertSame($expected, DH::computeSecret($bobPrivate, $alicePublic));
    }
}
