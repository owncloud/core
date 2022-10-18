<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2013 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt\AES;

use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Rijndael;
use phpseclib3\Exception\InconsistentSetupException;
use phpseclib3\Exception\InsufficientSetupException;
use phpseclib3\Tests\PhpseclibTestCase;

abstract class TestCase extends PhpseclibTestCase
{
    protected $engine;

    private function _checkEngine($aes)
    {
        if ($aes->getEngine() != $this->engine) {
            self::markTestSkipped('Unable to initialize ' . $this->engine . ' engine');
        }
    }

    /**
     * Produces all combinations of test values.
     *
     * @return array
     */
    public function continuousBufferCombos()
    {
        $modes = [
            'ctr',
            'ofb',
            'cfb',
            'cfb8',
            'ofb8',
        ];
        $plaintexts = [
            '',
            '12345678901234567', // https://github.com/phpseclib/phpseclib/issues/39
            "\xDE\xAD\xBE\xAF",
            ':-):-):-):-):-):-)', // https://github.com/phpseclib/phpseclib/pull/43
        ];
        $ivs = [
            str_repeat("\0", 16),
            str_pad('test123', 16, "\0"),
        ];
        $keys = [
            str_repeat("\0", 16),
            str_pad(':-8', 16, "\0"), // https://github.com/phpseclib/phpseclib/pull/43
            str_pad('FOOBARZ', 16, "\0"),
        ];

        $result = [];

        foreach ($modes as $mode) {
            foreach ($plaintexts as $plaintext) {
                foreach ($ivs as $iv) {
                    foreach ($keys as $key) {
                        $result[] = [$mode, $plaintext, $iv, $key];
                    }
                }
            }
        }

        return $result;
    }

    /**
     * @dataProvider continuousBufferCombos
     */
    public function testEncryptDecryptWithContinuousBuffer($mode, $plaintext, $iv, $key)
    {
        $aes = new AES($mode);
        $aes->setPreferredEngine($this->engine);
        $aes->enableContinuousBuffer();
        $aes->setIV($iv);
        $aes->setKey($key);

        $this->_checkEngine($aes);

        $actual = '';
        for ($i = 0, $strlen = strlen($plaintext); $i < $strlen; ++$i) {
            $actual .= $aes->decrypt($aes->encrypt($plaintext[$i]));
        }

        $this->assertEquals($plaintext, $actual);
    }

    /**
     * @group github451
     */
    public function testKeyPaddingRijndael()
    {
        // this test case is from the following URL:
        // https://web.archive.org/web/20070209120224/http://fp.gladman.plus.com/cryptography_technology/rijndael/aesdvec.zip

        $aes = new Rijndael('cbc');
        $aes->setPreferredEngine($this->engine);
        $aes->disablePadding();
        $aes->setKey(pack('H*', '2b7e151628aed2a6abf7158809cf4f3c762e7160')); // 160-bit key. Valid in Rijndael.
        $aes->setIV(str_repeat("\0", 16));
        //$this->_checkEngine($aes); // should only work in internal mode
        $ciphertext = $aes->encrypt(pack('H*', '3243f6a8885a308d313198a2e0370734'));
        $this->assertEquals($ciphertext, pack('H*', '231d844639b31b412211cfe93712b880'));
    }

    /**
     * @group github451
     */
    public function testKeyPaddingAES()
    {
        $this->expectException('LengthException');

        // same as the above - just with a different ciphertext

        $aes = new AES('cbc');
        $aes->setPreferredEngine($this->engine);
        $aes->disablePadding();
        $aes->setKey(pack('H*', '2b7e151628aed2a6abf7158809cf4f3c762e7160')); // 160-bit key. supported by Rijndael - not AES
        $aes->setIV(str_repeat("\0", 16));
        $this->_checkEngine($aes);
        $ciphertext = $aes->encrypt(pack('H*', '3243f6a8885a308d313198a2e0370734'));
        $this->assertEquals($ciphertext, pack('H*', 'c109292b173f841b88e0ee49f13db8c0'));
    }

