<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2014 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt;

use phpseclib3\Crypt\ChaCha20;
use phpseclib3\Tests\PhpseclibTestCase;

class ChaCha20Test extends PhpseclibTestCase
{
    // see https://tools.ietf.org/html/rfc8439#section-2.3.2
    public function test232()
    {
        $key = implode('', range("\00", "\x1f"));

        $nonce = '00:00:00:09:00:00:00:4a:00:00:00:00';
        $nonce = str_replace(':', '', $nonce);
        $nonce = pack('H*', $nonce);

        $expected = '10 f1 e7 e4 d1 3b 59 15 50 0f dd 1f a3 20 71 c4' .
                    'c7 d1 f4 c7 33 c0 68 03 04 22 aa 9a c3 d4 6c 4e' .
                    'd2 82 64 46 07 9f aa 09 14 c2 d7 05 d9 8b 02 a2' .
                    'b5 12 9c d1 de 16 4e b9 cb d0 83 e8 a2 50 3c 4e';
        $expected = str_replace(' ', '', $expected);
        $expected = pack('H*', $expected);

        $engines = ['PHP', 'OpenSSL', 'libsodium'];
        foreach ($engines as $engine) {
            $c = new ChaCha20();
            $c->setKey($key);
            $c->setNonce($nonce);
            $c->setCounter(1);
            $c->setPreferredEngine($engine);
            if ($c->getEngine() != $engine) {
                continue;
            }
            $result = $c->encrypt(str_repeat("\0", 64));
            $this->assertSame($expected, $result, "Failed asserting that ciphertext matches expected value with $engine engine");
        }
    }

    // see https://tools.ietf.org/html/rfc8439#section-2.4.2
    public function test242()
    {
        $key = implode('', range("\00", "\x1f"));

        $nonce = '00:00:00:00:00:00:00:4a:00:00:00:00';
        $nonce = str_replace(':', '', $nonce);
        $nonce = pack('H*', $nonce);

        $plaintext = 'Ladies and Gentlemen of the class of \'99: If I could offer you only one tip for the future,' .
                     ' sunscreen would be it.';

        $expected = '6e 2e 35 9a 25 68 f9 80 41 ba 07 28 dd 0d 69 81' .
                    'e9 7e 7a ec 1d 43 60 c2 0a 27 af cc fd 9f ae 0b' .
                    'f9 1b 65 c5 52 47 33 ab 8f 59 3d ab cd 62 b3 57' .
                    '16 39 d6 24 e6 51 52 ab 8f 53 0c 35 9f 08 61 d8' .
                    '07 ca 0d bf 50 0d 6a 61 56 a3 8e 08 8a 22 b6 5e' .
                    '52 bc 51 4d 16 cc f8 06 81 8c e9 1a b7 79 37 36' .
                    '5a f9 0b bf 74 a3 5b e6 b4 0b 8e ed f2 78 5e 42' .
                    '87 4d';
        $expected = str_replace(' ', '', $expected);
        $expected = pack('H*', $expected);

        $engines = ['PHP', 'OpenSSL', 'libsodium'];
        foreach ($engines as $engine) {
            $c = new ChaCha20();
            $c->setKey($key);
            $c->setNonce($nonce);
            $c->setCounter(1);
            $c->setPreferredEngine($engine);
            if ($c->getEngine() != $engine) {
                continue;
            }
            $result = $c->encrypt($plaintext);
            $this->assertSame($expected, $result, "Failed asserting that ciphertext matches expected value with $engine engine");
        }
    }

    // see https://tools.ietf.org/html/rfc8439#section-2.5.2
    public function test252()
    {
        $key = '85:d6:be:78:57:55:6d:33:7f:44:52:fe:42:d5:06:a8:01:0' .
               '3:80:8a:fb:0d:b2:fd:4a:bf:f6:af:41:49:f5:1b';
        $key = str_replace(':', '', $key);
        $key = pack('H*', $key);

        $plaintext = 'Cryptographic Forum Research Group';

        $expected = 'a8:06:1d:c1:30:51:36:c6:c2:2b:8b:af:0c:01:27:a9';
        $expected = str_replace(':', '', $expected);
        $expected = pack('H*', $expected);

        $c = new ChaCha20();
        $c->setPoly1305Key($key);
        $r = new \ReflectionClass(get_class($c));
        // this unit test is testing Poly1305 independent of ChaCha20, which phpseclib doesn't
        // really support, hence this hackish approach
        $m = $r->getMethod('poly1305');
        $m->setAccessible(true);
        $result = $m->invokeArgs($c, [$plaintext]);

        $this->assertSame($expected, $result, 'Failed asserting that poly1305 matches expected value');
    }

