<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2013 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\Crypt;

use phpseclib3\Crypt\AES;
use phpseclib3\Tests\PhpseclibTestCase;

class GCMTest extends PhpseclibTestCase
{
    /**
     * Produces all combinations of test values.
     *
     * @return array
     */
    public function engine128Vectors()
    {
        $engines = [
            'PHP',
            'Eval',
            'mcrypt',
            'OpenSSL',
            'OpenSSL (GCM)'
        ];

        // test vectors come from the following URL:
        // http://csrc.nist.gov/groups/ST/toolkit/BCM/documents/proposedmodes/gcm/gcm-spec.pdf

        $p1 = '00000000000000000000000000000000';
        $p2 = 'd9313225f88406e5a55909c5aff5269a' .
              '86a7a9531534f7da2e4c303d8a318a72' .
              '1c3c0c95956809532fcf0e2449a6b525' .
              'b16aedf5aa0de657ba637b391aafd255';
        $p3 = 'd9313225f88406e5a55909c5aff5269a' .
              '86a7a9531534f7da2e4c303d8a318a72' .
              '1c3c0c95956809532fcf0e2449a6b525' .
              'b16aedf5aa0de657ba637b39';

        $n1 = '000000000000000000000000';
        $n2 = 'cafebabefacedbaddecaf888';
        $n3 = 'cafebabefacedbad';
        $n4 = '9313225df88406e555909c5aff5269aa' .
              '6a7a9538534f7da1e4c303d2a318a728' .
              'c3c0c95156809539fcf0e2429a6b5254' .
              '16aedbf5a0de6a57a637b39b';

        $k1 = '00000000000000000000000000000000';
        $k2 = 'feffe9928665731c6d6a8f9467308308';

        $c1 = '0388dace60b6a392f328c2b971b2fe78';
        $c2 = '42831ec2217774244b7221b784d0d49c' .
              'e3aa212f2c02a4e035c17e2329aca12e' .
              '21d514b25466931c7d8f6a5aac84aa05' .
              '1ba30b396a0aac973d58e091473f5985';
        $c3 = '42831ec2217774244b7221b784d0d49c' .
              'e3aa212f2c02a4e035c17e2329aca12e' .
              '21d514b25466931c7d8f6a5aac84aa05' .
              '1ba30b396a0aac973d58e091';
        $c4 = '61353b4c2806934a777ff51fa22a4755' .
              '699b2a714fcdc6f83766e5f97b6c7423' .
              '73806900e49f24b22b097544d4896b42' .
              '4989b5e1ebac0f07c23f4598';
        $c5 = '8ce24998625615b603a033aca13fb894' .
              'be9112a5c3a211a8ba262a3cca7e2ca7' .
              '01e4a9a4fba43c90ccdcb281d48c7c6f' .
              'd62875d2aca417034c34aee5';

        $a1 = 'feedfacedeadbeeffeedfacedeadbeef' .
              'abaddad2';

        $subvectors = [
            // key, plaintext, nonce, aad, ciphertext, tag
            // Test Case 1
            [$k1, '', $n1, '', '', '58e2fccefa7e3061367f1d57a4e7455a'],
            // Test Case 2
            [$k1, $p1, $n1, '', $c1, 'ab6e47d42cec13bdf53a67b21257bddf'],
            // Test Case 3
            [$k2, $p2, $n2, '', $c2, '4d5c2af327cd64a62cf35abd2ba6fab4'],
            // Test Case 4
            [$k2, $p3, $n2, $a1, $c3, '5bc94fbc3221a5db94fae95ae7121a47'],
            // Test Case 5
            [$k2, $p3, $n3, $a1, $c4, '3612d2e79e3b0785561be14aaca2fccb'],
            // Test Case 6
            [$k2, $p3, $n4, $a1, $c5, '619cc5aefffe0bfa462af43c1699d050']
        ];

        $vectors = [];
        for ($i = 0; $i < count($subvectors); $i++) {
            for ($j = 0; $j < count($subvectors[$i]); $j++) {
                $subvectors[$i][$j] = pack('H*', $subvectors[$i][$j]);
            }
            foreach ($engines as $engine) {
                $temp = $subvectors[$i];
                array_unshift($temp, $engine);
                $vectors[] = $temp;
            }
        }

        return $vectors;
    }

    /**
     * @dataProvider engine128Vectors
     */
    public function test128Vectors($engine, $key, $plaintext, $nonce, $aad, $ciphertext, $tag)
    {
        $aes = new AES('gcm');
        $aes->setKey($key);
        $aes->setNonce($nonce);
        $aes->setAAD($aad);

        if (!$aes->isValidEngine($engine)) {
            self::markTestSkipped("Unable to initialize $engine engine");
        }
        $aes->setPreferredEngine($engine);

        $ciphertext2 = $aes->encrypt($plaintext);
        $this->assertEquals($ciphertext, $ciphertext2);
        $this->assertEquals($tag, $aes->getTag());
        $aes->setTag($tag);
        $this->assertEquals($plaintext, $aes->decrypt($ciphertext));
    }

