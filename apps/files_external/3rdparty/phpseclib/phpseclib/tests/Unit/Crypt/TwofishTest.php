<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright MMXIII Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt;

use phpseclib3\Crypt\Twofish;
use phpseclib3\Tests\PhpseclibTestCase;

class TwofishTest extends PhpseclibTestCase
{
    public function testVectors()
    {
        $engines = [
            'PHP',
            'Eval',
            'mcrypt',
            'OpenSSL',
        ];

        foreach ($engines as $engine) {
            $tf = new Twofish('cbc');
            $tf->setIV(str_repeat("\0", $tf->getBlockLength() >> 3));
            $tf->disablePadding();

            // tests from https://www.schneier.com/code/ecb_ival.txt

            // key size = 128
            $key = pack('H*', '00000000000000000000000000000000');
            $tf->setKey($key);
            if (!$tf->isValidEngine($engine)) {
                self::markTestSkipped("Unable to initialize $engine engine");
            }

            $plaintext = pack('H*', '00000000000000000000000000000000');
            $ciphertext = $tf->encrypt($plaintext);
            $expected = strtolower('9F589F5CF6122C32B6BFEC2F2AE8C35A');
            $this->assertEquals(bin2hex($ciphertext), $expected, "Failed asserting that $plaintext yielded expected output in $engine engine");

            $expected = bin2hex($plaintext);
            $plaintext = bin2hex($tf->decrypt($ciphertext));
            $this->assertEquals($plaintext, $expected, "Failed asserting that $plaintext yielded expected output in $engine engine");

            // key size = 192
            $key = pack('H*', '0123456789ABCDEFFEDCBA98765432100011223344556677');
            $tf->setKey($key);
            if (!$tf->isValidEngine($engine)) {
                self::markTestSkipped("Unable to initialize $engine engine");
            }
            $plaintext = pack('H*', '00000000000000000000000000000000');
            $ciphertext = $tf->encrypt($plaintext);
            $expected = strtolower('CFD1D2E5A9BE9CDF501F13B892BD2248');
            $this->assertEquals(bin2hex($ciphertext), $expected, "Failed asserting that $plaintext yielded expected output in $engine engine");

            $expected = bin2hex($plaintext);
            $plaintext = bin2hex($tf->decrypt($ciphertext));
            $this->assertEquals($plaintext, $expected, "Failed asserting that $plaintext yielded expected output in $engine engine");

            // key size = 256
            $key = pack('H*', '0123456789ABCDEFFEDCBA987654321000112233445566778899AABBCCDDEEFF');
            $tf->setKey($key);
            if (!$tf->isValidEngine($engine)) {
                self::markTestSkipped("Unable to initialize $engine engine");
            }
            $plaintext = pack('H*', '00000000000000000000000000000000');
            $ciphertext = $tf->encrypt($plaintext);
            $expected = strtolower('37527BE0052334B89F0CFCCAE87CFA20');
            $this->assertEquals(bin2hex($ciphertext), $expected, "Failed asserting that $plaintext yielded expected output in $engine engine");

            $expected = bin2hex($plaintext);
            $plaintext = bin2hex($tf->decrypt($ciphertext));
            $this->assertEquals($plaintext, $expected, "Failed asserting that $plaintext yielded expected output in $engine engine");
        }
    }
}
