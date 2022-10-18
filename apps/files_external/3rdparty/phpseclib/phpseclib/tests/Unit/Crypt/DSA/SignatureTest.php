<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt\DSA;

use phpseclib3\Crypt\DSA;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Tests\PhpseclibTestCase;

class SignatureTest extends PhpseclibTestCase
{
    public function testPKCSSignature()
    {
        $message = 'hello, world!';

        $dsa = PublicKeyLoader::load('-----BEGIN DSA PRIVATE KEY-----
MIIBvAIBAAKBgQDsGAHAM16bsPlwl7jaec4QMynYa0YLiLiOZC4mvH4UW/tRJxTz
aV7eH1EtnP9D9J78x/07wKYs8zJEWCXmuq0UluQfjA47+pb68b/ucQTNeZHboNN9
5oEi+8BCSK0y8G3uf3Y89qHvqa9Si6rP374MinEMrbVFm+UpsGflFcd83wIVALtJ
ANi+lYG7xMKQ/bE4+bS8gemNAoGBAORowvirD7AB9x2SpdiME41+O4jVR8rs6+GX
Ml3Hif6Yt1kem0CeraX9SNoyBNAzjD5TVMGIdGlgRr6GNreHeXMGWlvdDkvCACER
ZEEtMsKZicm+yl6kR8AGHTCA/PBltHfyrFQd4n9I//UDqI4RjqzvpCXGQcVEsSDY
CCBGBQJRAoGBALnHTAZlpoLJZuSBVtnMuRM3cSX43IkE9w9FveDV1jX5mmfK7yBV
pQFV8eVJfk91ERQ4Dn6ePLUv2dRIt4a0S0qHqadgzyoFyqkmmUi1kNLyixtRqh+m
2gXx0t63HEpZDbEPppdpnlppZquVQh7TyrKSXW9MTzUkQjFI9UY7kZeKAhQXiJgI
kBniZHdFBAZBTE14YJUBkw==
-----END DSA PRIVATE KEY-----')
            ->withSignatureFormat('ASN1');
        $signature = $dsa->sign($message);

        $dsa = PublicKeyLoader::load('-----BEGIN PUBLIC KEY-----
MIIBuDCCASwGByqGSM44BAEwggEfAoGBAOwYAcAzXpuw+XCXuNp5zhAzKdhrRguI
uI5kLia8fhRb+1EnFPNpXt4fUS2c/0P0nvzH/TvApizzMkRYJea6rRSW5B+MDjv6
lvrxv+5xBM15kdug033mgSL7wEJIrTLwbe5/djz2oe+pr1KLqs/fvgyKcQyttUWb
5SmwZ+UVx3zfAhUAu0kA2L6VgbvEwpD9sTj5tLyB6Y0CgYEA5GjC+KsPsAH3HZKl
2IwTjX47iNVHyuzr4ZcyXceJ/pi3WR6bQJ6tpf1I2jIE0DOMPlNUwYh0aWBGvoY2
t4d5cwZaW90OS8IAIRFkQS0ywpmJyb7KXqRHwAYdMID88GW0d/KsVB3if0j/9QOo
jhGOrO+kJcZBxUSxINgIIEYFAlEDgYUAAoGBALnHTAZlpoLJZuSBVtnMuRM3cSX4
3IkE9w9FveDV1jX5mmfK7yBVpQFV8eVJfk91ERQ4Dn6ePLUv2dRIt4a0S0qHqadg
zyoFyqkmmUi1kNLyixtRqh+m2gXx0t63HEpZDbEPppdpnlppZquVQh7TyrKSXW9M
TzUkQjFI9UY7kZeK
-----END PUBLIC KEY-----')
            ->withSignatureFormat('ASN1');

        $this->assertTrue($dsa->verify($message, $signature));
        $this->assertFalse($dsa->verify('foozbar', $signature));

        // openssl dgst -dss1 -sign dsa_priv.pem foo.txt > sigfile.bin
        $signature = '302c021456d7e7da10d1538a6cd45dcb2b0ce15c28bac03402147e973a4de1e92e8a87ed5218c797952a3f854df5';
        $signature = pack('H*', $signature);

        $dsa = $dsa->withHash('sha1');

        $this->assertTrue($dsa->verify("foobar\n", $signature));
        $this->assertFalse($dsa->verify('foozbar', $signature));

        // openssl dgst -sha256 -sign dsa_priv.pem foo.txt > sigfile.bin
        $signature = '302e021500b131ec2682c4c0be13e6558ba3d64929ebc0ac420215009946300a03561cef50c0a51d0cd0a2c835e798fc';
        $signature = pack('H*', $signature);

        $dsa = $dsa->withHash('sha256');

        $this->assertTrue($dsa->verify('abcdefghijklmnopqrstuvwxyz', $signature));
        $this->assertFalse($dsa->verify('zzzz', $signature));
    }

    public function testRandomSignature()
    {
        $message = 'hello, world!';

        $dsa = PublicKeyLoader::load('-----BEGIN DSA PRIVATE KEY-----
MIIBvAIBAAKBgQDsGAHAM16bsPlwl7jaec4QMynYa0YLiLiOZC4mvH4UW/tRJxTz
aV7eH1EtnP9D9J78x/07wKYs8zJEWCXmuq0UluQfjA47+pb68b/ucQTNeZHboNN9
5oEi+8BCSK0y8G3uf3Y89qHvqa9Si6rP374MinEMrbVFm+UpsGflFcd83wIVALtJ
ANi+lYG7xMKQ/bE4+bS8gemNAoGBAORowvirD7AB9x2SpdiME41+O4jVR8rs6+GX
Ml3Hif6Yt1kem0CeraX9SNoyBNAzjD5TVMGIdGlgRr6GNreHeXMGWlvdDkvCACER
ZEEtMsKZicm+yl6kR8AGHTCA/PBltHfyrFQd4n9I//UDqI4RjqzvpCXGQcVEsSDY
CCBGBQJRAoGBALnHTAZlpoLJZuSBVtnMuRM3cSX43IkE9w9FveDV1jX5mmfK7yBV
pQFV8eVJfk91ERQ4Dn6ePLUv2dRIt4a0S0qHqadgzyoFyqkmmUi1kNLyixtRqh+m
2gXx0t63HEpZDbEPppdpnlppZquVQh7TyrKSXW9MTzUkQjFI9UY7kZeKAhQXiJgI
kBniZHdFBAZBTE14YJUBkw==
-----END DSA PRIVATE KEY-----')
            ->withSignatureFormat('ASN1');
        $public = $dsa->getPublicKey();
        $signature1 = $dsa->sign($message);
        $signature2 = $dsa->sign($message);

        // phpseclib's DSA implementation uses a CSPRNG to generate the k parameter.
        // used correctly this should result in different signatures every time.
        // RFC6979 describes a deterministic DSA scheme wherein two signatures for the same
        // plaintext would yield the same value so if that were to be switched to then this
        // unit test would need to be updated
        $this->assertNotEquals($signature1, $signature2);

        $this->assertTrue($public->verify($message, $signature1));
        $this->assertTrue($public->verify($message, $signature2));

        $dsa = $dsa->withSignatureFormat('SSH2');
        $public = $public->withSignatureFormat('SSH2');

        $signature = $dsa->sign($message);

        $this->assertTrue($public->verify($message, $signature));
    }

    public function testSSHSignature()
    {
        $dsa = PublicKeyLoader::load('AAAAB3NzaC1kc3MAAACBAPyzZzm4oqmY12lxmHwNcfYDNyXr38M1lU6xy9I792U1YSKgX27nUW9eXdJ8Mrn63Le5rrBRfg2Niycx' .
                   'JF2IwDpwCi7YpIv79uwT3RtA0chQDS4vx8qi8BWBzy7PZC9hmqY62+mgfj8ooga1sr+JpMh+8r4j3KjPM+wE37khkgkvAAAAFQDn' .
                   '19pBng6TajI/vdg7GPnxsitCqQAAAIEA6Pl1Z/TVdkc+HpfkAvcg2Q+yNtnVq7+26RCbRDO3b9Ocr+tZA9u23qnO3KDYeygzaLnI' .
                   'gpErp61Bj70iIUldhXy2LFGZFEC9XiKmt/tQxSDKiBbj3bS3wKfHrAlElgjhqxiRh+GixgSsmCj96eJFXcsxPjQU81HR+WJ0ALV1' .
                   'UnMAAACABRdNuqqe1Y68es8TIflV71P0J7Ci2BbbqAXRwYYKc9/7DrygwaN2UIbMXyOLuojeZgQPPoM9nkzd6QZo8M9apawVKKwD' .
                   'GAUj2of+F9WVRxhE0ohTQBzD/3HqT80pQsX+rYcxuSx1cCtdMp4oLrrfKO2J4EiWUkaoSB7SdCaj+vU=');
        $dsa = $dsa
            ->withHash('sha1')
            ->withSignatureFormat('SSH2');
        $message = pack('H*', '8bfc69a222c12ddf6bc6bf33c9cadc106af04feb');
        $signature = pack('H*', '000000077373682d64737300000028a7a2e55dc43e5e6145aa94daa0552ea479d1139d6d6ba50650b489e24e976593e73f76557813d6bc');

        $this->assertTrue($dsa->verify($message, $signature));
    }
}