    /**
     * Produces all combinations of test values.
     *
     * @return list<array{string, string, array}>
     */
    public function continuousBufferBatteryCombos()
    {
        $modes = [
            'ctr',
            'ofb',
            'cfb',
            'cfb8',
            'ofb8',
        ];

        $combos = [
            [16],
            [17],
            [1, 16],
            [3, 6, 7], // (3 to test the openssl_encrypt call and the buffer creation, 6 to test the exclusive use of the buffer and 7 to test the buffer's exhaustion and recreation)
            [15, 4], // (15 to test openssl_encrypt call and buffer creation and 4 to test something that spans multpile bloc
            [3, 6, 10, 16], // this is why the strlen check in the buffer-only code was needed
            [16, 16], // two full size blocks
            [3, 6, 7, 16], // partial block + full size block
            [16, 3, 6, 7],
            // a few others just for fun
            [32,32],
            [31,31],
            [17,17],
            [99, 99]
        ];

        $result = [];

        foreach ($modes as $mode) {
            foreach ($combos as $combo) {
                foreach (['encrypt', 'decrypt'] as $op) {
                    $result[] = [$op, $mode, $combo];
                }
            }
        }

        return $result;
    }

    /**
     * @return array<array{string, string, array}>
     */
    public function continuousBufferBatteryCombosWithoutSingleCombos()
    {
        return array_filter($this->continuousBufferBatteryCombos(), function (array $continuousBufferBatteryCombo) {
            return count($continuousBufferBatteryCombo[2]) > 1;
        });
    }

    /**
     * @dataProvider continuousBufferBatteryCombos
     */
    public function testContinuousBufferBattery($op, $mode, $test)
    {
        $iv = str_repeat('x', 16);
        $key = str_repeat('a', 16);

        $aes = new AES($mode);
        $aes->setPreferredEngine($this->engine);
        $aes->setKey($key);
        $aes->setIV($iv);

        $this->_checkEngine($aes);

        $str = '';
        $result = '';
        foreach ($test as $len) {
            $temp = str_repeat('d', $len);
            $str .= $temp;
        }

        $c1 = $aes->$op($str);

        $aes = new AES($mode);
        $aes->setPreferredEngine($this->engine);
        $aes->enableContinuousBuffer();
        $aes->setKey($key);
        $aes->setIV($iv);

        $this->_checkEngine($aes);

        foreach ($test as $len) {
            $temp = str_repeat('d', $len);
            $output = $aes->$op($temp);
            $result .= $output;
        }

        $c2 = $result;

        $this->assertSame(bin2hex($c1), bin2hex($c2));
    }

    /**
     * Pretty much the same as testContinuousBufferBattery with the caveat that continuous mode is not enabled.
     *
     * @dataProvider continuousBufferBatteryCombosWithoutSingleCombos
     */
    public function testNonContinuousBufferBattery($op, $mode, $test)
    {
        $iv = str_repeat('x', 16);
        $key = str_repeat('a', 16);

        $aes = new AES($mode);
        $aes->setPreferredEngine($this->engine);
        $aes->setKey($key);
        $aes->setIV($iv);

        $this->_checkEngine($aes);

        $str = '';
        $result = '';
        foreach ($test as $len) {
            $temp = str_repeat('d', $len);
            $str .= $temp;
        }

        $c1 = $aes->$op($str);

        $aes = new AES($mode);
        $aes->setPreferredEngine($this->engine);
        $aes->setKey($key);
        $aes->setIV($iv);

        $this->_checkEngine($aes);

        foreach ($test as $len) {
            $temp = str_repeat('d', $len);
            $output = $aes->$op($temp);
            $result .= $output;
        }

        $c2 = $result;

        $this->assertNotSame(bin2hex($c1), bin2hex($c2));
    }