    /**
     * Produces all combinations of test values.
     *
     * @return array
     */
    public function engine256Vectors()
    {
        $engines = [
            'PHP',
            'Eval',
            'mcrypt',
            'OpenSSL',
            'OpenSSL (GCM)',
            'libsodium'
        ];

        $p1 = '00000000000000000000000000000000';
        $p2 = 'd9313225f88406e5a55909c5aff5269a' .
              '86a7a9531534f7da2e4c303d8a318a72' .
              '1c3c0c95956809532fcf0e2449a6b525' .
              'b16aedf5aa0de657ba637b391aafd255';
        $p3 = 'd9313225f88406e5a55909c5aff5269a' .
              '86a7a9531534f7da2e4c303d8a318a72' .
              '1c3c0c95956809532fcf0e2449a6b525' .
              'b16aedf5aa0de657ba637b39';

        $n1 = '000000000000000000000000';
        $n2 = 'cafebabefacedbaddecaf888';
        $n3 = 'cafebabefacedbad';
        $n4 = '9313225df88406e555909c5aff5269aa' .
              '6a7a9538534f7da1e4c303d2a318a728' .
              'c3c0c95156809539fcf0e2429a6b5254' .
              '16aedbf5a0de6a57a637b39b';

        $k1 = '00000000000000000000000000000000' .
              '00000000000000000000000000000000';
        $k2 = 'feffe9928665731c6d6a8f9467308308' .
              'feffe9928665731c6d6a8f9467308308';

        $c1 = 'cea7403d4d606b6e074ec5d3baf39d18';
        $c2 = '522dc1f099567d07f47f37a32a84427d' .
              '643a8cdcbfe5c0c97598a2bd2555d1aa' .
              '8cb08e48590dbb3da7b08b1056828838' .
              'c5f61e6393ba7a0abcc9f662898015ad';
        $c3 = '522dc1f099567d07f47f37a32a84427d' .
              '643a8cdcbfe5c0c97598a2bd2555d1aa' .
              '8cb08e48590dbb3da7b08b1056828838' .
              'c5f61e6393ba7a0abcc9f662';
        $c4 = 'c3762df1ca787d32ae47c13bf19844cb' .
              'af1ae14d0b976afac52ff7d79bba9de0' .
              'feb582d33934a4f0954cc2363bc73f78' .
              '62ac430e64abe499f47c9b1f';
        $c5 = '5a8def2f0c9e53f1f75d7853659e2a20' .
              'eeb2b22aafde6419a058ab4f6f746bf4' .
              '0fc0c3b780f244452da3ebf1c5d82cde' .
              'a2418997200ef82e44ae7e3f';

        $a1 = 'feedfacedeadbeeffeedfacedeadbeef' .
              'abaddad2';

        $subvectors = [
            // key, plaintext, nonce, aad, ciphertext, tag
            // Test Case 13
            [$k1, '', $n1, '', '', '530f8afbc74536b9a963b4f1c4cb738b'],
            // Test Case 14
            [$k1, $p1, $n1, '', $c1, 'd0d1c8a799996bf0265b98b5d48ab919'],
            // Test Case 15
            [$k2, $p2, $n2, '', $c2, 'b094dac5d93471bdec1a502270e3cc6c'],
            // Test Case 16
            [$k2, $p3, $n2, $a1, $c3, '76fc6ece0f4e1768cddf8853bb2d551b'],
            // Test Case 17
            [$k2, $p3, $n3, $a1, $c4, '3a337dbf46a792c45e454913fe2ea8f2'],
            // Test Case 18
            [$k2, $p3, $n4, $a1, $c5, 'a44a8266ee1c8eb0c8b5d4cf5ae9f19a']
        ];

        $vectors = [];
        for ($i = 0; $i < count($subvectors); $i++) {
            for ($j = 0; $j < count($subvectors[$i]); $j++) {
                $subvectors[$i][$j] = pack('H*', $subvectors[$i][$j]);
            }
            foreach ($engines as $engine) {
                $temp = $subvectors[$i];
                array_unshift($temp, $engine);
                $vectors[] = $temp;
            }
        }

        return $vectors;
    }

    /**
     * @dataProvider engine256Vectors
     */
    public function test256Vectors($engine, $key, $plaintext, $nonce, $aad, $ciphertext, $tag)
    {
        $aes = new AES('gcm');
        $aes->setKey($key);
        $aes->setNonce($nonce);
        $aes->setAAD($aad);

        if (!$aes->isValidEngine($engine)) {
            self::markTestSkipped("Unable to initialize $engine engine");
        }
        $aes->setPreferredEngine($engine);

        $ciphertext2 = $aes->encrypt($plaintext);
        $this->assertEquals($ciphertext, $ciphertext2);
        $this->assertEquals($tag, $aes->getTag());
        $aes->setTag($tag);
        $this->assertEquals($plaintext, $aes->decrypt($ciphertext));
    }
}