    // see https://tools.ietf.org/html/rfc8439#section-2.6.2
    public function test262()
    {
        $key = implode('', range("\x80", "\x9f"));

        $nonce = '00 00 00 00 00 01 02 03 04 05 06 07';
        $nonce = str_replace(' ', '', $nonce);
        $nonce = pack('H*', $nonce);

        $expected = '8a d5 a0 8b 90 5f 81 cc 81 50 40 27 4a b2 94 71' .
                    'a8 33 b6 37 e3 fd 0d a5 08 db b8 e2 fd d1 a6 46';
        $expected = str_replace(' ', '', $expected);
        $expected = pack('H*', $expected);

        $c = new ChaCha20();
        $c->setKey($key);
        $c->setNonce($nonce);

        $r = new \ReflectionClass(get_class($c));
        $m = $r->getMethod('createPoly1305Key');
        $m->setAccessible(true);
        $result = $m->invoke($c);

        $p = $r->getProperty('poly1305Key');
        $p->setAccessible(true);
        $actual = $p->getValue($c);

        $this->assertSame($expected, $actual, 'Failed asserting that the poly1305 key is what it ought to be');
    }

    // https://tools.ietf.org/html/rfc8439#section-2.8.2
    public function test282()
    {
        $key = implode('', range("\x80", "\x9f"));

        $nonce = "\x07\0\0\0" . "\x40\x41\x42\x43\x44\x45\x46\x47";

        $plaintext = 'Ladies and Gentlemen of the class of \'99: If I could offer you only one tip for the future,' .
                     ' sunscreen would be it.';

        $aad = '50 51 52 53 c0 c1 c2 c3 c4 c5 c6 c7';
        $aad = str_replace(' ', '', $aad);
        $aad = pack('H*', $aad);

        $expected = 'd3 1a 8d 34 64 8e 60 db 7b 86 af bc 53 ef 7e c2' .
                    'a4 ad ed 51 29 6e 08 fe a9 e2 b5 a7 36 ee 62 d6' .
                    '3d be a4 5e 8c a9 67 12 82 fa fb 69 da 92 72 8b' .
                    '1a 71 de 0a 9e 06 0b 29 05 d6 a5 b6 7e cd 3b 36' .
                    '92 dd bd 7f 2d 77 8b 8c 98 03 ae e3 28 09 1b 58' .
                    'fa b3 24 e4 fa d6 75 94 55 85 80 8b 48 31 d7 bc' .
                    '3f f4 de f0 8e 4b 7a 9d e5 76 d2 65 86 ce c6 4b' .
                    '61 16';
        $expected = str_replace(' ', '', $expected);
        $expected = pack('H*', $expected);

        $tag = '1a:e1:0b:59:4f:09:e2:6a:7e:90:2e:cb:d0:60:06:91';
        $tag = str_replace(':', '', $tag);
        $tag = pack('H*', $tag);

        $engines = ['PHP', 'OpenSSL', 'libsodium'];
        foreach ($engines as $engine) {
            $c = new ChaCha20();
            $c->enablePoly1305();
            $c->setKey($key);
            $c->setNonce($nonce);
            $c->setAAD($aad);
            $c->setPreferredEngine($engine);
            if ($c->getEngine() != $engine) {
                continue;
            }
            $result = $c->encrypt($plaintext);
            $this->assertSame($expected, $result, "Failed asserting that ciphertext matches expected value with $engine engine");
            $this->assertSame($tag, $c->getTag(), "Failed asserting that the tag matches the expected value with $engine engine");
        }
    }

    public function testContinuousBuffer()
    {
        $key = str_repeat("\0", 16);
        $nonce = str_repeat("\0", 8);

        $partitions = [1, 63, 70];

        $plaintext = str_repeat("\0", array_sum($partitions));

        $engines = ['PHP', 'OpenSSL', 'libsodium'];
        foreach ($engines as $engine) {
            $c = new ChaCha20();
            $c->setKey($key);
            $c->setNonce($nonce);
            $c->setPreferredEngine($engine);

            $c2 = new ChaCha20();
            $c2->setKey($key);
            $c2->setNonce($nonce);
            $c2->setPreferredEngine($engine);
            $c2->enableContinuousBuffer();

            if ($c2->getEngine() != $engine) {
                continue;
            }

            $p1 = $c->encrypt($plaintext);
            $p2 = '';
            foreach ($partitions as $partition) {
                $p2 .= $c2->encrypt(str_repeat("\0", $partition));
            }

            $this->assertSame($p1, $p2, "Failed asserting that ciphertext matches expected value with $engine engine");
        }
    }
}