    // from http://csrc.nist.gov/groups/STM/cavp/documents/aes/AESAVS.pdf#page=16
    public function testGFSBox128()
    {
        $aes = new AES('cbc');

        $aes->setKey(pack('H*', '00000000000000000000000000000000'));
        $aes->setIV(pack('H*', '00000000000000000000000000000000'));
        $aes->disablePadding();

        $aes->setPreferredEngine($this->engine);
        $this->_checkEngine($aes);

        $result = bin2hex($aes->encrypt(pack('H*', 'f34481ec3cc627bacd5dc3fb08f273e6')));
        $this->assertSame($result, '0336763e966d92595a567cc9ce537f5e');
        $result = bin2hex($aes->encrypt(pack('H*', '9798c4640bad75c7c3227db910174e72')));
        $this->assertSame($result, 'a9a1631bf4996954ebc093957b234589');
        $result = bin2hex($aes->encrypt(pack('H*', '96ab5c2ff612d9dfaae8c31f30c42168')));
        $this->assertSame($result, 'ff4f8391a6a40ca5b25d23bedd44a597');
        $result = bin2hex($aes->encrypt(pack('H*', '6a118a874519e64e9963798a503f1d35')));
        $this->assertSame($result, 'dc43be40be0e53712f7e2bf5ca707209');
        $result = bin2hex($aes->encrypt(pack('H*', 'cb9fceec81286ca3e989bd979b0cb284')));
        $this->assertSame($result, '92beedab1895a94faa69b632e5cc47ce');
        $result = bin2hex($aes->encrypt(pack('H*', 'b26aeb1874e47ca8358ff22378f09144')));
        $this->assertSame($result, '459264f4798f6a78bacb89c15ed3d601');
        $result = bin2hex($aes->encrypt(pack('H*', '58c8e00b2631686d54eab84b91f0aca1')));
        $this->assertSame($result, '08a4e2efec8a8e3312ca7460b9040bbf');
    }

    public function testGFSBox192()
    {
        $aes = new AES('cbc');

        $aes->setKey(pack('H*', '000000000000000000000000000000000000000000000000'));
        $aes->setIV(pack('H*', '00000000000000000000000000000000'));
        $aes->disablePadding();

        $aes->setPreferredEngine($this->engine);
        $this->_checkEngine($aes);

        $result = bin2hex($aes->encrypt(pack('H*', '1b077a6af4b7f98229de786d7516b639')));
        $this->assertSame($result, '275cfc0413d8ccb70513c3859b1d0f72');
        $result = bin2hex($aes->encrypt(pack('H*', '9c2d8842e5f48f57648205d39a239af1')));
        $this->assertSame($result, 'c9b8135ff1b5adc413dfd053b21bd96d');
        $result = bin2hex($aes->encrypt(pack('H*', 'bff52510095f518ecca60af4205444bb')));
        $this->assertSame($result, '4a3650c3371ce2eb35e389a171427440');
        $result = bin2hex($aes->encrypt(pack('H*', '51719783d3185a535bd75adc65071ce1')));
        $this->assertSame($result, '4f354592ff7c8847d2d0870ca9481b7c');
        $result = bin2hex($aes->encrypt(pack('H*', '26aa49dcfe7629a8901a69a9914e6dfd')));
        $this->assertSame($result, 'd5e08bf9a182e857cf40b3a36ee248cc');
        $result = bin2hex($aes->encrypt(pack('H*', '941a4773058224e1ef66d10e0a6ee782')));
        $this->assertSame($result, '067cd9d3749207791841562507fa9626');
    }

    public function testGFSBox256()
    {
        $aes = new AES('cbc');

        $aes->setKey(pack('H*', '00000000000000000000000000000000' . '00000000000000000000000000000000'));
        $aes->setIV(pack('H*', '00000000000000000000000000000000'));
        $aes->disablePadding();

        $aes->setPreferredEngine($this->engine);
        $this->_checkEngine($aes);

        $result = bin2hex($aes->encrypt(pack('H*', '014730f80ac625fe84f026c60bfd547d')));
        $this->assertSame($result, '5c9d844ed46f9885085e5d6a4f94c7d7');
        $result = bin2hex($aes->encrypt(pack('H*', '0b24af36193ce4665f2825d7b4749c98')));
        $this->assertSame($result, 'a9ff75bd7cf6613d3731c77c3b6d0c04');
        $result = bin2hex($aes->encrypt(pack('H*', '761c1fe41a18acf20d241650611d90f1')));
        $this->assertSame($result, '623a52fcea5d443e48d9181ab32c7421');
        $result = bin2hex($aes->encrypt(pack('H*', '8a560769d605868ad80d819bdba03771')));
        $this->assertSame($result, '38f2c7ae10612415d27ca190d27da8b4');
        $result = bin2hex($aes->encrypt(pack('H*', '91fbef2d15a97816060bee1feaa49afe')));
        $this->assertSame($result, '1bc704f1bce135ceb810341b216d7abe');
    }

    public function testGetKeyLengthDefault()
    {
        $aes = new AES('cbc');
        $this->assertSame($aes->getKeyLength(), 128);
    }

    public function testGetKeyLengthWith192BitKey()
    {
        $aes = new AES('cbc');
        $aes->setKey(str_repeat('a', 24));
        $this->assertSame($aes->getKeyLength(), 192);
    }

    public function testSetKeyLengthWithLargerKey()
    {
        $this->expectException(InconsistentSetupException::class);

        $aes = new AES('cbc');
        $aes->setKeyLength(128);
        $aes->setKey(str_repeat('a', 24));
        $aes->setIV(str_repeat("\0", 16));
        $this->assertSame($aes->getKeyLength(), 128);
        $ciphertext = bin2hex($aes->encrypt('a'));
        $this->assertSame($ciphertext, '82b7b068dfc60ed2a46893b69fecd6c2');
        $this->assertSame($aes->getKeyLength(), 128);
    }

    public function testSetKeyLengthWithSmallerKey()
    {
        $this->expectException(InconsistentSetupException::class);

        $aes = new AES('cbc');
        $aes->setKeyLength(256);
        $aes->setKey(str_repeat('a', 16));
        $aes->setIV(str_repeat("\0", 16));
        $this->assertSame($aes->getKeyLength(), 256);
        $ciphertext = bin2hex($aes->encrypt('a'));
        $this->assertSame($ciphertext, 'fd4250c0d234aa7e1aa592820aa8406b');
        $this->assertSame($aes->getKeyLength(), 256);
    }

    /**
     * @group github938
     */
    public function testContinuousBuffer()
    {
        $aes = new AES('cbc');
        $aes->disablePadding();
        $aes->enableContinuousBuffer();
        $aes->setIV(pack('H*', '0457bdb4a6712986688349a29eb82535'));
        $aes->setKey(pack('H*', '00d596e2c8189b2592fac358e7396ad2'));
        $aes->decrypt(pack('H*', '9aa234ea7c750a8109a0f32d768b964e'));
        $plaintext = $aes->decrypt(pack('H*', '0457bdb4a6712986688349a29eb82535'));
        $expected = pack('H*', '6572617574689e1be8d2d8d43c594cf3');
        $this->assertSame($plaintext, $expected);
    }

    public function testECBDecrypt()
    {
        $aes = new AES('ecb');
        $aes->setPreferredEngine($this->engine);
        $aes->setKey(str_repeat('x', 16));

        $this->_checkEngine($aes);

        $plaintext = str_repeat('a', 16);

        $actual = $aes->decrypt($aes->encrypt($plaintext));

        $this->assertEquals($plaintext, $actual);
    }

    public function testNoKey()
    {
        $this->expectException(InsufficientSetupException::class);

        $aes = new AES('cbc');
        $aes->setPreferredEngine($this->engine);
        $aes->setIV(str_repeat('x', 16));

        $aes->encrypt(str_repeat('a', 16));
    }
}
